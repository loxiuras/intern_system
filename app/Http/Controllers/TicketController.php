<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Ticket;
use App\Models\TicketUser;
use App\Models\User;
use App\Services\DateService;
use App\Services\PriceService;
use App\Services\TimeService;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\ValidationException;

class TicketController extends Controller
{

    /**
     * @param Request $request
     * @return Factory|View|Application
     */
    public function overview(Request $request): Factory|View|Application
    {
        $where = [];

        $searchData = new \stdClass();

        if( isset( $request->status ) || isset( $_GET['status'] ) ) {
            $status = !empty( $_GET['status'] ) ? (int)$_GET['status'] : (int)$request->status;

            if ( !empty( $request->status ) ) $where[] = ['tickets.status', '=', $status];
            $searchData->status = (int)$request->status;
        } else {
            $where[] = ['tickets.status', '=', 1];
            $searchData->status = 1;
        }

        $ticketsData = Ticket::select([
            'tickets.*',
            'companies.name as companyName'
        ])
            ->where($where)
            ->orderBy('tickets.status', 'asc')
            ->orderBy('tickets.scheduled_date', 'desc')
            ->join('companies', 'companies.id', '=', 'tickets.company_id')
            ->get();

        return view('pages.ticket.overview.index', [
            "loginUserData" => $this->getLoginUserData(),
            "sidebarData"   => $this->getSidebarData( "ticket", "overview" ),
            "ticketsData"   => $ticketsData,
            "searchData"    => $searchData,
        ]);
    }

    public function add()
    {
        $ticketData = new \stdClass();

        $companiesData = Company::where([['name', '!=', ''], ['active', '=', 1]])->get();

        return view('pages.ticket.edit.index', [
            "loginUserData" => $this->getLoginUserData(),
            "sidebarData"   => $this->getSidebarData( "ticket", "add" ),
            "ticketData"    => $ticketData,
            "companiesData" => $companiesData,
        ]);
    }

    /**
     * @param int $ticketId
     * @return Application|Factory|View
     */
    public function edit( int $ticketId ): View|Factory|Application
    {
        $ticketData = Ticket::find( $ticketId );

        $companiesData = Company::where([['name', '!=', ''], ['active', '=', 1]])->get();

        $ticketUsers = TicketUser::where( "ticket_id", "=", $ticketId )
            ->join('users', 'users.id', '=', 'ticket_users.user_id')
            ->orderBy('users.name', 'asc')
            ->get();

        $connectedTicketUserIds = [];
        if ( $ticketUsers ) {
            foreach( $ticketUsers as $user ) {
                $connectedTicketUserIds[] = $user->id;
            }
        }

        $connectUsers = User::whereRaw('!FIND_IN_SET(id,"'. implode(",", $connectedTicketUserIds) .'")')->orderBy('name')->get();

        return view('pages.ticket.edit.index', [
            "loginUserData" => $this->getLoginUserData(),
            "sidebarData"   => $this->getSidebarData( "ticket", "edit" ),
            "ticketData"    => $ticketData,
            "companiesData" => $companiesData,
            "ticketUsers"   => $ticketUsers,
            "connectUsers"  => $connectUsers,
        ]);
    }

    /**
     * @param int $ticketId
     * @return Application|Factory|View|RedirectResponse|Redirector
     */
    public function smallEdit( int $ticketId ): View|Factory|Redirector|RedirectResponse|Application
    {
        $ticketData = Ticket::select([
                "tickets.id",
                "tickets.title",
                "tickets.description",
                "tickets.invoice_description",
                "tickets.invoice_price",
                "tickets.invoice_time",
                "tickets.created_user_id",
                "tickets.updated_user_id",
                "tickets.status",
                "companies.name as companyName",
                "u1.name as createdUserName",
                "u1.insertion as createdUserInsertion",
                "u1.last_name as createdUserLastName",
                "u2.name as updatedUserName",
                "u2.insertion as updatedUserInsertion",
                "u2.last_name as updatedUserLastName",
            ])
            ->where([ ["tickets.id", "=", $ticketId] ])
            ->join('companies', 'companies.id', '=', 'tickets.company_id')
            ->join('users as u1', 'u1.id', '=', 'tickets.created_user_id')
            ->join('users as u2', 'u2.id', '=', 'tickets.updated_user_id')
            ->first();

        if (
            !$ticketData
            || ( !empty( $ticketData ) && $ticketData->status < 3 )
        ) {
            return Redirect( Route( "ticket-edit", ["id" => $ticketId] ) );
        }

        return view('pages.ticket.small-edit.index', [
            "loginUserData" => $this->getLoginUserData(),
            "sidebarData"   => $this->getSidebarData( "ticket", "edit" ),
            "ticketData"    => $ticketData,
        ]);
    }

    /**
     * @param int $id
     *
     * @return RedirectResponse
     */
    public function delete( int $id )
    {
        DB::table('tickets')->where('id', '=', $id)->delete();
        return back();
    }

    public function store( Request $request )
    {
        $request->session()->put('notificationActive', true);
        $request->session()->put('notificationType', "warning");
        $request->session()->put('notificationIconClass', "fas fa-bell");
        $request->session()->put('notificationTitle', __("pages/ticket.notification.save.missing-fields.title"));
        $request->session()->put('notificationText', __("pages/ticket.notification.save.missing-fields.text"));

        $this->validate($request, [
            "company_id" => "required|numeric|min:1",
            "title"      => "required|string",
        ]);

        $loginUserData = $this->getLoginUserData();

        $id = $request->id;

        if ( $id ) {
            $ticketData = Ticket::find( $id );

            $ticketData->company_id          = $request->company_id;
            $ticketData->title               = $request->title;
            $ticketData->description         = $request->description;
            $ticketData->invoice_description = $request->invoice_description;
            $ticketData->invoice_price       = (new PriceService( $request->invoice_price ))->transformDatabase();
            $ticketData->invoice_time        = $this->mergeTimes( (int)$request->invoice_time_hours, (int)$request->invoice_time_minutes );

            $scheduledDate = !empty( $request->scheduled_date ) ? (new DateService($request->scheduled_date))->transformDatabase() : "";
            $ticketData->scheduled_date      = $scheduledDate;
            $ticketData->scheduled_end_date  = !empty( $request->scheduled_end_date ) ? (new DateService($request->scheduled_end_date))->transformDatabase() : ( !empty( $scheduledDate ) ? $scheduledDate : "" );
            $ticketData->status              = (int)$request->status;
            $ticketData->updated_user_id     = (int)$loginUserData->id;
            $ticketData->urgent_level        = (int)$request->urgent_level;
            $ticketData->save();

            return back()->with([
                "notificationActive"    => true,
                "notificationType"      => "success",
                "notificationIconClass" => "fas fa-bell",
                "notificationTitle"     => __("pages/ticket.notification.save.success.title"),
                "notificationSubTitle"  => null,
                "notificationText"      => __("pages/ticket.notification.save.success.text"),
            ]);
        }
        else {

            $scheduledDate = !empty( $request->scheduled_date ) ? (new DateService($request->scheduled_date))->transformDatabase() : "";

            $id = Ticket::insertGetId(
                [
                    "company_id"          => $request->company_id,
                    "title"               => $request->title,
                    "description"         => $request->description,
                    "invoice_description" => $request->invoice_description,
                    "invoice_price"       => (new PriceService( $request->invoice_price ))->transformDatabase(),
                    "invoice_time"        => $this->mergeTimes( (int)$request->invoice_time_hours, (int)$request->invoice_time_minutes ),
                    "scheduled_date"      => $scheduledDate,
                    "scheduled_end_date"  => !empty( $request->scheduled_end_date ) ? (new DateService($request->scheduled_end_date))->transformDatabase() : ( !empty( $scheduledDate ) ? $scheduledDate : '' ),
                    "created_user_id"     => $loginUserData->id,
                    "updated_user_id"     => $loginUserData->id,
                    "status"              => 1,
                    "urgent_level"        => (int)$request->urgent_level,
                ]
            );

            $request->session()->put('notificationActive', true);
            $request->session()->put('notificationType', "success");
            $request->session()->put('notificationIconClass', "fas fa-bell");
            $request->session()->put('notificationTitle', __("pages/ticket.notification.save.success.title"));
            $request->session()->put('notificationText', __("pages/ticket.notification.save.success.text"));

            return Redirect( Route( "ticket-edit", ["id" => $id] ) );
        }
    }

    public function smallStore( Request $request )
    {
        $id = $request->id;

        if ( $id ) {
            $ticketData = Ticket::find($id);

            $loginUserData = $this->getLoginUserData();

            $ticketData->status          = 5;
            $ticketData->invoice         = !empty( $request->invoice ) ? 1 : 0;
            $ticketData->invoice_at      = Carbon::now();
            $ticketData->updated_at      = Carbon::now();
            $ticketData->updated_user_id = $loginUserData->id;
            $ticketData->save();
        }

        return Redirect( Route( "ticket-overview", ["status" => 3] ) );
    }

    public function reset( int $id, Request $request )
    {
        if ( !empty( $id ) && !empty( $request ) ) {

            $ticketData = Ticket::find($id);

            if ( $ticketData ) {

                $ticketData->status = (int)$request->status;
                $ticketData->save();
            }
        }

        return Redirect( Route( "ticket-overview", ["status" => 4] ) );
    }

    /**
     * @param int $hours
     * @param int $minutes
     * @return int
     */
    private function mergeTimes( int $hours, int $minutes ): int
    {
        return (int)(( $hours * 60 ) + $minutes);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function connectUser(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'id'      => 'required',
            'user_id' => 'required',
        ]);

        TicketUser::insertGetId([
            'ticket_id' => $request->id,
            'user_id'   => $request->user_id,
        ]);

        return back();
    }

    public function deleteConnectedUser( int $ticketId, int $userId ): RedirectResponse
    {
        DB::table('ticket_users')->where([
            ['ticket_id', '=', $ticketId],
            ['user_id', '=', $userId],
        ])->delete();

        return back();
    }
}

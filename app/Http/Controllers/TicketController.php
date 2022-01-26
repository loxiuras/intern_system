<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Ticket;
use App\Services\TimeService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TicketController extends Controller
{

    /**
     * @param Request $request
     * @return Factory|View|Application
     */
    public function overview(Request $request): Factory|View|Application
    {
        $where = [];

        $ticketsData = Ticket::select([
            'tickets.*',
            'companies.name as companyName'
        ])
            ->where($where)
            ->orderBy('tickets.status', 'asc')
            ->orderBy('tickets.created_at', 'asc')
            ->join('companies', 'companies.id', '=', 'tickets.company_id')
            ->get();

        return view('pages.ticket.overview.index', [
            "loginUserData" => $this->getLoginUserData(),
            "sidebarData"   => $this->getSidebarData( "ticket", "overview" ),
            "ticketsData"   => $ticketsData,
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

        return view('pages.ticket.edit.index', [
            "loginUserData" => $this->getLoginUserData(),
            "sidebarData"   => $this->getSidebarData( "ticket", "edit" ),
            "ticketData"    => $ticketData,
            "companiesData" => $companiesData,
        ]);
    }

    public function delete() {}

    public function store( Request $request )
    {
        $request->session()->put('notificationActive', true);
        $request->session()->put('notificationType', "warning");
        $request->session()->put('notificationIconClass', "fas fa-bell");
        $request->session()->put('notificationTitle', __("pages/ticket.notification.save.missing-fields.title"));
        $request->session()->put('notificationText', __("pages/ticket.notification.save.missing-fields.text"));

        $this->validate($request, [
            "company_id" => "required",
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
            $ticketData->invoice_price       = (int)$request->invoice_price;
            $ticketData->invoice_time        = $this->mergeTimes( (int)$request->invoice_time_hours, (int)$request->invoice_time_minutes );
            $ticketData->status              = (int)$request->status;
            $ticketData->updated_user_id     = (int)$loginUserData->id;
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

            $id = Ticket::insertGetId(
                [
                    "company_id"          => $request->company_id,
                    "title"               => $request->title,
                    "description"         => $request->description,
                    "invoice_description" => $request->invoice_description,
                    "invoice_price"       => (int)$request->invoice_price,
                    "invoice_time"        => $this->mergeTimes( (int)$request->invoice_time_hours, (int)$request->invoice_time_minutes ),
                    "created_user_id"     => $loginUserData->id,
                    "updated_user_id"     => $loginUserData->id,
                    "status"              => 1,
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

    /**
     * @param int $hours
     * @param int $minutes
     * @return int
     */
    private function mergeTimes( int $hours, int $minutes ): int
    {
        return (int)(( $hours * 60 ) + $minutes);
    }
}

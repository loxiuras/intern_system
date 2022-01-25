<?php

namespace App\Http\Controllers;

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

        return view('pages.ticket.edit.index', [
            "loginUserData" => $this->getLoginUserData(),
            "sidebarData"   => $this->getSidebarData( "ticket", "add" ),
            "ticketData"    => $ticketData,
        ]);
    }

    /**
     * @param int $ticketId
     * @return Application|Factory|View
     */
    public function edit( int $ticketId ): View|Factory|Application
    {
        $ticketData = Ticket::find( $ticketId );

        return view('pages.ticket.edit.index', [
            "loginUserData" => $this->getLoginUserData(),
            "sidebarData"   => $this->getSidebarData( "ticket", "edit" ),
            "ticketData"    => $ticketData,
        ]);
    }

    public function delete() {}

    public function store() {}
}

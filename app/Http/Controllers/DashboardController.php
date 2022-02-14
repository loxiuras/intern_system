<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Domain;
use App\Models\Company;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function overview()
    {
        return view('pages.dashboard.overview.index', [
            "loginUserData"       => $this->getLoginUserData(),
            "sidebarData"         => $this->getSidebarData( "dashboard", "overview" ),
            "userInfo"            => $this->getUserInfo(),
            "companyInfo"         => $this->getCompanyInfo(),
            "domainInfo"          => $this->getDomainInfo(),
            "ticketInfo"          => $this->getTicketInfo(),
            "calendarInfo"        => $this->getCalendarInfo(),
        ]);
    }

    /**
     * @return \stdClass
     */
    private function getUserInfo(): \stdClass
    {
        $userInfo = new \stdClass();

        $userCount = User::where('name', '!=', '')->get()->count();
        $userInfo->totalCount = $userCount;

        $userCountMonth = User::where([
            ['last_login', '>=', date('Y-m-d', strtotime("-7 days"))." 00:00:00"],
        ])->get()->count();
        $userInfo->monthCount = $userCountMonth;

        return $userInfo;
    }

    /**
     * @return \stdClass
     */
    private function getCompanyInfo(): \stdClass
    {
        $companyInfo = new \stdClass();

        $companyCount = Company::where('name', '!=', '')->get()->count();
        $companyInfo->totalCount = $companyCount;

        $currentDate = Carbon::now();
        $companyCountMonth = Company::where([
            ['name', '!=', ''],
            ['created_at', '>=', "{$currentDate->year}-{$currentDate->month}-01 00:00:00"],
            ['created_at', '<=', "{$currentDate->year}-{$currentDate->month}-21 23:59:59"],
        ])->get()->count();
        $companyInfo->monthCount = $companyCountMonth;

        return $companyInfo;
    }

    /**
     * @return \stdClass
     */
    private function getDomainInfo(): \stdClass
    {
        $domainInfo = new \stdClass();

        $domainCount = Domain::where('name', '!=', '')->get()->count();
        $domainInfo->totalCount = $domainCount;

        $currentDate = Carbon::now();
        $domainCountMonth = Domain::where([
            ['name', '!=', ''],
            ['created_at', '>=', "{$currentDate->year}-{$currentDate->month}-01 00:00:00"],
        ])->get()->count();
        $domainInfo->monthCount = $domainCountMonth;

        return $domainInfo;
    }

    /**
     * @return \stdClass
     */
    private function getTicketInfo(): \stdClass
    {
        $ticketInfo = new \stdClass();

        $ticketCount = Ticket::where('status', '>=', 3)->get()->count();
        $ticketInfo->totalCount = $ticketCount;

        $currentDate = Carbon::now();
        $ticketCountMonth = Ticket::where([
            ['status', '>=', 3],
            ['updated_at', '>=', "{$currentDate->year}-{$currentDate->month}-01 00:00:00"],
        ])->get()->count();
        $ticketInfo->monthCount = $ticketCountMonth;

        return $ticketInfo;
    }

    /**
     * @return \stdClass
     */
    private function getCalendarInfo(): \stdClass
    {
        $calendarInfo = new \stdClass();

        $calendarInfo->birthdays = [];
        $calendarInfo->tickets   = [];

        $currentDate = Carbon::now();
        if ( !empty( $_GET['date'] ) ) {
            $currentDate = new Carbon($_GET['date']);
            $calendarInfo->prevMonthDate = (new Carbon($_GET['date']))->subMonth()->toDateString();
            $calendarInfo->nextMonthDate = (new Carbon($_GET['date']))->addMonth()->toDateString();
        }
        else {
            $calendarInfo->prevMonthDate = Carbon::now()->subMonth()->toDateString();
            $calendarInfo->nextMonthDate = Carbon::now()->addMonth()->toDateString();
        }

        $calendarInfo->date         = $currentDate->toDateString();
        $calendarInfo->currentDate  = (Carbon::now())->toDateString();
        $calendarInfo->month        = $currentDate->month;
        $calendarInfo->year         = $currentDate->year;

        $users = User::selectRaw(
            "*, year(date_of_birth) as 'dateOfBirthYear'"
        )->whereRaw(
            'month(date_of_birth) = ? || month(date_of_birth) = ?', [$currentDate->month, ( ( $currentDate->month === 12 ) ? 1 : ($currentDate->month + 1) )]
        )->get();

        if ( $users and $users->count() ) {
            foreach ( $users as $user ) {
                $dateOfBirth = $user->date_of_birth ?: null;
                $year = $user->dateOfBirthYear ?: null;

                $date = str_replace( $year, $currentDate->year, $dateOfBirth );

                $dateWeekDay = (int)date('w', strtotime($date));

                $isMoved = false;
                if ( $dateWeekDay === 6 || $dateWeekDay === 0 ) {
                    $date    = date('Y-m-d', strtotime($date . ' -'. ( $dateWeekDay === 6 ? 1 : 2 ) .' day'));
                    $isMoved = true;
                }

                $birthday = new \stdClass();
                $birthday->id           = $user->id ?: 0;
                $birthday->dateOfBirth  = $dateOfBirth;
                $birthday->date         = $date;
                $birthday->isMoved      = $isMoved;
                $birthday->birthDayDate = (int)date('d', strtotime($dateOfBirth) );
                $birthday->year         = $year;
                $birthday->name         = str_replace( "  ", " ", ($user->name ?: null) . " " . ($user->insertion ?: null) . " " . ($user->last_name ?: null));

                $calendarInfo->birthdays[] = $birthday;
            }
        }

        $tickets = Ticket::selectRaw(
            "*, tickets.id as id, companies.name as companyName , year(scheduled_date) as 'scheduledDateYear', month(scheduled_date) as 'scheduledDateMonth', day(scheduled_date) as 'scheduledDateDay'"
        )
            ->whereRaw('year(scheduled_date) = ? AND month(scheduled_date) = ?', [$currentDate->year, $currentDate->month])
            ->join('companies', 'companies.id', '=', 'tickets.company_id')
            ->get();

        if ( $tickets and $tickets->count() ) {
            foreach ($tickets as $ticket) {
                $ticketData = new \stdClass();
                $ticketData->id           = $ticket->id ?: 0;
                $ticketData->date         = $ticket->scheduled_date ?: null;
                $ticketData->title        = $ticket->title ?: null;
                $ticketData->companyName  = $ticket->companyName ?: null;
                $ticketData->time         = $ticket->invoice_time ?: null;
                $ticketData->status       = (int)$ticket->status ?: 1;

                $calendarInfo->tickets[] = $ticketData;
            }
        }

        return $calendarInfo;
    }
}

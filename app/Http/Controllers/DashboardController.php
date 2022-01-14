<?php

namespace App\Http\Controllers;

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
            ['created_at', '<=', "{$currentDate->year}-{$currentDate->month}-21 23:59:59"],
        ])->get()->count();
        $domainInfo->monthCount = $domainCountMonth;

        return $domainInfo;
    }
}

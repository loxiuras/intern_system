<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyUser;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

    public function overview()
    {
        $companiesData = Company::where([
            ['name', '!=', ''],
        ])->get();

        return view('pages.company.overview.index', [
            "loginUserData" => $this->getLoginUserData(),
            "sidebarData"   => $this->getSidebarData( "company", "overview" ),
            "companiesData"     => $companiesData
        ]);
    }

    public function add()
    {
        return view('pages.company.add.index', [
            "loginUserData" => $this->getLoginUserData(),
            "sidebarData"   => $this->getSidebarData( "company", "add" ),
            "companyData"      => new \stdClass(),
        ]);
    }

    public function edit(int $companyId)
    {
        $companyData = Company::find($companyId);

        $companyUsers = CompanyUser::where( "company_id", "=", $companyId )
                                   ->join('users', 'users.id', '=', 'company_users.user_id')
                                   ->orderBy('users.name', 'asc')
                                   ->get();

        return view('pages.company.add.index', [
            "loginUserData" => $this->getLoginUserData(),
            "sidebarData"   => $this->getSidebarData( "company", "add" ),
            "companyData"   => $companyData,
            "companyUsers"  => $companyUsers,
        ]);
    }

    public function delete($id) {}
}

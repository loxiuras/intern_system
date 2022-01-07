<?php

namespace App\Http\Controllers;

use App\Models\Company;
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
}

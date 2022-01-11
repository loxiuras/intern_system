<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use Illuminate\Http\Request;

class DomainController extends Controller
{

    public function overview()
    {
        $domainsData = Domain::select([
            'domains.name as domainName',
            'hosts.name as hostName',
            'companies.name as companyName',
            'domains.active',
            'domains.parent_id',
        ])
            ->where('domains.name', '!=', '')
            ->join('hosts', 'hosts.id', '=', 'domains.host_id')
            ->join('companies', 'companies.id', '=', 'domains.company_id')
            ->get();

        return view('pages.domain.overview.index', [
            "loginUserData" => $this->getLoginUserData(),
            "sidebarData"   => $this->getSidebarData( "domain", "overview" ),
            "domainsData"   => $domainsData,
        ]);
    }

    public function add(){}
    public function edit(){}
    public function delete(){}
    public function store(){}

}

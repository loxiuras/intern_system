<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Domain;
use App\Models\Host;
use Illuminate\Http\Request;

class DomainController extends Controller
{

    public function overview(Request $request)
    {
        $where = [];
        $where[] = ['domains.name', '!=', ''];

        $searchData = new \stdClass();
        if( $request->domain_name ) {
            $where[] = ['domains.name', 'like', '%'.$request->domain_name.'%'];
            $searchData->domain_name = $request->domain_name;
        };
        if( $request->host_id ) {
            $where[] = ['domains.host_id', '=', (int)$request->host_id];
            $searchData->host_id = $request->host_id;
        }
        if( $request->company_id ) {
            $where[] = ['domains.company_id', '=', (int)$request->company_id];
            $searchData->company_id = $request->company_id;
        }

        $domainsData = Domain::select([
            'domains.name as domainName',
            'hosts.name as hostName',
            'companies.name as companyName',
            'domains.id',
            'domains.active',
            'domains.parent_id',
        ])
            ->where($where)
            ->join('hosts', 'hosts.id', '=', 'domains.host_id')
            ->join('companies', 'companies.id', '=', 'domains.company_id')
            ->get();


        $hostsData     = Host::where('name', '!=', '')->orderBy('name', 'asc')->get();
        $companiesData = Company::where('name', '!=', '')->orderBy('name', 'asc')->get();

        return view('pages.domain.overview.index', [
            "loginUserData" => $this->getLoginUserData(),
            "sidebarData"   => $this->getSidebarData( "domain", "overview" ),
            "domainsData"   => $domainsData,
            "hostsData"     => $hostsData,
            "companiesData" => $companiesData,
            "searchData"    => $searchData,
        ]);
    }

    public function add()
    {
        $companiesData = Company::where('name', '!=', '')->orderBy('name', 'asc')->get();

        $domainsData = Domain::where([
            ['name', '!=', ''],
            ['parent_id', '=', 0],
        ])->orWhereNull('parent_id')->get();

        $hostsData = Host::where('name', '!=', '')->orderBy('name', 'asc')->get();

        return view('pages.domain.add.index', [
            "loginUserData" => $this->getLoginUserData(),
            "sidebarData"   => $this->getSidebarData( "domain", "add" ),
            "domainData"    => new \stdClass(),
            "companiesData" => $companiesData,
            "domainsData"   => $domainsData,
            "hostsData"     => $hostsData,
        ]);
    }

    /**
     * @param int $domainId
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(int $domainId)
    {
        $companiesData = Company::where('name', '!=', '')->orderBy('name', 'asc')->get();

        $domainData = Domain::find( $domainId );

        $domainsData = Domain::where([
            ['name', '!=', ''],
            ['parent_id', '=', 0],
        ])->orWhereNull('parent_id')->get();

        $hostsData = Host::where('name', '!=', '')->orderBy('name', 'asc')->get();

        return view('pages.domain.edit.index', [
            "loginUserData" => $this->getLoginUserData(),
            "sidebarData"   => $this->getSidebarData( "domain", "add" ),
            "domainData"    => $domainData,
            "companiesData" => $companiesData,
            "domainsData"   => $domainsData,
            "hostsData"     => $hostsData,
        ]);
    }

    public function delete(){}
    public function store(){}

}

<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Domain;
use App\Models\Host;
use App\Models\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        if( !empty( $_GET['company_id'] ) ) {
            $where[] = ['domains.company_id', '=', (int)$_GET['company_id']];
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
            ->selectRaw("(SELECT COUNT(*) FROM passwords AS p WHERE p.type = 'domain' AND p.record_id = domains.id) AS amount_of_passwords")
            ->where($where)
            ->orderBy('sequence', 'asc')
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

        $passwordsData = Password::getAllFromType( 'domain', $domainId );

        return view('pages.domain.edit.index', [
            "loginUserData"   => $this->getLoginUserData(),
            "sidebarData"     => $this->getSidebarData("domain", "add"),
            "domainData"      => $domainData,
            "companiesData"   => $companiesData,
            "domainsData"     => $domainsData,
            "hostsData"       => $hostsData,
            "passwordsData"   => $passwordsData,
        ]);
    }

    /**
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(int $id): \Illuminate\Http\RedirectResponse
    {
        DB::table('domains')->where('id', '=', $id)->delete();
        return back();
    }

    public function store(Request $request)
    {
        $request->session()->put('notificationActive', true);
        $request->session()->put('notificationType', "warning");
        $request->session()->put('notificationIconClass', "fas fa-bell");
        $request->session()->put('notificationTitle', __("pages/domain.notification.save.missing-fields.title"));
        $request->session()->put('notificationText', __("pages/domain.notification.save.missing-fields.text"));

        $this->validate($request, [
            "id"   => "integer",
            "name" => "required",
        ]);

        $id = $request->id;

        if ( $id ) {
            $domainData = Domain::find($id);

            $domainData->name          = strtolower( $request->name );
            if ( !empty( $request->parent_id ) )  $domainData->parent_id = $request->parent_id;
            if ( !empty( $request->company_id ) ) $domainData->company_id = $request->company_id;
            if ( !empty( $request->host_id ) )    $domainData->host_id = $request->host_id;
            $domainData->is_production = !empty( $request->is_production ) ? 1 : 0;
            $domainData->active        = !empty( $request->active ) ? 1 : 0;
            $domainData->save();
        }
        else {
            $data = [
                "name"          => $request->name,
                "is_production" => !empty( $request->is_production ) ? 1 : 0,
                "active"        => !empty( $request->active ) ? 1 : 0,
            ];

            if ( !empty( $request->parent_id ) )  $data['parent_id'] = $request->parent_id;
            if ( !empty( $request->company_id ) ) $data['company_id'] = $request->company_id;
            if ( !empty( $request->host_id ) )    $data['host_id'] = $request->host_id;

            $id = Domain::insertGetId(
                $data
            );
        }

        Domain::calculateSequence();

        return back()->with([
            "notificationActive"    => true,
            "notificationType"      => "success",
            "notificationIconClass" => "fas fa-bell",
            "notificationTitle"     => __("pages/domain.notification.save.success.title"),
            "notificationSubTitle"  => null,
            "notificationText"      => __("pages/domain.notification.save.success.text"),
        ]);
    }

    public function calculateSequence()
    {
        Domain::calculateSequence();
    }
}

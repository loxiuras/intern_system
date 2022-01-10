<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $connectedCompanyUserIds = [];
        if ( $companyUsers ) {
            foreach( $companyUsers as $user ) {
                $connectedCompanyUserIds[] = $user->id;
            }
        }

        $connectUsers = User::whereRaw('!FIND_IN_SET(id,"'. implode(",", $connectedCompanyUserIds) .'")')->orderBy('name')->get();

        return view('pages.company.edit.index', [
            "loginUserData" => $this->getLoginUserData(),
            "sidebarData"   => $this->getSidebarData( "company", "add" ),
            "companyData"   => $companyData,
            "companyUsers"  => $companyUsers,
            "connectUsers"  => $connectUsers,
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id): \Illuminate\Http\RedirectResponse
    {
        DB::table('companies')->where('id', '=', $id)->delete();
        return back();
    }

    /**
     * @param Request $request
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "id"                      => "required|integer",
            "name"                    => "required",
            "legal_name"              => "required",
            "street_name"             => "required|min:5",
            "house_number"            => "required|integer",
            "house_number_extra"      => "",
            "postal_code"             => "required|min:6",
            "city"                    => "required|min:6",
            "province"                => "",
            "country"                 => "required",
            "telephone"               => "required|min:10",
            "primary_email"           => "required|email",
            "primary_website"         => "",
            "primary_invoice_email"   => "required|email",
            "optional_invoice_emails" => "",
        ]);

        $id = $request->id;

        $optionalInvoiceEmails = !empty( $request->optional_invoice_emails ) ? implode( ",", explode("\r\n", $request->optional_invoice_emails) ) : "";

        if ( $id ) {
            $companyData = Company::find($id);

            $companyData->name                    = $request->name;
            $companyData->legal_name              = $request->legal_name;
            $companyData->street_name             = $request->street_name;
            $companyData->house_number            = $request->house_number;
            $companyData->house_number_extra      = $request->house_number_extra;
            $companyData->postal_code             = $request->postal_code;
            $companyData->city                    = $request->city;
            $companyData->province                = $request->province;
            $companyData->country                 = $request->country;
            $companyData->telephone               = $request->telephone;
            $companyData->primary_email           = $request->primary_email;
            $companyData->primary_website         = $request->primary_website;
            $companyData->primary_invoice_email   = $request->primary_invoice_email;
            $companyData->optional_invoice_emails = $optionalInvoiceEmails;

            $companyData->save();
        }
        else {
            $id = Company::insertGetId(
                [
                    "name"                    => $request->name,
                    "legal_name"              => $request->legal_name,
                    "street_name"             => $request->street_name,
                    "house_number"            => $request->house_number,
                    "house_number_extra"      => $request->house_number_extra,
                    "postal_code"             => $request->postal_code,
                    "city"                    => $request->city,
                    "province"                => $request->province,
                    "country"                 => $request->country,
                    "telephone"               => $request->telephone,
                    "primary_email"           => $request->primary_email,
                    "primary_website"         => $request->primary_website,
                    "primary_invoice_email"   => $request->primary_invoice_email,
                    "optional_invoice_emails" => $optionalInvoiceEmails,
                ]
            );
        }

        return redirect()->route('company-edit', ['id' => $id]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function connectUser(Request $request): \Illuminate\Http\RedirectResponse
    {
        $this->validate($request, [
            'id'      => 'required',
            'user_id' => 'required',
        ]);

        CompanyUser::insertGetId([
            'company_id' => $request->id,
            'user_id'    => $request->user_id,
        ]);

        return back();
    }
}

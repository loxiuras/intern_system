<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Company;
use App\Models\Password;
use App\Models\CompanyUser;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\ImportService;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{

    public function overview()
    {
        $companiesData = Company::where([
            ['companies.name', '!=', ''],
        ])
            ->select('companies.*')
            ->selectRaw("(SELECT COUNT(*) FROM passwords AS p WHERE p.type = 'company' AND p.record_id = companies.id) AS amount_of_passwords")
            ->get();

        return view('pages.company.overview.index', [
            "loginUserData" => $this->getLoginUserData(),
            "sidebarData" => $this->getSidebarData("company", "overview"),
            "companiesData" => $companiesData
        ]);
    }

    public function add()
    {
        return view('pages.company.add.index', [
            "loginUserData" => $this->getLoginUserData(),
            "sidebarData" => $this->getSidebarData("company", "add"),
            "companyData" => new \stdClass(),
        ]);
    }

    public function edit(int $companyId)
    {
        $companyData = Company::find($companyId);

        $companyUsers = CompanyUser::where("company_id", "=", $companyId)
            ->join('users', 'users.id', '=', 'company_users.user_id')
            ->orderBy('users.name', 'asc')
            ->get();

        $companyDomains = Domain::getConnectedCompany($companyId);

        $passwordsData = Password::getAllFromType('company', $companyId);

        $connectedCompanyUserIds = [];
        if ($companyUsers) {
            foreach ($companyUsers as $user) {
                $connectedCompanyUserIds[] = $user->id;
            }
        }

        $connectUsers = User::whereRaw('!FIND_IN_SET(id,"' . implode(",", $connectedCompanyUserIds) . '")')->orderBy('name')->get();

        return view('pages.company.edit.index', [
            "loginUserData" => $this->getLoginUserData(),
            "sidebarData" => $this->getSidebarData("company", "add"),
            "companyData" => $companyData,
            "companyUsers" => $companyUsers,
            "connectUsers" => $connectUsers,
            "companyDomains" => $companyDomains,
            "passwordsData" => $passwordsData,
        ]);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(int $id): \Illuminate\Http\RedirectResponse
    {
        DB::table('companies')->where('id', '=', $id)->delete();
        return back();
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->session()->put('notificationActive', true);
        $request->session()->put('notificationType', "warning");
        $request->session()->put('notificationIconClass', "fas fa-bell");
        $request->session()->put('notificationTitle', __("pages/company.notification.save.missing-fields.title"));
        $request->session()->put('notificationText', __("pages/company.notification.save.missing-fields.text"));

        $this->validate($request, [
            "id" => "required|integer",
            "legal_name" => "required",
            "street_name" => "required|min:5",
            "house_number" => "required|integer",
            "postal_code" => "required|min:6",
            "city" => "required|min:6",
            "country" => "required",
            "telephone" => "required|min:10",
            "primary_email" => "required|email",
            "primary_invoice_email" => "required|email",
        ]);

        $id = $request->id;

        $optionalInvoiceEmails = !empty($request->optional_invoice_emails) ? implode(",", explode("\r\n", $request->optional_invoice_emails)) : "";

        if ($id) {
            $companyData = Company::find($id);

            $companyData->name = $request->name;
            $companyData->legal_name = $request->legal_name;
            $companyData->street_name = $request->street_name;
            $companyData->house_number = $request->house_number;
            $companyData->house_number_extra = $request->house_number_extra;
            $companyData->postal_code = $request->postal_code;
            $companyData->city = $request->city;
            $companyData->province = $request->province;
            $companyData->country = $request->country;
            $companyData->telephone = $request->telephone;
            $companyData->primary_email = $request->primary_email;
            $companyData->primary_website = $request->primary_website;
            $companyData->primary_invoice_email = $request->primary_invoice_email;
            $companyData->optional_invoice_emails = $optionalInvoiceEmails;
            $companyData->active = !empty($request->active) ? 1 : 0;

            $companyData->save();
        } else {
            $id = Company::insertGetId(
                [
                    "name" => $request->name,
                    "legal_name" => $request->legal_name,
                    "street_name" => $request->street_name,
                    "house_number" => $request->house_number,
                    "house_number_extra" => $request->house_number_extra,
                    "postal_code" => $request->postal_code,
                    "city" => $request->city,
                    "province" => $request->province,
                    "country" => $request->country,
                    "telephone" => $request->telephone,
                    "primary_email" => $request->primary_email,
                    "primary_website" => $request->primary_website,
                    "primary_invoice_email" => $request->primary_invoice_email,
                    "optional_invoice_emails" => $optionalInvoiceEmails,
                    "active" => !empty($request->active) ? 1 : 0,
                ]
            );
        }

        return back()->with([
            "notificationActive" => true,
            "notificationType" => "success",
            "notificationIconClass" => "fas fa-bell",
            "notificationTitle" => __("pages/company.notification.save.success.title"),
            "notificationSubTitle" => null,
            "notificationText" => __("pages/company.notification.save.success.text"),
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function connectUser(Request $request): \Illuminate\Http\RedirectResponse
    {
        $this->validate($request, [
            'id' => 'required',
            'user_id' => 'required',
        ]);

        CompanyUser::insertGetId([
            'company_id' => $request->id,
            'user_id' => $request->user_id,
        ]);

        return back();
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function import(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|max:2048',
        ]);

        try {
            $file = $request->file;
            $fileName = $file->getPathname();

            $companyData = (new ImportService($fileName))->cast();

            foreach ($companyData as $data) {
                $name = !empty($data['name']) ? $data['name'] : null;

                $company = Company::where('name', '=', $name)->first();
                if ($company && !empty($company->id)) {
                    $companyData = Company::find($company->id);

                    $companyData->name = $data['name'];
                    $companyData->legal_name = $data['legal_name'];
                    $companyData->street_name = $data['street_name'];
                    $companyData->house_number = (int)$data['house_number'];
                    $companyData->house_number_extra = $data['house_number_extra'];
                    $companyData->postal_code = $data['postal_code'];
                    $companyData->city = $data['city'];
                    $companyData->province = $data['province'];
                    $companyData->country = $data['country'];
                    $companyData->telephone = $data['telephone'];
                    $companyData->primary_email = $data['primary_email'];
                    $companyData->primary_website = $data['primary_website'];
                    $companyData->primary_invoice_email = $data['primary_invoice_email'];
                    $companyData->optional_invoice_emails = $data['optional_invoice_emails'];
                    $companyData->active = $data['active'] ? 1 : 0;

                    $companyData->save();
                } else {
                    Company::insert(
                        [
                            "name" => $data['name'],
                            "legal_name" => $data['legal_name'],
                            "street_name" => $data['street_name'],
                            "house_number" => (int)$data['house_number'],
                            "house_number_extra" => $data['house_number_extra'],
                            "postal_code" => $data['postal_code'],
                            "city" => $data['city'],
                            "province" => $data['province'],
                            "country" => $data['country'],
                            "telephone" => $data['telephone'],
                            "primary_email" => $data['primary_email'],
                            "primary_website" => $data['primary_website'],
                            "primary_invoice_email" => $data['primary_invoice_email'],
                            "optional_invoice_emails" => $data['optional_invoice_emails'],
                            "active" => !empty($data['active']) ? 1 : 0,
                        ]
                    );
                }
            }
            return back()->with([
                "notificationActive" => true,
                "notificationType" => "success",
                "notificationIconClass" => "fas fa-bell",
                "notificationTitle" => __("pages/company.notification.import.success.title"),
                "notificationSubTitle" => null,
                "notificationText" => __("pages/company.notification.import.success.text"),
            ]);
        } catch (\Exception $exception) {

            return back()->with([
                "notificationActive" => true,
                "notificationType" => "danger",
                "notificationIconClass" => "fas fa-bug",
                "notificationTitle" => __("pages/company.notification.import.error.title"),
                "notificationSubTitle" => null,
                "notificationText" => __("pages/company.notification.import.error.text"),
            ]);
        }
    }

    public function deleteConnectedUser(int $companyId, int $userId): \Illuminate\Http\RedirectResponse
    {
        DB::table('company_users')->where([
            ['company_id', '=', $companyId],
            ['user_id', '=', $userId],
        ])->delete();

        return back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Password;
use App\Services\PasswordService;
use Defuse\Crypto\Exception\BadFormatException;
use Defuse\Crypto\Exception\EnvironmentIsBrokenException;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PasswordController extends Controller
{

    /**
     * @param Request $request
     * @return Factory|View|Application
     */
    public function overview(Request $request): Factory|View|Application
    {
        $where = [];
        $where[] = ['name', '!=', ''];

        $searchData = new \stdClass();
        if( $request->type ) {
            $where[] = ['type', '=', $request->type];
            $searchData->type = $request->type;

            if( $request->record_id ) {
                $where[] = ['record_id', '=', $request->record_id];
                $searchData->record_id = $request->record_id;
            }

            if( $request->name ) {
                $where[] = ['name', 'LIKE', '%'.$request->name.'%'];
                $searchData->name = $request->name;
            }
        }

        $passwordsData = Password::where($where)->get();

        $typesData = Password::select('type')->distinct()->get();

        return view('pages.password.overview.index', [
            "loginUserData" => $this->getLoginUserData(),
            "sidebarData"   => $this->getSidebarData( "password", "overview" ),
            "passwordsData" => $passwordsData,
            "typesData"     => $typesData,
            "searchData"    => $searchData,
        ]);
    }

    public function add()
    {
        $passwordData = new \stdClass();

        if ( !empty( $_GET["type"] ) ) $passwordData->type = $_GET["type"];
        if ( !empty( $_GET["recordId"] ) ) $passwordData->record_id = $_GET["recordId"];

        $typesData = $this->getPasswordTypes();

        return view('pages.password.add.index', [
            "loginUserData" => $this->getLoginUserData(),
            "sidebarData"   => $this->getSidebarData( "password", "add" ),
            "passwordData"  => $passwordData,
            "typesData"     => $typesData,
        ]);
    }

    public function edit(int $passwordId)
    {
        $passwordData = Password::find($passwordId);

        $typesData = $this->getPasswordTypes();

        return view('pages.password.edit.index', [
            "loginUserData" => $this->getLoginUserData(),
            "sidebarData"   => $this->getSidebarData( "password", "edit" ),
            "passwordData"  => $passwordData,
            "typesData"     => $typesData,
        ]);
    }

    /**
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(int $id): \Illuminate\Http\RedirectResponse
    {
        DB::table('passwords')->where('id', '=', $id)->delete();
        return back();
    }

    /**
     * @throws ValidationException
     */
    public function store(Request $request )
    {
        $request->session()->put('notificationActive', true);
        $request->session()->put('notificationType', "warning");
        $request->session()->put('notificationIconClass', "fas fa-bell");
        $request->session()->put('notificationTitle', __("pages/password.notification.save.missing-fields.title"));
        $request->session()->put('notificationText', __("pages/password.notification.save.missing-fields.text"));

        $this->validate($request, [
           "type"      => "required",
           "record_id" => "required",
           "name"      => "required",
        ]);

        $id = $request->id;

        if ( $id ) {
            $passwordData = Password::find($id);

            $passwordData->type        = $request->type;
            $passwordData->record_id   = $request->record_id;
            $passwordData->name        = $request->name;
            $passwordData->username    = $request->username;
            $passwordData->description = $request->description;
            $passwordData->active      = !empty( $request->active ) ? 1 : 0;
            $passwordData->save();
        }
        else {
            $id = Password::insertGetId(
                [
                    "type"        => $request->type,
                    "record_id"   => $request->record_id,
                    "name"        => $request->name,
                    "username"    => $request->username,
                    "description" => $request->description,
                    "active"      => !empty( $request->active ) ? 1 : 0,
                ]
            );
        }

        $this->updatePassword( $id, $request->password );

        return Redirect( Route('password-edit', ['id' => $id]) )->with([
            "notificationActive"    => true,
            "notificationType"      => "success",
            "notificationIconClass" => "fas fa-bell",
            "notificationTitle"     => __("pages/password.notification.save.success.title"),
            "notificationSubTitle"  => null,
            "notificationText"      => __("pages/password.notification.save.success.text"),
        ]);
    }

    /**
     * @return array
     */
    private function getPasswordTypes(): array
    {
        $types = [];

        $company = new \stdClass();
        $company->type = "company";
        $types[] = $company;

        $domain = new \stdClass();
        $domain->type = "domain";
        $types[] = $domain;

        $user = new \stdClass();
        $user->type = "user";
        $types[] = $user;

        return $types;
    }

    /**
     * @param int $id
     * @param string $password
     * @throws BadFormatException
     * @throws EnvironmentIsBrokenException
     */
    private function updatePassword( int $id, string $password ): void
    {
        $passwordData = Password::find($id);

        $passwordData->password = (new PasswordService( $passwordData->type, $passwordData->record_id ))->encrypt( $password );
        $passwordData->save();
    }
}

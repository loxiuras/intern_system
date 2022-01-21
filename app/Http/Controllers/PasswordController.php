<?php

namespace App\Http\Controllers;

use App\Models\Password;
use App\Services\PasswordService;
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

        $typesData = Password::select('type')->distinct()->get();

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

        $typesData = Password::select('type')->distinct()->get();

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
        $this->validate($request, [
            "id"        => "integer",
            "type"      => "required",
            "record_id" => "required",
            "name"      => "required",
            "username"  => "required",
            "password"  => "required",
        ]);

        $id = $request->id;

        if ( $id ) {
            $passwordData = Password::find($id);

            $passwordData->type        = $request->type;
            $passwordData->record_id   = $request->record_id;
            $passwordData->name        = $request->name;
            $passwordData->username    = $request->username;
            $passwordData->password    = $request->password;
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
                    "password"    => $request->password,
                    "description" => $request->description,
                    "active"      => !empty( $request->active ) ? 1 : 0,
                ]
            );
        }

        return redirect()->route('password-edit', ['id' => $id]);
    }
}

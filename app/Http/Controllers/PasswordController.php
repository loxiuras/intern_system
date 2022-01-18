<?php

namespace App\Http\Controllers;

use App\Models\Password;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

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
}

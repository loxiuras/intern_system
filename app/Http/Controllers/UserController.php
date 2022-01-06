<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function overview()
    {
        $usersData = User::where([
            ['email', '!=', ''],
        ])->get();

        return view('pages.user.overview.index', [
            "loginUserData" => $this->getLoginUserData(),
            "sidebarData"   => $this->getSidebarData( "user", "overview" ),
            "usersData"     => $usersData
        ]);
    }

    public function add()
    {
        return view('pages.user.overview.index', [
            "loginUserData" => $this->getLoginUserData(),
            "sidebarData"   => $this->getSidebarData( "user", "add" ),
        ]);
    }

}

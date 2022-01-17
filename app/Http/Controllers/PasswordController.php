<?php

namespace App\Http\Controllers;

use App\Models\Password;
use Illuminate\Http\Request;

class PasswordController extends Controller
{

    /**
     *
     */
    public function overview()
    {
        $passwordsData = Password::where('name', '!=', '')->get();

        return view('pages.password.overview.index', [
            "loginUserData" => $this->getLoginUserData(),
            "sidebarData"   => $this->getSidebarData( "password", "overview" ),
            "passwordsData" => $passwordsData
        ]);
    }
}

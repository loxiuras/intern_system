<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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
        return view('pages.user.add.index', [
            "loginUserData" => $this->getLoginUserData(),
            "sidebarData"   => $this->getSidebarData( "user", "add" ),
            "userData"      => new \stdClass(),
        ]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $this->validate($request, [
            "id"            => "integer",
            "first_name"    => "required",
            "insertion"     => "",
            "last_name"     => "required",
            "date_of_birth" => "required|date",
            "email"         => "required|email",
            "telephone"     => "",
        ]);

        $id = $request->id;

        if ( $id ) {
            $userData = User::find($request->id);

            $userData->name    = $request->first_name;
            $userData->insertion     = $request->insertion;
            $userData->last_name     = $request->last_name;
            $userData->date_of_birth = $request->date_of_birth;
            $userData->email         = $request->email;
            $userData->telephone     = $request->telephone;
            $userData->save();
        }
        else {
            $id = User::insertGetId(
                [
                    "name"          => $request->first_name,
                    "insertion"     => $request->insertion,
                    "last_name"     => $request->last_name,
                    "date_of_birth" => $request->date_of_birth,
                    "email"         => $request->email,
                    "telephone"     => $request->telephone,
                ]
            );
        }

        return redirect()->route('user-edit', ['id' => $id]);
    }

    public function edit() {}
}

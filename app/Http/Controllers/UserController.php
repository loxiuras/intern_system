<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
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

    public function edit(int $userId)
    {
        $userData = User::find($userId);

        return view('pages.user.edit.index', [
            "loginUserData" => $this->getLoginUserData(),
            "sidebarData"   => $this->getSidebarData( "user", "add" ),
            "userData"      => $userData,
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
            "name"          => "required",
            "insertion"     => "",
            "last_name"     => "required",
            "date_of_birth" => "required|date",
            "email"         => "required|email",
            "telephone"     => "",
        ]);

        $id = $request->id;

        if ( $id ) {
            $userData = User::find($request->id);

            $userData->name               = $request->name;
            $userData->insertion          = $request->insertion;
            $userData->last_name          = $request->last_name;
            $userData->date_of_birth      = $request->date_of_birth;
            $userData->email              = $request->email;
            $userData->telephone          = $request->telephone;
            $userData->picture_default_id = (int)$request->picture_default_id;
            $userData->save();
        }
        else {
            $id = User::insertGetId(
                [
                    "name"          => $request->name,
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

    public function storePassword(Request $request)
    {
        $this->validate($request, [
            "id"               => "",
            "current_password" => "required",
            "new_password"     => [
                "required",
                "confirmed",
                "string",
                "min:10",
                "max:30",
                "regex:/[a-z]/",
                "regex:/[A-Z]/",
                "regex:/[0-9]/",
                "regex:/[@$!%*#?&]/",
            ],
        ]);

        $userData = user::find( $request->id );

        if ($userData && Hash::check($request->current_password, $userData->password)) {
            $userData->password              = Hash::make($request->new_password);
            $userData->last_password_renewal = Carbon::now();
            $userData->save();

            // ToDo: Send password change e-mail notification;

            // ToDo: Add success message;
            return back()->with([
                "passwordSaved"     => true,
                "passwordSavedText" => __("auth.saved"),
            ]);
        }
        else {
            return back()->with([ "incorrectCurrentPassword" => true ]);
        }
    }
}

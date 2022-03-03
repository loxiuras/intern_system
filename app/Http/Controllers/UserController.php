<?php

namespace App\Http\Controllers;

use App\Models\Password;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{

    public function overview()
    {
        $usersData = User::where([
            ['email', '!=', ''],
        ])
            ->orderBy('active', 'desc')
            ->orderBy('name', 'asc')
            ->get();

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

        if ( empty( $userData ) ) return redirect()->route("user-overview");

        $passwordsData = Password::getAllFromType( 'user', $userId );

        return view('pages.user.edit.index', [
            "loginUserData" => $this->getLoginUserData(),
            "sidebarData"   => $this->getSidebarData( "user", "edit" ),
            "userData"      => $userData,
            "passwordsData" => $passwordsData,
        ]);
    }

    /**
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id): \Illuminate\Http\RedirectResponse
    {
        DB::table('users')->where('id', '=', $id)->delete();
        return back();
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->session()->put('notificationActive', true);
        $request->session()->put('notificationType', "warning");
        $request->session()->put('notificationIconClass', "fas fa-bell");
        $request->session()->put('notificationTitle', __("pages/user.notification.save.missing-fields.title"));
        $request->session()->put('notificationText', __("pages/user.notification.save.missing-fields.text"));

        $this->validate($request, [
            "id"            => "integer",
            "name"          => "required",
            "insertion"     => "",
            "last_name"     => "required",
            "date_of_birth" => "required|date",
            "email"         => "required|email",
            "telephone"     => "required",
        ]);

        $id = $request->id;

        if ( $id ) {
            $userData = User::find($id);

            $userData->name               = $request->name;
            $userData->insertion          = $request->insertion;
            $userData->last_name          = $request->last_name;
            $userData->date_of_birth      = $request->date_of_birth;
            $userData->email              = strtolower($request->email);
            $userData->telephone          = $request->telephone;
            $userData->picture_default_id = (int)$request->picture_default_id;
            $userData->active             = !empty( $request->active ) ? 1 : 0;
            $userData->show_in_planning_rows = !empty( $request->show_in_planning_rows ) ? 1 : 0;
            $userData->save();
        }
        else {
            $id = User::insertGetId(
                [
                    "name"               => $request->name,
                    "insertion"          => $request->insertion,
                    "last_name"          => $request->last_name,
                    "date_of_birth"      => $request->date_of_birth,
                    "email"              => strtolower($request->email),
                    "telephone"          => $request->telephone,
                    "picture_default_id" => (int)$request->picture_default_id,
                    "active"             => !empty( $request->active ) ? 1 : 0,
                    "show_in_planning_rows" => !empty( $request->show_in_planning_rows ) ? 1 : 0,
                ]
            );
        }

        return Redirect( Route('user-edit', ['id' => $id]) )->with([
            "notificationActive"    => true,
            "notificationType"      => "success",
            "notificationIconClass" => "fas fa-bell",
            "notificationTitle"     => __("pages/user.notification.save.success.title"),
            "notificationSubTitle"  => null,
            "notificationText"      => __("pages/user.notification.save.success.text"),
        ]);
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

            $this->sendEmailNotification( $request->id );

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

    /**
     * @param int $userId
     *
     * @return void
     */
    private function sendEmailNotification( int $userId )
    {
        $userData = User::find( $userId );
        $userEmail = !empty( $userData->email ) ? trim( (string)$userData->email ) : "";

        $userFirstName = !empty( $userData->name ) ? trim( (string)$userData->name ) : "";
        $userInsertion = !empty( $userData->insertion ) ? " ". trim( (string)$userData->insertion ). " " : "";
        $userLastName = !empty( $userData->last_name ) ? trim( (string)$userData->last_name ) : "";
        $userFullName = "{$userFirstName}{$userInsertion}{$userLastName}";

        $logo = "<img class='image' src='https://www.suilichem.com/assets/systems/email-logo.png' style='height: 30px;' height='30px' alt='Van Suilichem Online Logo'>";

        $details = [
            "from" => [
                "name"  => __("emails/password-notification.from.name"),
                "email" => __("emails/password-notification.from.email"),
            ],
            "to" => [
                "name"  => $userFullName,
                "email" => $userEmail,
            ],
            "subject"   => __("emails/reset-password.subject"),
            "structure" => [
                "style"  => "",
                "header" => __("emails/password-notification.structure.header", ["logo" => $logo, "fullName" => $userFullName]),
                "body"   => __("emails/password-notification.structure.body"),
                "footer" => __("emails/password-notification.structure.footer"),
            ],
            "view" => "emails.password-notification",
        ];

        Mail::send(new \App\Mail\SendInBlue($details));
    }
}

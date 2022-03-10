<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('auth.forgot-password.index', []);
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();
        if( $user ) {
            $token = Str::random(64);

            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);

            $userFirstName = !empty( $userData->name ) ? trim( (string)$userData->name ) : "";
            $userInsertion = !empty( $userData->insertion ) ? " ". trim( (string)$userData->insertion ). " " : "";
            $userLastName = !empty( $userData->last_name ) ? trim( (string)$userData->last_name ) : "";
            $userFullName = "{$userFirstName}{$userInsertion}{$userLastName}";
            $resetButton  = "<a class='btn' style='border: 5px solid #3498db; background-color: #3498db; color: #ffffff; text-decoration: none;' href='". Route("reset-password", ["email" => $request->email, "token" => $token]) ."'>". __("general.reset-password") ."</a>";

            $details = [
                "from" => [
                    "name"  => __("emails/reset-password.from.name"),
                    "email" => __("emails/reset-password.from.email"),
                ],
                "to" => [
                    "name"  => $userFullName,
                    "email" => $request->email,
                ],
                "subject"   => __("emails/reset-password.subject"),
                "structure" => [
                    "style"  => ".image { height: 30px; } img { height: 30px; } a { border: 5px solid #3498db; background-color: #3498db; color: #ffffff; text-decoration: none; } .btn { border: 5px solid #3498db; background-color: #3498db; color: #ffffff; text-decoration: none; }",
                    "header" => __("emails/reset-password.structure.header", ["logo" => __("emails/reset-password.data.logo-location"), "fullName" => $userFullName]),
                    "body"   => __("emails/reset-password.structure.body", ["email" => $request->email, "resetButton" => $resetButton]),
                    "footer" => __("emails/reset-password.structure.footer"),
                ],
                "view"    => "emails.reset-password",
            ];

            Mail::send(new \App\Mail\SendInBlue($details));
        }

        return back()->with(["status" => __("passwords.sent"), "statusClass" => "text-success"]);
    }
}

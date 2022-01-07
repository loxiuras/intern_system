<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{

    /**
     * @param string $email
     * @param string $token
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function index( string $email, string $token )
    {
        if ( empty( $email ) || empty( $token ) ) return redirect()->route('login');

        if ( !$this->validateEmailAndToken( $email, $token ) ) return redirect()->route('login');

        return view('auth.reset-password.index', [
            'email' => $email,
            'token' => $token,
        ]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store( Request $request, string $email, string $token )
    {
        $request->validate([
            'password' => [
                'required',
                'confirmed',
                'string',
                'min:10',
                'max:30',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'regex:/[@$!%*#?&]/'
            ],
        ]);

        if ( !$this->validateEmailAndToken( $email, $token ) ) return redirect()->route('login');

        DB::table('users')
          ->where(['email' => $email])
          ->update([
              "password"              => Hash::make( $request->password ),
              "last_password_renewal" => Carbon::now()
          ]);

        DB::table('password_resets')
          ->where([
              'email' => $email
          ])->delete();

        // ToDo: Send password change e-mail notification;

        return redirect()->route('login');
    }

    /**
     * @param string $email
     * @param string $token
     *
     * @return bool
     */
    private function validateEmailAndToken( string $email, string $token ): bool
    {
        $resetPasswordData = DB::table('password_resets')
                               ->where([
                                   'email' => $email,
                                   'token' => $token,
                               ])->first();

        return !empty( $resetPasswordData );
    }
}

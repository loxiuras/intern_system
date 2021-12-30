<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('auth.login.index', []);
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|void
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
           "email"      => "required|email",
           "password"   => "required",
           'rememberMe' => 'nullable'
        ]);

        if ( !auth()->attempt($request->only('email', 'password'), !empty($request->rememberMe)) ) {
            return back()->withErrors(['credentials' => __("auth.failed")]);
        }

        $user = User::find(Auth::id());
        $user->last_login = Carbon::now();
        $user->save();

        // ToDo: Redirect to dashboard overview;
    }
}

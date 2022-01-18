<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    /**
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('auth.login.index', []);
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return RedirectResponse|void
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

        return redirect()->route('dashboard');
    }

    /**
     * @param Request $request
     * @return Redirector|Application|RedirectResponse
     */
    public function logout( Request $request ): Redirector|Application|RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}

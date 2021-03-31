<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; use App\Models\SessionDB;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        //$credentials = $request->only('email', 'password');
        $credentials = ['email'=>$request->input('email'), 'password'=>$request->input('password'), 'status'=>0];
        if (Auth::attempt($credentials)) {
            SessionDB::where('user_id', Auth::id())->delete();
            $request->session()->regenerate(true);
            return redirect(RouteServiceProvider::HOME);
        }
        $credentials = ['login_name'=>$request->input('email'), 'password'=>$request->input('password'), 'status'=>0];
        if (Auth::attempt($credentials)) {

            $request->session()->regenerate(true);
            return redirect(RouteServiceProvider::HOME);
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);

        /*$request->authenticate();

        $request->session()->regenerate();

        return redirect(RouteServiceProvider::HOME);*/
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

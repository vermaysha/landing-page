<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Login function.
     *
     * @param Request $request The request object.
     * @return View The login view.
     */
    public function login(Request $request): View
    {
        return view('dashboard.auth.login');
    }

    /**
     * Authenticates the user based on the provided request data.
     *
     * @param Request $request The request object containing the user credentials.
     * @return RedirectResponse The response object containing the redirect information.
     */
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (!User::where('email', $request->email)->first()) {
            return back()->withErrors([
                'email' => 'Email tidak ditemukan',
            ]);
        }

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended(route('dashboard.home'));
        }

        return back()->withErrors([
            'email' => 'Kata sandi salah',
        ])->onlyInput('email');
    }

    /**
     * Logs out the user and invalidates the session.
     *
     * @param Request $request The request object.
     * @throws Some_Exception_Class Description of exception
     * @return RedirectResponse The redirect response.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('dashboard.login');
    }
}

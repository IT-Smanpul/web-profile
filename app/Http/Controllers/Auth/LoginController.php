<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Auth\LoginRequest;

class LoginController extends Controller
{
    public function index(): View
    {
        return view('auth.login', [
            'title' => 'Login - '.Config::get('app.name'),
        ]);
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        if (! Auth::attempt($request->only(['username', 'password']), $request->filled('remember'))) {
            return back()->with('error', 'Username atau Password salah!')->onlyInput('username');
        }

        Session::regenerate();

        return to_route('dashboard');
    }
}

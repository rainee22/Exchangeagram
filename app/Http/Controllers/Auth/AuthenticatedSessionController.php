<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store()
    {
        request()->validate([
            'username' => 'required|string',
            'password' => 'required',
        ]);

        $key = filter_var(request('username'), FILTER_VALIDATE_EMAIL)
            ? 'email'
            : 'username';

        $credentials = request()->merge([$key => request('username')]);

        if (! Auth::attempt($credentials->only($key, 'password'))) {
            throw ValidationException::withMessages([
                'username' => trans('auth.failed'),
            ]);
        }

        request()->session()->regenerate();

        return redirect(RouteServiceProvider::HOME);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class AuthenticatedSessionController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function destroy(Request $request)
    {
        return view('logout');
    }
}

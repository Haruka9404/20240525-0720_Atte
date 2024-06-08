<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TimeStampController extends Controller
{
    public function index(Request $request)
    {
        $contact = $request->only(['email']);
        return view('index', ['contact' => $contact]);
    }
}

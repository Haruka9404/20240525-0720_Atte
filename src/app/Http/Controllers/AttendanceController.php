<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function attendance()
    {
        // $timestamp = Timestamp::simplePaginate(5);
        return view('attendance');
    }

    public function destroy()
    {
        return view('logout');
    }
}

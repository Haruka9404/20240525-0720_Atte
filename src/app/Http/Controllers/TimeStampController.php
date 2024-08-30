<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Timestamp;
use Illuminate\Support\Facades\Auth;
use DateTime;

class TimeStampController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $timestamp = Timestamp::where('user_id', $user->id)->latest()->first();
        $restStart = false;
        $restEnd = false;
        if(($timestamp)){
            if (($timestamp->attendance_start) && (empty($timestamp->attendance_end))) {
                $restStart = true;
            }
            if (($timestamp->attendance_start) && (empty($timestamp->attendance_end))) {
                $restEnd = true;
            }
        }
        return view('index', ['restStart' => $restStart],['restEnd' => $restEnd]);
    }

    public function attendance_start(Request $request)
    {
        $user = Auth::user();
        $oldTimestamp = Timestamp::where('user_id', $user->id)->latest()->first();
        $oldTimestampDay = null;
        if ($oldTimestamp) {
            $oldTimestamp_attendance_start = new Carbon($oldTimestamp->attendance_start);
            $oldTimestampDay = $oldTimestamp_attendance_start->startOfDay();
        }
        $newTimestampDay = Carbon::today();

        if (($oldTimestampDay == $newTimestampDay) && (empty($oldTimestamp->attendance_end))) {
            return redirect()->back()->with('error', 'すでに出勤打刻がされています');
        }
        $user = Auth::user();
        $oldTimestamp = Timestamp::where('user_id', $user->id)->latest()->first();
        $timestamp = Timestamp::create([
            'user_id' => $user->id,
            'date' => Carbon::now(),
            'attendance_start' => Carbon::now(),
        ]);
        return redirect()->back()->with('my_status', '出勤打刻が完了しました');
    }

    public function attendance_end()
    {
        $user = Auth::user();
        $timestamp = Timestamp::where('user_id', $user->id)->latest()->first();

        if (!empty($timestamp->attendance_end)) {
            return redirect()->back()->with('error', '既に退勤の打刻がされているか、出勤打刻されていません');
        }
        $timestamp->update([
            'attendance_end' => Carbon::now()
        ]);

        return redirect()->back()->with('my_status', '退勤打刻が完了しました');
    }
}

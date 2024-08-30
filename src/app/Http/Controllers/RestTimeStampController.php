<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Timestamp;
use App\Models\Resttime;
use Illuminate\Support\Facades\Auth;

class RestTimeStampController extends Controller
{
    public function rest_start(Request $request)
    {
        $user = Auth::user();
        $timestamp =Timestamp::where('user_id', $user->id)->latest()->first();

        $resttime = Resttime::create([
            'timestamp_id' => $timestamp->id,
            'rest_start' => Carbon::now(),
        ]);
        return redirect()->back()->with('my_status', '休憩を開始しました');
    }

    public function rest_end()
    {
        $user = Auth::user();
        $timestamp = Timestamp::where('user_id', $user->id)->latest()->first();
        $resttime = Resttime::where('timestamp_id', $timestamp->id)->latest()->first();

        if (!empty($resttime->rest_end)) {
            return redirect()->back()->with('error', '既に休憩終了されているか、休憩開始されていません');
        }
        $resttime->update([
            'rest_end' => Carbon::now()
        ]);

        return redirect()->back()->with('my_status', '休憩を終了しました');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Resttime;
use App\Models\Timestamp;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DateTime;
use Ramsey\Uuid\Type\Integer;
use DateInterval;
use Illuminate\Support\Facades\Log;

class AttendanceController extends Controller{

    public function showByDate(Request $request, $date = null)
    {
        $currentDate = $date ? Carbon::parse($date) : Carbon::today();

        // 出勤データの取得
        $attendances = Timestamp::whereDate('attendance_start', $currentDate)->get();

        // 前日と翌日の日付を計算
        $previousDate = $currentDate->copy()->subDay()->format('Y-m-d');
        $nextDate = $currentDate->copy()->addDay()->format('Y-m-d');

        return view('attendance', compact('attendances', 'currentDate', 'previousDate', 'nextDate'));
    }

    public function attendance(Request $request)
    {
        $attendances = [];

        // 特定日のタイムスタンプを取得し、各フィールドを設定
        $timestamps = Timestamp::whereDate('attendance_start', '2024-07-31')->get();

        foreach ($timestamps as $timestamp) {
            $attendance = [
                'user_name' => $timestamp->user->name, // ユーザー名 (関連するUserモデルがあると仮定)
                'attendance_start' => $timestamp->attendance_start,
                'attendance_end' => $timestamp->attendance_end,
                'rest_time' => '00:00:00', // 後で更新される休憩時間
                'attendance_time' => '00:00:00', // 後で計算される勤務時間
            ];
            $attendances[$timestamp->id] = $attendance;
        }

        // 休憩時間を追加
        $rest_times = Resttime::whereIn('timestamp_id', $timestamps->pluck('id'))
            ->latest()
            ->get();

        foreach ($rest_times as $rest_time) {
            if (isset($attendances[$rest_time->timestamp_id])) {
                $restStart = new DateTime($rest_time->rest_start);
                $restEnd = new DateTime($rest_time->rest_end);

                // 休憩時間の差分を計算
                $restDuration = $restEnd->diff($restStart)->format('%H:%I:%S');

                // 計算結果を配列に追加
                $attendances[$rest_time->timestamp_id]['rest_time'] = $restDuration;
            }
        }

        foreach ($timestamps as $timestamp) {
            $attendanceStart = new DateTime($timestamp->attendance_start);
            $attendanceEnd = new DateTime($timestamp->attendance_end);

            // 勤務時間の差分を計算
            $totalWorkDuration = $attendanceEnd->diff($attendanceStart);

            // 休憩時間を秒に変換
            $restTimeSeconds = 0;
            if (isset($attendances[$timestamp->id]['rest_time'])) {
                list($hours, $minutes, $seconds) = explode(':', $attendances[$timestamp->id]['rest_time']);
                $restTimeSeconds = $hours * 3600 + $minutes * 60 + $seconds;
            }

            // 総勤務時間（秒）から休憩時間を引く
            $totalWorkSeconds = ($totalWorkDuration->h * 3600) + ($totalWorkDuration->i * 60) + $totalWorkDuration->s;
            $netWorkSeconds = $totalWorkSeconds - $restTimeSeconds;

            // 勤務時間をフォーマットして配列に格納
            $attendances[$timestamp->id]['attendance_time'] = gmdate('H:i:s', $netWorkSeconds);
        }

        return view('attendance', compact('attendances'));
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimeStampsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id'       => 1,
            'attendance_start' => '2024-05-05 22:00',
            'attendance_end' => '2024-05-06 09:00',
            'rest_start' => '2024-05-06 02:00',
            'rest_end' => '2024-05-06 03:00',
        ];
        DB::table('timestamps')->insert($param);

        $param = [
            'user_id'       => 2,
            'attendance_start' => '2024-05-05 09:00',
            'attendance_end' => '2024-05-05 18:00',
            'rest_start' => '2024-05-05 12:00',
            'rest_end' => '2024-05-05 13:00',
        ];
        DB::table('timestamps')->insert($param);

        $param = [
            'user_id'       => 3,
            'attendance_start' => '2024-05-06 09:00',
            'attendance_end' => '2024-05-06 18:30',
            'rest_start' => '2024-05-06 14:00',
            'rest_end' => '2024-05-06 15:00',
        ];
        DB::table('timestamps')->insert($param);

        $param = [
            'user_id'       => 2,
            'attendance_start' => '2024-05-07 09:00',
            'attendance_end' => '2024-05-07 19:00',
            'rest_start' => '2024-05-07 13:00',
            'rest_end' => '2024-05-07 14:00',
        ];
        DB::table('timestamps')->insert($param);

        $param = [
            'user_id'       => 1,
            'attendance_start' => '2024-05-06 21:00',
            'attendance_end' => '2024-05-07 09:00',
            'rest_start' => '2024-05-07 03:00',
            'rest_end' => '2024-05-07 04:00',
        ];
        DB::table('timestamps')->insert($param);

        $param = [
            'user_id'       => 1,
            'attendance_start' => '2024-05-07 18:00',
            'attendance_end' => '2024-05-08 06:00',
            'rest_start' => '2024-05-07 22:00',
            'rest_end' => '2024-05-07 23:00',
        ];
        DB::table('timestamps')->insert($param);

        $param = [
            'user_id'       => 1,
            'attendance_start' => '2024-05-09 09:00',
            'attendance_end' => '2024-05-09 19:00',
            'rest_start' => '2024-05-09 13:00',
            'rest_end' => '2024-05-09 14:00',
        ];
        DB::table('timestamps')->insert($param);

        $param = [
            'user_id'       => 1,
            'attendance_start' => '2024-05-09 20:00',
            'attendance_end' => '2024-05-10 08:00',
            'rest_start' => '2024-05-10 00:00',
            'rest_end' => '2024-05-10 01:00',
        ];
        DB::table('timestamps')->insert($param);
    }
}

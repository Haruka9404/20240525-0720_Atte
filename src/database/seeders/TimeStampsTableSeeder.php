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
            'date' => '2024-05-05',
            'attendance_start' => '2024-05-05 22:00',
            'attendance_end' => '2024-05-06 09:00',
        ];
        DB::table('timestamps')->insert($param);

        $param = [
            'user_id'       => 2,
            'date' => '2024-05-05',
            'attendance_start' => '2024-05-05 09:00',
            'attendance_end' => '2024-05-05 18:00',
        ];
        DB::table('timestamps')->insert($param);

        $param = [
            'user_id'       => 3,
            'date' => '2024-05-06',
            'attendance_start' => '2024-05-06 09:00',
            'attendance_end' => '2024-05-06 18:30',
        ];
        DB::table('timestamps')->insert($param);

        $param = [
            'user_id'       => 2,
            'date' => '2024-05-07',
            'attendance_start' => '2024-05-07 09:00',
            'attendance_end' => '2024-05-07 19:00',
        ];
        DB::table('timestamps')->insert($param);

        $param = [
            'user_id'       => 1,
            'date' => '2024-05-06',
            'attendance_start' => '2024-05-06 21:00',
            'attendance_end' => '2024-05-07 09:00',
        ];
        DB::table('timestamps')->insert($param);

        $param = [
            'user_id'       => 1,
            'date' => '2024-05-07',
            'attendance_start' => '2024-05-07 18:00',
            'attendance_end' => '2024-05-08 06:00',
        ];
        DB::table('timestamps')->insert($param);

        $param = [
            'user_id'       => 1,
            'date' => '2024-05-09',
            'attendance_start' => '2024-05-09 09:00',
            'attendance_end' => '2024-05-09 19:00',
        ];
        DB::table('timestamps')->insert($param);

        $param = [
            'user_id'       => 1,
            'date' => '2024-05-09',
            'attendance_start' => '2024-05-09 20:00',
            'attendance_end' => '2024-05-10 08:00',
        ];
        DB::table('timestamps')->insert($param);
    }
}

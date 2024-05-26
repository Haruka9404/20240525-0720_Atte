<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => 'neko',
            'email' => 'neko@mail.com',
            'pw' => 'neko-neko',
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => 'mike',
            'email' => 'mike@mail.com',
            'pw' => 'mike-neko',
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => 'chatora',
            'email' => 'chatora@mail.com',
            'pw' => 'chatora-neko',
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => 'kijitora',
            'email' => 'kijitora@mail.com',
            'pw' => 'kijitora-neko',
        ];
        DB::table('users')->insert($param);
    }
}

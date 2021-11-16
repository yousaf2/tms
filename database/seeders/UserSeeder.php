<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'role' => 0,
            'password' => bcrypt('12345678'),
        ]);
        DB::table('users')->insert([
            'name' => 'team',
            'email' => 'team@team.com',
            'role' => 1,
            'password' => bcrypt('12345678'),
        ]);
        DB::table('users')->insert([
            'name' => 'lead',
            'email' => 'lead@lead.com',
            'role' => 2,
            'password' => bcrypt('12345678'),
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'role_id' => 1,
            'username' => 'Admin',
            'password' => bcrypt('admin'),
            'email' => 'admin@admin.com',
            'gender' => 'male'
        ]);
        DB::table('users')->insert([
            'role_id' => 2,
            'username' => 'calvinarihta',
            'password' => bcrypt('calvin'),
            'email' => 'calvinarihta@gmail.com',
            'gender' => 'male'
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate(); //for cleaning earlier data to avoid duplicate entries
        DB::table('users')->insert([
          'name' => 'SuperAdministrator',
          'email' => 'admin@gmail.com',
          'role' => 'admin',
          'password' => Hash::make('password'),
        ]);
        DB::table('users')->insert([
          'name' => 'Mentor1',
          'email' => 'mentor1@gmail.com',
          'role' => 'mentor',
          'password' => Hash::make('password'),
        ]);
        DB::table('users')->insert([
            'name' => 'Mentor2',
            'email' => 'mentor2@gmail.com',
            'role' => 'mentor',
            'password' => Hash::make('password'),
          ]);
          DB::table('users')->insert([
            'name' => 'Mentor3',
            'email' => 'mentor3@gmail.com',
            'role' => 'mentor',
            'password' => Hash::make('password'),
          ]);
    }
}

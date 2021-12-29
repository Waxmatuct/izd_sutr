<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            FacultySeeder::class,
            TypeSeeder::class,
            MonthSeeder::class,
            BookSeeder::class,
        ]);
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'test@test.ru',
            'password' => Hash::make('qweasd'),
        ]);
    }
}

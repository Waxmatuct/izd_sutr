<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
        // \App\Models\User::factory(10)->create();
        // \App\Models\Book::factory(150)->create();
    }
}

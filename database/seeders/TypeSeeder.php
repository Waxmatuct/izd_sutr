<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            [
                'title' => 'Методическое пособие',
            ],
            [
                'title' => 'Методические рекомендации',
            ],
            [
                'title' => 'Учебное пособие',
            ],
            [
                'title' => 'Методические указания',
            ],
            [
                'title' => 'Программа по ознакомительной практике',
            ],
            [
                'title' => 'Практикум',
            ],
            [
                'title' => 'Электронное издание',
            ],
            [
                'title' => 'Конспект лекций',
            ],
        ]);
    }
}

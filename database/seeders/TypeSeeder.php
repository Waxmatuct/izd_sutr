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

        DB::unprepared(file_get_contents(__DIR__ . '/types.sql'));

        // DB::table('types')->insert([
        //     [
        //         'title' => 'Методическое пособие',
        //     ],
        //     [
        //         'title' => 'Методические рекомендации',
        //     ],
        //     [
        //         'title' => 'Учебное пособие',
        //     ],
        //     [
        //         'title' => 'Методические указания',
        //     ],
        //     [
        //         'title' => 'Программа по ознакомительной практике',
        //     ],
        //     [
        //         'title' => 'Практикум',
        //     ],
        //     [
        //         'title' => 'Электронное издание',
        //     ],
        //     [
        //         'title' => 'Конспект лекций',
        //     ],
        //     [
        //         'title' => 'Учебно-методическое пособие',
        //     ],
        //     [
        //         'title' => 'Каталог студенческих работ',
        //     ],
        //     [
        //         'title' => 'Учебно-методический комплекс',
        //     ],
        //     [
        //         'title' => 'Монография',
        //     ],
        // ]);
    }
}

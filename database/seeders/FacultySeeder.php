<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('faculties')->insert([
            [
                'title' => 'Факультет туризма и сервиса',
                'short_title' => 'ФТС',
                'slug' => 'fts',
            ],
            [
                'title' => 'Инженерно-экономический факультет',
                'short_title' => 'ИЭФ',
                'slug' => 'ief',
            ],
            [
                'title' => 'Факультет экономики и процессов управления',
                'short_title' => 'ФЭиПУ',
                'slug' => 'feipu',
            ],
            [
                'title' => 'Социально-педагогический факультет',
                'short_title' => 'СПФ',
                'slug' => 'spf',
            ],
            [
                'title' => 'Юридический факультет',
                'short_title' => 'ЮФ',
                'slug' => 'uf',
            ],
            [
                'title' => 'Университетский экономико-технологический колледж',
                'short_title' => 'УЭТК',
                'slug' => 'college',
            ],
        ]);
    }
}

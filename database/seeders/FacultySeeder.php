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
                'title' => 'Инженерно-экологический факультет',
                'short_title' => 'ИЭФ',
                'slug' => 'ief',
            ],
            [
                'title' => 'Факультет экономики и процессов управления',
                'short_title' => 'ФЭиПУ',
                'slug' => 'feipu',
                'deleted_at' => '2022-02-01 00:00:00',
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
                'deleted_at' => '2022-02-01 00:00:00',
            ],
            [
                'title' => 'Университетский экономико-технологический колледж',
                'short_title' => 'УЭТК',
                'slug' => 'college',
            ],
            [
                'title' => 'Факультет инфомационных технологий и математики',
                'short_title' => 'ФИТиМ',
                'slug' => 'fitim',
            ],
            [
                'title' => 'Факультет информационных технологий и математики',
                'short_title' => 'ФИТиМ',
                'slug' => 'fitim',
            ],
            [
                'title' => 'Факультет экономики и права',
                'short_title' => 'ФЭиП',
                'slug' => 'feip',
            ],
            [
                'title' => '-',
                'short_title' => '-',
                'slug' => 'none',
            ],
        ]);
    }
}

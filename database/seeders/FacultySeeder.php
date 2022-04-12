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
                'id' => 1,
                'title' => 'Факультет туризма и сервиса',
                'short_title' => 'ФТС',
                'slug' => 'fts',
                'deleted_at' => null,
            ],
            [
                'id' => 2,
                'title' => 'Инженерно-экологический факультет',
                'short_title' => 'ИЭФ',
                'slug' => 'ief',
                'deleted_at' => null,
            ],
            [
                'id' => 3,
                'title' => 'Факультет экономики и процессов управления',
                'short_title' => 'ФЭиПУ',
                'slug' => 'feipu',
                'deleted_at' => '2022-02-01 00:00:00',
            ],
            [
                'id' => 4,
                'title' => 'Социально-педагогический факультет',
                'short_title' => 'СПФ',
                'slug' => 'spf',
                'deleted_at' => null,
            ],
            [
                'id' => 5,
                'title' => 'Юридический факультет',
                'short_title' => 'ЮФ',
                'slug' => 'uf',
                'deleted_at' => '2022-02-01 00:00:00',
            ],
            [
                'id' => 6,
                'title' => 'Университетский экономико-технологический колледж',
                'short_title' => 'УЭТК',
                'slug' => 'college',
                'deleted_at' => null,
            ],
            [
                'id' => 7,
                'title' => 'Факультет информационных технологий и математики',
                'short_title' => 'ФИТиМ',
                'slug' => 'fitim',
                'deleted_at' => null,
            ],
            [
                'id' => 8,
                'title' => 'Факультет экономики и права',
                'short_title' => 'ФЭиП',
                'slug' => 'feip',
                'deleted_at' => null,
            ],
            [
                'id' => 99,
                'title' => '-',
                'short_title' => '-',
                'slug' => 'none',
                'deleted_at' => null,
            ],
        ]);
    }
}

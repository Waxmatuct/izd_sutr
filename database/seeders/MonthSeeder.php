<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MonthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('months')->insert([
            [
                'name' => 'Январь',
            ],
            [
                'name' => 'Февраль',
            ],
            [
                'name' => 'Март',
            ],
            [
                'name' => 'Апрель',
            ],
            [
                'name' => 'Май',
            ],
            [
                'name' => 'Июнь',
            ],
            [
                'name' => 'Июль',
            ],
            [
                'name' => 'Август',
            ],
            [
                'name' => 'Сентябрь',
            ],
            [
                'name' => 'Октябрь',
            ],
        ]);
    }
}

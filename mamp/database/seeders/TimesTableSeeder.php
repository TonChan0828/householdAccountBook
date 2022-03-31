<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TimesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $year = 2019;
        for ($month = 1; $month <= 12; $month++) {
            $param = [
                'year' => $year,
                'month' => $month,
                'user_id' => 1,
            ];
            DB::table('times')->insert($param);
        }
        $year = 2020;
        for ($month = 1; $month <= 11; $month++) {
            $param = [
                'year' => $year,
                'month' => $month,
                'user_id' => 1,
            ];
            DB::table('times')->insert($param);
        }
        $year = 2021;
        for ($month = 1; $month <= 10; $month++) {
            $param = [
                'year' => $year,
                'month' => $month,
                'user_id' => 1,
            ];
            DB::table('times')->insert($param);
        }

        $year = 2022;
        for ($month = 1; $month <= 2; $month++) {
            $param = [
                'year' => $year,
                'month' => $month,
                'user_id' => 1,
            ];
            DB::table('times')->insert($param);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class BooksTableSeeder extends Seeder
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
            for ($i = 1; $i <= 20; $i++) {
                $param = [
                    'amount' => ($i * 100),
                    'year' => $year,
                    'month' => $month,
                    'balance' => ($i % 2),
                    'category_id' => $i,
                    'user_id' => 1,
                ];
                DB::table('books')->insert($param);
            }
        }
        $year = 2020;
        for ($month = 1; $month <= 11; $month++) {
            for ($i = 1; $i <= 18; $i++) {
                $param = [
                    'amount' => ($i * 100),
                    'year' => $year,
                    'month' => $month,
                    'balance' => ($i % 2),
                    'category_id' => $i,
                    'user_id' => 1,
                ];
                DB::table('books')->insert($param);
            }
        }
        $year = 2021;
        for ($month = 1; $month <= 10; $month++) {
            for ($i = 1; $i <= 15; $i++) {
                $param = [
                    'amount' => ($i * 100),
                    'year' => $year,
                    'month' => $month,
                    'balance' => ($i % 2),
                    'category_id' => $i,
                    'user_id' => 1,
                ];
                DB::table('books')->insert($param);
            }
        }

        $year = 2022;
        for ($month = 1; $month <= 2; $month++) {
            for ($i = 1; $i <= 10; $i++) {
                $param = [
                    'amount' => ($i * 100),
                    'year' => $year,
                    'month' => $month,
                    'balance' => ($i % 2),
                    'category_id' => $i,
                    'user_id' => 1,
                ];
                DB::table('books')->insert($param);
            }
        }
    }
}

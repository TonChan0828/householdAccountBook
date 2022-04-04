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
        $time = 1;
        $year = 2019;
        for ($month = 1; $month <= 12; $month++) {
            for ($i = 1; $i <= 20; $i++) {
                $param = [
                    'amount' => ($i * 100),
                    'balance' => ($i % 2),
                    'time_id' => $time,
                    'category_id' => $i,
                    'user_id' => 1,
                ];
                DB::table('books')->insert($param);
            }
            $time++;
        }
        $year = 2020;
        for ($month = 1; $month <= 11; $month++) {
            for ($i = 1; $i <= 18; $i++) {
                $param = [
                    'amount' => ($i * 100),
                    'balance' => ($i % 2),
                    'time_id' => $time,
                    'category_id' => $i,
                    'user_id' => 1,
                ];
                DB::table('books')->insert($param);
            }
            $time++;
        }
        $year = 2021;
        for ($month = 1; $month <= 10; $month++) {
            for ($i = 1; $i <= 15; $i++) {
                $param = [
                    'amount' => ($i * 100),
                    'balance' => ($i % 2),
                    'time_id' => $time,
                    'category_id' => $i,
                    'user_id' => 1,
                ];
                DB::table('books')->insert($param);
            }
            $time++;
        }

        $year = 2022;
        for ($month = 1; $month <= 2; $month++) {
            for ($i = 1; $i <= 10; $i++) {
                $param = [
                    'amount' => ($i * 100),
                    'balance' => ($i % 2),
                    'time_id' => $time,
                    'category_id' => $i,
                    'user_id' => 1,
                ];
                DB::table('books')->insert($param);
            }
            $time++;
        }
    }
}

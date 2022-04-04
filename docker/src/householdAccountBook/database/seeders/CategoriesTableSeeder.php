<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 20; $i++) {
            $param = [
                'name' => "カテゴリー${i}",
                'balance' => ($i % 2),
                'user_id' => 1,
            ];
            DB::table('categories')->insert($param);
        }
    }
}

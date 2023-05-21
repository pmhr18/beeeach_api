<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StoreInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('store_info')->insert([
            ['store_info' => '試飲できる'],
            ['store_info' => 'レストランがある'],
            ['store_info' => 'ショップがある'],
            ['store_info' => '工場見学ができる'],
        ]);
    }
}

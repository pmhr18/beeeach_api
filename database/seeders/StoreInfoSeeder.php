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
            ['name' => '試飲できる'],
            ['name' => 'レストランがある'],
            ['name' => 'ショップがある'],
            ['name' => '工場見学ができる'],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AbvSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('abvs')->insert([
            ['name' => '1%未満'],
            ['name' => '1.5%'],
            ['name' => '2%'],
            ['name' => '2.5%'],
            ['name' => '3%'],
            ['name' => '3.5%'],
            ['name' => '4%'],
            ['name' => '4.5%'],
            ['name' => '5%'],
            ['name' => '5.5%'],
            ['name' => '6%'],
            ['name' => '6.5%'],
            ['name' => '7%'],
            ['name' => '7.5%'],
            ['name' => '8%'],
            ['name' => '8.5%'],
            ['name' => '9%'],
            ['name' => '9.5%'],
            ['name' => '10%以上'],
        ]);
    }
}

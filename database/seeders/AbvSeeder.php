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
            ['num' => '1%未満'],
            ['num' => '1.5%'],
            ['num' => '2%'],
            ['num' => '2.5%'],
            ['num' => '3%'],
            ['num' => '3.5%'],
            ['num' => '4%'],
            ['num' => '4.5%'],
            ['num' => '5%'],
            ['num' => '5.5%'],
            ['num' => '6%'],
            ['num' => '6.5%'],
            ['num' => '7%'],
            ['num' => '7.5%'],
            ['num' => '8%'],
            ['num' => '8.5%'],
            ['num' => '9%'],
            ['num' => '9.5%'],
            ['num' => '10%以上'],
        ]);
    }
}

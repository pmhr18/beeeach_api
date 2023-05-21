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
            ['num' => '2%'],
            ['num' => '3%'],
            ['num' => '4%'],
            ['num' => '5%'],
            ['num' => '6%'],
            ['num' => '7%'],
            ['num' => '8%'],
            ['num' => '9%'],
            ['num' => '10%以上'],
        ]);
    }
}

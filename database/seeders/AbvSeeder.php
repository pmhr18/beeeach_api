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
            ['abv' => ''],
            ['abv' => ''],
            ['abv' => ''],
            ['abv' => ''],
            ['abv' => ''],
            ['abv' => ''],
            ['abv' => ''],
            ['abv' => ''],
            ['abv' => ''],
            ['abv' => ''],
            ['abv' => ''],
            ['abv' => ''],
            ['abv' => ''],
            ['abv' => ''],
            ['abv' => ''],
            ['abv' => '']
        ]);
    }
}

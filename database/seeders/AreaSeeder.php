<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('areas')->insert([
            ['id' => 1, 'name' => '東アジア'],
            ['id' => 2, 'name' => 'アジア・太平洋'],
            ['id' => 3, 'name' => '中東'],
            ['id' => 4, 'name' => 'ヨーロッパ'],
            ['id' => 5, 'name' => 'アフリカ'],
            ['id' => 6, 'name' => 'アメリカ・カリブ海'],
        ]);
    }
}

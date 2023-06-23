<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('colors')->insert([
            ['name' => 'ライトストロー'],
            ['name' => 'ペールイエロー'],
            ['name' => 'ゴールデン'],
            ['name' => 'アンバー'],
            ['name' => 'レッド'],
            ['name' => 'ブラウン'],
            ['name' => 'ダークブラウン'],
            ['name' => 'ブラック'],
            ['name' => 'その他'],
        ]);
    }
}

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
            ['color' => 'ライトストロー'],
            ['color' => 'ペールイエロー'],
            ['color' => 'ゴールデン'],
            ['color' => 'アンバー'],
            ['color' => 'レッド'],
            ['color' => 'ブラウン'],
            ['color' => 'ダークブラウン'],
            ['color' => 'ブラック'],
            ['color' => 'その他'],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StyleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('styles')->insert([
            ['name' => 'ラガー'],
            ['name' => 'エール'],
            ['name' => 'IPA'],
            ['name' => 'スタウト'],
            ['name' => 'ポーター'],
            ['name' => 'ヴァイツェン'],
            ['name' => 'ラムビック'],
            ['name' => 'サワー'],
            ['name' => 'ペールエール'],
            ['name' => 'ブラウンエール'],
            ['name' => 'ベルジャンエール'],
            ['name' => 'ペールラガー'],
            ['name' => 'ドッペルボック'],
            ['name' => 'ヘフェヴァイツェン'],
            ['name' => 'ライトビール'],
            ['name' => 'ブレットビール'],
            ['name' => 'ビタービール'],
            ['name' => 'クリスタルワイツェン'],
            ['name' => 'スコッチエール'],
            ['name' => 'バーレイワイン'],
            ['name' => 'サイダー'],
            ['name' => 'ピルスナー'],
            ['name' => 'サイゾン'],
            ['name' => 'インペリアルスタウト'],
            ['name' => 'マイボック'],
            ['name' => 'クリームエール'],
            ['name' => 'ゴーズ'],
            ['name' => 'クエンチエール'],
            ['name' => 'グーズ'],
            ['name' => 'ドラフトビール'],
            ['name' => 'ビアガーデン'],
            ['name' => 'ヘルス'],
            ['name' => 'ウィートビール'],
            ['name' => 'ポートワインエール'],
        ]);
    }
}
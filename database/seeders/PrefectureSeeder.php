<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrefectureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prefectures')->insert([
            ['name' => '北海道', 'country_id' => 1, 'region_id' => 1],
            ['name' => '青森県', 'country_id' => 1, 'region_id' => 1],
            ['name' => '岩手県', 'country_id' => 1, 'region_id' => 1],
            ['name' => '宮城県', 'country_id' => 1, 'region_id' => 1],
            ['name' => '秋田県', 'country_id' => 1, 'region_id' => 1],
            ['name' => '山形県', 'country_id' => 1, 'region_id' => 1],
            ['name' => '福島県', 'country_id' => 1, 'region_id' => 1],
            ['name' => '茨城県', 'country_id' => 1, 'region_id' => 2],
            ['name' => '栃木県', 'country_id' => 1, 'region_id' => 2],
            ['name' => '群馬県', 'country_id' => 1, 'region_id' => 2],
            ['name' => '埼玉県', 'country_id' => 1, 'region_id' => 2],
            ['name' => '千葉県', 'country_id' => 1, 'region_id' => 2],
            ['name' => '東京都', 'country_id' => 1, 'region_id' => 2],
            ['name' => '神奈川県', 'country_id' => 1, 'region_id' => 2],
            ['name' => '新潟県', 'country_id' => 1, 'region_id' => 3],
            ['name' => '富山県', 'country_id' => 1, 'region_id' => 3],
            ['name' => '石川県', 'country_id' => 1, 'region_id' => 3],
            ['name' => '福井県', 'country_id' => 1, 'region_id' => 3],
            ['name' => '山梨県', 'country_id' => 1, 'region_id' => 3],
            ['name' => '長野県', 'country_id' => 1, 'region_id' => 3],
            ['name' => '岐阜県', 'country_id' => 1, 'region_id' => 3],
            ['name' => '静岡県', 'country_id' => 1, 'region_id' => 3],
            ['name' => '愛知県', 'country_id' => 1, 'region_id' => 3],
            ['name' => '三重県', 'country_id' => 1, 'region_id' => 4],
            ['name' => '滋賀県', 'country_id' => 1, 'region_id' => 4],
            ['name' => '京都府', 'country_id' => 1, 'region_id' => 4],
            ['name' => '大阪府', 'country_id' => 1, 'region_id' => 4],
            ['name' => '兵庫県', 'country_id' => 1, 'region_id' => 4],
            ['name' => '奈良県', 'country_id' => 1, 'region_id' => 4],
            ['name' => '和歌山県', 'country_id' => 1, 'region_id' => 4],
            ['name' => '鳥取県', 'country_id' => 1, 'region_id' => 5],
            ['name' => '島根県', 'country_id' => 1, 'region_id' => 5],
            ['name' => '岡山県', 'country_id' => 1, 'region_id' => 5],
            ['name' => '広島県', 'country_id' => 1, 'region_id' => 5],
            ['name' => '山口県', 'country_id' => 1, 'region_id' => 5],
            ['name' => '徳島県', 'country_id' => 1, 'region_id' => 6],
            ['name' => '香川県', 'country_id' => 1, 'region_id' => 6],
            ['name' => '愛媛県', 'country_id' => 1, 'region_id' => 6],
            ['name' => '高知県', 'country_id' => 1, 'region_id' => 6],
            ['name' => '福岡県', 'country_id' => 1, 'region_id' => 7],
            ['name' => '佐賀県', 'country_id' => 1, 'region_id' => 7],
            ['name' => '長崎県', 'country_id' => 1, 'region_id' => 7],
            ['name' => '熊本県', 'country_id' => 1, 'region_id' => 7],
            ['name' => '大分県', 'country_id' => 1, 'region_id' => 7],
            ['name' => '宮崎県', 'country_id' => 1, 'region_id' => 7],
            ['name' => '鹿児島県', 'country_id' => 1, 'region_id' => 7],
            ['name' => '沖縄県', 'country_id' => 1, 'region_id' => 7]
        ]);
    }
}

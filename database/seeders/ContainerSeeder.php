<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContainerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('containers')->insert([
            ['name' => '缶(350)'],
            ['name' => '缶(500)'],
            ['name' => '缶(その他)'],
            ['name' => '小瓶'],
            ['name' => '中瓶'],
            ['name' => '大瓶'],
            ['name' => '家庭用サーバー'],
            ['name' => '業務用サーバー'],
            ['name' => '量り売り'],
            ['name' => 'ペットボトル'],
            ['name' => 'その他'],
        ]);
    }
}

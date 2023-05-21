<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TasteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tastes')->insert([
            ['taste' => '麦感'],
            ['taste' => 'コクがある'],
            ['taste' => '甘味'],
            ['taste' => '苦味'],
            ['taste' => 'まろやか'],
            ['taste' => '酸味'],
            ['taste' => '後味すっきり'],
            ['taste' => '軽やか'],
            ['taste' => 'さわやか'],
            ['taste' => 'さっぱり'],
            ['taste' => '飲みやすい'],
            ['taste' => 'バランス型'],
            ['taste' => '旨い'],
            ['taste' => '香りが立つ'],
            ['taste' => '芳醇'],
            ['taste' => 'フルーティ'],
            ['taste' => 'フローラル'],
            ['taste' => '滑らか'],
            ['taste' => '余韻がある'],
            ['taste' => '口当たりが軽い'],
            ['taste' => 'キレが良い'],
            ['taste' => '個性的'],
            ['taste' => 'のどごし'],
            ['taste' => '柔らかい'],
            ['taste' => 'コーヒーのような']
        ]);
    }
}
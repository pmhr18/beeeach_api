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
            ['name' => '麦感'],
            ['name' => 'コクがある'],
            ['name' => '甘味'],
            ['name' => '苦味'],
            ['name' => 'まろやか'],
            ['name' => '酸味'],
            ['name' => '後味すっきり'],
            ['name' => '軽やか'],
            ['name' => 'さわやか'],
            ['name' => 'さっぱり'],
            ['name' => '飲みやすい'],
            ['name' => 'バランス型'],
            ['name' => '旨い'],
            ['name' => '香りが立つ'],
            ['name' => '芳醇'],
            ['name' => 'フルーティ'],
            ['name' => 'フローラル'],
            ['name' => '滑らか'],
            ['name' => '余韻がある'],
            ['name' => '口当たりが軽い'],
            ['name' => 'キレが良い'],
            ['name' => '個性的'],
            ['name' => 'のどごし'],
            ['name' => '柔らかい'],
            ['name' => 'コーヒーのような']
        ]);
    }
}
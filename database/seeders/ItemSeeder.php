<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            ['user_id' => 991, 'name' => 'よなよなエール', 'brewery_id' => 114, 'country_id' => 1, 'prefecture_id' => 20, 'type_id' =>  1, 'abv_id' => 10, 'created_at' => date('Y-m-t'), 'updated_at' => date('Y-m-t')],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AreaSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(RegionSeeder::class);
        $this->call(PrefectureSeeder::class);
        $this->call(TasteSeeder::class);
        $this->call(ContainerSeeder::class);
        $this->call(StyleSeeder::class);
        $this->call(ColorSeeder::class);
        $this->call(AbvSeeder::class);
        $this->call(StoreInfoSeeder::class);
        $this->call(BrewerySeeder::class);
    }
}

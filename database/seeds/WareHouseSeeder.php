<?php

use App\WareHouse;
use Illuminate\Database\Seeder;

class WareHouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(WareHouse::class , rand(2,3))->create();
    }
}

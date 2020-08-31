<?php

use App\Customer;
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
        $this->call(UserSeeder::class);

        // Cek jika Program Sudah Berada di prioduction jangan run 
        // Seeder nya
        if (env('APP_ENV') == 'local') {
            $this->call(CustomerSeeder::class);
            $this->call(PlantSeeder::class);
            $this->call(UnitSeeder::class);
        }
    }
}

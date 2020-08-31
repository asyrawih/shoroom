<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = collect([
            ['name' => 'hanan', 'email' => 'hasyrawi@gmail.com'],
            ['name' => 'tony', 'email' => 'tony@gmail.com'],
        ]);

        $admin->each(function ($user) {
            factory(User::class)->create([
                'name'      => $user['name'],
                'email'     => $user['email']
            ]);
        });
    }
}

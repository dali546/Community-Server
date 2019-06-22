<?php

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        User::truncate();

        $faker = Factory::create();
        $password = bcrypt('secret');

        User::create([
            'username' => $faker->userName,
            'email' => 'test@tester.com',
            'password' => $faker->password,
        ]);

        for ($i = 0; $i < 20; $i++) {
            User::create([
                'username' => $faker->userName,
                'email' => $faker->email,
                'password' => $faker->password,
            ]);
        }
    }
}

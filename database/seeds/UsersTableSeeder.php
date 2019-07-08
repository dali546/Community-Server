<?php

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        User::truncate();
        $faker = Factory::create();

        User::create([
            'username' => "test",
            'email' => 'test@tester.com',
            'password' => Hash::make('secret'),
        ]);

        for ($i = 0; $i < 20; $i++) {
            User::create([
                'username' => $faker->userName,
                'email' => $faker->email,
                'password' => Hash::make($faker->password),
            ]);
        }
    }
}

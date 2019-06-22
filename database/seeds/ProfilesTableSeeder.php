<?php

use App\Models\Profile;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ProfilesTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        Profile::truncate();
        Profile::unguard();

        $faker = Factory::create();

        User::all()->each(function ($user) use ($faker) {
            foreach (range(1, 5) as $i) {
                Profile::create([
                    'user_id' => $user->id,
                    'forename' => $faker->firstName,
                    'surname' => $faker->lastName,
                    'birthday' => $faker->date(),
                    'gender' => "M",
                ]);
            }
        });
    }
}

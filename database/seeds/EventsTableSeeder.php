<?php

use App\Models\Event;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::truncate();
        Event::unguard();

        $faker = Factory::create();

        User::all()->each(function ($user) use ($faker) {
            foreach (range(1, 5) as $i) {
                Event::create([
                    'user_id' => $user->id,
                    'title'   => $faker->sentence,
                    'description' => $faker->paragraphs(3, true),
                ]);
            }
        });
    }
}

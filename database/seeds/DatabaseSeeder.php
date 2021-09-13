<?php

use Illuminate\Database\Seeder;

// Import DB and Faker services
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
   public function run()
    {
        $faker = Faker::create();

        foreach (range(1,500) as $index) {
            DB::table('coronas')->insert([
                'country_name' => $faker->country_name,
                'symptoms' => $faker->symptoms,
                'cases' => $faker->cases,
                'sex' => $faker->sex,
                'color' => $faker->color,
                'image' => $faker->image
            ]);
        }
    }
}

<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1, 50) as $index) {
            DB::table('user')->insert([
                'firstName' => $faker->firstName,
                'lastName' => $faker->lastName,
                'dob' => $faker->dateTimeBetween($startDate = '-30 years', $endDate = '-20 years')
            ]);
        }
    }
}

<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class test extends Seeder
{
    /**
     * Run the database seeds using Faker to generate random data
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1, 50) as $index) {
            DB::table('test')->insert([
                'username' => $faker->username,
                'pass' => $faker->password,
                'created_at' => $faker->dateTimeThisMonth,
            ]);
        }
    }
}

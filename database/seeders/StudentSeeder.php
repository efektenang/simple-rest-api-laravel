<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        DB::table("students")->insert([
            "name" => $faker->name(),
            "email" => $faker->safeEmail,
            "age" => $faker->numberBetween(25, 50),
            "phone" => $faker->phoneNumber,
        ]);
    }
}

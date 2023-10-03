<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;


class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 30) as $index) {
            DB::table('persons')->insert([
                'name' => $faker->name,
                'surname' => $faker->lastName,
                'father_name' => $faker->firstNameMale,
                'email' => $faker->email,
                'company_id' => $faker->numberBetween(1, 30),
                'fax' => $faker->phoneNumber, 
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

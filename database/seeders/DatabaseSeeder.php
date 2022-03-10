<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $faker = Faker::create();
        foreach (range(1, 10) as $index) {
            DB::table('projects')->insert([
                'name' => $faker->regexify('[A-Za-z0-9]{20}'),
                'customer' => $faker->name,
                'value' => $faker->randomElement([1000000, 2000000, 3000000]),
                'start_date' => $faker->dateTimeBetween('-6 month', 'now'),
                'end_date' => $faker->dateTimeBetween('now', '+2 month'),
                'sla' => $faker->randomElement([1, 2, 3]),
                'status' => $faker->randomElement(['active', 'expired']),
                'created_at' => $faker->dateTimeBetween('-2 month', '+1 month')
            ]);
        }
    }
}

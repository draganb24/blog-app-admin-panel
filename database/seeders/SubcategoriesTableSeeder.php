<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SubcategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 5; $i++) {
            DB::table('subcategories')->insert([
                'name' => $faker->word,
                'slug' => $faker->slug,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

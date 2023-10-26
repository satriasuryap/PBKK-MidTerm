<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as FakerFactory;

class ItemsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = FakerFactory::create();

        // Define the number of fake items you want to create
        $numberOfItems = 5;

        for ($i = 0; $i < $numberOfItems; $i++) {
            DB::table('items')->insert([
                'item_name' => $faker->word,
                'item_type' => $faker->word,
                'item_condition' => $faker->word,
                'description' => $faker->sentence,
                'defects' => $faker->optional()->paragraph,
                'quantity' => $faker->numberBetween(1, 100),
                'images' => json_encode([$faker->image('public/storage/item_images', 400, 300, null, false)]),
            ]);
        }
    }
}

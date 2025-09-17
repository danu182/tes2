<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;

class ItemtTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $faker = Factory::create('id_ID');

        for ($i = 0; $i < 200; $i++) {
            Item::create([
                'itemName' => $faker->word(),
                
                'description'=> $faker->sentence(),
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;

class SupplierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create('id_ID');

        for ($i = 0; $i < 250; $i++) {
            Supplier::create([
                // 'name' => $faker->sentence(3),
                // 'description' => $faker->paragraph(2),
                // 'price' => $faker->randomFloat(2, 10000, 100000),

                'nameSupplier' => $faker->company(), 
                'contact_person' => $faker->name(), 
                'phone' => $faker->name(),
                'email'=>$faker->email(), 
                'address'=>$faker->address(),
                'description'=>$faker->paragraph(2),
            ]);
        }
    }
}

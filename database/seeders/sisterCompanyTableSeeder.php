<?php

namespace Database\Seeders;

use App\Models\SisterCompany;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class sisterCompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create('id_ID');

        for ($i = 0; $i < 10000; $i++) {
            SisterCompany::create([
                // 'name' => $faker->sentence(3),
                // 'description' => $faker->paragraph(2),
                // 'price' => $faker->randomFloat(2, 10000, 100000),

                'code'=>$faker->bothify('SC-####-????'),
                'name'=> $faker->company(),
                'picUser'=>$faker->name(),
                'tlp'=>$faker->phoneNumber(),
                'email'=>$faker->email(),
                'address'=>$faker->address(),
                'description'=> $faker->paragraph(1),
            ]);
        }
    }
}

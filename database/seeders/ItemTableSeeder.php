<?php

namespace Database\Seeders;

use App\Models\CategoryItem;
use App\Models\Item;
use App\Models\TipeItem;
use App\Models\Uom;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create('id_ID');

        // Ambil semua ID dari tabel relasi untuk memastikan foreign key valid
        $categoryItemIds = CategoryItem::pluck('id')->toArray();
        $tipeItemIds = TipeItem::pluck('id')->toArray();
        $uomIds = Uom::pluck('id')->toArray();

        for ($i = 0; $i < 100; $i++) {
            Item::create([
                'kodeItem' => $faker->bothify('IT-####-????'),
                'nameItem' => $faker->word(3),

                'categoryItem_id' => $faker->randomElement($categoryItemIds),
                'tipeItem_id' => $faker->randomElement($tipeItemIds),
                'uom_id' => $faker->randomElement($uomIds),
                'barcode' => $faker->optional()->ean13(),       // Barcode, opsional (bisa NULL)
                'foto' => $faker->optional()->imageUrl(640, 480, 'items', true), // URL Gambar, opsional
                'merek' => $faker->company(),                 // Nama Perusahaan sebagai Merek
                'seri' => $faker->bothify('SRI-#####'),

                'description' => $faker->paragraph(1),


            ]);
        }
    }
}

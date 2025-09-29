<?php

namespace Database\Seeders;

use App\Models\CategoryItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
    protected $categoryItem=[
        [	 'codeCategory' 	=>	'ATK', 'nameCategory'=> 'Alat Tulis Kantor', 'description' => 'Alat Tulis Kantor'],
        [	 'codeCategory' 	=>	'MKN', 'nameCategory'=>   'Makanan', 'description' => 'Makanan'],
        [	 'codeCategory' 	=>	'MNM', 'nameCategory'=> 'Minumnan', 'description' => 'Minuman'], 
        [	 'codeCategory' 	=>	'PC', 'nameCategory'=> 'Komputer', 'description' => 'komputer'], 
        
    ];



    public function run(): void
    {
        CategoryItem::insert($this->categoryItem);
    }
}

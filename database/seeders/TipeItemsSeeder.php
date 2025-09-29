<?php

namespace Database\Seeders;

use App\Models\TipeItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipeItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    protected $tipeItem=[
        [	 'kodeTipe' 	=> 'STOK' , 'nameTipe' 	=>	'Persediaan', 'description' => 'barang bisa dui setok'],
        [	 'kodeTipe' 	=> 'NON STOK' , 'nameTipe' 	=>	'Non Persediaan', 'description' => 'barang yang tidak bisa di stok'],
        [	 'kodeTipe' 	=> 'JASA' , 'nameTipe' 	=>	'Jasa', 'description' => 'semua yang berhubungan dengna sJasa'],
        [	 'kodeTipe' 	=> 'ASSET' , 'nameTipe' 	=>	'Asset', 'description' => 'semua barang yang masuk dalam kategori barang asset'],
        

    ];



    public function run(): void
    {
        TipeItem::insert($this->tipeItem);
    }


}

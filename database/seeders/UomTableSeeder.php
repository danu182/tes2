<?php

namespace Database\Seeders;

use App\Models\Uom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     protected $uom=[
        [	 'kodeUom' 	=>	'pc',  'nameUom'=>'pcs' ,  'description' => 'pcd'],
        [	 'kodeUom' 	=>	'unit',  'nameUom'=>'Unit' ,  'description' => 'unit'],
        [	 'kodeUom' 	=>	'box',  'nameUom'=>'Box' ,  'description' => 'box'],
        [	 'kodeUom' 	=>	'gr',  'nameUom'=>'Gram' ,  'description' => 'gram'],
        [	 'kodeUom' 	=>	'btl',  'nameUom'=>'Botol' ,  'description' => 'botol'],
        

    ];



    public function run(): void
    {
        Uom::insert($this->uom);
    }
}

<?php

namespace Database\Seeders;

use App\Models\StatusApproval;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusApprovalTabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statusApproval = [
            ['nameApproval'=>'pending','description'=>'menunggu'],
            ['nameApproval'=>'approved_by_manager','description'=>'disetujui oleh atas'],
            ['nameApproval'=>'rejected','description'=>'ditolak'],
            ['nameApproval'=>'completed','description'=>'selesai'],
        ];


        StatusApproval::insert($statusApproval);
    }
}

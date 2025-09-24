<?php
namespace App\Helpers;

use App\Models\PurchaseRequisitions;
use DateTime;
use Illuminate\Support\Str;

class Helpers{

    public static function formatDate($format = 'Y-m-d')
    {
        $date = new DateTime();
        return $date->format($format);

    }



    public static function NoOtomatis($format = 'Ymd')
    {
        // $today = Carbon::today()->format('Ymd');

        // format tanggal menjadi Ymd
        $date = new DateTime();
        $formatDate = $date->format($format);
        // gabung kode dan dormat atnggal menjadi TR-Ymd-
        $prefix = 'TR-' . $formatDate . '-';
        
        // Cari nomor transaksi terakhir untuk hari ini
        $lastTransaksi = PurchaseRequisitions::withTrashed()
                                ->where('pr_no', 'like', $prefix . '%')
                                // ->where('deleted_at', )
                                 ->orderBy('pr_no', 'desc')
                                 ->first();
        // variabel awal
        $nomorUrut = 1;

        if ($lastTransaksi) {
            $lastNomor = substr($lastTransaksi->pr_no, -4); // Ambil 4 digit terakhir
            $nomorUrut = (int)$lastNomor + 1;  // anga terakhir di tambah 1
        }

         // Format nomor urut menjadi 4 digit (misal: 0001, 0002)
        $newNomorUrut = str_pad($nomorUrut, 4, '0', STR_PAD_LEFT);

        return $prefix . $newNomorUrut;
        
    }

}
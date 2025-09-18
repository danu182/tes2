<?php
namespace App\Helpers;

use DateTime;
use Illuminate\Support\Str;

class Helpers{

    public static function formatDate($format = 'Y-m-d')
    {
        $date = new DateTime();
        return $date->format($format);

    }



    public function NoOtomatis()
    {
        // Mendapatkan tanggal hari ini dalam format YYYYMMDD
        $date = now()->format('Ymd');
        
        // Menambahkan prefix dan string acak untuk memastikan keunikan
        $randomString = Str::random(8); 
        
        // Menggabungkan semua komponen
        $transactionNumber = "TRX-{$date}-{$randomString}";
        
        return $transactionNumber;
        // Mengisi kolom transaction_number pada model sebelum disimpan
        // $transaction->transaction_number = $transactionNumber;
    }

}
<?php

use App\Http\Controllers\SisterCompanyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::resource('sister-company', SisterCompanyController::class);
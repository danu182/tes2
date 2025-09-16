<?php

use App\Http\Controllers\SisterCompanyController;
use App\Http\Controllers\StatusApprovalController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::resource('sister-company', SisterCompanyController::class);
Route::resource('status-approval', StatusApprovalController::class);
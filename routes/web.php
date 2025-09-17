<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\SisterCompanyController;
use App\Http\Controllers\StatusApprovalController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard.backend.main-page.app');
});



Route::resource('sister-company', SisterCompanyController::class);
Route::resource('status-approval', StatusApprovalController::class);
Route::resource('supplier', SupplierController::class);
Route::resource('item', ItemController::class);






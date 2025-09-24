<?php

use App\Http\Controllers\CategoryItemController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PurchaseRequisitionsController;
use App\Http\Controllers\SisterCompanyController;
use App\Http\Controllers\StatusApprovalController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard.backend.main-page.app');
});


// master
Route::resource('sister-company', SisterCompanyController::class);
Route::resource('status-approval', StatusApprovalController::class);
Route::resource('supplier', SupplierController::class);
Route::resource('item', ItemController::class);
Route::resource('category_item', CategoryItemController::class);


// transaksi
Route::resource('pr', PurchaseRequisitionsController::class);


 Route::get('tes', [TestController::class, 'tes']);
 Route::get('autocomplete', [TestController::class, 'autocomplete'])->name('autocomplete');;
 Route::get('autocompleteSupplier', [TestController::class, 'autocompleteSupplier'])->name('autocompleteSupplier');;






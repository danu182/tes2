<?php

use App\Http\Controllers\CategoryItemController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PurchaseRequisitionsController;
use App\Http\Controllers\SisterCompanyController;
use App\Http\Controllers\StatusApprovalController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TipeItemController;
use App\Http\Controllers\UomController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard.backend.main-page.app');
});


// master
Route::resource('sister-company', SisterCompanyController::class);
Route::resource('status-approval', StatusApprovalController::class);
Route::resource('supplier', SupplierController::class);
Route::resource('category_item', CategoryItemController::class);
Route::resource('uom', UomController::class);
Route::resource('tipe-item', TipeItemController::class);
Route::resource('item', ItemController::class);


// transaksi
Route::resource('pr', PurchaseRequisitionsController::class);

// untuk select2
 Route::get('tes', [TestController::class, 'tes']);
 Route::get('autocomplete', [TestController::class, 'autocomplete'])->name('autocomplete');;
 Route::get('autocompleteSupplier', [TestController::class, 'autocompleteSupplier'])->name('autocompleteSupplier');
 Route::get('autocompleteCategory', [TestController::class, 'autocompleteCategory'])->name('autocompleteCategory');
 Route::get('autocompleteTipeItem', [TestController::class, 'autocompleteTipeItem'])->name('autocompleteTipeItem');
 Route::get('autocompleteUom', [TestController::class, 'autocompleteUom'])->name('autocompleteUom');






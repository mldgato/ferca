<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\admin\SupplierController;

Route::get('', [HomeController::class, 'index'])->name('admin.index');

Route::resource('suppliers', SupplierController::class)->names('admin.stocktaking.suppliers');
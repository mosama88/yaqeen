<?php

use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\AdminPanelSettingController;
use App\Http\Controllers\Dashboard\TreasuryController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth:admin', 'verified'])->group(function () {


    //لوحة التحكم
    Route::get('/index', [HomeController::class, 'index'])->name('index');
    //اعدادات الشركة
    Route::get('/admin-panel-settings', [AdminPanelSettingController::class, 'index'])->name('admin-panel-settings.index');
    Route::get('/admin-panel-settings/{adminPanelSetting}', [AdminPanelSettingController::class, 'edit'])->name('admin-panel-settings.edit');
    Route::put('/admin-panel-settings/{adminPanelSetting}', [AdminPanelSettingController::class, 'update'])->name('admin-panel-settings.update');

    //الخزائن
    Route::resource('treasuries', TreasuryController::class);
    Route::delete('/treasury_deliveries/{id}', [TreasuryController::class, 'destroy_treasury_deliveries'])->name('treasury_deliveries.destroy');
    Route::post('/treasury_deliveries/{id}', [TreasuryController::class, 'store_treasury_deliveries'])->name('treasury_deliveries.store');


    Route::get('/profile', [AdminProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [AdminProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [AdminProfileController::class, 'destroy'])->name('profile.destroy');
});
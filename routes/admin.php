<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\AdminPanelSettingController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth:admin', 'verified'])->group(function () {


    //لوحة التحكم
    Route::get('/index', [HomeController::class, 'index'])->name('index');
    Route::get('/admin-panel-settings', [AdminPanelSettingController::class, 'index'])->name('admin-panel-settings.index');
    Route::get('/admin-panel-settings/{adminPanelSetting}', [AdminPanelSettingController::class, 'edit'])->name('admin-panel-settings.edit');
    Route::put('/admin-panel-settings/{adminPanelSetting}', [AdminPanelSettingController::class, 'update'])->name('admin-panel-settings.update');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

<?php

use App\Filament\Pages\CustomPage;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\InvoiceController;
use Illuminate\Support\Facades\Route;


// أو مجموعة routes
Route::prefix('settings')->group(function () {
    Route::post('/add_general', [GeneralController::class,'add_general'])->name('settings.generral.add');
    Route::post('/upload_file', [GeneralController::class,'upload_file'])->name('upload.temp.file');

    
});

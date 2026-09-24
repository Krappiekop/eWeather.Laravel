<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeerController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/actueel', [WeerController::class, 'actueel'])->name('actueel');
Route::get('/geschiedenis', [WeerController::class, 'geschiedenis'])->name('geschiedenis');

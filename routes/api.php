<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SystemController;

Route::prefix('system')->group(function () {
    Route::get('/status', [SystemController::class, 'status']);
    Route::get('/logs', [SystemController::class, 'logs']);
    /*Laravel Artisan*/
    Route::post('/artisan', [SystemController::class, 'artisan']);
    /* Composer*/
    Route::post('/composer', [SystemController::class, 'composer']);
});

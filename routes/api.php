<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SystemController;

Route::prefix('system')->group(function () {

    Route::get('/status', [SystemController::class, 'status']);
});

<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrumeLabsController;

Route::prefix('trumelabs')->group(function () {
    Route::post('/user', [TrumeLabsController::class, 'createUser']);
    Route::patch('/user/{id}', [TrumeLabsController::class, 'updateUser']);
    Route::get('/user', [TrumeLabsController::class, 'getUser']);

    Route::get('/unregistered-kits', [TrumeLabsController::class, 'getUnregisteredKits']);
    Route::post('/kits/{barcode}/register', [TrumeLabsController::class, 'registerKit']);
    Route::patch('/kits/{barcode}', [TrumeLabsController::class, 'updateKit']);

    Route::get('/results', [TrumeLabsController::class, 'getResults']);

    // staging-only
    Route::post('/generate-kits', [TrumeLabsController::class, 'generateKit']);
    Route::post('/mock-kit-result', [TrumeLabsController::class, 'mockKitResult']);
});
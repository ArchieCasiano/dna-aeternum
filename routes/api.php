<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrumeLabsController;

Route::post('/trumelabs/user', [TrumeLabsController::class, 'createUser']);
Route::post('/trumelabs/kit', [TrumeLabsController::class, 'registerKit']);
Route::get('/trumelabs/results/{kitId}', [TrumeLabsController::class, 'getResults']);



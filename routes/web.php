<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', fn() => view('auth.login'))->name('login');
Route::view('/register', 'auth.register')->name('register');
Route::view('/users', 'dashboard.users')->name('users');
Route::view('/kits', 'dashboard.kits')->name('kits');
Route::view('/settings', 'dashboard.settings')->name('settings');
Route::view('/dashboard', 'dashboard.index')->name('dashboard');

Route::post('/login', function () {
    return redirect()->route('dashboard');
});
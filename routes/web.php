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
// Route::view('/users', 'dashboard.users')->name('users');
Route::view('/kits', 'dashboard.kits')->name('kits');
Route::view('/settings', 'dashboard.settings')->name('settings');
Route::view('/dashboard', 'dashboard.index')->name('dashboard');

Route::post('/login', function () {
    return redirect()->route('dashboard');
});

Route::post('/users', function () {
    return redirect()->route('users');
})->name('users.store');
Route::put('/users/{id}', function ($id) {
    return redirect()->route('users')->with('success', 'User updated (fake).');
})->name('users.update');


Route::view('/users', 'dashboard.users', [
    'users' => [
        (object) [
            'id' => 1,
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'date_of_birth' => '1994-06-17',
            'allow_trume_login' => false,
            'biological_sex' => 'Male',
            'gender' => 'Male',
            'country' => 'United States Of America',
            'ethnicity' => 'White'
        ],
        (object) [
            'id' => 2,
            'first_name' => 'Jane',
            'last_name' => 'Smith',
            'email' => 'jane@example.com',
            'date_of_birth' => '1992-03-25',
            'allow_trume_login' => true,
            'biological_sex' => 'Female',
            'gender' => 'Female',
            'country' => 'Canada',
            'ethnicity' => 'Asian'
        ]
    ]
])->name('users');
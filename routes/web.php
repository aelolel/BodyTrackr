<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserDataController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\SportsController;
use App\Http\Controllers\HistoryController;

Route::get('/get-user-data', [UserDataController::class, 'getUserData'])->name('get.user.data');
Route::post('/save-user-data', [UserDataController::class, 'saveData'])->name('save.user.data');

Route::post('/store-food-data', [UserDataController::class, 'storeFoodData'])->name('storeFoodData');
Route::post('/store-exercise-data', [UserDataController::class, 'storeExerciseData'])->name('storeExerciseData');
Route::get('/history', [UserDataController::class, 'showHistory'])->name('history');

// Rute yang hanya bisa diakses oleh pengguna yang sudah login (auth)
Route::middleware('auth')->group(function () {
    // Rute Dashboard Admin, hanya bisa diakses oleh admin
    Route::get('/dashboard-admin', [AdminController::class, 'index'])->name('dashboard-admin');

    Route::get('/history', [HistoryController::class, 'index'])->name('history');
    
    // Rute CRUD untuk turnamen
    Route::post('/create-tournament', [AdminController::class, 'createTournament'])->name('create-tournament');
    Route::put('/update-tournament/{index}', [AdminController::class, 'updateTournament'])->name('update-tournament');
    Route::delete('/delete-tournament/{index}', [AdminController::class, 'deleteTournament'])->name('delete-tournament');
    
    // Rute Dashboard User
    Route::get('/home', [UserController::class, 'index'])->name('home');
    
    // CRUD untuk item
    Route::post('/create-item', [UserController::class, 'createItem'])->name('create-item');
    Route::put('/update-item/{index}', [UserController::class, 'updateItem'])->name('update-item');
    Route::delete('/delete-item/{index}', [UserController::class, 'deleteItem'])->name('delete-item');
    
    // Rute logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

// Rute yang hanya bisa diakses oleh pengguna yang belum login (guest)
Route::middleware('guest')->group(function () {
    // Halaman login
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    
    // Halaman register
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('register');
});

// Rute untuk halaman Profile Settings
Route::middleware('auth')->get('/profile-settings', [UserController::class, 'profileSettings'])->name('profile-settings');
Route::middleware('auth')->post('/profile-settings', [UserController::class, 'updateProfile'])->name('update-profile');

Route::get('/', function () { return view('index');});
// Rute untuk halaman Home
Route::middleware('auth')->get('/home', [UserController::class, 'index'])->name('home');

// Rute untuk halaman Food
Route::get('/food', [FoodController::class, 'index'])->name('food');

// Rute untuk halaman Sports
Route::get('/sports', [SportsController::class, 'index'])->name('sports');

Route::post('/api/history/add-food', [HistoryController::class, 'addFood'])->name('history.addFood')->middleware('auth');

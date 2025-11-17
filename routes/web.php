<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
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

    Route::get('/',function(){
        return view('index');
    })->name('homepage');

    Route::get('/loginpage',[AuthController::class,'showLoginForm'])->name('loginpage');
    Route::get('/registerpage',[AuthController::class,'showRegisterForm'])->name('registerpage');

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/home',[AuthController::class,'home']);
        // Route::get('/add-item',[AuthController::class,'create'])->name('items.create');
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->middleware(['auth', 'verified'])->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
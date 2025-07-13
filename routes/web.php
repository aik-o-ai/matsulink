<?php

use App\Http\Controllers\FestivalImageController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
//プロフィール
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//画像投稿処理
Route::middleware('auth')->group(function () {
    Route::get('/festival_images/create/{event_id}', [FestivalImageController::class, 'create'])->name('festival.create'); //画像の投稿
    Route::post('/festival_images', [FestivalImageController::class, 'store'])->name('festival.store'); //画像の処理
});
require __DIR__ . '/auth.php';

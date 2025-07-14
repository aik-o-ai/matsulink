<?php

use App\Http\Controllers\EventController;
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

//イベント投稿処理
Route::middleware('auth')->controller(EventController::class)->group(function () {
    Route::get('/events/create', 'create')->name('events.create');
    Route::post('/events', 'store')->name('events.store');
});

//画像投稿処理
Route::middleware('auth')->controller(FestivalImageController::class)->group(function () {
    Route::get('/festival_images/create/{event_id}', 'create')->name('festival.create');
    Route::post('/festival_images', 'store')->name('festival.store');
});

//日付別一覧
Route::get('/events/date/{date}', [EventController::class, 'listByDate'])->name('events.byDate');

//イベント詳細ページ
Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');

require __DIR__ . '/auth.php';

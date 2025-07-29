<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\FestivalImageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MyPageController;
use App\Http\Controllers\VideoController;
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

//カレンダー関連
Route::get('/calendar', [EventController::class, 'calendar'])->name('calendar.show');
Route::get('/calendar/get', [EventController::class, 'get'])->name('calendar.get');
Route::post('/calendar/get', [EventController::class, 'get'])->name('calendar.get');
Route::get('/calendar', [EventController::class, 'showCalendar'])->name('calendar');


//写真一覧ページへ
Route::get('/events/{event_id}/images', [FestivalImageController::class, 'index'])
    ->name('events.images.index')
    ->middleware(['auth']);

Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');

//マイページ
Route::middleware(['auth'])->group(function () {
    Route::get('/mypage', [MyPageController::class, 'index'])->name('mypage');
    Route::get('/events/{id}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/events/{id}', [EventController::class, 'update'])->name('events.update');
    Route::delete('/events/{id}', [EventController::class, 'destroy'])->name('events.destroy');

    Route::delete('/festival_images/{id}', [FestivalImageController::class, 'destroy'])
        ->middleware(['auth'])
        ->name('festival_images.destroy');
});

//動画
Route::middleware('auth')->prefix('events/{event}/videos')->group(function () {
    Route::get('/', [VideoController::class, 'index'])->name('videos.index');
    Route::get('/create', [VideoController::class, 'create'])->name('videos.create');
    Route::post('/', [VideoController::class, 'store'])->name('videos.store');
    Route::delete('/{id}', [VideoController::class, 'destroy'])->name('videos.destroy');
});

require __DIR__ . '/auth.php';

<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\UserItemsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/user-items/grant-items', [UserItemsController::class, 'grantItems'])->middleware(['auth', 'verified'])->name('user-items.grant-items');
Route::post('/user-items/store', [UserItemsController::class, 'store'])->middleware(['auth', 'verified'])->name('user-items.store');
Route::get('/user-items/get-list', [UserItemsController::class, 'getList'])->middleware(['auth', 'verified'])->name('user-items.get-list');
Route::get('/user-items/consume-items', [UserItemsController::class, 'consumeItems'])->middleware(['auth', 'verified'])->name('user-items.consume-items');
Route::post('/user-items/consume', [UserItemsController::class, 'consume'])->middleware(['auth', 'verified'])->name('user-items.consume');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/**
 * Games controller route
 */
Route::resource('game',GamesController::class)->middleware(['auth', 'verified']);
/**
 * Items controller route
 */
Route::resource('item',ItemsController::class)->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';

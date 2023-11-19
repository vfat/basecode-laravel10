<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Tweet\TweetStoreController;
use App\Http\Controllers\Tweet\TweetEditController;
use App\Http\Controllers\Tweet\TweetEditActionController;
use App\Http\Controllers\Tweet\TweetDeleteController;
use App\Http\Controllers\TimelineController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', TimelineController::class)->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/timeline', TimelineController::class)->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('tweets', TweetStoreController::class)->name('tweets.store');
    Route::get('tweets/{id}/edit', TweetEditController::class)->name('tweets.edit');
    Route::post('tweets/editaction', TweetEditActionController::class)->name('tweets.editaction');
    Route::get('tweets/{id}/delete', TweetDeleteController::class)->name('tweets.delete');

});

require __DIR__.'/auth.php';

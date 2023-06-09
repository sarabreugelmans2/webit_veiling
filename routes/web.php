<?php

use App\Http\Controllers\BidController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LotController;
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


Route::get('/', [HomeController::class, 'show'])->name('home');
Route::get('/lots/{lot}', [LotController::class, 'show'])->name('lots.view');
Route::get('/items/{item}', [ItemController::class, 'show'])->name('items.view');
Route::post('/items/{item}/bid', [ItemController::class, 'bid'])->name('items.bid');


Route::middleware('auth')->group(function () {
    Route::get('/profile/bids', [BidController::class, 'index'])->name('profile.bids.index');
    Route::get('/profile/bids/{bid}', [BidController::class, 'show'])->name('profile.bids.show');
    Route::post('/profile/bids/{bid}', [BidController::class, 'edit'])->name('profile.bids.edit');
    Route::post('/profile/bids/{bid}/delete', [BidController::class, 'destroy'])->name('profile.bids.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__ . '/auth.php';

<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SearchController;
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
Route::middleware(['auth', 'verified'])->group(function ()
{
    Route::get('/', [ProductController::class, 'index'])->name('product.index');

    Route::post('/favorite', [ProductController::class, 'favorite']);

    Route::get('product/{id}/create-review/', [ReviewController::class, 'createReview'])->name('review.create');

    Route::post('/create-review', [ReviewController::class, 'storeReview'])->name('review.store');

    Route::get('/reviews', [ReviewController::class, 'index'])->name('review.index');

    Route::get('/search', [SearchController::class, 'index'])->name('search.index');

    Route::get('/popular-categories', [CategoryController::class, 'popular'])->name('category.popular');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

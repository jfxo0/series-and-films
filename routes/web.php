<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SerieController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function() {
    return view('about');
})->name('about');


Route::get('/admin', [AdminController::class, 'index'])->middleware(['auth', 'can:view-admin']);


//Route::get('/admin', function() {
//    return view('admin');
//})->name('admin');


Route::resource('series', SerieController::class);
Route::resource('admin', AdminController::class);

//Route::get('/series', [SerieController::class, 'index']);
//Route::get('/series/{serie}', [SerieController::class, 'show'])->name('series.show');

require __DIR__.'/auth.php';

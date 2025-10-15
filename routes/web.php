<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SerieController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Route::get('/contactpagina', function() {
//    $name = 'janisha';
//    $age = '19';
//    $gender = 'female, she/her';
//    return view('contactpagina', [
//        'name' => $name,
//        'age' => $age,
//        'gender' => $gender,
//
//    ]);
//});
//
//Route::get('/about-us', function() {
//    $company = 'Hogeschool Rotterdam';
//    return view('about-us', [
//        'company' => $company
//    ]);
//}) -> name('contact');
//
//Route::get('/products/{id?}', function(int $id) {
////    return view('product', compact('id'));
//return "hi" . $id;
//
//}) -> name('product.detail');

//Route::resource('products', ProductController::class);

Route::get('/about-us', function() {
    return view('slot', compact());
});

Route::resource('series', SerieController::class);
//Route::get('/series', [SerieController::class, 'index']);
//Route::get('/series/{serie}', [SerieController::class, 'show'])->name('series.show');

require __DIR__.'/auth.php';

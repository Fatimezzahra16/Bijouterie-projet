<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CollectionController;



Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//crud  pour les produit
Route::get('/products',[ProduitController::class,'index'])->name('product.index');
Route::get('/products/create', [ProduitController::class, 'create'])->name('product.create');
Route::post('/products',[ProduitController::class,'store'])->name('product.store');
Route::get('/products/{product}/edit',[ProduitController::class,'edit'])->name('product.edit');
Route::put('/products/{product}/update',[ProduitController::class,'update'])->name('product.update');
Route::delete('/products/{product}/delete',[ProduitController::class,'delete'])->name('product.delete');

//admin page
route::get('admin',[HomeController::class,'index_admin'])->name('admin.index');


//crud pour les collection
Route::get('/collections',[CollectionController::class,'index'])->name('collection.index');
Route::get('/collections/or',[CollectionController::class,'index_or'])->name('collection.index_or');
Route::get('/collections/argent',[CollectionController::class,'index_argent'])->name('collection.index_argent');
Route::get('/collections/diamant',[CollectionController::class,'index_diamant'])->name('collection.index_diamant');
Route::get('/collections/create', [CollectionController::class, 'create'])->name('collection.create');
Route::post('/collections', [CollectionController::class, 'store'])->name('collection.store');
Route::get('/collections/{collection}/edit',[CollectionController::class,'edit'])->name('collection.edit');
Route::put('/collections/{collection}/update',[CollectionController::class,'update'])->name('collection.update');
Route::delete('/collections/{collection}/delete',[CollectionController::class,'delete'])->name('collection.delete');
/*
Route::get('/', fn () => view('index'));
Route::get('/contact', fn () => view('contact'));
Route::get('/faq', fn () => view('faq'));
Route::get('/livraison', fn () => view('livraison'));
Route::get('/retours', fn () => view('retours'));
Route::get('/collections/{type}', [PageController::class, 'show'])->where('type', 'argent|or|diamants');
*/

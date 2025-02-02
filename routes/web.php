<?php

use App\Livewire\Products;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $products = \App\Models\Product::all(); // Fetch all products
    return view('welcome', compact('products'));
});


Route::get('/home', function () {
    return view('home');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

   // Display the Livewire products component
   Route::get('/products', function () {
    return view('products');
})->name('products');});

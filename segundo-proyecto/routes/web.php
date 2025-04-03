<?php

use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('ejemplo1', function () {
    return view('ejemplo1');
});
Auth::routes();

Route::get('/grid-bootstrap', function () {
    return view('grid-bootstrap');
});

Route::get('/ejemplo2', function () {
    return view('ejemplo2');
});

Route::get('/pagina', function () {
    return view('pagina');
});


Route::get('/sheris', function () {
    return view('sheris');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

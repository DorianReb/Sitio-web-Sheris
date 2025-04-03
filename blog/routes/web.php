<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('borrego',function(){
    return view('borrego');
});
Route::get('hola',function(){
    return view('hola');
});
Route::get('mi_cuv', function(){
    return view('mi_cuv');
});
Route::get('dashboard',function(){
    return view('dashboard');
});


<?php

use App\Http\Controllers\NavigationController;
use Illuminate\Support\Facades\Route;

Route::get('/', [NavigationController::class, 'frontPageView']);

Route::get('/login', function () {
    return view('pages/login');
});

Route::get('/signup', function () {
    return view('pages/signup');
});

// /pets/type
Route::get('/pets/{type}', [NavigationController::class, 'pets']);

// /pets
Route::get('/pets', [NavigationController::class, 'otherPets']);


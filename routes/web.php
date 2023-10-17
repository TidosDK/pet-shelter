<?php

use App\Http\Controllers\NavigationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [NavigationController::class, 'frontPageView']);


Route::get('/signup', function () {
    return view('pages/signup');
});

// /pets/type
Route::get('/pets/{type}', [NavigationController::class, 'pets']);

// /pets
Route::get('/pets', [NavigationController::class, 'otherPets']);

//User Controller
Route::get('/login', [UserController::class, 'loginView']);

Route::get('/signup', [UserController::class, 'signupView']);

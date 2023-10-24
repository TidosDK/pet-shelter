<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [NavigationController::class, 'frontPageView']);

// /pets/type
Route::get('/pets/{type}', [NavigationController::class, 'pets']);

// /pets
Route::get('/pets', [NavigationController::class, 'otherPets']);

//User Controller
Route::get('/login', [UserController::class, 'loginView']);

Route::get('/signup', [UserController::class, 'signupView']);

//Amalie? 
Route::get('/aboutUs',[NavigationController::class, 'aboutUsView']);
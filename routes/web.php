<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


// NAVIGATION CONTROLLER //

// Front page
Route::get('/', [NavigationController::class, 'frontPageView']);

// Type of pet (Dogs, Cats)
Route::get('/pets/{type}', [NavigationController::class, 'pets']);

// Other types of pet from above
Route::get('/pets', [NavigationController::class, 'otherPets']);

// Specific pet (any kind)
Route::get('/pet/{id}', [NavigationController::class, 'singlePet']);

// About us page
Route::get('/aboutUs',[NavigationController::class, 'aboutUsView']);


// USER CONTROLLER //

// Login page
Route::get('/login', [UserController::class, 'loginView']);

// Signup page
Route::get('/signup', [UserController::class, 'signupView']);

// Authentication/Login handling
Route::post('/login', [UserController::class, 'login']);

// User creation handling
Route::post('/signup', [UserController::class, 'signUp']);

// Session destroyer / Logout handling
Route::post('/logout', [UserController::class, 'logOut']);

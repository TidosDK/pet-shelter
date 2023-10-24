<?php

use App\Http\Controllers\NavigationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [NavigationController::class, 'frontPageView']);

// /pets/type
Route::get('/pets/{type}', [NavigationController::class, 'pets']);

// /pets
Route::get('/pets', [NavigationController::class, 'otherPets']);

// /pet/*
Route::get('/pet/{id}', [NavigationController::class, 'singlePet']);

//User Controller
Route::get('/login', [UserController::class, 'loginView']);

Route::get('/signup', [UserController::class, 'signupView']);


Route::post('/login', [UserController::class, 'login']);

Route::post('/signup', [UserController::class, 'signUp']);

Route::post('/logout', [UserController::class, 'logOut']);
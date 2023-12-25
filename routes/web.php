<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// NAVIGATION CONTROLLER //

// Front page
Route::get('/', [NavigationController::class, 'frontPageView']);

// Type of pet (Dogs, Cats)
Route::get('/pets/{type}', [NavigationController::class, 'petsView']);

// Other types of pet from above
Route::get('/pets', [NavigationController::class, 'otherPetsView']);

// Specific pet (any kind)
Route::get('/pet/{id}', [NavigationController::class, 'singlePetView']);

// About us page
Route::get('/aboutUs', [NavigationController::class, 'aboutUsView']);


// USER CONTROLLER //

// Login page
// Route::get('/login', [UserController::class, 'loginView'])
// ->middleware('guest');

Route::get('/login', function(){
    return view('pages.login');
})->middleware('guest');

// Signup page
// Route::get('/signup', [UserController::class, 'signupView'])
// ->middleware('guest');

Route::get('/signup', function(){
    return view('pages.signup');
})->middleware('guest');

// Reset password page
Route::get('/reset-password', [UserController::class, 'resetPasswordView'])
->middleware('guest');

//Profile page
// Route::get('/profile', [UserController::class, 'profileView'])
// ->middleware('auth');

Route::get('/profile', function(){
    return view('pages.profile');
})->middleware('auth', 'verified');

//Edit information handling
Route::post('/profile', [UserController::class, 'profileEdit'])
->middleware('auth', 'verified');

// Authentication/Login handling
Route::post('/login', [UserController::class, 'login'])
->name('login')
->middleware('guest');

// User creation handling
Route::post('/signup', [UserController::class, 'signUp'])
->middleware('guest');

// Session destroyer / Logout handling
Route::post('/logout', [UserController::class, 'logOut'])
->middleware('auth', 'verified');


// POST CONTROLLER //

// Create post page
Route::post('/create', [PostController::class, 'createPost'])
->middleware('auth', 'verified');

Route::get('/create', [PostController::class, 'createPostView'])
->middleware('auth', 'verified');

// Edit post page
Route::post('/edit', [PostController::class, 'editPost'])
->middleware('auth', 'verified');

Route::get('/edit/{id}', [PostController::class, 'editPostView'])
->middleware('auth', 'verified');

//Delete route
Route::post('/delete-post', [PostController::class, 'deletePost'])
->middleware('auth', 'verified');

//Post Managemenent
Route::get('/post-management', [PostController::class, 'postManagementView'])
->middleware('auth', 'verified');


// Fortify
Route::get('/home', function(){
    dd(Auth::user());
});

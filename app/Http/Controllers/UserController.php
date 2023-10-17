<?php

namespace App\Http\Controllers;

class UserController extends Controller {
    public function loginView() {
        return view('pages.login');
    }

    public function signupView() {
        return view('pages.signup');
    }
}
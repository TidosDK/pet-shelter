<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {
    public function loginView() {
        return view('pages.login');
    }

    public function signupView() {
        return view('pages.signup');
    }

    public function signUp(Request $request) {
        $credentials = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', Rule::unique('users', 'email')], # Must be unqiue!
            'password' => 'required|confirmed|min:6'
        ]);

        //HASH PASSWORD
        $credentials['password'] = bcrypt($credentials['password']);

        //SAVE TO DATABASE
        $user = User::create($credentials);

        //LOGIN NEW USER
        auth()->login($user);

        return redirect('/');
    }

    public function login(Request $request) {
        // dd($request);
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);

        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect('/pets/dog'); //Checkup on intended
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logOut(Request $request) {
		auth()->logout();

		$request->session()->invalidate();
		$request->session()->regenerateToken();

		return redirect('/login')->with('message', 'You have been logged out!');
	}
}
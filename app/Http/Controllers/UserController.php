<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller {

	// Login page
	public function loginView() {
		return view('pages.login');
	}

	// Signup page
	public function signupView() {
		return view('pages.signup');
	}

	// Reset password page
	public function resetPasswordView() {
		return view('pages.passwordreset');
	}

	// Profile page
	public function profileView() {
		return view('pages.profile');
	}

	// Update information
	public function profileEdit(Request $request) {
		$user = auth()->user();

		if ($user->email != $request['email']) {
			$credentials = $request->validate([
				'name' => 'required',
				'email' => ['required', 'email', Rule::unique('users', 'email')],
				'phone' => ['nullable', 'digits:8', 'integer']
			]);
			$user->email = $credentials['email'];
		} else {
			$credentials = $request->validate([
				'name' => 'required',
				'phone' => ['nullable', 'digits:8', 'integer']
			]);
		}

		$user->name = $credentials['name'];
		$user->phone = $credentials['phone'];
		$user->save(); // intelephense says the save method is undefined. THis is wrong.
		return back();
	}

	// Login handling
	public function login(Request $request) {
		$credentials = $request->validate([
			'email' => ['required', 'email'],
			'password' => 'required',
		]);

		// Checks if login information was correct
		if (auth()->attempt($credentials)) {
			// Generates a session
			$request->session()->regenerate();

			// Redirects user to frontpage
			return redirect('/')->with('message', 'You have been logged in');
		}

		// Login information was wrong. Returns user to login page
		return back()->withErrors([
			'email' => 'Invalid credentials',
		])->onlyInput('email');
	}

	// Signup handling
	public function signUp(Request $request) {
		$credentials = $request->validate([
			'name' => 'required',
			'email' => ['required', 'email', Rule::unique('users', 'email')],
			'password' => 'required|confirmed|min:6'
		]);

		// Hash password
		$credentials['password'] = bcrypt($credentials['password']);

		// Save to database
		$user = User::create($credentials);

		// Login the user
		auth()->login($user);

		// Signup was successful. Redirects user to frontpage.
		return redirect('/')->with('message', 'You have been logged in');
	}

	// Logout handling
	public function logOut(Request $request) {
		auth()->logout();

		// Destroys sessions
		$request->session()->invalidate();
		$request->session()->regenerateToken();

		// Redirects user to login page.
		return redirect('/login')->with('message', 'You have been logged out!');
	}
}

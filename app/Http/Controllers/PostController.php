<?php

namespace App\Http\Controllers;

use App\Models\Pets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller {

	// Create post
	public function createPostView() {
		return view('pages.createpost');
	}

	// Create post handling
	public function createPost(Request $request) {
		$pet_credentials = $request->validate([
			'pet-name' => ['required'],
			'pet-age' => ['required'],
			'pet-weight' => ['required'],
			'pet-sex' => ['required'],
			'pet-animal' => ['required'],
			'pet-breed' => ['required'],
			'pet-castrated' => ['nullable'],
			'pet-live-other' => ['nullable'],
			'pet-live-kids' => ['nullable'],
			'pet-comments' => ['nullable', 'max:255'],
			'pet-price' => ['required', 'numeric'],
		]);
		// Database post create incomming
		$pets = Pets::create($pet_credentials);
	}

	// Delete post handling
	public function deletePost(Request $request) {
		// Checks the authenticated users id against the owner id of the pet which was requested for deletion
		if (Pets::find($request["petId"])->users_id != Auth::user()->id)
			return redirect()->back()->with('error', 'You are not the owner of this pet!');

		// Delete pet from database
		Pets::destroy($request["petId"]);
		return redirect('/')->with('message', 'Post succesfully deleted');
	}
}

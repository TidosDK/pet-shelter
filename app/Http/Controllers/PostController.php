<?php

namespace App\Http\Controllers;

use App\Models\Pets;
use Illuminate\Http\Request;

    class PostController extends Controller{

        // Create page
	    public function createPostView(){
		    return view('pages.createpost');
	    }

        public function createPost(Request $request){
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
    }
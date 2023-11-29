<?php

namespace App\Http\Controllers;

use App\Models\Pets;
use App\Models\Breeds;
use App\Models\TypesOfPets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    // Create page
    public function createPostView()
    {
        return view('pages.createpost');
    }

    public function createPost(Request $request)
    {
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

    public function deletePost(Request $request)
    {
        //Checks the authenticated users id against the owner id of the pet which was requested for deletion
        if (Pets::find($request["petId"])->users_id != Auth::user()->id)
            return redirect()->back()->with('error', 'You are not the owner of this pet!');

        //Delete pet from database
        Pets::destroy($request["petId"]);
        return redirect('/post-management')->with('message', 'Post succesfully deleted');
    }

    public function postManagementView()
    {
        return view('pages.postmanagement', [
		'pets' => Pets::all()->where('users_id', '=', Auth::user()->id),
		'breeds' => Breeds::all(),
		'type_of_pets' => TypesOfPets::all(),
		'type' => 'all',
	    ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Pets;
use App\Models\Breeds;
use App\Models\TypesOfPets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PostController extends Controller {

    // Create page
    public function createPostView() {
        return view('pages.createpost', [
            'types' => TypesOfPets::all(),
            'breeds' => Breeds::all()
        ]);
    }

    // Edit page
    public function editPostView(string $pet_id) {
        //Checks the authenticated users id against the owner id of the pet
        if (Pets::find($pet_id)->users_id != Auth::user()->id)
            return redirect()->back()->with('error', 'You are not the owner of this pet!');

        return view('pages.editpost', [
            'pet' => Pets::find($pet_id),
            'types' => TypesOfPets::all(),
            'breeds' => Breeds::all()
        ]);
    }

    public function postManagementView() {
        return view('pages.postmanagement', [
			'pets' => Pets::all()->where('users_id', '=', Auth::user()->id),
			'breeds' => Breeds::all(),
			'type_of_pets' => TypesOfPets::all(),
			'type' => 'all',
	    ]);
	}

    public function createPost(Request $request) {
        $request['kidFriendly'] = $request->has('kidFriendly');
        $request['multipleAnimalsFriendly'] = $request->has('multipleAnimalsFriendly');
        $request['castrated'] = $request->has('castrated');

        $request['type_id'] = $request['type_id'] == "None" ? null : $request['type_id'];
        $request['breeds_id'] = $request['breeds_id'] == "None" ? null : $request['breeds_id'];

        //Input validation
        $pet_credentials = $request->validate([
            'name' => ['required'],
            'description' => ['nullable', 'max:255'],
            'age_in_months' => ['required', 'numeric'],
            'weight' => ['required', 'numeric'],
            'sex' => ['required'],
            'location' => ['nullable'],
            'type_id' => ['required'],
            'breeds_id' => ['required'],
            'castrated' => ['required'],
            'multipleAnimalsFriendly' => ['required'],
            'kidFriendly' => ['required'],
            'price' => ['required', 'numeric'],
            'petImage' => ['required']
        ]);

        // Sets the foreign key reference to the user
        $pet_credentials['users_id'] = Auth::user()->id;

        // Database post create incoming
        $new_id = Pets::create($pet_credentials)->id;

        // Creates a new folder for images and stores the uploaded images.
        $pet_folder_name = "p" . $new_id;
        File::makeDirectory("storage/pet_images/" . $pet_folder_name);
        $request->file('petImage')->store('pet_images/' . $pet_folder_name, 'public');

        return redirect("/pet/{$new_id}")->with('Post Created');
    }

    public function editPost(Request $request) {
        //Checks the authenticated users id against the owner id of the pet which was requested to be changed
        if (Pets::find($request["petId"])->users_id != Auth::user()->id)
            return redirect()->back()->with('error', 'You are not the owner of this pet!');

        $id = $request["petId"];

        $request['kidFriendly'] = $request->has('kidFriendly');
        $request['multipleAnimalsFriendly'] = $request->has('multipleAnimalsFriendly');
        $request['castrated'] = $request->has('castrated');

        //Input validation
        $pet_credentials = $request->validate([
            'name' => ['required'],
            'description' => ['nullable', 'max:255'],
            'age_in_months' => ['required', 'numeric'],
            'weight' => ['required', 'numeric'],
            'sex' => ['required'],
            'location' => ['nullable'],
            'type_id' => ['required'],
            'breeds_id' => ['required'],
            'castrated' => ['required'],
            'multipleAnimalsFriendly' => ['required'],
            'kidFriendly' => ['required'],
            'price' => ['required', 'numeric'],
        ]);

        Pets::whereId($request['petId'])->update($pet_credentials);

        //If a new image has been uploaded, delete the old and replace with new
        if ($request["petImage"] != null) {
            $pet_folder_name = "p" . $id;
            $request->file('petImage')->store('pet_images/' . $pet_folder_name, 'public');
        }

        return redirect("/pet/{$id}")->with('Post edited');
    }

    public function deletePost(Request $request) {
        //Checks the authenticated users id against the owner id of the pet which was requested for deletion
        if (Pets::find($request["petId"])->users_id != Auth::user()->id)
            return redirect()->back()->with('error', 'You are not the owner of this pet!');

        //Delete pet from database
        $id = $request["petId"];
        Pets::destroy($id);

        //Delete all reactiong from database
        ReactionController::unreactAll($id);

        //Delete image directory from storage
        $pet_folder_name = "p" . $id;
        File::deleteDirectory("storage/pet_images/" . $pet_folder_name);

        return redirect('/post-management')->with('message', 'Post succesfully deleted');
    }
}

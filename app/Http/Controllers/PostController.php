<?php

namespace App\Http\Controllers;

use App\Models\Pets;
use App\Models\Breeds;
use App\Models\TypeOfPets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

    class PostController extends Controller{

        // Create page
	    public function createPostView(){
		    return view('pages.createpost');
	    }

        public function createPost(Request $request){
            if($request->has('kidFriendly'))
                $request['kidFriendly'] = "Yes";
            else
                $request['kidFriendly'] = "No";

            if($request->has('multipleAnimalsFriendly'))
                $request['multipleAnimalsFriendly'] = "Yes";
            else
                $request['multipleAnimalsFriendly'] = "No";

            if($request->has('castrated'))
                $request['castrated'] = "Yes";
            else
                $request['castrated'] = "No";

            if($request['sex'] == 1)
                $request['sex'] = "Female";
            else
                $request['sex'] = "Male";
            //dd($request);
            //$request['sex'] = $request['sex'] == 1?"female":$request['kidFriendly'];
            $pet_credentials = $request->validate([
                'name' => ['required'],
                'description' => ['nullable', 'max:255'],
                'age_in_months' => ['required', 'numeric'],
                'weight' => ['required', 'numeric'],
                'sex' => ['required'],
                'location' => ['nullable'],
                'type_of_pets_id' => ['required'],
                'breeds_id' => ['required'],
                'castrated' => ['nullable'],
                'multipleAnimalsFriendly' => ['nullable'],
                'kidFriendly' => ['nullable'],
                'price' => ['required', 'numeric']
            ]);
            $pet_credentials['users_id'] = Auth::user()->id;
            // Database post create incomming
            $pets = Pets::create($pet_credentials);

            return redirect('/')->with('Post Created');
        }

        public function fetchTypesOfPets(){
            return view('pages.createpost', [
                'types' => TypeOfPets::all()
            ]);
        }

        public function fetchBreeds(){
            return view('pages.createpost', [
                'breeds' => Breeds::all()
            ]);
        }

        public function postCreate(){
            return view('pages.createpost', [
                'types' => TypeOfPets::all(),
                'breeds' => Breeds::all()
            ]);
        }
    }
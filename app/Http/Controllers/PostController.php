<?php

namespace App\Http\Controllers;

use App\Models\Pets;
use App\Models\Breeds;
use App\Models\TypesOfPets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

    class PostController extends Controller{

        // Create page
        public function createPostView(){
            return view('pages.createpost', [
                'types' => TypesOfPets::all(),
                'breeds' => Breeds::all()
            ]);
        }

        // Edit page
        public function editPostView(){
            return view('pages.editpost', [
                'types' => TypesOfPets::all(),
                'breeds' => Breeds::all()
            ]);
        }

        public function createPost(Request $request){
            $request['kidFriendly'] = $request->has('kidFriendly');
            $request['multipleAnimalsFriendly'] = $request->has('multipleAnimalsFriendly');
            $request['castrated'] = $request->has('castrated');

            if($request['sex'] == 1)
                $request['sex'] = "Female";
            else if($request['sex'] == 2)
                $request['sex'] = "Male";
            else
                $request['sex'] = 'Other';
            //dd($request);
            $pet_credentials = $request->validate([
                'name' => ['required'],
                'description' => ['nullable', 'max:255'],
                'age_in_months' => ['required', 'numeric'],
                'weight' => ['required', 'numeric'],
                'sex' => ['required'],
                'location' => ['nullable'],
                'type_id' => ['required'],
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

        

        public function editPost(Request $request){

        }
        
    }
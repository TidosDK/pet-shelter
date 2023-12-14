<?php

namespace App\Http\Controllers;

use App\Models\UserLikesPet;
use App\Models\Pets;
use App\Models\TypesOfLikes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReactionController extends Controller {
    public function react(Request $request) {
        //Check if the reacting user is the owner of the pet
        if (Pets::find($request["pet_id"])->users_id == Auth::user()->id)
            return back()->with('react_error', 'You cannot react to your own pet!');
        
        //Check if the reacting user has already reacted to this pet
        if (UserLikesPet::where('pet_id', $request['pet_id'])->where('user_id', Auth::user()->id)->count() != 0)
            return back()->with('react_error', 'You have already reacted to this pet!');

        //Create the new reaction
        UserLikesPet::create([
			'user_id' => Auth::user()->id,
			'pet_id' => $request['pet_id'],
			'type_id' => TypesOfLikes::where('type', $request['type'])->first()->id
		]);

        return back()->with('message', 'Saved reaction');
    }



    public function unreact(Request $request) {
        //Check if the unreacting user a stored reaction to the pet
        if (UserLikesPet::where('pet_id', $request['pet_id'])->where('user_id', Auth::user()->id)->count() == 0)
            return back()->with('react_error', 'You have not liked this pet earlier!');

        UserLikesPet::where('pet_id', $request['pet_id'])->where('user_id', Auth::user()->id)->delete();

        return back()->with('message', 'Removed reaction');
    }

    public static function unreactAll($pet_id) {
        UserLikesPet::where('pet_id', $pet_id)->delete();
    }



    public static function currentReaction($pet_id) {
        if (!Auth::check()) {
            return null;
        }

        $user_reaction = UserLikesPet::where('pet_id', $pet_id)->where('user_id', Auth::user()->id)->first();
        if ($user_reaction == null)
            return null;

        return TypesOfLikes::find($user_reaction->type_id);
    }


    
    public static function petReactionCountsAll($pet_id) {
        $reaction_counts = [];
		
		foreach (TypesOfLikes::all() as $reaction) {
			$reaction_counts[$reaction->type] = UserLikesPet::where('pet_id', $pet_id)->where('type_id', $reaction->id)->count();
		}

        return $reaction_counts;
    }

    

    public static function userReactionsAll() {
        if (!Auth::check()) {
            return null;
        }

        return UserLikesPet::where('user_id', Auth::user()->id)->get();
    }
}
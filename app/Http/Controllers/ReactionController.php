<?php

namespace App\Http\Controllers;

use App\Models\UserLikesPet;
use App\Models\Pets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReactionController extends Controller {
    public function react(Request $request) {
        if (Pets::find($request["pet_id"])->users_id == Auth::user()->id)
            return back()->with('react_error', 'You cannot react to your own pet!');
        
        if (UserLikesPet::where('pet_id', $request['pet_id'])->where('user_id', Auth::user()->id)->count() != 0)
            return back()->with('react_error', 'You have already reacted to this pet!');

        UserLikesPet::create([
			'user_id' => Auth::user()->id,
			'pet_id' => $request['pet_id'],
			'reaction_type' => $request['reaction_type']
		]);

        return back()->with('message', 'Saved reaction');
    }

    public function unreact(Request $request) {
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

        $reaction = UserLikesPet::where('pet_id', $pet_id)->where('user_id', Auth::user()->id)->first();
        if ($reaction == null)
            return null;

        return $reaction->reaction_type;

    }
}
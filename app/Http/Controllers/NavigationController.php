<?php

namespace App\Http\Controllers;

use App\Models\Pets;
use App\Models\Breeds;
use App\Models\TypesOfPets;
use App\Models\UserLikesPet;
use App\Http\Controllers\ReactionController;

class NavigationController extends Controller {

	public function frontPageView() {
		return view('pages.frontpage');
	}

	public function pets(string $type) {
		return view('pages.pets', [
			'pets' => Pets::all(),
			'breeds' => Breeds::all(),
			'type_of_pets' => TypesOfPets::all(),
			'type' => $type
		]);
	}

	public function otherPets() {
		return $this->pets("");
	}

	public function aboutUsView() {
		return view('pages.aboutus');
	}

	public function singlePet(string $pet_id) {
		$current_reaction = ReactionController::currentReaction($pet_id);
		
		return view('pages.pet', [
			'pet' => Pets::find($pet_id),
			
			'likes' => UserLikesPet::where('pet_id', $pet_id)->where('reaction_type', "like")->count(),
			'hearts' => UserLikesPet::where('pet_id', $pet_id)->where('reaction_type', "heart")->count(),
			'stars' => UserLikesPet::where('pet_id', $pet_id)->where('reaction_type', "star")->count(),
			'current_reaction' => $current_reaction
		]);
	}
}

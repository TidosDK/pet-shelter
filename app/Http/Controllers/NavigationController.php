<?php

namespace App\Http\Controllers;

use App\Models\Pets;
use App\Models\Breeds;
use App\Models\TypesOfPets;
use App\Models\UserLikesPet;
use App\Http\Controllers\ReactionController;
use App\Models\TypesOfLikes;

class NavigationController extends Controller {

	public function frontPageView() {
		return view('pages.frontpage');
	}

	public function petsView(string $type) {
		return view('pages.pets', [
			'pets' => Pets::all(),
			'breeds' => Breeds::all(),
			'types_of_pets' => TypesOfPets::all(),
			'type' => $type
		]);
	}

	public function otherPetsView() {
		return $this->petsView("");
	}

	public function aboutUsView() {
		return view('pages.aboutus');
	}

	public function singlePetView(string $pet_id) {
		//Get the amount of each type of reaction for this pet
		$reaction_counts = ReactionController::petReactionCountsAll($pet_id);

		//Get the authenticated users current reaction to this pet
		$current_reaction = ReactionController::currentReaction($pet_id);

		return view('pages.pet', [
			'pet' => Pets::find($pet_id),
			'reaction_types' => TypesOfLikes::all(),
			'reactions' => $reaction_counts,
			'current_reaction' => $current_reaction
		]);
	}
}

<?php

namespace App\Http\Controllers;

use App\Models\Pets;
use App\Models\Breeds;
use App\Models\TypesOfPets;

class NavigationController extends Controller {

	public function frontPageView() {
		return view('pages.frontpage');
	}

	public function petsView(string $type) {
		return view('pages.pets', [
			'pets' => Pets::all(),
			'breeds' => Breeds::all(),
			'type_of_pets' => TypesOfPets::all(),
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
		return view('pages.pet', [
			'pet' => Pets::find($pet_id)
		]);
	}
}

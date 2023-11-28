<?php

namespace App\Http\Controllers;

use App\Models\Pets;
use App\Models\Breeds;
use App\Models\TypesOfPets;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\BinaryOp\NotEqual;

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
		return view('pages.pet', [
			'pet' => Pets::find($pet_id)
		]);
	}
}

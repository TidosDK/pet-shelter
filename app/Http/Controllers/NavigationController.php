<?php

namespace App\Http\Controllers;

use App\Models\Pets;
use App\Models\Breeds;
use App\Models\TypeOfPets;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\BinaryOp\NotEqual;

class NavigationController extends Controller {

	public function frontPageView() {
		return view ('pages.frontpage');
	}

	public function pets(string $type) {
		return view('pages.pets', [
			'pets' => Pets::all(),
			'breeds' => Breeds::all(),
			'type_of_pets' => TypeOfPets::all(),
			'type' => $type
		]);
	}

	public function otherPets() {
		return $this->pets("");
	}
}

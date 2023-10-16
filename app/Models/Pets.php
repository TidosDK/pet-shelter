<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pets extends Model {
	use HasFactory;

	public function user() {
		return $this->belongsTo(Users::class, 'users_id');
	}

	public function typeOfPet() {
		return $this->belongsTo(TypeOfPets::class, 'type_of_pets_id');
	}

	public function breed() {
		return $this->belongsTo(Breeds::class, 'breeds_id');
	}
}

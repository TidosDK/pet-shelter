<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeOfPets extends Model {
	use HasFactory;

	public function pets() {
		return $this->hasMany(Pets::class, 'type_of_pets_id');
	}
}

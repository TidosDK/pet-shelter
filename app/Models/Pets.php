<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pets extends Model {
	use HasFactory;

	protected $fillable = [
		'name',
		'description',
		'age_in_months',
		'sex',
		'weight',
		'price',
		'location',
		'kidFriendly',
		'multipleAnimalsFriendly',
		'castrated',
		'type_of_pets_id',
		'breeds_id',
		'users_id'
	];

	public static function getImages(int $pet_id) {
		$FILE_DIRECTORY = "storage/pet_images/p" . $pet_id;

		if (!file_exists($FILE_DIRECTORY)) {
			return null;
		}

		$images = glob($FILE_DIRECTORY . "/*");

		return $images;
	}

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

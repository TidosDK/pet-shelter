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
		'type_id',
		'breeds_id',
		'users_id'
	];

	protected $hidden = [
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
		return $this->belongsTo(User::class, 'users_id');
	}

	public function typeOfPet() {
		return $this->belongsTo(TypesOfPets::class, 'type_id');
	}

	public function breed() {
		return $this->belongsTo(Breeds::class, 'breeds_id');
	}
}

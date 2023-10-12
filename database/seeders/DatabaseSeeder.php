<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Users;
use App\Models\Breeds;
use App\Models\Pets;
use App\Models\TypeOfPets;
use App\Models\UsersPets;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class DatabaseSeeder extends Seeder {
	public function run(): void {
		$types_of_pets = json_decode(File::get('resources/json/types_of_pets.json'));
		foreach ($types_of_pets as $type) {
			TypeOfPets::create([
				'type' => $type
			]);
		}

		$breeds = json_decode(File::get('resources/json/breeds.json'));
		foreach ($breeds as $breed) {
			Breeds::create([
				'breed' => $breed
			]);
		}

		Users::factory(10)->create();

		Pets::factory(30)->create();
	}
}

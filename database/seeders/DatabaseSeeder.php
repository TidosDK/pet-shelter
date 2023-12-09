<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Breeds;
use App\Models\Pets;
use App\Models\TypesOfPets;
use App\Models\UserLikesPet;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class DatabaseSeeder extends Seeder {
	public function run(): void {
		$types_of_pets = json_decode(File::get('resources/json/types_of_pets.json'));
		foreach ($types_of_pets as $type) {
			TypesOfPets::create([
				'type' => $type
			]);
		}

		$breeds = json_decode(File::get('resources/json/breeds.json'));
		foreach ($breeds as $breed) {
			Breeds::create([
				'breed' => $breed
			]);
		}

		User::factory(10)->create();

		Pets::factory(10)->create([
			'type_id' => 1
		]);

		Pets::factory(10)->create([
			'type_id' => 2
		]);

		Pets::factory(20)->create();

		for ($i = 0; $i < 1000; $i++) {
			UserLikesPet::create([
				'user_id' => User::inRandomOrder()->first()->id,
				'pet_id' => Pets::inRandomOrder()->first()->id,
				'reaction_type' => fake()->randomElement(['like', 'heart', 'star'])
			]);
		}
	}
}

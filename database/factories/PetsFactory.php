<?php

namespace Database\Factories;

use App\Models\Users;
use App\Models\Breeds;
use App\Models\TypeOfPets;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PetsFactory extends Factory {
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array {
		return [
			'name' => fake()->name(),
			'description' => fake()->paragraph(3),
			'age_in_months' => rand(0, 100),
			'sex' => fake()->randomElement(['Male', 'Female']),
			'price' => rand(500, 10000),
			'location' => fake()->city(),
			'users_id' => Users::all()->random()->id,
			'type_of_pets_id' => TypeOfPets::all()->random()->id,
			'breeds_id' => Breeds::all()->random()->id
		];
	}
}

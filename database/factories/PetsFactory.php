<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Breeds;
use App\Models\TypeOfPets;
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
			'weight' => rand(8,50),
			'kidFriendly'=> fake()->randomElement(['Yes', 'No']),
			'multipleAnimalsFriendly' => fake()->randomElement(['Yes', 'No']),
			'castrated' => fake()->randomElement(['Yes', 'No']),
			'users_id' => User::all()->random()->id,
			'type_of_pets_id' => TypeOfPets::all()->random()->id,
			'breeds_id' => Breeds::all()->random()->id
		];
	}
}

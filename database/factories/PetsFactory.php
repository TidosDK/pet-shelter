<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Breeds;
use App\Models\TypesOfPets;
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
			'kidFriendly'=> fake()->randomElement([true, false]),
			'multipleAnimalsFriendly' => fake()->randomElement([true, false]),
			'castrated' => fake()->randomElement([true, false]),
			'users_id' => User::all()->random()->id,
			'type_id' => TypesOfPets::all()->random()->id,
			'breeds_id' => Breeds::all()->random()->id
		];
	}
}

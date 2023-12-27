<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Users>
 */
class UserFactory extends Factory {
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array {
		return [
			'name' => fake()->name(),
			'email' => fake()->unique()->safeEmail(),
			'phone' => fake()->phoneNumber(),
			'password' => bcrypt(fake()->password()),
			'isAdmin' => false
		];
	}
}

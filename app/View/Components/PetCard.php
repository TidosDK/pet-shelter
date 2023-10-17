<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;

class PetCard extends Component {
	/**
	 * Create a new component instance.
	 */
	public function __construct(
		public Collection $pets,
		public Collection $breeds,
		public Collection $typeOfPets,
		public string $type
	) {}

	/**
	 * Get the view / contents that represent the component.
	 */
	public function render(): View|Closure|string {
		return view('components.pet-card');
	}
}

<?php
	if ($type == "dog") {
		$title = "Dogs & Puppies";
	} else if ($type == "cat") {
		$title = "Cats & Kittens";
	} else {
		$title = "Other pets";
	}
?>
<x-layout :title="$title">
    <x-pet-card-row>
        <x-pet-card :pets="$pets" :breeds="$breeds" :typeOfPets="$type_of_pets" :type="$type" />
    </x-pet-card-row>
</x-layout>

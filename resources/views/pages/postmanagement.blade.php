<?php 
$title = "Post Management";
use App\Models\Pets;
?>

<x-layout :title="$title">
    <p class="text-center" style="margin-top: 30px; font-size: 30px">My Posts</p>
    <div>
        <button class="btn login-button inline" style="width: 150px; height: 50px">Create Post</button>
    </div>
    @auth
        <x-pet-card-row>
            <x-pet-card :pets="$pets" :breeds="$breeds" :typeOfPets="$type_of_pets" :type="$type" />
        </x-pet-card-row>
    @endauth
</x-layout>
<?php
$title = 'Post Management';
use App\Models\Pets;
?>

<x-layout :title="$title">
    <p class="h2 text-center mt-4 mb-5">My Posts</p>
    <a class="btn login-button p-2" href="{{ url('create') }}">Create Post</a>
    @if (count($pets) == 0)
        <p class="text-center post-management-no-posts-text mt-4">You have no posts. You can create one here.</p>
    @else
        <x-pet-card-row>
            <x-pet-card :pets="$pets" :breeds="$breeds" :typeOfPets="$type_of_pets" :type="$type" />
        </x-pet-card-row>
    @endif
</x-layout>

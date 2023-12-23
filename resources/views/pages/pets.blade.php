<?php
if ($type == 'dog') {
    $title = 'Dogs & Puppies';
} elseif ($type == 'cat') {
    $title = 'Cats & Kittens';
} else {
    $title = 'Other pets';
}
$genders_list = [];
$breeds_list = [];
?>
<x-layout :title="$title">
    <section class="mt-4">
        <p class="h4 mb-3" id="sorting-settings-for-{{ $type }}">Sorting settings:</p>
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Gender
        </button>
        <ul class="dropdown-menu">
            @foreach ($pets as $pet)
                @if (!in_array($pet->sex, $genders_list))
                    <?php array_push($genders_list, $pet->sex); ?>
                @endif
            @endforeach
            @foreach ($genders_list as $gender)
                <li><a class="dropdown-item" href="?gender={{ $gender }}">{{ $gender }}</a></li>
            @endforeach
        </ul>
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Breed
        </button>
        <ul class="dropdown-menu">
            @foreach ($pets as $pet)
                @if (strtolower($pet->typeOfPet->type) == $type ||
                        ($type == '' &&
                            strtolower($pet->typeOfPet->type) != strtolower('Dog') &&
                            strtolower($pet->typeOfPet->type) != strtolower('Cat')))
                    @if (!in_array($pet->breed->breed, $breeds_list))
                        <?php array_push($breeds_list, $pet->breed->breed); ?>
                    @endif
                @endif
            @endforeach
            <?php sort($breeds_list); ?>
            @foreach ($breeds_list as $breed)
                <li><a class="dropdown-item" href="?breed={{ $breed }}">{{ $breed }}</a></li>
            @endforeach
        </ul>
        @auth
            <a class="btn view-button float-end" href="{{ url('create') }}">New Pet Post</a>
        @endauth
    </section>
    <x-pet-card-row>
        <x-pet-card :pets="$pets" :breeds="$breeds" :typeOfPets="$type_of_pets" :type="$type" />
    </x-pet-card-row>
</x-layout>

<?php use App\Models\Pets; ?>

<x-layout>
    <h2>{{ $pet->name }}</h2>
    @if (($images = Pets::getImages($pet->id)) != null)
        @for ($i = 0; $i < count($images); $i++)
            <img src="{{ asset($images[$i]) }}" alt="Image of pet">
        @endfor
    @endif
</x-layout>

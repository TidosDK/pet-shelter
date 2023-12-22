<?php $title = 'About us'; ?>
<x-layout :title="$title">
    <p class="h2 text-center mt-4 mb-5">The Concept</p>
    <div class="text-center">
        <img src="{{ asset('storage/static/about-us.webp') }}" class="about-img-crop img-fluid"
            alt="Image of a family petting a dog" id="aboutus-image">
    </div>
    <br>
    <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
        aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
        dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
        deserunt mollit anim id est laborum.</p>
</x-layout>

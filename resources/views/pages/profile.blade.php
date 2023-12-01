<?php $title = 'Profile'; ?>

<x-layout :title="$title">
    <h1 class="lilita-one-font mt-4 mb-3">{{ $title }}</h1>

    <div class="Profile data lilita-one-font" id="dataForm">
        <form method="POST" action="/profile">
            @csrf
            <p class="mb-0 color-navy">{{ $errors->first('name') }}</p>
            <label class="color-blue">Display name: </label>
            <label>{{ auth()->user()->name }}</label><br>
            <br>
            <p class="mb-0 color-navy"">{{ $errors->first('email') }}</p>
            <label class="color-blue">E-mail: </label>
            <label>{{ auth()->user()->email }} </label><br>
            <br>
            <p class="mb-0 color-navy"">{{ $errors->first('phone') }}</p>
            <label class="color-blue">Phone number: </label>
            <label>{{ auth()->user()->phone }} </label><br>
            <div class="mt-4">
                <a class="btn view-button btn-lg" id="viewPost" href="{{ url('post-management') }}">View my posts</a>
                <button class="btn view-button btn-lg" type="button" id="editBtn">Edit</button>
            </div>
    </div>
    <div class="Edit profile lilita-one-font" id="editForm" style="display: none">

        <label class="color-blue">Display name: </label>
        <input type="text" name="name" value={{ auth()->user()->name }}><br>
        <br>
        <label class="color-blue">E-mail: </label>
        <input type="text" name="email" value={{ auth()->user()->email }}><br>
        <br>
        <label class="color-blue">Phone number: </label>
        <input type="text" name="phone" value={{ auth()->user()->phone }}><br>
        <div class="mt-4">
            <a class="btn view-button btn-lg" href="/post-management">View my posts</a>
            <input class="btn view-button btn-lg ml-2" type="submit" value="save">
        </div>
        </form>
    </div>
	<script src="{{ asset('js/profile-script.js') }}"></script>
</x-layout>

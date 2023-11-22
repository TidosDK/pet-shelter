<?php $title = "Profile" ?>
<x-layout :title="$title">
    <h1 class="title-text">{{$title}}</h1>
    
    <div class="Profile data">
        <h2>Name: {{{auth()->user()->name}}} </h2> 
        <h2>E-mail: {{{auth()->user()->email}}}</h2>
        <h2>Phone: {{{auth()->user()->phone}}}</h2>
    </div>
    
    <a class="btn view-button btn-lg" href="/pets">View my posts</a>
    <a class="btn view-button btn-lg" href="/update-info">Update credentials</a>
</x-layout>
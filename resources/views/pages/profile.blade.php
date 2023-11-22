<?php $title = "Profile" ?>
<x-layout :title="$title">
    <h1 class="title-text">{{$title}}</h1>
    
    <div class="Profile data">
        <form>
            <label>Display name: </label>
            <label>{{{auth()->user()->name}}}</label><br>
            <br>
            <label>E-mail: </label>
            <label>{{{auth()->user()->email}}} </label><br>
        </form>
    </div>

    <div class="Edit profile">
        <form>
            <label>Display name: </label>
            <input type="text" value={{{auth()->user()->name}}}><br>
            <br>
            <label>E-mail: </label>
            <input type="text" value={{{auth()->user()->email}}}><br>
        </form>
    </div>
    
    <a class="btn view-button btn-lg" href="/post-management">View my posts</a>
</x-layout>
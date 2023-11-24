<?php $title = "Profile" ?>
<x-layout :title="$title">
    <h1 class="title-text">{{$title}}</h1>
    
    <div class="Profile data" id="dataForm">
        <form method="POST" action="/profile">
            @csrf
            <label>Display name: </label>
            <label>{{{auth()->user()->name}}}</label><br>
            <br>
            <label>E-mail: </label>
            <label>{{{auth()->user()->email}}} </label><br>
            <input type="text" name="prevName" style="display: none" value={{{auth()->user()->name}}}>
            <input type="text" name="prevEmail" style="display: none" value={{{auth()->user()->email}}}>
    </div>
    <div class="Edit profile" id="editForm" style="display: none">
            
            <label>Display name: </label>
            <input type="text" name="name" value={{{auth()->user()->name}}}><br>
            <br>
            <label>E-mail: </label>
            <input type="text" name="email" value={{{auth()->user()->email}}}><br>
            <input name="ChristiansMor" type="submit">
        </form>
    </div>
    
    <script>
        function edit(){
            var displayDiv = document.getElementById("dataForm")
            var editDiv = document.getElementById("editForm");
            var editBut = document.getElementById("edit button");
            

            if(editDiv.style.display === "none"){
                editDiv.style.display = "block";
                displayDiv.style.display = "none";
                editBut.innerHTML = "save";
                editBut.type = "submit";
                editBut.form = "editForm";
            }
            else{
                editDiv.style.display = "none";
                displayDiv.style.display = "block";
                editBut.innerHTML = "edit";
                editBut.type = "button";
            }
        }
    </script>
    <a class="btn view-button btn-lg" href="/post-management">View my posts</a>
    <a class="btn view-button btn-lg" id="edit button" onclick="edit()" form="editForm">Edit</a>
    
</x-layout>
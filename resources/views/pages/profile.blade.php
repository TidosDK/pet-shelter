<?php $title = "Profile" ?>
<x-layout :title="$title">
    <h1 class="lilita-one-font">{{$title}}</h1>
    
    <div class="Profile data lilita-one-font" id="dataForm">
        <form method="POST" action="/profile">
            @csrf
            <label>Display name: </label>
            <label>{{{auth()->user()->name}}}</label><br>
            <br>
            <label>E-mail: </label>
            <label>{{{auth()->user()->email}}} </label><br>
            <br>
            <label>Phone number: </label>
            <label>{{{auth()->user()->phone}}} </label><br>
            <input type="text" name="prevName" style="display: none" value={{{auth()->user()->name}}}>
            <input type="text" name="prevEmail" style="display: none" value={{{auth()->user()->email}}}>
            <a class="btn view-button btn-lg" id="viewPost" href="/post-management">View my posts</a>
            <a class="btn view-button btn-lg" id="edit" onclick="edit()" form="editForm">Edit</a>
    </div>
    <div class="Edit profile lilita-one-font" id="editForm" style="display: none">
            
            <label>Display name: </label>
            <input type="text" name="name" value={{{auth()->user()->name}}}><br>
            <br>
            <label>E-mail: </label>
            <input type="text" name="email" value={{{auth()->user()->email}}}><br>
            <br>
            <label>Phone number: </label>
            <input type="text" name="phone" value={{{auth()->user()->phone}}}><br>
            <a class="btn view-button btn-lg" href="/post-management">View my posts</a>
            <input class="btn view-button btn-lg" name="ChristiansMor" type="submit" value="save">
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
                viewPost.style.display = "none";
                edit.style.display = "none";
                
            }
            else{
                editDiv.style.display = "none";
                displayDiv.style.display = "block";
                editBut.innerHTML = "edit";
                editBut.type = "button";
            }
        }
    </script>
    
    
</x-layout>
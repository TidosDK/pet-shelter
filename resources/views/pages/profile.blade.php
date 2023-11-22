<?php $title = "Profile" ?>
<x-layout :title="$title">
    <h1 class="title-text">{{$title}}</h1>
    
    <div class="Profile data" id="dataForm">
        <form>
            <label>Display name: </label>
            <label>{{{auth()->user()->name}}}</label><br>
            <br>
            <label>E-mail: </label>
            <label>{{{auth()->user()->email}}} </label><br>
        </form>
    </div>

    <div class="Edit profile" id="editForm" style="display: none">
        <form>
            <label>Display name: </label>
            <input type="text" value={{{auth()->user()->name}}}><br>
            <br>
            <label>E-mail: </label>
            <input type="text" value={{{auth()->user()->email}}}><br>
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
            }
            else{
                editDiv.style.display = "none";
                displayDiv.style.display = "block";
                editBut.innerHTML = "edit";
            }
        }
    </script>
    <a class="btn view-button btn-lg" href="/post-management">View my posts</a>
    <a class="btn view-button btn-lg" id="edit button" onclick="edit()">Edit</a>
    
</x-layout>
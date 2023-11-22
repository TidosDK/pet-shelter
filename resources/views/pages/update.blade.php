<link rel="stylesheet" href="{{ asset('css/form.css') }}">

<?php $title = "Profile" ?>
<x-layout :title="$title">
    
    <div class="form-container">
        <h1 class="lilita-one-font text-center">Happy Tails !</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="lilita-one-font card-title text-center">Welcome to Happy Tails !</h5>
                
                <hr class="form-hr">

                <h5 class="playpen-bold-font card-text">Information</h5>

                <form method="POST" action="/update">
                    @csrf
                    <label class="playpen-font card-text">Display name :</label>
                    <p class="card-error-text">{{$errors->first('name')}}</p>
                    <br>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">

                    <label class="playpen-font card-text">Email :</label>
                    <p class="card-error-text">{{$errors->first('email')}}</p>
                    <br>
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                    
                    <div class="submit-holder">
                        <input type="submit" class="btn btn-primary" value="Sign up">
                    </div>
                </form>

                <hr class="form-hr">
            </div>
        </div>
    </div>
</x-layout>
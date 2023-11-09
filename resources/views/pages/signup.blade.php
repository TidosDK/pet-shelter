<link rel="stylesheet" href="{{ asset('css/form.css') }}">

<?php $title = "Signup" ?>
<x-layout :title="$title">
    <div class="form-container">
        <h1 class="lilita-one-font text-center">Happy Tails !</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="lilita-one-font card-title text-center">Welcome to Happy Tails !</h5>
                
                <hr class="form-hr">

                <h5 class="playpen-bold-font card-text">Sign up</h5>

                <form method="POST" action="/signup">
                    @csrf
                    <label for="name" class="playpen-font card-text">Display name :</label>
                    <br>
                    <input type="text" class="form-control" name="name">
                    <label for="email" class="playpen-font card-text">Email :</label>
                    <br>
                    <input type="email" class="form-control" name="email">
                    <label for="password" class="playpen-font card-text">Password :</label>
                    <br>
                    <input type="password" class="form-control" name="password">
                    <label for="password_confirmation" class="playpen-font card-text">Repeat password :</label>
                    <br>
                    <input type="password" class="form-control" name="password_confirmation">
                    <div class="submit-holder">
                        <input type="submit" class="btn btn-primary" value="Sign up">
                    </div>
                </form>

                <hr class="form-hr">

                <p class="playpen-font card-text" style="margin-bottom: 0px">Already have an account ?</p>
                <a href="/login" class="link">Log in</a>
            </div>
        </div>
    </div>
</x-layout>

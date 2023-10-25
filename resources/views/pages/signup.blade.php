<link rel="stylesheet" href="{{ asset('css/form.css') }}">

<x-layout>
    <h1 class="title-text">Happy Tails !</h1>
    <div class="panel">
        <p class="flair-text">Welcome to Happy Tails !</p>

        <hr class="hr-break">

        <form method="POST" action="/signup">
            @csrf
            <!-- Form for submiting signup information (Display name field, Email field, Password field, Repeat password field, Login button) -->
            <label for="name" class="prompt-text">Display name :</label>
            <input type="text" class="input-field" name="name">
            <label for="email" class="prompt-text">Email :</label>
            <input type="email" class="input-field" name="email">
            <label for="password" class="prompt-text">Password :</label>
            <input type="password" class="input-field" name="password">
            <label for="password_confirmation" class="prompt-text">Repeat password :</label>
            <input type="password" class="input-field" name="password_confirmation">
            <div class="submit-holder">
                <input type="submit" class="submit-button" value="Sign up">
            </div>
        </form>

        <hr class="hr-break">

        <p class="small-text">Already have an account ?</p>
        <div class="submit-holder">
            <a class="submit-button-only-text" href="/login">Log in</a>
        </div>

    </div>
</x-layout>

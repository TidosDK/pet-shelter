<link rel="stylesheet" href="{{ asset('css/form.css') }}">

<x-layout>
    <div>
        <h1 class="title-text">Happy Tails !</h1>
        <div class="panel">
            <p class="flair-text">Welcome to Happy Tails !</p>

            <hr class="hr-break">

            <form method="POST" action="/signup">
                @csrf
                <!-- Form for submiting signup information (Display name field, Email field, Password field, Repeat password field, Login button) -->
                <p class="prompt-text">Display name :</p>
                <input type="text" class="input-field" name="name">
                <p class="prompt-text">Email :</p>
                <input type="email" class="input-field" name="email">
                <p class="prompt-text">Password :</p>
                <input type="password" class="input-field" name="password">
                <p class="prompt-text">Repeat password :</p>
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
    </div>
</x-layout>

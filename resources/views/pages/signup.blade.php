
<link rel="stylesheet" href="{{ asset('css/form.css') }}">

<x-layout>
    <div>
        <h1 class="title-text">Happy Tails !</h1>
        <div class="panel">
            <p class="flair-text">Welcome to Happy Tails !</p>

            <hr class="hr-break">

            <form method="POST" action="/"> <!-- Form for submiting signup information (Display name field, Email field, Password field, Repeat password field, Login button) -->
                <p class="prompt-text">Display name :</p>
                <input type="text" class="input-field">    
                <p class="prompt-text">Email :</p>
                <input type="email" class="input-field">
                <p class="prompt-text">Password :</p>
                <input type="password" class="input-field">
                <p class="prompt-text">Repeat password :</p>
                <input type="password" class="input-field">
                <div class="submit-holder">
                    <input type="submit" class="submit-button" value="Sign up">
                </div>
            </form>

            <hr class="hr-break">
            
            <form method="GET" action="/login"> <!-- Redirection to login page -->
            <p class="small-text">Already have an account ?</p>
            <div class="submit-holder">
                <input type="submit" class="submit-button-only-text" value="Log in">
            </div>
            </form>

        </div>
    </div>
</x-layout>
<link rel="stylesheet" href="{{ asset('css/form.css') }}">

<x-layout>
    <div>
        <h1 class="title-text">Happy Tails !</h1>
        <div class="panel">
            <p class="flair-text">Happy tails make happy tales !</p>
            
            <hr class="hr-break">
            
            <form method="POST" action="/login"> <!-- Form for submiting login information (Email field, Password field, Login button) -->
                <p class="prompt-text">Email :</p>
                <input type="email" class="input-field">
                <p class="prompt-text">Password :</p>
                <input type="password" class="input-field">
                <div class="submit-holder">
                    <input type="submit" class="submit-button" value="Log in">
                </div>
            </form>

            <form method="GET" action="/reset_password"> <!-- Redirection to forgot password page -->
                <div class="submit-holder">
                    <input type="submit" class="submit-button-only-text" value="Forgot password">
                </div>
            </form>
            <hr class="hr-break">
            
            <form method="GET" action="/signup"> <!-- Redirection to create account page -->
            <p class="small-text">Don't already have an account ?</p>
            <div class="submit-holder">
                <input type="submit" class="submit-button-only-text" value="Create account">
            </div>
            </form>

        </div>
    </div>
</x-layout>

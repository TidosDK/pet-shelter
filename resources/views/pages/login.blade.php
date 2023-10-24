<link rel="stylesheet" href="{{ asset('css/form.css') }}">

<x-layout>
    <div>
        <h1 class="title-text">Happy Tails !</h1>
        <div class="panel">
            <p class="flair-text">Happy tails make happy tales !</p>

            <hr class="hr-break">

            <form method="POST" action="/login">
                <!-- Form for submiting login information (Email field, Password field, Login button) -->
                @csrf
                <p class="prompt-text">Email :</p>
                <input type="email" class="input-field" name="email">
                <p class="prompt-text">Password :</p>
                <input type="password" class="input-field" name="password">
                <div class="submit-holder">
                    <input type="submit" class="submit-button" value="Log in">
                </div>
            </form>

            <div class="submit-holder">
                <a class="submit-button-only-text" href="/forgotPassword">Forgot Password</a>
            </div>
            <hr class="hr-break">

            <p class="small-text">Don't already have an account ?</p>
            <div class="submit-holder">
                <a class="submit-button-only-text" href="/signup">Create account</a>
            </div>

        </div>
    </div>
</x-layout>

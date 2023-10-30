<link rel="stylesheet" href="{{ asset('css/form.css') }}">

<x-layout>
    <div class="form-container">
        <h1 class="fs-1 text-center">Happy Tails !</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">Happy tails make happy tales !</h5>

                <form method="POST" action="/login">
                    @csrf
                    <p class="card-text" style="margin-bottom: 0px">Email</p>
                    <input type="email" class="form-control" name="email">
                    <p class="card-text" style="margin-bottom: 0px">Password</p>
                    <input type="password" class="form-control" name="password">
                    <input type="submit" class="btn btn-primary" value="Log in">
                </form>
                <a href="/signup" class="link">Forgot password</a>

                <p class="card-text" style="margin-bottom: 0px">Don't alreadt have an account?</p>
                <a href="/signup" class="link">Create account</a>
            </div>
        </div>
    </div>
</x-layout> 

<!--
<x-layout>
    <h1 class="title-text">Happy Tails !</h1>
    <div class="panel">
        <p class="flair-text">Happy tails make happy tales !</p>

        <hr class="hr-break">

        <form method="POST" action="/login">
            @csrf
            <label for="email" class="prompt-text">Email :</label>
            <input type="email" class="input-field" name="email">
            <label for="password" class="prompt-text">Password :</label>
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
</x-layout>


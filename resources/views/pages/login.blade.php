<link rel="stylesheet" href="{{ asset('css/form.css') }}">

<?php $title = 'Login'; ?>
<x-layout :title="$title">
    <div class="form-container">
        <h1 class="lilita-one-font text-center color-navy">Happy Tails !</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="lilita-one-font card-title text-center">Happy tails make happy tales !</h5>
                <hr class="form-hr">
                <h5 class="playpen-bold-font card-text">Log in</h5>

                <form method="POST" action="/login">
                    @csrf
                    <label for="email" class="playpen-font card-text">Email :</label>
                    <p class="card-error-text">{{ $errors->first('email') }}</p>
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                    <label for="password" class="playpen-font card-text">Password :</label>
                    <p class="card-error-text">{{ $errors->first('password') }}</p>
                    <input type="password" class="form-control" name="password">
                    <input type="submit" class="btn btn-primary" value="Log in">
                </form>
                <a href="{{ url('reset-password') }}" class="link">Forgot password</a>

                <hr class="form-hr">

                <p class="playpen-font card-text" style="margin-bottom: 0px">Don't already have an account ?</p>
                <a href="{{ url('signup') }}" class="link">Create account</a>
            </div>
        </div>
    </div>
</x-layout>

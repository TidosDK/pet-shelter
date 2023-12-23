<?php $title = 'Signup'; ?>
<x-layout :title="$title">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    <section class="form-container">
        <h1 class="lilita-one-font text-center color-navy">Happy Tails !</h1>
        <section class="card">
            <div class="card-body">
                <article>
                    <h5 class="lilita-one-font card-title text-center">Welcome to Happy Tails !</h5>
                    <hr class="form-hr">
                </article>
                <article>

                    <h5 class="playpen-bold-font card-text" id="signup-title">Sign up</h5>
                    <form method="POST" action="{{ url('signup') }}">
                        @csrf
                        <label class="playpen-font card-text">Display name :</label>
                        <p class="card-error-text">{{ $errors->first('name') }}</p>
                        <br>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        <label class="playpen-font card-text">Email :</label>
                        <p class="card-error-text">{{ $errors->first('email') }}</p>
                        <br>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                        <label class="playpen-font card-text">Password :</label>
                        <p class="card-error-text">{{ $errors->first('password') }}</p>
                        <br>
                        <input type="password" class="form-control" name="password">
                        <label class="playpen-font card-text">Repeat password :</label>
                        <br>
                        <input type="password" class="form-control" name="password_confirmation">
                        <div class="submit-holder">
                            <input type="submit" class="btn btn-primary login-button-card mb-2" value="Sign up">
                        </div>
                    </form>
                    <hr class="form-hr">
                </article>
                <article>
                    <p class="playpen-font card-text mb-0">Already have an account ?</p>
                    <a href="{{ url('login') }}" class="link">Log in</a>
                </article>
            </div>
        </section>
    </section>
</x-layout>

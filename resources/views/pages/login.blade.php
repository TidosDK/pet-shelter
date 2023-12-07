<?php $title = 'Login'; ?>
<x-layout :title="$title">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    @if (session()->has('message'))
        <div class="alert alert-success mt-4" id="show-for-five-seoncds" role="alert">
            {{ session('message') }}
        </div>
        <script src="{{ asset('js/show-for-five-seconds.js') }}"></script>
    @endif
    <section class="form-container">
        <h1 class="lilita-one-font text-center color-navy">Happy Tails !</h1>
        <section class="card">
            <div class="card-body">
                <article>
                    <h5 class="lilita-one-font card-title text-center">Happy tails make happy tales !</h5>
                    <hr class="form-hr">
                </article>
                <article>
                    <h5 class="playpen-bold-font card-text">Log in</h5>
                    <form method="POST" action="{{ url('login') }}">
                        @csrf
                        <label for="email" class="playpen-font card-text">Email :</label>
                        <p class="card-error-text">{{ $errors->first('email') }}</p>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                        <label for="password" class="playpen-font card-text">Password :</label>
                        <p class="card-error-text">{{ $errors->first('password') }}</p>
                        <input type="password" class="form-control" name="password">
                        <input type="submit" class="btn btn-primary login-button-card mb-3" value="Log in">
                    </form>
                    <a href="{{ url('reset-password') }}" class="link">Forgot password</a>
                    <hr class="form-hr">
                </article>
                <article>
                    <p class="playpen-font card-text mb-0">Don't already have an account ?</p>
                    <a href="{{ url('signup') }}" class="link">Create account</a>
                </article>
            </div>
        </section>
    </section>
</x-layout>

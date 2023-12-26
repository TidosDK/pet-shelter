<?php $title = 'password-confirm'; ?>
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
                    <h5 class="playpen-bold-font card-text">Confirm Password</h5>
                    <form method="POST" action="{{ url('user/confirm-password') }}">
                        @csrf
                        <label for="password" class="playpen-font card-text">Password :</label>
                        <p class="card-error-text">{{ $errors->first('password') }}</p>
                        <input type="password" class="form-control" name="password">

                        <input type="submit" class="btn btn-primary login-button-card mb-3" value="Log in">
                    </form>
                </article>
            </div>
        </section>
    </section>
</x-layout>

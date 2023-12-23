<?php $title = 'Password reset'; ?>
<x-layout :title="$title">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    <section class="form-container">
        <h1 class="lilita-one-font text-center color-navy">Happy Tails !</h1>
        <section class="card">
            <div class="card-body">
                <article>
                    <h5 class="lilita-one-font card-title text-center" id="reset-password-title">Reset password</h5>
                    <hr class="form-hr">
                </article>
                <article>
                    <h5 class="playpen-bold-font card-text">Oh no...</h5>
                    <p class="playpen-font card-text mb-2">
                        - 'Now is not the time to use that!'
                    </p>
                    <p class="playpen-font card-text mb-2">
                        It seems like this feature is outside of our scope.
                    </p>
                    <p class="playpen-font card-text mb-0">
                        Please contact our customer service, so that we can ensure that
                        nothing more is done about your complaint.
                    </p>
                    <hr class="form-hr">
                </article>
                <article>
                    <p class="playpen-font card-text mb-0">Divine intervention made you remember ?</p>
                    <a href="{{ url('login') }}" class="link">Return to login</a>
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

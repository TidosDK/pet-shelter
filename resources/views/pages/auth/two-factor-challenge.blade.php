<?php $title = 'two-factor-challenge'; ?>
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
                @if(session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                <article>
                    <h5 class="playpen-bold-font card-text">Confirm Two Factor Code</h5>
                    <form method="POST" action="{{ url('/two-factor-challenge') }}">
                        @csrf
                        <input type="text" class="playpen-font card-text form-control" name="code"/>
                        <input type="submit" id="submit" class="btn btn-primary login-button-card mb-3" type="submit" value="Confirm">
                    </form>
                </article>
            </div>
        </section>
    </section>
</x-layout>

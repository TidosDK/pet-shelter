<?php
$title = 'Profile';
?>

<x-layout :title="$title">
    <h1 class="lilita-one-font mt-4 mb-4">{{ $title }}</h1>

    <form method="POST" action="{{ url('profile') }}">
        <section class="lilita-one-font" id="dataForm">
            @csrf
            <p class="mb-3 color-navy">{{ $errors->first('name') }}</p>
            <label class="color-blue">Display name: </label>
            <label>{{ auth()->user()->name }}</label>
            <br>
            <p class="mb-3 color-navy">{{ $errors->first('email') }}</p>
            <label class="color-blue">E-mail: </label>
            <label>{{ auth()->user()->email }} </label>
            <br>
            <p class="mb-3 color-navy">{{ $errors->first('phone') }}</p>
            <label class="color-blue">Phone number: </label>
            <label>{{ auth()->user()->phone }} </label>
            <div class="mt-4">
                <a class="btn view-button btn-lg" id="viewPost" href="{{ url('post-management') }}">View my
                    posts</a>
                <button class="btn view-button btn-lg" type="button" id="editBtn">Edit</button>
            </div>
        
        </section>
        <section class="lilita-one-font edit-section-profile" id="editForm">

            <label class="mb-3 color-blue">Display name: </label>
            <input type="text" name="name" value={{ auth()->user()->name }}>
            <br>
            <label class="mb-3 color-blue">E-mail: </label>
            <input type="text" name="email" value={{ auth()->user()->email }}>
            <br>
            <label class="mb-3 color-blue">Phone number: </label>
            <input type="text" name="phone" value={{ auth()->user()->phone }}>
            <div class="mt-4">
                <a class="btn view-button btn-lg" href="{{ url('post-management') }}">View my posts</a>
                <input class="btn view-button btn-lg ml-2" type="submit" value="save">
            </div>
        </section>
    </form>
    <div class="card-body">
        @if (! auth()->user()->two_factor_secret)
            Ya not enabled
            <form method="POST" action="{{ url('user/two-factor-authentication') }}">
                @csrf
                <button type="submit" class="btn view-button btn-lg">
                    Enable
                </button>
            </form>
        @else
            Ya enabled
            <form method="POST" action="{{ url('user/two-factor-authentication') }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn view-button btn-lg">
                    Disable
                </button>
            </form>
        @endif

        @if(session('status') == 'two-factor-authentication-enabled')
            <p>Ya now enabled 2fa, ya now scan code to phone auth app
            {!! auth()->user()->twoFactorQrCodeSvg() !!}

            <p>Store these recovery code safely
            @foreach (json_decode(decrypt(auth()->user()->two_factor_recovery_codes, true)) as $code)
                {{ trim($code) }} <br>
            @endforeach
        @endif

    </div>
    <script src="{{ asset('js/profile-script.js') }}"></script>
</x-layout>

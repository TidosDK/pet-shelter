<?php $title = 'Frontpage'; ?>
<x-layout :title="$title">
    @if (session()->has('message'))
        <div class="alert alert-success mt-4" id="show-for-five-seoncds" role="alert">
            {{ session('message') }}
        </div>
        <script src="{{ asset('js/show-for-five-seconds.js') }}"></script>
    @endif
    <div class="text-center cropped mt-5">
        <img src="https://www.americanhumane.org/app/uploads/2016/08/shutterstock_162633491.jpg"
            class="img-fluid cropped-img" alt="Frontpage image" id="frontpage-image">
    </div>
    <h2 class="text-center mt-5">View a selection of all our pets</h2>
    <hr class="hr-new mt-5">
    <section class="text-center mt-5">
        <div class="row">
            <div class="col"> <a class="btn view-button btn-lg" href="{{ url('pets/dog') }}">View dogs</a>
            </div>
            <div class="col">
                <a class="btn view-button btn-lg" href="{{ url('pets/cat') }}">View cats</a>
            </div>
            <div class="col">
                <a class="btn view-button btn-lg" href="{{ url('pets') }}">View other pets</a>
            </div>
        </div>
    </section>
</x-layout>

<?php $title = 'Frontpage'; ?>
<x-layout :title="$title">

    <div class="text-center cropped mt-5">
        <img src="https://www.americanhumane.org/app/uploads/2016/08/shutterstock_162633491.jpg" class="img-fluid cropped-img"
            alt="front pic">
    </div>
    <h2 class="text-center mt-5">View a selection of all our pets</h2>
    <hr class="hr-new mt-5">
    <div class="container text-center mt-5 mb-5">
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
    </div>
</x-layout>

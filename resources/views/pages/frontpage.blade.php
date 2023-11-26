<?php $title = 'Frontpage'; ?>
<x-layout :title="$title">

    <div class="text-center cropped mt-5" style="background-color: #BADEE3">
        <img src="{{ asset('storage/static/front-page.webp') }}" class="img-fluid cropped-img" alt="front pic">
    </div>
    <h2 class="text-center mt-5">View a selection of all our pets</h2>
    <hr class="hr-new mt-5">
    <div class="container text-center mt-5">
        <div class="row">
            <div class="col"> <a class="btn view-button btn-lg" href="/pets/dog">View dogs</a>
            </div>
            <div class="col">
                <a class="btn view-button btn-lg" href="/pets/cat">View cats</a>
            </div>
            <div class="col">
                <a class="btn view-button btn-lg" href="/pets">View other pets</a>
            </div>
        </div>
    </div>
</x-layout>

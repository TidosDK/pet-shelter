<?php
$title = 'Pet';
use App\Models\Pets;
?>

<x-layout :title="$title">
    <div id="topColums" class="row mt-5">
        @auth
            @if ($pet->users_id == Auth::user()->id)
                <section class="mb-5 p-2 bg-color-cyan rounded-2">
                    <h4 class="playpen-bold-font mb-3">Hello {{ auth()->user()->name }}, this is your own post</h4>
                    <a style="text-decoration:none" href="{{ url('edit/' . $pet->id) }}"><button
                            class="btn login-button inline" style="margin-right: 10px; width: 80px;">Edit</button></a>
                    <form class="inline" method="post" action="{{ url('delete-post') }}">
                        @csrf
                        <input type="hidden" name="petId" value={{ $pet->id }}>
                        {{-- This value is changeable through browser tools, but all id's are checked against the authenticated user so you can't delete posts without proper ownership --}}
                        <button type="submit" class="btn login-button inline" style="width: 80px">Delete</button>
                    </form>
                    <h5 class="mt-2">{{ session()->get('error') }}</h5>
                </section>
            @endif
        @endauth
        <section id="carouselExampleControls" class="carousel carousel-dark slide carousel-crop"
            data-bs-ride="carousel">
            <div class="carousel-inner">
                @if (($images = Pets::getImages($pet->id)) != null)
                    <?php $active = 'active'; ?>
                    @for ($i = 0; $i < count($images); $i++)
                        <div class="carousel-item <?php echo $active; ?>">
                            <img class="d-block carousel-image" src="{{ asset($images[$i]) }}" alt="Image of pet">
                        </div>
                        <?php $active = ''; ?>
                    @endfor
                @else
                    <div class="carousel-item active">
                        <img class="d-block carousel-image" src="{{ asset('storage/pet_images/placeholder.webp') }}"
                            alt="Image of pet">
                    </div>
                @endif
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon carousel-control-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <span class="carousel-control-next-icon carousel-control-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </section>
        <section class="col">
            <h2>{{ $pet->name }}</h2>
            <br>
            <h5>Price: {{ $pet->price }} DKK</h5>
            <br>
            <h4>Description</h4>
            <p>{{ $pet->description }}</p>
            <br>
            <h5>Location</h5>
            <p>{{ $pet->location }}</p>
            <br>
            <button onclick="goToSellerFunction()" id="scrollDownBtn" class="btn login-button">Contact seller</button>
        </section>
        <section class="about-img-crop center mt-5">
            <h2 class="text-center mb-3">Information</h2>
            <div class="row blue-white lilita-one-font text-size24">
                <div class="col-8">Age</div>
                <div class="col-4 text-right">{{ $pet->age_in_months }} months</div>
            </div>
            <div class="row lilita-one-font text-size24">
                <div class="col-8">Sex</div>
                <div class="col-4 text-right">{{ $pet->sex }}</div>
            </div>
            <div class="row blue-white lilita-one-font text-size24">
                <div class="col-8">Breed</div>
                <div class="col-4 text-right">{{ $pet->breed->breed }}</div>
            </div>
            <div class="row lilita-one-font text-size24">
                <div class="col-8">Weight</div>
                <div class="col-4 text-right">{{ $pet->weight }} kg</div>
            </div>
            <div class="row blue-white lilita-one-font text-size24">
                <div class="col-8">Castrated/Neutered</div>
                <div class="col-4 text-right">{{ $pet->castrated == true ? 'Yes' : 'No' }}</div>
            </div>
            <div class="row lilita-one-font text-size24">
                <div class="col-8">Can live with other animals</div>
                <div class="col-4 text-right">{{ $pet->multipleAnimalsFriendly == true ? 'Yes' : 'No' }}</div>
            </div>
            <div class="row blue-white lilita-one-font text-size24">
                <div class="col-8">Can live with kids</div>
                <div class="col-4 text-right">{{ $pet->kidFriendly == true ? 'Yes' : 'No' }}</div>
            </div>
        </section>
        @if (Auth::guest() || (Auth::user() && $pet->users_id != Auth::user()->id))
            <section id="contactFormDiv" class="center about-img-crop mt-5">
                <h2 class="text-center mb-4">Contact seller</h2>
                <form>
                    <div class="form-group">
                        <label>Email you wish to recive response:</label>
                        <input class="form-control" id="email">
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Message:</label>
                        <textarea class="form-control" id="message" rows="3"></textarea>
                    </div>
                </form>
                <button onclick="sendContactMail()" type="button"
                    class="btn btn-block login-button about-img-crop center mt-3 mb-5">Send
                    message</button>
            </section>
            <script src="{{ asset('js/scripts.js') }}"></script>
        @endif
</x-layout>

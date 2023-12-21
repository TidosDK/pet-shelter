<?php
$title = 'Pet';
use App\Models\Pets;
?>

<script src="{{ asset('js/scripts.js') }}"></script>
<script src="{{ asset('js/reaction.js') }}"></script>

<x-layout :title="$title">
    <section id="alert-message-area">
    </section>
    <section id="topColums" class="row mt-5">
        @auth
            @if ($pet->users_id == Auth::user()->id)
                <section class="mb-5 p-2 bg-color-cyan rounded-2">
                    <h4 class="playpen-bold-font mb-3">Hello {{ auth()->user()->name }}, this is your own post</h4>
                    <a class="btn btn-primary login-button ps-3 pe-3" href="{{ url('edit/' . $pet->id) }}">
                        <p class="mb-0">Edit</p>
                    </a>
                    <form class="inline" method="post" action="{{ url('delete-post') }}">
                        @csrf
                        <input type="hidden" name="petId" value={{ $pet->id }}>
                        {{-- This value is changeable through browser tools, but all id's are checked against the authenticated user so you can't delete posts without proper ownership --}}
                        <button type="submit" class="btn login-button inline ps-3 pe-3">Delete</button>
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


            <div class="center w-50 text-center mt-3" id="LikeContainer">
                <div class="reaction-image-container mt-2 mb-3">
                    <div class="inline reaction-image-container">
                        <img id="like-image" class="reaction-image" src="{{ asset('storage/static/like.png') }}">
                        <label class="playpen-bold-font" for="like-image">{{$likes}}</label>
                    </div>
                    <div class="inline reaction-image-container">
                        <img id="heart-image" class="reaction-image" src="{{ asset('storage/static/heart.png') }}">
                        <label class="playpen-bold-font" for="heart-image">{{$hearts}}</label>
                    </div>
                    <div class="inline reaction-image-container">
                        <img id="star-image" class="reaction-image" src="{{ asset('storage/static/superstar.png') }}">
                        <label class="playpen-bold-font" for="star-image">{{$stars}}</label>
                    </div>
                </div>
                <p class="mt-2 playpen-bold-font">{{ session()->get('react_error') }}</p>
                @auth
                    @if ($pet->users_id != auth()->user()->id)
                        @if ($current_reaction == null)
                        <input id="like-button" class="w-50 like-button playpen-bold-font" type="button" value="Like">

                        <div id="reaction-buttons" class="reaction-button-container mt-2">
                            <form class="inline" method="post" action="{{ url('react') }}">
                                @csrf
                                <input type="hidden" name="pet_id" value={{ $pet->id }}>
                                <input type="hidden" name="reaction_type" value="like">
                                <input type="image" class="reaction-button" src="{{ asset('storage/static/like.png') }}">
                            </form>
                            <form class="inline" method="post" action="{{ url('react') }}">
                                @csrf
                                <input type="hidden" name="pet_id" value={{ $pet->id }}>
                                <input type="hidden" name="reaction_type" value="heart">
                                <input type="image" class="reaction-button" src="{{ asset('storage/static/heart.png') }}">
                            </form>
                            <form class="inline" method="post" action="{{ url('react') }}">
                                @csrf
                                <input type="hidden" name="pet_id" value={{ $pet->id }}>
                                <input type="hidden" name="reaction_type" value="star">
                                <input type="image" class="reaction-button" src="{{ asset('storage/static/superstar.png') }}">
                            </form>
                        </div>
                        @else
                            <form class="inline" method="post" action="{{ url('unreact') }}">
                                @csrf
                                <input type="hidden" name="pet_id" value={{ $pet->id }}>
                                @if ($current_reaction == 'like')
                                    <input type="image" class="unreaction-button" src="{{ asset('storage/static/like.png') }}">
                                @endif
                                @if ($current_reaction == 'heart')
                                    <input type="image" class="unreaction-button" src="{{ asset('storage/static/heart.png') }}">
                                @endif
                                @if ($current_reaction == 'star')
                                    <input type="image" class="unreaction-button" src="{{ asset('storage/static/superstar.png') }}">
                                @endif
                            </form>
                        @endif
                    @else
                        <p class="playpen-bold-font">You cannot like your own post</p>
                    @endif
                @endauth
            </div>


        </section>
        <section class="col mb-5">
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
            @if (Auth::guest() || (Auth::user() && $pet->users_id != Auth::user()->id))
                <button id="scrollDownBtn" class="btn login-button">Contact
                    seller</button>
            @endif
        </section>
        <section class="about-img-crop center mt-5">
            <h2 class="text-center mb-3">Information</h2>
            <div class="row blue-white lilita-one-font text-size24">
                <div class="col-8 information-text">Age</div>
                <div class="col-4 text-right information-text">{{ $pet->age_in_months }} months</div>
            </div>
            <div class="row lilita-one-font text-size24">
                <div class="col-8 information-text">Sex</div>
                <div class="col-4 text-right information-text">{{ $pet->sex }}</div>
            </div>
            <div class="row blue-white lilita-one-font text-size24">
                <div class="col-8 information-text">Breed</div>
                <div class="col-4 text-right information-text">{{ $pet->breed->breed }}</div>
            </div>
            <div class="row lilita-one-font text-size24">
                <div class="col-8 information-text">Weight</div>
                <div class="col-4 text-right information-text">{{ $pet->weight }} kg</div>
            </div>
            <div class="row blue-white lilita-one-font text-size24">
                <div class="col-8 information-text">Castrated/Neutered</div>
                <div class="col-4 text-right information-text">{{ $pet->castrated == true ? 'Yes' : 'No' }}</div>
            </div>
            <div class="row lilita-one-font text-size24">
                <div class="col-8 information-text">Can live with other animals</div>
                <div class="col-4 text-right information-text">{{ $pet->multipleAnimalsFriendly == true ? 'Yes' : 'No' }}</div>
            </div>
            <div class="row blue-white lilita-one-font text-size24">
                <div class="col-8 information-text">Can live with kids</div>
                <div class="col-4 text-right information-text">{{ $pet->kidFriendly == true ? 'Yes' : 'No' }}</div>
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
                <button id="sendMessageBtn" type="button"
                    class="btn btn-block login-button about-img-crop center mt-3 mb-5">Send
                    message</button>
            </section>
        @endif
    </section>
</x-layout>

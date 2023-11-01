<?php use App\Models\Pets; ?>
<script src="{{ asset ('js/scripts.js')}}"></script>
<x-layout>
    <div class="row mt-5">
        <div class="col">
            <div id="carouselExampleIndicators" class="carousel slide carousel-crop" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    @if (($images = Pets::getImages($pet->id)) != null)
                        @for ($i = 0; $i < count($images); $i++)
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="{{ asset($images[$i]) }}" alt="Image of pet">
                            </div>
                        @endfor
                    @endif
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col">
            <h2>{{ $pet->name }}</h2>
            <br>
            <h4>Description</h4>
            <p>{{$pet->description}}</p>
            <br>
            <button onclick="goToSellerFunction()" id="scrollDownBtn" class="btn login-button">Contact seller</button>
        </div>
        <h2 class="text-center mt-5">Information</h2>
        <div class="about-img-crop center mt-3">
            <div class="row blue-white lilita-one-font text-size24">
                <div class="col-8">Price</div>
                <div class="col-4 text-right">{{ $pet->price }}</div>
            </div>
            <div class="row lilita-one-font text-size24">
                <div class="col-8">Age</div>
                <div class="col-4 text-right">{{ $pet->age_in_months }} months</div>
            </div>
            <div class="row blue-white lilita-one-font text-size24">
                <div class="col-8">Sex</div>
                <div class="col-4 text-right">{{ $pet->sex }}</div>
            </div>
            <div class="row lilita-one-font text-size24">
                <div class="col-8">Breed</div>
                <div class="col-4 text-right">{{ $pet->breed->breed }}</div>
            </div>
            <div class="row blue-white lilita-one-font text-size24">
                <div class="col-8">Weight</div>
                <div class="col-4 text-right">{{ $pet->weight }} kg</div>
            </div>
            <div class="row lilita-one-font text-size24">
                <div class="col-8">Castrated/Neutered</div>
                <div class="col-4 text-right">{{ $pet->castrated }}</div>
            </div>
            <div class="row blue-white lilita-one-font text-size24">
                <div class="col-8">Can live with other animals</div>
                <div class="col-4 text-right">{{ $pet->multipleAnimalsFriendly }}</div>
            </div>
            <div class="row lilita-one-font text-size24">
                <div class="col-8">Can live with kids</div>
                <div class="col-4 text-right">{{ $pet->castrated }}</div>
            </div>
        </div>
        <h2 class="text-center mt-5">Contact seller</h2>
        <div id="contactFormDiv" class="center about-img-crop mt-3">
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
        </div>
        <button type="button" class="btn btn-block login-button about-img-crop center mt-3 mb-5">Send message</button>
        
</x-layout>

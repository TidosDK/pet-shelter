<?php use App\Models\Pets; ?>
<script src="{{ asset('js/scripts.js') }}"></script>
<x-layout>
    <div id="alert-message-area">

    </div>

    <div id="topColums" class="row mt-5">
        <div id="carouselExampleControls" class="carousel slide carousel-crop" data-bs-ride="carousel">
            <div class="carousel-inner">
                @if (($images = Pets::getImages($pet->id)) != null)
                    <?php $active = 'active'; ?>
                    @for ($i = 0; $i < count($images); $i++)
                        <div class="carousel-item <?php echo $active; ?>">
                            <img class="d-block w-100" src="{{ asset($images[$i]) }}" alt="Image of pet">
                        </div>
                        <?php $active = ''; ?>
                    @endfor
                @else
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="{{ asset('storage/pet_images/placeholder.jpg') }}"
                            alt="Image of pet">
                    </div>
                @endif
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="col">
            <h2>{{ $pet->name }}</h2>
            <br>
            <h4>Description</h4>
            <p>{{ $pet->description }}</p>
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
        <button onclick="sendContactMail()" type="button"
            class="btn btn-block login-button about-img-crop center mt-3 mb-5">Send
            message</button>

</x-layout>

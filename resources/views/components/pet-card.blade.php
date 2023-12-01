@props(['pets', 'breeds', 'typeOfPets', 'type'])

<?php use App\Models\Pets; ?>

@foreach ($pets as $pet)
    @if (
        $type == 'all' ||
            strtolower($typeOfPets->find($pet->type_id)->type) == strtolower($type) ||
            ($type == '' &&
                strtolower($typeOfPets->find($pet->type_id)->type) != strtolower('Dog') &&
                strtolower($typeOfPets->find($pet->type_id)->type) != strtolower('Cat')))
        @if (isset($_GET['gender']) && $pet->sex != $_GET['gender'])
            @continue
        @endif
        @if (isset($_GET['breed']) && $pet->breed->breed != $_GET['breed'])
            @continue
        @endif
        <div class="col">
            <div class="card">
                <div style="transform: rotate(0);">
                    @if (($images = Pets::getImages($pet->id)) != null)
                        <img src="{{ asset($images[0]) }}" class="card-img-top" alt="Image of pet">
                    @else
                        <img src="{{ asset('storage/pet_images/placeholder.webp') }}" class="card-img-top"
                            alt="Image of pet">
                    @endif
                    <div class="card-body">
                        <h4 class="card-title"><a href="/pet/{{ $pet->id }}"
                                class="text-decoration-none text-dark stretched-link">{{ $pet->name }}</a></h4>
                        <hr>
                        <p clasS="card-text mb-1"><strong>Months old: </strong>{{ $pet->age_in_months }}</p>
                        <p class="card-text mb-1"><strong>Breed: </strong>{{ $breeds->find($pet->breeds_id)->breed }}
                        </p>
                        <p clasS="card-text mb-1"><strong>Sex: </strong>{{ $pet->sex }}</p>
                        <p clasS="card-text mt-3 h6"><strong>Price: </strong>{{ $pet->price }} DKK</p>
                    </div>
                </div>
                @auth
                    @if ($pet->users_id == Auth::user()->id && $type == 'all')
                        <div class="row" style="margin: auto">
                            <div class="col">
                                <a class="btn btn-primary login-button" href="{{ url('edit/' . $pet->id) }}">
                                    <p class=" mb-0">Edit</p>
                                </a>
                                <form class="inline" method="post" action="/delete-post">
                                    @csrf
                                    <input type="hidden" name="petId" value={{ $pet->id }}>
                                    <button type="submit" class="btn login-button inline">Delete</button>
                                </form>
                                <h5 class="mt-2">{{ session()->get('error') }}</h5>
                            </div>
                        </div>
                    @endif
                @endauth
            </div>
        </div>
    @endif
@endforeach

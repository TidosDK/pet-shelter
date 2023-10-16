@props(['pets', 'breeds', 'typeOfPets', 'type'])

@foreach ($pets as $pet)
    @if (strtolower($typeOfPets->find($pet->type_of_pets_id)->type) == strtolower($type) ||
            ($type == '' &&
                strtolower($typeOfPets->find($pet->type_of_pets_id)->type) != strtolower('Dog') &&
                strtolower($typeOfPets->find($pet->type_of_pets_id)->type) != strtolower('Cat')))
        <div class="col">
            <div class="card">
                {{-- <?php dd($pet); ?> --}}
                <img src="{{ asset('storage/pet_images/placeholder.jpg') }}" class="card-img-top" alt="Image of pet">
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
        </div>
    @endif
@endforeach

<?php
$title = 'Create';
?>

<x-layout :title="$title">
    <link rel="stylesheet" href="{{ asset('css/post.css') }}">
    <h1 class="page-title mb-4">New pet post</h1>
    <form method="POST" action="/create" enctype="multipart/form-data">
        @csrf
        <section class="row text-center">
            <section class="left-box col">
                <div class="card" style="width: 28rem;">
                    <img src="{{ asset('storage/pet_images/placeholder.webp') }}" class="card-img-top"
                        alt="Placeholder image">
                    <div class="card-body">
                        <h5 class="card-title">Image</h5>
                        <div class="mb-3">
                            @error('petImage')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                            <input type="file" class="form-control" id="petImage" name="petImage">
                        </div>
                    </div>
                </div>
            </section>

            <section class="general-info right-box col">
                @error('name')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
                <div class="input-group mb-3">
                    <span class="input-group-text input-group-text-naw">Name</span>
                    <div class="form-floating">
                        <input type="name" class="form-control" id="petName" value="{{ old('name') }}"
                            name="name">
                        <label for="petName">Please enter pet name</label>
                    </div>
                </div>

                @error('age_in_months')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
                <div class="input-group mb-3">
                    <span class="input-group-text input-group-text-naw">Age</span>
                    <div class="form-floating">
                        <input type="number" class="form-control" id="petAge" value="{{ old('age_in_months') }}"
                            name="age_in_months">
                        <label for="petAge">Please enter pets age (months)</label>
                    </div>
                </div>

                @error('weight')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
                <div class="input-group mb-3">
                    <span class="input-group-text input-group-text-naw">Weight</span>
                    <div class="form-floating">
                        <input type="number" class="form-control" id="petWeight" value="{{ old('weight') }}"
                            name="weight">
                        <label for="petWeight">Please enter the weight (kg)</label>
                    </div>
                </div>

                @error('sex')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
                <div class="form-floating form-list">
                    <select class="form-select" id="genderSelect" aria-label="Floating label select example"
                        name="sex">
                        <option selected
                            value=@if (old('sex') == '') Other @else {{ old('sex') }} @endif>
                            @if (old('sex') == '')
                                Other
                            @else
                                {{ old('sex') }}
                            @endif
                        </option>
                        <option value="Female">Female</option>
                        <option value="Male">Male</option>
                    </select>
                    <label for="genderSelect">Select which Sex</label>
                </div>

                @error('type_id')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
                <div class="form-floating form-list">
                    <select class="form-select" id="animalList" aria-label="Floating label select example"
                        name="type_id">
                        <option selected>None</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}">{{ $type->type }}</option>
                        @endforeach
                    </select>
                    <label for="animalList">Select Animal</label>
                </div>

                <div class="form-floating form-list">
                    <select class="form-select outside" id="breedList" aria-label="Default select example"
                        name="breeds_id">
                        <option selected>None</option>
                        @foreach ($breeds as $breed)
                            <option value="{{ $breed->id }}">{{ $breed->breed }}</option>
                        @endforeach
                    </select>
                    <label for="breedList">Select breed</label>
                </div>

                @error('castrated')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
                <div class="form-check form-check-reverse">
                    <input class="form-check-input" type="checkbox" value="" id="castrateCheck"
                        @if (old('castrated')) checked @endif name="castrated">
                    <label class="form-check-label" for="castrateCheck">
                        Is your pet Castrated?
                    </label>
                </div>

                @error('multipleAnimalsFriendly')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
                <div class="form-check form-check-reverse">
                    <input class="form-check-input" type="checkbox" value="" id="multipleAnimalsFriendlyCheck"
                        @if (old('castrated')) checked @endif name="multipleAnimalsFriendly">
                    <label class="form-check-label" for="multipleAnimalsFriendlyCheck">
                        Can your pet live with other pets?
                    </label>
                </div>

                @error('kidFriendly')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
                <div class="form-check form-check-reverse">
                    <input class="form-check-input" type="checkbox" value="" id="kidFriendlyCheck"
                        @if (old('castrated')) checked @endif name="kidFriendly">
                    <label class="form-check-label" for="kidFriendlyCheck">
                        Can your pet live with kids?
                    </label>
                </div>
            </section>
        </section>

        <section class="row mb-5 animal-info text-center">
            <section class="col mt-3">
                <div class="form-floating outside">
                    <textarea class="form-control" placeholder="Leave a comment here" id="pickupLocation" style="height: 100px"
                        name="location">{{ old('location') }}</textarea>
                    <label for="pickupLocation">Location</label>
                </div>

                <div class="form-floating outside">
                    <textarea class="form-control" placeholder="Leave a comment here" id="petComment" style="height: 100px"
                        name="description">{{ old('description') }}</textarea>
                    <label for="petComment">Comments</label>
                </div>

                @error('price')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
                <div class="input-group outside">
                    <span class="input-group-text">Price DKK:</span>
                    <input type="number" aria-label="Price" id="price" class="form-control"
                        value="{{ old('price') }}" name="price">
                    <button class="btn btn-outline-secondary " type="submit" id="inputGroupFileAddon04">Create
                        post</button>
                </div>
            </section>
        </section>
    </form>
</x-layout>

<?php
$title = 'Edit';
use App\Models\Pets;
?>

<x-layout :title="$title">
    <link rel="stylesheet" href="{{ asset('css/post.css') }}">
    <h1 class="page-title mb-4" id="edit-post-title">Edit pet post</h1>
    <form method="POST" action="{{ url('edit') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" value="{{ $pet->id }}" name="petId">
        <section class="row text-center">
            <section class="left-box col create-post-image-section">
                <div class="card">
                    @if (($images = Pets::getImages($pet->id)) != null)
                        <img src="{{ asset($images[0]) }}" class="card-img-top" alt="Image of pet">
                    @else
                        <img src="{{ asset('storage/pet_images/placeholder.webp') }}" class="card-img-top"
                            alt="Image of pet">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">Image</h5>
                        <div class="mb-3">
                            <input type="file" class="form-control" id="petImage" name="petImage">
                        </div>
                    </div>
                </div>
            </section>


            <section class="general-info right-box col">
                <p>{{ $errors->first('name') }}</p>
                <div class="input-group mb-3">
                    <span class="input-group-text input-group-text-naw">Name</span>
                    <div class="form-floating">
                        <input type="name" class="form-control" id="petName" name="name"
                            value="{{ $pet->name }}">
                        <label for="petName">Please enter the name</label>
                    </div>
                </div>

                <p>{{ $errors->first('age_in_months') }}</p>
                <div class="input-group mb-3">
                    <span class="input-group-text input-group-text-naw">Age</span>
                    <div class="form-floating">
                        <input type="number" class="form-control" id="petAge" name="age_in_months"
                            value="{{ $pet->age_in_months }}">
                        <label for="petAge">Please enter the Age</label>
                    </div>
                </div>

                <p>{{ $errors->first('weight') }}</p>
                <div class="input-group mb-3">
                    <span class="input-group-text input-group-text-naw">Weight</span>
                    <div class="form-floating">
                        <input type="number" class="form-control" id="petWeight" name="weight"
                            value="{{ $pet->weight }}">
                        <label for="petWeight">Please enter the weight</label>
                    </div>

                </div>

                <p>{{ $errors->first('sex') }}</p>
                <div class="form-floating form-list">
                    <select class="form-select" id="genderSelect" aria-label="Floating label select example"
                        name="sex">
                        <option selected value={{ $pet->sex }}>{{ $pet->sex }}</option>
                        <option value="Other">Other</option>
                        <option value="Female">Female</option>
                        <option value="Male">Male</option>
                    </select>
                    <label for="genderSelect">Select which Sex</label>
                </div>

                <p>{{ $errors->first('type_id') }}</p>
                <div class="form-floating form-list">
                    <select class="form-select" id="animalList" aria-label="Floating label select example"
                        name="type_id">
                        <option value="{{ $pet->type_id }}" selected>
                            {{ $types->find($pet->type_id)->type }}
                        </option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}">{{ $type->type }}</option>
                        @endforeach
                    </select>
                    <label for="animalList">Select which Animal</label>
                </div>
                <div class="form-floating form-list">
                    <select class="form-select outside" id="breedList" aria-label="Default select example"
                        name="breeds_id">
                        <option value="{{ $pet->breeds_id }}" selected>
                            {{ $breeds->find($pet->breeds_id)->breed }}
                        </option>
                        @foreach ($breeds as $breed)
                            <option value="{{ $breed->id }}">{{ $breed->breed }}</option>
                        @endforeach
                    </select>
                    <label for="breedList">Select breed</label>
                </div>

                <p>{{ $errors->first('castrated') }}</p>
                <div class="form-check form-check-reverse">
                    <input class="form-check-input" type="checkbox" @if ($pet->castrated) checked @endif
                        id="castrateCheck" name="castrated">
                    <label class="form-check-label" for="castrateCheck">
                        Is your pet Castrated?
                    </label>
                </div>

                <p>{{ $errors->first('multipleAnimalsFriendly') }}</p>
                <div class="form-check form-check-reverse">
                    <input class="form-check-input" type="checkbox" @if ($pet->multipleAnimalsFriendly) checked @endif
                        id="multipleAnimalsFriendlyCheck" name="multipleAnimalsFriendly">
                    <label class="form-check-label" for="multipleAnimalsFriendlyCheck">
                        Can your pet live with other pets?
                    </label>
                </div>

                <p>{{ $errors->first('kidFriendly') }}</p>
                <div class="form-check form-check-reverse">
                    <input class="form-check-input" type="checkbox" @if ($pet->kidFriendly) checked @endif
                        id="kidFriendlyCheck" name="kidFriendly">
                    <label class="form-check-label" for="kidFriendlyCheck">
                        Can your pet live with kids?
                    </label>
                </div>
            </section>
        </section>

        <section class="row mb-5 text-center">
            <section class="col mt-3">
                <div class="form-floating outside">
                    <textarea class="form-control textarea-section" placeholder="Location of the pet" id="pickupLocation" name="location">{{ $pet->location }}</textarea>
                    <label for="pickupLocation">Location</label>
                </div>

                <div class="form-floating outside">
                    <textarea class="form-control textarea-section" placeholder="Description" id="petComment"
                        name="description">{{ $pet->description }}</textarea>
                    <label for="petComment">Description</label>
                </div>

                <p>{{ $errors->first('price') }}</p>
                <div class="input-group outside">
                    <span class="input-group-text">Price DKK:</span>
                    <p>{{ $errors->first('price') }}</p>
                    <input type="number" aria-label="Price" id="price" class="form-control" name="price"
                        value="{{ $pet->price }}">
                    <button class="btn btn-outline-secondary " type="submit" id="inputGroupFileAddon04">Save
                        changes</button>
                </div>
            </section>
        </section>
    </form>
</x-layout>

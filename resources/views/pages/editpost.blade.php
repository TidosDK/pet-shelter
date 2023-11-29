<link rel="stylesheet" href="{{ asset('css/post.css') }}">
<?php $title = 'Edit'; ?>
<x-layout :title="$title">
    <h1 class="page-title mb-4">Edit pet post</h1>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <div>
        <form method="POST" action="/edit">

            <div class="animal-info box container text-center">
                <div class="row">
                    <div class="left-box col">
                        <div class="card" style="max-width: 28rem;">
                            <img src="{{ asset('storage/pet_images/placeholder.webp') }}" class="card-img-top"
                                alt="<-fuck this shit">
                            <div class="card-body">
                                <h5 class="card-title">Images</h5>
                                <div class="mb-3">
                                    <input class="form-control" type="file" id="formFile">
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" value="{{ $pet->id }}" name="petId">

                    <div class="general-info right-box col">
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
                                <input type="text" class="form-control" id="petAge" name="age_in_months"
                                    value="{{ $pet->age_in_months }}">
                                <label for="petAge">Please enter the Age</label>
                            </div>
                        </div>

                        <p>{{ $errors->first('weight') }}</p>
                        <div class="input-group mb-3">
                            <span class="input-group-text input-group-text-naw">Weight</span>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="petWeight" name="weight"
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
                            <input class="form-check-input" type="checkbox"
                                @if ($pet->castrated) checked @endif id="castrateCheck" name="castrated">
                            <label class="form-check-label" for="castrateCheck">
                                Is your pet Castrated?
                            </label>
                        </div>

                        <p>{{ $errors->first('multipleAnimalsFriendly') }}</p>
                        <div class="form-check form-check-reverse">
                            <input class="form-check-input" type="checkbox"
                                @if ($pet->multipleAnimalsFriendlyCheck) checked @endif id="multipleAnimalsFriendlyCheck"
                                name="multipleAnimalsFriendly">
                            <label class="form-check-label" for="multipleAnimalsFriendlyCheck">
                                Can your pet live with other pets?
                            </label>
                        </div>

                        <p>{{ $errors->first('kidFriendly') }}</p>
                        <div class="form-check form-check-reverse">
                            <input class="form-check-input" type="checkbox"
                                @if ($pet->kidFriendly) checked @endif id="kidFriendlyCheck"
                                name="kidFriendly">
                            <label class="form-check-label" for="kidFriendlyCheck">
                                Can your pet live with kids?
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">

                        <div class="form-floating outside">
                            <textarea class="form-control" placeholder="Leave a comment here" id="petComment" style="height: 100px"
                                name="description">{{ $pet->description }}</textarea>
                            <label for="petComment">Comments</label>
                        </div>

                        <div class="form-floating outside">
                            <textarea class="form-control" placeholder="Set Location" id="pickupLocation" style="height: 100px"
                                name="location">{{ $pet->location }}</textarea>
                            <label for="pickupLocation">Location</label>
                        </div>

                        <p>{{ $errors->first('price') }}</p>
                        <div class="input-group outside">
                            <span class="input-group-text">Price</span>
                            <p>{{ $errors->first('price') }}</p>
                            <input type="text" aria-label="Price" id="price" class="form-control"
                                name="price" value="{{ $pet->price }}">
                            <button class="btn btn-outline-secondary " type="submit" id="inputGroupFileAddon04">Save
                                changes</button>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
</x-layout>

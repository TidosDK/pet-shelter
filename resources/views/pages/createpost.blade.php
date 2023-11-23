<link rel="stylesheet" href="{{ asset('css/post.css') }}">
<?php $title = 'Create'; ?>
<x-layout :title="$title">
    <h1 class="page-title">information</h1>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <div>
        <form method="POST" action="/create">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="animal-info box">
                <div class="left-box">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('storage/pet_images/placeholder.jpg') }}" class="card-img-top"
                            alt="<-fuck this shit">
                        <div class="card-body">
                            <h5 class="card-title">Images</h5>
                            <div class="mb-3">
                                <input class="form-control" type="file" id="formFile">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="general-info right-box">
                    <div class="input-group mb-3">
                        <span class="input-group-text input-group-text-naw">Name</span>
                        <p>{{ $errors->first('name') }}</p>
                        <div class="form-floating">
                            <input type="name" class="form-control" id="petName" placeholder="Username"
                                name="name">
                            <label for="petName">Please enter the name</label>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text input-group-text-naw">Age</span>
                        <p>{{ $errors->first('age_in_months') }}</p>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="petAge" placeholder="Username"
                                name="age_in_months">
                            <label for="petAge">Please enter the Age</label>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text input-group-text-naw">Weight</span>
                        <p>{{ $errors->first('weight') }}</p>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="petWeight" placeholder="Username"
                                name="weight">
                            <label for="petWeight">Please enter the weight</label>
                        </div>
                    </div>

                    <div class="form-floating form-list">
                        <select class="form-select" id="genderSelect" aria-label="Floating label select example"
                            name="sex">
                            <option selected>None</option>
                            <option value="1">Female</option>
                            <option value="2">Male</option>
                        </select>
                        <label for="genderSelect">Select which Sex</label>
                    </div>

                    <div class="form-floating form-list">
                        <select class="form-select" id="animalList" aria-label="Floating label select example"
                            name="type_of_pets_id">
                            <option selected>None</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}">{{ $type->type }}</option>
                            @endforeach
                        </select>
                        <label for="animalList">Select which Animal</label>
                    </div>

                    <div class="form-check form-check-reverse">
                        <input class="form-check-input" type="checkbox" value="" id="castrateCheck"
                            name="castrated">
                        <label class="form-check-label" for="castrateCheck">
                            Is your pet Castrated?
                        </label>
                    </div>

                    <div class="form-check form-check-reverse">
                        <input class="form-check-input" type="checkbox" value="" id="multipleAnimalsFriendlyCheck"
                            name="multipleAnimalsFriendly">
                        <label class="form-check-label" for="multipleAnimalsFriendlyCheck">
                            Can your pet live with other pets?
                        </label>
                    </div>

                    <div class="form-check form-check-reverse">
                        <input class="form-check-input" type="checkbox" value="" id="kidFriendlyCheck"
                            name="kidFriendly">
                        <label class="form-check-label" for="kidFriendlyCheck">
                            Can your pet live with kids?
                        </label>
                    </div>

                </div>
                <div class="outside-box">
                    <select class="form-select outside" id="breedList" aria-label="Default select example"
                        name="breeds_id">
                        <option selected>Select Breed</option>
                        @foreach ($breeds as $breed)
                            <option value="{{ $breed->id }}">{{ $breed->breed }}</option>
                        @endforeach
                    </select>

                    <div class="form-floating outside">
                        <textarea class="form-control" placeholder="Leave a comment here" id="petComment" style="height: 100px"
                            name="description"></textarea>
                        <label for="petComment">Comments</label>
                    </div>

                    <div class="form-floating outside">
                        <textarea class="form-control" placeholder="Leave a comment here" id="pickupLocation" style="height: 100px"
                            name="location"></textarea>
                        <label for="pickupLocation">Location</label>
                    </div>

                    <div class="input-group outside">
                        <span class="input-group-text">Price$</span>
                        <p>{{ $errors->first('price') }}</p>
                        <input type="text" aria-label="Price" id="price" class="form-control"
                            name="price">
                        <button class="btn btn-outline-secondary " type="submit" id="inputGroupFileAddon04">Create
                            post</button>
                    </div>
                </div>

            </div>
        </form>
    </div>
</x-layout>

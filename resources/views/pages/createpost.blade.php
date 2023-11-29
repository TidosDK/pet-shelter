<link rel="stylesheet" href="{{ asset('css/post.css') }}">
<?php $title = 'Create'; ?>
<x-layout :title="$title">
    <h1 class="page-title mb-4">New pet post</h1>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <div>
        <form method="POST" action="/create">
            @csrf

            <div class="animal-info box container text-center">
                <div class="row">
                    <div class="left-box col">
                        <div class="card" style="max-width: 28rem;">
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

                    <div class="general-info right-box col">
                        <p>{{ $errors->first('name') }}</p>
                        <div class="input-group mb-3">
                            <span class="input-group-text input-group-text-naw">Name</span>
                            <div class="form-floating">
                                <input type="name" class="form-control" id="petName" value="{{ old('name') }}"
                                    name="name">
                                <label for="petName">Please enter pet name</label>
                            </div>
                        </div>

                        <p>{{ $errors->first('age_in_months') }}</p>
                        <div class="input-group mb-3">
                            <span class="input-group-text input-group-text-naw">Age</span>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="petAge" value="{{ old('age_in_months') }}"
                                    name="age_in_months">
                                <label for="petAge">Please enter pet age</label>
                            </div>
                        </div>

                        <p>{{ $errors->first('weight') }}</p>
                        <div class="input-group mb-3">
                            <span class="input-group-text input-group-text-naw">Weight</span>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="petWeight" value="{{ old('weight') }}"
                                    name="weight">
                                <label for="petWeight">Please enter the weight</label>
                            </div>
                        </div>

                        <p>{{ $errors->first('sex') }}</p>
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

                        <p>{{ $errors->first('type_id') }}</p>
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
    
                        <p>{{ $errors->first('castrated') }}</p>
                        <div class="form-check form-check-reverse">
                            <input class="form-check-input" type="checkbox" value="" id="castrateCheck"
                                @if (old('castrated')) checked @endif name="castrated">
                            <label class="form-check-label" for="castrateCheck">
                                Is your pet Castrated?
                            </label>
                        </div>

                        <p>{{ $errors->first('multipleAnimalsFriendly') }}</p>
                        <div class="form-check form-check-reverse">
                            <input class="form-check-input" type="checkbox" value="" id="multipleAnimalsFriendlyCheck"
                                @if (old('multipleAnimalsFriendly')) checked @endif name="multipleAnimalsFriendly">
                            <label class="form-check-label" for="multipleAnimalsFriendlyCheck">
                                Can your pet live with other pets?
                            </label>
                        </div>

                        <p>{{ $errors->first('kidFriendly') }}</p>
                        <div class="form-check form-check-reverse">
                            <input class="form-check-input" type="checkbox" value="" id="kidFriendlyCheck"
                                @if (old('kidFriendly')) checked @endif name="kidFriendly">
                            <label class="form-check-label" for="kidFriendlyCheck">
                                Can your pet live with kids?
                            </label>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-floating">
                            <select class="form-select outside" id="breedList" aria-label="Default select example"
                                name="breeds_id" value="Something">
                                <option selected>None</option>
                                @foreach ($breeds as $breed)
                                    <option value="{{ $breed->id }}">{{ $breed->breed }}</option>
                                @endforeach
                            </select>
                            <label for="breedList">Select Breed</label>
                        </div>
    
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
    
                        <p>{{ $errors->first('price') }}</p>
                        <div class="input-group outside">
                            <span class="input-group-text">Price$</span>
                            <input type="text" aria-label="Price" id="price" class="form-control"
                                value="{{ old('price') }}" name="price">
                            <button class="btn btn-outline-secondary " type="submit" id="inputGroupFileAddon04">Create post</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-layout>

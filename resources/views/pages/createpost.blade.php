<link rel="stylesheet" href="{{ asset('css/post.css') }}">

<x-layout>
    <h1 class="page-title">information</h1>

    <div>
        <form method="POST" action="/create">
            @csrf
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
                        <div class="form-floating">
                            <input type="name" class="form-control" id="floatingInputGroup1" placeholder="Username" name="pet-name">
                            <label for="floatingInputGroup1">Please enter the name</label>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text input-group-text-naw">Age</span>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingInputGroup1" placeholder="Username" name="pet-age">
                            <label for="floatingInputGroup1">Please enter the Age</label>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text input-group-text-naw">Weight</span>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingInputGroup1" placeholder="Username" name="pet-weight">
                            <label for="floatingInputGroup1">Please enter the weight</label>
                        </div>
                    </div>

                    <div class="form-floating form-list">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="pet-sex">
                            <option selected>Sex</option>
                            <option value="1">Female</option>
                            <option value="2">Male</option>
                            <option value="3">Other</option>
                        </select>
                        <label for="floatingSelect">Select which Sex</label>
                    </div>

                    <div class="form-floating form-list">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="pet-animal">
                            <option selected>Animal</option>
                            <option value="1">Incoming</option>
                        </select>
                        <label for="floatingSelect">Select which Animal</label>
                    </div>

                    <div class="form-check form-check-reverse">
                        <input class="form-check-input" type="checkbox" value="" id="reverseCheck1" name="pet-castrated">
                        <label class="form-check-label" for="reverseCheck1">
                            Is your pet Castrated?
                        </label>
                    </div>

                    <div class="form-check form-check-reverse">
                        <input class="form-check-input" type="checkbox" value="" id="reverseCheck1" name="pet-live-other">
                        <label class="form-check-label" for="reverseCheck1">
                            Can your pet live with other pets?
                        </label>
                    </div>

                    <div class="form-check form-check-reverse">
                        <input class="form-check-input" type="checkbox" value="" id="reverseCheck1" name="pet-live-kids">
                        <label class="form-check-label" for="reverseCheck1">
                            Can your live with kids?
                        </label>
                    </div>

                </div>
                <div class="outside-box">
                    <select class="form-select outside" aria-label="Default select example" name="pet-breed">
                        <option selected>Select Breed</option>
                        <option value="1">Something</option>
                        <option value="2">Fox</option>
                        <option value="3">Labradore</option>
                    </select>

                    <div class="form-floating outside">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="pet-comments"></textarea>
                        <label for="floatingTextarea2">Comments about why</label>
                    </div>

                    <div class="input-group outside">
                        <span class="input-group-text">Price$</span>
                        <input type="text" aria-label="First name" class="form-control" name="pet-price">
                        <button class="btn btn-outline-secondary " type="button" id="inputGroupFileAddon04">Create post</button>
                      </div>
                </div>

            </div>
        </form>
    </div>
</x-layout>

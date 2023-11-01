<link rel="stylesheet" href="{{ asset('css/post.css')}}">

<x-layout>
    <h1 class="page-title">information</h1>

    <div>
        <form method="POST" action="/create">
            @csrf
            <div class="animal-info box">
                <div class="picture-box left-box">
                    <label for="picture" class="picture">Picture</label>
                </div>
                <div class="general-info right-box">
                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="inputGroup-sizing-lg">Name</span>
                        </div>
                        <input type="text" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm">
                      </div>
                    <div class="age input-box">
                        <input type="text" class="age-input" placeholder="Age:">
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-layout>
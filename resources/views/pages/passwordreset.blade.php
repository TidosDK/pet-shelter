<link rel="stylesheet" href="{{ asset('css/form.css') }}">

<?php $title = "Password reset" ?>
<x-layout :title="$title">
    <div class="form-container">
        <h1 class="lilita-one-font text-center color-blackgreen">Happy Tails !</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="lilita-one-font card-title text-center">Reset password</h5>
                
                <hr class="form-hr">

                <h5 class="playpen-bold-font card-text">Oh no...</h5>
                <p class="playpen-font card-text" style="margin-bottom: 0px">
                    - 'Now is not the time to use that!'
                </p>
                <p class="playpen-font card-text" style="margin-bottom: 0px">
                    It seems like this feature is outside of our scope. 
                </p>
                <p class="playpen-font card-text" style="margin-bottom: 0px">
                    Please contact our customer service, so that we can ensure that 
                    nothing more is done about your complaint.
                </p>

                <hr class="form-hr">
                
                <p class="playpen-font card-text" style="margin-bottom: 0px">Divine intervention made you remember ?</p>
                <a href="/login" class="link">Return to login</a>

                <hr class="form-hr">

                <p class="playpen-font card-text" style="margin-bottom: 0px">Don't already have an account ?</p>
                <a href="/signup" class="link">Create account</a>
            </div>
        </div>
    </div>
</x-layout> 
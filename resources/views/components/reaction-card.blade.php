@props(['reactions', 'types_of_pets'])

<?php 
    use App\Models\Pets; 
    use App\Models\TypesOfLikes;
?>

@foreach ($reactions as $reaction)
    <div class="liked-pet-container w-50 mb-3 d-flex flex-row rounded-2">
        <div class="p-2">
            @php $pet_url = url('pet/'.$reaction->pet_id) @endphp
            <a href="{{$pet_url}}">
                @if (($images = Pets::getImages($reaction->pet_id)) != null)
                    <img src="{{ asset($images[0]) }}" class="reaction-card-pet-image rounded-2" alt="Image of pet">
                @else
                    <img src="{{ asset('storage/pet_images/placeholder.webp') }}" class="reaction-card-pet-image rounded-2" alt="Image of pet">
                @endif
            </a>
        </div>
        <div class="p-2 w-50">
            @php $pet_url = url('pet/'.$reaction->pet_id) @endphp
            <h4 class="playpen-bold-font mb-0">{{Pets::find($reaction->pet_id)->name}}</h4>
            <p class="playpen-bold-font mb-0">{{$types_of_pets->find(Pets::find($reaction->pet_id)->type_id)->type}}</p>
            <p class="playpen-font mb-0">{{$reaction->updated_at}}</p>
        </div>
        <div class="m-auto">
            <form class="inline" method="post" action="{{ url('unreact') }}">
                @csrf
                <input type="hidden" name="pet_id" value={{$reaction->pet_id}}>
                @php $image_path = asset('storage/static/reaction_images/'.TypesOfLikes::find($reaction->type_id)->type.'.png'); @endphp
                <input type="image" class="unreaction-button" src="{{$image_path}}">
            </form>
        </div>
    </div>
@endforeach
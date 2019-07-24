@foreach($tourTypes as $tourType)
<div class="pictogram">
    <a href="{{ route('search').'?tour_type='.$tourType->name }}" class="pictogram_link">
        <div class="pictogram_container">

            <svg class="pictogram_icon"  viewBox="0 0 23 21">
                <use xlink:href="#{{$tourType->icon}}"></use>
            </svg>

        </div>

    </a>
    <p class="pictogram_title">{{ $tourType->name }}</p>
    <div class="triangle mod_blue"></div>
    <div class="triangle mod_white"></div>

</div>
@endforeach

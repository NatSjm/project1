<div class="user authorized">

    <img class="user_avatar" src="/storage/{{ Auth::user()->avatar}}" alt="">


    <div class="user_profile-link">
        <span class="user_name"> {{ Auth::user()->fullName }}</span>
        @include(('components.popup.popup'))
    </div>

{{--    <a class="user_logout-link" href="{{route('logout')}}" onclick="event.preventDefault();--}}
{{--    document.getElementById('logout-form').submit();"><span class="user_logout">&#10150;</span></a>--}}

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

</div>

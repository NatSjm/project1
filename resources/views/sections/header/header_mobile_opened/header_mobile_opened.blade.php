
<div class="header-mobile mod_opened ">

    <div class="header_top">
        <nav class="min-nav">
            <ul class="min-nav_list">
                @foreach ($AllCategories as $category)
                <li class="min-nav_item"><a href="{{ route('search-page').'?category='.$category }}"
                                            class="min-nav_link">{{ $category }}</a></li>
                @endforeach
            </ul>
        </nav>
    </div>

    <div class="user-block">
        {{--<div class="user unauthorized">--}}
            @guest
                @include('components.user-block.user_unauthorized.user_unauthorized')
            @else
                @include(('components.user-block.user_authorized.user_authorized'))

            @endguest

            {{--<a href="" class="user_entry">Войти</a>--}}
        {{--</div>--}}
    </div>

    <div class="header_bottom">
        <a class="add-tour button mod_color-light-green" href="">+ Добавить тур</a>
    </div>

</div>

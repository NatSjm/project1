<header class="header full-size ">


    <div class="header_top">
        <nav class="main-nav">
            <ul class="main-nav_list">
                @foreach ($AllCategories as $category)
                    <li class="main-nav_item"><a href="{{ route('search').'?category='.$category }}"
                                                 class="main-nav_link">{{ $category }}</a></li>
                @endforeach
            </ul>
        </nav>

        @include('components.logo.logo')


        <button class="hamburger hamburger--spin" type="button">
        <span class="hamburger-box">
        <span class="hamburger-inner"></span>
        </span>
        </button>


        <div class="user-block">
            @guest
                @include('components.user-block.user_unauthorized.user_unauthorized')
            @else
                @include(('components.user-block.user_authorized.user_authorized'))

            @endguest
            @include('components.cart.cart')
        </div>
    </div>

    <div class="menu-mobile_wrapper">
        @include ('sections/header/header_mobile_opened/header_mobile_opened')
    </div>

    <div class="header_bottom">
        <div class="main-search">
            <form class="main-search_form" action="{{ route('search')}}">
                <input placeholder="Поиск предложений" type="search" name="search" value="{{request()->search}}"
                       class="ginput
                main-search_input">
                <button type="submit" class="main-search_submit">
                    <svg class="main-search_icon" viewBox="0 0 12 12">
                        <use xlink:href="#search"></use>
                    </svg>
                </button>
            </form>
        </div>
        <a class="add-tour mod_color-white" href="">+ Добавить тур</a>
    </div>

</header>

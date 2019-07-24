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
            @include('components.user-block.user_unauthorized.user_unauthorized')
            @include('components.cart.cart')
        </div>
    </div>

    <div class="menu-mobile_wrapper">
        @include ('sections/header/header_mobile_opened/header_mobile_opened')
    </div>

    <div class="header_bottom">
        <div class="search">
            <form action="">
                <input placeholder="Поиск предложений" type="search" class=" ginput search_input">
            </form>
        </div>
        <a class="add-tour mod_color-white" href="">+ Добавить тур</a>
    </div>

</header>

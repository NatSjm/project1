<header class="header full-size ">

    <div class="header_top">
        <nav class="main-nav">
            <ul class="main-nav_list">
                <li class="main-nav_item"><a href="" class="main-nav_link">Автобусные туры</a></li>
                <li class="main-nav_item"><a href="" class="main-nav_link">Авиационные туры</a></li>
                <li class="main-nav_item"><a href="" class="main-nav_link">Круизы</a></li>
            </ul>
        </nav>

        @include('components.logo.logo')

        <div class="menu-toggler">
            <svg class="menu_icon" viewBox="0 0 39 27">
                <use xlink:href="#gamburger"></use>
            </svg>
        </div>

        <div class="user-block">
            @include('components.user-block.user_authorized.user_authorized')
            @include('components.cart.cart')
        </div>
    </div>
    <div class="header_bottom">
        <div class="search">
            <form action="">
                <input placeholder="Поиск предложений" type="search" class=" input search_input">
            </form>
        </div>
        <a class="add-tour mod_color-white" href="">+ Добавить тур</a>
    </div>

</header>

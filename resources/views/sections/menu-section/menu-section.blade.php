<section class="gydeline-section menu-section">
    <h2 class="gydeline-headline-2"> 06. Меню</h2>
    <h3 class="gydeline-headline-3">Меню авторизованного пользователя</h3>

    @include('sections.header.header_full_authorized.header_full_authorized')

    <h3 class="gydeline-headline-3">Меню неавторизованного пользователя</h3>

    @include('sections.header.header_full_unauthorized.header_full_unauthorized')

    <h3 class="gydeline-headline-3">Меню - мобильная версия</h3>

    @include('sections.header.header_mobile_opened.header_mobile_opened')

    @include('sections.header.header_mobile_closed.header_mobile_closed')


</section>
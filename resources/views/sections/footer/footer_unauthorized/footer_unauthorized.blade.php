<footer class="full-size authorized footer">
    <a href="" class="mod_color-light-green button add-tour">+ Добавить тур</a>
    @guest
        @include('components.user-block.user_unauthorized.user_unauthorized')
    @else
        @include(('components.user-block.user_authorized.user_authorized'))
    @endguest


    <div class="copyright">
        <span>Design from Zirella</span>
        <span>&copy ColorLife, 2018</span>
    </div>
</footer>

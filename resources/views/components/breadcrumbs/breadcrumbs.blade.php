<ul class="breadcrumbs">
    <li class="breadcrumbs_item"><a href="#">Главная</a></li>
    @isset($crumb_level2)
    <li class="breadcrumbs_item"><a href="#">{{ $crumb_level2 }}</a></li>
    @endisset
    @isset($crumb_level3)

        @foreach ($crumb_level3 as $span)
            <span class="breadcrumbs_item mod_current">{{ $span }}</span>
        @endforeach

    @endisset
</ul>

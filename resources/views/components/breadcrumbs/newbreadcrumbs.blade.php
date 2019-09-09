@if (count($breadcrumbs))

    <ul class="breadcrumbs">

        @foreach ($breadcrumbs as $breadcrumb)

            @if ($breadcrumb->url && !$loop->last)
                <li class="breadcrumbs_item"><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
            @elseif($loop->last && (Request::route()->getName() == 'seller-page'))
                <li class="breadcrumbs_item"><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
                @if(request('user') == auth()->user())
                    <span class="breadcrumbs_item  mod_current">Мои предложения</span>
                @else
                    <span class="breadcrumbs_item  mod_current">Предложения продавца</span>
                @endif
            @else
                <span class="breadcrumbs_item  mod_current">{{ $breadcrumb->title }}</span>
            @endif

        @endforeach
    </ul>

@endif

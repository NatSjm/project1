@extends('layout')

@section('content')

    <div class="seller-page_content-wrapper cont">

        <div class="seller-page_breadcrumbs">
            @include('components.breadcrumbs.breadcrumbs', ['crumb_level2' => $seller->fullName])
        </div>

        @if(count($seller->belongingTours))

            @if((Auth::check()) && ($seller->id === Auth::id()))
                <h2 class="seller-page_title headline-2">Мои предложения</h2>
            @else
                <h2 class="seller-page_title headline-2">Предложения продавца</h2>
            @endif


            <div class="seller-page_main-content">
                <section class="filter">
                    <form class="filter_form" method="get" action="#" id="filter_form">

                        <label class="filter_title" for="filter_form">Категория</label>
                        <fieldset class="filter_fields">
                            <div class="filter_input">
                                <div class="checkbox">
                                    <input type="radio" class="checkbox_input" name="tour_type" value=""
                                           id="any-tourType">
                                    <label class="checkbox_label" for="any-tourType">Все категории</label>
                                </div>
                            </div>
                            @foreach ($AllTourTypesNames as $key=>$value)
                                <div class="filter_input">
                                    @include('./../components.checkboxes.radio',['checkbox_name' => 'tour_type',
                                                                    'checkbox_id' => 'tour_type'.$key,
                                                                     'checkbox_value' => $value,
                                                                     'checkbox_label' => $value,
                                                                     ])
                                </div>
                            @endforeach
                        </fieldset>

                    </form>
                </section>

                @if(count($sellerTours))
                    @include('sections.products.products', ['tours' => $sellerTours])
                @endif

            </div>
        @else
            <p>
                У данного пользователя еще нет объявлений
            </p>
        @endif
    </div>



@endsection



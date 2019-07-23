@extends('layout')

@section('content')

    <div class="seller-page_content-wrapper cont">

        <div class="seller-page_breadcrumbs">
        @include('components.breadcrumbs.breadcrumbs')
         </div>
        <h2 class="seller-page_title headline-2">Предложения продавца</h2>


        <div class="seller-page_main-content">
            <section class="filter">
                <form class="filter_form" method="get" action="#" id="filter_form">
                    @csrf
                    <label class="filter_title" for="filter_form">Категория</label>
                    <fieldset class="filter_fields">
                        @foreach ($tourTypes as $key=>$value)
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


            @include('sections.products.products', ['tours' => $sellerTours])


        </div>
    </div>



@endsection



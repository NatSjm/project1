@extends('layout')

@section('content')

    <div class="seller-page_content-wrapper cont">

        <div class="seller-page_breadcrumbs">
        @include('components.breadcrumbs.breadcrumbs')
         </div>
        <h2 class="seller-page_title headline-2">Мои предложения</h2>


        <div class="seller-page_main-content">
            <section class="filter">
                <form class="filter_form" action="#" id="filter_form">
                    @csrf
                    <label class="filter_title" for="filter_form">Категория</label>
                    <fieldset class="filter_fields">
                        @foreach ($categories as $key=>$value)
                            <div class="filter_input">
                            @include('./../components.checkboxes.checkbox',['checkbox_name' => 'category',
                                                            'checkbox_id' => $key,
                                                             'checkbox_value' => $key,
                                                             'checkbox_label' => $value
                                                             ])
                            </div>
                            @endforeach


                    </fieldset>

                </form>
            </section>


            @include('sections.products.products')

        </div>
    </div>



@endsection



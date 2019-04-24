@extends('layout')

@section('content')

    <div class="content_wrapper cont">
        @include('components.breadcrumbs.breadcrumbs')

        <h2 class="headline-2">Мои предложения</h2>


        <div class="main-content">
            <section class="filter">
                <form class="checkbox" action="#" id="filter_form">
                    <label class="filter_title" for="filter_form">Категория</label>
                    {{--<p class="filter_title">Категория</p>--}}
                    <fieldset class="filter_fields">

                        <input type="checkbox" class="checkbox_input" id="ind">
                        <label class="checkbox_label" for="ind">Индустриальный</label>

                        <input type="checkbox" class="checkbox_input" id="luxury">
                        <label class="checkbox_label" for="luxury">Luxury</label>

                        <input type="checkbox" class="checkbox_input" id="all-inclus">
                        <label class="checkbox_label" for="all-inclus">Все включено</label>

                        <input type="checkbox" class="checkbox_input" id="family">
                        <label class="checkbox_label" for="family">Семейный отдых</label>

                        <input type="checkbox" class="checkbox_input" id="gastro">
                        <label class="checkbox_label" for="gastro">Гастрономический</label>


                        <input type="checkbox" class="checkbox_input" id="keep-calm">
                        <label class="checkbox_label" for="keep-calm">Спокойный отдых</label>

                        <input type="checkbox" class="checkbox_input" id="intertainment">
                        <label class="checkbox_label" for="intertainment">Программа развлечений</label>

                        <input type="checkbox" class="checkbox_input" id="shopping">
                        <label class="checkbox_label" for="shopping">Шоппинг</label>

                        <input type="checkbox" class="checkbox_input" id="extreem">
                        <label class="checkbox_label" for="extreem">Экстрим</label>

                        <input type="checkbox" class="checkbox_input" id="beach">
                        <label class="checkbox_label" for="beach">Пляжный</label>

                        <input type="checkbox" class="checkbox_input" id="spa">
                        <label class="checkbox_label" for="spa">SPA</label>

                    </fieldset>

                </form>
            </section>

            <section class="products">
                <div class="products-list">
                    @for ($i = 0; $i < 12; $i++)
                        @include ('components.product-card.product-card')
                    @endfor
                </div>
                @include('components.pagination.pagination')
            </section>


        </div>
    </div>



@endsection



@extends('layout')

@section('content')

    <div class="content_wrapper cont">
        @include('components.breadcrumbs.breadcrumbs')

        <h2 class="headline-2">Мои предложения</h2>


        <div class="main-content">
            <section class="filter">
                <form class="checkbox" action="#" id="filter_form">
                    @csrf
                    <label class="filter_title" for="filter_form">Категория</label>
                    <fieldset class="filter_fields">

                        <input type="checkbox" class="checkbox_input" id="ind">
                        <label class="checkbox_label" for="ind">Индустриальный</label>

                        <input type="checkbox" class="checkbox_input" id="luxury">
                        <label class="checkbox_label" for="luxury">Luxury</label>

                        <input type="checkbox" class="checkbox_input" id="all-inclus">
                        <label class="checkbox_label" for="all-inclus">Все включено</label>

                        <input type="checkbox" class="checkbox_input" id="fam">
                        <label class="checkbox_label" for="fam">Семейный отдых</label>

                        <input type="checkbox" class="checkbox_input" id="gastro">
                        <label class="checkbox_label" for="gastro">Гастрономический</label>

                        <input type="checkbox" class="checkbox_input" id="keep-calm">
                        <label class="checkbox_label" for="keep-calm">Спокойный отдых</label>

                        <input type="checkbox" class="checkbox_input" id="intertainment">
                        <label class="checkbox_label" for="intertainment">Программа развлечений</label>

                        <input type="checkbox" class="checkbox_input" id="shop">
                        <label class="checkbox_label" for="shop">Шоппинг</label>

                        <input type="checkbox" class="checkbox_input" id="extreem">
                        <label class="checkbox_label" for="extreem">Экстрим</label>

                        <input type="checkbox" class="checkbox_input" id="beach">
                        <label class="checkbox_label" for="beach">Пляжный</label>

                        <input type="checkbox" class="checkbox_input" id="sp">
                        <label class="checkbox_label" for="sp">SPA</label>

                    </fieldset>

                </form>
            </section>


            @include('sections.products.products')

        </div>
    </div>



@endsection



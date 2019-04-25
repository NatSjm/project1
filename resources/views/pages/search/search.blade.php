@extends('layout')

@section('content')

    <div class="content_wrapper cont">
        @include('components.breadcrumbs.breadcrumbs')

        <h2 class="headline-2">Поиск</h2>


        <div class="main-content">
            <section class="filter">
                <p class="filter_toggler">Показать фильтр</p>
                 <div class="filter_info">
                     <span>254 шт</span>
                     <div>
                     <select class="filter_sorter" name="filter_sorter" id="">
                         <option value="by-default">По умолчанию</option>

                     </select>

                         <svg class="filter_icon">
                             <use xlink:href="#selector"></use>
                         </svg>

                     </div>
                 </div>
                {{--<div class="filter_display">--}}
                    {{--<ul class="filter_list">--}}
                        {{--<li class="filter_item"><span>3<sup>*</sup></span></li>--}}
                    {{--</ul>--}}
                    {{--<div class="filter_cleaner">--}}
                      {{--<span>Очистить фильтр</span>--}}
                    {{--</div>--}}

                {{--</div>--}}

                {{--<form class="filter_form" action="#" id="filter_form">--}}
                    {{--<label class="filter_title" for="filter_form">Категория</label>--}}
                    {{--<p class="filter_title">Категория</p>--}}
                    {{--<fieldset class="filter_fields">--}}

                        {{--<input type="checkbox" class="checkbox_input" id="ind">--}}
                        {{--<label class="checkbox_label" for="ind">Индустриальный</label>--}}

                        {{--<input type="checkbox" class="checkbox_input" id="luxury">--}}
                        {{--<label class="checkbox_label" for="luxury">Luxury</label>--}}

                        {{--<input type="checkbox" class="checkbox_input" id="all-inclus">--}}
                        {{--<label class="checkbox_label" for="all-inclus">Все включено</label>--}}

                        {{--<input type="checkbox" class="checkbox_input" id="fam">--}}
                        {{--<label class="checkbox_label" for="fam">Семейный отдых</label>--}}

                        {{--<input type="checkbox" class="checkbox_input" id="gastro">--}}
                        {{--<label class="checkbox_label" for="gastro">Гастрономический</label>--}}

                        {{--<input type="checkbox" class="checkbox_input" id="keep-calm">--}}
                        {{--<label class="checkbox_label" for="keep-calm">Спокойный отдых</label>--}}

                        {{--<input type="checkbox" class="checkbox_input" id="intertainment">--}}
                        {{--<label class="checkbox_label" for="intertainment">Программа развлечений</label>--}}

                        {{--<input type="checkbox" class="checkbox_input" id="shop">--}}
                        {{--<label class="checkbox_label" for="shop">Шоппинг</label>--}}

                        {{--<input type="checkbox" class="checkbox_input" id="extreem">--}}
                        {{--<label class="checkbox_label" for="extreem">Экстрим</label>--}}

                        {{--<input type="checkbox" class="checkbox_input" id="beach">--}}
                        {{--<label class="checkbox_label" for="beach">Пляжный</label>--}}

                        {{--<input type="checkbox" class="checkbox_input" id="sp">--}}
                        {{--<label class="checkbox_label" for="sp">SPA</label>--}}

                    {{--</fieldset>--}}

                {{--</form>--}}
            </section>



            @include('sections.products.products')
    </div>


@endsection


@extends('layout')

@section('content')

    <div class="content_wrapper cont">

        @include('components.breadcrumbs.breadcrumbs')

        <h2 class="headline-2">Поиск</h2>


        <div class="main-content">
            <div class="filter-wrapper mod_desctop">
                <aside class="filter">
                    <svg class="filter-close">
                        <use xlink:href="#close"></use>
                    </svg>
                    <form class="filter_form" action="#">
                        @csrf

                        <fieldset class="filter_fields fieldset" id="country">
                            <label class="fieldset_title" for="country">Страна</label>
                            <div class="select-wrapper">
                                <select class="filter_select" name="country" id="">
                                    <option class="filter_option" value="all">Все</option>

                                </select>
                                <svg class="filter_icon">
                                    <use xlink:href="#selector"></use>
                                </svg>
                            </div>

                        </fieldset>

                        <fieldset class="filter_fields fieldset" id="hotel-class">
                            <label class="fieldset_title" for="hotel-class">Класс отеля</label>
                            <div class="select-wrapper">
                                <select class="filter_select" name="hotel-class" id="">
                                    <option class="filter_option" value="3-star">3<sup>*</sup></option>

                                </select>
                                <svg class="filter_icon">
                                    <use xlink:href="#selector"></use>
                                </svg>
                            </div>

                        </fieldset>

                        <fieldset class="filter_fields fieldset" id="tour-type">
                            <label class="fieldset_title" for="tour-tipe">Тип тура</label>
                            <div class="select-wrapper">
                                <select class="filter_select" name="tour-type" id="">
                                    <option class="filter_option" value="keep-calm">Спокойный отдых</option>

                                </select>
                                <svg class="filter_icon">
                                    <use xlink:href="#selector"></use>
                                </svg>
                            </div>

                        </fieldset>

                        <fieldset class="filter_fields fieldset" id="food">
                            <label class="fieldset_title" for="food">Питание</label>
                            <div class="radio_wrapper">

                                <div class="mod_column-left">
                                    <input type="radio" name="food" value="any" class="checkbox_input" id="any">
                                    <label class="checkbox_label" for="any">Любое</label>

                                    <input type="radio" name="food" value="breakfast-supper" class="checkbox_input"
                                           id="breakfast-supper">
                                    <label class="checkbox_label" for="breakfast-supper">Завтрак и ужин</label>
                                </div>
                                <div class="mod_column-right">
                                    <input type="radio" name="food" value="breakfast" class="checkbox_input"
                                           id="breakfast">
                                    <label class="checkbox_label" for="breakfast">Завтрак</label>

                                    <input type="radio" name="food" value="without" class="checkbox_input"
                                           id="without">
                                    <label class="checkbox_label" for="without">Без питания</label>
                                </div>

                            </div>

                        </fieldset>

                        <fieldset class="filter_fields fieldset" id="price">
                            <label class="fieldset_title" for="price">Цена</label>

                            <div class="radio_wrapper">

                                <div class="mod_column-left">
                                    <input type="radio" name="price" value="to-10" class="checkbox_input" id="to-10">
                                    <label class="checkbox_label" for="to-10">до 10</label>

                                    <input type="radio" name="price" value="from51-to100" class="checkbox_input"
                                           id="from51-to100">
                                    <label class="checkbox_label" for="from51-to100">от 51 до 100</label>

                                    <input type="radio" name="price" value="from501-to1000" class="checkbox_input"
                                           id="from501-to1000">
                                    <label class="checkbox_label" for="from501-to1000">от 501 до 1000</label>

                                </div>


                                <div class="mod_column-right">
                                    <input type="radio" name="price" value="from11-to50" class="checkbox_input"
                                           id="from11-to50">
                                    <label class="checkbox_label" for="from11-to50">от 11 до 50</label>

                                    <input type="radio" name="price" value="from100-to500" class="checkbox_input"
                                           id="from100-to500">
                                    <label class="checkbox_label" for="from100-to500">от 100 до 500</label>

                                    <input type="radio" name="price" value="over1000" class="checkbox_input"
                                           id="over1000">
                                    <label class="checkbox_label" for="over1000">Более 1000</label>

                                </div>
                            </div>

                        </fieldset>

                        <fieldset class="filter_fields fieldset" id="children-accessibility">
                            <label class="fieldset_title" for="children-accessibility"><span>Доступно </span><span>для
                                    детей</span></label>
                            <div class="select-wrapper">
                                <select class="filter_select" name="children-accessibility" id="">
                                    <option class="filter_option" value="yes">Да</option>

                                </select>
                                <svg class="filter_icon">
                                    <use xlink:href="#selector"></use>
                                </svg>
                            </div>

                        </fieldset>

                    </form>
                </aside>
            </div>

            <div class="main-content_wrapper">
                <section class="products-filter">
                    <p class="products-filter_toggler">Показать фильтр</p>
                    <div class="products-filter_info">
                        <span class="products-filter_count">254 шт</span>
                        <div class="products-filter_sorter">
                            <select class="products-filter_select" name="products-sorter" id="">
                                <option class="products-filter_option" value="by-default">По умолчанию</option>

                            </select>

                            <svg class="products-filter_icon">
                                <use xlink:href="#selector"></use>
                            </svg>

                        </div>
                    </div>
                    <div class="products-filter_display">
                        <ul class=products-filter_list">
                            <li class="products-filter_item"><span>3<sup>*</sup></span></li>
                        </ul>
                        <div class="products-filter_reset">
                            <span>Очистить фильтр</span>
                        </div>

                    </div>
                </section>


                @include('sections.products.products')
            </div>
        </div>


@endsection


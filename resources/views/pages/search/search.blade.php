@extends('layout')

@section('content')

    <div class="search-page_content-wrapper cont">

        {{--@include('components.breadcrumbs.breadcrumbs')--}}
        {{ Breadcrumbs::render('search') }}

        <h2 class="search-page_title headline-2">Поиск</h2>


        <div class="search-page_main-content">
            <div class="filter-wrapper mod_desctop">
                <aside class="filter">
                    <svg class="filter-close">
                        <use xlink:href="#close"></use>
                    </svg>
                    <form class="filter_form" id="filter-form" action="#">
                        @csrf

                        <fieldset class="filter_fields fieldset" id="country">
                            <label class="fieldset_title" for="country">Страна</label>
                            <div class="select-wrapper">
                                <select class="filter_select" name="country" id="">
                                    <option class="filter_option" value="">Все</option>
                                    @foreach($countryNames as $country)
                                        <option class="filter_option" {{request()->country == $country? 'selected':
                                    ''}} value="{{$country}}">{{$country}}</option>
                                    @endforeach
                                </select>
                                <svg class="filter_icon">
                                    <use xlink:href="#selector"></use>
                                </svg>
                            </div>

                        </fieldset>

                        <fieldset class="filter_fields fieldset" id="hotel-class">
                            <label class="fieldset_title" for="hotel-class">Класс отеля</label>
                            <div class="select-wrapper">
                                <select class="filter_select" name="hotel" id="">
                                    <option class="filter_option" value="">Любой</option>
                                    @foreach ($hotels as $hotel)
                                        <option class="filter_option" {{request()->hotel == $hotel? 'selected':
                                    ''}} value="{{$hotel}}">{{$hotel}}<sup>*</sup></option>
                                    @endforeach
                                </select>
                                <svg class="filter_icon">
                                    <use xlink:href="#selector"></use>
                                </svg>
                            </div>

                        </fieldset>

                        <fieldset class="filter_fields fieldset" id="tour-type">
                            <label class="fieldset_title" for="tour-tipe">Тип тура</label>
                            <div class="select-wrapper">
                                <select class="filter_select" name="tour_type" id="">
                                    <option class="filter_option" value="">Любой</option>
                                    @foreach ($tourTypes as $tourType)
                                        <option class="filter_option" {{request()->tour_type == $tourType ? 'selected':
                                    ''}} value="{{$tourType}}">{{$tourType}}</option>
                                    @endforeach
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
                                    <input checked type="radio" name="nutrition" value="" class="checkbox_input"
                                           id="any-nutrition">
                                    <label class="checkbox_label" for="any-nutrition">Любое</label>
                                    @foreach($nutritionTypes as $key=>$nutritionType)
                                        @if($loop->even)
                                            <input type="radio" {{request()->nutrition == $nutritionType? 'checked':
                                    ''}} name="nutrition" value="{{$nutritionType}}"
                                                   class="checkbox_input"
                                                   id="nutrition{{$key}}">
                                            <label class="checkbox_label"
                                                   for="nutrition{{$key}}">{{$nutritionType}}</label>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="mod_column-right">
                                    @foreach($nutritionTypes as $key=>$nutritionType)
                                        @if($loop->odd)
                                            <input type="radio"{{request()->nutrition == $nutritionType? 'checked':
                                    ''}} name="nutrition" value="{{$nutritionType}}"
                                                   class="checkbox_input"
                                                   id="nutrition{{$key}}">
                                            <label class="checkbox_label"
                                                   for="nutrition{{$key}}">{{$nutritionType}}</label>
                                        @endif
                                    @endforeach
                                </div>

                            </div>

                        </fieldset>

                        <fieldset class="filter_fields fieldset" id="category">
                            <label class="fieldset_title" for="category">Категория</label>
                            <div class="radio_wrapper">
                                <input checked type="radio" name="category" value="" class="checkbox_input"
                                        id="any-category">
                                <label class="checkbox_label" for="any-category">Любая</label>

                                @foreach($categories as $key=>$category)
                                    <input type="radio" name="category" {{request()->category == $category? 'checked':
                                    ''}} value="{{$category}}" class="checkbox_input"
                                       id="category{{$key}}">
                                <label class="checkbox_label" for="category{{$key}}">{{$category}}</label>
                                    @endforeach

                            </div>

                        </fieldset>

                        <fieldset class="filter_fields fieldset" id="price">
                            <label class="fieldset_title" for="price">Цена</label>

                            <div class="radio_wrapper">

                                <div class="mod_column-left">
                                    <input checked type="radio" name="price"  value="" class="checkbox_input"
                                           id="any-price">
                                    <label class="checkbox_label" for="any-price">Не важно</label>

                                    <input type="radio" name="price" {{request()->price == "<_1000"? 'checked':
                                    ''}} value="<_1000" class="checkbox_input"
                                           id="to1000">
                                    <label class="checkbox_label" for="to1000">до 1000</label>

                                    <input type="radio" name="price" {{request()->price == "1001_5000"? 'checked':
                                    ''}} value="1001_5000" class="checkbox_input"
                                           id="from1001-to5000">
                                    <label class="checkbox_label" for="from1001-to5000">от 1001 до 5000</label>

                                </div>


                                <div class="mod_column-right">
                                    <input type="radio" name="price" {{request()->price == "5001_10000"? 'checked':
                                    ''}} value="5001_10000" class="checkbox_input"
                                           id="from5001-to10000">
                                    <label class="checkbox_label" for="from5001-to10000">от 5001 до 10000</label>

                                    <input type="radio" name="price" {{request()->price == "10001_50000"? 'checked':
                                    ''}} value="10001_50000" class="checkbox_input"
                                           id="from10001-to50000">
                                    <label class="checkbox_label" for="from10001-to50000">от 10001 до 50000</label>

                                    <input type="radio" name="price" {{request()->price == ">_50001"? 'checked':
                                    ''}} value=">_50001" class="checkbox_input"
                                           id="over50000">
                                    <label class="checkbox_label" for="over50000">Более 50000</label>

                                </div>
                            </div>

                        </fieldset>

                        <fieldset class="filter_fields fieldset" id="children-accessibility">
                            <label class="fieldset_title" for="children-accessibility"><span>Доступно </span><span>для
                                    детей</span></label>
                            <div class="select-wrapper">
                                <select class="filter_select" name="children_accessibility" id="">
                                    <option class="filter_option"  value="">Не важно</option>
                                    <option class="filter_option" {{request()->children_accessibility == "1"?
                                    'selected':''}} value="1">Доступно</option>
                                    <option class="filter_option" {{request()->children_accessibility == "0"?
                                    'selected':''}} value="0">Не доступно</option>

                                </select>
                                <svg class="filter_icon">
                                    <use xlink:href="#selector"></use>
                                </svg>
                            </div>

                        </fieldset>

                        <fieldset class="filter_fields fieldset" id="recommended">
                            <label class="fieldset_title" for="recommended">Рекомендованные туры</label>
                            <div class="radio_wrapper">
                                <input type="checkbox" name="recommended" {{request()->recommended == "1"?
                                    'checked':''}} value="1" class="checkbox_input"
                                       id="recommended-checkbox">
                                <label class="checkbox_label" for="recommended-checkbox">Показать
                                    рекомендованные</label>
                            </div>
                        </fieldset>

                        <fieldset class="filter_fields fieldset" id="hot">
                            <label class="fieldset_title" for="hot">Горящие туры</label>
                            <div class="radio_wrapper">
                                <input type="checkbox" name="hot" {{request()->hot == "1"?
                                    'checked':''}} value="1" class="checkbox_input"
                                       id="hot-checkbox">
                                <label class="checkbox_label" for="hot-checkbox">Выбрать горящие</label>
                            </div>
                        </fieldset>

                        <input class="hiddenInput" type="hidden" name="search" value="">
                    </form>
                </aside>
            </div>

            <div class="main-content_wrapper">
                <section class="products-filter">
                    <p class="products-filter_toggler">Показать фильтр</p>
                    <div class="products-filter_info">
                        <span class="products-filter_count">{{$toursCount}} шт</span>
                        <div class="products-filter_sorter">
                            <select class="products-filter_select" name="sorter" form="filter-form" id="">
                                <option class="products-filter_option" value="created_at">По умолчанию</option>
                                <option class="products-filter_option" {{request()->sorter == 'price'? 'selected':
                                    ''}} value="price">По цене</option>
                                <option class="products-filter_option" {{request()->sorter == 'start_at'? 'selected':
                                    ''}} value="start_at">По дате старта</option>
                            </select>

                            <svg class="products-filter_icon">
                                <use xlink:href="#selector"></use>
                            </svg>

                        </div>
                    </div>
                    <div class="products-filter_display">
                        <ul class="products-filter_list">
                        </ul>
                        <div class="products-filter_reset">
                            <a class="products-filter_reset-link" href="{{ route('search-page') }}">
                            <span>Очистить фильтр</span>
                            <span class="dell-them-all">
                            <svg class="filter-cleaner_icon">
                                <use xlink:href="#close"></use>
                            </svg>
                            </span>
                            </a>
                        </div>

                    </div>
                </section>
                @include('sections.products.products')
            </div>
        </div>
    </div>

@endsection


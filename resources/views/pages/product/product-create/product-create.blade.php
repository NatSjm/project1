@extends('layout')

@section('content')
    <div class="product-create-page_wrapper cont">
        <div class="product-create-page_breadcrumbs">
            @include('components.breadcrumbs.breadcrumbs')
        </div>
        <h2 class="headline-2 product-create-page_title page-title">Новое объявление </h2>
        <form action="" class="product-create-page_form product-form">
            <div class="product-form_fieldset-wrapper">
                <fieldset class="product-form_fieldset mod_border-grey">
                    <div class="product-form_selectwrapper">
                        <div class="product-form_select product-select">
                            <label class="product-select_title" for="product-name">Название объявления</label>
                            <input type="text" class="product-select_input input"
                                   placeholder="Введите название объявления"
                                   name="product-name"
                                   id="product-name">
                        </div>
                        <div class="product-form_select-group">
                            <div class="product-form_select product-select">
                                <label class="product-select_title" for="country">Страна</label>
                                <div class="select-wrapper">
                                    <select class="product-select_select select " name="country"
                                            id="country">
                                        <option class="product-select_option" value="">Укажите страну отдыха</option>
                                        <option class="product-select_option" value="Germany">Германия</option>
                                        <option class="product-select_option" value="Hungary">Венгрия</option>
                                        <option class="product-select_option" value="France">Франция</option>
                                    </select>
                                    <svg class="product-select_icon select_icon">
                                        <use xlink:href="#selector"></use>
                                    </svg>
                                </div>
                            </div>

                            <div class="product-form_select product-select">
                                <label class="product-select_title" for="hotel-class">Класс отеля</label>
                                <div class="select-wrapper">
                                    <select class="product-select_select select " name="hotel-class" id="hotel-class">
                                        <option class="product-select_option" value="">Укажите класс отеля</option>
                                        <option class="product-select_option" value="1-star">1<sup>*</sup></option>
                                        <option class="product-select_option" value="2-star">2<sup>*</sup></option>
                                        <option class="product-select_option" value="3-star">3<sup>*</sup></option>
                                    </select>
                                    <svg class="product-select_icon select_icon">
                                        <use xlink:href="#selector"></use>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="product-form_select product-select">
                            <label class="product-select_title" for="tour-cat">Категория тура</label>
                            <div class="select-wrapper">
                                <select class="product-select_select select" name="tour-cat" id="tour-cat">
                                    <option class="product-select_option" value="">Укажите категорию тура</option>
                                    <option class="product-select_option" value="bus">Автобусный тур</option>
                                    <option class="product-select_option" value="sea">Морской тур</option>
                                </select>
                                <svg class="product-select_icon select_icon">
                                    <use xlink:href="#selector"></use>
                                </svg>
                            </div>
                        </div>

                        <div class="product-form_select-group">

                            <div class="product-form_select product-select">
                                <label class="product-select_title" for="category">Тип тура</label>
                                <div class="select-wrapper">
                                    <select class="product-select_select select" name="category" id="category">
                                        <option class="product-select_option" value="">Укажите категорию</option>
                                        @foreach ($categories as $key=>$value)
                                            <option class="filter_option" value="{{ $key }}">{{ $value }}</option>
                                        @endforeach

                                    </select>
                                    <svg class="product-select_icon select_icon">
                                        <use xlink:href="#selector"></use>
                                    </svg>
                                </div>
                            </div>

                            <div class="product-form_select product-select mod_price">
                                <label class="product-select_title" for="price">Цена</label>
                                <input type="text" placeholder="Укажите цену" class="product-select_input  input"
                                       name="price"
                                       id="price">
                            </div>

                            <div class="product-form_select product-select">
                                <label class="product-select_title" for="food">Питание</label>
                                <div class="select-wrapper">
                                    <select class="product-select_select select" name="food" id="food">
                                        <option class="product-select_option " value="">Укажите питание в
                                            туре
                                        </option>
                                        <option class="product-select_option" value="breakfast-supper">Завтрак и ужин
                                        </option>
                                        <option class="product-select_option" value="breakfast">Завтрак</option>
                                        <option class="product-select_option" value="without">Без питания</option>
                                    </select>
                                    <svg class="product-select_icon select_icon">
                                        <use xlink:href="#selector"></use>
                                    </svg>
                                </div>
                            </div>

                            <div class="product-form_select product-select">
                                <label class="product-select_title" for="children-accessibility">Доступно для
                                    детей</label>
                                <div class="select-wrapper">
                                    <select class="product-select_select select" name="children-accessibility"
                                            id="children-accessibility">
                                        <option class="product-select_option" value=""></option>
                                        <option class="product-select_option" value="yes">Да</option>
                                        <option class="product-select_option" value="no">Нет</option>
                                    </select>
                                    <svg class="product-select_icon select_icon">
                                        <use xlink:href="#selector"></use>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="product-form_fieldset mod_border-grey textarea" id="textarea">

                    <label for="textarea" class="textarea_title">Комментарий</label>

                    <textarea placeholder="Опишите ваш товар" class="input textarea_input"></textarea>

                </fieldset>
            </div>

            <fieldset class="product-form_fieldset img-fieldset mod_border-grey id=" foto
            ">
            <label class="img-fieldset_title" for="foto">Фотографии</label>
            <div class="img-fieldset_container">
                <div class="img-uploader">
                    <input class="img-uploader_input" id="foto" title="" type="file">
                    <label class="img-uploader_title" for="foto"><span>Основное</span><span>фото</span></label>
                </div>

                @for ($i = 0; $i < 9; $i++)
                    <div class="img-uploader">
                        <input class="img-uploader_input" id="foto{{ $i }}" title="" type="file">
                        <label class="img-uploader_title" for="foto{{ $i }}"></label>
                    </div>
                @endfor
            </div>
            </fieldset>

            <input type="submit" class="button mod_color-med-blue product-form_submit" value="Отправить изменения">

        </form>


    </div>
@endsection

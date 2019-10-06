@extends('layout')

@section('content')
    <div class="product-create-page_wrapper cont">
        <div class="product-create-page_breadcrumbs">
            {{ Breadcrumbs::render('product-create') }}
        </div>
        <h2 class="headline-2 product-create-page_title page-title">Новое объявление </h2>
        <form action="{{route('tour.store')}}" class="product-create-page_form product-form"
              enctype="multipart/form-data" method="post">
            @csrf
            <div class="product-form_fieldset-wrapper">
                <fieldset class="product-form_fieldset mod_border-grey">
                    <div class="product-form_selectwrapper">
                        <div class="product-form_select product-select">
                            <label class="product-select_title" for="product-name">Название объявления</label>
                            <input type="text" class="@error('name') invalid @enderror input product-select_input"
                                   placeholder="Введите название объявления"
                                   name="name"
                                   id="product-name"
                                   value="{{old('name')}}">
                            @error('name')
                            <div class="error_box">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="product-form_select-group">
                            <div class="product-form_select product-select">
                                <label class="product-select_title" for="country">Страна</label>
                                <div class="select-wrapper">
                                    <select class="product-select_select select " name="country_id"
                                            id="country">
                                        <option class="product-select_option" value="">Укажите страну
                                            отдыха
                                        </option>
                                        @foreach($AllCountryNames as $key => $country)
                                            <option class="product-select_option"
                                                    value="{{ $key }}">{{ $country }}</option>
                                        @endforeach
                                    </select>
                                    <svg class="product-select_icon select_icon">
                                        <use xlink:href="#selector"></use>
                                    </svg>
                                </div>
                                @error('country_id')
                                <div class="error_box">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="product-form_select product-select">
                                <label class="product-select_title" for="hotel-class">Класс отеля</label>
                                <div class="select-wrapper">
                                    <select class="product-select_select select " name="hotel_id" id="hotel-class">
                                        <option class="product-select_option" value="">Укажите класс отеля</option>
                                        @foreach ($AllHotels as $key => $hotel)
                                            <option class="product-select_option" value="{{ $key }}">{{ $hotel }}
                                                <sup>*</sup></option>
                                        @endforeach
                                    </select>
                                    <svg class="product-select_icon select_icon">
                                        <use xlink:href="#selector"></use>
                                    </svg>
                                </div>
                                @error('hotel_id')
                                <div class="error_box">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        {{--test--}}
                        <div class="product-form_select-group">

                            <div class="product-form_select product-select ">
                                <label class="product-select_title" for="start-date">Дата начала тура</label>
                                <input type="date" class="product-select_input input mod_date"
                                       name="start_at"
                                       value="{{ old('start_at') }}"
                                       id="start-date">
                                @error('start_at')
                                <div class="error_box">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="product-form_select product-select mod_date ">
                                <label class="product-select_title" for="finish-date">Дата окончания тура </label>
                                <input type="date" class="product-select_input input mod_date"
                                       name="finish_at"
                                       value="{{ old('finish_at') }}"
                                       id="finish-date">
                                @error('finish_at')
                                <div class="error_box">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        {{--test--}}
                        <div class="product-form_select product-select">
                            <label class="product-select_title" for="tour-cat">Категория тура</label>
                            <div class="select-wrapper">
                                <select class="product-select_select select" name="category_id" id="tour-cat">
                                    <option class="product-select_option" value="">Укажите категорию тура</option>
                                    @foreach($AllCategories as $key => $category)
                                        <option class="product-select_option"
                                                value="{{ $key }}">{{ $category }}</option>
                                    @endforeach
                                </select>
                                <svg class="product-select_icon select_icon">
                                    <use xlink:href="#selector"></use>
                                </svg>
                            </div>
                            @error('category_id')
                            <div class="error_box">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="product-form_select-group">

                            <div class="product-form_select product-select">
                                <label class="product-select_title" for="category">Тип тура</label>
                                <div class="select-wrapper">
                                    <select class="product-select_select select" name="tour_type_id" id="category">
                                        <option class="product-select_option" value="">Укажите категорию</option>
                                        @foreach ($AllTourTypesNames as $key => $tourType)
                                            <option class="filter_option" value="{{ $key }}">{{ $tourType }}</option>
                                        @endforeach
                                    </select>
                                    <svg class="product-select_icon select_icon">
                                        <use xlink:href="#selector"></use>
                                    </svg>
                                </div>
                                @error('tour_type_id')
                                <div class="error_box">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="product-form_select product-select mod_price">
                                <label class="product-select_title" for="price">Цена</label>
                                <input type="text" placeholder="Укажите цену" class="product-select_input  input"
                                       name="price"
                                       value="{{ old('price') }}"
                                       id="price">
                                @error('price')
                                <div class="error_box">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="product-form_select product-select">
                                <label class="product-select_title" for="food">Питание</label>
                                <div class="select-wrapper">
                                    <select class="product-select_select select" name="nutrition_id" id="food">
                                        <option class="product-select_option " value="">Укажите питание в
                                            туре
                                        </option>
                                        @foreach($AllNutritionTypes as $key => $nutritionType)
                                            <option class="product-select_option" value="{{$key}}">{{$nutritionType}}
                                            </option>
                                        @endforeach
                                    </select>
                                    <svg class="product-select_icon select_icon">
                                        <use xlink:href="#selector"></use>
                                    </svg>
                                </div>
                                @error('nutrition_id')
                                <div class="error_box">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="product-form_select product-select">
                                <label class="product-select_title" for="children-accessibility">Доступно для
                                    детей</label>
                                <div class="select-wrapper">
                                    <select class="product-select_select select" name="for_children"
                                            id="children-accessibility">
                                        <option class="product-select_option" value=""></option>
                                        <option class="product-select_option" value="1">Да</option>
                                        <option class="product-select_option" value="0">Нет</option>
                                    </select>
                                    <svg class="product-select_icon select_icon">
                                        <use xlink:href="#selector"></use>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="product-form_select product-select">
                            <label class="product-select_title" for="start-location">Место отправления</label>
                            <div class="select-wrapper">
                                <select class="product-select_select select" name="start_location_id"
                                        id="start-location">
                                    <option class="product-select_option" value="">Укажите место отправления</option>
                                    @foreach($AllLocations as $key => $location)
                                        <option class="product-select_option"
                                                value="{{ $key }}">{{ $location }}</option>
                                    @endforeach
                                </select>
                                <svg class="product-select_icon select_icon">
                                    <use xlink:href="#selector"></use>
                                </svg>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="product-form_fieldset mod_border-grey textarea" id="textarea">

                    <label for="textarea" class="textarea_title">Комментарий</label>

                    <textarea placeholder="Опишите ваш товар" name="description" value="{{ old('description') }}"
                              class="input
                    textarea_input"></textarea>

                </fieldset>
                @error('description')
                <div class="error_box">{{ $message }}</div>
                @enderror
            </div>

            <fieldset class="product-form_fieldset img-fieldset mod_border-grey" id="foto-fieldset">
                <label class="img-fieldset_title" for="foto-fieldset">Фотографии</label>
                <div class="img-fieldset_container">
                    <div class="img-uploader">
                        <input class="img-uploader_input mod_main" id="foto" name="main_img_id" title="" type="file">
                        <label class="img-uploader_title mod_main"
                               for="foto"><span>Основное</span><span>фото</span></label>
                    </div>

                    @for ($i = 0; $i < 9; $i++)
                        <div class="img-uploader">
                            <input class="img-uploader_input" name = "media_id[]" id="foto{{ $i }}" title=""
                                   type="file">
                            <label class="img-uploader_title" for="foto{{ $i }}"></label>
                        </div>
                    @endfor
                </div>
            </fieldset>

            <input type="submit" class="button mod_color-med-blue product-form_submit" value="Отправить изменения">

        </form>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div>{{$error}}</div>
            @endforeach
        @endif
    </div>
@endsection

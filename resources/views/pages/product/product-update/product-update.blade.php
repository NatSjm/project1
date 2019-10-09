@extends('layout')

@section('content')
    <div class="product-create-page_wrapper cont">
        {{--<div class="product-create-page_breadcrumbs">--}}
        {{--{{ Breadcrumbs::render('product-update') }}--}}
        {{--</div>--}}
        <h2 class="headline-2 product-create-page_title page-title">Редактирование объявления </h2>
        @isset($tour)
            <form action="{{route('tour.update', $tour)}}" class="product-create-page_form product-form"
                  enctype="multipart/form-data" method="post">
                @method('PATCH')
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
                                       value="{{$tour->name}}">
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
                                                        {{$tour->country->name == $country ? 'selected' : ''}}
                                                        value="{{ $key }}">{{ $country }}
                                                </option>
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
                                                <option class="product-select_option" value="{{ $key }}"
                                                        {{$tour->hotel->hotel_class == $hotel ? 'selected' : ''}}>{{$hotel}}
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

                            <div class="product-form_select-group">

                                <div class="product-form_select product-select ">
                                    <label class="product-select_title" for="start-date">Дата начала тура</label>
                                    <input type="date" class="product-select_input input mod_date"
                                           name="start_at"
                                           value="{{ $tour->start_at->format('Y-m-d') }}"
                                           id="start-date">
                                    @error('start_at')
                                    <div class="error_box">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="product-form_select product-select mod_date ">
                                    <label class="product-select_title" for="finish-date">Дата окончания тура </label>
                                    <input type="date" class="product-select_input input mod_date"
                                           name="finish_at"
                                           value="{{ $tour->finish_at->format('Y-m-d') }}"
                                           id="finish-date">
                                    @error('finish_at')
                                    <div class="error_box">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            <div class="product-form_select product-select">
                                <label class="product-select_title" for="tour-cat">Категория тура</label>
                                <div class="select-wrapper">
                                    <select class="product-select_select select" name="category_id" id="tour-cat">
                                        <option class="product-select_option" value="">Укажите категорию тура</option>
                                        @foreach($AllCategories as $key => $category)
                                            <option class="product-select_option"
                                                    {{$tour->category->name == $category ? 'selected' : ''}}
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
                                                <option class="filter_option"
                                                        {{$tour->tourType->name == $tourType ? 'selected' : ''}}
                                                        value="{{ $key }}">{{ $tourType }}</option>
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
                                           value="{{ $tour->price}}"
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
                                                <option class="product-select_option"
                                                        value="{{$key}}"
                                                        {{$tour->nutrition->nutrition_type == $nutritionType ? 'selected' : ''}}>{{$nutritionType}}
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
                                            <option class="product-select_option"
                                                    {{$tour->for_children == 1 ? 'selected' : ''}}
                                                    value="1">Да
                                            </option>
                                            <option class="product-select_option"
                                                    {{$tour->for_children == 0 ? 'selected' : ''}}
                                                    value="0">Нет
                                            </option>
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
                                        <option class="product-select_option" value="">Укажите место отправления
                                        </option>
                                        @foreach($AllLocations as $key => $location)
                                            <option class="product-select_option"
                                                    {{$tour->startLocation->name == $location ? 'selected' : ''}}
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

                        <textarea placeholder="Опишите ваш товар" name="description"
                                  class="input
                    textarea_input">{{ $tour->description }}</textarea>

                    </fieldset>
                    @error('description')
                    <div class="error_box">{{ $message }}</div>
                    @enderror
                </div>

                <fieldset class="product-form_fieldset img-fieldset mod_border-grey" id="foto-fieldset">
                    <label class="img-fieldset_title"
                           for="foto-fieldset">Фотографии</label>
                    <div class="img-fieldset_container">
                        <div class="img-uploader">
                            <input class="img-uploader_input mod_main" id="foto" value = "{{$tour->mainImg->id}}"
                                   name="main_img_id"
                                   title=""
                                   type="file">
                            <label class="img-uploader_title mod_main"
                                   style="background-image:url('/storage/images/{{$tour->mainImg->path}}')"
                                   for="foto"><span>Основное</span><span>фото</span></label>
                        </div>
                        @foreach($tour->medias as $media)
                            <div class="img-uploader">
                                <input class="img-uploader_input" name="media_id[]" data-index="{{$media->id}}"
                                       id="foto{{$loop->index}}" title=""
                                       type="file">
                                <input class="hidden" type="hidden" value =""
                                       name="changedPhoto[]">
                                <label class="img-uploader_title"
                                       style="background-image:url('/storage/images/{{$media->path}}')"
                                       for="foto{{ $loop->index }}">
                                </label>

                            </div>
                        @endforeach


                        @for ($i = $tour->medias->count(); $i < 9; $i++)
                        <div class="img-uploader">
                        <input class="img-uploader_input" name="media_id[]" id="foto{{ $i }}" title=""
                        type="file">
                        <label class="img-uploader_title" for="foto{{ $i }}"></label>
                        </div>
                        @endfor
                    </div>
                </fieldset>

                <input type="submit" class="button mod_color-med-blue product-form_submit" value="Отправить изменения">

            </form>

            {{--@if ($errors->any())--}}
            {{--@foreach ($errors->all() as $error)--}}
            {{--<div>{{$error}}</div>--}}
            {{--@endforeach--}}
            {{--@endif--}}

        @endisset
    </div>
@endsection

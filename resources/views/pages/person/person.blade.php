@extends('layout')

@section('content')
    <div class="person-page_container cont">

        <div class="person-page_breadcrumbs">
            {{ Breadcrumbs::render('person', $user) }}
        </div>

        <h2 class="person-page_title headline-2">Личные данные</h2>

        <section class="person-page_main">
            <div class="person mod_border-grey">

                <input type="file" form="person_data" id="foto" name="avatar" class="person_img">
                <label class="person_img-title" for="foto"
                       style="background-image: url('{{ $user->url }}');"></label>
                @error('avatar')
                <div class="error_box">{{ $message }}</div>
                @enderror

                {{--<img src="img/Pavl-superlarge.jpg" alt="" class="person_img">--}}
                <form id="person_data" class="person_data" action="/profile/{{ $user->id }}"
                      enctype="multipart/form-data" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="person_fullname">
                        <label class="person_label" for="person_name">Имя</label>
                        <input type="text" id="person_name" name="first_name" class="person_input" value="{{ old
                        ('first_name') ?? $user->first_name }}">
                        @error('first_name')
                        <div class="error_box">{{ $message }}</div>
                        @enderror
                        <label class="person_label" for="person_surname">Фамилия</label>
                        <input type="text" id="person_surname" name="last_name" class="person_input"
                               value="{{ old
                        ('last_name') ?? $user->last_name }}">
                        @error('last_name')
                        <div class="error_box">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="person_contacts">
                        <label class="person_label" for="person_phone">Телефон</label>
                        <input type="tel" id="person_phone" name="phone" class="person_input" value="{{ old
                        ('phone') ?? $user->phone }}">
                        @error('phone')
                        <div class="error_box">{{ $message }}</div>
                        @enderror
                        <label class="person_label" for="person_email">Email</label>
                        <input type="email" id="person_email" name="email" class="person_input"
                               value="{{ old
                        ('email') ?? $user->email }}">
                        @error('email')
                        <div class="error_box">{{ $message }}</div>
                        @enderror
                    </div>


                </form>


            </div>
            <button type="submit" class="person_submit button mod_color-med-blue" form="person_data">Сохранить
                изменения
            </button>
            @if(session('success'))
                <div class="message_box">{{session('success')}}</div>
            @endif

        </section>
    </div>

@endsection

@extends('layout')

@section('content')
    <div class="person-page_container cont">

        <div class="person-page_breadcrumbs">
            @include('components.breadcrumbs.breadcrumbs')
        </div>

        <h2 class="person-page_title headline-2">Личные данные</h2>

        <section class="person-page_main">
            <div class="person mod_border-grey">
                <img src="img/Pavl-superlarge.jpg" alt="" class="person_img">
                <form action="" id="person_data" class="person_data">
                    <div class="person_fullname">
                        <label class="person_label" for="person_name">Имя</label>
                        <input type="text" id="person_name" name="person_name" class="person_input" value="Михаил">
                        <label class="person_label" for="person_surname">Фамилия</label>
                        <input type="text" id="person_surname" name="person_surname" class="person_input"
                               value="Павлов">
                    </div>
                    <div class="person_contacts">
                        <label class="person_label" for="person_phone">Телефон</label>
                        <input type="tel" id="person_phone" name="person_phone" class="person_input" value="+38 (055) 555 55 55">
                        <label class="person_label" for="person_email">Email</label>
                        <input type="email" id="person_email" name="person_email" class="person_input"
                               value="mihail@gmail.com">
                    </div>


                </form>


            </div>
            <input type="submit" class="person_submit button mod_color-med-blue" form="person_data" value="Сохранить
            изменения">


        </section>
    </div>

@endsection

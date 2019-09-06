@extends('layout')
@section('content')
    <div class="enter-page_wrapper cont">
        <div class="enter-page_breadcrumbs">
            @include('components.breadcrumbs.breadcrumbs')
        </div>
        <h2 class="headline-2 enter-page_title page-title">Авторизация</h2>

        <div class="enter-page_main">
            <div class="enter-page_form mod_border-grey">
                <form method="POST" action="{{ route('password.update') }}" id="enter" class="entrance">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <label class="entrance_title" for="enter">Восстановление пароля</label>
                    <div class="entrance_top">
                        <input type="email" value="{{ $email ?? old('email') }}" class="entrance_input input"
                               placeholder="Введите email"
                               required
                               autofocus
                               autocomplete="email"
                               name="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
                        @enderror
                        <input type="password" class="entrance_input input"
                               placeholder="Введите пароль"
                               name="password"
                               required autocomplete="current-password">

                    </div>

                    @error('password')
                    <span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
                    @enderror

                    <div class="entrance_bottom">
                        <input type="submit" class="entrance_submit button mod_color-med-blue" value="Войти">
                        <a href="{{ route('password.request') }}" class="link entrance_link">забыли пароль</a>
                    </div>
                </form>
            </div>


            <div class="enter-page_form  mod_border-grey">
                <form action="" id="registration" class="entrance">
                    @csrf
                    <label class="entrance_title" for="registration">02. Регистрация</label>
                    <div class="entrance_top">
                        <input type="text" class="entralnce_input input"
                               placeholder="Введите email"
                               name="email">
                        <input type="password" class="entrance_input input"
                               placeholder="Введите пароль"
                               name="password">

                    </div>

                    <div class="entrance_bottom">
                        <input type="submit" class="entrance_submit button mod_color-light-green" value="Войти">

                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection




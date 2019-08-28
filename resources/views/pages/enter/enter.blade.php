@extends('layout')

@section('content')
    <div class="login_wrapper cont">
        <div class="login_breadcrumbs">
            @include('components.breadcrumbs.breadcrumbs')
        </div>
        <h2 class="headline-2 enter-page_title page-title">Авторизация</h2>

        <div class="login_main">
            <div class="login_form mod_border-grey">
                <form method="POST" action="{{ route('login') }}" id="enter" class="entrance">
                    @csrf
                    <label class="entrance_title" for="enter">01. Вход</label>
                    <div class="entrance_top">
                        <input type="email" value="{{ old('email') }}" class="entrance_input input"
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


            <div class="login_form  mod_border-grey">
                <form method="POST" action="{{ route('register') }}" id="registration" class="entrance">
                    @csrf
                    <label class="entrance_title" for="registration">02. Регистрация</label>
                    <div class="entrance_top">
                        <input type="email" class="entrance_input input"
                               placeholder="Введите email"
                               name="email"
                               value="{{ old('email') }}"
                               required autocomplete="email">
                        <input type="password" class="entrance_input input"
                               placeholder="Введите пароль"
                               name="password"
                               required autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="entrance_bottom">
                        <input type="submit" class="entrance_submit button mod_color-light-green" value="Войти">
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection

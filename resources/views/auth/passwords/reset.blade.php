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
                    <label class="entrance_title" for="enter">Сбросить пароль</label>
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
                               required autocomplete="new-password">

                        <input type="password" class="entrance_input input"
                               placeholder="Подтвердите пароль"
                               name="password_confirmation"
                               required autocomplete="new-password">
                    </div>
                    <div class="entrance_bottom">
                        <input type="submit" class="entrance_submit button mod_color-med-blue" value="Подтвердить">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection






{{--@extends('layouts.app')--}}
{{--@section('content')--}}
{{--<div class="container">--}}
{{--<div class="row justify-content-center">--}}
{{--<div class="col-md-8">--}}
{{--<div class="card">--}}
{{--<div class="card-header">{{ __('Reset Password') }}</div>--}}

{{--<div class="card-body">--}}
{{--<form method="POST" action="{{ route('password.update') }}">--}}
{{--@csrf--}}

{{--<input type="hidden" name="token" value="{{ $token }}">--}}

{{--<div class="form-group row">--}}
{{--<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

{{--<div class="col-md-6">--}}
{{--<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>--}}

{{--@error('email')--}}
{{--<span class="invalid-feedback" role="alert">--}}
{{--<strong>{{ $message }}</strong>--}}
{{--</span>--}}
{{--@enderror--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="form-group row">--}}
{{--<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

{{--<div class="col-md-6">--}}
{{--<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">--}}

{{--@error('password')--}}
{{--<span class="invalid-feedback" role="alert">--}}
{{--<strong>{{ $message }}</strong>--}}
{{--</span>--}}
{{--@enderror--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="form-group row">--}}
{{--<label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>--}}

{{--<div class="col-md-6">--}}
{{--<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="form-group row mb-0">--}}
{{--<div class="col-md-6 offset-md-4">--}}
{{--<button type="submit" class="btn btn-primary">--}}
{{--{{ __('Reset Password') }}--}}
{{--</button>--}}
{{--</div>--}}
{{--</div>--}}
{{--</form>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--@endsection--}}

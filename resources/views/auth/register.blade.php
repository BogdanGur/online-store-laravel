@extends("layouts.body")

@section("title", "Register")

@section("content")
    <div class="main main_login">

        <h1>{{ __('register.signUp') }}</h1>
        <div class="wrapper">
            <div class="sign-up-content">
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                @endif
                <form action="{{ route("register") }}" method="post" class="signup-form">
                    @csrf
                    <h2 class="form-title">{{ __('register.signUp') }}</h2>
{{--                    <div class="form-radio">--}}
{{--                        <input type="radio" name="member_level" value="newbie" id="newbie" checked="checked" />--}}
{{--                        <label for="newbie">User</label>--}}

{{--                        <input type="radio" name="member_level" value="average" id="average" />--}}
{{--                        <label for="average">Admin</label>--}}
{{--                    </div>--}}

                    <div class="form-textbox">
                        <label for="name">{{ __('register.form.name') }}</label>
                        <input type="text" name="name" id="name">
                    </div>

                    <div class="form-textbox">
                        <label for="surname">{{ __('register.form.surname') }}</label>
                        <input type="text" name="surname" id="surname">
                    </div>

                    <div class="form-textbox">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email">
                    </div>

                    <div class="form-textbox">
                        <label for="phone">{{ __('register.form.phone') }}</label>
                        <input type="tel" name="phone" id="email">
                    </div>

                    <div class="form-textbox">
                        <label for="pass">{{ __('register.form.password') }}</label>
                        <input type="password" name="password">
                    </div>

                    <div class="form-textbox">
                        <label for="pass">{{ __('register.form.confirmPassword') }}</label>
                        <input type="password" name="password_confirmation">
                    </div>

                    <div class="form-textbox">
                        <input type="submit" name="submit" id="submit" class="submit" value="{{ __('register.form.button') }}">
                    </div>
                </form>

                <p class="loginhere">
                    {{ __('register.haveAccount') }}<a href="{{ route("login") }}" class="loginhere-link"> Log in</a>
                </p>
            </div>
        </div>

    </div>
@endsection

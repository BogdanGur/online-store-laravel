@extends("layouts.body")

@section("title", "Login")

@section("content")
<div class="main main_login">

    <h1>{{ __('login.signIn') }}</h1>
    <div class="wrapper">
        <div class="sign-up-content">
            <form action="{{ route("login") }}" method="post" class="signup-form">
                @csrf

                <div class="form-textbox">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email">
                </div>

                <div class="form-textbox">
                    <label for="pass">{{ __('login.form.password') }}</label>
                    <input type="password" name="password" id="pass">
                </div>

                <label for="remember">{{ __('login.form.remember') }}?</label>
                <input name="remember_me" id="remember" type="checkbox" value="1">

                <div class="form-textbox">
                    <input type="submit" name="submit" id="submit" class="submit" value="{{ __('login.form.button') }}" />
                </div>
            </form>

            <p class="loginhere">
                {{ __('login.notRegister') }}<a href="{{ route("register") }}" class="loginhere-link">Register</a>
            </p>
        </div>
    </div>

</div>
@endsection

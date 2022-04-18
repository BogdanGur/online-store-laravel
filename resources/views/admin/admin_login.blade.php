<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>@yield("title")</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("css/open-iconic-bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("css/animate.css") }}">

    <link rel="stylesheet" href="{{ asset("css/owl.carousel.min.css") }}">
    <link rel="stylesheet" href="{{ asset("css/owl.theme.default.min.css") }}">
    <link rel="stylesheet" href="{{ asset("css/magnific-popup.css") }}">

    <link rel="stylesheet" href="{{ asset("css/aos.css") }}">

    <link rel="stylesheet" href="{{ asset("css/ionicons.min.css") }}">

    <link rel="stylesheet" href="{{ asset("css/bootstrap-datepicker.css") }}">
    <link rel="stylesheet" href="{{ asset("css/jquery.timepicker.css") }}">


    <link rel="stylesheet" href="{{ asset("css/flaticon.css") }}">
    <link rel="stylesheet" href="{{ asset("css/icomoon.css") }}">
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
</head>
<body>
<div class="main main_login">

    <h1>Admin</h1>
    <div class="wrapper">
        <div class="sign-up-content">
            @if($errors->any())
                @foreach($errors->all() as $error)
                    {{ $error }}
                @endforeach
            @endif
            <form action="{{ route("admin_login") }}" method="post" class="signup-form">
                @csrf

                <div class="form-textbox">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email">
                </div>

                <div class="form-textbox">
                    <label for="pass">Password</label>
                    <input type="password" name="password" id="pass">
                </div>

                <label for="remember">Запомнить меня?</label>
                <input name="remember_me" id="remember" type="checkbox" value="1">

                <div class="form-textbox">
                    <input type="submit" name="submit" id="submit" class="submit" value="Login" />
                </div>
            </form>
        </div>
    </div>

</div>
</body>
</html>

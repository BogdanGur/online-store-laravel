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
<header class="admin-header">
    <div class="container">
        <div class="main-txt">
            <h1>BG System Panel</h1>
            <small>v0.1</small>
        </div>
    </div>
</header>
<section class="panel">
    <div class="container">
        <div class="content-panel">
            <aside class="bgnavbar">
                <div class="navbar-head">
                    <div class="navbar-name">BG System</div>
                </div>
                <div class="navbar-body">
                    <ul>
                        <li><a href="#">Main</a></li>
                        <li><a href="#">Products</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Site</a></li>
                    </ul>
                    <br>
                    <a href="{{ route("admin_logout") }}" class="logout">Logout</a>
                </div>
            </aside>
            <div class="bgcontent">
                <div class="user-head">
                    <div class="user-info">
                        <div class="user-photo">
                        @if($admin->photo)
                            <img src="{{ \Illuminate\Support\Facades\Storage::url("public/admin_photos/".$admin->photo) }}" alt="">
                        @else
                            <img src="{{ asset("images/photo.jpg") }}" alt="">
                        @endif
                        </div>
                        <div class="user-name">
                            <div class="uname">{{ $admin->name }} {{ $admin->surname }}</div>
                            <div class="uemail">{{ $admin->email }}</div>
                        </div>
                    </div>
                    <div class="user-right_info">
                        <div class="uphone">{{ $admin->phone }}</div>
                    </div>
                </div>
                <div class="info-content">
                    <div class="main-content">
                        <h3>Admin Information</h3>

                        @if(session("success"))
                            <div class="alert alert-success">{{ session("success") }}</div>
                        @endif
                        <div class="sign-up-content">
                            <form action="{{ route("update_admin") }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-textbox">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" value="{{ $admin->name }}">
                                </div>
                                @if($errors->has("name"))
                                    <div class="alert alert-danger">{{ $errors->first("name") }}</div>
                                @endif

                                <div class="form-textbox">
                                    <label for="surname">Surname</label>
                                    <input type="text" name="surname" id="surname" value="{{ $admin->surname }}">
                                </div>
                                @if($errors->has("surname"))
                                    <div class="alert alert-danger">{{ $errors->first("surname") }}</div>
                                @endif

                                <div class="form-textbox">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" value="{{ $admin->email }}">
                                </div>
                                @if($errors->has("email"))
                                    <div class="alert alert-danger">{{ $errors->first("email") }}</div>
                                @endif

                                <div class="form-textbox">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" id="phone" value="{{ $admin->phone }}">
                                </div>
                                @if($errors->has("phone"))
                                    <div class="alert alert-danger">{{ $errors->first("phone") }}</div>
                                @endif

                                <div class="form-textbox">
                                    <label for="pass">Password</label>
                                    <input type="password" name="password" id="pass">
                                </div>

                                <div class="form-textbox">
                                    <label for="photo">Photo</label>
                                    <input type="file" name="photo" id="photo">
                                </div>
                                @if($errors->has("photo"))
                                    <div class="alert alert-danger">{{ $errors->first("photo") }}</div>
                                @endif

                                <div class="form-textbox">
                                    <input type="submit" name="submit" id="submit" class="submit" value="Update" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section>
</body>
</html>

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

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light @if(!Request::is("/")) ftco-navbar-light-2 @endif" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route("home") }}">BG Entertainment</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item @if(Request::is("/")) active @endif"><a href="{{ route("home") }}" class="nav-link">Home</a></li>
                <li class="nav-item @if(Request::is("/catalog")) active @endif"><a href="{{ route("catalog") }}" class="nav-link">Catalog</a></li>
                <li class="nav-item @if(Request::is("/about")) active @endif"><a href="{{ route("about") }}" class="nav-link">About</a></li>
                <li class="nav-item @if(Request::is("/contact")) active @endif"><a href="{{ route("contact") }}" class="nav-link">Contact</a></li>

                @auth
                    <li class="nav-item"><a href="{{ route("account") }}" class="nav-link" style="text-decoration: underline;">Account</a></li>
                    <li class="nav-item"><a href="{{ route("logout") }}" class="nav-link" style="text-decoration: underline;">Logout</a></li>
                @else
                    @if(Route::has("login"))
                        <li class="nav-item"><a href="{{ route("login") }}" class="nav-link" style="text-decoration: underline;">Login</a></li>
                    @endif
                    @if(Route::has("register"))
                        <li class="nav-item"><a href="{{ route("register") }}" class="nav-link" style="text-decoration: underline;">Register</a></li>
                    @endif
                @endauth
                <li class="nav-item cta cta-colored"><a href="cart.html" class="nav-link"><i class="fas fa-shopping-cart"></i>[0]</a></li>

            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->

@yield("content")

<footer class="ftco-footer bg-light ftco-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Modist</h2>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                        <li class="ftco-animate"><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li class="ftco-animate"><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li class="ftco-animate"><a href="#"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-5">
                    <h2 class="ftco-heading-2">Menu</h2>
                    <ul class="list-unstyled">
                        <li><a href="#" class="py-2 d-block">Shop</a></li>
                        <li><a href="#" class="py-2 d-block">About</a></li>
                        <li><a href="#" class="py-2 d-block">Journal</a></li>
                        <li><a href="#" class="py-2 d-block">Contact Us</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Help</h2>
                    <div class="d-flex">
                        <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
                            <li><a href="#" class="py-2 d-block">Shipping Information</a></li>
                            <li><a href="#" class="py-2 d-block">Returns &amp; Exchange</a></li>
                            <li><a href="#" class="py-2 d-block">Terms &amp; Conditions</a></li>
                            <li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
                        </ul>
                        <ul class="list-unstyled">
                            <li><a href="#" class="py-2 d-block">FAQs</a></li>
                            <li><a href="#" class="py-2 d-block">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Have a Questions?</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><i class="fas fa-map-marker-alt"></i><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
                            <li><a href="#"><i class="fa fa-phone"></i><span class="text">+2 392 3929 210</span></a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i><span class="text">info@yourdomain.com</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">

                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>
    </div>
</footer>



<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


<script src="{{ asset("js/jquery.min.js") }}"></script>
<script src="{{ asset("js/jquery-migrate-3.0.1.min.js") }}"></script>
<script src="{{ asset("js/popper.min.js") }}"></script>
<script src="{{ asset("js/bootstrap.min.js") }}"></script>
<script src="{{ asset("js/jquery.easing.1.3.js") }}"></script>
<script src="{{ asset("js/jquery.waypoints.min.js") }}"></script>
<script src="{{ asset("js/jquery.stellar.min.js") }}"></script>
<script src="{{ asset("js/owl.carousel.min.js") }}"></script>
<script src="{{ asset("js/jquery.magnific-popup.min.js") }}"></script>
<script src="{{ asset("js/aos.js") }}"></script>
<script src="{{ asset("js/jquery.animateNumber.min.js") }}"></script>
<script src="{{ asset("js/bootstrap-datepicker.js") }}"></script>
<script src="{{ asset("js/scrollax.min.js") }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="{{ asset("js/google-map.js") }}"></script>
<script src="{{ asset("js/main.js") }}"></script>
<script src="https://kit.fontawesome.com/06c89e9946.js" crossorigin="anonymous"></script>
</body>
</html>

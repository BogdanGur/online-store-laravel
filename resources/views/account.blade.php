@extends("layouts.body")

@section("title", "Account")

@section("content")
    <section class="panel">
        <div class="container">
            <div class="content-panel">
                <aside class="bgnavbar">
                    <div class="navbar-head">
                        <div class="navbar-name">BG System</div>
                    </div>
                    <div class="navbar-body">
                        <ul>
                            <li><a href="#"><i class="fas fa-home"></i> Main</a></li>
                            <li><a href="#">Main</a></li>
                            <li><a href="#">Main</a></li>
                        </ul>
                    </div>
                </aside>
                <div class="bgcontent">
                    <div class="user-head">
                        <div class="user-info">
                            <div class="user-photo">
                                <img src="{{ asset("images/photo.jpg") }}" alt="">
                            </div>
                            <div class="user-name">
                                <div class="uname">Bogdan Gurskyi</div>
                                <div class="uemail">bogur007@gmail.com</div>
                            </div>
                        </div>
                        <div class="user-right_info">
                            <div class="uphone">+380501790107</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <section>
@endsection

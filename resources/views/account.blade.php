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
                            <li><a href="#"><i class="fas fa-heart"></i> Liked</a></li>
                            <li><a href="#"><i class="far fa-credit-card"></i> Orders</a></li>
                        </ul>
                    </div>
                </aside>
                <div class="bgcontent">
                    <div class="user-head">
                        <div class="user-info">
                            <div class="user-photo">
                                @if($user->photo)
                                    <img src="{{ \Illuminate\Support\Facades\Storage::url("/user_photos/".$user->photo) }}" alt="">
                                @else
                                    <img src="{{ asset("images/photo.jpg") }}" alt="">
                                @endif
                            </div>
                            <div class="user-name">
                                <div class="uname">{{ $user->name }} {{ $user->surname }}</div>
                                <div class="uemail">{{ $user->email }}</div>
                            </div>
                        </div>
                        <div class="user-right_info">
                            <div class="uphone">{{ $user->phone }}</div>
                        </div>
                    </div>
                    <div class="info-content">
                        <div class="main-content">
                            <h3>Main Information</h3>

                            @if(session("success"))
                                <div class="alert alert-success">{{ session("success") }}</div>
                            @endif
                            <div class="sign-up-content">
                                <form action="{{ route("update_user") }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-textbox">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" value="{{ $user->name }}">
                                    </div>
                                    @if($errors->has("name"))
                                        <div class="alert alert-danger">{{ $errors->first("name") }}</div>
                                    @endif

                                    <div class="form-textbox">
                                        <label for="surname">Surname</label>
                                        <input type="text" name="surname" id="surname" value="{{ $user->surname }}">
                                    </div>
                                    @if($errors->has("surname"))
                                        <div class="alert alert-danger">{{ $errors->first("surname") }}</div>
                                    @endif

                                    <div class="form-textbox">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" value="{{ $user->email }}">
                                    </div>
                                    @if($errors->has("email"))
                                        <div class="alert alert-danger">{{ $errors->first("email") }}</div>
                                    @endif

                                    <div class="form-textbox">
                                        <label for="phone">Phone</label>
                                        <input type="text" name="phone" id="phone" value="{{ $user->phone }}">
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
@endsection

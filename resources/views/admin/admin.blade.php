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
                        <li><a href="#" data-section="main">Main</a></li>
                        <li><a href="#" data-section="product">Products</a></li>
                        <li><a href="#" data-section="site">Site</a></li>
                    </ul>
                    <br>
                </div>
                <a href="{{ route("admin_logout") }}" class="logout">Logout</a>
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
                            <small class="acc-flag">Admin</small>
                        </div>
                    </div>
                    <div class="user-right_info">
                        <div class="uphone">{{ $admin->phone }}</div>
                    </div>
                </div>
                <div class="info-content">
                    @if(session("success"))
                        <div class="alert alert-success">{{ session("success") }}</div>
                    @endif
                    <div class="other-content main-content">
                        <h3>Admin Information</h3>

                        <div class="sign-up-content">
                            <form action="{{ route("update_admin") }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-textbox">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" value="{{ $admin->name }}">
                                </div>
                                @if($errors->has("name"))
                                    <div class="alert alert-danger">{{ $errors->first("name") }}</div>
                                @endif

                                <div class="form-textbox">
                                    <label for="surname">Surname</label>
                                    <input type="text" name="surname" value="{{ $admin->surname }}">
                                </div>
                                @if($errors->has("surname"))
                                    <div class="alert alert-danger">{{ $errors->first("surname") }}</div>
                                @endif

                                <div class="form-textbox">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" value="{{ $admin->email }}">
                                </div>
                                @if($errors->has("email"))
                                    <div class="alert alert-danger">{{ $errors->first("email") }}</div>
                                @endif

                                <div class="form-textbox">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" value="{{ $admin->phone }}">
                                </div>
                                @if($errors->has("phone"))
                                    <div class="alert alert-danger">{{ $errors->first("phone") }}</div>
                                @endif

                                <div class="form-textbox">
                                    <label for="pass">Password</label>
                                    <input type="password" name="password" >
                                </div>

                                <div class="form-textbox">
                                    <label for="photo">Photo</label>
                                    <input type="file" name="photo" >
                                </div>
                                @if($errors->has("photo"))
                                    <div class="alert alert-danger">{{ $errors->first("photo") }}</div>
                                @endif

                                <div class="form-textbox">
                                    <input type="submit" name="submit" class="submit" value="Update" />
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="other-content  product-content" style="display: none;">
                        <h3>Products</h3>

                        <div class="product-edit-add">
                            <div class="product-edit">
                                @if($products)
                                    @foreach($products as $product)
                                        <div class="product-cont">
                                            <div class="product-block">
                                                <div class="left-pr-info">
                                                    <div class="pr-img"><img src="{{ \Illuminate\Support\Facades\Storage::url("public/product_photos/".$product->image->img) }}" alt=""></div>
                                                    <div class="pr-name-desc">
                                                        <div class="pr-name">{{ $product->name }}</div>
                                                        <p class="pr-desc">{{ \Illuminate\Support\Str::words($product->description, 5) }}</p>
                                                    </div>
                                                </div>
                                                <div class="right-pr-info">
                                                    @if($product->discount)
                                                        <div class="pr-price"><s>{{ $product->price }}$</s></div>
                                                        <div class="pr-discount">-{{ $product->discount }}%</div>
                                                        <div class="pr-price_ds">{{ $product->discount_price }}$</div>
                                                    @else
                                                        <div class="pr-price">{{ $product->price }}$</div>
                                                    @endif
                                                    <div class="pr-var">{{ \Illuminate\Support\Str::upper($product->variation) }}</div>
                                                </div>
                                            </div>
                                            <div class="product-adm-btns">
                                                <a href="{{ route("delete_product", $product->id) }}" class="delete_product_btn">Delete</a>
                                                <div class="open-edit-btn"><i class="fas fa-angle-down"></i> <i class="fas fa-angle-up" style="display: none;"></i> Edit</div>
                                            </div>
                                            <div class="sign-up-content">
                                                <form action="{{ route("update_product", $product->id) }}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-textbox">
                                                        <label for="name">Name</label>
                                                        <input type="text" name="name" value="{{ $product->name }}">
                                                    </div>
                                                    @if($errors->has("name"))
                                                        <div class="alert alert-danger">{{ $errors->first("name") }}</div>
                                                    @endif

                                                    <div class="form-textbox">
                                                        <textarea name="description" placeholder="Description">{{ $product->description }}</textarea>
                                                    </div>
                                                    @if($errors->has("description"))
                                                        <div class="alert alert-danger">{{ $errors->first("description") }}</div>
                                                    @endif

                                                    <div class="form-textbox">
                                                        <label for="price">Price</label>
                                                        <input type="number" name="price" value="{{ $product->price }}">
                                                    </div>
                                                    @if($errors->has("price"))
                                                        <div class="alert alert-danger">{{ $errors->first("price") }}</div>
                                                    @endif

                                                    <div class="form-textbox">
                                                        <label for="discount">Discount</label>
                                                        <input type="text" name="discount" value="{{ $product->discount }}">
                                                    </div>
                                                    @if($errors->has("discount"))
                                                        <div class="alert alert-danger">{{ $errors->first("discount") }}</div>
                                                    @endif

                                                    <div class="flex-radio">
                                                        <h5>Size: </h5>
                                                        <div class="radio-pr-block">
                                                            <label for="pass">S</label>
                                                            <input type="radio" name="size" value="s" @if($product->variation == "S") checked @endif>
                                                        </div>
                                                        <div class="radio-pr-block">
                                                            <label for="pass">M</label>
                                                            <input type="radio" name="size" value="m" @if($product->variation == "M") checked @endif>
                                                        </div>
                                                        <div class="radio-pr-block">
                                                            <label for="pass">L</label>
                                                            <input type="radio" name="size" value="l" @if($product->variation == "L") checked @endif>
                                                        </div>
                                                        <div class="radio-pr-block">
                                                            <label for="pass">XL</label>
                                                            <input type="radio" name="size" value="xl" @if($product->variation == "XL") checked @endif>
                                                        </div>
                                                    </div>

                                                    <div class="form-textbox">
                                                        <label for="photo">Product image</label>
                                                        <input type="file" name="image[]" multiple>
                                                    </div>
                                                    @if($errors->has("image"))
                                                        <div class="alert alert-danger">{{ $errors->first("image") }}</div>
                                                    @endif

                                                    <div class="form-textbox">
                                                        <input type="submit" name="submit" class="submit" value="Update" />
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="product-add">
                                <div class="product-cont">
                                    <h3 style="text-align: center;">Add product</h3>
                                    <div class="sign-up-content">
                                        <form action="{{ route("add_product") }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-textbox">
                                                <label for="name">Name</label>
                                                <input type="text" name="name">
                                            </div>
                                            @if($errors->has("name"))
                                                <div class="alert alert-danger">{{ $errors->first("name") }}</div>
                                            @endif

                                            <div class="form-textbox">
                                                <textarea name="description" placeholder="Description"></textarea>
                                            </div>
                                            @if($errors->has("description"))
                                                <div class="alert alert-danger">{{ $errors->first("description") }}</div>
                                            @endif

                                            <div class="form-textbox">
                                                <label for="price">Price</label>
                                                <input type="number" name="price">
                                            </div>
                                            @if($errors->has("price"))
                                                <div class="alert alert-danger">{{ $errors->first("price") }}</div>
                                            @endif

                                            <div class="form-textbox">
                                                <label for="discount">Discount</label>
                                                <input type="text" name="discount">
                                            </div>
                                            @if($errors->has("discount"))
                                                <div class="alert alert-danger">{{ $errors->first("discount") }}</div>
                                            @endif

                                            <div class="flex-radio">
                                                <h5>Size: </h5>
                                                <div class="radio-pr-block">
                                                    <label for="pass">S</label>
                                                    <input type="radio" name="size" value="s">
                                                </div>
                                                <div class="radio-pr-block">
                                                    <label for="pass">M</label>
                                                    <input type="radio" name="size" value="m">
                                                </div>
                                                <div class="radio-pr-block">
                                                    <label for="pass">L</label>
                                                    <input type="radio" name="size" value="l" checked>
                                                </div>
                                                <div class="radio-pr-block">
                                                    <label for="pass">XL</label>
                                                    <input type="radio" name="size" value="xl">
                                                </div>
                                            </div>

                                            <div class="form-textbox">
                                                <label for="photo">Product image</label>
                                                <input type="file" name="image[]" multiple required>
                                            </div>
                                            @if($errors->has("image"))
                                                <div class="alert alert-danger">{{ $errors->first("image") }}</div>
                                            @endif

                                            <div class="form-textbox">
                                                <input type="submit" class="submit" value="Add">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="other-content site-content" style="display: none;">
                            <h3>Site Information</h3>

                            <div class="sign-up-content">
                                <form action="{{ route("update_site_info") }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <h3>Home Section</h3>

                                    <div class="form-textbox">
                                        <label for="photo">Main background</label>
                                        <input type="file" name="main_bg">
                                    </div>
                                    @if($errors->has("main_bg"))
                                        <div class="alert alert-danger">{{ $errors->first("main_bg") }}</div>
                                    @endif

                                    <div class="form-textbox">
                                        <label for="photo">Page background</label>
                                        <input type="file" name="page_bg">
                                    </div>
                                    @if($errors->has("page_bg"))
                                        <div class="alert alert-danger">{{ $errors->first("page_bg") }}</div>
                                    @endif

                                    <div class="form-textbox">
                                        <label for="name">Home title</label>
                                        <input type="text" name="home_title" value="{{ $site->home_title }}">
                                    </div>
                                    @if($errors->has("home_title"))
                                        <div class="alert alert-danger">{{ $errors->first("home_title") }}</div>
                                    @endif

                                    <div class="form-textbox">
                                        <label for="surname">Home subtitle</label>
                                        <input type="text" name="home_subtitle" value="{{ $site->home_subtitle }}">
                                    </div>
                                    @if($errors->has("home_subtitle"))
                                        <div class="alert alert-danger">{{ $errors->first("home_subtitle") }}</div>
                                    @endif

                                    <div class="form-textbox">
                                        <label for="name">Home mini about</label>
                                        <input type="text" name="home_mini_about" value="{{ $site->home_mini_about }}">
                                    </div>
                                    @if($errors->has("home_mini_about"))
                                        <div class="alert alert-danger">{{ $errors->first("home_mini_about") }}</div>
                                    @endif

                                    <div class="form-textbox">
                                        <label for="name">Home since</label>
                                        <input type="text" name="home_since" value="{{ $site->home_since }}">
                                    </div>
                                    @if($errors->has("home_since"))
                                        <div class="alert alert-danger">{{ $errors->first("home_since") }}</div>
                                    @endif

                                    <div class="form-textbox">
                                        <label for="surname">Banner</label>
                                        <input type="text" name="banner" value="{{ $site->banner }}">
                                    </div>
                                    @if($errors->has("banner"))
                                        <div class="alert alert-danger">{{ $errors->first("banner") }}</div>
                                    @endif

                                    <h3>About Section</h3>

                                    <div class="form-textbox">
                                        <label for="photo">Photo</label>
                                        <input type="file" name="about_photo">
                                    </div>
                                    @if($errors->has("about_photo"))
                                        <div class="alert alert-danger">{{ $errors->first("about_photo") }}</div>
                                    @endif

                                    <div class="form-textbox">
                                        <label for="surname">About title</label>
                                        <input type="text" name="about_title" value="{{ $site->about_title }}">
                                    </div>
                                    @if($errors->has("about_title"))
                                        <div class="alert alert-danger">{{ $errors->first("about_title") }}</div>
                                    @endif

                                    <div class="form-textbox">
                                        <textarea name="about_content" placeholder="About content">{{ $site->about_content }}</textarea>
                                    </div>
                                    @if($errors->has("about_content"))
                                        <div class="alert alert-danger">{{ $errors->first("about_content") }}</div>
                                    @endif

                                    <h3>Contact</h3>

                                    <div class="form-textbox">
                                        <label for="surname">Location</label>
                                        <input type="text" name="contact_location" value="{{ $site->contact_location }}">
                                    </div>
                                    @if($errors->has("contact_location"))
                                        <div class="alert alert-danger">{{ $errors->first("contact_location") }}</div>
                                    @endif

                                    <div class="form-textbox">
                                        <label for="surname">Phone</label>
                                        <input type="tel" name="contact_phone" value="{{ $site->contact_phone }}">
                                    </div>
                                    @if($errors->has("contact_phone"))
                                        <div class="alert alert-danger">{{ $errors->first("contact_phone") }}</div>
                                    @endif

                                    <div class="form-textbox">
                                        <label for="surname">Email</label>
                                        <input type="email" name="contact_email" value="{{ $site->contact_email }}">
                                    </div>
                                    @if($errors->has("contact_email"))
                                        <div class="alert alert-danger">{{ $errors->first("contact_email") }}</div>
                                    @endif

                                    <div class="form-textbox">
                                        <input type="submit" name="submit" class="submit" value="Update" />
                                    </div>
                                </form>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <section>

        <script src="{{ asset("js/jquery.min.js") }}"></script>
        <script src="{{ asset("js/jquery-migrate-3.0.1.min.js") }}"></script>
        <script src="{{ asset("js/nicEdit.js") }}"></script>
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
        <script src="{{ asset("js/main.js") }}"></script>
        <script src="https://kit.fontawesome.com/06c89e9946.js" crossorigin="anonymous"></script>
</body>
</html>

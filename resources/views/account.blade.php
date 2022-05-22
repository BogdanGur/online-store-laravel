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
                            <li><a href="#" data-section="main"><i class="fas fa-home"></i> Main</a></li>
                            <li><a href="#" data-section="like"><i class="fas fa-heart"></i> Liked</a></li>
                            <li><a href="#" data-section="orders"><i class="far fa-credit-card"></i> Orders</a></li>
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
                        @if(session("success"))
                            <div class="alert alert-success">{{ session("success") }}</div>
                        @endif

                        <div class="other-content main-content">
                            <h3>Main Information</h3>

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
                        <div class="other-content like-content" style="display: none;">
                            <h3>liked Products</h3>

                            <div class="product-edit-add">
                                <div class="product-edit">
                                    @if($liked)
                                        @foreach($liked as $like)
                                            <div class="product-cont">
                                                <div class="product-block">
                                                    <div class="left-pr-info">
                                                        <div class="pr-img"><img src="{{ Illuminate\Support\Facades\Storage::url("public/product_photos/".$like->product->image->img) }}" alt=""></div>
                                                        <div class="pr-name-desc">
                                                            <div class="pr-name"><a href="{{ route("product_page", $like->product->slug) }}">{{ $like->product->name }}</a></div>
                                                            <p class="pr-desc">{{ Illuminate\Support\Str::words($like->product->description, 5) }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="right-pr-info">
                                                        @if($like->product->discount)
                                                            <div class="pr-price"><s>{{ $like->product->price }}$</s></div>
                                                            <div class="pr-discount">-{{ $like->product->discount }}%</div>
                                                            <div class="pr-price_ds">{{ $like->product->price * (1 - $like->product->discount / 100) }}$</div>
                                                        @else
                                                            <div class="pr-price">{{ $like->product->price }}$</div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="product-adm-btns">
                                                    <a href="{{ route("delete_like", $like->product->id) }}" class="delete_product_btn">Delete</a>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="other-content orders-content" style="display: none;">
                            <h3>My Orders</h3>

                            @if(count($orders) > 0)
                                <div class="orders-block">
                                    @foreach($orders as $order)
                                        <div class="order-block">
                                            <div class="info-order-block">
                                                <div class="order-ps">
                                                    <div class="order-id">{{ $order->id }}</div>
                                                    @if($order->total_discount > 0)
                                                        <div class="order-price" style="margin-right: 0;"><s>${{ $order->subtotal_price }}</s></div>
                                                        <div class="order-price" style="color: darkred; margin-right: 5px; margin-left: 3px;"><sup>${{ $order->total_discount }}</sup></div>
                                                        <i class="fas fa-arrow-right"></i>
                                                        <div class="order-price">${{ $order->total_price }}</div>
                                                    @else
                                                        <div class="order-price">${{ $order->total_price }}</div>
                                                    @endif
                                                    @if($order->status == "paid")
                                                        <div class="order-status status-paid">Paid</div>
                                                    @elseif($order->status == "process")
                                                        <div class="order-status status-process">Process</div>
                                                    @else
                                                        <div class="order-status status-declined">Declined</div>
                                                    @endif
                                                </div>
                                                @if($order->status == "process")
                                                    <a href="{{ route("checkout") }}" class="order-to-btn"><i class="fas fa-arrow-right"></i></a>
                                                @endif
                                                <div class="order-date">{{ date("d/m/Y", strtotime($order->updated_at)) }}</div>
                                            </div>
                                            <div class="order-products-block">
                                                @foreach($order->prod as $prod)
                                                    <div class="order-product">
                                                        <div class="o-img_name">
                                                            <div class="o-img"><img src="{{ \Illuminate\Support\Facades\Storage::url("public/product_photos/".$prod->product->image->img)  }}" alt=""></div>
                                                            <div class="o-name">{{ $prod->product->name }}</div>
                                                        </div>
                                                        <div class="o-price-quantity-size">
                                                            <div class="o-price">${{ $prod->price }}</div>
                                                            <div class="o-quantity">{{ $prod->quantity }}</div>
                                                            <div class="o-size">{{ $prod->size }}</div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="order-products-btn"><i class="fas fa-angle-down"></i><i class="fas fa-angle-up" style="display: none;"></i></div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <section>
@endsection

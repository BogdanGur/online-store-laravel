@extends("layouts.body")

@section("title", "Cart")

@section("content")
    <div class="hero-wrap hero-bread" style="background-image: url('{{ Illuminate\Support\Facades\Storage::url("public/site_images/".$site->page_bg) }}');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-0 bread">My Cart</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
                </div>
            </div>
        </div>
    </div>

    @if(count($products) > 0)
    <section class="ftco-section ftco-cart">
        <div class="container">
            @if(session("success"))
                <div class="alert alert-success">{{ session("success") }}</div>
            @endif
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list">
                        <table class="table">
                            <thead class="thead-primary">
                            <tr class="text-center">
                                <th>&nbsp;</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Size</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                                <tbody>
                                @php
                                    $full_price = 0;
                                    $discount = 0;
                                @endphp
                                    @foreach($products as $product)
                                        <tr class="text-center cart_product_{{ $product->id }}">
                                            <td class="product-remove"><a href="{{ route("cart.remove", $product->id) }}"><i class="fas fa-times"></i></a></td>
                                            <td class="image-prod">
                                                <div class="img" style="background-image:url({{ \Illuminate\Support\Facades\Storage::url("public/product_photos/".$product->product->image->img) }});"></div>
                                            </td>
                                            <td class="product-name">
                                                <a href="{{ route("productPage", $product->product->slug) }}"><h3>{{ $product->product->name }}</h3></a>
                                                <p>{{ \Illuminate\Support\Str::words($product->product->description, 15) }}</p>
                                            </td>
                                            @php $full_price += $product->product->price * $product->quantity; @endphp

                                            @if($product->product->discount)
                                                <td class="price">
                                                    <p class="real-price" data-prs="{{ $product->product->price }}"><s>${{ $product->product->price }}</s></p>
                                                    <p class="discount-num" data-dsc="{{ $product->product->discount }}">-{{ $product->product->discount }}%</p>
                                                    <p class="discount-price" data-dscprs="{{ $product->product->discount_price }}">${{ $product->product->discount_price }}</p>
                                                </td>

                                                @php $discount += $product->product->price * $product->quantity - ($product->product->price * $product->quantity *(1-$product->product->discount/100)); @endphp
                                            @else
                                                <td class="price"><p class="real-price" data-prs="{{ $product->product->price }}">${{ $product->product->price }}</p></td>
                                            @endif
                                            <td class="size">{{ $product->size }}</td>
                                            <td class="quantity">
                                                <div class="input-group mb-3">
                                                    <input type="text" name="quantity" class="quantity form-control input-number"
                                                           value="{{ $product->quantity }}" min="1" max="100" data-pid="{{ $product->id }}" data-price="{{ $product->product->discount_price }}">
                                                </div>
                                            </td>
                                            <td class="total">${{ number_format($product->total, 0, "", " ") }}</td>
                                        </tr>
                                    @endforeach
                                @php $total = $full_price - $discount; @endphp
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Cart Totals</h3>
                        <p class="d-flex">
                            <span>Subtotal</span>
                            <span>${{ $full_price }}</span>
                        </p>
                        <p class="d-flex">
                            <span>Delivery</span>
                            <span>$0.00</span>
                        </p>
                        <p class="d-flex">
                            <span>Discount</span>
                            <span>${{ $discount }}</span>
                        </p>
                        <hr>
                        <p class="d-flex total-price">
                            <span>Total</span>
                            <span>${{ $total }}</span>
                        </p>
                    </div>
                    <p class="text-center"><a href="{{ route("cart.checkoutAdd") }}/?price={{ $total }}&subtotal={{ $full_price }}&discount={{ $discount }}" class="btn btn-primary py-3 px-4">Proceed to
                            Checkout</a></p>

                    <br>
                    @if(session("error"))
                        <div class="alert alert-danger">{{ session("error") }}</div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    @else
        <section class="ftco-section ftco-cart">
            <div class="container">
                <h1 style="text-align: center;">Empty</h1>
            </div>
        </section>
    @endif

    <section class="ftco-section-parallax">
        <div class="parallax-img d-flex align-items-center">
            <div class="container">
                <div class="row d-flex justify-content-center py-5">
                    <div class="col-md-7 text-center heading-section ftco-animate">
                        <h1 class="big">Subscribe</h1>
                        <h2>Subcribe to our Newsletter</h2>
                        <div class="row d-flex justify-content-center mt-5">
                            <div class="col-md-8">
                                <form action="#" class="subscribe-form">
                                    <div class="form-group d-flex">
                                        <input type="text" class="form-control" placeholder="Enter email address">
                                        <input type="submit" value="Subscribe" class="submit px-3">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

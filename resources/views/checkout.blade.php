@extends("layouts.body")

@section("title", "Checkout")

@section("content")
    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-0 bread">Checkout</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Checkout</span></p>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 ftco-animate">
                    <form action="#" class="billing-form bg-light p-3 p-md-5">
                        <h3 class="mb-4 billing-heading">Shipping Details</h3>
                        <div class="row align-items-end">
                            <div class="col-md-6">
                                <div class="alert alert-danger first_name-error" style="display: none;"></div>
                                <div class="form-group">
                                    <label for="firstname">Firt Name *</label>
                                    <input type="text" class="form-control first_name" name="first_name" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="alert alert-danger last_name-error" style="display: none;"></div>
                                <div class="form-group">
                                    <label for="lastname">Last Name *</label>
                                    <input type="text" class="form-control last_name" name="last_name" placeholder="">
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-12">
                                <div class="alert alert-danger country-error" style="display: none;"></div>
                                <div class="form-group">
                                    <label for="country">State / Country *</label>
                                    <div class="select-wrap">
                                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                        <select name="country" id="" class="form-control country">
                                            <option value="France">France</option>
                                            <option value="Ukraine">Ukraine</option>
                                            <option value="Italy">Italy</option>
                                            <option value="Philippines">Philippines</option>
                                            <option value="South Korea">South Korea</option>
                                            <option value="Hongkong">Hongkong</option>
                                            <option value="Japan">Japan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-6">
                                <div class="alert alert-danger street_address-error" style="display: none;"></div>
                                <div class="form-group">
                                    <label for="streetaddress">Street Address *</label>
                                    <input type="text" class="form-control street_address" name="street_address" placeholder="House number and street name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control appartment" name="appartment" placeholder="Appartment, suite, unit etc: (optional)">
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-6">
                                <div class="alert alert-danger city-error" style="display: none;"></div>
                                <div class="form-group">
                                    <label for="towncity">Town / City *</label>
                                    <input type="text" class="form-control city" name="city" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="alert alert-danger zip_code-error" style="display: none;"></div>
                                <div class="form-group">
                                    <label for="postcodezip">Postcode / ZIP *</label>
                                    <input type="text" class="form-control zip_code" name="zip_code" placeholder="">
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-6">
                                <div class="alert alert-danger phone-error" style="display: none;"></div>
                                <div class="form-group">
                                    <label for="phone">Phone *</label>
                                    <input type="text" class="form-control phone" name="phone" placeholder="">
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-12">
                                <div class="form-group mt-4">
                                    <div class="radio">
                                        <label class="mr-3"><input type="radio" name="optradio"> Create an Account? </label>
                                        <label><input type="radio" name="optradio"> Ship to different address</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form><!-- END -->

                    @if($order)
                        <div class="row">
                            <div class="col-lg-12 mx-auto m-2">
                                <ul class="list-group">
                                    @foreach($order->prod as $op)
                                        <li class="list-group-item mt-2 mb-2">
                                            <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                                                <div class="media-body order-2 order-lg-1">
                                                    <h5 class="mt-0 font-weight-bold mb-2">{{ $op->product->name }}</h5>
                                                    <p class="font-italic text-muted mb-0 small">{{ \Illuminate\Support\Str::words($op->product->description, 10) }}</p>
                                                    <p class="font-italic text-muted mb-0 small"><b>Size: {{ $op->size }}</b></p>
                                                    <div class="d-flex align-items-center justify-content-between mt-1">
                                                        <h6 class="font-weight-bold my-2">${{ $op->price }} x{{ $op->quantity }} <span style="color: #439733; font-size: 19px;">${{ $op->price * $op->quantity }}</span></h6>
                                                    </div>
                                                </div><img style="width: 150px; height: auto;" src="{{ \Illuminate\Support\Facades\Storage::url("public/product_photos/".$op->product->image->img) }}" alt="Generic placeholder image" width="200" class="ml-lg-5 order-1 order-lg-2">
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    <div class="row mt-5 pt-3 d-flex">
                        <div class="col-md-6 d-flex">
                            <div class="cart-detail cart-total bg-light p-3 p-md-4">
                                <h3 class="billing-heading mb-4">Cart Total</h3>
                                <p class="d-flex">
                                    <span>Subtotal</span>
                                    <span>${{ $order->subtotal_price }}</span>
                                </p>
                                <p class="d-flex">
                                    <span>Delivery</span>
                                    <span>$0.00</span>
                                </p>
                                <p class="d-flex">
                                    <span>Discount</span>
                                    <span>${{ $order->total_discount }}</span>
                                </p>
                                <hr>
                                <p class="d-flex total-price">
                                    <span>Total</span>
                                    <span>${{ $order->total_price }}</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6 payment-main">
                            <div class="payment-load">
                                <div class="lds-dual-ring"></div>
                            </div>
                            <div class="cart-detail bg-light p-3 p-md-4">
                                <h3 class="billing-heading mb-4">Payment Method</h3>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="radio">
                                            <label><input type="radio" name="optradio" class="mr-2 card-payment-radio"> Direct Bank Tranfer</label>
                                        </div>
                                        <div class="payment-block card-payment-block">
                                            <input type="hidden" id="order-id" value="{{ $order->id }}">
                                            <input type="hidden" id="order-price" value="{{ $order->total_price }}">

                                            <!-- Stripe Elements Placeholder -->
                                            <div id="card-element"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="radio">
                                            <label><input type="radio" name="optradio" class="mr-2"> Paypal</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="" class="mr-2"> I have read and accept the terms and conditions</label>
                                        </div>
                                    </div>
                                </div>
                                <p><button class="btn btn-primary py-3 px-4" id="card-button">Place an order</button></p>
                                <div class="payment_status">

                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route("delete_order", $order->id) }}" class="alert alert-danger cancel_order">Отменить Order</a>
                </div> <!-- .col-md-8 -->
            </div>
        </div>
    </section> <!-- .section -->

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

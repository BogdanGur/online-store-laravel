@extends("layouts.body")

@section("title", "Home Page")

@section("content")
    <div class="hero-wrap js-fullheight" style="background-image: url('{{ \Illuminate\Support\Facades\Storage::url("public/site_images/".$site->main_bg) }}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
                <h3 class="v">{{ $site->home_mini_about }}</h3>
                <h3 class="vr">{{ $site->home_since }}</h3>
                <div class="col-md-11 ftco-animate text-center">
                    <h1>{{ $site->home_title }}</h1>
                    <h2><span>{{ $site->home_subtitle }}</span></h2>
                </div>
                <div class="mouse">
                    <a href="#" class="mouse-icon">
                        <div class="mouse-wheel"><i class="fa fa-arrow-down"></i></div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="goto-here"></div>

{{--    <section class="ftco-section ftco-product">--}}
{{--        <div class="container">--}}
{{--            <div class="row justify-content-center mb-3 pb-3">--}}
{{--                <div class="col-md-12 heading-section text-center ftco-animate">--}}
{{--                    <h1 class="big">Trending</h1>--}}
{{--                    <h2 class="mb-4">Trending</h2>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-12">--}}
{{--                    <div class="product-slider owl-carousel ftco-animate">--}}
{{--                        <div class="item">--}}
{{--                            <div class="product">--}}
{{--                                <a href="#" class="img-prod"><img class="img-fluid" src="images/product-1.jpg" alt="Colorlib Template">--}}
{{--                                    <span class="status">30%</span>--}}
{{--                                </a>--}}
{{--                                <div class="text pt-3 px-3">--}}
{{--                                    <h3><a href="#">Young Woman Wearing Dress</a></h3>--}}
{{--                                    <div class="d-flex">--}}
{{--                                        <div class="pricing">--}}
{{--                                            <p class="price"><span class="mr-2 price-dc">$120.00</span><span class="price-sale">$80.00</span></p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="item">--}}
{{--                            <div class="product">--}}
{{--                                <a href="#" class="img-prod"><img class="img-fluid" src="images/product-2.jpg" alt="Colorlib Template"></a>--}}
{{--                                <div class="text pt-3 px-3">--}}
{{--                                    <h3><a href="#">Young Woman Wearing Dress</a></h3>--}}
{{--                                    <div class="d-flex">--}}
{{--                                        <div class="pricing">--}}
{{--                                            <p class="price"><span>$120.00</span></p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="item">--}}
{{--                            <div class="product">--}}
{{--                                <a href="#" class="img-prod"><img class="img-fluid" src="images/product-3.jpg" alt="Colorlib Template"></a>--}}
{{--                                <div class="text pt-3 px-3">--}}
{{--                                    <h3><a href="#">Young Woman Wearing Dress</a></h3>--}}
{{--                                    <div class="d-flex">--}}
{{--                                        <div class="pricing">--}}
{{--                                            <p class="price"><span>$120.00</span></p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="item">--}}
{{--                            <div class="product">--}}
{{--                                <a href="#" class="img-prod"><img class="img-fluid" src="images/product-4.jpg" alt="Colorlib Template"></a>--}}
{{--                                <div class="text pt-3 px-3">--}}
{{--                                    <h3><a href="#">Young Woman Wearing Dress</a></h3>--}}
{{--                                    <div class="d-flex">--}}
{{--                                        <div class="pricing">--}}
{{--                                            <p class="price"><span>$120.00</span></p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="item">--}}
{{--                            <div class="product">--}}
{{--                                <a href="#" class="img-prod"><img src="images/product-5.jpg" alt="Colorlib Template">--}}
{{--                                    <span class="status">30%</span>--}}
{{--                                </a>--}}
{{--                                <div class="text pt-3 px-3">--}}
{{--                                    <h3><a href="#">Young Woman Wearing Dress</a></h3>--}}
{{--                                    <div class="d-flex">--}}
{{--                                        <div class="pricing">--}}
{{--                                            <p class="price"><span class="mr-2 price-dc">$120.00</span><span class="price-sale">$80.00</span></p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="item">--}}
{{--                            <div class="product">--}}
{{--                                <a href="#" class="img-prod"><img src="images/product-6.jpg" alt="Colorlib Template"></a>--}}
{{--                                <div class="text pt-3 px-3">--}}
{{--                                    <h3><a href="#">Young Woman Wearing Dress</a></h3>--}}
{{--                                    <div class="d-flex">--}}
{{--                                        <div class="pricing">--}}
{{--                                            <p class="price"><span>$120.00</span></p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

    <section class="ftco-section ftco-no-pb ftco-no-pt bg-light" style="padding: 50px 0 !important;">
        <div class="container">
            <div class="row">
                <div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url({{ \Illuminate\Support\Facades\Storage::url("public/site_images/".$site->about_photo) }});"></div>
                <div class="col-md-7 py-5 wrap-about pb-md-5 ftco-animate">
                    <div class="heading-section-bold mb-5 mt-md-5">
                        <div class="ml-md-0">
                            <h2 class="mb-4">{{ $site->about_title }}</h2>
                        </div>
                    </div>
                    <div class="pb-md-5">
                        <p>{{ $site->about_content }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if($products)
        <section class="ftco-section bg-light">
            <div class="container">
                <div class="row justify-content-center mb-3 pb-3">
                    <div class="col-md-12 heading-section text-center ftco-animate">
                        <h1 class="big">Products</h1>
                        <h2 class="mb-4">Our Products</h2>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-sm col-md-6 col-lg ftco-animate">
                            <div class="product">
                                <a href="{{ route("product_page", $product->slug) }}" class="img-prod">
                                    <img class="img-fluid" src="{{ \Illuminate\Support\Facades\Storage::url("public/product_photos/".$product->image->img) }}" alt="BG Corp">
                                    @if($product->discount) <span class="status">{{ $product->discount }}%</span> @endif
                                </a>
                                <div class="text py-3 px-3">
                                    <h3><a href="{{ route("product_page", $product->slug) }}">{{ $product->name }}</a></h3>
                                    <div class="d-flex">
                                        <div class="pricing">
                                            @if($product->discount)
                                                <p class="price">
                                                    <span class="mr-2 price-dc">${{ $product->price }}</span>
                                                    <span class="price-sale">${{ $product->price*(1-$product->discount/100) }}</span>
                                                </p>
                                            @else
                                                <p class="price"><span>${{ $product->price }}</span></p>
                                            @endif
                                        </div>
                                    </div>
                                    <hr>
                                    <p class="bottom-area d-flex">
                                        <a href="#" class="add-to-cart"><span>Add to cart <i class="fas fa-plus"></i></span></a>
                                        <a href="#" class="ml-auto"><span><i class="far fa-heart"></i></span></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <section class="ftco-section ftco-section-more img" style="background-image: url(images/bg_5.jpg);">
        <div class="container">
            <div class="row justify-content-center mb-3 pb-3">
                <div class="col-md-12 heading-section ftco-animate">
                    <h2>{{ $site->banner }}</h2>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(images/bg_4.jpg);">
        <div class="container">
            <div class="row justify-content-center py-5">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <strong class="number" data-number="10000">0</strong>
                                    <span>Happy Customers</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <strong class="number" data-number="100">0</strong>
                                    <span>Branches</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <strong class="number" data-number="1000">0</strong>
                                    <span>Partner</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <strong class="number" data-number="100">0</strong>
                                    <span>Awards</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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

@extends("layouts.body")

@section("title", "Home Page")

@section("content")
    <div class="hero-wrap js-fullheight" style="background-image: url('{{ \Illuminate\Support\Facades\Storage::url("public/site_images/".$site->main_bg) }}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
                <h3 class="v">{{ app()->getLocale() == 'en' ? $site->home_mini_about : $site->home_mini_about_ua }}</h3>
                <h3 class="vr">{{ app()->getLocale() == 'en' ? $site->home_since :  $site->home_since_ua }}</h3>
                <div class="col-md-11 ftco-animate text-center">
                    <h1>{{ app()->getLocale() == 'en' ? $site->home_title : $site->home_title_ua }}</h1>
                    <h2><span>{{ app()->getLocale() == 'en' ? $site->home_subtitle : $site->home_subtitle_ua }}</span></h2>
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

    <section class="ftco-section ftco-no-pb ftco-no-pt bg-light" style="padding: 50px 0 !important;">
        <div class="container">
            <div class="row">
                <div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url({{ \Illuminate\Support\Facades\Storage::url("public/site_images/".$site->about_photo) }});"></div>
                <div class="col-md-7 py-5 wrap-about pb-md-5 ftco-animate">
                    <div class="heading-section-bold mb-5 mt-md-5">
                        <div class="ml-md-0">
                            <h2 class="mb-4">{{ app()->getLocale() == 'en' ? $site->about_title : $site->about_title_ua }}</h2>
                        </div>
                    </div>
                    <div class="pb-md-5">
                        <p>{{ app()->getLocale() == 'en' ? $site->about_content : $site->about_content_ua }}</p>
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
                        <h1 class="big">{{ __('home.products') }}</h1>
                        <h2 class="mb-4">{{ __('home.ourProducts') }}</h2>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="search-prod">
                    <div class="input-group">
                        <input type="text" name="q" id="search-input"><button onclick="_search($('#search-input').val())">{{ __('home.search') }}</button>
                    </div>
                </div>
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-sm col-md-6 col-lg ftco-animate">
                            <div class="product">
                                <a href="{{ route("productPage", $product->slug) }}" class="img-prod">
                                    <img class="img-fluid" src="{{ Illuminate\Support\Facades\Storage::url("public/product_photos/".$product->image->img) }}" alt="BG Corp">
                                    @if($product->discount) <span class="status">{{ $product->discount }}%</span> @endif
                                </a>
                                <div class="text py-3 px-3">
                                    <h3><a href="{{ route("productPage", $product->slug) }}">{{ $product->name }}</a></h3>
                                    <div class="d-flex">
                                        <div class="pricing">
                                            @if($product->discount)
                                                <p class="price">
                                                    <span class="mr-2 price-dc">${{ $product->price }}</span>
                                                    <span class="price-sale">${{ $product->discount_price }}</span>
                                                </p>
                                            @else
                                                <p class="price"><span>${{ number_format($product->price, 0, " ") }}</span></p>
                                            @endif
                                        </div>
                                    </div>
                                    <hr>
                                    <p class="bottom-area d-flex">
                                        <a href="#" class="add-to-cart add-to-cart-fast cart_but_{{ $product->id }}"><span>{{ __('product.addToCart') }} <i class="fas fa-plus"></i><i class="fas fa-check" style="display: none;"></i></span></a>
                                        <select name="size">
                                            <option value="S">S</option>
                                            <option value="M">M</option>
                                            <option value="L">L</option>
                                            <option value="XL">XL</option>
                                        </select>
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <input type="hidden" name="price" value="{{ $product->price }}">
                                        <span class="ml-auto like_prod">
                                        @if($product->like)
                                                <span class="delete_like del_prod_{{ $product->id }}" data-id="{{ $product->like->id }}"><i class="fas fa-heart" style="color: #ff0000;"></i></span>
                                            @else
                                                <span class="like_product like_prod_{{ $product->id }}"><i class="far fa-heart"></i></span>
                                            @endif
                                    </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row mt-5">
                    <div class="col text-center">
                        {{ $products->appends(["q" => request("q")])->links() }}
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section class="ftco-section ftco-section-more img" style="background-image: url(images/bg_5.jpg);">
        <div class="container">
            <div class="row justify-content-center mb-3 pb-3">
                <div class="col-md-12 heading-section ftco-animate">
                    <h2>{{ app()->getLocale() == 'en' ? $site->banner : $site->banner_ua }}</h2>
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
                                    <span>{{ __('main.banner.customers') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <strong class="number" data-number="100">0</strong>
                                    <span>{{ __('main.banner.branches') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <strong class="number" data-number="1000">0</strong>
                                    <span>{{ __('main.banner.partner') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <strong class="number" data-number="100">0</strong>
                                    <span>{{ __('main.banner.awards') }}</span>
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
                        <h1 class="big">{{ __('main.sub.subscribe') }}</h1>
                        <h2>{{ __('main.sub.invite') }}</h2>
                        <div class="row d-flex justify-content-center mt-5">
                            <div class="col-md-8">
                                <form action="#" class="subscribe-form">
                                    <div class="form-group d-flex">
                                        <input type="text" class="form-control" placeholder="{{ __('main.sub.input') }}">
                                        <input type="submit" value="{{ __('main.sub.button') }}" class="submit px-3">
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

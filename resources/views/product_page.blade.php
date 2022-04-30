@extends("layouts.body")

@section("title", $product->name)

@section("content")
    <div class="hero-wrap hero-bread" style="background-image: url('{{ Illuminate\Support\Facades\Storage::url("public/site_images/".$site->page_bg) }}');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-0 bread">{{ $product->name }}</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span class="mr-2"><a href="index.html">Product</a></span> <span>{{ $product->name }}</span></p>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-5">
                    <div class="ftco-animate slider_big">
                        @foreach($product->all_images as $image)
                            <a href="{{ Illuminate\Support\Facades\Storage::url("public/product_photos/".$image["img"]) }}" class="image-popup">
                                <img src="{{ \Illuminate\Support\Facades\Storage::url("public/product_photos/".$image["img"]) }}" class="img-fluid" alt="BG Corp">
                            </a>
                        @endforeach
                    </div>
                    <div class="product_images_all">
                        @foreach($product->all_images as $image)
                            <div class="mini_img"><img src="{{ Illuminate\Support\Facades\Storage::url("public/product_photos/".$image["img"]) }}" alt=""></div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-8 product-details pl-md-5 ftco-animate">
                    <h3>{{ $product->name }}</h3>
                    @if($product->discount) <span class="status">-{{ $product->discount }}%</span> @endif
                    @if($product->discount)
                        <p class="price">
                            <span class="mr-2 price-dc">${{ number_format($product->price, 0, " ") }}</span>
                            <span class="price-sale">${{ number_format($product->price*(1-$product->discount/100), 0, " ") }}</span>
                        </p>
                    @else
                        <p class="price"><span>${{ number_format($product->price, 0, " ") }}</span></p>
                    @endif
                    <p>{{ $product->description }}</p>
                    <div class="row mt-4 product-info">
                        <div class="col-md-6">
                            <div class="form-group d-flex">
                                <div class="select-wrap">
                                    <div class="icon"><i class="fas fa-chevron-down"></i></div>
                                    <select name="size" id="" class="form-control">
                                        <option value="S">Small</option>
                                        <option value="M">Medium</option>
                                        <option value="L">Large</option>
                                        <option value="XL">Extra Large</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="input-group col-md-6 d-flex mb-3">
                        <span class="input-group-btn mr-2">
                            <button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
                           <i class="fas fa-minus"></i>
                            </button>
                            </span>
                            <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
                            <span class="input-group-btn ml-2">
                            <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                             <i class="fas fa-plus"></i>
                         </button>
                        </span>
                        </div>
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="product_price" value="{{ $product->price }}">
                    </div>
                    <p><a href="#" class="btn btn-primary py-3 px-5 add-to-cart">Add to Cart</a></p>
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

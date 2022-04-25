@extends("layouts.body")

@section("title", "Catalog")

@section("content")
    <div class="hero-wrap hero-bread" style="background-image: url('{{ Illuminate\Support\Facades\Storage::url("public/site_images/".$site->page_bg) }}');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-0 bread">Collection</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Product</span></p>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section bg-light">
        <div class="container-fluid">
            <div class="row">
                @foreach($products as $product)
                    <div class="col-sm col-md-6 col-lg ftco-animate">
                        <div class="product">
                            <a href="{{ route("product_page", $product->slug) }}" class="img-prod">
                                <img class="img-fluid" src="{{ Illuminate\Support\Facades\Storage::url("public/product_photos/".$product->image->img) }}" alt="BG Corp">
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
                                            <p class="price"><span>${{ number_format($product->price, 0, " ") }}</span></p>
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
            <div class="row mt-5">
                <div class="col text-center">
                    {{ $products->links() }}
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

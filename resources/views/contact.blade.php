@extends("layouts.body")

@section("title", "Contact")

@section("content")
    <div class="hero-wrap hero-bread" style="background-image: url('{{ Illuminate\Support\Facades\Storage::url("public/site_images/".$site->page_bg) }}');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-0 bread">{{ __('contact.title') }}</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Contact</span></p>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section contact-section bg-light">
        <div class="container">
            <div class="row block-9">
                <div class="col-md-6 order-md-last d-flex">
                    <form action="#" class="bg-white p-5 contact-form">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="{{ __('contact.form.name') }}">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="{{ __('contact.form.email') }}">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="{{ __('contact.form.subject') }}">
                        </div>
                        <div class="form-group">
                            <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="{{ __('contact.form.message') }}"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="{{ __('contact.form.button') }}" class="btn btn-primary py-3 px-5">
                        </div>
                    </form>

                </div>

                <div class="col-md-6 d-flex">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5210.438165534088!2d28.466468192590348!3d49.23433539645424!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x24e70cf597e02a80!2z0JPQvtGC0LXQu9GMINCk0YDQsNC90YbRltGP!5e0!3m2!1suk!2sua!4v1650138122461!5m2!1suk!2sua" style="border:0; width: 100%;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="row d-flex mt-5 contact-info">
                <div class="w-100"></div>
                <div class="col-md-3 d-flex">
                    <div class="info bg-white p-4">
                        <p><span>{{ __('contact.info.address') }}:</span> {{ app()->getLocale() == 'en' ? $site->contact_location : $site->contact_location_ua }}</p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="info bg-white p-4">
                        <p><span>{{ __('contact.info.phone') }}:</span> <a href="tel:{{ $site->contact_phone }}">{{ $site->contact_phone }}</a></p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="info bg-white p-4">
                        <p><span>Email:</span> <a href="mailto:{{ $site->contact_email }}">{{ $site->contact_email }}</a></p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="info bg-white p-4">
                        <p><span>{{ __('contact.info.website') }}:</span> <a href="{{ Illuminate\Support\Facades\URL::route("home") }}">{{ \Illuminate\Support\Facades\URL::route("home") }}</a></p>
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

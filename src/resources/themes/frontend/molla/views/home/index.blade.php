@extends('app', ['title' => 'Home'])
@section('content')
    <main class="main">
        <div class="intro-slider-container">
            <div class="intro-slider owl-carousel owl-theme owl-nav-inside  row cols-1" data-toggle="owl"
                 data-owl-options='{
                        "dots": true,
                        "nav": false,
                        "autoplay": true,
                        "autoplayTimeout": 10000,
                        "animateOut": "fadeOut"
                    }'>
{{--                <div class="intro-slide bg-image intro-1 d-flex align-items-center" style="background-image: url({{ asset('themes/frontend/molla/assets/images/demos/demo-25/slider/slider-1.jpg') }}); background-color: #222;">--}}
                @foreach($slides as $slide)
                    <div class="intro-slide bg-image intro-1 d-flex align-items-center" style="background-image: url({{ Storage::url($slide->image) }}); background-color: #222;">
                        <div class="container">
                            <div class="intro-content position-static p-3 p-lg-0">
                                <h4 class="intro-subtitle font-size-normal letter-spacing-large text-primary text-uppercase font-weight-normal mb-1"><span>{{ $slide->title }}</span></h4>
                                <h2 class="intro-title my-2 font-weight-normal text-uppercase">{{ $slide->content }}</h2>
                                <h2 class="intro-price text-white mb-2"><i>up to <span class="text-primary">60% off</span></i></h2>
                                <a href="#" class="btn font-size-normal letter-spacing-large btn-white text-uppercase mb-2 mt-2">Discover Now</a>
                            </div>
                        </div>
                    </div>
                @endforeach
{{--                <div class="intro-slide bg-image intro-2 d-flex align-items-center" style="background-image: url({{ asset('themes/frontend/molla/assets/images/demos/demo-25/slider/slider-2.jpg') }}); background-color: #222;">--}}
{{--                    <div class="container">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-md-6 offset-md-6">--}}
{{--                                <div class="intro-content position-static p-3 p-lg-0">--}}
{{--                                    <h4 class="intro-subtitle font-size-normal letter-spacing-large text-primary text-uppercase font-weight-normal mb-1"><span>Deal Of The Day</span></h4>--}}
{{--                                    <h2 class="intro-title my-2 mt-0 font-weight-normal text-uppercase mb-0">Discover Our<br>One Kind Jewelery</h2>--}}
{{--                                    <a href="#" class="btn font-size-normal letter-spacing-large btn-white font-weight-normal text-uppercase mb-2 mt-2">Discover Now</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
        <div class="container">
            <div class="banner-group my-md-n5 mt-1">
                <div class="row no-gutters">
                    <div class="col-md-4 col-sm-6 col-12">
                        <div class="banner mb-0">
                            <a href="#">
                                <img src="{{ asset('themes/frontend/molla/assets/images/demos/demo-25/banners/banner-1.jpg') }}" alt="Banner" width="390" height="500" />
                            </a>
                            <div class="banner-content text-center banner-content-center mb-0 my-md-4">
                                <h4 class="banner-subtitle font-size-normal letter-spacing-large text-white text-uppercase font-weight-normal">Clearance</h4>
                                <h3 class="banner-title text-white font-weight-normal text-uppercase my-4 mb-0">Earrings&nbsp;<br>&amp; Rings&nbsp;</h3>
                                <h3 class="banner-price text-white text-uppercase my-4 mt-0">Save 30%</h3>
                                <a href="#" class="btn font-size-normal letter-spacing-large btn-dark text-uppercase mt-0 mt-md-3 font-weight-normal text-uppercase">Shop Clearance</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="banner banner-overlay mb-0 banner-middle bg-image" style="background-image: url({{ asset('themes/frontend/molla/assets/images/demos/demo-25/banners/banner-2.jpg') }})">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12">
                        <div class="banner mb-0" style="background-color: #f9f9f9;">
                            <a href="#">
                                <img src="{{ asset('themes/frontend/molla/assets/images/demos/demo-25/banners/banner-3.jpg')}}" alt="Banner" width="390" height="500" />
                            </a>
                            <div class="banner-content text-center banner-content-center mt-2 mt-md-5">
                                <h3 class="banner-title font-weight-normal text-uppercase mt-1 my-1">Bracelets&nbsp;<br>&amp; Anklets</h3>
                                <a href="#" class="btn font-size-normal letter-spacing-large btn-dark text-uppercase mt-4 font-weight-normal text-uppercase">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="banner banner-overlay mb-0" style="background-image: url({{ asset('themes/frontend/molla/assets/images/demos/demo-25/banners/banner-4.jpg')}}); background-color: #544d4d;min-height: 500px;box-shadow: 0px 5px 15px 0px rgba(0,0,0,.3); background-position:right;">
                            <div class="banner-content text-center banner-content-right px-3 p-lg-0 mt-lg-1">
                                <h4 class="banner-subtitle font-size-normal letter-spacing-large text-white text-uppercase mb-2 font-weight-normal">Exclusive</h4>
                                <h3 class="banner-title text-white text-uppercase my-4 mb-0">Our New Romantic<br>Collection 2019</h3>
                                <p class="banner-txt text-white font-weight-normal my-4 mb-2 mb-md-4 mx-4">Nullam malesuada eratut turpis. Suspendisse urnanibh viverra non, semper suscipit, posuere a pede.</p>
                                <a href="#" class="btn font-size-normal letter-spacing-large btn-primary btn-dark text-uppercase my-2 mb-0">Shop the Collection</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="arrival bg-light-2 pt-5 pt-md-11 pb-1 pb-lg-3 my-2 mt-0">
            <div class="container">
                <div class="heading heading-center mb-5">
                    <h2 class="title text-uppercase mb-4">New Arrivals</h2>
                    <ul class="nav nav-pills justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a href="#arrival-all" class="nav-link font-size-normal letter-spacing-large active" data-toggle="tab" role="tab">All</a>
                        </li>
                        <li class="nav-item">
                            <a href="#arrival-rings" class="nav-link font-size-normal letter-spacing-large" data-toggle="tab" role="tab">Rings</a>
                        </li>
                        <li class="nav-item">
                            <a href="#arrival-necklace" class="nav-link font-size-normal letter-spacing-large" data-toggle="tab" role="tab">Necklace</a>
                        </li>
                        <li class="nav-item">
                            <a href="#arrival-earrings" class="nav-link font-size-normal letter-spacing-large" data-toggle="tab" role="tab">Earrings</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content tab-content-carousel">
                    <div class="tab-pane p-0 fade show active" id="arrival-all" role="tabpanel">
                        <div class="owl-carousel carousel-equal-height owl-simple carousel-with-shadow row cols-lg-4 cols-md-3 cols-2" data-toggle="owl" data-owl-options='{
                                "nav": false,
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items": 2
                                    },
                                    "768": {
                                        "items": 3
                                    },
                                    "992": {
                                        "items": 4
                                    },
                                    "1500": {
                                        "items": 4,
                                        "nav": true
                                    }
                                }
                            }'>
                            <div class="product shadow-none">
                                <figure class="product-media">
                                    <a href="#">
                                        <img src="{{ asset('themes/frontend/molla/assets/images/demos/demo-25/product/product-1.jpg')}}" alt="Product image" width="277" height="377" class="product-image" />
                                        <img src="{{ asset('themes/frontend/molla/assets/images/demos/demo-25/product/product-1-2.jpg')}}" alt="Product image" width="277" height="377" class="product-image-hover" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist"><span>add to wishlist</span></a>
                                    </div>
                                </figure>
                                <div class="product-body text-center bg-light-2">
                                    <h3 class="product-title font-size-normal">Sterling Silver Mixed Metal<br>Cross Over Ring</h3>
                                    <div class="product-price font-size-normal mb-0 text-dark justify-content-center">
                                        <span>$530.00</span>
                                    </div>
                                    <div class="product-footer justify-content-center d-block">
                                        <div class="ratings-container justify-content-center">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 4 Reviews )</span>
                                        </div>
                                        <a href="#" class="btn font-size-normal letter-spacing-large btn-dark">
                                            <i class="icon-cart-plus"></i>
                                            <span>ADD TO CART</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="product shadow-none">
                                <figure class="product-media">
                                    <a href="#">
                                        <img src="{{ asset('themes/frontend/molla/assets/images/demos/demo-25/product/product-2.jpg')}}" alt="Product image" width="277" height="377" class="product-image" />
                                        <img src="{{ asset('themes/frontend/molla/assets/images/demos/demo-25/product/product-2-2.jpg')}}" alt="Product image" width="277" height="377" class="product-image-hover" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist"><span>add to wishlist</span></a>
                                    </div>
                                </figure>
                                <div class="product-body text-center bg-light-2">
                                    <h3 class="product-title font-size-normal">Silver Tone Multi Layer<br>Coin Detail Necklace</h3>
                                    <div class="product-price font-size-normal mb-0 text-dark justify-content-center">
                                        <span>$530.00</span>
                                    </div>
                                    <div class="product-footer justify-content-center d-block">
                                        <div class="ratings-container justify-content-center">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 4 Reviews )</span>
                                        </div>
                                        <a href="#" class="btn font-size-normal letter-spacing-large btn-dark">
                                            <i class="icon-cart-plus"></i>
                                            <span>ADD TO CART</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="product shadow-none">
                                <span class="product-label letter-spacing-large p-2 bg-dark text-white">SALE</span>
                                <figure class="product-media">
                                    <a href="#">
                                        <img src="{{ asset('themes/frontend/molla/assets/images/demos/demo-25/product/product-3.jpg')}}" alt="Product image" width="277" height="377" class="product-image" />
                                        <img src="{{ asset('themes/frontend/molla/assets/images/demos/demo-25/product/product-3-2.jpg')}}" alt="Product image" width="277" height="377" class="product-image-hover" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist"><span>add to wishlist</span></a>
                                    </div>
                                </figure>
                                <div class="product-body text-center bg-light-2">
                                    <h3 class="product-title font-size-normal">Gold/Silver/Rose Gold Tone<br>Heart Pendant Necklace</h3>
                                    <div class="product-price font-size-normal mb-0 text-dark justify-content-center">
                                        <div class="old-price mx-3">$325.00</div>
                                        Now $265.00
                                    </div>
                                    <div class="product-footer justify-content-center d-block">
                                        <div class="ratings-container justify-content-center">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 4 Reviews )</span>
                                        </div>
                                        <a href="#" class="btn font-size-normal letter-spacing-large btn-dark">
                                            <i class="icon-cart-plus"></i>
                                            <span>ADD TO CART</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="product shadow-none">
                                <figure class="product-media">
                                    <a href="#">
                                        <img src="{{ asset('themes/frontend/molla/assets/images/demos/demo-25/product/product-4.jpg')}}" alt="Product image" width="277" height="377" class="product-image" />
                                        <img src="{{ asset('themes/frontend/molla/assets/images/demos/demo-25/product/product-4-2.jpg')}}" alt="Product image" width="277" height="377" class="product-image-hover" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist"><span>add to wishlist</span></a>
                                    </div>
                                </figure>
                                <div class="product-body text-center bg-light-2">
                                    <h3 class="product-title font-size-normal">White Beaded Circle Drop Earrings</h3>
                                    <div class="product-price font-size-normal mb-0 text-dark justify-content-center">
                                        <span>$265.00</span>
                                    </div>
                                    <div class="product-footer justify-content-center d-block">
                                        <div class="ratings-container justify-content-center">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 4 Reviews )</span>
                                        </div>
                                        <a href="#" class="btn font-size-normal letter-spacing-large btn-dark">
                                            <i class="icon-cart-plus"></i>
                                            <span>ADD TO CART</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="product shadow-none">
                                <figure class="product-media">
                                    <a href="#">
                                        <img src="{{ asset('themes/frontend/molla/assets/images/demos/demo-25/product/product-5.jpg')}}" alt="Product image" width="277" height="377" class="product-image" />
                                        <img src="{{ asset('themes/frontend/molla/assets/images/demos/demo-25/product/product-5-2.jpg')}}" alt="Product image" width="277" height="377" class="product-image-hover" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist"><span>add to wishlist</span></a>
                                    </div>
                                </figure>
                                <div class="product-body text-center bg-light-2">
                                    <h3 class="product-title font-size-normal">Silver/Rose Gold Tone<br>Waves Drop Pendant</h3>
                                    <div class="product-price font-size-normal mb-0 text-dark justify-content-center">
                                        <span>$331.00</span>
                                    </div>
                                    <div class="product-footer justify-content-center d-block">
                                        <div class="ratings-container justify-content-center">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 4 Reviews )</span>
                                        </div>
                                        <a href="#" class="btn font-size-normal letter-spacing-large btn-dark">
                                            <i class="icon-cart-plus"></i>
                                            <span>ADD TO CART</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane p-0 fade" id="arrival-rings" role="tabpanel">
                        <div class="owl-carousel carousel-equal-height owl-simple carousel-with-shadow row cols-lg-4 cols-md-3 cols-2" data-toggle="owl" data-owl-options='{
                                "nav": false,
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items": 2
                                    },
                                    "768": {
                                        "items": 3
                                    },
                                    "992": {
                                        "items": 4,
                                        "nav": true
                                    }
                                }
                            }'>
                            <div class="product shadow-none">
                                <figure class="product-media">
                                    <a href="#">
                                        <img src="{{ asset('themes/frontend/molla/assets/images/demos/demo-25/product/product-1.jpg')}}" alt="Product image" width="277" height="377" class="product-image" />
                                        <img src="{{ asset('themes/frontend/molla/assets/images/demos/demo-25/product/product-1-2.jpg')}}" alt="Product image" width="277" height="377" class="product-image-hover" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist"><span>add to wishlist</span></a>
                                    </div>
                                </figure>
                                <div class="product-body text-center bg-light-2">
                                    <h3 class="product-title font-size-normal">Sterling Silver Mixed Metal<br>Cross Over Ring</h3>
                                    <div class="product-price font-size-normal mb-0 text-dark justify-content-center">
                                        <span>$530.00</span>
                                    </div>
                                    <div class="product-footer justify-content-center d-block">
                                        <div class="ratings-container justify-content-center">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 4 Reviews )</span>
                                        </div>
                                        <a href="#" class="btn font-size-normal letter-spacing-large btn-dark">
                                            <i class="icon-cart-plus"></i>
                                            <span>ADD TO CART</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane p-0 fade" id="arrival-necklace" role="tabpanel">
                        <div class="owl-carousel carousel-equal-height owl-simple carousel-with-shadow row cols-lg-4 cols-md-3 cols-2" data-toggle="owl" data-owl-options='{
                                "nav": false,
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items": 2
                                    },
                                    "768": {
                                        "items": 3
                                    },
                                    "992": {
                                        "items": 4,
                                        "nav": true
                                    }
                                }
                            }'>
                            <div class="product shadow-none">
                                <figure class="product-media">
                                    <a href="#">
                                        <img src="{{ asset('themes/frontend/molla/assets/images/demos/demo-25/product/product-2.jpg')}}" alt="Product image" width="277" height="377" class="product-image" />
                                        <img src="{{ asset('themes/frontend/molla/assets/images/demos/demo-25/product/product-2-2.jpg')}}" alt="Product image" width="277" height="377" class="product-image-hover" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist"><span>add to wishlist</span></a>
                                    </div>
                                </figure>
                                <div class="product-body text-center bg-light-2">
                                    <h3 class="product-title font-size-normal">Silver Tone Multi Layer<br>Coin Detail Necklace</h3>
                                    <div class="product-price font-size-normal mb-0 text-dark justify-content-center">
                                        <span>$530.00</span>
                                    </div>
                                    <div class="product-footer justify-content-center d-block">
                                        <div class="ratings-container justify-content-center">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 4 Reviews )</span>
                                        </div>
                                        <a href="#" class="btn font-size-normal letter-spacing-large btn-dark">
                                            <i class="icon-cart-plus"></i>
                                            <span>ADD TO CART</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="product shadow-none">
                                <span class="product-label letter-spacing-large p-2 bg-dark text-white">SALE</span>
                                <figure class="product-media">
                                    <a href="#">
                                        <img src="{{ asset('themes/frontend/molla/assets/images/demos/demo-25/product/product-3.jpg')}}" alt="Product image" width="277" height="377" class="product-image" />
                                        <img src="{{ asset('themes/frontend/molla/assets/images/demos/demo-25/product/product-3-2.jpg')}}" alt="Product image" width="277" height="377" class="product-image-hover" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist"><span>add to wishlist</span></a>
                                    </div>
                                </figure>
                                <div class="product-body text-center bg-light-2">
                                    <h3 class="product-title font-size-normal">Gold/Silver/Rose Gold Tone<br>Heart Pendant Necklace</h3>
                                    <div class="product-price font-size-normal mb-0 text-dark justify-content-center">
                                        <div class="old-price mx-3">$325.00</div>
                                        Now $265.00
                                    </div>
                                    <div class="product-footer justify-content-center d-block">
                                        <div class="ratings-container justify-content-center">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 4 Reviews )</span>
                                        </div>
                                        <a href="#" class="btn font-size-normal letter-spacing-large btn-dark">
                                            <i class="icon-cart-plus"></i>
                                            <span>ADD TO CART</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="product shadow-none">
                                <figure class="product-media">
                                    <a href="#">
                                        <img src="{{ asset('themes/frontend/molla/assets/images/demos/demo-25/product/product-5.jpg')}}" alt="Product image" width="277" height="377" class="product-image" />
                                        <img src="{{ asset('themes/frontend/molla/assets/images/demos/demo-25/product/product-5-2.jpg')}}" alt="Product image" width="277" height="377" class="product-image-hover" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist"><span>add to wishlist</span></a>
                                    </div>
                                </figure>
                                <div class="product-body text-center bg-light-2">
                                    <h3 class="product-title font-size-normal">Silver/Rose Gold Tone<br>Waves Drop Pendant</h3>
                                    <div class="product-price font-size-normal mb-0 text-dark justify-content-center">
                                        <span>$331.00</span>
                                    </div>
                                    <div class="product-footer justify-content-center d-block">
                                        <div class="ratings-container justify-content-center">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 4 Reviews )</span>
                                        </div>
                                        <a href="#" class="btn font-size-normal letter-spacing-large btn-dark">
                                            <i class="icon-cart-plus"></i>
                                            <span>ADD TO CART</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane p-0 fade" id="arrival-earrings" role="tabpanel">
                        <div class="owl-carousel carousel-equal-height owl-simple carousel-with-shadow row cols-lg-4 cols-md-3 cols-2" data-toggle="owl" data-owl-options='{
                                "nav": false,
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items": 2
                                    },
                                    "768": {
                                        "items": 3
                                    },
                                    "992": {
                                        "items": 4,
                                        "nav": true
                                    }
                                }
                            }'>
                            <div class="product shadow-none">
                                <figure class="product-media">
                                    <a href="#">
                                        <img src="{{ asset('themes/frontend/molla/assets/images/demos/demo-25/product/product-4.jpg')}}" alt="Product image" width="277" height="377" class="product-image" />
                                        <img src="{{ asset('themes/frontend/molla/assets/images/demos/demo-25/product/product-4-2.jpg')}}" alt="Product image" width="277" height="377" class="product-image-hover" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist"><span>add to wishlist</span></a>
                                    </div>
                                </figure>
                                <div class="product-body text-center bg-light-2">
                                    <h3 class="product-title font-size-normal">White Beaded Circle Drop Earrings</h3>
                                    <div class="product-price font-size-normal mb-0 text-dark justify-content-center">
                                        <span>$265.00</span>
                                    </div>
                                    <div class="product-footer justify-content-center d-block">
                                        <div class="ratings-container justify-content-center">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 4 Reviews )</span>
                                        </div>
                                        <a href="#" class="btn font-size-normal letter-spacing-large btn-dark">
                                            <i class="icon-cart-plus"></i>
                                            <span>ADD TO CART</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="page-content pt-5">
            <div class="container">
                <div class="products">
                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                <div class="product">
                                    <figure class="product-media">
                                        <span class="product-label label-new">New</span>
                                        <a href="{{ route('product.show', ['slug' => $product->slug]) }}">
                                            <img src="{{ asset(Storage::url($product->images[0]->image_url)) }}" alt="Product image" class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                        </div><!-- End .product-action -->

                                        <div class="product-action action-icon-top">
                                            <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                            <a href="#" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                                            <a href="#" class="btn-product btn-compare" title="Compare"><span>compare</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">{{ $product->categories[0]->name }}</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title">
                                            <a href="{{ route('product.show', ['slug' => $product->slug]) }}">{{ $product->name }}</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            $50.00
                                        </div><!-- End .product-price -->
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 0%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 0 Reviews )</span>
                                        </div><!-- End .rating-container -->

                                        <div class="product-nav product-nav-dots">
                                            <a href="#" style="background: #cc9966;"><span class="sr-only">Color name</span></a>
                                            <a href="#" class="active" style="background: #ebebeb;"><span class="sr-only">Color name</span></a>
                                        </div><!-- End .product-nav -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->
                        @endforeach
                    </div><!-- End .row -->

                    <div class="load-more-container text-center">
                        <a href="#" class="btn btn-outline-darker btn-load-more">More Products <i class="icon-refresh"></i></a>
                    </div><!-- End .load-more-container -->
                </div><!-- End .products -->
            </div>
        </div> --}}
        <div class="seller pt-5 pt-md-6 pb-1 pb-lg-3 my-2 mt-0">
            <div class="container">
                <div class="heading heading-center mb-5">
                    <h2 class="title text-uppercase mb-3">Best Sellers</h2>
                    <ul class="nav nav-pills justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a href="#seller-all" class="nav-link font-size-normal letter-spacing-large active" data-toggle="tab" role="tab">All</a>
                        </li>
                        <li class="nav-item">
                            <a href="#seller-rings" class="nav-link font-size-normal letter-spacing-large" data-toggle="tab" role="tab">Rings</a>
                        </li>
                        <li class="nav-item">
                            <a href="#seller-necklace" class="nav-link font-size-normal letter-spacing-large" data-toggle="tab" role="tab">Necklace</a>
                        </li>
                        <li class="nav-item">
                            <a href="#seller-earrings" class="nav-link font-size-normal letter-spacing-large" data-toggle="tab" role="tab">Earrings</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content tab-content-carousel">
                    <div class="tab-pane p-0 fade show active" id="seller-all" role="tabpanel">
                        <div class="owl-carousel  carousel-equal-height owl-simple carousel-with-shadow row cols-lg-4 cols-md-3 cols-2" data-toggle="owl" data-owl-options='{
                                "nav": false,
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items": 2
                                    },
                                    "768": {
                                        "items": 3
                                    },
                                    "992": {
                                        "items": 4,
                                        "nav": true
                                    }
                                }
                            }'>
                            <div class="product bg-white shadow-none">
                                <span class="product-label letter-spacing-large p-2 bg-dark text-white">SALE</span>
                                <figure class="product-media">
                                    <a href="#">
                                        <img src="{{ asset('themes/frontend/molla/assets/images/demos/demo-25/product/product-6.jpg')}}" alt="Product image" width="277" height="377" class="product-image" />
                                        <img src="{{ asset('themes/frontend/molla/assets/images/demos/demo-25/product/product-6-2.jpg')}}" alt="Product image" width="277" height="377" class="product-image-hover" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist"><span>add to wishlist</span></a>
                                    </div>
                                </figure>
                                <div class="product-body text-center">
                                    <h3 class="product-title font-size-normal">Sterling Silver Tassel Drop Earrings</h3>
                                    <div class="product-price font-size-normal mb-0 text-dark justify-content-center">
                                        <div class="old-price mx-3">$424.00</div>
                                        <span>Now $355.00</span>
                                    </div>
                                    <div class="product-footer justify-content-center d-block">
                                        <div class="ratings-container justify-content-center">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 4 Reviews )</span>
                                        </div>
                                        <a href="#" class="btn font-size-normal letter-spacing-large btn-dark">
                                            <i class="icon-cart-plus"></i>
                                            <span>ADD TO CART</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="product bg-white shadow-none">
                                <figure class="product-media">
                                    <a href="#">
                                        <img src="{{ asset('themes/frontend/molla/assets/images/demos/demo-25/product/product-7.jpg')}}" alt="Product image" width="277" height="377" class="product-image" />
                                        <img src="{{ asset('themes/frontend/molla/assets/images/demos/demo-25/product/product-7-2.jpg')}}" alt="Product image" width="277" height="377" class="product-image-hover" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist"><span>add to wishlist</span></a>
                                    </div>
                                </figure>
                                <div class="product-body text-center">
                                    <h3 class="product-title font-size-normal">Silver/Rose Gold Tone<br>Waves Drop Pendant</h3>
                                    <div class="product-price font-size-normal mb-0 text-dark justify-content-center">
                                        <span>$331.00</span>
                                    </div>
                                    <div class="product-footer justify-content-center d-block">
                                        <div class="ratings-container justify-content-center">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 4 Reviews )</span>
                                        </div>
                                        <a href="#" class="btn font-size-normal letter-spacing-large btn-dark">
                                            <i class="icon-cart-plus"></i>
                                            <span>ADD TO CART</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="product bg-white shadow-none">
                                <figure class="product-media">
                                    <a href="#">
                                        <img src="{{ asset('themes/frontend/molla/assets/images/demos/demo-25/product/product-8.jpg')}}" alt="Product image" width="277" height="377" class="product-image" />
                                        <img src="{{ asset('themes/frontend/molla/assets/images/demos/demo-25/product/product-8-2.jpg')}}" alt="Product image" width="277" height="377" class="product-image-hover" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist"><span>add to wishlist</span></a>
                                    </div>
                                </figure>
                                <div class="product-body text-center">
                                    <h3 class="product-title font-size-normal">Nude Statement Tassel Drop Earrings</h3>
                                    <div class="product-price font-size-normal mb-0 text-dark justify-content-center">
                                        <span>$265.00</span>
                                    </div>
                                    <div class="product-footer justify-content-center d-block">
                                        <div class="ratings-container justify-content-center">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 4 Reviews )</span>
                                        </div>
                                        <a href="#" class="btn font-size-normal letter-spacing-large btn-dark">
                                            <i class="icon-cart-plus"></i>
                                            <span>ADD TO CART</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="product bg-white shadow-none">
                                <figure class="product-media">
                                    <a href="#">
                                        <img src="{{ asset('themes/frontend/molla/assets/images/demos/demo-25/product/product-9.jpg')}}" alt="Product image" width="277" height="377" class="product-image" />
                                        <img src="{{ asset('themes/frontend/molla/assets/images/demos/demo-25/product/product-9-2.jpg')}}" alt="Product image" width="277" height="377" class="product-image-hover" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist"><span>add to wishlist</span></a>
                                    </div>
                                </figure>
                                <div class="product-body text-center">
                                    <h3 class="product-title font-size-normal">Sterling Silver Star Ring</h3>
                                    <div class="product-price font-size-normal mb-0 text-dark justify-content-center">
                                        <span>$370.00</span>
                                    </div>
                                    <div class="product-footer justify-content-center d-block">
                                        <div class="ratings-container justify-content-center">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 4 Reviews )</span>
                                        </div>
                                        <a href="#" class="btn font-size-normal letter-spacing-large btn-dark">
                                            <i class="icon-cart-plus"></i>
                                            <span>ADD TO CART</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="product bg-white shadow-none">
                                <figure class="product-media">
                                    <a href="#">
                                        <img src="{{ asset('themes/frontend/molla/assets/images/demos/demo-25/product/product-9.jpg')}}" alt="Product image" width="277" height="377" class="product-image" />
                                        <img src="{{ asset('themes/frontend/molla/assets/images/demos/demo-25/product/product-9-2.jpg')}}" alt="Product image" width="277" height="377" class="product-image-hover" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist"><span>add to wishlist</span></a>
                                    </div>
                                </figure>
                                <div class="product-body text-center">
                                    <h3 class="product-title font-size-normal">Sterling Silver Star Ring</h3>
                                    <div class="product-price font-size-normal mb-0 text-dark justify-content-center">
                                        <span>$370.00</span>
                                    </div>
                                    <div class="product-footer justify-content-center d-block">
                                        <div class="ratings-container justify-content-center">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 4 Reviews )</span>
                                        </div>
                                        <a href="#" class="btn font-size-normal letter-spacing-large btn-dark">
                                            <i class="icon-cart-plus"></i>
                                            <span>ADD TO CART</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane p-0 fade" id="seller-rings" role="tabpanel">
                        <div class="owl-carousel carousel-equal-height owl-simple carousel-with-shadow row cols-lg-4 cols-md-3 cols-2" data-toggle="owl" data-owl-options='{
                                "nav": false,
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items": 2
                                    },
                                    "768": {
                                        "items": 3
                                    },
                                    "992": {
                                        "items": 4,
                                        "nav": true
                                    }
                                }
                            }'>
                            <div class="product bg-white shadow-none">
                                <figure class="product-media">
                                    <a href="#">
                                        <img src="{{ asset('themes/frontend/molla/assets/images/demos/demo-25/product/product-9.jpg')}}" alt="Product image" width="277" height="377" class="product-image" />
                                        <img src="{{ asset('themes/frontend/molla/assets/images/demos/demo-25/product/product-9-2.jpg')}}" alt="Product image" width="277" height="377" class="product-image-hover" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist"><span>add to wishlist</span></a>
                                    </div>
                                </figure>
                                <div class="product-body text-center">
                                    <h3 class="product-title font-size-normal">Sterling Silver Star Ring</h3>
                                    <div class="product-price font-size-normal mb-0 text-dark justify-content-center">
                                        <span>$370.00</span>
                                    </div>
                                    <div class="product-footer justify-content-center d-block">
                                        <div class="ratings-container justify-content-center">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 4 Reviews )</span>
                                        </div>
                                        <a href="#" class="btn font-size-normal letter-spacing-large btn-dark">
                                            <i class="icon-cart-plus"></i>
                                            <span>ADD TO CART</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="product bg-white shadow-none">
                                <figure class="product-media">
                                    <a href="#">
                                        <img src="{{ asset('themes/frontend/molla/assets/images/demos/demo-25/product/product-9.jpg')}}" alt="Product image" width="277" height="377" class="product-image" />
                                        <img src="{{ asset('themes/frontend/molla/assets/images/demos/demo-25/product/product-9-2.jpg')}}" alt="Product image" width="277" height="377" class="product-image-hover" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist"><span>add to wishlist</span></a>
                                    </div>
                                </figure>
                                <div class="product-body text-center">
                                    <h3 class="product-title font-size-normal">Sterling Silver Star Ring</h3>
                                    <div class="product-price font-size-normal mb-0 text-dark justify-content-center">
                                        <span>$370.00</span>
                                    </div>
                                    <div class="product-footer justify-content-center d-block">
                                        <div class="ratings-container justify-content-center">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 4 Reviews )</span>
                                        </div>
                                        <a href="#" class="btn font-size-normal letter-spacing-large btn-dark">
                                            <i class="icon-cart-plus"></i>
                                            <span>ADD TO CART</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane p-0 fade" id="seller-necklace" role="tabpanel">
                        <div class="owl-carousel carousel-equal-height owl-simple carousel-with-shadow row cols-lg-4 cols-md-3 cols-2" data-toggle="owl" data-owl-options='{
                                "nav": false,
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items": 2
                                    },
                                    "768": {
                                        "items": 3
                                    },
                                    "992": {
                                        "items": 4,
                                        "nav": true
                                    }
                                }
                            }'>
                            <div class="product bg-white shadow-none">
                                <figure class="product-media">
                                    <a href="#">
                                        <img src="{{ asset('themes/frontend/molla/assets/images/demos/demo-25/product/product-7.jpg')}}" alt="Product image" width="277" height="377" class="product-image" />
                                        <img src="{{ asset('themes/frontend/molla/assets/images/demos/demo-25/product/product-7-2.jpg')}}" alt="Product image" width="277" height="377" class="product-image-hover" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist"><span>add to wishlist</span></a>
                                    </div>
                                </figure>
                                <div class="product-body text-center">
                                    <h3 class="product-title font-size-normal">Silver/Rose Gold Tone<br>Waves Drop Pendant</h3>
                                    <div class="product-price font-size-normal mb-0 text-dark justify-content-center">
                                        <span>$331.00</span>
                                    </div>
                                    <div class="product-footer justify-content-center d-block">
                                        <div class="ratings-container justify-content-center">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 4 Reviews )</span>
                                        </div>
                                        <a href="#" class="btn font-size-normal letter-spacing-large btn-dark">
                                            <i class="icon-cart-plus"></i>
                                            <span>ADD TO CART</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane p-0 fade" id="seller-earrings" role="tabpanel">
                        <div class="owl-carousel carousel-equal-height owl-simple carousel-with-shadow row cols-lg-4 cols-md-3 cols-2" data-toggle="owl" data-owl-options='{
                                "nav": false,
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items": 2
                                    },
                                    "768": {
                                        "items": 3
                                    },
                                    "992": {
                                        "items": 4,
                                        "nav": true
                                    }
                                }
                            }'>
                            <div class="product bg-white shadow-none">
                                <span class="product-label letter-spacing-large p-2 bg-dark text-white">SALE</span>
                                <figure class="product-media">
                                    <a href="#">
                                        <img src="{{ asset('themes/frontend/molla/assets/images/demos/demo-25/product/product-6.jpg')}}" alt="Product image" width="277" height="377" class="product-image" />
                                        <img src="{{ asset('themes/frontend/molla/assets/images/demos/demo-25/product/product-6-2.jpg')}}" alt="Product image" width="277" height="377" class="product-image-hover" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist"><span>add to wishlist</span></a>
                                    </div>
                                </figure>
                                <div class="product-body text-center">
                                    <h3 class="product-title font-size-normal">Sterling Silver Tassel Drop Earrings</h3>
                                    <div class="product-price font-size-normal mb-0 text-dark justify-content-center">
                                        <div class="old-price mx-3">$424.00</div>
                                        <span>Now $355.00</span>
                                    </div>
                                    <div class="product-footer justify-content-center d-block">
                                        <div class="ratings-container justify-content-center">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 4 Reviews )</span>
                                        </div>
                                        <a href="#" class="btn font-size-normal letter-spacing-large btn-dark">
                                            <i class="icon-cart-plus"></i>
                                            <span>ADD TO CART</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="product bg-white shadow-none">
                                <figure class="product-media">
                                    <a href="#">
                                        <img src="{{ asset('themes/frontend/molla/assets/images/demos/demo-25/product/product-8.jpg')}}" alt="Product image" width="277" height="377" class="product-image" />
                                        <img src="{{ asset('themes/frontend/molla/assets/images/demos/demo-25/product/product-8-2.jpg')}}" alt="Product image" width="277" height="377" class="product-image-hover" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist"><span>add to wishlist</span></a>
                                    </div>
                                </figure>
                                <div class="product-body text-center">
                                    <h3 class="product-title font-size-normal">Nude Statement Tassel Drop Earrings</h3>
                                    <div class="product-price font-size-normal mb-0 text-dark justify-content-center">
                                        <span>$265.00</span>
                                    </div>
                                    <div class="product-footer justify-content-center d-block">
                                        <div class="ratings-container justify-content-center">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 4 Reviews )</span>
                                        </div>
                                        <a href="#" class="btn font-size-normal letter-spacing-large btn-dark">
                                            <i class="icon-cart-plus"></i>
                                            <span>ADD TO CART</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="banner bg-image shadow-none" style="background-image: url({{ asset('themes/frontend/molla/assets/images/demos/demo-25/banners/banner-5.jpg')}}); background-color: #edeef3;">
            <div class="banner-content text-center banner-content-center px-3 p-lg-0">
                <img src="{{ asset('themes/frontend/molla/assets/images/demos/demo-25/diamond-ring.png')}}" class="mb-2 mt-2 mx-auto w-auto" alt="" width="28" height="32" />
                <h3 class="banner-title my-4">HIGH QUALITY SINCE 2001</h3>
                <h6 class="font-weight-normal">Everything you need to complete the perfect collection</h6>
                <p class="banner-txt mb-2 mb-lg-3">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam<br>malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis<br>facilisis fermentum. Aliquam porttitor mauris sit amet orci.</p>
                <a href="#" class="btn font-size-normal letter-spacing-large btn-dark btn-primary my-4">SEE WHAT'S NEW</a>
            </div>
        </div>

        <div class="container pt-3 pt-md-7 small-group">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 col-sm-9 col-12 popular mb-3 mb-lg-0">
                    <div class="heading heading-center">
                        <h2 class="title text-uppercase mb-3">Popular Products</h2>
                        <span class="cross-txt position-relative py-2 pb-0">
                                <i class="la la-diamond h5 mb-0"></i>
                            </span>
                    </div>
                    <div>
                        <div class="product product-sm bg-white shadow-none">
                            <figure class="product-media">
                                <a href="#">
                                    <img src="{{ asset('themes/frontend/molla/assets/images/demos/demo-25/product/product-small-1.jpg')}}" alt="Product image" width="120" height="150" />
                                </a>
                            </figure>
                            <div class="product-body pt-1">
                                <h3 class="product-title font-size-normal mb-1">Grey/Silver Tone Wrap Bracelet</h3>
                                <div class="ratings-container justify-content-start">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( 4 Reviews )</span>
                                </div>
                                <div class="product-price font-size-normal text-dark justify-content-start">
                                    <span>$278.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="product product-sm bg-white shadow-none">
                            <figure class="product-media">
                                <a href="#">
                                    <img src="{{ asset('themes/frontend/molla/assets/images/demos/demo-25/product/product-small-2.jpg')}}" alt="Product image" width="120" height="150" />
                                </a>
                            </figure>
                            <div class="product-body">
                                <h3 class="product-title font-size-normal mb-1">Gold Tone Chain Flex Bangle</h3>
                                <div class="ratings-container justify-content-start">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( 4 Reviews )</span>
                                </div>
                                <div class="product-price font-size-normal text-dark justify-content-start">
                                    <span>$371.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="product product-sm bg-white shadow-none">
                            <figure class="product-media">
                                <a href="#">
                                    <img src="{{ asset('themes/frontend/molla/assets/images/demos/demo-25/product/product-small-3.jpg')}}" alt="Product image" width="120" height="150" />
                                </a>
                            </figure>
                            <div class="product-body">
                                <h3 class="product-title font-size-normal mb-1">Gold Tone Coral Tassel Earrings</h3>
                                <div class="ratings-container justify-content-start">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( 4 Reviews )</span>
                                </div>
                                <div class="product-price font-size-normal text-dark justify-content-start">
                                    <span>$225.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-10 col-12 lookbook order-lg-0 order-md-last mb-3 mb-lg-0">
                    <div class="heading heading-center">
                        <h2 class="title text-uppercase mb-3">Lookbook</h2>
                        <span class="cross-txt position-relative py-2 pb-0">
                                <i class="la la-diamond h5 mb-0"></i>
                            </span>
                    </div>
                    <div class="owl-carousel owl-simple owl-nav-inside row cols-1 cols-sm-2 cols-lg-1" data-toggle="owl" data-owl-options='{
                            "nav": false,
                            "dots": true,
                            "responsive": {
                                "0": {
                                    "items": 1
                                },
                                "576": {
                                    "items": 2,
                                    "margin": 20
                                },
                                "992": {
                                    "items": 1
                                }
                            }
                        }'>
                        <div class="banner banner-overlay bg-image" style="background-image: url({{ asset('themes/frontend/molla/assets/images/demos/demo-25/banners/banner-6.jpg') }});">
                            <div class="banner-content text-center banner-content-center pb-0 pb-lg-1">
                                <div class="my-3">
                                    <span class="banner-dot position-relative d-inline-block"></span>
                                    <span class="banner-dot position-relative d-inline-block"></span>
                                    <span class="banner-dot position-relative d-inline-block"></span>
                                </div>
                                <h4 class="banner-subtitle font-size-normal letter-spacing-large text-white text-uppercase">Engagement &amp; Fashion<br>Jewelry</h4>
                            </div>
                        </div>
                        <div class="banner banner-overlay bg-image" style="background-image: url({{ asset('themes/frontend/molla/assets/images/demos/demo-25/banners/banner-7.jpg') }});">
                            <div class="banner-content text-center banner-content-center pb-0 pb-lg-1">
                                <div class="my-3">
                                    <span class="banner-dot position-relative d-inline-block"></span>
                                    <span class="banner-dot position-relative d-inline-block"></span>
                                    <span class="banner-dot position-relative d-inline-block"></span>
                                </div>
                                <h4 class="banner-subtitle font-size-normal letter-spacing-large text-white text-uppercase">We Crate Custom<br>Designs</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-9 col-12 service mb-3 mb-lg-0">
                    <div class="heading heading-center">
                        <h2 class="title text-uppercase mb-3">Our Services</h2>
                        <span class="cross-txt position-relative py-2 pb-0">
                                <i class="la la-diamond h5 mb-0"></i>
                            </span>
                    </div>
                    <div class="owl-carousel owl-simple owl-nav-inside row cols-1" data-toggle="owl" data-owl-options='{
                            "nav": false,
                            "dots": false,
                            "loop": false,
                            "items": 1
                        }'>
                        <div class="icon-boxes text-center">
                            <div class="icon-box justify-content-center d-flex flex-column mb-0 pt-4">
                                <span class="icon-box-icon mb-1 text-dark"><i class="icon-truck"></i></span>
                                <div class="icon-box-content">
                                    <h3 class="icon-box-title font-size-normal letter-spacing-large text-uppercase">Payment &amp; Delivery</h3>
                                    <p class="font-weight-normal font-size-normal">Free shipping for orders over $50</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="owl-carousel owl-simple owl-nav-inside row cols-1" data-toggle="owl" data-owl-options='{
                            "nav": false,
                            "dots": false,
                            "loop": false,
                            "items": 1
                        }'>
                        <div class="icon-boxes text-center">
                            <div class="icon-box justify-content-center d-flex flex-column mb-0 pt-4">
                                <span class="icon-box-icon mb-1 text-dark"><i class="icon-rotate-left"></i></span>
                                <div class="icon-box-content">
                                    <h3 class="icon-box-title font-size-normal letter-spacing-large text-uppercase">Return & Refund</h3>
                                    <p class="font-weight-normal font-size-normal">Free 100% money back guarantee</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="owl-carousel owl-simple owl-nav-inside row cols-1" data-toggle="owl" data-owl-options='{
                            "nav": false,
                            "dots": false,
                            "loop": false,
                            "items": 1
                        }'>
                        <div class="icon-boxes text-center">
                            <div class="icon-box justify-content-center d-flex flex-column mb-0 pt-4">
                                <span class="icon-box-icon mb-1 text-dark"><i class="la la-unlock"></i></span>
                                <div class="icon-box-content">
                                    <h3 class="icon-box-title font-size-normal letter-spacing-large text-uppercase">Secure Payment</h3>
                                    <p class="font-weight-normal font-size-normal">10% secure payment</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container instagram-container mt-4 mt-md-8">
            <hr class="mt-0 pb-6 mb-0">
            <div class="heading heading-center">
                <h2 class="title my-2 text-uppercase">Shop by Instagram</h2>
                <p class="font-weight-normal text-secondary">Shop Your New Look</p>
            </div>
            <div class="owl-carousel owl-simple mb-4 mt-5 row cols-2 cols-xl-5 cols-lg-4 cols-sm-3" data-toggle="owl" data-owl-options= '{
                    "nav": false,
                    "dots": false,
                    "loop": false,
                    "margin": 20,
                    "responsive": {
                        "0": {
                            "items": 2
                        },
                        "576": {
                            "items": 3
                        },
                        "992": {
                            "items": 4
                        },
                        "1200": {
                            "items": 5
                        }
                    }
                }'>
                <div class="instagram-feed">
                    <img src="{{ asset('themes/frontend/molla/assets/images/demos/demo-25/instagram/instagram-1.jpg')}}" alt="img" width="218" height="218" />
                    <div class="instagram-feed-content">
                        <a href="#"><i class="icon-heart-o"></i>466</a>
                        <a href="#"><i class="icon-comments"></i>65</a>
                    </div><!-- End .instagram-feed-content -->
                </div>
                <div class="instagram-feed">
                    <img src="{{ asset('themes/frontend/molla/assets/images/demos/demo-25/instagram/instagram-2.jpg')}}" alt="img" width="218" height="218" />
                    <div class="instagram-feed-content">
                        <a href="#"><i class="icon-heart-o"></i>466</a>
                        <a href="#"><i class="icon-comments"></i>65</a>
                    </div><!-- End .instagram-feed-content -->
                </div>
                <div class="instagram-feed">
                    <img src="{{ asset('themes/frontend/molla/assets/images/demos/demo-25/instagram/instagram-3.jpg')}}" alt="img" width="218" height="218" />
                    <div class="instagram-feed-content">
                        <a href="#"><i class="icon-heart-o"></i>466</a>
                        <a href="#"><i class="icon-comments"></i>65</a>
                    </div><!-- End .instagram-feed-content -->
                </div>
                <div class="instagram-feed">
                    <img src="{{ asset('themes/frontend/molla/assets/images/demos/demo-25/instagram/instagram-4.jpg')}}" alt="img" width="218" height="218" />
                    <div class="instagram-feed-content">
                        <a href="#"><i class="icon-heart-o"></i>466</a>
                        <a href="#"><i class="icon-comments"></i>65</a>
                    </div><!-- End .instagram-feed-content -->
                </div>
                <div class="instagram-feed">
                    <img src="{{ asset('themes/frontend/molla/assets/images/demos/demo-25/instagram/instagram-5.jpg')}}" alt="img" width="218" height="218" />
                    <div class="instagram-feed-content">
                        <a href="#"><i class="icon-heart-o"></i>466</a>
                        <a href="#"><i class="icon-comments"></i>65</a>
                    </div><!-- End .instagram-feed-content -->
                </div>
            </div>
            <div class="text-center mb-5">
                <a class="btn" href="#">@MOLLA INSTAGRAM</a>
            </div>
        </div>
    </main>
@endsection

<header class="header header-25">
    <div class="header-top">
        <div class="container">
            <div class="header-left">
                <div class="d-flex align-items-center d-md-block text-secondary font-weight-light">
                    <a href="tel:#"><i class="icon-phone h6 text-secondary" style="margin-right: 8px;"></i>Call: +0123 456 789</a>
                </div><!-- End .top-menu -->
            </div><!-- End .header-left -->

            <div class="header-right">
                <div class="social-icons social-icons-color d-sm-flex d-none">
                    <a href="#" class="social-icon social-facebook" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                    <a href="#" class="social-icon social-twitter" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                    <a href="#" class="social-icon social-pinterest" title="Instagram" target="_blank"><i class="icon-pinterest-p"></i></a>
                    <a href="#" class="social-icon social-instagram" title="Pinterest" target="_blank"><i class="icon-instagram"></i></a>
                </div><!-- End .soial-icons -->
                <ul class="top-menu text-secondary">
                    <li>
                        <a href="#">Links</a>
                        <ul>
                            <li class="account-links font-weight-normal">
                                @if(Auth::user())
                                    <a href="{{ route('account.index' )}}"><i class="icon-user d-none d-lg-block"></i>{{Auth::user()->name}}</a>
                                @else
                                    <a href="{{ route('login') }}"><i class="icon-user d-none d-lg-block"></i> Login</a>
                                @endif
                            </li>
                            <li>
                                <div class="header-dropdown">
                                    <a href="#">{{ session()->get('currency')->name }}</a>
                                    <div class="header-menu">
                                        <ul class="d-block">
                                            @foreach($currencies as $currency)
                                                <li class="@if(!$loop->first) m-0 @endif">
                                                    <a href="#">{{ $currency->name }}</a>
                                                </li>
                                            @endforeach
{{--                                            <li><a href="#">Eur</a></li>--}}
{{--                                            <li class="m-0"><a href="#">Usd</a></li>--}}
                                        </ul>
                                    </div><!-- End .header-menu -->
                                </div><!-- End .header-dropdown -->
                            </li>
                            <li>
                                <div class="header-dropdown">
                                    <a href="#">Türkçe</a>
                                    <div class="header-menu">
                                        <ul class="d-block">
                                            @foreach($languages as $language)
                                                <li class="@if(!$loop->first) m-0 @endif">
                                                    <a href="#">{{ $language->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div><!-- End .header-menu -->
                                </div><!-- End .header-dropdown -->
                            </li>
                        </ul>
                    </li>
                </ul><!-- End .top-menu -->
            </div><!-- End .header-right -->
        </div>
    </div>
    <div class="header-middle">
        <div class="container">
            <div class="header-left d-lg-block d-none">
                <div class="header-search header-search-extended header-search-visible d-none d-lg-block">
                    <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                    <form action="#" method="get">
                        <div class="header-search-wrapper search-wrapper-wide">
                            <label for="q" class="sr-only">Search</label>
                            <button class="btn font-size-normal letter-spacing-large btn-primary" type="submit"><i class="icon-search"></i></button>
                            <input type="search" class="form-control" name="q" id="q" placeholder="Search product ..." required>
                        </div><!-- End .header-search-wrapper -->
                    </form>
                </div><!-- End .header-search -->
            </div>
            <div class="header-center d-block">
                <a href="{{ route('home.index') }}" class="logo align-items-center d-flex flex-column bg-white">
                    <img src="{{ Theme::publicPath('logo.png') }}" alt="Molla Logo" width="200" height="20">
{{--                    <img src="{{ asset('themes/frontend/molla/assets/images/demos/demo-25/logo.png') }}" alt="Molla Logo" width="200" height="20">--}}
                </a>
            </div><!-- End .header-left -->

            <div class="header-right">
                <a href="wishlist.html" class="wishlist-link d-flex">
                    <i class="icon-heart-o"></i>
                    <span class="wishlist-count">3</span>
                    <span class="wishlist-txt">My Wishlist</span>
                </a>
                @livewire('cart.header-dropdown-cart-component')

            </div>
        </div><!-- End .container -->
    </div><!-- End .header-middle -->

    <div class="header-bottom sticky-header">
        <div class="container">
            <div class="header-left">
                <nav class="main-nav">
                    <ul class="menu sf-arrows">
                        <li>
                            <a href="{{ route('home.index') }}">@lang('Home')</a>
                        </li>
                         @foreach($categories as $category)
                            <li class="megamenu-container">
                                <a href="{{ route('category.show', ['slug' => $category->slug]) }}" class="{{ $category->children_count ? 'sf-with-ul' : '' }}">{{ $category->name }}</a>
                                @if($category->children_count)
                                    <ul>
                                        @foreach($category->children as $children)
                                            <li><a href="{{ route('category.show', ['slug' => $children->slug]) }}">{{ $children->name }}</a></li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                        <li>
                            <a href="{{ route('about-us.index') }}">@lang('About Us')</a>
                        </li>
                        <li>
                            <a href="{{ route('contact.index') }}">@lang('Contact')</a>
                        </li>
                    </ul><!-- End .menu -->
                </nav><!-- End .main-nav -->

                <button class="mobile-menu-toggler">
                    <span class="sr-only">Toggle mobile menu</span>
                    <i class="icon-bars"></i>
                </button>
            </div><!-- End .header-left -->

            <div class="header-right">
                <i class="la la-lightbulb-o"></i><p class="text-white text-uppercase">Clearance Up to 30% Off</p>
            </div>
        </div><!-- End .container -->
    </div><!-- End .header-bottom -->
</header>

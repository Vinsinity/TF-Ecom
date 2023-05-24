<div>
    <div class="dropdown cart-dropdown">
        <a class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
            <i class="icon-shopping-cart"></i>
{{--            @dd(ShoppingCart::count())--}}
            <span class="cart-count">{{ ShoppingCart::count() }}</span>
            <span class="cart-txt">{{ session()->get('currency')->symbol }}{{ App\Helpers\Helper::calculatePrice(ShoppingCart::total()) }}</span>
        </a>

        <div class="dropdown-menu dropdown-menu-right">
            <div class="dropdown-cart-products">
                @if(ShoppingCart::count())
{{--                    @dd(ShoppingCart::content())--}}
                    @foreach(ShoppingCart::content()->get('items') as $cart)
                        {{--                    @dd($cart)--}}
                        <div class="product shadow-none">
                            <div class="product-cart-details">
                                <h4 class="product-title font-size-normal">
                                    <a href="product.html">{{ $cart->name }}</a>
                                </h4>

                                <span class="cart-product-info">
                                <span class="cart-product-qty">{{ $cart->qty }}</span>
                                x ₺{{ App\Helpers\Helper::calculatePrice($cart->price) }}
                            </span>

                                <span class="cart-product-info d-block">
                                @foreach($cart->options as $options)
                                        {{ $options['value'] }}@if(!$loop->last) - @endif
                                    @endforeach
                            </span>
                            </div><!-- End .product-cart-details -->

                            <figure class="product-image-container">
                                <a href="product.html" class="product-image">
                                    <img src="{{ $cart->image() }}" alt="product">
                                </a>
                            </figure>
                            <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                        </div><!-- End .product -->
                    @endforeach
                @endif
            </div><!-- End .cart-product -->


            <div class="dropdown-cart-total">
                <span>Subtotal</span>

                <span class="cart-total-price">₺{{ App\Helpers\Helper::calculatePrice(ShoppingCart::subtotal()) }}</span>
            </div><!-- End .dropdown-cart-total -->


            <div class="dropdown-cart-total">
                <span>Tax</span>

                <span class="cart-total-price">₺{{ App\Helpers\Helper::calculatePrice(ShoppingCart::tax()) }}</span>
            </div><!-- End .dropdown-cart-total -->


            <div class="dropdown-cart-total">
                <span>Total</span>

                <span class="cart-total-price">₺{{ App\Helpers\Helper::calculatePrice(ShoppingCart::total()) }}</span>
            </div><!-- End .dropdown-cart-total -->

            <div class="dropdown-cart-action">
                <a href="{{ route('cart.cart') }}" class="btn font-size-normal letter-spacing-large btn-primary">View Cart</a>
                <a href="@if(Auth::check()){{ route('cart.checkout') }}@else{{ route('login') }}@endif" class="btn font-size-normal letter-spacing-large btn-outline-primary-2"><span>Checkout</span><i class="icon-long-arrow-right"></i></a>
            </div><!-- End .dropdown-cart-total -->
        </div><!-- End .dropdown-menu -->
    </div><!-- End .cart-dropdown -->

</div>

<div class="page-content">
    <div class="cart">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <table class="table table-cart table-mobile">
                        <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Tax</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                        </thead>

                        <tbody>
{{--                        @dd($cart->content())--}}
                        @foreach(ShoppingCart::content()->get('items') as $content)
                            <tr>
                                <td class="product-col">
                                    <div class="product">
                                        <figure class="product-media">
                                            <a href="#">
                                                <img src="{{ $content->image() }}" alt="{{ $content->name }}">
                                            </a>
                                        </figure>

                                        <h3 class="product-title">
                                            <a href="#">{{ $content->name }}</a>
{{--                                            @dd($content->options)--}}
                                            <p>Seçenek: @foreach($content->options as $key => $option)
                                                    @if($key !== 'image')
                                                        {{ $option['value']}}
                                                    @endif
                                                @endforeach</p>
                                        </h3><!-- End .product-title -->
                                        <span class="d-block">
{{--                                                    @dd(json_decode($content->options))--}}
                                                </span>
                                    </div><!-- End .product -->
                                </td>
                                <td class="price-col">₺{{ \App\Helpers\Helper::calculatePrice($content->price) }}</td>
                                <td class="price-col">₺{{ \App\Helpers\Helper::calculatePrice($content->tax) }}</td>
                                <td class="quantity-col" wire:ignore>
                                    <div class="cart-product-quantity">
                                        <input type="number" class="form-control" value="{{ $content->qty }}" min="1" max="10" step="1" data-decimals="0" required>
                                    </div><!-- End .cart-product-quantity -->
                                </td>
                                <td class="total-col">₺{{ \App\Helpers\Helper::calculatePrice($content->total) }}</td>
                                <td class="remove-col">
                                    <button wire:click="removeItem('{{$content->rowId}}')" class="btn-remove"><i class="icon-close"></i></button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table><!-- End .table table-wishlist -->

                    <div class="cart-bottom">
                        <div class="cart-discount">
                            <form wire:submit.prevent="couponCode">
                                <div class="input-group">
                                    @if(ShoppingCart::hasCoupon())
                                        <input type="text" class="form-control" value="{{ ShoppingCart::coupon()->code }}" disabled>

                                        <div class="input-group-append">
                                            <button class="btn btn-outline-primary-2" type="submit" disabled><i class="icon-long-arrow-right"></i></button>
                                        </div><!-- .End .input-group-append -->
                                    @else
                                        <input type="text" class="form-control @error('couponCode') border-danger @enderror" wire:model="couponCode" placeholder="coupon code">

                                        <div class="input-group-append">
                                            <button class="btn btn-outline-primary-2" type="submit"><i class="icon-long-arrow-right"></i></button>
                                        </div><!-- .End .input-group-append -->
                                    @endif
                                </div><!-- End .input-group -->
                            </form>
                        </div><!-- End .cart-discount -->

                        <a href="#" class="btn btn-outline-dark-2"><span>UPDATE CART</span><i class="icon-refresh"></i></a>
                    </div><!-- End .cart-bottom -->
                </div><!-- End .col-lg-9 -->
                <aside class="col-lg-3">
                    <div class="summary summary-cart">
                        <h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

                        <table class="table table-summary">
                            <tbody>
                            <tr class="summary-subtotal">
                                <td>Subtotal:</td>
                                <td>₺{{ \App\Helpers\Helper::calculatePrice($cart->subtotal()) }}</td>
                            </tr><!-- End .summary-subtotal -->
                            <tr class="summary-shipping">
                                <td>Shipping:</td>
                                <td>&nbsp;</td>
                            </tr>
                            @foreach($cargos as $cargo)
                                <tr class="summary-shipping-row">
                                    <td>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" wire:model="shippingCost" value="{{ $cargo->id }}" id="cargo-{{ $cargo->id }}" name="cargo" class="custom-control-input">
                                            <label class="custom-control-label" for="cargo-{{ $cargo->id }}">{{ $cargo->name }}</label>
                                        </div><!-- End .custom-control -->
                                    </td>
                                    <td>₺{{ \App\Helpers\Helper::calculatePrice($cargo->price) }}</td>
                                </tr><!-- End .summary-shipping-row -->
                            @endforeach

{{--                            <tr class="summary-shipping-row">--}}
{{--                                <td>--}}
{{--                                    <div class="custom-control custom-radio">--}}
{{--                                        <input type="radio" id="standart-shipping" name="shipping" class="custom-control-input">--}}
{{--                                        <label class="custom-control-label" for="standart-shipping">Standart:</label>--}}
{{--                                    </div><!-- End .custom-control -->--}}
{{--                                </td>--}}
{{--                                <td>₺10.00</td>--}}
{{--                            </tr><!-- End .summary-shipping-row -->--}}

{{--                            <tr class="summary-shipping-row">--}}
{{--                                <td>--}}
{{--                                    <div class="custom-control custom-radio">--}}
{{--                                        <input type="radio" id="express-shipping" name="shipping" class="custom-control-input">--}}
{{--                                        <label class="custom-control-label" for="express-shipping">Express:</label>--}}
{{--                                    </div><!-- End .custom-control -->--}}
{{--                                </td>--}}
{{--                                <td>₺20.00</td>--}}
{{--                            </tr><!-- End .summary-shipping-row -->--}}

                            <tr class="summary-shipping-estimate">
                                <td>Estimate for Your Country<br> <a href="dashboard.html">Change address</a></td>
                                <td>&nbsp;</td>
                            </tr><!-- End .summary-shipping-estimate -->
                            <tr class="summary-subtotal">
                                <td>Tax:</td>
                                <td>₺{{ \App\Helpers\Helper::calculatePrice(\App\Helpers\Cart\Facades\ShoppingCart::tax()) }}</td>
                            </tr><!-- End .summary-subtotal -->
                            @if(ShoppingCart::hasCoupon())
                                <tr class="summary-subtotal">
                                    <td class="text-danger">
                                        {{ShoppingCart::coupon()->name}}:
                                    </td>
                                    <td class="text-danger">
                                        -₺{{ \App\Helpers\Helper::calculatePrice(ShoppingCart::coupon()->price) }}
                                    </td>
                                </tr><!-- End .summary-subtotal -->
                            @endif
                            <tr class="summary-total">
                                <td>Total:</td>
                                <td>₺{{ \App\Helpers\Helper::calculatePrice(\App\Helpers\Cart\Facades\ShoppingCart::total()) }}</td>
                            </tr><!-- End .summary-total -->
                            </tbody>
                        </table><!-- End .table table-summary -->

                        <a href="@if(Auth::check()){{ route('cart.checkout') }}@else{{ route('login') }}@endif" class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO CHECKOUT</a>
                    </div><!-- End .summary -->

                    <a href="category.html" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
                </aside><!-- End .col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .cart -->
</div><!-- End .page-content -->

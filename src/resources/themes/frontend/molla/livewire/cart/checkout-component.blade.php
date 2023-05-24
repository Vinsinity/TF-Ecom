<div class="page-content">
    <div class="checkout">
        <div class="container">
{{--            <div class="checkout-discount">--}}
{{--                <form action="#">--}}
{{--                    <input type="text" class="form-control" required id="checkout-discount-input">--}}
{{--                    <label for="checkout-discount-input" class="text-truncate">Have a coupon? <span>Click here to enter your code</span></label>--}}
{{--                </form>--}}
{{--            </div><!-- End .checkout-discount -->--}}
            <form wire:submit.prevent="proceedCheckout">
                @csrf
                <div class="row">
                    <div class="col-lg-9">
                        <div class="row">
                            <div class="col-lg-7">
                                <h2 class="checkout-title">Payment Details</h2><!-- End .checkout-title -->
                                <ul class="nav nav-pills" id="tabs-payment" role="tablist">
                                    @foreach($paymentMethods as $paymentMethod)
                                        <li class="nav-item">
                                            <a class="nav-link {{$loop->first ? 'active' : ''}}" id="{{$paymentMethod->slug}}-tab" data-toggle="tab" href="#{{$paymentMethod->slug}}" role="tab" aria-controls="{{$paymentMethod->slug}}" aria-selected="{{$loop->first ? 'true' : 'false'}}">{{$paymentMethod->name}}</a>
                                        </li>
                                    @endforeach
                                </ul>

                                <div class="tab-content" id="tab-content-payment">
                                    @foreach($paymentMethods as $paymentMethod)
                                        <div class="tab-pane fade {{$loop->first ? 'show active' : ''}}" id="{{$paymentMethod->slug}}" role="tabpanel" aria-labelledby="{{$paymentMethod->slug}}-tab">
                                            @include('cart.payments.'.$paymentMethod->view)
                                            <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                                                <span class="btn-text">Place Order</span>
                                                <span class="btn-hover-text">Proceed to Checkout</span>
                                            </button>
                                        </div>
                                    @endforeach
                                </div>
{{--                                <ul class="nav nav-pills" id="tabs-5" role="tablist">--}}
{{--                                    <li class="nav-item">--}}
{{--                                        <a class="nav-link active" id="credit-cart-tab" data-toggle="tab" href="#credit-cart" role="tab" aria-controls="credit-cart" aria-selected="true">Credit Card</a>--}}
{{--                                    </li>--}}
{{--                                    <li class="nav-item">--}}
{{--                                        <a class="nav-link" id="tab-18-tab" data-toggle="tab" href="#tab-18" role="tab" aria-controls="tab-18" aria-selected="false">Bank Transfer</a>--}}
{{--                                    </li>--}}
{{--                                    <li class="nav-item">--}}
{{--                                        <a class="nav-link" id="tab-19-tab" data-toggle="tab" href="#tab-19" role="tab" aria-controls="tab-19" aria-selected="false">Cash on Delivery</a>--}}
{{--                                    </li>--}}
{{--                                    <li class="nav-item">--}}
{{--                                        <a class="nav-link" id="tab-20-tab" data-toggle="tab" href="#tab-20" role="tab" aria-controls="tab-20" aria-selected="false">Paypal</a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                                <div class="tab-content" id="tab-content-5">--}}
{{--                                    <div class="tab-pane fade show active" id="credit-cart" role="tabpanel" aria-labelledby="credit-cart-tab">--}}
{{--                                        <label>Name Surname *</label>--}}
{{--                                        <input wire:model="fullname" type="text" class="form-control">--}}

{{--                                        <label>Card Number *</label>--}}
{{--                                        <input wire:model="card_number" type="text" class="form-control">--}}
{{--                                        <div class="row">--}}
{{--                                            <div class="col-sm-6">--}}
{{--                                                <label>MM / YY *</label>--}}
{{--                                                <input wire:model="last_date" type="text" class="form-control">--}}
{{--                                            </div><!-- End .col-sm-6 -->--}}

{{--                                            <div class="col-sm-6">--}}
{{--                                                <label>CVV2 *</label>--}}
{{--                                                <input wire:model="cvv" type="text" class="form-control">--}}
{{--                                            </div><!-- End .col-sm-6 -->--}}
{{--                                        </div><!-- End .row -->--}}
{{--                                        <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">--}}
{{--                                            <span class="btn-text">Place Order</span>--}}
{{--                                            <span class="btn-hover-text">Proceed to Checkout</span>--}}
{{--                                        </button>--}}
{{--                                    </div><!-- .End .tab-pane -->--}}
{{--                                    <div class="tab-pane fade" id="tab-18" role="tabpanel" aria-labelledby="tab-18-tab">--}}
{{--                                        <p>Nobis perspiciatis natus cum, sint dolore earum rerum tempora aspernatur numquam velit tempore omnis, delectus repellat facere voluptatibus nemo non fugiat consequatur repellendus! Enim, commodi, veniam ipsa voluptates quis amet.</p>--}}
{{--                                    </div><!-- .End .tab-pane -->--}}
{{--                                    <div class="tab-pane fade" id="tab-19" role="tabpanel" aria-labelledby="tab-19-tab">--}}
{{--                                        <p>Perspiciatis quis nobis, adipisci quae aspernatur, nulla suscipit eum. Dolorum, earum. Consectetur pariatur repellat distinctio atque alias excepturi aspernatur nisi accusamus sed molestias ipsa numquam eius, iusto, aliquid, quis aut.</p>--}}
{{--                                    </div><!-- .End .tab-pane -->--}}
{{--                                    <div class="tab-pane fade" id="tab-20" role="tabpanel" aria-labelledby="tab-20-tab">--}}
{{--                                        <p>Quis nobis, adipisci quae aspernatur, nulla suscipit eum. Dolorum, earum. Consectetur pariatur repellat distinctio atque alias excepturi aspernatur nisi accusamus sed molestias ipsa numquam eius, iusto, aliquid, quis aut.</p>--}}
{{--                                    </div><!-- .End .tab-pane -->--}}
{{--                                </div><!-- End .tab-content -->--}}
                            </div>
                            <div class="col-lg-5">
                                <h2 class="checkout-title">Address Details</h2><!-- End .checkout-title -->
                                @if($currentUser->addresses->count())
                                    <div class="row">
                                        @foreach($currentUser->addresses as $address)
                                            <div class="col-lg-6">
                                                <label class="w-100">
                                                    <input type="radio" name="product" wire:model="selectedAddress" value="{{ $address->id }}" class="card-input-element" />

                                                    <div class="card card-default card-input">
                                                        <div class="card-header">{{ $address->title }}</div>
                                                        <div class="card-body">
                                                            {{ $address->address_line_1 }}
                                                        </div>
                                                    </div>

                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
{{--                                    <label>--}}
{{--                                        <input type="radio" name="product" selected checked class="card-input-element" />--}}

{{--                                        <div class="card card-default card-input">--}}
{{--                                            <div class="card-header">Product B</div>--}}
{{--                                            <div class="card-body">--}}
{{--                                                Product specific content--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                    </label>--}}
{{--                                    <label>--}}
{{--                                        <input type="radio" name="product" selected checked class="card-input-element" />--}}

{{--                                        <div class="card card-default card-input">--}}
{{--                                            <div class="card-header">Product C</div>--}}
{{--                                            <div class="card-body">--}}
{{--                                                Product specific content--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                    </label>--}}
                                @else
                                    <div>
                                        <h2 class="checkout-title">Address Details</h2><!-- End .checkout-title -->
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>First Name *</label>
                                                <input type="text" class="form-control" required>
                                            </div><!-- End .col-sm-6 -->

                                            <div class="col-sm-6">
                                                <label>Last Name *</label>
                                                <input type="text" class="form-control" required>
                                            </div><!-- End .col-sm-6 -->
                                        </div><!-- End .row -->

                                        <label>Company Name (Optional)</label>
                                        <input type="text" class="form-control">

                                        <label>Country *</label>
                                        <input type="text" class="form-control" required>

                                        <label>Street address *</label>
                                        <input type="text" class="form-control" placeholder="House number and Street name" required>
                                        <input type="text" class="form-control" placeholder="Appartments, suite, unit etc ..." required>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>Town / City *</label>
                                                <input type="text" class="form-control" required>
                                            </div><!-- End .col-sm-6 -->

                                            <div class="col-sm-6">
                                                <label>State / County *</label>
                                                <input type="text" class="form-control" required>
                                            </div><!-- End .col-sm-6 -->
                                        </div><!-- End .row -->

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>Postcode / ZIP *</label>
                                                <input type="text" class="form-control" required>
                                            </div><!-- End .col-sm-6 -->

                                            <div class="col-sm-6">
                                                <label>Phone *</label>
                                                <input type="tel" class="form-control" required>
                                            </div><!-- End .col-sm-6 -->
                                        </div><!-- End .row -->

                                        <label>Email address *</label>
                                        <input type="email" class="form-control" required>
                                    </div>
                                @endif

{{--                                <div class="custom-control custom-checkbox">--}}
{{--                                    <input type="checkbox" class="custom-control-input" id="checkout-create-acc">--}}
{{--                                    <label class="custom-control-label" for="checkout-create-acc">Create an account?</label>--}}
{{--                                </div><!-- End .custom-checkbox -->--}}

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="checkout-diff-address">
                                    <label class="custom-control-label" for="checkout-diff-address">Ship to a different address?</label>
                                </div><!-- End .custom-checkbox -->

                                <label>Order notes (optional)</label>
                                <textarea class="form-control" cols="30" rows="4" placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
                            </div>
                        </div>
                    </div><!-- End .col-lg-9 -->
                    <aside class="col-lg-3">
                        <div class="summary">
                            <h3 class="summary-title">Your Order</h3><!-- End .summary-title -->

                            <table class="table table-summary">
                                <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Total</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($cart->content()->get('items') as $content)
                                    <tr>
                                        <td><a href="#">{{ $content->name }}</a> x {{ $content->qty }}</td>
                                        <td>₺{{ \App\Helpers\Helper::calculatePrice($content->price) }}</td>
                                    </tr>
                                @endforeach
                                <tr class="summary-subtotal">
                                    <td>Subtotal:</td>
                                    <td>₺{{ \App\Helpers\Helper::calculatePrice($cart->subtotal()) }}</td>
                                </tr><!-- End .summary-subtotal -->
                                <tr class="summary-subtotal">
                                    <td>Tax:</td>
                                    <td>₺{{ \App\Helpers\Helper::calculatePrice($cart->tax()) }}</td>
                                </tr><!-- End .summary-subtotal -->
                                <tr class="summary-shipping">
                                    <td>Shipping: {{ $this->shippingCost }}</td>
                                    <td>&nbsp;</td>
                                </tr>
                                @foreach($cargos as $cargo)
                                    <tr class="summary-shipping-row">
                                        <td>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" wire:model="cargoId" value="{{ $cargo->id }}" id="cargo-{{ $cargo->id }}" name="cargo" class="custom-control-input">
                                                <label class="custom-control-label" for="cargo-{{ $cargo->id }}">{{ $cargo->name }}</label>
                                            </div><!-- End .custom-control -->
                                        </td>
                                        <td>₺{{ \App\Helpers\Helper::calculatePrice($cargo->price) }}</td>
                                    </tr><!-- End .summary-shipping-row -->
                                @endforeach
{{--                                <tr class="summary-shipping-estimate">--}}
{{--                                    <td>Estimate for Your Country<br> <a href="dashboard.html">Change address</a></td>--}}
{{--                                    <td>&nbsp;</td>--}}
{{--                                </tr><!-- End .summary-shipping-estimate -->--}}
                                @if($cart->cost(\App\Helpers\Cart\Enums\CostType::Shipping) > 0)
                                <tr>
                                    <td>Shipping:</td>
                                    <td>₺{{ \App\Helpers\Helper::calculatePrice($cart->cost(\App\Helpers\Cart\Enums\CostType::Shipping)) }}</td>
                                </tr>
                                @endif
                                @if(ShoppingCart::hasCoupon())
                                    <tr class="summary-subtotal">
                                        <td class="text-danger">Coupon:</td>
                                        <td class="text-danger">-₺{{ \App\Helpers\Helper::calculatePrice(ShoppingCart::coupon()->price) }}</td>
                                    </tr><!-- End .summary-subtotal -->
                                @endif
                                <tr class="summary-total">
                                    <td>Total:</td>
                                    <td>₺{{ \App\Helpers\Helper::calculatePrice($cart->total()) }}</td>
                                </tr><!-- End .summary-total -->
                                </tbody>
                            </table><!-- End .table table-summary -->

{{--                            <div class="accordion-summary" id="accordion-payment">--}}
{{--                                <div class="card">--}}
{{--                                    <div class="card-header" id="heading-1">--}}
{{--                                        <h2 class="card-title">--}}
{{--                                            <a role="button" data-toggle="collapse" href="#collapse-1" aria-expanded="true" aria-controls="collapse-1">--}}
{{--                                                Direct bank transfer--}}
{{--                                            </a>--}}
{{--                                        </h2>--}}
{{--                                    </div><!-- End .card-header -->--}}
{{--                                    <div id="collapse-1" class="collapse show" aria-labelledby="heading-1" data-parent="#accordion-payment">--}}
{{--                                        <div class="card-body">--}}
{{--                                            Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.--}}
{{--                                        </div><!-- End .card-body -->--}}
{{--                                    </div><!-- End .collapse -->--}}
{{--                                </div><!-- End .card -->--}}

{{--                                <div class="card">--}}
{{--                                    <div class="card-header" id="heading-2">--}}
{{--                                        <h2 class="card-title">--}}
{{--                                            <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-2" aria-expanded="false" aria-controls="collapse-2">--}}
{{--                                                Check payments--}}
{{--                                            </a>--}}
{{--                                        </h2>--}}
{{--                                    </div><!-- End .card-header -->--}}
{{--                                    <div id="collapse-2" class="collapse" aria-labelledby="heading-2" data-parent="#accordion-payment">--}}
{{--                                        <div class="card-body">--}}
{{--                                            Ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis.--}}
{{--                                        </div><!-- End .card-body -->--}}
{{--                                    </div><!-- End .collapse -->--}}
{{--                                </div><!-- End .card -->--}}

{{--                                <div class="card">--}}
{{--                                    <div class="card-header" id="heading-3">--}}
{{--                                        <h2 class="card-title">--}}
{{--                                            <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-3" aria-expanded="false" aria-controls="collapse-3">--}}
{{--                                                Cash on delivery--}}
{{--                                            </a>--}}
{{--                                        </h2>--}}
{{--                                    </div><!-- End .card-header -->--}}
{{--                                    <div id="collapse-3" class="collapse" aria-labelledby="heading-3" data-parent="#accordion-payment">--}}
{{--                                        <div class="card-body">Quisque volutpat mattis eros. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros.--}}
{{--                                        </div><!-- End .card-body -->--}}
{{--                                    </div><!-- End .collapse -->--}}
{{--                                </div><!-- End .card -->--}}

{{--                                <div class="card">--}}
{{--                                    <div class="card-header" id="heading-4">--}}
{{--                                        <h2 class="card-title">--}}
{{--                                            <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-4" aria-expanded="false" aria-controls="collapse-4">--}}
{{--                                                PayPal <small class="float-right paypal-link">What is PayPal?</small>--}}
{{--                                            </a>--}}
{{--                                        </h2>--}}
{{--                                    </div><!-- End .card-header -->--}}
{{--                                    <div id="collapse-4" class="collapse" aria-labelledby="heading-4" data-parent="#accordion-payment">--}}
{{--                                        <div class="card-body">--}}
{{--                                            Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum.--}}
{{--                                        </div><!-- End .card-body -->--}}
{{--                                    </div><!-- End .collapse -->--}}
{{--                                </div><!-- End .card -->--}}

{{--                                <div class="card">--}}
{{--                                    <div class="card-header" id="heading-5">--}}
{{--                                        <h2 class="card-title">--}}
{{--                                            <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-5" aria-expanded="false" aria-controls="collapse-5">--}}
{{--                                                Credit Card (Stripe)--}}
{{--                                                <img src="{{ asset('themes/frontend/molla/assets/images/payments-summary.png') }}" alt="payments cards">--}}
{{--                                            </a>--}}
{{--                                        </h2>--}}
{{--                                    </div><!-- End .card-header -->--}}
{{--                                    <div id="collapse-5" class="collapse" aria-labelledby="heading-5" data-parent="#accordion-payment">--}}
{{--                                        <div class="card-body"> Donec nec justo eget felis facilisis fermentum.Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Lorem ipsum dolor sit ame.--}}
{{--                                        </div><!-- End .card-body -->--}}
{{--                                    </div><!-- End .collapse -->--}}
{{--                                </div><!-- End .card -->--}}
{{--                            </div><!-- End .accordion -->--}}

{{--                            <button type="submit" disabled class="btn btn-outline-primary-2 btn-order btn-block">--}}
{{--                                <span class="btn-text">Place Order</span>--}}
{{--                                <span class="btn-hover-text">Proceed to Checkout</span>--}}
{{--                            </button>--}}
                        </div><!-- End .summary -->
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </form>
        </div><!-- End .container -->
    </div><!-- End .checkout -->
</div><!-- End .page-content -->

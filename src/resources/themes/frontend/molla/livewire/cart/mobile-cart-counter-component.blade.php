<div class="top-cart">
    <a href="javascript:void(0)"><i class="fa fa-shopping-cart" aria-hidden="true"></i> ({{ShoppingCart::content()->count()}})</a>
    <div class="cart-drop">
        @foreach(\ShoppingCart::content() as $item)
            <div class="single-cart">
                <div class="cart-img">
                    <img alt="" width="100px" src="{{ asset(Storage::url('image/products/'.$item->options->image)) }}">
                </div>
                <div class="cart-title">
                    <p><a href="">{{ $item->name }}</a></p>
                </div>
                <div class="cart-price">
                    <p>{{ $item->qty }} x ₺{{ $item->price }}</p>
                </div>
                <a href="#"><i class="fa fa-times"></i></a>
            </div>
        @endforeach
        <div class="cart-bottom">
            <div class="cart-sub-total">
                <p>Sub-Total <span>₺{{ ShoppingCart::subtotal() }}</span></p>
            </div>
            <div class="cart-sub-total">
                <p>Eco Tax ({{ number_format(config('app.tax'),2,',','.') }})<span>₺{{ ShoppingCart::tax() }}</span></p>
            </div>
            <div class="cart-sub-total">
                <p>Total <span>₺{{ ShoppingCart::total() }}</span></p>
            </div>
            <div class="cart-checkout">
                <a href="{{ route('cart.cart') }}"><i class="fa fa-shopping-cart"></i>View Cart</a>
            </div>
            <div class="cart-share">
                <a href="{{ route('cart.checkout') }}"><i class="fa fa-share"></i>Checkout</a>
            </div>
        </div>
    </div>
</div>

<div>
    <div wire:loading>
        Yükleniyor...
    </div>
    <div class="product-price">
        ₺@if($this->variant)
            {{ \App\Helpers\Helper::calculatePrice($this->variant->price) }}
        @else
            @foreach($product->getPriceRangeAttribute() as $price)
                {{ $price }}@if($loop->first) -@endif
            @endforeach
        @endif
        {{--                                    {{ config('app.currency_sign').$product->price }}--}}
    </div><!-- End .product-price -->

    <div class="product-content">
        {{ $this->counter }},{{ $this->variantCount }}
        <p>{{ $product->getSummaryAttribute() }}</p>
    </div><!-- End .product-content -->

{{--    @if($this->variant)--}}
{{--    <div class="product-content">--}}
{{--        <p>Stok: {{ $this->variant->stock }}</p>--}}
{{--    </div><!-- End .product-content -->--}}
{{--    @endif--}}
{{--    @dd($product->variations)--}}
    @foreach($product->variations as $optionName => $optionData)
        <div class="details-filter-row details-row-size" wire:ignore.self>
            <label for="{{ $optionName }}">{{ $optionName }}:</label>
            @if($optionData['type'] === 'selectbox')
                <div class="select-custom">
                    <select wire:model="selectedVariant.{{ $optionName }}" id="{{ $optionName }}" class="form-control">
                        <option value="" selected>{{ $optionName }}</option>
                        @foreach($optionData['values'] as $optionValue)
                            <option value="{{ $optionValue['id'] }}">{{ $optionValue['name'] }}</option>
                        @endforeach
                    </select>
                </div>
            @elseif($optionData['type'] === 'radio')
                @foreach($optionData['values'] as $optionValue)
                    <label for="{{ $optionValue['id'] }}">
                    <input type="radio" wire:model="selectedVariant.{{ $optionName }}" name="{{ $optionName }}" id="{{ $optionValue['id'] }}" value="{{ $optionValue['id'] }}" >
                        {{ $optionValue['name'] }}
                    </label>
                @endforeach
            @endif
        </div>
    @endforeach

    <div class="product-details-action">
        <div class="details-action-col">
            <div class="product-details-quantity" wire:ignore>
                <input type="number" id="qty" class="form-control" wire:model="quantity" min="1" step="1" data-decimals="0" required>
            </div><!-- End .product-details-quantity -->

            <a href="javascript:void(0);" class="btn-product btn-cart" wire:click="addToCart">
                <span>add to cart</span>
            </a>
        </div><!-- End .details-action-col -->

        <div class="details-action-wrapper">
            <a href="#" class="btn-product btn-wishlist" title="Wishlist"><span>Add to Wishlist</span></a>
            <a href="#" class="btn-product btn-compare" title="Compare"><span>Add to Compare</span></a>
        </div><!-- End .details-action-wrapper -->
    </div><!-- End .product-details-action -->
</div>

@extends('app', ['title' => trans('order.list.order_number').' #'.$order->order_number])
@section('content')
    @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('success') }}.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true" aria-label="Close"></button>
        </div>
    @endif
    <!-- start: page -->
    <section class="card">
        <div class="card-body">
            <div class="invoice">
                <header class="clearfix">
                    <div class="row">
                        <div class="col-sm-6 mt-3">
                            <h2 class="h2 mt-0 mb-1 text-dark font-weight-bold">INVOICE</h2>
                            <h4 class="h4 m-0 text-dark font-weight-bold">#{{ $order->order_number }}</h4>
                        </div>
                        <div class="col-sm-6 text-end mt-3 mb-3">
                            <address class="ib me-5">
                                Okler Themes Ltd
                                <br/>
                                123 Porto Street, New York, USA
                                <br/>
                                Phone: +12 3 4567-8901
                                <br/>
                                okler@okler.net
                            </address>
                            <div class="ib">
                                <img src="{{ Theme::publicPath('img/invoice-logo.png') }}" alt="OKLER Themes" />
                            </div>
                        </div>
                    </div>
                </header>
                <div class="bill-info">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="bill-to">
                                <p class="h5 mb-1 text-dark font-weight-semibold">To:</p>
                                <address>
                                    Envato
                                    <br/>
                                    121 King Street, Melbourne, Australia
                                    <br/>
                                    Phone: +61 3 8376 6284
                                    <br/>
                                    info@envato.com
                                </address>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="bill-data text-end">
                                <p class="mb-0">
                                    <span class="text-dark">Invoice Date:</span>
                                    <span class="value">05/20/2021</span>
                                </p>
                                <p class="mb-0">
                                    <span class="text-dark">Due Date:</span>
                                    <span class="value">06/20/2021</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <table class="table table-responsive-md invoice-items">
                    <thead>
                    <tr class="text-dark">
                        <th id="cell-id"     class="font-weight-semibold">#</th>
                        <th id="cell-item"   class="font-weight-semibold">Item</th>
                        <th id="cell-desc"   class="font-weight-semibold">Description</th>
                        <th id="cell-price"  class="text-center font-weight-semibold">Price</th>
                        <th id="cell-qty"    class="text-center font-weight-semibold">Quantity</th>
                        <th id="cell-total"  class="text-center font-weight-semibold">Total</th>
                    </tr>
                    </thead>
                    <tbody>
{{--                    @dd($order->items)--}}
                        @foreach($order->items as $item)
                            <tr>
                                <td>{{ $item->product_variant_id }}</td>
                                <td class="font-weight-semibold text-dark">{{ $item->productVariant->product->name }}</td>
                                <td>{{ $item->productVariant->product->getSummaryAttribute() }}</td>
                                <td class="text-center">₺{{ App\Helpers\Helper::calculatePrice($item->price) }}</td>
                                <td class="text-center">{{ $item->quantity}}</td>
                                <td class="text-center">₺{{ App\Helpers\Helper::calculatePrice($item->total_price) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="invoice-summary">
                    <div class="row justify-content-end">
                        <div class="col-sm-4">
                            <table class="table h6 text-dark">
                                <tbody>
                                <tr class="b-top-0">
                                    <td colspan="2">Subtotal</td>
                                    <td class="text-left">₺{{ App\Helpers\Helper::calculatePrice($order->subtotal_price) }}</td>
                                </tr>
                                <tr class="b-top-0">
                                    <td colspan="2">Tax</td>
                                    <td class="text-left">₺{{ App\Helpers\Helper::calculatePrice($order->tax_price) }}</td>
                                </tr>
                                @if($order->discount)
                                    <tr class="text-danger">
                                        <td colspan="2">Discount</td>
                                        <td class="text-left">-₺{{ App\Helpers\Helper::calculatePrice($order->total_discount_price) }}</td>
                                    </tr>
                                @endif
                                <tr>
                                    <td colspan="2">Shipping</td>
                                    <td class="text-left">₺{{ App\Helpers\Helper::calculatePrice($order->cargo_price) }}</td>
                                </tr>
                                <tr class="h4">
                                    <td colspan="2">Total</td>
                                    <td class="text-left">₺{{ App\Helpers\Helper::calculatePrice($order->total_price) }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-grid gap-3 d-md-flex justify-content-md-end me-4">
                <a href="#" class="btn btn-default">Submit Invoice</a>
                <a href="pages-invoice-print.html" target="_blank" class="btn btn-primary ms-3"><i class="fas fa-print"></i> Print</a>
            </div>
        </div>
    </section>
    <!-- end: page -->
@endsection

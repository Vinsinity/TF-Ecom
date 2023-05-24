@extends('layouts.frontend.app', ['title' => 'Orders'])
@section('content')
    <!--=========================-->
    <!--=        Breadcrumb         =-->
    <!--=========================-->

    <section class="breadcrumb-area">
        <div class="container-fluid custom-container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bc-inner">
                        <p><a href="#">Home |</a> Shop</p>
                    </div>
                </div>
                <!-- /.col-xl-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <!-- /.cart-area -->
    <section class="account-area">
        <div class="container-fluid custom-container">
            <div class="row">
                <aside class="col-lg-3">
                    <!-- COMPONENT MENU LIST -->
                    @livewire('public.account.menu-component')
                    <!-- COMPONENT MENU LIST END .// -->
                </aside>
                <div class="col-lg-9">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="mb-3 d-flex justify-content-between">
                                <div>
                                    <span class="me-3">{{ $order->createDateFull() }}</span>
                                    <span class="me-3">#{{ str_pad($order->order_number,7,'0',STR_PAD_LEFT) }}</span>
                                    {{--                                    <span class="me-3">Visa -1234</span>--}}
                                    <span class="badge rounded-pill bg-info">{{ $order->status->name }}</span>
                                </div>
                                <div class="d-flex">
                                    <button class="btn btn-link p-0 me-3 d-none d-lg-block btn-icon-text"><i
                                                class="bi bi-download"></i> <span class="text">Invoice</span></button>
                                    <div class="dropdown">
                                        <button class="btn btn-link p-0 text-muted" type="button"
                                                data-bs-toggle="dropdown">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="#"><i class="bi bi-pencil"></i> Edit</a>
                                            </li>
                                            <li><a class="dropdown-item" href="#"><i class="bi bi-printer"></i>
                                                    Print</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-borderless">
                                <thead>
                                <th></th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                </thead>
                                <tbody>
                                @foreach($order->products as $product)
                                    <tr>
                                        {{--                                        <td>--}}
                                        {{--                                            <div class="d-flex mb-2">--}}
                                        {{--                                                <div class="flex-shrink-0">--}}
                                        {{--                                                </div>--}}
                                        {{--                                                <div class="flex-lg-grow-1 ms-3">--}}

                                        {{--                                                    <span class="small">Color: Black</span>--}}
                                        {{--                                                </div>--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </td>--}}
                                        <td width="5%">
                                            <img src="{{ asset(Storage::url('image/products/'.$product->product->images->first()->image)) }}"
                                                 alt="" class="img-fluid">
                                        </td>
                                        <td>
                                            <h5 class="small mb-0">
                                                <a href="#" class="text-reset">{{ $product->product->name }}</a>
                                            </h5>
                                            <span class="small">
                                                Değerlendirme:
                                                @if($order->reviews->count())
                                                    {{ $order->reviews->count() }}
                                                @else
                                                    ASD
                                                @endif
                                            </span>
                                        </td>
                                        <td width="5%">{{ $product->quantity }}</td>
                                        <td width="10%">{{ $product->showPrice() }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="3">Subtotal</td>
                                    <td class="text-end">{{ $order->showSubtotalPrice() }}</td>
                                </tr>
                                <tr>
                                    <td colspan="3">Shipping ({{ $order->cargo->name }})</td>
                                    <td class="text-end">{{ $order->showCargoPrice() }}</td>
                                </tr>
                                <tr>
                                    <td colspan="3">Tax</td>
                                    <td class="text-end">{{ $order->showTax() }}</td>
                                </tr>
                                <tr class="fw-bold">
                                    <td colspan="3">TOTAL</td>
                                    <td class="text-end">{{ $order->showOrderTotalPrice() }}</td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <!-- Payment -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <h3 class="h6">Payment Method</h3>
                                    <p>Visa -1234 <br>
                                        Total: {{ $order->showOrderTotalPrice() }} <span
                                                class="badge bg-success rounded-pill">PAID</span></p>
                                </div>
                                <div class="col-lg-4">
                                    <h3 class="h6">Billing address</h3>
                                    <address>
                                        <strong>John Doe</strong><br>
                                        1355 Market St, Suite 900<br>
                                        San Francisco, CA 94103<br>
                                        <abbr title="Phone">P:</abbr> (123) 456-7890
                                    </address>
                                </div>
                                <div class="col-lg-4">
                                    <h3 class="h6">Shipping address</h3>
                                    <address>
                                        <strong>John Doe</strong><br>
                                        1355 Market St, Suite 900<br>
                                        San Francisco, CA 94103<br>
                                        <abbr title="Phone">P:</abbr> (123) 456-7890
                                    </address>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection

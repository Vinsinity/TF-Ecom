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
                    <article class="card">
                        <div class="card-body">
                            <div class="account-table">
                                <h6>Order History {{ count($orders) }}</h6>
                                <table class="tables">
                                    <thead>
                                    <tr>
                                        <th>Order</th>
                                        <th>Last Action Date</th>
                                        <th>Status</th>
                                        <th>Total Quantity</th>
                                        <th>Total Price</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>
                                                <a href="{{ route('account.orders.show', ['number' => $order->order_number]) }}">#{{ str_pad($order->order_number,7,'0',STR_PAD_LEFT) }}</a>
                                            </td>
                                            <td>
                                                {{ $order->created_at }}
                                            </td>
                                            <td>
                                                {{ $order->status->name }}
                                            </td>
                                            <td>
                                                {{ $order->total_quantity }}
                                            </td>
                                            <td>
                                                {{ $order->showOrderTotalPrice() }}
                                            </td>

                                        </tr>
                                        <!-- /.single product  -->
                                    @endforeach
                                    </tbody>
                                </table>
                                {!! $orders->render() !!}
                            </div>
                        </div>
                        <!-- card-body .// -->
                    </article> <!-- card .// -->
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('app', ['title' => 'Addresses'])
@section('content')
    <main class="main">
        <div class="page-header text-center" style="background-image: url({{ asset('themes/frontend/molla/assets/images/page-header-bg.jpg') }})">
            <div class="container">
                <h1 class="page-title">Addresses<span>Account</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->

        <div class="page-content mt-5">
            <div class="dashboard">
                <div class="container">
                    <div class="row">
                        @include('account.sidebar')

                        <div class="col-md-8 col-lg-9">
                            <div>
                                <h2 class="checkout-title mt-0">Add Address Details</h2>
{{--                                @if(Session::has('errors'))--}}
{{--                                    <div class="alert alert-danger alert-outlined">--}}
{{--                                        <ul>--}}
{{--                                            @foreach ($errors->all() as $error)--}}
{{--                                                <li>{{ $error }}</li>--}}
{{--                                            @endforeach--}}
{{--                                        </ul>--}}
{{--                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                                            <span aria-hidden="true">&times;</span>--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                @endif--}}
                                <form action="{{ route('account.addresses.add.post') }}" method="POST">
                                    @csrf
                                    <label>Title * </label>
                                    @error('title')<p class="text-danger">{{ $message }}</p>@enderror
                                    <input name="title" type="text" class="form-control @error('title') border-danger @enderror" value="{{ old('title') }}">

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>First Name *</label>
                                            @error('first_name')<p class="text-danger">{{ $message }}</p>@enderror
                                            <input name="first_name" type="text" class="form-control @error('first_name') border-danger @enderror" value="{{ old('first_name') }}">
                                        </div><!-- End .col-sm-6 -->

                                        <div class="col-sm-6">
                                            <label>Last Name *</label>
                                            @error('last_name')<p class="text-danger">{{ $message }}</p>@enderror
                                            <input name="last_name" type="text" class="form-control @error('last_name') border-danger @enderror" value="{{ old('last_name') }}">
                                        </div><!-- End .col-sm-6 -->
                                    </div><!-- End .row -->

                                    {{--                                <label>Company Name (Optional)</label>--}}
                                    {{--                                <input type="text" class="form-control">--}}

                                    <label>Country *</label>
                                    @error('country')<p class="text-danger">{{ $message }}</p>@enderror
                                    <input name="country" type="text" class="form-control @error('country') border-danger @enderror" value="{{ old('country') }}" >

                                    <label>Street address *</label>
                                    @error('address_line_1')<p class="text-danger">{{ $message }}</p>@enderror
                                    <input name="address_line_1" type="text" class="form-control @error('address_line_1') border-danger @enderror" value="{{ old('address_line_1') }}"  placeholder="House number and Street name" >
                                    @error('address_line_2')<p class="text-danger">{{ $message }}</p>@enderror
                                    <input name="address_line_2" type="text" class="form-control @error('address_line_2') border-danger @enderror" value="{{ old('address_line_2') }}"  placeholder="Appartments, suite, unit etc ...">

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Town / City *</label>
                                            @error('city')<p class="text-danger">{{ $message }}</p>@enderror
                                            <input name="city" type="text" class="form-control @error('city') border-danger @enderror" value="{{ old('city') }}">
                                        </div><!-- End .col-sm-6 -->

                                        <div class="col-sm-6">
                                            <label>State / County *</label>
                                            @error('county')<p class="text-danger">{{ $message }}</p>@enderror
                                            <input name="county" type="text" class="form-control @error('county') border-danger @enderror" value="{{ old('county') }}">
                                        </div><!-- End .col-sm-6 -->
                                    </div><!-- End .row -->

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Postcode / ZIP *</label>
                                            @error('zip')<p class="text-danger">{{ $message }}</p>@enderror
                                            <input name="zip_code" type="text" class="form-control @error('zip') border-danger @enderror" value="{{ old('zip') }}">
                                        </div><!-- End .col-sm-6 -->

                                        <div class="col-sm-6">
                                            <label>Phone *</label>
                                            @error('phone')<p class="text-danger">{{ $message }}</p>@enderror
                                            <input name="phone" type="tel" class="form-control @error('phone') border-danger @enderror" value="{{ old('phone') }}">
                                        </div><!-- End .col-sm-6 -->
                                    </div><!-- End .row -->

                                    {{--                                <label>Email address *</label>--}}
                                    {{--                                <input type="email" class="form-control" required>--}}

                                    <button type="submit" class="btn btn-block btn-outline-primary-2 h-50">
                                        <span>Add Address</span>
                                        {{--                                    <i class="icon-long-arrow-right"></i>--}}
                                    </button>
                                </form>
                            </div>
                        </div><!-- End .col-lg-9 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .dashboard -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
    <!-- Sign in / Register Modal -->
    <div class="modal fade" id="signin-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="icon-close"></i></span>
                    </button>

                    <div class="form-box">
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
                    </div><!-- End .form-box -->
                </div><!-- End .modal-body -->
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->
@endsection

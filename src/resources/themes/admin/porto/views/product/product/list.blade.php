@extends('app', ['title' => 'Product List'])
@push('title')
    Category
@endpush
@section('content')
    <!-- start: page -->
    <div class="row">
        <div class="col">
            @if(Session::has('errors'))
                <div class="validation-message">
                    <ul style="display: block">
                        @foreach ($errors->all() as $error)
                            <label class="error">{{ $error }}</label>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('success') }}.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true" aria-label="Close"></button>
                </div>
            @endif
            <div class="card card-modern">
                <div class="card-body">
                    <div class="datatables-header-footer-wrapper">
                        <div class="datatable-header">
                            <div class="row align-items-center mb-3">

                                <div class="col-12 col-lg-auto mb-3 mb-lg-0">
                                    <a href="{{ route('admin.products.add') }}" class="btn btn-primary btn-md font-weight-semibold btn-py-2 px-4">+ Add Product</a>
                                </div>

                                <div class="col-8 col-lg-auto ms-auto ml-auto mb-3 mb-lg-0">
                                    <div class="d-flex align-items-lg-center flex-column flex-lg-row">
                                        <label class="ws-nowrap me-3 mb-0">Filter By:</label>
                                        <select class="form-control select-style-1 filter-by" name="filter-by">
                                            <option value="all" selected>All</option>
                                            <option value="1">ID</option>
                                            <option value="2">Name</option>
                                            <option value="3">Brand Name</option>
                                            <option value="4">Price</option>
                                            <option value="5">Created Date</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4 col-lg-auto ps-lg-1 mb-3 mb-lg-0">
                                    <div class="d-flex align-items-lg-center flex-column flex-lg-row">
                                        <label for="result-per-page" class="ws-nowrap me-3 mb-0">Show:</label>
                                        <select class="form-control select-style-1 results-per-page" id="result-per-page" name="results-per-page">
                                            <option value="12" selected>12</option>
                                            <option value="24">24</option>
                                            <option value="36">36</option>
                                            <option value="100">100</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-auto ps-lg-1">
                                    <div class="search search-style-1 search-style-1-lg mx-lg-auto">
                                        <div class="input-group">
                                            <label for="search-term"></label>
                                            <input type="text" class="search-term form-control" name="search-term" id="search-term" placeholder="Search Product">
                                            <button class="btn btn-default" type="submit"><i class="bx bx-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <table class="table table-ecommerce-simple table-borderless table-striped mb-0" id="datatable-ecommerce-list" style="min-width: 640px;">

                            <thead>
                            <tr>
                                <th width="5%" class="text-center">ID</th>
                                <th width="5%">Image</th>
                                <th>Name</th>
                                <th width="6%" class="text-center">Brand</th>
                                <th width="5%" class="text-center">Price</th>
                                <th width="6%" class="text-center">Variants</th>
                                <th width="10%" class="text-center">Create Date</th>
                                <th width="10%" class="text-center">Update Date</th>
                                <th width="10%">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td class="text-center"><strong>{{ $product->id }}</strong></td>
                                    {{--                                    {{ asset(Storage::url('image/products/'.$product->images[0]->image)) }}--}}
                                    {{--                                    @dd($product->images)--}}
                                    <td>
                                        @if($product->images->count() > 0)
                                            <img width="100%" src="{{ asset(Storage::url($product->images[0]->image)) }}" alt="">
                                        @else
                                            Resim Yok
                                        @endif
                                    </td>
                                    <td><a href="{{ route('admin.products.show', ['slug' => $product]) }}"><strong>{{ $product->name }}</strong></a></td>
                                    <td class="text-center">{{ $product->brand->name }}</td>
{{--                                                                        <td>{{ $product->brand->name }}</td>--}}
                                    <td class="text-center">@foreach($product->getPriceRangeAttribute() as $price)
                                            ₺{{ $price }}<br>
                                        @endforeach</td>
                                    <td class="text-center">
                                        @foreach($product->variantOptions as $optionName => $option)
                                            <span>{{ $optionName }}</span><br>
                                        @endforeach
                                        @foreach($product->variantOptions as $optionName => $option)
{{--                                            <label>{{ $optionName }}</label>--}}
{{--                                            @if($option['type'] === 'selectbox')--}}
{{--                                                <select name="{{ $optionName }}">--}}
{{--                                                    @foreach($option['values'] as $value)--}}
{{--                                                        <option value="{{ $value }}">{{ $value }}</option>--}}
{{--                                                    @endforeach--}}
{{--                                                </select>--}}
{{--                                            @elseif($option['type'] === 'radio')--}}
{{--                                                @foreach($option['values'] as $value)--}}
{{--                                                    <label>--}}
{{--                                                        <input type="radio" name="{{ $optionName }}" value="{{ $value }}">--}}
{{--                                                        {{ $value }}--}}
{{--                                                    </label>--}}
{{--                                                @endforeach--}}
{{--                                            @endif--}}
                                        @endforeach
                                    </td>
                                    <td class="text-center">{{ date('d.m.Y H:m:s', strtotime($product->created_at)) }}</td>
                                    <td class="text-center">{{ date('d.m.Y H:m:s', strtotime($product->updated_at)) }}</td>
                                    <td>
                                        <button type="button" class="mb-1 mt-1 me-1 btn btn-default">A</button>
                                        <button type="button" class="mb-1 mt-1 me-1 btn btn-primary">B</button>
                                        <button type="button" class="mb-1 mt-1 me-1 btn btn-success">C</button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <hr class="solid mt-5 opacity-4">
                        <div class="pagination">
                            {{ $products->links('pagination::bootstrap-4') }}
                        </div>
                        <div class="datatable-footer">
                            <div class="row align-items-center justify-content-between mt-3">
                                <div class="col-md-auto order-1 mb-3 mb-lg-0">
                                    <div class="d-flex align-items-stretch">
                                        <div class="d-grid gap-3 d-md-flex justify-content-md-end me-4">
                                            <select class="form-control select-style-1 bulk-action" name="bulk-action" style="min-width: 170px;">
                                                <option value="" selected>Bulk Actions</option>
                                                <option value="delete">Delete</option>
                                            </select>
                                            <a href="ecommerce-orders-detail.html" class="bulk-action-apply btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">Apply</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-auto text-center order-3 order-lg-2">
                                    <div class="results-info-wrapper"></div>
                                </div>
                                <div class="col-lg-auto order-2 order-lg-3 mb-3 mb-lg-0">
                                    <div class="pagination-wrapper"></div>
                                </div>
                            </div>
                        </div>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- end: page -->
@endsection

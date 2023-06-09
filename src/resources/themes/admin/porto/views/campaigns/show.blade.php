@extends('app', ['title' => $settings['name'].' Setting'])
@push('stylesheet')
    <link rel="stylesheet" href="{{ Theme::publicPath('vendor/dropzone/basic.css') }}"/>
    <link rel="stylesheet" href="{{ Theme::publicPath('vendor/dropzone/basic.css') }}"/>
    <link rel="stylesheet" href="{{ Theme::publicPath('vendor/dropzone/dropzone.css') }}"/>
    <link rel="stylesheet" href="{{ Theme::publicPath('vendor/bootstrap-markdown/css/bootstrap-markdown.min.css') }}"/>
    <link rel="stylesheet" href="{{ Theme::publicPath('vendor/pnotify/pnotify.custom.css') }}"/>
@endpush
@section('content')
    <!-- start: page -->
    <form class="ecommerce-form action-buttons-fixed" action="#" method="post">
        <div class="row">
            <div class="col">
                <section class="card card-modern card-big-info">
                    <div class="card-body">
                        <div class="tabs-modern row" style="min-height: 490px;">
                            <div class="col-lg-2-5 col-xl-1-5">
                                <div class="nav flex-column" id="tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link active" id="general-tab" data-bs-toggle="pill"
                                       data-bs-target="#general" role="tab" aria-controls="general"
                                       aria-selected="true"><i class="bx bx-cog me-2"></i> General</a>
                                    <a class="nav-link" id="usage-restriction-tab" data-bs-toggle="pill"
                                       data-bs-target="#usage-restriction" role="tab" aria-controls="usage-restriction"
                                       aria-selected="false"><i class="bx bx-block me-2"></i> Home Page</a>
                                    <a class="nav-link" id="usage-limits-tab" data-bs-toggle="pill"
                                       data-bs-target="#usage-limits" role="tab" aria-controls="usage-limits"
                                       aria-selected="false"><i class="bx bx-timer me-2"></i> Header</a>
                                    <a class="nav-link" id="usage-limits-tab" data-bs-toggle="pill"
                                       data-bs-target="#usage-limits" role="tab" aria-controls="usage-limits"
                                       aria-selected="false"><i class="bx bx-timer me-2"></i> Footer</a>
                                </div>
                            </div>
                            <div class="col-lg-3-5 col-xl-4-5">
                                <div class="tab-content" id="tabContent">
                                    <div class="tab-pane fade show active" id="general" role="tabpanel"
                                         aria-labelledby="general-tab">
                                        @foreach($settings['general'] as $general)
                                            <div class="form-group row align-items-center pb-3">
                                                <label
                                                    class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">{{ $general['name'] }}</label>
                                                <div class="col-lg-7 col-xl-6">
                                                    @switch($general['type'])
                                                        @case('file')
                                                            <input type="file" class="form-control" name="image">
                                                            @if($general['path'])
                                                                <img src="{{ Theme::publicPath($general['path']) }}"
                                                                     class="w-50 p-4" alt="">
                                                            @endif
                                                            @break
                                                        @case('input')
                                                            <input type="text" class="form-control form-control-modern"
                                                                   name="couponName" value="" required/>
                                                            @break
                                                        @case('select')
                                                            <select multiple data-plugin-selectTwo
                                                                    class="form-control form-control-modern"
                                                                    name="couponProducts"
                                                                    data-plugin-options='{ "placeholder": "Search for a product..." }'>
                                                                <option value=""></option>
                                                                <option value="product1">Porto Bag</option>
                                                                <option value="product2">Porto Shoes</option>
                                                                <option value="product3">Porto Jacket</option>
                                                            </select>
                                                            @break
                                                        @case('radio')
                                                            @break
                                                    @endswitch
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="tab-pane fade" id="usage-restriction" role="tabpanel"
                                         aria-labelledby="usage-restriction-tab">
                                        <div class="form-group row align-items-center pb-3">
                                            <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Minimum
                                                Spend</label>
                                            <div class="col-lg-7 col-xl-6">
                                                <input type="text" class="form-control form-control-modern"
                                                       name="couponMinimumSpend" value="" placeholder="No minimum"/>
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center pb-3">
                                            <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Maximum
                                                Spend</label>
                                            <div class="col-lg-7 col-xl-6">
                                                <input type="text" class="form-control form-control-modern"
                                                       name="couponMaximumSpend" value="" placeholder="No maximum"/>
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Individual
                                                Use Only?</label>
                                            <div class="col-lg-7 col-xl-6">
                                                <div class="checkbox">
                                                    <label class="my-2">
                                                        <input type="checkbox" value="">
                                                        Check this box if the coupon cannot be used in conjunction with
                                                        other coupons.
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center pb-3">
                                            <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Exclude Sale
                                                Items?</label>
                                            <div class="col-lg-7 col-xl-6">
                                                <div class="checkbox">
                                                    <label class="my-2">
                                                        <input type="checkbox" value="">
                                                        Check this box if the coupon should not apply to items on sale.
                                                        Per-item coupons will only work if the item is not on sale.
                                                        Per-cart coupons will only work if there are items in the cart
                                                        that are not on sale.
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center pb-3">
                                            <label
                                                class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Products</label>
                                            <div class="col-lg-7 col-xl-6">
                                                <select multiple data-plugin-selectTwo
                                                        class="form-control form-control-modern" name="couponProducts"
                                                        data-plugin-options='{ "placeholder": "Search for a product..." }'>
                                                    <option value=""></option>
                                                    <option value="product1">Porto Bag</option>
                                                    <option value="product2">Porto Shoes</option>
                                                    <option value="product3">Porto Jacket</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center pb-3">
                                            <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Exclude
                                                Products</label>
                                            <div class="col-lg-7 col-xl-6">
                                                <select multiple data-plugin-selectTwo
                                                        class="form-control form-control-modern"
                                                        name="couponExcludeProducts"
                                                        data-plugin-options='{ "placeholder": "Search for a product..." }'>
                                                    <option value=""></option>
                                                    <option value="product1">Porto Bag</option>
                                                    <option value="product2">Porto Shoes</option>
                                                    <option value="product3">Porto Jacket</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center pb-3">
                                            <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Product
                                                Categories</label>
                                            <div class="col-lg-7 col-xl-6">
                                                <select multiple data-plugin-selectTwo
                                                        class="form-control form-control-modern"
                                                        name="couponProductCategories"
                                                        data-plugin-options='{ "placeholder": "Search for a product category..." }'>
                                                    <option value="any">Any Category</option>
                                                    <option value="product1">Bags</option>
                                                    <option value="product2">Shoes</option>
                                                    <option value="product3">Jackets</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center pb-3">
                                            <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Exclude
                                                Categories</label>
                                            <div class="col-lg-7 col-xl-6">
                                                <select multiple data-plugin-selectTwo
                                                        class="form-control form-control-modern"
                                                        name="couponExcludeCategories"
                                                        data-plugin-options='{ "placeholder": "Search for a product category..." }'>
                                                    <option value="none">None</option>
                                                    <option value="product1">Bags</option>
                                                    <option value="product2">Shoes</option>
                                                    <option value="product3">Jackets</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center pb-3">
                                            <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Allowed
                                                E-mails</label>
                                            <div class="col-lg-7 col-xl-6">
                                                <input type="text" class="form-control form-control-modern"
                                                       name="couponAllowedEmails" value=""/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="usage-limits" role="tabpanel"
                                         aria-labelledby="usage-limits-tab">
                                        <div class="form-group row align-items-center  pb-3">
                                            <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Usage Limit
                                                Per Coupon</label>
                                            <div class="col-lg-7 col-xl-6">
                                                <input type="text" class="form-control form-control-modern"
                                                       name="couponUsageLimitPerCoupon" value=""
                                                       placeholder="Unlimited Usage"/>
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center  pb-3">
                                            <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Limit Usage
                                                to X Items</label>
                                            <div class="col-lg-7 col-xl-6">
                                                <input type="text" class="form-control form-control-modern"
                                                       name="couponLimitUsageXItems" value=""
                                                       placeholder="Apply to all qualifying items in cart"/>
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Usage Limit
                                                Per User</label>
                                            <div class="col-lg-7 col-xl-6">
                                                <input type="text" class="form-control form-control-modern"
                                                       name="couponUsageLimitPerUser" value=""
                                                       placeholder="Unlimited Usage"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="row action-buttons">
            <div class="col-12 col-md-auto">
                <button type="submit"
                        class="submit-button btn btn-primary btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1"
                        data-loading-text="Loading...">
                    <i class="bx bx-save text-4 me-2"></i> Save Theme
                </button>
            </div>
            <div class="col-12 col-md-auto px-md-0 mt-3 mt-md-0">
                <a href="ecommerce-coupons-list.html"
                   class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">Cancel</a>
            </div>
            <div class="col-12 col-md-auto ms-md-auto mt-3 mt-md-0 ms-auto">
                <a href="#"
                   class="delete-button btn btn-danger btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1">
                    <i class="bx bx-trash text-4 me-2"></i> Delete Theme
                </a>
            </div>
        </div>
    </form>
    <!-- end: page -->
@endsection
@push('specificJs')
    <script src="{{ asset('themes/admin/porto/assets/vendor/jquery-validation/jquery.validate.js') }}"></script>
    <script src="{{ asset('themes/admin/porto/assets/vendor/dropzone/dropzone.js') }}"></script>
    <script src="{{ asset('themes/admin/porto/assets/vendor/pnotify/pnotify.custom.js') }}"></script>
@endpush
@push('examplesJs')
    <script src="{{ asset('themes/admin/porto/assets/js/examples/examples.header.menu.js') }}"></script>
    <script src="{{ asset('themes/admin/porto/assets/js/examples/examples.ecommerce.form.js') }}"></script>
@endpush

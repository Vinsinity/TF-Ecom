@extends('app', ['title' => 'Company Setting'])
@push('stylesheet')
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/dropzone/basic.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/dropzone/dropzone.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/bootstrap-markdown/css/bootstrap-markdown.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/pnotify/pnotify.custom.css') }}" />
@endpush
@section('content')
    <!-- start: page -->
    {{--    // ecommerce-form for jquery upload--}}
    <form class="brand-form action-buttons-fixed" action="" method="post">
        @csrf
        <div class="row">
            <div class="col">
                <section class="card card-modern card-big-info">
                    <div class="card-body">
                        <div class="row">
                            @if(Session::has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ Session::get('success') }}.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true" aria-label="Close"></button>
                                </div>
                            @endif
                            <div class="col-lg-2-5 col-xl-1-5">
                                <i class="card-big-info-icon bx bx-slider"></i>
                                <h2 class="card-big-info-title">Company Descriptions</h2>
                                <p class="card-big-info-desc">Add here the company description with all details and necessary information.</p>
                            </div>
                            <div class="col-lg-3-5 col-xl-4-5">
                                <div class="form-group row align-items-center mb-3">
                                    <label for="company_name" class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Company Name</label>
                                    <div class="col-lg-7 col-xl-6">
                                        <input type="text" class="form-control form-control-modern" id="company_name" name="company_name" value="{{ $settings ? $settings->company_name : '' }}" />
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-3">
                                    <label for="authorized_person" class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Authorized Person</label>
                                    <div class="col-lg-7 col-xl-6">
                                        <input type="text" class="form-control form-control-modern" id="authorized_person" name="authorized_person" value="{{ $settings ? $settings->authorized_person : '' }}" />
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-3">
                                    <label for="company_shortname" class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Company Shortname</label>
                                    <div class="col-lg-7 col-xl-6">
                                        <input type="text" class="form-control form-control-modern" id="company_shortname" name="company_shortname" value="{{ $settings ? $settings->company_shortname : '' }}" />
                                    </div>
                                </div>
                                <hr class="solid opacity-6">
                                <div class="form-group row align-items-center mb-3">
                                    <label for="phone" class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Phone</label>
                                    <div class="col-lg-7 col-xl-6">
                                        <input type="text" class="form-control form-control-modern" id="phone" name="phone" value="{{ $settings ? $settings->phone : '' }}" />
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-3">
                                    <label for="fax" class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Fax</label>
                                    <div class="col-lg-7 col-xl-6">
                                        <input type="text" class="form-control form-control-modern" id="fax" name="fax" value="{{ $settings ? $settings->fax : '' }}" />
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-3">
                                    <label for="gsm" class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">GSM</label>
                                    <div class="col-lg-7 col-xl-6">
                                        <input type="text" class="form-control form-control-modern" id="gsm" name="gsm" value="{{ $settings ? $settings->gsm : '' }}" />
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-3">
                                    <label for="whatsapp" class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Whatsapp</label>
                                    <div class="col-lg-7 col-xl-6">
                                        <input type="text" class="form-control form-control-modern" id="whatsapp" name="whatsapp" value="{{ $settings ? $settings->whatsapp : '' }}" />
                                    </div>
                                </div>
                                <hr class="solid opacity-6">
                                <div class="form-group row align-items-center mb-3">
                                    <label for="company_address" class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Company Address</label>
                                    <div class="col-lg-7 col-xl-6">
                                        <textarea class="form-control form-control-modern" name="company_address" id="company_address" cols="30" rows="3">{{ $settings ? $settings->company_address : '' }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-3">
                                    <label for="city_id" class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">City</label>
                                    <div class="col-lg-7 col-xl-6">
                                        <input type="text" class="form-control form-control-modern" id="city_id" name="city_id" value="{{ $settings ? $settings->city_id : '' }}" />
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-3">
                                    <label for="county_id" class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">County</label>
                                    <div class="col-lg-7 col-xl-6">
                                        <input type="text" class="form-control form-control-modern" id="county_id" name="county_id" value="{{ $settings ? $settings->county_id : ''}}" />
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-3">
                                    <label for="zip_code" class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Zip</label>
                                    <div class="col-lg-7 col-xl-6">
                                        <input type="text" class="form-control form-control-modern" id="zip_code" name="zip_code" value="{{ $settings ? $settings->zip_code : ''}}" />
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-3">
                                    <label for="branch_addresses" class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Branch Addresses</label>
                                    <div class="col-lg-7 col-xl-6">
                                        <textarea class="form-control form-control-modern" name="branch_addresses" id="branch_addresses" cols="30" rows="3">{{ $settings ? $settings->branch_addresses : ''}}</textarea>
                                    </div>
                                </div>
                                <hr class="solid opacity-6">
                                <div class="form-group row align-items-center mb-3">
                                    <label for="tax_county" class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Tax County</label>
                                    <div class="col-lg-7 col-xl-6">
                                        <input type="text" class="form-control form-control-modern" id="tax_county" name="tax_county" value="{{ $settings ? $settings->tax_county : ''}}" />
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-3">
                                    <label for="tax_number" class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Tax Number</label>
                                    <div class="col-lg-7 col-xl-6">
                                        <input type="text" class="form-control form-control-modern" id="tax_number" name="tax_number" value="{{ $settings ? $settings->tax_number : ''}}" />
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
                <button type="submit" class="submit-button btn btn-primary btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1" data-loading-text="Loading...">
                    <i class="bx bx-save text-4 me-2"></i> Save Category
                </button>
            </div>
            <div class="col-12 col-md-auto px-md-0 mt-3 mt-md-0">
                <a href="ecommerce-category-list.html" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">Cancel</a>
            </div>
            <div class="col-12 col-md-auto ms-md-auto mt-3 mt-md-0 ms-auto">
                <a href="#" class="delete-button btn btn-danger btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1">
                    <i class="bx bx-trash text-4 me-2"></i> Delete Category
                </a>
            </div>
        </div>
    </form>
    <!-- end: page -->
@endsection
@push('specificJs')
    <script src="{{ asset('admin/assets/vendor/jquery-validation/jquery.validate.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/dropzone/dropzone.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/pnotify/pnotify.custom.js') }}"></script>
@endpush
@push('examplesJs')
    <script src="{{ asset('admin/assets/js/examples/examples.header.menu.js') }}"></script>
    <script src="{{ asset('admin/assets/js/examples/examples.ecommerce.form.js') }}"></script>
@endpush

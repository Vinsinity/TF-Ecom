@extends('app', ['title' => $payment->name.' Setting'])
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
                        asdasd
                    </div>
                </section>
            </div>
        </div>
        <div class="row action-buttons">
            <div class="col-12 col-md-auto">
                <button type="submit"
                        class="submit-button btn btn-primary btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1"
                        data-loading-text="Loading...">
                    <i class="bx bx-save text-4 me-2"></i> Save {{ $payment->name }}
                </button>
            </div>
            <div class="col-12 col-md-auto px-md-0 mt-3 mt-md-0">
                <a href="ecommerce-coupons-list.html"
                   class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">Cancel</a>
            </div>
{{--            <div class="col-12 col-md-auto ms-md-auto mt-3 mt-md-0 ms-auto">--}}
{{--                <a href="#"--}}
{{--                   class="delete-button btn btn-danger btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1">--}}
{{--                    <i class="bx bx-trash text-4 me-2"></i> Delete Theme--}}
{{--                </a>--}}
{{--            </div>--}}
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

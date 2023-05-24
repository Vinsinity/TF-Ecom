@extends('app', ['title' => 'Product Add'])
@push('stylesheet')
    <link rel="stylesheet" href="{{ asset('themes/admin/porto/assets/vendor/dropzone/basic.css') }}" />
    <link rel="stylesheet" href="{{ asset('themes/admin/porto/assets/vendor/dropzone/dropzone.css') }}" />
    <link rel="stylesheet" href="{{ asset('themes/admin/porto/assets/vendor/bootstrap-markdown/css/bootstrap-markdown.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('themes/admin/porto/assets/vendor/pnotify/pnotify.custom.css') }}" />
    <link rel="stylesheet" href="{{ asset('themes/admin/porto/assets/vendor/jstree/themes/default/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('themes/admin/porto/assets/vendor/select2/css/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('themes/admin/porto/assets/vendor/select2-bootstrap-theme/select2-bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('themes/admin/porto/assets/vendor/bootstrap-multiselect/css/bootstrap-multiselect.css') }}" />
@endpush
@section('content')
@if(Session::has('errors'))
    <div class="card card-modern card-big-info">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="validation-message">
                        <ul style="display: block">
                            @foreach ($errors->all() as $error)
                                <label class="error">{{ $error }}</label>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@livewire('product.product.add-form-component')
@endsection
@push('vendorJs')
<script src="{{ asset('themes/admin/porto/assets/vendor/select2/js/select2.js') }}"></script>
<script src="{{ asset('themes/admin/porto/assets/vendor/ios7-switch/ios7-switch.js') }}"></script>
@endpush
@push('specificJs')
<script src="{{ asset('themes/admin/porto/assets/vendor/jquery-validation/jquery.validate.js') }}"></script>
<script src="{{ asset('themes/admin/porto/assets/vendor/dropzone/dropzone.js') }}"></script>
<script src="{{ asset('themes/admin/porto/assets/vendor/pnotify/pnotify.custom.js') }}"></script>
<script src="{{ asset('themes/admin/porto/assets/vendor/jstree/jstree.js') }}"></script>
@endpush
@push('examplesJs')
<script src="{{ asset('themes/admin/porto/assets/js/examples/examples.header.menu.js') }}"></script>
<script src="{{ asset('themes/admin/porto/assets/js/products/product/betuls.product.form.js') }}"></script>
<script src="{{ asset('themes/admin/porto/assets/js/examples/examples.advanced.form.js') }}"></script>
@endpush

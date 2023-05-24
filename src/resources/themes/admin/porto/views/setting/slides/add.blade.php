@extends('app', ['title' => 'Slide Add'])
@push('stylesheet')
<link rel="stylesheet" href="{{ asset('admin/assets/vendor/dropzone/basic.css') }}" />
<link rel="stylesheet" href="{{ asset('admin/assets/vendor/dropzone/dropzone.css') }}" />
<link rel="stylesheet" href="{{ asset('admin/assets/vendor/bootstrap-markdown/css/bootstrap-markdown.min.css') }}" />
<link rel="stylesheet" href="{{ asset('admin/assets/vendor/pnotify/pnotify.custom.css') }}" />
@endpush
@section('content')
    <!-- start: page -->
{{--    // ecommerce-form for jquery upload--}}
    @livewire('slide.form-component')
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

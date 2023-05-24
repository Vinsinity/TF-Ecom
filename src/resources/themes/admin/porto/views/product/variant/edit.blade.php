@extends('app', ['title' => $variant->name.' Edit'])
@push('stylesheet')
<link rel="stylesheet" href="{{ asset('themes/admin/porto/assets/vendor/dropzone/basic.css') }}" />
<link rel="stylesheet" href="{{ asset('themes/admin/porto/assets/vendor/dropzone/dropzone.css') }}" />
<link rel="stylesheet" href="{{ asset('themes/admin/porto/assets/vendor/bootstrap-markdown/css/bootstrap-markdown.min.css') }}" />
<link rel="stylesheet" href="{{ asset('themes/admin/porto/assets/vendor/pnotify/pnotify.custom.css') }}" />
@endpush
@section('content')
    <!-- start: page -->
    @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('success') }}.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true" aria-label="Close"></button>
        </div>
    @endif
{{--    // ecommerce-form for jquery upload--}}
    <form class="action-buttons-fixed" action="{{ route('admin.variants.edit', ['slug' => $variant->slug]) }}" method="post">
        @csrf
{{--        <div class="row mt-2">--}}
{{--            <div class="col">--}}
{{--                <section class="card card-modern card-big-info">--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-lg-2-5 col-xl-1-5">--}}
{{--                                <i class="card-big-info-icon bx bx-camera"></i>--}}
{{--                                <h2 class="card-big-info-title">Category Image</h2>--}}
{{--                                <p class="card-big-info-desc">Upload your category image</p>--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-3-5 col-xl-4-5">--}}
{{--                                <div class="form-group row align-items-center">--}}
{{--                                    <div class="col">--}}
{{--                                        <div id="dropzone-form-image" class="dropzone-modern dz-square">--}}
{{--                                            <span class="dropzone-upload-message text-center">--}}
{{--                                                <i class="bx bxs-cloud-upload"></i>--}}
{{--                                                <b class="text-color-primary">Drag/Upload</b> your image here.--}}
{{--                                            </span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </section>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="row">
            <div class="col">
                <section class="card card-modern card-big-info">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-2-5 col-xl-1-5">
                                <i class="card-big-info-icon bx bx-slider"></i>
                                <h2 class="card-big-info-title">Category Details</h2>
                                <p class="card-big-info-desc">Add here the category description with all details and necessary information.</p>
                            </div>
                            <div class="col-lg-3-5 col-xl-4-5">
                                <div class="form-group row align-items-center mb-3">
                                    <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Category Name</label>
                                    <div class="col-lg-7 col-xl-6">
                                        <input type="text" class="form-control form-control-modern" name="name" value="{{ $variant->name }}" required />
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-3">
                                    <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0" for="status">Type</label>
                                    <div class="col-lg-7 col-xl-6">
{{--                                        @dd($variant)--}}
                                        <select class="form-control" name="type" id="status">
                                            @foreach($optionTypes as $type)
                                                <option value="{{ $type->id }}" {{ $variant->type->id == $type->id ? 'selected' : '' }}>
                                                    {{ $type->name }}</option>
                                            @endforeach
{{--                                            <option value="2" {{ $variant->type = 2 ? 'selected' : '' }}>İki</option>--}}
                                        </select>
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
                    <i class="bx bx-save text-4 me-2"></i> Save Variant
                </button>
            </div>
            <div class="col-12 col-md-auto px-md-0 mt-3 mt-md-0">
                <a href="{{ url()->previous() }}" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">Cancel</a>
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
<script src="{{ asset('themes/admin/porto/assets/vendor/jquery-validation/jquery.validate.js') }}"></script>
<script src="{{ asset('themes/admin/porto/assets/vendor/dropzone/dropzone.js') }}"></script>
<script src="{{ asset('themes/admin/porto/assets/vendor/pnotify/pnotify.custom.js') }}"></script>
@endpush
@push('examplesJs')
<script src="{{ asset('themes/admin/porto/assets/js/examples/examples.header.menu.js') }}"></script>
<script src="{{ asset('themes/admin/porto/assets/js/examples/examples.ecommerce.form.js') }}"></script>
@endpush

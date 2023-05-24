@extends('app', ['title' => 'Category Add'])
@push('stylesheet')
<link rel="stylesheet" href="{{ asset('themes/admin/porto/assets/vendor/dropzone/basic.css') }}" />
<link rel="stylesheet" href="{{ asset('themes/admin/porto/assets/vendor/dropzone/dropzone.css') }}" />
<link rel="stylesheet" href="{{ asset('themes/admin/porto/assets/vendor/bootstrap-markdown/css/bootstrap-markdown.min.css') }}" />
<link rel="stylesheet" href="{{ asset('themes/admin/porto/assets/vendor/pnotify/pnotify.custom.css') }}" />
@endpush
@section('content')
    <!-- start: page -->
{{--    // ecommerce-form for jquery upload--}}
    @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('success') }}.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true" aria-label="Close"></button>
        </div>
    @endif
    @if(Session::has('errors'))
        <div class="validation-message">
            <ul style="display: block">
                @foreach ($errors->all() as $error)
                    <label class="error">{{ $error }}</label>
                @endforeach
            </ul>
        </div>
    @endif
    <form class="action-buttons-fixed" action="{{ route('admin.categories.subs.add.post',['slug' => $parent]) }}" method="post" enctype="multipart/form-data">
        @csrf
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
                                @isset($parent)
                                    <div class="form-group row align-items-center mb-3">
                                        <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Parent Category</label>
                                        <div class="col-lg-7 col-xl-6">
                                            <input type="hidden" name="parent_id" value="{{ $parent->id }}">
                                            <input type="text" class="form-control form-control-modern" value="{{ $parent->name }}" disabled />
                                        </div>
                                    </div>
                                @endisset
                                <div class="form-group row align-items-center mb-3">
                                    <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Category Name</label>
                                    <div class="col-lg-7 col-xl-6">
                                        <input type="text" class="form-control form-control-modern" name="name" value="" required />
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-3">
                                    <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Image</label>
                                    <div class="col-lg-7 col-xl-6">
                                        <input type="file" class="form-control" name="image">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-3">
                                    <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Status</label>
                                    <div class="col-lg-7 col-xl-6">
                                        <select class="form-control" name="status">
                                            <option value="1" selected>Active</option>
                                            <option value="0">Passive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-3">
                                    <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Order</label>
                                    <div class="col-lg-7 col-xl-6">
                                        <input type="number" class="form-control form-control-modern" name="order" min="0" step="1" value="1" required />
                                    </div>
                                </div>
{{--                                <div class="form-group row align-items-center mb-3">--}}
{{--                                    <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Slug</label>--}}
{{--                                    <div class="col-lg-7 col-xl-6">--}}
{{--                                        <input type="text" class="form-control form-control-modern" name="slug" value="" required />--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="form-group row align-items-center mb-3">--}}
{{--                                    <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Parent Category</label>--}}
{{--                                    <div class="col-lg-7 col-xl-6">--}}
{{--                                        <input type="text" class="form-control form-control-modern" name="categoryParent" value="" />--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="form-group row">--}}
{{--                                    <label class="col-lg-5 col-xl-3 control-label text-lg-end pt-2 mt-1 mb-0">Description</label>--}}
{{--                                    <div class="col-lg-7 col-xl-6">--}}
{{--                                        <textarea class="form-control form-control-modern" name="categoryDescription" rows="6"></textarea>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
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
<script src="{{ asset('themes/admin/porto/assets/vendor/jquery-validation/jquery.validate.js') }}"></script>
<script src="{{ asset('themes/admin/porto/assets/vendor/dropzone/dropzone.js') }}"></script>
<script src="{{ asset('themes/admin/porto/assets/vendor/pnotify/pnotify.custom.js') }}"></script>
@endpush
@push('examplesJs')
<script src="{{ asset('themes/admin/porto/assets/js/examples/examples.header.menu.js') }}"></script>
<script src="{{ asset('themes/admin/porto/assets/js/examples/examples.ecommerce.form.js') }}"></script>
@endpush

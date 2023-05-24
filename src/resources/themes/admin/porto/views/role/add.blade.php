@extends('app', ['title' => 'Role Add'])
@push('stylesheet')
<link rel="stylesheet" href="{{ asset('admin/assets/vendor/dropzone/basic.css') }}" />
<link rel="stylesheet" href="{{ asset('admin/assets/vendor/dropzone/dropzone.css') }}" />
<link rel="stylesheet" href="{{ asset('admin/assets/vendor/bootstrap-markdown/css/bootstrap-markdown.min.css') }}" />
<link rel="stylesheet" href="{{ asset('admin/assets/vendor/pnotify/pnotify.custom.css') }}" />
<link rel="stylesheet" href="{{ asset('themes/admin/porto/assets/vendor/jstree/themes/default/style.css') }}" />
@endpush
@section('content')
    <!-- start: page -->
{{--    // ecommerce-form for jquery upload--}}
    <form class="brand-form action-buttons-fixed" action="{{ route('admin.roles.addPost') }}" method="post">
        @csrf
        <div class="row mt-2">
            <div class="col">
                <section class="card card-modern card-big-info">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-2-5 col-xl-1-5">
                                <i class="card-big-info-icon bx bx-slider"></i>
                                <h2 class="card-big-info-title">Role Details</h2>
                                <p class="card-big-info-desc">Add here the role description with all details and necessary information.</p>
                            </div>
                            <div class="col-lg-3-5 col-xl-4-5">
                                <div class="form-group row align-items-center mb-3">
                                    <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Role Name</label>
                                    <div class="col-lg-7 col-xl-6">
                                        <input type="text" class="form-control form-control-modern" name="name" value="" required />
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-3">
                                    <label for="" class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Role Permissions</label>
                                    <div class="col-lg-7 col-xl-6">
                                        <ul>
                                            @foreach($permissions as $permission)
                                                <li>
                                                    <input type="checkbox" id="{{ $permission->id }}" value="{{ $permission->id }}" name="selectedPermissions[]" />
                                                    {{ $permission->name }}
                                                </li>
                                            @endforeach
                                        </ul>
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
                    <i class="bx bx-save text-4 me-2"></i> Save Role
                </button>
            </div>
            <div class="col-12 col-md-auto px-md-0 mt-3 mt-md-0">
                <a href="{{ url()->previous() }}" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">Cancel</a>
            </div>
{{--            <div class="col-12 col-md-auto ms-md-auto mt-3 mt-md-0 ms-auto">--}}
{{--                <a href="#" class="delete-button btn btn-danger btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1">--}}
{{--                    <i class="bx bx-trash text-4 me-2"></i> Delete Role--}}
{{--                </a>--}}
{{--            </div>--}}
        </div>
    </form>
    <!-- end: page -->
@endsection
@push('specificJs')
<script src="{{ asset('admin/assets/vendor/jquery-validation/jquery.validate.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/dropzone/dropzone.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/pnotify/pnotify.custom.js') }}"></script>
<script src="{{ asset('themes/admin/porto/assets/vendor/jstree/jstree.js') }}"></script>
@endpush
@push('examplesJs')
    <script>
        $('#categoryTree').jstree({
            'core' : {
                'themes' : {
                    'responsive': false
                }
            },
            'types' : {
                'default' : {
                    'icon' : 'fas fa-folder'
                },
                'file' : {
                    'icon' : 'fas fa-file'
                }
            },
            'plugins': ['types', 'checkbox','html_data']
        });
    </script>
<script src="{{ asset('admin/assets/js/examples/examples.header.menu.js') }}"></script>
<script src="{{ asset('admin/assets/js/examples/examples.ecommerce.form.js') }}"></script>
@endpush

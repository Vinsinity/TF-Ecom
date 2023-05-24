@extends('app', ['title' => 'Seo Settings'])
@push('stylesheet')
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/dropzone/basic.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/dropzone/dropzone.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/bootstrap-markdown/css/bootstrap-markdown.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/pnotify/pnotify.custom.css') }}" />
@endpush
@section('content')
    <!-- start: page -->
    {{--    // ecommerce-form for jquery upload--}}
    <form class="brand-form action-buttons-fixed" action="{{ route('admin.settings.seo.store') }}" method="post">
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
                                <h2 class="card-big-info-title">SEO Details</h2>
                                <p class="card-big-info-desc">Add here the SEO description with all details and necessary information.</p>
                            </div>
                            <div class="col-lg-3-5 col-xl-4-5">
                                @if(Session::has('errors'))
                                    <div class="validation-message">
                                        <ul style="display: block">
                                            @foreach ($errors->all() as $error)
                                                <label class="error">{{ $error }}</label>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="form-group row align-items-center mb-3">
                                    <label for="site_title" class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Site Title</label>
                                    <div class="col-lg-7 col-xl-6">
                                        <input type="text" class="form-control form-control-modern" id="title" name="title" value="{{ $settings ? $settings->title : '' }}"  />
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-3">
                                    <label for="site_description" class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Site Description</label>
                                    <div class="col-lg-7 col-xl-6">
{{--                                        <input type="text" class="form-control form-control-modern" id="site_title" name="site_title" value="" required />--}}
                                        <textarea class="form-control form-control-modern" name="description" id="description" cols="30" rows="3" >{{ $settings ? $settings->description : '' }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-3">
                                    <label for="site_keywords" class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Site Keywords</label>
                                    <div class="col-lg-7 col-xl-6">
                                        {{--                                        <input type="text" class="form-control form-control-modern" id="site_title" name="site_title" value="" required />--}}
                                        <textarea class="form-control form-control-modern" name="keywords" id="keywords" cols="30" rows="3" >{{ $settings ? $settings->keywords : '' }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-3">
                                    <label for="site_robots" class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Site Robot File (robots.txt)</label>
                                    <div class="col-lg-7 col-xl-6">
                                        {{--                                        <input type="text" class="form-control form-control-modern" id="site_title" name="site_title" value="" required />--}}
                                        <textarea class="form-control form-control-modern" name="robots" id="robots" cols="30" rows="6">{{ $settings ? $settings->robots : '' }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-3">
                                    <label for="site_sitemap" class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Sitemap</label>
                                    <div class="col-lg-7 col-xl-6">
                                        <input type="text" class="form-control form-control-modern" id="sitemap" name="sitemap" value="{{ $settings ? $settings->sitemap : '' }}" disabled />
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-3">
                                    <label for="site_rss" class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">RSS Feed</label>
                                    <div class="col-lg-7 col-xl-6">
                                        <input type="text" class="form-control form-control-modern" id="rss" name="rss" value="{{ $settings ? $settings->rss : '' }}" disabled />
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-3">
                                    <label for="site_google_verify" class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Google Meta Verify Code</label>
                                    <div class="col-lg-7 col-xl-6">
                                        {{--                                        <input type="text" class="form-control form-control-modern" id="site_title" name="site_title" value="" required />--}}
                                        <textarea class="form-control form-control-modern" name="google_verify" id="google_verify" cols="30" rows="4">{{ $settings ? $settings->google_verify : '' }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-3">
                                    <label for="site_google_verify" class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Facebook Pixel Verify Code</label>
                                    <div class="col-lg-7 col-xl-6">
                                        {{--                                        <input type="text" class="form-control form-control-modern" id="site_title" name="site_title" value="" required />--}}
                                        <textarea class="form-control form-control-modern" name="facebook_verify" id="facebook_verify" cols="30" rows="4">{{ $settings ? $settings->facebook_verify : '' }}</textarea>
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
                    <i class="bx bx-save text-4 me-2"></i> Save Site Seo Settings
                </button>
            </div>
            <div class="col-12 col-md-auto px-md-0 mt-3 mt-md-0">
                <a href="ecommerce-category-list.html" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">Cancel</a>
            </div>
{{--            <div class="col-12 col-md-auto ms-md-auto mt-3 mt-md-0 ms-auto">--}}
{{--                <a href="#" class="delete-button btn btn-danger btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1">--}}
{{--                    <i class="bx bx-trash text-4 me-2"></i> Delete Category--}}
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
@endpush
@push('examplesJs')
    <script src="{{ asset('admin/assets/js/examples/examples.header.menu.js') }}"></script>
    <script src="{{ asset('admin/assets/js/examples/examples.ecommerce.form.js') }}"></script>
@endpush

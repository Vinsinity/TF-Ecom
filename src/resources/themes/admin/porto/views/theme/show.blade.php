@extends('app', ['title' => $theme->name.' Setting'])
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
{{--                                    @dd($settings)--}}
                                    @foreach($theme->settings as $key => $tab)
                                        <a class="nav-link {{ $loop->first ? 'active' : '' }}" id="{{ $key }}-tab" data-bs-toggle="pill"
                                           data-bs-target="#{{ $key }}" role="tab" aria-controls="{{ $key }}"
                                           aria-selected="{{ $loop->first ? 'true' : 'false' }}"><i class="{{ $tab['icon'] }} me-2"></i> {{ ucfirst($key) }}</a>
                                    @endforeach
                                    <a href="" class="nav-link"><i class="bx bx-transfer me-2"></i> Languages</a>
                                </div>
                            </div>
                            <div class="col-lg-3-5 col-xl-4-5">
                                <div class="tab-content" id="tabContent">
                                    @foreach($theme->settings as $key => $tab)
                                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="{{ $key }}" role="tabpanel"
                                             aria-labelledby="{{ $key }}-tab">
                                            @foreach($tab['settings'] as $innerKey => $innerValue)
{{--                                                @dd($innerValue)--}}
                                                <div class="form-group row align-items-center pb-3">
                                                    <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">{{ $innerValue['name'] }}</label>
                                                    <div class="col-lg-7 col-xl-6">
                                                        @if($innerValue['type'] == 'file')
                                                            <input type="file" class="form-control form-control-modern"
                                                                   name="{{ $key }}{{ ucfirst($innerValue['name']) }}" placeholder="No minimum"/>
                                                        @elseif($innerValue['type'] == 'text')
                                                            <input type="text" class="form-control form-control-modern"
                                                                   name="{{ $key }}{{ ucfirst($innerValue['name']) }}" value="{{ $innerValue['path'] ?? '' }}" placeholder="No minimum"/>
                                                        @elseif($innerValue['type'] == 'dragdrop')
                                                            {{ $innerValue['component'] }}
                                                        @endif
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endforeach
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

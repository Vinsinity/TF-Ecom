@extends('app', ['title' => 'Variant'])
@push('title')
    Category
@endpush
@section('content')
    <!-- start: page -->
    <div class="row">
        <div class="col-xs-12 col">
            <div class="card card-modern">
                <div class="card-body">
                    @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ Session::get('success') }}.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true" aria-label="Close"></button>
                        </div>
                    @endif
                    @livewire('product.variant.list-component')
                </div>
            </div>
        </div>
    </div>
    <!-- end: page -->
@endsection
@push('examplesJs')
    <script src="{{ asset('themes/admin/porto/assets/js/examples/examples.modals.js') }}"></script>
@endpush

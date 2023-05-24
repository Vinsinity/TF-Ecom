@extends('app', ['title' => 'Theme List'])
@section('content')
    <!-- start: page -->
    <div class="row">
        <h3 class="title">Admin</h3>
        @foreach($themes['admin'] as $admin)
            <div class="col-3">
                <section class="card card-featured @if($admin['selected']) card-featured-success @endif mb-2">
                    <header class="card-header">
                        <h2 class="card-title">
                            {{ $admin['name'] }}
                        </h2>
                    </header>
                    <div class="card-body">
                        <img src="{{ asset('theme.png') }}" width="100%" alt="">
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('admin.settings.themes.show.admin', ['slug' => $admin['folder_name']]) }}">Theme Setting</a>
                    </div>
                </section>
            </div>
        @endforeach
    </div>
    <hr>
    <div class="row">
        <h3 class="title">Frontend</h3>
        @foreach($themes['frontend'] as $frontend)
            <div class="col-3">
                <section class="card card-featured @if($frontend['selected']) card-featured-success @endif mb-2">
                    <header class="card-header">
                        <h2 class="card-title">{{ $frontend['name'] }}</h2>
                    </header>
                    <div class="card-body">
                        <img src="{{ asset('theme.png') }}" width="100%" alt="">
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('admin.settings.themes.show.frontend', ['slug' => $frontend['folder_name']]) }}">Theme Setting</a>
                    </div>
                </section>
            </div>
        @endforeach
    </div>
    <!-- end: page -->
@endsection

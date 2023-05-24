@extends('app', ['title' => 'Theme List'])
@section('content')
    <!-- start: page -->
    <div class="row">
        @foreach($themes as $themeType)
            <h3 class="title">{{ $themeType->name }}</h3>
            @foreach($themeType->themes as $theme)
                <div class="col-3">
                    <section class="card card-featured @if($theme->default) card-featured-success @endif mb-2">
                        <header class="card-header">
                            <h2 class="card-title">
                                {{ $theme->name }}
                            </h2>
                        </header>
                        <div class="card-body">
                            <img src="{{ asset('theme.png') }}" width="100%" alt="">
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('admin.settings.themes.show', ['slug' => $theme->path]) }}">Theme Setting</a>
                        </div>
                    </section>
                </div>
            @endforeach
            @if(!$loop->last)
                <hr>
            @endif
        @endforeach
    </div>
{{--    <hr>--}}
{{--    <div class="row">--}}
{{--        <h3 class="title">Frontend</h3>--}}
{{--        <div class="col-3">--}}
{{--            <section class="card card-featured @if($frontend['selected']) card-featured-success @endif mb-2">--}}
{{--                <header class="card-header">--}}
{{--                    <h2 class="card-title">{{ $frontend['name'] }}</h2>--}}
{{--                </header>--}}
{{--                <div class="card-body">--}}
{{--                    <img src="{{ asset('theme.png') }}" width="100%" alt="">--}}
{{--                </div>--}}
{{--                <div class="card-footer">--}}
{{--                    <a href="{{ route('admin.settings.themes.show.frontend', ['slug' => $frontend['folder_name']]) }}">Theme Setting</a>--}}
{{--                </div>--}}
{{--            </section>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- end: page -->
@endsection

@extends('app', ['title' => 'Languages'])
@section('content')
{{--    <div class="tabs">--}}
{{--        <ul class="nav nav-tabs tabs-primary justify-content-end">--}}
{{--            <li class="nav-item active">--}}
{{--                <a class="nav-link" data-bs-target="#admin" href="#admin" data-bs-toggle="tab"><i class="fas fa-star"></i> Admin</a>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" data-bs-target="#frontend" href="#frontend" data-bs-toggle="tab">Frontend</a>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--        <div class="tab-content">--}}
{{--            <div id="admin" class="tab-pane active">--}}
{{--                <div class="tabs-modern row" style="min-height: 490px;">--}}
{{--                    <div class="col-lg-2-5 col-xl-1-5">--}}
{{--                        <div class="nav flex-column" id="tab" role="tablist" aria-orientation="vertical">--}}
{{--                            <a class="nav-link active" id="general-tab" data-bs-toggle="pill" data-bs-target="#general" href="#general" role="tab" aria-controls="general" aria-selected="true"><i class="bx bx-cog me-2"></i> Default</a>--}}
{{--                            <a class="nav-link" id="usage-restriction-tab" data-bs-toggle="pill" data-bs-target="#usage-restriction" href="#usage-restriction" role="tab" aria-controls="usage-restriction" aria-selected="false"><i class="bx bx-block me-2"></i> Porto</a>--}}
{{--                            <a class="nav-link" id="usage-limits-tab" data-bs-toggle="pill" data-bs-target="#usage-limits" href="#usage-limits" role="tab" aria-controls="usage-limits" aria-selected="false"><i class="bx bx-timer me-2"></i> Test</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-lg-3-5 col-xl-4-5">--}}
{{--                        <div class="tab-content" id="tabContent">--}}
{{--                            <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">--}}
{{--                                <table class="table table-sm ">--}}
{{--                                    <thead>--}}
{{--                                    <tr>--}}
{{--                                        <th scope="col">Key</th>--}}
{{--                                        <th scope="col">EN</th>--}}
{{--                                        <th scope="col">TR</th>--}}
{{--                                    </tr>--}}
{{--                                    </thead>--}}
{{--                                    <tbody>--}}
{{--                                    <tr>--}}
{{--                                        <th>welcome</th>--}}
{{--                                        <td>--}}
{{--                                            <input type="text" value="welcome">--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            <input type="text" value="hoşgeldiniz">--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <th>register</th>--}}
{{--                                        <td>--}}
{{--                                            <input type="text" value="register">--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            <input type="text" value="kayıt ol">--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <th>login</th>--}}
{{--                                        <td>--}}
{{--                                            <input type="text" value="login">--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            <input type="text" value="giriş yap">--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                            </div>--}}
{{--                            <div class="tab-pane fade" id="usage-restriction" role="tabpanel" aria-labelledby="usage-restriction-tab">--}}
{{--                                <table class="table table-sm ">--}}
{{--                                    <thead>--}}
{{--                                    <tr>--}}
{{--                                        <th scope="col">Key</th>--}}
{{--                                        <th scope="col">EN</th>--}}
{{--                                        <th scope="col">TR</th>--}}
{{--                                    </tr>--}}
{{--                                    </thead>--}}
{{--                                    <tbody>--}}
{{--                                    <tr>--}}
{{--                                        <th>welcome</th>--}}
{{--                                        <td>--}}
{{--                                            <input type="text" value="welcome">--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            <input type="text" value="hoşgeldiniz">--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <th>register</th>--}}
{{--                                        <td>--}}
{{--                                            <input type="text" value="register">--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            <input type="text" value="kayıt ol">--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <th>login</th>--}}
{{--                                        <td>--}}
{{--                                            <input type="text" value="login">--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            <input type="text" value="giriş yap">--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                            </div>--}}
{{--                            <div class="tab-pane fade" id="usage-limits" role="tabpanel" aria-labelledby="usage-limits-tab">--}}
{{--                                <table class="table table-sm ">--}}
{{--                                    <thead>--}}
{{--                                    <tr>--}}
{{--                                        <th scope="col">Key</th>--}}
{{--                                        <th scope="col">EN</th>--}}
{{--                                        <th scope="col">TR</th>--}}
{{--                                    </tr>--}}
{{--                                    </thead>--}}
{{--                                    <tbody>--}}
{{--                                    <tr>--}}
{{--                                        <th>welcome</th>--}}
{{--                                        <td>--}}
{{--                                            <input type="text" value="welcome">--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            <input type="text" value="hoşgeldiniz">--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <th>register</th>--}}
{{--                                        <td>--}}
{{--                                            <input type="text" value="register">--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            <input type="text" value="kayıt ol">--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <th>login</th>--}}
{{--                                        <td>--}}
{{--                                            <input type="text" value="login">--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            <input type="text" value="giriş yap">--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div id="frontend" class="tab-pane">--}}
{{--                <div class="tabs-modern row" style="min-height: 490px;">--}}
{{--                    <div class="col-lg-2-5 col-xl-1-5">--}}
{{--                        <div class="nav flex-column" id="tab" role="tablist" aria-orientation="vertical">--}}
{{--                            <a class="nav-link active" id="general-tab" data-bs-toggle="pill" data-bs-target="#general" href="#general" role="tab" aria-controls="general" aria-selected="true"><i class="bx bx-cog me-2"></i> Default</a>--}}
{{--                            <a class="nav-link" id="usage-restriction-tab" data-bs-toggle="pill" data-bs-target="#usage-restriction" href="#usage-restriction" role="tab" aria-controls="usage-restriction" aria-selected="false"><i class="bx bx-block me-2"></i> Molla</a>--}}
{{--                            <a class="nav-link" id="usage-limits-tab" data-bs-toggle="pill" data-bs-target="#usage-limits" href="#usage-limits" role="tab" aria-controls="usage-limits" aria-selected="false"><i class="bx bx-timer me-2"></i> Test</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-lg-3-5 col-xl-4-5">--}}
{{--                        <div class="tab-content" id="tabContent">--}}
{{--                            <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">--}}
{{--                                <table class="table table-sm ">--}}
{{--                                    <thead>--}}
{{--                                    <tr>--}}
{{--                                        <th scope="col">Key</th>--}}
{{--                                        <th scope="col">EN</th>--}}
{{--                                        <th scope="col">TR</th>--}}
{{--                                    </tr>--}}
{{--                                    </thead>--}}
{{--                                    <tbody>--}}
{{--                                    <tr>--}}
{{--                                        <th>welcome</th>--}}
{{--                                        <td>--}}
{{--                                            <input type="text" value="welcome">--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            <input type="text" value="hoşgeldiniz">--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <th>register</th>--}}
{{--                                        <td>--}}
{{--                                            <input type="text" value="register">--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            <input type="text" value="kayıt ol">--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <th>login</th>--}}
{{--                                        <td>--}}
{{--                                            <input type="text" value="login">--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            <input type="text" value="giriş yap">--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                            </div>--}}
{{--                            <div class="tab-pane fade" id="usage-restriction" role="tabpanel" aria-labelledby="usage-restriction-tab">--}}
{{--                                <table class="table table-sm ">--}}
{{--                                    <thead>--}}
{{--                                    <tr>--}}
{{--                                        <th scope="col">Key</th>--}}
{{--                                        <th scope="col">EN</th>--}}
{{--                                        <th scope="col">TR</th>--}}
{{--                                    </tr>--}}
{{--                                    </thead>--}}
{{--                                    <tbody>--}}
{{--                                    <tr>--}}
{{--                                        <th>welcome</th>--}}
{{--                                        <td>--}}
{{--                                            <input type="text" value="welcome">--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            <input type="text" value="hoşgeldiniz">--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <th>register</th>--}}
{{--                                        <td>--}}
{{--                                            <input type="text" value="register">--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            <input type="text" value="kayıt ol">--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <th>login</th>--}}
{{--                                        <td>--}}
{{--                                            <input type="text" value="login">--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            <input type="text" value="giriş yap">--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                            </div>--}}
{{--                            <div class="tab-pane fade" id="usage-limits" role="tabpanel" aria-labelledby="usage-limits-tab">--}}
{{--                                <table class="table table-sm ">--}}
{{--                                    <thead>--}}
{{--                                    <tr>--}}
{{--                                        <th scope="col">Key</th>--}}
{{--                                        <th scope="col">EN</th>--}}
{{--                                        <th scope="col">TR</th>--}}
{{--                                    </tr>--}}
{{--                                    </thead>--}}
{{--                                    <tbody>--}}
{{--                                    <tr>--}}
{{--                                        <th>welcome</th>--}}
{{--                                        <td>--}}
{{--                                            <input type="text" value="welcome">--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            <input type="text" value="hoşgeldiniz">--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <th>register</th>--}}
{{--                                        <td>--}}
{{--                                            <input type="text" value="register">--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            <input type="text" value="kayıt ol">--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <th>login</th>--}}
{{--                                        <td>--}}
{{--                                            <input type="text" value="login">--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            <input type="text" value="giriş yap">--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
<div class="tabs">
    <ul class="nav nav-tabs tabs-primary justify-content-end">
        <li class="nav-item active">
            <a class="nav-link" data-bs-target="#admin" href="#admin" data-bs-toggle="tab"><i class="fas fa-star"></i> Admin</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-target="#frontend" href="#frontend" data-bs-toggle="tab">Frontend</a>
        </li>
    </ul>
    <div class="tab-content p-0">
        <div id="admin" class="tab-pane active">
            <section class="card card-modern card-big-info">
                <div class="card-body">
                    <div class="tabs-modern row" style="min-height: 490px;">
                        <div class="col-lg-2-5 col-xl-1-5">
                            <div class="nav flex-column" id="tab" role="tablist" aria-orientation="vertical">
                                @foreach($array['admin'] as $key => $item)
                                    <a class="nav-link{{ $key == 'default' ? ' active' : '' }}" id="admin-{{ $key }}-tab" data-bs-toggle="pill" data-bs-target="#admin-{{ $key }}" href="#admin-{{ $key }}" role="tab" aria-controls="admin-{{ $key }}" aria-selected="{{ $key == 'default' ? 'true' : 'false' }}"><i class="bx bx-cog me-2"></i> {{ ucfirst($key) }}</a>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-3-5 col-xl-4-5 p-3">
                            <div class="tab-content p-0" id="tabContent">
                                @foreach($array['admin'] as $key => $item)
                                    {{--                            @dd($item,$key)--}}
                                    <div class="tab-pane fade{{ $key == 'default' ? ' show active' : '' }}" id="admin-{{ $key }}" role="tabpanel" aria-labelledby="admin-{{ $key }}-tab">
                                        <table class="table table-sm">
                                            <thead>
                                            <tr>
                                                <th scope="col">Key</th>
                                                @foreach($item as $langKey => $language)
                                                    <th scope="col">{{ strtoupper($langKey) }}</th>
                                                @endforeach
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($item['en'] as $subKey => $value)
                                                <tr>
                                                    <th class="bg-primary text-white" colspan="{{ count($item) + 1 }}">
                                                        <h3>{{ ucfirst($subKey) }}</h3>
                                                    </th>
                                                </tr>
                                                @foreach($value as $transKey => $transValue)
                                                    @if(is_array($transValue))
                                                        <tr>
                                                            <th class="bg-secondary text-white" colspan="{{ count($item) + 1 }}">
                                                                <h4>{{ ucfirst($transKey) }}</h4>
                                                            </th>
                                                        </tr>
                                                        @foreach($transValue as $staticKey => $staticValue)
                                                            @if(is_array($staticValue))
                                                                <tr>
                                                                    <th colspan="{{ count($item) + 1 }}">
                                                                        <h5>{{ ucfirst($staticKey) }}</h5>
                                                                    </th>
                                                                </tr>
                                                                @foreach($staticValue as $altKey => $altValue)
                                                                    <tr>
                                                                        <th class="align-middle">{{ $altKey }}</th>
                                                                        <td>
                                                                            <input class="form-control" type="text" value="{{ $altValue }}">
                                                                        </td>
                                                                        <td>
                                                                            <input class="form-control" type="text" value="{{ $item['tr'][$subKey][$transKey][$staticKey][$altKey] }}">
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @else
                                                                <tr>
                                                                    <th class="align-middle">{{ $staticKey }}</th>
                                                                    <td>
                                                                        <input class="form-control" type="text" value="{{ $staticValue }}">
                                                                    </td>
                                                                    <td>
                                                                        <input class="form-control" type="text" value="{{ $item['tr'][$subKey][$transKey][$staticKey] }}">
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <th class="align-middle">{{ $transKey }}</th>
                                                            <td>
                                                                <input class="form-control" type="text" value="{{ $transValue }}">
                                                            </td>
                                                            <td>
                                                                <input class="form-control" type="text" value="{{ $item['tr'][$subKey][$transKey] }}">
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div id="frontend" class="tab-pane">
            <section class="card card-modern card-big-info">
                <div class="card-body">
                    <div class="tabs-modern row" style="min-height: 490px;">
                        <div class="col-lg-2-5 col-xl-1-5">
                            <div class="nav flex-column" id="tab" role="tablist" aria-orientation="vertical">
                                @foreach($array['frontend'] as $key => $item)
                                    <a class="nav-link{{ $key == 'default' ? ' active' : '' }}" id="frontend-{{ $key }}-tab" data-bs-toggle="pill" data-bs-target="#frontend-{{ $key }}" href="#frontend-{{ $key }}" role="tab" aria-controls="frontend-{{ $key }}" aria-selected="{{ $key == 'default' ? 'true' : 'false' }}"><i class="bx bx-cog me-2"></i> {{ ucfirst($key) }}</a>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-3-5 col-xl-4-5 p-3">
                            <div class="tab-content p-0" id="tabContent">
                                @foreach($array['frontend'] as $key => $item)
                                    <div class="tab-pane fade{{ $key == 'default' ? ' show active' : '' }}" id="frontend-{{ $key }}" role="tabpanel" aria-labelledby="frontend-{{ $key }}-tab">
                                        <table class="table table-sm">
                                            <thead>
                                            <tr>
                                                <th scope="col">Key</th>
                                                @foreach($item as $langKey => $language)
                                                    <th scope="col">{{ strtoupper($langKey) }}</th>
                                                @endforeach
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($item['en'] as $subKey => $value)
                                                <tr>
                                                    <th class="bg-primary text-white" colspan="{{ count($item) + 1 }}">
                                                        <h3>{{ ucfirst($subKey) }}</h3>
                                                    </th>
                                                </tr>
                                                @foreach($value as $transKey => $transValue)
                                                    @if(is_array($transValue))
                                                        <tr>
                                                            <th class="bg-secondary text-white" colspan="{{ count($item) + 1 }}">
                                                                <h4>{{ ucfirst($transKey) }}</h4>
                                                            </th>
                                                        </tr>
                                                        @foreach($transValue as $staticKey => $staticValue)
                                                            @if(is_array($staticValue))
                                                                <tr>
                                                                    <th colspan="{{ count($item) + 1 }}">
                                                                        <h5>{{ ucfirst($staticKey) }}</h5>
                                                                    </th>
                                                                </tr>
                                                                @foreach($staticValue as $altKey => $altValue)
                                                                    <tr>
                                                                        <th class="align-middle">{{ $altKey }}</th>
                                                                        <td>
                                                                            <input class="form-control" type="text" value="{{ $altValue }}">
                                                                        </td>
                                                                        <td>
                                                                            <input class="form-control" type="text" value="{{ $item['tr'][$subKey][$transKey][$staticKey][$altKey] }}">
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @else
                                                                <tr>
                                                                    <th class="align-middle">{{ $staticKey }}</th>
                                                                    <td>
                                                                        <input class="form-control" type="text" value="{{ $staticValue }}">
                                                                    </td>
                                                                    <td>
                                                                        <input class="form-control" type="text" value="{{ $item['tr'][$subKey][$transKey][$staticKey] }}">
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <th class="align-middle">{{ $transKey }}</th>
                                                            <td>
                                                                <input class="form-control" type="text" value="{{ $transValue }}">
                                                            </td>
                                                            <td>
                                                                <input class="form-control" type="text" value="{{ $item['tr'][$subKey][$transKey] }}">
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

</div>
@endsection

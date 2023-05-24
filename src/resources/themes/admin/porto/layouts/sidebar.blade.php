<!-- start: sidebar -->
<aside id="sidebar-left" class="sidebar-left">

    <div class="sidebar-header">
        <div class="sidebar-toggle d-none d-md-flex" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
            <i class="fas fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>

    <div class="nano">
        <div class="nano-content">
            <nav id="menu" class="nav-main" role="navigation">

                <ul class="nav nav-main">
                    <li class="{{ request()->routeIs('admin.dashboard.index') ? 'nav-active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.dashboard.index') }}">
                            <i class="bx bx-home-alt" aria-hidden="true"></i>
                            <span>@lang('dashboard.static.dashboard')</span>
                        </a>
                    </li>
                    <li class="nav-group-label">Orders</li>
                    <li class="{{ request()->routeIs('admin.orders.*') ? 'nav-active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.orders.list') }}">
                            <i class="bx bx-category-alt" aria-hidden="true"></i>
                            <span>@lang('dashboard.static.orders')</span>
                        </a>
                    </li>
                    <li class="">
                        <a class="nav-link" href="">
                            <i class="bx bx-category-alt" aria-hidden="true"></i>
                            <span>Payment Errors</span>
                        </a>
                    </li>
                    <li class="nav-group-label">@lang('dashboard.static.products')</li>
                    <li class="{{ request()->routeIs('admin.products.*') ? 'nav-active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.products.list') }}">
                            <i class="bx bx-unite" aria-hidden="true"></i>
                            <span>@lang('dashboard.static.products')</span>
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('admin.categories.*') ? 'nav-active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.categories.list') }}">
                            <i class="bx bx-category-alt" aria-hidden="true"></i>
                            <span>@lang('dashboard.static.categories')</span>
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('admin.brands.*') ? 'nav-active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.brands.list') }}">
                            <i class="bx bxs-component" aria-hidden="true"></i>
                            <span>@lang('dashboard.static.brands')</span>
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('admin.variants.*') ? 'nav-active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.variants.list') }}">
                            <i class="bx bx-unite" aria-hidden="true"></i>
                            <span>@lang('dashboard.static.variants')</span>
                        </a>
                    </li>
                    <li class="">
                        <a class="nav-link" href="">
                            <i class="bx bxs-star-half" aria-hidden="true"></i>
                            <span>@lang('dashboard.static.reviews')</span>
                        </a>
                    </li>
                    @role('owner')
                    <li class="nav-group-label">@lang('dashboard.static.users')</li>
                    <li class="nav-parent {{ request()->routeIs('admin.users.*')
                                                 || request()->routeIs('admin.admins.*')
                                                 || request()->routeIs('admin.roles.*')
                                                 || request()->routeIs('admin.permissions.*') ? 'nav-expanded' : '' }}">
                        <a class="nav-link" href="#">
                            <i class="bx bx-unite" aria-hidden="true"></i>
                            <span>@lang('dashboard.static.users')</span>
                        </a>
                        <ul class="nav nav-children">
                            <li class="{{ request()->routeIs('admin.users.*') ? 'nav-active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.users.list') }}">
                                    - @lang('dashboard.static.users')
                                </a>
                            </li>
                            <li class="{{ request()->routeIs('admin.admins.*') ? 'nav-active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.admins.list') }}">
                                    - @lang('dashboard.static.admins')
                                </a>
                            </li>
                            <li class="{{ request()->routeIs('admin.roles.*') ? 'nav-active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.roles.list') }}">
                                    - Roller
                                </a>
                            </li>
                            <li class="{{ request()->routeIs('admin.permissions.*') ? 'nav-active' : '' }}">
                                <a class="nav-link " href="{{ route('admin.permissions.list') }}">
                                    - Yetkiler
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endrole
                    <li class="{{ request()->routeIs('admin.users.*') ? 'nav-active' : '' }}">
                        <a class="nav-link" href="">
                            <i class="bx bx-envelope" aria-hidden="true"></i>
                            <span>@lang('dashboard.static.bulk_mail')</span>
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('admin.users.*') ? 'nav-active' : '' }}">
                        <a class="nav-link" href="">
                            <i class="bx bx-podcast" aria-hidden="true"></i>
                            <span>@lang('dashboard.static.advices')</span>
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('admin.users.*') ? 'nav-active' : '' }}">
                        <a class="nav-link" href="">
                            <i class="bx bx-cabinet" aria-hidden="true"></i>
                            <span>@lang('dashboard.static.newsletter')</span>
                        </a>
                    </li>
                    <li class="nav-group-label">@lang('dashboard.static.campaign')</li>
                    <li class="nav-parent {{ request()->routeIs('admin.campaigns.*') && !request()->routeIs('admin.campaigns.code.*') ? 'nav-expanded' : '' }}">
                        <a class="nav-link" href="#">
                            <i class="bx bxs-discount" aria-hidden="true"></i>
                            <span>@lang('dashboard.static.campaign')</span>
                        </a>
                        <ul class="nav nav-children">
                            <li class="{{ request()->routeIs('admin.campaigns.product.*') ? 'nav-active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.campaigns.product.list') }}">
                                    - Product Campaign
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="">
                                    - Cart Campaign
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="">
                                    - Category Campaign
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="">
                                    - Brand Campaign
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="{{ request()->routeIs('admin.campaigns.code.*') ? 'nav-active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.campaigns.code.list') }}">
                            <i class="bx bx-code-block" aria-hidden="true"></i>
                            <span>@lang('dashboard.static.campaign_code')</span>
                        </a>
                    </li>
                    <li class="">
                        <a class="nav-link" href="{{ route('admin.campaigns.code.list') }}">
                            <i class="bx bxs-package" aria-hidden="true"></i>
                            <span>@lang('dashboard.static.cargo_campaign')</span>
                        </a>
                    </li>
                    <li class="nav-group-label">@lang('dashboard.static.integrations')</li>
                    <li class="nav-parent">
                        <a class="nav-link" href="#">
                            <i class="bx bx-export" aria-hidden="true"></i>
                            <span>@lang('dashboard.static.export_import')</span>
                        </a>
                        <ul class="nav nav-children">
                            <li class="">
                                <a class="nav-link" href="">
                                    - Excel Export/Import
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="">
                                    - XML Export/Import
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-parent">
                        <a class="nav-link" href="#">
                            <i class="bx bxs-store-alt" aria-hidden="true"></i>
                            <span>@lang('dashboard.static.marketplaces')</span>
                        </a>
                        <ul class="nav nav-children">
                            <li class="">
                                <a class="nav-link" href="">
                                    - N11
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="">
                                    - Hepsiburada
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="">
                                    - Trendyol
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-parent">
                        <a class="nav-link" href="#">
                            <i class="bx bxs-spreadsheet" aria-hidden="true"></i>
                            <span>@lang('dashboard.static.e_invoices')</span>
                        </a>
                        <ul class="nav nav-children">
                            <li class="">
                                <a class="nav-link" href="">
                                    - Parasut
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="">
                                    - BizimHesap
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="">
                                    - BirFatura
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-group-label">@lang('dashboard.static.statics')</li>
                    <li class="">
                        <a class="nav-link" href="">
                            <i class="bx bxs-report" aria-hidden="true"></i>
                            <span>@lang('dashboard.static.sales_reports')</span>
                        </a>
                    </li>
                    <li class="">
                        <a class="nav-link" href="">
                            <i class="bx bxs-bar-chart-alt-2" aria-hidden="true"></i>
                            <span>@lang('dashboard.static.products_reports')</span>
                        </a>
                    </li>
                    <li class="">
                        <a class="nav-link" href="">
                            <i class="bx bxs-user-detail" aria-hidden="true"></i>
                            <span>@lang('dashboard.static.users_reports')</span>
                        </a>
                    </li>
                    <li class="nav-group-label">@lang('dashboard.static.drop_shipping')</li>
                    <li class="disabled">
                        <a class="nav-link disabled" href="">
                            <i class="bx bx-dumbbell" aria-hidden="true"></i>
                            <span>@lang('dashboard.static.coming_soon')</span>
                        </a>
                    </li>
                    @role('owner')
                    <li class="nav-group-label">@lang('dashboard.static.contents')</li>
                    <li class="{{ request()->routeIs('admin.pages.list') ? 'nav-active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.pages.list') }}">
                            <i class="bx bx-book-content" aria-hidden="true"></i>
                            <span>@lang('dashboard.static.pages')</span>
                        </a>
                    </li>
                    <li class="">
                        <a class="nav-link" href="">
                            <i class="bx bxl-blogger" aria-hidden="true"></i>
                            <span>@lang('dashboard.static.blogs')</span>
                        </a>
                    </li>
                    <li class="">
                        <a class="nav-link" href="">
                            <i class="bx bx-film" aria-hidden="true"></i>
                            <span>@lang('dashboard.static.graphics')</span>
                        </a>
                    </li>
                    <li class="">
                        <a class="nav-link" href="">
                            <i class="bx bx-receipt" aria-hidden="true"></i>
                            <span>@lang('dashboard.static.ads')</span>
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('admin.settings.slide.*')  ? 'nav-active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.settings.slide.list') }}">
                            <i class="bx bx-slideshow" aria-hidden="true"></i>
                            <span>@lang('dashboard.static.slides')</span>
                        </a>
                    </li>
                    <li class="nav-group-label">@lang('dashboard.static.settings')</li>
                    <li class="{{ request()->routeIs('admin.settings.company.*') || request()->routeIs('admin.settings.company')  ? 'nav-active' : '' }}">
                        <a class="nav-link" href="{{route('admin.settings.company')}}">
                            <i class="bx bx-building" aria-hidden="true"></i>
                            <span>@lang('dashboard.static.company_description')</span>
                        </a>
                    </li>
{{--                    <li class="{{ request()->routeIs('admin.payment.*') ? 'nav-active' : '' }}">--}}
{{--                        <a class="nav-link" href="{{route('admin.payment.methods.list')}}">--}}
{{--                            <i class="bx bxs-magic-wand" aria-hidden="true"></i>--}}
{{--                            <span>@lang('dashboard.static.payment_settings')</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}

                    <li class="nav-parent {{ request()->routeIs('admin.payment.*') ? 'nav-expanded' : '' }}">
                        <a class="nav-link" href="#">
                            <i class="bx bxs-wallet" aria-hidden="true"></i>
                            <span>@lang('dashboard.static.payment_settings')</span>
                        </a>
                        <ul class="nav nav-children">
                            <li class="{{ request()->routeIs('admin.payment.types.list') ? 'nav-active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.payment.types.list') }}">
                                    - @lang('dashboard.static.payment_types')
                                </a>
                            </li>
                            @foreach($payment_types as $payment_type)
{{--                                <li class="{{ request()->routeIs('admin.payment.types.show', ['slug' => $payment_type]) ? 'nav-active' : '' }}">
                                <li class="{{ request()->routeIs('admin.payment.types.method.list', ['slug' => $payment_type->slug]) ? 'nav-active' : '' }}">--}}
                                <li class="{{ Route::currentRouteNamed('admin.payment.types.method.list') && request()->route('slug') == $payment_type->slug ? 'nav-active' : '' }}">
                                    <a class="nav-link" href="{{ route('admin.payment.types.method.list', ['slug' => $payment_type]) }}">
                                        - {{ $payment_type->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="{{ request()->routeIs('admin.settings.themes.*') ? 'nav-active' : '' }}">
                        <a class="nav-link" href="{{route('admin.settings.themes.list')}}">
                            <i class="bx bxs-magic-wand" aria-hidden="true"></i>
                            <span>@lang('dashboard.static.themes')</span>
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('admin.settings.languages.*') ? 'nav-active' : '' }}">
                        <a class="nav-link" href="{{route('admin.settings.languages.list')}}">
                            <i class="bx bxs-magic-wand" aria-hidden="true"></i>
                            <span>@lang('dashboard.static.languages')</span>
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('admin.settings.currencies.*') ? 'nav-active' : '' }}">
                        <a class="nav-link" href="{{route('admin.settings.currencies.list')}}">
                            <i class="bx bx-money"></i>
                            <span>@lang('dashboard.static.currencies')</span>
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('admin.settings.cargo.*') ? 'nav-active' : '' }}">
                        <a class="nav-link" href="{{route('admin.settings.cargo.list')}}">
                            <i class="bx bxs-truck" aria-hidden="true"></i>
                            <span>@lang('dashboard.static.cargos')</span>
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('admin.settings.seo.*') || request()->routeIs('admin.settings.seo') ? 'nav-active' : '' }}">
                        <a class="nav-link" href="{{route('admin.settings.seo')}}">
                            <i class="bx bx-space-bar" aria-hidden="true"></i>
                            <span>@lang('dashboard.static.seo')</span>
                        </a>
                    </li>
                    @endrole
                </ul>
            </nav>

{{--            <hr class="separator" />--}}

{{--            <div class="sidebar-widget widget-tasks">--}}
{{--                <div class="widget-header">--}}
{{--                    <h6>Projects</h6>--}}
{{--                </div>--}}
{{--                <div class="widget-content">--}}
{{--                    <ul class="list-unstyled m-0">--}}
{{--                        <li><a href="#">Porto HTML5 Template</a></li>--}}
{{--                        <li><a href="#">Tucson Template</a></li>--}}
{{--                        <li><a href="#">Porto Admin</a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}

        </div>

        <script>
            // Maintain Scroll Position
            if (typeof localStorage !== 'undefined') {
                if (localStorage.getItem('sidebar-left-position') !== null) {
                    var initialPosition = localStorage.getItem('sidebar-left-position'),
                        sidebarLeft = document.querySelector('#sidebar-left .nano-content');

                    sidebarLeft.scrollTop = initialPosition;
                }
            }
        </script>

    </div>

</aside>
<!-- end: sidebar -->

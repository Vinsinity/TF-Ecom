<aside class="col-md-4 col-lg-3">
    <ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('account.index') ? 'active' : '' }}" href="{{ route('account.index') }}">Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('account.orders.*') ? 'active' : '' }}" href="{{ route('account.orders.index') }}">Orders</a>
        </li>
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" href="">Downloads</a>--}}
{{--        </li>--}}
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('account.addresses.*') ? 'active' : '' }}" href="{{ route('account.addresses.list') }}">Adresses</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('account.profile.*') ? 'active' : '' }}" href="">Account Details</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">Sign Out</a>
        </li>
    </ul>
</aside><!-- End .col-lg-3 -->

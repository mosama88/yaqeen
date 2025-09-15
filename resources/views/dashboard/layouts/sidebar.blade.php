<nav id="sidebar" class="sidebar-wrapper sidebar-dark">
    <div class="sidebar-content" data-simplebar style="height: calc(100% - 60px);">
        <div class="sidebar-brand">
            <a href="index.html">
                <img src="{{ asset('dashboard') }}/assets/images/logo-dark.png" height="24" class="logo-light-mode"
                    alt="">
                <img src="{{ asset('dashboard') }}/assets/images/logo-light.png" height="24" class="logo-dark-mode"
                    alt="">
                <span class="sidebar-colored">
                    <img src="{{ asset('dashboard') }}/assets/images/logo-light.png" height="24" alt="">
                </span>
            </a>
        </div>

        <ul class="sidebar-menu">
            <li>
                <a href="{{ route('dashboard.index') }}"><i class="fa-solid fa-house me-2"></i>لوحة التحكم</a>
            </li>


            <li
                class="sidebar-dropdown {{ request()->is('dashboard/admin-panel-settings*') ||
                request()->is('dashboard/treasuries*') ||
                request()->is('dashboard/salesMatrialType*') ||
                request()->is('dashboard/stores*') ||
                request()->is('dashboard/invUnits*') ||
                request()->is('dashboard/invItemCategory*')
                    ? 'active'
                    : '' }}">
                <a href="javascript:void(0)">
                    <i class="fa-solid fa-sliders me-2"></i>الأعدادات العامة
                </a>
                <div
                    class="sidebar-submenu {{ request()->is('dashboard/admin-panel-settings*') ||
                    request()->is('dashboard/treasuries*') ||
                    request()->is('dashboard/salesMatrialType*') ||
                    request()->is('dashboard/stores*') ||
                    request()->is('dashboard/invUnits*') ||
                    request()->is('dashboard/invItemCategory*')
                        ? 'active d-block'
                        : '' }}">
                    <ul>
                        <li><a href="{{ route('dashboard.admin-panel-settings.index') }}">إعدادات الشركة</a></li>
                        <li><a href="{{ route('dashboard.treasuries.index') }}">بيانات الخزن</a></li>
                        <li><a href="{{ route('dashboard.salesMatrialType.index') }}">بيانات فئات الفواتير</a></li>
                        <li class="@yield('active-stores')">
                            <a href="{{ route('dashboard.stores.index') }}">بيانات المخازن</a>
                        </li>
                        <li><a href="{{ route('dashboard.invUnits.index') }}">بيانات الوحدة</a></li>
                        <li><a href="{{ route('dashboard.invItemCategory.index') }}">فئات الأصناف</a></li>
                    </ul>
                </div>
            </li>


        </ul>
        <!-- sidebar-menu  -->
    </div>
    <!-- Sidebar Footer -->
    <ul class="sidebar-footer list-unstyled mb-0">
        <li class="list-inline-item mb-0">
            <a href="https://1.envato.market/landrick" target="_blank" class="btn btn-icon btn-soft-light"><i
                    class="ti ti-shopping-cart"></i></a> <small class="text-muted fw-medium ms-1">Buy
                Now</small>
        </li>
    </ul>
    <!-- Sidebar Footer -->
</nav>

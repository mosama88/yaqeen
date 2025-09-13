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

            <li class="sidebar-dropdown">
                <a href="javascript:void(0)"><i class="fa-solid fa-sliders me-2"></i>الأعدادات العامة</a>
                <div class="sidebar-submenu">
                    <ul>
                        <li><a href="{{ route('dashboard.admin-panel-settings.index') }}">إعدادات الشركة</a></li>
                        <li><a href="{{ route('dashboard.treasuries.index') }}">الخزن</a></li>
                        <li><a href="{{ route('dashboard.sales_matrial_types.index') }}">بيانات فئات الفواتير</a></li>
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

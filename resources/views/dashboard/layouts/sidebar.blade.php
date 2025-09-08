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
                <a href="{{ route('dashboard.index') }}"><i class="ti ti-home me-2"></i>لوحة التحكم</a>
            </li>


            <li class="sidebar-dropdown">
                <a href="javascript:void(0)"><i class="ti ti-apps me-2"></i>Apps</a>
                <div class="sidebar-submenu">
                    <ul>
                        <li><a href="chat.html">Chat</a></li>
                        <li><a href="email.html">Email</a></li>
                        <li><a href="calendar.html">Calendar</a></li>
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

<ul class="menu-inner py-1">
    <!-- Dashboard -->
    <li class="menu-item {{ Route::is('home') ? 'active' : '' }}">
        <a href="{{ route('home') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Analytics">Dashboard</div>
        </a>
    </li>
    {{-- Master Menu --}}
    <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Master</span>
    </li>
    <li class="menu-item {{ Route::is('user.index') ? 'active' : '' }}">
        <a href="{{ route('user.index') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bxs-user-account"></i>
            Users
        </a>
    </li>
    <li class="menu-item {{ Route::is('unit.index') ? 'active' : '' }}">
        <a href="{{ route('unit.index') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bxs-building-house"></i>
            Units
        </a>
    </li>
    <li class="menu-item
                {{ Route::is('user.*') ? 'active open' : '' }}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-dock-top"></i>
            <div data-i18n="Account Settings">Account Settings</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item {{ Route::is('user.index') ? 'active' : '' }}">
                <a href="{{ route('user.index') }}" class="menu-link">
                    <div data-i18n="Account">Users</div>
                </a>
            </li>
            @can('roles-list')
                <li class="menu-item {{ Route::is('user.roles') ? 'active' : '' }}">
                    <a href="{{ route('user.roles') }}" class="menu-link">
                        <div data-i18n="Notifications">Roles</div>
                    </a>
                </li>
            @endcan
            @can('permission-list')
                <li class="menu-item {{ Route::is('user.permission') ? 'active' : '' }}">
                    <a href="{{ route('user.permission') }}" class="menu-link">
                        <div data-i18n="Connections">Permissions</div>
                    </a>
                </li>
            @endcan

        </ul>
    </li>

    <!-- Misc -->
    <li class="menu-header small text-uppercase"><span class="menu-header-text">Misc</span></li>
    <li class="menu-item">
        <a href="https://github.com/themeselection/sneat-html-admin-template-free/issues" target="_blank"
            class="menu-link">
            <i class="menu-icon tf-icons bx bx-support"></i>
            <div data-i18n="Support">Support</div>
        </a>
    </li>
    <li class="menu-item">
        <a href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/" target="_blank"
            class="menu-link">
            <i class="menu-icon tf-icons bx bx-file"></i>
            <div data-i18n="Documentation">Documentation</div>
        </a>
    </li>
</ul>

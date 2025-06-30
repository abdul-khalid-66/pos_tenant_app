<div class="iq-sidebar sidebar-default">
    <div class="iq-sidebar-logo d-flex align-items-center justify-content-between">
        {{-- <a href="{{ route('admin.dashboard') }}" class="header-logo">
        <img src="{{ asset('backend/assets/images/MDLogo.jpg') }}"
            class="img-fluid rounded-normal light-logo" alt="logo">
        <h5 class="logo-title light-logo ml-3">MD-Autos</h5>
        </a>
        <div class="iq-menu-bt-sidebar ml-0">
            <i class="las la-bars wrapper-menu"></i>
        </div> --}}
    </div>
    <div class="data-scrollbar" data-scroll="1">
        <nav class="iq-sidebar-menu">
            <ul id="iq-sidebar-toggle" class="iq-menu">
                @role('super-admin')
                    <!-- Dashboard -->
                    <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <a href="{{ route('dashboard') }}" class="svg-icon">
                            <svg class="svg-icon" id="p-dash1" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                                <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                <line x1="12" y1="22.08" x2="12" y2="12"></line>
                            </svg>
                            <span class="ml-4">Dashboard</span>
                        </a>
                    </li>
                    <!-- Business -->
                    <li class="{{ request()->is('businesses*') || request()->is('categories*') || request()->is('brands*') ? 'active' : '' }}">
                        <a href="#business" class="collapsed" data-toggle="collapse" aria-expanded="false">
                            <svg class="svg-icon" width="20" height="20" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 21V7a1 1 0 0 1 1-1h4v4h6V6h4a1 1 0 0 1 1 1v14"></path>
                                <path d="M9 21v-4h6v4"></path>
                                <path d="M9 6v4h6V6"></path>
                                <line x1="4" y1="21" x2="20" y2="21"></line>
                                <rect x="7" y="10" width="2" height="2"></rect>
                                <rect x="15" y="10" width="2" height="2"></rect>
                            </svg>
                            <span class="ml-4">Business</span>
                            <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="10 15 15 20 20 15"></polyline>
                                <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                            </svg>
                        </a>
                        <ul id="business" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                            <li class="{{ request()->routeIs('businesses.index') ? 'active' : '' }}">
                                <a href="{{ route('businesses.index') }}">
                                    <i class="las la-minus"></i><span>Businesses List</span>
                                </a>
                            </li>
                            <li class="{{ request()->routeIs('branches.index') ? 'active' : '' }}">
                                <a href="{{ route('branches.index') }}">
                                    <i class="las la-minus"></i><span>Branches List</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- Tenants -->
                    <li class="{{ request()->is('tenants*') || request()->is('businesses*') || request()->is('categories*') || request()->is('brands*') ? 'active' : '' }}">
                        <a href="#tenant-management" class="collapsed" data-toggle="collapse" aria-expanded="false">
                            <svg class="svg-icon" width="20" height="20" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 21V7a1 1 0 0 1 1-1h4v4h6V6h4a1 1 0 0 1 1 1v14"></path>
                                <path d="M9 21v-4h6v4"></path>
                                <path d="M9 6v4h6V6"></path>
                                <line x1="4" y1="21" x2="20" y2="21"></line>
                                <rect x="7" y="10" width="2" height="2"></rect>
                                <rect x="15" y="10" width="2" height="2"></rect>
                            </svg>

                            <span class="ml-4">Tenant Management</span>
                            <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="10 15 15 20 20 15"></polyline>
                                <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                            </svg>
                        </a>
                        <ul id="tenant-management" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                            <!-- Tenant Management -->
                            <li class="{{ request()->routeIs('tenants.index') ? 'active' : '' }}">
                                <a href="{{ route('tenants.index') }}">
                                    <i class="las la-minus"></i><span>Tenants List</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endrole
            </ul>
        </nav>
    </div>
</div>
{{-- SIDEBAR --}}
<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    {{-- TOP TEXT --}}
    <div class="c-sidebar-brand d-lg-down-none">
        <div class="c-sidebar-brand-full">
            <a class="text-light" href="{{ route('admin.home') }}">
                <h1><span class="badge badge-secondary">Real Estate CMS</span></h1>
            </a>
        </div>

        <a class="text-light" href="{{ route('admin.home') }}">
            <svg class="c-sidebar-brand-minimized" width="46" height="46" alt="CMS Logo">
                <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-home') }}"></use>
            </svg>
        </a>
    </div>
    {{-- /TOP TEXT --}}
    {{-- SIDE BUTTONS --}}
    <ul class="c-sidebar-nav ps ps--active-y">
        {{-- TOP BUTTON --}}
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('admin.home') }}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-devices') }}"></use>
                </svg>
                Dashboard
            </a>
        </li>
        {{-- UPPER BUTTONS --}}
        <li class="c-sidebar-nav-title">Manage Properties</li>
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
            <a
                class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-building') }}"></use>
                </svg>
                View Properties
            </a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{ route('admin.properties.index') }}">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-house') }}"></use>
                        </svg>
                        <span class="c-sidebar-nav-icon"></span> All Properties
                    </a>
                </li>
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{ route('admin.properties.index', ['filter' => 'Listed']) }}">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-check-alt') }}"></use>
                        </svg>
                        <span class="c-sidebar-nav-icon"></span> Listed Properties
                    </a>
                </li>
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{ route('admin.properties.index', ['filter' => 'Unlisted']) }}">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-x') }}"></use>
                        </svg>
                        <span class="c-sidebar-nav-icon"></span> Unlisted Properties
                    </a>
                </li>
            </ul>
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{ route('admin.properties.create') }}">
                    <svg class="c-sidebar-nav-icon">
                        <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-plus') }}"></use>
                    </svg> Add Property
                </a>
            </li>
        </li>
        {{-- BOTTOM BUTTONS --}}
        <li class="c-sidebar-nav-divider"></li>
        <li class="c-sidebar-nav-title">Manage Settings</li>
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
            <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-settings') }}"></use>
                </svg>
                Settings
            </a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="#" target="_top">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-envelope-closed') }}"></use>
                        </svg>
                        Mail Settings
                    </a>
                </li>
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="#" target="_top">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-address-book') }}"></use>
                        </svg>
                        Contact Settings
                    </a>
                </li>
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="#" target="_top">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-people') }}"></use>
                        </svg>
                        Social Settings
                    </a>
                </li>
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{ route('admin.settings.privacy.edit') }}" target="_top">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-bug') }}"></use>
                        </svg>
                        Privacy Policy
                    </a>
                </li>
            </ul>
        </li>
    </ul>
    {{-- SIDEBAR TOGGLE --}}
    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent"
        data-class="c-sidebar-minimized"></button>
</div>
{{-- /SIDEBAR --}}

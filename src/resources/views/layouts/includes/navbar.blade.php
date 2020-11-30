<header class="app-header app-header-light shadow-none bg-white">
    <div class="top-bar">
        <div class="top-bar-brand">
            <a href="{{ route('index') }}" class="font-weight-bold font-size-lg d-flex align-items-center">
                <img src="/assets/images/logo/logo-sq1.jpg" alt="Logo"
                    class="d-block mr-2"/> {{ config('app.name') }}
            </a>
        </div>

        <div class="top-bar-list">
            <div class="top-bar-item px-2 d-md-none d-lg-none d-xl-none">
                <button class="hamburger hamburger-squeeze" type="button" data-toggle="aside" aria-label="toggle menu">
                    <span class="hamburger-box"><span class="hamburger-inner"></span></span>
                </button>
            </div>

            <div class="top-bar-item top-bar-item-right px-0 d-none d-sm-flex">
                <ul class="header-nav nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fas fa-search"></span></a>
                    </li>
                </ul>

                @auth
                <div class="dropdown d-none d-md-flex">
                    <button class="btn-account" type="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                        <span class="user-avatar user-avatar-md">
                            <img src="/assets/images/avatars/profile.jpg" alt="">
                        </span>
                        <span class="account-summary pr-lg-4 d-none d-lg-block">
                            <span class="account-name">{{ auth()->user()->name }}</span>
                            <span class="account-description"></span>
                        </span>
                    </button>

                    <div class="dropdown-menu">
                        <div class="dropdown-arrow d-lg-none" x-arrow=""></div>
                        <div class="dropdown-arrow ml-3 d-none d-lg-block"></div>
                        <h6 class="dropdown-header d-none d-md-block d-lg-none"> {{ auth()->user()->name }} </h6>
                        <a class="dropdown-item" href="{{ route('dashboard') }}">
                            <span class="dropdown-icon oi oi-person"></span> Dashboard
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}">
                            <span class="dropdown-icon oi oi-account-logout"></span> Logout
                        </a>
                    </div>
                </div>
                @else
                <div class="d-flex align-items-center pr-4 py-2">
                    <a href="{{ route('login') }}" class="btn btn-link border-right">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-link">Register</a>
                </div>
                @endauth
            </div>
        </div>
    </div>
</header>

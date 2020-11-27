<header class="app-header app-header-dark">
    <div class="top-bar">
        <div class="top-bar-brand">
            <a href="{{ route('index') }}" class="font-weight-bold font-size-lg">
                {{ config('app.name') }}
            </a>
        </div>

        <div class="top-bar-list">
            <div class="top-bar-item px-2 d-md-none d-lg-none d-xl-none">
                <button class="hamburger hamburger-squeeze" type="button" data-toggle="aside" aria-label="toggle menu">
                    <span class="hamburger-box"><span class="hamburger-inner"></span></span>
                </button>
            </div>
            <div class="top-bar-item top-bar-item-full">
                <form class="top-bar-search">
                    <div class="input-group input-group-search dropdown">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><span class="fas fa-search"></span></span>
                        </div>
                        <input type="text"
                               class="form-control"
                               aria-label="{{ __('Search') }}"
                               placeholder="{{ __('Search') }}">
                    </div>
                </form>
            </div>
            <div class="top-bar-item top-bar-item-right px-0 d-none d-sm-flex">
                <div class="dropdown d-none d-md-flex">
                    <button class="btn-account" type="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                        <span class="user-avatar user-avatar-md">
                            <img src="assets/images/avatars/profile.jpg" alt="">
                        </span>
                        <span class="account-summary pr-lg-4 d-none d-lg-block">
                            <span class="account-name">Andres Carmona</span>
                            <span class="account-description"></span>
                        </span>
                    </button>

                    <div class="dropdown-menu">
                        <div class="dropdown-arrow d-lg-none" x-arrow=""></div>
                        <div class="dropdown-arrow ml-3 d-none d-lg-block"></div>
                        <h6 class="dropdown-header d-none d-md-block d-lg-none"> Andres Carmona </h6>
                        <a class="dropdown-item" href="user-profile.html">
                            <span class="dropdown-icon oi oi-person"></span> Profile
                        </a>
                        <a class="dropdown-item" href="auth-signin-v1.html">
                            <span class="dropdown-icon oi oi-account-logout"></span> Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

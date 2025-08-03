<div class="uk-container">
    <nav class="uk-navbar-container uk-navbar-transparent" uk-navbar
        uk-sticky="show-on-up: true; animation: uk-animation-slide-top">
        <div class="uk-navbar-right">
            <!-- Mobile Toggle -->
            <a class="uk-navbar-toggle uk-hidden@m" uk-navbar-toggle-icon href="#offcanvas-menu" uk-toggle></a>

            <!-- Logo - Visible on all screens -->
            <a href="{{ url('/') }}" class="uk-navbar-item uk-logo uk-text-bold">
                <span uk-icon="icon: happy; ratio: 1.5" class="uk-margin-small-right"></span>
                ساشیا
            </a>

            <!-- Desktop Navigation -->
            <ul class="uk-navbar-nav uk-visible@m">
                <li class="uk-active"><a href="#" class="uk-text-bold">خانه</a></li>
                <li>
                    <a href="#" class="uk-text-bold">محصولات</a>
                    <div class="uk-navbar-dropdown uk-box-shadow-large uk-width-large">
                        <div class="uk-navbar-dropdown-grid uk-child-width-1-2" uk-grid>
                            <div>
                                <ul class="uk-nav uk-navbar-dropdown-nav">
                                    <li class="uk-nav-header">دسته‌بندی‌ها</li>
                                    <li><a href="#"><span uk-icon="icon: laptop"></span> کالای دیجیتال</a></li>
                                    <li><a href="#"><span uk-icon="icon: tshirt"></span> پوشاک</a></li>
                                    <li><a href="#"><span uk-icon="icon: home"></span> لوازم خانگی</a></li>
                                </ul>
                            </div>
                            <div>
                                <ul class="uk-nav uk-navbar-dropdown-nav">
                                    <li class="uk-nav-header">سایر</li>
                                    <li><a href="#"><span uk-icon="icon: star"></span> محصولات ویژه</a></li>
                                    <li><a href="#"><span uk-icon="icon: search"></span> جستجوی پیشرفته</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
                <li><a href="#" class="uk-text-bold">درباره ما</a></li>
                <li><a href="#" class="uk-text-bold">تماس با ما</a></li>
            </ul>
        </div>

        <div class="uk-navbar-left">
            <!-- User Actions -->
            <div class="uk-navbar-item">
                <button id="darkModeToggle" class="uk-button uk-button-default uk-button-small">
                    <span id="darkModeIcon" uk-tooltip="تم تاریک">🌙</span>
                </button>

                @auth
                    <div class="uk-inline uk-margin-small-left">
                        <button class="uk-button uk-button-default uk-button-small" type="button">
                            <span uk-icon="icon: user"></span>
                            <span class="uk-visible@m">{{ Str::limit(Auth::user()->name, 15) }}</span>
                        </button>
                        <div uk-dropdown="pos: bottom-right; mode: click; boundary: !.uk-navbar; boundary-align: true">
                            <ul class="uk-nav uk-dropdown-nav">
                                <li class="uk-nav-header">{{ Auth::user()->name }}</li>
                                <li><a href="#"><span uk-icon="icon: user"></span> پروفایل کاربری</a></li>
                                <li><a href="#"><span uk-icon="icon: settings"></span> تنظیمات حساب</a></li>
                                <li><a href="#"><span uk-icon="icon: cart"></span> سفارشات من</a></li>
                                <li class="uk-nav-divider"></li>
                                <li class="uk-nav-item">
                                    <form method="POST" action="{{ route('logout') }}" class="uk-display-inline">
                                        @csrf
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); this.closest('form').submit();"
                                            class="uk-text-danger"> <!-- Added uk-text-danger for red color -->
                                            <span uk-icon="icon: sign-out"></span>
                                            <span class="uk-visible@s">خروج</span>
                                        </a>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                @else
                    <div class="uk-inline uk-margin-small-left">
                        <a href="{{ route('auth') }}" class="uk-button uk-button-default uk-button-small">
                            <span uk-icon="icon: user"></span>
                            <span class="uk-visible@m">ورود/ثبت نام</span>
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </nav>
</div>

<!-- Mobile Off-canvas Menu -->
<div id="offcanvas-menu" uk-offcanvas="overlay: true; flip: true; mode: push">
    <div class="uk-offcanvas-bar uk-padding-remove">
        <div class="uk-card uk-card-default uk-card-small">
            <div class="uk-card-header">
                <button class="uk-offcanvas-close" type="button" uk-close></button>
                <h3 class="uk-card-title">
                    <span uk-icon="icon: happy"></span> ساشیا
                </h3>
            </div>
            <div class="uk-card-body uk-padding-remove">
                <ul class="uk-nav uk-nav-default">
                    <li class="uk-active"><a href="#"><span uk-icon="icon: home"></span> خانه</a></li>
                    <li class="uk-parent">
                        <a href="#"><span uk-icon="icon: cart"></span> محصولات</a>
                        <ul class="uk-nav-sub">
                            <li><a href="#"><span uk-icon="icon: laptop"></span> کالای دیجیتال</a></li>
                            <li><a href="#"><span uk-icon="icon: tshirt"></span> پوشاک</a></li>
                            <li><a href="#"><span uk-icon="icon: home"></span> لوازم خانگی</a></li>
                        </ul>
                    </li>
                    <li><a href="#"><span uk-icon="icon: info"></span> درباره ما</a></li>
                    <li><a href="#"><span uk-icon="icon: mail"></span> تماس با ما</a></li>
                </ul>
            </div>
            <div class="uk-card-footer">
                @auth
                    <div class="uk-panel">
                        <div class="uk-text-bold">
                            <span uk-icon="icon: user"></span> {{ Auth::user()->name }}
                        </div>
                        <ul class="uk-nav uk-nav-default uk-margin-small-top">
                            <li><a href="#"><span uk-icon="icon: user"></span> پروفایل</a></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                        <span uk-icon="icon: sign-out"></span> خروج
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <a href="{{ route('auth') }}" class="uk-button uk-button-primary uk-width-1-1">
                        <span uk-icon="icon: sign-in"></span> ورود/ثبت نام
                    </a>
                @endauth
            </div>
        </div>
    </div>
</div>

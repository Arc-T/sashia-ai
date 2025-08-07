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
<div id="offcanvas-menu" uk-offcanvas="overlay: true; flip: true; mode: push; bg-close: true">
    <div class="uk-offcanvas-bar uk-padding-remove uk-flex uk-flex-column" style="width: 320px; max-width: 100vw;">

        <!-- Header Section with Branding -->
        <div class="uk-card-header uk-background-primary uk-light">
            <div class="uk-grid-small uk-flex-middle" uk-grid>
                <div class="uk-width-auto">
                    <div class="uk-border-circle uk-background-secondary uk-flex uk-flex-center uk-flex-middle"
                        style="width: 50px; height: 50px;">
                        <span uk-icon="icon: happy; ratio: 1.5"></span>
                    </div>
                </div>
                <div class="uk-width-expand">
                    <h3 class="uk-card-title uk-margin-remove-bottom">ساشیا</h3>
                    <p class="uk-text-meta uk-margin-remove-top">فروشگاه اینترنتی</p>
                </div>
                <div class="uk-width-auto">
                    <button class="uk-offcanvas-close uk-close-large" type="button" uk-close></button>
                </div>
            </div>
        </div>

        <!-- Search Bar -->
        <div class="uk-padding-small uk-background-muted">
            <form class="uk-search uk-search-default uk-width-1-1">
                <span uk-search-icon></span>
                <input class="uk-search-input" type="search" placeholder="جستجوی محصولات..." autofocus>
            </form>
        </div>

        <!-- Main Navigation -->
        <div class="uk-card-body uk-padding-small uk-flex-1 uk-overflow-auto">
            <ul class="uk-nav uk-nav-default uk-nav-parent-icon" uk-nav>
                <li class="uk-active">
                    <a href="#" class="uk-flex uk-flex-middle">
                        <span uk-icon="icon: home" class="uk-margin-small-left"></span>
                        <span class="uk-text-bold">خانه</span>
                    </a>
                </li>

                <!-- Products with nested menu -->
                <li class="uk-parent">
                    <a href="#" class="uk-flex uk-flex-middle">
                        <span uk-icon="icon: cart" class="uk-margin-small-left"></span>
                        <span class="uk-text-bold">محصولات</span>
                        <span uk-nav-parent-icon class="uk-margin-small-right"></span>
                    </a>
                    <ul class="uk-nav-sub">
                        <li>
                            <a href="#" class="uk-flex uk-flex-middle">
                                <span uk-icon="icon: laptop" class="uk-margin-small-left"></span>
                                کالای دیجیتال
                                <span class="uk-badge uk-margin-small-right">جدید</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="uk-flex uk-flex-middle">
                                <span uk-icon="icon: tshirt" class="uk-margin-small-left"></span>
                                پوشاک
                            </a>
                        </li>
                        <li>
                            <a href="#" class="uk-flex uk-flex-middle">
                                <span uk-icon="icon: home" class="uk-margin-small-left"></span>
                                لوازم خانگی
                            </a>
                        </li>
                        <li>
                            <a href="#" class="uk-flex uk-flex-middle">
                                <span uk-icon="icon: star" class="uk-margin-small-left"></span>
                                محصولات ویژه
                                <span class="uk-badge uk-background-secondary uk-margin-small-right">%</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#" class="uk-flex uk-flex-middle">
                        <span uk-icon="icon: info" class="uk-margin-small-left"></span>
                        <span class="uk-text-bold">درباره ما</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="uk-flex uk-flex-middle">
                        <span uk-icon="icon: mail" class="uk-margin-small-left"></span>
                        <span class="uk-text-bold">تماس با ما</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="uk-flex uk-flex-middle">
                        <span uk-icon="icon: question" class="uk-margin-small-left"></span>
                        <span class="uk-text-bold">راهنمای خرید</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="uk-flex uk-flex-middle">
                        <span uk-icon="icon: credit-card" class="uk-margin-small-left"></span>
                        <span class="uk-text-bold">روش‌های پرداخت</span>
                    </a>
                </li>
            </ul>

            <!-- Divider -->
            <hr class="uk-divider-icon uk-margin">

            <!-- Quick Links -->
            <div class="uk-grid-small uk-child-width-1-2" uk-grid>
                <div>
                    <a href="#" class="uk-button uk-button-text uk-text-small">
                        <span uk-icon="icon: receiver" class="uk-margin-small-left"></span>
                        پشتیبانی
                    </a>
                </div>
                <div>
                    <a href="#" class="uk-button uk-button-text uk-text-small">
                        <span uk-icon="icon: file-text" class="uk-margin-small-left"></span>
                        قوانین
                    </a>
                </div>
                <div>
                    <a href="#" class="uk-button uk-button-text uk-text-small">
                        <span uk-icon="icon: lock" class="uk-margin-small-left"></span>
                        حریم خصوصی
                    </a>
                </div>
                <div>
                    <a href="#" class="uk-button uk-button-text uk-text-small">
                        <span uk-icon="icon: comments" class="uk-margin-small-left"></span>
                        نظرات
                    </a>
                </div>
            </div>
        </div>

        <!-- User Section -->
        <div class="uk-card-footer uk-background-muted">
            @auth
                <div class="uk-panel">
                    <div class="uk-grid-small uk-flex-middle" uk-grid>
                        <div class="uk-width-auto">
                            <div class="uk-border-circle uk-background-primary uk-flex uk-flex-center uk-flex-middle"
                                style="width: 40px; height: 40px;">
                                <span uk-icon="icon: user"></span>
                            </div>
                        </div>
                        <div class="uk-width-expand">
                            <div class="uk-text-bold">{{ Auth::user()->name }}</div>
                            <div class="uk-text-meta uk-text-small">حساب کاربری</div>
                        </div>
                        <div class="uk-width-auto">
                            <span class="uk-badge uk-background-success">فعال</span>
                        </div>
                    </div>

                    <ul class="uk-nav uk-nav-default uk-margin-small-top">
                        <li>
                            <a href="#" class="uk-flex uk-flex-middle">
                                <span uk-icon="icon: user" class="uk-margin-small-left"></span>
                                پروفایل کاربری
                            </a>
                        </li>
                        <li>
                            <a href="#" class="uk-flex uk-flex-middle">
                                <span uk-icon="icon: cart" class="uk-margin-small-left"></span>
                                سفارشات من
                                <span class="uk-badge uk-margin-small-right">3</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="uk-flex uk-flex-middle">
                                <span uk-icon="icon: heart" class="uk-margin-small-left"></span>
                                علاقه‌مندی‌ها
                            </a>
                        </li>
                        <li class="uk-nav-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); this.closest('form').submit();"
                                    class="uk-text-danger uk-flex uk-flex-middle">
                                    <span uk-icon="icon: sign-out" class="uk-margin-small-left"></span>
                                    خروج از حساب
                                </a>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <div class="uk-grid-small uk-child-width-1-1" uk-grid>
                    <div>
                        <a href="{{ route('auth') }}" class="uk-button uk-button-primary uk-width-1-1">
                            <span uk-icon="icon: sign-in"></span> ورود به حساب
                        </a>
                    </div>
                    <div>
                        <a href="{{ route('register') }}" class="uk-button uk-button-default uk-width-1-1">
                            <span uk-icon="icon: plus"></span> ثبت نام جدید
                        </a>
                    </div>
                </div>

                <div class="uk-text-center uk-margin-top">
                    <p class="uk-text-meta">با ورود یا ثبت نام، با <a href="#">قوانین</a> و <a
                            href="#">شرایط</a> موافقت می‌کنید.</p>
                </div>
            @endauth
        </div>
    </div>
</div>

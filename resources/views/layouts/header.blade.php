<div class="uk-container">
    <nav class="uk-navbar-container uk-navbar-transparent" uk-navbar
        uk-sticky="show-on-up: true; animation: uk-animation-slide-top">
        <div class="uk-navbar-right">
            <!-- Mobile Toggle -->
            <a class="uk-navbar-toggle uk-hidden@m" uk-navbar-toggle-icon href="#offcanvas-menu" uk-toggle></a>

            <!-- Logo - Visible on all screens -->
            <a href="{{ url('/') }}" class="uk-navbar-item uk-logo uk-text-bold">
                <img src="{{ asset('images/logo.png') }}" alt="Zarinpal" width="60" height="60">
                ساشیا
            </a>

            <!-- Desktop Navigation -->
            <ul class="uk-navbar-nav uk-visible@m uk-margin-right">
                <li>
                    <a href="{{ route('prompt_case.index') }}">
                        <span uk-icon="icon: info" class="uk-margin-small-left"></span> پرامپتی
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span uk-icon="icon: mail" class="uk-margin-small-left"></span>پراشیا
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span uk-icon="icon: album" class="uk-margin-small-left"></span>منابع
                        <span uk-icon="icon: chevron-down;"></span>
                    </a>
                    <div class="uk-navbar-dropdown uk-box-shadow-large uk-width-large" style="border-radius: 16px;">
                        <div class="uk-navbar-dropdown-grid uk-child-width-1-2" uk-grid>
                            <div>
                                <ul class="uk-nav uk-navbar-dropdown-nav">
                                    <li class="uk-nav-header uk-margin-small-bottom">
                                        <span uk-icon="icon: commenting" class="uk-margin-small-left"></span>پرامپت ها
                                    </li>
                                    <li><a href="{{ route('gallery') }}"><span uk-icon="icon: image"
                                                class="uk-margin-small-left"></span>گرافیکی</a></li>
                                    <li><a href="{{ route('gallery') }}"><span uk-icon="icon:  paint-bucket"
                                                class="uk-margin-small-left"></span>طراحی محصول</a></li>
                                    <li><a href="{{ route('gallery') }}"><span uk-icon="icon: camera"
                                                class="uk-margin-small-left"></span>عکاسی</a></li>
                                    <li><a href="{{ route('gallery') }}"><span uk-icon="icon: user"
                                                class="uk-margin-small-left"></span>کارکتر</a></li>
                                    <li><a href="{{ route('gallery') }}"><span uk-icon="icon: happy"
                                                class="uk-margin-small-left"></span>حیوانات</a></li>
                                    <li><a href="{{ route('gallery') }}"><span uk-icon="icon: world"
                                                class="uk-margin-small-left"></span>طبیعت</a></li>
                                    <li><a href="{{ route('gallery') }}"><span uk-icon="icon: nut"
                                                class="uk-margin-small-left"></span>انتزاع</a></li>
                                </ul>
                            </div>
                            <div>
                                <ul class="uk-nav uk-navbar-dropdown-nav">
                                    <li class="uk-nav-header uk-margin-small-bottom">
                                        <span uk-icon="icon: git-branch" class="uk-margin-small-left"></span>اتوماسیون
                                    </li>
                                    <li><a href="#"><span uk-icon="icon: code"
                                                class="uk-margin-small-left"></span>برنامه نویسی</a></li>
                                    <li><a href="#"><span uk-icon="icon: code"
                                                class="uk-margin-small-left"></span>شبکه های اجتماعی</a></li>
                                    <li><a href="#"><span uk-icon="icon: code"
                                                class="uk-margin-small-left"></span>مدیریت پروژه</a></li>
                                    <li><a href="#"><span uk-icon="icon: code"
                                                class="uk-margin-small-left"></span>مالی و حسابداری</a></li>
                                    <li><a href="#"><span uk-icon="icon: code"
                                                class="uk-margin-small-left"></span>تبلیغات و بازاریابی</a></li>
                                    <li><a href="#"><span uk-icon="icon: code"
                                                class="uk-margin-small-left"></span>فروش و مدیریت مشتری</a></li>
                                    <li><a href="#"><span uk-icon="icon: code"
                                                class="uk-margin-small-left"></span>تولید محتوا و کلیپ سازی</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="#">
                        <span uk-icon="icon: tools" class="uk-margin-small-left"></span>ابزار
                        <span uk-icon="icon: chevron-down;"></span>
                    </a>
                    <div class="uk-navbar-dropdown uk-box-shadow-large uk-width-large"
                        style="border-radius: 16px;">
                        <div class="uk-navbar-dropdown-grid uk-child-width-1-2" uk-grid>
                            <div>
                                <ul class="uk-nav uk-navbar-dropdown-nav">
                                    <li class="uk-nav-header uk-margin-small-bottom">
                                        <span uk-icon="icon: commenting" class="uk-margin-small-left"></span>هوش مصنوعی
                                    </li>
                                    <li><a href="{{ route('gallery') }}"><span uk-icon="icon: happy"
                                                class="uk-margin-small-left"></span>ساخت بازی</a></li>
                                    <li><a href="{{ route('gallery') }}"><span uk-icon="icon: happy"
                                                class="uk-margin-small-left"></span>ساخت لوگو</a></li>
                                    <li><a href="{{ route('gallery') }}"><span uk-icon="icon: happy"
                                                class="uk-margin-small-left"></span>ساخت موزیک</a></li>
                                    <li><a href="{{ route('gallery') }}"><span uk-icon="icon: image"
                                                class="uk-margin-small-left"></span>ساخت عکس - کلیپ</a></li>
                                    <li><a href="{{ route('gallery') }}"><span uk-icon="icon: image"
                                                class="uk-margin-small-left"></span>ساخت مدل سه بعدی</a></li>
                                    <li><a href="{{ route('gallery') }}"><span uk-icon="icon: happy"
                                                class="uk-margin-small-left"></span>ساخت اپلیکیشن - وبسایت</a>
                                    <li class="uk-nav-divider uk-margin-small-top"><a
                                            href="{{ route('gallery') }}"><span uk-icon="icon: image"
                                                class="uk-margin-small-left"></span>تبدیل متن به صدا</a></li>
                                    <li><a href="{{ route('gallery') }}"><span uk-icon="icon:  paint-bucket"
                                                class="uk-margin-small-left"></span>تبدیل عکس به کلیپ</a>
                                    </li>
                                    <li><a href="{{ route('gallery') }}"><span uk-icon="icon: user"
                                                class="uk-margin-small-left"></span>تبدیل عکس به مدل سه بعدی</a></li>
                                    <li class="uk-nav-divider uk-margin-small-top"><a
                                            href="{{ route('gallery') }}"><span uk-icon="icon: camera"
                                                class="uk-margin-small-left"></span>تغییر صدا</a></li>
                                    <li><a href="{{ route('gallery') }}"><span uk-icon="icon: camera"
                                                class="uk-margin-small-left"></span>تغییر چهره</a></li>
                                </ul>
                            </div>
                            <div>
                                <ul class="uk-nav uk-navbar-dropdown-nav">
                                    <li class="uk-nav-header uk-margin-small-bottom">
                                        <span uk-icon="icon: git-branch" class="uk-margin-small-left"></span>نصب شده
                                        ها
                                    </li>
                                    <li><a href="#"><span uk-icon="icon: code"
                                                class="uk-margin-small-left"></span>Ollama 3</a></li>
                                    <li><a href="#"><span uk-icon="icon: code"
                                                class="uk-margin-small-left"></span>chatOs</a></li>
                                    <li><a href="#"><span uk-icon="icon: code"
                                                class="uk-margin-small-left"></span>nvidia</a></li>
                                    <li><a href="#"><span uk-icon="icon: code"
                                                class="uk-margin-small-left"></span>rufus AI</a></li>
                                    <li><a href="#"><span uk-icon="icon: code"
                                                class="uk-margin-small-left"></span>Gemini</a></li>
                                    <li><a href="#"><span uk-icon="icon: code"
                                                class="uk-margin-small-left"></span>Seikiro</a></li>
                                    <li><a href="#"><span uk-icon="icon: code"
                                                class="uk-margin-small-left"></span>7Gamma</a></li>
                                    <li><a href="#"><span uk-icon="icon: code"
                                                class="uk-margin-small-left"></span>NittaCpt</a></li>
                                    <li><a href="#"><span uk-icon="icon: code"
                                                class="uk-margin-small-left"></span>N8N</a></li>
                                    <li><a href="#"><span uk-icon="icon: code"
                                                class="uk-margin-small-left"></span>Activiti</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>

        <div class="uk-navbar-left">
            <!-- User Actions -->
            <div class="uk-navbar-item">
                <button id="darkModeToggle" class="uk-button uk-button-default uk-button-small uk-margin-small-left">
                    <span id="darkModeIcon" uk-icon="icon: paint-bucket" uk-tooltip="تم تاریک"></span>
                </button>

                @auth
                    <div class="uk-inline uk-margin-small-left">
                        <button class="uk-button uk-button-default uk-button-small" type="button">
                            <span uk-icon="icon: user"></span>
                            <span class="uk-visible@m">{{ Str::limit(Auth::user()->name, 15) }}</span>
                        </button>
                        <div uk-dropdown="pos: bottom-right; mode: click; boundary: !.uk-navbar; boundary-align: true">
                            <ul class="uk-nav uk-dropdown-nav">
                                <li class="uk-nav-header">
                                    <span uk-icon="icon: user"
                                        class="uk-margin-small-left"></span>{{ Auth::user()->name }}
                                </li>
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
                            <span uk-icon="icon: sign-in"></span>
                            <span class="uk-visible@m">ورود / ثبت نام</span>
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </nav>
</div>

<!-- Mobile Off-canvas Menu -->
<div id="offcanvas-menu" uk-offcanvas="overlay: true; mode: slide; bg-close: true;">
    <div class="uk-offcanvas-bar uk-flex uk-flex-column uk-padding-remove" style="width: min(320px, 100vw);">

        <!-- Header Section with improved accessibility -->
        <header class="uk-light uk-padding-small uk-flex uk-flex-middle uk-flex-between">
            <div class="uk-flex uk-flex-middle" aria-label="Store information">
                <div class="uk-border-circle uk-background-secondary uk-flex uk-flex-center uk-flex-middle"
                    style="width: 50px; height: 50px;" aria-hidden="true">
                    <img src="{{ asset('images/logo.png') }}" alt="Zarinpal" width="40" height="40">

                </div>
                <div class="uk-margin-small-right">
                    <h3 class="uk-margin-remove" aria-label="Store name">ساشیا</h3>
                    <p class="uk-text-meta uk-margin-remove" aria-label="Store type">دستیار هوش مصنوعی</p>
                </div>
            </div>
            <button class="uk-offcanvas-close uk-close-large" type="button" uk-close
                aria-label="Close menu"></button>
        </header>

        <!-- Main Navigation with smooth scrolling -->
        <nav class="uk-flex-1 uk-overflow-auto uk-padding-small" aria-label="Main navigation">
            <ul class="uk-nav uk-nav-default uk-nav-parent-icon" uk-nav="multiple: true">
                <li class="uk-active">
                    <a href="#" class="uk-transition-opacity" aria-current="page">
                        <span uk-icon="icon: home" class="uk-margin-small-left"></span> خانه
                    </a>
                </li>
                <li class="uk-parent">
                    <a href="#" class="uk-transition-opacity">
                        <span uk-icon="icon: cart" class="uk-margin-small-left"></span> محصولات
                    </a>
                    <ul class="uk-nav-sub">
                        <li>
                            <a href="#" class="uk-transition-opacity">
                                <span uk-icon="icon: laptop" class="uk-margin-small-left"></span> کالای دیجیتال
                                <span class="uk-badge uk-margin-small-right">جدید</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="uk-transition-opacity">
                                <span uk-icon="icon: tshirt" class="uk-margin-small-left"></span> پوشاک
                            </a>
                        </li>
                        <li>
                            <a href="#" class="uk-transition-opacity">
                                <span uk-icon="icon: home" class="uk-margin-small-left"></span> لوازم خانگی
                            </a>
                        </li>
                        <li>
                            <a href="#" class="uk-transition-opacity">
                                <span uk-icon="icon: star" class="uk-margin-small-left"></span> محصولات ویژه
                                <span class="uk-badge uk-background-secondary uk-margin-small-right">%</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="uk-transition-opacity">
                        <span uk-icon="icon: info" class="uk-margin-small-left"></span> درباره ما
                    </a>
                </li>
                <li>
                    <a href="#" class="uk-transition-opacity">
                        <span uk-icon="icon: mail" class="uk-margin-small-left"></span> تماس با ما
                    </a>
                </li>
                <li>
                    <a href="#" class="uk-transition-opacity">
                        <span uk-icon="icon: question" class="uk-margin-small-left"></span> راهنمای خرید
                    </a>
                </li>
                <li>
                    <a href="#" class="uk-transition-opacity">
                        <span uk-icon="icon: credit-card" class="uk-margin-small-left"></span> روش‌های پرداخت
                    </a>
                </li>
            </ul>

            <hr class="uk-divider-icon">

            <!-- Quick Links with better touch targets -->
            <div class="uk-child-width-1-2 uk-grid-small" uk-grid>
                <div>
                    <a href="#"
                        class="uk-button uk-button-text uk-text-small uk-padding-small uk-display-block">
                        <span uk-icon="icon: receiver" class="uk-margin-small-left"></span> پشتیبانی
                    </a>
                </div>
                <div>
                    <a href="#"
                        class="uk-button uk-button-text uk-text-small uk-padding-small uk-display-block">
                        <span uk-icon="icon: file-text" class="uk-margin-small-left"></span> قوانین
                    </a>
                </div>
                <div>
                    <a href="#"
                        class="uk-button uk-button-text uk-text-small uk-padding-small uk-display-block">
                        <span uk-icon="icon: lock" class="uk-margin-small-left"></span> حریم خصوصی
                    </a>
                </div>
                <div>
                    <a href="#"
                        class="uk-button uk-button-text uk-text-small uk-padding-small uk-display-block">
                        <span uk-icon="icon: comments" class="uk-margin-small-left"></span> نظرات
                    </a>
                </div>
            </div>

            @auth
                <!-- User Section with improved layout -->
                <div class="uk-card uk-card-default uk-card-small uk-card-body uk-margin-top" aria-label="User profile">
                    <div class="uk-flex uk-flex-middle" uk-grid>
                        <div class="uk-width-auto">
                            <div class="uk-border-circle uk-background-primary uk-flex uk-flex-center uk-flex-middle"
                                style="width: 40px; height: 40px;" aria-hidden="true">
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
                            <a href="#" class="uk-transition-opacity">
                                <span uk-icon="icon: user" class="uk-margin-small-left"></span> پروفایل کاربری
                            </a>
                        </li>
                        <li>
                            <a href="#" class="uk-transition-opacity">
                                <span uk-icon="icon: cart" class="uk-margin-small-left"></span> سفارشات من
                                <span class="uk-badge uk-margin-small-right">3</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="uk-transition-opacity">
                                <span uk-icon="icon: heart" class="uk-margin-small-left"></span> علاقه‌مندی‌ها
                            </a>
                        </li>
                        <li class="uk-nav-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); this.closest('form').submit();"
                                    class="uk-text-danger uk-transition-opacity">
                                    <span uk-icon="icon: sign-out" class="uk-margin-small-left"></span> خروج
                                </a>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <!-- Auth Section with better buttons -->
                <div class="uk-margin-top">
                    <div class="uk-grid-small" uk-grid>
                        <div class="uk-width-1-1">
                            <a href="{{ route('auth') }}"
                                class="uk-button uk-button-primary uk-width-1-1 uk-transition-opacity">
                                <span uk-icon="icon: sign-in"></span> ورود
                            </a>
                        </div>
                        <div class="uk-width-1-1">
                            <a href="{{ route('register') }}"
                                class="uk-button uk-button-default uk-width-1-1 uk-transition-opacity">
                                <span uk-icon="icon: plus"></span> ثبت نام
                            </a>
                        </div>
                    </div>
                    <div class="uk-text-center uk-margin-small-top">
                        <p class="uk-text-meta">
                            با ورود یا ثبت نام، با <a href="#" class="uk-text-primary">قوانین</a> و
                            <a href="#" class="uk-text-primary">شرایط</a> موافقت می‌کنید.
                        </p>
                    </div>
                </div>
            @endauth
        </nav>
    </div>
</div>

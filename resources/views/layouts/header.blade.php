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
                    <a>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-collection uk-margin-small-left" viewBox="0 0 16 16">
                            <path
                                d="M2.5 3.5a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1zm2-2a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1zM0 13a1.5 1.5 0 0 0 1.5 1.5h13A1.5 1.5 0 0 0 16 13V6a1.5 1.5 0 0 0-1.5-1.5h-13A1.5 1.5 0 0 0 0 6zm1.5.5A.5.5 0 0 1 1 13V6a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5z" />
                        </svg>منابع
                        <span uk-icon="icon: chevron-down;"></span>
                    </a>
                    <div class="uk-navbar-dropdown uk-box-shadow-large uk-width-large" style="border-radius: 16px;">
                        <div class="uk-navbar-dropdown-grid uk-child-width-1-2" uk-grid>
                            <div>
                                <ul class="uk-nav uk-navbar-dropdown-nav">
                                    <li class="uk-nav-header uk-margin-small-bottom">
                                        <span uk-icon="icon: commenting" class="uk-margin-small-left"></span>پرامپت ها
                                    </li>
                                    <li><a href="{{ route('prompt-templates.index') }}"><span uk-icon="icon: image"
                                                class="uk-margin-small-left"></span>گرافیکی</a></li>
                                    <li><a href="{{ route('prompt-templates.index') }}"><span
                                                uk-icon="icon:  paint-bucket" class="uk-margin-small-left"></span>طراحی
                                            محصول</a></li>
                                    <li><a href="{{ route('prompt-templates.index') }}"><span uk-icon="icon: camera"
                                                class="uk-margin-small-left"></span>عکاسی</a></li>
                                    <li><a href="{{ route('prompt-templates.index') }}"><span uk-icon="icon: user"
                                                class="uk-margin-small-left"></span>کارکتر</a></li>
                                    <li><a href="{{ route('prompt-templates.index') }}"><span uk-icon="icon: happy"
                                                class="uk-margin-small-left"></span>حیوانات</a></li>
                                    <li><a href="{{ route('prompt-templates.index') }}"><span uk-icon="icon: world"
                                                class="uk-margin-small-left"></span>طبیعت</a></li>
                                    <li><a href="{{ route('prompt-templates.index') }}"><span uk-icon="icon: nut"
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-gear-wide uk-margin-small-left" viewBox="0 0 16 16">
                            <path
                                d="M8.932.727c-.243-.97-1.62-.97-1.864 0l-.071.286a.96.96 0 0 1-1.622.434l-.205-.211c-.695-.719-1.888-.03-1.613.931l.08.284a.96.96 0 0 1-1.186 1.187l-.284-.081c-.96-.275-1.65.918-.931 1.613l.211.205a.96.96 0 0 1-.434 1.622l-.286.071c-.97.243-.97 1.62 0 1.864l.286.071a.96.96 0 0 1 .434 1.622l-.211.205c-.719.695-.03 1.888.931 1.613l.284-.08a.96.96 0 0 1 1.187 1.187l-.081.283c-.275.96.918 1.65 1.613.931l.205-.211a.96.96 0 0 1 1.622.434l.071.286c.243.97 1.62.97 1.864 0l.071-.286a.96.96 0 0 1 1.622-.434l.205.211c.695.719 1.888.03 1.613-.931l-.08-.284a.96.96 0 0 1 1.187-1.187l.283.081c.96.275 1.65-.918.931-1.613l-.211-.205a.96.96 0 0 1 .434-1.622l.286-.071c.97-.243.97-1.62 0-1.864l-.286-.071a.96.96 0 0 1-.434-1.622l.211-.205c.719-.695.03-1.888-.931-1.613l-.284.08a.96.96 0 0 1-1.187-1.186l.081-.284c.275-.96-.918-1.65-1.613-.931l-.205.211a.96.96 0 0 1-1.622-.434zM8 12.997a4.998 4.998 0 1 1 0-9.995 4.998 4.998 0 0 1 0 9.996z" />
                        </svg></span>ابزار
                        <span uk-icon="icon: chevron-down;"></span>
                    </a>
                    <div class="uk-navbar-dropdown uk-box-shadow-large uk-width-large" style="border-radius: 16px;">
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
                <li>
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-terminal uk-margin-small-left" viewBox="0 0 16 16">
                            <path
                                d="M6 9a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3A.5.5 0 0 1 6 9M3.854 4.146a.5.5 0 1 0-.708.708L4.793 6.5 3.146 8.146a.5.5 0 1 0 .708.708l2-2a.5.5 0 0 0 0-.708z" />
                            <path
                                d="M2 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1z" />
                        </svg></span>پراشیا
                    </a>
                </li>
                <li>
                    <a href="{{ route('prompt-case.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-suitcase-lg uk-margin-small-left" viewBox="0 0 16 16">
                            <path
                                d="M5 2a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2h3.5A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5H14a.5.5 0 0 1-1 0H3a.5.5 0 0 1-1 0h-.5A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2zm1 0h4a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1M1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5H3V3zM15 12.5v-9a.5.5 0 0 0-.5-.5H13v10h1.5a.5.5 0 0 0 .5-.5m-3 .5V3H4v10z" />
                        </svg>جا پرامپتی
                    </a>
                </li>
                <li>
                    <a href="{{ route('prompt-case.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-house-gear uk-margin-small-left" viewBox="0 0 16 16">
                            <path
                                d="M7.293 1.5a1 1 0 0 1 1.414 0L11 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l2.354 2.353a.5.5 0 0 1-.708.708L8 2.207l-5 5V13.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 1 0 1h-4A1.5 1.5 0 0 1 2 13.5V8.207l-.646.647a.5.5 0 1 1-.708-.708z" />
                            <path
                                d="M11.886 9.46c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.044c-.613-.181-.613-1.049 0-1.23l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382zM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0" />
                        </svg>کارگاه
                    </a>
                </li>
            </ul>
        </div>

        <div class="uk-navbar-left">
            <!-- User Actions -->
            <div class="uk-navbar-item">
                <button id="darkModeToggle" class="uk-button uk-button-default uk-button-small uk-margin-small-left">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-cloud-sun" viewBox="0 0 16 16">
                        <path
                            d="M7 8a3.5 3.5 0 0 1 3.5 3.555.5.5 0 0 0 .624.492A1.503 1.503 0 0 1 13 13.5a1.5 1.5 0 0 1-1.5 1.5H3a2 2 0 1 1 .1-3.998.5.5 0 0 0 .51-.375A3.5 3.5 0 0 1 7 8m4.473 3a4.5 4.5 0 0 0-8.72-.99A3 3 0 0 0 3 16h8.5a2.5 2.5 0 0 0 0-5z" />
                        <path
                            d="M10.5 1.5a.5.5 0 0 0-1 0v1a.5.5 0 0 0 1 0zm3.743 1.964a.5.5 0 1 0-.707-.707l-.708.707a.5.5 0 0 0 .708.708zm-7.779-.707a.5.5 0 0 0-.707.707l.707.708a.5.5 0 1 0 .708-.708zm1.734 3.374a2 2 0 1 1 3.296 2.198q.3.423.516.898a3 3 0 1 0-4.84-3.225q.529.017 1.028.129m4.484 4.074c.6.215 1.125.59 1.522 1.072a.5.5 0 0 0 .039-.742l-.707-.707a.5.5 0 0 0-.854.377M14.5 6.5a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1z" />
                    </svg>
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
                                        class="uk-margin-small-left"></span>{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}
                                </li>
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

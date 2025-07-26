<nav class="uk-navbar-container uk-box-shadow-small">
    <div class="uk-container uk-container-expand">
        <div class="uk-navbar" uk-navbar>
            <div class="uk-navbar-left">  <!-- RTL adjustment -->
                
                {{-- Mobile Menu Toggle --}}
                <a class="uk-navbar-toggle uk-hidden@m" uk-navbar-toggle-icon href="#offcanvas-menu" uk-toggle></a>
                
                {{-- Logo --}}
                <a href="{{ url('/') }}" class="uk-navbar-item uk-logo">
                    <span class="uk-text-bold">ساشیا</span>
                </a>
                
                {{-- Desktop Menu --}}
                <ul class="uk-navbar-nav uk-visible@m">
                    <li class="uk-active"><a href="#">خانه</a></li>
                    <li>
                        <a href="#">محصولات</a>
                        <div class="uk-navbar-dropdown">
                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                <li><a href="#">محصولات غذایی</a></li>
                                <li><a href="#">لوازم خانگی</a></li>
                                <li><a href="#">پوشاک</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="#">درباره ما</a></li>
                    <li><a href="#">تماس با ما</a></li>
                </ul>
            </div>

            <div class="uk-navbar-right">
                {{-- Search --}}
                <div class="uk-navbar-item">
                    <form class="uk-search uk-search-navbar">
                        <span uk-search-icon></span>
                        <input class="uk-search-input" type="search" placeholder="جستجو...">
                    </form>
                </div>
                
                {{-- Dark Mode Toggle --}}
                <div class="uk-navbar-item">
                    <button id="darkModeToggle" class="uk-button uk-button-default uk-button-small" uk-tooltip="تغییر حالت شب">
                        <span class="dark-mode-icon">🌙</span>
                        <span class="light-mode-icon uk-hidden">☀️</span>
                    </button>
                </div>
                
                {{-- User/Auth Actions --}}
                <div class="uk-navbar-item">
                    <a href="#" class="uk-button uk-button-text">
                        <span uk-icon="icon: user"></span>
                        <span class="uk-margin-small-right">ورود</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>

{{-- Mobile Offcanvas Menu --}}
<div id="offcanvas-menu" uk-offcanvas="flip: true; overlay: true">
    <div class="uk-offcanvas-bar uk-flex uk-flex-column">
        <button class="uk-offcanvas-close" type="button" uk-close></button>
        
        <div class="uk-card uk-card-default uk-card-body uk-margin-bottom">
            <h3 class="uk-card-title">منو</h3>
            <ul class="uk-nav uk-nav-default">
                <li class="uk-active"><a href="#">خانه</a></li>
                <li class="uk-parent">
                    <a href="#">محصولات</a>
                    <ul class="uk-nav-sub">
                        <li><a href="#">محصولات غذایی</a></li>
                        <li><a href="#">لوازم خانگی</a></li>
                        <li><a href="#">پوشاک</a></li>
                    </ul>
                </li>
                <li><a href="#">درباره ما</a></li>
                <li><a href="#">تماس با ما</a></li>
            </ul>
        </div>
        
        <div class="uk-card uk-card-default uk-card-body">
            <div class="uk-margin-bottom">
                <form class="uk-search uk-search-default uk-width-1-1">
                    <span uk-search-icon></span>
                    <input class="uk-search-input" type="search" placeholder="جستجو...">
                </form>
            </div>
            <div class="uk-flex uk-flex-between">
                <button id="mobileDarkModeToggle" class="uk-button uk-button-default uk-button-small">
                    <span class="dark-mode-icon">🌙 حالت شب</span>
                    <span class="light-mode-icon uk-hidden">☀️ حالت روز</span>
                </button>
                <a href="#" class="uk-button uk-button-primary uk-button-small">
                    <span uk-icon="icon: user"></span>
                    ورود
                </a>
            </div>
        </div>
    </div>
</div>
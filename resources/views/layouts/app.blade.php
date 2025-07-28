<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ساشیا')</title>
    
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/shabnam-font@v5.0.1/dist/font-face.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.23.11/dist/css/uikit.min.css">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
</head>

<body class="uk-height-viewport uk-flex uk-flex-column uk-animation-fade">

    <!-- Header -->
    <header class="uk-box-shadow-small">
        <div class="uk-container">
            <nav class="uk-navbar" uk-navbar>
                <div class="uk-navbar-left">
                    <a href="{{ url('/') }}" class="uk-navbar-item uk-logo">ساشیا</a>
                    <ul class="uk-navbar-nav uk-visible@m">
                        <li><a href="#">خانه</a></li>
                        <li><a href="#">محصولات</a></li>
                        <li><a href="#">درباره ما</a></li>
                        <li><a href="#">تماس با ما</a></li>
                    </ul>
                </div>
                <div class="uk-navbar-right">
                    <button id="darkModeToggle" class="uk-button uk-button-default uk-margin-left">🌙</button>
                    <a class="uk-navbar-toggle uk-hidden@m" uk-navbar-toggle-icon href="#offcanvas-menu" uk-toggle></a>
                </div>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="uk-flex-auto uk-margin-medium">
        <div class="uk-container">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="uk-section uk-section-secondary">
        @include('layouts.footer')
    </footer>

    <!-- Mobile Menu -->
    <div id="offcanvas-menu" uk-offcanvas>
        <div class="uk-offcanvas-bar">
            <ul class="uk-nav uk-nav-default">
                <li><a href="#">خانه</a></li>
                <li><a href="#">محصولات</a></li>
                <li><a href="#">درباره ما</a></li>
                <li><a href="#">تماس با ما</a></li>
            </ul>
        </div>
    </div>

    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.23.11/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.23.11/dist/js/uikit-icons.min.js"></script>
    <script>
        // Toggle Dark Mode
        document.addEventListener('DOMContentLoaded', () => {
            const toggle = document.getElementById('darkModeToggle');
            if (toggle) {
                toggle.addEventListener('click', () => {
                    document.body.classList.toggle('dark-mode');
                });
            }
        });
    </script>
</body>

</html>
<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ساشیا')</title>

    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/shabnam-font@v5.0.1/dist/font-face.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.23.11/dist/css/uikit.min.css">
    <!-- Light Theme (always loaded) -->
    <link rel="stylesheet" href="{{ asset('css/light-theme.css') }}">

    <!-- Dark Theme (loaded conditionally) -->
    <link rel="stylesheet" href="{{ asset('css/dark-theme.css') }}" id="darkTheme" disabled>
</head>

<body class="uk-height-viewport uk-flex uk-flex-column uk-animation-fade">

    <!-- Header -->
    <header class="uk-box-shadow-small" style="background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);">
        @include('layouts.header')
    </header>

    <!-- Main Content -->
    <main class="uk-flex-auto uk-margin-medium">
        <div class="uk-container">
            @include('layouts.partials.messages')
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
    <!-- Dark mode toggle script -->
    <script>
        document.getElementById('darkModeToggle').addEventListener('click', function() {
            const darkTheme = document.getElementById('darkTheme');
            const isDark = darkTheme.disabled;

            darkTheme.disabled = !isDark;
            localStorage.setItem('theme', isDark ? 'dark' : 'light');
            document.documentElement.setAttribute('data-theme', isDark ? 'dark' : 'light');
        });
    </script>
</body>

</html>

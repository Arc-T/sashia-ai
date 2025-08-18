<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ساشیا')</title>

    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/shabnam-font@v5.0.1/dist/font-face.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('uikit/dist/css/uikit-rtl.min.css') }}">
    <!-- Light Theme (always loaded) -->
    <link rel="stylesheet" href="{{ asset('css/theme/light-theme.css') }}">

    <!-- Dark Theme (loaded conditionally) -->
    <link rel="stylesheet" href="{{ asset('css/theme/dark-theme.css') }}" id="darkTheme" disabled>
    @stack('styles')
</head>

<body class="uk-height-viewport uk-flex uk-flex-column uk-animation-fade">

    <!-- Header -->
    <header class="uk-box-shadow-small uk-navbar-primary">
        @include('layouts.header')
    </header>

    <!-- Main Content -->
    <main class="uk-flex-auto uk-margin-medium">
        <div class="uk-container">
            @include('layouts.partials.messages')
            @yield('content')
        </div>
        <div id="mediaad-W29V9"></div>
    </main>

    <!-- Footer -->
    <footer>
        @include('layouts.footer')
    </footer>

    <!-- UIkit JS -->
    {{-- <script type="text/javascript">
        (function() {
            const head = document.getElementsByTagName("head")[0];
            const script = document.createElement("script");
            script.type = "text/javascript";
            script.async = true;
            script.src = "https://s1.mediaad.org/serve/sashia-ai.ir/loader.js";
            head.appendChild(script);
        })();
    </script> --}}
    <script src="{{ asset('uikit/dist/js/uikit-core.min.js') }}"></script>
    <script src="{{ asset('uikit/dist/js/uikit-icons.min.js') }}"></script>
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
    @stack('scripts')
</body>

</html>

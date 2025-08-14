<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ورود / ثبت نام | سامانه ما</title>

    <!-- UIkit CSS -->
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/shabnam-font@v5.0.1/dist/font-face.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('uikit/dist/css/uikit-rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/theme/light-theme.css') }}">
</head>

<body class="uk-background-muted uk-height-viewport uk-flex uk-flex-middle">
    <div class="uk-container uk-margin-auto-vertical">
        @include('layouts.partials.messages')
        <div class="uk-card uk-card-default uk-box-shadow-large uk-overflow-hidden">
            <div class="uk-grid-collapse" uk-grid>
                <!-- Hero Section -->
                <div
                    class="uk-width-1-3@m uk-background-primary uk-light uk-padding-large uk-flex uk-flex-column uk-flex-center">
                    <div>
                        <h2 class="uk-text-bold">به سامانه ما خوش آمدید</h2>
                        <p class="uk-margin-top">با ورود یا ثبت نام در سامانه از تمامی امکانات و خدمات ما بهره مند شوید.
                        </p>

                        <ul class="uk-list uk-list-divider uk-margin-medium-top">
                            <li class="uk-flex uk-flex-middle">
                                <span uk-icon="icon: check" class="uk-margin-small-left"></span>
                                <span>امنیت و حریم خصوصی</span>
                            </li>
                            <li class="uk-flex uk-flex-middle">
                                <span uk-icon="icon: check" class="uk-margin-small-left"></span>
                                <span>پشتیبانی 24 ساعته</span>
                            </li>
                            <li class="uk-flex uk-flex-middle">
                                <span uk-icon="icon: check" class="uk-margin-small-left"></span>
                                <span>رابط کاربری آسان</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Form Section -->
                <div class="uk-width-2-3@m">
                    <ul class="uk-flex-center" uk-tab>
                        <li class="uk-active"><a href="#">ورود به حساب</a></li>
                        <li><a href="#">ثبت نام</a></li>
                    </ul>

                    <ul class="uk-switcher uk-padding-large">
                        <!-- Login Form -->
                        <li>
                            <h3 class="uk-text-bold uk-margin-medium-bottom">ورود به حساب کاربری</h3>

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="uk-margin">
                                    <label class="uk-form-label" for="login-email">ایمیل</label>
                                    <div class="uk-inline uk-width-1-1">
                                        <span class="uk-form-icon" uk-icon="icon: mail"></span>
                                        <input class="uk-input" id="login-email" type="email" name="email"
                                            placeholder="example@domain.com" required autofocus>
                                    </div>
                                </div>

                                <div class="uk-margin">
                                    <label class="uk-form-label" for="login-password">رمز عبور</label>
                                    <div class="uk-inline uk-width-1-1">
                                        <span class="uk-form-icon" uk-icon="icon: lock" id="toggle-password"
                                            style="cursor: pointer;"></span>
                                        <input class="uk-input" id="login-password" type="password" name="password"
                                            placeholder="••••••••" required>
                                    </div>
                                </div>

                                <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
                                    <label>
                                        <input class="uk-checkbox" type="checkbox" name="remember"> مرا به خاطر بسپار
                                    </label>
                                </div>

                                <div class="uk-margin">
                                    <button type="submit"
                                        class="uk-button uk-button-primary uk-width-1-1">ورود</button>
                                </div>

                                <div class="uk-text-center uk-margin-top">
                                    <a href="{{ route('password.request') }}" class="uk-link-text">رمز عبور خود را
                                        فراموش کرده اید؟</a>
                                </div>
                            </form>

                            {{-- <div class="uk-margin-large-top">
                                <div class="uk-text-center uk-text-muted uk-margin-bottom">یا با استفاده از</div>
                                <div class="uk-flex uk-flex-center">
                                    <button class="uk-button uk-button-default uk-margin-small-right">
                                        <span uk-icon="icon: google"></span> گوگل
                                    </button>
                                    <button class="uk-button uk-button-default">
                                        <span uk-icon="icon: facebook"></span> فیسبوک
                                    </button>
                                </div>
                            </div> --}}
                        </li>

                        <!-- Register Form -->
                        <li>
                            <h3 class="uk-text-bold uk-margin-medium-bottom">ایجاد حساب کاربری</h3>

                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="uk-margin">
                                    <label class="uk-form-label" for="register-name">نام کامل</label>
                                    <div class="uk-inline uk-width-1-1">
                                        <span class="uk-form-icon" uk-icon="icon: user"></span>
                                        <input class="uk-input" id="register-name" type="text" name="name"
                                            placeholder="نام و نام خانوادگی" required autofocus>
                                    </div>
                                </div>

                                <div class="uk-margin">
                                    <label class="uk-form-label" for="register-email">ایمیل</label>
                                    <div class="uk-inline uk-width-1-1">
                                        <span class="uk-form-icon" uk-icon="icon: mail"></span>
                                        <input class="uk-input" id="register-email" type="email" name="email"
                                            placeholder="example@domain.com" required>
                                    </div>
                                </div>

                                <div class="uk-margin">
                                    <label class="uk-form-label" for="register-password">رمز عبور</label>
                                    <div class="uk-inline uk-width-1-1">
                                        <span class="uk-form-icon" uk-icon="icon: lock" id="toggle-register-password"
                                            style="cursor: pointer;"></span>
                                        <input class="uk-input" id="register-password" type="password"
                                            name="password" placeholder="••••••••" required>
                                    </div>
                                </div>

                                <div class="uk-margin">
                                    <label class="uk-form-label" for="register-password-confirm">تکرار رمز
                                        عبور</label>
                                    <div class="uk-inline uk-width-1-1">
                                        <span class="uk-form-icon" uk-icon="icon: lock"></span>
                                        <input class="uk-input" id="register-password-confirm" type="password"
                                            name="password_confirmation" placeholder="••••••••" required>
                                    </div>
                                </div>

                                <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
                                    <label>
                                        <input class="uk-checkbox" type="checkbox" required> با <a
                                            href="#">قوانین و مقررات</a> موافقم
                                    </label>
                                </div>

                                <div class="uk-margin">
                                    <button type="submit" class="uk-button uk-button-primary uk-width-1-1">ثبت
                                        نام</button>
                                </div>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.16.0/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.16.0/dist/js/uikit-icons.min.js"></script>
</body>

</html>

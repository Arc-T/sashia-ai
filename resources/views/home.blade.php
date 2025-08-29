@extends('layouts.app')
@section('title', 'ساشیا | صفحه اصلی')

@section('content')

    <!-- Hero Section with Gradient Background -->
    <div class="uk-section uk-section-primary uk-padding-remove-vertical uk-position-relative uk-overflow-hidden"
        style="background: linear-gradient(135deg, #00d2ff 0%, #3a7bd5 50%, #a43bdb 100%); border-radius:32px;">
        <!-- Animated background elements -->
        <div class="uk-position-cover" style="background: rgba(0,0,0,0.1);"></div>
        <div class="uk-position-top-right uk-visible@m" style="opacity: 0.15;">
            <div uk-parallax="bgy: -100; easing: -2" style="height: 800px; width: 800px;">
                <div class="uk-background-primary"
                    style="height: 100%; width: 100%; border-radius: 50%; background: rgba(255,255,255,0.1);"></div>
            </div>
        </div>

        <div class="uk-container uk-position-relative uk-padding-large uk-padding-remove-horizontal">
            <div class="uk-grid-match uk-child-width-1-2@m uk-flex-middle" uk-grid
                uk-scrollspy="cls: uk-animation-slide-bottom-medium; target: > div; delay: 150; repeat: true">
                <div class="uk-text-center uk-light">
                    <h1 class="uk-text-bold uk-margin-remove-bottom"
                        style="text-shadow: 0 2px 8px rgba(0,0,0,0.3); color: #fff;">خلاقیت
                        خود را آزاد کنید</h1>
                    <p class="uk-text-lead uk-margin-medium-bottom" style="color: rgba(255,255,255,0.9);">با مجموعه‌ای از
                        تصاویر الهام‌بخش، داستان‌نویسی را آغاز
                        نمایید</p>
                    <div class="uk-flex uk-flex-center">
                        <a href="#prompts"
                            class="uk-button uk-button-primary uk-button-large uk-border-pill uk-box-shadow-hover-large"
                            style="background: #fff; color: #3a7bd5;" uk-scroll uk-scrollspy-class="uk-animation-fade">
                            مشاهده پرامپت‌ها
                            <span uk-icon="icon: arrow-down" class="uk-margin-small-right"></span>
                        </a>
                    </div>
                </div>
                <div class="uk-text-center uk-visible@m">
                    <div class="uk-inline-clip uk-transition-toggle">
                        <img src="https://picsum.photos/id/1060/600/400" alt="نوشتن خلاقانه" width="500"
                            class="uk-box-shadow-xlarge uk-transition-scale-up uk-transition-opaque">
                        <div class="uk-transition-fade uk-position-cover uk-overlay uk-flex uk-flex-center uk-flex-middle"
                            style="opacity: 0; background: rgba(58,123,213,0.7);">
                            <span uk-icon="icon: search; ratio: 2" style="color: #fff;"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Prompts Gallery -->
    <div id="prompts" class="uk-section">
        <div class="uk-container uk-container-expand">
            <div class="uk-text-center uk-margin-large-bottom" uk-scrollspy="cls: uk-animation-fade; repeat: true">
                <h2 class="uk-heading-line"><span>پرامپت‌های تصویری</span></h2>
                <p class="uk-text-meta uk-text-muted">روی هر تصویر کلیک کنید تا پرامپت مربوطه نمایش داده شود</p>
            </div>

            <div class="uk-child-width-1-2@s uk-child-width-1-3@m uk-child-width-1-4@l uk-grid-medium"
                uk-grid="masonry: true" uk-lightbox="animation: slide"
                uk-scrollspy="target: > div; cls: uk-animation-scale-up; delay: 100; repeat: true">
                @foreach ($prompts as $prompt)
                    <div>
                        <div
                            class="uk-card uk-card-default uk-card-small uk-border-rounded-large uk-transition-toggle uk-box-shadow-hover-medium">
                            <div class="uk-card-media-top">
                                <img src="{{ $prompt['image'] }}" alt="{{ $prompt['title'] }}" width="400" height="300"
                                    class="uk-transition-scale-up uk-transition-opaque uk-border-rounded-large uk-border-rounded-bottom-none">
                                <div class="uk-position-top-right uk-margin-small-top uk-margin-small-right">
                                    <span class="uk-label uk-label-success uk-border-pill">جدید</span>
                                </div>
                            </div>
                            <div class="uk-card-body">
                                <h3 class="uk-card-title uk-margin-remove-bottom">{{ $prompt['title'] }}</h3>
                                <p class="uk-text-meta uk-margin-small-top">{{ Str::limit($prompt['description'], 80) }}</p>
                                <div class="uk-margin-top">
                                    <a href="#prompt-modal-{{ $loop->index }}"
                                        class="uk-button uk-button-text uk-text-primary" uk-toggle>
                                        مشاهده جزئیات <span uk-icon="icon: chevron-right"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="uk-section">
        <div class="uk-container">
            <div class="uk-text-center uk-margin-large-bottom" uk-scrollspy="cls: uk-animation-fade; repeat: true">
                <h2 class="uk-heading-line"><span>چرا ساشیا ؟</span></h2>
                <p class="uk-text-muted uk-width-2-3@m uk-margin-auto">امکانات منحصر به فرد ما برای همه ی افرادی که از هوش
                    مصنوعی استفاده می کنند</p>
            </div>

            <div class="uk-child-width-1-3@m uk-grid-match uk-grid-medium" uk-grid
                uk-scrollspy="target: > div; cls: uk-animation-slide-bottom-medium; delay: 150; repeat: true">
                <div>
                    <div
                        class="uk-card uk-card-default uk-card-body uk-text-center uk-border-rounded-large uk-box-shadow-hover-medium">
                        <div class="uk-inline uk-light">
                            <div class="uk-background-primary uk-border-circle"
                                style="width: 80px; height: 80px; margin: 0 auto;">
                                <span uk-icon="icon: image; ratio: 2" class="uk-position-center"></span>
                            </div>
                        </div>
                        <h3 class="uk-card-title uk-margin-small-top">تصاویر / کلیپ های الهام‌بخش</h3>
                        <p class="uk-text-muted">مجموعه‌ای منحصر به فرد برای ایجاد عکس و کلیپ - مناسب استفاده های شخصی و
                            تخصصی
                        </p>
                    </div>
                </div>
                <div>
                    <div
                        class="uk-card uk-card-default uk-card-body uk-text-center uk-border-rounded-large uk-box-shadow-hover-medium">
                        <div class="uk-inline uk-light">
                            <div class="uk-background-danger uk-border-circle"
                                style="width: 80px; height: 80px; margin: 0 auto;">
                                <span uk-icon="icon: pencil; ratio: 2" class="uk-position-center"></span>
                            </div>
                        </div>
                        <h3 class="uk-card-title uk-margin-small-top">پرامپت‌های حرفه‌ای</h3>
                        <p class="uk-text-muted">پرامپت‌های نوشتاری طراحی شده توسط نویسندگان حرفه ای - مناسب برای افراد
                            متخصص که قصد خروجی مطلوب تری دارند</p>
                    </div>
                </div>
                <div>
                    <div
                        class="uk-card uk-card-default uk-card-body uk-text-center uk-border-rounded-large uk-box-shadow-hover-medium">
                        <div class="uk-inline uk-light">
                            <div class="uk-background-success uk-border-circle"
                                style="width: 80px; height: 80px; margin: 0 auto;">
                                <span uk-icon="icon: check; ratio: 2" class="uk-position-center"></span>
                            </div>
                        </div>
                        <h3 class="uk-card-title uk-margin-small-top">تست و امتیاز دهی</h3>
                        <p class="uk-text-muted">تست و امتیاز دهی شده - تمامی پرامپت ها تست شده و خروجی آنها توسط کاربران
                            امتیاز دهی می شوند</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonials Section -->
    <div class="uk-section">
        <div class="uk-container">
            <div class="uk-text-center uk-margin-large-bottom" uk-scrollspy="cls: uk-animation-fade; repeat: true">
                <h2 class="uk-heading-line"><span>نظرات کاربران</span></h2>
            </div>

            <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider="autoplay: true">
                <ul class="uk-slider-items uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-3@m uk-grid-medium">
                    <li>
                        <div class="uk-card uk-card-default uk-card-body uk-border-rounded-large">
                            <div class="uk-grid-small uk-flex-middle" uk-grid>
                                <div class="uk-width-auto">
                                    <img class="uk-border-circle" width="60" height="60"
                                        src="https://randomuser.me/api/portraits/women/65.jpg">
                                </div>
                                <div class="uk-width-expand">
                                    <h3 class="uk-card-title uk-margin-remove-bottom">سارا محمدی</h3>
                                    <p class="uk-text-meta uk-margin-remove-top">نویسنده داستان‌های کوتاه</p>
                                </div>
                            </div>
                            <p class="uk-margin-top">پرامپت کرفت به من کمک کرد تا از بن‌بست نویسندگی خارج شوم. تصاویر و
                                سوالات الهام‌بخش واقعاً عالی هستند.</p>
                            <div class="uk-margin-top">
                                <span uk-icon="icon: star" class="uk-text-warning"></span>
                                <span uk-icon="icon: star" class="uk-text-warning"></span>
                                <span uk-icon="icon: star" class="uk-text-warning"></span>
                                <span uk-icon="icon: star" class="uk-text-warning"></span>
                                <span uk-icon="icon: star" class="uk-text-warning"></span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="uk-card uk-card-default uk-card-body uk-border-rounded-large">
                            <div class="uk-grid-small uk-flex-middle" uk-grid>
                                <div class="uk-width-auto">
                                    <img class="uk-border-circle" width="60" height="60"
                                        src="https://randomuser.me/api/portraits/men/32.jpg">
                                </div>
                                <div class="uk-width-expand">
                                    <h3 class="uk-card-title uk-margin-remove-bottom">رضا حسینی</h3>
                                    <p class="uk-text-meta uk-margin-remove-top">فیلمنامه‌نویس</p>
                                </div>
                            </div>
                            <p class="uk-margin-top">به عنوان یک فیلمنامه‌نویس، همیشه به دنبال ایده‌های تازه هستم. این سایت
                                منبع بی‌نظیری از الهامات بصری است.</p>
                            <div class="uk-margin-top">
                                <span uk-icon="icon: star" class="uk-text-warning"></span>
                                <span uk-icon="icon: star" class="uk-text-warning"></span>
                                <span uk-icon="icon: star" class="uk-text-warning"></span>
                                <span uk-icon="icon: star" class="uk-text-warning"></span>
                                <span uk-icon="icon: star" class="uk-text-warning"></span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="uk-card uk-card-default uk-card-body uk-border-rounded-large">
                            <div class="uk-grid-small uk-flex-middle" uk-grid>
                                <div class="uk-width-auto">
                                    <img class="uk-border-circle" width="60" height="60"
                                        src="https://randomuser.me/api/portraits/women/44.jpg">
                                </div>
                                <div class="uk-width-expand">
                                    <h3 class="uk-card-title uk-margin-remove-bottom">نازنین کریمی</h3>
                                    <p class="uk-text-meta uk-margin-remove-top">معلم خلاقیت</p>
                                </div>
                            </div>
                            <p class="uk-margin-top">از این سایت در کلاس‌هایم استفاده می‌کنم. دانش‌آموزان عاشق تصاویر و
                                پرامپت‌ها هستند و نتایج شگفت‌انگیز است.</p>
                            <div class="uk-margin-top">
                                <span uk-icon="icon: star" class="uk-text-warning"></span>
                                <span uk-icon="icon: star" class="uk-text-warning"></span>
                                <span uk-icon="icon: star" class="uk-text-warning"></span>
                                <span uk-icon="icon: star" class="uk-text-warning"></span>
                                <span uk-icon="icon: star" class="uk-text-warning"></span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- CTA Section with Parallax -->
    <div class="uk-section uk-section-primary uk-padding-large uk-position-relative uk-overflow-hidden uk-light"
        style="border-radius: 32px;" uk-parallax="bgy: -200; easing: -1">
        <div class="uk-position-cover uk-overlay-primary"></div>
        <div class="uk-container uk-position-relative">
            <div class="uk-width-2-3@m uk-margin-auto uk-text-center" uk-scrollspy="cls: uk-animation-fade; repeat: true">
                <h2 class="uk-heading-medium">آماده شروع نوشتن هستید؟</h2>
                <p class="uk-text-lead">به جامعه نویسندگان ما بپیوندید و مهارت‌های خود را پرورش دهید</p>
                <div class="uk-margin-medium-top">
                    <a href="#"
                        class="uk-button uk-button-secondary uk-button-large uk-border-pill uk-box-shadow-hover-large">
                        ثبت‌نام رایگان
                        <span uk-icon="icon: user" class="uk-margin-small-right"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

	
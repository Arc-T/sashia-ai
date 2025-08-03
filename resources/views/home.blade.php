@extends('layouts.app')
@section('title', 'همینجوری')

@section('content')

    <!-- Hero Section -->
    <div class="uk-section uk-section-primary uk-padding-remove-vertical" uk-parallax="bgy: -200">
        <div class="uk-container uk-position-relative">
            <div class="uk-grid-match uk-child-width-1-2@m uk-flex-middle" uk-grid
                uk-scrollspy="cls: uk-animation-slide-bottom; target: > div; delay: 150;">
                <div class="uk-text-center">
                    <h1 class="uk-text-bold uk-margin-remove-bottom">خلاقیت خود را آزاد کنید</h1>
                    <p class="uk-text-lead uk-margin-medium-bottom">با مجموعه‌ای از تصاویر الهام‌بخش، داستان‌نویسی را آغاز
                        نمایید</p>
                    <div class="uk-flex uk-flex-center">
                        <a href="#prompts" class="uk-button uk-button-secondary uk-button-large uk-border-pill"
                            uk-scroll>مشاهده
                            پرامپت‌ها</a>
                    </div>
                </div>
                <div class="uk-text-center">
                    <img src="https://picsum.photos/id/1060/600/400" alt="نوشتن خلاقانه" width="400"
                        class="uk-border-rounded-large uk-box-shadow-large">
                </div>
            </div>
        </div>
    </div>

    <!-- Prompts Gallery -->
    <div id="prompts" class="uk-section uk-section-default">
        <div class="uk-container">
            <div class="uk-text-center uk-margin-large-bottom" uk-scrollspy="cls: uk-animation-fade">
                <h2 class="uk-heading-line"><span>پرامپت‌های تصویری</span></h2>
                <p class="uk-text-meta">روی هر تصویر کلیک کنید تا پرامپت مربوطه نمایش داده شود</p>
            </div>

            <div class="uk-child-width-1-2@s uk-child-width-1-3@m uk-grid-medium" uk-grid
                uk-lightbox="animation: slide" uk-scrollspy="target: > div; cls: uk-animation-scale-up; delay: 100">
                @foreach ($prompts as $prompt)
                    <div>
                        <a class="uk-inline uk-transition-toggle" href="#prompt-modal-{{ $loop->index }}" uk-toggle>
                            <div class="uk-card uk-card-default uk-card-hover uk-transition-toggle">
                                <div class="uk-card-media-top">
                                    <img src="{{ $prompt['image'] }}" alt="{{ $prompt['title'] }}" width="400"
                                        height="300" class="uk-transition-scale-up uk-transition-opaque">
                                </div>
                                <div class="uk-card-body">
                                    <h3 class="uk-card-title uk-margin-remove-bottom">{{ $prompt['title'] }}</h3>
                                    <span class="uk-button uk-button-text uk-text-meta">کلیک برای مشاهده جزئیات</span>
                                </div>
                            </div>
                        </a>

                        <!-- Prompt Modal -->
                        <div id="prompt-modal-{{ $loop->index }}" uk-modal class="uk-modal-container">
                            <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
                                <button class="uk-modal-close-default" type="button" uk-close></button>
                                <div class="uk-grid-small" uk-grid>
                                    <div class="uk-width-1-3@m">
                                        <img src="{{ $prompt['image'] }}" alt="{{ $prompt['title'] }}"
                                            class="uk-border-rounded">
                                    </div>
                                    <div class="uk-width-2-3@m">
                                        <h2 class="uk-modal-title uk-margin-remove-top">{{ $prompt['title'] }}</h2>
                                        <div class="uk-margin">
                                            <h4 class="uk-heading-bullet">پرامپت نوشتاری:</h4>
                                            <p class="uk-text-lead">{{ $prompt['description'] }}</p>
                                        </div>
                                        <div class="uk-margin">
                                            <h4 class="uk-heading-bullet">سوالات الهام‌بخش:</h4>
                                            <ul class="uk-list uk-list-divider">
                                                @foreach ($prompt['questions'] as $question)
                                                    <li><span uk-icon="icon: question"></span> {{ $question }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-modal-footer uk-text-left">
                                    <button class="uk-button uk-button-primary uk-border-pill">ذخیره پرامپت</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="uk-section uk-section-muted uk-padding-large">
        <div class="uk-container">
            <div class="uk-text-center uk-margin-large-bottom" uk-scrollspy="cls: uk-animation-fade">
                <h2 class="uk-heading-line"><span>چرا پرامپت کرفت؟</span></h2>
            </div>

            <div class="uk-child-width-1-3@m uk-grid-match uk-grid-medium" uk-grid
                uk-scrollspy="target: > div; cls: uk-animation-slide-bottom; delay: 150">
                <div>
                    <div class="uk-card uk-card-default uk-card-hover uk-card-body uk-text-center uk-border-rounded-large">
                        <span uk-icon="icon: image; ratio: 2" class="uk-text-primary"></span>
                        <h3 class="uk-card-title uk-margin-small-top">تصاویر الهام‌بخش</h3>
                        <p class="uk-text-muted">مجموعه‌ای منحصر به فرد از تصاویر با کیفیت برای تحریک خلاقیت شما</p>
                    </div>
                </div>
                <div>
                    <div class="uk-card uk-card-default uk-card-hover uk-card-body uk-text-center uk-border-rounded-large">
                        <span uk-icon="icon: pencil; ratio: 2" class="uk-text-primary"></span>
                        <h3 class="uk-card-title uk-margin-small-top">پرامپت‌های حرفه‌ای</h3>
                        <p class="uk-text-muted">پرامپت‌های نوشتاری طراحی شده توسط نویسندگان حرفه‌ای</p>
                    </div>
                </div>
                <div>
                    <div class="uk-card uk-card-default uk-card-hover uk-card-body uk-text-center uk-border-rounded-large">
                        <span uk-icon="icon: settings; ratio: 2" class="uk-text-primary"></span>
                        <h3 class="uk-card-title uk-margin-small-top">ابزارهای پیشرفته</h3>
                        <p class="uk-text-muted">امکان ذخیره پرامپت‌های مورد علاقه و مدیریت آنها</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="uk-section uk-section-secondary uk-padding-large">
        <div class="uk-container uk-text-center">
            <div uk-scrollspy="cls: uk-animation-fade">
                <h2 class="uk-heading-medium">آماده شروع نوشتن هستید؟</h2>
                <p class="uk-text-lead uk-width-2-3@m uk-margin-auto">به جامعه نویسندگان ما بپیوندید و مهارت‌های خود را
                    پرورش دهید</p>
                <a href="#" class="uk-button uk-button-primary uk-button-large uk-border-pill uk-margin-medium-top"
                    uk-scrollspy-class="uk-animation-fade">ثبت‌نام رایگان</a>
            </div>
        </div>
    </div>
    
@endsection

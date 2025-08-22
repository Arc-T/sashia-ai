@extends('layouts.app')

@section('content')
    <div class="uk-container">
        {{-- Advanced Prompt Analysis Section --}}
        <section class="uk-section uk-section-small">
            <div class="uk-container">
                <h1 class="uk-heading-medium uk-text-center">ابزارهای پیشرفته پرومپت‌نویسی</h1>

                <ul class="uk-subnav uk-subnav-pill uk-flex-center" uk-switcher="animation: uk-animation-fade;">
                    <li><a href="#"><span uk-icon="icon: search"></span> تحلیل پرومپت</a></li>
                    <li><a href="#"><span uk-icon="icon: bolt"></span> سازنده هوشمند</a></li>
                    <li><a href="#"><span uk-icon="icon: question"></span> راهنمای من</a></li>
                    <li><a href="#"><span uk-icon="icon: database"></span> کتابخانه پرومپت‌ها</a>
                </ul>

                <ul class="uk-switcher uk-margin-large-top">
                    {{-- Prompt Analysis Tab --}}
                    <li>
                        <div class="uk-grid-large" uk-grid>
                            <div class="uk-width-1-2@m">
                                <div
                                    class="uk-card uk-card-default uk-card-body uk-card-hover uk-border-rounded uk-box-shadow-medium">
                                    <div class="uk-card-badge uk-label uk-label-success">جدید</div>
                                    <h3 class="uk-card-title uk-text-bold">
                                        <span uk-icon="icon: search; ratio: 1.2"></span>
                                        تحلیل پرومپت شما
                                    </h3>
                                    <form class="uk-form-stacked" id="prompt-analysis-form">
                                        <div class="uk-margin">
                                            <label class="uk-form-label uk-text-bold">مدل هوش مصنوعی</label>
                                            <div class="uk-form-controls">
                                                <select class="uk-select uk-form-large" id="ai-model-select">
                                                    <option value="gpt-4">ChatGPT-4 Turbo</option>
                                                    <option value="claude-3">Claude 3 Opus</option>
                                                    <option value="gemini-pro">Gemini Pro 1.5</option>
                                                    <option value="midjourney">Midjourney v6</option>
                                                    <option value="dalle-3">DALL-E 3</option>
                                                    <option value="custom">مدل سفارشی...</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="uk-margin">
                                            <div class="uk-flex uk-flex-between uk-flex-middle">
                                                <label class="uk-form-label uk-text-bold">پرومپت خود را وارد
                                                    کنید</label>
                                                <div>
                                                    <button type="button"
                                                        class="uk-button uk-button-text uk-text-muted uk-button-small"
                                                        uk-tooltip="پرومپت نمونه" id="load-sample-prompt">
                                                        <span uk-icon="icon: download"></span> نمونه آماده
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="uk-form-controls">
                                                <div class="uk-inline uk-width-1-1">
                                                    <textarea class="uk-textarea uk-form-large" rows="8" placeholder="پرومپت خود را اینجا بنویسید..."
                                                        id="prompt-textarea" style="resize: vertical;"></textarea>
                                                    <div class="uk-position-bottom-right uk-position-small">
                                                        <span class="uk-text-meta" id="char-count">0/2000</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="uk-margin">
                                            <div class="uk-grid-small" uk-grid>
                                                <div class="uk-width-expand">
                                                    <button class="uk-button uk-button-primary uk-button-large uk-width-1-1"
                                                        type="submit">
                                                        <span uk-icon="icon: search"></span> تحلیل کن
                                                    </button>
                                                </div>
                                                <div class="uk-width-auto">
                                                    <button class="uk-button uk-button-default uk-button-large"
                                                        type="button" uk-tooltip="تنظیمات پیشرفته">
                                                        <span uk-icon="icon: cog"></span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="uk-margin-top">
                                    <div class="uk-card uk-card-default uk-card-body uk-border-rounded">
                                        <h4 class="uk-card-title">پرومپت‌های اخیر</h4>
                                        <div class="uk-grid-small" uk-grid>
                                            <div class="uk-width-1-2@s">
                                                <div
                                                    class="uk-card uk-card-small uk-card-secondary uk-card-body uk-border-rounded uk-card-hover">
                                                    <div class="uk-grid-small uk-flex-middle" uk-grid>
                                                        <div class="uk-width-auto">
                                                            <span uk-icon="icon: file-text; ratio: 1.2"></span>
                                                        </div>
                                                        <div class="uk-width-expand">
                                                            <h5 class="uk-margin-remove-bottom">درخواست مقاله علمی</h5>
                                                            <p class="uk-text-meta uk-margin-remove-top">امروز، ۱۴:۳۰
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="uk-width-1-2@s">
                                                <div
                                                    class="uk-card uk-card-small uk-card-secondary uk-card-body uk-border-rounded uk-card-hover">
                                                    <div class="uk-grid-small uk-flex-middle" uk-grid>
                                                        <div class="uk-width-auto">
                                                            <span uk-icon="icon: image; ratio: 1.2"></span>
                                                        </div>
                                                        <div class="uk-width-expand">
                                                            <h5 class="uk-margin-remove-bottom">طراحی لوگو مدرن</h5>
                                                            <p class="uk-text-meta uk-margin-remove-top">دیروز، ۰۹:۱۵
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="uk-width-1-2@m">
                                <div class="uk-card uk-card-default uk-card-body uk-border-rounded uk-box-shadow-medium">
                                    <h3 class="uk-card-title uk-text-bold">
                                        <span uk-icon="icon: file-text; ratio: 1.2"></span>
                                        نتایج تحلیل
                                    </h3>

                                    <div id="empty-state" class="uk-text-center uk-padding">
                                        <div class="uk-margin">
                                            <span uk-icon="icon: search; ratio: 3"></span>
                                        </div>
                                        <h4 class="uk-text-muted">هنوز پرومپتی تحلیل نشده است</h4>
                                        <p class="uk-text-muted">پرومپت خود را وارد کرده و روی دکمه "تحلیل کن" کلیک
                                            کنید</p>
                                    </div>

                                    <div id="analysis-results" hidden>
                                        <div class="uk-grid-small" uk-grid>
                                            <div class="uk-width-1-2@s">
                                                <div
                                                    class="uk-card uk-card-small uk-card-primary uk-card-body uk-border-rounded uk-box-shadow-hover-small">
                                                    <div class="uk-grid-small uk-flex-middle" uk-grid>
                                                        <div class="uk-width-auto">
                                                            <span uk-icon="icon: info; ratio: 1.5"></span>
                                                        </div>
                                                        <div class="uk-width-expand">
                                                            <h4 class="uk-margin-remove-bottom">وضوح</h4>
                                                            <div class="uk-margin-small-top">
                                                                <div class="uk-progress">
                                                                    <div class="uk-progress-bar" style="width: 85%">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="uk-width-1-2@s">
                                                <div
                                                    class="uk-card uk-card-small uk-card-primary uk-card-body uk-border-rounded uk-box-shadow-hover-small">
                                                    <div class="uk-grid-small uk-flex-middle" uk-grid>
                                                        <div class="uk-width-auto">
                                                            <span uk-icon="icon: bolt; ratio: 1.5"></span>
                                                        </div>
                                                        <div class="uk-width-expand">
                                                            <h4 class="uk-margin-remove-bottom">کارایی</h4>
                                                            <div class="uk-margin-small-top">
                                                                <div class="uk-progress">
                                                                    <div class="uk-progress-bar" style="width: 72%">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="uk-width-1-2@s">
                                                <div
                                                    class="uk-card uk-card-small uk-card-primary uk-card-body uk-border-rounded uk-box-shadow-hover-small">
                                                    <div class="uk-grid-small uk-flex-middle" uk-grid>
                                                        <div class="uk-width-auto">
                                                            <span uk-icon="icon: code; ratio: 1.5"></span>
                                                        </div>
                                                        <div class="uk-width-expand">
                                                            <h4 class="uk-margin-remove-bottom">ساختار</h4>
                                                            <div class="uk-margin-small-top">
                                                                <div class="uk-progress">
                                                                    <div class="uk-progress-bar" style="width: 64%">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="uk-width-1-2@s">
                                                <div
                                                    class="uk-card uk-card-small uk-card-primary uk-card-body uk-border-rounded uk-box-shadow-hover-small">
                                                    <div class="uk-grid-small uk-flex-middle" uk-grid>
                                                        <div class="uk-width-auto">
                                                            <span uk-icon="icon: star; ratio: 1.5"></span>
                                                        </div>
                                                        <div class="uk-width-expand">
                                                            <h4 class="uk-margin-remove-bottom">بهبودپذیری</h4>
                                                            <div class="uk-margin-small-top">
                                                                <div class="uk-progress">
                                                                    <div class="uk-progress-bar" style="width: 91%">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="uk-margin-top">
                                            <h4 class="uk-text-bold">پیشنهادات بهبود</h4>
                                            <ul class="uk-list uk-list-divider">
                                                <li>
                                                    <div class="uk-grid-small" uk-grid>
                                                        <div class="uk-width-auto">
                                                            <span class="uk-badge uk-badge-notification">۱</span>
                                                        </div>
                                                        <div class="uk-width-expand">
                                                            <p>سعی کنید دستورالعمل‌ها را به بخش‌های شماره‌دار تقسیم کنید
                                                            </p>
                                                            <button
                                                                class="uk-button uk-button-text uk-text-primary uk-button-small"
                                                                onclick="applySuggestion(1)">اعمال این پیشنهاد</button>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="uk-grid-small" uk-grid>
                                                        <div class="uk-width-auto">
                                                            <span class="uk-badge uk-badge-notification">۲</span>
                                                        </div>
                                                        <div class="uk-width-expand">
                                                            <p>مثال‌های مشخص به نتایج بهتری منجر می‌شوند</p>
                                                            <button
                                                                class="uk-button uk-button-text uk-text-primary uk-button-small"
                                                                onclick="applySuggestion(2)">اعمال این پیشنهاد</button>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="uk-grid-small" uk-grid>
                                                        <div class="uk-width-auto">
                                                            <span class="uk-badge uk-badge-notification">۳</span>
                                                        </div>
                                                        <div class="uk-width-expand">
                                                            <p>برای نتایج بهتر، سبک خروجی را مشخص کنید</p>
                                                            <button
                                                                class="uk-button uk-button-text uk-text-primary uk-button-small"
                                                                onclick="applySuggestion(3)">اعمال این پیشنهاد</button>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="uk-margin-top">
                                            <div class="uk-flex uk-flex-between uk-flex-middle">
                                                <h4 class="uk-text-bold">نسخه بهینه‌شده</h4>
                                                <div>
                                                    <button class="uk-button uk-button-text uk-text-primary"
                                                        onclick="copyToClipboard('optimized-prompt')">
                                                        <span uk-icon="icon: copy"></span> کپی پرومپت
                                                    </button>
                                                    <button class="uk-button uk-button-text uk-text-primary"
                                                        onclick="savePrompt()">
                                                        <span uk-icon="icon: download"></span> ذخیره
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="uk-background-muted uk-padding uk-border-rounded">
                                                <pre class="uk-margin-remove"><code class="language-prompt" id="optimized-prompt"></code></pre>
                                            </div>
                                        </div>

                                        <div class="uk-margin-top">
                                            <button class="uk-button uk-button-default uk-width-1-1"
                                                onclick="regeneratePrompt()">
                                                <span uk-icon="icon: refresh"></span> تولید مجدد نسخه بهینه
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    {{-- Smart Builder Tab --}}
                    <li>
                        <div class="uk-grid-large" uk-grid>
                            <div class="uk-width-1-3@m">
                                <div class="uk-card uk-card-default uk-card-body uk-border-rounded uk-box-shadow-medium">
                                    <h3 class="uk-card-title uk-text-bold">انتخاب دسته‌بندی</h3>
                                    <div class="uk-margin">
                                        <input class="uk-input" type="text" placeholder="جستجو در دسته‌بندی‌ها...">
                                    </div>
                                    <ul class="uk-nav uk-nav-default">
                                        <li class="uk-active">
                                            <a href="#">
                                                <span uk-icon="icon: mail"></span>
                                                ایمیل‌نویسی
                                                <span class="uk-label uk-margin-small-right">۲۴</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span uk-icon="icon: social"></span>
                                                پست‌های شبکه‌اجتماعی
                                                <span class="uk-label uk-margin-small-right">۱۸</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span uk-icon="icon: code"></span>
                                                کدنویسی
                                                <span class="uk-label uk-margin-small-right">۳۲</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span uk-icon="icon: file-text"></span>
                                                خلاصه‌نویسی
                                                <span class="uk-label uk-margin-small-right">۱۲</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span uk-icon="icon: image"></span>
                                                تولید تصویر
                                                <span class="uk-label uk-margin-small-right">۲۷</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span uk-icon="icon: database"></span>
                                                سایر موارد
                                                <span class="uk-label uk-margin-small-right">۴۵</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="uk-margin-top">
                                    <div class="uk-card uk-card-default uk-card-body uk-border-rounded">
                                        <h4 class="uk-card-title">پرومپت‌های ذخیره شده</h4>
                                        <div class="uk-grid-small" uk-grid>
                                            <div class="uk-width-1-1">
                                                <div
                                                    class="uk-card uk-card-small uk-card-secondary uk-card-body uk-border-rounded uk-card-hover">
                                                    <div class="uk-grid-small uk-flex-middle" uk-grid>
                                                        <div class="uk-width-auto">
                                                            <span uk-icon="icon: file-text; ratio: 1.2"></span>
                                                        </div>
                                                        <div class="uk-width-expand">
                                                            <h5 class="uk-margin-remove-bottom">درخواست افزایش حقوق
                                                            </h5>
                                                            <p class="uk-text-meta uk-margin-remove-top">۲ روز پیش</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="uk-width-1-1">
                                                <div
                                                    class="uk-card uk-card-small uk-card-secondary uk-card-body uk-border-rounded uk-card-hover">
                                                    <div class="uk-grid-small uk-flex-middle" uk-grid>
                                                        <div class="uk-width-auto">
                                                            <span uk-icon="icon: social; ratio: 1.2"></span>
                                                        </div>
                                                        <div class="uk-width-expand">
                                                            <h5 class="uk-margin-remove-bottom">پست معرفی محصول</h5>
                                                            <p class="uk-text-meta uk-margin-remove-top">۱ هفته پیش</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="uk-width-2-3@m">
                                <div class="uk-card uk-card-default uk-card-body uk-border-rounded uk-box-shadow-medium">
                                    <div class="uk-card-badge uk-label uk-label-warning">پیشنهاد شده</div>
                                    <h3 class="uk-card-title uk-text-bold">
                                        <span uk-icon="icon: bolt; ratio: 1.2"></span>
                                        سازنده پرومپت هوشمند
                                    </h3>
                                    <p class="uk-text-meta">فیلدهای زیر را پر کنید تا پرومپت شما ساخته شود</p>

                                    <form class="uk-form-stacked" id="smart-builder-form">
                                        <div class="uk-margin">
                                            <label class="uk-form-label uk-text-bold">نوع ایمیل</label>
                                            <div class="uk-form-controls">
                                                <select class="uk-select">
                                                    <option>رسمی/تجاری</option>
                                                    <option>غیررسمی</option>
                                                    <option>پیگیری</option>
                                                    <option>شکایت</option>
                                                    <option>درخواست همکاری</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="uk-margin">
                                            <label class="uk-form-label uk-text-bold">گیرنده ایمیل</label>
                                            <div class="uk-form-controls">
                                                <input class="uk-input" type="text"
                                                    placeholder="مثلا: مدیر منابع انسانی">
                                            </div>
                                        </div>

                                        <div class="uk-margin">
                                            <label class="uk-form-label uk-text-bold">موضوع اصلی</label>
                                            <div class="uk-form-controls">
                                                <input class="uk-input" type="text" placeholder="مثلا: درخواست مرخصی">
                                            </div>
                                        </div>

                                        <div class="uk-margin">
                                            <label class="uk-form-label uk-text-bold">جزئیات (اختیاری)</label>
                                            <div class="uk-form-controls">
                                                <textarea class="uk-textarea" rows="3" placeholder="هر اطلاعات اضافه که می‌خواهید شامل شود"></textarea>
                                            </div>
                                        </div>

                                        <div class="uk-margin">
                                            <label class="uk-form-label uk-text-bold">سبک نگارش</label>
                                            <div class="uk-form-controls">
                                                <select class="uk-select">
                                                    <option>رسمی</option>
                                                    <option>دوستانه</option>
                                                    <option>متقاعدکننده</option>
                                                    <option>مختصر</option>
                                                    <option>جزئی‌نگر</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="uk-margin">
                                            <label class="uk-form-label uk-text-bold">تنظیمات پیشرفته</label>
                                            <div class="uk-form-controls">
                                                <div uk-grid>
                                                    <div class="uk-width-1-2@s">
                                                        <label><input class="uk-checkbox" type="checkbox"> شامل مثال
                                                            باشد</label>
                                                    </div>
                                                    <div class="uk-width-1-2@s">
                                                        <label><input class="uk-checkbox" type="checkbox"> ساختار
                                                            شماره‌دار داشته باشد</label>
                                                    </div>
                                                    <div class="uk-width-1-2@s">
                                                        <label><input class="uk-checkbox" type="checkbox"> نکات کلیدی
                                                            برجسته شود</label>
                                                    </div>
                                                    <div class="uk-width-1-2@s">
                                                        <label><input class="uk-checkbox" type="checkbox"> خلاصه در
                                                            پایان اضافه شود</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="uk-margin">
                                            <div class="uk-grid-small" uk-grid>
                                                <div class="uk-width-expand">
                                                    <button
                                                        class="uk-button uk-button-primary uk-button-large uk-width-1-1"
                                                        type="submit">
                                                        <span uk-icon="icon: bolt"></span> ساخت پرومپت
                                                    </button>
                                                </div>
                                                <div class="uk-width-auto">
                                                    <button class="uk-button uk-button-default uk-button-large"
                                                        type="button" uk-tooltip="تنظیمات پیشرفته">
                                                        <span uk-icon="icon: cog"></span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    <div id="generated-prompt" class="uk-margin-top" hidden>
                                        <hr>
                                        <div class="uk-flex uk-flex-between uk-flex-middle">
                                            <h4 class="uk-text-bold">پرومپت تولید شده</h4>
                                            <div>
                                                <button class="uk-button uk-button-text uk-text-primary"
                                                    onclick="copyToClipboard('smart-prompt-output')">
                                                    <span uk-icon="icon: copy"></span> کپی پرومپت
                                                </button>
                                                <button class="uk-button uk-button-text uk-text-primary"
                                                    onclick="savePrompt()">
                                                    <span uk-icon="icon: download"></span> ذخیره
                                                </button>
                                            </div>
                                        </div>
                                        <div class="uk-background-muted uk-padding uk-border-rounded">
                                            <pre class="uk-margin-remove"><code class="language-prompt" id="smart-prompt-output"></code></pre>
                                        </div>

                                        <div class="uk-margin-top">
                                            <div class="uk-grid-small" uk-grid>
                                                <div class="uk-width-1-2@s">
                                                    <button class="uk-button uk-button-default uk-width-1-1"
                                                        onclick="regeneratePrompt()">
                                                        <span uk-icon="icon: refresh"></span> تولید مجدد
                                                    </button>
                                                </div>
                                                <div class="uk-width-1-2@s">
                                                    <button class="uk-button uk-button-default uk-width-1-1"
                                                        onclick="analyzeGeneratedPrompt()">
                                                        <span uk-icon="icon: search"></span> تحلیل این پرومپت
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="uk-margin-top">
                                    <div class="uk-card uk-card-default uk-card-body uk-border-rounded">
                                        <h4 class="uk-card-title">پرومپت‌های پیشنهادی</h4>
                                        <div class="uk-child-width-1-2@m" uk-grid>
                                            <div>
                                                <div
                                                    class="uk-card uk-card-small uk-card-secondary uk-card-body uk-border-rounded uk-card-hover">
                                                    <div class="uk-grid-small uk-flex-middle" uk-grid>
                                                        <div class="uk-width-auto">
                                                            <span uk-icon="icon: mail; ratio: 1.2"></span>
                                                        </div>
                                                        <div class="uk-width-expand">
                                                            <h5 class="uk-margin-remove-bottom">درخواست جلسه فوری</h5>
                                                            <p class="uk-text-meta uk-margin-remove-top">ایمیل رسمی</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div
                                                    class="uk-card uk-card-small uk-card-secondary uk-card-body uk-border-rounded uk-card-hover">
                                                    <div class="uk-grid-small uk-flex-middle" uk-grid>
                                                        <div class="uk-width-auto">
                                                            <span uk-icon="icon: social; ratio: 1.2"></span>
                                                        </div>
                                                        <div class="uk-width-expand">
                                                            <h5 class="uk-margin-remove-bottom">پست معرفی تیم</h5>
                                                            <p class="uk-text-meta uk-margin-remove-top">لینکدین</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    {{-- Guide Me Tab --}}
                    <li>
                        <div class="uk-grid-large" uk-grid>
                            <div class="uk-width-1-3@m">
                                <div class="uk-card uk-card-default uk-card-body uk-border-rounded uk-box-shadow-medium">
                                    <h3 class="uk-card-title uk-text-bold">راهنمای گام به گام</h3>
                                    <div class="uk-margin">
                                        <input class="uk-input" type="text" placeholder="جستجو در راهنماها...">
                                    </div>
                                    <p class="uk-text-bold">من می‌خواهم...</p>
                                    <ul class="uk-nav uk-nav-default">
                                        <li class="uk-active">
                                            <a href="#">
                                                <span uk-icon="icon: pencil"></span>
                                                یاد بگیرم چگونه پرومپت بنویسم
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span uk-icon="icon: image"></span>
                                                پرومپت‌های بهتری برای تصاویر ایجاد کنم
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span uk-icon="icon: code"></span>
                                                نتایج مدل‌های متنی را بهبود دهم
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span uk-icon="icon: database"></span>
                                                از متغیرها در پرومپت‌ها استفاده کنم
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span uk-icon="icon: settings"></span>
                                                پرومپت‌های تخصصی برای کارم ایجاد کنم
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="uk-margin-top">
                                    <div class="uk-card uk-card-default uk-card-body uk-border-rounded">
                                        <h4 class="uk-card-title">دوره‌های آموزشی</h4>
                                        <div class="uk-grid-small" uk-grid>
                                            <div class="uk-width-1-1">
                                                <div
                                                    class="uk-card uk-card-small uk-card-secondary uk-card-body uk-border-rounded uk-card-hover">
                                                    <div class="uk-grid-small uk-flex-middle" uk-grid>
                                                        <div class="uk-width-auto">
                                                            <span uk-icon="icon: play-circle; ratio: 1.2"></span>
                                                        </div>
                                                        <div class="uk-width-expand">
                                                            <h5 class="uk-margin-remove-bottom">اصول پرومپت‌نویسی</h5>
                                                            <p class="uk-text-meta uk-margin-remove-top">۱۲ درس</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="uk-width-1-1">
                                                <div
                                                    class="uk-card uk-card-small uk-card-secondary uk-card-body uk-border-rounded uk-card-hover">
                                                    <div class="uk-grid-small uk-flex-middle" uk-grid>
                                                        <div class="uk-width-auto">
                                                            <span uk-icon="icon: play-circle; ratio: 1.2"></span>
                                                        </div>
                                                        <div class="uk-width-expand">
                                                            <h5 class="uk-margin-remove-bottom">پرومپت‌های پیشرفته</h5>
                                                            <p class="uk-text-meta uk-margin-remove-top">۸ درس</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="uk-width-2-3@m">
                                <div class="uk-card uk-card-default uk-card-body uk-border-rounded uk-box-shadow-medium">
                                    <h3 class="uk-card-title uk-text-bold">
                                        <span uk-icon="icon: question; ratio: 1.2"></span>
                                        آموزش نوشتن پرومپت‌های مؤثر
                                    </h3>

                                    <div class="uk-alert-primary" uk-alert>
                                        <p>این راهنما شما را در ۵ مرحله ساده به نوشتن پرومپت‌های حرفه‌ای راهنمایی
                                            می‌کند.</p>
                                    </div>

                                    <div class="uk-margin">
                                        <div class="uk-grid-small" uk-grid>
                                            <div class="uk-width-expand">
                                                <div class="uk-search uk-search-default uk-width-1-1">
                                                    <span uk-search-icon></span>
                                                    <input class="uk-search-input" type="search"
                                                        placeholder="جستجو در راهنما...">
                                                </div>
                                            </div>
                                            <div class="uk-width-auto">
                                                <button class="uk-button uk-button-default">فیلترها</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div uk-accordion="multiple: true">
                                        <div class="uk-open">
                                            <a class="uk-accordion-title uk-text-bold" href="#">
                                                <span uk-icon="icon: chevron-down"></span>
                                                ۱. هدف خود را مشخص کنید
                                            </a>
                                            <div class="uk-accordion-content">
                                                <p>قبل از نوشتن پرومپت، دقیقاً مشخص کنید چه نتیجه‌ای می‌خواهید. آیا به
                                                    دنبال:</p>
                                                <ul class="uk-list uk-list-bullet">
                                                    <li>پاسخ اطلاعاتی هستید؟</li>
                                                    <li>خلق محتوای خلاقانه می‌خواهید؟</li>
                                                    <li>تحلیل یا پردازش داده نیاز دارید؟</li>
                                                </ul>
                                                <div class="uk-margin-top">
                                                    <button class="uk-button uk-button-text uk-text-primary">نمونه‌های
                                                        هدف‌گذاری</button>
                                                </div>

                                                <div class="uk-margin-top">
                                                    <div class="uk-card uk-card-default uk-card-body uk-border-rounded">
                                                        <h5 class="uk-card-title">تمرین عملی</h5>
                                                        <p>هدف خود از پرومپت زیر را مشخص کنید:</p>
                                                        <div class="uk-background-muted uk-padding uk-border-rounded">
                                                            <pre><code>"در مورد هوش مصنوعی برایم بنویس"</code></pre>
                                                        </div>
                                                        <div class="uk-margin-top">
                                                            <button
                                                                class="uk-button uk-button-primary uk-button-small">نمایش
                                                                پاسخ</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <a class="uk-accordion-title uk-text-bold" href="#">
                                                <span uk-icon="icon: chevron-down"></span>
                                                ۲. زمینه و چارچوب ارائه دهید
                                            </a>
                                            <div class="uk-accordion-content">
                                                <p>به مدل کمک کنید نقش و تخصص خود را بشناسد. مثلاً:</p>
                                                <pre><code>"شما یک متخصص بازاریابی دیجیتال با ۱۰ سال تجربه هستید..."</code></pre>
                                                <div class="uk-margin-top">
                                                    <button class="uk-button uk-button-text uk-text-primary">مشاهده
                                                        قالب‌های آماده</button>
                                                </div>

                                                <div class="uk-margin-top">
                                                    <div class="uk-card uk-card-default uk-card-body uk-border-rounded">
                                                        <h5 class="uk-card-title">تمرین عملی</h5>
                                                        <p>پرومپت زیر را با اضافه کردن زمینه بهبود دهید:</p>
                                                        <div class="uk-background-muted uk-padding uk-border-rounded">
                                                            <pre><code>"راهکارهایی برای افزایش فروش پیشنهاد دهید"</code></pre>
                                                        </div>
                                                        <div class="uk-margin-top">
                                                            <button
                                                                class="uk-button uk-button-primary uk-button-small">نمایش
                                                                پاسخ</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <a class="uk-accordion-title uk-text-bold" href="#">
                                                <span uk-icon="icon: chevron-down"></span>
                                                ۳. دستورالعمل‌ها را شفاف بیان کنید
                                            </a>
                                            <div class="uk-accordion-content">
                                                <p>از جملات واضح و ساختارمند استفاده کنید:</p>
                                                <ul class="uk-list uk-list-bullet">
                                                    <li>دستورات را شماره‌گذاری کنید</li>
                                                    <li>از فعل‌های امری استفاده کنید</li>
                                                    <li>مثال‌های مشخص بزنید</li>
                                                </ul>

                                                <div class="uk-margin-top">
                                                    <div class="uk-card uk-card-default uk-card-body uk-border-rounded">
                                                        <h5 class="uk-card-title">تمرین عملی</h5>
                                                        <p>پرومپت زیر را با اضافه کردن دستورالعمل‌های شفاف بهبود دهید:
                                                        </p>
                                                        <div class="uk-background-muted uk-padding uk-border-rounded">
                                                            <pre><code>"در مورد تاریخ ایران بنویس"</code></pre>
                                                        </div>
                                                        <div class="uk-margin-top">
                                                            <button
                                                                class="uk-button uk-button-primary uk-button-small">نمایش
                                                                پاسخ</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="uk-margin-top">
                                        <h4 class="uk-text-bold">تمرین عملی</h4>
                                        <div class="uk-grid-small" uk-grid>
                                            <div class="uk-width-3-4@s">
                                                <input class="uk-input" type="text"
                                                    placeholder="پرومپت خود را اینجا بنویسید...">
                                            </div>
                                            <div class="uk-width-1-4@s">
                                                <button class="uk-button uk-button-primary uk-width-1-1">بررسی
                                                    کن</button>
                                            </div>
                                        </div>

                                        <div class="uk-margin-top">
                                            <div class="uk-card uk-card-default uk-card-body uk-border-rounded">
                                                <h5 class="uk-card-title">نتیجه بررسی</h5>
                                                <div class="uk-grid-small" uk-grid>
                                                    <div class="uk-width-1-2@s">
                                                        <div
                                                            class="uk-card uk-card-small uk-card-primary uk-card-body uk-border-rounded">
                                                            <div class="uk-grid-small uk-flex-middle" uk-grid>
                                                                <div class="uk-width-auto">
                                                                    <span uk-icon="icon: check; ratio: 1.2"></span>
                                                                </div>
                                                                <div class="uk-width-expand">
                                                                    <h6 class="uk-margin-remove-bottom">نقاط قوت</h6>
                                                                    <ul
                                                                        class="uk-list uk-list-bullet uk-text-small uk-margin-remove-top">
                                                                        <li>هدف مشخص است</li>
                                                                        <li>زمینه مناسب دارد</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="uk-width-1-2@s">
                                                        <div
                                                            class="uk-card uk-card-small uk-card-secondary uk-card-body uk-border-rounded">
                                                            <div class="uk-grid-small uk-flex-middle" uk-grid>
                                                                <div class="uk-width-auto">
                                                                    <span uk-icon="icon: warning; ratio: 1.2"></span>
                                                                </div>
                                                                <div class="uk-width-expand">
                                                                    <h6 class="uk-margin-remove-bottom">نیاز به بهبود
                                                                    </h6>
                                                                    <ul
                                                                        class="uk-list uk-list-bullet uk-text-small uk-margin-remove-top">
                                                                        <li>دستورالعمل‌های شفاف‌تر</li>
                                                                        <li>مثال اضافه کنید</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    {{-- Prompt Library Tab --}}
                    <li>
                        <div class="uk-grid-large" uk-grid>
                            <div class="uk-width-1-4@m">
                                <div class="uk-card uk-card-default uk-card-body uk-border-rounded uk-box-shadow-medium">
                                    <h3 class="uk-card-title uk-text-bold">فیلترها</h3>

                                    <div class="uk-margin">
                                        <label class="uk-form-label uk-text-bold">جستجو</label>
                                        <div class="uk-inline uk-width-1-1">
                                            <span class="uk-form-icon" uk-icon="icon: search"></span>
                                            <input class="uk-input" type="text" placeholder="جستجو در پرومپت‌ها...">
                                        </div>
                                    </div>

                                    <div class="uk-margin">
                                        <label class="uk-form-label uk-text-bold">دسته‌بندی</label>
                                        <div class="uk-form-controls">
                                            <select class="uk-select">
                                                <option>همه دسته‌بندی‌ها</option>
                                                <option>ایمیل‌نویسی</option>
                                                <option>شبکه‌های اجتماعی</option>
                                                <option>تولید محتوا</option>
                                                <option>کدنویسی</option>
                                                <option>تصویرسازی</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="uk-margin">
                                        <label class="uk-form-label uk-text-bold">مدل هوش مصنوعی</label>
                                        <div class="uk-form-controls">
                                            <select class="uk-select">
                                                <option>همه مدل‌ها</option>
                                                <option>ChatGPT</option>
                                                <option>Claude</option>
                                                <option>Gemini</option>
                                                <option>Midjourney</option>
                                                <option>DALL-E</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="uk-margin">
                                        <label class="uk-form-label uk-text-bold">محبوبیت</label>
                                        <div class="uk-form-controls">
                                            <select class="uk-select">
                                                <option>همه</option>
                                                <option>پرطرفدار</option>
                                                <option>جدیدترین</option>
                                                <option>پربازدید</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="uk-margin">
                                        <label class="uk-form-label uk-text-bold">سطح دشواری</label>
                                        <div class="uk-form-controls">
                                            <div>
                                                <label><input class="uk-checkbox" type="checkbox" checked>
                                                    مبتدی</label>
                                            </div>
                                            <div>
                                                <label><input class="uk-checkbox" type="checkbox" checked>
                                                    متوسط</label>
                                            </div>
                                            <div>
                                                <label><input class="uk-checkbox" type="checkbox" checked>
                                                    پیشرفته</label>
                                            </div>
                                        </div>
                                    </div>

                                    <button class="uk-button uk-button-primary uk-width-1-1">اعمال فیلترها</button>
                                </div>

                                <div class="uk-margin-top">
                                    <div class="uk-card uk-card-default uk-card-body uk-border-rounded">
                                        <h4 class="uk-card-title">دسته‌بندی‌های پرطرفدار</h4>
                                        <div class="uk-grid-small uk-child-width-1-2" uk-grid>
                                            <div>
                                                <div
                                                    class="uk-card uk-card-small uk-card-primary uk-card-body uk-border-rounded uk-card-hover">
                                                    <span uk-icon="icon: mail; ratio: 1.2"></span>
                                                    <h6 class="uk-margin-small-top">ایمیل‌نویسی</h6>
                                                </div>
                                            </div>
                                            <div>
                                                <div
                                                    class="uk-card uk-card-small uk-card-primary uk-card-body uk-border-rounded uk-card-hover">
                                                    <span uk-icon="icon: social; ratio: 1.2"></span>
                                                    <h6 class="uk-margin-small-top">شبکه اجتماعی</h6>
                                                </div>
                                            </div>
                                            <div>
                                                <div
                                                    class="uk-card uk-card-small uk-card-primary uk-card-body uk-border-rounded uk-card-hover">
                                                    <span uk-icon="icon: image; ratio: 1.2"></span>
                                                    <h6 class="uk-margin-small-top">تصویرسازی</h6>
                                                </div>
                                            </div>
                                            <div>
                                                <div
                                                    class="uk-card uk-card-small uk-card-primary uk-card-body uk-border-rounded uk-card-hover">
                                                    <span uk-icon="icon: code; ratio: 1.2"></span>
                                                    <h6 class="uk-margin-small-top">کدنویسی</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="uk-width-3-4@m">
                                <div class="uk-grid-small uk-flex-between uk-flex-middle" uk-grid>
                                    <div class="uk-width-expand">
                                        <h3 class="uk-text-bold">کتابخانه پرومپت‌ها</h3>
                                    </div>
                                    <div class="uk-width-auto">
                                        <button class="uk-button uk-button-primary">
                                            <span uk-icon="icon: plus"></span> پرومپت جدید
                                        </button>
                                    </div>
                                </div>

                                <div class="uk-margin">
                                    <div class="uk-grid-small uk-child-width-1-3@m" uk-grid>
                                        <div>
                                            <div
                                                class="uk-card uk-card-default uk-card-body uk-border-rounded uk-box-shadow-hover-large uk-card-hover">
                                                <div class="uk-card-badge uk-label">ایمیل</div>
                                                <h4 class="uk-card-title uk-margin-remove-bottom">درخواست افزایش حقوق
                                                </h4>
                                                <p class="uk-text-meta uk-margin-remove-top">برای ChatGPT</p>
                                                <p class="uk-margin-small-top">پرومپتی حرفه‌ای برای درخواست افزایش حقوق
                                                    از مدیر</p>
                                                <div class="uk-grid-small uk-flex-middle" uk-grid>
                                                    <div class="uk-width-auto">
                                                        <span uk-icon="icon: star"></span>
                                                        <span class="uk-text-small">۴.۸</span>
                                                    </div>
                                                    <div class="uk-width-auto">
                                                        <span uk-icon="icon: download"></span>
                                                        <span class="uk-text-small">۱۲۴</span>
                                                    </div>
                                                    <div class="uk-width-expand uk-text-right">
                                                        <button
                                                            class="uk-button uk-button-text uk-text-primary">استفاده</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div
                                                class="uk-card uk-card-default uk-card-body uk-border-rounded uk-box-shadow-hover-large uk-card-hover">
                                                <div class="uk-card-badge uk-label">تصویر</div>
                                                <h4 class="uk-card-title uk-margin-remove-bottom">طراحی لوگو مدرن</h4>
                                                <p class="uk-text-meta uk-margin-remove-top">برای Midjourney</p>
                                                <p class="uk-margin-small-top">پرومپتی برای طراحی لوگوهای مینیمال و
                                                    مدرن</p>
                                                <div class="uk-grid-small uk-flex-middle" uk-grid>
                                                    <div class="uk-width-auto">
                                                        <span uk-icon="icon: star"></span>
                                                        <span class="uk-text-small">۴.۵</span>
                                                    </div>
                                                    <div class="uk-width-auto">
                                                        <span uk-icon="icon: download"></span>
                                                        <span class="uk-text-small">۹۸</span>
                                                    </div>
                                                    <div class="uk-width-expand uk-text-right">
                                                        <button
                                                            class="uk-button uk-button-text uk-text-primary">استفاده</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div
                                                class="uk-card uk-card-default uk-card-body uk-border-rounded uk-box-shadow-hover-large uk-card-hover">
                                                <div class="uk-card-badge uk-label">کد</div>
                                                <h4 class="uk-card-title uk-margin-remove-bottom">تست واحد در پایتون
                                                </h4>
                                                <p class="uk-text-meta uk-margin-remove-top">برای ChatGPT</p>
                                                <p class="uk-margin-small-top">پرومپتی برای نوشتن تست‌های واحد در
                                                    پایتون</p>
                                                <div class="uk-grid-small uk-flex-middle" uk-grid>
                                                    <div class="uk-width-auto">
                                                        <span uk-icon="icon: star"></span>
                                                        <span class="uk-text-small">۴.۷</span>
                                                    </div>
                                                    <div class="uk-width-auto">
                                                        <span uk-icon="icon: download"></span>
                                                        <span class="uk-text-small">۸۷</span>
                                                    </div>
                                                    <div class="uk-width-expand uk-text-right">
                                                        <button
                                                            class="uk-button uk-button-text uk-text-primary">استفاده</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div
                                                class="uk-card uk-card-default uk-card-body uk-border-rounded uk-box-shadow-hover-large uk-card-hover">
                                                <div class="uk-card-badge uk-label">اجتماعی</div>
                                                <h4 class="uk-card-title uk-margin-remove-bottom">پست معرفی محصول</h4>
                                                <p class="uk-text-meta uk-margin-remove-top">برای ChatGPT</p>
                                                <p class="uk-margin-small-top">پرومپتی برای نوشتن پست معرفی محصول در
                                                    لینکدین</p>
                                                <div class="uk-grid-small uk-flex-middle" uk-grid>
                                                    <div class="uk-width-auto">
                                                        <span uk-icon="icon: star"></span>
                                                        <span class="uk-text-small">۴.۶</span>
                                                    </div>
                                                    <div class="uk-width-auto">
                                                        <span uk-icon="icon: download"></span>
                                                        <span class="uk-text-small">۱۰۳</span>
                                                    </div>
                                                    <div class="uk-width-expand uk-text-right">
                                                        <button
                                                            class="uk-button uk-button-text uk-text-primary">استفاده</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div
                                                class="uk-card uk-card-default uk-card-body uk-border-rounded uk-box-shadow-hover-large uk-card-hover">
                                                <div class="uk-card-badge uk-label">ایمیل</div>
                                                <h4 class="uk-card-title uk-margin-remove-bottom">درخواست مرخصی</h4>
                                                <p class="uk-text-meta uk-margin-remove-top">برای ChatGPT</p>
                                                <p class="uk-margin-small-top">پرومپتی برای نوشتن ایمیل درخواست مرخصی
                                                </p>
                                                <div class="uk-grid-small uk-flex-middle" uk-grid>
                                                    <div class="uk-width-auto">
                                                        <span uk-icon="icon: star"></span>
                                                        <span class="uk-text-small">۴.۴</span>
                                                    </div>
                                                    <div class="uk-width-auto">
                                                        <span uk-icon="icon: download"></span>
                                                        <span class="uk-text-small">۱۵۶</span>
                                                    </div>
                                                    <div class="uk-width-expand uk-text-right">
                                                        <button
                                                            class="uk-button uk-button-text uk-text-primary">استفاده</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div
                                                class="uk-card uk-card-default uk-card-body uk-border-rounded uk-box-shadow-hover-large uk-card-hover">
                                                <div class="uk-card-badge uk-label">تصویر</div>
                                                <h4 class="uk-card-title uk-margin-remove-bottom">پرتره فانتزی</h4>
                                                <p class="uk-text-meta uk-margin-remove-top">برای Midjourney</p>
                                                <p class="uk-margin-small-top">پرومپتی برای ایجاد پرتره‌های فانتزی و
                                                    هنری</p>
                                                <div class="uk-grid-small uk-flex-middle" uk-grid>
                                                    <div class="uk-width-auto">
                                                        <span uk-icon="icon: star"></span>
                                                        <span class="uk-text-small">۴.۹</span>
                                                    </div>
                                                    <div class="uk-width-auto">
                                                        <span uk-icon="icon: download"></span>
                                                        <span class="uk-text-small">۲۰۱</span>
                                                    </div>
                                                    <div class="uk-width-expand uk-text-right">
                                                        <button
                                                            class="uk-button uk-button-text uk-text-primary">استفاده</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="uk-margin-top">
                                    <ul class="uk-pagination uk-flex-center">
                                        <li><a href="#"><span uk-pagination-previous></span></a></li>
                                        <li class="uk-active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#"><span uk-pagination-next></span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
    </div>
    @push('scripts')
        <script>
            // Initialize UI components
            UIkit.util.on('#load-sample-prompt', 'click', function(e) {
                e.preventDefault();
                document.getElementById('prompt-textarea').value =
                    "شما یک متخصص بازاریابی دیجیتال با ۱۰ سال تجربه هستید. لطفاً:\n1. یک استراتژی بازاریابی برای محصول جدید ما ارائه دهید\n2. نقاط قوت و ضعف رقبا را تحلیل کنید\n3. یک جدول زمانی ۳ ماهه پیشنهاد دهید\n\nسبک: رسمی اما جذاب\nتناژ: مثبت و متقاعدکننده";
                updateCharCount();

                UIkit.notification({
                    message: 'پرومپت نمونه با موفقیت بارگذاری شد!',
                    status: 'success',
                    pos: 'bottom-center',
                    timeout: 3000
                });
            });

            // Character count for textarea
            function updateCharCount() {
                const textarea = document.getElementById('prompt-textarea');
                const charCount = document.getElementById('char-count');
                const count = textarea.value.length;
                charCount.textContent = `${count}/2000`;

                if (count > 1800) {
                    charCount.classList.add('uk-text-danger');
                } else {
                    charCount.classList.remove('uk-text-danger');
                }
            }

            document.getElementById('prompt-textarea').addEventListener('input', updateCharCount);

            // Copy to clipboard function
            function copyToClipboard(elementId) {
                const element = document.getElementById(elementId);
                const range = document.createRange();
                range.selectNode(element);
                window.getSelection().removeAllRanges();
                window.getSelection().addRange(range);
                document.execCommand('copy');
                window.getSelection().removeAllRanges();

                UIkit.notification({
                    message: 'پرومپت با موفقیت کپی شد!',
                    status: 'success',
                    pos: 'bottom-center',
                    timeout: 3000
                });
            }

            // Save prompt function
            function savePrompt() {
                UIkit.notification({
                    message: 'پرومپت با موفقیت ذخیره شد!',
                    status: 'success',
                    pos: 'bottom-center',
                    timeout: 3000
                });
            }

            // Regenerate prompt function
            function regeneratePrompt() {
                UIkit.notification({
                    message: 'در حال تولید مجدد پرومپت...',
                    status: 'primary',
                    pos: 'bottom-center',
                    timeout: 2000
                });

                // Simulate API call delay
                setTimeout(function() {
                    UIkit.notification({
                        message: 'پرومپت جدید با موفقیت تولید شد!',
                        status: 'success',
                        pos: 'bottom-center',
                        timeout: 3000
                    });
                }, 1500);
            }

            // Analyze generated prompt
            function analyzeGeneratedPrompt() {
                UIkit.notification({
                    message: 'در حال تحلیل پرومپت...',
                    status: 'primary',
                    pos: 'bottom-center',
                    timeout: 2000
                });

                // Switch to analysis tab
                setTimeout(function() {
                    UIkit.switcher('.prompt-tabs-container').show(0);
                    document.getElementById('analysis-results').removeAttribute('hidden');
                    document.getElementById('empty-state').setAttribute('hidden', 'true');

                    UIkit.notification({
                        message: 'تحلیل پرومپت با موفقیت انجام شد!',
                        status: 'success',
                        pos: 'bottom-center',
                        timeout: 3000
                    });
                }, 1500);
            }

            // Apply suggestion to prompt
            function applySuggestion(suggestionId) {
                const textarea = document.getElementById('prompt-textarea');
                let newPrompt = textarea.value;

                switch (suggestionId) {
                    case 1:
                        newPrompt += "\n\nلطفاً پاسخ را به بخش‌های شماره‌دار تقسیم کنید:";
                        break;
                    case 2:
                        newPrompt += "\n\nمثال: برای بخش اول، یک نمونه استراتژی با جزئیات ارائه دهید";
                        break;
                    case 3:
                        newPrompt += "\n\nسبک خروجی: رسمی با عناوین مشخص و پاراگراف‌های کوتاه";
                        break;
                }

                textarea.value = newPrompt;
                updateCharCount();

                UIkit.notification({
                    message: 'پیشنهاد با موفقیت اعمال شد!',
                    status: 'success',
                    pos: 'bottom-center',
                    timeout: 3000
                });
            }

            // Simulate prompt analysis form submission
            document.getElementById('prompt-analysis-form').addEventListener('submit', function(e) {
                e.preventDefault();
                document.getElementById('analysis-results').removeAttribute('hidden');
                document.getElementById('empty-state').setAttribute('hidden', 'true');

                // Set optimized prompt content
                document.getElementById('optimized-prompt').textContent =
                    "شما یک متخصص بازاریابی دیجیتال با ۱۰ سال تجربه هستید. لطفاً:\n\n" +
                    "1. یک استراتژی بازاریابی جامع برای محصول جدید ما ارائه دهید. مثال: استفاده از تبلیغات هدفمند در شبکه‌های اجتماعی\n\n" +
                    "2. نقاط قوت و ضعف ۳ رقیب اصلی را تحلیل کنید. ساختار تحلیل:\n   - نام رقیب\n   - نقاط قوت\n   - نقاط ضعف\n\n" +
                    "3. یک جدول زمانی ۳ ماهه با مراحل زیر پیشنهاد دهید:\n   - ماه اول: تحقیقات بازار\n   - ماه دوم: راه‌اندازی کمپین\n   - ماه سوم: ارزیابی نتایج\n\n" +
                    "سبک: رسمی اما جذاب با عناوین مشخص\nتناژ: مثبت و متقاعدکننده";

                // Simulate analysis delay
                setTimeout(function() {
                    UIkit.notification({
                        message: 'تحلیل پرومپت با موفقیت انجام شد!',
                        status: 'success',
                        pos: 'bottom-center',
                        timeout: 3000
                    });
                }, 1500);
            });

            // Simulate smart builder form submission
            document.getElementById('smart-builder-form').addEventListener('submit', function(e) {
                e.preventDefault();
                document.getElementById('generated-prompt').removeAttribute('hidden');

                // Set generated prompt content
                document.getElementById('smart-prompt-output').textContent =
                    "شما یک متخصص در نوشتن ایمیل‌های رسمی هستید. لطفاً یک ایمیل به مدیر منابع انسانی با مشخصات زیر بنویسید:\n\n" +
                    "موضوع: درخواست مرخصی استعلاجی\n\n" +
                    "محتوا:\n" +
                    "- مقدمه: بیان دلیل درخواست مرخصی\n" +
                    "- جزئیات: مدت زمان مورد نیاز و تاریخ‌های دقیق\n" +
                    "- پایان: تشکر و درخواست تأیید\n\n" +
                    "سبک نگارش: رسمی و محترمانه\n" +
                    "طول ایمیل: حداکثر ۳ پاراگراف";

                // Simulate generation delay
                setTimeout(function() {
                    UIkit.notification({
                        message: 'پرومپت با موفقیت تولید شد!',
                        status: 'success',
                        pos: 'bottom-center',
                        timeout: 3000
                    });
                }, 1500);
            });
        </script>
    @endpush

    @push('styles')
        <style>
            /* Custom styles for better RTL support and enhancements */
            .uk-card-hover {
                transition: all 0.3s ease;
            }

            .uk-card-hover:hover {
                transform: translateY(-5px);
            }

            .uk-badge-notification {
                font-size: 0.8rem;
                padding: 0.15rem 0.4rem;
            }

            pre code {
                white-space: pre-wrap;
                word-wrap: break-word;
                font-family: 'Ubuntu Mono', monospace;
            }

            .language-prompt {
                color: #333;
            }

            .uk-progress {
                height: 0.5rem;
                background-color: #f8f8f8;
            }

            .uk-progress-bar {
                background-color: #1e87f0;
                transition: width 0.6s ease;
            }

            .uk-textarea {
                min-height: 200px;
            }

            /* Responsive adjustments */
            @media (max-width: 960px) {
                .uk-heading-medium {
                    font-size: 2rem;
                }
            }
        </style>
    @endpush
@endsection

@extends('layouts.app')
@section('title', 'salam')

@section('content')
    <!-- Page Header -->
    <div class="uk-flex uk-flex-between uk-flex-middle uk-margin-bottom">
        <h1 class="uk-heading-medium uk-text-bold uk-text-primary">مدیریت پیشنهادات ذخیره شده</h1>

        <!-- Search and Filter -->
        <div class="uk-inline">
            <button class="uk-button uk-button-primary" type="button">
                <span uk-icon="icon: plus"></span>
                <span class="uk-margin-small-right">پیشنهاد جدید</span>
            </button>
            <div uk-dropdown="mode: click; pos: bottom-right; offset: 5">
                <ul class="uk-nav uk-dropdown-nav">
                    <li><a href="#" uk-toggle="target: #create-prompt-modal"><span uk-icon="icon: file-edit"></span>
                            ایجاد دستی</a></li>
                    <li><a href="#"><span uk-icon="icon: cloud-download"></span> وارد کردن از فایل</a></li>
                    <li class="uk-nav-divider"></li>
                    <li><a href="#"><span uk-icon="icon: template"></span> از الگو استفاده کنید</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="uk-child-width-1-4@m uk-grid-small uk-grid-match" uk-grid>
        <div>
            <div class="uk-card uk-card-default uk-card-body uk-border-rounded uk-box-shadow-small">
                <div class="uk-flex uk-flex-middle">
                    <div class="uk-margin-left">
                        <span uk-icon="icon: database; ratio: 2" class="uk-text-primary"></span>
                    </div>
                    <div>
                        <h3 class="uk-card-title uk-margin-remove uk-text-bold">۱۲۷</h3>
                        <p class="uk-text-muted uk-margin-remove">کل پیشنهادات</p>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="uk-card uk-card-default uk-card-body uk-border-rounded uk-box-shadow-small">
                <div class="uk-flex uk-flex-middle">
                    <div class="uk-margin-left">
                        <span uk-icon="icon: star; ratio: 2" class="uk-text-warning"></span>
                    </div>
                    <div>
                        <h3 class="uk-card-title uk-margin-remove uk-text-bold">۴۳</h3>
                        <p class="uk-text-muted uk-margin-remove">مورد علاقه‌ها</p>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="uk-card uk-card-default uk-card-body uk-border-rounded uk-box-shadow-small">
                <div class="uk-flex uk-flex-middle">
                    <div class="uk-margin-left">
                        <span uk-icon="icon: tag; ratio: 2" class="uk-text-success"></span>
                    </div>
                    <div>
                        <h3 class="uk-card-title uk-margin-remove uk-text-bold">۱۵</h3>
                        <p class="uk-text-muted uk-margin-remove">دسته‌بندی‌ها</p>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="uk-card uk-card-default uk-card-body uk-border-rounded uk-box-shadow-small">
                <div class="uk-flex uk-flex-middle">
                    <div class="uk-margin-left">
                        <span uk-icon="icon: users; ratio: 2" class="uk-text-danger"></span>
                    </div>
                    <div>
                        <h3 class="uk-card-title uk-margin-remove uk-text-bold">۸</h3>
                        <p class="uk-text-muted uk-margin-remove">تیم‌های مشترک</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="uk-margin-top">
        <div class="uk-card uk-card-default uk-border-rounded uk-box-shadow-medium">
            <!-- Toolbar -->
            <div class="uk-card-header">
                <div class="uk-grid-small uk-flex-middle" uk-grid>
                    <div class="uk-width-expand">
                        <div class="uk-inline uk-width-1-1">
                            <span class="uk-form-icon" uk-icon="icon: search"></span>
                            <input class="uk-input uk-form-large" type="text" placeholder="جستجو در پیشنهادات...">
                        </div>
                    </div>
                    <div class="uk-width-auto">
                        <div>
                            <button class="uk-button uk-button-default" type="button">
                                <span uk-icon="icon: settings"></span>
                                <span class="uk-margin-small-right">فیلترها</span>
                            </button>
                            <div uk-dropdown="mode: click; pos: bottom-right; offset: 5">
                                <form class="uk-form-stacked">
                                    <div class="uk-margin">
                                        <label class="uk-form-label">دسته‌بندی</label>
                                        <div class="uk-form-controls">
                                            <select class="uk-select uk-form-small">
                                                <option>همه دسته‌بندی‌ها</option>
                                                <option>بازاریابی</option>
                                                <option>برنامه‌نویسی</option>
                                                <option>تحلیل داده</option>
                                                <option>خلاقانه</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="uk-margin">
                                        <label class="uk-form-label">مرتب‌سازی بر اساس</label>
                                        <div class="uk-form-controls">
                                            <select class="uk-select uk-form-small">
                                                <option>جدیدترین</option>
                                                <option>قدیمی‌ترین</option>
                                                <option>پرکاربردترین</option>
                                                <option>الفبایی (صعودی)</option>
                                                <option>الفبایی (نزولی)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="uk-margin">
                                        <label>
                                            <input class="uk-checkbox" type="checkbox"> فقط مورد علاقه‌ها
                                        </label>
                                    </div>
                                    <button class="uk-button uk-button-primary uk-width-1-1 uk-margin-small-top">اعمال
                                        فیلترها</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Prompts Table -->
            <div class="uk-card-body uk-padding-remove-top">
                <div class="uk-overflow-auto">
                    <table class="uk-table uk-table-divider uk-table-middle uk-table-hover">
                        <thead>
                            <tr>
                                <th class="uk-width-small">عنوان</th>
                                <th>پیشنهاد</th>
                                <th class="uk-width-small">دسته‌بندی</th>
                                <th class="uk-width-small">تاریخ ایجاد</th>
                                <th class="uk-width-small">عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Prompt 1 -->
                            <tr>
                                <td>
                                    <div class="uk-flex uk-flex-middle">
                                        <span uk-icon="icon: star; ratio: 0.8"
                                            class="uk-margin-small-left uk-text-warning"></span>
                                        <span class="uk-text-bold">پیشنهاد بازاریابی</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="uk-text-truncate" style="max-width: 300px;">
                                        یک پست جذاب برای اینستاگرام درباره محصول جدید ما بنویس که شامل مزایای محصول و یک
                                        دعوت به اقدام قوی باشد...
                                    </div>
                                </td>
                                <td>
                                    <span class="uk-label uk-label-success">بازاریابی</span>
                                </td>
                                <td>
                                    <span class="uk-text-small">۱۴۰۲/۰۵/۱۵</span>
                                </td>
                                <td>
                                    <div class="uk-button-group">
                                        <button class="uk-button uk-button-default uk-button-small" uk-tooltip="ویرایش">
                                            <span uk-icon="icon: pencil"></span>
                                        </button>
                                        <button class="uk-button uk-button-default uk-button-small" uk-tooltip="کپی">
                                            <span uk-icon="icon: copy"></span>
                                        </button>
                                        <button class="uk-button uk-button-default uk-button-small"
                                            uk-tooltip="اشتراک‌گذاری">
                                            <span uk-icon="icon: share"></span>
                                        </button>
                                        <button class="uk-button uk-button-danger uk-button-small" uk-tooltip="حذف">
                                            <span uk-icon="icon: trash"></span>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Prompt 2 -->
                            <tr>
                                <td>
                                    <div class="uk-flex uk-flex-middle">
                                        <span class="uk-margin-small-left uk-text-bold">کد پایتون</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="uk-text-truncate" style="max-width: 300px;">
                                        یک تابع پایتون بنویس که لیستی از اعداد را دریافت کند و اعداد زوج و فرد را جدا
                                        کرده و در دو لیست مختلف برگرداند...
                                    </div>
                                </td>
                                <td>
                                    <span class="uk-label">برنامه‌نویسی</span>
                                </td>
                                <td>
                                    <span class="uk-text-small">۱۴۰۲/۰۴/۲۲</span>
                                </td>
                                <td>
                                    <div class="uk-button-group">
                                        <button class="uk-button uk-button-default uk-button-small">
                                            <span uk-icon="icon: pencil"></span>
                                        </button>
                                        <button class="uk-button uk-button-default uk-button-small">
                                            <span uk-icon="icon: copy"></span>
                                        </button>
                                        <button class="uk-button uk-button-default uk-button-small">
                                            <span uk-icon="icon: share"></span>
                                        </button>
                                        <button class="uk-button uk-button-danger uk-button-small">
                                            <span uk-icon="icon: trash"></span>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Prompt 3 -->
                            <tr>
                                <td>
                                    <div class="uk-flex uk-flex-middle">
                                        <span uk-icon="icon: star; ratio: 0.8"
                                            class="uk-margin-small-left uk-text-warning"></span>
                                        <span class="uk-text-bold">تحلیل داده‌ها</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="uk-text-truncate" style="max-width: 300px;">
                                        یک کوئری SQL بنویس که میانگین فروش را بر اساس ماه و منطقه جغرافیایی محاسبه کند و
                                        نتایج را به صورت نزولی مرتب کند...
                                    </div>
                                </td>
                                <td>
                                    <span class="uk-label uk-label-warning">تحلیل داده</span>
                                </td>
                                <td>
                                    <span class="uk-text-small">۱۴۰۲/۰۳/۱۰</span>
                                </td>
                                <td>
                                    <div class="uk-button-group">
                                        <button class="uk-button uk-button-default uk-button-small">
                                            <span uk-icon="icon: pencil"></span>
                                        </button>
                                        <button class="uk-button uk-button-default uk-button-small">
                                            <span uk-icon="icon: copy"></span>
                                        </button>
                                        <button class="uk-button uk-button-default uk-button-small">
                                            <span uk-icon="icon: share"></span>
                                        </button>
                                        <button class="uk-button uk-button-danger uk-button-small">
                                            <span uk-icon="icon: trash"></span>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Prompt 4 -->
                            <tr>
                                <td>
                                    <div class="uk-flex uk-flex-middle">
                                        <span class="uk-margin-small-left uk-text-bold">ایده‌پردازی</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="uk-text-truncate" style="max-width: 300px;">
                                        ۱۰ ایده خلاقانه برای ویژگی‌های جدید یک اپلیکیشن مدیریت وظایف پیشنهاد بده که
                                        کاربران را به استفاده بیشتر ترغیب کند...
                                    </div>
                                </td>
                                <td>
                                    <span class="uk-label uk-label-danger">خلاقانه</span>
                                </td>
                                <td>
                                    <span class="uk-text-small">۱۴۰۲/۰۲/۲۸</span>
                                </td>
                                <td>
                                    <div class="uk-button-group">
                                        <button class="uk-button uk-button-default uk-button-small">
                                            <span uk-icon="icon: pencil"></span>
                                        </button>
                                        <button class="uk-button uk-button-default uk-button-small">
                                            <span uk-icon="icon: copy"></span>
                                        </button>
                                        <button class="uk-button uk-button-default uk-button-small">
                                            <span uk-icon="icon: share"></span>
                                        </button>
                                        <button class="uk-button uk-button-danger uk-button-small">
                                            <span uk-icon="icon: trash"></span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pagination -->
            <div class="uk-card-footer">
                <ul class="uk-pagination uk-flex-center" uk-margin>
                    <li><a href="#"><span uk-pagination-previous></span></a></li>
                    <li><a href="#">۱</a></li>
                    <li class="uk-active"><a href="#">۲</a></li>
                    <li><a href="#">۳</a></li>
                    <li><a href="#">۴</a></li>
                    <li><a href="#">۵</a></li>
                    <li><a href="#"><span uk-pagination-next></span></a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Create Prompt Modal -->
    <div id="create-prompt-modal" uk-modal="bg-close: false" class="uk-modal-container">
        <div class="uk-modal-dialog uk-margin-auto-vertical uk-border-rounded uk-box-shadow-large">
            <button class="uk-modal-close-default" type="button" uk-close></button>

            <!-- Modal Header with Gradient Background -->
            <div
                class="uk-modal-header uk-border-rounded-top uk-background-gradient uk-background-primary uk-padding-small">
                <div class="uk-grid-small uk-flex-middle" uk-grid>
                    <div class="uk-width-auto">
                        <span uk-icon="icon: file-edit; ratio: 1.5" class="uk-text-white"></span>
                    </div>
                    <div class="uk-width-expand">
                        <h2 class="uk-modal-title uk-text-bold uk-text-white">ایجاد پیشنهاد جدید</h2>
                        <p class="uk-text-meta uk-margin-remove uk-text-light">پیشنهادهای هوشمندانه بسازید و ذخیره کنید</p>
                    </div>
                </div>
            </div>

            <!-- Modal Body with Tabs -->
            <div class="uk-modal-body uk-padding-remove">
                <ul uk-tab="animation: uk-animation-fade" class="uk-tab uk-flex-center uk-margin-remove">
                    <li><a href="#" class="uk-text-bold">محتوا</a></li>
                    <li><a href="#" class="uk-text-bold">تنظیمات پیشرفته</a></li>
                    <li><a href="#" class="uk-text-bold">اشتراک‌گذاری</a></li>
                </ul>

                <div class="uk-switcher uk-margin">
                    <!-- Content Tab -->
                    <div class="uk-padding">
                        <div class="uk-margin">
                            <label class="uk-form-label uk-text-bold">عنوان پیشنهاد</label>
                            <div class="uk-form-controls">
                                <input class="uk-input uk-form-large uk-border-rounded" type="text"
                                    placeholder="مثال: تولید محتوای اینستاگرام">
                            </div>
                        </div>

                        <div class="uk-margin">
                            <label class="uk-form-label uk-text-bold">متن پیشنهاد</label>
                            <div class="uk-form-controls">
                                <textarea class="uk-textarea uk-border-rounded" rows="8"
                                    placeholder="متن کامل پیشنهاد خود را اینجا بنویسید..."></textarea>
                            </div>
                            <div class="uk-text-meta uk-text-left@m uk-margin-small-top">
                                <span uk-icon="icon: info"></span> از متغیرها مانند {موضوع} یا {سبک} استفاده کنید
                            </div>
                        </div>
                    </div>

                    <!-- Advanced Settings Tab -->
                    <div class="uk-padding">
                        <div class="uk-grid-small" uk-grid>
                            <div class="uk-width-1-2@s">
                                <label class="uk-form-label uk-text-bold">دسته‌بندی</label>
                                <div class="uk-form-controls">
                                    <select class="uk-select uk-border-rounded" uk-tooltip="برای سازماندهی بهتر">
                                        <option>بدون دسته‌بندی</option>
                                        <option>بازاریابی</option>
                                        <option>برنامه‌نویسی</option>
                                        <option>تحلیل داده</option>
                                        <option>خلاقانه</option>
                                    </select>
                                </div>
                            </div>
                            <div class="uk-width-1-2@s">
                                <label class="uk-form-label uk-text-bold">برچسب‌ها</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input uk-border-rounded" type="text"
                                        placeholder="مثال: اینستاگرام,محتوا,بازاریابی">
                                </div>
                            </div>
                        </div>

                        <div class="uk-margin">
                            <label class="uk-form-label uk-text-bold">رنگ نشانگر</label>
                            <div class="uk-form-controls">
                                <div class="uk-grid-small uk-child-width-auto" uk-grid>
                                    <div>
                                        <input class="uk-radio" type="radio" name="color" id="color-default"
                                            checked>
                                        <label for="color-default" class="uk-margin-small-right">
                                            <span class="uk-badge" style="background: #1e87f0"></span>
                                        </label>
                                    </div>
                                    <div>
                                        <input class="uk-radio" type="radio" name="color" id="color-green">
                                        <label for="color-green" class="uk-margin-small-right">
                                            <span class="uk-badge" style="background: #32d296"></span>
                                        </label>
                                    </div>
                                    <div>
                                        <input class="uk-radio" type="radio" name="color" id="color-orange">
                                        <label for="color-orange" class="uk-margin-small-right">
                                            <span class="uk-badge" style="background: #faa05a"></span>
                                        </label>
                                    </div>
                                    <div>
                                        <input class="uk-radio" type="radio" name="color" id="color-red">
                                        <label for="color-red" class="uk-margin-small-right">
                                            <span class="uk-badge" style="background: #f0506e"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="uk-margin">
                            <label>
                                <input class="uk-checkbox uk-margin-small-right" type="checkbox">
                                <span class="uk-text-bold">علامت‌گذاری به عنوان مورد علاقه</span>
                            </label>
                        </div>
                    </div>

                    <!-- Sharing Tab -->
                    <div class="uk-padding">
                        <div class="uk-margin">
                            <label class="uk-form-label uk-text-bold">اشتراک‌گذاری با</label>
                            <div class="uk-form-controls">
                                <select class="uk-select uk-border-rounded" multiple>
                                    <option>تیم بازاریابی</option>
                                    <option>تیم توسعه</option>
                                    <option>مدیران محصول</option>
                                    <option>همه کاربران</option>
                                </select>
                            </div>
                        </div>

                        <div class="uk-margin">
                            <label class="uk-form-label uk-text-bold">سطح دسترسی</label>
                            <div class="uk-form-controls">
                                <div class="uk-grid-small uk-child-width-auto" uk-grid>
                                    <div>
                                        <input class="uk-radio" type="radio" name="permission" id="permission-read"
                                            checked>
                                        <label for="permission-read" class="uk-margin-small-right">فقط مشاهده</label>
                                    </div>
                                    <div>
                                        <input class="uk-radio" type="radio" name="permission" id="permission-edit">
                                        <label for="permission-edit" class="uk-margin-small-right">ویرایش</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="uk-alert uk-alert-warning uk-border-rounded">
                            <span uk-icon="icon: warning"></span> کاربران با دسترسی ویرایش می‌توانند این پیشنهاد را تغییر
                            دهند
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Footer with Progress Indicator -->
            <div class="uk-modal-footer uk-border-rounded-bottom uk-background-muted">
                <div class="uk-grid-small uk-flex-middle" uk-grid>
                    <div class="uk-width-expand">
                        <div class="uk-progress uk-border-rounded">
                            <div class="uk-progress-bar" style="width: 33%"></div>
                        </div>
                        <div class="uk-text-meta uk-text-center">مرحله 1 از 3</div>
                    </div>
                    <div class="uk-width-auto">
                        <button class="uk-button uk-button-default uk-border-rounded uk-margin-small-right"
                            type="button">انصراف</button>
                        <button class="uk-button uk-button-primary uk-border-rounded" type="button">ذخیره
                            پیشنهاد</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .uk-background-gradient {
            background: linear-gradient(135deg, #1e87f0 0%, #45aaf2 100%);
        }

        .uk-modal-dialog {
            transition: all 0.3s ease;
            border: 1px solid rgba(0, 0, 0, 0.1);
        }

        .uk-tab>.uk-active>a {
            border-bottom: 3px solid #1e87f0;
        }

        .uk-badge {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            display: inline-block;
        }

        .uk-progress {
            height: 6px;
        }

        .uk-progress-bar {
            background-color: #1e87f0;
            transition: width 0.3s ease;
        }
    </style>

    <script>
        // Tab switching logic
        UIkit.util.on('#create-prompt-modal', 'show', function() {
            // Reset to first tab when modal opens
            UIkit.tab(document.querySelector('.uk-tab')).show(0);
            document.querySelector('.uk-progress-bar').style.width = '33%';
        });

        // Update progress bar when switching tabs
        document.querySelectorAll('.uk-tab a').forEach((tab, index) => {
            tab.addEventListener('click', function() {
                const progress = (index + 1) * 33;
                document.querySelector('.uk-progress-bar').style.width = `${progress}%`;
                document.querySelector('.uk-text-meta').textContent = `مرحله ${index + 1} از 3`;
            });
        });
    </script>
@endsection


{{-- Saved Prompts Tab --}}
{{-- <li>
    <div class="uk-grid-medium" uk-grid>
        <div class="uk-width-1-4@m">
            <div class="uk-card uk-card-default uk-card-body uk-border-rounded">
                <h3 class="uk-card-title">دسته‌بندی‌های ذخیره شده</h3>
                <ul class="uk-nav uk-nav-default">
                    <li class="uk-active"><a href="#">همه پرومپت‌ها (۲۴)</a></li>
                    <li><a href="#">کاربردی (۸)</a></li>
                    <li><a href="#">هنری (۵)</a></li>
                    <li><a href="#">تحقیقاتی (۳)</a></li>
                    <li><a href="#">شخصی‌سازی شده (۴)</a></li>
                </ul>
                <hr>
                <button class="uk-button uk-button-default uk-width-1-1">
                    <span uk-icon="icon: plus"></span> دسته جدید
                </button>
            </div>
        </div>
        <div class="uk-width-3-4@m">
            <div class="uk-card uk-card-default uk-card-body uk-border-rounded">
                <div class="uk-flex uk-flex-between uk-flex-middle">
                    <h3 class="uk-card-title">پرومپت‌های ذخیره شده</h3>
                    <div>
                        <button class="uk-button uk-button-text uk-text-primary" uk-tooltip="بارگذاری مجدد">
                            <span uk-icon="icon: refresh"></span>
                        </button>
                    </div>
                </div>

                <div class="uk-child-width-1-2@s uk-child-width-1-3@m uk-grid-match uk-margin-top" uk-grid>
                    @foreach ([1, 2, 3, 4, 5, 6] as $prompt)
                        <div>
                            <div class="uk-card uk-card-default uk-card-hover uk-card-small uk-border-rounded">
                                <div class="uk-card-header">
                                    <div class="uk-grid-small uk-flex-middle" uk-grid>
                                        <div class="uk-width-auto">
                                            <span
                                                class="uk-badge">{{ ['ChatGPT-4', 'Midjourney', 'Claude'][array_rand([0, 1, 2])] }}</span>
                                        </div>
                                        <div class="uk-width-expand">
                                            <h4 class="uk-card-title uk-margin-remove-bottom">پرومپت نمونه
                                                {{ $prompt }}</h4>
                                            <p class="uk-text-meta uk-margin-remove-top">ذخیره شده در
                                                ۱۴۰۲/۰۵/{{ 10 + $prompt }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-card-body">
                                    <p>این یک پرومپت نمونه است که می‌تواند برای اهداف مختلف استفاده شود.</p>
                                    <div class="uk-margin-small-top">
                                        <span class="uk-badge uk-margin-small-left">ایمیل</span>
                                        <span class="uk-badge">تجاری</span>
                                    </div>
                                </div>
                                <div class="uk-card-footer">
                                    <div class="uk-grid-small" uk-grid>
                                        <div class="uk-width-expand">
                                            <button class="uk-button uk-button-text uk-text-primary">استفاده</button>
                                        </div>
                                        <div class="uk-width-auto">
                                            <button class="uk-button uk-button-text uk-text-danger" uk-tooltip="حذف">
                                                <span uk-icon="icon: trash"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
    </div>
</li> --}}

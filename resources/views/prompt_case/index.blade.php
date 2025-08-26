@extends('layouts.app')
@section('title', 'جا پرامپتی |‌ داشبورد')

@section('content')
    <!-- Page Header -->
    <div class="uk-flex uk-flex-between uk-flex-middle uk-margin-bottom">
        <h1 class="uk-heading-medium uk-text-bold uk-text-primary">مدیریت پرامپت های ذخیره شده</h1>

        <!-- Search and Filter -->
        <div class="uk-inline">
            <!-- Trigger Button -->
            <button class="uk-button uk-border-pill uk-light uk-flex uk-flex-middle" type="button"
                uk-toggle="target: #prompt-modal"
                style="background: linear-gradient(135deg, #6a11cb, #2575fc); border: none; padding: 10px 18px; box-shadow: 0 4px 12px rgba(0,0,0,0.25);">
                <span uk-icon="icon: plus-circle; ratio: 1.2" class="uk-margin-small-left"></span>
                ایجاد پرامپت جدید
            </button>
            @include('prompt_case.create')
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
                        <h3 class="uk-card-title uk-margin-remove uk-text-bold">{{ $userPrompts->count() }}</h3>
                        <p class="uk-text-muted uk-margin-remove">کل پرامپت ها</p>
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
                        <h3 class="uk-card-title uk-margin-remove uk-text-bold">{{ $userPrompts->count() }}</h3>
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
                        <h3 class="uk-card-title uk-margin-remove uk-text-bold">{{ $userPrompts->count() }}</h3>
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
                        <h3 class="uk-card-title uk-margin-remove uk-text-bold">0</h3>
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
            <div class="uk-card-body uk-padding-remove-top uk-padding-remove-bottom">
                <div class="uk-overflow-auto">
                    <table class="uk-table uk-table-divider uk-table-middle uk-table-hover">
                        <thead>
                            <tr>
                                <th class="uk-width-small">عنوان</th>
                                <th>پرامپت</th>
                                <th class="uk-width-small">دسته‌بندی</th>
                                <th class="uk-width-small">تاریخ ایجاد</th>
                                <th class="uk-width-small">عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($userPrompts as $userPrompt)
                            <tr>
                                <td>
                                    <div class="uk-flex uk-flex-middle">
                                        <span uk-icon="icon: star; ratio: 0.8"
                                            class="uk-margin-small-left uk-text-warning"></span>
                                        <span class="uk-text-bold">{{ $userPrompt->title }}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="uk-text-truncate" style="max-width: 300px;">
                                        یک پست جذاب برای اینستاگرام درباره محصول جدید ما بنویس که شامل مزایای محصول و یک
                                        دعوت به اقدام قوی باشد...
                                    </div>
                                </td>
                                <td>
                                    <span class="uk-label uk-label-success">{{ $userPrompt->prompt }}</span>
                                </td>
                                <td>
                                    <span class="uk-text-small">{{ $userPrompt->created_at }}</span>
                                </td>
                                <td class="uk-text-nowrap">
                                    <div class="uk-button-group">
                                        <button class="uk-icon-button uk-button-default uk-margin-small-right"
                                            uk-icon="copy" uk-tooltip="کپی">
                                        </button>
                                        <button class="uk-icon-button uk-button-default uk-margin-small-right"
                                            uk-icon="eye" uk-tooltip="نمایش">
                                        </button>
                                        <button class="uk-icon-button uk-button-default uk-margin-small-right"
                                            uk-icon="pencil" uk-tooltip="ویرایش">
                                        </button>
                                        <!-- Delete Button -->
                                        <button class="uk-icon-button uk-button-danger uk-margin-small-right"
                                            uk-icon="trash" uk-tooltip="حذف" uk-toggle="target: #delete-modal">
                                        </button>

                                        <!-- Delete Confirmation Modal -->
                                        <div id="delete-modal" uk-modal>
                                            <div
                                                class="uk-modal-dialog uk-border-rounded uk-box-shadow-xlarge uk-width-1-1 uk-width-medium@m">

                                                <!-- Close -->
                                                <button class="uk-modal-close-default" type="button" uk-close></button>

                                                <!-- Header -->
                                                <div class="uk-padding-small uk-light"
                                                    style="background: linear-gradient(135deg, #f44336, #e57373);">
                                                    <h3
                                                        class="uk-modal-title uk-text-bold uk-flex uk-flex-middle uk-margin-remove">
                                                        <span uk-icon="icon: warning; ratio: 1.5"
                                                            class="uk-margin-small-left"></span>
                                                        حذف آیتم
                                                    </h3>
                                                </div>

                                                <!-- Body -->
                                                <div class="uk-padding uk-text-center">
                                                    <p class="uk-text-large uk-text-bold">آیا مطمئن هستید که می‌خواهید این
                                                        آیتم را حذف کنید؟</p>
                                                    <p class="uk-text-meta">این عملیات قابل بازگشت نیست.</p>
                                                </div>

                                                <!-- Footer -->
                                                <div class="uk-padding-small uk-background-muted">
                                                    <div class="uk-flex uk-flex-between uk-flex-middle" uk-grid>
                                                        <div>
                                                            <button
                                                                class="uk-button uk-button-default uk-border-pill uk-modal-close"
                                                                type="button">
                                                                <span uk-icon="icon: close"></span> لغو
                                                            </button>
                                                        </div>
                                                        <div>
                                                            <button class="uk-button uk-button-danger uk-border-pill"
                                                                type="button" id="confirm-delete-btn">
                                                                <span uk-icon="icon: trash"></span> حذف
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Optional JS: handle confirmation -->
                                        <script>
                                            document.getElementById('confirm-delete-btn').addEventListener('click', function() {
                                                // Put your delete logic here
                                                UIkit.modal('#delete-modal').hide(); // close modal after action
                                                console.log('Item deleted!');
                                            });
                                        </script>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pagination -->
            <div class="uk-card-footer">
                {{ $userPrompts->links('components.pagination') }}
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

    {{-- @push('scripts')
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
    @endpush --}}
@endsection
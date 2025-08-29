@extends('layouts.app')
@section('title', 'جا پرامپتی |‌ داشبورد')

@section('content')
    <!-- Page Header -->
    <div class="uk-flex uk-flex-between uk-flex-middle uk-margin-bottom">
        <h1 class="uk-heading-medium uk-text-bold uk-text-primary">مدیریت پرامپت های ذخیره شده</h1>
        @include('prompt_case.create')
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
                        <h3 class="uk-card-title uk-margin-remove uk-text-bold">{{ $userPrompts->total() }}</h3>
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
                        <h3 class="uk-card-title uk-margin-remove uk-text-bold">
                            {{ $userPrompts->where('is_favorite', true)->count() }}</h3>
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
                                <div class="uk-form-stacked">
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
                                </div>
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
                                <th class="uk-width-small">ردیف</th>
                                <th class="uk-width-small">عنوان</th>
                                <th class="uk-width-small">پرامپت</th>
                                <th class="uk-width-small">دسته‌بندی</th>
                                <th class="uk-width-small">تاریخ ایجاد</th>
                                <th class="uk-width-small">عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($userPrompts as $userPrompt)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        <div class="uk-text-truncate" style="max-width: 300px;">
                                            <span uk-icon="icon: star; ratio: 0.8"
                                                class="uk-margin-small-left uk-text-warning"></span>
                                            <span class="uk-text-bold">{{ $userPrompt->title }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="uk-text-truncate" style="max-width: 300px;">
                                            {{ $userPrompt->content }}
                                        </div>
                                    </td>
                                    <td>
                                        @php
                                            $category = $categories->firstWhere('id', $userPrompt->category_id);
                                        @endphp
                                        <span class="uk-label"
                                            style="background-color: {{ $category->color_hex }};">{{ $category->slug }}</span>
                                    <td>
                                        <span class="uk-text-small">{{ $userPrompt->created_at }}</span>
                                    </td>
                                    <td class="uk-text-nowrap">
                                        <div class="uk-button-group">
                                            <button class="uk-icon-button uk-button-default uk-margin-small-right copy-btn"
                                                uk-icon="copy" uk-tooltip="کپی"
                                                data-content="{{ e($userPrompt->content) }}">
                                            </button>

                                            <button class="uk-icon-button uk-button-default uk-margin-small-right"
                                                uk-icon="eye" uk-tooltip="نمایش">
                                            </button>
                                            <button class="uk-icon-button uk-button-default uk-margin-small-right"
                                                uk-icon="pencil" uk-tooltip="ویرایش">
                                            </button>
                                            <!-- Delete Button -->
                                            <button class="uk-icon-button uk-button-danger uk-margin-small-right"
                                                uk-icon="trash" uk-tooltip="حذف"
                                                onclick="openDeleteModal('{{ route('prompt-case.destroy', $userPrompt->id) }}', '{{ e($userPrompt->title) }}', 'پرامپت')">
                                            </button>
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

    @include('components.delete_modal')


    @push('scripts')
        <script>
            // Single event listener for clipboard functionality
            document.addEventListener('click', function(e) {
                // Check if the clicked element is a copy button
                if (e.target.closest('button[uk-icon="copy"]')) {
                    // Get the button element
                    const button = e.target.closest('button[uk-icon="copy"]');

                    // Get the content from data-content attribute
                    const content = button.getAttribute('data-content');

                    // Use the Clipboard API to copy text
                    navigator.clipboard.writeText(content).then(() => {
                        UIkit.notification({
                            message: 'پرامپت با موفقیت کپی شد !',
                            status: 'primary',
                            pos: 'bottom-left',
                            timeout: 5000
                        });
                    }).catch(err => {
                        console.error('Failed to copy: ', err);
                        alert('Failed to copy text to clipboard');
                    });
                }
            });
        </script>
    @endpush

    @push('styles')
        <style>
            /* Custom UIkit notification styling */
            .uk-notification-message {
                border-radius: 12px !important;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2) !important;
                color: white !important;
                font-weight: 500;
                padding: 15px 20px;
            }

            /* Adjust close button for better visibility */
            .uk-notification-close {
                color: white !important;
            }
        </style>
    @endpush


@endsection

@extends('layouts.app')
@section('title', 'جا پرامپتی | داشبورد')

@section('content')
    <!-- Page Header -->
    <div class="uk-flex uk-flex-between uk-flex-middle uk-margin-bottom">
        <h1 class="uk-heading-medium uk-text-bold uk-text-primary">مدیریت پرامپت های ذخیره شده</h1>
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
                        <h3 class="uk-card-title uk-margin-remove uk-text-bold">{{ $pageInfo['user_prompts']->total() }}</h3>
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
                            {{ $pageInfo['user_prompts']->where('is_favorite', true)->count() }}
                        </h3>
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
                        <h3 class="uk-card-title uk-margin-remove uk-text-bold">{{ $pageInfo['categories']->count() }}</h3>
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

    <!-- Three Tabs: Table / Create / Edit -->
    <div class="uk-margin-top">
        <div class="uk-card uk-card-default uk-border-rounded uk-box-shadow-medium uk-padding">
            <ul uk-tab>
                <li @if (Request::is('prompt-case') || Request::has('page')) class="uk-active" @endif><a href="#">جدول
                        پرامپت‌ها</a></li>
                <li><a href="#">ایجاد پرامپت</a></li>
                <li @if (Request::is('prompt-case/*/edit') && !Request::has('page')) class="uk-active" @endif><a
                            href="#">ویرایش پرامپت</a></li>
            </ul>
            <ul class="uk-switcher uk-margin">
                <!-- Table Tab -->
                <li>
                    <div class="uk-overflow-auto">
                        <table class="uk-table uk-table-divider uk-table-hover uk-table-middle">
                            <thead>
                            <tr>
                                <th>ردیف</th>
                                <th>عنوان</th>
                                <th>پرامپت</th>
                                <th>دسته‌بندی</th>
                                <th>تاریخ ایجاد</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($pageInfo['user_prompts'] as $userPrompt)
                                <!-- Find category for the current prompt -->
                                @php
                                    $category = $pageInfo['categories']->firstWhere('id', $userPrompt->category_id);
                                @endphp
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $userPrompt->title ?? 'بدون عنوان' }}</td>
                                    <td>{{ Str::limit($userPrompt->content, 50) }}</td>
                                    <!-- Limit content length for display -->
                                    <td>{{ $category->title ?? 'بدون دسته‌بندی' }}</td>
                                    <!-- Use category title instead of slug -->
                                    <td>{{ verta($userPrompt->created_at)->format('Y-m-d') }}</td>
                                    <td>
                                        <div class="uk-button-group">
                                            <!-- Copy Button -->
                                            <button class="uk-button uk-button-small uk-button-default copy-btn uk-margin-small-left"
                                                    uk-tooltip="کپی"
                                                    data-content="{{ e($userPrompt->content) }}"
                                                    onclick="copyToClipboard('{{ e($userPrompt->content) }}')">
                                                <span uk-icon="copy"></span> کپی
                                            </button>
                                            <!-- Edit Button -->
                                            <a href="{{ route('prompt-case.edit', $userPrompt->id) }}"
                                               class="uk-button uk-button-small uk-button-primary edit-btn uk-margin-small-left">
                                                <span uk-icon="pencil"></span> ویرایش
                                            </a>
                                            <!-- Delete Button -->
                                            <button class="uk-button uk-button-small uk-button-danger"
                                                    onclick="openDeleteModal('{{ route('prompt-case.destroy', $userPrompt->id) }}', '{{ e($userPrompt->title) }}', 'پرامپت')">
                                                <span uk-icon="trash"></span> حذف
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="uk-text-center">هیچ پرامپتی یافت نشد.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        <!-- Pagination -->
                        @if ($pageInfo['user_prompts']->hasPages())
                            <div class="uk-margin-top">
                                {{ $pageInfo['user_prompts']->links('components.pagination') }}
                            </div>
                        @endif
                    </div>
                </li>

                <!-- Create Tab -->
                <li>
                    @include('prompt_case.create')
                </li>

                <!-- Edit Tab -->
                <li>
                    @if (Request::is('prompt-case/*/edit'))
                        @include('prompt_case.edit')
                    @endif
                </li>
            </ul>
        </div>
    </div>

    @include('components.delete_modal')

@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Clipboard
            document.addEventListener('click', e => {
                const btn = e.target.closest('.copy-btn');
                if (btn) {
                    navigator.clipboard.writeText(btn.dataset.content)
                        .then(() => UIkit.notification({
                            message: 'پرامپت با موفقیت کپی شد!',
                            status: 'primary',
                            timeout: 3000
                        }));
                }
            });

            // Initialize Tom Select
            document.querySelectorAll('.tom-select').forEach(el => {
                if (!el.id) new TomSelect(el, {
                    create: false,
                    sortField: {
                        field: "text",
                        direction: "asc"
                    }
                });
            });
        });
    </script>
@endpush

@push('styles')
    <style>
        .uk-table-hover tbody tr:hover {
            background: rgba(100, 115, 230, 0.05);
        }

        .uk-card {
            padding: 20px;
        }

        .uk-switcher > li {
            padding-top: 20px;
        }
    </style>
@endpush

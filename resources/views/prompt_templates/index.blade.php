@extends('layouts.app')
@section('title', 'منبع پرامپت')

@section('content')

    <div class="uk-container uk-container-large" id="gallery-content">
        <!-- Enhanced Filter Bar -->
        <div class="uk-margin-medium-bottom uk-border-rounded uk-padding-small">
            <div class="uk-grid uk-grid-small uk-flex-middle uk-flex-wrap" uk-grid>
                <!-- Categories Tabs -->
                <div class="uk-width-expand@m uk-width-1-1">
                    <div class="uk-overflow-auto">
                        <ul class="uk-tab uk-tab-small uk-flex-nowrap uk-flex-middle uk-border-pill uk-box-shadow-small"
                            uk-switcher="animation: uk-animation-slide-left-small, uk-animation-slide-right-small">
                            <li class="{{ request('category') == 'all' || !request('category') ? 'uk-active' : '' }}">
                                <a href="{{ request()->fullUrlWithQuery(['category' => 'all']) }}"
                                   class="uk-text-truncate uk-text-bold {{ request('category') == 'all' || !request('category') ? 'uk-text-primary' : '' }}">همه</a>
                            </li>
                            @foreach($categories as $category)
                                <li class="{{ request('category') == strtolower($category->name) ? 'uk-active' : '' }}">
                                    <a href="{{ request()->fullUrlWithQuery(['category' => strtolower($category->name)]) }}"
                                       class="uk-text-truncate uk-text-bold {{ request('category') == strtolower($category->name) ? 'uk-text-primary' : '' }}">{{ $category->slug }}</a>
                                </li>
                            @endforeach>
                        </ul>
                    </div>
                </div>

                <!-- Sorting and View Controls -->
                <div class="uk-width-auto@m uk-width-1-1 uk-margin-small-top@m">
                    <div class="uk-flex uk-flex-right@m uk-flex-center uk-flex-wrap uk-grid-small" uk-grid>
                        <!-- Time Filter -->
                        <div>
                            <button class="uk-button uk-button-default uk-button-small uk-border-rounded uk-flex uk-flex-middle"
                                    type="button" aria-haspopup="true" aria-label="فیلتر بر اساس زمان">
                                <span>همه زمان‌ها</span>
                                <span uk-icon="icon: chevron-down; ratio: 0.8" class="uk-margin-small-right"></span>
                            </button>
                            <div uk-dropdown="mode: click; pos: bottom-right; animation: uk-animation-slide-top-small; duration: 200">
                                <ul class="uk-nav uk-dropdown-nav">
                                    <li class="uk-active"><a href="#" aria-label="همه زمان‌ها">همه زمان‌ها</a></li>
                                    <li class="uk-nav-divider"></li>
                                    <li><a href="#" aria-label="۲۴ ساعت گذشته">۲۴ ساعت گذشته</a></li>
                                    <li><a href="#" aria-label="هفته گذشته">هفته گذشته</a></li>
                                    <li><a href="#" aria-label="ماه گذشته">ماه گذشته</a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Sort Options -->
                        <div>
                            <button class="uk-button uk-button-default uk-button-small uk-border-rounded uk-flex uk-flex-middle"
                                    type="button" aria-haspopup="true" aria-label="مرتب‌سازی نتایج">
                                <span>پربازدیدها</span>
                                <span uk-icon="icon: chevron-down; ratio: 0.8" class="uk-margin-small-right"></span>
                            </button>
                            <div uk-dropdown="mode: click; pos: bottom-right; animation: uk-animation-slide-top-small; duration: 200">
                                <ul class="uk-nav uk-dropdown-nav">
                                    <li class="uk-active"><a href="#" aria-label="پربازدیدها">پربازدیدها</a></li>
                                    <li class="uk-nav-divider"></li>
                                    <li><a href="#" aria-label="جدیدترین">جدیدترین</a></li>
                                    <li><a href="#" aria-label="پرامتیازترین">پرامتیازترین</a></li>
                                    <li><a href="#" aria-label="محبوب‌ترین">محبوب‌ترین</a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- View Toggle -->
                        <div class="uk-button-group" role="group" aria-label="تغییر حالت نمایش">
                            <button id="grid-view-btn"
                                    class="uk-button uk-button-primary uk-button-small uk-border-rounded uk-border-remove-right uk-active"
                                    uk-tooltip="title: نمایش شبکه‌ای; pos: top"
                                    aria-label="نمایش شبکه‌ای" data-view="grid">
                                <span uk-icon="icon: grid; ratio: 0.9"></span>
                            </button>
                            <button id="list-view-btn"
                                    class="uk-button uk-button-default uk-button-small uk-border-rounded uk-border-remove-left"
                                    uk-tooltip="title: نمایش لیستی; pos: top"
                                    aria-label="نمایش لیستی" data-view="list">
                                <span uk-icon="icon: list; ratio: 0.9"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr class="uk-margin-medium">

        <!-- Gallery Container -->
        <div id="gallery-grid"
             class="uk-grid-small uk-child-width-1-2@s uk-child-width-1-3@m uk-child-width-1-4@l uk-child-width-1-5@xl"
             uk-grid="masonry: true"
             uk-scrollspy="cls: uk-animation-slide-bottom-small; target: > div; delay: 100; repeat: false"
             data-view="grid">
            @foreach ($images as $index => $image)
                <div class="gallery-item">
                    <div class="uk-card uk-card-default uk-card-hover uk-border-rounded uk-box-shadow-medium uk-transition-toggle">
                        <!-- Grid View -->
                        <div class="gallery-grid-view">
                            <div class="uk-card-media-top uk-position-relative uk-overflow-hidden uk-border-rounded">
                                <img class="uk-width-1-1 uk-border-rounded"
                                     src="{{ $image['path'] }}"
                                     alt="{{ $image['filename'] }}"
                                     loading="lazy"
                                     width="600"
                                     height="400"
                                     style="object-fit: cover; background: #f8f8f8; transition: opacity 0.4s ease-in-out;"
                                     onload="this.style.opacity=1"
                                     style="opacity: 0;">
                                <!-- Hover Overlay -->
                                <a class="uk-position-cover uk-transition-fade uk-overlay uk-overlay-primary uk-flex uk-flex-center uk-flex-middle uk-border-rounded"
                                   href="#image-modal" uk-toggle
                                   onclick="updateModalDetails({{
                                            json_encode([
                                                'id' => $index,
                                                'category' => 'تصویر',
                                                'date' => \Carbon\Carbon::now()->subDays(rand(1, 30))->diffForHumans(),
                                                'imageUrl' => $image['path'],
                                                'description' => $image['prompt'] ?? 'تصویری ایجاد شده با هوش مصنوعی'
                                            ], JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT)
                                        }})"
                                   aria-label="نمایش جزئیات {{ $image['filename'] }}">
                                    <div class="uk-text-center">
                                        <span uk-icon="icon: search; ratio: 1.5"></span>
                                        <p class="uk-margin-small-top uk-text-small uk-text-light">جزئیات</p>
                                    </div>
                                </a>
                                <!-- Action Buttons -->
                                <div class="uk-position-top-right uk-padding-small uk-visible-toggle">
                                    <button class="uk-button uk-button-text uk-button-small uk-padding-remove"
                                            uk-icon="icon: heart; ratio: 0.9"
                                            uk-tooltip="title: افزودن به علاقه‌مندی‌ها; pos: left"
                                            aria-label="افزودن به علاقه‌مندی‌ها"></button>
                                </div>
                                <div class="uk-position-top-left uk-padding-small uk-visible-toggle">
                                    <a href="{{ $image['path'] }}"
                                       class="uk-button uk-button-text uk-button-small uk-padding-remove"
                                       uk-icon="icon: expand; ratio: 0.9"
                                       uk-tooltip="title: نمایش تمام صفحه; pos: right"
                                       aria-label="نمایش تمام صفحه"></a>
                                </div>
                            </div>
                        </div>
                        <!-- List View -->
                        <div class="gallery-list-view uk-hidden">
                            <div class="uk-grid uk-grid-small" uk-grid>
                                <div class="uk-width-1-3@s">
                                    <img class="uk-width-1-1 uk-border-rounded"
                                         src="{{ $image['path'] }}"
                                         alt="{{ $image['filename'] }}"
                                         loading="lazy"
                                         width="200"
                                         height="150"
                                         style="object-fit: cover; background: #f8f8f8; transition: opacity 0.4s ease-in-out;"
                                         onload="this.style.opacity=1"
                                         style="opacity: 0;">
                                </div>
                                <div class="uk-width-2-3@s uk-flex uk-flex-column uk-flex-middle">
                                    <h3 class="uk-card-title uk-margin-small uk-text-small">{{ $image['filename'] }}</h3>
                                    <p class="uk-text-meta uk-margin-remove">{{ $image['prompt'] ?? 'تصویری ایجاد شده با هوش مصنوعی' }}</p>
                                    <div class="uk-flex uk-flex-middle uk-margin-small-top">
                                        <a href="#image-modal" uk-toggle
                                           onclick="updateModalDetails({{
                                                    json_encode([
                                                        'id' => $index,
                                                        'category' => 'تصویر',
                                                        'date' => \Carbon\Carbon::now()->subDays(rand(1, 30))->diffForHumans(),
                                                        'imageUrl' => $image['path'],
                                                        'description' => $image['prompt'] ?? 'تصویری ایجاد شده با هوش مصنوعی'
                                                    ], JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT)
                                                }})"
                                           class="uk-button uk-button-text uk-button-small"
                                           aria-label="نمایش جزئیات {{ $image['filename'] }}">جزئیات</a>
                                        <button class="uk-button uk-button-text uk-button-small uk-margin-small-left"
                                                uk-icon="icon: heart; ratio: 0.9"
                                                uk-tooltip="title: افزودن به علاقه‌مندی‌ها"
                                                aria-label="افزودن به علاقه‌مندی‌ها"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="uk-margin-large-top uk-text-center">
            {{ $images->links('components.pagination') }}
        </div>

        <!-- Loading Indicator -->
        <div class="uk-margin-top uk-text-center" id="loading-indicator" style="display: none;">
            <div uk-spinner="ratio: 0.8"></div>
        </div>
    </div>
    <!-- Media Modal -->
    @include('partials.media-modal')

    <!-- Guide Modal -->
    @include('partials.guide-modal')

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Initialize UI components
                const modal = UIkit.modal('#image-modal');
                const galleryGrid = document.getElementById('gallery-grid');
                const gridViewBtn = document.getElementById('grid-view-btn');
                const listViewBtn = document.getElementById('list-view-btn');

                // View Toggle Functionality
                function toggleView(view) {
                    if (view === 'grid') {
                        galleryGrid.setAttribute('data-view', 'grid');
                        galleryGrid.classList.remove('uk-child-width-1-1');
                        galleryGrid.classList.add(
                            'uk-grid-small',
                            'uk-child-width-1-2@s',
                            'uk-child-width-1-3@m',
                            'uk-child-width-1-4@l',
                            'uk-child-width-1-5@xl'
                        );
                        document.querySelectorAll('.gallery-grid-view').forEach(el => el.classList.remove('uk-hidden'));
                        document.querySelectorAll('.gallery-list-view').forEach(el => el.classList.add('uk-hidden'));
                        gridViewBtn.classList.add('uk-button-primary', 'uk-active');
                        gridViewBtn.classList.remove('uk-button-default');
                        listViewBtn.classList.add('uk-button-default');
                        listViewBtn.classList.remove('uk-button-primary', 'uk-active');
                    } else {
                        galleryGrid.setAttribute('data-view', 'list');
                        galleryGrid.classList.remove(
                            'uk-grid-small',
                            'uk-child-width-1-2@s',
                            'uk-child-width-1-3@m',
                            'uk-child-width-1-4@l',
                            'uk-child-width-1-5@xl'
                        );
                        galleryGrid.classList.add('uk-child-width-1-1');
                        document.querySelectorAll('.gallery-grid-view').forEach(el => el.classList.add('uk-hidden'));
                        document.querySelectorAll('.gallery-list-view').forEach(el => el.classList.remove('uk-hidden'));
                        listViewBtn.classList.add('uk-button-primary', 'uk-active');
                        listViewBtn.classList.remove('uk-button-default');
                        gridViewBtn.classList.add('uk-button-default');
                        gridViewBtn.classList.remove('uk-button-primary', 'uk-active');
                    }
                }

                // Event Listeners for View Toggle
                gridViewBtn.addEventListener('click', () => toggleView('grid'));
                listViewBtn.addEventListener('click', () => toggleView('list'));

                // Modal Details Update
                window.updateModalDetails = function (details) {
                    const modal = UIkit.modal('#image-modal');
                    const img = document.getElementById('modal-image');
                    const loading = document.getElementById('modal-loading');
                    const category = document.getElementById('modal-category');
                    const date = document.getElementById('modal-date');
                    const desc = document.getElementById('modal-description');

                    // Reset modal content
                    loading.style.display = 'block';
                    img.style.display = 'none';
                    img.src = '';

                    // Update modal content
                    category.textContent = details.category;
                    date.textContent = details.date;
                    if (desc) desc.textContent = details.description || '';

                    img.onload = function () {
                        loading.style.display = 'none';
                        img.style.display = 'block';
                    };
                    img.src = details.imageUrl;
                    img.alt = details.title || details.filename || 'تصویر';
                };
            });
        </script>
    @endpush
@endsection
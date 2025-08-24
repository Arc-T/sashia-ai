@extends('layouts.app')
@section('title', 'الگوهای پرامپت')

@section('content')
    <div class="uk-section uk-padding-remove-vertical">
        <div class="uk-container uk-container-expand" id="gallery-content">
            <!-- Unified Filter Bar with improved responsive behavior -->
            <!-- Categories Tabs & Sorting Controls -->
            <div class="uk-container uk-margin-medium-bottom">
                <div class="uk-grid uk-grid-small uk-flex-middle" uk-grid>
                    <!-- Categories Tabs -->
                    <div class="uk-width-expand@m uk-width-1-1">
                        <div class="uk-position-relative">
                            <!-- UIKit Grid with horizontal scrolling -->
                            <div class="uk-grid uk-grid-small uk-flex-nowrap uk-overflow-hidden" uk-grid>
                                <div class="uk-width-auto">
                                    <ul
                                        class="uk-tab uk-tab-small uk-border-rounded uk-background-default uk-box-shadow-small">
                                        <li class="uk-active"><a href="#" class="uk-text-truncate">همه</a></li>
                                        <li><a href="#" class="uk-text-truncate">شخصیت‌ها</a></li>
                                        <li><a href="#" class="uk-text-truncate">مناظر</a></li>
                                        <li><a href="#" class="uk-text-truncate">هنر مفهومی</a></li>
                                        <li><a href="#" class="uk-text-truncate">فوتورئال</a></li>
                                        <li><a href="#" class="uk-text-truncate">انیمه</a></li>
                                        <li><a href="#" class="uk-text-truncate">سه‌بعدی</a></li>
                                        <li><a href="#" class="uk-text-truncate">انتزاعی</a></li>
                                        <li><a href="#" class="uk-text-truncate">پرتره</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sorting Controls -->
                    <div class="uk-width-auto@m uk-width-1-1 uk-margin-small-top@m">
                        <div class="uk-flex uk-flex-right@m uk-flex-center uk-flex-wrap uk-grid-small" uk-grid>
                            <!-- Time Filter -->
                            <div>
                                <button
                                    class="uk-button uk-button-default uk-button-small uk-border-rounded uk-flex uk-flex-middle"
                                    type="button">
                                    <span>همه زمان‌ها</span>
                                    <span class="uk-margin-small-right" uk-icon="icon: chevron-down; ratio: 0.7"></span>
                                </button>
                                <div
                                    uk-dropdown="mode: click; pos: bottom-right; animation: uk-animation-slide-top-small; duration: 200">
                                    <ul class="uk-nav uk-dropdown-nav">
                                        <li class="uk-active"><a href="#">همه زمان‌ها</a></li>
                                        <li class="uk-nav-divider"></li>
                                        <li><a href="#">۲۴ ساعت گذشته</a></li>
                                        <li><a href="#">هفته گذشته</a></li>
                                        <li><a href="#">ماه گذشته</a></li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Sort Options -->
                            <div>
                                <button
                                    class="uk-button uk-button-default uk-button-small uk-border-rounded uk-flex uk-flex-middle"
                                    type="button">
                                    <span>پربازدیدها</span>
                                    <span class="uk-margin-small-right" uk-icon="icon: chevron-down; ratio: 0.7"></span>
                                </button>
                                <div
                                    uk-dropdown="mode: click; pos: bottom-right; animation: uk-animation-slide-top-small; duration: 200">
                                    <ul class="uk-nav uk-dropdown-nav">
                                        <li class="uk-active"><a href="#">پربازدیدها</a></li>
                                        <li class="uk-nav-divider"></li>
                                        <li><a href="#">جدیدترین</a></li>
                                        <li><a href="#">پرامتیازترین</a></li>
                                        <li><a href="#">محبوب‌ترین</a></li>
                                    </ul>
                                </div>
                            </div>

                            <!-- View Toggle -->
                            <div class="uk-button-group">
                                <button
                                    class="uk-button uk-button-default uk-button-small uk-border-rounded uk-border-remove-right"
                                    uk-tooltip="title: Grid View; pos: top">
                                    <span uk-icon="icon: grid; ratio: 0.8"></span>
                                </button>
                                <button
                                    class="uk-button uk-button-default uk-button-small uk-border-rounded uk-border-remove-left"
                                    uk-tooltip="title: List View; pos: top">
                                    <span uk-icon="icon: list; ratio: 0.8"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <!-- Gallery Grid with improved performance and loading states -->
            <div id="gallery-grid"
                class="uk-grid-small uk-child-width-1-2@s
uk-child-width-1-3@m uk-child-width-1-4@l uk-child-width-1-5@xl"
                uk-grid="masonry: true" uk-scrollspy="cls: uk-animation-fade; target: > div; delay: 150; repeat: true">

                <!-- Dynamic Gallery Items -->
                @foreach ($images as $index => $image)
                    <div>
                        <div
                            class="uk-card uk-card-default uk-card-hover uk-transition-toggle uk-border-rounded uk-box-shadow-small uk-box-shadow-hover-medium">
                            <div class="uk-card-media-top uk-position-relative uk-overflow-hidden">
                                <!-- Image with lazy loading and placeholder -->
                                <img class="uk-border-rounded uk-width-1-1" src="{{ $image['path'] }}"
                                    alt="{{ $image['filename'] }}" loading="lazy" width="600" height="400"
                                    style="background: #f5f5f5;" onload="this.style.opacity=1"
                                    style="opacity: 0; transition: opacity 0.3s ease-in-out">

                                <!-- Hover Overlay with better accessibility -->
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
                                        <p class="uk-margin-small-top uk-text-small">برای جزئیات بیشتر کلیک کنید</p>
                                    </div>
                                </a>

                                <!-- Action Buttons with better touch targets -->
                                <div class="uk-position-top-right uk-padding-small uk-visible-toggle">
                                    <button class="uk-button uk-button-text uk-button-small uk-padding-remove"
                                        uk-icon="icon: heart; ratio: 0.9" uk-tooltip="افزودن به علاقه‌مندی‌ها"
                                        aria-label="افزودن به علاقه‌مندی‌ها"></button>
                                </div>
                                <div class="uk-position-top-left uk-padding-small uk-visible-toggle">
                                    <a href="{{ $image['path'] }}"
                                        class="uk-button uk-button-text uk-button-small uk-padding-remove"
                                        uk-icon="icon: expand; ratio: 0.9" uk-tooltip="نمایش تمام صفحه"
                                        aria-label="نمایش تمام صفحه" data-caption="{{ $image['filename'] }}"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="uk-margin-top">
                {{ $images->links('components.pagination') }}
            </div>

            <!-- Loading indicator for infinite scroll -->
            <div class="uk-margin-top uk-text-center" uk-spinner="ratio: 0.8" style="display: none;"
                id="loading-indicator"></div>
        </div>
    </div>

    <!-- Media modal -->
    @include('partials.media-modal')

    <!-- guide modal -->
    @include('partials.guide-modal')

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Initialize UI components
                const modal = UIkit.modal('#image-modal');

                window.updateModalDetails = function(details) {
                    const modal = UIkit.modal('#image-modal' + details.id);

                    // Reset modal content before loading new
                    document.getElementById('modal-loading').style.display = 'block';
                    document.getElementById('modal-image').style.display = 'none';
                    document.getElementById('modal-image').src = ''; // reset src first

                    // Set modal content
                    document.getElementById('modal-category').textContent = details.category;
                    document.getElementById('modal-date').textContent = details.date;

                    const img = document.getElementById('modal-image');
                    img.onload = function() {
                        document.getElementById('modal-loading').style.display = 'none';
                        img.style.display = 'block';
                    };
                    img.src = details.imageUrl;
                    img.alt = details.title;

                    // Description
                    const descElement = document.getElementById('modal-description');
                    if (descElement) {
                        descElement.textContent = details.description || '';
                    }
                };
            });
        </script>
    @endpush
@endsection

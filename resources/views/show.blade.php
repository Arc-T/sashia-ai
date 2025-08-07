@extends('layouts.app')
@section('title', 'گالری تصاویر الهام‌بخش')

@section('content')
    <div class="uk-section uk-section-default uk-padding-remove-vertical">
        <div class="uk-container uk-container-expand" id="gallery-content">
            <!-- Unified Filter Bar with improved responsive behavior -->
            <div class="uk-grid-small uk-flex-middle uk-margin-bottom" uk-grid>
                <!-- Categories Tabs - Now with responsive behavior -->
                <div class="uk-width-expand@m uk-width-1-1 uk-margin-bottom@s">
                    <div class="uk-position-relative">
                        <!-- Tab navigation with arrow indicators for overflow -->
                        <div class="uk-visible-toggle" tabindex="-1" uk-slider>
                            <ul class="uk-tab uk-tab-small uk-slider-items uk-flex-nowrap uk-border-rounded">
                                <li><a href="#" class="uk-text-truncate">همه</a></li>
                                <li><a href="#" class="uk-text-truncate">شخصیت‌ها</a></li>
                                <li><a href="#" class="uk-text-truncate">مناظر</a></li>
                                <li><a href="#" class="uk-text-truncate">هنر مفهومی</a></li>
                                <li><a href="#" class="uk-text-truncate">فوتورئال</a></li>
                                <li><a href="#" class="uk-text-truncate">انیمه</a></li>
                                <li><a href="#" class="uk-text-truncate">سه‌بعدی</a></li>
                                <li><a href="#" class="uk-text-truncate">انتزاعی</a></li>
                                <li><a href="#" class="uk-text-truncate">پرتره</a></li>
                            </ul>
                            <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#"
                                uk-slidenav-next uk-slider-item="next"></a>
                            <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#"
                                uk-slidenav-previous uk-slider-item="previous"></a>
                        </div>
                    </div>
                </div>

                <!-- Sorting Controls - Improved dropdowns with better mobile behavior -->
                <div class="uk-width-auto@m uk-width-1-1">
                    <div class="uk-flex uk-flex-middle uk-flex-right@m uk-flex-wrap uk-child-width-auto">
                        <!-- Time Dropdown -->
                        <div class="uk-inline uk-margin-small-left">
                            <button class="uk-button uk-button-text uk-button-small uk-border-rounded" type="button">
                                <span class="uk-margin-small-left">همه زمان‌ها</span>
                                <span uk-icon="icon: chevron-down; ratio: 0.8"></span>
                            </button>
                            <div
                                uk-dropdown="mode: click; pos: bottom-right; boundary: #gallery-content; boundary-align: true">
                                <ul class="uk-nav uk-dropdown-nav">
                                    <li><a href="#" class="uk-active">همه زمان‌ها</a></li>
                                    <li><a href="#">۲۴ ساعت گذشته</a></li>
                                    <li><a href="#">هفته گذشته</a></li>
                                    <li><a href="#">ماه گذشته</a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Sort Dropdown -->
                        <div class="uk-inline uk-margin-small-left">
                            <button class="uk-button uk-button-text uk-button-small uk-border-rounded" type="button">
                                <span class="uk-margin-small-left">پربازدیدها</span>
                                <span uk-icon="icon: chevron-down; ratio: 0.8"></span>
                            </button>
                            <div
                                uk-dropdown="mode: click; pos: bottom-right; boundary: #gallery-content; boundary-align: true">
                                <ul class="uk-nav uk-dropdown-nav">
                                    <li><a href="#" class="uk-active">پربازدیدها</a></li>
                                    <li><a href="#">جدیدترین</a></li>
                                    <li><a href="#">پرامتیازترین</a></li>
                                    <li><a href="#">محبوب‌ترین</a></li>
                                </ul>
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

                <!-- Gallery Item Template (would be generated dynamically in a real app) -->
                <div>
                    <div
                        class="uk-card uk-card-default uk-card-hover uk-transition-toggle uk-border-rounded uk-box-shadow-small uk-box-shadow-hover-medium">
                        <div class="uk-card-media-top uk-position-relative uk-overflow-hidden">
                            <!-- Image with lazy loading and placeholder -->
                            <img class="uk-border-rounded uk-width-1-1" src="https://picsum.photos/id/1018/600/400"
                                alt="جنگل سرسبز" loading="lazy" width="600" height="400" style="background: #f5f5f5;"
                                onload="this.style.opacity=1" style="opacity: 0; transition: opacity 0.3s ease-in-out">

                            <!-- Hover Overlay with better accessibility -->
                            <a class="uk-position-cover uk-transition-fade uk-overlay uk-overlay-primary uk-flex uk-flex-center uk-flex-middle"
                                href="#image-modal" uk-toggle
                                onclick="updateModalDetails({
                               title: 'جنگل سرسبز',
                               category: 'طبیعت',
                               date: '۲ روز پیش',
                               imageUrl: 'https://picsum.photos/id/1018/1200/800',
                               description: 'تصویری از یک جنگل سرسبز با درختان بلند و نور خورشید که از میان برگ‌ها می‌تابد.'
                           })"
                                aria-label="نمایش جزئیات جنگل سرسبز">
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
                                <a href="https://picsum.photos/id/1018/1200/800"
                                    class="uk-button uk-button-text uk-button-small uk-padding-remove"
                                    uk-icon="icon: expand; ratio: 0.9" uk-tooltip="نمایش تمام صفحه"
                                    aria-label="نمایش تمام صفحه" data-caption="جنگل سرسبز - طبیعت"></a>
                            </div>
                        </div>

                        <!-- Card Body with improved information hierarchy -->
                        <div class="uk-card-body uk-padding-small">
                            <h3 class="uk-card-title uk-margin-remove-bottom uk-text-bold uk-text-truncate">
                                جنگل سرسبز
                            </h3>

                            <div class="uk-flex uk-flex-middle uk-margin-small-top uk-flex-between">
                                <div class="uk-flex uk-flex-wrap uk-flex-middle">
                                    <span
                                        class="uk-badge uk-label uk-label-success uk-margin-small-left uk-margin-small-bottom">طبیعت</span>
                                    <span class="uk-text-meta uk-text-small">۲ روز پیش</span>
                                </div>

                                <div class="uk-flex uk-flex-middle uk-text-muted uk-text-small">
                                    <span class="uk-margin-xsmall-left" uk-icon="icon: heart; ratio: 0.8"></span>
                                    <span>۱۲۴</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Additional items would be loaded here -->
            </div>

            <!-- Loading indicator for infinite scroll -->
            <div class="uk-margin-top uk-text-center" uk-spinner="ratio: 0.8" style="display: none;"
                id="loading-indicator"></div>

            <!-- Load More Button -->
            <div class="uk-margin-top uk-text-center">
                <button class="uk-button uk-button-default uk-border-rounded" id="load-more">
                    بارگذاری موارد بیشتر
                </button>
            </div>
        </div>
    </div>

    <!-- Image Modal (would be used for showing full details) -->
    <div id="image-modal" uk-modal>
        <div class="uk-modal-dialog uk-modal-body uk-width-auto uk-margin-auto-vertical">
            <button class="uk-modal-close-outside" type="button" uk-close></button>
            <img id="modal-image" src="" alt="" loading="lazy">
            <div class="uk-margin-top">
                <h3 id="modal-title" class="uk-modal-title"></h3>
                <div class="uk-flex uk-flex-middle uk-margin-small-bottom">
                    <span id="modal-category" class="uk-badge uk-label"></span>
                    <span id="modal-date" class="uk-text-meta uk-margin-small-left"></span>
                </div>
                <p id="modal-description" class="uk-text-meta"></p>
            </div>
        </div>
    </div>


    <!-- Media modal -->
    @include('partials.media-modal')

    <!-- guide modal -->
    @include('partials.guide-modal')

    <script>
        function copyImageLink() {
            const image = document.getElementById("modal-image");
            const url = image?.src;
            if (!url) return;
            navigator.clipboard.writeText(url).then(() => UIkit.notification("لینک کپی شد!", "success"));
        }

        document.getElementById("modal-image").addEventListener("load", () => {
            document.getElementById("modal-loading").style.display = "none";
            document.getElementById("modal-image").style.display = "block";
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // Initialize UI components
            const modal = UIkit.modal('#image-modal');

            window.updateModalDetails = function(title, category, date, imageSrc, description) {
                // Set modal content
                document.getElementById('modal-title').textContent = title;
                document.getElementById('modal-category').textContent = category;
                document.getElementById('modal-date').textContent = date;
                document.getElementById('modal-image').src = imageSrc;
                document.getElementById('modal-image').alt = title;

                // Show the modal
                UIkit.modal('#image-modal').show();

                // Optional: Update description if you have that element
                const descElement = document.getElementById('modal-description');
                if (descElement && description) {
                    descElement.textContent = description;
                }
            };
        });
    </script>
@endsection



<!-- Loading Skeletons (will be replaced with actual content) -->
{{-- <div>
                    <div class="uk-card uk-card-default uk-card-hover uk-card-small uk-transition-toggle">
                        <div class="uk-card-media-top">
                            <div class="uk-height-medium uk-background-muted uk-flex uk-flex-center uk-flex-middle">
                                <div uk-spinner="ratio: 2"></div>
                            </div>
                        </div>
                        <div class="uk-card-body uk-padding-small">
                            <div class="uk-placeholder uk-margin-remove"></div>
                            <div class="uk-placeholder uk-placeholder-small uk-margin-small-top"></div>
                        </div>
                    </div>
                </div> --}}

<!-- Repeat skeleton for more loading items -->
{{-- <div>
                    <div class="uk-card uk-card-default uk-card-hover uk-card-small uk-transition-toggle">
                        <div class="uk-card-media-top">
                            <div class="uk-height-medium uk-background-muted uk-flex uk-flex-center uk-flex-middle">
                                <div uk-spinner="ratio: 2"></div>
                            </div>
                        </div>
                        <div class="uk-card-body uk-padding-small">
                            <div class="uk-placeholder uk-margin-remove"></div>
                            <div class="uk-placeholder uk-placeholder-small uk-margin-small-top"></div>
                        </div>
                    </div>
                </div> --}}

<!-- Hero Section -->
{{-- <div class="uk-background-cover uk-background-fixed uk-light"
            style="background-image: url('https://picsum.photos/id/1041/1920/600');">
            <div class="uk-overlay-primary uk-padding uk-flex uk-flex-center uk-flex-middle" style="min-height: 300px;">
                <div class="uk-text-center">
                    <h1 class="uk-heading-primary uk-text-bold">گالری تصاویر الهام‌بخش</h1>
                    <p class="uk-text-lead">کشف کنید. الهام بگیرید. خلق کنید.</p>
                    <div class="uk-margin-medium-top">
                        <button class="uk-button uk-button-primary uk-button-large"
                            uk-scroll="target: #gallery-content">مشاهده گالری</button>
                    </div>
                </div>
            </div>
</div> --}}

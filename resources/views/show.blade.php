@extends('layouts.app')
@section('title', 'گالری تصاویر الهام‌بخش')

@section('content')
    <div class="uk-section uk-section-default uk-padding-remove-top">
        <div class="uk-container uk-container-large uk-margin-top" id="gallery-content">

            <!-- Search and Filter Bar -->
            <div class="uk-card uk-card-default uk-card-body uk-box-shadow-medium uk-margin-bottom uk-border-rounded"
                uk-sticky="offset: 80; media: @m; bottom: #gallery-grid">

                <form class="uk-grid-small uk-grid uk-form-stacked" uk-grid>
                    <div class="uk-width-1-1 uk-width-expand@m">
                        <div class="uk-inline uk-width-1-1">
                            <span class="uk-form-icon" uk-icon="icon: search"></span>
                            <input class="uk-input uk-form-large uk-border-pill" type="text"
                                placeholder="جستجو در تصاویر..." aria-label="جستجو">
                        </div>
                    </div>

                    <div class="uk-width-1-2 uk-width-auto@m">
                        <div class="uk-inline uk-width-1-1">
                            <button class="uk-button uk-button-default uk-button-large uk-width-1-1 uk-border-pill"
                                type="button">
                                دسته‌بندی <span uk-icon="icon: chevron-down"></span>
                            </button>
                            <div uk-dropdown="mode: click; flip: false">
                                <ul class="uk-nav uk-dropdown-nav">
                                    <li><a href="#">همه دسته‌بندی‌ها</a></li>
                                    <li><a href="#">طبیعت</a></li>
                                    <li><a href="#">فانتزی</a></li>
                                    <li><a href="#">علمی-تخیلی</a></li>
                                    <li><a href="#">شهری</a></li>
                                    <li><a href="#">تاریخی</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="uk-width-1-2 uk-width-auto@m">
                        <div class="uk-inline uk-width-1-1">
                            <button class="uk-button uk-button-default uk-button-large uk-width-1-1 uk-border-pill"
                                type="button">
                                مرتب‌سازی <span uk-icon="icon: chevron-down"></span>
                            </button>
                            <div uk-dropdown="mode: click; flip: false">
                                <ul class="uk-nav uk-dropdown-nav">
                                    <li><a href="#">جدیدترین</a></li>
                                    <li><a href="#">محبوب‌ترین</a></li>
                                    <li><a href="#">تصادفی</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="uk-width-1-1 uk-width-auto@m">
                        <button class="uk-button uk-button-primary uk-button-large uk-width-1-1 uk-border-pill"
                            uk-toggle="target: #advanced-filters">
                            <span uk-icon="icon: settings"></span>
                            <span class="uk-visible@m">فیلترهای پیشرفته</span>
                        </button>
                    </div>
                </form>

                <!-- Advanced Filters -->
                <div id="advanced-filters" class="uk-margin-top" hidden>
                    <ul uk-accordion="multiple: true">
                        <li>
                            <a class="uk-accordion-title" href="#">جهت تصویر</a>
                            <div class="uk-accordion-content">
                                <div class="uk-button-group">
                                    <button class="uk-button uk-button-default uk-button-small">همه</button>
                                    <button class="uk-button uk-button-default uk-button-small" uk-tooltip="عمودی">
                                        <span uk-icon="icon: image"></span>
                                    </button>
                                    <button class="uk-button uk-button-default uk-button-small" uk-tooltip="افقی">
                                        <span uk-icon="icon: image"></span>
                                    </button>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a class="uk-accordion-title" href="#">کیفیت</a>
                            <div class="uk-accordion-content">
                                <div class="uk-grid-small" uk-grid>
                                    <div class="uk-width-expand">
                                        <input class="uk-range" type="range" value="2" min="0" max="4"
                                            step="1">
                                    </div>
                                    <div class="uk-width-auto">
                                        <span class="uk-label">HD+</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Gallery Grid -->
            <div id="gallery-grid"
                class="uk-grid-small uk-child-width-1-2@s
uk-child-width-1-3@m uk-child-width-1-4@l uk-child-width-1-5@xl"
                uk-grid="masonry: true" uk-scrollspy="cls: uk-animation-fade; target: > div; delay: 100; repeat: true">

                <!-- Gallery Item -->
                <div>
                    <div class="uk-card uk-card-default uk-card-hover uk-transition-toggle uk-border-rounded">
                        <div class="uk-card-media-top uk-position-relative">
                            <img class="uk-border-rounded" src="https://picsum.photos/id/1018/600/400" alt="جنگل سرسبز"
                                loading="lazy">

                            <!-- Hover Overlay -->
                            <div class="uk-transition-fade uk-position-cover uk-overlay uk-overlay-default uk-flex uk-flex-center uk-flex-middle uk-light"
                                onclick="updateModalDetails('جنگل سرسبز','طبیعت','۲ روز پیش','https://picsum.photos/id/1018/1200/800','تصویری از یک جنگل سرسبز با درختان بلند و نور خورشید که از میان برگ‌ها می‌تابد.')">
                                <div class="uk-text-center">
                                    <span uk-icon="icon: search; ratio: 1.5" style="color:black"></span>
                                    <p class="uk-margin-small-top" style="color:black">برای جزئیات بیشتر کلیک کنید</p>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="uk-position-top-right uk-padding-small uk-visible-toggle">
                                <button class="uk-button uk-button-text uk-button-small" uk-icon="icon: heart"
                                    uk-tooltip="افزودن به علاقه‌مندی‌ها"></button>
                            </div>
                            <div class="uk-position-top-left uk-padding-small uk-visible-toggle">
                                <a href="https://picsum.photos/id/1018/1200/800"
                                    class="uk-button uk-button-text uk-button-small" uk-icon="icon: expand"
                                    uk-tooltip="نمایش تمام صفحه" data-caption="جنگل سرسبز - طبیعت"></a>
                            </div>
                        </div>
                        <div class="uk-card-body uk-padding-small uk-background-muted uk-border-rounded-bottom">
                            <h4 class="uk-card-title uk-margin-remove-bottom uk-text-bold uk-text-truncate">جنگل سرسبز</h4>

                            <div class="uk-flex uk-flex-middle uk-margin-small-top uk-flex-between">
                                <div class="uk-flex uk-flex-middle">
                                    <span class="uk-badge uk-label uk-label-success uk-margin-small-left">طبیعت</span>
                                    <span class="uk-text-meta uk-text-small">۲ روز پیش</span>
                                </div>

                                <div class="uk-flex uk-flex-middle uk-text-muted uk-text-small">
                                    <span class="uk-margin-small-left" uk-icon="icon: heart"></span>
                                    <span>۱۲۴</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <div class="uk-margin-large-top">
                <div class="uk-grid-small" uk-grid>
                    <div class="uk-width-1-1 uk-width-expand@m">
                        <ul class="uk-pagination uk-flex-center uk-flex-left@m" uk-margin>
                            <li><a href="#"><span uk-pagination-previous></span></a></li>
                            <li><a href="#">1</a></li>
                            <li class="uk-active"><span>2</span></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#"><span uk-pagination-next></span></a></li>
                        </ul>
                    </div>
                    <div class="uk-width-1-1 uk-width-auto@m">
                        <button class="uk-button uk-button-primary uk-border-pill uk-width-1-1">
                            <span uk-icon="icon: plus"></span> نمایش بیشتر
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Wrapper -->
    <div id="image-modal" uk-modal="bg-close: true; esc-close: true;">
        <div class="uk-modal-dialog uk-margin-auto-vertical uk-width-1-1 uk-width-3-4@m uk-border-rounded uk-overflow-hidden"
            style="max-width: 1200px;">

            <!-- Close Button -->
            <button class="uk-modal-close-default" type="button" uk-close></button>

            <div class="uk-grid-collapse uk-grid-match uk-flex-middle" uk-grid>

                <!-- Image Column -->
                <div class="uk-width-1-1 uk-width-2-3@m uk-position-relative uk-padding-remove">
                    <!-- Skeleton Loader -->
                    <div id="modal-loading" class="uk-position-center uk-text-center">
                        <span uk-spinner="ratio: 2"></span>
                        <p class="uk-text-muted uk-margin-small-top">در حال بارگذاری تصویر...</p>
                    </div>

                    <!-- Image Display with Card -->
                    <div class="uk-overflow-hidden uk-position-relative uk-flex uk-flex-center uk-flex-middle uk-padding-small"
                        style="max-height: 90vh;">

                        <img id="modal-image" src="" alt="تصویر تولید شده توسط هوش مصنوعی"
                            class="uk-border-rounded uk-transition-scale-up uk-transition-opaque"
                            style="max-height: 90vh; max-width: 100%; object-fit: contain; display: none;">
                    </div>
                    <!-- Navigation (RTL adjusted) -->
                    <div
                        class="uk-position-center-left uk-visible-toggle uk-padding-small uk-text-small uk-flex uk-flex-between uk-width-1-1">
                        <a href="#" class="uk-icon-button uk-border-circle" uk-icon="chevron-left"
                            uk-tooltip="بعدی"></a>
                        <a href="#" class="uk-icon-button uk-border-circle" uk-icon="chevron-right"
                            uk-tooltip="قبلی"></a>
                    </div>

                </div>

                <!-- Info Column -->
                <div class="uk-width-1-1 uk-width-1-3@m uk-background-default uk-border-rounded-right uk-overflow-auto uk-padding-small"
                    style="max-height: 90vh;">
                    <div class="uk-padding-small">
                        <!-- Title & Metadata -->
                        <!-- Title + Meta + Actions -->
                        <div class="uk-flex uk-flex-between uk-flex-middle uk-margin-bottom">

                            <!-- Title & Metadata -->
                            <div>
                                <h3 id="modal-title" class="uk-margin-remove uk-text-bold"></h3>
                                <div class="uk-text-meta">
                                    <span id="modal-date" class="uk-text-muted"></span>
                                    <span id="modal-category"
                                        class="uk-label uk-label-success uk-margin-small-right"></span>
                                </div>
                            </div>

                            <!-- Top left buttons -->
                            <div class="uk-flex uk-flex-middle" uk-grid>
                                <div class="uk-button-group uk-grid-small" uk-grid>
                                    <div>
                                        <button
                                            class="uk-icon-button uk-button-default uk-border-circle uk-box-shadow-small"
                                            uk-icon="download" uk-tooltip="دانلود تصویر">
                                        </button>
                                    </div>
                                    <div>
                                        <button
                                            class="uk-icon-button uk-button-default uk-border-circle uk-box-shadow-small"
                                            uk-icon="social" uk-tooltip="اشتراک‌گذاری">
                                        </button>
                                    </div>
                                    <div>
                                        <button
                                            class="uk-icon-button uk-button-default uk-border-circle uk-box-shadow-small"
                                            uk-icon="more-vertical" uk-toggle="target: #image-more-actions">
                                        </button>
                                    </div>
                                </div>
                            </div>
                            {{-- More actions items --}}
                            <div id="image-more-actions" uk-dropdown="mode: click; pos: bottom-right">
                                <ul class="uk-nav uk-dropdown-nav">
                                    <li><a href="#" onclick="copyImageLink()"><span uk-icon="copy"></span> کپی
                                            لینک</a></li>
                                    <li class="uk-nav-divider"></li>
                                    <li><a href="#"><span uk-icon="warning"></span> گزارش مشکل</a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Uploader -->
                        <div class="uk-card uk-card-default uk-card-small uk-border-rounded uk-margin-bottom">
                            <div class="uk-card-body uk-padding-small uk-flex uk-flex-middle">
                                <img class="uk-border-circle uk-box-shadow-small uk-margin-small-left"
                                    src="https://randomuser.me/api/portraits/women/43.jpg" width="48" height="48"
                                    alt="Uploader">
                                <div>
                                    <div class="uk-text-bold">سارا محمدی</div>
                                    <div class="uk-text-meta">عکاس حرفه‌ای طبیعت</div>
                                </div>
                            </div>
                        </div>

                        <!-- Primary Actions Section -->

                        <div class="uk-grid-small uk-child-width-1-2@s uk-flex-middle" uk-grid>

                            <!-- Get Prompt Button -->
                            <div>
                                <button
                                    class="uk-button uk-button-danger uk-button-large uk-width-1-1 uk-border-pill uk-box-shadow-hover-large">
                                    <span uk-icon="comment" class="uk-margin-small-left"></span>
                                    پرامپت
                                </button>
                            </div>
                            <!-- Help Button -->
                            <div>
                                <button
                                    class="uk-button uk-button-success uk-button-large uk-width-1-1 uk-border-pill uk-box-shadow-hover-large"
                                    uk-toggle="target: #prompt-guide-modal">
                                    <span uk-icon="question" class="uk-margin-small-left"></span>
                                    راهنما </button>
                            </div>

                        </div>

                        <!-- Stats -->
                        <div class="uk-grid-small uk-child-width-expand@s
uk-margin-top" uk-grid>
                            <div>
                                <div
                                    class="uk-card uk-card-default uk-card-body uk-card-small uk-text-center uk-border-rounded">
                                    <span uk-icon="eye"></span>
                                    <div class="uk-text-bold">1,245</div>
                                    <div class="uk-text-meta">بازدید</div>
                                </div>
                            </div>
                            <div>
                                <div
                                    class="uk-card uk-card-default uk-card-body uk-card-small uk-text-center uk-border-rounded">
                                    <span uk-icon="cloud-download"></span>
                                    <div class="uk-text-bold">328</div>
                                    <div class="uk-text-meta">دانلود</div>
                                </div>
                            </div>
                            <div>
                                <div
                                    class="uk-card uk-card-default uk-card-body uk-card-small uk-text-center uk-border-rounded">
                                    <span uk-icon="heart"></span>
                                    <div class="uk-text-bold">87</div>
                                    <div class="uk-text-meta">لایک</div>
                                </div>
                            </div>
                        </div>

                        <!-- Image Info List -->
                        <div class="uk-card uk-card-default uk-card-small uk-border-rounded uk-margin-top">
                            <div class="uk-card-header">
                                <h5 class="uk-heading-bullet uk-margin-remove">اطلاعات تصویر</h5>
                            </div>
                            <div class="uk-card-body uk-padding-small">
                                <ul class="uk-list uk-list-divider uk-list-small">
                                    <li><span class="uk-text-muted">ابعاد:</span> 1200×800</li>
                                    <li><span class="uk-text-muted">حجم:</span> 450 کیلوبایت</li>
                                    <li><span class="uk-text-muted">فرمت:</span> JPEG</li>
                                    <li><span class="uk-text-muted">دوربین:</span> Canon EOS 5D</li>
                                    <li><span class="uk-text-muted">مجوز:</span> <span class="uk-text-success">استفاده
                                            آزاد</span></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Tags -->
                        <div class="uk-margin-top">
                            <h5 class="uk-heading-line uk-text-small"><span>تگ‌ها</span></h5>
                            <div class="uk-flex uk-flex-wrap uk-flex-center">
                                <a href="#"
                                    class="uk-label uk-label-success uk-border-pill uk-margin-small-left uk-margin-small-bottom">طبیعت</a>
                                <a href="#"
                                    class="uk-label uk-label-success uk-border-pill uk-margin-small-left uk-margin-small-bottom">درخت</a>
                                <a href="#"
                                    class="uk-label uk-label-success uk-border-pill uk-margin-small-left uk-margin-small-bottom">سبز</a>
                            </div>
                        </div>


                        <!-- Related -->
                        <div class="uk-margin-top">
                            <h5 class="uk-heading-line uk-text-small"><span>تصاویر مرتبط</span></h5>
                            <div class="uk-grid-small uk-child-width-1-3" uk-grid uk-lightbox>
                                <div><a href="https://source.unsplash.com/random/800x600?nature"
                                        class="uk-border-rounded"><img
                                            src="https://source.unsplash.com/random/300x200?nature" alt=""></a>
                                </div>
                                <div><a href="https://source.unsplash.com/random/800x600?forest"
                                        class="uk-border-rounded"><img
                                            src="https://source.unsplash.com/random/300x200?forest" alt=""></a>
                                </div>
                                <div><a href="https://source.unsplash.com/random/800x600?tree"
                                        class="uk-border-rounded"><img
                                            src="https://source.unsplash.com/random/300x200?tree" alt=""></a>
                                </div>
                            </div>
                        </div>

                        <!-- Social -->
                        <div class="uk-margin-top">
                            <h5 class="uk-heading-line uk-text-small"><span>اشتراک‌گذاری</span></h5>
                            <div class="uk-flex uk-flex-center">
                                <a class="uk-icon-button uk-icon-button-primary" uk-icon="twitter"></a>
                                <a class="uk-icon-button uk-icon-button-primary" uk-icon="facebook"></a>
                                <a class="uk-icon-button uk-icon-button-primary" uk-icon="linkedin"></a>
                                <a class="uk-icon-button uk-icon-button-primary" uk-icon="whatsapp"></a>
                                <a class="uk-icon-button uk-icon-button-primary" uk-icon="telegram"></a>
                                <a class="uk-icon-button uk-icon-button-primary" uk-icon="pinterest"></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

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



    <!-- Filter/Search JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Custom debounce function
            function debounce(func, wait, immediate) {
                let timeout;
                return function() {
                    const context = this,
                        args = arguments;
                    const later = function() {
                        timeout = null;
                        if (!immediate) func.apply(context, args);
                    };
                    const callNow = immediate && !timeout;
                    clearTimeout(timeout);
                    timeout = setTimeout(later, wait);
                    if (callNow) func.apply(context, args);
                };
            };

            // Initialize UI components
            const modal = UIkit.modal('#image-modal');

            // Filter functionality
            const searchInput = document.getElementById('search-input');
            const categoryFilter = document.getElementById('category-filter');
            const galleryItems = document.querySelectorAll('[data-category]');

            function filterGallery() {
                const searchTerm = searchInput.value.toLowerCase();
                const selectedCategory = categoryFilter.value;

                galleryItems.forEach(item => {
                    const matchesCategory = !selectedCategory || item.dataset.category === selectedCategory;
                    const matchesSearch = !searchTerm ||
                        item.dataset.tags.includes(searchTerm) ||
                        item.querySelector('.uk-card-title').textContent.toLowerCase().includes(searchTerm);

                    item.style.display = (matchesCategory && matchesSearch) ? '' : 'none';
                });

                // Update masonry layout after filtering
                UIkit.update('grid', '#gallery-grid');
            }

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

            // Use our custom debounce function
            searchInput.addEventListener('input', debounce(filterGallery, 300));
            categoryFilter.addEventListener('change', filterGallery);

            // Simulate loading images
            setTimeout(() => {
                // In a real app, this would be replaced with actual content loading
                document.querySelectorAll('.uk-background-muted').forEach(loader => {
                    loader.parentElement.parentElement.style.display = 'none';
                });

                // Update masonry layout after loading
                UIkit.update('grid', '#gallery-grid');
            }, 1500);
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

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


    <!-- Image Detail Modal -->
    <div id="image-modal" uk-modal="bg-close: false">
        <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical uk-width-1-1 uk-width-3-4@m uk-border-rounded"
            style="max-width: 1200px;">

            <!-- Close Button -->
            <button class="uk-modal-close-outside uk-icon uk-close-large" type="button" uk-close></button>

            <div class="uk-grid-collapse" uk-grid>

                <!-- Image Column -->
                <div class="uk-width-1-1 uk-width-2-3@m uk-background-muted uk-flex uk-flex-middle uk-position-relative"
                    style="min-height: 70vh;">
                    <!-- Image Wrapper -->
                    <div class="uk-position-relative" style="min-height: 70vh;">

                        <!-- Image Actions: Floating Top-Right Overlay -->
                        <div class="uk-position-top-right uk-margin-small-top uk-margin-small-right" style="z-index: 2;">
                            <div class="uk-flex uk-flex-middle uk-flex-right uk-background-transparent">
                                <a class="uk-icon-button uk-dark uk-margin-small-left" uk-icon="download"
                                    uk-tooltip="title: دانلود"></a>
                                <a class="uk-icon-button uk-dark uk-margin-small-left" uk-icon="social"
                                    uk-tooltip="title: اشتراک‌گذاری"></a>
                                <a class="uk-icon-button uk-dark" uk-icon="bookmark" uk-tooltip="title: ذخیره"></a>
                            </div>
                        </div>

                        <!-- Loading Spinner -->
                        <div id="modal-loading" class="uk-position-center" uk-spinner="ratio: 2"></div>

                        <!-- Image -->
                        <img id="modal-image" src="" alt="" class="uk-width-1-1 uk-height-max-large"
                            style="object-fit: contain; display: none;"
                            onload="document.getElementById('modal-loading').style.display = 'none'; this.style.display = '';">
                    </div>

                </div>

                <!-- Info Column -->
                <div class="uk-width-1-1 uk-width-1-3@m uk-padding uk-background-default uk-overflow-auto">

                    <!-- Title & Like -->
                    <div class="uk-flex uk-flex-between uk-flex-middle uk-margin-bottom">
                        <h3 id="modal-title" class="uk-margin-remove uk-text-bold uk-text-large"></h3>
                        <button class="uk-icon-button uk-button-secondary" uk-icon="heart"
                            uk-tooltip="افزودن به علاقه‌مندی‌ها"></button>
                    </div>

                    <!-- Meta -->
                    <div class="uk-margin-small-bottom">
                        <span id="modal-category" class="uk-label uk-label-success uk-margin-small-left"></span>
                        <span id="modal-date" class="uk-text-small uk-text-muted"></span>
                    </div>

                    <!-- Uploader Info -->
                    <div class="uk-card uk-card-default uk-card-body uk-card-small uk-border-rounded uk-margin-bottom">
                        <div class="uk-flex uk-flex-middle">
                            <img class="uk-border-circle uk-box-shadow-small" width="48" height="48"
                                src="https://randomuser.me/api/portraits/women/43.jpg" alt="Uploader">
                            <div class="uk-margin-right">
                                <div class="uk-text-meta">آپلود توسط</div>
                                <div class="uk-text-bold">سارا محمدی</div>
                                <div class="uk-text-small uk-text-muted">عکاس حرفه‌ای طبیعت</div>
                            </div>
                        </div>
                    </div>

                    <!-- CTA -->
                    <button
                        class="uk-button uk-button-primary uk-button-large uk-width-1-1 uk-margin-bottom uk-border-pill">
                        <span uk-icon="comment"></span> دریافت متن الهام‌بخش
                    </button>

                    <!-- Image Info (Grid View) -->
                    <div class="uk-card uk-card-default uk-card-body uk-card-small uk-border-rounded uk-margin-bottom">
                        <h5 class="uk-heading-bullet uk-margin-small-bottom">اطلاعات تصویر</h5>
                        <ul class="uk-list uk-list-divider uk-text-small uk-margin-remove">
                            <li><strong>ابعاد:</strong> 1200 × 800 پیکسل</li>
                            <li><strong>حجم:</strong> 450 کیلوبایت</li>
                            <li><strong>فرمت:</strong> JPEG</li>
                            <li><strong>مجوز:</strong> استفاده آزاد</li>
                        </ul>
                    </div>

                    <!-- Tags -->
                    <div class="uk-margin-bottom">
                        <h5 class="uk-heading-line"><span>تگ‌ها</span></h5>
                        <div class="uk-flex uk-flex-wrap">
                            <span class="uk-label uk-margin-small-bottom uk-margin-small-left">طبیعت</span>
                            <span class="uk-label uk-margin-small-bottom uk-margin-small-left">جنگل</span>
                            <span class="uk-label uk-margin-small-bottom uk-margin-small-left">سبز</span>
                            <span class="uk-label uk-margin-small-bottom uk-margin-small-left">درخت</span>
                            <span class="uk-label uk-margin-small-bottom uk-margin-small-left">منظره</span>
                            <span class="uk-label uk-margin-small-bottom uk-margin-small-left">طبیعت‌گردی</span>
                        </div>
                    </div>

                    <!-- Social -->
                    <div class="uk-margin-top">
                        <h5 class="uk-heading-line"><span>اشتراک‌گذاری</span></h5>
                        <div class="uk-grid-small uk-child-width-auto" uk-grid>
                            <div><a class="uk-icon-button" uk-icon="icon: twitter"></a></div>
                            <div><a class="uk-icon-button" uk-icon="icon: facebook"></a></div>
                            <div><a class="uk-icon-button" uk-icon="icon: linkedin"></a></div>
                            <div><a class="uk-icon-button" uk-icon="icon: whatsapp"></a></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


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

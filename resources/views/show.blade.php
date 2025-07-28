@extends('layouts.app')
@section('title', 'گالری تصاویر الهام‌بخش')

@section('content')
    <!-- Gallery Page -->
    <div class="uk-section uk-section-default uk-padding-remove-top">
        <!-- Hero Section -->
        <div class="uk-background-cover uk-background-fixed uk-light"
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
        </div>

        <!-- Main Content -->
        <div class="uk-container uk-margin-large-top" id="gallery-content">
            <!-- Search and Filter Bar -->
            <div class="uk-card uk-card-default uk-card-body uk-box-shadow-medium uk-margin-bottom"
                uk-sticky="offset: 80; media: @m; bottom: #gallery-grid">
                <div class="uk-grid-medium" uk-grid>
                    <div class="uk-width-1-1 uk-width-expand@m">
                        <div class="uk-inline uk-width-1-1">
                            <span class="uk-form-icon" uk-icon="icon: search"></span>
                            <input class="uk-input uk-form-large" type="text" placeholder="جستجو در تصاویر..."
                                id="search-input" aria-label="جستجو">
                        </div>
                    </div>
                    <div class="uk-width-1-2 uk-width-auto@m">
                        <div uk-form-custom="target: > * > span:first-child" class="uk-width-1-1">
                            <select class="uk-select uk-form-large" id="category-filter" aria-label="فیلتر دسته‌بندی">
                                <option value="">همه دسته‌بندی‌ها</option>
                                <option value="nature">طبیعت</option>
                                <option value="fantasy">فانتزی</option>
                                <option value="scifi">علمی-تخیلی</option>
                                <option value="urban">شهری</option>
                                <option value="historical">تاریخی</option>
                            </select>
                            <button class="uk-button uk-button-default uk-form-large uk-width-1-1" type="button"
                                tabindex="-1">
                                <span></span>
                                <span uk-icon="icon: chevron-down"></span>
                            </button>
                        </div>
                    </div>
                    <div class="uk-width-1-2 uk-width-auto@m">
                        <div uk-form-custom="target: > * > span:first-child" class="uk-width-1-1">
                            <select class="uk-select uk-form-large" id="sort-by" aria-label="مرتب‌سازی">
                                <option value="newest">جدیدترین</option>
                                <option value="popular">محبوب‌ترین</option>
                                <option value="random">تصادفی</option>
                            </select>
                            <button class="uk-button uk-button-default uk-form-large uk-width-1-1" type="button"
                                tabindex="-1">
                                <span></span>
                                <span uk-icon="icon: chevron-down"></span>
                            </button>
                        </div>
                    </div>
                    <div class="uk-width-1-1 uk-width-auto@m">
                        <button class="uk-button uk-button-primary uk-button-large uk-width-1-1"
                            uk-toggle="target: #advanced-filters">
                            <span uk-icon="icon: settings"></span>
                            <span class="uk-visible@m">فیلترهای پیشرفته</span>
                        </button>
                    </div>
                </div>

                <!-- Advanced Filters (Collapsible) -->
                <div id="advanced-filters" class="uk-margin-top" hidden>
                    <div class="uk-grid-small" uk-grid>
                        <div class="uk-width-1-1 uk-width-1-3@m">
                            <label class="uk-form-label">رنگ غالب</label>
                            <div class="uk-grid-small uk-child-width-1-6" uk-grid>
                                <div><button class="uk-button uk-button-default uk-button-small uk-width-1-1"
                                        style="background: #f00;"></button></div>
                                <div><button class="uk-button uk-button-default uk-button-small uk-width-1-1"
                                        style="background: #0f0;"></button></div>
                                <div><button class="uk-button uk-button-default uk-button-small uk-width-1-1"
                                        style="background: #00f;"></button></div>
                                <div><button class="uk-button uk-button-default uk-button-small uk-width-1-1"
                                        style="background: #ff0;"></button></div>
                                <div><button class="uk-button uk-button-default uk-button-small uk-width-1-1"
                                        style="background: #f0f;"></button></div>
                                <div><button class="uk-button uk-button-default uk-button-small uk-width-1-1"
                                        style="background: #0ff;"></button></div>
                            </div>
                        </div>
                        <div class="uk-width-1-1 uk-width-1-3@m">
                            <label class="uk-form-label">جهت تصویر</label>
                            <div class="uk-button-group uk-width-1-1">
                                <button class="uk-button uk-button-default uk-button-small">همه</button>
                                <button class="uk-button uk-button-default uk-button-small" uk-tooltip="عمودی"><span
                                        uk-icon="icon: image"></span></button>
                                <button class="uk-button uk-button-default uk-button-small" uk-tooltip="افقی"><span
                                        uk-icon="icon: image"></span></button>
                            </div>
                        </div>
                        <div class="uk-width-1-1 uk-width-1-3@m">
                            <label class="uk-form-label">کیفیت</label>
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
                    </div>
                </div>
            </div>

            <!-- Gallery Grid -->
            <div id="gallery-grid"
                class="uk-grid-small uk-child-width-1-2@s
uk-child-width-1-3@m uk-child-width-1-4@l uk-child-width-1-5@xl"
                uk-grid="masonry: true" uk-lightbox="animation: slide">
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

                <!-- Actual Image Items (would be dynamically generated in a real app) -->
                <div data-category="nature" data-tags="جنگل درخت سبز">
                    <div class="uk-card uk-card-default uk-card-hover uk-card-small uk-transition-toggle">
                        <div class="uk-card-media-top uk-position-relative">
                            <img src="https://picsum.photos/id/1018/600/400" alt="جنگل سرسبز" loading="lazy"
                                width="600" height="400">

                            <!-- Hover Overlay -->
                            <!-- In each gallery item, update the click handler -->
                            <div class="uk-position-cover uk-overlay uk-overlay-primary uk-flex uk-flex-center uk-flex-middle uk-light uk-transition-fade"
                                onclick="updateModalDetails(
         'جنگل سرسبز', 
         'طبیعت', 
         '۲ روز پیش', 
         'https://picsum.photos/id/1018/1200/800',
         'تصویری از یک جنگل سرسبز با درختان بلند و نور خورشید که از میان برگ‌ها می‌تابد.'
     )">
                            </div>

                            <!-- Image Action Buttons -->
                            <div class="uk-position-top-right uk-padding-small uk-visible-toggle">
                                <button class="uk-button uk-button-text uk-button-small uk-text-emphasis"
                                    uk-icon="icon: heart; ratio: 0.8" uk-tooltip="افزودن به علاقه‌مندی‌ها"></button>
                            </div>
                            <div class="uk-position-top-left uk-padding-small uk-visible-toggle">
                                <a href="https://picsum.photos/id/1018/1200/800"
                                    class="uk-button uk-button-text uk-button-small uk-text-emphasis"
                                    uk-icon="icon: expand; ratio: 0.8" uk-tooltip="نمایش تمام صفحه"
                                    data-caption="جنگل سرسبز - طبیعت"></a>
                            </div>
                        </div>
                        <div class="uk-card-body uk-padding-small">
                            <h3 class="uk-card-title uk-margin-remove uk-text-truncate">جنگل سرسبز</h3>
                            <div class="uk-flex uk-flex-middle">
                                <span class="uk-badge uk-margin-small-right">طبیعت</span>
                                <span class="uk-text-small uk-text-muted">۲ روز پیش</span>
                                <div class="uk-margin-left-auto">
                                    <span uk-icon="icon: happy; ratio: 0.8"></span>
                                    <span class="uk-text-small">۱۲۴</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div data-category="fantasy" data-tags="قصر افسانه‌ای">
                    <div class="uk-card uk-card-default uk-card-hover uk-card-small uk-transition-toggle">
                        <div class="uk-card-media-top uk-position-relative">
                            <img src="https://picsum.photos/id/1019/600/400" alt="قصر افسانه‌ای" loading="lazy"
                                width="600" height="400">

                            <!-- Hover Overlay -->
                            <div
                                class="uk-position-cover uk-overlay uk-overlay-primary uk-flex uk-flex-center uk-flex-middle uk-light uk-transition-fade">
                                <div class="uk-text-center">
                                    <span uk-icon="icon: search; ratio: 1.5"></span>
                                    <p class="uk-margin-small-top">برای جزئیات بیشتر کلیک کنید</p>
                                </div>
                            </div>

                            <!-- Image Action Buttons -->
                            <div class="uk-position-top-right uk-padding-small uk-visible-toggle">
                                <button class="uk-button uk-button-text uk-button-small uk-text-emphasis"
                                    uk-icon="icon: heart; ratio: 0.8" uk-tooltip="افزودن به علاقه‌مندی‌ها"></button>
                            </div>
                            <div class="uk-position-top-left uk-padding-small uk-visible-toggle">
                                <a href="https://picsum.photos/id/1019/1200/800"
                                    class="uk-button uk-button-text uk-button-small uk-text-emphasis"
                                    uk-icon="icon: expand; ratio: 0.8" uk-tooltip="نمایش تمام صفحه"
                                    data-caption="قصر افسانه‌ای - فانتزی"></a>
                            </div>
                        </div>
                        <div class="uk-card-body uk-padding-small">
                            <h3 class="uk-card-title uk-margin-remove uk-text-truncate">قصر افسانه‌ای</h3>
                            <div class="uk-flex uk-flex-middle">
                                <span class="uk-badge uk-margin-small-right">فانتزی</span>
                                <span class="uk-text-small uk-text-muted">۱ هفته پیش</span>
                                <div class="uk-margin-left-auto">
                                    <span uk-icon="icon: happy; ratio: 0.8"></span>
                                    <span class="uk-text-small">۸۷</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- More image items would go here... -->
                <div data-category="urban" data-tags="شهر مدرن">
                    <div class="uk-card uk-card-default uk-card-hover uk-card-small uk-transition-toggle">
                        <div class="uk-card-media-top uk-position-relative">
                            <img src="https://picsum.photos/id/1020/600/400" alt="شهر مدرن" loading="lazy"
                                width="600" height="400">

                            <!-- Hover Overlay -->
                            <div
                                class="uk-position-cover uk-overlay uk-overlay-primary uk-flex uk-flex-center uk-flex-middle uk-light uk-transition-fade">
                                <div class="uk-text-center">
                                    <span uk-icon="icon: search; ratio: 1.5"></span>
                                    <p class="uk-margin-small-top">برای جزئیات بیشتر کلیک کنید</p>
                                </div>
                            </div>

                            <!-- Image Action Buttons -->
                            <div class="uk-position-top-right uk-padding-small uk-visible-toggle">
                                <button class="uk-button uk-button-text uk-button-small uk-text-emphasis"
                                    uk-icon="icon: heart; ratio: 0.8" uk-tooltip="افزودن به علاقه‌مندی‌ها"></button>
                            </div>
                            <div class="uk-position-top-left uk-padding-small uk-visible-toggle">
                                <a href="https://picsum.photos/id/1020/1200/800"
                                    class="uk-button uk-button-text uk-button-small uk-text-emphasis"
                                    uk-icon="icon: expand; ratio: 0.8" uk-tooltip="نمایش تمام صفحه"
                                    data-caption="شهر مدرن - شهری"></a>
                            </div>
                        </div>
                        <div class="uk-card-body uk-padding-small">
                            <h3 class="uk-card-title uk-margin-remove uk-text-truncate">شهر مدرن</h3>
                            <div class="uk-flex uk-flex-middle">
                                <span class="uk-badge uk-margin-small-right">شهری</span>
                                <span class="uk-text-small uk-text-muted">۳ روز پیش</span>
                                <div class="uk-margin-left-auto">
                                    <span uk-icon="icon: happy; ratio: 0.8"></span>
                                    <span class="uk-text-small">۹۲</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination with Load More -->
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
                        <button class="uk-button uk-button-default uk-width-1-1">
                            <span uk-icon="icon: plus"></span> نمایش بیشتر
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Image Detail Modal -->
    <div id="image-modal" uk-modal="bg-close: false">
        <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical uk-width-1-1 uk-width-3-4@m"
            style="max-width: 1200px;">
            <button class="uk-modal-close-outside" type="button" uk-close
                style="color: #fff; background: rgba(0,0,0,0.5); border-radius: 50%; padding: 10px;"></button>

            <div class="uk-grid-collapse" uk-grid>
                <!-- Image Column -->
                <div class="uk-width-1-1 uk-width-2-3@m">
                    <div class="uk-position-relative" style="min-height: 70vh;">
                        <!-- Loading Indicator -->
                        <div id="modal-loading" class="uk-position-center" uk-spinner="ratio: 2"></div>
                        <!-- Image Actions -->
                        <div class="uk-position-top-right uk-padding" style="z-index: 1;">
                            <div class="uk-button-group ">
                                <button class="uk-button uk-button-default uk-button-small" uk-tooltip="دانلود">
                                    <span uk-icon="icon: download"></span>
                                    <span class="uk-visible@m">دانلود</span>
                                </button>
                                <button class="uk-button uk-button-default uk-button-small" uk-tooltip="اشتراک‌گذاری">
                                    <span uk-icon="icon: social"></span>
                                    <span class="uk-visible@m">اشتراک</span>
                                </button>
                                <button class="uk-button uk-button-default uk-button-small" uk-tooltip="ذخیره">
                                    <span uk-icon="icon: bookmark"></span>
                                    <span class="uk-visible@m">ذخیره</span>
                                </button>
                            </div>
                            <img id="modal-image" src="" alt="" class="uk-width-1-1 uk-height-max-large"
                                style="object-fit: contain; display: none;"
                                onload="document.getElementById('modal-loading').style.display = 'none'; this.style.display = '';">
                        </div>
                    </div>
                </div>

                <!-- Info Column -->
                <div class="uk-width-1-1 uk-width-1-3@m uk-padding">
                    <!-- Header -->
                    <div class="uk-flex uk-flex-between uk-flex-middle uk-margin-bottom">
                        <h2 id="modal-title" class="uk-modal-title uk-margin-remove" style="font-size: 1.5rem;"></h2>
                        <button class="uk-button uk-button-text" uk-icon="icon: heart"
                            uk-tooltip="افزودن به علاقه‌مندی‌ها"></button>
                    </div>

                    <!-- Meta Info -->
                    <div class="uk-margin-bottom">
                        <span id="modal-category" class="uk-badge uk-background-primary"></span>
                        <span id="modal-date" class="uk-text-small uk-text-muted uk-margin-small-right"></span>
                    </div>

                    <!-- Author Info -->
                    <div class="uk-card uk-card-default uk-card-small uk-card-body uk-margin-bottom">
                        <div class="uk-grid-small uk-flex-middle" uk-grid>
                            <div class="uk-width-auto">
                                <img class="uk-border-circle" width="50" height="50"
                                    src="https://randomuser.me/api/portraits/women/43.jpg" alt="عکاس">
                            </div>
                            <div class="uk-width-expand">
                                <div class="uk-text-small uk-text-muted">آپلود شده توسط</div>
                                <div class="uk-text-bold">سارا محمدی</div>
                                <div class="uk-text-small uk-text-muted">عکاس حرفه‌ای طبیعت</div>
                            </div>
                        </div>
                    </div>

                    <!-- CTA Button -->
                    <div class="uk-margin-bottom">
                        <button class="uk-button uk-button-primary uk-width-1-1 uk-button-large">
                            <span uk-icon="icon: comment"></span> دریافت متن الهام‌بخش
                        </button>
                    </div>

                    <!-- Image Details -->
                    <div class="uk-card uk-card-default uk-card-small uk-card-body uk-margin-bottom">
                        <h4 class="uk-card-title uk-text-bold" style="font-size: 1.1rem;">اطلاعات تصویر</h4>
                        <dl class="uk-description-list uk-description-list-divider">
                            <dt>ابعاد</dt>
                            <dd>1200 × 800 پیکسل</dd>
                            <dt>حجم</dt>
                            <dd>450 کیلوبایت</dd>
                            <dt>فرمت</dt>
                            <dd>JPEG</dd>
                            <dt>مجوز</dt>
                            <dd>استفاده آزاد</dd>
                        </dl>
                    </div>

                    <!-- Tags -->
                    <div class="uk-margin-bottom">
                        <h4 class="uk-heading-line uk-text-bold" style="font-size: 1.1rem;"><span>تگ‌ها</span></h4>
                        <div class="uk-flex uk-flex-wrap">
                            <span class="uk-label uk-margin-small-right uk-margin-small-bottom">طبیعت</span>
                            <span class="uk-label uk-margin-small-right uk-margin-small-bottom">جنگل</span>
                            <span class="uk-label uk-margin-small-right uk-margin-small-bottom">سبز</span>
                            <span class="uk-label uk-margin-small-right uk-margin-small-bottom">درخت</span>
                            <span class="uk-label uk-margin-small-right uk-margin-small-bottom">منظره</span>
                            <span class="uk-label uk-margin-small-right uk-margin-small-bottom">طبیعت‌گردی</span>
                        </div>
                    </div>

                    <!-- Social Sharing -->
                    <div class="uk-margin-top">
                        <h4 class="uk-text-bold" style="font-size: 1.1rem;">اشتراک‌گذاری</h4>
                        <div class="uk-grid-small uk-child-width-auto" uk-grid>
                            <div><a href="#" class="uk-icon-button" uk-icon="twitter"></a></div>
                            <div><a href="#" class="uk-icon-button" uk-icon="facebook"></a></div>
                            <div><a href="#" class="uk-icon-button" uk-icon="linkedin"></a></div>
                            <div><a href="#" class="uk-icon-button" uk-icon="whatsapp"></a></div>
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

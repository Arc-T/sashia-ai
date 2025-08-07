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
                            <div class="uk-flex uk-text-meta uk-margin-small-top">
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
                    <div class="uk-grid-small uk-child-width-expand@s uk-margin-top" uk-grid>
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

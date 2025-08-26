<div id="prompt-modal" uk-modal>
    <div class="uk-modal-dialog uk-border-rounded uk-box-shadow-xlarge uk-width-1-1 uk-width-2xlarge@m"
        style="max-height: 90vh; display: flex; flex-direction: column; overflow: hidden;">

        <!-- Close -->
        <button class="uk-modal-close-default" type="button" uk-close></button>

        <!-- Header -->
        <div class="uk-padding-small uk-light" style="background: linear-gradient(135deg, #6a11cb, #2575fc);">
            <h3 class="uk-modal-title uk-text-bold uk-flex uk-flex-middle uk-margin-remove">
                <span uk-icon="icon: plus-circle; ratio: 1.5" class="uk-margin-small-left"></span>
                ایجاد پرامپت جدید
            </h3>
        </div>

        <!-- Body -->
        <div class="uk-padding uk-overflow-auto" style="flex: 1; min-height: 0;">
            <form class="uk-form-stacked uk-form-custom-style">
                <div class="uk-grid-small" uk-grid>

                    <div class="uk-width-1-2@s">
                        <label class="uk-form-label uk-text-bold">
                            <span uk-icon="icon: pencil"></span> عنوان
                        </label>
                        <input name="title" class="uk-input custom-input" type="text"
                            placeholder="مثال: تصویر طبیعت" />
                    </div>
                    <div class="uk-width-1-2@s">
                        <label class="uk-form-label uk-text-bold">
                            <span uk-icon="icon: bolt"></span>دسته بندی
                        </label>
                        <select class="uk-select custom-input" name="category">
                            <option value="">انتخاب کنید</option>
                            <option value="easy">آسان</option>
                            <option value="medium">متوسط</option>
                            <option value="hard">دشوار</option>
                        </select>
                    </div>
                    <!-- Content -->
                    <div class="uk-width-1-1">
                        <label class="uk-form-label uk-text-bold" for="prompt-content">
                            <span uk-icon="icon: commenting"></span> محتوا
                        </label>
                        <textarea name="content" class="uk-textarea custom-input uk-resize-vertical" id="prompt-content" rows="4"
                            placeholder="متن پرامپت را وارد کنید..." required></textarea>
                    </div>

                    <!-- Description -->
                    <div class="uk-width-1-1">
                        <label class="uk-form-label uk-text-bold" for="prompt-description">
                            <span uk-icon="icon: file-text"></span> توضیحات
                        </label>
                        <textarea name="description" class="uk-textarea custom-input" id="prompt-description" rows="1"
                            placeholder="توضیح مختصر..."></textarea>
                    </div>

                    <!-- AI Models Multi-Select -->
                    <div class="uk-width-1-2@s">
                        <label class="uk-form-label uk-text-bold uk-flex uk-flex-middle">
                            <span uk-icon="icon: settings; ratio: 1.2" class="uk-margin-small-left"></span>
                            مدل‌های هوش مصنوعی
                        </label>
                        <select name="ai_models" id="ai-models" multiple placeholder="انتخاب کنید ...">
                            <option value="gpt-4" data-icon="bolt" data-color="#1e87f0">GPT-4</option>
                            <option value="gpt-3.5" data-icon="code" data-color="#6a11cb">GPT-3.5 Turbo
                            </option>
                            <option value="claude-2" data-icon="comment" data-color="#faa05a">Claude 2
                            </option>
                            <option value="llama-2" data-icon="git-branch" data-color="#32d296">Llama 2
                            </option>
                            <option value="palm-2" data-icon="server" data-color="#f0506e">PaLM 2</option>
                        </select>
                        <div class="uk-text-meta uk-margin-small-top">
                            می‌توانید چند مدل را انتخاب کنید
                        </div>
                    </div>

                    <!-- Tags -->
                    <div class="uk-width-1-2@s">
                        <label class="uk-form-label uk-text-bold">
                            <span uk-icon="icon: tag"></span> برچسب‌ها
                        </label>
                        <input name="tags" class="uk-input custom-input" type="text"
                            placeholder="مثال: مقاله, آموزشی" />
                    </div>

                </div>
            </form>
        </div>

        <!-- Footer -->
        <div class="uk-background-muted uk-padding-small">
            <div class="uk-flex uk-flex-between uk-flex-middle" uk-grid>
                <div>
                    <button class="uk-button uk-button-danger uk-border-pill uk-modal-close" type="button">
                        <span uk-icon="icon: close"></span> لغو
                    </button>
                </div>
                <div>
                    <button type="submit" class="uk-button uk-button-primary uk-border-pill" type="submit">
                        <span uk-icon="icon: check"></span> ذخیره پرامپت
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Custom styles -->
<style>
    .custom-input {
        background: #fff !important;
        border: 1px solid #ddd !important;
        color: #333 !important;
    }

    .custom-input:focus {
        border-color: #6a11cb !important;
        box-shadow: 0 0 4px rgba(106, 17, 203, 0.3);
    }

    /* Dropdown scroll & max-height */
    .tom-select-dropdown {
        max-height: 250px;
        overflow-y: auto;
    }
</style>

<!-- Choices.js -->
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet" />
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            new TomSelect("#ai-models", {
                plugins: ["remove_button"],
                persist: false,
                create: false,
                dropdownClass: "uk-card uk-card-default uk-box-shadow-small uk-border-rounded", // UIkit dropdown style
                optionClass: "uk-padding-small uk-flex uk-flex-middle", // UIkit padding + flex
                render: {
                    option: function(data, escape) {
                        return `
                                <div class="uk-flex uk-flex-middle" style="gap:6px; cursor: pointer;"
                                    onmouseover="this.style.background='#f5f5f5';"
                                    onmouseout="this.style.background='#fff';">
                                    <span uk-icon="icon: ${data.icon || 'tag'}" style="color:${data.color}"></span>
                                    <span>${escape(data.text)}</span>
                                </div>
                                    `;
                    },
                    item: function(data, escape) {
                        return `
                <div class="uk-border-pill uk-padding-xsmall uk-flex uk-flex-middle" 
                     style="background:${data.color};color:#fff;gap:6px;">
                    <span uk-icon="icon: ${data.icon || 'tag'}"></span>
                    ${escape(data.text)}
                </div>
                `;
                    }
                },
            });
        });
    </script>
@endpush

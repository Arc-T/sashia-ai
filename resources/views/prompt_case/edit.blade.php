<form method="POST" action="{{ route('prompt-case.store') }}">
    @csrf
    <div class="uk-form-stacked uk-form-custom-style">
        <div class="uk-grid-small" uk-grid>

            <div class="uk-width-1-2@s">
                <label class="uk-form-label uk-text-bold">
                    <span uk-icon="icon: pencil"></span> عنوان
                </label>
                <input name="title" class="uk-input custom-input" type="text" value="{{ $userPromptInfo->title }}"
                    placeholder="مثال: تصویر طبیعت" />
            </div>
            <div class="uk-width-1-2@s">
                <label class="uk-form-label uk-text-bold">
                    <span uk-icon="icon: bolt"></span>دسته بندی
                </label>
                <select class="tom-select" name="category_id" id="category-select">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if ($userPromptInfo->category_id == $category->id) selected @endif>
                            {{ $category->slug }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Content -->
            <div class="uk-width-1-1">
                <label class="uk-form-label uk-text-bold" for="prompt-content">
                    <span uk-icon="icon: commenting"></span> محتوا
                </label>
                <textarea name="content" class="uk-textarea custom-input uk-resize-vertical" id="prompt-content" rows="4"
                    placeholder="متن پرامپت را وارد کنید..." required>{{ $userPromptInfo->content }}</textarea>
            </div>

            <!-- Description -->
            <div class="uk-width-1-1">
                <label class="uk-form-label uk-text-bold" for="prompt-description">
                    <span uk-icon="icon: file-text"></span> توضیحات
                </label>
                <textarea name="description" class="uk-textarea custom-input" id="prompt-description" rows="1"
                    placeholder="توضیح مختصر...">{{ $userPromptInfo->description }}</textarea>
            </div>

            <!-- AI Models Multi-Select -->
            <div class="uk-width-1-2@s">
                <label class="uk-form-label uk-text-bold uk-flex uk-flex-middle">
                    <span uk-icon="icon: settings; ratio: 1.2" class="uk-margin-small-left"></span>
                    مدل‌های هوش مصنوعی
                </label>
                <select class="tom-select" name="ai_models[]" id="ai-models" multiple placeholder="انتخاب کنید ...">
                    @php
                        $userPromptInfo->ai_model_ids = explode(',', $userPromptInfo->ai_model_ids);
                    @endphp
                    @foreach ($ai_models as $ai_model)
                        <option value="{{ $ai_model->id }}" @if (in_array($ai_model->id, $userPromptInfo->ai_model_ids)) selected @endif>
                            {{ $ai_model->name }}
                        </option>
                    @endforeach
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
                <select class="tom-select" name="tags[]" id="tag_id" multiple placeholder="انتخاب کنید ...">
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}" @if ($userPromptInfo->tags->contains('id', $tag->id)) selected @endif>
                            {{ $tag->name }}
                        </option>
                    @endforeach
                </select>
            </div>

        </div>
    </div>

    <div class="uk-flex uk-flex-left">
        <button class="uk-button uk-button-secondary uk-border-pill" type="submit">
            <span uk-icon="icon: check"></span> ذخیره تغییرات
        </button>
    </div>
</form>

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet" />
    <style>
        .tom-select-dropdown {
            max-height: 250px;
            overflow-y: auto;
            border-radius: 8px;
            border: 1px solid #ddd;
        }

        .tom-select-dropdown .ts-dropdown-content>div:hover {
            background: #f5f5f5;
        }

        /* Responsive */
        @media (max-width: 640px) {
            .uk-grid-small>div {
                width: 100% !important;
            }
        }
    </style>
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const config = {
                plugins: ["remove_button"],
                persist: false,
                create: false,
                dropdownClass: "uk-card uk-card-default uk-box-shadow-small uk-border-rounded",
                optionClass: "uk-padding-small uk-flex uk-flex-middle",
                render: {
                    option: function(data, escape) {
                        return `
                    <div class="uk-flex uk-flex-middle" style="gap:6px; cursor: pointer;">
                        <span uk-icon="icon: ${data.icon || 'tag'}" style="color:${data.color || '#6a11cb'}"></span>
                        <span>${escape(data.text)}</span>
                    </div>`;
                    },
                    item: function(data, escape) {
                        return `
                    <div class="uk-border-pill uk-padding-xsmall uk-flex uk-flex-middle"
                        style="background:${data.color || '#6a11cb'};color:#fff;gap:6px;">
                        <span uk-icon="icon: ${data.icon || 'tag'}"></span>${escape(data.text)}
                    </div>`;
                    }
                }
            };
            document.querySelectorAll(".tom-select").forEach(el => {
                const tom = new TomSelect(el, config);
                // If some options are marked selected in Blade, force TomSelect to pick them up
                const selectedValues = Array.from(el.querySelectorAll("option:checked")).map(o => o.value);
                if (selectedValues.length) {
                    tom.setValue(selectedValues);
                }
            });
        });
    </script>
@endpush

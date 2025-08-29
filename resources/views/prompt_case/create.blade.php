<form method="POST" action="{{ route('prompt-case.store') }}">
    @csrf
    <div class="uk-form-stacked uk-form-custom-style">
        <div class="uk-grid-small" uk-grid>

            <!-- Title -->
            <div class="uk-width-1-2@s">
                <label class="uk-form-label uk-text-bold">
                    <span uk-icon="icon: pencil"></span> عنوان
                </label>
                <input name="title" class="uk-input custom-input" type="text" placeholder="مثال: تصویر طبیعت"
                    required />
            </div>

            <!-- Category -->
            <div class="uk-width-1-2@s">
                <label class="uk-form-label uk-text-bold">
                    <span uk-icon="icon: bolt"></span> دسته بندی
                </label>
                <select class="tom-select" name="category_id" placeholder="انتخاب کنید ...">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->slug }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Content -->
            <div class="uk-width-1-1">
                <label class="uk-form-label uk-text-bold" for="prompt-content">
                    <span uk-icon="icon: commenting"></span> محتوا
                </label>
                <textarea name="content" class="uk-textarea custom-input uk-resize-vertical" id="prompt-content" rows="5"
                    placeholder="متن پرامپت را وارد کنید..." required></textarea>
            </div>

            <!-- Description -->
            <div class="uk-width-1-1">
                <label class="uk-form-label uk-text-bold" for="prompt-description">
                    <span uk-icon="icon: file-text"></span> توضیحات
                </label>
                <textarea name="description" class="uk-textarea custom-input" id="prompt-description" rows="2"
                    placeholder="توضیح مختصر..."></textarea>
            </div>

            <!-- AI Models -->
            <div class="uk-width-1-2@s">
                <label class="uk-form-label uk-text-bold uk-flex uk-flex-middle">
                    <span uk-icon="icon: settings; ratio: 1.2" class="uk-margin-small-left"></span>
                    مدل‌های هوش مصنوعی
                </label>
                <select class="tom-select" name="ai_models[]" id="ai-models" multiple placeholder="انتخاب کنید ...">
                    @foreach ($ai_models as $ai_model)
                        <option value="{{ $ai_model->id }}" data-icon="server" data-color="#f0506e">
                            {{ $ai_model->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Tags -->
            <div class="uk-width-1-2@s">
                <label class="uk-form-label uk-text-bold">
                    <span uk-icon="icon: tag"></span> برچسب‌ها
                </label>
                <select class="tom-select" name="tags[]" id="tag_id" multiple placeholder="انتخاب کنید ...">
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}" data-icon="tag" data-color="#6a11cb">
                            {{ $tag->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="uk-flex uk-flex-left">
        <button class="uk-button uk-button-primary uk-border-pill uk-margin-medium-top" type="submit">
            <span uk-icon="icon: check"></span> ذخیره پرامپت
        </button>
    </div>
</form>

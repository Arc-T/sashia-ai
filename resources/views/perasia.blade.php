@extends('layouts.app') {{-- Assuming you have a base layout --}}

@section('content')
    <div class="uk-container">
        {{-- Hero Search Section --}}
        <section class="uk-section uk-section-small uk-background-primary uk-light">
            <div class="uk-container uk-text-center">
                <h1 class="uk-heading-medium uk-margin-remove-bottom">پرومپت‌های حرفه‌ای هوش مصنوعی</h1>
                <p class="uk-text-lead uk-margin-remove-top">کشف، اشتراک‌گذاری و بهینه‌سازی پرومپت‌ها برای ابزارهای هوش
                    مصنوعی</p>

                <div class="uk-margin-medium-top uk-width-2-3@m uk-margin-auto">
                    <form class="uk-search uk-search-large">
                        <button class="uk-search-icon-flip" uk-search-icon></button>
                        <input class="uk-search-input" type="search" placeholder="جستجو در پرومپت‌ها...">
                    </form>
                    <div class="uk-flex uk-flex-center uk-margin-small-top">
                        <div uk-form-custom="target: > * > span:first-child" class="uk-margin-right">
                            <select>
                                <option value="">همه دسته‌بندی‌ها</option>
                                <option value="chatgpt">چت‌جی‌پی‌تی</option>
                                <option value="midjourney">میجورنی</option>
                                <option value="dalle">دال-ای</option>
                            </select>
                            <button class="uk-button uk-button-default" type="button">
                                <span></span>
                                <span uk-icon="icon: chevron-down"></span>
                            </button>
                        </div>
                        <div uk-form-custom="target: > * > span:first-child">
                            <select>
                                <option value="">همه سطوح</option>
                                <option value="beginner">مبتدی</option>
                                <option value="intermediate">متوسط</option>
                                <option value="advanced">پیشرفته</option>
                            </select>
                            <button class="uk-button uk-button-default" type="button">
                                <span></span>
                                <span uk-icon="icon: chevron-down"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Trending Prompts --}}
        <section class="uk-section uk-section-small">
            <div class="uk-container">
                <div class="uk-flex uk-flex-between uk-flex-middle">
                    <h2 class="uk-heading-small">پرومپت‌های پرطرفدار</h2>
                    <a href="#" class="uk-button uk-button-text">مشاهده همه</a>
                </div>

                <div class="uk-position-relative uk-visible-toggle" tabindex="-1" uk-slider>
                    <ul class="uk-slider-items uk-child-width-1-2@s uk-child-width-1-3@m uk-child-width-1-4@l uk-grid">
                        @foreach ($trendingPrompts as $prompt)
                            <li>
                                <div
                                    class="uk-card uk-card-default uk-card-hover uk-card-small uk-border-rounded uk-overflow-hidden uk-transition-toggle">
                                    <div class="uk-card-media-top">
                                        <div class="uk-background-cover uk-height-small"
                                            style="background-image: url('{{ $prompt['image'] }}');"></div>
                                    </div>
                                    <div class="uk-card-body">
                                        <div class="uk-badge uk-margin-small-bottom">{{ $prompt['model'] }}</div>
                                        <h3 class="uk-card-title uk-margin-remove-top">{{ $prompt['title'] }}</h3>
                                        <p class="uk-text-meta uk-margin-remove-top">{{ $prompt['author'] }}</p>
                                        <p class="uk-text-small">{{ Str::limit($prompt['description'], 80) }}</p>
                                    </div>
                                    <div class="uk-card-footer uk-flex uk-flex-between uk-flex-middle">
                                        <div>
                                            <span uk-icon="icon: heart; ratio: 0.8"></span> {{ $prompt['likes'] }}
                                            <span class="uk-margin-small-right" uk-icon="icon: download; ratio: 0.8"></span>
                                            {{ $prompt['downloads'] }}
                                        </div>
                                        <button class="uk-button uk-button-text uk-text-primary"
                                            uk-toggle="target: #prompt-modal-{{ $loop->index }}">مشاهده</button>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous
                        uk-slider-item="previous"></a>
                    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next
                        uk-slider-item="next"></a>
                </div>
            </div>
        </section>

        {{-- Categories Section --}}
        <section class="uk-section uk-section-small uk-section-muted">
            <div class="uk-container">
                <h2 class="uk-heading-small uk-text-center">دسته‌بندی‌ها</h2>

                <div class="uk-child-width-1-2@s uk-child-width-1-3@m uk-text-center uk-margin-medium-top" uk-grid>
                    @foreach ($categories as $category)
                        <div>
                            <a href="#"
                                class="uk-display-block uk-padding uk-background-default uk-border-rounded uk-box-shadow-hover-small">
                                <span class="uk-margin-small-bottom uk-display-inline-block"
                                    uk-icon="icon: {{ $category['icon'] }}; ratio: 2"></span>
                                <h3 class="uk-card-title uk-margin-remove">{{ $category['name'] }}</h3>
                                <div class="uk-text-meta">{{ $category['count'] }} پرومپت</div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- Featured Prompts Grid --}}
        <section class="uk-section uk-section-small">
            <div class="uk-container">
                <div class="uk-flex uk-flex-between uk-flex-middle">
                    <h2 class="uk-heading-small">پرومپت‌های ویژه</h2>
                    <div>
                        <button class="uk-button uk-button-default uk-button-small" type="button">مرتب‌سازی <span
                                uk-icon="icon: triangle-down"></span></button>
                        <div uk-dropdown="mode: click">
                            <ul class="uk-nav uk-dropdown-nav">
                                <li class="uk-active"><a href="#">محبوب‌ترین</a></li>
                                <li><a href="#">جدیدترین</a></li>
                                <li><a href="#">بیشترین دانلود</a></li>
                                <li><a href="#">بهترین امتیاز</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="uk-margin-medium-top" uk-filter="target: .js-filter">
                    <ul class="uk-subnav uk-subnav-pill">
                        <li class="uk-active" uk-filter-control><a href="#">همه</a></li>
                        @foreach ($filterCategories as $filter)
                            <li uk-filter-control="[data-tags*='{{ $filter['slug'] }}']"><a
                                    href="#">{{ $filter['name'] }}</a></li>
                        @endforeach
                    </ul>

                    <div class="uk-grid-match uk-child-width-1-2@s
uk-child-width-1-3@m js-filter"
                        uk-grid>
                        @foreach ($featuredPrompts as $prompt)
                            <div data-tags="{{ $prompt['tags'] }}">
                                <div
                                    class="uk-card uk-card-default uk-card-hover uk-card-small uk-border-rounded uk-transition-toggle">
                                    <div class="uk-card-header">
                                        <div class="uk-grid-small uk-flex-middle" uk-grid>
                                            <div class="uk-width-auto">
                                                <img class="uk-border-circle" width="40" height="40"
                                                    src="{{ $prompt['author_avatar'] }}" alt="{{ $prompt['author'] }}">
                                            </div>
                                            <div class="uk-width-expand">
                                                <h3 class="uk-card-title uk-margin-remove-bottom">{{ $prompt['title'] }}
                                                </h3>
                                                <p class="uk-text-meta uk-margin-remove-top">{{ $prompt['author'] }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-card-body">
                                        <p>{{ Str::limit($prompt['description'], 120) }}</p>
                                        <div class="uk-margin-small-top">
                                            @foreach (explode(',', $prompt['tags']) as $tag)
                                                <span class="uk-badge uk-margin-small-right">{{ $tag }}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="uk-card-footer">
                                        <div class="uk-grid-small uk-flex-middle" uk-grid>
                                            <div class="uk-width-expand">
                                                <div class="uk-text-small">
                                                    <span uk-icon="icon: star"></span> {{ $prompt['rating'] }}
                                                    <span class="uk-margin-right" uk-icon="icon: comments"></span>
                                                    {{ $prompt['comments'] }}
                                                </div>
                                            </div>
                                            <div class="uk-width-auto">
                                                <a href="#" class="uk-button uk-button-text"
                                                    uk-toggle="target: #prompt-details-{{ $loop->index }}">جزئیات</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        {{-- Prompt Builder CTA --}}
        <section class="uk-section uk-section-small uk-section-secondary uk-light">
            <div class="uk-container">
                <div class="uk-grid-large uk-flex-middle" uk-grid>
                    <div class="uk-width-1-2@m">
                        <h2 class="uk-heading-small">پرومپت‌ساز هوشمند</h2>
                        <p class="uk-text-lead">پرومپت‌های خود را با ابزار پیشرفته ما بهینه کنید و بهترین نتایج را از هوش
                            مصنوعی بگیرید.</p>
                        <button class="uk-button uk-button-primary uk-button-large">همین حالا امتحان کنید</button>
                    </div>
                    <div class="uk-width-1-2@m">
                        <div class="uk-background-default uk-border-rounded uk-box-shadow-large uk-padding">
                            <div class="uk-grid-small" uk-grid>
                                <div class="uk-width-expand">
                                    <input class="uk-input" type="text" placeholder="موضوع پرومپت...">
                                </div>
                                <div class="uk-width-auto">
                                    <button class="uk-button uk-button-primary">تولید کن</button>
                                </div>
                            </div>
                            <div class="uk-margin-top">
                                <textarea class="uk-textarea" rows="4" placeholder="پرومپت شما اینجا ظاهر می‌شود..."></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    {{-- Modals for prompt details --}}
    @foreach ($trendingPrompts as $index => $prompt)
        <div id="prompt-modal-{{ $index }}" uk-modal>
            <div class="uk-modal-dialog uk-modal-body uk-border-rounded">
                <button class="uk-modal-close-default" type="button" uk-close></button>
                <h2 class="uk-modal-title">{{ $prompt['title'] }}</h2>
                <div class="uk-margin">
                    <div class="uk-alert-primary" uk-alert>
                        <p>برای استفاده از این پرومپت، متن زیر را در {{ $prompt['model'] }} کپی کنید:</p>
                    </div>
                    <div class="uk-background-muted uk-padding uk-border-rounded">
                        <pre><code>{{ $prompt['content'] }}</code></pre>
                        <button class="uk-button uk-button-primary uk-margin-small-top" uk-tooltip="پرومپت کپی شد!"
                            onclick="copyToClipboard('{{ $prompt['content'] }}')">کپی پرومپت</button>
                    </div>
                </div>
                <div class="uk-grid-small" uk-grid>
                    <div class="uk-width-auto">
                        <img class="uk-border-circle" width="50" height="50"
                            src="{{ $prompt['author_avatar'] }}" alt="{{ $prompt['author'] }}">
                    </div>
                    <div class="uk-width-expand">
                        <p class="uk-margin-remove-bottom">{{ $prompt['author'] }}</p>
                        <p class="uk-text-meta uk-margin-remove-top">ارسال شده در {{ $prompt['date'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <script>
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text);
        }
    </script>
@endsection

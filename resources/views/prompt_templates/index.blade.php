@extends('layouts.app')
@section('title', 'منبع پرامپت')

@section('content')
    <div class="uk-container uk-container-large" id="gallery-content">

        <!-- Filter & Controls -->
        <div class="uk-margin-medium-bottom">
            <div class="uk-flex uk-flex-between uk-flex-wrap uk-flex-middle">

                <!-- Categories -->
                <div class="uk-overflow-auto uk-margin-small-bottom">
                    <ul class="uk-tab uk-tab-pill uk-flex-nowrap"
                        uk-switcher="animation: uk-animation-slide-left-small, uk-animation-slide-right-small">
                        <li class="{{ request('category') == 'all' || !request('category') ? 'uk-active' : '' }}">
                            <a href="{{ request()->fullUrlWithQuery(['category' => 'all']) }}">همه</a>
                        </li>
                        @foreach($categories as $category)
                            <li class="{{ request('category') == strtolower($category->name) ? 'uk-active' : '' }}">
                                <a href="{{ request()->fullUrlWithQuery(['category' => strtolower($category->name)]) }}">{{ $category->slug }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Sort & View -->
                <div class="uk-flex uk-flex-middle uk-grid-small" uk-grid>

                    <!-- Time Filter -->
                    <div>
                        <button class="uk-button uk-button-default uk-button-small uk-border-pill" type="button">
                            همه زمان‌ها <span uk-icon="chevron-down"></span>
                        </button>
                        <div uk-dropdown="mode: click; pos: bottom-right">
                            <ul class="uk-nav uk-dropdown-nav">
                                <li class="uk-active"><a href="#">همه زمان‌ها</a></li>
                                <li><a href="#">۲۴ ساعت گذشته</a></li>
                                <li><a href="#">هفته گذشته</a></li>
                                <li><a href="#">ماه گذشته</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Sort Options -->
                    <div>
                        <button class="uk-button uk-button-default uk-button-small uk-border-pill" type="button">
                            پربازدیدها <span uk-icon="chevron-down"></span>
                        </button>
                        <div uk-dropdown="mode: click; pos: bottom-right">
                            <ul class="uk-nav uk-dropdown-nav">
                                <li class="uk-active"><a href="#">پربازدیدها</a></li>
                                <li><a href="#">جدیدترین</a></li>
                                <li><a href="#">پرامتیازترین</a></li>
                                <li><a href="#">محبوب‌ترین</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- View Toggle -->
                    <div class="uk-button-group">
                        <button id="grid-view-btn" class="uk-button uk-button-primary uk-button-small" data-view="grid"
                                uk-tooltip="نمایش شبکه‌ای">
                            <span uk-icon="grid"></span>
                        </button>
                        <button id="list-view-btn" class="uk-button uk-button-default uk-button-small" data-view="list"
                                uk-tooltip="نمایش لیستی">
                            <span uk-icon="list"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <hr>

        <!-- Gallery -->
        <div id="gallery-grid"
             class="uk-grid-small uk-child-width-1-2@s uk-child-width-1-3@m uk-child-width-1-4@l"
             uk-grid="masonry: true"
             data-view="grid">

            @foreach ($images as $index => $image)
                <div class="gallery-item">
                    <div class="uk-card uk-card-default uk-card-hover uk-border-rounded uk-transition-toggle">

                        <!-- Grid View -->
                        <div class="gallery-grid-view">
                            <div class="uk-card-media-top uk-position-relative uk-overflow-hidden uk-border-rounded">
                                <img src="{{ $image['path'] }}" alt="{{ $image['filename'] }}" loading="lazy"
                                     class="uk-width-1-1 uk-border-rounded uk-object-cover uk-transition-opacity"
                                     style="height:250px; background:#f8f8f8;">

                                <!-- Hover Overlay -->
                                <a class="uk-position-cover uk-transition-fade uk-flex uk-flex-center uk-flex-middle"
                                   href="#image-modal" uk-toggle
                                   onclick="updateModalDetails({{
                                   json_encode([
                                       'id' => $index,
                                       'category' => 'تصویر',
                                       'date' => \Carbon\Carbon::now()->subDays(rand(1, 30))->diffForHumans(),
                                       'imageUrl' => $image['path'],
                                       'description' => $image['prompt'] ?? 'تصویری ایجاد شده با هوش مصنوعی'
                                   ])
                               }})">
                                    <div class="uk-text-center uk-light">
                                        <span uk-icon="search" ratio="1.5"></span>
                                        <p class="uk-margin-small-top uk-text-small">جزئیات</p>
                                    </div>
                                </a>

                                <!-- Action Buttons -->
                                <div class="uk-position-top-right uk-padding-small">
                                    <button class="uk-icon-button" uk-icon="heart"
                                            uk-tooltip="افزودن به علاقه‌مندی‌ها"></button>
                                </div>
                                <div class="uk-position-top-left uk-padding-small">
                                    <a href="{{ $image['path'] }}" class="uk-icon-button" uk-icon="expand"
                                       uk-tooltip="نمایش تمام صفحه"></a>
                                </div>
                            </div>
                        </div>

                        <!-- List View -->
                        <div class="gallery-list-view uk-hidden">
                            <div class="uk-grid-small" uk-grid>
                                <div class="uk-width-1-3@s">
                                    <img src="{{ $image['path'] }}" alt="{{ $image['filename'] }}" loading="lazy"
                                         class="uk-width-1-1 uk-border-rounded uk-object-cover"
                                         style="height:150px; background:#f8f8f8;">
                                </div>
                                <div class="uk-width-2-3@s uk-flex uk-flex-column uk-flex-middle uk-text-center@s uk-text-right">
                                    <h4 class="uk-margin-small">{{ $image['filename'] }}</h4>
                                    <p class="uk-text-meta uk-margin-remove">{{ $image['prompt'] ?? 'تصویری ایجاد شده با هوش مصنوعی' }}</p>
                                    <div class="uk-flex uk-flex-middle uk-margin-small-top">
                                        <a href="#image-modal" uk-toggle
                                           class="uk-button uk-button-text uk-button-small"
                                           onclick="updateModalDetails({{
                                           json_encode([
                                               'id' => $index,
                                               'category' => 'تصویر',
                                               'date' => \Carbon\Carbon::now()->subDays(rand(1, 30))->diffForHumans(),
                                               'imageUrl' => $image['path'],
                                               'description' => $image['prompt'] ?? 'تصویری ایجاد شده با هوش مصنوعی'
                                           ])
                                       }})">جزئیات</a>
                                        <button class="uk-icon-button uk-margin-small-right" uk-icon="heart"></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="uk-margin-large-top uk-text-center">
            {{ $images->links('components.pagination') }}
        </div>

        <!-- Loading -->
        <div id="loading-indicator" class="uk-text-center uk-margin" hidden>
            <div uk-spinner></div>
        </div>
    </div>

    @include('partials.media-modal')

    @include('partials.guide-modal')

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const gridBtn = document.getElementById('grid-view-btn');
                const listBtn = document.getElementById('list-view-btn');
                const grid = document.getElementById('gallery-grid');

                const toggleView = (view) => {
                    const gridView = document.querySelectorAll('.gallery-grid-view');
                    const listView = document.querySelectorAll('.gallery-list-view');

                    if (view === 'grid') {
                        grid.dataset.view = 'grid';
                        grid.classList.remove('uk-child-width-1-1');
                        grid.classList.add('uk-child-width-1-2@s', 'uk-child-width-1-3@m', 'uk-child-width-1-4@l');
                        gridView.forEach(el => el.classList.remove('uk-hidden'));
                        listView.forEach(el => el.classList.add('uk-hidden'));
                        gridBtn.classList.replace('uk-button-default', 'uk-button-primary');
                        listBtn.classList.replace('uk-button-primary', 'uk-button-default');
                    } else {
                        grid.dataset.view = 'list';
                        grid.classList.remove('uk-child-width-1-2@s', 'uk-child-width-1-3@m', 'uk-child-width-1-4@l');
                        grid.classList.add('uk-child-width-1-1');
                        gridView.forEach(el => el.classList.add('uk-hidden'));
                        listView.forEach(el => el.classList.remove('uk-hidden'));
                        listBtn.classList.replace('uk-button-default', 'uk-button-primary');
                        gridBtn.classList.replace('uk-button-primary', 'uk-button-default');
                    }
                };

                gridBtn.addEventListener('click', () => toggleView('grid'));
                listBtn.addEventListener('click', () => toggleView('list'));

                window.updateModalDetails = (details) => {
                    const img = document.getElementById('modal-image');
                    const loading = document.getElementById('modal-loading');
                    document.getElementById('modal-category').textContent = details.category;
                    document.getElementById('modal-date').textContent = details.date;
                    document.getElementById('modal-description').textContent = details.description || '';

                    loading.hidden = false;
                    img.hidden = true;
                    img.onload = () => {
                        loading.hidden = true;
                        img.hidden = false;
                    };
                    img.src = details.imageUrl;
                    img.alt = details.title || details.filename || 'تصویر';
                };
            });
        </script>
    @endpush
@endsection

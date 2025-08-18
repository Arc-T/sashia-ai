<?php

// Demo data for Prompt-Craft website (Persian/RTL)
return [
    'trendingPrompts' => [
        [
            'id' => 1,
            'title' => 'تولید کننده ایمیل حرفه‌ای',
            'description' => 'ایمیل‌های تجاری حرفه‌ای در چند ثانیه ایجاد کنید',
            'content' => "یک ایمیل حرفه‌ای به [گیرنده] درباره [موضوع] بنویسید. ایمیل باید مختصر و مؤدبانه باشد و شامل:\n1. سلام و احوالپرسی مناسب\n2. بیان واضح موضوع\n3. درخواست یا پیشنهاد مشخص\n4. پایان محترمانه",
            'model' => 'ChatGPT-4',
            'author' => 'نویسنده۱',
            'author_avatar' => 'https://i.pravatar.cc/150?img=1',
            'likes' => 142,
            'downloads' => 89,
            'image' => 'https://source.unsplash.com/random/600x400?email,office',
            'date' => '۲ هفته پیش',
            'tags' => 'تجاری,ایمیل,محتوای متنی'
        ],
        [
            'id' => 2,
            'title' => 'منظره فانتزی میجورنی',
            'description' => 'پرومپت مناسب برای ایجاد تصاویر فانتزی خیره کننده',
            'content' => "یک جنگل اسرارآمیز با قارچ‌های نورانی، درختان قدیمی بلند و یک آبشار پنهانی، طراحی فوق‌العاده دقیق، 4K، سبک هنری فانتزی، نورپردازی دراماتیک، سورئال",
            'model' => 'Midjourney v6',
            'author' => 'هنرمندAI',
            'author_avatar' => 'https://i.pravatar.cc/150?img=5',
            'likes' => 256,
            'downloads' => 187,
            'image' => 'https://source.unsplash.com/random/600x400?fantasy,forest',
            'date' => '۱ ماه پیش',
            'tags' => 'هنری,میجورنی,فانتزی'
        ],
        [
            'id' => 3,
            'title' => 'مشاور برنامه‌نویسی پایتون',
            'description' => 'درک و رفع خطاهای کد پایتون',
            'content' => "شما یک متخصص پایتون با 10 سال تجربه هستید. کد زیر را بررسی کرده:\n1. خطاهای احتمالی را شناسایی کنید\n2. راه‌حل‌های بهینه ارائه دهید\n3. نسخه بهبود یافته کد را بنویسید\n\n[کد کاربر اینجا قرار می‌گیرد]",
            'model' => 'Claude 3',
            'author' => 'پایتون کار',
            'author_avatar' => 'https://i.pravatar.cc/150?img=11',
            'likes' => 98,
            'downloads' => 76,
            'image' => 'https://source.unsplash.com/random/600x400?python,code',
            'date' => '۳ روز پیش',
            'tags' => 'برنامه‌نویسی,پایتون,کدنویسی'
        ],
        [
            'id' => 4,
            'title' => 'تبدیل متن به جدول اکسل',
            'description' => 'ساختاردهی داده‌های متنی به صورت جدول اکسل',
            'content' => "متن زیر را به یک جدول اکسل با فرمت زیر تبدیل کنید:\n\n- ستون‌ها: [ستون‌های مورد نظر]\n- فرمت اعداد: [فرمت مورد نظر]\n- مرتب‌سازی بر اساس: [ستون مرتب‌سازی]\n\n[متن کاربر اینجا قرار می‌گیرد]",
            'model' => 'Gemini Pro',
            'author' => 'مدیر داده',
            'author_avatar' => 'https://i.pravatar.cc/150?img=7',
            'likes' => 87,
            'downloads' => 65,
            'image' => 'https://source.unsplash.com/random/600x400?excel,table',
            'date' => '۱ هفته پیش',
            'tags' => 'اکسل,داده,سازماندهی'
        ]
    ],

    'categories' => [
        [
            'name' => 'محتوای متنی',
            'icon' => 'file-text',
            'count' => 245,
            'slug' => 'text-content'
        ],
        [
            'name' => 'هنر و طراحی',
            'icon' => 'image',
            'count' => 189,
            'slug' => 'art-design'
        ],
        [
            'name' => 'برنامه‌نویسی',
            'icon' => 'code',
            'count' => 156,
            'slug' => 'programming'
        ],
        [
            'name' => 'تحلیل داده',
            'icon' => 'database',
            'count' => 98,
            'slug' => 'data-analysis'
        ],
        [
            'name' => 'بازاریابی',
            'icon' => 'credit-card',
            'count' => 112,
            'slug' => 'marketing'
        ],
        [
            'name' => 'آموزشی',
            'icon' => 'book',
            'count' => 76,
            'slug' => 'education'
        ]
    ],

    'filterCategories' => [
        [
            'name' => 'ChatGPT',
            'slug' => 'chatgpt'
        ],
        [
            'name' => 'Midjourney',
            'slug' => 'midjourney'
        ],
        [
            'name' => 'Claude',
            'slug' => 'claude'
        ],
        [
            'name' => 'Gemini',
            'slug' => 'gemini'
        ],
        [
            'name' => 'DALL-E',
            'slug' => 'dalle'
        ]
    ],

    'featuredPrompts' => [
        [
            'title' => 'خلاصه‌ساز مقالات علمی',
            'description' => 'خلاصه‌ای دقیق و حرفه‌ای از مقالات علمی با حفظ اصطلاحات تخصصی تولید می‌کند',
            'author' => 'پژوهشگرAI',
            'author_avatar' => 'https://i.pravatar.cc/150?img=12',
            'rating' => 4.8,
            'comments' => 23,
            'tags' => 'chatgpt,تحقیق,علمی,محتوای متنی',
            'model' => 'ChatGPT-4'
        ],
        [
            'title' => 'طراحی لوگو مدرن',
            'description' => 'ایده‌های خلاقانه برای طراحی لوگوهای مینیمال و مدرن',
            'author' => 'طراح حرفه‌ای',
            'author_avatar' => 'https://i.pravatar.cc/150?img=8',
            'rating' => 4.6,
            'comments' => 18,
            'tags' => 'midjourney,هنری,لوگو,طراحی',
            'model' => 'Midjourney v6'
        ],
        [
            'title' => 'بهینه‌ساز کد SQL',
            'description' => 'کدهای SQL را تحلیل و بهینه‌سازی می‌کند',
            'author' => 'متخصص پایگاه داده',
            'author_avatar' => 'https://i.pravatar.cc/150?img=15',
            'rating' => 4.9,
            'comments' => 31,
            'tags' => 'claude,برنامه‌نویسی,داده,sql',
            'model' => 'Claude 3'
        ],
        [
            'title' => 'تولید پست‌های لینکدین',
            'description' => 'پست‌های حرفه‌ای و جذاب برای پروفایل لینکدین ایجاد می‌کند',
            'author' => 'مشاور بازاریابی',
            'author_avatar' => 'https://i.pravatar.cc/150?img=9',
            'rating' => 4.5,
            'comments' => 14,
            'tags' => 'gemini,بازاریابی,شبکه‌های اجتماعی,محتوای متنی',
            'model' => 'Gemini Pro'
        ],
        [
            'title' => 'طرح‌های انتزاعی DALL-E',
            'description' => 'ایجاد تصاویر انتزاعی با رنگ‌های زنده و ترکیب‌بندی منحصر به فرد',
            'author' => 'هنرمند دیجیتال',
            'author_avatar' => 'https://i.pravatar.cc/150?img=13',
            'rating' => 4.7,
            'comments' => 21,
            'tags' => 'dalle,هنری,انتزاعی,رنگی',
            'model' => 'DALL-E 3'
        ],
        [
            'title' => 'مترجم فنی انگلیسی به فارسی',
            'description' => 'متون فنی و تخصصی را با حفظ اصطلاحات دقیق ترجمه می‌کند',
            'author' => 'مترجم حرفه‌ای',
            'author_avatar' => 'https://i.pravatar.cc/150?img=4',
            'rating' => 4.8,
            'comments' => 27,
            'tags' => 'chatgpt,ترجمه,محتوای متنی,فنی',
            'model' => 'ChatGPT-4'
        ]
    ]
];

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserPromptsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prompts = [
            [
                'user_id' => 1,
                'category_id' => 1, // Marketing
                'title' => 'ایمیل بازاریابی حرفه‌ای',
                'description' => 'قالب ایمیل برای جذب مشتریان جدید',
                'content' => 'یک ایمیل بازاریابی حرفه‌ای بنویس که شامل معرفی محصول، مزایای آن و دعوت به اقدام واضح باشد. ایمیل باید جذاب، مختصر و مؤثر باشد.',
                'ai_model_ids' => '1,2,3',
                'is_favorite' => 1,
                'created_at' => Carbon::create(2024, 1, 15, 10, 30, 0),
            ],
            [
                'user_id' => 1,
                'category_id' => 1, // Marketing
                'title' => 'پست اینستاگرام محصول',
                'description' => 'قالب پست برای معرفی محصول در اینستاگرام',
                'content' => 'یک پست اینستاگرام جذاب برای محصول جدید ما ایجاد کن. شامل توضیحات کوتاه، هشتگ‌های مرتبط و دعوت به تعامل.',
                'ai_model_ids' => '1,2,3',
                'is_favorite' => 0,
                'created_at' => Carbon::create(2024, 1, 16, 14, 20, 0),
            ],
            [
                'user_id' => 1,
                'category_id' => 3, // Programming
                'title' => 'کد پیاده‌سازی API',
                'description' => 'ساختار پایه برای API endpoint',
                'content' => 'یک endpoint API RESTful با Node.js و Express ایجاد کن که شامل validation، error handling و documentation باشد.',
                'ai_model_ids' => '3,9,10',
                'is_favorite' => 1,
                'created_at' => Carbon::create(2024, 1, 17, 9, 45, 0),
            ],
            [
                'user_id' => 1,
                'category_id' => 4, // Data Analysis
                'title' => 'تحلیل داده فروش',
                'description' => 'آنالیز داده‌های فروش فصلی',
                'content' => 'یک گزارش تحلیل داده برای فروش سه ماهه ایجاد کن. شامل نمودارها، insights و پیشنهادات بهبود.',
                'ai_model_ids' => '4,5,6',
                'is_favorite' => 0,
                'created_at' => Carbon::create(2024, 1, 18, 16, 10, 0),
            ],
            [
                'user_id' => 1,
                'category_id' => 5, // Creativity
                'title' => 'داستان خلاقانه کوتاه',
                'description' => 'داستان کوتاه با موضوع فناوری',
                'content' => 'یک داستان کوتاه 500 کلمه‌ای درباره تأثیر هوش مصنوعی بر زندگی انسان بنویس.',
                'ai_model_ids' => '1,2,5',
                'is_favorite' => 1,
                'created_at' => Carbon::create(2024, 1, 19, 11, 30, 0),
            ],
            [
                'user_id' => 1,
                'category_id' => 6, // Customer Support
                'title' => 'پاسخ پشتیبانی مشتری',
                'description' => 'قالب پاسخ به شکایت مشتری',
                'content' => 'یک پاسخ حرفه‌ای و همدلانه به شکایت مشتری بنویس که شامل عذرخواهی، راه‌حل و پیگیری باشد.',
                'ai_model_ids' => '1,2,7',
                'is_favorite' => 0,
                'created_at' => Carbon::create(2024, 1, 20, 13, 15, 0),
            ],
            [
                'user_id' => 1,
                'category_id' => 2, // Content Creation
                'title' => 'اسکریپت ویدیوی آموزشی',
                'description' => 'اسکریپت برای ویدیوی آموزشی 5 دقیقه‌ای',
                'content' => 'اسکریپت کامل برای یک ویدیوی آموزشی درباره مفاهیم پایه برنامه‌نویسی ایجاد کن.',
                'ai_model_ids' => '2,3,8',
                'is_favorite' => 1,
                'created_at' => Carbon::create(2024, 1, 21, 15, 40, 0),
            ],
            [
                'user_id' => 1,
                'category_id' => 1, // Marketing
                'title' => 'بهینه‌سازی سئو',
                'description' => 'چک‌لیست سئو برای محتوای وب',
                'content' => 'یک چک‌لیست جامع برای بهینه‌سازی سئو محتوای وب ایجاد کن که شامل meta tags، keywords و ساختار محتوا باشد.',
                'ai_model_ids' => '1,4,6',
                'is_favorite' => 0,
                'created_at' => Carbon::create(2024, 1, 22, 8, 50, 0),
            ],
            [
                'user_id' => 1,
                'category_id' => 5, // Creativity
                'title' => 'نام‌گذاری محصول جدید',
                'description' => 'ایده‌های نام برای محصول tech جدید',
                'content' => '10 ایده خلاقانه برای نام‌گذاری یک محصول نرم‌افزاری جدید ایجاد کن.',
                'ai_model_ids' => '5,8,9',
                'is_favorite' => 1,
                'created_at' => Carbon::create(2024, 1, 23, 12, 25, 0),
            ],
            [
                'user_id' => 1,
                'category_id' => 4, // Data Analysis
                'title' => 'گزارش مالی سه‌ماهه',
                'description' => 'قالب گزارش مالی حرفه‌ای',
                'content' => 'یک گزارش مالی سه‌ماهه با ساختار استاندارد ایجاد کن که شامل درآمد، هزینه‌ها و تحلیل روند باشد.',
                'ai_model_ids' => '4,6,7',
                'is_favorite' => 0,
                'created_at' => Carbon::create(2024, 1, 24, 17, 5, 0),
            ],
            [
                'user_id' => 1,
                'category_id' => 2, // Content Creation
                'title' => 'محتوای وبلاگ سلامت',
                'description' => 'مقاله درباره تغذیه سالم',
                'content' => 'یک مقاله 1000 کلمه‌ای درباره اهمیت تغذیه سالم و تأثیر آن بر سلامت روان بنویس.',
                'ai_model_ids' => '1,2,8',
                'is_favorite' => 1,
                'created_at' => Carbon::create(2024, 1, 25, 10, 15, 0),
            ],
            [
                'user_id' => 1,
                'category_id' => 3, // Programming
                'title' => 'کد authentication',
                'description' => 'سیستم احراز هویت امن',
                'content' => 'یک سیستم احراز هویت با Node.js ایجاد کن که شامل register، login، JWT و password hashing باشد.',
                'ai_model_ids' => '3,9,10',
                'is_favorite' => 1,
                'created_at' => Carbon::create(2024, 1, 26, 14, 30, 0),
            ],
            [
                'user_id' => 1,
                'category_id' => 1, // Marketing
                'title' => 'استراتژی شبکه‌های اجتماعی',
                'description' => 'برنامه محتوای ماهانه',
                'content' => 'یک استراتژی محتوای ماهانه برای شبکه‌های اجتماعی ایجاد کن که شامل calendar، content ideas و engagement tactics باشد.',
                'ai_model_ids' => '1,2,4',
                'is_favorite' => 0,
                'created_at' => Carbon::create(2024, 1, 27, 9, 20, 0),
            ],
            [
                'user_id' => 1,
                'category_id' => 2, // Content Creation
                'title' => 'رزومه حرفه‌ای',
                'description' => 'قالب رزومه برای توسعه‌دهنده',
                'content' => 'یک رزومه حرفه‌ای برای توسعه‌دهنده full-stack ایجاد کن که شامل skills، experience و projects باشد.',
                'ai_model_ids' => '1,2,3',
                'is_favorite' => 1,
                'created_at' => Carbon::create(2024, 1, 28, 16, 45, 0),
            ],
            [
                'user_id' => 1,
                'category_id' => 4, // Data Analysis
                'title' => 'برنامه کسب‌وکار',
                'description' => 'طرح کسب‌وکار استارتاپ',
                'content' => 'یک طرح کسب‌وکار کامل برای استارتاپ tech ایجاد کن که شامل market analysis، financial projections و growth strategy باشد.',
                'ai_model_ids' => '1,4,6',
                'is_favorite' => 0,
                'created_at' => Carbon::create(2024, 1, 29, 11, 10, 0),
            ],
        ];

        DB::table('user_prompts')->insert($prompts);
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PromptTagsTableSeeder extends Seeder
{
    public function run(): void
    {
        $tags = [
            ['name' => 'هوش مصنوعی'],
            ['name' => 'مدل زبانی'],
            ['name' => 'یادگیری ماشین'],
            ['name' => 'شبکه عصبی'],
            ['name' => 'چت‌بات'],
            ['name' => 'پردازش تصویر'],
            ['name' => 'تحلیل داده'],
            ['name' => 'برنامه‌نویسی'],
            ['name' => 'جاوااسکریپت'],
            ['name' => 'لاراول'],
            ['name' => 'پی‌اچ‌پی'],
            ['name' => 'پایتون'],
            ['name' => 'طراحی وب'],
            ['name' => 'فرانت‌اند'],
            ['name' => 'بک‌اند'],
            ['name' => 'دیتابیس'],
            ['name' => 'معماری نرم‌افزار'],
            ['name' => 'کاربرپسند'],
            ['name' => 'تجربه کاربری'],
            ['name' => 'طراحی رابط کاربری'],
            ['name' => 'دیجیتال مارکتینگ'],
            ['name' => 'بازاریابی'],
            ['name' => 'سئو'],
            ['name' => 'محتوا'],
            ['name' => 'گرافیک'],
            ['name' => 'عکاسی'],
            ['name' => 'نقاشی'],
            ['name' => 'سفر'],
            ['name' => 'گردشگری'],
            ['name' => 'فرهنگ'],
            ['name' => 'آموزش'],
            ['name' => 'کتاب'],
            ['name' => 'فیلم'],
            ['name' => 'موسیقی'],
            ['name' => 'ورزش'],
            ['name' => 'سلامت'],
            ['name' => 'تکنولوژی'],
            ['name' => 'استارتاپ'],
            ['name' => 'اقتصاد'],
            ['name' => 'علوم اجتماعی'],
            ['name' => 'علوم پایه'],
            ['name' => 'اخلاق'],
            ['name' => 'فلسفه'],
            ['name' => 'هنر'],
            ['name' => 'ادبیات'],
            ['name' => 'شعر'],
            ['name' => 'تاریخ'],
            ['name' => 'فرهنگ ایرانی'],
            ['name' => 'معماری'],
        ];

        DB::table('prompt_tags')->insertOrIgnore($tags);
    }
}
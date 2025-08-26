<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            // Top-level categories
            [
                'name' => 'Marketing',
                'slug' => 'بازاریابی-و-فروش',
                'description' => 'Prompts related to marketing, sales and advertising',
                'color_hex' => '#FF6B6B',
                'parent_id' => null,
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Content Creation',
                'slug' => 'تولید-محتوا',
                'description' => 'Text, image and video content creation prompts',
                'color_hex' => '#4ECDC4',
                'parent_id' => null,
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Programming',
                'slug' => 'برنامه-نویسی',
                'description' => 'Developer assistance prompts',
                'color_hex' => '#45B7D1',
                'parent_id' => null,
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Data Analysis',
                'slug' => 'تحلیل-داده',
                'description' => 'Data analysis and business intelligence prompts',
                'color_hex' => '#96CEB4',
                'parent_id' => null,
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'Creativity',
                'slug' => 'خلاقیت-و-ایده-پردازی',
                'description' => 'Creative and ideation prompts',
                'color_hex' => '#FECA57',
                'parent_id' => null,
                'sort_order' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'Customer Support',
                'slug' => 'پشتیبانی-و-خدمات',
                'description' => 'Customer service and support prompts',
                'color_hex' => '#FF9FF3',
                'parent_id' => null,
                'sort_order' => 6,
                'is_active' => true,
            ],
        ];

        // Insert top-level categories and get their IDs
        $categoryIds = [];
        foreach ($categories as $category) {
            $id = DB::table('categories')->insertGetId($category);
            $categoryIds[$category['name']] = $id;
        }

        // Subcategories
        $subcategories = [
            // Marketing subcategories
            [
                'name' => 'Social Media',
                'slug' => 'شبکه-های-اجتماعی',
                'description' => 'Social media marketing and content prompts',
                'color_hex' => '#FF9FF3',
                'parent_id' => $categoryIds['Marketing'],
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Email Marketing',
                'slug' => 'ایمیل-مارکتینگ',
                'description' => 'Email campaign and newsletter prompts',
                'color_hex' => '#FECA57',
                'parent_id' => $categoryIds['Marketing'],
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'SEO',
                'slug' => 'سئو',
                'description' => 'Search engine optimization prompts',
                'color_hex' => '#48DBFB',
                'parent_id' => $categoryIds['Marketing'],
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Advertising',
                'slug' => 'تبلیغات',
                'description' => 'Ad copy and campaign prompts',
                'color_hex' => '#1DD1A1',
                'parent_id' => $categoryIds['Marketing'],
                'sort_order' => 4,
                'is_active' => true,
            ],

            // Content Creation subcategories
            [
                'name' => 'Blog Writing',
                'slug' => 'نوشتن-بلاگ',
                'description' => 'Blog post and article writing prompts',
                'color_hex' => '#00D2D3',
                'parent_id' => $categoryIds['Content Creation'],
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Video Scripts',
                'slug' => 'فیلمنامه-ویدیو',
                'description' => 'Video script and storyboard prompts',
                'color_hex' => '#54A0FF',
                'parent_id' => $categoryIds['Content Creation'],
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Social Media Posts',
                'slug' => 'پست-شبکه-اجتماعی',
                'description' => 'Social media content prompts',
                'color_hex' => '#FF6B6B',
                'parent_id' => $categoryIds['Content Creation'],
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Product Descriptions',
                'slug' => 'توضیحات-محصول',
                'description' => 'E-commerce product description prompts',
                'color_hex' => '#10AC84',
                'parent_id' => $categoryIds['Content Creation'],
                'sort_order' => 4,
                'is_active' => true,
            ],

            // Programming subcategories
            [
                'name' => 'Web Development',
                'slug' => 'توسعه-وب',
                'description' => 'Web development and frontend prompts',
                'color_hex' => '#FF9FF3',
                'parent_id' => $categoryIds['Programming'],
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Backend',
                'slug' => 'بک-اند',
                'description' => 'Backend and API development prompts',
                'color_hex' => '#FECA57',
                'parent_id' => $categoryIds['Programming'],
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Database',
                'slug' => 'پایگاه-داده',
                'description' => 'Database query and design prompts',
                'color_hex' => '#48DBFB',
                'parent_id' => $categoryIds['Programming'],
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'DevOps',
                'slug' => 'دوواپس',
                'description' => 'DevOps and infrastructure prompts',
                'color_hex' => '#1DD1A1',
                'parent_id' => $categoryIds['Programming'],
                'sort_order' => 4,
                'is_active' => true,
            ],

            // Data Analysis subcategories
            [
                'name' => 'Data Visualization',
                'slug' => 'نمایش-داده',
                'description' => 'Data visualization and dashboard prompts',
                'color_hex' => '#00D2D3',
                'parent_id' => $categoryIds['Data Analysis'],
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Statistical Analysis',
                'slug' => 'تحلیل-آماری',
                'description' => 'Statistical analysis and modeling prompts',
                'color_hex' => '#54A0FF',
                'parent_id' => $categoryIds['Data Analysis'],
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Business Intelligence',
                'slug' => 'هوش-تجاری',
                'description' => 'Business intelligence and reporting prompts',
                'color_hex' => '#FF6B6B',
                'parent_id' => $categoryIds['Data Analysis'],
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Machine Learning',
                'slug' => 'یادگیری-ماشین',
                'description' => 'Machine learning and AI model prompts',
                'color_hex' => '#10AC84',
                'parent_id' => $categoryIds['Data Analysis'],
                'sort_order' => 4,
                'is_active' => true,
            ],

            // Creativity subcategories
            [
                'name' => 'Story Writing',
                'slug' => 'نوشتن-داستان',
                'description' => 'Creative writing and storytelling prompts',
                'color_hex' => '#FF9FF3',
                'parent_id' => $categoryIds['Creativity'],
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Art Ideas',
                'slug' => 'ایده-های-هنری',
                'description' => 'Art and design inspiration prompts',
                'color_hex' => '#FECA57',
                'parent_id' => $categoryIds['Creativity'],
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Product Naming',
                'slug' => 'نام-گذاری-محصول',
                'description' => 'Product and brand naming prompts',
                'color_hex' => '#48DBFB',
                'parent_id' => $categoryIds['Creativity'],
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Brainstorming',
                'slug' => 'طوفان-فکری',
                'description' => 'Brainstorming and ideation prompts',
                'color_hex' => '#1DD1A1',
                'parent_id' => $categoryIds['Creativity'],
                'sort_order' => 4,
                'is_active' => true,
            ],

            // Customer Support subcategories
            [
                'name' => 'FAQ Generation',
                'slug' => 'تولید-سوالات-متداول',
                'description' => 'FAQ and help center content prompts',
                'color_hex' => '#00D2D3',
                'parent_id' => $categoryIds['Customer Support'],
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Response Templates',
                'slug' => 'قالب-های-پاسخ',
                'description' => 'Customer response template prompts',
                'color_hex' => '#54A0FF',
                'parent_id' => $categoryIds['Customer Support'],
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Troubleshooting',
                'slug' => 'عیب-یابی',
                'description' => 'Troubleshooting guide prompts',
                'color_hex' => '#FF6B6B',
                'parent_id' => $categoryIds['Customer Support'],
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Feedback Analysis',
                'slug' => 'تحلیل-بازخورد',
                'description' => 'Customer feedback analysis prompts',
                'color_hex' => '#10AC84',
                'parent_id' => $categoryIds['Customer Support'],
                'sort_order' => 4,
                'is_active' => true,
            ],

            // Inactive categories
            [
                'name' => 'Legacy Templates',
                'slug' => 'قالب-های-قدیمی',
                'description' => 'Deprecated prompt templates',
                'color_hex' => '#CCCCCC',
                'parent_id' => null,
                'sort_order' => 99,
                'is_active' => false,
            ],
            [
                'name' => 'Archived Prompts',
                'slug' => 'پرامپت-های-آرشیو',
                'description' => 'Archived and inactive prompts',
                'color_hex' => '#999999',
                'parent_id' => null,
                'sort_order' => 100,
                'is_active' => false,
            ],
        ];

        // Insert subcategories
        DB::table('categories')->insert($subcategories);
    }
}
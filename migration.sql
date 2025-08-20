SET FOREIGN_KEY_CHECKS = 0;

-- Table structure for table `prompts`
CREATE TABLE IF NOT EXISTS `prompts` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL COMMENT 'Title of the prompt',
  `content` TEXT NOT NULL COMMENT 'Full prompt content',
  `category_id` BIGINT UNSIGNED NULL COMMENT 'Category reference',
  `color` VARCHAR(20) DEFAULT '#1e87f0' COMMENT 'Badge color',
  `is_favorite` TINYINT(1) DEFAULT 0 COMMENT 'Marked as favorite',
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `prompts_category_id_index` (`category_id`),
  INDEX `prompts_is_favorite_index` (`is_favorite`),
  INDEX `prompts_created_at_index` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table structure for table `categories`
CREATE TABLE IF NOT EXISTS `categories` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL COMMENT 'Category name',
  `description` TEXT NULL COMMENT 'Category description',
  `color` VARCHAR(20) DEFAULT '#666666' COMMENT 'Category color',
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `categories_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table structure for table `prompt_tags`
CREATE TABLE IF NOT EXISTS `prompt_tags` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL COMMENT 'Tag name',
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `prompt_tags_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table structure for table `prompt_tag_pivot`
CREATE TABLE IF NOT EXISTS `prompt_tag_pivot` (
  `prompt_id` BIGINT UNSIGNED NOT NULL,
  `tag_id` BIGINT UNSIGNED NOT NULL,
  PRIMARY KEY (`prompt_id`, `tag_id`),
  INDEX `prompt_tag_pivot_tag_id_foreign` (`tag_id`),
  CONSTRAINT `prompt_tag_pivot_prompt_id_foreign` FOREIGN KEY (`prompt_id`) REFERENCES `prompts` (`id`) ON DELETE CASCADE,
  CONSTRAINT `prompt_tag_pivot_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `prompt_tags` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table structure for table `teams`
CREATE TABLE IF NOT EXISTS `teams` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL COMMENT 'Team name',
  `description` TEXT NULL COMMENT 'Team description',
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `teams_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table structure for table `prompt_shares`
CREATE TABLE IF NOT EXISTS `prompt_shares` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `prompt_id` BIGINT UNSIGNED NOT NULL,
  `team_id` BIGINT UNSIGNED NOT NULL,
  `permission_level` ENUM('read', 'edit') DEFAULT 'read' COMMENT 'Access permission level',
  `shared_by` BIGINT UNSIGNED NOT NULL COMMENT 'User who shared the prompt',
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `prompt_shares_unique` (`prompt_id`, `team_id`),
  INDEX `prompt_shares_team_id_foreign` (`team_id`),
  INDEX `prompt_shares_shared_by_index` (`shared_by`),
  CONSTRAINT `prompt_shares_prompt_id_foreign` FOREIGN KEY (`prompt_id`) REFERENCES `prompts` (`id`) ON DELETE CASCADE,
  CONSTRAINT `prompt_shares_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table structure for table `prompt_usage_stats`
CREATE TABLE IF NOT EXISTS `prompt_usage_stats` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `prompt_id` BIGINT UNSIGNED NOT NULL,
  `user_id` BIGINT UNSIGNED NOT NULL COMMENT 'User who used the prompt',
  `usage_count` INT UNSIGNED DEFAULT 1 COMMENT 'Number of times used',
  `last_used_at` TIMESTAMP NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `prompt_usage_stats_unique` (`prompt_id`, `user_id`),
  INDEX `prompt_usage_stats_user_id_index` (`user_id`),
  CONSTRAINT `prompt_usage_stats_prompt_id_foreign` FOREIGN KEY (`prompt_id`) REFERENCES `prompts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert default categories
INSERT INTO `categories` (`name`, `description`, `color`, `created_at`, `updated_at`) VALUES
('بازاریابی', 'پیشنهادات مرتبط با بازاریابی و تبلیغات', '#32d296', NOW(), NOW()),
('برنامه‌نویسی', 'پیشنهادات مربوط به توسعه نرم‌افزار و کدنویسی', '#1e87f0', NOW(), NOW()),
('تحلیل داده', 'پیشنهادات تحلیل داده و آمار', '#faa05a', NOW(), NOW()),
('خلاقانه', 'ایده‌های خلاقانه و نوآورانه', '#f0506e', NOW(), NOW());

-- Insert sample prompts
INSERT INTO `prompts` (`title`, `content`, `category_id`, `color`, `is_favorite`, `created_at`, `updated_at`) VALUES
('پیشنهاد بازاریابی', 'یک پست جذاب برای اینستاگرام درباره محصول جدید ما بنویس که شامل مزایای محصول و یک دعوت به اقدام قوی باشد...', 1, '#1e87f0', 1, '2023-08-06 00:00:00', NOW()),
('کد پایتون', 'یک تابع پایتون بنویس که لیستی از اعداد را دریافت کند و اعداد زوج و فرد را جدا کرده و در دو لیست مختلف برگرداند...', 2, '#1e87f0', 0, '2023-07-13 00:00:00', NOW()),
('تحلیل داده‌ها', 'یک کوئری SQL بنویس که میانگین فروش را بر اساس ماه و منطقه جغرافیایی محاسبه کند و نتایج را به صورت نزولی مرتب کند...', 3, '#faa05a', 1, '2023-05-31 00:00:00', NOW()),
('ایده‌پردازی', '۱۰ ایده خلاقانه برای ویژگی‌های جدید یک اپلیکیشن مدیریت وظایف پیشنهاد بده که کاربران را به استفاده بیشتر ترغیب کند...', 4, '#f0506e', 0, '2023-04-18 00:00:00', NOW());

-- Insert sample teams
INSERT INTO `teams` (`name`, `description`, `created_at`, `updated_at`) VALUES
('تیم بازاریابی', 'تیم مسئول بازاریابی و تبلیغات', NOW(), NOW()),
('تیم توسعه', 'تیم توسعه‌دهندگان نرم‌افزار', NOW(), NOW()),
('مدیران محصول', 'تیم مدیریت محصولات', NOW(), NOW()),
('همه کاربران', 'دسترسی برای همه کاربران سیستم', NOW(), NOW());

SET FOREIGN_KEY_CHECKS = 1;

-- Table for storing AI models
CREATE TABLE ai_models (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    version VARCHAR(50),
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE categories (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    slug VARCHAR(255) UNIQUE NOT NULL,
    description TEXT,
    parent_id INT UNSIGNED DEFAULT NULL,
    sort_order INT DEFAULT 0,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (parent_id) REFERENCES categories(id) ON DELETE SET NULL
);

-- Table for prompts
CREATE TABLE prompts (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    prompt_text TEXT NOT NULL,
    -- negative_prompt TEXT,
    model_id INT UNSIGNED NOT NULL,
    category_id INT UNSIGNED NOT NULL,
    user_id INT UNSIGNED, -- If you have user authentication
    -- width INT DEFAULT 512,
    -- height INT DEFAULT 512,
    -- steps INT DEFAULT 20, /** ! this one should be handled by ai_model table */
    -- cfg_scale DECIMAL(3,1) DEFAULT 7.5,
    -- sampler VARCHAR(100),
    -- views_count INT UNSIGNED DEFAULT 0,
    -- likes_count INT UNSIGNED DEFAULT 0,
    -- downloads_count INT UNSIGNED DEFAULT 0,
    -- is_public BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (model_id) REFERENCES ai_models(id),
    FOREIGN KEY (category_id) REFERENCES categories(id)
);

-- Table for generated images
-- we need a prompt media
CREATE TABLE generated_images (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    prompt_id INT UNSIGNED NOT NULL,
    image_url VARCHAR(500) NOT NULL,
    thumbnail_url VARCHAR(500),
    file_size INT UNSIGNED,
    file_format VARCHAR(10) DEFAULT 'jpg',
    seed INT,
    aspect_ratio VARCHAR(10) DEFAULT '1:1',
    is_primary BOOLEAN DEFAULT FALSE,
    generation_time INT UNSIGNED COMMENT 'Time in seconds',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (prompt_id) REFERENCES prompts(id) ON DELETE CASCADE
);
--MORPH ????
CREATE TABLE user_interactions (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT UNSIGNED NOT NULL,
    prompt_id INT UNSIGNED NOT NULL,
    interaction_type ENUM('like', 'favorite', 'download') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE KEY unique_interaction (user_id, prompt_id, interaction_type),
    FOREIGN KEY (prompt_id) REFERENCES prompts(id) ON DELETE CASCADE
);

INSERT INTO categories (name, slug, description, sort_order) VALUES
('همه', 'all', 'همه دسته‌بندی‌ها', 1),
('شخصیت‌ها', 'characters', 'تصاویر شخصیت‌ها و چهره‌ها', 2),
('مناظر', 'landscapes', 'مناظر طبیعی و محیط‌های بیرونی', 3),
('هنر مفهومی', 'concept-art', 'هنر مفهومی و ایده‌پردازی', 4),
('فوتورئال', 'photorealistic', 'تصاویر فوتورئال و واقع‌گرا', 5),
('انیمه', 'anime', 'سبک انیمه و مانگا', 6),
('سه‌بعدی', '3d', 'تصاویر سه‌بعدی و مدل‌سازی', 7),
('انتزاعی', 'abstract', 'هنر انتزاعی و تجریدی', 8),
('پرتره', 'portraits', 'پرتره و چهره‌نگاری', 9);

--tested by sashia ? dont know 

CREATE TABLE automations (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    version VARCHAR(50),
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE automation_templates (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    prompt_text TEXT NOT NULL,
    automation_id INT UNSIGNED NOT NULL,
    category_id INT UNSIGNED NOT NULL,
    user_id INT UNSIGNED, -- If you have user authentication
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (automation_id) REFERENCES automations(id),
    FOREIGN KEY (category_id) REFERENCES categories(id)
);
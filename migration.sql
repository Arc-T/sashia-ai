CREATE DATABASE IF NOT EXISTS `sashia_ai` CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE `sashia_ai`;

CREATE TABLE IF NOT EXISTS `users` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `first_name` VARCHAR(100) NULL,
    `last_name` VARCHAR(100) NULL,
    `email` VARCHAR(191) NULL,
    `phone` VARCHAR(20) NULL,
    `password` VARCHAR(255) NOT NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `deleted_at` TIMESTAMP NULL DEFAULT NULL,
		-- **************************** Table Keys ****************************
    PRIMARY KEY (`id`),
    UNIQUE KEY `uniq_users_email` (`email`),
    UNIQUE KEY `uniq_users_phone` (`phone`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `ai_models` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL COMMENT 'Display name of the AI model (e.g., "GPT-4 Turbo")',
    `vendor` VARCHAR(100) NULL COMMENT 'Company providing the model (e.g., "OpenAI", "Anthropic")',
    `model_identifier` VARCHAR(255) NOT NULL COMMENT 'The API-specific model name (e.g., "gpt-4-turbo-preview")',
    `description` TEXT NULL,
    `version` VARCHAR(50) NULL,
    `is_active` TINYINT(1) NOT NULL DEFAULT 1 COMMENT 'Controls whether this model is available for use',
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
		-- **************************** Table Keys ****************************
    PRIMARY KEY (`id`),
    UNIQUE KEY `uniq_ai_models_model_identifier` (`model_identifier`),
    KEY `idx_ai_models_is_active` (`is_active`)
) ENGINE=InnoDB COMMENT='Stores available AI models and their metadata';

CREATE TABLE IF NOT EXISTS `ai_model_guides` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `ai_model_id` INT UNSIGNED NOT NULL,
    `title` VARCHAR(255) NOT NULL COMMENT 'Guide section title',
    `content` TEXT NOT NULL COMMENT 'Guide content (e.g., tips, formatting rules)',
    `sort_order` SMALLINT UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Order of this guide section for display',
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
		-- **************************** Table Keys ****************************
    PRIMARY KEY (`id`),
    KEY `idx_ai_model_guides_ai_model_id` (`ai_model_id`),
    CONSTRAINT `fk_ai_model_guides_ai_model_id` FOREIGN KEY (`ai_model_id`) REFERENCES `ai_models` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB COMMENT='Stores tips and guides specific to each AI model';

CREATE TABLE IF NOT EXISTS `prompt_categories` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `slug` VARCHAR(255) NOT NULL COMMENT 'URL-friendly identifier',
    `description` TEXT NULL,
    `color_hex` VARCHAR(7) NOT NULL DEFAULT '#666666' COMMENT 'Hex code for category color',
    `parent_id` INT UNSIGNED DEFAULT NULL,
    `sort_order` INT NOT NULL DEFAULT 0,
    `is_active` TINYINT(1) NOT NULL DEFAULT 1,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    -- **************************** Table Keys ****************************
    PRIMARY KEY (`id`),
    UNIQUE KEY `uniq_prompt_categories_slug` (`slug`),
    KEY `idx_prompt_categories_parent_id` (`parent_id`),
    KEY `idx_prompt_categories_is_active` (`is_active`),
    CONSTRAINT `fk_prompt_categories_parent_id` FOREIGN KEY (`parent_id`) REFERENCES `prompt_categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `prompts` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(255) NOT NULL,
    `description` TEXT NULL,
    `content` TEXT NOT NULL COMMENT 'The actual prompt text',
    `ai_model_id` INT UNSIGNED NOT NULL COMMENT 'The model this prompt is optimized for',
    `category_id` INT UNSIGNED NOT NULL,
    `user_id` INT UNSIGNED NOT NULL COMMENT 'The creator/owner of the prompt',
    `is_public` TINYINT(1) NOT NULL DEFAULT 0 COMMENT 'Visibility control: 0 = Private, 1 = Public',
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
		-- **************************** Table Keys ****************************
    PRIMARY KEY (`id`),
    KEY `idx_prompts_ai_model_id` (`ai_model_id`),
    KEY `idx_prompts_category_id` (`category_id`),
    KEY `idx_prompts_user_id` (`user_id`),
    KEY `idx_prompts_is_public_is_active` (`is_public`, `is_active`),
    FULLTEXT KEY `ft_prompts_title_content` (`title`, `content`),
    CONSTRAINT `fk_prompts_ai_model_id` FOREIGN KEY (`ai_model_id`) REFERENCES `ai_models` (`id`) ON UPDATE CASCADE,
    CONSTRAINT `fk_prompts_category_id` FOREIGN KEY (`category_id`) REFERENCES `prompt_categories` (`id`) ON UPDATE CASCADE,
    CONSTRAINT `fk_prompts_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `prompt_case` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT UNSIGNED NOT NULL,
  `title` VARCHAR(255) NOT NULL,
  `content` TEXT NOT NULL COMMENT 'The actual prompt text',
  `description` TEXT NULL,
  `is_favorite` TINYINT(1) NOT NULL DEFAULT 0,
  `metadata` JSON NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  -- **************************** Table Keys ****************************
  PRIMARY KEY (`id`),
  KEY `idx_prompt_case_user_id` (`user_id`),
  FULLTEXT KEY `ft_prompt_case_title_content` (`title`, `content`),
  CONSTRAINT `fk_prompts_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB;
		
CREATE TABLE IF NOT EXISTS `prompt_tags` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL COMMENT 'Tag name (lowercase, normalized)',
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	-- **************************** Table Keys ****************************
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_prompt_tags_name` (`name`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `prompt_tag_pivot` (
  `prompt_id` INT UNSIGNED NOT NULL,
  `tag_id` INT UNSIGNED NOT NULL,
	-- **************************** Table Keys ****************************
  PRIMARY KEY (`prompt_id`, `tag_id`),
  KEY `idx_prompt_tag_pivot_tag_id` (`tag_id`),
  CONSTRAINT `fk_prompt_tag_pivot_prompt_id` FOREIGN KEY (`prompt_id`) REFERENCES `prompts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_prompt_tag_pivot_tag_id` FOREIGN KEY (`tag_id`) REFERENCES `prompt_tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `teams` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT, -- UNSIGNED
  `name` VARCHAR(100) NOT NULL COMMENT 'Team name',
  `description` TEXT NULL COMMENT 'Team description',
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	-- **************************** Table Keys ****************************
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_teams_name` (`name`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `user_interactions` (
   `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `user_id` INT UNSIGNED NOT NULL,
    `prompt_id` INT UNSIGNED NOT NULL,
    `interaction_type` ENUM('LIKE', 'FAVORITE', 'DOWNLOAD', 'USE', 'SHARE', 'REPORT') NOT NULL,
    `metadata` JSON NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
		-- **************************** Table Keys ****************************
    PRIMARY KEY (`id`),
    UNIQUE KEY `uniq_user_interaction` (`user_id`, `prompt_id`, `interaction_type`),
    KEY `idx_user_interactions_prompt_id_type` (`prompt_id`, `interaction_type`),
    CONSTRAINT `fk_user_interactions_prompt_id` FOREIGN KEY (`prompt_id`) REFERENCES `prompts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `prompt_views` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `prompt_id` INT UNSIGNED NOT NULL,
    `user_id` INT UNSIGNED NULL,
    `user_ip` VARBINARY(16) NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    KEY `idx_prompt_views_prompt_id_created` (`prompt_id`, `created_at`),
    KEY `idx_prompt_views_created_at` (`created_at`),
    CONSTRAINT `fk_prompt_views_prompt_id` FOREIGN KEY (`prompt_id`) REFERENCES `prompts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `media` (
   `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `file_name` VARCHAR(255) NOT NULL COMMENT 'Original file name',
    `file_path` VARCHAR(500) NOT NULL COMMENT 'Path relative to storage root',
    `file_url` VARCHAR(500) NOT NULL COMMENT 'Full public URL',
    `mime_type` VARCHAR(100) NOT NULL COMMENT 'e.g., image/jpeg, video/mp4',
    `file_size` INT UNSIGNED NULL COMMENT 'Size in bytes',
    `metadata` JSON NULL COMMENT 'Exif data, image dimensions, video duration, etc.',
    `resource_type` VARCHAR(50) NOT NULL COMMENT 'Top-level type: image, video, audio, document',
    `resource_id` INT UNSIGNED NOT NULL COMMENT 'The ID of the related resource (prompt, user, etc.)',
    `resource_entity` VARCHAR(50) NOT NULL COMMENT 'The name of the related table (prompts, users, ai_model_guides)',
    `sort_order` SMALLINT UNSIGNED NOT NULL DEFAULT 0,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
		-- **************************** Table Keys ****************************
    PRIMARY KEY (`id`),
    KEY `idx_media_resource` (`resource_entity`, `resource_id`),
    KEY `idx_media_resource_type` (`resource_type`)
) ENGINE=InnoDB COMMENT='Polymorphic table for storing all media attachments';

CREATE TABLE IF NOT EXISTS `automations` (
   `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `description` TEXT NULL,
    `version` VARCHAR(50) NULL,
    `is_active` TINYINT(1) NOT NULL DEFAULT 1,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
		-- **************************** Table Keys ****************************
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `automation_templates` (
   `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(255) NOT NULL,
    `description` TEXT NULL,
    `automation_id` INT UNSIGNED NOT NULL,
    `category_id` INT UNSIGNED NOT NULL,
    `user_id` INT UNSIGNED NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
		-- **************************** Table Keys ****************************
    PRIMARY KEY (`id`),
    KEY `idx_automation_templates_automation_id` (`automation_id`),
    KEY `idx_automation_templates_category_id` (`category_id`),
    KEY `idx_automation_templates_user_id` (`user_id`),
    CONSTRAINT `fk_automation_templates_automation_id` FOREIGN KEY (`automation_id`) REFERENCES `automations` (`id`) ON UPDATE CASCADE,
    CONSTRAINT `fk_automation_templates_category_id` FOREIGN KEY (`category_id`) REFERENCES `prompt_categories` (`id`) ON UPDATE CASCADE
    -- CONSTRAINT `fk_automation_templates_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `submission_categories` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL COMMENT 'Human-readable name (e.g., Marketing)',
    `slug` VARCHAR(255) NOT NULL COMMENT 'URL-friendly identifier (e.g., marketing)',
    `description` TEXT NULL COMMENT 'Short description of the category',
    `parent_id` INT UNSIGNED DEFAULT NULL COMMENT 'References the parent category for nesting. NULL for top-level categories.',
    `is_active` TINYINT(1) NOT NULL DEFAULT 1,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    -- **************************** Table Keys ****************************
    PRIMARY KEY (`id`),
    UNIQUE KEY `uniq_submission_categories_slug` (`slug`),
    UNIQUE KEY `uniq_submission_categories_name` (`name`),
    KEY `idx_submission_categories_is_active` (`is_active`),
    KEY `idx_submission_categories_parent_id` (`parent_id`),
    CONSTRAINT `fk_submission_categories_parent_id` FOREIGN KEY (`parent_id`) REFERENCES `submission_categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB COMMENT='Table for hierarchical categorization of submissions.';

CREATE TABLE IF NOT EXISTS `submissions` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `user_id` INT UNSIGNED NOT NULL COMMENT 'The author of the submission',
		`category_id` INT UNSIGNED NOT NULL,
    `submissible_type` VARCHAR(100) NOT NULL COMMENT 'The related model name (e.g., prompts, automations)',
    `submissible_id` INT UNSIGNED NOT NULL COMMENT 'The ID of the related record in its table',
    `title` VARCHAR(255) NOT NULL,
    `description` TEXT NULL,
    `is_public` TINYINT(1) NOT NULL DEFAULT 0 COMMENT 'Visibility control',
    `is_active` TINYINT(1) NOT NULL DEFAULT 1 COMMENT 'Soft delete flag',
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    -- **************************** Table Keys ****************************
    PRIMARY KEY (`id`),
    UNIQUE KEY `uniq_submissions_submissible` (`submissible_type`, `submissible_id`),
    KEY `idx_submissions_submissible` (`submissible_type`, `submissible_id`),
		KEY `idx_submissions_category_id` (`category_id`),
    KEY `idx_submissions_user_id` (`user_id`),
    KEY `idx_submissions_is_public_active` (`is_public`, `is_active`),
    CONSTRAINT `fk_submissions_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB COMMENT='Central table for all user submissions. Uses a polymorphic relationship.';
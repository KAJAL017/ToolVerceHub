-- ============================================
-- HERO BUTTONS DYNAMIC MODULE
-- ============================================
-- Simple & Clean SQL for Hostinger/cPanel
-- Emoji icons table se select karoge admin panel mein
-- ============================================

-- Create table
CREATE TABLE IF NOT EXISTS `hero_buttons` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `icon` varchar(10) NOT NULL,
  `text` varchar(100) NOT NULL,
  `url` varchar(500) NOT NULL,
  `color` varchar(20) NOT NULL DEFAULT 'green',
  `display_order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert 3 default buttons (emoji icons table se select karoge)
INSERT INTO `hero_buttons` (`id`, `icon`, `text`, `url`, `color`, `display_order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, '🖼️', 'Image Tools', 'https://imgconvertpro.site/', 'green', 1, 1, NOW(), NOW()),
(2, '📄', 'PDF Tools', 'https://demo.smartpdfs.in/', 'orange', 2, 1, NOW(), NOW()),
(3, '🎮', 'Play Games', 'https://zapgames.fun/', 'blue', 3, 1, NOW(), NOW());

-- Set auto increment
ALTER TABLE `hero_buttons` AUTO_INCREMENT = 4;

-- Clean old settings (optional)
DELETE FROM `settings` WHERE `key` LIKE 'hero_button%';

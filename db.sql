CREATE TABLE `project` (
                           `id` bigint unsigned NOT NULL AUTO_INCREMENT,
                           `created_at` datetime(3) DEFAULT NULL,
                           `updated_at` datetime(3) DEFAULT NULL,
                           `deleted_at` datetime(3) DEFAULT NULL,
                           `name` varchar(10) DEFAULT NULL,
                           `description` varchar(50) DEFAULT NULL,
                           `create_user` varchar(10) NOT NULL,
                           PRIMARY KEY (`id`),
                           UNIQUE KEY `name` (`name`),
                           KEY `idx_groups_deleted_at` (`deleted_at`),
                           KEY `idx_groups_name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

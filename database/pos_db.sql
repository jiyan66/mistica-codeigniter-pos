-- phpMyAdmin-compatible SQL dump
-- CodeIgniter POS Database
-- Database: pos_db
-- Compatible with local MySQL/MariaDB and Aiven MySQL

SET NAMES utf8mb4;

-- --------------------------------------------------------
-- Remove existing tables
-- --------------------------------------------------------

DROP TABLE IF EXISTS `users`;
DROP TABLE IF EXISTS `customers`;

-- --------------------------------------------------------
-- Table structure for table: customers
-- --------------------------------------------------------

CREATE TABLE `customers` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `full_name` VARCHAR(100) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `phone` VARCHAR(20) DEFAULT NULL,
    `created_at` DATETIME NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB
  DEFAULT CHARSET=utf8mb4
  COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
-- Table structure for table: users
-- --------------------------------------------------------

CREATE TABLE `users` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(50) NOT NULL,
    `full_name` VARCHAR(100) NOT NULL,
    `role` VARCHAR(50) NOT NULL,
    `created_at` DATETIME NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB
  DEFAULT CHARSET=utf8mb4
  COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
-- Sample records for table: customers
-- --------------------------------------------------------

INSERT INTO `customers`
    (`id`, `full_name`, `email`, `phone`, `created_at`)
VALUES
    (1, 'Juan Dela Cruz Sr.', 'juan@gmail.com', '09123456781', '2026-09-16 20:34:08'),
    (2, 'Mria Santos', 'maria@gmail.com', '09123456782', '2026-09-16 20:34:08'),
    (3, 'Pedro Reyes', 'pedr@gmail.com', '09123456783', '2026-09-16 20:34:08'),
    (4, 'Ana Garcia', 'ana@gmail.com', '09123456784', '2026-09-16 20:34:08'),
    (5, 'Carlo Mendoza', 'carlo@gmail.com', '09123456785', '2026-09-16 20:34:08');

-- --------------------------------------------------------
-- Sample records for table: users
-- --------------------------------------------------------

INSERT INTO `users`
    (`id`, `username`, `full_name`, `role`, `created_at`)
VALUES
    (1, 'admin01', 'John Dimagiba', 'Administrator', '2026-09-16 20:36:17'),
    (2, 'cashier01', 'Maria CalcuGods', 'Cashier', '2026-09-16 20:36:17'),
    (3, 'cashier02', 'Paolo MalupitMagMath', 'Cashier', '2026-09-16 20:36:17'),
    (4, 'manager01', 'Anna Masungit', 'Manager', '2026-09-16 20:36:17'),
    (5, 'staff01', 'Carlo Masipag', 'Staff', '2026-09-16 20:36:17');

-- --------------------------------------------------------
-- Set the next automatically generated IDs
-- --------------------------------------------------------

ALTER TABLE `customers` AUTO_INCREMENT = 6;
ALTER TABLE `users` AUTO_INCREMENT = 6;

-- --------------------------------------------------------
-- End of database export
-- --------------------------------------------------------
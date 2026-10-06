-- CodeIgniter POS database export for TFA4
-- Compatible with local MySQL/MariaDB and hosted services requiring primary keys

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `users`;
DROP TABLE IF EXISTS `customers`;

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

CREATE TABLE `users` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(50) NOT NULL,
    `full_name` VARCHAR(100) NOT NULL,
    `role` VARCHAR(50) NOT NULL,
    `avatar` VARCHAR(255) DEFAULT NULL,
    `password` VARCHAR(255) NOT NULL,
    `created_at` DATETIME NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB
  DEFAULT CHARSET=utf8mb4
  COLLATE=utf8mb4_general_ci;

INSERT INTO `customers`
    (`id`, `full_name`, `email`, `phone`, `created_at`)
VALUES
    (1, 'Juan Dela Cruz', 'juan@gmail.com', '09123456781', '2026-09-16 20:34:08'),
    (2, 'Mria Santos', 'maria@gmail.com', '09123456782', '2026-09-16 20:34:08'),
    (3, 'Pedro Reyes', 'pedr@gmail.com', '09123456783', '2026-09-16 20:34:08'),
    (4, 'Ana Garcia', 'ana@gmail.com', '09123456784', '2026-09-16 20:34:08'),
    (5, 'Carlo Mendoza', 'carlo@gmail.com', '09123456785', '2026-09-16 20:34:08'),
    (11, 'gianus misticus', 'yeji@gmail.com', '0967676767', '2026-09-27 13:17:52');

INSERT INTO `users`
    (`id`, `username`, `full_name`, `role`, `avatar`, `password`, `created_at`)
VALUES
    (1, 'admin01', 'John Dimagiba', 'Administrator', NULL, '$2y$12$Je3tMJKymxIkHH3SF2TF2eysvo6UhAuoP3HSIMhV4P3/CBakgX802', '2026-09-16 20:36:17'),
    (2, 'cashier01', 'Maria CalcuGods', 'Cashier', NULL, '$2y$12$WniqTmRySYmcAHzQWjmxz.35Dd25bBhqMkWUTKEb5E/sZEYgHiAYu', '2026-09-16 20:36:17'),
    (3, 'cashier02', 'Paolo MalupitMagMath', 'Cashier', NULL, '$2y$12$uaAjQeHZCT34juxJdn8JyOYComnqwYPaywXOptN57XSQSjhXj5AOu', '2026-09-16 20:36:17'),
    (4, 'manager01', 'Anna Masungit', 'Manager', NULL, '$2y$12$d59lBwaYNcMz.uJYchRfqO1D05fIUTsAqwNVZ62N4c0NDE.Jesi7S', '2026-09-16 20:36:17'),
    (5, 'staff01', 'Carlo Masipag', 'Staff', NULL, '$2y$12$KgSuEv7W73Yl290t1yIUqO.NVe6n6D2/tpTy97gzbMl2HC9RnpNIO', '2026-09-16 20:36:17'),
    (6, 'admin02', 'testing testes', 'Administrator', NULL, '$2y$12$OnG67HcAZb/T9tRZ6zguLOtkGW4bdI5CJnNRYwieCNsFVbBiXc7rS', '2026-09-27 13:49:57'),
    (7, 'admin03', 'tesing testestes', 'Administrator', NULL, '$2y$12$R1XbsXo842HeuZQaJlTV9uJZaFM4dKu03dc88DQmLm7GLVFhF1Vxa', '2026-09-27 13:51:28');

ALTER TABLE `customers` AUTO_INCREMENT = 12;
ALTER TABLE `users` AUTO_INCREMENT = 8;

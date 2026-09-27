-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2026 at 04:30 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `full_name`, `email`, `phone`, `created_at`) VALUES
(1, 'Juan Dela Cruz', 'juan@gmail.com', '09123456781', '2026-09-16 20:34:08'),
(2, 'Mria Santos', 'maria@gmail.com', '09123456782', '2026-09-16 20:34:08'),
(3, 'Pedro Reyes', 'pedr@gmail.com', '09123456783', '2026-09-16 20:34:08'),
(4, 'Ana Garcia', 'ana@gmail.com', '09123456784', '2026-09-16 20:34:08'),
(5, 'Carlo Mendoza', 'carlo@gmail.com', '09123456785', '2026-09-16 20:34:08'),
(11, 'gianus misticus', 'yeji@gmail.com', '0967676767', '2026-09-27 13:17:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `role` varchar(50) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `full_name`, `role`, `avatar`, `created_at`) VALUES
(1, 'admin01', 'John Dimagiba', 'Administrator', '1790518202_4ce756cb643227eac80e.jpg', '2026-09-16 20:36:17'),
(2, 'cashier01', 'Maria CalcuGods', 'Cashier', NULL, '2026-09-16 20:36:17'),
(3, 'cashier02', 'Paolo MalupitMagMath', 'Cashier', NULL, '2026-09-16 20:36:17'),
(4, 'manager01', 'Anna Masungit', 'Manager', NULL, '2026-09-16 20:36:17'),
(5, 'staff01', 'Carlo Masipag', 'Staff', NULL, '2026-09-16 20:36:17'),
(6, 'admin02', 'testing testes', 'Administrator', NULL, '2026-09-27 13:49:57'),
(7, 'admin03', 'tesing testestes', 'Administrator', NULL, '2026-09-27 13:51:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 26, 2025 at 04:24 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_todolist`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_category` int NOT NULL,
  `category` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `category`) VALUES
(1, 'work'),
(2, 'personal'),
(3, 'other');

-- --------------------------------------------------------

--
-- Table structure for table `todo`
--

CREATE TABLE `todo` (
  `id_todo` int NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('pending','done') DEFAULT NULL,
  `id_category` int DEFAULT NULL,
  `id_user` int DEFAULT NULL,
  `bookmark` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `todo`
--

INSERT INTO `todo` (`id_todo`, `title`, `description`, `created_at`, `updated_at`, `status`, `id_category`, `id_user`, `bookmark`) VALUES
(9, 'ajssand', 'sjdhxnsd', '2025-02-18 07:01:14', '2025-02-18 07:01:14', 'pending', 2, 2, 0),
(11, 'PUASAAAAAA', 'tinggal 2 hari yey!', '2025-02-18 07:02:43', '2025-03-04 09:26:00', 'pending', 2, 2, 0),
(12, 'belajar CRUD!!', 'hadeh', '2025-02-18 07:03:03', '2025-03-18 06:24:32', 'pending', 1, 2, 1),
(13, 'a,n dsndgxuhH AJSHJAN masdh,wq LXNAMW?!?!?!?!?!', 'KJ mhwsawhs SUJN S aksdhkasmn akjjslqm oqei34 asjhdsjkfhrrq ', '2025-02-18 07:03:45', '2025-03-18 05:58:29', 'pending', 3, 2, 1),
(14, 'coba 1', 'coba', '2025-02-18 07:04:19', '2025-03-18 06:24:40', 'done', 1, 2, 1),
(17, 'aaaaaaAAAAAAAA', 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA\r\naaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2025-02-18 07:06:19', '2025-02-18 07:06:19', 'pending', 1, 2, 0),
(19, 'bbbbbbbbbbbbbbbbbbbbbbbbbbbb', 'bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb', '2025-02-18 07:10:33', '2025-02-18 07:10:33', 'done', 2, 2, 0),
(20, 'aasad', 'as', '2025-02-18 07:12:14', '2025-03-18 05:59:28', 'done', 3, 2, 0),
(22, '?!?!?!?!?!?!', 'hmzzz', '2025-03-05 14:41:27', '2025-03-05 14:41:27', 'pending', 2, 2, 0),
(23, 'aaa', 'aaa', '2025-03-17 12:17:03', '2025-03-17 12:17:03', 'pending', 2, 4, 0),
(24, 'Halloooow!', 'jangan lupa buat bahagia ya!', '2025-03-18 14:08:42', '2025-03-20 09:32:04', 'done', 2, 7, 0),
(25, 'bikin porto laravellllllllllllllllllll', 'bincang_ terlupakan well🤙', '2025-03-18 14:15:09', '2025-03-20 09:25:47', 'pending', 1, 7, 1),
(26, 'tidurrrrrrrrr', 'zzzzzzzz', '2025-03-18 14:16:39', '2025-03-20 09:31:59', 'done', 2, 7, 1),
(27, ':D', '', '2025-03-18 14:19:59', '2025-03-18 14:19:59', 'pending', 3, 7, 0),
(28, ':((((((((((((((((', '', '2025-03-18 14:20:40', '2025-03-18 14:20:40', 'pending', 3, 7, 0),
(29, 'Malam', '✅ Makan malam dengan menu sehat\r\n✅ Evaluasi pekerjaan hari ini\r\n✅ Rencanakan agenda untuk besok\r\n✅ Luangkan waktu untuk hobi (game, musik, atau menulis)\r\n✅ Tidur sebelum pukul 23.00', '2025-03-21 02:57:04', '2025-03-20 19:57:22', 'pending', 2, 7, 0),
(30, 'PUASAAAAAAAAAAAA', '7 + 2\r\nT_______T', '2025-03-25 16:11:05', '2025-03-25 09:11:25', 'pending', 2, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `birth_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `name`, `email`, `birth_date`) VALUES
(2, 'syafira', '$2y$10$aSknTEoU3T9ntljBLzIQGeV3eXDu4ROWb7/Aj.i1X5q2MB.hiO7sW', 'syafira', 'syafira@mail', '2025-01-26'),
(3, 'nur', '$2y$10$HCg46E30x1XQTAsuePKqR.CzXJB.wtT5LoFWhqeuCLb7LgL0PQ/H2', 'nur', 'nur@mail.com', '2025-02-10'),
(4, 'azizah', '$2y$10$elKx8YJbBLmP9VFyzfMbHOm.H9KmnbgttmO3nLuJBqEJ8DKqS/P8a', 'azizah', 'azizah@mail.com', '2025-01-30'),
(5, 'farrel', '$2y$10$MymruFQCnPaeTtH13yo/AuD1nEVuq6leEPl7bZr1h9hyT35rFcoxq', 'farrel', 'farrel@mail.com', '2025-02-05'),
(6, 'nafis', '$2y$10$vVjXzXAAPFGjs6/44Y8u0OmGfI5FNGqq8m0bgfiuLEWV4KAQpR//i', 'nafis', 'nafis@mail.com', '2025-02-11'),
(7, 'syafirr', '$2y$10$/rNphet80ODL6V6cxey6J.b.Aa13QA36NQLzRffRcCD52AExX0z76', 'Syafira Nur Azizah', 'sya@gmail.com', '2007-10-17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`),
  ADD UNIQUE KEY `id_category` (`id_category`);

--
-- Indexes for table `todo`
--
ALTER TABLE `todo`
  ADD PRIMARY KEY (`id_todo`),
  ADD UNIQUE KEY `id_todo` (`id_todo`),
  ADD KEY `id_category` (`id_category`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `id_user` (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `todo`
--
ALTER TABLE `todo`
  MODIFY `id_todo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `todo`
--
ALTER TABLE `todo`
  ADD CONSTRAINT `todo_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`),
  ADD CONSTRAINT `todo_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2023 at 07:26 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `freelancerbijoy_matrimony`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `application` text NOT NULL,
  `application_status` int(11) NOT NULL DEFAULT 0,
  `application_rejected_info` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `approval` int(11) NOT NULL,
  `rejected_reason` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `fullname` text NOT NULL,
  `gender` text NOT NULL,
  `address` text NOT NULL,
  `looking_for` text NOT NULL,
  `age` text NOT NULL,
  `height` text NOT NULL,
  `education` text NOT NULL,
  `occupation` text NOT NULL,
  `income` text NOT NULL,
  `caste` text NOT NULL,
  `sub_caste` text NOT NULL,
  `moon_sing` text NOT NULL,
  `tribe` text NOT NULL,
  `password` text NOT NULL,
  `role` text NOT NULL DEFAULT 'cliant',
  `reset_token` text DEFAULT NULL,
  `reset_token_expiry` text DEFAULT NULL,
  `verification_token` text NOT NULL,
  `profile_photo` text NOT NULL,
  `verified` int(11) NOT NULL DEFAULT 0,
  `signup_time` text NOT NULL,
  `about` text NOT NULL,
  `paid` text NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `phone`, `fullname`, `gender`, `address`, `looking_for`, `age`, `height`, `education`, `occupation`, `income`, `caste`, `sub_caste`, `moon_sing`, `tribe`, `password`, `role`, `reset_token`, `reset_token_expiry`, `verification_token`, `profile_photo`, `verified`, `signup_time`, `about`, `paid`) VALUES
(1, 'infobijoychandradas@gmail.com', '01634846245', 'BIJOY CHANDRA DAS', '1', 'Chor sunarampur, Ashuganj, Brahmanbaria, Chottogram - 3402', '0', '24', '5.8\"', '14', 'Freelancer', '40000$', 'Das', 'Programaer', ' Brisho', 'Alimano Gotro', '$2y$10$TmWCy7woHtxQKRR0LWbZ7OYX3Ul0Hm3uyiHSReSNjW7ZidU9kyBjy', 'cliant', NULL, NULL, '', 'src/img/Screenshot (52).png', 1, '27-11-2023 11:33:07pm', 'about', '1'),
(2, 'das@gmail.com', '245', 'BIJOY CHANDRA DAS', '0', 'Chor sunarampur, Ashuganj, Brahmanbaria, Chottogram - 3402', '0', '24', '5.8\"', '14', 'Freelancer', '40000$', 'Das', 'Programaer', ' Brisho', 'Alimano Gotro', '$2y$10$YRvSo0OVGpQwp28ceL8BveINZVvjn1tVDiWDZj9iPSeldJ215dlM2', 'cliant', NULL, NULL, '', 'src/img/Screenshot (52).png', 1, '28-11-2023 12:19:15am', 'about', '1'),
(3, 'das@gmail.com', '245', 'BIJOY CHANDRA DAS', '1', 'Chor sunarampur, Ashuganj, Brahmanbaria, Chottogram - 3402', '1', '24', '5.8\"', '14', 'Freelancer', '40000$', 'Das', 'Programaer', ' Brisho', 'Alimano Gotro', '$2y$10$YRvSo0OVGpQwp28ceL8BveINZVvjn1tVDiWDZj9iPSeldJ215dlM2', 'cliant', NULL, NULL, '', 'src/img/Screenshot (52).png', 1, '28-11-2023 12:19:15am', 'about', '1'),
(4, 'infobijoychandradas@gmail.com', '01634846245', 'BIJOY CHANDRA DAS', '0', 'Chor sunarampur, Ashuganj, Brahmanbaria, Chottogram - 3402', '0', '24', '5.8\"', '14', 'Freelancer', '40000$', 'Das', 'Programaer', ' Brisho', 'Alimano Gotro', '$2y$10$TmWCy7woHtxQKRR0LWbZ7OYX3Ul0Hm3uyiHSReSNjW7ZidU9kyBjy', 'cliant', NULL, NULL, '', 'src/img/1.png', 1, '27-11-2023 11:33:07pm', 'about', '1'),
(5, 'infobijoychandradas@gmail.com', '01634846245', 'BIJOY CHANDRA DAS', '1', 'Chor sunarampur, Ashuganj, Brahmanbaria, Chottogram - 3402', '0', '24', '5.8\"', '14', 'Freelancer', '40000$', 'Das', 'Programaer', ' Brisho', 'Alimano Gotro', '$2y$10$TmWCy7woHtxQKRR0LWbZ7OYX3Ul0Hm3uyiHSReSNjW7ZidU9kyBjy', 'cliant', NULL, NULL, '', 'src/img/Screenshot (52).png', 1, '27-11-2023 11:33:07pm', 'about', '1'),
(6, 'infobijoychandradas@gmail.com', '01634846245', 'BIJOY CHANDRA DAS', '1', 'Chor sunarampur, Ashuganj, Brahmanbaria, Chottogram - 3402', '0', '24', '5.8\"', '14', 'Freelancer', '40000$', 'Das', 'Programaer', ' Brisho', 'Alimano Gotro', '$2y$10$TmWCy7woHtxQKRR0LWbZ7OYX3Ul0Hm3uyiHSReSNjW7ZidU9kyBjy', 'cliant', NULL, NULL, '', 'src/img/Screenshot (52).png', 1, '27-11-2023 11:33:07pm', 'about', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

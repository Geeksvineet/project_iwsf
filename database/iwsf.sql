-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2024 at 01:11 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iwsf`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'vineet', 'vineet@gmail.com', '123', '2024-08-20 11:08:31', '2024-08-20 11:08:31');

-- --------------------------------------------------------

--
-- Table structure for table `category_causes`
--

CREATE TABLE `category_causes` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_causes`
--

INSERT INTO `category_causes` (`id`, `name`, `description`) VALUES
(1, 'Health Causes', 'Causes related to health improvement.'),
(2, 'Education Causes', 'Causes that promote education.'),
(3, 'Environmental Causes', 'Causes aimed at environmental protection.'),
(4, 'Women Empowerment Causes', 'Causes that empower women.'),
(5, 'Child Welfare Causes', 'Causes for child safety and welfare.'),
(6, 'Poverty Causes', 'Causes to reduce poverty.'),
(7, 'Disaster Relief Causes', 'Causes for disaster management.'),
(8, 'Animal Welfare Causes', 'Causes for the protection of animals.'),
(9, 'Community Causes', 'Causes that strengthen community bonds.'),
(10, 'Human Rights Causes', 'Causes that protect human rights.');

-- --------------------------------------------------------

--
-- Table structure for table `category_events`
--

CREATE TABLE `category_events` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_events`
--

INSERT INTO `category_events` (`id`, `name`, `description`) VALUES
(1, 'Health Campaigns', 'Events focused on health and wellness.'),
(2, 'Educational Seminars', 'Seminars aimed at educational growth.'),
(3, 'Environmental Drives', 'Events to protect the environment.'),
(4, 'Women Empowerment Programs', 'Programs empowering women.'),
(5, 'Child Welfare Programs', 'Events dedicated to child welfare.'),
(6, 'Poverty Alleviation Drives', 'Events to reduce poverty.'),
(7, 'Disaster Relief Operations', 'Operations during disasters.'),
(8, 'Animal Rescue Missions', 'Events related to animal rescue.'),
(9, 'Community Building Activities', 'Activities for community development.'),
(10, 'Human Rights Campaigns', 'Campaigns advocating human rights.');

-- --------------------------------------------------------

--
-- Table structure for table `category_posts`
--

CREATE TABLE `category_posts` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_posts`
--

INSERT INTO `category_posts` (`id`, `name`, `description`) VALUES
(1, 'Health', 'Posts related to health and wellness.'),
(2, 'Education', 'Posts related to educational initiatives.'),
(3, 'Environment', 'Posts focusing on environmental issues.'),
(4, 'Women Empowerment', 'Posts about empowering women.'),
(5, 'Child Welfare', 'Posts dedicated to child welfare.'),
(6, 'Poverty Alleviation', 'Posts on reducing poverty.'),
(7, 'Disaster Relief', 'Posts about disaster relief efforts.'),
(8, 'Animal Welfare', 'Posts related to animal welfare.'),
(9, 'Community Development', 'Posts on community development projects.'),
(10, 'Human Rights', 'Posts about human rights issues.');

-- --------------------------------------------------------

--
-- Table structure for table `causes`
--

CREATE TABLE `causes` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `img_path` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  `date_published` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `category_causes_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `causes`
--

INSERT INTO `causes` (`id`, `title`, `description`, `img_path`, `status`, `date_published`, `date_updated`, `category_causes_id`) VALUES
(1, 'Public Health Initiative', 'An initiative to improve public health.', 'images/1.jpg', 1, '2024-08-01 15:43:10', '2024-08-22 15:43:10', 1),
(2, 'Support Education for All', 'Promoting education for underprivileged children.', 'images/2.jpg', 1, '2024-08-02 15:43:10', '2024-08-22 15:43:10', 2),
(3, 'Protect Our Environment', 'Efforts to protect the environment.', 'images/3.jpg', 1, '2024-08-03 15:43:10', '2024-08-22 15:43:10', 3),
(4, 'Empowering Women Together', 'Programs that empower women.', 'images/4.jpg', 1, '2024-08-04 15:43:10', '2024-08-22 15:43:10', 1),
(5, 'Child Safety First', 'Causes that ensure child safety.', 'images/5.jpg', 1, '2024-08-05 15:43:10', '2024-08-22 15:43:10', 5),
(6, 'End Poverty Now', 'Efforts to reduce poverty in society.', 'images/6.jpg', 0, '2024-08-06 15:43:10', '2024-08-22 15:43:10', 6),
(7, 'Disaster Relief Fund', 'Raising funds for disaster relief.', 'images/7.jpg', 1, '2024-08-07 15:43:10', '2024-08-22 15:43:10', 7),
(8, 'Animal Rescue Operation', 'Rescuing and protecting animals.', 'images/8.jpg', 1, '2024-08-08 15:43:10', '2024-08-22 15:43:10', 8),
(9, 'Community Building Projects', 'Projects aimed at building strong communities.', 'images/9.jpg', 1, '2024-08-11 15:43:10', '2024-08-22 15:43:10', 1),
(10, 'Human Rights Advocacy', 'Advocating for human rights.', 'images/10.jpg', 0, '2024-08-22 15:43:10', '2024-08-22 15:43:10', 10);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `posts_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `message`, `date_created`, `posts_id`) VALUES
(1, 'John Doe', 'john@example.com', 'Great initiative on public health!', '2024-08-22 15:37:38', 1),
(2, 'Jane Smith', 'jane@example.com', 'Education is key to success.', '2024-08-22 15:37:38', 2),
(3, 'Alice Johnson', 'alice@example.com', 'Saving the environment should be a top priority.', '2024-08-22 15:37:38', 3),
(4, 'Bob Brown', 'bob@example.com', 'Empowering women is essential for progress.', '2024-08-22 15:37:38', 4),
(5, 'Charlie Davis', 'charlie@example.com', 'Child safety should always come first.', '2024-08-22 15:37:38', 5),
(6, 'Diana Evans', 'diana@example.com', 'Effective strategies to reduce poverty are crucial.', '2024-08-22 15:37:38', 1),
(7, 'Evan White', 'evan@example.com', 'Disaster management can save lives.', '2024-08-22 15:37:38', 7),
(8, 'Grace Lee', 'grace@example.com', 'Animal rescue efforts need more attention.', '2024-08-22 15:37:38', 1),
(9, 'Henry Taylor', 'henry@example.com', 'Community development strengthens society.', '2024-08-22 15:37:38', 9),
(10, 'Ivy Brown', 'ivy@example.com', 'Human rights must be protected at all costs.', '2024-08-22 15:37:38', 10);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date_created` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `message`, `date_created`) VALUES
(1, 'test', 'test@gmail.com', 'testing\r\n', '2024-08-23 15:26:38');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `img_path` varchar(255) DEFAULT NULL,
  `date_of_event_organize` date DEFAULT NULL,
  `events_time_duration` varchar(50) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  `date_published` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `category_events_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `img_path`, `date_of_event_organize`, `events_time_duration`, `location`, `status`, `date_published`, `date_updated`, `category_events_id`) VALUES
(1, 'Health Awareness Camp', 'A camp to promote health awareness.', 'images/1.jpg', '2024-09-15', '10:00 AM - 04:00 PM', 'Indore City Park', 1, '2024-08-22 15:41:02', '2024-08-22 15:41:02', 1),
(2, 'Education for Everyone Seminar', 'A seminar to discuss educational opportunities.', 'images/2.jpg', '2024-10-10', '09:00 AM - 01:00 PM', 'Indore Central Library', 1, '2024-08-22 15:41:02', '2024-08-22 15:41:02', 1),
(3, 'Clean Green Campaign', 'An event to clean the city and plant trees.', 'images/3.jpg', '2024-09-20', '08:00 AM - 12:00 PM', 'Indore Main Square', 1, '2024-08-22 15:41:02', '2024-08-22 15:41:02', 3),
(4, 'Empower Women Conference', 'A conference to empower women in society.', 'images/4.jpg', '2024-11-05', '11:00 AM - 03:00 PM', 'Indore Women Center', 1, '2024-08-22 15:41:02', '2024-08-22 15:41:02', 4),
(5, 'Child Welfare Workshop', 'A workshop on child safety and welfare.', 'images/5.jpg', '2024-08-25', '10:00 AM - 02:00 PM', 'Indore Children Hospital', 1, '2024-08-22 15:41:02', '2024-08-22 15:41:02', 5),
(6, 'Poverty Alleviation Drive', 'A drive to help the underprivileged.', 'images/6.jpg', '2024-12-12', '09:00 AM - 05:00 PM', 'Indore Old City', 1, '2024-08-22 15:41:02', '2024-08-22 15:41:02', 6),
(7, 'Disaster Relief Training', 'Training for disaster relief operations.', 'images/7.jpg', '2024-09-28', '10:00 AM - 03:00 PM', 'Indore Civic Center', 1, '2024-08-22 15:41:02', '2024-08-22 15:41:02', 7),
(8, 'Animal Rescue Mission', 'An event to rescue stray animals.', 'images/8.jpg', '2024-10-15', '08:00 AM - 12:00 PM', 'Indore Animal Shelter', 1, '2024-08-22 15:41:02', '2024-08-22 15:41:02', 8),
(9, 'Community Building Meet', 'A meet to discuss community development.', 'images/9.jpg', '2024-05-20', '10:00 AM - 01:00 PM', 'Indore Community Hall', 1, '2024-08-22 15:41:02', '2024-08-22 15:41:02', 9),
(10, 'Human Rights March', 'A march advocating human rights.', 'images/10.jpg', '2024-06-10', '09:00 AM - 12:00 PM', 'Indore Freedom Park', 1, '2024-08-22 15:41:02', '2024-08-22 15:41:02', 10);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `img_path` varchar(255) DEFAULT NULL,
  `category_posts_id` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  `date_published` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `img_path`, `category_posts_id`, `status`, `date_published`, `date_updated`) VALUES
(1, 'Improving Public Health', 'An in-depth look at public health initiatives.', 'images/1.jpg', 1, 1, '2024-08-01 15:36:36', '2024-08-22 15:36:36'),
(2, 'Education for All', 'Steps towards universal education.', 'images/2.jpg', 2, 1, '2024-08-02 15:36:36', '2024-08-22 15:36:36'),
(3, 'Saving the Environment', 'Actions to protect the environment.', 'images/3.jpg', 3, 1, '2024-08-03 15:36:36', '2024-08-22 15:36:36'),
(4, 'Empowering Women', 'Programs aimed at empowering women.', 'images/4.jpg', 4, 1, '2024-08-04 15:36:36', '2024-08-22 15:36:36'),
(5, 'Child Safety', 'Ensuring the safety of children.', 'images/5.jpg', 5, 1, '2024-08-05 15:36:36', '2024-08-22 15:36:36'),
(6, 'Poverty Reduction Strategies', 'Effective poverty alleviation strategies.', 'images/6.jpg', 6, 1, '2024-08-06 15:36:36', '2024-08-22 15:36:36'),
(7, 'Disaster Management', 'Relief efforts during natural disasters.', 'images/7.jpg', 7, 1, '2024-08-08 15:36:36', '2024-08-22 15:36:36'),
(8, 'Animal Rescue Efforts', 'Efforts to rescue and protect animals.', 'images/8.jpg', 8, 1, '2024-08-09 15:36:36', '2024-08-22 15:36:36'),
(9, 'Building Stronger Communities', 'Community development projects heaven.', 'images/9.jpg', 1, 1, '2024-08-11 15:36:36', '2024-08-22 15:36:36'),
(10, 'Fighting for Human Rights', 'Campaigns for human rights.', 'images/10.jpg', 10, 1, '2024-08-12 15:36:36', '2024-08-22 15:36:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `category_causes`
--
ALTER TABLE `category_causes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_events`
--
ALTER TABLE `category_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_posts`
--
ALTER TABLE `category_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `causes`
--
ALTER TABLE `causes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_causes_id` (`category_causes_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_id` (`posts_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_events_id` (`category_events_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_posts_id` (`category_posts_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category_causes`
--
ALTER TABLE `category_causes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `category_events`
--
ALTER TABLE `category_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `category_posts`
--
ALTER TABLE `category_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `causes`
--
ALTER TABLE `causes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `causes`
--
ALTER TABLE `causes`
  ADD CONSTRAINT `causes_ibfk_1` FOREIGN KEY (`category_causes_id`) REFERENCES `category_causes` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`posts_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`category_events_id`) REFERENCES `category_events` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`category_posts_id`) REFERENCES `category_posts` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 04, 2026 at 04:58 PM
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
-- Database: `campus_clubs`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Technology'),
(2, 'Arts & Creativity'),
(3, 'Service & Community'),
(4, 'Games & Recreation'),
(5, 'Science & Nature');

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

CREATE TABLE `clubs` (
  `club_id` int(11) NOT NULL,
  `club_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `meeting_time` varchar(100) NOT NULL,
  `meeting_location` varchar(100) NOT NULL,
  `contact_email` varchar(150) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`club_id`, `club_name`, `description`, `meeting_time`, `meeting_location`, `contact_email`, `category_id`) VALUES
(1, 'Code Collective', 'Build small apps, trade debugging tips, and tackle coding challenges with\r\nother students. All experience levels are welcome.', 'Tuesdays at 3:00 PM', 'Technology Center, Room 201', 'codecollective@example.com', 1),
(2, 'Makers & Motors', 'Experiment with robotics, electronics, and 3D printing. Bring your curiosity\r\nand work with a team to turn ideas into working projects.', 'Thursdays at 4:00 PM', 'Innovation Lab, Room 105', 'makers@example.com', 1),
(3, 'Shutter Squad', 'Explore photography through campus photo walks and creative challenges. A\r\nphone camera is all you need to get started.', 'Wednesdays at 2:00 PM', 'Arts Building, Room 112', 'shuttersquad@example.com', 2),
(4, 'The Writer\'s Room', 'Share stories, poetry, and creative ideas in a welcoming workshop. Try\r\nwriting prompts and offer constructive feedback on each other\'s work.', 'Mondays at 3:30 PM', 'Library, Room 204', 'writersroom@example.com', 2),
(5, 'Campus Kindness Crew', 'Plan donation drives, volunteer projects, and small acts of kindness. Help\r\nmake campus and the surrounding community a better place.', 'Tuesdays at 12:30 PM', 'Student Center, Room 101', 'kindnesscrew@example.com', 3),
(6, 'Community Table', 'Support local food programs through collection events and volunteer\r\nopportunities. Connect with students who want to help neighbors facing food\r\ninsecurity.', 'Fridays at 1:00 PM', 'Student Center, Room 103', 'communitytable@example.com', 3),
(7, 'Critical Hit Club', 'Discover board games and tabletop adventures with fellow students. Learn a\r\nnew game or bring a favorite to share with the group.', 'Thursdays at 3:30 PM', 'Student Lounge', 'criticalhit@example.com', 4),
(8, 'Trail & Trek', 'Meet other students who enjoy walking and exploring local trails. Plan group\r\noutings and share ideas for affordable outdoor adventures.', 'Wednesdays at 4:00 PM', 'Recreation Center Lobby', 'trailandtrek@example.com', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`club_id`),
  ADD KEY `fk_clubs_categories` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `club_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clubs`
--
ALTER TABLE `clubs`
  ADD CONSTRAINT `fk_clubs_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

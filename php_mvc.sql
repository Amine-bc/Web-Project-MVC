-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 07, 2025 at 08:37 PM
-- Server version: 8.0.40
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `Donations`
--

CREATE TABLE `Donations` (
  `donation_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `payment_receipt` varchar(255) DEFAULT NULL,
  `donation_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `is_tracked` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Donations`
--

INSERT INTO `Donations` (`donation_id`, `user_id`, `amount`, `payment_receipt`, `donation_date`, `is_tracked`) VALUES
(1, 40, 50.00, 'receipt1.pdf', '2025-01-01 10:00:00', 1),
(2, 41, 75.00, 'receipt2.pdf', '2025-01-02 11:00:00', 0),
(3, 40, 20.00, 'receipt3.pdf', '2025-01-03 12:00:00', 1),
(4, 41, 100.00, 'receipt4.pdf', '2025-01-04 13:00:00', 0),
(5, 40, 60.00, 'receipt5.pdf', '2025-01-05 14:00:00', 1),
(6, 41, 30.00, 'receipt6.pdf', '2025-01-06 15:00:00', 0),
(7, 40, 90.00, 'receipt7.pdf', '2025-01-07 16:00:00', 1),
(8, 41, 120.00, 'receipt8.pdf', '2025-01-08 17:00:00', 0),
(9, 40, 45.00, 'receipt9.pdf', '2025-01-09 18:00:00', 1),
(10, 41, 80.00, 'receipt10.pdf', '2025-01-10 19:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Events`
--

CREATE TABLE `Events` (
  `event_id` int NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `description` text,
  `date` datetime DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `attendees` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `FeedbackSuggestions`
--

CREATE TABLE `FeedbackSuggestions` (
  `feedback_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `partner_id` int DEFAULT NULL,
  `type` enum('feedback','suggestion') DEFAULT NULL,
  `content` text,
  `submission_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int NOT NULL,
  `migration` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `created_at`) VALUES
(1, 'm0001_initial.php', '2025-01-01 13:58:20');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `image_path`, `created_at`) VALUES
(11, 'Exciting Updates', 'We have launched a new feature for our members!', '/images/news/news1.png', '2025-01-02 12:32:22'),
(12, 'Upcoming Events', 'Join us for the annual charity event this weekend.', '/images/news/news2.png', '2025-01-02 12:32:22'),
(13, 'Membership Benefits', 'Check out the new discounts available for members.', '/images/news/news3.png', '2025-01-02 12:32:22'),
(14, 'Community Outreach', 'Our latest community outreach program was a success!', '/images/news/news4.png', '2025-01-02 12:32:22'),
(15, 'New Partnerships', 'We have partnered with several new organizations to offer more benefits.', '/images/news/news5.png', '2025-01-02 12:32:22'),
(16, 'Volunteer Opportunities', 'Explore new opportunities to volunteer with our team.', '/images/news/news6.png', '2025-01-02 12:32:22'),
(17, 'Annual Report', 'Our annual report for the year is now available for viewing.', '/images/news/news7.png', '2025-01-02 12:32:22'),
(18, 'Special Discounts', 'Limited-time discounts are available for premium members.', '/images/news/news8.png', '2025-01-02 12:32:22'),
(19, 'Upcoming Workshops', 'Sign up for our free workshops to develop new skills.', '/images/news/news9.png', '2025-01-02 12:32:22'),
(20, 'Charity Drive', 'Support our charity drive to help those in need.', '/images/news/news10.png', '2025-01-02 12:32:22');

-- --------------------------------------------------------

--
-- Table structure for table `Notifications`
--

CREATE TABLE `Notifications` (
  `notification_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `title` varchar(150) DEFAULT NULL,
  `content` text,
  `send_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `type` enum('event','promotion','renewal','general') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Notifications`
--

INSERT INTO `Notifications` (`notification_id`, `user_id`, `title`, `content`, `send_date`, `type`) VALUES
(11, 40, 'Welcome to the platform', 'We are glad to have you join our platform!', '2025-01-04 09:00:00', 'general'),
(12, 41, 'Event Reminder', 'Don’t forget to attend the Annual Meetup this weekend.', '2025-01-05 15:30:00', 'event'),
(13, 42, 'Limited Time Offer', 'Enjoy 50% off on all premium features for this month only!', '2025-01-06 12:00:00', 'promotion'),
(14, 43, 'Subscription Renewal', 'Your subscription is about to expire. Renew today to avoid interruption.', '2025-01-07 10:00:00', 'renewal'),
(15, 40, 'New Feature Launch', 'We’ve introduced new tools to enhance your experience.', '2025-01-08 08:45:00', 'general'),
(16, 41, 'Webinar Invitation', 'Join us for an exclusive webinar on productivity tips.', '2025-01-09 18:00:00', 'event'),
(17, 42, 'Upgrade to Premium', 'Unlock premium benefits with our affordable subscription plans.', '2025-01-10 11:15:00', 'promotion'),
(18, 43, 'Renewal Reminder', 'Your annual subscription ends in 5 days. Renew now!', '2025-01-11 14:30:00', 'renewal'),
(19, 40, 'System Update', 'Our system will undergo maintenance on January 20th.', '2025-01-12 16:45:00', 'general'),
(20, 41, 'Special Offer', 'Get 3 months of premium for the price of 2 – limited offer!', '2025-01-13 20:00:00', 'promotion');

-- --------------------------------------------------------

--
-- Table structure for table `Offers`
--

CREATE TABLE `Offers` (
  `offer_id` int NOT NULL,
  `partner_name` varchar(150) NOT NULL,
  `partner_category` enum('Hotel','Clinique','Ecole','Agence de Voyage','Autres') NOT NULL,
  `offer_description` text NOT NULL,
  `discount_percentage` decimal(5,2) NOT NULL DEFAULT '0.00',
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `city` varchar(100) DEFAULT NULL,
  `contact_info` text,
  `logo_path` varchar(255) DEFAULT NULL,
  `details_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Offers`
--

INSERT INTO `Offers` (`offer_id`, `partner_name`, `partner_category`, `offer_description`, `discount_percentage`, `start_date`, `end_date`, `city`, `contact_info`, `logo_path`, `details_link`) VALUES
(1, 'Hotel Sunshine', 'Hotel', 'Exclusive summer deal for families.', 25.00, '2025-01-01', '2025-03-01', 'Alger', 'contact@sunshine.com', '/logos/hotel_sunshine.jpg', '/details/hotel_sunshine_offer'),
(2, 'Clinic CarePlus', 'Clinique', 'Free consultation on weekends.', 15.00, '2025-02-01', '2025-04-01', 'Oran', 'info@careplus.com', '/logos/clinic_careplus.jpg', '/details/clinic_careplus_offer'),
(3, 'Ecole Académie Lumière', 'Ecole', '50% off on registration fees for new students.', 50.00, '2025-03-01', '2025-06-01', 'Constantine', 'contact@academielumiere.com', '/logos/ecole_academie_lumiere.jpg', '/details/ecole_academie_lumiere_offer'),
(4, 'Agence TravelTime', 'Agence de Voyage', 'Winter special: 20% off on international packages.', 20.00, '2025-01-15', '2025-02-28', 'Tlemcen', 'info@traveltime.com', '/logos/agence_traveltime.jpg', '/details/agence_traveltime_offer'),
(5, 'Spa Relaxation', 'Autres', 'Get 30% off on spa treatments.', 30.00, '2025-02-01', '2025-03-15', 'Oran', 'info@relaxation.com', '/logos/spa_relaxation.jpg', '/details/spa_relaxation_offer');

-- --------------------------------------------------------

--
-- Table structure for table `Partners`
--

CREATE TABLE `Partners` (
  `partner_id` int NOT NULL,
  `name` varchar(150) NOT NULL,
  `category` enum('Hotel','Clinique','Ecole','Agence de Voyage','Autres') DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `contact_info` text,
  `logo_path` varchar(255) DEFAULT NULL,
  `details_link` varchar(255) DEFAULT NULL,
  `reduction_classique` decimal(5,2) NOT NULL DEFAULT '0.00',
  `reduction_jeunes` decimal(5,2) NOT NULL DEFAULT '0.00',
  `reduction_premium` decimal(5,2) NOT NULL DEFAULT '0.00',
  `discount` decimal(5,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Partners`
--

INSERT INTO `Partners` (`partner_id`, `name`, `category`, `city`, `contact_info`, `logo_path`, `details_link`, `reduction_classique`, `reduction_jeunes`, `reduction_premium`, `discount`) VALUES
(21, 'Hotel Sunshine', 'Hotel', 'Alger', 'contact@sunshine.com', '/logos/hotel_sunshine.jpg', '/details/hotel_sunshine', 5.40, 7.30, 15.00, 1.50),
(22, 'Clinic CarePlus', 'Clinique', 'Oran', 'info@careplus.com', '/logos/clinic_careplus.jpg', '/details/clinic_careplus', 4.10, 6.80, 12.00, 1.20),
(23, 'Ecole Académie Lumière', 'Ecole', 'Constantine', 'contact@academielumiere.com', '/logos/ecole_academie_lumiere.jpg', '/details/ecole_academie_lumiere', 3.10, 7.90, 14.00, 1.00),
(24, 'Agence TravelTime', 'Agence de Voyage', 'Tlemcen', 'info@traveltime.com', '/logos/agence_traveltime.jpg', '/details/agence_traveltime', 2.10, 4.80, 10.00, 0.80),
(25, 'Hotel Ocean Breeze', 'Hotel', 'Oran', 'contact@oceanbreeze.com', '/logos/hotel_ocean_breeze.jpg', '/details/hotel_ocean_breeze', 6.40, 7.40, 15.00, 1.50),
(26, 'Clinic Medix', 'Clinique', 'Annaba', 'info@medix.com', '/logos/clinic_medix.jpg', '/details/clinic_medix', 4.20, 6.90, 12.00, 1.20),
(27, 'Ecole Horizon', 'Ecole', 'Alger', 'contact@ecolehorizon.com', '/logos/ecole_horizon.jpg', '/details/ecole_horizon', 3.30, 7.70, 14.00, 1.00),
(28, 'Agence Global Tours', 'Agence de Voyage', 'Blida', 'info@globaltours.com', '/logos/agence_global_tours.jpg', '/details/agence_global_tours', 2.30, 4.90, 10.00, 0.80),
(29, 'Hotel Grand Palace', 'Hotel', 'Tizi Ouzou', 'contact@grandpalace.com', '/logos/hotel_grand_palace.jpg', '/details/hotel_grand_palace', 6.30, 7.60, 15.00, 1.50),
(30, 'Clinic SantéPlus', 'Clinique', 'Sidi Bel Abbès', 'info@santeplus.com', '/logos/clinic_santeplus.jpg', '/details/clinic_santeplus', 4.40, 7.10, 12.00, 1.20),
(31, 'Hotel Amine', 'Hotel', 'Alger', 'contact@amine.com', '/logos/hotel_amine.jpg', '/details/hotel_amine', 6.10, 7.20, 15.00, 1.50),
(32, 'Hotel Ahmaed', 'Hotel', 'Alger', 'contact@ahmed.com', '/logos/hotel_amine.jpg', '/details/hotel_amine', 6.00, 7.00, 15.00, 1.50),
(33, 'Hotel Grand Horizon', 'Hotel', 'Algiers', 'contact@grandhorizon.com', '/logos/hotel_grand_horizon.jpg', '/details/hotel_grand_horizon', 5.90, 7.50, 15.00, 1.50),
(34, 'Clinic HealthyCare', 'Clinique', 'Oran', 'contact@healthycare.com', '/logos/clinic_healthycare.jpg', '/details/clinic_healthycare', 4.60, 7.00, 12.00, 1.20),
(35, 'Ecole Bright Future', 'Ecole', 'Tizi Ouzou', 'info@brightfuture.com', '/logos/ecole_brightfuture.jpg', '/details/ecole_brightfuture', 3.50, 7.90, 14.00, 1.00),
(36, 'Agence TravelNow', 'Agence de Voyage', 'Blida', 'contact@travelnow.com', '/logos/agence_travelnow.jpg', '/details/agence_travelnow', 2.20, 5.30, 10.00, 0.80),
(37, 'Hotel Ocean Breeze', 'Hotel', 'Oran', 'contact@oceanbreeze.com', '/logos/hotel_oceanbreeze.jpg', '/details/hotel_oceanbreeze', 5.70, 7.20, 15.00, 1.50),
(38, 'Clinic CarePlus', 'Clinique', 'Annaba', 'info@careplus.com', '/logos/clinic_careplus.jpg', '/details/clinic_careplus', 4.70, 6.80, 12.00, 1.20),
(39, 'Ecole Lumière', 'Ecole', 'Constantine', 'contact@ecolelumiere.com', '/logos/ecole_lumiere.jpg', '/details/ecole_lumiere', 3.70, 7.60, 14.00, 1.00),
(40, 'Agence GlobalTours', 'Agence de Voyage', 'Sidi Bel Abbès', 'contact@globaltours.com', '/logos/agence_globaltours.jpg', '/details/agence_globaltours', 2.50, 5.00, 10.00, 0.80),
(41, 'Hotel Luxury Inn', 'Hotel', 'Algiers', 'contact@luxuryinn.com', '/logos/hotel_luxuryinn.jpg', '/details/hotel_luxuryinn', 5.60, 7.40, 15.00, 1.50),
(42, 'Clinic MedCare', 'Clinique', 'Tlemcen', 'contact@medcare.com', '/logos/clinic_medcare.jpg', '/details/clinic_medcare', 4.90, 6.60, 12.00, 1.20),
(43, 'Spa Relaxation', 'Autres', 'Oran', 'info@relaxation.com', '/logos/spa_relaxation.jpg', '/details/spa_relaxation', 1.10, 2.80, 5.00, 0.50),
(44, 'Université Moderne', 'Autres', 'Constantine', 'contact@universitemoderne.com', '/logos/universite_moderne.jpg', '/details/universite_moderne', 1.20, 2.90, 5.00, 0.50),
(45, 'Agence VoyageExplorer', 'Agence de Voyage', 'Tlemcen', 'info@voyageexplorer.com', '/logos/agence_voyageexplorer.jpg', '/details/agence_voyageexplorer', 2.40, 5.10, 10.00, 0.80),
(46, 'Hotel Mirage', 'Hotel', 'Oran', 'contact@miragehotel.com', '/logos/hotel_mirage.jpg', '/details/hotel_mirage', 5.30, 7.40, 15.00, 1.50),
(47, 'Clinique SoinsPlus', 'Clinique', 'Annaba', 'info@soinsplus.com', '/logos/clinique_soinsplus.jpg', '/details/clinique_soinsplus', 5.00, 7.10, 12.00, 1.20),
(48, 'Ecole Excellence', 'Ecole', 'Alger', 'contact@ecoleexcellence.com', '/logos/ecole_excellence.jpg', '/details/ecole_excellence', 3.90, 8.10, 14.00, 1.00),
(49, 'Agence WorldWide Travels', 'Agence de Voyage', 'Blida', 'info@worldwidetravels.com', '/logos/agence_worldwide_travels.jpg', '/details/agence_worldwide_travels', 2.70, 5.50, 10.00, 0.80),
(50, 'Hotel Bella Vista', 'Hotel', 'Sidi Bel Abbès', 'contact@bellavista.com', '/logos/hotel_bella_vista.jpg', '/details/hotel_bella_vista', 5.20, 7.00, 15.00, 1.50),
(51, 'Clinique SantéPlus', 'Clinique', 'Tizi Ouzou', 'info@santeplus.com', '/logos/clinique_santeplus.jpg', '/details/clinique_santeplus', 5.10, 6.90, 12.00, 1.20),
(52, 'Ecole Future Leaders', 'Ecole', 'Oran', 'contact@ecolefutureleaders.com', '/logos/ecole_future_leaders.jpg', '/details/ecole_future_leaders', 3.80, 7.50, 14.00, 1.00),
(53, 'Agence GrandTours', 'Agence de Voyage', 'Alger', 'info@grandtours.com', '/logos/agence_grandtours.jpg', '/details/agence_grandtours', 2.60, 5.20, 10.00, 0.80),
(54, 'Hotel Royal Palace', 'Hotel', 'Annaba', 'contact@royalpalace.com', '/logos/hotel_royal_palace.jpg', '/details/hotel_royal_palace', 5.50, 7.50, 15.00, 1.50),
(55, 'Clinique CareWell', 'Clinique', 'Blida', 'info@carewell.com', '/logos/clinique_carewell.jpg', '/details/clinique_carewell', 4.80, 7.20, 12.00, 1.20),
(56, 'Ecole Star Academy', 'Ecole', 'Tlemcen', 'contact@staracademy.com', '/logos/ecole_star_academy.jpg', '/details/ecole_star_academy', 3.60, 8.00, 14.00, 1.00),
(57, 'Hotel Ocean Breeze', 'Hotel', 'Alger', 'contact@oceanbreeze.com', '/logos/hotel_ocean_breeze.jpg', '/details/hotel_ocean_breeze', 5.80, 7.30, 15.00, 1.50),
(58, 'Agence TravelPlus', 'Agence de Voyage', 'Constantine', 'info@travelplus.com', '/logos/agence_travelplus.jpg', '/details/agence_travelplus', 2.40, 5.10, 10.00, 0.80),
(59, 'Clinique MedCare', 'Clinique', 'Oran', 'info@medcare.com', '/logos/clinique_medcare.jpg', '/details/clinique_medcare', 4.50, 6.90, 12.00, 1.20),
(60, 'Ecole International', 'Ecole', 'Sidi Bel Abbès', 'contact@ecoleinternational.com', '/logos/ecole_international.jpg', '/details/ecole_international', 3.40, 7.80, 14.00, 1.00),
(61, 'Hotel Grandview', 'Hotel', 'Blida', 'contact@grandview.com', '/logos/hotel_grandview.jpg', '/details/hotel_grandview', 6.20, 8.00, 15.00, 1.50),
(62, 'Clinique BestCare', 'Clinique', 'Tizi Ouzou', 'info@bestcare.com', '/logos/clinique_bestcare.jpg', '/details/clinique_bestcare', 4.30, 6.80, 12.00, 1.20),
(63, 'Ecole Lumière', 'Ecole', 'Alger', 'contact@ecolelumiere.com', '/logos/ecole_lumiere.jpg', '/details/ecole_lumiere', 3.20, 7.80, 14.00, 1.00),
(64, 'Hotel Sunset', 'Hotel', 'Oran', 'contact@sunset.com', '/logos/hotel_sunset.jpg', '/details/hotel_sunset', 6.50, 7.30, 15.00, 1.50);

-- --------------------------------------------------------

--
-- Table structure for table `SubscriptionPayments`
--

CREATE TABLE `SubscriptionPayments` (
  `payment_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `payment_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `receipt_path` varchar(255) DEFAULT NULL,
  `status` enum('pending','approved','declined') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `SubscriptionPayments`
--

INSERT INTO `SubscriptionPayments` (`payment_id`, `user_id`, `amount`, `payment_date`, `receipt_path`, `status`) VALUES
(1, 40, 25.00, '2025-01-01 10:00:00', 'receipt1.pdf', 'approved'),
(2, 41, 35.00, '2025-01-02 11:00:00', 'receipt2.pdf', 'pending'),
(3, 40, 45.00, '2025-01-03 12:00:00', 'receipt3.pdf', 'approved'),
(4, 41, 55.00, '2025-01-04 13:00:00', 'receipt4.pdf', 'declined'),
(5, 40, 65.00, '2025-01-05 14:00:00', 'receipt5.pdf', 'approved'),
(6, 41, 75.00, '2025-01-06 15:00:00', 'receipt6.pdf', 'pending'),
(7, 40, 85.00, '2025-01-07 16:00:00', 'receipt7.pdf', 'approved'),
(8, 41, 95.00, '2025-01-08 17:00:00', 'receipt8.pdf', 'declined'),
(9, 40, 105.00, '2025-01-09 18:00:00', 'receipt9.pdf', 'approved'),
(10, 41, 115.00, '2025-01-10 19:00:00', 'receipt10.pdf', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `user_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('member','admin') DEFAULT 'member',
  `phone` varchar(15) DEFAULT NULL,
  `address` text,
  `profile_photo` varchar(255) DEFAULT NULL,
  `subscription_type` enum('Classique','Jeunes','Premium') DEFAULT NULL,
  `subscription_status` enum('active','expired') DEFAULT 'active',
  `join_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `expiration_date` datetime DEFAULT NULL,
  `photo_identity` varchar(255) DEFAULT NULL,
  `payment_proof` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`user_id`, `name`, `email`, `password`, `role`, `phone`, `address`, `profile_photo`, `subscription_type`, `subscription_status`, `join_date`, `expiration_date`, `photo_identity`, `payment_proof`) VALUES
(40, 'user1', 'user1@gmail.com', '$2y$10$Na4ymmJ98b0WfahwJmnYV.l47JuUFaKdgLjTmGa9AvI.2YjiKMXpC', 'member', NULL, NULL, '67774199d6207_Screenshot 1446-07-03 at 1.48.30 PM.png', 'Jeunes', 'active', '2025-01-03 01:47:06', '2025-04-13 01:47:06', '67774199d63e9_Screenshot 1446-07-03 at 1.48.30 PM.png', '67774199d6339_Screenshot 1446-07-03 at 1.49.17 PM.png'),
(41, 'Mohammed Amine Bouchoucha', 'amine@gmail.com', '$2y$10$Amnf0p.MjeMAYRS/hEaabu.W2JFtM.XZQP8kUuT0B/JES36FJiTNK', 'member', '21209382', 'Oued smar alger', '67780c65cef84_Knight Holding a Cat (1).jpeg', 'Classique', 'active', '2025-01-03 16:12:22', '2025-04-13 16:12:22', '67780c65cf4e0_Screenshot 1446-06-01 at 3.34.23 PM.png', '67780c65cf3ea_Screenshot 1446-06-02 at 10.50.27 PM.png'),
(42, 'test', 'test@gmail.com', '$2y$10$zF0Cyq.Ecujl/icPgFuNK.PP3Y6bmn/66O3om.osG3IEWT4ZJ7ykq', 'member', NULL, NULL, '6778490f383ac_Screenshot 1446-07-03 at 1.48.19 PM.png', 'Classique', 'active', '2025-01-03 20:31:11', '2025-04-13 20:31:11', '6778490f38784_Screenshot 1446-07-03 at 1.48.19 PM.png', '6778490f38642_Screenshot 1446-07-03 at 1.48.19 PM.png'),
(43, 'test2', 'test2@gmail.com', '$2y$10$As/G4U.uy5i0GuL1ozJERetzPjUVURkI.PGIF.OPGIh0k9IuGXlKO', 'member', NULL, NULL, '6778493603978_Screenshot 1446-07-03 at 1.48.19 PM.png', 'Classique', 'active', '2025-01-03 20:31:50', '2025-04-13 20:31:50', '6778493603ac5_Screenshot 1446-07-03 at 1.48.19 PM.png', '6778493603a58_Screenshot 1446-07-03 at 1.48.53 PM.png');

-- --------------------------------------------------------

--
-- Table structure for table `User_Partners`
--

CREATE TABLE `User_Partners` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `partner_id` int NOT NULL,
  `starred` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `User_Partners`
--

INSERT INTO `User_Partners` (`id`, `user_id`, `partner_id`, `starred`) VALUES
(1, 40, 43, 1),
(2, 41, 44, 0),
(3, 42, 24, 1),
(4, 43, 28, 0),
(5, 40, 58, 1),
(6, 41, 36, 0),
(7, 42, 40, 1),
(8, 43, 53, 1),
(9, 40, 45, 0),
(10, 41, 49, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Volunteering`
--

CREATE TABLE `Volunteering` (
  `volunteer_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `event_name` varchar(150) DEFAULT NULL,
  `description` text,
  `participation_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Volunteering`
--

INSERT INTO `Volunteering` (`volunteer_id`, `user_id`, `event_name`, `description`, `participation_date`) VALUES
(1, 40, 'Beach Cleanup', 'Volunteering to clean up the local beach.', '2025-01-01 10:00:00'),
(2, 41, 'Food Drive', 'Helping organize and distribute food.', '2025-01-02 11:00:00'),
(3, 40, 'Park Restoration', 'Assisting with park restoration projects.', '2025-01-03 12:00:00'),
(4, 41, 'Animal Shelter', 'Caring for animals at the local shelter.', '2025-01-04 13:00:00'),
(5, 40, 'Community Garden', 'Planting and maintaining community gardens.', '2025-01-05 14:00:00'),
(6, 41, 'Library Support', 'Helping organize books at the library.', '2025-01-06 15:00:00'),
(7, 40, 'Blood Donation', 'Organizing a blood donation camp.', '2025-01-07 16:00:00'),
(8, 41, 'Recycling Drive', 'Promoting and assisting with recycling.', '2025-01-08 17:00:00'),
(9, 40, 'Senior Center', 'Volunteering at the senior center.', '2025-01-09 18:00:00'),
(10, 41, 'Youth Mentoring', 'Mentoring youths in various activities.', '2025-01-10 19:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Donations`
--
ALTER TABLE `Donations`
  ADD PRIMARY KEY (`donation_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `Events`
--
ALTER TABLE `Events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `FeedbackSuggestions`
--
ALTER TABLE `FeedbackSuggestions`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `partner_id` (`partner_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Notifications`
--
ALTER TABLE `Notifications`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `Offers`
--
ALTER TABLE `Offers`
  ADD PRIMARY KEY (`offer_id`);

--
-- Indexes for table `Partners`
--
ALTER TABLE `Partners`
  ADD PRIMARY KEY (`partner_id`);

--
-- Indexes for table `SubscriptionPayments`
--
ALTER TABLE `SubscriptionPayments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `User_Partners`
--
ALTER TABLE `User_Partners`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`partner_id`),
  ADD KEY `partner_id` (`partner_id`);

--
-- Indexes for table `Volunteering`
--
ALTER TABLE `Volunteering`
  ADD PRIMARY KEY (`volunteer_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Donations`
--
ALTER TABLE `Donations`
  MODIFY `donation_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `Events`
--
ALTER TABLE `Events`
  MODIFY `event_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `FeedbackSuggestions`
--
ALTER TABLE `FeedbackSuggestions`
  MODIFY `feedback_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `Notifications`
--
ALTER TABLE `Notifications`
  MODIFY `notification_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `Offers`
--
ALTER TABLE `Offers`
  MODIFY `offer_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Partners`
--
ALTER TABLE `Partners`
  MODIFY `partner_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `SubscriptionPayments`
--
ALTER TABLE `SubscriptionPayments`
  MODIFY `payment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `User_Partners`
--
ALTER TABLE `User_Partners`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `Volunteering`
--
ALTER TABLE `Volunteering`
  MODIFY `volunteer_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Donations`
--
ALTER TABLE `Donations`
  ADD CONSTRAINT `donations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `FeedbackSuggestions`
--
ALTER TABLE `FeedbackSuggestions`
  ADD CONSTRAINT `feedbacksuggestions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `feedbacksuggestions_ibfk_2` FOREIGN KEY (`partner_id`) REFERENCES `Partners` (`partner_id`) ON DELETE CASCADE;

--
-- Constraints for table `Notifications`
--
ALTER TABLE `Notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`) ON DELETE SET NULL;

--
-- Constraints for table `SubscriptionPayments`
--
ALTER TABLE `SubscriptionPayments`
  ADD CONSTRAINT `subscriptionpayments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `User_Partners`
--
ALTER TABLE `User_Partners`
  ADD CONSTRAINT `user_partners_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_partners_ibfk_2` FOREIGN KEY (`partner_id`) REFERENCES `Partners` (`partner_id`) ON DELETE CASCADE;

--
-- Constraints for table `Volunteering`
--
ALTER TABLE `Volunteering`
  ADD CONSTRAINT `volunteering_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

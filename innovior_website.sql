-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2026 at 09:42 AM
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
-- Database: `innovior_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_culture`
--

CREATE TABLE `about_culture` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) NOT NULL DEFAULT 'Our Team & Culture',
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_culture`
--

INSERT INTO `about_culture` (`id`, `heading`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Our Team & Culture', 'We believe the best technology comes from talented, passionate people who collaborate, innovate, and push boundaries. Our diverse team brings expertise in web development, mobile apps, cloud architecture, IoT, and business consulting.', '2026-01-22 20:13:34', '2026-01-22 20:13:34');

-- --------------------------------------------------------

--
-- Table structure for table `about_culture_highlights`
--

CREATE TABLE `about_culture_highlights` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `about_culture_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_culture_highlights`
--

INSERT INTO `about_culture_highlights` (`id`, `about_culture_id`, `title`, `order`, `created_at`, `updated_at`) VALUES
(1, 1, 'Innovation', 1, '2026-01-22 20:13:34', '2026-01-22 20:13:34'),
(2, 1, 'Collaboration', 2, '2026-01-22 20:13:34', '2026-01-22 20:13:34'),
(3, 1, 'Excellence', 3, '2026-01-22 20:13:34', '2026-01-22 20:13:34'),
(4, 1, 'Continuous Learning', 4, '2026-01-22 20:13:34', '2026-01-22 20:13:34'),
(5, 1, 'Integrity', 5, '2026-01-22 20:13:34', '2026-01-22 20:13:34');

-- --------------------------------------------------------

--
-- Table structure for table `about_hero`
--

CREATE TABLE `about_hero` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subtitle` varchar(255) NOT NULL DEFAULT 'Our Story',
  `heading` varchar(255) NOT NULL DEFAULT 'About Innovior',
  `description` text DEFAULT NULL,
  `hero_image` varchar(255) DEFAULT NULL,
  `background_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_hero`
--

INSERT INTO `about_hero` (`id`, `subtitle`, `heading`, `description`, `hero_image`, `background_image`, `created_at`, `updated_at`) VALUES
(1, 'Our Story66', 'About Innovior66', 'Driving digital transformation through innovation, expertise, and cutting-edge technology solutions. We build the future, today.66', 'heroes/about/AomvCys1aOYC60uUXKx16bPndRWTu2hFknNwPZR1.jpg', NULL, '2026-01-22 20:13:34', '2026-01-24 09:53:09');

-- --------------------------------------------------------

--
-- Table structure for table `about_mvv`
--

CREATE TABLE `about_mvv` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mission_title` varchar(255) NOT NULL DEFAULT 'Our Mission',
  `mission_description` text DEFAULT NULL,
  `mission_icon` varchar(255) NOT NULL DEFAULT 'fas fa-bullseye',
  `vision_title` varchar(255) NOT NULL DEFAULT 'Our Vision',
  `vision_description` text DEFAULT NULL,
  `vision_icon` varchar(255) NOT NULL DEFAULT 'fas fa-eye',
  `values_title` varchar(255) NOT NULL DEFAULT 'Our Values',
  `values_description` text DEFAULT NULL,
  `values_icon` varchar(255) NOT NULL DEFAULT 'fas fa-heart',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_mvv`
--

INSERT INTO `about_mvv` (`id`, `mission_title`, `mission_description`, `mission_icon`, `vision_title`, `vision_description`, `vision_icon`, `values_title`, `values_description`, `values_icon`, `created_at`, `updated_at`) VALUES
(1, 'Our Mission', 'To empower businesses through innovative technology, reliable digital solutions, and strategic partnerships that drive sustainable growth and digital excellence.', 'fas fa-bullseye', 'Our Vision', 'To become a globally trusted technology partner, renowned for delivering transformative solutions that shape the future landscape of digital innovation.', 'fas fa-eye', 'Our Values', 'Innovation, integrity, collaboration, and excellence are at our core. We are committed to quality, transparency, and the unwavering success of our clients.', 'fas fa-heart', '2026-01-22 20:13:34', '2026-01-22 20:13:34');

-- --------------------------------------------------------

--
-- Table structure for table `about_offices`
--

CREATE TABLE `about_offices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) NOT NULL DEFAULT 'Our Presence',
  `subtitle` varchar(255) NOT NULL DEFAULT 'Connecting with clients locally and globally.',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_offices`
--

INSERT INTO `about_offices` (`id`, `heading`, `subtitle`, `created_at`, `updated_at`) VALUES
(1, 'Our Presence', 'Connecting with clients locally and globally.', '2026-01-22 20:13:34', '2026-01-22 20:13:34');

-- --------------------------------------------------------

--
-- Table structure for table `about_office_locations`
--

CREATE TABLE `about_office_locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `about_offices_id` bigint(20) UNSIGNED NOT NULL,
  `icon` varchar(255) NOT NULL DEFAULT 'fas fa-map-marker-alt',
  `title` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `contact1_icon` varchar(255) DEFAULT NULL,
  `contact1_text` varchar(255) DEFAULT NULL,
  `contact2_icon` varchar(255) DEFAULT NULL,
  `contact2_text` varchar(255) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_office_locations`
--

INSERT INTO `about_office_locations` (`id`, `about_offices_id`, `icon`, `title`, `role`, `address`, `description`, `contact1_icon`, `contact1_text`, `contact2_icon`, `contact2_text`, `order`, `created_at`, `updated_at`) VALUES
(1, 1, 'fas fa-map-marker-alt', 'Sri Lanka (HQ)', 'Innovation & Development Hub', 'Kandy, Sri Lanka', 'Our main office serves as the heart of our software development operations, housing our engineering teams, architects, and strategists.', 'fas fa-envelope', 'info@innovior.com', 'fas fa-phone', '+94 77 123 4567', 1, '2026-01-22 20:13:34', '2026-01-23 22:46:48'),
(2, 1, 'fas fa-globe-americas', 'Global Operations', 'Client Support & Delivery', 'Asia, Europe, Americas', 'Serving clients across multiple continents with distributed teams providing round-the-clock support and development services.', 'fas fa-clock', '24/7 Support Available', 'fas fa-briefcase', 'Dev, Consulting & Support', 2, '2026-01-22 20:13:34', '2026-01-22 20:13:34');

-- --------------------------------------------------------

--
-- Table structure for table `about_overview`
--

CREATE TABLE `about_overview` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) NOT NULL DEFAULT 'Who We Are',
  `description` text DEFAULT NULL,
  `button_text` varchar(255) NOT NULL DEFAULT 'Work With Us',
  `button_link` varchar(255) NOT NULL DEFAULT '#contact',
  `stat1_number` varchar(255) NOT NULL DEFAULT '100+',
  `stat1_label` varchar(255) NOT NULL DEFAULT 'Projects Delivered',
  `stat2_number` varchar(255) NOT NULL DEFAULT '50+',
  `stat2_label` varchar(255) NOT NULL DEFAULT 'Happy Clients',
  `stat3_number` varchar(255) NOT NULL DEFAULT '15+',
  `stat3_label` varchar(255) NOT NULL DEFAULT 'Team Members',
  `stat4_number` varchar(255) NOT NULL DEFAULT '5+',
  `stat4_label` varchar(255) NOT NULL DEFAULT 'Years Experience',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_overview`
--

INSERT INTO `about_overview` (`id`, `heading`, `description`, `button_text`, `button_link`, `stat1_number`, `stat1_label`, `stat2_number`, `stat2_label`, `stat3_number`, `stat3_label`, `stat4_number`, `stat4_label`, `created_at`, `updated_at`) VALUES
(1, 'Who We Are', 'Innovior is a forward-thinking software development company delivering high-quality digital solutions to businesses worldwide. We specialize in building scalable, secure, and intelligent systems that help organizations transform, innovate, and lead in their industries.\r\n\r\nWith a team of passionate engineers, architects, and strategists, we\'ve partnered with startups, enterprises, and institutions to shape the future of technology. We believe in the power of code to solve complex problems and create meaningful impact.', 'Work With Us', '#contact', '10+', 'Projects Delivered', '10+', 'Happy Clients', '18+', 'Team Members', '1+', 'Years Experience', '2026-01-22 20:13:34', '2026-01-22 20:16:58');

-- --------------------------------------------------------

--
-- Table structure for table `about_partners`
--

CREATE TABLE `about_partners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) NOT NULL DEFAULT 'Strategic Partners',
  `subtitle` varchar(255) NOT NULL DEFAULT 'Collaborating with industry leaders to deliver world-class solutions.',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_partners`
--

INSERT INTO `about_partners` (`id`, `heading`, `subtitle`, `created_at`, `updated_at`) VALUES
(1, 'Strategic Partners', 'Collaborating with industry leaders to deliver world-class solutions.', '2026-01-22 20:13:34', '2026-01-22 20:13:34');

-- --------------------------------------------------------

--
-- Table structure for table `about_partner_items`
--

CREATE TABLE `about_partner_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `about_partners_id` bigint(20) UNSIGNED NOT NULL,
  `icon` varchar(255) NOT NULL DEFAULT 'fas fa-handshake',
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_partner_items`
--

INSERT INTO `about_partner_items` (`id`, `about_partners_id`, `icon`, `title`, `description`, `order`, `created_at`, `updated_at`) VALUES
(1, 1, 'fas fa-microchip', 'Technology Partner', 'Cutting-edge frameworks & infrastructure.', 1, '2026-01-22 20:13:34', '2026-01-22 20:20:09'),
(2, 1, 'fas fa-cloud', 'Cloud Services', 'Scalable cloud deployments & management.', 2, '2026-01-22 20:13:34', '2026-01-22 20:13:34'),
(3, 1, 'fas fa-lock', 'Security Partner', 'Enterprise-grade security & compliance.', 3, '2026-01-22 20:13:34', '2026-01-22 20:13:34'),
(4, 1, 'fas fa-plug', 'Integration Partner', 'Seamless system & platform integration.', 4, '2026-01-22 20:13:34', '2026-01-22 20:13:34');

-- --------------------------------------------------------

--
-- Table structure for table `about_section`
--

CREATE TABLE `about_section` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sub_heading` varchar(255) NOT NULL DEFAULT 'Who We Are',
  `heading` varchar(255) NOT NULL DEFAULT 'Building Long-Term Value Through Innovation',
  `paragraph_1` text NOT NULL,
  `paragraph_2` text DEFAULT NULL,
  `stat_1_number` varchar(255) NOT NULL DEFAULT '50+',
  `stat_1_label` varchar(255) NOT NULL DEFAULT 'Projects',
  `stat_2_number` varchar(255) NOT NULL DEFAULT '100%',
  `stat_2_label` varchar(255) NOT NULL DEFAULT 'Success',
  `image` varchar(255) DEFAULT NULL,
  `hero_title` varchar(255) DEFAULT NULL,
  `hero_description` text DEFAULT NULL,
  `hero_button_text` varchar(255) DEFAULT NULL,
  `hero_button_link` varchar(255) DEFAULT NULL,
  `hero_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_section`
--

INSERT INTO `about_section` (`id`, `sub_heading`, `heading`, `paragraph_1`, `paragraph_2`, `stat_1_number`, `stat_1_label`, `stat_2_number`, `stat_2_label`, `image`, `hero_title`, `hero_description`, `hero_button_text`, `hero_button_link`, `hero_image`, `created_at`, `updated_at`) VALUES
(1, 'Who We Aretr', 'Building Long-Term Value Through Innovation wwwww', 'Innovior is a technology-driven software company delivering modern, secure, and intelligent solutions for startups, enterprises, and institutions.', 'We don\'t just write code; we architect solutions that stand the test of time, ensuring performance and reliability.', '50+', 'Projects', '100%', 'Success', NULL, 'Innovating Tomorrow', 'adscDCSAsdc', 'jhgjhj', '/contact', 'hero/VLY1aGb4apcdJWtE9e5DS26CuXHQbjnKzDsBpWCs.jpg', '2026-01-22 18:47:55', '2026-01-25 02:16:15'),
(2, 'Who We Are', 'Building Long-Term Value Through Innovation', 'Innovior is a technology-driven software company delivering modern, secure, and intelligent solutions for startups, enterprises, and institutions.', 'We don\'t just write code; we architect solutions that stand the test of time, ensuring performance and reliability.', '50+', 'Projects', '100%', 'Success', NULL, NULL, NULL, NULL, NULL, NULL, '2026-01-22 18:49:45', '2026-01-22 18:49:45');

-- --------------------------------------------------------

--
-- Table structure for table `about_why`
--

CREATE TABLE `about_why` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) NOT NULL DEFAULT 'Why Choose Innovior',
  `subtitle` varchar(255) NOT NULL DEFAULT 'We bring more than just code to the table.',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_why`
--

INSERT INTO `about_why` (`id`, `heading`, `subtitle`, `created_at`, `updated_at`) VALUES
(1, 'Why Choose Innovior', 'We bring more than just code to the table.', '2026-01-22 20:13:34', '2026-01-22 20:13:34');

-- --------------------------------------------------------

--
-- Table structure for table `about_why_items`
--

CREATE TABLE `about_why_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `about_why_id` bigint(20) UNSIGNED NOT NULL,
  `icon` varchar(255) NOT NULL DEFAULT 'fas fa-check',
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_why_items`
--

INSERT INTO `about_why_items` (`id`, `about_why_id`, `icon`, `title`, `description`, `order`, `created_at`, `updated_at`) VALUES
(1, 1, 'fas fa-users', 'Expert Team', 'Experienced engineers and architects with proven expertise in modern technologies and methodologies.', 1, '2026-01-22 20:13:34', '2026-01-22 20:13:34'),
(2, 1, 'fas fa-layer-group', 'Scalable Solutions', 'Building robust systems designed to grow seamlessly with your business and adapt to future challenges.', 2, '2026-01-22 20:13:34', '2026-01-22 20:13:34'),
(3, 1, 'fas fa-handshake', 'Client-Centric', 'Your success is our priority. We listen, collaborate deeply, and deliver solutions tailored specifically to your needs.', 3, '2026-01-22 20:13:34', '2026-01-22 20:13:34'),
(4, 1, 'fas fa-shield-alt', 'Security First', 'Enterprise-grade security and strict compliance standards are integrated to protect your critical data and systems.', 4, '2026-01-22 20:13:34', '2026-01-22 20:13:34'),
(5, 1, 'fas fa-code', 'Latest Technologies', 'We stay ahead of the curve, utilizing modern frameworks, tools, and best practices to deliver cutting-edge results.', 5, '2026-01-22 20:13:34', '2026-01-22 20:13:34'),
(6, 1, 'fas fa-headset', 'Ongoing Support', 'Dedicated support and proactive maintenance ensure your solutions run smoothly for the long term.', 6, '2026-01-22 20:13:34', '2026-01-22 20:13:34');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `careers_cta`
--

CREATE TABLE `careers_cta` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `button_text` varchar(255) NOT NULL,
  `button_link` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `careers_cta`
--

INSERT INTO `careers_cta` (`id`, `heading`, `description`, `email`, `button_text`, `button_link`, `created_at`, `updated_at`) VALUES
(1, 'Take the Next Step in Your Career', 'Send your CV and portfolio to', 'send@innovior.com', 'Contact Recruitment', '/contact', '2026-01-22 21:37:57', '2026-01-22 21:48:03');

-- --------------------------------------------------------

--
-- Table structure for table `careers_culture`
--

CREATE TABLE `careers_culture` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `careers_culture`
--

INSERT INTO `careers_culture` (`id`, `heading`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Life at Innovior', 'We are a technology-driven organization built on innovation, collaboration, and continuous growth. Our teams work with cutting-edge technologies while maintaining a strong focus on quality, ethics, and long-term value.', '2026-01-22 21:37:57', '2026-01-22 21:37:57');

-- --------------------------------------------------------

--
-- Table structure for table `careers_culture_cards`
--

CREATE TABLE `careers_culture_cards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `careers_culture_cards`
--

INSERT INTO `careers_culture_cards` (`id`, `title`, `description`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Innovation-Driven', 'We constantly explore new technologies in AI, IoT, robotics, and cloud computing.', 1, '2026-01-22 21:37:57', '2026-01-22 21:37:57'),
(2, 'People-Centric', 'Our culture values respect, diversity, and open collaboration across teams.', 2, '2026-01-22 21:37:57', '2026-01-22 21:37:57'),
(3, 'Growth Focused', 'Structured learning paths, mentorship, and real career advancement.', 3, '2026-01-22 21:37:57', '2026-01-22 21:37:57');

-- --------------------------------------------------------

--
-- Table structure for table `careers_hero`
--

CREATE TABLE `careers_hero` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tag` varchar(255) NOT NULL DEFAULT 'Careers at Innovior',
  `heading` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `button_text` varchar(255) NOT NULL DEFAULT 'Explore Opportunities',
  `button_link` varchar(255) NOT NULL DEFAULT '#openings',
  `hero_image` varchar(255) DEFAULT NULL,
  `background_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `careers_hero`
--

INSERT INTO `careers_hero` (`id`, `tag`, `heading`, `description`, `button_text`, `button_link`, `hero_image`, `background_image`, `created_at`, `updated_at`) VALUES
(1, 'Careers at Innovior66', 'Shape the Future of Digital Innovation66', 'At Innovior, we build intelligent, scalable, and future-ready solutions that empower businesses worldwide. Join us and be part of a team that turns ideas into impact.66', 'Explore Opportunities66', '#openings', 'heroes/careers/ZPYlSszgjrdfUPeYTYbq4nXXGzUtNOHivohc1dXJ.jpg', NULL, '2026-01-22 21:37:57', '2026-01-24 09:55:10');

-- --------------------------------------------------------

--
-- Table structure for table `careers_openings`
--

CREATE TABLE `careers_openings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `job_type` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `careers_openings`
--

INSERT INTO `careers_openings` (`id`, `title`, `description`, `job_type`, `location`, `is_active`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Software Engineer', 'Develop high-performance web and enterprise applications using modern frameworks and architectures.', 'Full-Time', 'Hybrid', 1, 1, '2026-01-22 21:37:57', '2026-01-22 21:37:57'),
(2, 'AI / Machine Learning Engineer', 'Design and implement intelligent systems powered by data, analytics, and machine learning.', 'Full-Time', 'On-site', 1, 2, '2026-01-22 21:37:57', '2026-01-22 21:37:57'),
(3, 'UI / UX Designer', 'Create intuitive, elegant, and user-focused digital experiences.', 'Full-Time', 'On-site', 1, 3, '2026-01-22 21:37:57', '2026-01-22 21:37:57'),
(4, 'Software Engineering Intern', 'Gain hands-on experience by working alongside senior engineers on real projects.', 'Part-Time', 'On-site', 1, 4, '2026-01-22 21:37:57', '2026-01-22 21:46:21');

-- --------------------------------------------------------

--
-- Table structure for table `careers_process`
--

CREATE TABLE `careers_process` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `careers_process`
--

INSERT INTO `careers_process` (`id`, `heading`, `created_at`, `updated_at`) VALUES
(1, 'Our Hiring Process', '2026-01-22 21:37:57', '2026-01-22 21:37:57');

-- --------------------------------------------------------

--
-- Table structure for table `careers_process_steps`
--

CREATE TABLE `careers_process_steps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `careers_process_steps`
--

INSERT INTO `careers_process_steps` (`id`, `title`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Application Review', 1, '2026-01-22 21:37:57', '2026-01-22 21:37:57'),
(2, 'Technical Interview', 2, '2026-01-22 21:37:57', '2026-01-22 21:37:57'),
(3, 'Final Discussion', 3, '2026-01-22 21:37:57', '2026-01-22 21:37:57'),
(4, 'Offer & Onboarding', 4, '2026-01-22 21:37:57', '2026-01-22 21:37:57');

-- --------------------------------------------------------

--
-- Table structure for table `careers_why_items`
--

CREATE TABLE `careers_why_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `careers_why_items`
--

INSERT INTO `careers_why_items` (`id`, `title`, `description`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Meaningful Work', 'Solve real business challenges with measurable impact.', 1, '2026-01-22 21:37:57', '2026-01-22 21:37:57'),
(2, 'Global Exposure', 'Work with international clients and diverse teams.', 2, '2026-01-22 21:37:57', '2026-01-22 21:37:57'),
(3, 'Modern Tech Stack', 'Use industry-leading tools, frameworks, and platforms.', 3, '2026-01-22 21:37:57', '2026-01-22 21:37:57'),
(4, 'Long-Term Growth', 'We invest in people, not just positions.', 4, '2026-01-22 21:37:57', '2026-01-22 21:37:57');

-- --------------------------------------------------------

--
-- Table structure for table `careers_why_section`
--

CREATE TABLE `careers_why_section` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `careers_why_section`
--

INSERT INTO `careers_why_section` (`id`, `heading`, `created_at`, `updated_at`) VALUES
(1, 'Why Join Innovior?', '2026-01-22 21:37:57', '2026-01-22 21:37:57');

-- --------------------------------------------------------

--
-- Table structure for table `contact_form_settings`
--

CREATE TABLE `contact_form_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) NOT NULL,
  `submit_button_text` varchar(255) NOT NULL DEFAULT 'Send Message',
  `success_message` varchar(255) NOT NULL DEFAULT 'Thank you! Your message has been sent successfully.',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_form_settings`
--

INSERT INTO `contact_form_settings` (`id`, `heading`, `submit_button_text`, `success_message`, `created_at`, `updated_at`) VALUES
(1, 'Send Us a Messagebgg', 'Send Message', 'Thank you! Your message has been sent successfully.', '2026-01-22 22:03:16', '2026-01-22 22:13:33');

-- --------------------------------------------------------

--
-- Table structure for table `contact_hero`
--

CREATE TABLE `contact_hero` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `background_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_hero`
--

INSERT INTO `contact_hero` (`id`, `heading`, `description`, `background_image`, `created_at`, `updated_at`) VALUES
(1, 'Let\'s Build Something Great Together', 'Have an idea? Need expert guidance? Our team is ready to turn your vision into reality with scalable, secure digital solutions.', 'contact/cal4FLyNjW1jcX5VsHoyXR9u84UqyIcFeiWvf4SE.jpg', '2026-01-22 22:03:16', '2026-01-25 00:47:40');

-- --------------------------------------------------------

--
-- Table structure for table `contact_info`
--

CREATE TABLE `contact_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_info`
--

INSERT INTO `contact_info` (`id`, `heading`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Get in Touch', 'Reach out to us for partnerships, project inquiries, or any questions. We typically respond within 24 hours.', '2026-01-22 22:03:16', '2026-01-22 22:03:16');

-- --------------------------------------------------------

--
-- Table structure for table `contact_info_cards`
--

CREATE TABLE `contact_info_cards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `icon_color` varchar(255) NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_info_cards`
--

INSERT INTO `contact_info_cards` (`id`, `title`, `content`, `icon_color`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Address', '67/7/8,Nattaranpotha,Kundasale,Kandy,Sri Lanka', '#3498db', 1, '2026-01-22 22:03:16', '2026-01-22 22:11:18'),
(2, 'Email', 'innoviorinfo@gmail.com', '#9b59b6', 2, '2026-01-22 22:03:16', '2026-01-22 22:03:16'),
(3, 'Phone', '+94 778 778 828', '#e74c3c', 3, '2026-01-22 22:03:16', '2026-01-22 22:03:16'),
(4, 'Business Hours', '24 Hours', '#9b59b6', 4, '2026-01-22 22:03:16', '2026-01-24 12:34:22');

-- --------------------------------------------------------

--
-- Table structure for table `contact_map`
--

CREATE TABLE `contact_map` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) NOT NULL,
  `map_embed_url` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_map`
--

INSERT INTO `contact_map` (`id`, `heading`, `map_embed_url`, `created_at`, `updated_at`) VALUES
(1, 'Find Us Here', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.664091987287!2d80.67781337405115!3d7.27900831392492!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae36742fb1bfb79%3A0xd5c20febb4af49d0!2sInnovior%20institute%20of%20technology%20studies!5e0!3m2!1sen!2slk!4v1768102576611!5m2!1sen!2sslk', '2026-01-22 22:03:16', '2026-01-22 22:14:31');

-- --------------------------------------------------------

--
-- Table structure for table `cta_section`
--

CREATE TABLE `cta_section` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `button_text` varchar(255) NOT NULL,
  `button_link` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cta_section`
--

INSERT INTO `cta_section` (`id`, `heading`, `description`, `button_text`, `button_link`, `created_at`, `updated_at`) VALUES
(1, 'Let\'s Build Something Powerful', 'Partner with Innovior and transform your ideas into scalable digital products.', 'Start Your Project With Us', '/contact', '2026-01-22 18:49:45', '2026-01-22 18:54:00');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `footers`
--

CREATE TABLE `footers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) NOT NULL DEFAULT 'Innovior',
  `company_description` text DEFAULT NULL,
  `facebook_url` varchar(255) DEFAULT NULL,
  `linkedin_url` varchar(255) DEFAULT NULL,
  `instagram_url` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `copyright_text` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footers`
--

INSERT INTO `footers` (`id`, `company_name`, `company_description`, `facebook_url`, `linkedin_url`, `instagram_url`, `address`, `phone`, `email`, `copyright_text`, `created_at`, `updated_at`) VALUES
(1, 'Innovior wweww', 'dcfscsdswwww', NULL, NULL, NULL, 'ytjhdgjwwwwdfbxdfb', '01234567892225555', 'admin@gmail.comwwwxfbxzfb', 'yyywwwwcgbnx', '2026-01-24 10:41:50', '2026-01-25 00:54:40');

-- --------------------------------------------------------

--
-- Table structure for table `headers`
--

CREATE TABLE `headers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `logo_alt_text` varchar(255) NOT NULL DEFAULT 'Innovior Logo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `headers`
--

INSERT INTO `headers` (`id`, `logo`, `logo_alt_text`, `created_at`, `updated_at`) VALUES
(1, 'header/iUSSwOkePoWFdcgzAMaYlURIRFDTyKiWsbgEu5ip.jpg', 'Innovior Logo1212', '2026-01-24 10:24:24', '2026-01-25 02:02:20');

-- --------------------------------------------------------

--
-- Table structure for table `industries_cta`
--

CREATE TABLE `industries_cta` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `button_text` varchar(255) NOT NULL,
  `button_link` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `industries_cta`
--

INSERT INTO `industries_cta` (`id`, `heading`, `description`, `button_text`, `button_link`, `created_at`, `updated_at`) VALUES
(1, 'Innovate Within Your Sector', 'Discuss your industry-specific challenges with our consultants today.', 'Schedule a Consultation', '/contact', '2026-01-22 19:46:32', '2026-01-22 19:46:32');

-- --------------------------------------------------------

--
-- Table structure for table `industries_hero`
--

CREATE TABLE `industries_hero` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `badge` varchar(255) NOT NULL DEFAULT 'Sectors We Serve',
  `heading` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `hero_image` varchar(255) DEFAULT NULL,
  `background_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `industries_hero`
--

INSERT INTO `industries_hero` (`id`, `badge`, `heading`, `description`, `hero_image`, `background_image`, `created_at`, `updated_at`) VALUES
(1, 'Sectors We Serve66', 'Technology Built for Real-World Impact66', 'Innovior delivers tailored software solutions across diverse industries, helping organizations scale, innovate, and lead in their markets.66', 'heroes/industries/nH463np7QqEPBwBs8qGThTf9RkYaDciJ9uFvNbt6.jpg', NULL, '2026-01-22 19:46:32', '2026-01-24 09:52:40');

-- --------------------------------------------------------

--
-- Table structure for table `industries_intro`
--

CREATE TABLE `industries_intro` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `stat_1_number` varchar(255) NOT NULL,
  `stat_1_label` varchar(255) NOT NULL,
  `stat_2_number` varchar(255) NOT NULL,
  `stat_2_label` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `industries_intro`
--

INSERT INTO `industries_intro` (`id`, `heading`, `description`, `stat_1_number`, `stat_1_label`, `stat_2_number`, `stat_2_label`, `created_at`, `updated_at`) VALUES
(1, 'Understanding Your Challenges', 'Every industry operates differently. We don\'t believe in one-size-fits-all. Our domain experts dive deep into your sector\'s regulations, workflows, and customer expectations to build software that actually works.', '8+', 'Industries Served', '100%', 'Compliance Ready', '2026-01-22 19:46:32', '2026-01-22 19:46:32');

-- --------------------------------------------------------

--
-- Table structure for table `industries_why`
--

CREATE TABLE `industries_why` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `industries_why`
--

INSERT INTO `industries_why` (`id`, `heading`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Why Innovior for Your Industry?', 'We don\'t just write code. We understand the specific regulatory and operational demands of your sector.', 'industries/why-us.jpg', '2026-01-22 19:46:32', '2026-01-22 19:46:32');

-- --------------------------------------------------------

--
-- Table structure for table `industries_why_items`
--

CREATE TABLE `industries_why_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `industries_why_items`
--

INSERT INTO `industries_why_items` (`id`, `heading`, `description`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Enterprise Security', 'Built-in compliance with GDPR, HIPAA, and ISO standards.', 1, '2026-01-22 19:46:32', '2026-01-22 19:46:32'),
(2, 'Scalable Architecture', 'Systems designed to handle millions of users and transactions.', 2, '2026-01-22 19:46:32', '2026-01-22 19:46:32'),
(3, 'Domain Expertise', 'Our team includes experts who have worked in your specific field.', 3, '2026-01-22 19:46:32', '2026-01-22 19:46:32');

-- --------------------------------------------------------

--
-- Table structure for table `industry_cards`
--

CREATE TABLE `industry_cards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `industry_cards`
--

INSERT INTO `industry_cards` (`id`, `title`, `description`, `image`, `link`, `order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Healthcare', 'Secure telemedicine, patient management systems, and HIPAA-compliant data solutions.', 'industries/IWmExS1UJDMpTraEC9uADhh6Lucv2DfSdYzKEQYx.jpg', '#', 1, 1, '2026-01-22 19:46:32', '2026-01-23 23:32:11'),
(2, 'Finance & Fintech', 'High-frequency trading platforms, secure payment gateways, and fraud detection AI.', 'industries/1R41z6c5Awlx3aldjXydzFCTAYiMEQk8XyoLpryy.jpg', '#', 2, 1, '2026-01-22 19:46:32', '2026-01-22 19:52:16'),
(3, 'Manufacturing', 'IoT-enabled factory automation, supply chain tracking, and predictive maintenance.', 'industries/OigrSlKDqlxacd9gWtNq4bLklBWoOXZpopkjLS4o.jpg', '#', 3, 1, '2026-01-22 19:46:32', '2026-01-22 19:52:27'),
(4, 'Education', 'LMS platforms, student portals, and virtual classrooms for modern learning.', 'industries/XxxpfvvGxm31gXyKi8zveA4luIqGbvp5QfE3Rgqg.jpg', '#', 4, 1, '2026-01-22 19:46:32', '2026-01-22 19:52:35'),
(5, 'Retail & E-Commerce', 'Omnichannel shopping experiences, inventory management, and customer loyalty apps.', 'industries/dKLYv04fm9N8XPqbhaOE7fzh6zyeC4uxV4UngN1w.jpg', '#', 5, 1, '2026-01-22 19:46:32', '2026-01-22 19:52:41'),
(6, 'Logistics', 'Fleet management, route optimization, and real-time shipment tracking systems.', 'industries/UgmJRANNcjw5u0YQgbrKDCaNOrHZBaEGUR4MY9b0.jpg', '#', 6, 1, '2026-01-22 19:46:32', '2026-01-22 19:52:49');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_01_23_000001_create_pages_table', 2),
(5, '2026_01_23_000002_create_sliders_table', 3),
(6, '2026_01_23_000003_create_home_sections_tables', 4),
(7, '2026_01_23_000004_create_services_page_tables', 5),
(8, '2026_01_23_000005_create_industries_page_tables', 6),
(9, '2026_01_23_000006_create_about_page_tables', 7),
(10, '2026_01_23_000007_create_works_page_tables', 8),
(11, '2026_01_23_000008_modify_icon_svg_column', 9),
(12, '2026_01_23_000009_create_news_page_tables', 10),
(13, '2026_01_23_000010_create_news_latest_section', 11),
(14, '2026_01_23_000011_create_careers_page_tables', 12),
(15, '2026_01_23_000012_create_contact_page_tables', 13),
(16, '2026_01_23_000013_add_background_images_to_hero_sections', 14),
(17, '2026_01_24_000001_add_hero_fields_to_about_section', 15),
(18, '2026_01_24_000002_add_hero_image_to_pages', 16),
(19, '2026_01_24_000003_create_headers_table', 17),
(20, '2026_01_24_000004_create_footers_table', 18);

-- --------------------------------------------------------

--
-- Table structure for table `news_articles`
--

CREATE TABLE `news_articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `excerpt` text NOT NULL,
  `content` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `published_date` date NOT NULL,
  `read_time` int(11) NOT NULL DEFAULT 5,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_articles`
--

INSERT INTO `news_articles` (`id`, `category_id`, `title`, `slug`, `excerpt`, `content`, `image`, `author`, `published_date`, `read_time`, `is_featured`, `is_active`, `order`, `created_at`, `updated_at`) VALUES
(2, 2, 'Expanding Our Engineering Team: We\'re Hiring!', 'expanding-our-engineering-team-were-hiring', 'Join our growing team of talented engineers and innovators. We\'re looking for passionate developers to help us build the future of digital solutions.', NULL, NULL, 'Innovior Team', '2026-01-05', 4, 0, 1, 1, '2026-01-22 20:47:35', '2026-01-22 21:18:42'),
(10, 1, 'Innovior Launches Next-Gen AI Integration Platform', 'innovior-launches-next-gen-ai-integration-platform', 'We\'re excited to announce the release of our revolutionary AI integration platform that simplifies machine learning implementation for enterprises of all sizes. This breakthrough solution combines our years of expertise in AI implementation with user-friendly design.', NULL, 'news/Nx8AEPm0Gkq8JJtWCNqVKbytteX4g30AUq9J5yYD.jpg', 'Innovior Team', '2026-01-14', 8, 0, 1, 0, '2026-01-22 21:18:42', '2026-01-23 23:37:06'),
(11, 1, 'Cloud Migration Best Practices: A Complete Guide', 'cloud-migration-best-practices-complete-guide', 'Discover proven strategies for migrating your business applications to the cloud. Our experts share insights from working with Fortune 500 companies.', NULL, NULL, 'Innovior Team', '2025-12-28', 6, 0, 1, 2, '2026-01-22 21:18:42', '2026-01-22 21:18:42'),
(12, 3, 'IoT Solutions Suite v2.0 Now Available', 'iot-solutions-suite-v2-now-available', 'We\'ve released the latest version of our IoT solutions suite with enhanced security features, improved performance, and new integrations.', NULL, NULL, 'Innovior Team', '2025-12-20', 5, 0, 1, 3, '2026-01-22 21:18:42', '2026-01-22 21:18:42'),
(13, 1, 'The Future of Cybersecurity in 2026', 'the-future-of-cybersecurity-in-2026', 'Explore emerging cybersecurity trends and threats as we head into 2026. Our security experts discuss zero-trust architecture and AI-powered threat detection.', NULL, NULL, 'Innovior Team', '2025-12-15', 7, 0, 1, 4, '2026-01-22 21:18:42', '2026-01-22 21:18:42'),
(14, 2, 'Innovior Wins Industry Excellence Award 2025', 'innovior-wins-industry-excellence-award-2025', 'We\'re honored to receive the Industry Excellence Award for our outstanding contributions to digital transformation and innovation in enterprise solutions.', NULL, NULL, 'Innovior Team', '2026-01-23', 3, 1, 1, 5, '2026-01-22 21:18:42', '2026-01-22 21:20:30'),
(16, 3, 'hELLO wORLD', 'hello-world', 'ASAASSA', NULL, NULL, NULL, '2026-01-23', 5, 0, 1, 0, '2026-01-22 21:23:49', '2026-01-22 21:23:49');

-- --------------------------------------------------------

--
-- Table structure for table `news_categories`
--

CREATE TABLE `news_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_categories`
--

INSERT INTO `news_categories` (`id`, `name`, `slug`, `order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Technology', 'technology', 1, 1, '2026-01-22 20:47:35', '2026-01-22 21:18:42'),
(2, 'Company', 'company', 2, 1, '2026-01-22 20:47:35', '2026-01-22 21:18:42'),
(3, 'Product Launch', 'product-launch', 3, 1, '2026-01-22 20:47:35', '2026-01-22 21:18:42'),
(4, 'system', 'system', 4, 1, '2026-01-22 20:58:50', '2026-01-22 20:58:50');

-- --------------------------------------------------------

--
-- Table structure for table `news_hero`
--

CREATE TABLE `news_hero` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `background_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_hero`
--

INSERT INTO `news_hero` (`id`, `heading`, `description`, `background_image`, `created_at`, `updated_at`) VALUES
(1, 'News & Updates', 'Stay informed about the latest developments, innovations, and success stories from Innovior.', 'news/9EN1tPRQLCQrDX9zxplckXCOrrvkc5p4yS3jq8sH.jpg', '2026-01-22 20:47:35', '2026-01-23 23:36:06'),
(2, 'News & Updates', 'Stay informed about the latest developments, innovations, and success stories from Innovior.', NULL, '2026-01-22 21:16:56', '2026-01-22 21:16:56');

-- --------------------------------------------------------

--
-- Table structure for table `news_latest_section`
--

CREATE TABLE `news_latest_section` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) NOT NULL DEFAULT 'Latest News',
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_latest_section`
--

INSERT INTO `news_latest_section` (`id`, `heading`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Latest News', 'dscDC', '2026-01-22 21:18:42', '2026-01-22 21:21:12');

-- --------------------------------------------------------

--
-- Table structure for table `news_newsletter`
--

CREATE TABLE `news_newsletter` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `button_text` varchar(255) NOT NULL DEFAULT 'Subscribe',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_newsletter`
--

INSERT INTO `news_newsletter` (`id`, `heading`, `description`, `button_text`, `created_at`, `updated_at`) VALUES
(1, 'Stay Updated', 'Subscribe to our newsletter and get the latest news, insights, and updates delivered directly to your inbox.', 'Subscribe', '2026-01-22 20:47:35', '2026-01-22 21:18:42');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `process_steps`
--

CREATE TABLE `process_steps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `process_steps`
--

INSERT INTO `process_steps` (`id`, `title`, `description`, `image`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Discover', 'Understanding your goals and challenges.', NULL, 1, '2026-01-22 18:49:45', '2026-01-22 18:49:45'),
(2, 'Design', 'Crafting scalable and user-focused solutions.', NULL, 2, '2026-01-22 18:49:45', '2026-01-22 18:49:45'),
(3, 'Develop', 'Building secure and optimized systems.', NULL, 3, '2026-01-22 18:49:45', '2026-01-22 18:49:45'),
(4, 'Deploy', 'Launching, monitoring, and scaling.', NULL, 4, '2026-01-22 18:49:45', '2026-01-22 18:49:45');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `client` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `category_id`, `title`, `description`, `image`, `client`, `duration`, `link`, `order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 'E-Commerce Platform Redesign', 'Complete redesign and modernization of a large-scale e-commerce platform resulting in 40% increase in conversion rates.', NULL, 'Fortune 500 Company', '6 Months', '#', 1, 1, '2026-01-22 20:30:22', '2026-01-22 20:30:22'),
(2, 2, 'Smart Agriculture Management System', 'IoT-based smart farming solution with real-time monitoring, reducing crop loss by 35% and increasing yield efficiency.', NULL, 'Agricultural Company', '4 Months', '#', 2, 1, '2026-01-22 20:30:22', '2026-01-22 20:30:22'),
(3, 3, 'Predictive Analytics Engine', 'Machine learning-based predictive analytics platform enabling data-driven decision making and business intelligence.', NULL, 'Tech Startup', '8 Months', '#', 3, 1, '2026-01-22 20:30:22', '2026-01-22 20:30:22'),
(4, 4, 'Digital Transformation Initiative', 'Comprehensive digital transformation strategy and implementation for global enterprise improving operational efficiency by 45%.', NULL, 'Global Enterprise', '12 Months', '#', 4, 1, '2026-01-22 20:30:22', '2026-01-22 20:30:22'),
(5, 1, 'Mobile Banking Application', 'Secure, user-friendly mobile banking app with advanced features serving 500K+ active users daily.', NULL, 'Financial Institution', '9 Months', '#', 5, 1, '2026-01-22 20:30:22', '2026-01-22 20:30:22'),
(6, 2, 'Industrial IoT Infrastructure', 'Enterprise-grade IoT infrastructure for manufacturing with real-time analytics and predictive maintenance capabilities.', NULL, 'Manufacturing Co.', '10 Months', '#', 6, 1, '2026-01-22 20:30:22', '2026-01-22 20:30:22');

-- --------------------------------------------------------

--
-- Table structure for table `project_categories`
--

CREATE TABLE `project_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_categories`
--

INSERT INTO `project_categories` (`id`, `name`, `slug`, `order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Software Development', 'software', 1, 1, '2026-01-22 20:30:22', '2026-01-22 20:30:22'),
(2, 'IoT Solutions', 'iot', 2, 1, '2026-01-22 20:30:22', '2026-01-22 20:30:22'),
(3, 'AI & ML', 'ai', 3, 1, '2026-01-22 20:30:22', '2026-01-22 20:30:22'),
(4, 'Enterprise', 'enterprise', 4, 1, '2026-01-22 20:30:22', '2026-01-22 20:30:22');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `description`, `icon`, `link`, `order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Web Development', 'High-performance web platforms using modern frameworks and cloud-ready architectures.', 'images/service-web.jpeg', '#', 1, 1, '2026-01-22 18:47:55', '2026-01-22 18:47:55'),
(2, 'Mobile Applications', 'Scalable Android and iOS applications built for speed, security, and native user experience.', 'images/service-mobile.jpeg', '#', 2, 1, '2026-01-22 18:47:55', '2026-01-22 18:47:55'),
(3, 'Enterprise Systems', 'Powerful dashboards, internal systems, and automation platforms for large businesses.', 'images/service-enterprise.jpeg', '#', 3, 1, '2026-01-22 18:47:55', '2026-01-22 18:47:55'),
(4, 'Web Development', 'High-performance web platforms using modern frameworks and cloud-ready architectures.', 'images/service-web.jpeg', '#', 1, 1, '2026-01-22 18:49:45', '2026-01-22 18:49:45'),
(5, 'Mobile Applications', 'Scalable Android and iOS applications built for speed, security, and native user experience.', 'images/service-mobile.jpeg', '#', 2, 1, '2026-01-22 18:49:45', '2026-01-22 18:49:45'),
(6, 'Enterprise Systems', 'Powerful dashboards, internal systems, and automation platforms for large businesses.', 'images/service-enterprise.jpeg', '#', 3, 1, '2026-01-22 18:49:45', '2026-01-22 18:49:45');

-- --------------------------------------------------------

--
-- Table structure for table `services_cta`
--

CREATE TABLE `services_cta` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `button_text` varchar(255) NOT NULL,
  `button_link` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services_cta`
--

INSERT INTO `services_cta` (`id`, `heading`, `description`, `button_text`, `button_link`, `created_at`, `updated_at`) VALUES
(1, 'Ready to Transform Your Business?', 'Let\'s discuss how Innovior can build the perfect solution for you.', 'Get a Free Consultation', '/contact', '2026-01-22 19:21:26', '2026-01-22 19:21:26');

-- --------------------------------------------------------

--
-- Table structure for table `services_hero`
--

CREATE TABLE `services_hero` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `badge` varchar(255) NOT NULL DEFAULT 'Our Expertise',
  `heading` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `hero_image` varchar(255) DEFAULT NULL,
  `background_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services_hero`
--

INSERT INTO `services_hero` (`id`, `badge`, `heading`, `description`, `hero_image`, `background_image`, `created_at`, `updated_at`) VALUES
(1, 'Our Expertiseyy', 'Digital Solutions for Modern Enterprisesyy', 'We build intelligent, scalable, and secure systems that drive business growth and operational excellence.yy', 'heroes/services/gtu6XV976MCrKnkgwtzP5KfLHAQ1wi0QRoaCugkY.jpg', NULL, '2026-01-22 19:21:26', '2026-01-24 09:52:00');

-- --------------------------------------------------------

--
-- Table structure for table `service_details`
--

CREATE TABLE `service_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL,
  `nav_title` varchar(255) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_details`
--

INSERT INTO `service_details` (`id`, `slug`, `nav_title`, `heading`, `description`, `image`, `order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'it-consultancy', 'IT Consultancy', 'IT Consultancy', 'Align your technology with your business goals. We provide strategic guidance to help you navigate digital transformation, optimize infrastructure, and reduce operational risks.', 'services/AloHkz74VtMAZ5hVaNRUuOs8TEzhat8IbHU1FwQ6.jpg', 1, 1, '2026-01-22 19:21:26', '2026-01-23 22:38:42'),
(2, 'software-dev', 'Software Dev', 'Software Development', 'We engineer high-performance software tailored to your specific needs. From consumer-facing apps to complex enterprise ERPs, we build code that scales.', 'services/B5kBg4srqzJyVvuYsNFMHzDuvIR9iZcV4w1SPIi9.jpg', 2, 1, '2026-01-22 19:21:26', '2026-01-22 19:31:39'),
(3, 'iot-robotics', 'IoT & Robotics', 'IoT & Robotics', 'Bridge the physical and digital worlds. We develop smart IoT ecosystems and robotic automation systems that improve efficiency and provide real-time data.', 'services/iot-robotics.jpg', 2, 1, '2026-01-22 19:21:26', '2026-01-22 19:23:59'),
(4, 'ai-solutions', 'AI Solutions', 'AI & Machine Learning', 'Turn data into decisions. We implement AI models that automate complex tasks, predict trends, and personalize customer experiences.', 'services/HaFpTKy350G9vXR5nQ3kVQwmM6ReLCgP0lCG8IKS.jpg', 4, 1, '2026-01-22 19:21:26', '2026-01-22 19:32:18'),
(5, 'education', 'Education', 'Training & Education', 'Through Innovior Institute (IITS), we empower the next generation of tech leaders. Our industry-focused curriculum bridges the gap between theory and practice.', 'services/CVoVCdhTc9cr4z7cO2bENKw8gruh4Nr8FWyzHq5N.jpg', 5, 1, '2026-01-22 19:21:26', '2026-01-22 19:32:33');

-- --------------------------------------------------------

--
-- Table structure for table `service_features`
--

CREATE TABLE `service_features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_detail_id` bigint(20) UNSIGNED NOT NULL,
  `feature_text` varchar(255) NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_features`
--

INSERT INTO `service_features` (`id`, `service_detail_id`, `feature_text`, `order`, `created_at`, `updated_at`) VALUES
(1, 1, 'Digital Strategy & Roadmaps', 1, '2026-01-22 19:21:26', '2026-01-22 19:21:26'),
(2, 1, 'Cloud & Infrastructure Audits', 2, '2026-01-22 19:21:26', '2026-01-22 19:21:26'),
(3, 1, 'Cybersecurity Assessment', 3, '2026-01-22 19:21:26', '2026-01-22 19:21:26'),
(4, 1, 'Tech Stack Modernization', 4, '2026-01-22 19:21:26', '2026-01-22 19:21:26'),
(5, 2, 'Custom Web Applications', 1, '2026-01-22 19:21:26', '2026-01-22 19:21:26'),
(6, 2, 'Mobile Apps (iOS & Android)', 2, '2026-01-22 19:21:26', '2026-01-22 19:21:26'),
(7, 2, 'SaaS Product Development', 3, '2026-01-22 19:21:26', '2026-01-22 19:21:26'),
(8, 2, 'API Development & Integration', 4, '2026-01-22 19:21:26', '2026-01-22 19:21:26'),
(9, 3, 'Industrial Automation', 1, '2026-01-22 19:21:26', '2026-01-22 19:21:26'),
(10, 3, 'Smart Agriculture Solutions', 2, '2026-01-22 19:21:26', '2026-01-22 19:21:26'),
(11, 3, 'IoT Sensor Networks', 3, '2026-01-22 19:21:26', '2026-01-22 19:21:26'),
(12, 3, 'Robotic Process Control', 4, '2026-01-22 19:21:26', '2026-01-22 19:21:26'),
(13, 4, 'Predictive Analytics', 1, '2026-01-22 19:21:26', '2026-01-22 19:21:26'),
(14, 4, 'Computer Vision Systems', 2, '2026-01-22 19:21:26', '2026-01-22 19:21:26'),
(15, 4, 'NLP & Chatbots', 3, '2026-01-22 19:21:26', '2026-01-22 19:21:26'),
(16, 4, 'Automated Decision Engines', 4, '2026-01-22 19:21:26', '2026-01-22 19:21:26'),
(17, 5, 'Corporate Tech Training', 1, '2026-01-22 19:21:26', '2026-01-22 19:21:26'),
(18, 5, 'Full-Stack Bootcamps', 2, '2026-01-22 19:21:26', '2026-01-22 19:21:26'),
(19, 5, 'IoT & AI Workshops', 3, '2026-01-22 19:21:26', '2026-01-22 19:21:26'),
(20, 5, 'Certification Programs', 4, '2026-01-22 19:21:26', '2026-01-22 19:21:26');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('e4B8bNwEaT6Wxmxz7KWRst7ztsgTDoTuGJdXoWB6', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoidWM4cVEyb0FUOUg5eWJpZnVReFVBbXRlWlVuTXJpNlNrdVFiQlpsTyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9hYm91dC1jb250ZW50IjtzOjU6InJvdXRlIjtzOjI1OiJhZG1pbi5hYm91dC1jb250ZW50LmluZGV4Ijt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjQ6ImF1dGgiO2E6MTp7czoyMToicGFzc3dvcmRfY29uZmlybWVkX2F0IjtpOjE3NjkzMjIyMzM7fX0=', 1769329429);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `button_text` varchar(255) DEFAULT NULL,
  `button_link` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `description`, `button_text`, `button_link`, `image`, `order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'New Slider', 'new slider 1', 'Apply Now', 'jnds', 'sliders/n9SksTOnaUfRMetJfhjpEbtaAIlHmE4r3CCkX4JX.png', 0, 1, '2026-01-22 18:26:39', '2026-01-22 18:26:39');

-- --------------------------------------------------------

--
-- Table structure for table `stats_banner`
--

CREATE TABLE `stats_banner` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `number` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stats_banner`
--

INSERT INTO `stats_banner` (`id`, `number`, `label`, `order`, `created_at`, `updated_at`) VALUES
(1, '10+', 'Projects Completed', 1, '2026-01-22 18:49:45', '2026-01-22 19:12:21'),
(2, '100%', 'Client Satisfaction', 2, '2026-01-22 18:49:45', '2026-01-22 18:49:45'),
(3, '24/7', 'Support', 3, '2026-01-22 18:49:45', '2026-01-22 18:49:45'),
(4, '5+', 'Years Innovation', 4, '2026-01-22 18:49:45', '2026-01-22 18:49:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'praveen', 'praveen@gmail.com', NULL, '$2y$12$RefAxURFrxEELRz3rZT5wOTr1kW4YjgqxtL7qviXy6tI0bdFQp2zW', 1, 'GYj4NkVUCJQC90TqmnZl2cVvG89ZSFancTj07WNubOANHSKGp0WOFRtGyDMR', '2026-01-22 16:04:08', '2026-01-22 16:23:56');

-- --------------------------------------------------------

--
-- Table structure for table `works_cta`
--

CREATE TABLE `works_cta` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) NOT NULL DEFAULT 'Ready to Transform Your Business?',
  `description` text DEFAULT NULL,
  `button_text` varchar(255) NOT NULL DEFAULT 'Start Your Project',
  `button_link` varchar(255) NOT NULL DEFAULT '/contact',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `works_cta`
--

INSERT INTO `works_cta` (`id`, `heading`, `description`, `button_text`, `button_link`, `created_at`, `updated_at`) VALUES
(1, 'Ready to Transform Your Business?', 'Let\'s discuss how we can deliver similar results for your organization.', 'Start Your Project', '/contact', '2026-01-22 20:31:27', '2026-01-22 20:31:27');

-- --------------------------------------------------------

--
-- Table structure for table `works_hero`
--

CREATE TABLE `works_hero` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) NOT NULL DEFAULT 'Our Works',
  `description` text DEFAULT NULL,
  `background_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `works_hero`
--

INSERT INTO `works_hero` (`id`, `heading`, `description`, `background_image`, `created_at`, `updated_at`) VALUES
(1, 'Our Worksttg', 'Explore the innovative projects and transformative solutions we\'ve delivered to businesses worldwide.fdgzdf', 'works/V6unaInUvF1wbDBS1aozkG5OCYQed2BsRD9fTZ0d.jpg', '2026-01-22 20:30:22', '2026-01-25 00:47:02'),
(2, 'Our Works', 'Explore the innovative projects and transformative solutions we\'ve delivered to businesses worldwide.', NULL, '2026-01-22 20:31:27', '2026-01-22 20:31:27');

-- --------------------------------------------------------

--
-- Table structure for table `works_stats`
--

CREATE TABLE `works_stats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) NOT NULL DEFAULT 'Our Impact',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `works_stats`
--

INSERT INTO `works_stats` (`id`, `heading`, `created_at`, `updated_at`) VALUES
(1, 'Our Impact', '2026-01-22 20:30:22', '2026-01-22 20:30:22'),
(2, 'Our Impact', '2026-01-22 20:31:27', '2026-01-22 20:31:27');

-- --------------------------------------------------------

--
-- Table structure for table `works_stat_items`
--

CREATE TABLE `works_stat_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `works_stats_id` bigint(20) UNSIGNED NOT NULL,
  `icon_svg` text DEFAULT NULL,
  `color` varchar(255) NOT NULL DEFAULT 'blue',
  `number` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `works_stat_items`
--

INSERT INTO `works_stat_items` (`id`, `works_stats_id`, `icon_svg`, `color`, `number`, `label`, `order`, `created_at`, `updated_at`) VALUES
(1, 2, '<svg width=\"32\" height=\"32\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">\r\n                    <path d=\"M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm3.5-9c.83 0 1.5-.67 1.5-1.5S16.33 8 15.5 8 14 8.67 14 9.5s.67 1.5 1.5 1.5zm-7 0c.83 0 1.5-.67 1.5-1.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11zm3.5 6.5c2.33 0 4.31-1.46 5.11-3.5H6.89c.8 2.04 2.78 3.5 5.11 3.5z\"></path>\r\n                </svg>', 'blue', '100+', 'Successful Projects', 1, '2026-01-22 20:31:27', '2026-01-22 20:31:27'),
(2, 2, '<svg width=\"32\" height=\"32\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">\r\n                    <path d=\"M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2\"></path>\r\n                    <circle cx=\"9\" cy=\"7\" r=\"4\"></circle>\r\n                    <path d=\"M23 21v-2a4 4 0 0 0-3-3.87\"></path>\r\n                    <path d=\"M16 3.13a4 4 0 0 1 0 7.75\"></path>\r\n                </svg>', 'purple', '50+', 'Happy Clients', 2, '2026-01-22 20:31:27', '2026-01-22 20:31:27'),
(3, 2, '<svg width=\"32\" height=\"32\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">\r\n                    <polyline points=\"22 12 18 12 15 21 9 3 6 12 2 12\"></polyline>\r\n                </svg>', 'red', '40%', 'Avg. Efficiency Gain', 3, '2026-01-22 20:31:27', '2026-01-22 20:31:27'),
(4, 2, '<svg width=\"32\" height=\"32\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">\r\n                    <circle cx=\"12\" cy=\"12\" r=\"10\"></circle>\r\n                    <polyline points=\"12 6 12 12 16 14\"></polyline>\r\n                </svg>', 'blue', '500+', 'Team Hours Invested', 4, '2026-01-22 20:31:27', '2026-01-22 20:31:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_culture`
--
ALTER TABLE `about_culture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_culture_highlights`
--
ALTER TABLE `about_culture_highlights`
  ADD PRIMARY KEY (`id`),
  ADD KEY `about_culture_highlights_about_culture_id_foreign` (`about_culture_id`);

--
-- Indexes for table `about_hero`
--
ALTER TABLE `about_hero`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_mvv`
--
ALTER TABLE `about_mvv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_offices`
--
ALTER TABLE `about_offices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_office_locations`
--
ALTER TABLE `about_office_locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `about_office_locations_about_offices_id_foreign` (`about_offices_id`);

--
-- Indexes for table `about_overview`
--
ALTER TABLE `about_overview`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_partners`
--
ALTER TABLE `about_partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_partner_items`
--
ALTER TABLE `about_partner_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `about_partner_items_about_partners_id_foreign` (`about_partners_id`);

--
-- Indexes for table `about_section`
--
ALTER TABLE `about_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_why`
--
ALTER TABLE `about_why`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_why_items`
--
ALTER TABLE `about_why_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `about_why_items_about_why_id_foreign` (`about_why_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `careers_cta`
--
ALTER TABLE `careers_cta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `careers_culture`
--
ALTER TABLE `careers_culture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `careers_culture_cards`
--
ALTER TABLE `careers_culture_cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `careers_hero`
--
ALTER TABLE `careers_hero`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `careers_openings`
--
ALTER TABLE `careers_openings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `careers_process`
--
ALTER TABLE `careers_process`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `careers_process_steps`
--
ALTER TABLE `careers_process_steps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `careers_why_items`
--
ALTER TABLE `careers_why_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `careers_why_section`
--
ALTER TABLE `careers_why_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_form_settings`
--
ALTER TABLE `contact_form_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_hero`
--
ALTER TABLE `contact_hero`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_info`
--
ALTER TABLE `contact_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_info_cards`
--
ALTER TABLE `contact_info_cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_map`
--
ALTER TABLE `contact_map`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cta_section`
--
ALTER TABLE `cta_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `footers`
--
ALTER TABLE `footers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `headers`
--
ALTER TABLE `headers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `industries_cta`
--
ALTER TABLE `industries_cta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `industries_hero`
--
ALTER TABLE `industries_hero`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `industries_intro`
--
ALTER TABLE `industries_intro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `industries_why`
--
ALTER TABLE `industries_why`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `industries_why_items`
--
ALTER TABLE `industries_why_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `industry_cards`
--
ALTER TABLE `industry_cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_articles`
--
ALTER TABLE `news_articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `news_articles_slug_unique` (`slug`),
  ADD KEY `news_articles_category_id_foreign` (`category_id`);

--
-- Indexes for table `news_categories`
--
ALTER TABLE `news_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `news_categories_slug_unique` (`slug`);

--
-- Indexes for table `news_hero`
--
ALTER TABLE `news_hero`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_latest_section`
--
ALTER TABLE `news_latest_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_newsletter`
--
ALTER TABLE `news_newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `process_steps`
--
ALTER TABLE `process_steps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_category_id_foreign` (`category_id`);

--
-- Indexes for table `project_categories`
--
ALTER TABLE `project_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services_cta`
--
ALTER TABLE `services_cta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services_hero`
--
ALTER TABLE `services_hero`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_details`
--
ALTER TABLE `service_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `service_details_slug_unique` (`slug`);

--
-- Indexes for table `service_features`
--
ALTER TABLE `service_features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_features_service_detail_id_foreign` (`service_detail_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stats_banner`
--
ALTER TABLE `stats_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `works_cta`
--
ALTER TABLE `works_cta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `works_hero`
--
ALTER TABLE `works_hero`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `works_stats`
--
ALTER TABLE `works_stats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `works_stat_items`
--
ALTER TABLE `works_stat_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `works_stat_items_works_stats_id_foreign` (`works_stats_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_culture`
--
ALTER TABLE `about_culture`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `about_culture_highlights`
--
ALTER TABLE `about_culture_highlights`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `about_hero`
--
ALTER TABLE `about_hero`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `about_mvv`
--
ALTER TABLE `about_mvv`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `about_offices`
--
ALTER TABLE `about_offices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `about_office_locations`
--
ALTER TABLE `about_office_locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `about_overview`
--
ALTER TABLE `about_overview`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `about_partners`
--
ALTER TABLE `about_partners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `about_partner_items`
--
ALTER TABLE `about_partner_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `about_section`
--
ALTER TABLE `about_section`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `about_why`
--
ALTER TABLE `about_why`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `about_why_items`
--
ALTER TABLE `about_why_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `careers_cta`
--
ALTER TABLE `careers_cta`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `careers_culture`
--
ALTER TABLE `careers_culture`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `careers_culture_cards`
--
ALTER TABLE `careers_culture_cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `careers_hero`
--
ALTER TABLE `careers_hero`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `careers_openings`
--
ALTER TABLE `careers_openings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `careers_process`
--
ALTER TABLE `careers_process`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `careers_process_steps`
--
ALTER TABLE `careers_process_steps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `careers_why_items`
--
ALTER TABLE `careers_why_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `careers_why_section`
--
ALTER TABLE `careers_why_section`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_form_settings`
--
ALTER TABLE `contact_form_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_hero`
--
ALTER TABLE `contact_hero`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_info`
--
ALTER TABLE `contact_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_info_cards`
--
ALTER TABLE `contact_info_cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact_map`
--
ALTER TABLE `contact_map`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cta_section`
--
ALTER TABLE `cta_section`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `footers`
--
ALTER TABLE `footers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `headers`
--
ALTER TABLE `headers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `industries_cta`
--
ALTER TABLE `industries_cta`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `industries_hero`
--
ALTER TABLE `industries_hero`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `industries_intro`
--
ALTER TABLE `industries_intro`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `industries_why`
--
ALTER TABLE `industries_why`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `industries_why_items`
--
ALTER TABLE `industries_why_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `industry_cards`
--
ALTER TABLE `industry_cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `news_articles`
--
ALTER TABLE `news_articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `news_categories`
--
ALTER TABLE `news_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `news_hero`
--
ALTER TABLE `news_hero`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `news_latest_section`
--
ALTER TABLE `news_latest_section`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `news_newsletter`
--
ALTER TABLE `news_newsletter`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `process_steps`
--
ALTER TABLE `process_steps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `project_categories`
--
ALTER TABLE `project_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `services_cta`
--
ALTER TABLE `services_cta`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services_hero`
--
ALTER TABLE `services_hero`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `service_details`
--
ALTER TABLE `service_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `service_features`
--
ALTER TABLE `service_features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stats_banner`
--
ALTER TABLE `stats_banner`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `works_cta`
--
ALTER TABLE `works_cta`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `works_hero`
--
ALTER TABLE `works_hero`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `works_stats`
--
ALTER TABLE `works_stats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `works_stat_items`
--
ALTER TABLE `works_stat_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `about_culture_highlights`
--
ALTER TABLE `about_culture_highlights`
  ADD CONSTRAINT `about_culture_highlights_about_culture_id_foreign` FOREIGN KEY (`about_culture_id`) REFERENCES `about_culture` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `about_office_locations`
--
ALTER TABLE `about_office_locations`
  ADD CONSTRAINT `about_office_locations_about_offices_id_foreign` FOREIGN KEY (`about_offices_id`) REFERENCES `about_offices` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `about_partner_items`
--
ALTER TABLE `about_partner_items`
  ADD CONSTRAINT `about_partner_items_about_partners_id_foreign` FOREIGN KEY (`about_partners_id`) REFERENCES `about_partners` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `about_why_items`
--
ALTER TABLE `about_why_items`
  ADD CONSTRAINT `about_why_items_about_why_id_foreign` FOREIGN KEY (`about_why_id`) REFERENCES `about_why` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `news_articles`
--
ALTER TABLE `news_articles`
  ADD CONSTRAINT `news_articles_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `news_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `project_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `service_features`
--
ALTER TABLE `service_features`
  ADD CONSTRAINT `service_features_service_detail_id_foreign` FOREIGN KEY (`service_detail_id`) REFERENCES `service_details` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `works_stat_items`
--
ALTER TABLE `works_stat_items`
  ADD CONSTRAINT `works_stat_items_works_stats_id_foreign` FOREIGN KEY (`works_stats_id`) REFERENCES `works_stats` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

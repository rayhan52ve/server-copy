-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 02, 2024 at 11:55 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `server_copy`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_details` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `short_details`, `image1`, `image2`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'website-banner/banner-1204412964.jpg', 'website-banner/banner-988423868.jpg', '2023-06-05 22:45:24', '2024-02-24 22:33:24'),
(2, NULL, NULL, 'website-banner/banner-932596199.jpg', 'website-banner/banner-827975204.jpg', '2023-06-05 22:47:54', '2024-02-24 22:33:47'),
(3, NULL, NULL, 'website-banner/banner-1344875548.jpg', 'website-banner/banner-222061647.jpg', '2023-06-05 22:49:10', '2024-02-24 22:34:04');

-- --------------------------------------------------------

--
-- Table structure for table `banner_and_titles`
--

CREATE TABLE `banner_and_titles` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `page` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banner_and_titles`
--

INSERT INTO `banner_and_titles` (`id`, `title`, `image`, `page`, `created_at`, `updated_at`) VALUES
(1, 'Meet Our Expert & Experienced Team Members.', 'banner/banner-959891325.png', 'doctors', '2023-06-04 00:08:08', '2023-07-08 19:42:12'),
(2, NULL, 'banner/banner-1463461440.jpg', 'services', '2023-06-04 01:07:22', '2024-02-25 04:08:58'),
(3, 'Our Simple & Affordable Package.', 'banner/banner-2056917540.jpg', 'packages', '2023-06-04 01:26:14', '2024-02-25 03:55:18'),
(4, 'The Main Reason For Your Choice Is Our Best Service.', 'banner/banner-1136127184.jpg', 'testimonial', '2023-06-04 01:27:54', '2024-02-25 04:11:08'),
(5, 'Our Latest & Most Popular Tips & Tricks For You.', 'banner/banner-509614195.jpg', 'blogs', '2023-06-04 01:28:53', '2024-02-25 03:54:26'),
(6, 'Contacts us', 'banner/banner-231278525.png', 'doctors', '2023-06-04 03:17:11', '2023-07-16 10:46:05'),
(7, 'Shebar Alo Health Managments', 'banner/banner-1335666180.jpg', 'managements', '2023-06-04 03:49:10', '2024-02-25 04:10:51'),
(8, 'Book an Appointment', 'banner/banner-986947787.jpg', 'appointment', '2023-06-06 00:03:29', '2024-02-25 04:09:18'),
(9, NULL, 'banner/banner-1410996553.jpg', 'gallery', '2023-06-19 01:41:08', '2024-02-25 03:58:36'),
(10, NULL, 'banner/banner-1290735878.jpg', 'contacts', '2024-01-04 13:39:13', '2024-02-25 03:56:03');

-- --------------------------------------------------------

--
-- Table structure for table `biometric_infos`
--

CREATE TABLE `biometric_infos` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `biometric_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int DEFAULT '0' COMMENT '0=Pending,1=Accepted',
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `admin_comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `biometric_infos`
--

INSERT INTO `biometric_infos` (`id`, `user_id`, `file`, `type`, `biometric_no`, `status`, `comment`, `admin_comment`, `created_at`, `updated_at`) VALUES
(4, 24, NULL, '3', '78567567', NULL, NULL, NULL, '2024-04-25 08:56:13', '2024-04-25 08:56:13'),
(5, 25, NULL, '3', '54646', NULL, NULL, NULL, '2024-04-25 09:26:08', '2024-04-25 09:26:08');

-- --------------------------------------------------------

--
-- Table structure for table `biometric_types`
--

CREATE TABLE `biometric_types` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `biometric_types`
--

INSERT INTO `biometric_types` (`id`, `name`, `price`, `created_at`, `updated_at`) VALUES
(3, 'রবি বায়োমেট্রিক-২৫০ টাকা', '255', '2024-04-24 04:46:02', '2024-04-24 04:54:05'),
(9, 'গ্রামীণ য়োমেট্রিক-২৫০ টাকা', '50', '2024-05-02 03:31:52', '2024-05-02 03:31:52');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `number`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'shadhin', NULL, 'admin@itsolutionstuff.com', 'dsgfdsfsdfds', 'dsfdsfdsfsdfsdf', '2023-06-06 05:56:18', '2023-06-06 05:56:18'),
(2, 'fsdfsdf', NULL, 'shadhin@gmail.com', 'dsgfdsfsdfds', 'fgdfgdfgdfgdfgfd', '2023-06-06 05:57:01', '2023-06-06 05:57:01'),
(3, 'aaa', '534543', 'admin@itsolutionstuff.com', 'fdgdfgfd', 'fdgdfgdfgdfg dfgfdgfdg', '2023-06-06 05:58:01', '2023-06-06 05:58:01'),
(4, 'Anna  Wilson', '1201201200', 'annawilson.web@gmail.com', 'Need reliable and consistent accounting?', NULL, '2023-06-20 17:28:21', '2023-06-20 17:28:21'),
(5, 'Anna Wilson', '1201201200', 'annawilson.web@gmail.com', 'Re: Improve your website traffic and SEO', 'Hi,\r\n\r\nWe\'ll use SEO, Social Media Outreach, and Pay Per Click to get your website to the top of Google\'s results page.\r\n\r\nAs a result quality leads will consequently fill your schedule and you will get Traffic, leads and sales.\r\n\r\nIf this is of interest to you, please provide me with your name, email, and phone number.\r\n\r\nTo Your Success!\r\nAnna wilson\r\n\r\n\r\n\r\n(shebaralohealth.com)', '2023-06-20 20:56:32', '2023-06-20 20:56:32'),
(6, 'McCormack', '070 6096 0478', NULL, 'Rank your new website high on Google even if you do not know much about technology and the web - Get the Shineranker SEO tool - free ebook for you included and my help getting going', 'Hey, \r\n\r\nDo you want to know what is holding your website back and why you can not rank high in the Google searches to beat your competition? Do you not know much about technology and the web then join here www.shinerankerjoin.com\r\n\r\nI want to help you with a FREE site audit health check provided by this seo tool to determine the areas for improvement.\r\n\r\nGet your free 10 day trial today and then your audit  by visiting this website www.shinerankerjoin.com and signing up to the trial. \r\n\r\nIf you have any questions on signing up to this seo tool and want furthur information getting your free health check to make your new website more profitable email me for my free personnel advice on Joinshinereply@hotmail.com.\r\n\r\nOpt out of future messages by replying to this message or emailing Joinshinereply@hotmail.com and saying opt out. \r\n\r\nRegards,\r\n\r\nDale \r\n\r\nSEO specialist\r\n\r\nwww.shinerankerjoin.com', '2023-06-21 00:55:19', '2023-06-21 00:55:19'),
(7, 'Harvey Miller', '8458271444', 'harveymiller.web2@gmail.com', 'Question about your website', 'Hello,\r\n\r\nWe noticed SEO errors on your new website that may impact its visibility on search engines, leading to low visitor traffic. Let\'s schedule a call at your convenience to discuss and easily resolve these issues. If your new business is a priority, please provide your phone number and preferred time to call.\r\n\r\nThank you,\r\nHarvey Miller', '2023-06-22 01:16:02', '2023-06-22 01:16:02'),
(8, 'Angila Dates', '9058899464', 'angiladates791@gmail.com', 'Question about your websites', 'Hello,', '2023-06-22 20:10:18', '2023-06-22 20:10:18'),
(9, 'Angila Dates', '9058899464', 'angiladates791@gmail.com', 'Question about your websites', 'Hello,', '2023-06-22 20:10:28', '2023-06-22 20:10:28'),
(10, 'Maria Steinberg', '079 5211 6102', 'maria@furthertrends.com', 'did you know about this', 'Hey,\r\n\r\nI just wanted to make sure you got the chance to try out the new A.I. tool that turns your website content into videos while there\'s still a free plan.\r\n\r\nCheck it out here: http://furthertrends.com\r\n\r\n-Maria\r\n\r\nunsub from future comms: https://u.furthertrends.com', '2023-06-25 08:12:10', '2023-06-25 08:12:10'),
(11, 'RobertMor', NULL, 'alfredegov@gmail.com', 'Hi  i write about your the price for reseller', 'Ola, quería saber o seu prezo.', '2023-07-01 16:38:45', '2023-07-01 16:38:45'),
(12, 'RobertMor', NULL, 'alfredegov@gmail.com', 'Hello, i write about your   prices', 'Прывітанне, я хацеў даведацца Ваш прайс.', '2023-07-01 18:59:00', '2023-07-01 18:59:00'),
(13, 'Angelina', '1', 'qLjMHk.wmjmbpb@chiffon.fun', 'Norah Lowery', 'Norah Lowery', '2024-01-05 18:23:43', '2024-01-05 18:23:43'),
(14, 'Sallie Reagan', '070 3562 0132', 'reagan.sallie@gmail.com', 'Dear shebaralohealth.com Owner!', 'You\'re living proof that contact form blasting works! You just read my message and I can get millions of people to read YOUR message just the same way. Skype or email me below and I\'ll tell you how I can do contact form blasts for your business!\r\n\r\nP. Stewart\r\nSkype: live:.cid.e169e59bb6e6d159\r\nEmail: psPa77 9xa@gomail2.xyz', '2024-01-05 18:23:44', '2024-01-05 18:23:44'),
(15, 'Noreen Hacker', '302-368-8459', 'noreen.hacker@msn.com', 'Hi shebaralohealth.com Admin.', 'Contact form blasts work! I can put your ad message in front of millions for less than $100 the same way I just put this message in front of you! Reach out to me via Skype or Email for details.\r\n\r\nP. Stewart\r\nSkype: live:.cid.e169e59bb6e6d159\r\nEmail: ps19711@gomail2.xyz', '2024-01-09 07:21:47', '2024-01-09 07:21:47'),
(16, 'Lucy Johnson', '1234567890', 'lucyjohnson.web@gmail.com', 'Re: Call to update your website $', 'Hello,\r\n \r\nHope you are doing well\r\n \r\nI was surfing the internet and found your email contact.\r\n \r\n Are you looking for a website for your business or do you want to redesign your website with the latest features that might benefit the overall usability & user experience which usually leads to better sales! \r\n \r\nWe Deliver Following Services:\r\n\r\n∙         Web Designing & Development\r\n∙         Hosting and Domain Registration\r\n∙         Graphic Design & Logo Design\r\n∙         Add/Update new features\r\n \r\nLet me know if you are interested and want a fresh look so that we will be able to provide you with further solutions as per your requirements. \r\n \r\nI am looking forward to hearing from you soon.\r\n \r\nSincerely,\r\nLucy Johnson\r\n\r\nWishing you a fantastic New Year filled with achievements and growth!\r\n\r\n\r\nYour Website : shebaralohealth.com', '2024-01-18 05:21:45', '2024-01-18 05:21:45'),
(17, 'Una Thorby', '0316 6532089', 'thorby.una@hotmail.com', 'Dear shebaralohealth.com Owner.', 'Are you looking for a way to watch your favorite TV channels and movies on any device, anytime, anywhere? Look no further than OneTVIPTV.com , the best and most affordable IPTV service in the world (plans as low as $9/mnth) . With over 97,000 live TV channels and VOD, you will never run out of entertainment options. Sign up now and get a free trial for 24 hours. Don\'t miss this opportunity to enjoy the ultimate IPTV experience with OneTV IPTV. Go to Onetviptv.com', '2024-01-18 07:11:58', '2024-01-18 07:11:58'),
(18, 'Rosie', '1', 'Kupymi.qqdwqqmq@rottack.autos', 'Neil Marquez', 'Neil Marquez', '2024-01-24 06:04:14', '2024-01-24 06:04:14'),
(19, 'Ramiro Windeyer', '070 5925 7542', 'ramiro.windeyer@msn.com', 'Dear shebaralohealth.com Webmaster!', 'This message showed up to you and I can make your message show up to millions of websites the same way. It\'s awesome and low-cost.If you are interested, you can reach me via email or skype below.\r\n\r\nP. Stewart\r\nEmail: n6j0js@gomail2.xyz\r\nSkype: live:.cid.37ffc6c14225a4a8', '2024-01-25 21:07:52', '2024-01-25 21:07:52'),
(20, 'Ian Hocking', '01.14.88.77.75', 'ian.hocking41@gmail.com', 'We need Affiliates. Grab $2K Per Sale Affiliate Commission ... PLUS Your Share of $25K in Cash & Prizes!', 'The Traffic Syndicate is a new high-ticket traffic generation mastermind and weekly traffic coaching program. Affiliate commission is 40% per $5K sale ($2K) & your share of a $25K Prize Pool. Find out how to can access to your promo tools, and more, here:\r\n\r\nhttps://bit.ly/BeASyndicateAffililate', '2024-02-01 10:23:45', '2024-02-01 10:23:45'),
(21, 'Latoya Erlikilyika', '(08) 8312 8580', 'latoya.erlikilyika@gmail.com', 'Hi shebaralohealth.com Admin.', 'This message showed up to you and I can make your message show up to millions of websites the same way. It\'s awesome and low-cost.For more information, please email me or skype me below.\r\n\r\nP. Stewart\r\nEmail: kwpqfm@gomail2.xyz\r\nSkype: live:.cid.37ffc6c14225a4a8', '2024-02-04 07:33:54', '2024-02-04 07:33:54'),
(22, 'Saundra Christiansen', '928-857-5657', 'saundra.christiansen@googlemail.com', 'Hello shebaralohealth.com Admin.', 'New tech could give Chatgpt a run for its money.  It turns your Youtube videos into video games..keeps people engaged to watch every second.  You can even reward them for watching the whole video and they give you their email to get the reward ;) As seen on CBS, NBC, FOX, and ABC. \r\n\r\nSend me an email or skype message below to see if you qualify for a free GAMIFICATION of your video.\r\n\r\nMike\r\nemail: gamifyvideo@gmail.com\r\nskype: live:.cid.d347be37995c0a8d', '2024-02-05 11:10:45', '2024-02-05 11:10:45'),
(23, 'Eliza Macgroarty', '0699 151 80 67', 'eliza.macgroarty@gmail.com', 'Dear shebaralohealth.com Webmaster!', 'Seeking a trusted CPA for financial assurance and precise reporting? Explore our top-notch services, including expert financial statement audits, streamlined reviews, and comprehensive tax solutions. Elevate your financial game with San Diego CPA - where expertise meets tailored excellence. For a free consultation today, contact me directly or visit my site below.\r\n\r\n\r\nBest regards,\r\n\r\n\r\nMichelle Encines, Manager\r\nSan Diego, CPA A Professional Tax and Accountancy Corporation\r\nProfessional Advice. Sharper Results.\r\n5703 Oberlin Drive Suite 107\r\nSan Diego, CA 92121\r\n(858)246-6519 Office\r\n(866)272-8296 Toll free\r\n(858)800-3888 fax\r\nwww.sandiegocpas.com', '2024-02-05 17:29:27', '2024-02-05 17:29:27'),
(24, 'RobertMor', NULL, 'lucido.leinteract@gmail.com', 'Aloha  i writing about your   price', 'Hi, მინდოდა ვიცოდე თქვენი ფასი.', '2024-02-08 13:13:20', '2024-02-08 13:13:20');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint UNSIGNED NOT NULL,
  `faq_question` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `faq_answer` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `faq_home` int DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1' COMMENT '1= active; 0=deactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `faq_question`, `faq_answer`, `faq_home`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Who is my main point of contact?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, 1, '2024-02-19 05:26:22', '2024-02-19 05:27:24'),
(2, 'How long does onboarding take/when can I start?', 'With self-onboarding capabilities, the onboarding process can be done in a few days! You will provide necessary documents and information to Home365 through our online portal in order to start management whenever you please.', NULL, 1, '2024-02-19 05:48:50', '2024-02-19 05:48:50');

-- --------------------------------------------------------

--
-- Table structure for table `footer_details`
--

CREATE TABLE `footer_details` (
  `id` bigint UNSIGNED NOT NULL,
  `details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footer_details`
--

INSERT INTO `footer_details` (`id`, `details`, `credit`, `created_at`, `updated_at`) VALUES
(2, '© 2024-05-01 Design & Developed by US', '© 2024-04-25 Design & Developed by US', '2023-06-05 01:15:17', '2024-05-01 03:13:26');

-- --------------------------------------------------------

--
-- Table structure for table `id_card_orders`
--

CREATE TABLE `id_card_orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid_voter_birth_form_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int DEFAULT '0' COMMENT '0=Pending,1=Accepted',
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `admin_comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logos`
--

CREATE TABLE `logos` (
  `id` bigint UNSIGNED NOT NULL,
  `site_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `favicon` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logos`
--

INSERT INTO `logos` (`id`, `site_name`, `logo_image`, `favicon`, `created_at`, `updated_at`) VALUES
(1, 'Server Copy', 'logo/logo-2020016987.png', '/logo/logo-1187724315.png', '2023-06-08 03:23:59', '2024-04-25 00:05:40');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint UNSIGNED NOT NULL,
  `sign_copy` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `sign_copy_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `server_copy` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `server_copy_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_card` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `id_card_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `biometric` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `biometric_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `new_nid` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `new_nid_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `old_nid` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `old_nid_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `birth_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `server_unofficial` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `server_unofficial_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sign_copy`, `sign_copy_price`, `server_copy`, `server_copy_price`, `id_card`, `id_card_price`, `biometric`, `biometric_price`, `new_nid`, `new_nid_price`, `old_nid`, `old_nid_price`, `birth`, `birth_price`, `server_unofficial`, `server_unofficial_price`, `created_at`, `updated_at`) VALUES
(1, 'প্রতি সাইন কপি রেট ৫০ টাকা।', '50', 'dfgdfg', '54', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-01 02:17:55', '2024-05-01 09:34:41');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(18, '2023_05_29_072203_create_services_table', 2),
(19, '2023_05_30_071424_create_abouts_table', 2),
(21, '2023_05_31_060218_create_teams_table', 3),
(24, '2023_05_31_085553_create_testimonials_table', 4),
(25, '2023_05_31_101618_create_appointment_infos_table', 5),
(29, '2023_06_01_060829_create_packages_table', 6),
(31, '2023_06_01_074910_create_blogs_table', 7),
(33, '2023_06_04_054616_create_banner_and_titles_table', 8),
(34, '2023_06_04_092454_create_management_table', 9),
(37, '2023_06_04_105408_create_website_links_table', 11),
(38, '2023_06_05_070802_create_footer_details_table', 12),
(40, '2023_06_05_102842_create_banners_table', 13),
(42, '2023_06_06_095531_create_appointments_table', 14),
(43, '2023_06_06_113522_create_contact_us_table', 15),
(44, '2023_06_04_101518_create_logos_table', 16),
(47, '2023_06_13_071401_create_galleries_table', 17),
(48, '2023_06_13_082557_create_video_galleries_table', 17),
(49, '2023_06_20_094939_create_counters_table', 18),
(54, '2024_02_14_101543_create_properties_table', 19),
(58, '2024_02_15_080651_create_states_table', 20),
(65, '2024_02_17_041717_create_divisions_table', 21),
(70, '2024_02_18_051328_create_careers_table', 22),
(76, '2024_02_19_054721_create_applies_table', 23),
(80, '2024_02_19_100004_create_faqs_table', 24),
(85, '2024_02_20_041550_create_affiliates_table', 25),
(90, '2024_02_20_070021_create_field_agents_table', 26),
(92, '2024_02_21_035314_create_service_providers_table', 27),
(93, '2024_03_12_032816_create_video_images_table', 28),
(96, '2024_04_01_050246_create_recruiter_companies_table', 29),
(100, '2024_04_01_050249_create_abouts_table', 30),
(101, '2023_05_29_072206_create_abouts_table', 31),
(102, '2024_04_01_050248_create_website_links_table', 31),
(107, '2024_04_02_034150_create_member_procedures_table', 32),
(108, '2024_04_02_063611_create_companies_table', 33),
(109, '2024_04_02_073210_create_product_types_table', 34),
(117, '2024_04_17_090708_create_sign_copy_orders_table', 35),
(119, '2024_04_18_043408_create_server_copy_orders_table', 36),
(120, '2024_04_21_072828_create_id_card_orders_table', 37),
(121, '2024_04_21_094104_create_biometric_infos_table', 38),
(123, '2024_04_21_111903_create_new_nids_table', 39),
(126, '2024_04_22_064452_create_new_registrations_table', 40),
(127, '2024_04_24_093106_create_biometric_types_table', 41),
(129, '2024_04_24_115045_create_old_nids_table', 42),
(130, '2024_05_01_061904_create_notices_table', 43),
(131, '2024_05_01_062127_create_messages_table', 43),
(132, '2024_05_01_062220_create_submit_statuses_table', 43);

-- --------------------------------------------------------

--
-- Table structure for table `new_nids`
--

CREATE TABLE `new_nids` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `nid_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sign_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_bn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fathers_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mothers_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_place` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `blood_group` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `new_nids`
--

INSERT INTO `new_nids` (`id`, `user_id`, `nid_image`, `sign_image`, `name_en`, `name_bn`, `nid_number`, `pin`, `fathers_name`, `mothers_name`, `birth_place`, `birthday`, `blood_group`, `issue_date`, `address`, `created_at`, `updated_at`) VALUES
(5, 18, '6625efd45a030_1713762260.jpg', '6625efd45ab25_1713762260.png', 'hjddjj', 'gfhhjj', '5676767467546', '34535454354', NULL, NULL, NULL, '2024-04-23', 'O+', '2024-04-22', NULL, '2024-04-21 23:03:36', '2024-04-21 23:04:20'),
(6, 19, '6629f06c855db_1714024556.jpg', '6629f06c85d38_1714024556.jpg', 'dfhh', 'gdfhg', '6456345465', '67466', 'dfgdfg', 'gfhfgh', 'dfgdfg', '0435-05-04', 'O+', '2024-04-25', 'tyfhhy', '2024-04-21 23:20:44', '2024-04-24 23:55:56'),
(7, 24, '662a6f8badcf9_1714057099.webp', '662a6f8bae605_1714057099.jpg', 'fghfgh', 'ghjghj', '435355454', '345345', 'dfgfg', 'fdghdsfg', 'dfgdftgdg', '2024-04-25', 'A-', '2024-04-25', 'dfgdfg', '2024-04-25 08:58:19', '2024-04-25 08:58:19'),
(8, 25, '662a769e8a295_1714058910.jpg', '662a769e8adb7_1714058910.jpg', 'fghfgh', 'fghfghgh', '546546', '546456', 'dfgdfg', 'dfgdfg', 'dfgdfg', '2024-04-25', 'AB-', '2024-04-25', 'dftgdfg', '2024-04-25 09:28:30', '2024-04-25 09:28:30');

-- --------------------------------------------------------

--
-- Table structure for table `new_registrations`
--

CREATE TABLE `new_registrations` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `register_office_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upazila_zila` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_registration_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registration_date` date DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `gender` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_bn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fathers_name_bn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fathers_name_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mothers_name_bn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mothers_name_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_place_bn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_place_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_bn` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `address_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `fathers_nationality_bn` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `fathers_nationality_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `mothers_nationality_bn` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `mothers_nationality_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `new_registrations`
--

INSERT INTO `new_registrations` (`id`, `user_id`, `register_office_address`, `upazila_zila`, `birth_registration_no`, `registration_date`, `issue_date`, `birthday`, `gender`, `name_bn`, `name_en`, `fathers_name_bn`, `fathers_name_en`, `mothers_name_bn`, `mothers_name_en`, `birth_place_bn`, `birth_place_en`, `address_bn`, `address_en`, `fathers_nationality_bn`, `fathers_nationality_en`, `mothers_nationality_bn`, `mothers_nationality_en`, `created_at`, `updated_at`) VALUES
(1, 19, 'fghghjjdh', 'hjdhjjgh,rththh', '564564565463656', '2024-04-22', '2024-04-22', '2024-04-23', 'Male', '5ryertyy', 'rtyeyt', 'tytyu', 'yutryu', 'tyuu', 'tyurtyu', 'tyutyu', 'tuyrtyu', 'yteuyeu', 'ykytjk', 'kjhjkjh', 'yujkhjk', 'jhkg', 'jhkgh', '2024-04-22 03:17:36', '2024-04-22 03:29:46'),
(3, 21, 'dfhgdfgh', 'dfhfgh', 'fghfgh', '2024-04-25', '2024-04-25', '0645-04-05', NULL, 'fghfgh', 'fghdfg', 'fgh', 'fghfg', 'fgh', 'fgh', 'gfhfg', 'fghfg', 'fghfg', 'fghf', 'fgh', 'fgh', 'fgh', 'fgh', '2024-04-25 08:11:12', '2024-04-25 08:11:12');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` bigint UNSIGNED NOT NULL,
  `sign_copy` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `server_copy` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `id_card` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `biometric` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `new_nid` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `old_nid` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `birth` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `server_unofficial` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `sign_copy`, `server_copy`, `id_card`, `biometric`, `new_nid`, `old_nid`, `birth`, `server_unofficial`, `created_at`, `updated_at`) VALUES
(1, 'Welcome To Sign Copy Order updata', 'Hello', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-01 01:43:28', '2024-05-01 09:33:53');

-- --------------------------------------------------------

--
-- Table structure for table `old_nids`
--

CREATE TABLE `old_nids` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `nid_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sign_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_bn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `husband_father` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `husband_father_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mothers_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_place` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `blood_group` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `old_nids`
--

INSERT INTO `old_nids` (`id`, `user_id`, `nid_image`, `sign_image`, `name_en`, `name_bn`, `nid_number`, `pin`, `husband_father`, `husband_father_name`, `mothers_name`, `birth_place`, `birthday`, `blood_group`, `issue_date`, `address`, `created_at`, `updated_at`) VALUES
(1, 19, '6629f03949aaa_1714024505.jpg', '6629f0ae2e335_1714024622.jpg', 'dfghfdg', 'dfgdfgdfg', '32423443', '234342', 'স্বামী', 'dfgfdg', 'fshsfg', 'sfdgsfg', '2024-04-25', 'A+', '2024-04-25', 'dfhgfghfgh', '2024-04-24 23:49:40', '2024-04-24 23:57:02');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_types`
--

CREATE TABLE `product_types` (
  `id` bigint UNSIGNED NOT NULL,
  `product_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_types`
--

INSERT INTO `product_types` (`id`, `product_name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Knits', 1, '2024-04-02 02:05:27', '2024-04-02 02:13:00'),
(2, 'Woven', 1, '2024-04-02 02:06:54', '2024-04-02 02:06:54'),
(3, 'Sweater', 1, '2024-04-02 02:07:07', '2024-04-02 02:07:07'),
(4, 'Lingerie', 1, '2024-04-02 02:07:23', '2024-04-02 02:07:23'),
(5, 'Sportswear', 1, '2024-04-02 02:07:33', '2024-04-02 02:07:33'),
(6, 'Outwear', 1, '2024-04-02 02:07:46', '2024-04-02 02:07:46'),
(7, 'Socks', 1, '2024-04-02 02:08:01', '2024-04-02 02:08:01'),
(8, 'Padding Jacket', 1, '2024-04-02 02:08:19', '2024-04-02 02:08:19');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` bigint UNSIGNED NOT NULL,
  `property_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room_number` smallint DEFAULT NULL,
  `land_area` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `build_year` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `property_home` int DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1' COMMENT '1= active; 0=deactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `property_title`, `location`, `room_number`, `land_area`, `build_year`, `price`, `image`, `banner_image`, `property_details`, `property_home`, `status`, `created_at`, `updated_at`) VALUES
(1, '517 S Prince St', 'Lancaster, PA 17603', 4, '1830 sqr ft', '1998', '20000', 'property/property_main_image-1845590339.jpg', 'property/property_banner_image-2111536780.jpg', NULL, 0, 1, '2024-02-14 23:39:18', '2024-02-14 23:39:36'),
(2, '506 N 13th St', 'Harrisburg, PA 17103', 6, '1900 sqr ft', '2001', '$155,000', 'property/property_main_image-1377375729.jpg', 'property/property_banner_image-706620062.jpg', NULL, 1, 1, '2024-02-14 23:42:43', '2024-02-14 23:42:43'),
(3, '208 Saddleford Ct N', 'Lancaster, PA 17603', 6, '1800 spr ft', '2001', '20000', 'property/property_main_image-602144647.jpg', 'property/property_banner_image-1960543651.jpg', NULL, 1, 1, '2024-02-14 23:46:13', '2024-02-14 23:46:13'),
(4, '517 S Prince St', 'Lancaster, PA 17603', 6, '1800 spr ft', '1998', NULL, 'property/property_main_image-1739940464.jpg', 'property/property_banner_image-878656629.jpg', NULL, 1, 1, '2024-02-14 23:47:39', '2024-02-14 23:47:39'),
(5, '227 2nd Ave', 'Hanover, PA 17331', 4, '1930 spr ft', '1998', '$160,000', 'property/property_main_image-1461859933.jpg', 'property/property_banner_image-447148992.jpg', NULL, 0, 1, '2024-02-15 00:38:03', '2024-02-15 00:50:06'),
(6, '313 Royal Dr', 'Manchester, PA 17345', 4, '1280 sqr ft', '2006', '$184,900.00', 'property/property_main_image-925029222.jpg', 'property/property_banner_image-1036169821.jpg', NULL, 0, 1, '2024-02-15 00:46:02', '2024-02-24 22:49:52'),
(7, 'gjhgj', 'gjjghjg', 4, 'wrrttre', 'wrrwrw', '2343242', 'property/property_main_image-1801095107.jpg', 'property/property_banner_image-232080880.jpg', NULL, 0, 1, '2024-02-18 04:08:23', '2024-02-24 22:47:44');

-- --------------------------------------------------------

--
-- Table structure for table `server_copy_orders`
--

CREATE TABLE `server_copy_orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid_voter_birth_form_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int DEFAULT '0' COMMENT '0=Pending,1=Accepted',
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `admin_comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `server_copy_orders`
--

INSERT INTO `server_copy_orders` (`id`, `user_id`, `file`, `name`, `type`, `nid_voter_birth_form_no`, `status`, `comment`, `admin_comment`, `created_at`, `updated_at`) VALUES
(6, 25, NULL, 'Sajid Rayhan', 'NID_NO', '3432452354', 2, 'xgvgdfgb xcbvcvb', NULL, '2024-04-25 09:24:04', '2024-05-01 07:53:44');

-- --------------------------------------------------------

--
-- Table structure for table `sign_copy_orders`
--

CREATE TABLE `sign_copy_orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid_voter_birth_form_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int DEFAULT '0' COMMENT '0=Pending,1=Accepted',
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `admin_comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sign_copy_orders`
--

INSERT INTO `sign_copy_orders` (`id`, `user_id`, `file`, `name`, `type`, `nid_voter_birth_form_no`, `status`, `comment`, `admin_comment`, `created_at`, `updated_at`) VALUES
(10, 25, 'uploads/sign_copy/1714573552_19731515359689449.pdf', 'dfgbfcghdfh', 'NID_NO', '34534523453454545', 4, 'fghfghh', 'dfgfdg', '2024-04-25 09:19:54', '2024-05-01 09:23:20'),
(11, 24, NULL, 'Sajid Rayhan', 'FORM_NO', '34534523453454545', NULL, 'ertrfg', NULL, '2024-05-01 09:19:08', '2024-05-01 09:19:08'),
(12, 24, 'uploads/sign_copy/1714577572_8697749250.pdf', 'Sajid Rayhan', 'FORM_NO', '34534523453454545', 2, NULL, 'fghfgh', '2024-05-01 09:31:57', '2024-05-01 09:32:52');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint UNSIGNED NOT NULL,
  `state_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `state_name`, `state_slug`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Pennsylvania', 'pennsylvania', 1, '2024-02-17 22:57:16', '2024-02-17 22:57:16', NULL),
(2, 'Virginia', 'virginia', 1, '2024-02-17 22:57:35', '2024-02-17 22:57:35', NULL),
(3, 'New Jersey', 'new-jersey', 1, '2024-02-17 22:57:55', '2024-02-17 22:57:55', NULL),
(4, 'Maryland', 'maryland', 1, '2024-02-17 22:58:17', '2024-02-17 22:58:17', NULL),
(5, 'Georgia', 'georgia', 1, '2024-02-17 22:58:30', '2024-02-17 22:58:30', NULL),
(6, 'Nevada', 'nevada', 1, '2024-02-17 22:58:49', '2024-02-17 22:58:49', NULL),
(7, 'Michigan', 'michigan', 1, '2024-02-17 22:59:01', '2024-02-17 22:59:01', NULL),
(8, 'Illinois', 'illinois', 1, '2024-02-17 22:59:13', '2024-02-17 22:59:13', NULL),
(9, 'Arizona', 'arizona', 1, '2024-02-17 22:59:28', '2024-02-17 22:59:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `submit_statuses`
--

CREATE TABLE `submit_statuses` (
  `id` bigint UNSIGNED NOT NULL,
  `sign_copy` int DEFAULT NULL,
  `server_copy` int DEFAULT NULL,
  `id_card` int DEFAULT NULL,
  `biometric` int DEFAULT NULL,
  `new_nid` int DEFAULT NULL,
  `old_nid` int DEFAULT NULL,
  `birth` int DEFAULT NULL,
  `server_unofficial` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `submit_statuses`
--

INSERT INTO `submit_statuses` (`id`, `sign_copy`, `server_copy`, `id_card`, `biometric`, `new_nid`, `old_nid`, `birth`, `server_unofficial`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 1, 1, 0, 0, 0, NULL, '2024-05-01 04:00:33', '2024-05-01 09:35:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT '0',
  `balance` int DEFAULT '0',
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `image`, `email_verified_at`, `is_admin`, `balance`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'User', 'user@itsolutionstuff.com', NULL, NULL, 0, 0, '$2y$10$IQUY2jlfO3saHQiHTgFW0e9g.WzN2NaWT.EOhSBawJ4qR/1wkUz8u', NULL, '2023-05-28 00:04:26', '2023-05-28 00:04:26'),
(3, 'shadhin', 'shadhin@gmail.com', NULL, NULL, 0, 0, '$2y$10$zjnc4cFL0G.cKZ3u4LzLqusjnxqQGQOj9xqq21HM6SjVdTv6YWInm', NULL, '2023-05-28 00:05:26', '2023-05-28 00:05:26'),
(4, 'abc', 'abc@gmail.com', NULL, NULL, 0, 0, '$2y$10$MmeQDUzfo.ilZDTOLK8ngOEqKvnWAyWv/CeQnAdeT0EXijEaB/rku', NULL, '2023-05-28 04:49:22', '2023-05-28 04:49:22'),
(6, 'DD', 'ddd@gmail.com', NULL, NULL, 0, 0, '$2y$10$lvL80MLzqIWn9oMDoJ9l1eurB2LkbOuLpgKWFtUACEIWEWRc8B1SG', NULL, '2023-06-04 00:45:41', '2023-06-04 00:45:41'),
(13, 'Admin', 'admin@admin.com', 'user/user-746450032.png', NULL, 1, 0, '$2y$10$WJ79BCtNyQDqwtFpxf05heu.2G2u4u17Gw26HJs02A81Y5QOmSzca', NULL, '2023-06-08 05:32:42', '2023-06-08 05:42:14'),
(14, 'Amanda Bentley', 'teluvo@mailinator.com', NULL, NULL, 0, 0, '$2y$10$cAiJx9GYnhARWtGO0QRUHeIovtHFxJYb2wZ6FBXhZyxusyknGAvmq', NULL, '2024-02-19 06:00:10', '2024-02-19 06:00:10'),
(17, 'saurav', 'saurav@gmail.com', NULL, NULL, 0, 0, '$2y$10$t26K49q01uN0BsL1ukeyT./IkcbAdkClv9WAl80S2R7mACoymdll6', NULL, '2024-02-25 01:00:34', '2024-02-25 01:00:34'),
(18, 'test user', 'testuser@gmail.com', NULL, NULL, 0, 0, '$2y$10$1ghl98JdP/GsSZjihLKsUO1zTrQL1TWkQFYftSOSKCNon65Dr9oMe', NULL, '2024-04-17 00:51:26', '2024-04-17 00:51:26'),
(19, 'user', 'user@gmail.com', NULL, NULL, 0, 0, '$2y$10$XHHlnNQ0ZDTAfcmzGnA6Z.xM7XASAK11AbBokKYsKPqg8WffWHjoy', NULL, '2024-04-17 01:11:08', '2024-04-17 01:11:08'),
(21, 'user2', 'user2@gmail.com', NULL, NULL, 0, 0, '$2y$10$XiCOaopC/rdpeLt/oxuWE.rvEFtzy2X9t.4NlVLQA2y8k45SD.Gb2', NULL, '2024-04-25 08:09:56', '2024-04-25 08:09:56'),
(22, 'user3', 'user3@gmail.com', NULL, NULL, 0, 0, '$2y$10$emLyQjbsnDCqBMhid9csE.PCusOjmF5.jnhShpK1U5dhlWGawDVjm', NULL, '2024-04-25 08:41:19', '2024-04-25 08:41:19'),
(23, 'user4', 'user4@gmail.com', NULL, NULL, 0, 0, '$2y$10$pg6d31GpSujs3Fwoe2Xw1OEU8Mk4e.Ji1AGIRjx.w2T7WFnqIC4kq', NULL, '2024-04-25 08:46:24', '2024-04-25 08:46:24'),
(24, 'user5', 'user5@gmail.com', NULL, NULL, 0, 2000, '$2y$10$VnwEx1jVpNQdcZDv5keu4OYYlik9CDLQruM485pZJ4EXLscP.0D.K', NULL, '2024-04-25 08:52:06', '2024-05-01 09:39:42'),
(25, 'user7up', 'usuper7@gmail.com', NULL, NULL, 0, 500, '$2y$10$UcVAIU0fwKqenQpblybjQevVYNU7XTHINsVZtksZ7wQR..qT0lvdS', NULL, '2024-04-25 09:19:17', '2024-05-01 09:39:29');

-- --------------------------------------------------------

--
-- Table structure for table `website_links`
--

CREATE TABLE `website_links` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedIn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `map_link` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `website_links`
--

INSERT INTO `website_links` (`id`, `email`, `facebook`, `instagram`, `linkedIn`, `twitter`, `youtube`, `number`, `address`, `map_link`, `created_at`, `updated_at`) VALUES
(1, 'tecweb69@gmail.com', 'https://www.facebook.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/', NULL, 'https://www.youtube.com/', '(880) 9089080982', '2767 Sunrise Street, NY 1002, USA', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.1977164361365!2d90.41832194790112!3d23.811567331506975!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c75b217edcff%3A0xd9bf0907e20cac6f!2sTechweb%20Bd%20It!5e0!3m2!1sen!2sbd!4v1712038691051!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '2024-04-01 02:07:30', '2024-04-02 00:18:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner_and_titles`
--
ALTER TABLE `banner_and_titles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `biometric_infos`
--
ALTER TABLE `biometric_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `biometric_infos_user_id_foreign` (`user_id`);

--
-- Indexes for table `biometric_types`
--
ALTER TABLE `biometric_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer_details`
--
ALTER TABLE `footer_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `id_card_orders`
--
ALTER TABLE `id_card_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_card_orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `logos`
--
ALTER TABLE `logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_nids`
--
ALTER TABLE `new_nids`
  ADD PRIMARY KEY (`id`),
  ADD KEY `new_nids_user_id_foreign` (`user_id`);

--
-- Indexes for table `new_registrations`
--
ALTER TABLE `new_registrations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `new_registrations_user_id_foreign` (`user_id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `old_nids`
--
ALTER TABLE `old_nids`
  ADD PRIMARY KEY (`id`),
  ADD KEY `old_nids_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `product_types`
--
ALTER TABLE `product_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `server_copy_orders`
--
ALTER TABLE `server_copy_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `server_copy_orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `sign_copy_orders`
--
ALTER TABLE `sign_copy_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sign_copy_orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `states_state_name_unique` (`state_name`);

--
-- Indexes for table `submit_statuses`
--
ALTER TABLE `submit_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website_links`
--
ALTER TABLE `website_links`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `banner_and_titles`
--
ALTER TABLE `banner_and_titles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `biometric_infos`
--
ALTER TABLE `biometric_infos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `biometric_types`
--
ALTER TABLE `biometric_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `footer_details`
--
ALTER TABLE `footer_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `id_card_orders`
--
ALTER TABLE `id_card_orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `logos`
--
ALTER TABLE `logos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `new_nids`
--
ALTER TABLE `new_nids`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `new_registrations`
--
ALTER TABLE `new_registrations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `old_nids`
--
ALTER TABLE `old_nids`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_types`
--
ALTER TABLE `product_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `server_copy_orders`
--
ALTER TABLE `server_copy_orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sign_copy_orders`
--
ALTER TABLE `sign_copy_orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `submit_statuses`
--
ALTER TABLE `submit_statuses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `website_links`
--
ALTER TABLE `website_links`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `biometric_infos`
--
ALTER TABLE `biometric_infos`
  ADD CONSTRAINT `biometric_infos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `id_card_orders`
--
ALTER TABLE `id_card_orders`
  ADD CONSTRAINT `id_card_orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `new_nids`
--
ALTER TABLE `new_nids`
  ADD CONSTRAINT `new_nids_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `new_registrations`
--
ALTER TABLE `new_registrations`
  ADD CONSTRAINT `new_registrations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `old_nids`
--
ALTER TABLE `old_nids`
  ADD CONSTRAINT `old_nids_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `server_copy_orders`
--
ALTER TABLE `server_copy_orders`
  ADD CONSTRAINT `server_copy_orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sign_copy_orders`
--
ALTER TABLE `sign_copy_orders`
  ADD CONSTRAINT `sign_copy_orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 29, 2024 at 01:53 PM
-- Server version: 8.0.36
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webmetri_webmetrixit`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_notifications`
--

CREATE TABLE `admin_notifications` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `order_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `msg` text COLLATE utf8mb4_unicode_ci,
  `read_unread` tinyint DEFAULT '0' COMMENT '1=read',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_notifications`
--

INSERT INTO `admin_notifications` (`id`, `user_id`, `order_type`, `msg`, `read_unread`, `created_at`, `updated_at`) VALUES
(1, 402, NULL, 'Sign Copy Ordered By MD. MAHADI HASAN', 1, '2024-11-28 15:04:13', '2024-11-28 15:12:19'),
(2, 402, NULL, 'Sign Copy Ordered By MD. MAHADI HASAN', 1, '2024-11-28 15:16:04', '2024-11-28 15:32:17'),
(3, 44, NULL, 'Id Card(Name,Address) Ordered By Admin', 1, '2024-11-28 18:23:14', '2024-11-28 18:24:25');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image1` text COLLATE utf8mb4_unicode_ci,
  `image2` text COLLATE utf8mb4_unicode_ci,
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
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `page` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `biometric_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int DEFAULT '0' COMMENT '0=Pending,1=Accepted',
  `comment` text COLLATE utf8mb4_unicode_ci,
  `admin_comment` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `biometric_types`
--

CREATE TABLE `biometric_types` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `premium_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `biometric_types`
--

INSERT INTO `biometric_types` (`id`, `name`, `price`, `premium_price`, `created_at`, `updated_at`) VALUES
(3, 'এয়ারটেল বায়োমেট্রিক তথ্য মূল্য ২০০ টাকা', '200', '200', '2024-04-24 04:46:02', '2024-11-17 08:44:02'),
(9, 'রবি বায়োমেট্রিক তথ্য মূল্য ২০০ টাকা', '200', '200', '2024-05-15 06:15:26', '2024-11-17 08:43:53'),
(10, 'গ্রামিন বায়োমেট্রিক তথ্য মূল্য ২০০ টাকা', '200', '200', '2024-11-17 08:40:23', '2024-11-17 08:43:45'),
(11, 'বাংলালিংক বায়োমেট্রিক তথ্য মূল্য ২০০ টাকা', '200', '200', '2024-11-17 08:40:42', '2024-11-17 08:43:36'),
(12, 'টেলিটক বায়োমেট্রিক তথ্য মূল্য ২০০ টাকা', '200', '200', '2024-11-17 08:41:10', '2024-11-17 08:43:26');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
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
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint UNSIGNED NOT NULL,
  `faq_question` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `faq_answer` longtext COLLATE utf8mb4_unicode_ci,
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
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footer_details`
--

INSERT INTO `footer_details` (`id`, `details`, `credit`, `created_at`, `updated_at`) VALUES
(2, '𝕎𝕖𝕓𝕄𝕖𝕥𝕣𝕚𝕩-𝕀𝕋', '© 2024-04-25 Design & Developed by US', '2023-06-05 01:15:17', '2024-11-03 14:08:16');

-- --------------------------------------------------------

--
-- Table structure for table `hide_unhides`
--

CREATE TABLE `hide_unhides` (
  `id` bigint UNSIGNED NOT NULL,
  `sign_copy` int NOT NULL DEFAULT '0',
  `server_copy` int NOT NULL DEFAULT '0',
  `id_card` int NOT NULL DEFAULT '0',
  `biometric` int NOT NULL DEFAULT '0',
  `name_address_id` int NOT NULL DEFAULT '0',
  `new_nid` int NOT NULL DEFAULT '0',
  `old_nid` int NOT NULL DEFAULT '0',
  `birth` int NOT NULL DEFAULT '0',
  `server_unofficial` int NOT NULL DEFAULT '0',
  `sign_to_server` int NOT NULL DEFAULT '0',
  `premium` int NOT NULL DEFAULT '0',
  `admin` int NOT NULL DEFAULT '0',
  `video` int NOT NULL DEFAULT '0',
  `recharge` int NOT NULL DEFAULT '0',
  `recharge_bkash` int DEFAULT '0',
  `voter_info` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hide_unhides`
--

INSERT INTO `hide_unhides` (`id`, `sign_copy`, `server_copy`, `id_card`, `biometric`, `name_address_id`, `new_nid`, `old_nid`, `birth`, `server_unofficial`, `sign_to_server`, `premium`, `admin`, `video`, `recharge`, `recharge_bkash`, `voter_info`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 1, 1, 1, 0, 1, 1, 1, 1, 1, 0, 1, 0, 1, 0, '2024-06-09 01:42:23', '2024-11-28 17:26:54');

-- --------------------------------------------------------

--
-- Table structure for table `id_card_orders`
--

CREATE TABLE `id_card_orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid_voter_birth_form_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int DEFAULT '0' COMMENT '0=Pending,1=Accepted',
  `comment` text COLLATE utf8mb4_unicode_ci,
  `admin_comment` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logos`
--

CREATE TABLE `logos` (
  `id` bigint UNSIGNED NOT NULL,
  `site_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_image` text COLLATE utf8mb4_unicode_ci,
  `favicon` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logos`
--

INSERT INTO `logos` (`id`, `site_name`, `logo_image`, `favicon`, `created_at`, `updated_at`) VALUES
(1, 'WebMetrix-IT', 'logo/logo-296212053.png', '/logo/logo-1187724315.png', '2023-06-08 03:23:59', '2024-11-01 16:03:16');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint UNSIGNED NOT NULL,
  `sign_copy` text COLLATE utf8mb4_unicode_ci,
  `sign_copy_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `server_copy` text COLLATE utf8mb4_unicode_ci,
  `server_copy_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_card` text COLLATE utf8mb4_unicode_ci,
  `id_card_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `biometric` text COLLATE utf8mb4_unicode_ci,
  `biometric_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `new_nid` text COLLATE utf8mb4_unicode_ci,
  `new_nid_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `old_nid` text COLLATE utf8mb4_unicode_ci,
  `old_nid_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth` text COLLATE utf8mb4_unicode_ci,
  `birth_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_remake` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `server_unofficial` text COLLATE utf8mb4_unicode_ci,
  `server_unofficial_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sign_to_server` text COLLATE utf8mb4_unicode_ci,
  `sign_to_server_price` int DEFAULT '0',
  `recharge_bkash` text COLLATE utf8mb4_unicode_ci,
  `recharge_bkash_price` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `premium_sign_copy` text COLLATE utf8mb4_unicode_ci,
  `premium_sign_copy_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `premium_server_copy` text COLLATE utf8mb4_unicode_ci,
  `premium_server_copy_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `premium_id_card` text COLLATE utf8mb4_unicode_ci,
  `premium_id_card_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `premium_biometric` text COLLATE utf8mb4_unicode_ci,
  `premium_biometric_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `premium_new_nid` text COLLATE utf8mb4_unicode_ci,
  `premium_new_nid_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `premium_old_nid` text COLLATE utf8mb4_unicode_ci,
  `premium_old_nid_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `premium_birth` text COLLATE utf8mb4_unicode_ci,
  `premium_birth_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `premium_server_unofficial` text COLLATE utf8mb4_unicode_ci,
  `premium_server_unofficial_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `premium_sign_to_server` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `premium_sign_to_server_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sign_to_server_remake` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `servercopy_remake` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `nid_remake` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `voter_info` text COLLATE utf8mb4_unicode_ci,
  `voter_info_premium` text COLLATE utf8mb4_unicode_ci,
  `voter_info_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `voter_info_premium_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `voter_info_remake_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `active_status` longtext COLLATE utf8mb4_unicode_ci,
  `active_status_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_address_id` text COLLATE utf8mb4_unicode_ci,
  `premium_name_address_id` text COLLATE utf8mb4_unicode_ci,
  `name_address_id_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `premium_name_address_id_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sign_copy`, `sign_copy_price`, `server_copy`, `server_copy_price`, `id_card`, `id_card_price`, `biometric`, `biometric_price`, `new_nid`, `new_nid_price`, `old_nid`, `old_nid_price`, `birth`, `birth_price`, `birth_remake`, `server_unofficial`, `server_unofficial_price`, `sign_to_server`, `sign_to_server_price`, `recharge_bkash`, `recharge_bkash_price`, `created_at`, `updated_at`, `premium_sign_copy`, `premium_sign_copy_price`, `premium_server_copy`, `premium_server_copy_price`, `premium_id_card`, `premium_id_card_price`, `premium_biometric`, `premium_biometric_price`, `premium_new_nid`, `premium_new_nid_price`, `premium_old_nid`, `premium_old_nid_price`, `premium_birth`, `premium_birth_price`, `premium_server_unofficial`, `premium_server_unofficial_price`, `premium_sign_to_server`, `premium_sign_to_server_price`, `sign_to_server_remake`, `servercopy_remake`, `nid_remake`, `voter_info`, `voter_info_premium`, `voter_info_price`, `voter_info_premium_price`, `voter_info_remake_price`, `active_status`, `active_status_price`, `name_address_id`, `premium_name_address_id`, `name_address_id_price`, `premium_name_address_id_price`) VALUES
(1, 'প্রতি NID সিগনেচার কপির মূল্য ১০০ টাকা (নোটঃ- যদি NID সিগনেচার কপি পাওয়া না যায় তাহলে ১০০ টাকা আপনার একাউন্টে রিফান্ড করে দেয়া হবে)', '100', 'উপরের খালি বক্সে NID ব্যক্তির জন্ম তারিখ অবশ্যই দিতে হবে, নয়তো সার্ভার কপি পাবেন না ।প্রতি সার্ভার কপি রেট ২৫ টাকা।', '25', 'প্রতি NID কার্ডের মূল্য ১২০ টাকা। (নোটঃ- যদি NID কার্ড পাওয়া না যায় তাহলে ১২০ টাকা আপনার একাউন্টে রিফান্ড করে দেয়া হবে)', '120', NULL, NULL, 'প্রতি NID CARD মেক ৫ টাকা', '5', 'প্রতি মেক ১০ টাকা', '10', 'জন্ম নিবন্ধন প্রতিলিপি ডাউনলোড করতে খরচ হবে ২০ টাকা', '20', '5', '১৩ ডিজিটের NID নাম্বার হলে জন্মসাল বসিয়ে ১৭ ডিজিট করে নিবেন', '19', 'প্রতি টিন সার্টিফিকেট মূল্য ৫০ টাকা', 50, 'সর্বনিম্ন রিচার্জ 200 টাকা।', 200, '2024-05-01 02:17:55', '2024-11-28 14:29:54', 'প্রতি NID সিগনেচার কপির মূল্য ৯০ টাকা (নোটঃ- যদি NID সিগনেচার কপি পাওয়া না যায় তাহলে ৯০ টাকা আপনার একাউন্টে রিফান্ড করে দেয়া হবে)', '90', 'উপরের খালি বক্সে NID ব্যক্তির জন্ম তারিখ অবশ্যই দিতে হবে, নয়তো সার্ভার কপি পাবেন না ।প্রতি সার্ভার কপি রেট ২৫ টাকা।', '25', 'প্রতি NID কার্ডের মূল্য ১১০ টাকা। (নোটঃ- যদি NID কার্ড পাওয়া না যায় তাহলে ১১০ টাকা আপনার একাউন্টে রিফান্ড করে দেয়া হবে)', '110', NULL, NULL, 'Premium Member প্রতি মেক ২ টাকা', '2', 'প্রতি মেক ৫ টাকা', '5', 'জন্ম নিবন্ধন প্রতিলিপি ডাউনলোড করতে খরচ হবে ১০ টাকা', '10', '১৩ ডিজিটের NID নাম্বার হলে জন্মসাল বসিয়ে ১৭ ডিজিট করে নিবেন', '10', 'প্রতি টিন সার্টিফিকেট মূল্য ৪০ টাকা', '40', '0', '5', '2', 'প্রতি সার্ভার কপির মূল্য ১৯ টাকা', 'প্রতি সার্ভার কপির মূল্য ১৫ টাকা', '19', '15', '0', 'একাউন্ট এক্টিব চার্জ ১০০ টাকা', '100', 'নাম এবং ঠিকানা দিয়ে প্রতি NID কার্ডের মূল ৭৫০ টাকা। (নোটঃ- যদি NID কার্ডটি পাওয়া না যায় তাহলে ৭৫০ টাকা আপনার একাউন্টে ফেরত দেয়া হবে)', 'নাম এবং ঠিকানা দিয়ে প্রতি NID কার্ডের মূল ৭০০ টাকা। (নোটঃ- যদি NID কার্ডটি পাওয়া না যায় তাহলে ৭০০ টাকা আপনার একাউন্টে ফেরত দেয়া হবে)', '750', '700');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `moderator_accesses`
--

CREATE TABLE `moderator_accesses` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `sign_copy` int NOT NULL DEFAULT '0',
  `server_copy` int NOT NULL DEFAULT '0',
  `id_card` int NOT NULL DEFAULT '0',
  `name_address_id` int NOT NULL DEFAULT '0',
  `biometric` int NOT NULL DEFAULT '0',
  `biometric_type` int NOT NULL DEFAULT '0',
  `recharge` int NOT NULL DEFAULT '0',
  `video` int NOT NULL DEFAULT '0',
  `user_list` int NOT NULL DEFAULT '0',
  `user_edit` int NOT NULL DEFAULT '0',
  `premium_request` int NOT NULL DEFAULT '0',
  `general_settings` int NOT NULL DEFAULT '0',
  `notice_settings` int NOT NULL DEFAULT '0',
  `message_settings` int NOT NULL DEFAULT '0',
  `premium_settings` int NOT NULL DEFAULT '0',
  `nid_make` int NOT NULL DEFAULT '0',
  `server_copy1` int NOT NULL DEFAULT '0',
  `server_copy2` int NOT NULL DEFAULT '0',
  `tin_cirtificate` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `moderator_accesses`
--

INSERT INTO `moderator_accesses` (`id`, `user_id`, `sign_copy`, `server_copy`, `id_card`, `name_address_id`, `biometric`, `biometric_type`, `recharge`, `video`, `user_list`, `user_edit`, `premium_request`, `general_settings`, `notice_settings`, `message_settings`, `premium_settings`, `nid_make`, `server_copy1`, `server_copy2`, `tin_cirtificate`, `created_at`, `updated_at`) VALUES
(35, 174, 1, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, '2024-07-06 22:20:27', '2024-11-22 11:47:49'),
(36, 190, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-07-15 18:48:03', '2024-10-03 16:07:41'),
(37, 379, 1, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-11-17 07:09:40', '2024-11-17 07:10:23'),
(38, 383, 1, 0, 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-11-18 15:50:35', '2024-11-18 15:56:49');

-- --------------------------------------------------------

--
-- Table structure for table `name_address_ids`
--

CREATE TABLE `name_address_ids` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fathers_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mothers_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `village` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `union` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upozila` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fathers_nid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mothers_nid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0' COMMENT '0=Pending,1=Accepted',
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `new_nids`
--

CREATE TABLE `new_nids` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `nid_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sign_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fathers_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mothers_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_place` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `blood_group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `new_registrations`
--

CREATE TABLE `new_registrations` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `regOff` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upazila` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthNo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verify` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `wdob` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `issuteDate` date DEFAULT NULL,
  `regDate` date DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nameEn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fatherName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fatherNameEn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fatherNational` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fatherNationalEn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `motherName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `motherNameEn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `motherNational` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `motherNationalEn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthPlace` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthPlaceEn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sex` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanentAddr` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `permanentAddrEn` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nid_makes`
--

CREATE TABLE `nid_makes` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `nid_image` longtext COLLATE utf8mb4_unicode_ci,
  `sign_image` longtext COLLATE utf8mb4_unicode_ci,
  `name_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `husband_father` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fathers_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mothers_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_place` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `issue_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `blood_group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` bigint UNSIGNED NOT NULL,
  `sign_copy` text COLLATE utf8mb4_unicode_ci,
  `server_copy` text COLLATE utf8mb4_unicode_ci,
  `id_card` text COLLATE utf8mb4_unicode_ci,
  `biometric` text COLLATE utf8mb4_unicode_ci,
  `name_address_id` longtext COLLATE utf8mb4_unicode_ci,
  `new_nid` text COLLATE utf8mb4_unicode_ci,
  `old_nid` text COLLATE utf8mb4_unicode_ci,
  `birth` text COLLATE utf8mb4_unicode_ci,
  `server_unofficial` text COLLATE utf8mb4_unicode_ci,
  `sign_to_server` text COLLATE utf8mb4_unicode_ci,
  `recharge` longtext COLLATE utf8mb4_unicode_ci,
  `recharge_bkash` text COLLATE utf8mb4_unicode_ci,
  `dashboard` text COLLATE utf8mb4_unicode_ci,
  `voter_info` longtext COLLATE utf8mb4_unicode_ci,
  `active_status` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `sign_copy`, `server_copy`, `id_card`, `biometric`, `name_address_id`, `new_nid`, `old_nid`, `birth`, `server_unofficial`, `sign_to_server`, `recharge`, `recharge_bkash`, `dashboard`, `voter_info`, `active_status`, `created_at`, `updated_at`) VALUES
(1, 'NID কার্ডের সিগনেচার কপি চালু আছে- প্রতিদিন সকাল ৯.০০ টা থেকে রাত ৮.০০ টা পর্যন্ত অর্ডার করতে পারবেন। (বিশেষ দ্রষ্টব্যঃ- NID সিগনেচার কপি অর্ডার করার পর ৫/৬ মিনিট অপেক্ষা করুন, যদি NID কার্ডের সিগনেচার কপি পাওয়া না যায় তাহলে আপনার একাউন্টে টাকা রিফান্ড করে দেয়া হবে আর সবসময় নটেফিকেশন ফলো করুন এর পাশাপাশি কিছুক্ষন পর পর “পেজ রিলোড করুন” বাটনে ক্লিক করুন) অ্যাডমিনকে এই ব্যপারে ম্যাসেজ দিতে হবেনা। ♥ আপনাকে ধন্যবাদ ♥', 'অটোমেটিক সার্ভার কপি অফ থাকার কারণে এই অপশন চালু করা হলো, কেউ অর্ডার করে ধৈর্য্য হারা হবেন না, অপেক্ষা করেন, আপনার ফাইল ৪/৫ মিনিটের মধ্যে দেয়া হবে, যা আপনি নটেফিকেশন ওখানে দেখতে পারবেন।', 'NID কার্ড চালু আছে- প্রতিদিন সকাল ৯.০০ টা থেকে রাত ৮.০০ টা পর্যন্ত পর্যন্ত অর্ডার করতে পারবেন (বিশেষ দ্রষ্টব্যঃ- NID কার্ড অর্ডার করার পর ৫/৬ মিনিট অপেক্ষা করুন, যদি NID কার্ড-টি পাওয়া না যায় তাহলে আপনার একাউন্টে টাকা রিফান্ড করে দেয়া হবে আর সবসময় নটেফিকেশন ফলো করুন এর পাশাপাশি কিছুক্ষন পর পর “পেজ রিলোড করুন” বাটনে ক্লিক করুন) অ্যাডমিনকে এই ব্যপারে ম্যাসেজ দিতে হবেনা। ♥ আপনাকে ধন্যবাদ ♥', 'বায়োমেট্রিক তথ্য কার্যক্রম চালু আছে। প্রতি বায়োমেট্রিক তথ্য বের করার জন্য অর্ডার করার পর ১৫/২০ মিনিট অপেক্ষা করুন।', 'NID ব্যক্তির নাম ঠিকানা দিয়ে NID কার্ড চালু আছে- প্রতিদিন সকাল ৯.০০ টা থেকে রাত ৮.০০ টা পর্যন্ত অর্ডার করতে পারবেন। যাদের NID কার্ড হারিয়ে গেছে, কোন প্রমাণ নেই, শুধুমাত্র তারাই ব্যক্তির নাম এবং ঠিকানা দিয়ে NID কার্ড ডাউনলোড করতে পারবেন। অর্ডার করার পর  ৩০/৪০ মিনিট অপেক্ষা করবেন, যদি NID কার্ড পাওয়া না যায় তাহলে আপনার একাউন্টে টাকা রিফান্ড করে দেয়া হবে।', 'NID Make রাত/দিন ২৪ ঘণ্টা চালু ♥ ধন্যবাদ ♥', 'NID সিগনেচার কপি থেকে খুব সহজে NID কার্ড  তৈরি করতে পারবেন রাত দিন ২৪ ঘন্টা ♥ ধন্যবাদ ♥', 'জন্ম নিবন্ধন নতুন ভার্সন প্রতিলিপি PDF তৈরি করতে পারবেন (নোটঃ- কেউ অবৈধ কাজে ব্যবহার করবেন না) ♥ ধন্যবাদ ♥', 'সার্ভার চালু', 'যাদের টিন সার্টিফিকেট হারিয়ে গেছে কিংবা নষ্ট হয়ে গেছে, আপনারা খুব সহজেই টিন সার্টিফিকেট টি ডাউনলোড করতে পারবেন-টিন সার্টিফিকেট ২৪ ঘন্টা চালু', 'রিচার্জের জন্য প্রথমে নিচের নাম্বারে বিকাশ পেমেন্ট করুন, তারপর নিচের ফরমটি সঠিকভাবে পূরণ করে সাবমিট করে অপেক্ষা করুন ♥ ধন্যবাদ ♥', 'বিকাশের মাধ্যমে অটোমেটিক রিচার্জ করুন, আপনার একাউন্টে টাকা অটোমেটিক এড হয়ে যাবে।  ♥ ধন্যবাদ ♥', 'WebMerrix-IT ওয়েব সাইটে আপনাকে স্বাগতম, সর্বদা আমাদের সাথে থাকুন (নোটঃ- ওয়েব সাইটের লিংক অন্য কারো সাথে শেয়ার করা থেকে বিরত থাকুন) ♥ ধন্যবাদ ♥', 'সার্ভার চালু, যদি এই অপশন থেকে বাহির না হয়, তবে সার্ভার কপি Unofficial-1 অপশনটি ব্যবহার করুন।', 'ওয়েব সাইটের সকল সুবিধা পেতে দ্রুত আপনার একাউন্ট এক্টিব করুন। (নোট- এই টাকা মূল একাউন্টে যোগ হবেনা)', '2024-05-01 01:43:28', '2024-11-28 14:28:13');

-- --------------------------------------------------------

--
-- Table structure for table `old_nids`
--

CREATE TABLE `old_nids` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `nid_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sign_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `husband_father` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `husband_father_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mothers_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_place` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `blood_group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `premia`
--

CREATE TABLE `premia` (
  `id` bigint UNSIGNED NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `renew_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `notice` text COLLATE utf8mb4_unicode_ci,
  `message` text COLLATE utf8mb4_unicode_ci,
  `submit` int DEFAULT '0',
  `details` text COLLATE utf8mb4_unicode_ci,
  `accept_request` int DEFAULT '0',
  `subscription_days` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `premia`
--

INSERT INTO `premia` (`id`, `price`, `renew_price`, `notice`, `message`, `submit`, `details`, `accept_request`, `subscription_days`, `created_at`, `updated_at`) VALUES
(1, '99', '95', 'প্রিমিয়াম মেম্বারসিপের মেয়াদ ০১ দিন। আপনি যেদিন সার্ভার কপি ডাউনলোড করবেন, সেদিন প্রিমিয়াম মেম্বারসিপ নিয়ে কাজ করবেন।', 'আপনার একাউন্ট থেকে ৯৯ টাকা কর্তন করা হবে।', 1, '<h3>প্রিমিয়াম মেম্বারসীপ</h3><p>-----------------------------------</p><h4>শর্তাবলী-</h4><p>১। প্রিমিয়াম মেম্বারসীপের আবেদন করার জন্য আপনার একাউন্টে সর্বনিন্ম ১০০ টাকা থাকতে হবে।<br>২। আপনার একাউন্ট থেকে ৯৯ টাকা কেটে নেয়া হবে।<br>৩। প্রিমিয়াম মেম্বারসীপের মেয়াদ থাকবে ০১ দিন।<br>৪। প্রিমিয়াম মেম্বার হবার ০১ দিন পর &nbsp;রেন্যু করাতে হবে।&nbsp;<br>৫। মনে রাখবেন- যদি ০১ দিন পরেও আপনি আপনার একাউন্ট রেন্যু না করেন তবে আপনার যাবতীয় সকল চার্জ ক্যাজুয়াল মেম্বারদের মত হবে।<br>৬। রেন্যু ফি ৯৫ টাকা।<br>৭। অ্যাডমিনকে এই ব্যাপারে মেসেজ দিতে হবেনা, যাবতীয় সকল কার্যাবলী অটোমেটিক হবে।</p><h4>যেসব সুযোগ সুবিদা পাবেন-</h4><p>১। প্রতি সার্ভার কপি মূল্য হবে ১০ টাকা।<br>২। NID কার্ড ডাউনলোড করতে পারবেন ১১০ টাকায়।<br>৩। NID সিগনেচার কপি ডাউনলোড করতে পারবেন ৯০ টাকায়।<br>৪। NID Make করতে পারবেন ৫ টাকায়।<br>৫। জন্ম নিবন্ধন প্রতিলিপি বের করতে পারবেন ১০ টাকায়।<br>৬। সর্বক্ষেত্রে VIP সুযোগ সুবিধা পাবেন।<br>&nbsp;</p>', 0, 1, '2024-06-01 06:29:24', '2024-11-19 08:00:42');

-- --------------------------------------------------------

--
-- Table structure for table `product_types`
--

CREATE TABLE `product_types` (
  `id` bigint UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `property_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room_number` smallint DEFAULT NULL,
  `land_area` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `build_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_details` longtext COLLATE utf8mb4_unicode_ci,
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
-- Table structure for table `recharges`
--

CREATE TABLE `recharges` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recharges`
--

INSERT INTO `recharges` (`id`, `user_id`, `method`, `payment_number`, `transaction_id`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(1, '326', 'Bkash Gateway', '01956079791', 'BK26VV47TY', '200', 1, '2024-11-02 08:25:37', '2024-11-02 08:25:37'),
(2, '146', 'Bkash Gateway', '01829441518', 'BK23W32CEZ', '200', 1, '2024-11-02 12:31:11', '2024-11-02 12:31:11'),
(3, '250', 'Bkash Gateway', '01986511583', 'BK33WONNYH', '200', 1, '2024-11-03 08:12:44', '2024-11-03 08:12:44'),
(4, '177', 'Bkash Gateway', '01793635027', 'BK34WXHQYW', '200', 1, '2024-11-03 12:18:23', '2024-11-03 12:18:23'),
(5, '200', 'Bkash Gateway', '01722624180', 'BK30X0LLPU', '200', 1, '2024-11-03 14:09:25', '2024-11-03 14:09:25'),
(6, '353', 'Bkash Gateway', '01744751539', 'BK31X1VNTT', '100', 1, '2024-11-03 14:58:18', '2024-11-03 14:58:18'),
(7, '353', 'Bkash Gateway', '01744751539', 'BK33X1XFD3', '200', 1, '2024-11-03 14:59:28', '2024-11-03 14:59:28'),
(8, '346', 'Bkash Gateway', '01755348901', 'BK3607DJKM', '200', 1, '2024-11-03 18:15:15', '2024-11-03 18:15:15'),
(9, '92', 'Bkash Gateway', '01725869157', 'BK420JM628', '300', 1, '2024-11-04 08:53:22', '2024-11-04 08:53:22'),
(10, '92', 'Bkash Gateway', '01725869157', 'BK440LV9OO', '200', 1, '2024-11-04 09:56:36', '2024-11-04 09:56:36'),
(11, '250', 'Bkash Gateway', '01986511583', 'BK400RIJME', '200', 1, '2024-11-04 12:30:17', '2024-11-04 12:30:17'),
(12, '177', 'Bkash Gateway', '01793635027', 'BK450SC3K7', '200', 1, '2024-11-04 12:58:06', '2024-11-04 12:58:06'),
(13, '175', 'Bkash Gateway', '01799405003', 'BK551FYEID', '200', 1, '2024-11-05 08:52:56', '2024-11-05 08:52:56'),
(14, '97', 'Bkash Gateway', '01738598656', 'BK591G0HBT', '200', 1, '2024-11-05 08:54:47', '2024-11-05 08:54:47'),
(15, '97', 'Bkash Gateway', '01738598656', 'BK571L8I2R', '200', 1, '2024-11-05 11:14:56', '2024-11-05 11:14:56'),
(16, '63', 'Bkash Gateway', '01729805942', 'BK591OWUB1', '200', 1, '2024-11-05 13:01:13', '2024-11-05 13:01:13'),
(17, '250', 'Bkash Gateway', '01986511583', 'BK581QCHEI', '200', 1, '2024-11-05 13:53:46', '2024-11-05 13:53:46'),
(18, '319', 'Bkash Gateway', '01966846103', 'BK561RVRQO', '200', 1, '2024-11-05 14:50:21', '2024-11-05 14:50:21'),
(19, '140', 'Bkash Gateway', '01325162111', 'BK682EAUSY', '200', 1, '2024-11-06 09:10:58', '2024-11-06 09:10:58'),
(20, '290', 'Bkash Gateway', '01791729826', 'BK612F41NL', '200', 1, '2024-11-06 09:32:46', '2024-11-06 09:32:46'),
(21, '177', 'Bkash Gateway', '01793635027', 'BK642GC7O8', '200', 1, '2024-11-06 10:03:21', '2024-11-06 10:03:21'),
(22, '250', 'Bkash Gateway', '01986511583', 'BK662NPUYC', '200', 1, '2024-11-06 13:30:42', '2024-11-06 13:30:42'),
(23, '330', 'Bkash Gateway', '01329154345', 'BK682O2H62', '200', 1, '2024-11-06 13:44:05', '2024-11-06 13:44:05'),
(24, '98', 'Bkash Gateway', '01756262274', 'BK642QTLOM', '200', 1, '2024-11-06 15:23:04', '2024-11-06 15:23:04'),
(25, '277', 'Bkash Gateway', '01630475570', 'BK612UAPNV', '200', 1, '2024-11-06 16:50:35', '2024-11-06 16:50:35'),
(26, '357', 'Bkash Gateway', '01891452361', 'BK622XFE08', '100', 1, '2024-11-06 17:53:32', '2024-11-06 17:53:32'),
(27, '358', 'Bkash Gateway', '01983960796', 'BK65332N27', '200', 1, '2024-11-06 20:12:26', '2024-11-06 20:12:26'),
(28, '67', 'Bkash Gateway', '01825709177', 'BK6336R7Q9', '200', 1, '2024-11-06 22:49:19', '2024-11-06 22:49:19'),
(29, '355', 'Bkash Gateway', '01710000101', 'BK7637AXBM', '100', 1, '2024-11-06 23:51:00', '2024-11-06 23:51:00'),
(30, '319', 'Bkash Gateway', '01966846103', 'BK763ALDHW', '200', 1, '2024-11-07 08:13:10', '2024-11-07 08:13:10'),
(31, '177', 'Bkash Gateway', '01956492486', 'BK743BL48M', '200', 1, '2024-11-07 08:49:05', '2024-11-07 08:49:05'),
(32, '359', 'Bkash Gateway', '01911041355', 'BK743D0710', '100', 1, '2024-11-07 09:29:04', '2024-11-07 09:29:04'),
(33, '42', 'Bkash Gateway', '01624267575', 'BK763FE2RU', '200', 1, '2024-11-07 10:28:26', '2024-11-07 10:28:26'),
(34, '338', 'Bkash Gateway', '01866858834', 'BK763FYHGQ', '200', 1, '2024-11-07 10:42:06', '2024-11-07 10:42:06'),
(35, '330', 'Bkash Gateway', '01329154345', 'BK773I58WV', '200', 1, '2024-11-07 11:36:38', '2024-11-07 11:36:38'),
(36, '250', 'Bkash Gateway', '01986511583', 'BK733LABYJ', '200', 1, '2024-11-07 13:08:55', '2024-11-07 13:08:55'),
(37, '63', 'Bkash Gateway', '01882477272', 'BK733N4K49', '200', 1, '2024-11-07 14:14:31', '2024-11-07 14:14:31'),
(38, '355', 'Bkash Gateway', '01710000101', 'BK7745G5DT', '200', 1, '2024-11-07 21:51:18', '2024-11-07 21:51:18'),
(39, '363', 'Bkash Gateway', '01328108935', 'BK925P44J0', '100', 1, '2024-11-09 18:34:16', '2024-11-09 18:34:16'),
(40, '250', 'Bkash Gateway', '01986511583', 'BK935VCTQF', '200', 1, '2024-11-09 21:39:21', '2024-11-09 21:39:21'),
(41, '336', 'Bkash Gateway', '01613239387', 'BKA966T99P', '200', 1, '2024-11-10 11:20:45', '2024-11-10 11:20:45'),
(42, '326', 'Bkash Gateway', '01956079791', 'BKA36C5BDB', '200', 1, '2024-11-10 14:08:05', '2024-11-10 14:08:05'),
(43, '177', 'Bkash Gateway', '01793635027', 'BKB76ZEC9B', '200', 1, '2024-11-11 08:15:52', '2024-11-11 08:15:52'),
(44, '115', 'Bkash Gateway', '01881864324', 'BKB473YR08', '200', 1, '2024-11-11 10:26:45', '2024-11-11 10:26:45'),
(45, '293', 'Bkash Gateway', '01645104510', 'BKB674AIZ2', '200', 1, '2024-11-11 10:34:30', '2024-11-11 10:34:30'),
(46, '225', 'Bkash Gateway', '01785539423', 'BKB379WOG5', '200', 1, '2024-11-11 13:07:48', '2024-11-11 13:07:48'),
(47, '98', 'Bkash Gateway', '01756262274', 'BKB87SC6L4', '200', 1, '2024-11-11 21:13:49', '2024-11-11 21:13:49'),
(48, '66', 'Bkash Gateway', '01623313175', 'BKC381E479', '200', 1, '2024-11-12 10:15:44', '2024-11-12 10:15:44'),
(49, '177', 'Bkash Gateway', '01793635027', 'BKC181YUFD', '200', 1, '2024-11-12 10:30:27', '2024-11-12 10:30:27'),
(50, '346', 'Bkash Gateway', '01755348901', 'BKC485NPU8', '200', 1, '2024-11-12 12:08:44', '2024-11-12 12:08:44'),
(51, '182', 'Bkash Gateway', '01872564966', 'BKC088E4QA', '200', 1, '2024-11-12 13:41:11', '2024-11-12 13:41:11'),
(52, '368', 'Bkash Gateway', '01703828560', 'BKC28H6GWI', '100', 1, '2024-11-12 17:44:54', '2024-11-12 17:44:54'),
(53, '177', 'Bkash Gateway', '01793635027', 'BKD18UT7JN', '200', 1, '2024-11-13 08:44:46', '2024-11-13 08:44:46'),
(54, '290', 'Bkash Gateway', '01742563131', 'BKD38WQFVL', '200', 1, '2024-11-13 09:42:54', '2024-11-13 09:42:54'),
(55, '109', 'Bkash Gateway', '01774323345', 'BKD992PF5N', '200', 1, '2024-11-13 12:25:28', '2024-11-13 12:25:28'),
(56, '300', 'Bkash Gateway', '01864377666', 'BKD59A7B4J', '200', 1, '2024-11-13 16:30:11', '2024-11-13 16:30:11'),
(57, '338', 'Bkash Gateway', '01866858834', 'BKD39BBYU3', '200', 1, '2024-11-13 16:57:37', '2024-11-13 16:57:37'),
(58, '373', 'Bkash Gateway', '01883165099', 'BKE49NG4MA', '100', 1, '2024-11-13 23:33:11', '2024-11-13 23:33:11'),
(59, '373', 'Bkash Gateway', '01883165099', 'BKE29NI764', '200', 1, '2024-11-13 23:39:18', '2024-11-13 23:39:18'),
(60, '357', 'Bkash Gateway', '01891452361', 'BKE39RWMOT', '200', 1, '2024-11-14 09:16:03', '2024-11-14 09:16:03'),
(61, '330', 'Bkash Gateway', '01329154345', 'BKE09SSVD6', '200', 1, '2024-11-14 09:40:33', '2024-11-14 09:40:33'),
(62, '346', 'Bkash Gateway', '01645593902', 'BKE69SSVGO', '400', 1, '2024-11-14 09:40:38', '2024-11-14 09:40:38'),
(63, '177', 'Bkash Gateway', '01793635027', 'BKE79UMO8T', '200', 1, '2024-11-14 10:29:06', '2024-11-14 10:29:06'),
(64, '374', 'Bkash Gateway', '01917196271', 'BKE69VXZHG', '100', 1, '2024-11-14 11:04:20', '2024-11-14 11:04:20'),
(65, '374', 'Bkash Gateway', '01917196271', 'BKE59WL2FV', '200', 1, '2024-11-14 11:20:21', '2024-11-14 11:20:21'),
(66, '319', 'Bkash Gateway', '01966846103', 'BKE59WPMFR', '200', 1, '2024-11-14 11:23:17', '2024-11-14 11:23:17'),
(67, '115', 'Bkash Gateway', '01881864324', 'BKE9AAQLV1', '200', 1, '2024-11-14 18:04:23', '2024-11-14 18:04:23'),
(68, '336', 'Bkash Gateway', '01613239387', 'BKE9ACP8IL', '200', 1, '2024-11-14 18:52:52', '2024-11-14 18:52:52'),
(69, '315', 'Bkash Gateway', '01404343976', 'BKG6BYKV1E', '200', 1, '2024-11-16 19:19:38', '2024-11-16 19:19:38'),
(70, '327', 'Bkash Gateway', '01312863001', 'BKG9BZ8X0R', '200', 1, '2024-11-16 19:39:14', '2024-11-16 19:39:14'),
(71, '378', 'Bkash Gateway', '01774539074', 'BKG3C0J3CR', '100', 1, '2024-11-16 20:19:32', '2024-11-16 20:19:32'),
(72, '247', 'Bkash Gateway', '01670237130', 'BKH6CC8N74', '200', 1, '2024-11-17 11:15:19', '2024-11-17 11:15:19'),
(73, '247', 'Bkash Gateway', '01401066366', 'BKH2CCX4JM', '200', 1, '2024-11-17 11:33:12', '2024-11-17 11:33:12'),
(74, '319', 'Bkash Gateway', '01966846103', 'BKH7CJ3RV5', '290', 1, '2024-11-17 15:04:09', '2024-11-17 15:04:09'),
(75, '382', 'Bkash Gateway', '01744600094', 'BKH9CJL5IJ', '100', 1, '2024-11-17 15:20:23', '2024-11-17 15:20:23'),
(76, '319', 'Bkash Gateway', '01966846103', 'BKH8CKNGJS', '200', 1, '2024-11-17 15:49:47', '2024-11-17 15:49:47'),
(77, '355', 'Bkash Gateway', '01710000101', 'BKI4D3NAXC', '200', 1, '2024-11-18 09:48:39', '2024-11-18 09:48:39'),
(78, '247', 'Bkash Gateway', '01401066366', 'BKI0D45MPG', '200', 1, '2024-11-18 10:03:04', '2024-11-18 10:03:04'),
(79, '175', 'Bkash Gateway', '01799405003', 'BKI6D47AJ8', '200', 1, '2024-11-18 10:04:01', '2024-11-18 10:04:01'),
(80, '247', 'Bkash Gateway', '01401066366', 'BKI3D4Q6ZT', '500', 1, '2024-11-18 10:18:49', '2024-11-18 10:18:49'),
(81, '330', 'Bkash Gateway', '01329154345', 'BKI4D9NOPK', '200', 1, '2024-11-18 12:40:15', '2024-11-18 12:40:15'),
(82, '368', 'Bkash Gateway', '01703828560', 'BKJ8DTVE42', '200', 1, '2024-11-19 06:15:15', '2024-11-19 06:15:15'),
(83, '247', 'Bkash Gateway', '01401066366', 'BKJ3DW6WZ5', '200', 1, '2024-11-19 08:50:13', '2024-11-19 08:50:13'),
(84, '92', 'Bkash Gateway', '01725869157', 'BKJ0DYTVAI', '200', 1, '2024-11-19 10:09:25', '2024-11-19 10:09:25'),
(85, '97', 'Bkash Gateway', '01738598656', 'BKJ6DZ0CDS', '200', 1, '2024-11-19 10:14:37', '2024-11-19 10:14:37'),
(86, '376', 'Bkash Gateway', '01626219630', 'BKJ9DZQYBZ', '100', 1, '2024-11-19 10:35:41', '2024-11-19 10:35:41'),
(87, '374', 'Bkash Gateway', '01580507092', 'BKJ9E0NJN5', '200', 1, '2024-11-19 11:00:44', '2024-11-19 11:00:44'),
(88, '368', 'Bkash Gateway', '01703828560', 'BKJ3E2IJRD', '200', 1, '2024-11-19 11:51:02', '2024-11-19 11:51:02'),
(89, '319', 'Bkash Gateway', '01966846103', 'BKJ5E493TL', '201', 1, '2024-11-19 12:44:54', '2024-11-19 12:44:54'),
(90, '247', 'Bkash Gateway', '01401066366', 'BKJ1E4PUQH', '200', 1, '2024-11-19 13:01:07', '2024-11-19 13:01:07'),
(91, '66', 'Bkash Gateway', '01686524190', 'BKK3ET7AVR', '200', 1, '2024-11-20 09:55:49', '2024-11-20 09:55:49'),
(92, '382', 'Bkash Gateway', '01744600092', 'BKK9ETL23P', '200', 1, '2024-11-20 10:05:30', '2024-11-20 10:05:30'),
(93, '98', 'Bkash Gateway', '01756262274', 'BKK6EV4BRE', '200', 1, '2024-11-20 10:47:10', '2024-11-20 10:47:10'),
(94, '332', 'Bkash Gateway', '01705812288', 'BKK3EV6PQV', '200', 1, '2024-11-20 10:48:37', '2024-11-20 10:48:37'),
(95, '63', 'Bkash Gateway', '01729805942', 'BKK8EY3RDM', '200', 1, '2024-11-20 12:07:44', '2024-11-20 12:07:44'),
(96, '336', 'Bkash Gateway', '01613239387', 'BKK2EZKR4M', '200', 1, '2024-11-20 12:56:47', '2024-11-20 12:56:47'),
(97, '67', 'Bkash Gateway', '01825709177', 'BKK3FF8XTX', '206', 1, '2024-11-20 20:30:20', '2024-11-20 20:30:20'),
(98, '247', 'Bkash Gateway', '01401066366', 'BKL9FMJD91', '350', 1, '2024-11-21 09:11:56', '2024-11-21 09:11:56'),
(99, '319', 'Bkash Gateway', '01966846103', 'BKL6FPZO20', '210', 1, '2024-11-21 10:44:19', '2024-11-21 10:44:19'),
(100, '388', 'Bkash Gateway', '01721944322', 'BKL1FYQ7KT', '100', 1, '2024-11-21 15:28:57', '2024-11-21 15:28:57'),
(101, '388', 'Bkash Gateway', '01721944322', 'BKL0FYSNIM', '200', 1, '2024-11-21 15:30:50', '2024-11-21 15:30:50'),
(102, '389', 'Bkash Gateway', '01737724299', 'BKM7GSEVF3', '100', 1, '2024-11-22 16:35:33', '2024-11-22 16:35:33'),
(103, '389', 'Bkash Gateway', '01737724299', 'BKM7GSGTGH', '200', 1, '2024-11-22 16:36:58', '2024-11-22 16:36:58'),
(104, '389', 'Bkash Gateway', '01737724299', 'BKN8H6MF8A', '200', 1, '2024-11-23 08:42:18', '2024-11-23 08:42:18'),
(105, '330', 'Bkash Gateway', '01329154345', 'BKN6H91SR4', '200', 1, '2024-11-23 10:06:34', '2024-11-23 10:06:34'),
(106, '177', 'Bkash Gateway', '01793635027', 'BKO5HZIO83', '200', 1, '2024-11-24 08:34:23', '2024-11-24 08:34:23'),
(107, '115', 'Bkash Gateway', '01881864324', 'BKO5I4KKM1', '200', 1, '2024-11-24 10:59:35', '2024-11-24 10:59:35'),
(108, '293', 'Bkash Gateway', '01645104510', 'BKO9I5XS9V', '200', 1, '2024-11-24 11:33:53', '2024-11-24 11:33:53'),
(109, '247', 'Bkash Gateway', '01401066366', 'BKO3I77IO9', '400', 1, '2024-11-24 12:07:49', '2024-11-24 12:07:49'),
(110, '238', 'Bkash Gateway', '01797548222', 'BKO2I9AUU0', '200', 1, '2024-11-24 13:14:31', '2024-11-24 13:14:31'),
(111, '97', 'Bkash Gateway', '01615746949', 'BKO3IB5U1N', '200', 1, '2024-11-24 14:23:59', '2024-11-24 14:23:59'),
(112, '356', 'Bkash Gateway', '01765763026', 'BKO0IGFDNA', '100', 1, '2024-11-24 16:50:10', '2024-11-24 16:50:10'),
(113, '356', 'Bkash Gateway', '01765763026', 'BKO3IIX14T', '200', 1, '2024-11-24 17:39:49', '2024-11-24 17:39:49'),
(114, '392', 'Bkash Gateway', '01791595178', 'BKO2IN2DO2', '100', 1, '2024-11-24 19:18:12', '2024-11-24 19:18:12'),
(115, '392', 'Bkash Gateway', '01791595178', 'BKO2INE6CO', '200', 1, '2024-11-24 19:26:13', '2024-11-24 19:26:13'),
(116, '393', 'Bkash Gateway', '01717971104', 'BKO4INRHSG', '100', 1, '2024-11-24 19:36:14', '2024-11-24 19:36:14'),
(117, '393', 'Bkash Gateway', '01717971104', 'BKO9INVB15', '200', 1, '2024-11-24 19:39:05', '2024-11-24 19:39:05'),
(118, '140', 'Bkash Gateway', '01325162111', 'BKP1IVBMJZ', '200', 1, '2024-11-25 08:26:20', '2024-11-25 08:26:20'),
(119, '374', 'Bkash Gateway', '01580507092', 'BKP7IYKCS5', '200', 1, '2024-11-25 10:09:13', '2024-11-25 10:09:13'),
(120, '368', 'Bkash Gateway', '01703828560', 'BKP2IZO5B4', '200', 1, '2024-11-25 10:39:06', '2024-11-25 10:39:06'),
(121, '332', 'Bkash Gateway', '01705812288', 'BKP2J14MSI', '500', 1, '2024-11-25 11:16:17', '2024-11-25 11:16:17'),
(122, '393', 'Bkash Gateway', '01717971104', 'BKP0J23C9K', '200', 1, '2024-11-25 11:41:42', '2024-11-25 11:41:42'),
(123, '394', 'Bkash Gateway', '01841855200', 'BKP1J3N1OV', '100', 1, '2024-11-25 12:26:38', '2024-11-25 12:26:38'),
(124, '394', 'Bkash Gateway', '01875525801', 'BKP0J3Z1CA', '200', 1, '2024-11-25 12:37:28', '2024-11-25 12:37:28'),
(125, '247', 'Bkash Gateway', '01401066366', 'BKP2J4CTQC', '200', 1, '2024-11-25 12:50:41', '2024-11-25 12:50:41'),
(126, '389', 'Bkash Gateway', '01737724299', 'BKP5J9GT2F', '250', 1, '2024-11-25 15:47:09', '2024-11-25 15:47:09'),
(127, '98', 'Bkash Gateway', '01756262274', 'BKQ7JRWVDP', '200', 1, '2024-11-26 08:46:23', '2024-11-26 08:46:23'),
(128, '247', 'Bkash Gateway', '01401066366', 'BKQ9JTF1KZ', '200', 1, '2024-11-26 09:32:16', '2024-11-26 09:32:16'),
(129, '355', 'Bkash Gateway', '01710000101', 'BKQ2JTTYTW', '200', 1, '2024-11-26 09:43:43', '2024-11-26 09:43:43'),
(130, '97', 'Bkash Gateway', '01738598656', 'BKQ5K01Z45', '200', 1, '2024-11-26 12:30:27', '2024-11-26 12:30:27'),
(131, '319', 'Bkash Gateway', '01966846103', 'BKQ8K13DPG', '210', 1, '2024-11-26 13:05:02', '2024-11-26 13:05:02'),
(132, '115', 'Bkash Gateway', '01881864324', 'BKQ3K13AS1', '200', 1, '2024-11-26 13:05:08', '2024-11-26 13:05:08'),
(133, '346', 'Bkash Gateway', '01755348901', 'BKQ0K1PTAA', '200', 1, '2024-11-26 13:27:41', '2024-11-26 13:27:41'),
(134, '393', 'Bkash Gateway', '01717971104', 'BKR1KPZ96L', '200', 1, '2024-11-27 09:29:34', '2024-11-27 09:29:34'),
(135, '175', 'Bkash Gateway', '01799405003', 'BKR3KX8BBP', '200', 1, '2024-11-27 12:47:26', '2024-11-27 12:47:26'),
(136, '396', 'Bkash Gateway', '01879653143', 'BKR9KZIPRJ', '100', 1, '2024-11-27 14:13:51', '2024-11-27 14:13:51'),
(137, '398', 'Bkash Gateway', '01952977181', 'BKR0L93YOE', '100', 1, '2024-11-27 18:18:26', '2024-11-27 18:18:26'),
(138, '398', 'Bkash Gateway', '01952977181', 'BKR7L9TOOF', '200', 1, '2024-11-27 18:35:34', '2024-11-27 18:35:34'),
(139, '399', 'Bkash Gateway', '01793234398', 'BKR6LH2308', '100', 1, '2024-11-27 22:58:16', '2024-11-27 22:58:16'),
(140, '402', 'Bkash Gateway', '01644712588', 'BKS5LL064D', '100', 1, '2024-11-28 08:52:24', '2024-11-28 08:52:24'),
(141, '97', 'Bkash Gateway', '01738598656', 'BKS7LLMDOB', '200', 1, '2024-11-28 09:11:41', '2024-11-28 09:11:41'),
(142, '319', 'Bkash Gateway', '01966846103', 'BKS4LPA404', '209', 1, '2024-11-28 10:50:09', '2024-11-28 10:50:09'),
(143, '405', 'Bkash Gateway', '01770731275', 'BKS3LQYEFX', '100', 1, '2024-11-28 11:32:21', '2024-11-28 11:32:21'),
(144, '319', 'Bkash Gateway', '01966846103', 'BKS1LVE9SX', '214', 1, '2024-11-28 13:52:43', '2024-11-28 13:52:43'),
(145, '407', 'Bkash Gateway', '01304271556', 'BKS7LVSMLJ', '100', 1, '2024-11-28 14:08:32', '2024-11-28 14:08:32'),
(146, '402', 'Bkash Gateway', '01644712588', 'BKS2LXCBZU', '200', 1, '2024-11-28 15:02:41', '2024-11-28 15:02:41'),
(147, '403', 'Bkash Gateway', '01817073022', 'BKS7M20USZ', '100', 1, '2024-11-28 16:59:33', '2024-11-28 16:59:33');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `auto_recharge` decimal(10,2) DEFAULT '0.00',
  `manual_recharge` decimal(10,2) DEFAULT '0.00',
  `income` decimal(10,2) DEFAULT '0.00',
  `expense` decimal(10,2) DEFAULT '0.00',
  `profit` decimal(10,2) DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `date`, `auto_recharge`, `manual_recharge`, `income`, `expense`, `profit`, `created_at`, `updated_at`) VALUES
(1, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, '2024-08-12 22:34:32', '2024-08-13 04:41:20'),
(2, NULL, 1000.00, 0.00, 1000.00, 500.00, 500.00, '2024-08-13 10:16:21', '2024-08-14 09:15:42'),
(3, NULL, 400.00, 200.00, 600.00, 500.00, 100.00, '2024-08-14 00:07:46', '2024-08-15 07:56:38'),
(4, NULL, 410.00, 0.00, 410.00, 1500.00, -1090.00, '2024-08-15 00:54:20', '2024-08-15 15:35:53'),
(5, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, '2024-08-16 00:51:05', '2024-08-16 00:51:05'),
(6, NULL, 200.00, 0.00, 200.00, 0.00, 200.00, '2024-08-17 00:08:17', '2024-08-17 16:12:35'),
(7, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, '2024-08-18 09:26:09', '2024-08-18 09:26:09'),
(8, NULL, 460.00, 0.00, 460.00, 500.00, -40.00, '2024-08-19 01:18:17', '2024-08-20 11:54:04'),
(9, NULL, 400.00, 400.00, 800.00, 500.00, 300.00, '2024-08-20 03:59:43', '2024-08-20 18:17:14'),
(10, NULL, 950.00, 0.00, 950.00, 200.00, 750.00, '2024-08-21 00:06:36', '2024-08-21 19:28:48'),
(11, NULL, 1120.00, 0.00, 1120.00, 0.00, 1120.00, '2024-08-22 00:10:35', '2024-08-22 18:49:44'),
(12, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, '2024-08-23 00:00:08', '2024-08-23 00:00:08'),
(13, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, '2024-08-24 01:12:38', '2024-08-24 01:12:38'),
(14, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, '2024-08-25 00:27:35', '2024-08-25 00:27:35'),
(15, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, '2024-08-26 18:59:14', '2024-08-26 18:59:14'),
(16, NULL, 1100.00, 0.00, 1100.00, 800.00, 300.00, '2024-08-27 00:06:44', '2024-08-27 20:36:39'),
(17, NULL, 1860.00, 0.00, 1860.00, 800.00, 1060.00, '2024-08-28 00:28:54', '2024-08-28 18:48:54'),
(18, NULL, 0.00, 0.00, 0.00, 200.00, -200.00, '2024-08-29 00:22:00', '2024-08-29 15:37:53'),
(19, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, '2024-08-30 01:45:33', '2024-08-30 01:45:33'),
(20, NULL, 200.00, 0.00, 200.00, 0.00, 200.00, '2024-08-31 00:54:56', '2024-08-31 21:50:16'),
(21, NULL, 1230.00, 0.00, 1230.00, 300.00, 930.00, '2024-09-01 08:19:52', '2024-09-01 17:14:45'),
(22, NULL, 1275.00, 0.00, 1275.00, 600.00, 675.00, '2024-09-02 02:37:04', '2024-09-02 21:40:29'),
(23, NULL, 2103.00, 0.00, 2103.00, 700.00, 1403.00, '2024-09-03 07:23:24', '2024-09-03 17:15:21'),
(24, NULL, 1830.00, 0.00, 1830.00, 0.00, 1830.00, '2024-09-04 00:06:05', '2024-09-04 15:23:39'),
(25, NULL, 200.00, 0.00, 200.00, 200.00, 0.00, '2024-09-05 08:04:06', '2024-09-06 18:56:51'),
(26, NULL, 200.00, 0.00, 200.00, 600.00, -400.00, '2024-09-06 09:05:23', '2024-09-06 18:59:35'),
(27, NULL, 600.00, 0.00, 600.00, 0.00, 600.00, '2024-09-07 00:21:20', '2024-09-07 13:44:32'),
(28, NULL, 1110.00, 0.00, 1110.00, 3200.00, -2090.00, '2024-09-08 07:06:03', '2024-09-09 11:21:03'),
(29, NULL, 1210.00, 0.00, 1210.00, 600.00, 610.00, '2024-09-09 00:03:42', '2024-09-09 13:13:04'),
(30, NULL, 601.00, 0.00, 601.00, 0.00, 601.00, '2024-09-10 07:38:38', '2024-09-10 16:26:59'),
(31, NULL, 860.00, 0.00, 860.00, 0.00, 860.00, '2024-09-11 04:46:07', '2024-09-11 10:09:42'),
(32, NULL, 400.00, 0.00, 400.00, 0.00, 400.00, '2024-09-12 05:54:46', '2024-09-12 13:42:50'),
(33, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, '2024-09-12 23:10:26', '2024-09-12 23:10:26'),
(34, NULL, 200.00, 0.00, 200.00, 0.00, 200.00, '2024-09-13 22:02:57', '2024-09-14 12:33:59'),
(35, NULL, 1010.00, 0.00, 1010.00, 1700.00, -690.00, '2024-09-15 07:03:29', '2024-09-15 17:27:08'),
(36, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, '2024-09-15 22:20:10', '2024-09-15 22:20:10'),
(37, NULL, 1300.00, 0.00, 1300.00, 200.00, 1100.00, '2024-09-17 00:40:11', '2024-09-17 13:54:00'),
(38, NULL, 2100.00, 0.00, 2100.00, 140.00, 1960.00, '2024-09-18 01:05:17', '2024-09-18 20:35:20'),
(39, NULL, 1400.00, 0.00, 1400.00, 570.00, 830.00, '2024-09-18 23:59:51', '2024-09-19 13:59:35'),
(40, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, '2024-09-19 22:13:49', '2024-09-19 22:13:49'),
(41, NULL, 200.00, 0.00, 200.00, 0.00, 200.00, '2024-09-20 22:57:28', '2024-09-21 20:43:31'),
(42, NULL, 1200.00, 0.00, 1200.00, 70.00, 1130.00, '2024-09-21 22:28:39', '2024-09-22 17:47:27'),
(43, NULL, 400.00, 0.00, 400.00, 0.00, 400.00, '2024-09-23 06:24:40', '2024-09-23 15:42:00'),
(44, NULL, 810.00, 0.00, 810.00, 0.00, 810.00, '2024-09-24 05:40:41', '2024-09-24 13:27:18'),
(45, NULL, 1000.00, 0.00, 1000.00, 70.00, 930.00, '2024-09-25 04:53:21', '2024-09-25 15:39:31'),
(46, NULL, 1001.00, 0.00, 1001.00, 500.00, 501.00, '2024-09-26 05:24:40', '2024-09-26 19:44:08'),
(47, NULL, 200.00, 0.00, 200.00, 0.00, 200.00, '2024-09-27 03:36:41', '2024-09-27 14:27:31'),
(48, NULL, 0.00, 0.00, 0.00, 70.00, -70.00, '2024-09-27 22:52:35', '2024-09-28 18:39:17'),
(49, NULL, 1419.00, 0.00, 1419.00, 140.00, 1279.00, '2024-09-29 04:37:55', '2024-09-29 10:56:00'),
(50, NULL, 1100.00, 0.00, 1100.00, 0.00, 1100.00, '2024-09-30 06:41:15', '2024-09-30 16:16:55'),
(51, NULL, 600.00, 0.00, 600.00, 0.00, 600.00, '2024-10-01 05:32:59', '2024-10-01 13:36:59'),
(52, NULL, 1430.00, 0.00, 1430.00, 400.00, 1030.00, '2024-10-02 05:49:16', '2024-10-02 15:01:31'),
(53, NULL, 700.00, 0.00, 700.00, 0.00, 700.00, '2024-10-02 22:15:30', '2024-10-03 10:46:09'),
(54, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, '2024-10-03 22:11:27', '2024-10-03 22:11:27'),
(55, NULL, 500.00, 0.00, 500.00, 0.00, 500.00, '2024-10-05 06:13:21', '2024-10-05 15:51:11'),
(56, NULL, 210.00, 0.00, 210.00, 1000.00, -790.00, '2024-10-05 22:37:38', '2024-10-06 21:10:42'),
(57, NULL, 200.00, 0.00, 200.00, 600.00, -400.00, '2024-10-07 06:39:22', '2024-10-07 17:47:15'),
(58, NULL, 700.00, 0.00, 700.00, 100.00, 600.00, '2024-10-08 06:08:04', '2024-10-08 16:54:52'),
(59, NULL, 2010.00, 0.00, 2010.00, 160.00, 1850.00, '2024-10-08 23:00:33', '2024-10-10 04:58:21'),
(60, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, '2024-10-10 04:57:23', '2024-10-10 04:57:23'),
(61, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, '2024-10-11 05:38:49', '2024-10-11 05:38:49'),
(62, NULL, 900.00, 0.00, 900.00, 1060.00, -160.00, '2024-10-12 07:34:49', '2024-10-12 19:11:31'),
(63, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, '2024-10-13 03:02:36', '2024-10-13 03:02:36'),
(64, NULL, 1200.00, 0.00, 1200.00, 170.00, 1030.00, '2024-10-14 04:24:36', '2024-10-14 16:46:40'),
(65, NULL, 700.00, 0.00, 700.00, 0.00, 700.00, '2024-10-14 22:42:09', '2024-10-15 13:54:56'),
(66, NULL, 1300.00, 0.00, 1300.00, 120.00, 1180.00, '2024-10-16 04:39:49', '2024-10-17 09:04:17'),
(67, NULL, 1400.00, 0.00, 1400.00, 1500.00, -100.00, '2024-10-17 06:57:00', '2024-10-18 15:42:13'),
(68, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, '2024-10-17 23:30:11', '2024-10-17 23:30:11'),
(69, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, '2024-10-18 22:45:58', '2024-10-19 06:22:09'),
(70, NULL, 1500.00, 0.00, 1500.00, 140.00, 1360.00, '2024-10-20 04:18:48', '2024-10-20 17:16:39'),
(71, NULL, 500.00, 0.00, 500.00, 60.00, 440.00, '2024-10-21 05:28:45', '2024-10-21 16:31:41'),
(72, NULL, 606.00, 0.00, 606.00, 60.00, 546.00, '2024-10-22 05:16:28', '2024-10-22 16:58:06'),
(73, NULL, 1300.00, 0.00, 1300.00, 0.00, 1300.00, '2024-10-23 04:33:53', '2024-10-23 13:22:32'),
(74, NULL, 800.00, 0.00, 800.00, 120.00, 680.00, '2024-10-24 05:19:26', '2024-10-24 12:40:23'),
(75, NULL, 200.00, 0.00, 200.00, 0.00, 200.00, '2024-10-25 03:36:20', '2024-10-25 14:44:37'),
(76, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, '2024-10-26 07:31:11', '2024-10-26 07:31:11'),
(77, NULL, 600.00, 0.00, 600.00, 0.00, 600.00, '2024-10-27 06:18:01', '2024-10-27 15:45:11'),
(78, NULL, 900.00, 0.00, 900.00, 560.00, 340.00, '2024-10-28 05:36:55', '2024-10-29 07:36:11'),
(79, NULL, 1300.00, 0.00, 1300.00, 60.00, 1240.00, '2024-10-28 23:05:28', '2024-10-29 15:17:21'),
(80, NULL, 1400.00, 0.00, 1400.00, 120.00, 1280.00, '2024-10-30 04:03:26', '2024-10-30 18:37:39'),
(81, NULL, 900.00, 0.00, 900.00, 120.00, 780.00, '2024-10-31 08:29:08', '2024-10-31 15:04:05'),
(82, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, '2024-11-01 14:01:30', '2024-11-01 14:01:30'),
(83, NULL, 400.00, 0.00, 400.00, 60.00, 340.00, '2024-11-02 08:07:13', '2024-11-02 17:01:52'),
(84, NULL, 1100.00, 0.00, 1100.00, 100.00, 1000.00, '2024-11-03 07:39:45', '2024-11-03 18:15:15'),
(85, NULL, 900.00, 0.00, 900.00, 240.00, 660.00, '2024-11-04 05:59:22', '2024-11-04 18:43:30'),
(86, NULL, 1200.00, 300.00, 1500.00, 120.00, 1380.00, '2024-11-05 07:23:53', '2024-11-05 17:21:20'),
(87, NULL, 1900.00, 0.00, 1900.00, 60.00, 1840.00, '2024-11-05 23:17:30', '2024-11-06 22:49:19'),
(88, NULL, 1800.00, 0.00, 1800.00, 60.00, 1740.00, '2024-11-06 23:51:00', '2024-11-07 21:51:18'),
(89, NULL, 0.00, 0.00, 0.00, 600.00, -600.00, '2024-11-07 23:17:33', '2024-11-08 19:17:13'),
(90, NULL, 300.00, 0.00, 300.00, 0.00, 300.00, '2024-11-09 05:45:05', '2024-11-09 21:39:21'),
(91, NULL, 400.00, 0.00, 400.00, 0.00, 400.00, '2024-11-10 06:22:01', '2024-11-10 14:08:05'),
(92, NULL, 1000.00, 0.00, 1000.00, 2560.00, -1560.00, '2024-11-10 23:16:35', '2024-11-11 21:13:49'),
(93, NULL, 900.00, 0.00, 900.00, 1170.00, -270.00, '2024-11-11 23:49:59', '2024-11-12 19:07:29'),
(94, NULL, 1000.00, 0.00, 1000.00, 60.00, 940.00, '2024-11-12 23:06:30', '2024-11-13 16:57:37'),
(95, NULL, 2200.00, 300.00, 2500.00, 240.00, 2260.00, '2024-11-13 23:06:53', '2024-11-14 19:36:08'),
(96, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, '2024-11-14 23:22:05', '2024-11-14 23:22:05'),
(97, NULL, 500.00, 0.00, 500.00, 0.00, 500.00, '2024-11-16 07:00:05', '2024-11-16 21:21:47'),
(98, NULL, 990.00, 0.00, 990.00, 870.00, 120.00, '2024-11-17 06:17:55', '2024-11-17 20:32:10'),
(99, NULL, 1300.00, 0.00, 1300.00, 240.00, 1060.00, '2024-11-18 01:23:12', '2024-11-18 18:11:07'),
(100, NULL, 1701.00, 0.00, 1701.00, 240.00, 1461.00, '2024-11-19 05:33:42', '2024-11-19 22:03:22'),
(101, NULL, 1406.00, 0.00, 1406.00, 210.00, 1196.00, '2024-11-20 06:08:31', '2024-11-20 20:30:20'),
(102, NULL, 860.00, 0.00, 860.00, 120.00, 740.00, '2024-11-20 23:23:29', '2024-11-21 19:33:44'),
(103, NULL, 300.00, 0.00, 300.00, 0.00, 300.00, '2024-11-22 06:46:30', '2024-11-22 16:36:58'),
(104, NULL, 400.00, 0.00, 400.00, 0.00, 400.00, '2024-11-22 23:26:12', '2024-11-23 10:06:34'),
(105, NULL, 2300.00, 0.00, 2300.00, 360.00, 1940.00, '2024-11-24 06:43:42', '2024-11-24 19:39:05'),
(106, NULL, 2050.00, 0.00, 2050.00, 180.00, 1870.00, '2024-11-25 06:46:31', '2024-11-25 16:56:05'),
(107, NULL, 1410.00, 0.00, 1410.00, 1300.00, 110.00, '2024-11-25 23:46:56', '2024-11-27 16:14:23'),
(108, NULL, 900.00, 0.00, 900.00, 0.00, 900.00, '2024-11-26 23:26:28', '2024-11-27 22:58:16'),
(109, NULL, 1223.00, 0.00, 1223.00, 200.00, 1023.00, '2024-11-27 23:00:56', '2024-11-28 16:59:33'),
(110, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, '2024-11-28 23:13:17', '2024-11-28 23:13:17');

-- --------------------------------------------------------

--
-- Table structure for table `server_copy_orders`
--

CREATE TABLE `server_copy_orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid_voter_birth_form_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int DEFAULT '0' COMMENT '0=Pending,1=Accepted',
  `comment` text COLLATE utf8mb4_unicode_ci,
  `admin_comment` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `server_copy_unofficials`
--

CREATE TABLE `server_copy_unofficials` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nameEn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bloodGroup` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occupation` text COLLATE utf8mb4_unicode_ci,
  `nationalId` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanentAddress` text COLLATE utf8mb4_unicode_ci,
  `presentAddress` text COLLATE utf8mb4_unicode_ci,
  `photo` longtext COLLATE utf8mb4_unicode_ci,
  `photoBase64` longtext COLLATE utf8mb4_unicode_ci,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nidFather` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nidMother` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `voterArea` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateOfBirth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthPlace` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `voter_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qr_code` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sign_copy_orders`
--

CREATE TABLE `sign_copy_orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid_voter_birth_form_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int DEFAULT '0' COMMENT '0=Pending,1=Accepted',
  `comment` text COLLATE utf8mb4_unicode_ci,
  `admin_comment` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint UNSIGNED NOT NULL,
  `state_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `name_address_id` int NOT NULL DEFAULT '0',
  `new_nid` int DEFAULT NULL,
  `old_nid` int DEFAULT NULL,
  `birth` int DEFAULT NULL,
  `server_unofficial` int DEFAULT NULL,
  `sign_to_server` int DEFAULT '0',
  `registration` int DEFAULT '0',
  `login` int DEFAULT '0',
  `recharge` int DEFAULT '0',
  `voter_info` int DEFAULT '0',
  `active_status` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `submit_statuses`
--

INSERT INTO `submit_statuses` (`id`, `sign_copy`, `server_copy`, `id_card`, `biometric`, `name_address_id`, `new_nid`, `old_nid`, `birth`, `server_unofficial`, `sign_to_server`, `registration`, `login`, `recharge`, `voter_info`, `active_status`, `created_at`, `updated_at`) VALUES
(1, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, '2024-05-01 04:00:33', '2024-11-28 20:51:29');

-- --------------------------------------------------------

--
-- Table structure for table `tin_cirtificates`
--

CREATE TABLE `tin_cirtificates` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `name_english` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_name_english` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_name_english` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `permanent_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `tin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `previous_tin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_zone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_circle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qr_code_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zone_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zone_phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT '0',
  `details` text COLLATE utf8mb4_unicode_ci,
  `premium` int DEFAULT '0',
  `premium_start` timestamp NULL DEFAULT NULL,
  `premium_end` timestamp NULL DEFAULT NULL,
  `balance` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `status` int DEFAULT '0',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `image`, `email_verified_at`, `is_admin`, `details`, `premium`, `premium_start`, `premium_end`, `balance`, `status`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(13, 'Admin', 'admin@admin.com', 'user/user-1883643859.jpg', NULL, 1, '<h4><strong>হ্যালো মেম্বারস</strong></h4><p>আমি এই ওয়েবসাইটের অ্যাডমিন আপনাদের উদ্দেশ্য করে কিছু কথা বলছি।</p><p>আমি আপনাদের মধ্যে যে সাইটটি নিয়ে এসেছি, এর মাধ্যমে আপনারা NID CARD/সাইন কপি/সার্ভার কপি থেকে শুরু করে আন-অফিসিয়াল সার্ভার কপি ডাউনলোড করতে পারবেন।</p><p>আপনার নিজের নিরাপত্তা ও সকলের নিরাপত্তার স্বার্থে &nbsp;Website এর লিংক অন্য কারো সাথে শেয়ার করা থেকে বিরত থাকুন। যদি কারো সাথে Website এর লিংক শেয়ার অথবা টাকার বিনিময়ে বিক্রি করেন তবে আপনার বিরুদ্ধে যথাযথ ব্যবস্থা গ্রহন করা হবে।</p><h4><strong>হ্যালো মেম্বারস</strong></h4><p>আপনারা কখনো অপ্রয়োজনে আমাকে ইনবক্সে মেসেজ করবেন না। সর্বদা নোটিশ ফলো করবেন, নোটিশে যা লেখা থাকবে তাই কার্যকর হবে। অনেক সময় সার্ভার কপি ডাউনলোড না হলে ২/৩ টা বাহির করার চেষ্টা করুন, যদি তারপরেও ডাউনলোড না হয়, এবং নোটিশে “সার্ভার কপি চালু” লেখা থাকে, তবে অ্যাডমিনকে মেসেজের মাধ্যমে অবগত করুন।</p><p>সবাইকে ধন্যবাদ</p>', 0, NULL, NULL, '0', 0, 'eyJpdiI6ImRvYi9Sa1gwOXBvMStQV0tvY093eEE9PSIsInZhbHVlIjoiOGVZT2FDaE9tbmpKck1VaUpnbnFIdz09IiwibWFjIjoiOTczMjg5ZjMxYWY0MWUxODVlYjcyODE1ZmQyMWNhN2FmZGUxZmY5ZjFjMGQ0YzU4OWIzODU0YjM0YjgwZGUzMCIsInRhZyI6IiJ9', NULL, '2023-06-08 05:32:42', '2024-09-16 16:37:48'),
(42, 'KhalidHasan', 'sssagor299@gmail.com', NULL, NULL, 0, NULL, 0, '2024-09-17 15:07:56', '2024-10-07 15:07:56', '39', 1, 'eyJpdiI6ImY2UmpIVUtWRXpKbmJqeWhmNjVRR1E9PSIsInZhbHVlIjoickU2STluNjBIRE5VK1o0VmN6ZkdnQT09IiwibWFjIjoiYjBjNTgyMDg0ZDU3YjQ1NjQxNjJiYTE1OTEwMzE4YjA4YWQ5N2IxMGRiYzQ2YTM3YmZhYjBlYmQxYWNmYTVkNCIsInRhZyI6IiJ9', NULL, '2024-05-20 07:06:18', '2024-11-13 14:07:23'),
(43, 'MD. RASEL MIA', 'Vaihot81@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '29', 0, 'eyJpdiI6IlV5N0U0d3RkRGhyOVNpN24yeWdmalE9PSIsInZhbHVlIjoieDFVd0wxTjY3YlVqY0xMY3NWcWlXZz09IiwibWFjIjoiN2ExNTMzZTQ5NWRhYWU3YTA4ZGY2YmI4YzhkN2M2ZGQ5OWZmN2U5MjhjNDc1OTdiZTRjOTkxOTE4NmQyM2ZmYiIsInRhZyI6IiJ9', NULL, '2024-05-20 07:41:40', '2024-11-19 16:12:25'),
(44, 'Admin', 'bismillacomputer.kha30@gmail.com', NULL, NULL, 0, NULL, 2, '2024-11-28 18:20:15', '2024-11-29 18:20:15', '830', 1, 'eyJpdiI6IlYxVHVhNWI5U1BYcmhra0dZWXUxN2c9PSIsInZhbHVlIjoibUo3TDV3L1BJdVJGU21pTXBlbHh5Zz09IiwibWFjIjoiOThhZDhlYWZjOWMyYzQ4NDRiNzZkNWVkZWNkYmFmZmZiMGI5ZGRlYTJkOTMxODVmZTA1YzI3ZGE1ZjQyYWE4YyIsInRhZyI6IiJ9', NULL, '2024-05-20 07:53:39', '2024-11-28 18:24:22'),
(51, 'SHIHAB', 'nahiyanshihab201@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '47', 1, 'eyJpdiI6InY5V3RmN3VWNFN4QkRxVEkzQW5xK3c9PSIsInZhbHVlIjoic1didjRseklwWEI2dnYzbTA2QWNKUT09IiwibWFjIjoiZmMyZTgzMGQ1OTdhMzMwYzcyNmFmMjI1ZDExYWViNmQ0N2VhZWQ3YjU2NjdhMjU2MDM1MjNiZmZmNjFjMDZmOSIsInRhZyI6IiJ9', NULL, '2024-05-22 12:02:24', '2024-10-03 11:36:00'),
(57, 'JAKIR HOSSAIN', 'Mdjakirhossaim3@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '99', 1, 'eyJpdiI6Inl3bFFLTE1CY0F3ZWo5cFZOc0V6dnc9PSIsInZhbHVlIjoicE9mRElVdk9BaVdXbDhQcExCZkpPQT09IiwibWFjIjoiM2I5NTg1MTcxN2MwMDVhOTk1ODUzNzdkNDFkYjM3Yzk1MmMzMzQ0YjRkYmJhNjc3MDY4NzFkNjVmZDE2MzI5OCIsInRhZyI6IiJ9', NULL, '2024-05-23 10:52:09', '2024-11-26 12:42:50'),
(63, 'rajuahmed', 'rajuahmed3718@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '85', 1, 'eyJpdiI6ImtGOG41NS9aR1VnOWhhT1YwR04xb1E9PSIsInZhbHVlIjoiRTVBVjVwTmNWcldlRC9zMHI0cmpTZz09IiwibWFjIjoiMTFhNzdjYzhhMmM4NzEyYjU5NDZhMTk0YjcxODRmNWFiMDMxNTRkMDBhZjRjYWU0YWU1MmM3N2Q1NDQwMTIzMSIsInRhZyI6IiJ9', NULL, '2024-05-26 09:59:00', '2024-11-28 13:36:33'),
(64, 'minhajulnizam74', 'minhajulnizam74@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '27', 1, 'eyJpdiI6InI3cGxva3NNcHg4L0hoTmNqQ3JGMXc9PSIsInZhbHVlIjoiNnVPNEE0M05GOEZOMGtJdW0zdkh6QT09IiwibWFjIjoiYTc2ZWRjMzZlYjY3NzQzODg4YzExYzJhMGMyNGRmOGQzYWExZmI1M2FkYzZhN2JmZTVlNzlkNjhiZWNmMmZjZSIsInRhZyI6IiJ9', NULL, '2024-05-26 11:06:27', '2024-09-26 20:09:07'),
(66, 'S.M SOJIB', 'sojibgazi21@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '125', 1, 'eyJpdiI6IlM1cHdibUU2QWhrSy9UZjZQNStZeVE9PSIsInZhbHVlIjoiVGVYeHdoc2daNjlhaXJRQU4rTHdDdz09IiwibWFjIjoiMjczYmMxN2Y0MTQ4OTYyZmMyYjdkZGE1Y2M5MjZjNDdlZDE2ZTE1YWFlNjIwYzBlODUyYjEzOTdmZmIyNmMzYiIsInRhZyI6IiJ9', NULL, '2024-05-26 17:50:37', '2024-11-26 12:26:51'),
(67, 'Ⓜⓓ  .... Ⓐⓑⓤ Ⓕⓐⓘⓢⓐⓛ', 'faislcxb@gmail.com', NULL, NULL, 0, NULL, 0, '2024-08-20 12:25:34', '2024-09-09 12:25:34', '92', 1, 'eyJpdiI6IkR0OHh2Vm9jNktiZXdjazJiMytLYXc9PSIsInZhbHVlIjoiTUtncjd0SEU2bmNES3Via2dHSUpmZz09IiwibWFjIjoiM2Q1Mjc1ZmQ4ZmMxZDJjZDMzZmQ2NmQ1Yjg3NzE1M2YzZjgxOTJmNzYyOWFhZjVjNWNjZWI0ZDc1ODkzNGRkMCIsInRhZyI6IiJ9', NULL, '2024-05-26 23:37:46', '2024-11-28 16:53:11'),
(68, 'Faharul', 'faharul.fcs@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '162', 1, 'eyJpdiI6Im9lMTBlL0R1Q1VVQTdaSWhDZDJCZ1E9PSIsInZhbHVlIjoiSGlqb0xoVkFlL2tEcWl4UnB0Zm05Zz09IiwibWFjIjoiMGM1ZTM4NWFhZTgzZTk1MGM5ZThmNTA0NDMwMzk3NWY5ZDg5NDI3YThkMzdhNzA2ZDAyOGU2OWIwNWJmNjc1ZSIsInRhZyI6IiJ9', NULL, '2024-05-27 12:00:05', '2024-11-17 16:27:53'),
(69, 'ahsan.msi', 'dhaka.msi@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '19', 1, 'eyJpdiI6IjFvd3BSNmNZNzI5OGZ0Rk01QmE4Tnc9PSIsInZhbHVlIjoiaW9WZ0I5dVFRNGFOdHdNS090ZU1sdz09IiwibWFjIjoiMmViNzQ2ZjVjNWJkMjk0NzdhZWM2MGRmZTEzZDRiYzZkNWZhYTMwNWE4MTZkOTA3ZDYyMDE5ZTM5NmI0YzA2ZSIsInRhZyI6IiJ9', NULL, '2024-05-29 09:58:06', '2024-09-26 20:09:50'),
(74, 'Alivai', 'raihanmiziit@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '10', 1, 'eyJpdiI6Ikx4b0dQZEFLeTlTd2dwTmEzdXVTb2c9PSIsInZhbHVlIjoiSnFGd0pxK1dhUlFSR0w0dzRMaTRmUT09IiwibWFjIjoiNzFhMmI3MmQ0YzJiZTk4NDkzOGM1ZDNjYjcwZTQ5MGYxZmVmMDY5YzRlYzE5ZTRkZjE3ODJkYTQ4MjlmMGQ0ZiIsInRhZyI6IiJ9', NULL, '2024-06-01 22:23:17', '2024-09-26 20:10:05'),
(77, 'Ab1234##', 'mssanictraders2021@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '100', 1, 'eyJpdiI6IlZ5SkcxbWNKaEQxeGp5Sm9qc3hKRGc9PSIsInZhbHVlIjoiNUhKOEVqTnZvdjFkRVJQcSs0NGNlZz09IiwibWFjIjoiOWYyOGRjZjNkYzQ4NzVjNTcxY2ZhY2Q0NDc1MTczYjk0N2YzODc1N2VkZDAyYTUzMjJkOThlN2ZmOWM0NjhjMiIsInRhZyI6IiJ9', NULL, '2024-06-02 12:39:39', '2024-09-27 06:05:32'),
(78, 'suvro', 'saikatsarkar1122@gmail.com', NULL, NULL, 0, NULL, 0, '2024-09-15 10:14:20', '2024-09-25 10:14:20', '14', 1, 'eyJpdiI6Ii9MM3BQdFRDUHd1S0h2eXpWZlJpNmc9PSIsInZhbHVlIjoieXAwSkJiVGE5eHppUGFtemtrWWF3QT09IiwibWFjIjoiMzNjNTViOGUzY2RkMGViZjdmYzlhM2VmYmQyYzc4NGFhNWNhY2UyMTNkYzJlNDM2MjdjZTgxYzZmZDVlN2VmZCIsInRhZyI6IiJ9', NULL, '2024-06-02 17:43:26', '2024-10-29 10:01:11'),
(89, 'ABDULLAH AL MAHMUD', 'abdullahalnahmud@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 0, 'eyJpdiI6IlAySXBQRlFqZE83aERxQkUwK1FqZlE9PSIsInZhbHVlIjoiYnA3dGlUaHZjYUxKaDB4QzQ0OUJVdz09IiwibWFjIjoiMDJiMzkxNDc3YTQ3ZmRmMzY3MDVmMTRiMDEyM2U1YmRhMzczNjBiMzgwNGRhNTI4M2I5ZmYwYjAwMDc5NzMzZiIsInRhZyI6IiJ9', NULL, '2024-06-04 12:59:36', '2024-11-02 17:01:52'),
(92, 'mahabul', 'mahabulalam71@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '97', 1, 'eyJpdiI6IjVQdkkwaU1rcTZFMkdmZnJyWkpsZmc9PSIsInZhbHVlIjoiR25NSm8zYUhSK0Y4Njg2Z2RhR0VkQT09IiwibWFjIjoiMjFjZjU0YjkzNWQzOWU1MzYxYWM5Njg1NmUzZTZlNjc3ZjNlMTNlNjcwNzJlZjI3MGQxNTAwYTVjMTMyN2RjOCIsInRhZyI6IiJ9', NULL, '2024-06-05 10:47:36', '2024-11-20 15:17:28'),
(96, 'Osman', 'osman55tjn@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '123', 1, 'eyJpdiI6InVXang1NTYwSWVTUHc1cHdiQTNXcUE9PSIsInZhbHVlIjoiVUhHQ1FzZzFGNkpVNjdMdzZJYmRPZz09IiwibWFjIjoiN2Q1YzU5MDg0OTM1MWQ5ZGU2NWZhMTYyZTcwNzQ2MjdmM2NmYjNhMjg5MzE2M2FiY2Q3NjI0NjM3OTUxZGVhOCIsInRhZyI6IiJ9', NULL, '2024-06-05 21:45:36', '2024-10-15 11:12:31'),
(97, 'Mdkayes3859', 'mdkayes3859@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '112', 1, 'eyJpdiI6ImJ5UnBmUmNCWTE3bkV2ZkpkVkVoZXc9PSIsInZhbHVlIjoiYVc1SUp4aUp5WUhXN094TmEva05Pdz09IiwibWFjIjoiYjNlODg4N2RkNTdlNThiODZjMGMyODA1MmQ1ZDA3MzdlY2NjZjFjZGUxYzQwNGQxNTg4ZjZmNTgxYmJiYjI1OCIsInRhZyI6IiJ9', NULL, '2024-06-06 13:08:28', '2024-11-28 13:48:49'),
(98, 'ncomputer', 'ncomputer74@gmail.com', NULL, NULL, 0, NULL, 0, '2024-09-10 16:27:11', '2024-10-10 16:27:11', '112', 1, 'eyJpdiI6IlJ6aFozNmtBR1F3NkpaQ0xSeVhwYWc9PSIsInZhbHVlIjoiVUVNVmhBVmliZnM0MEJ0WEtYR3RuUT09IiwibWFjIjoiYzQwYzFkODllODQ3YTgwNTM4MzQ4MTNhODgyYjU5ZDMwNGE3OTE0MDBkMWM4NDdmMTE3MGJlZWFiNGRmYWRkNCIsInRhZyI6IiJ9', NULL, '2024-06-06 13:25:34', '2024-11-28 10:41:05'),
(105, 'IQBAL', 'Djlederiqbalbai@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '40', 1, 'eyJpdiI6Im9WV2ZzeTg3WTdPbkhQVC9tZEp0MVE9PSIsInZhbHVlIjoieERjOE40K1ZPREtiVFdjcEIzajROZz09IiwibWFjIjoiZDBmN2NkNDI4MjFjYTViZmNmYTYxZTFiMjFkMjY1ODg5ZjYzZjZlZGIyYmYwMzM2ZThhN2Y4NzMxYmU3MTI2MiIsInRhZyI6IiJ9', NULL, '2024-06-10 20:35:23', '2024-09-27 06:06:51'),
(109, 'Rashel Islam', 'irashel51@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '212', 1, 'eyJpdiI6Inhzazh5UUNGTFYyV1FKeldzQlY4VVE9PSIsInZhbHVlIjoiZGUvMFMvT25FZExaZVFTNXd0Q3FvQT09IiwibWFjIjoiODUwNWYwNTBlNmE5ZTIwOGZlZjJmMzYyOThmM2I3NDlhYTkxYzY0MzE4ZjkwZWY3Y2NjZWE3ZjAwMDdmNWIzMCIsInRhZyI6IiJ9', NULL, '2024-06-11 13:40:54', '2024-11-13 12:25:28'),
(113, 'madhobpal10', 'madhobpal10@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '107', 1, 'eyJpdiI6IkcxeXVmNGQzVm9VK24rc3FqcmNyaGc9PSIsInZhbHVlIjoiVmtjdEIvZThIaE5LTjVxbUJSOFFqdz09IiwibWFjIjoiY2EwMjYyM2NlOGY0ZDU4MTRhMjcwYzA1NTJlNDgzOTg2ZmNhZTJmZGRmMTNkOTFlNzQwNmViM2YzODFjMTk4YiIsInRhZyI6IiJ9', NULL, '2024-06-11 17:15:39', '2024-09-28 09:40:56'),
(115, 'sapan', 'sapan.cec@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '169', 1, 'eyJpdiI6ImNvUUpOWmcvTE9nRVhnemtwOE9VZHc9PSIsInZhbHVlIjoiaWl6WXlUMyswY0ZRZk1XNm9lUHhHUT09IiwibWFjIjoiOGVlY2Q3MzM5ZDkzYWI4MTQyOGEyYTU3NzMxMGZmZDZmNGQzZTc5NWEzN2Y2NTEzYjZjOGM1NWFlNGEwOTA4NSIsInRhZyI6IiJ9', NULL, '2024-06-12 12:44:54', '2024-11-26 13:09:41'),
(121, 'Hridoy Paul', 'paulhridoy861@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '100', 1, 'eyJpdiI6InJKT2V4MFcxTEpaQXhNdWR1S3dGd2c9PSIsInZhbHVlIjoiUWZMd3hRbzZGUXlVT0JIWjJLbDA1UT09IiwibWFjIjoiMjA1M2FhYWE2MTU3YmY1Y2E1OWIzODRkNmI4MjMyMGNhYjQxMzI1MWE2OTljY2M3YzQ3NTI5MTczYTllYmM3NCIsInRhZyI6IiJ9', NULL, '2024-06-13 16:11:38', '2024-11-24 11:27:31'),
(124, 'Ra5252', 'gog41765@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '19', 1, 'eyJpdiI6InY1ZDZVRmpoYzViM1lkWnBENDdjcWc9PSIsInZhbHVlIjoid0N4cXZQVUJYLzJpL3ZvWGZ2SWw5dz09IiwibWFjIjoiOTgzOTFkMzgxYWY5ZTVjNDhjODQ0YTA4N2EyNGI4NjIxMWZkMzliZTVlYTBhODcyZWM4YWI1MjhkNzlhNmQ5NiIsInRhZyI6IiJ9', NULL, '2024-06-16 09:58:07', '2024-09-27 06:07:43'),
(132, 'sr', 'sr@gmail.com', NULL, NULL, 1, NULL, 0, NULL, NULL, '0', 0, 'eyJpdiI6Ik5iRWE2MlFZNk1JWUpnZkZzckhXYmc9PSIsInZhbHVlIjoibUdYUklnN1gvNjBCWjBuZTY5THp0UT09IiwibWFjIjoiMjVmZTM2OTc0NTkwMGQ0YjU2ZDU3NjNlM2MzOTQwNTBiMzQzMzE1N2Y4ZWQzZTZiNDZhY2ExMzU3M2UxODBlNiIsInRhZyI6IiJ9', NULL, '2024-06-23 10:18:34', '2024-07-01 21:56:25'),
(134, 'mazidhasan12', 'mazidgd12@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '15', 1, 'eyJpdiI6IkxPalNwY3pxSm1Oa1dnbE1yb0tqRmc9PSIsInZhbHVlIjoiV3I4QlhmYWZiVUl6clBhQlY2MGlEZz09IiwibWFjIjoiOTJhOTJiZDJhN2M3ODVlYzg5Yzg1MGU5MDA2NTIwYzIyNTY3OTY1Y2Y3MmNmZDhiMmNhZmQ2ODBiNzRlMGMzYiIsInRhZyI6IiJ9', NULL, '2024-06-23 10:33:43', '2024-10-23 10:43:21'),
(135, 'Abir Hasan', 'abirbd23242526@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '86', 1, 'eyJpdiI6IjhUTFZBRDVHbHFQbXFLakFMNm1uNmc9PSIsInZhbHVlIjoiQklySkNMSGhLelVYTW1uckJ6TktNUT09IiwibWFjIjoiYmUzNzcwYzMzY2EwMjVhYjYyZDliNTMyMDVjZmJkYWJiOWFiMTU2NjAxMjNlMDE3MmFmMjM0MjE3ZmI4MTRiNiIsInRhZyI6IiJ9', NULL, '2024-06-23 12:14:24', '2024-11-27 12:30:40'),
(140, 'Al5@01325', 'Imd388953@gmail.com', NULL, NULL, 0, NULL, 0, '2024-08-19 09:25:51', '2024-09-18 09:25:51', '200', 1, 'eyJpdiI6Ikp5cTE0Ylh1QS9wdmExb3lpNmZoS1E9PSIsInZhbHVlIjoibkNMaWVYWWxpeUhYdXBva0ZSbTljUT09IiwibWFjIjoiNjkwMGRhZjFkNDViNmJkYTNmNmQzYmY0MGJkN2IxN2QwZDgwZTY0MzVkZjM5NWI1ODI0MDc0ZDExYWM0M2EyNyIsInRhZyI6IiJ9', NULL, '2024-06-25 07:18:08', '2024-11-26 12:18:04'),
(141, 'Bala', 'hmbala1144@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '121', 1, 'eyJpdiI6IjdGWG9oN3ByVjdjZ3lvaDRESy9zQXc9PSIsInZhbHVlIjoiVWQvaWVsRGtNOG9SMmFyNEJwR3FSUT09IiwibWFjIjoiYmYxOTlkNzMxOTg5NmQ5NGFmYjA0NDU2ZjMzODNiZjk5NDNmNWRhNjlkYmU1M2FiZjg1ZGM4OTc2MWE1OTJmNiIsInRhZyI6IiJ9', NULL, '2024-06-26 03:03:20', '2024-11-25 13:32:39'),
(143, 'DG Khulna', 'designghor0@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '61', 1, 'eyJpdiI6Ik9CN2ZxZzRiODZWM2dtRHNNd2R4RWc9PSIsInZhbHVlIjoiWG1GUmVXMVRObnp3enNCelJqcHM5Zz09IiwibWFjIjoiMDM5NzJlMWM1MjlmMjA2ZWEzNDA5OWVjMWM2YTRiZGZhZGFjODkzYzU5MmJmOWQ3YjgzZWMzMDlhNDhiMzMzOSIsInRhZyI6IiJ9', NULL, '2024-06-26 20:49:38', '2024-11-14 13:39:32'),
(146, 'Shipon Miah', 'mdshiponcp39@gmail.com', NULL, NULL, 0, NULL, 0, '2024-08-12 11:03:11', '2024-09-11 11:03:11', '109', 1, 'eyJpdiI6ImFXOXQwODhtUkNOdE5lenBRZDBESXc9PSIsInZhbHVlIjoieEJxZ3pqd2J4aTd2QzZ4WDBxOStqUT09IiwibWFjIjoiZmIxZTc2MmNiODFiYmQwMjVkYTY0YTBlMTYwMDQ1Y2NiNDcwZjY2MzU3ZGU1Yzc5M2E5ZmZmN2JlY2U2N2UwNiIsInRhZyI6IiJ9', NULL, '2024-06-27 16:56:31', '2024-11-17 10:36:08'),
(149, 'hadijesmin@2002', 'hadiuzzaman286@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '29', 1, 'eyJpdiI6ImNzM3NiMjZCNW9FWFN4VFp6TGlNL3c9PSIsInZhbHVlIjoieFUwMUd4ZW52ckhaVWdWMWk3b3ZTUT09IiwibWFjIjoiNDRlYmMxNzZjYmRkNGUzNDU3YThiOWRlNTgwZWYyNGZjMWQzNzg5NTVkZTg0MmY1NWQ4ODk3M2M2NmI3NWYzNiIsInRhZyI6IiJ9', NULL, '2024-06-28 21:33:33', '2024-09-27 06:09:27'),
(151, 'Hapania', 'hosainj378@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '28', 1, 'eyJpdiI6InU3SzBaeXNDUVJvSVlScDlVWDB6Qmc9PSIsInZhbHVlIjoiMzk1RmMydUlWbGIvT2xHNGlYNFluQT09IiwibWFjIjoiMzIxYWI3YjIzOGI0N2JiZTJiNGIyNjFjMjBlNzc0MzI0NmU4YjU3ZmQyZmZhMTJhMzZlY2NkYTRiM2U1NGNlMSIsInRhZyI6IiJ9', NULL, '2024-06-29 16:07:50', '2024-10-12 07:46:20'),
(153, 'MuNnA Shoker', 'munnafaruk.Bd@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '89', 1, 'eyJpdiI6IkwrdDJBalA4U2NIdCtXMW0xVUpXTEE9PSIsInZhbHVlIjoia0tjSi9yU28vVWcyNWxSaWNTamo2UT09IiwibWFjIjoiOWRkMjM4MzkyNmY1M2ZiMzFjNDA3ZjA2MDJmYTA2NmQzMDM3ZTM0MDYzNDk4NGNmZGI1ZDBiOTQ0NTRiODhhZCIsInRhZyI6IiJ9', NULL, '2024-06-30 03:44:17', '2024-11-18 10:14:15'),
(156, 'humaun', 'humaunakandha@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '199', 1, 'eyJpdiI6ImpmN0ZJTmk2NGg0YjMvSzNoTkIxTlE9PSIsInZhbHVlIjoicWhDb2lzMkVWRktaTFZsTTFPNWljNEpER2JIcnRYbG16VnJrNU1yVGthaz0iLCJtYWMiOiI1NTcwNTEwYzc0ZGM4ODBjOWJlMjI5ZmY5NDJhNGMzN2EyMjZjMDA5MDJhY2ViOGM3NmIzMTdkMWRjMjk5YzlhIiwidGFnIjoiIn0=', NULL, '2024-07-01 20:37:22', '2024-11-21 14:32:50'),
(158, 'Rayhan hossen', 'rayhanrs1819@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '10', 1, 'eyJpdiI6ImpRdUJjR3lWWmR4aGVKd050QWlNZ0E9PSIsInZhbHVlIjoiUjdvVHBxdlhyUGVGY0czWVRRMzliUT09IiwibWFjIjoiNGRjNTIyZmU3YjQxY2U2ZWQ3NGY4NTg3MTMyNmQyNTA2YTc5ZjZiM2EzYTBkYWVjMmRhZjE3MWI2NzYxNzlhZCIsInRhZyI6IiJ9', NULL, '2024-07-02 13:35:21', '2024-09-27 06:09:55'),
(163, 'New', 'new@gmail.com', NULL, NULL, 1, NULL, 0, NULL, NULL, '0', 0, 'eyJpdiI6Imh1RzdiNmRKRlRIWWVybSs2S29GQUE9PSIsInZhbHVlIjoiZS9hQXgyOU5ZbEpQOEplOW5RSWdIUT09IiwibWFjIjoiYTJjZWMzYjdkNDRlY2I1M2NmNmI5YTYxYTNmMWQ5NjMxMTdjNWNlMjVkYjkyNDJkZGVjYmQ4MjlkZjEwMjY0YSIsInRhZyI6IiJ9', NULL, '2024-07-04 00:46:50', '2024-07-04 00:46:50'),
(170, 'NILOY', 'ovimanineel36@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '200', 1, 'eyJpdiI6IkpBckFCcldwaDl1bmpxTmdMaFNhSlE9PSIsInZhbHVlIjoiQjIxU0MxdFVoM1JRT1J4OWdUa0Vsdz09IiwibWFjIjoiYzYyZGE4OTVmNmNmODRhODllNmEyOGRiYjgzMTU0ZGU1MDdiMTNmNmRmZDZiYjVkYzkyMzVmMDEyNWRjZDA3MiIsInRhZyI6IiJ9', NULL, '2024-07-04 12:38:27', '2024-09-27 06:10:04'),
(171, 'armanmia@313', 'arman51214313@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '40', 1, 'eyJpdiI6IlVmNzR4eVN2R3p6cXduVEZjZjV1bFE9PSIsInZhbHVlIjoiVGVKa1lxY3B6MnVGM3JJaTJDRHdYZz09IiwibWFjIjoiZTBjM2M1ZTdjNGNmMjNhZjM3NmI0NDVlODEyODUwMmE3ZjcxZmRlOWZjN2U2YzdkNjgyNDhlZjI5Y2Y5OThlZSIsInRhZyI6IiJ9', NULL, '2024-07-04 15:01:53', '2024-09-27 06:10:16'),
(173, 'Md Elias', 'hamim.cxb@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '167', 1, 'eyJpdiI6IldaZ0tzL2VEYjhtYS9UdG1VN0pOTVE9PSIsInZhbHVlIjoiendOWmlVOGUrK0k3S1ZsbzR0cklLUT09IiwibWFjIjoiNDRlMzRlOGU5MDQ3ZTFiNGIxOWIwMzdiNGJiNGU0MWZlZGM2OGM5NTFmYTA1Y2NlMjM1M2E0MjZmMjk4NTcxNiIsInRhZyI6IiJ9', NULL, '2024-07-04 22:17:14', '2024-11-10 13:41:27'),
(174, 'moderator', 'moderator@gmail.com', NULL, NULL, 2, NULL, 0, NULL, NULL, '0', 0, 'eyJpdiI6Inc5U2JwaC9aa1R4TkJVbHhmbHFWMVE9PSIsInZhbHVlIjoiMmZrdFJhVGtLVWdtVmNxam9sK3BjQT09IiwibWFjIjoiMzBkNmZhOTZkYWFkOGZlOTUzYjQ5ODNmYzE2YjA4NGYwMjc2N2RmYzE4M2EzY2I2MjVjMjdhOWIxN2MwMmUzMyIsInRhZyI6IiJ9', NULL, '2024-07-06 22:20:27', '2024-11-17 20:32:10'),
(175, 'MD TITUL MOLLA', 'titul4197@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '100', 1, 'eyJpdiI6ImJ4TFR3RlFmT01IejduNy93Q3gxSlE9PSIsInZhbHVlIjoiMUtoVmNKemo0bVlkQmR5dDVqTFkyZz09IiwibWFjIjoiMTRjZjk1NTA3MmQ0ODE2NDg1MTBhMDYxZmE4MWYxZTIxM2EzZDc2YTg3NWY0MDYwY2U2Yzk3NmNhYjVlZGFkYSIsInRhZyI6IiJ9', NULL, '2024-07-07 07:46:03', '2024-11-28 14:26:18'),
(177, 'Rakan Hossain', 'rakanhosen07@gmail.com', NULL, NULL, 0, NULL, 0, '2024-09-03 17:10:16', '2024-10-03 17:10:16', '5', 1, 'eyJpdiI6ImkzdHRBK1lYUEVib29sY0V5dDlaaVE9PSIsInZhbHVlIjoib1BwTER3RUdPS2gzU3hacEpybXhneW53VmtLVXlGbTcybzUyeGdEYzdrOD0iLCJtYWMiOiI0MDljODY3MDhmMWM3YTI5N2Q0MjM3YzYxNmUxNTFiMWUyMzAyNDQzZDAyZDYxZDJmZGE1MDNjNzkwYzU2ZmQ2IiwidGFnIjoiIn0=', NULL, '2024-07-07 12:18:57', '2024-11-28 07:08:40'),
(180, 'tanvir', 'hossan_45@yahoo.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 0, 'eyJpdiI6IldXVEFPSnhCcnkyZmZRdlNNZHFiZ0E9PSIsInZhbHVlIjoiU1NRYnRwRE5qSGtnVUtsTExhRm5mQT09IiwibWFjIjoiMmJmNzg1NzliZDVkZWIyMzcxY2UxZjMyYTE4Y2Y3N2E5ZTg2MWEwNDZlZmFjNzgwYzAyYTA1YzBhMTQyYmZiZiIsInRhZyI6IiJ9', NULL, '2024-07-09 21:32:04', '2024-11-19 15:12:33'),
(182, 'mdshakilkhanbd66', 'mdshakilkhanbd7538@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '40', 1, 'eyJpdiI6Ikl5TkZpSkk4SmhjWEZOSFhtZ3BZR2c9PSIsInZhbHVlIjoiTmdWOWdoN0NrTTZybjBCOHN4dENZZz09IiwibWFjIjoiNDA2ZjVlMDRiZGNjMTk3OWI4YjExMWViNmVkN2E1YmIzNWYzMmIxMmU4MmMwNjMwMjA4MTM5ZWVjNTIxZTFiNCIsInRhZyI6IiJ9', NULL, '2024-07-10 15:05:10', '2024-11-24 14:05:50'),
(193, 'Kaosar', 'mdkaosar63@yahoo.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '150', 1, 'eyJpdiI6InRLc0NrMTBzakN4Tm42dEtLV3Q0ZHc9PSIsInZhbHVlIjoiSzFweVFFM3ZQbGZHYzFmSVBUNEQzdz09IiwibWFjIjoiMDQyNTZhNTYwMmU0NTY5NDk0NmM0ZTAxZDI1NmI1ZjE5YTRmZmE0ZjhkMzQ2M2ZhNzRlNzcyMjc4ZDVkMmE5YyIsInRhZyI6IiJ9', NULL, '2024-07-15 20:36:00', '2024-09-27 06:11:41'),
(194, 'wadud', 'wadud123biplob@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '275', 1, 'eyJpdiI6Imx3ZUc4WE1rSHlwcVhRdTRMV0dwR0E9PSIsInZhbHVlIjoibmtiV0ovNjVYQ2tKSytUSHh0U3EyZz09IiwibWFjIjoiYmE4NGE4NWJjMDNiZWRjODY1OTJmZWI0MDdiMTQyNjVmZDdiY2ViODZmZTkyZmI3ZGUwZDYxM2E0NGYyZWY0ZCIsInRhZyI6IiJ9', NULL, '2024-07-16 13:14:48', '2024-09-27 06:11:50'),
(196, 'MD.RAKIB HOSEN', 'hosenmdrakib723@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '15', 1, 'eyJpdiI6ImMzUGF1NXdiaFBvcGJ5SmRpTjdnVkE9PSIsInZhbHVlIjoic0tGcEFTY3ZsNUNmQnEyaWl4czZnUT09IiwibWFjIjoiYmUwN2Y4ODFiZWYzM2QwZmY3ODE5NzJlNjk0NjIxMWRlMTFmNDdkZmM1NWRhZmE5OWVmYWZhM2EzN2RiMGZkMyIsInRhZyI6IiJ9', NULL, '2024-07-16 14:39:28', '2024-09-27 06:11:58'),
(200, 'RAKIBUL ISLAM', 'rakibulislam9253@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '146', 1, 'eyJpdiI6IlBQa1AvYnRMOXpBVHdJZFlpMlByalE9PSIsInZhbHVlIjoiMWtHMmphMnJ6aUR5NXMza0w0MDRKQT09IiwibWFjIjoiM2M4NGFkNDhmY2QzOThkMWQ3MzRlYzdmOWI2MWI5M2Y2YTFmNzRhOTAwZTE3MzQwMWQzZjU5ZjJlMzI3ZjNkZSIsInRhZyI6IiJ9', NULL, '2024-07-18 12:13:35', '2024-11-25 14:25:48'),
(215, 'Ariyan Rakib', 'mdrakibhossain50@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '18', 1, 'eyJpdiI6Ik1UOUhucHdKWTVwV1VRT2prUjY3eGc9PSIsInZhbHVlIjoiYmh6eko3T08xSSs0VWxQdXAzRzhEQT09IiwibWFjIjoiYjI5ZTU3ZWU5MmIwYzAwMGQ1NjY3YmU2MjcyM2IwZTBlMTFmYTc3NGQ0NzM0OGY3ZTUyZGIzYjc3MWNlYzAzMiIsInRhZyI6IiJ9', NULL, '2024-08-12 22:25:14', '2024-11-13 09:55:45'),
(217, 'APDS', 'apds09@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '20', 1, 'eyJpdiI6Ik1OSGxyU2hlVVR2ck45WWpZcmVEMlE9PSIsInZhbHVlIjoiT1FIdmdrOVZKZmdKVkFBS1Jra25UUT09IiwibWFjIjoiMmMyM2ZkZDI2ZjkyZjllMzNmZTdiNTc2MDA2YjVjZTI4MTRkYmU0NWJlMTFlZTJiYmQyODgwOWE1YmFlYWUzYiIsInRhZyI6IiJ9', NULL, '2024-08-13 13:06:36', '2024-09-27 06:12:41'),
(218, 'MD. HASAN', 'kassick41@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 1, 'eyJpdiI6ImhpcEJwOHFPVFloTDhIck9UL3RoeXc9PSIsInZhbHVlIjoiYXZBZ2VxWFo1K202WFBkNFBWai9VUT09IiwibWFjIjoiMzQ4N2JlNDY3MWI5MTgwZmVjYmZmMDcwNWE2MTFmNWRhOGYzY2ZmMjBiYjAwOWMxNDQzYTdlMzk0MjMzNjgxOCIsInRhZyI6IiJ9', NULL, '2024-08-14 15:53:36', '2024-09-30 08:28:04'),
(222, 'mijan3590@', 'mijanurr0077@gmail.com', NULL, NULL, 0, NULL, 0, '2024-08-27 19:01:20', '2024-09-26 19:01:20', '15', 1, 'eyJpdiI6IkhUU3lzdUw4MHRsSmZMZEx0bkVWS0E9PSIsInZhbHVlIjoiTDAvUWMyU1p6YnQ3eVZNSlEwVG1sZz09IiwibWFjIjoiNDE1MGMxNWYwNmVmMmIwZTBkNGY0NDE4YzE3YTNjMzQ4Mzk4OTY0YjQ4N2U1ZWVhZTRmMjRkMzJiOTBhMjJlNCIsInRhZyI6IiJ9', NULL, '2024-08-20 15:59:42', '2024-09-29 13:06:50'),
(225, 'Meza@nur', 'mejanurr308@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '105', 1, 'eyJpdiI6IktqUnBJWkhZNTB6c1FUNW14bzVsOHc9PSIsInZhbHVlIjoibnlyazgza3pvT1NSUmZOYTVlZ3RTZz09IiwibWFjIjoiMmNjMGViZmZkNjFiNmQ1NWUzNTIxMmVhM2RhYjJhOTdhMDc0ZTU0N2Q0ZWVlYmY2YWMxYTUwOTBhNDQxMDZkNiIsInRhZyI6IiJ9', NULL, '2024-08-20 23:48:41', '2024-11-19 10:17:26'),
(226, 'shimul45', 'sazzadhosenshimul45@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '70', 1, 'eyJpdiI6InE2bVhzV3VNcEIrTVVTTEdTbEkzYVE9PSIsInZhbHVlIjoiNVBoTm9pbG9iYXdlZi8zZ0tKeUV6QT09IiwibWFjIjoiMzM5NmI2ZjA1MjA3YWIyODU1ZjQ2MmMxYTlkNjZhZTVjZjg2MTVkZDlkZjFmZGVlNjZiMzYzNTk2Y2ZlMjZiOCIsInRhZyI6IiJ9', NULL, '2024-08-21 09:55:51', '2024-09-27 06:13:15'),
(235, 'Shakil', 'shakil1508200@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '75', 1, 'eyJpdiI6InJFRXpNY1BzUmdheHBKdi9rMHZqU2c9PSIsInZhbHVlIjoiNEh6WEVDa1BJZ04yZ0FYcmhpdmR5UT09IiwibWFjIjoiYjVmNzBhZGQ1OGU4N2RlNDgyNWFmZTdmZDk1OTU4NTk4YzlmM2RhZjY1ZDUyZWQxZjViOTg2NDgyYjZlNDk3NiIsInRhZyI6IiJ9', NULL, '2024-08-22 18:44:47', '2024-10-02 09:36:24'),
(238, 'bangladesh', 'dhaka.epson@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '185', 1, 'eyJpdiI6Img2Sk5qaHFCd0J1UGVWVXdNSVpyS3c9PSIsInZhbHVlIjoiQXhOR3UwOVhGUWc4UzgrUnhxSzlUUT09IiwibWFjIjoiYWE5ZDhkNjA3OWI4NGRiMzE4MDNlOTU3NmJjOWNmMWViNzM4ZTFlNGEzMDBlMTQyMzNkNGY5OTRhZTQ0NmEyZCIsInRhZyI6IiJ9', NULL, '2024-08-27 13:33:51', '2024-11-24 13:15:29'),
(240, '@Rifat7770', 'muhammadrifat7770@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '13', 1, 'eyJpdiI6IlVKL3FqMmdzaVE5QjRweHgwODhsaFE9PSIsInZhbHVlIjoiVTBHNHM4bDdTSEowMHJ5eks1dmd6Zz09IiwibWFjIjoiYjYyMGQyMjAzNTk4OWFmMjdmN2NhYzM4NTYyMTc2NjYxMDc0OGJjZjhkYjAxODZmNjZhNDlhYjA4YmMyYTE5NSIsInRhZyI6IiJ9', NULL, '2024-08-28 10:40:04', '2024-11-05 09:52:30'),
(241, 'Rifat Ahmed', 'rifatsinger55@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '200', 1, 'eyJpdiI6IjNxL2JJMG5xR2pqdEh1NksxbVpKdHc9PSIsInZhbHVlIjoiRHVaWXdHWDJRM2o5NFhzaWR3aVB2dz09IiwibWFjIjoiYzQxODRmZTc0NTRlOTI1MDc3NjBkMjVlNTkzZGQ2YTAwNmFjOWVjODJhM2U4OTUwMmI3MjM2MjliZTY5M2U5YyIsInRhZyI6IiJ9', NULL, '2024-08-28 11:33:10', '2024-09-27 06:13:55'),
(243, 'Saiful Islam', 'computersheba1124@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '200', 1, 'eyJpdiI6ImtqbVNvQnlzSDg1OWJFbm1rL3BoeWc9PSIsInZhbHVlIjoiTGIxMGhQSWQvNXpoWjcvV2puM3Y3Zz09IiwibWFjIjoiZTFhZDY2MTc2NWY0ZGRhNzk5YzZhNGRhZjE4MTBkNzEwZDdhYjUwMzcxZDhiNTcwMGI1N2Y1MzdhNjI4YzZkNCIsInRhZyI6IiJ9', NULL, '2024-08-29 13:26:55', '2024-09-27 06:14:02'),
(247, 'ahmunna', 'ahmunna17@gmail.com', NULL, NULL, 0, NULL, 2, '2024-11-17 11:32:45', '2024-12-17 11:32:45', '160', 1, 'eyJpdiI6ImJXUEFQMlRpV1pBOE8xNlNrbVhPMVE9PSIsInZhbHVlIjoiVVdnQXpxQVRKMEo3eGgzc3NrOFAwZz09IiwibWFjIjoiNTdiZGJiNjIzZDU3ZjBiMmUzZDY3ZWMyNjk4ZTAzZGI5NzJhYmY2ZDgyNGNiMjM2YTQ1MzhhOTAwYzg2MjU1OCIsInRhZyI6IiJ9', NULL, '2024-08-31 21:49:58', '2024-11-26 09:33:24'),
(250, 'Waliar Rahman Khan', 'waliarrahmankhan3@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '117', 1, 'eyJpdiI6IlZKcExDZnJJNkh2RDIzL2lRVUNtcHc9PSIsInZhbHVlIjoiUCt0K2pCa3NnZnp3OUJUaEpmQTBuZz09IiwibWFjIjoiODY2NWIxOWQwNmI0NzQ1YWMzNTQ3MzQ0Y2FiMWMzODE0ZjgyODU1ODMyMmFiOTIzOTcyZDdhYTEzMDg0ZTBmZiIsInRhZyI6IiJ9', NULL, '2024-09-02 15:04:57', '2024-11-28 11:56:47'),
(252, 'Rahul', 'mailplease50@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '100', 1, 'eyJpdiI6InpZcU1yZ2lNWTh0NTRhamFabGRiV0E9PSIsInZhbHVlIjoiWWhzdlVVcEVIQ2trYUNlZkxCNlZTdz09IiwibWFjIjoiMDQ0YjY0ZWM5OWIwOGQxNTc4OTBkMjUwOTU2OTZmYjc3YTQwNmRiZDMwYzMwYWJjOGZhMGRkNWI3NzBjYWRiOSIsInRhZyI6IiJ9', NULL, '2024-09-03 12:41:59', '2024-10-02 07:58:25'),
(254, 'md sadddam', 'upwork01741@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 1, 'eyJpdiI6IkN4THVnODZSTVNjRCt0ZGVsUWNQYlE9PSIsInZhbHVlIjoiR1NmRzJrR0tBSHh0TEk0eVNrNDlVUT09IiwibWFjIjoiMmNmMzJkOTg3MTFiMWQ3Mjk4MzdhOTE0MWEyNDIzZTBjMmNjZDc1MGU0ZWQzMTJlMjEwMzUwNzJkYzg3YmEzOCIsInRhZyI6IiJ9', NULL, '2024-09-04 09:06:47', '2024-10-01 08:40:33'),
(257, 'Nnid123', 'mdakterb2@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '200', 1, 'eyJpdiI6IkJIZURHWWR5ZEpsZ1BwYlI0aG45aXc9PSIsInZhbHVlIjoidjUxcUJtNk5qNXZqVG1IditMaHFYZz09IiwibWFjIjoiMTEwZjI4NWJmMWJhYTA3OGQ2ZjMzMDUzMjUyYTdjNzAyMWI4NmJkODU5OWViYjliN2ZhZGQyYzI4MjcyOTRiZSIsInRhZyI6IiJ9', NULL, '2024-09-04 22:28:16', '2024-09-27 06:14:42'),
(261, 'mkpasha', 'mkmostafakamal.mf@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '34', 1, 'eyJpdiI6ImxrZGpwZi9NWGhkazMvUXpEUmVDS0E9PSIsInZhbHVlIjoiNmRhRm1Oa2ltdjZycE5uL1kzaWZMdz09IiwibWFjIjoiOTg5NDk5MTU5MTgyYTJiYzMyMGRiNDBhYzUyY2QxMjYzZjFlYzlkMjM1ZmQ3YmU4OGNhMzJmYWM1M2E3ZTkxOSIsInRhZyI6IiJ9', NULL, '2024-09-06 17:12:10', '2024-10-29 12:53:25'),
(266, 'khaan150297', 'khaan150297@gmail.om', NULL, NULL, 0, NULL, 0, NULL, NULL, '200', 1, 'eyJpdiI6InVlZDhKTUNWWHNXeWJRRUZxa3ZUcmc9PSIsInZhbHVlIjoiWGlHMjJ1U1lHQzlzcTBFWEozenc1dz09IiwibWFjIjoiMmUzNjU0NmM4OGIxMWNhMTQ4Y2Y3YWI4ZTlhYWY1OGQyZWY2NDY0YTkxZDU4NTdhZTg4OTQ5NTQ2N2QzZTljNCIsInRhZyI6IiJ9', NULL, '2024-09-08 14:28:52', '2024-09-27 06:14:57'),
(270, 'RAZIB360', 'razib01400@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '16', 1, 'eyJpdiI6Inl1bDFoSWZJNm9YdUZvVzQwNDNKSkE9PSIsInZhbHVlIjoiUFZmcElJd0FnbnBmK2xjaUdUL0NJZz09IiwibWFjIjoiMTI0YmM3NTNiMzhjYzg3ZmUxYzgxOWQ4NDljN2RiOWFmNTljYWNjYWJkM2FlOWNmM2IyOGUyNzc2MmM3MjYzNiIsInRhZyI6IiJ9', NULL, '2024-09-09 13:07:44', '2024-10-22 09:44:09'),
(272, 'Nur E Alam', 'nurservicefirm1988@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '4', 1, 'eyJpdiI6IllCdm1DalBKZjhJUG9UTVNBSHIzdWc9PSIsInZhbHVlIjoickZ0TSt5OFprOXJRQ3hNcGZvTXM0clR5VUJOYzlDZEtyYXByU0tvSzZ3QT0iLCJtYWMiOiJlOWVlZDFhYTI4MDQ3ZTU5ZWJhOWY0ODcwNDYxMTVkMTFmOTAwZmM0YzA3MjMzYjZjZTJkYWQzZGJjYjM5MzlhIiwidGFnIjoiIn0=', NULL, '2024-09-10 10:09:45', '2024-11-27 12:47:03'),
(277, 'Lokman hossain', 'epassportoffice2022@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '5', 1, 'eyJpdiI6IkJDcndycVJIRmVsUE5Cb3g3R3ovN3c9PSIsInZhbHVlIjoiSmcwYXNnN1hrY0ZmeDMweHM5bUVkdz09IiwibWFjIjoiZjBmYjEyZGU3ZjBhMTY0NjkxMjFmMmUwYjVjODE1ZDg3MWM3YmM2MDdkNGNhYWE1ZDMyZDhhNDQ2MzdhZGQzZiIsInRhZyI6IiJ9', NULL, '2024-09-11 09:40:17', '2024-11-28 09:12:57'),
(289, 'razu3131', 'mdrazuraihan30@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '160', 1, 'eyJpdiI6IlYyTGhlcWt0YkYyakhrRUlwa1pDd3c9PSIsInZhbHVlIjoiSkFRNjh1NzVOazZzUzUxdVBmZzB3dz09IiwibWFjIjoiMDA0Y2E0MGNiNmFkNjQwZTczNjM2Y2U3OWNmMDc4NjZlMDljNWNkZmFjMWE2NWVmNWM0Yjk5YTg4NzRhYTIxNyIsInRhZyI6IiJ9', NULL, '2024-09-18 13:06:53', '2024-09-27 06:16:55'),
(290, 'razu3131', 'mdrazuraihan45@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '52', 1, 'eyJpdiI6InEvbnEzbjNWWGQ3MUtaOElSd25WN3c9PSIsInZhbHVlIjoiK2ZwM29LdVRvekhUWk5UalRoVko3QT09IiwibWFjIjoiMmI0NjdmOTg3YWEyN2ZiMTY0MWQ0MTFiZDk4MGE0NzFjY2NiNDBmOTg1ZDMzNzEyZThhOTY2OGM4YzE0Mzg4MCIsInRhZyI6IiJ9', NULL, '2024-09-18 13:23:38', '2024-11-25 10:53:05'),
(293, 'jhapon', 'jobearhm@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '118', 1, 'eyJpdiI6IkhwNkpxNmRuSW9WcmthUCtvQ0VtcEE9PSIsInZhbHVlIjoiajBwNThVdmQ1S0NoSjhmeDNReWFFdz09IiwibWFjIjoiZThiZmRiYWQxYTk4NWQyNTRjZDU5NmQzNzNlN2RmMWYyMTc1Mzk0NzMyZWI4ZTYwMzkxNDY4NDNkNTQ0ZjdhYyIsInRhZyI6IiJ9', NULL, '2024-09-21 19:03:58', '2024-11-24 13:41:11'),
(296, 'Md. Sohel', 'mdsohelpersonal2@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '45', 1, 'eyJpdiI6Ik12cXRMQm0vVHh1MEtFSEFoTEZHZGc9PSIsInZhbHVlIjoiS1FadDlaZUc3dlRHNWs1dFFyemhlQT09IiwibWFjIjoiMGI5ODkyMzk1NGE3NjAwMjExMmI1NDM2ZWQzMTMxY2NlMjdhMDgxOTc5MjY4NTc2NDJlZGQ3MTdmMmU2MjE2OSIsInRhZyI6IiJ9', NULL, '2024-09-22 17:45:38', '2024-11-11 20:54:36'),
(300, 'tofazzul143', 'haque.cp@yahoo.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '120', 1, 'eyJpdiI6Inh1TEM0TkRkeDhReGpvN0ZvMVZYcFE9PSIsInZhbHVlIjoiSitvanQ5M3c1NW5nMFFjay8xdGhqdz09IiwibWFjIjoiMzAwN2JhZmVlZDZhYTk0M2YwNmNmNzdlN2M3MjBlMWVkZDM1N2JhMThhZjBmYWM1MmMwYTJjZmMyN2MwNDVkOSIsInRhZyI6IiJ9', NULL, '2024-09-25 09:36:17', '2024-11-17 16:23:08'),
(301, 'loverichkhan', 'loverichkhan143@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '210', 1, 'eyJpdiI6InpIalVWR1JSeWFmbUc3allGcUV1R0E9PSIsInZhbHVlIjoiYkE1ZlJmWnJDOGg0dXJkbllqOTdwQT09IiwibWFjIjoiOTVkYTJhOGFkMWI2MDc0NjcxNjRmNWExNWFkNzVmOWIzOWUyMzZiYjk1ODY2NzkyZmVhM2M4MzIxZmEwMjU5NCIsInRhZyI6IiJ9', NULL, '2024-09-25 10:51:54', '2024-10-09 05:41:35'),
(310, 'Yasin Miah', 'smyasinarafat8@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '50', 1, 'eyJpdiI6ImhzYlFiU1ROUTNOSHlKdlh6MFFkVUE9PSIsInZhbHVlIjoiS0JRejJORGxnbC9ocDJQLzRUUTRKUT09IiwibWFjIjoiZWQyZDQ5NjM5N2Y1ODllMWZhZGI1NjI1MTVjZjY0MWVhZTJjM2QzOWI1ZjM2NThmYWI5NzE1MGQwZjc5ZTNhMCIsInRhZyI6IiJ9', NULL, '2024-09-27 14:24:37', '2024-10-03 11:53:11'),
(313, 'anikreza', 'anikcomputer82@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 0, 'eyJpdiI6InMybFdMT3plWmY3R1Z6dzdPQkpmNmc9PSIsInZhbHVlIjoieXdiRHVkdEdiUXJjTHVvR0orSlRKZz09IiwibWFjIjoiMTkwYzQ3YzQ3YTc2MGNkODVhMWM1NWMyOWI1MzRlYTM0MjA2OGIyM2ViMjMzNjU3Y2RjMjRlYTc4OTQyMjk2MCIsInRhZyI6IiJ9', NULL, '2024-09-29 14:55:59', '2024-09-29 14:55:59'),
(314, 'MD NUR HASNAT', 'nurhasnat1@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 0, 'eyJpdiI6ImJyZ1ZwUXBHRkpRTlZPVXE0cDFWVEE9PSIsInZhbHVlIjoiOVgwQXhHTC9hN3hQd3o1R29LQksyQT09IiwibWFjIjoiM2IxMzk1ZGMzNWUzZTI0Y2I0ODEzZDViNzFhYjAzNjM3OTIyMjMzNDkxMWUyNzE3NmE4OTEzMWIxZDM2ZTQxOCIsInRhZyI6IiJ9', NULL, '2024-09-30 15:25:03', '2024-09-30 15:25:03'),
(315, 'Md.Mokbul Hossein', 'hossainmokbul113@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '100', 1, 'eyJpdiI6IlFtaDZ5MUd1RWVLL2F3SEdISjZGVEE9PSIsInZhbHVlIjoicnVxK2pIOUxRdDVrZnE4c0FYYjREZz09IiwibWFjIjoiYjA5YjIzYWQzMGJjNWFiZDViMzAzZTI1ZDMyYjFlYmRhYmRmODM5M2RlYjYxNjFmMGNiMmQ1NDY1MTQ4Y2Y4OSIsInRhZyI6IiJ9', NULL, '2024-09-30 16:01:31', '2024-11-26 12:21:28'),
(316, 'MD SAHINUL ISLAM', 'sahinulislamcp2000@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 0, 'eyJpdiI6IkxnMzd0aWxsRVdrY0czdXdwZGo1aGc9PSIsInZhbHVlIjoiOSthYTdIMmlqKzczUkl2b052R0RhWTFTOFVtNUxoY0RLVGFvemMrcEphYz0iLCJtYWMiOiJiZDY4MGI3ZmEyOGJmYzg1MDNjOWU3MmVlMzQ4ZTQxZGE1OGNmMzllMDg3MmRhYzlhZThlMTYxYzllNWNjMWQ3IiwidGFnIjoiIn0=', NULL, '2024-10-01 09:47:26', '2024-10-01 09:47:26'),
(318, 'Lalchan Sarker', 'lalchansarker136@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '3', 1, 'eyJpdiI6IjNBTE11Rmh6YlpTcGtZVHRvZEFkL1E9PSIsInZhbHVlIjoiTDNoajhYM2JYd1kwUUNmcmN4OWNxZz09IiwibWFjIjoiYmEzNTcwNmFkNjExMzJhYTdmMGM3Y2M4MjkzOGQzNzhkZjVjMTcyMzI1MTQyZTkwNWFhNGE0NTY0N2QyNjEzOSIsInRhZyI6IiJ9', NULL, '2024-10-02 14:50:08', '2024-11-24 09:36:10'),
(319, 'Diponkar', 'diponkarraj2024@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '133', 1, 'eyJpdiI6IjI1TnNsekpmd0oyK0JmWGx4NGlzdGc9PSIsInZhbHVlIjoiMm1KZlBxZTZTLzJyUytDclU5OUpMdz09IiwibWFjIjoiZjMzYWEyZGVjY2MxNGQxYmYzZGFkOWYzMTNmZjFlODAzNDVkMzFmYjVjNDhkOTM1NDc0MTIxNjc1YjA1NTVjMSIsInRhZyI6IiJ9', NULL, '2024-10-03 08:54:28', '2024-11-28 16:54:20'),
(320, 'Khalil pc', 'kcomputer851@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 0, 'eyJpdiI6InNwTEk0c2hwMURWeW5MOHc4c1UwcWc9PSIsInZhbHVlIjoiY0hIbzhvVXRKaGxkdE9WVTJhVWNtZz09IiwibWFjIjoiODVhNDk5NzM3NDZlNTg3NDkyYzRjMTYxMTJmZTJjNzRjNjE5NzE1MjRjNmZiZDgwNDFmOWEwZTAyZjU1N2UxMyIsInRhZyI6IiJ9', NULL, '2024-10-05 08:19:04', '2024-10-05 08:19:04'),
(321, 'Shamim6970', 'shamim69709@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 0, 'eyJpdiI6IkFZRmpnUTVjVGpsZU9ZZWhCYVh4OWc9PSIsInZhbHVlIjoid2RETDE2TEs3akJvdnEwcWlza1VzQT09IiwibWFjIjoiODlkZDZkZDlmZjE4MDZkZjdmZTU2NDY4M2EzMGY3YzQ5Y2YyNDk0NmRiYWQ1MzY3ZDI2ZjY1NTNmMzFkMzE1ZSIsInRhZyI6IiJ9', NULL, '2024-10-05 11:25:06', '2024-11-19 15:15:02'),
(322, 'তালুকদার ট্রেডার্স, লংগদু বাজার, রাঙ্গামাটি', 'nuralamlongadu@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 0, 'eyJpdiI6InpzS3JhOFFtMURIRVA5R1lDNFpaK3c9PSIsInZhbHVlIjoiUk1DU1pKUXdlQWgvUW9VdytDa1oxUT09IiwibWFjIjoiYWNkZWUxNmQ3NzdhOWZiMTNlYWUzODkxNGFhMjViODhiOWZlNjViNjY3Zjk4NmZmYjExMDNlYWExOWFkODZkNCIsInRhZyI6IiJ9', NULL, '2024-10-07 14:38:26', '2024-10-07 14:38:26'),
(324, 'Fai123', 'babo76249@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '170', 1, 'eyJpdiI6ImhVck0rdTVOd2hBVDZSOFNlWC80WXc9PSIsInZhbHVlIjoiUENMUzFjUmRHNHAwOTRiSGhMUzRpZz09IiwibWFjIjoiMjYwNzdjNjExNTFhMTYyYjY3NGVjNjNhMjM1Yzg0Y2I4MzQxMzgxZWJhMjYwZmFlNDQyMGIyN2FmNjY1ZWQzZiIsInRhZyI6IiJ9', NULL, '2024-10-08 15:14:33', '2024-10-08 15:57:45'),
(325, 'adnanmatubber', 'mabiaakter350@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 0, 'eyJpdiI6ImtnMDZhb05LQ3hZK1U2RDJ3TzZYbVE9PSIsInZhbHVlIjoibHNsMVVkRUFzb0dDU0ZHaFFDM2VTUT09IiwibWFjIjoiYTU3Y2VlNGY2MjgxODQxZDQ0OWJlNTUzNDg3MTMwNjVkZjIzMmJlNmQ4ZjYwYTllYzRjMGQyODc3Njk2ZDE5OSIsInRhZyI6IiJ9', NULL, '2024-10-08 21:05:34', '2024-10-08 21:05:34'),
(326, 'rana01', 'hossan_rana@yahoo.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '40', 1, 'eyJpdiI6IkN3c2plVTNMM2dMcWpSd1lBVHdGQkE9PSIsInZhbHVlIjoiY0xTZzkxTGhSRmI1WDd4QmNld2JJdz09IiwibWFjIjoiZTc5ZTY0YWI1ZTQwMjBhY2MxYTRiZDdiNjBmNWFkMWIwOWIzMzQzYzg2MGM4OTdkYzZiOWJlOWYzNWIzNjg0YSIsInRhZyI6IiJ9', NULL, '2024-10-09 14:35:53', '2024-11-27 11:48:51'),
(327, 'Sufian', 'mredul191@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '113', 1, 'eyJpdiI6ImkvM0NrdzhFTmdPSWJKMWZYNll1TFE9PSIsInZhbHVlIjoiaTEwL0Jyc1ZZRG1uK255U2J3LzlsZz09IiwibWFjIjoiNTU0YTY3MTZjMTE2OTNmNjdmYWQ0NGVjZjMyMWMxNTcwZmJlODIwMWQ5ZTdkNTc1NDNhOGJlYTBkMjViYTRlZiIsInRhZyI6IiJ9', NULL, '2024-10-12 08:29:01', '2024-11-27 11:37:11'),
(328, 'Alall Dulal', 'alalldulal@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '71', 1, 'eyJpdiI6IjZCZGd5MGo0MjBZYjJaZ3doaTl1Mmc9PSIsInZhbHVlIjoiR3c2cFhINEpXdnpod3Y1L2VURldaUT09IiwibWFjIjoiMjlhYWNjYzM5ZDBkZWIxNzZkNmFkZWEyMjRlZjFhOGU2NjUyMjBhZTQ2MTRlYmNlOTNkOGMyMjZjYzMxMWFiNCIsInRhZyI6IiJ9', NULL, '2024-10-12 17:13:00', '2024-11-14 16:28:08'),
(329, 'Lalon Pramanik', 'epassport00@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 0, 'eyJpdiI6ImhuMU94OEk3YmFJb0xVWXpCYkNXWnc9PSIsInZhbHVlIjoiaGRQa3Z1aElRZFpIWGVIYjlodGF5QT09IiwibWFjIjoiOGY4MWZjOTMwNGYyNTgzYTE4ZTRiOTVmNmYxMTc4NTQzYWVjYWQyYjBjYTE3ZjhmYjBiNzAyNjUyMjViMzkxMiIsInRhZyI6IiJ9', NULL, '2024-10-14 07:41:11', '2024-11-19 15:16:34'),
(330, 'diposarkar', 'dulucomd@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '10', 1, 'eyJpdiI6IlhQdStoMDZ2UUNFTHZCa0RjRk5lUUE9PSIsInZhbHVlIjoidGxxZm1kL3Y5VEZjTlVjdHlOOVJNQT09IiwibWFjIjoiYjYxNjk4OWQzMGM2ODc2NDlhMjUzZmZlNTU2NjhlZTc1ZWNkYTcwNTNiYWIwOGZkNDZlNWMzOGVhNjQzMGY2NSIsInRhZyI6IiJ9', NULL, '2024-10-14 12:05:38', '2024-11-25 20:37:08'),
(331, 'Mamun1234', 'mamunmd.5767@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 0, 'eyJpdiI6ImgwR1J1RnBBdWRUNDlmRFpRcmdzWEE9PSIsInZhbHVlIjoiQWp3Nk1ad1VtdEhtb2dpczd0dVdTUT09IiwibWFjIjoiNjNjYmE0Nzc5ZDkzODkxZGMxNmNjODllN2RmY2RiMDBhOGI4OGQ0MzFiNWM0MjhkMzQyODQzOTQ2MDE3M2I2MCIsInRhZyI6IiJ9', NULL, '2024-10-14 15:54:59', '2024-10-14 15:54:59'),
(332, 'Ataur Rahman', 'signbd1995@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '496', 1, 'eyJpdiI6IjdBS0JwY0ZVUFFQQTc0WmRGNVpsUVE9PSIsInZhbHVlIjoiSkJDOHBBME1DM1Vta0NnZnNqWmg1dz09IiwibWFjIjoiM2I0ZjBhNmIyYTkxNTJlNDRiYWM2MTViMzljMmMzMGFjNzMwODdkMjdlOTc1NmExZWQzNmIwOGMxZTgwYTkyNCIsInRhZyI6IiJ9', NULL, '2024-10-15 13:39:12', '2024-11-25 11:17:01'),
(333, 'ahammedrony36769', 'ahammedrony36769@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 0, 'eyJpdiI6IlIxVWlFcUttSm5VcXJQNkRNRFZBT1E9PSIsInZhbHVlIjoiVnJyOGU2MTJNMGE4SmQ2YUIwNitndz09IiwibWFjIjoiZTAwOGQxMTgxNGZlZTA1MzM5NjY3MzUzNjVkNjA2YjEzMDczY2VjM2VlNWU4YzM0MTg2MzBkNTE4NmE4YmZkZCIsInRhZyI6IiJ9', NULL, '2024-10-16 07:47:58', '2024-10-16 07:47:58'),
(335, 'MDIDRIS', 'mdidrish724@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '86', 1, 'eyJpdiI6IkRYTDNCQjNFZEtmREFFUjRmZVRWdEE9PSIsInZhbHVlIjoiMDJpdWV5ampvUDl0VTVpMXJqb3ZNUT09IiwibWFjIjoiZWYzMjY5NjUwYTYwM2JlMzBkODRhYWFkM2EzY2NiZTAzNGVlNDUxMjk1YzU1ODUyNmFlM2Q0NjM3YzczMzA4MSIsInRhZyI6IiJ9', NULL, '2024-10-16 11:53:06', '2024-10-31 12:18:33'),
(336, 'Mohammed Ismail', 'icpukhia@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '80', 1, 'eyJpdiI6IlRyY2pxRFY5WGczK0p6Q2VGU2U0R2c9PSIsInZhbHVlIjoiMGZmaHZ4U3Zyc0lQY0o0eWE5NVpkdz09IiwibWFjIjoiMjg5MTRlYmNmMGQwNGRiNjNkZjFhZjcyN2U3ZGRkNWQ5ZWQwMDMyNjY1MWZiMmQ3ODNlMGFmMGE1NjRhMGUzMiIsInRhZyI6IiJ9', NULL, '2024-10-16 14:49:13', '2024-11-27 16:56:09'),
(337, 'Nur islam', 'Nurislam750966@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 0, 'eyJpdiI6Im16eExBVVpXUnBJbmc5YVdOY0diUVE9PSIsInZhbHVlIjoidGE4V01VeE1SMmpkZDBoQ2wyV1V3dz09IiwibWFjIjoiMmVmMGM3MzYyNTI3YjE2YTQwNzY4OGQ1NjE0NDNlNDJmMDI3NGViODBmNDZmMjY5MDVjOWU3MzgyM2YyZDNhYyIsInRhZyI6IiJ9', NULL, '2024-10-16 20:36:20', '2024-10-16 20:36:20'),
(338, 'M.M SAGOR', 'm.m.sagor8834@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '15', 1, 'eyJpdiI6IncyYW94VXFwajdWd2Ixd2VRZmRya3c9PSIsInZhbHVlIjoiOEtmVWNmM3Y0UTRUUEFQTDFIOHZCQT09IiwibWFjIjoiOTc2YjU2M2UyZjJmYWNmODlkMWRlMGQwZTNjYjcxYmRmODgyYTBkMGIzMDg4YjgzYWI1ZjdiZTFmMmZhNTVkZSIsInRhZyI6IiJ9', NULL, '2024-10-19 16:39:28', '2024-11-26 12:42:37'),
(340, 'ROKIBUL', 'bolruki627@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 0, 'eyJpdiI6IjFnUlpUdVhkaW5TVEp3NVZQSXppQmc9PSIsInZhbHVlIjoiTFZxSUJ5YlEwOVBGdEVIVm9QaGxhUT09IiwibWFjIjoiMTNlOTdkMzRlOWMzYjg5OTY4NjRhZGU3ZDdmZTk3YjUzNDlhNTkzNmE3MzBhZmEwY2U2NzdjYjkwODM0OWI0YyIsInRhZyI6IiJ9', NULL, '2024-10-19 16:50:33', '2024-10-19 16:50:33'),
(341, 'Ashraf', 'ashrafaliahammad@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 0, 'eyJpdiI6Im5rSFdRNnRZVERPd2pWT3ArTVc2Vmc9PSIsInZhbHVlIjoiSGhDRzhoRko1V2tXR0JWV0lldUhRQT09IiwibWFjIjoiNTA4NDYwMDQ4MTAyNzNkOTI3YmFhMjY1NDk0ZDYyMjJkYTEzYjk0ZTczNDJmYmI1ODhhMzA1NWM0ZDkzOWViOSIsInRhZyI6IiJ9', NULL, '2024-10-20 08:19:09', '2024-10-20 08:19:09'),
(342, 'MD RASEL', 'mdrasel.rs3388@gmail.com', NULL, NULL, 0, NULL, 0, '2024-10-28 23:07:38', '2024-10-29 23:07:38', '2', 1, 'eyJpdiI6Im5zc0tDRGNEUmtNYTlxSkpmMitSa2c9PSIsInZhbHVlIjoidzArUC81WTROdUZTSlFFWGRNVXJ5UT09IiwibWFjIjoiNzA2MjBmMmFjODMxM2ExNmQzNjM1YzljN2M5ZGI4OGU0MGY3YmRiZDVhODQxYmNhODVjNTg0YTdjOTIyYTEzZSIsInRhZyI6IiJ9', NULL, '2024-10-20 12:36:15', '2024-10-30 15:35:51'),
(344, 'MOHAMMAD KAUSAR', 'kausarfmd@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 0, 'eyJpdiI6IlhvbHFmalU2VjFTeUhnTDJ1clhZTUE9PSIsInZhbHVlIjoicHQyYyszSWNmbWtzSFBZZGdQOFFIZz09IiwibWFjIjoiMDYwMmY2YmZkYjlkYjY1ZDc0YWRhNTQ0ODljOGZkNWE5NmNlYTg4OTNjZjAzYjc5NDQ2MTY2NDAyMTY4YjZhMCIsInRhZyI6IiJ9', NULL, '2024-10-21 13:55:16', '2024-11-19 15:16:06'),
(346, 'BAYEJID MIA', 'shahidmuktadir@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '176', 1, 'eyJpdiI6IjhMbGxpbE9maFFxUUtaT09qUU5YUnc9PSIsInZhbHVlIjoiUU1LYS9uLzZBc0VtdFl1Y1RxYlBQdz09IiwibWFjIjoiNzQ0ZDk4Y2EzMWJmMTYyZTY4Zjk3YWUzY2NiOGM5ZjAxZTlmNzZkNTJlODcyNzA1NTFiMGUyMDFjYjdhNjg5OCIsInRhZyI6IiJ9', NULL, '2024-10-23 09:15:31', '2024-11-26 16:53:38'),
(347, 'Arif Rizby', 'nahidamunna2021@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 0, 'eyJpdiI6Ik9TNEZkWURhT1EwaC9CQXpYSkRtY0E9PSIsInZhbHVlIjoiQWtFSGVQY3VLMzdCVTByZ3FGakpTZz09IiwibWFjIjoiZWU5NjQyMmFjMzgwYjA3OTk3NjUyOGE4OGViMmFhZDEzNjAwMjQ5Y2VjM2I5ODhhZWYzN2I2Y2Y3NzYwMzM2NyIsInRhZyI6IiJ9', NULL, '2024-10-24 12:35:32', '2024-10-24 12:35:32'),
(348, 'Fai123000', 'mdbabo256338@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 0, 'eyJpdiI6InA2RnBTSWxzeXpPK2M2eXRUK2pWVGc9PSIsInZhbHVlIjoiWnM4RXpoNnlGQ21BTHUzQXVUdG5iN2lzY1p6VS9Mdm9jSERkWWZPTDlNTT0iLCJtYWMiOiIzMzBlMGYzZjk1ZmVhYWNhOWYxNTlhMThhMDViOGNjNmQ1NWNjYmY5OGUxYzgzYWUxZGRkYjYwNmQwYzhmYTllIiwidGFnIjoiIn0=', NULL, '2024-10-24 15:13:06', '2024-10-24 15:37:35'),
(349, 'Shamim Ahammed', 'sahammed84@gmail.com', NULL, NULL, 0, NULL, 0, '2024-10-28 11:13:52', '2024-10-29 11:13:52', '1', 1, 'eyJpdiI6Ik42N0tvVElmbGJla1JrSHR6bm5CSHc9PSIsInZhbHVlIjoiN2VleHg5a2EyQ09meS9YenppR2hrUT09IiwibWFjIjoiODJjYzdlMTI0OGJjMjYxYmVjZTMxMDlmYWNlYTRmZjQzZmNkMDM5NTZjNTJjZGIxYzc0OGNiZDY0NjkyOTY0ZSIsInRhZyI6IiJ9', NULL, '2024-10-28 11:02:31', '2024-11-06 13:22:02'),
(350, 'Arif Rizby', 'tityeyes@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '1', 1, 'eyJpdiI6IkFHM09aTG1HejNaN2N0c09WTXQ2WWc9PSIsInZhbHVlIjoiZi9tNC9yRFh1OVMwQ2ZDbThDdnNhQT09IiwibWFjIjoiYTI5OWVmOGE3NWM1OTBiZTNkYjEzOGIwNGQ4YWE2YWVjMTJkNTFiOTY2NmRmYjA5NDlhNjZhZDFiYjQ2Yjg3MiIsInRhZyI6IiJ9', NULL, '2024-10-29 09:45:44', '2024-11-10 11:40:52'),
(353, 'Rahat', 'dontsaylove6@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '181', 1, 'eyJpdiI6IlJneVhydHM5TVBYM29KVG1NbXlVNFE9PSIsInZhbHVlIjoiS1crRTNhSllCSlpYMGRrM0FQeFNXQT09IiwibWFjIjoiZmRmNGZhYTU0NzJjYmU1ZTYxODVmNmE3ODM0ZmYzY2Q1YmE3YWQyYTViNTBiNTQ1YjI2NGUxOTFhNmY4NTEzOCIsInRhZyI6IiJ9', NULL, '2024-11-03 14:57:14', '2024-11-03 15:00:42'),
(354, 'Md Mostafa Kanal', 'mkmostafaudc@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 0, 'eyJpdiI6IjlYeTFjMWVXczdrTGliYUJxbzhIMHc9PSIsInZhbHVlIjoiUjZBam5tcDIyTTN4dWZqazZOOTdndz09IiwibWFjIjoiOTc5MTRjMzQ0YTUxOTAxNTE4NzA5NjBmNmJmZTU0NDU3YmQ1NmJhYTQxNjY4ZTI3YTZjN2ZmZTU4MzQ5Yzg3ZCIsInRhZyI6IiJ9', NULL, '2024-11-04 14:29:04', '2024-11-04 14:29:04'),
(355, 'mahedi hasan jony', 'mahedihasanjony54@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '71', 1, 'eyJpdiI6IjIzRDkveGNhNXRNbE5xRVo1TmtwZVE9PSIsInZhbHVlIjoiajhSdExXdnNUUHFxVXVGVjZJbVZBQT09IiwibWFjIjoiYTlhMGMyOTU0MDRmNzY2ZjRkYTA2NDYzM2RkNWY3MmRjNzgzMzM2YmQ4MTM4MjcwOWIzOTlmNjFlZGUxNWYxMSIsInRhZyI6IiJ9', NULL, '2024-11-04 21:02:02', '2024-11-28 11:48:12'),
(356, 'Ashik Rana', 'sbc89@yahoo.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '59', 1, 'eyJpdiI6IldlNi9pZ3hTNVdlK2ZVMUZlZXVCUEE9PSIsInZhbHVlIjoicUozdmR6elBObUdMVjJxaHZlTmx6dz09IiwibWFjIjoiZDY3ZjVmMWZlNWM1MzM3M2FhYjI0M2ZkNDRjMjI1MDkzNzI4ZDRhMDNhNWFiZGUwMTNjNDhhOTdjNzhjYzIxMSIsInRhZyI6IiJ9', NULL, '2024-11-06 14:10:02', '2024-11-27 10:12:11'),
(357, 'RAJIB SARKER', 'rajibsarkar827@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '141', 1, 'eyJpdiI6Ii9sUUlqY0JSNkk2Y1NBNDF4Q0hia0E9PSIsInZhbHVlIjoiL0ptbGtNN3hHd2hkNzlPS3dYdXNHUT09IiwibWFjIjoiNjU5NDJjMTE5ZDQzYThjYTE3YjRiZmQxNmZmMWZmNDI4NzNjYzZjMGM2ODNhYTY2MzI4MDdjNTg5ZDc0YWNiNCIsInRhZyI6IiJ9', NULL, '2024-11-06 17:49:23', '2024-11-19 11:01:17'),
(358, 'SHUMON KUMAR BISWAS', 'sobmopv@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '181', 1, 'eyJpdiI6InFrd0pQNjcrSXdlSDdhdS9zQ1p6Snc9PSIsInZhbHVlIjoiUGo0SDhzL0g1ZVlWd1pFUkN4VTVJQT09IiwibWFjIjoiZTZhNTQ5YmJmYmVjNzgyMDZiZjA2MTFiOTFkNjM2M2YzNTRmNzBlZjFhODk1MjA3NDliMjc2MWQyZjRmMzI5MSIsInRhZyI6IiJ9', NULL, '2024-11-06 19:59:19', '2024-11-06 20:12:56'),
(359, 'Ronik', 'ronikhassan639@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 1, 'eyJpdiI6IkZQTUZyMEJPcHdzK2N1QUNUVWRaUHc9PSIsInZhbHVlIjoiaHc5SFRvSkFXZ3FkNGlzT1p1UjZpUT09IiwibWFjIjoiYmNiNTAxZjVmYzI3OGQxNzA5Y2Q4MzAzZDMzZWVmMWE3OTNhYzE2MzkzYzk3NjY4ZWFiODZjMmFiYWQ4ODFjYSIsInRhZyI6IiJ9', NULL, '2024-11-07 09:10:53', '2024-11-07 09:29:04'),
(360, 'Sadinmiya120@gmail.com', 'sadinmiya120@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 0, 'eyJpdiI6IlZkR2dQeTdyaWdIVzlpeUZxdjBFVlE9PSIsInZhbHVlIjoibWdsaHVFemRMRDFpR3Qwb3F3YWxBZz09IiwibWFjIjoiMmQ4NjYyMTgzNjY4Y2EzNjg1Y2RhMTUzYWFmYzQ0N2VmZTlhMGVjMjA1ZDNiYWNmNTFkOGM4ZjM4MzBhYWQxMCIsInRhZyI6IiJ9', NULL, '2024-11-07 18:05:00', '2024-11-07 18:05:00'),
(361, 'Rahul das', 'rahul01767741064@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 0, 'eyJpdiI6IjgxTXpOYnFyMk9TV0paQVgrZGdxWEE9PSIsInZhbHVlIjoiS0QvTVVqWEJrUlB1VTNlVHUvWi9kQT09IiwibWFjIjoiODU2ZjNjNjAzZjFjZDRmODM0ZGI5MTdmYTYxYWEwOGFmZWQyYTMzZDM4YjUzNzgwNGY0YzBmZWIzY2VkOGI4MiIsInRhZyI6IiJ9', NULL, '2024-11-08 10:46:40', '2024-11-08 10:46:40'),
(363, 'MD SHAWON', 'duibonstudio559@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 1, 'eyJpdiI6IlZLYkZVSk1FaEFqY0MzM0NIeU0zZ1E9PSIsInZhbHVlIjoiMGRJWEs5TkFqTlZ4ZzNjazAxWGpUQT09IiwibWFjIjoiY2RjOTc1OGZjMmVhMDVmYThiZjRkMDdmZjgxNWViZDI4ZWY4ZjU3M2RmYjE2ZWEyODkxOTVkOTU5NjZmOGJiYyIsInRhZyI6IiJ9', NULL, '2024-11-09 18:31:12', '2024-11-09 18:34:16'),
(364, 'sumon', 'oaselmolla92@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 0, 'eyJpdiI6Ik5TMlBoMWtlQmJkeVFGOWRZRWxPK2c9PSIsInZhbHVlIjoiVXVzTDZ6a2R2aGlsZmxTZG9uMGE3UT09IiwibWFjIjoiYjcyMDM2YTNlZWYxNTM1MjllNzllZTVmOTFhNmUyMzc0ZWI0MjE5MmMyMDA0YzkwNTE3ODg5ZjZlYjI5NTg1NyIsInRhZyI6IiJ9', NULL, '2024-11-09 19:24:28', '2024-11-09 19:24:28'),
(366, 'nomansaifen2', 'nomansaifen2@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 0, 'eyJpdiI6IlhzM0FybnFWWDg0eFkzS1FLMzZFb2c9PSIsInZhbHVlIjoicm42RThZOTdiTkV3aFRUTm9WcnB1dz09IiwibWFjIjoiYTAzNWNmYTlmOGE4ZDRkZDU4NWIwY2EwYjczNTY1Njc2NDhlNGI4NGY2MWJkOWY5Y2YxNzc3MzE1NTllNDkwOCIsInRhZyI6IiJ9', NULL, '2024-11-12 12:02:58', '2024-11-12 12:02:58'),
(367, 'Wasim', 'dip69272@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 0, 'eyJpdiI6IjBuNENHcUZiZWJ0NFVVNU9sbWpPMmc9PSIsInZhbHVlIjoiQ1dVOTM5eHJSNWIxUjA3aDV6U3dlZz09IiwibWFjIjoiYmJjYWUwNDZkYTE3NTViY2IyMDA3YjMzMWE1ODBkZTVmZTY1YTBjOTUwNDc4OTE3YzgxMGFkYWMzMDBmMjkzYSIsInRhZyI6IiJ9', NULL, '2024-11-12 17:13:21', '2024-11-12 17:14:47'),
(368, 'S M Arav', '23arav@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '200', 1, 'eyJpdiI6ImNZVmVrN0ZJNlRnM0lwYWVuNTFRd1E9PSIsInZhbHVlIjoiS3ZJbStiUzVBTnN6bE9CWHFjWHRoQT09IiwibWFjIjoiMDYwZTkzYzAxNmYyZjIzNzM1MGZlYWZiNTZhNmYxYjI1ZTg2ZjRmYjhhZDhmZTAyMDMzZTZlOWI3YjNkNTA1OSIsInRhZyI6IiJ9', NULL, '2024-11-12 17:44:00', '2024-11-25 10:39:06'),
(370, 'Mamun165522', 'arabiamunzareen2024@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 0, 'eyJpdiI6IkdXbjBBWXd5K1VseklqREJFenRCWFE9PSIsInZhbHVlIjoiQ3JzbE1WUVdCVnkwOUd4dSt0N3BFUT09IiwibWFjIjoiODAwYjM3OGRkMWY3NzllNWUxNDY3ZmE1MzQ0OTYxZDdmOTFmMTI1ZWMwNzJjYzEwNWJhMzIzZjYzNzUwYWZiMiIsInRhZyI6IiJ9', NULL, '2024-11-12 19:52:55', '2024-11-12 19:52:55'),
(371, 'al016amin', 'hmalamin808080@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 0, 'eyJpdiI6Im9NZnowRjZzU1UyZmx4elY4QWxtNWc9PSIsInZhbHVlIjoiMVFiajMySmticGR3S0RDWVdqUFJEUT09IiwibWFjIjoiMTNkMjMxYjIyNTY3MjhiYTRjYTMzNjAxMmRmZDUyOGNiNTRjMzg2ZDBlMGU4MDAwOWNiMjc1ZTUzODAyMGRhOSIsInRhZyI6IiJ9', NULL, '2024-11-13 15:35:18', '2024-11-13 15:35:18'),
(372, 'riazulkarim', 'riazul.chp@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 0, 'eyJpdiI6Ik1FMWJWTjVScFV0em9oYTkvSG1qNlE9PSIsInZhbHVlIjoibHo5bXFhYUUwMFB1Q1BvcDBGYndBQT09IiwibWFjIjoiZTMxMzdkYjhiNmZmZjY4Y2U1NTg1OTU4YzI1ZTY0ZmYwYWI5ZjdlMTg0ZDhmZGMwOThlNmJiZTcxNWI3MTk0YSIsInRhZyI6IiJ9', NULL, '2024-11-13 20:46:30', '2024-11-13 20:46:30'),
(373, 'Sunambd', 'sunambd.info@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '143', 1, 'eyJpdiI6IjNGeVdYbDFFRjBVNUl5WTVyTzF6VHc9PSIsInZhbHVlIjoiMFQzdUxKRnNxVEdvamp0OGFFK04vdz09IiwibWFjIjoiZTM5ZmRkYTQyMmNkMjEzYzQ3NzQzMjY3YzIyNDA2M2M1NzFlYWM4YzliNGU3MzZkNzhmOTUxODU1OWI1ZmMxZSIsInRhZyI6IiJ9', NULL, '2024-11-13 23:29:31', '2024-11-17 13:55:25'),
(374, 'Abdur Rahim', 'www.arn992@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '120', 1, 'eyJpdiI6IlBRN1VjV0VmVFY5UEhIMDFYSk5rZmc9PSIsInZhbHVlIjoiVFhObHhxUnV3MWMvOHlyZXZ1K3M4Wm1aYmNDS0c0MFRWWWRqMmxhNDFpaz0iLCJtYWMiOiJiNWE0N2UwNGE3ZTNiY2VjMGE1YzA2ODNjN2I1ODY0ZDA2M2FmZjViZjkzYTQ4OTIzYWY1NTg5OTAzMGM1NzU2IiwidGFnIjoiIn0=', NULL, '2024-11-14 10:56:00', '2024-11-28 15:22:08'),
(376, 'মোঃ আশাদুল ইসলাম', 'sra.dolil2023@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 1, 'eyJpdiI6Im93aTg5cXp1UlZyTlpEN05xZkd0a0E9PSIsInZhbHVlIjoiWlFqQk5vb0NNV2xvVXVoQlZsbzBlUT09IiwibWFjIjoiMzc4MjhkNTVlNmI4YTc5ZTI3MTk3MDYyNmM0ZDlhOTc1N2NhYzBmZWU5MmM3ZmM2NzJjNTAzNTViZDY2ZDk0MSIsInRhZyI6IiJ9', NULL, '2024-11-16 07:00:20', '2024-11-19 10:35:41'),
(377, 'MD. SHIMUL MIAH', 'kushitelecom74@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 0, 'eyJpdiI6InpueUFuYktadTNpWWxJSk1DU0pzWFE9PSIsInZhbHVlIjoiRkNsUURtZXRzZ1B6QlhCYnllS3E3UT09IiwibWFjIjoiYTc5OWFmYjU5NDhjYzc2N2M1ZTUxMjZiNTBhMThiNjc5Nzc3MGUyMTk0NzQ4ZGM4NjQyMjBjMTljZmJjYmE4OSIsInRhZyI6IiJ9', NULL, '2024-11-16 20:03:31', '2024-11-16 20:03:31'),
(378, 'MD SHIMUL MIAH', 'shimul.ict943@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 1, 'eyJpdiI6IkpTZXZaRzYraEYxSmNkUkVzSWdLK3c9PSIsInZhbHVlIjoiSHBWeWpjaHpwbHdJcUtSSHpIZWt3Zz09IiwibWFjIjoiZGUwYzc5YzQxNjQ1YTVlYzlkMzE5ZGY1MzM0OTM0ZmE2ZjZlNWU2YTYxZDk1Yjc4MjIyMmUxMTlhZWM1NzFhYSIsInRhZyI6IiJ9', NULL, '2024-11-16 20:13:01', '2024-11-16 20:19:32'),
(382, 'Akash121', 'mazharul284@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '56', 1, 'eyJpdiI6IklEMHZVWDFoSk9SbXExRVVGdDFWTFE9PSIsInZhbHVlIjoiYU1tbVI0VURDTHY4SzQ1cnFUUG4vUT09IiwibWFjIjoiMjhmMDY1Y2VmZWYyNzQyN2IyZWQ0MjE5ZTYxNGRmNWYxNDYzZTNhYmYwN2U3Mjg4ZjE3NzZhZDYxMDY5MWFkOSIsInRhZyI6IiJ9', NULL, '2024-11-17 15:10:19', '2024-11-28 10:23:51'),
(386, 'Sezan Ahammed', 'sezan4446@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 0, 'eyJpdiI6ImU3UDFXUlI3amQ1Tm5zVk55TkZVbGc9PSIsInZhbHVlIjoicHhCalR6N1dUbkY2SWpCN1lrdWc1QT09IiwibWFjIjoiZWQ5MzI5YTJiODcyZmE0NDMxYWExZDdmMjViMzY0NDBkODZkNGJkYWVmZTliZjFlM2JlYzZkNzA4NTViMThmYiIsInRhZyI6IiJ9', NULL, '2024-11-20 13:20:43', '2024-11-20 13:20:43'),
(387, 'MD. SAJIB AHMED', 'sajib7786@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 0, 'eyJpdiI6Ik1WV3kwQ3pDU0RLelgwdlp0Q1ZmWnc9PSIsInZhbHVlIjoiWW1VRm43SGFlMmt5L2g4bjI2dmVXZz09IiwibWFjIjoiNTE0ODNhZDhmM2Y5ZjhkZDAyNmVjMGI2ZGVkN2Q5MjE2NWU2NDY1ODg4YjRhYWU5MmRmNTBiZjg0N2I5MjFmMyIsInRhZyI6IiJ9', NULL, '2024-11-21 11:07:55', '2024-11-21 11:07:55'),
(388, 'FoisalRajib', 'foisalbhuiyan322@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '160', 1, 'eyJpdiI6IlNiRlVJNUkzSkZJbVlkRS8rUFVMVWc9PSIsInZhbHVlIjoiZ1BrRlNBcGNIU0lCSlI1ZndnamVTdz09IiwibWFjIjoiM2JiNzEzZGRkNzkzYjg1MWY0MGE2YTA3NWM3Njk4MGQzYWE1NjM0YTUyYjc1YzVlOGI0NzI2YWE2ZmQyNGEyZiIsInRhZyI6IiJ9', NULL, '2024-11-21 15:23:00', '2024-11-28 11:45:14'),
(389, 'Khandakar Mufasser Hossain', 'ktc923@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '29', 1, 'eyJpdiI6IjQwangyLzVzSlE5OVZtTGlTVnY5OWc9PSIsInZhbHVlIjoibHRacy80MlRycUZrMzBHeWFMWXo1Zz09IiwibWFjIjoiZGYzNWY1ZGEzNjc2ODAzODAyNjBhOTY3MTMzNWNiOTAzZjdhODY2NDc3OTgyMTU0N2ZiNzQxM2JiNmIyMzRlNiIsInRhZyI6IiJ9', NULL, '2024-11-22 16:34:02', '2024-11-26 18:34:15'),
(390, 'SUMON52', 'leonvern50201@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 0, 'eyJpdiI6IkRmQVdEYUZxNjlVSzYyaXFtYkhBb1E9PSIsInZhbHVlIjoiS1I4NzVtd1llOFRGaWxNeEZZYVEwdz09IiwibWFjIjoiNDRkZjhjNzIyOTI3NTkxMjVhOWEwZmU4NjlmY2Y1OTJiMWI2YThlZTg1Y2E4Nzk4YTM4ODZjYjNiZGJjMDg0ZCIsInRhZyI6IiJ9', NULL, '2024-11-24 09:29:59', '2024-11-24 09:29:59');
INSERT INTO `users` (`id`, `name`, `email`, `image`, `email_verified_at`, `is_admin`, `details`, `premium`, `premium_start`, `premium_end`, `balance`, `status`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(391, 'Mr. NID', 'boobs2120@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 0, 'eyJpdiI6InlXdldTVzJ2N0RsQUwwRkR5dXprdEE9PSIsInZhbHVlIjoiV0FrbHR2enBrOG1HUU5JZWdiVjBTUT09IiwibWFjIjoiYTk4Yzk2ZWVkZmI1YmJjYjY1OGMwMWMyNWZjYWYxZmUxNTIzMmE1NDEyNzYyMDE3NTY3Y2VkYWRmOGVhMzU3OSIsInRhZyI6IiJ9', NULL, '2024-11-24 13:16:00', '2024-11-24 13:16:00'),
(392, 'Akhtar Hossen', 'aktarhosse0@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '59', 1, 'eyJpdiI6Im5abXVxTDFOckJqRThwMzQ0RE5NQ3c9PSIsInZhbHVlIjoiR2ZsVWRzWXc5SGs2SVFKYzNWeG5iQT09IiwibWFjIjoiYjA2Y2NjOTZmNTFiZjVlNGRmZDE4ZmRiZDFiZGIwN2U3ZmJiYjU5ZTZjNGUwMmUwYzJjMTE4M2Y0MzdiNzU1MiIsInRhZyI6IiJ9', NULL, '2024-11-24 19:17:04', '2024-11-24 19:47:38'),
(393, 'Habiburbaharnoman', 'Kajolvai1988@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '110', 1, 'eyJpdiI6InhqeDBBUW9jeEc3eUlZVEVSblJINEE9PSIsInZhbHVlIjoidTE0aC9ySlRScWl1YnhEdTZtVW1Sdz09IiwibWFjIjoiMWVkZjdjZjYzZGU5MDdkZWJkMTAwYzUxMzg1ZDY2MzczZjc2Njk2OWQ0YzNkYzYzNThlMGYxNjdlMDYyN2NhMyIsInRhZyI6IiJ9', NULL, '2024-11-24 19:34:53', '2024-11-28 11:26:27'),
(394, 'Md Abu Said', 'abusaidcomputer2@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '179', 1, 'eyJpdiI6IlFLV1gyZDFnd21ZM0t5TnZvbjh2K2c9PSIsInZhbHVlIjoiNTVjZzJYdUkwMUNRcE4vR0IwTjlKUnNHbGNIMDFPTFRFaEtDbm1TdmVpcz0iLCJtYWMiOiI5NTgwNGRmNzk2NTIxNGY2N2ZhMDg0NWIzMWUzNDNlNTIyM2Q2NDY2MGE1YmNiYTk2YzlmYjg0ZjRhODM1MzBjIiwidGFnIjoiIn0=', NULL, '2024-11-25 12:17:38', '2024-11-25 12:38:21'),
(395, 'Imran', 'tusharimran.j@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 0, 'eyJpdiI6InNucko4V0xSMnB0RmtMTzAweWJEaXc9PSIsInZhbHVlIjoiMW9nV0VPdEZVc2RyL3JRTUtzbXRQekFqMXZLaURIZHlHbURmTTdneTZIQT0iLCJtYWMiOiI1MjgwYmY5Y2IxMTcxNTVmOGUwM2VkM2ViODRjYTVlNWUxYTgyMTE5NzBlNmU3NjVmNDVjZDExMzZhNzU4NjE1IiwidGFnIjoiIn0=', NULL, '2024-11-27 12:29:29', '2024-11-27 12:29:29'),
(396, 'techgsctc@gmail.com', 'techgsctc@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 1, 'eyJpdiI6IjdMNWh0a3FtVnZTc01KNEliVDhicnc9PSIsInZhbHVlIjoiQjB1eTM5Q0xYeDdUSEZyNlZ2QWtQUT09IiwibWFjIjoiYWQyOGRlNTk3NzliNmYwODQ4OGQwYzNlYjNhYWE2YWNhMzgzZTI3NWM2YzdkNzAxOThjZTc2NGRiZGE4OWFkMCIsInRhZyI6IiJ9', NULL, '2024-11-27 13:08:58', '2024-11-27 15:26:49'),
(397, 'julfikarali69', 'julfikarali69@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 0, 'eyJpdiI6IitaMFZReHVNSVowdndkcUtDNndwamc9PSIsInZhbHVlIjoiQzV5enlkWUVsSXVqckJQVStZTUcxUT09IiwibWFjIjoiMzE5NTAxNTVhODUyN2U3MTI1NDI5ZGJmZTAyYjI2NTY0MmQyNjc0OGI5Y2M0YTI5ZDg5ZWY4NjY1M2NiYjZjMCIsInRhZyI6IiJ9', NULL, '2024-11-27 17:38:05', '2024-11-27 17:38:05'),
(398, 'ANIMES ROY', 'animesroy71@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '143', 1, 'eyJpdiI6IjJWZitXMGFXUFk0YUd1WHY5YWlvbVE9PSIsInZhbHVlIjoiNkR4WjRSc2hRY3dpU25vcXNnZlUvZz09IiwibWFjIjoiYmI1OGI5OWI5M2QxNmNjM2EwOTg0ZDU4MTZjM2RiOTk2OWEzNjViZDFkNDQwNmMwMTk1NTU5MTVjYzc1NDliNSIsInRhZyI6IiJ9', NULL, '2024-11-27 18:12:54', '2024-11-27 19:09:05'),
(399, 'Omar Faruk', 'omarfarukshanto820@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 1, 'eyJpdiI6IitWWEVtQXRzRXIxMkh6R2orVHFEcVE9PSIsInZhbHVlIjoiU3k1c2s4WW96OXQrbXN6ejF5NUhQUVI5YlZxaGFMWVpYUnhqT3NqbWt4Zz0iLCJtYWMiOiJkYjRjYzhiYThhZTZlOTE0MDk0MTZhZjU4YzQ2NjNkMWE1YjIxNzM2MDNkNzE1N2E1OTRlMTk5OGYxZmFiZmJjIiwidGFnIjoiIn0=', NULL, '2024-11-27 22:57:25', '2024-11-27 22:58:16'),
(400, 'Aminul Islam', 'aminultelecom2@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 0, 'eyJpdiI6Im9HMllwVUZybFJjSkNSSXQ4WUw3TkE9PSIsInZhbHVlIjoiaE1GbFF6aDhKT1ozTElBbVZJcEU1QT09IiwibWFjIjoiNTYwNTJjNWNlZmJiN2NiMzg0YmE5MjJjNmRjOGM2MDE3Zjg1MDBmOTk3ZTM0ZmYzYzU0ODVjYjI1YTZlYjlhNyIsInRhZyI6IiJ9', NULL, '2024-11-28 06:01:16', '2024-11-28 06:01:16'),
(401, 'irfan', 'erfanahmed1340@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 0, 'eyJpdiI6Ikh5d0NBekZ4VC9jenVXVEl6OFdWNGc9PSIsInZhbHVlIjoiME5SYXNGWmNGWWN3K002UWpvUDdMUT09IiwibWFjIjoiMjQ4NGVjMTAxNjg1OGQxMzIyY2YzNTY1MGUwOTNiNWEwNjdmOGIyMTgxNjA3NDhiODhjNDA3ZGU2OGM2MDlkNSIsInRhZyI6IiJ9', NULL, '2024-11-28 07:06:56', '2024-11-28 07:06:56'),
(402, 'MD. MAHADI HASAN', 'mahadivay16@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '181', 1, 'eyJpdiI6ImMyeEcvWFhGNnFuVDJHMnZDL0UxQVE9PSIsInZhbHVlIjoiTC8zUlN2emo1ekRBV1J6VURyZ2pDUT09IiwibWFjIjoiYTU1YzQxYjJkYjJhNjQwYjYwMWJhNWMxMmE4M2IzMzlkN2RlZjI0YTI2MDE4OWJlYzM4ZmQ5ODZmZDc0NDkxMyIsInRhZyI6IiJ9', NULL, '2024-11-28 08:22:16', '2024-11-28 15:43:31'),
(403, 'Salauddin76@', 'salauddinhossin@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 1, 'eyJpdiI6Im5FRHgyK0E4WVMxK3Z1YXpVTVV2L2c9PSIsInZhbHVlIjoiUmthK3B0cVhobHJ2OU5GZEpBQ2psdz09IiwibWFjIjoiNGQ4M2RmMWU2N2M2MTFiZDZmYWQxN2I0NmFlYWY5ZTJmYmQxZGY4NjRkMDYxNTQ4OTI1ZWNmMjIxNDVmOGZmNyIsInRhZyI6IiJ9', NULL, '2024-11-28 10:10:09', '2024-11-28 16:59:33'),
(404, 'Nidcard', 'm.abujaformahmud@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 0, 'eyJpdiI6IjRwK3lJK2podmdCeG1lVDRoeW4zSWc9PSIsInZhbHVlIjoiQ25lYzMzUkphWnJHc1gyVXhUSGRLb0hibWlUUXlrNENENWJIMWF1ckRHND0iLCJtYWMiOiJhYThlMDk0YzBiNjE1ZDE1OGM2MWNjMWYwYjE4MDNjZTFiNzI4YTk4YjEzOGUxMWI0ZGFjYTc3MWRiZmFiNmZiIiwidGFnIjoiIn0=', NULL, '2024-11-28 10:50:16', '2024-11-28 10:50:16'),
(405, 'Md Habibullah', 'habibullahbhola467@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 1, 'eyJpdiI6IlpoZzlMaXd6bTZ4dmRZUVpwVGtzdnc9PSIsInZhbHVlIjoiMkN2R1IwbWhONVhBa0NROEIweEZ2dz09IiwibWFjIjoiYjA3NDFiZDAyNGNhZjViYzcwNTI3MTYyMDQ0MmMwNDk2MWZlMTI3ZjUyNmZjN2E1ODJkYzcyNDY0NTYyYWRjMiIsInRhZyI6IiJ9', NULL, '2024-11-28 11:30:44', '2024-11-28 11:32:21'),
(406, 'sirajul islam', 'sirajulislamakash.2030@outlook.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 0, 'eyJpdiI6Ik5PbXBLZ0RPNUgvbUlwanR5UWJGd2c9PSIsInZhbHVlIjoidms4ZjV4QUlTa1lWdFZmZ1NsMWp5QT09IiwibWFjIjoiOTI3NThhNDhkZGRkMDU5ZGM1MWExNGVkYzM5YTliMzJiZjdiYTUzYzZkZjk4ZTgyOGRlMWRiN2VkN2U2MmQ4MiIsInRhZyI6IiJ9', NULL, '2024-11-28 11:50:32', '2024-11-28 11:50:32'),
(407, 'Md Shamim khan', 'shamimkns347@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 1, 'eyJpdiI6ImlWU0tWTVJ5SXlkUEpqbkIxQ25SbGc9PSIsInZhbHVlIjoibG1RM0s1TzMwNEVjNkVZMDVLWFo2Zz09IiwibWFjIjoiODU1ZmY5NTQyZWQ4ZDIyNzMyODRkOWFmODA4ZTEwZDcyMTJmZjMyM2JlYmY1NWI5NDlkZjQ5ZGJhZGYyMGVmZSIsInRhZyI6IiJ9', NULL, '2024-11-28 14:02:06', '2024-11-28 14:08:32'),
(408, 'Md Rabbi', 'mdrabbi6535@gmail.com', NULL, NULL, 0, NULL, 0, '2024-11-28 15:02:05', '2025-11-28 15:02:05', '0', 0, 'eyJpdiI6IjJLWkZYUGcwclZlZkoyR1pHSlJaamc9PSIsInZhbHVlIjoiRmdtWlc0WkE0TmFZTzdkaU91eW42QT09IiwibWFjIjoiYTU5MjAwM2U2M2JjNjljNDViNjYzMTQ0MDgwZGFkY2U2Y2YyYTQ0MjhmYTI2MWVkMjY0ZWNmZjZkNjM0YjU0YiIsInRhZyI6IiJ9', NULL, '2024-11-28 15:00:33', '2024-11-28 15:33:34'),
(409, 'SABUJDAS898', 'sabujdas5837@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 0, 'eyJpdiI6IkxxbzJOa2JZUjEvbERYcno1dVJ3YlE9PSIsInZhbHVlIjoiTGpCck5EeUMrMjNzRElreURmOE4vZz09IiwibWFjIjoiYmUzNGQ3MGNiNTM4NTZkZDU0MDk3MzkxMDAxYjgzMTdhMTBiYWRkOTI3ZTljYzg3ZDMxNzljODYzZmIyYjQzZiIsInRhZyI6IiJ9', NULL, '2024-11-28 17:15:38', '2024-11-28 23:33:40'),
(410, 'romman08', 'mdrommansiddik772@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 0, 'eyJpdiI6InNUVU1kMVZGOW83K0VVUHFXOC81enc9PSIsInZhbHVlIjoiMWZveGpVbWtWa1NIbGxFNU9XRDNYUT09IiwibWFjIjoiMmY0ODQ2NjNhYWRlMDVlMDk4ZjQzNDYxMDM4YjhmZmUzM2Q3ZTY3NTA5YTViZDQxZDcxZjYwMzAyZmU1MzgwNSIsInRhZyI6IiJ9', NULL, '2024-11-28 17:32:17', '2024-11-28 17:32:17');

-- --------------------------------------------------------

--
-- Table structure for table `user_notifications`
--

CREATE TABLE `user_notifications` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `order_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `msg` text COLLATE utf8mb4_unicode_ci,
  `read_unread` tinyint DEFAULT '0' COMMENT '1=read',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_notifications`
--

INSERT INTO `user_notifications` (`id`, `user_id`, `order_type`, `msg`, `read_unread`, `created_at`, `updated_at`) VALUES
(19, 170, NULL, 'Id Card Order Refunded.Please Reload.', 0, '2024-07-12 12:39:53', '2024-07-12 12:39:53'),
(28, 92, NULL, 'Id Card Uploaded.Please Reload.', 0, '2024-08-17 16:18:47', '2024-08-17 16:18:47'),
(33, 141, NULL, 'Id Card Uploaded.Please Reload.', 1, '2024-08-28 12:16:34', '2024-08-28 13:15:09'),
(35, 68, NULL, 'Id Card Order Refunded.Please Reload.', 1, '2024-08-28 17:43:06', '2024-08-28 17:48:00'),
(36, 68, NULL, 'Id Card Uploaded.Please Reload.', 0, '2024-08-29 09:39:46', '2024-08-29 09:39:46'),
(38, 222, NULL, 'Id Card Uploaded.Please Reload.', 1, '2024-08-29 15:37:24', '2024-08-29 15:41:35'),
(42, 235, NULL, 'Id Card Uploaded.Please Reload.', 1, '2024-09-01 10:00:56', '2024-09-01 12:06:29'),
(43, 68, NULL, 'Id Card Uploaded.Please Reload.', 0, '2024-09-01 13:43:23', '2024-09-01 13:43:23'),
(44, 241, NULL, 'Id Card Order Refunded.Please Reload.', 0, '2024-09-02 18:48:43', '2024-09-02 18:48:43'),
(45, 63, NULL, 'Id Card Uploaded.Please Reload.', 1, '2024-09-03 09:54:42', '2024-09-10 17:41:18'),
(47, 92, NULL, 'Id Card Uploaded.Please Reload.', 0, '2024-09-07 15:41:13', '2024-09-07 15:41:13'),
(48, 92, NULL, 'Id Card Uploaded.Please Reload.', 0, '2024-09-08 13:50:29', '2024-09-08 13:50:29'),
(52, 254, NULL, 'Id Card Uploaded.Please Reload.', 0, '2024-09-18 08:48:17', '2024-09-18 08:48:17'),
(53, 254, NULL, 'Id Card Uploaded.Please Reload.', 0, '2024-09-18 08:48:42', '2024-09-18 08:48:42'),
(54, 143, NULL, 'Id Card Uploaded.Please Reload.', 1, '2024-09-18 18:02:06', '2024-09-19 00:00:05'),
(55, 254, NULL, 'Id Card Uploaded.Please Reload.', 0, '2024-09-19 10:01:44', '2024-09-19 10:01:44'),
(58, 235, NULL, 'Id Card Order Refunded.Please Reload.', 0, '2024-09-22 13:49:15', '2024-09-22 13:49:15'),
(59, 254, NULL, 'Id Card Uploaded.Please Reload.', 0, '2024-09-22 15:40:27', '2024-09-22 15:40:27'),
(60, 92, NULL, 'Id Card Uploaded.Please Reload.', 0, '2024-09-23 10:37:06', '2024-09-23 10:37:06'),
(62, 113, NULL, 'Id Card Uploaded.Please Reload.', 1, '2024-09-28 10:11:08', '2024-09-28 19:13:56'),
(64, 92, NULL, 'Id Card Uploaded.Please Reload.', 0, '2024-09-29 10:33:50', '2024-09-29 10:33:50'),
(69, 141, NULL, 'Id Card Order Refunded.Please Reload.', 0, '2024-10-08 20:08:43', '2024-10-08 20:08:43'),
(75, 92, NULL, 'Id Card Uploaded.Please Reload.', 0, '2024-10-12 08:03:27', '2024-10-12 08:03:27'),
(77, 92, NULL, 'Id Card Uploaded.Please Reload.', 0, '2024-10-14 14:32:18', '2024-10-14 14:32:18'),
(78, 92, NULL, 'Id Card Uploaded.Please Reload.', 0, '2024-10-14 14:42:52', '2024-10-14 14:42:52'),
(79, 92, NULL, 'Id Card Uploaded.Please Reload.', 0, '2024-10-16 12:39:38', '2024-10-16 12:39:38'),
(84, 342, NULL, 'Id Card Order Refunded.Please Reload.', 1, '2024-10-20 13:23:23', '2024-10-29 09:16:52'),
(85, 92, NULL, 'Id Card Uploaded.Please Reload.', 0, '2024-10-21 16:30:38', '2024-10-21 16:30:38'),
(86, 92, NULL, 'Id Card Uploaded.Please Reload.', 0, '2024-10-22 09:51:47', '2024-10-22 09:51:47'),
(87, 338, NULL, 'Id Card Uploaded.Please Reload.', 0, '2024-10-24 10:30:14', '2024-10-24 10:30:14'),
(91, 67, NULL, 'Id Card Order Refunded.Please Reload.', 1, '2024-10-27 17:36:52', '2024-10-27 22:55:14'),
(95, 92, NULL, 'Id Card Uploaded.Please Reload.', 0, '2024-10-29 14:16:46', '2024-10-29 14:16:46'),
(97, 141, NULL, 'Id Card Uploaded.Please Reload.', 0, '2024-10-30 14:11:03', '2024-10-30 14:11:03'),
(100, 141, NULL, 'Id Card Uploaded.Please Reload.', 0, '2024-10-31 13:01:29', '2024-10-31 13:01:29'),
(101, 146, NULL, 'Id Card Uploaded.Please Reload.', 0, '2024-11-02 12:35:50', '2024-11-02 12:35:50'),
(103, 92, NULL, 'Id Card Uploaded.Please Reload.', 0, '2024-11-04 09:00:02', '2024-11-04 09:00:02'),
(104, 92, NULL, 'Id Card Uploaded.Please Reload.', 0, '2024-11-04 09:00:40', '2024-11-04 09:00:40'),
(105, 92, NULL, 'Id Card Uploaded.Please Reload.', 0, '2024-11-04 09:08:08', '2024-11-04 09:08:08'),
(106, 92, NULL, 'Id Card Uploaded.Please Reload.', 0, '2024-11-04 10:03:20', '2024-11-04 10:03:20'),
(107, 177, NULL, 'Id Card Uploaded.Please Reload.', 0, '2024-11-04 13:04:27', '2024-11-04 13:04:27'),
(110, 182, NULL, 'Id Card Uploaded.Please Reload.', 1, '2024-11-05 10:18:12', '2024-11-21 11:54:37'),
(113, 338, NULL, 'Id Card Uploaded.Please Reload.', 0, '2024-11-07 10:53:30', '2024-11-07 10:53:30'),
(114, 336, NULL, 'Id Card Uploaded.Please Reload.', 1, '2024-11-10 11:26:59', '2024-11-12 17:55:35'),
(116, 66, NULL, 'Id Card Uploaded.Please Reload.', 1, '2024-11-12 10:28:26', '2024-11-26 22:31:03'),
(117, 177, NULL, 'Id Card Uploaded.Please Reload.', 0, '2024-11-12 10:34:54', '2024-11-12 10:34:54'),
(123, 336, NULL, 'Id Card Uploaded.Please Reload.', 0, '2024-11-14 18:59:37', '2024-11-14 18:59:37'),
(141, 247, NULL, 'Id Card Uploaded.Please Reload.', 1, '2024-11-17 11:20:21', '2024-11-17 11:43:34'),
(142, 247, NULL, 'Id Card Uploaded.Please Reload.', 1, '2024-11-17 11:37:50', '2024-11-17 11:43:34'),
(144, 247, NULL, 'Id Card Order Refunded.Please Reload.', 1, '2024-11-18 10:07:21', '2024-11-18 10:24:28'),
(145, 247, NULL, 'Id Card Uploaded.Please Reload.', 1, '2024-11-18 10:34:13', '2024-11-18 12:37:29'),
(146, 247, NULL, 'Id Card Uploaded.Please Reload.', 1, '2024-11-18 10:34:42', '2024-11-18 12:37:29'),
(147, 247, NULL, 'Id Card Uploaded.Please Reload.', 1, '2024-11-18 10:35:07', '2024-11-18 12:37:29'),
(148, 247, NULL, 'Id Card Uploaded.Please Reload.', 1, '2024-11-18 13:09:36', '2024-11-18 14:06:33'),
(149, 290, NULL, 'Id Card Order Refunded.Please Reload.', 0, '2024-11-18 15:09:33', '2024-11-18 15:09:33'),
(151, 247, NULL, 'Id Card Uploaded.Please Reload.', 1, '2024-11-19 08:53:56', '2024-11-24 12:06:24'),
(152, 92, NULL, 'Id Card Uploaded.Please Reload.', 0, '2024-11-19 10:16:05', '2024-11-19 10:16:05'),
(154, 92, NULL, 'Id Card Uploaded.Please Reload.', 0, '2024-11-19 10:26:34', '2024-11-19 10:26:34'),
(155, 247, NULL, 'Id Card Uploaded.Please Reload.', 1, '2024-11-19 13:08:30', '2024-11-24 12:06:24'),
(169, 290, NULL, 'Id Card Uploaded.Please Reload.', 0, '2024-11-20 10:23:36', '2024-11-20 10:23:36'),
(171, 336, NULL, 'Biometric Copy Uploaded.Please Reload.', 0, '2024-11-20 13:21:30', '2024-11-20 13:21:30'),
(174, 247, NULL, 'Id Card Uploaded.Please Reload.', 1, '2024-11-21 09:16:56', '2024-11-24 12:06:24'),
(177, 247, NULL, 'Id Card Uploaded.Please Reload.', 1, '2024-11-21 12:23:49', '2024-11-24 12:06:24'),
(183, 389, NULL, 'Id Card Uploaded.Please Reload.', 1, '2024-11-23 08:38:04', '2024-11-23 08:50:46'),
(185, 389, NULL, 'Id Card Uploaded.Please Reload.', 1, '2024-11-23 08:51:57', '2024-11-26 18:41:02'),
(187, 389, NULL, 'Id Card Uploaded.Please Reload.', 1, '2024-11-23 08:55:45', '2024-11-26 18:41:02'),
(192, 247, NULL, 'Id Card Uploaded.Please Reload.', 1, '2024-11-24 12:18:54', '2024-11-24 13:53:20'),
(193, 247, NULL, 'Id Card Uploaded.Please Reload.', 1, '2024-11-24 13:55:39', '2024-11-24 14:08:17'),
(194, 182, NULL, 'Id Card Uploaded.Please Reload.', 0, '2024-11-24 14:11:40', '2024-11-24 14:11:40'),
(196, 356, NULL, 'Id Card Uploaded.Please Reload.', 1, '2024-11-24 17:47:49', '2024-11-24 18:01:30'),
(197, 392, NULL, 'Id Card Uploaded.Please Reload.', 0, '2024-11-24 19:55:26', '2024-11-24 19:55:26'),
(198, 247, NULL, 'Id Card Uploaded.Please Reload.', 1, '2024-11-25 08:29:57', '2024-11-25 12:51:53'),
(199, 393, NULL, 'Id Card Uploaded.Please Reload.', 0, '2024-11-25 11:46:12', '2024-11-25 11:46:12'),
(200, 393, NULL, 'Id Card Uploaded.Please Reload.', 0, '2024-11-25 11:53:33', '2024-11-25 11:53:33'),
(201, 389, NULL, 'Id Card Uploaded.Please Reload.', 1, '2024-11-25 15:57:05', '2024-11-26 18:41:02'),
(202, 247, NULL, 'Id Card Uploaded.Please Reload.', 1, '2024-11-26 08:45:38', '2024-11-27 11:29:42'),
(203, 247, NULL, 'Id Card Uploaded.Please Reload.', 1, '2024-11-26 09:36:54', '2024-11-27 11:29:42'),
(207, 389, NULL, 'Id Card Uploaded.Please Reload.', 1, '2024-11-26 18:47:33', '2024-11-26 20:27:42'),
(208, 389, NULL, 'Id Card Uploaded.Please Reload.', 1, '2024-11-26 18:47:56', '2024-11-26 20:27:42'),
(209, 389, NULL, 'Id Card Uploaded.Please Reload.', 1, '2024-11-26 18:48:18', '2024-11-26 20:27:42'),
(210, 402, NULL, 'Sign Copy Order Refunded.Please Reload.', 1, '2024-11-28 15:13:04', '2024-11-28 15:14:14'),
(211, 402, NULL, 'Sign Copy Order Refunded.Please Reload.', 1, '2024-11-28 15:18:26', '2024-11-28 15:21:31');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `video` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title`, `description`, `video`, `created_at`, `updated_at`) VALUES
(8, 'সাইন কপি যেভাবে ডাউনলোড করবেন', NULL, 'lNdqMZ6ovrw', '2024-06-13 18:03:48', '2024-06-13 18:03:48'),
(9, 'সার্ভার কপি যেভাবে ডাউনলোড করবেন', NULL, '6U6Mnk511RQ', '2024-06-13 18:08:13', '2024-06-13 18:09:43'),
(10, 'আইডি কার্ড যেভাবে ডাউনলোড করবেন', NULL, 'xeBQ2G1rkJs', '2024-06-13 19:18:27', '2024-06-13 19:18:27'),
(11, 'বায়োমেট্রিক যেভাবে ডাউনলোড করবেন', NULL, 'kBHMKUKlxlw', '2024-06-14 09:59:26', '2024-06-14 09:59:26'),
(12, 'জন্ম নিবন্ধন তৈরি করুন', NULL, 'm2S0_Y4C4RE', '2024-06-14 10:01:56', '2024-06-14 10:01:56'),
(13, 'আন-অফিসিয়াল সার্ভার কপি ডাউনলোড', NULL, 'TzW7-JqaOwc', '2024-06-14 10:04:06', '2024-06-14 10:04:06'),
(14, 'রির্চাজ যেভাবে করবেন।', NULL, 'zmFurSGa15s', '2024-06-16 17:53:55', '2024-06-16 17:53:55');

-- --------------------------------------------------------

--
-- Table structure for table `video_links`
--

CREATE TABLE `video_links` (
  `id` bigint UNSIGNED NOT NULL,
  `button_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `video_links`
--

INSERT INTO `video_links` (`id`, `button_name`, `link`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, '2024-06-22 23:08:05', '2024-09-27 09:48:02');

-- --------------------------------------------------------

--
-- Table structure for table `website_links`
--

CREATE TABLE `website_links` (
  `id` bigint UNSIGNED NOT NULL,
  `bkash` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nagad` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bkash_type` text COLLATE utf8mb4_unicode_ci,
  `nagad_type` text COLLATE utf8mb4_unicode_ci,
  `whatsapp_group_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedIn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `map_link` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `website_links`
--

INSERT INTO `website_links` (`id`, `bkash`, `nagad`, `bkash_type`, `nagad_type`, `whatsapp_group_link`, `email`, `facebook`, `instagram`, `linkedIn`, `twitter`, `youtube`, `number`, `address`, `map_link`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, 'https://chat.whatsapp.com/BVl8zY1lrCFIIOgGbB83en', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-01 02:07:30', '2024-11-01 16:11:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_notifications`
--
ALTER TABLE `admin_notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_notifications_user_id_foreign` (`user_id`);

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
-- Indexes for table `hide_unhides`
--
ALTER TABLE `hide_unhides`
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
-- Indexes for table `moderator_accesses`
--
ALTER TABLE `moderator_accesses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `moderator_accesses_user_id_foreign` (`user_id`);

--
-- Indexes for table `name_address_ids`
--
ALTER TABLE `name_address_ids`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name_address_ids_user_id_foreign` (`user_id`);

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
-- Indexes for table `nid_makes`
--
ALTER TABLE `nid_makes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nid_makes_user_id_foreign` (`user_id`);

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
-- Indexes for table `premia`
--
ALTER TABLE `premia`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `recharges`
--
ALTER TABLE `recharges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `server_copy_orders`
--
ALTER TABLE `server_copy_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `server_copy_orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `server_copy_unofficials`
--
ALTER TABLE `server_copy_unofficials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `server_copy_unofficials_user_id_foreign` (`user_id`);

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
-- Indexes for table `tin_cirtificates`
--
ALTER TABLE `tin_cirtificates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tin_cirtificates_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_notifications`
--
ALTER TABLE `user_notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_notifications_user_id_foreign` (`user_id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video_links`
--
ALTER TABLE `video_links`
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
-- AUTO_INCREMENT for table `admin_notifications`
--
ALTER TABLE `admin_notifications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `biometric_types`
--
ALTER TABLE `biometric_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
-- AUTO_INCREMENT for table `hide_unhides`
--
ALTER TABLE `hide_unhides`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `id_card_orders`
--
ALTER TABLE `id_card_orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

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
-- AUTO_INCREMENT for table `moderator_accesses`
--
ALTER TABLE `moderator_accesses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `name_address_ids`
--
ALTER TABLE `name_address_ids`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `new_nids`
--
ALTER TABLE `new_nids`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `new_registrations`
--
ALTER TABLE `new_registrations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nid_makes`
--
ALTER TABLE `nid_makes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `premia`
--
ALTER TABLE `premia`
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
-- AUTO_INCREMENT for table `recharges`
--
ALTER TABLE `recharges`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `server_copy_orders`
--
ALTER TABLE `server_copy_orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `server_copy_unofficials`
--
ALTER TABLE `server_copy_unofficials`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sign_copy_orders`
--
ALTER TABLE `sign_copy_orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

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
-- AUTO_INCREMENT for table `tin_cirtificates`
--
ALTER TABLE `tin_cirtificates`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=411;

--
-- AUTO_INCREMENT for table `user_notifications`
--
ALTER TABLE `user_notifications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `video_links`
--
ALTER TABLE `video_links`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `website_links`
--
ALTER TABLE `website_links`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_notifications`
--
ALTER TABLE `admin_notifications`
  ADD CONSTRAINT `admin_notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `name_address_ids`
--
ALTER TABLE `name_address_ids`
  ADD CONSTRAINT `name_address_ids_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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

--
-- Constraints for table `tin_cirtificates`
--
ALTER TABLE `tin_cirtificates`
  ADD CONSTRAINT `tin_cirtificates_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_notifications`
--
ALTER TABLE `user_notifications`
  ADD CONSTRAINT `user_notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

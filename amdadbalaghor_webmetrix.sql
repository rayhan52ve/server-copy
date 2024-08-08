-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 03, 2024 at 05:50 AM
-- Server version: 8.0.37
-- PHP Version: 8.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amdadbalaghor_webmetrix`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_notifications`
--

CREATE TABLE `admin_notifications` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `order_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `msg` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `biometric_types`
--

CREATE TABLE `biometric_types` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `premium_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `biometric_types`
--

INSERT INTO `biometric_types` (`id`, `name`, `price`, `premium_price`, `created_at`, `updated_at`) VALUES
(3, 'রবি বায়োমেট্রিক-১০০ টাকা', '100', NULL, '2024-04-24 04:46:02', '2024-06-13 14:59:40'),
(8, 'গ্রামীন বায়োমেট্রিক-১০০ টাকা', '100', NULL, '2024-04-25 09:25:28', '2024-06-13 14:59:26'),
(9, 'এয়ারটেল বায়োমেট্রিক-১০০', '100', NULL, '2024-05-15 06:15:26', '2024-06-13 14:59:15');

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
(2, 'Admin WhatsApp Number- 01607509068 (নোট :- যেকোন প্রয়োজনে ইনবক্স করুন, তবে ফোন দিবেন না)', '© 2024-04-25 Design & Developed by US', '2023-06-05 01:15:17', '2024-06-11 16:49:39');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hide_unhides`
--

INSERT INTO `hide_unhides` (`id`, `sign_copy`, `server_copy`, `id_card`, `biometric`, `new_nid`, `old_nid`, `birth`, `server_unofficial`, `sign_to_server`, `premium`, `admin`, `video`, `recharge`, `recharge_bkash`, `created_at`, `updated_at`) VALUES
(1, 0, 0, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 0, 1, '2024-06-09 01:42:23', '2024-07-06 20:57:22');

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
(1, 'ServerCopy', 'logo/logo-1555568208.png', '/logo/logo-1187724315.png', '2023-06-08 03:23:59', '2024-05-20 02:55:31');

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
  `sign_to_server` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `sign_to_server_price` int DEFAULT '0',
  `recharge_bkash` text COLLATE utf8mb4_unicode_ci,
  `recharge_bkash_price` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `premium_sign_copy` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `premium_sign_copy_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `premium_server_copy` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `premium_server_copy_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `premium_id_card` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `premium_id_card_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `premium_biometric` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `premium_biometric_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `premium_new_nid` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `premium_new_nid_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `premium_old_nid` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `premium_old_nid_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `premium_birth` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `premium_birth_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `premium_server_unofficial` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `premium_server_unofficial_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `premium_sign_to_server` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `premium_sign_to_server_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sign_copy`, `sign_copy_price`, `server_copy`, `server_copy_price`, `id_card`, `id_card_price`, `biometric`, `biometric_price`, `new_nid`, `new_nid_price`, `old_nid`, `old_nid_price`, `birth`, `birth_price`, `server_unofficial`, `server_unofficial_price`, `sign_to_server`, `sign_to_server_price`, `recharge_bkash`, `recharge_bkash_price`, `created_at`, `updated_at`, `premium_sign_copy`, `premium_sign_copy_price`, `premium_server_copy`, `premium_server_copy_price`, `premium_id_card`, `premium_id_card_price`, `premium_biometric`, `premium_biometric_price`, `premium_new_nid`, `premium_new_nid_price`, `premium_old_nid`, `premium_old_nid_price`, `premium_birth`, `premium_birth_price`, `premium_server_unofficial`, `premium_server_unofficial_price`, `premium_sign_to_server`, `premium_sign_to_server_price`) VALUES
(1, 'প্রতি সাইন কপি রেট ২০ টাকা।', '20', 'প্রতি সার্ভার কপি রেট ২০টাকা।', '20', 'প্রতি NID Copy রেট ২১০ টাকা।', '210', NULL, NULL, 'প্রতি NID CARD মেক ৫ টাকা', '5', 'প্রতি মেক ১০ টাকা', '10', 'প্রতি নিবন্ধন তৈরিতে খরচ হবে ২০ টাকা', '20', NULL, '25', 'প্রতি মেক ১০ টাকা', 10, 'সর্বনিম্ন রিচার্জ 200 টাকা।', 200, '2024-05-01 02:17:55', '2024-08-03 09:40:11', 'প্রতি সাইন কপি রেট ১৭০ টাকা।', '170', 'প্রতি সার্ভার কপি রেট ১৭০ টাকা।', '170', 'প্রতি NID Copy রেট ২০০ টাকা।', '200', NULL, NULL, 'Premium Member প্রতি মেক ২ টাকা', '2', 'প্রতি মেক ৮ টাকা', '8', 'প্রতি নিবন্ধন তৈরিতে খরচ হবে ১০ টাকা', '10', 'প্রতি কপির মূল্য ১১ টাকা', '11', 'প্রতি মেক ৫ টাকা', '5');

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
-- Table structure for table `moderator_accesses`
--

CREATE TABLE `moderator_accesses` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `sign_copy` int NOT NULL DEFAULT '0',
  `server_copy` int NOT NULL DEFAULT '0',
  `id_card` int NOT NULL DEFAULT '0',
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `moderator_accesses`
--

INSERT INTO `moderator_accesses` (`id`, `user_id`, `sign_copy`, `server_copy`, `id_card`, `biometric`, `biometric_type`, `recharge`, `video`, `user_list`, `user_edit`, `premium_request`, `general_settings`, `notice_settings`, `message_settings`, `premium_settings`, `created_at`, `updated_at`) VALUES
(35, 174, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-07-06 22:20:27', '2024-07-15 19:30:46'),
(36, 190, 1, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-07-15 18:48:03', '2024-07-15 19:32:31');

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

-- --------------------------------------------------------

--
-- Table structure for table `nid_makes`
--

CREATE TABLE `nid_makes` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `nid_image` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `sign_image` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `name_bn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `husband_father` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fathers_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mothers_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_place` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `issue_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nid_makes`
--

INSERT INTO `nid_makes` (`id`, `user_id`, `nid_image`, `sign_image`, `name_bn`, `name_en`, `nid_number`, `pin`, `husband_father`, `fathers_name`, `mothers_name`, `birth_place`, `birthday`, `issue_date`, `address`, `created_at`, `updated_at`) VALUES
(3, 73, NULL, NULL, NULL, NULL, NULL, NULL, 'পিতা', NULL, NULL, NULL, '2024-08-03', '2024-08-03', NULL, '2024-08-03 09:40:39', '2024-08-03 09:40:39');

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
  `sign_to_server` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `recharge` longtext COLLATE utf8mb4_unicode_ci,
  `recharge_bkash` text COLLATE utf8mb4_unicode_ci,
  `dashboard` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `sign_copy`, `server_copy`, `id_card`, `biometric`, `new_nid`, `old_nid`, `birth`, `server_unofficial`, `sign_to_server`, `recharge`, `recharge_bkash`, `dashboard`, `created_at`, `updated_at`) VALUES
(1, 'সাইন কপি ইনশাআল্লাহ্ আগামী মাস থেকে চালু হবে/ সবাই whatsapp গ্রুপ অপশন থেকে whatsapp গ্রুপে জয়েন হয়ে যান। আমাদের সাথে থাকার জন্য ধন্যবাদ', 'আপাতত সার্ভার কপি বন্ধ (সার্ভার কপি আনঅফিসিয়াল অপশন ব্যবহার করুন) সবাই whatsapp গ্রুপ অপশন থেকে whatsapp গ্রুপে জয়েন হয়ে যান। ♥ ধন্যবাদ ♥', 'ইনশাআল্লাহ্ আগামী মাস থেকে চালু হবে/সবাই whatsapp গ্রুপ অপশন থেকে whatsapp গ্রুপে জয়েন হয়ে যান। আমাদের সাথে থাকার জন্য ধন্যবাদ', 'ইনশাআল্লাহ্ আগামী মাস থেকে চালু হবে/সবাই whatsapp গ্রুপ অপশন থেকে whatsapp গ্রুপে জয়েন হয়ে যান। আমাদের সাথে থাকার জন্য ধন্যবাদ', 'NID Make রাত/দিন ২৪ ঘণ্টা চালু ♥ ধন্যবাদ ♥', 'NID Make রাত/দিন ২৪ ঘণ্টা চালু/সবাই whatsapp গ্রুপ অপশন থেকে whatsapp গ্রুপে জয়েন হয়ে যান। ♥ ধন্যবাদ ♥', 'জন্ম নিবন্ধন নতুন ভার্সন pdf তৈরি করতে পারবেন/সবাই whatsapp গ্রুপ অপশন থেকে whatsapp গ্রুপে জয়েন হয়ে যান।  ♥ ধন্যবাদ ♥', 'সার্ভার ডাউন (এডমিন টিম সার্ভার ঠিক করার জন্য কাজ করছে)', 'সাইন কপি থেকে সার্ভার কপি তৈরি । ♥ ধন্যবাদ ♥', 'রিচার্জের জন্য প্রথমে নিচের নাম্বারে বিকাশ পেমেন্ট করুন, তারপর নিচের ফরমটি সঠিকভাবে পূরণ করে সাবমিট করে অপেক্ষা করুন ♥ ধন্যবাদ ♥', 'বিকাশের মাধ্যমে অটোমেটিক রিচার্জ করুন, আপনার একাউন্টে টাকা অটোমেটিক এড হয়ে যাবে/সবাই whatsapp গ্রুপ অপশন থেকে whatsapp গ্রুপে জয়েন হয়ে যান।  ♥ ধন্যবাদ ♥', 'রিচার্জ করে আপনার একাউন্ট সচল রাখুন। সবাই whatsapp গ্রুপ অপশন থেকে whatsapp গ্রুপে জয়েন হয়ে যান।', '2024-05-01 01:43:28', '2024-07-30 11:58:19');

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
-- Table structure for table `premia`
--

CREATE TABLE `premia` (
  `id` bigint UNSIGNED NOT NULL,
  `price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `renew_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `notice` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `submit` int DEFAULT '0',
  `details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `accept_request` int DEFAULT '0',
  `subscription_days` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `premia`
--

INSERT INTO `premia` (`id`, `price`, `renew_price`, `notice`, `message`, `submit`, `details`, `accept_request`, `subscription_days`, `created_at`, `updated_at`) VALUES
(1, '499', '399', '১১টাকায় সার্ভার কপি আরো বিভিন্ন সুযোগ সুবিধা পাবেন। দ্রুত প্রিমিয়াম মেম্বারসীপ নিয়ে নেন।', 'আপনার একাউন্ট থেকে ৫০০ টাকা কর্তন করা হবে।', 1, '<h3>প্রিমিয়াম মেম্বারসীপ</h3><p>-----------------------------------</p><h4>শর্তাবলী-</h4><p>১। প্রিমিয়াম মেম্বারসীপের আবেদন করার জন্য আপনার একাউন্টে সর্বনিন্ম ৫০০ টাকা থাকতে হবে।<br>২। আপনার একাউন্ট থেকে ৪৯৯ টাকা কেটে নেয়া হবে।<br>৩। প্রিমিয়াম মেম্বারসীপের মেয়াদ থাকবে ৩০ দিন।<br>৪। প্রিমিয়াম মেম্বার হবার ৩০ দিন পর &nbsp;রেন্যু করাতে হবে।&nbsp;<br>৫। মনে রাখবেন- যদি ৩০দিন পরেও আপনি আপনার একাউন্ট রেন্যু না করান তবে আপনার যাবতীয় সকল চার্জ ক্যাজুয়াল মেম্বারদের মত হবে।<br>৬। রেন্যু ফি ৩৯৯ টাকা।<br>৭। অ্যাডমিনকে এই ব্যাপারে মেসেজ দিতে হবেনা, যাবতীয় সকল কার্যাবলী অটোমেটিক হবে।</p><h4>যেসব সুযোগ সুবিদা পাবেন-</h4><p>১। প্রতি সার্ভার কপি মূল্য হবে ১১ টাকা।<br>২। NID Card/Sign Copy/ Official Server Copy সর্বোচ্চ কম মূল্যে প্রদান।<br>৩। সর্বক্ষেত্রে VIP সুযোগ সুবিধা পাবেন।</p>', 0, 30, '2024-06-01 06:29:24', '2024-07-17 19:15:00');

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
-- Table structure for table `recharges`
--

CREATE TABLE `recharges` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `method` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recharges`
--

INSERT INTO `recharges` (`id`, `user_id`, `method`, `payment_number`, `transaction_id`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(6, '35', 'Bkash', '01825709177', 'BEJ4IV8D2M', '100', 1, '2024-05-19 14:26:04', '2024-05-19 14:26:28'),
(7, '39', 'Bkash', '018875554543', 'YUTRYYTY', '200', 1, '2024-05-20 01:12:10', '2024-05-20 01:13:49'),
(8, '41', 'Bkash', '01888888888', 'FLKS9EKIS', '1000', 1, '2024-05-20 05:14:08', '2024-05-20 05:14:28'),
(9, '43', 'Bkash', '01789032450', 'BEK2JPYW70', '100', 2, '2024-05-20 07:46:52', '2024-05-20 07:47:40'),
(10, '43', 'Bkash', '01789032450', 'BEK2JPYW70', '100', 1, '2024-05-20 07:49:43', '2024-05-20 07:50:08'),
(11, '33', 'Bkash', '01686524190', 'BEL9K36DXJ', '100', 1, '2024-05-20 22:24:24', '2024-05-20 22:24:38'),
(12, '43', 'Bkash', '01789032450', 'BEL4KARBCE', '200', 1, '2024-05-21 02:20:47', '2024-05-21 02:29:49'),
(13, '51', 'Bkash', '01971169606', 'BEM8L3BDJQ', '120', 1, '2024-05-22 12:16:55', '2024-05-22 12:18:57'),
(14, '42', 'Bkash', '01313500116', 'BEN2LTZDEA', '100', 1, '2024-05-23 10:02:46', '2024-05-23 10:03:14'),
(15, '57', 'Bkash', '01302972382', 'BEN8LWCGWA', '250', 1, '2024-05-23 11:08:16', '2024-05-23 11:08:46'),
(16, '35', 'Bkash', '01825709177', 'BEP0NT2WO0', '40', 1, '2024-05-25 17:00:10', '2024-05-25 17:00:33'),
(17, '63', 'Bkash', '01882477272', 'BEQ4OCCDUS', '100', 1, '2024-05-26 10:21:33', '2024-05-26 10:21:43'),
(18, '64', 'Bkash', '01985548522', 'BEQ5OEH6OZ', '200', 1, '2024-05-26 11:14:12', '2024-05-26 11:14:31'),
(19, '51', 'Bkash', '01971169606', 'BEQ5oHCTEJ', '200', 1, '2024-05-26 12:24:25', '2024-05-26 12:24:39'),
(20, '42', 'Bkash', '01313500116', 'BEQ9OJNFS5', '100', 1, '2024-05-26 13:23:39', '2024-05-26 13:24:57'),
(21, '66', 'Bkash', '01686524190', 'BEQ8OXYRBY', '100', 2, '2024-05-26 20:03:53', '2024-05-27 13:51:38'),
(22, '66', 'Bkash', '01686524190', 'BEQ8OXYRBY', '100', 1, '2024-05-26 20:05:00', '2024-05-26 20:05:54'),
(23, '67', 'Bkash', '01825709177', 'BER7P8P9VJ', '100', 1, '2024-05-27 10:12:30', '2024-05-27 10:21:08'),
(24, '68', 'Bkash', '01703719062', 'BER6PEB9B6', '150', 1, '2024-05-27 13:51:29', '2024-05-27 13:51:48'),
(25, '51', 'Bkash', '01971169606', 'BET4QQ00PC', '140', 1, '2024-05-29 10:06:23', '2024-05-29 10:06:42'),
(26, '74', 'Bkash', '01303464328', 'BF14UAA8W4', '50', 1, '2024-06-01 22:29:02', '2024-06-01 22:29:34'),
(27, '69', 'Bkash', '01833646231', 'BF21UL3EDZ', '100', 1, '2024-06-02 11:45:15', '2024-06-02 11:47:00'),
(28, '67', 'Bkash', '01825709177', 'BF26UMO4K6', '100', 1, '2024-06-02 12:23:05', '2024-06-02 12:23:15'),
(29, '77', 'Bkash', '01813709960', 'BF21UNLOML', '100', 1, '2024-06-02 12:46:43', '2024-06-02 16:55:59'),
(30, '66', 'Bkash', '01686524190', 'BF36VGOAQY', '200', 1, '2024-06-03 10:01:46', '2024-06-03 10:09:04'),
(31, '78', 'Bkash', '01785619887', 'BF38VI27XM', '150', 1, '2024-06-03 10:41:12', '2024-06-03 10:41:30'),
(32, '78', 'Bkash', '01784519887', 'BF38VI27XM', '150', 2, '2024-06-03 10:41:59', '2024-06-03 11:11:27'),
(33, '82', 'Bkash', '01850356968', 'Sjskejejssh', '20', 1, '2024-06-03 10:55:33', '2024-06-03 11:13:25'),
(34, '81', 'Bkash', '01406761599', 'BF33VJ7DN5', '100', 1, '2024-06-03 11:11:20', '2024-06-03 11:11:39'),
(35, '63', 'Bkash', '01882477272', 'BF34VKECAW', '100', 1, '2024-06-03 11:40:51', '2024-06-03 11:44:08'),
(36, '83', 'Bkash', '01948829965', 'BF37VMP2ZR', '100', 1, '2024-06-03 12:40:36', '2024-06-03 12:40:50'),
(37, '78', 'Bkash', '01784519887', 'BF30VPHONK', '40', 2, '2024-06-03 13:58:53', '2024-06-03 14:02:40'),
(38, '78', 'Bkash', '01784519887', 'BF30VPHONK', '40', 1, '2024-06-03 13:59:24', '2024-06-03 14:02:31'),
(39, '67', 'Bkash', '01825709177', 'BF35VPZHYD', '300', 1, '2024-06-03 14:15:52', '2024-06-03 14:16:28'),
(40, '42', 'Bkash', '01624267575', 'BF36VQD3TY', '100', 1, '2024-06-03 14:29:05', '2024-06-03 14:29:35'),
(41, '63', 'Bkash', '01882477272', 'BF37VREVDV', '100', 1, '2024-06-03 15:08:51', '2024-06-03 15:09:14'),
(42, '85', 'Bkash', '01756262274', NULL, '20', 2, '2024-06-03 16:14:42', '2024-06-03 19:00:25'),
(43, '85', 'Bkash', '01756262274', NULL, '20', 2, '2024-06-03 16:15:50', '2024-06-03 19:00:34'),
(44, '78', 'Bkash', '01784519887', 'BF44WILTUE', '400', 1, '2024-06-04 11:01:53', '2024-06-04 11:04:12'),
(45, '71', 'Bkash', '01889505062', NULL, '100', 1, '2024-06-04 12:34:01', '2024-06-04 12:37:45'),
(46, '89', 'Bkash', '01875622100', 'BF46WO0UAK', '100', 1, '2024-06-04 13:13:38', '2024-06-04 13:13:51'),
(47, '63', 'Bkash', '01882477272', 'BF45WOWQ0V', '100', 1, '2024-06-04 13:40:03', '2024-06-04 13:40:21'),
(48, '67', 'Bkash', '01825709177', 'BF45WR9G0V', '100', 1, '2024-06-04 14:59:37', '2024-06-04 15:02:41'),
(49, '42', 'Bkash', '01624267575', 'BF44WSVWN8', '400', 1, '2024-06-04 15:59:43', '2024-06-04 15:59:53'),
(50, '92', 'Bkash', '01725869157', 'BF590FXN2B', '100', 1, '2024-06-05 11:22:45', '2024-06-05 11:24:51'),
(51, '92', 'Bkash', '01725869157', 'BF530LJKCV', '220', 1, '2024-06-05 13:52:17', '2024-06-05 13:52:26'),
(52, '92', 'Bkash', '01725869157', 'BF580MR7C0', '100', 1, '2024-06-05 14:32:14', '2024-06-05 14:37:41'),
(53, '83', 'Bkash', '01948829965', 'BF550N3MEN', '100', 1, '2024-06-05 14:45:53', '2024-06-05 14:46:06'),
(54, '66', 'Bkash', '01866858834', 'BF500SBWY0', '60', 1, '2024-06-05 17:39:27', '2024-06-05 17:39:40'),
(55, '94', 'Bkash', '01881864324', 'BF500U6QA8', '200', 1, '2024-06-05 18:22:28', '2024-06-05 18:22:51'),
(56, '93', 'Bkash', '01726744586', 'BF510ZLTSX', '50', 1, '2024-06-05 20:21:43', '2024-06-05 20:22:14'),
(57, '96', 'Bkash', '01975785488', 'BF54147CBY', '100', 1, '2024-06-05 21:51:13', '2024-06-05 21:51:23'),
(58, '43', 'Bkash', '01789032450', 'BF691C67NF', '100', 1, '2024-06-06 09:59:59', '2024-06-06 10:00:20'),
(59, '78', 'Bkash', '01784519887', 'BF631CYKVP', '80', 1, '2024-06-06 10:22:05', '2024-06-06 10:22:30'),
(60, '67', 'Bkash', '01825709177', 'BF671H11RZ', '100', 1, '2024-06-06 12:02:55', '2024-06-06 12:03:31'),
(61, '97', 'Bkash', '01738598656', NULL, '40', 2, '2024-06-06 13:11:49', '2024-06-06 13:16:37'),
(62, '97', 'Bkash', '01768501087', 'BF661K18KQ', '30', 1, '2024-06-06 13:16:20', '2024-06-06 13:16:31'),
(63, '98', 'Bkash', '01756262274', 'BF631KQ321', '100', 1, '2024-06-06 13:36:06', '2024-06-06 13:36:41'),
(64, '98', 'Bkash', '01756262274', 'BF631KQ321', '80', 2, '2024-06-06 13:36:41', '2024-06-06 13:38:26'),
(65, '67', 'Bkash', '01825709177', 'BF671LY3MB', '100', 1, '2024-06-06 14:13:08', '2024-06-06 14:13:22'),
(66, '97', 'Bkash', '01738598656', 'BF611OOPKR', '200', 1, '2024-06-06 15:45:24', '2024-06-06 15:47:36'),
(67, '67', 'Bkash', '01825709177', 'BF883EBDSE', '70', 1, '2024-06-08 11:24:24', '2024-06-08 11:24:37'),
(68, '92', 'Bkash', '01725869157', 'BF873FOZSH', '50', 1, '2024-06-08 11:59:29', '2024-06-08 11:59:40'),
(69, '100', 'Bkash', '01795107916', 'BF833T0PJH', '30', 2, '2024-06-08 18:42:01', '2024-06-08 18:43:02'),
(70, '100', 'Bkash', '01795107916', 'BF833T0PJH', '30', 1, '2024-06-08 18:42:33', '2024-06-08 18:43:06'),
(71, '100', 'Bkash', '01795107916', 'BF984A1C5Q', '100', 1, '2024-06-09 09:41:40', '2024-06-09 09:41:57'),
(72, '66', 'Bkash', '01866858834', 'BF994ABWJD', '100', 1, '2024-06-09 09:51:46', '2024-06-09 09:51:59'),
(73, '43', 'Bkash', '01789032450', 'BF994BNUXX', '150', 1, '2024-06-09 10:26:56', '2024-06-09 10:27:52'),
(74, '96', 'Bkash', 'BF924E39Q6', '01975785488', '200', 1, '2024-06-09 11:24:15', '2024-06-09 11:24:37'),
(75, '78', 'Bkash', '01784519887', 'BF994GTSJX', '80', 1, '2024-06-09 12:27:43', '2024-06-09 12:28:19'),
(76, '67', 'Bkash', '01825709177', 'BF904IJBI0', '110', 1, '2024-06-09 13:08:44', '2024-06-09 13:09:03'),
(77, '66', 'Bkash', '01866858834', 'BF904K6FQO', '100', 1, '2024-06-09 13:53:59', '2024-06-09 13:54:13'),
(78, '43', 'Bkash', '01789032450', 'BF904KKU56', '150', 1, '2024-06-09 14:04:13', '2024-06-09 14:04:34'),
(79, '103', 'Bkash', '01819055664', NULL, '300', 2, '2024-06-09 16:11:05', '2024-06-09 16:21:30'),
(80, '103', 'Bkash', '01819055664', 'BF964OS0VO', '300', 1, '2024-06-09 16:21:17', '2024-06-09 16:21:27'),
(81, '100', 'Bkash', '01795107916', 'BF984UL3H8', '100', 1, '2024-06-09 18:42:15', '2024-06-09 18:42:21'),
(82, '67', 'Bkash', '01825709177', 'BFA95DBRXF', '200', 1, '2024-06-10 10:12:41', '2024-06-10 10:24:45'),
(83, '66', 'Bkash', '01866858834', 'BFA45E6MFC', '100', 1, '2024-06-10 10:35:30', '2024-06-10 10:35:40'),
(84, '98', 'Bkash', '01756262274', 'BFA25FQRLI', '100', 1, '2024-06-10 11:13:26', '2024-06-10 11:13:36'),
(85, '78', 'Bkash', '01784519887', 'BFA05IV7S6', '80', 1, '2024-06-10 12:24:13', '2024-06-10 12:24:29'),
(86, '92', 'Bkash', '01725869157', 'BFA061G39K', '50', 1, '2024-06-10 20:08:19', '2024-06-10 20:09:02'),
(87, '105', 'Bkash', '01611668560', 'BFB96IIFF7', '50', 1, '2024-06-11 10:31:14', '2024-06-11 10:31:38'),
(88, '66', 'Bkash', '01866858834', 'BFB96P1683', '100', 1, '2024-06-11 12:58:22', '2024-06-11 12:58:38'),
(89, '109', 'Bkash', '01774323345', 'BFB06T6Z1l', '100', 1, '2024-06-11 15:00:34', '2024-06-11 15:00:43'),
(90, '68', 'Bkash', '01703719062', 'BFB36WG9K5', '100', 1, '2024-06-11 16:44:13', '2024-06-11 16:44:29'),
(91, '113', 'Bkash', '01538422313', 'BFB96XRN0P', '100', 1, '2024-06-11 17:19:49', '2024-06-11 17:20:29'),
(92, '113', 'Bkash', '01538422313', 'BFB96XRN0P', '400', 2, '2024-06-11 17:31:12', '2024-06-11 17:32:55'),
(93, '113', 'Bkash', '01538422313', 'BFB06Y6Z6S', '400', 1, '2024-06-11 17:32:06', '2024-06-11 17:32:38'),
(94, '67', 'Bkash', '01825709177', 'BFB776YJDX', '100', 1, '2024-06-11 20:25:51', '2024-06-11 20:36:33'),
(95, '66', 'Bkash', '01866858834', 'BFB2788LHQ', '100', 1, '2024-06-11 20:54:03', '2024-06-11 20:54:22'),
(96, '42', 'Bkash', '01624267575', 'BFC47JS15Y', '100', 1, '2024-06-12 09:28:39', '2024-06-12 09:31:08'),
(97, '98', 'Bkash', '01756262274', 'BFC27KIOV2', '100', 1, '2024-06-12 09:52:46', '2024-06-12 09:53:26'),
(98, '66', 'Bkash', '01866858834', 'BFC57RW56X', '100', 1, '2024-06-12 12:42:12', '2024-06-12 12:42:35'),
(99, '78', 'Bkash', '01784519887', 'BFC97U53SV', '80', 1, '2024-06-12 13:36:06', '2024-06-12 13:38:00'),
(100, '57', 'Bkash', '01302972382', 'BFC57V4P7L', '300', 1, '2024-06-12 14:03:22', '2024-06-12 14:03:44'),
(101, '43', 'Bkash', '01789032450', 'BFC97WFXG1', '100', 1, '2024-06-12 14:43:29', '2024-06-12 14:43:57'),
(102, '67', 'Bkash', '01825709177', 'BFC77ZRX3R', '100', 1, '2024-06-12 16:30:22', '2024-06-12 16:30:33'),
(103, '117', 'Bkash Gateway', '01995146105', 'BFC882ZR8I', '1', 1, '2024-06-12 17:49:18', '2024-06-12 17:49:18'),
(104, '44', 'Bkash Gateway', '01889200695', 'BFC083TEBK', '1', 1, '2024-06-12 18:07:00', '2024-06-12 18:07:00'),
(105, '44', 'Bkash Gateway', '01889200695', 'BFC685RYUC', '200', 1, '2024-06-12 18:48:13', '2024-06-12 18:48:13'),
(106, '67', 'Bkash Gateway', '01825709177', 'BFD48VA1PO', '200', 1, '2024-06-13 12:03:49', '2024-06-13 12:03:49'),
(107, '92', 'Bkash Gateway', '01725869157', 'BFD88VB8TQ', '200', 1, '2024-06-13 12:04:30', '2024-06-13 12:04:30'),
(108, '92', 'Bkash Gateway', '01725869157', 'BFD28XKS3K', '200', 1, '2024-06-13 12:51:13', '2024-06-13 12:51:13'),
(109, '63', 'Bkash', '01882477272', 'BFD08RJDN0', '100', 1, '2024-06-13 13:01:19', '2024-06-13 13:49:28'),
(110, '121', 'Bkash Gateway', '01315934363', 'BFE2A0PR14', '210', 1, '2024-06-14 12:23:19', '2024-06-14 12:23:19'),
(111, '124', 'Bkash Gateway', '01911619001', 'BFG5C1NWPR', '200', 1, '2024-06-16 10:01:28', '2024-06-16 10:01:28'),
(112, '98', 'Bkash Gateway', '01756262274', 'BFK5FC5ZV7', '200', 1, '2024-06-20 12:47:57', '2024-06-20 12:47:57'),
(113, '127', 'Bkash Gateway', '01795107916', 'BFL8G13M2O', '200', 1, '2024-06-21 10:59:23', '2024-06-21 10:59:23'),
(114, '133', 'Bkash Gateway', '01995146105', 'BFN1HL5FF3', '1', 1, '2024-06-23 10:25:01', '2024-06-23 10:25:01'),
(115, '92', 'Bkash Gateway', '01725869157', 'BFN5HN13ND', '200', 1, '2024-06-23 11:12:14', '2024-06-23 11:12:14'),
(116, '42', 'Bkash Gateway', '01624267575', 'BFN8HNWIHG', '200', 1, '2024-06-23 11:33:07', '2024-06-23 11:33:07'),
(117, '43', 'Bkash Gateway', '01789032450', 'BFN7HODFGH', '200', 1, '2024-06-23 11:44:45', '2024-06-23 11:44:45'),
(118, '97', 'Bkash Gateway', '01768501087', 'BFN8HOKKEI', '200', 1, '2024-06-23 11:49:39', '2024-06-23 11:49:39'),
(119, '135', 'Bkash Gateway', '01829833536', 'BFN0HPOF7M', '200', 1, '2024-06-23 12:15:46', '2024-06-23 12:15:46'),
(120, '78', 'Bkash Gateway', '01784519887', 'BFN7HRZO8L', '200', 1, '2024-06-23 13:15:09', '2024-06-23 13:15:09'),
(121, '51', 'Bkash Gateway', '01971169606', 'BFN9I2W7F5', '200', 1, '2024-06-23 19:04:02', '2024-06-23 19:04:02'),
(122, '43', 'Bkash Gateway', '01789032450', 'BFO4IR4CKS', '200', 1, '2024-06-24 13:32:34', '2024-06-24 13:32:34'),
(123, '98', 'Bkash Gateway', '01756262274', 'BFO5ISADDN', '200', 1, '2024-06-24 14:11:16', '2024-06-24 14:11:16'),
(124, '43', 'Bkash Gateway', '01789032450', 'BFO8ISI93C', '200', 1, '2024-06-24 14:19:04', '2024-06-24 14:19:04'),
(125, '43', 'Bkash Gateway', '01789032450', 'BFO0J1XDIG', '200', 1, '2024-06-25 01:12:31', '2024-06-25 01:12:31'),
(126, '68', 'Bkash Gateway', '01703719062', 'BFO2J2UOES', '200', 1, '2024-06-25 01:31:21', '2024-06-25 01:31:21'),
(127, '140', 'Bkash Gateway', '01325162111', 'BFP4JDIY4Q', '200', 1, '2024-06-25 07:29:42', '2024-06-25 07:29:42'),
(128, '97', 'Bkash Gateway', '01768501087', 'BFP4JM4CFM', '500', 1, '2024-06-25 17:57:13', '2024-06-25 17:57:13'),
(129, '126', 'Bkash Gateway', '01314401430', 'BFP1JMIWJL', '200', 1, '2024-06-25 18:06:06', '2024-06-25 18:06:06'),
(130, '67', 'Bkash Gateway', '01825709177', 'BFP1JUJUMV', '200', 1, '2024-06-25 22:14:12', '2024-06-25 22:14:12'),
(131, '96', 'Bkash Gateway', '01852923430', 'BFQ0KJP6QY', '200', 1, '2024-06-26 17:22:31', '2024-06-26 17:22:31'),
(132, '42', 'Bkash Gateway', '01624267575', 'BFQ5KMJKSV', '200', 1, '2024-06-26 18:32:48', '2024-06-26 18:32:48'),
(133, '63', 'Bkash Gateway', '01882477272', 'BFQ3KN5V6D', '200', 1, '2024-06-26 18:48:33', '2024-06-26 18:48:33'),
(134, '51', 'Bkash Gateway', '01971169606', 'BFQ9KP5EUF', '500', 1, '2024-06-26 19:45:31', '2024-06-26 19:45:31'),
(135, '143', 'Bkash Gateway', '01815452758', 'BFQ1KR2IC7', '200', 1, '2024-06-26 20:53:25', '2024-06-26 20:53:25'),
(136, '67', 'Bkash Gateway', '01825709177', 'BFR2LKYPVG', '200', 1, '2024-06-27 18:14:54', '2024-06-27 18:14:54'),
(137, '66', 'Bkash Gateway', '01866858834', 'BFR9LQIUTF', '200', 1, '2024-06-27 20:53:28', '2024-06-27 20:53:28'),
(138, '78', 'Bkash Gateway', '01784519887', 'BFR0LQSVJU', '200', 1, '2024-06-27 21:02:57', '2024-06-27 21:02:57'),
(139, '92', 'Bkash Gateway', '01725869157', 'BFR7LUBW7L', '200', 1, '2024-06-27 23:00:34', '2024-06-27 23:00:34'),
(140, '146', 'Bkash Gateway', '01829441518', 'BFS1MDYNYZ', '200', 1, '2024-06-28 13:24:54', '2024-06-28 13:24:54'),
(141, '149', 'Bkash Gateway', '01921577581', 'BFS4MQ43I6', '200', 1, '2024-06-28 21:38:01', '2024-06-28 21:38:01'),
(142, '151', 'Bkash Gateway', '01926221835', 'BFT3NC2C1N', '200', 1, '2024-06-29 16:21:51', '2024-06-29 16:21:51'),
(143, '98', 'Bkash Gateway', '01756262274', 'BFT1NDJRTP', '200', 1, '2024-06-29 17:08:51', '2024-06-29 17:08:51'),
(144, '92', 'Bkash Gateway', '01725869157', 'BFT1NDL3CJ', '200', 1, '2024-06-29 17:09:38', '2024-06-29 17:09:38'),
(145, '153', 'Bkash Gateway', '01763151343', 'BFU0O4ZZF2', '200', 1, '2024-06-30 07:24:12', '2024-06-30 07:24:12'),
(146, '43', 'Bkash Gateway', '01789032450', 'BFU0O9L5GA', '200', 1, '2024-06-30 16:19:33', '2024-06-30 16:19:33'),
(147, '140', 'Bkash Gateway', '01325162111', 'BFU9OCM8LR', '200', 1, '2024-06-30 17:32:34', '2024-06-30 17:32:34'),
(148, '67', 'Bkash Gateway', '01825709177', 'BFU7OGHOT7', '200', 1, '2024-06-30 19:00:50', '2024-06-30 19:00:50'),
(149, '67', 'Bkash Gateway', '01825709177', 'BFU4OGTTKG', '200', 1, '2024-06-30 19:09:02', '2024-06-30 19:09:02'),
(150, '43', 'Bkash Gateway', '01789032450', 'BFU8OLUUJ4', '200', 1, '2024-06-30 21:38:37', '2024-06-30 21:38:37'),
(151, '151', 'Bkash Gateway', '01780063697', 'BG12PDIRRM', '200', 1, '2024-07-01 17:05:10', '2024-07-01 17:05:10'),
(152, '92', 'Bkash Gateway', '01725869157', 'BG18PJY10O', '200', 1, '2024-07-01 19:54:05', '2024-07-01 19:54:05'),
(153, '156', 'Bkash Gateway', '01728381929', 'BG15PLNKDD', '200', 1, '2024-07-01 20:54:10', '2024-07-01 20:54:10'),
(154, '92', 'Bkash Gateway', '01725869157', 'BG25QMLCZJ', '200', 1, '2024-07-02 16:49:27', '2024-07-02 16:49:27'),
(155, '152', 'Bkash Gateway', '01552430604', 'BG23QW2EZT', '200', 1, '2024-07-02 20:20:15', '2024-07-02 20:20:15'),
(156, '151', 'Bkash Gateway', '01780063697', 'BG33R42H85', '300', 1, '2024-07-03 07:02:26', '2024-07-03 07:02:26'),
(157, '158', 'Bkash Gateway', '01714265202', 'BG31R6ZRIX', '200', 1, '2024-07-03 09:56:36', '2024-07-03 09:56:36'),
(158, '115', 'Bkash Gateway', '01881864324', 'BG39RCNQHT', '200', 1, '2024-07-03 12:25:10', '2024-07-03 12:25:10'),
(159, '67', 'Bkash Gateway', '01825709177', 'BG39RDNPIX', '200', 1, '2024-07-03 12:50:14', '2024-07-03 12:50:14'),
(160, '159', 'Bkash Gateway', '01872564966', 'BG32RFIQB0', '200', 1, '2024-07-03 13:42:33', '2024-07-03 13:42:33'),
(161, '43', 'Bkash Gateway', '01789032450', 'BG38RFZ5AG', '200', 1, '2024-07-03 13:56:37', '2024-07-03 13:56:37'),
(162, '158', 'Bkash Gateway', '01714265202', 'BG46S91N4G', '200', 1, '2024-07-04 11:52:17', '2024-07-04 11:52:17'),
(163, '173', 'Bkash Gateway', '01825709177', 'BG42SX217G', '400', 1, '2024-07-04 22:28:52', '2024-07-04 22:28:52'),
(164, '146', 'Bkash Gateway', '01829441518', 'BG64U21HF4', '200', 1, '2024-07-06 11:50:26', '2024-07-06 11:50:26'),
(165, '141', 'Bkash Gateway', '01948829965', 'BG62U2XOZI', '200', 1, '2024-07-06 12:14:51', '2024-07-06 12:14:51'),
(166, '175', 'Bkash Gateway', '01799405003', 'BG70USKIA4', '200', 1, '2024-07-07 07:49:58', '2024-07-07 07:49:58'),
(167, '66', 'Bkash Gateway', '01866858834', 'BG74V0E446', '200', 1, '2024-07-07 12:15:07', '2024-07-07 12:15:07'),
(168, '158', 'Bkash Gateway', '01714265202', 'BG76V1AZOK', '200', 1, '2024-07-07 12:37:22', '2024-07-07 12:37:22'),
(169, '43', 'Bkash Gateway', '01789032450', 'BG73V28AXT', '200', 1, '2024-07-07 13:00:58', '2024-07-07 13:00:58'),
(170, '42', 'Bkash Gateway', '01624267575', 'BG71V5JTGV', '200', 1, '2024-07-07 14:44:13', '2024-07-07 14:44:13'),
(171, '171', 'Bkash Gateway', '01788527836', 'BG75V8AWKT', '200', 1, '2024-07-07 16:20:47', '2024-07-07 16:20:47'),
(172, '42', 'Bkash Gateway', '01624267575', 'BG78VECFU6', '350', 1, '2024-07-07 18:55:42', '2024-07-07 18:55:42'),
(173, '78', 'Bkash Gateway', '01784519887', 'BG83VVMJ69', '400', 1, '2024-07-08 10:24:31', '2024-07-08 10:24:31'),
(174, '66', 'Bkash Gateway', '01874034585', 'BG89VXGNE7', '200', 1, '2024-07-08 11:12:57', '2024-07-08 11:12:57'),
(175, '67', 'Bkash Gateway', '01825709177', 'BG88VYGV7O', '200', 1, '2024-07-08 11:37:42', '2024-07-08 11:37:42'),
(176, '63', 'Bkash Gateway', '01729805942', 'BG82VYTAJ4', '200', 1, '2024-07-08 11:46:00', '2024-07-08 11:46:00'),
(177, '134', 'Bkash Gateway', '01829833536', 'BG87W36KHT', '200', 1, '2024-07-08 13:37:09', '2024-07-08 13:37:09'),
(178, '135', 'Bkash Gateway', '01829833536', 'BG83W6CBMZ', '200', 1, '2024-07-08 15:25:38', '2024-07-08 15:25:38'),
(179, '92', 'Bkash Gateway', '01725869157', 'BG84W9RYDO', '200', 1, '2024-07-08 17:20:53', '2024-07-08 17:20:53'),
(180, '97', 'Bkash Gateway', '01738598656', 'BG99WXIVZZ', '200', 1, '2024-07-09 11:12:35', '2024-07-09 11:12:35'),
(181, '175', 'Bkash Gateway', '01799405003', 'BG97WYJ51B', '200', 1, '2024-07-09 11:38:24', '2024-07-09 11:38:24'),
(182, '66', 'Bkash Gateway', '01866858834', 'BG96X2Q4BK', '200', 1, '2024-07-09 13:26:31', '2024-07-09 13:26:31'),
(183, '67', 'Bkash Gateway', '01825709177', 'BG910G21CZ', '200', 1, '2024-07-09 20:32:01', '2024-07-09 20:32:01'),
(184, '42', 'Bkash Gateway', '01624267575', 'BGA40QJQRG', '200', 1, '2024-07-10 08:34:56', '2024-07-10 08:34:56'),
(185, '180', 'Bkash Gateway', '01956079791', 'BGA80TKJKA', '200', 1, '2024-07-10 10:25:47', '2024-07-10 10:25:47'),
(186, '158', 'Bkash Gateway', '01714265202', 'BGA80ZOVLM', '200', 1, '2024-07-10 13:02:15', '2024-07-10 13:02:15'),
(187, '66', 'Bkash Gateway', '01866858834', 'BGA3131GVV', '200', 1, '2024-07-10 14:49:00', '2024-07-10 14:49:00'),
(188, '182', 'Bkash Gateway', '01872564966', 'BGA414ODFW', '200', 1, '2024-07-10 15:49:11', '2024-07-10 15:49:11'),
(189, '66', 'Bkash Gateway', '01686524190', 'BGB81R3MFU', '200', 1, '2024-07-11 09:42:55', '2024-07-11 09:42:55'),
(190, '43', 'Bkash Gateway', '01789032450', 'BGB91SIQJ7', '200', 1, '2024-07-11 10:28:49', '2024-07-11 10:28:49'),
(191, '51', 'Bkash Gateway', '01971169606', 'BGB31U3Z4P', '500', 1, '2024-07-11 11:11:00', '2024-07-11 11:11:00'),
(192, '170', 'Bkash Gateway', '01729179588', 'BGB01UD83A', '200', 1, '2024-07-11 11:17:14', '2024-07-11 11:17:14'),
(193, '78', 'Bkash Gateway', '01784519887', 'BGB51UXBJL', '200', 1, '2024-07-11 11:31:55', '2024-07-11 11:31:55'),
(194, '92', 'Bkash Gateway', '01725869157', 'BGB11ZW5H1', '200', 1, '2024-07-11 13:42:22', '2024-07-11 13:42:22'),
(195, '175', 'Bkash Gateway', '01799405003', 'BGB724WMGB', '200', 1, '2024-07-11 16:38:28', '2024-07-11 16:38:28'),
(196, '44', 'Bkash Gateway', '01889200695', 'BGC22OTF7K', '1', 1, '2024-07-12 09:45:15', '2024-07-12 09:45:15'),
(197, '98', 'Bkash Gateway', '01756262274', 'BGC83DPUXE', '200', 1, '2024-07-12 22:55:06', '2024-07-12 22:55:06'),
(198, '143', 'Bkash Gateway', '01815452758', 'BGD03W119O', '200', 1, '2024-07-13 17:00:33', '2024-07-13 17:00:33'),
(199, '92', 'Bkash Gateway', '01725869157', 'BGD03WZ4MY', '200', 1, '2024-07-13 17:30:40', '2024-07-13 17:30:40'),
(200, '146', 'Bkash Gateway', '01829441518', 'BGE54NPD5F', '200', 1, '2024-07-14 13:24:09', '2024-07-14 13:24:09'),
(201, '51', 'Bkash Gateway', '01971169606', 'BGE14REU3X', '200', 1, '2024-07-14 15:30:30', '2024-07-14 15:30:30'),
(202, '66', 'Bkash Gateway', '01866858834', 'BGE757D8QD', '200', 1, '2024-07-14 22:03:19', '2024-07-14 22:03:19'),
(203, '98', 'Bkash Gateway', '01756262274', 'BGF05HOQP8', '400', 1, '2024-07-15 11:13:08', '2024-07-15 11:13:08'),
(204, '98', 'Bkash Gateway', '01756262274', 'BGF85HRAY0', '200', 1, '2024-07-15 11:15:17', '2024-07-15 11:15:17'),
(205, '134', 'Bkash Gateway', '01829833536', 'BGF95J4A1F', '200', 1, '2024-07-15 11:50:30', '2024-07-15 11:50:30'),
(206, '182', 'Bkash Gateway', '01872564966', 'BGF05JVS4I', '200', 1, '2024-07-15 12:10:18', '2024-07-15 12:10:18'),
(207, '92', 'Bkash Gateway', '01725869157', 'BGF15LI40X', '200', 1, '2024-07-15 12:52:12', '2024-07-15 12:52:12'),
(208, '43', 'Bkash Gateway', '01789032450', 'BGF25M5I2K', '200', 1, '2024-07-15 13:10:17', '2024-07-15 13:10:17'),
(209, '193', 'Bkash Gateway', '01850132653', 'BGF861YKKC', '200', 1, '2024-07-15 20:41:04', '2024-07-15 20:41:04'),
(210, '42', 'Bkash Gateway', '01313500116', 'BGG46DDDAY', '200', 1, '2024-07-16 10:31:10', '2024-07-16 10:31:10'),
(211, '158', 'Bkash Gateway', '01714265202', 'BGG86DRFVG', '200', 1, '2024-07-16 10:42:43', '2024-07-16 10:42:43'),
(212, '67', 'Bkash Gateway', '01825709177', 'BGG86E9EA0', '500', 1, '2024-07-16 10:56:23', '2024-07-16 10:56:23'),
(213, '180', 'Bkash Gateway', '01956079791', 'BGG96FTVE9', '200', 1, '2024-07-16 11:37:55', '2024-07-16 11:37:55'),
(214, '66', 'Bkash Gateway', '01866858834', 'BGG06GMCJ0', '200', 1, '2024-07-16 11:59:33', '2024-07-16 11:59:33'),
(215, '151', 'Bkash Gateway', '01780063697', 'BGG86I17RO', '300', 1, '2024-07-16 12:34:46', '2024-07-16 12:34:46'),
(216, '177', 'Bkash Gateway', '01793635027', 'BGG36ITQBX', '200', 1, '2024-07-16 12:56:26', '2024-07-16 12:56:26'),
(217, '140', 'Bkash Gateway', '01325162111', 'BGG06JS8OA', '200', 1, '2024-07-16 13:23:54', '2024-07-16 13:23:54'),
(218, '194', 'Bkash Gateway', '01738091592', 'BGG66JUQ00', '300', 1, '2024-07-16 13:25:49', '2024-07-16 13:25:49'),
(219, '196', 'Bkash Gateway', '01758288195', 'BGG56N1TFB', '200', 1, '2024-07-16 15:22:20', '2024-07-16 15:22:20'),
(220, '92', 'Bkash Gateway', '01725869157', 'BGG46NO90C', '200', 1, '2024-07-16 15:48:09', '2024-07-16 15:48:09'),
(221, '63', 'Bkash Gateway', '01714871357', 'BGH37EX9AF', '200', 1, '2024-07-17 13:10:44', '2024-07-17 13:10:44'),
(222, '200', 'Bkash Gateway', '01722624180', 'BGI588F8WT', '200', 1, '2024-07-18 16:05:38', '2024-07-18 16:05:38'),
(223, '202', 'Bkash Gateway', '01956079791', 'BGS8BCWNN2', '200', 1, '2024-07-28 13:06:11', '2024-07-28 13:06:11'),
(224, '127', 'Bkash Gateway', '01795107916', 'BGV4DKGE2Y', '200', 1, '2024-07-31 07:51:23', '2024-07-31 07:51:23'),
(225, '151', 'Bkash Gateway', '01780063697', 'BH21F552N1', '200', 1, '2024-08-02 06:55:12', '2024-08-02 06:55:12');

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

-- --------------------------------------------------------

--
-- Table structure for table `server_copy_unofficials`
--

CREATE TABLE `server_copy_unofficials` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nameEn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bloodGroup` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationalId` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanentAddress` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `presentAddress` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nidFather` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nidMother` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `voterArea` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateOfBirth` date DEFAULT NULL,
  `birthPlace` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `sign_to_server` int DEFAULT '0',
  `registration` int DEFAULT '0',
  `login` int DEFAULT '0',
  `recharge` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `submit_statuses`
--

INSERT INTO `submit_statuses` (`id`, `sign_copy`, `server_copy`, `id_card`, `biometric`, `new_nid`, `old_nid`, `birth`, `server_unofficial`, `sign_to_server`, `registration`, `login`, `recharge`, `created_at`, `updated_at`) VALUES
(1, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, '2024-05-01 04:00:33', '2024-07-15 19:07:21');

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
  `details` text COLLATE utf8mb4_unicode_ci,
  `premium` int DEFAULT '0',
  `premium_start` timestamp NULL DEFAULT NULL,
  `premium_end` timestamp NULL DEFAULT NULL,
  `balance` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `image`, `email_verified_at`, `is_admin`, `details`, `premium`, `premium_start`, `premium_end`, `balance`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(13, 'Admin', 'admin@admin.com', 'user/user-1883643859.jpg', NULL, 1, '<h4><strong>হ্যালো মেম্বারস</strong></h4><p>আমি এই ওয়েবসাইটের অ্যাডমিন আপনাদের উদ্দেশ্য করে কিছু কথা বলছি।</p><p>আমি আপনাদের মধ্যে যে সাইটটি নিয়ে এসেছি, এর মাধ্যমে আপনারা NID CARD/সাইন কপি/সার্ভার কপি থেকে শুরু করে আন-অফিসিয়াল সার্ভার কপি ডাউনলোড করতে পারবেন।</p><p>আপনার নিজের নিরাপত্তা ও সকলের নিরাপত্তার স্বার্থে &nbsp;Website এর লিংক অন্য কারো সাথে শেয়ার করা থেকে বিরত থাকুন। যদি কারো সাথে Website এর লিংক শেয়ার অথবা টাকার বিনিময়ে বিক্রি করেন তবে আপনার বিরুদ্ধে যথাযথ ব্যবস্থা গ্রহন করা হবে।</p><h4><strong>হ্যালো মেম্বারস</strong></h4><p>আপনারা কখনো অপ্রয়োজনে আমাকে ইনবক্সে মেসেজ করবেন না। সর্বদা নোটিশ ফলো করবেন, নোটিশে যা লেখা থাকবে তাই কার্যকর হবে। অনেক সময় সার্ভার কপি ডাউনলোড না হলে ২/৩ টা বাহির করার চেষ্টা করুন, যদি তারপরেও ডাউনলোড না হয়, এবং নোটিশে “সার্ভার কপি চালু” লেখা থাকে, তবে অ্যাডমিনকে মেসেজের মাধ্যমে অবগত করুন।</p><p>সবাইকে ধন্যবাদ</p>', 0, NULL, NULL, '0', 'eyJpdiI6Im4waUZPeXVyK3ovSXhscWhIM3RZdUE9PSIsInZhbHVlIjoiUWRtU2lUdFlCblB3OW8rK2N4ZHZZQT09IiwibWFjIjoiNGNmYTI3MTM1NTExNTBkNDM4NTRiODM2ZjIyYzRhNDRmODJiMzI0ODY3NjY2ZWU5MWE0NWViZmM3Y2U3NDJjYSIsInRhZyI6IiJ9', NULL, '2023-06-08 05:32:42', '2024-07-04 09:00:50'),
(42, 'KhalidHasan', 'sssagor299@gmail.com', NULL, NULL, 0, NULL, 2, '2024-07-11 17:23:36', '2024-08-10 17:23:36', '88', 'eyJpdiI6IkJDbmdWdlpzc2pKTWZZMEk1NnN1NkE9PSIsInZhbHVlIjoidSt5VDdZcE1FWHh4Z1hiSUZpRytUQT09IiwibWFjIjoiOTk4ZjcwY2IzZWZkMjZmOWQyNGM3MjQ5MGFhMmYzOWQwMjU0MmZjNTZkOTRlOTcwZjFkMzE3NjFhZjYxODJhZSIsInRhZyI6IiJ9', NULL, '2024-05-20 07:06:18', '2024-07-16 16:05:23'),
(43, 'MD. RASEL MIA', 'Vaihot81@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '119', 'eyJpdiI6ImxPT0NaM0pNbnpvZ1ZhU3VmYW1mYVE9PSIsInZhbHVlIjoid2xPMi9VejJiNUI2WUNTclZHOUZndz09IiwibWFjIjoiMmY3ZjRkMmQ0YWI4NjNhYzc3ZmVlMmMyMWU0MzQ5YTNlNzFkOWVmZTRhZjUxZTZkYWY1ZmVjMWUxMDJmYTlhNSIsInRhZyI6IiJ9', NULL, '2024-05-20 07:41:40', '2024-07-16 13:54:09'),
(44, 'Admin', 'bismillacomputer.kha30@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '500', 'eyJpdiI6IlJGVDZJaXF2eXd6VWpGbzFtamc1aFE9PSIsInZhbHVlIjoiYXArcC9VUzYvZlp5U2c4N0RUTXZiQT09IiwibWFjIjoiZjI2YWY4Njc1YjY4NDNkMzgzZjI0ZGEwOWVlMzRmMDdmYjIzMjUwMmQzMGIyMzhkNThkOWE0YTU5YzIyNTQ2ZSIsInRhZyI6IiJ9', NULL, '2024-05-20 07:53:39', '2024-07-16 08:14:34'),
(51, 'SHIHAB', 'nahiyanshihab201@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '157', 'eyJpdiI6Ik51bEZWR2Myd0JiK2tES0ZMNGNMVGc9PSIsInZhbHVlIjoiY1A4QTB2WWNvUUt4ZFdFVmtQRkNmQT09IiwibWFjIjoiMTlmM2IyZTczNGJhNDFkNDVjNzE2OWU5NmY0NzNiOTFlMGY4NTY0YmY2YTg4ZDg5NjQ3OTZlZWI2MjQ2YmM1NCIsInRhZyI6IiJ9', NULL, '2024-05-22 12:02:24', '2024-07-15 16:21:50'),
(57, 'JAKIR HOSSAIN', 'Mdjakirhossaim3@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '115', 'eyJpdiI6ImhPMmlvTFJvNm53aWJQNWdkMUlCNFE9PSIsInZhbHVlIjoiZTZKTkIwSzh5amNrVzJMNDNZRU1EZz09IiwibWFjIjoiNDMwOWQzYzE4ODRiZjVlMmEyYzE0ZjUxY2M4Y2E4ZGNlYzZmM2YyODI2NmJkOTRiNmIyMWE2NDc5ZTdjYjhkNyIsInRhZyI6IiJ9', NULL, '2024-05-23 10:52:09', '2024-07-11 18:15:00'),
(63, 'rajuahmed', 'rajuahmed3718@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '92', 'eyJpdiI6IkRXQVBtZVg4K1hHN1lNSXRuTWdIRHc9PSIsInZhbHVlIjoiL3k4Q2pKQVJodVZQREFQZ1RGcURSZz09IiwibWFjIjoiNTEwNDE5MGFiNjRmZDdmZDgwNGNiNzE0N2IxNWIzYWIzYzk5MjU2MjViMmM2ZTQxN2U1MmMwMmE2YTRjYTM1NyIsInRhZyI6IiJ9', NULL, '2024-05-26 09:59:00', '2024-07-17 13:18:03'),
(64, 'minhajulnizam74', 'minhajulnizam74@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '27', 'eyJpdiI6IjZIZ2t3aVVlcEM2czlGaU5wdUZ6M1E9PSIsInZhbHVlIjoiUkg5VHFzcjZRei9TVmxwbkMxWXpvZz09IiwibWFjIjoiZDMwZTRjYWI4OWIwZGM5MzQzYTEzNTM4YjY1NTAzZTNhZWNiZTYyZDM2OGQ4YjIxYzE4NjNlNjcwZjFhOGJmMCIsInRhZyI6IiJ9', NULL, '2024-05-26 11:06:27', '2024-07-07 13:48:10'),
(66, 'S.M SOJIB', 'sojibgazi21@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '21', 'eyJpdiI6InplY3dvb2RmYy81b2ljR28ranpKckE9PSIsInZhbHVlIjoiLzdtMHlzK3VkZ0JhQk10WU1iRjU5dz09IiwibWFjIjoiN2I3NDI5NjdlMmZhOWZiMGY3YTVlMGJlM2JiMWI3Zjk5ZTVmZTE5MjY4YzdmNTNhNDQxZjk5ODdmODQxNTAyNCIsInRhZyI6IiJ9', NULL, '2024-05-26 17:50:37', '2024-08-01 15:26:31'),
(67, 'Md Abu Faisal', 'faislcxb@gmail.com', NULL, NULL, 0, NULL, 2, '2024-07-16 10:56:34', '2024-08-15 10:56:34', '21', 'eyJpdiI6Ik5SOUxJbDJ2RW9zcWZkZUdONkNyRVE9PSIsInZhbHVlIjoiU1pxZDJvaFc4K2dFSFl2cnFVNUhRZz09IiwibWFjIjoiOTBhN2ZkMzA1ZTU0YTVmMzFmNjBhMWQzYjgzZTMzMDczNDA3NTk4YjY2YjJhZGRlZWQ2MTk3Mzc0NGUxZmU2MSIsInRhZyI6IiJ9', NULL, '2024-05-26 23:37:46', '2024-07-17 21:48:20'),
(68, 'Faharul', 'faharul.fcs@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '139', 'eyJpdiI6IlBxMGhIM1ZLWDR3Z0RlQ3I5cHgyWVE9PSIsInZhbHVlIjoiSENiQ2JLbi9aNFNzVVRNNTJCNU5UZz09IiwibWFjIjoiOGE0MjhlNWZkM2Y2ODZiZTdiNDFhY2E1MzI1YjU1NDM2MzI4OWNhZmViMzJmMTRjOWMwYzYzZmNmZjdkMDYzMiIsInRhZyI6IiJ9', NULL, '2024-05-27 12:00:05', '2024-07-08 17:26:28'),
(69, 'ahsan.msi', 'dhaka.msi@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '19', 'eyJpdiI6InA5UFloc0F3cVBYcmdVcVJtVVZ1RUE9PSIsInZhbHVlIjoiUGtLRXhSMDNzdHBTczEyMFdndkZMdz09IiwibWFjIjoiMGQxMDY2MGFjYTM1Y2M4Mjk4OWUwNzVhZmRjZDAzYzc5YTlkNmNlYTk1YjBkNjZlZjVhYTBmMDM3ZDIzMTE1OCIsInRhZyI6IiJ9', NULL, '2024-05-29 09:58:06', '2024-07-04 09:15:35'),
(71, 'hasanupbd@gmail.com', 'hasanupbd@gmail.com', NULL, NULL, 0, NULL, 2, '2024-07-11 18:05:28', '2024-08-10 18:05:28', '8', 'eyJpdiI6InY5S0FPdkd1NUpuM2hhTUc5VzNCZ0E9PSIsInZhbHVlIjoiMXFxWlJOWlBGcFhYZTJCVVdwZEJlQT09IiwibWFjIjoiYjRjODhhZTc3M2I0YmM4ZThhYmUwM2YxOTZlZDcyZjQxM2NmOThjOTA5ZDI4MmY2YzA4ZWRhMGViN2Q5N2E2ZiIsInRhZyI6IiJ9', NULL, '2024-05-29 13:09:35', '2024-07-18 11:06:19'),
(73, 'Rubel Sikder', 'premium@gmail.com', NULL, NULL, 0, NULL, 2, '2024-07-11 17:37:03', '2024-08-10 17:37:03', '492', 'eyJpdiI6IkUyaHZ2UDl1YWRicEFsRDZzbEVnTVE9PSIsInZhbHVlIjoiSU9CSkV6RXMvNW1LSnJWTUxybW1GUT09IiwibWFjIjoiNmU4NTBlNGI5OGU5NjE5Yzg5MWFhYTdiMzVmMjc4NjIyYTczOGZjNmQwODMwMzVmMWU5YjBhOGQyMTI3Yjk3ZSIsInRhZyI6IiJ9', NULL, '2024-06-01 19:15:32', '2024-08-03 09:40:39'),
(74, 'Alivai', 'raihanmiziit@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '10', 'eyJpdiI6InFFNFczZWsyc2NJSkNlSXVRZVJjN0E9PSIsInZhbHVlIjoidElLMGJ6ZktlUzdOVzlOYXNGSWw1QT09IiwibWFjIjoiMmJiMGViYzIzMjRmZWZjMDFmYjBhYTk0YzVlNjVkMzExMDZkZjlhYTIwNmNhOTM3MzM0ZDViNGZlMTM5OTFmNiIsInRhZyI6IiJ9', NULL, '2024-06-01 22:23:17', '2024-07-04 09:49:35'),
(77, 'Ab1234##', 'mssanictraders2021@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '100', 'eyJpdiI6IkQ2VDBzcWpJTEh5UXdjYWtleE45QlE9PSIsInZhbHVlIjoiSFFOS0FURlp5T3lka0w2QnFmeW1TUT09IiwibWFjIjoiZWJjYTcxY2Q0ZDAwNTUzMmE1NjcxYzYzYzgwYjFlYmIwZGY4MmEwZDYyMzZmNTk5MWNmZjIyNzFkMWI3OGExYyIsInRhZyI6IiJ9', NULL, '2024-06-02 12:39:39', '2024-07-04 09:49:06'),
(78, 'suvro', 'saikatsarkar1122@gmail.com', NULL, NULL, 0, NULL, 2, '2024-07-11 17:23:54', '2024-08-10 17:23:54', '181', 'eyJpdiI6Ik84d0NHYjFqMVJaemtpQlpzZmFUR2c9PSIsInZhbHVlIjoiT1NHaTFveS81TnlRa00rRlRPSVRIUT09IiwibWFjIjoiYWIzMDNlMTI0YTU0NTJhMzk5YjI4MjUzNmMzNzNkOTdkMDhmOTg4MDI5ZjE3OWVkZjRlOTUxZGNhMzczMGMyOCIsInRhZyI6IiJ9', NULL, '2024-06-02 17:43:26', '2024-07-16 13:55:32'),
(87, 'asis', 'asisr1542@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '17', 'eyJpdiI6ImkxR2UxMkc1RUNVbTNHZzROa1JpcXc9PSIsInZhbHVlIjoiN01zaWUzTlBwRjR6dkdGeG1OWmdIZz09IiwibWFjIjoiOWZjODc3ODMwNjRlNzlmYTZiNThhOGYwMDhiMmFkMmJhMWNkOGI2YmE3ZTE1ZTEwZTNlNDIzMzIyZmUyZDc4MyIsInRhZyI6IiJ9', NULL, '2024-06-03 19:52:37', '2024-07-04 09:48:19'),
(89, 'ABDULLAH AL MAHMUD', 'abdullahalnahmud@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '12', 'eyJpdiI6IjRad3daZlArYi92MEEzcnE2a0R4d2c9PSIsInZhbHVlIjoiWkNnV09NZlJqZzFXL05CUjFOVHFPZz09IiwibWFjIjoiMzg2OWU3NGE2MTcxMDIzMjg5ZDVmMjRhODU4YTFlOGJkYWQ1ZjI3ZGE2MmJmMzQ2MTkxMWQ1NDRkOTc5YTVmZCIsInRhZyI6IiJ9', NULL, '2024-06-04 12:59:36', '2024-07-04 09:47:58'),
(92, 'mahabul', 'mahabulalam71@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '54', 'eyJpdiI6IldKeVlXMTZvZnl2ZFZ3RVRENENWdnc9PSIsInZhbHVlIjoiVmNselFlOHdZL09IRTBVbFpEcHVHQT09IiwibWFjIjoiODUwMDVmNTVlNDg5YTI4MGI3YmJlNDk0NDE0ZjBjNjkyNDBmMDVlNjc4OWZhMjI0ZjljZWY3ZTA3YmZhMzA3MSIsInRhZyI6IiJ9', NULL, '2024-06-05 10:47:36', '2024-07-26 19:52:59'),
(96, 'Osman', 'osman55tjn@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '183', 'eyJpdiI6IkZSdkVpN01hMXNJOTZ0L1pmUCtBMGc9PSIsInZhbHVlIjoiR1JGK1FDbUZLSXpnajJJN3hOdWJBUT09IiwibWFjIjoiZGRiY2I3ODQ1ZTAzZTRiMGY5NWZlODFmODVkYzBkNThhYmU0MGM5ZDUxZDI0YWYzZGE4MzY0OWUyMTQyNmM3MiIsInRhZyI6IiJ9', NULL, '2024-06-05 21:45:36', '2024-07-04 13:59:49'),
(97, 'Mdkayes3859', 'cbmasud1@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '183', 'eyJpdiI6IkFvVzZKaHpzenJWb254WFIrdnZzMmc9PSIsInZhbHVlIjoieTI4dCsvaG9heGpMbEgwY2RCS2V1QT09IiwibWFjIjoiNjM0YTNjOWQxNzU2N2M3Y2UzMDhiYzlhNzhjMmE5MzkzMmMwZjNhN2NhZWU0ZWJlN2U3YmQyYmNhNjRkNzcwOSIsInRhZyI6IiJ9', NULL, '2024-06-06 13:08:28', '2024-07-11 14:11:00'),
(98, 'ncomputer', 'ncomputer74@gmail.com', NULL, NULL, 0, NULL, 2, '2024-07-15 11:13:55', '2024-08-14 11:13:55', '110', 'eyJpdiI6IkY5RWRjRTJITGhXYktlbThSRWZTZGc9PSIsInZhbHVlIjoiTTRYeXRWSmFuWDVQMEhYbVpydC8zdz09IiwibWFjIjoiZmY4MzM1MGIxY2ZiMWI2ZDcxZDM4Yjg2ZDY3YTFmMjhhZjIwMTI0MzRmMzRkNWRmNzNmYTIyMWE5MWUyYzAyNyIsInRhZyI6IiJ9', NULL, '2024-06-06 13:25:34', '2024-07-17 09:26:53'),
(105, 'IQBAL', 'Djlederiqbalbai@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '40', 'eyJpdiI6IkZnRWRIaFUrT3dvU2Z4T3BtSVc0cFE9PSIsInZhbHVlIjoiYnJJekFPb3EwcFRNNmd5Sk1JRDFndz09IiwibWFjIjoiZTYyMDJkMzY1ZDdmYTRjMWNmMjcwZDU3ZjQxYTE1OWU3MjgxZDE1MjEzYzQwN2UzYmNiYWM5ZWU5MjY1MDU2MyIsInRhZyI6IiJ9', NULL, '2024-06-10 20:35:23', '2024-07-04 09:45:52'),
(109, 'Rashel Islam', 'irashel51@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '50', 'eyJpdiI6InBSLzQ1anozakNhVTFycGpIejVrSlE9PSIsInZhbHVlIjoiUG1WcGNxZkpXVWpqLzFOQXNuRU12dz09IiwibWFjIjoiMjYzYWIzMzBhNjNlNjhiMzhlMzExZjMyM2M3NWYyNTFmZjlmOTk2ZjRlYmRiZWFmMGVhZGEwMDI5NjM2YmMwMSIsInRhZyI6IiJ9', NULL, '2024-06-11 13:40:54', '2024-07-08 14:28:49'),
(113, 'madhobpal10', 'madhobpal10@gmail.com', NULL, NULL, 0, NULL, 2, NULL, NULL, '97', 'eyJpdiI6Im9BWnlReVJqa3Frd2NxTGhINy8yalE9PSIsInZhbHVlIjoiRTI0ckJ5K2ErcGNOWnVWeWlRbjNxUT09IiwibWFjIjoiNzk4MDQxYzExYTFkMDYwZDYxNzdkM2MwZWMzYzY2NjliMWZiNWU3MDkxNTI4ZjYwMjdkZWI2MzMzNmRhM2ZjNyIsInRhZyI6IiJ9', NULL, '2024-06-11 17:15:39', '2024-07-30 11:37:03'),
(115, 'sapan', 'sapan.cec@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '97', 'eyJpdiI6IlgrS3dCeFFrNjdvY3VYZW9oYlNVOWc9PSIsInZhbHVlIjoiK3g2S3dqMHBNSkovbnhERVhXZ0JwQT09IiwibWFjIjoiZmNhMGU1MjAwNTQxOGQwNjk0MWM2MTVhZTlmZDg0MDc3ZDcyODExM2RmMzY5M2Q0MzNiNTI3ZWFlN2ZjZTJiMCIsInRhZyI6IiJ9', NULL, '2024-06-12 12:44:54', '2024-07-08 13:49:07'),
(118, 'ariyan', 'ariyanmasum66@gamil.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 'eyJpdiI6InJPWHFMOVRqYzRQVmNuZjJIdDQvZUE9PSIsInZhbHVlIjoiSklKamR5dGxzUU1MdHA0b1JiQ2Y2UT09IiwibWFjIjoiYTVmNjg4YmI3MWYyZDU0MzkzMjVlNTliZjk4NjZlNTU2ZmY1MmZjODhjN2M4MDQ0NzhiZDBjYjNhM2ZmNWRjNyIsInRhZyI6IiJ9', NULL, '2024-06-12 19:07:04', '2024-07-04 09:43:42'),
(119, 'md sohan', 'sohanreal567@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 'eyJpdiI6IndFVGpQNlhieEFrOXZxYVI0Y0lXaEE9PSIsInZhbHVlIjoicmZ3WHR5MjR5b052cFVwYW9oK1ZTZz09IiwibWFjIjoiYzU1ZGZmOWMyNzllZWMwNDhlNmQyMWZmZWQ1ZDM0MjQ5ZmEzOGViZjc1NTQ5ZDkyMmNmZTg0ZWQwZGM4YjFhYyIsInRhZyI6IiJ9', NULL, '2024-06-12 20:55:06', '2024-07-04 09:43:11'),
(121, 'Hridoy Paul', 'paulhridoy861@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '97', 'eyJpdiI6InZrcUVWMmh4M3lqLzI3NkVncjd5L1E9PSIsInZhbHVlIjoiNW9BMnJiM2JpVEZ0bTNFYW5FY1NDdz09IiwibWFjIjoiNjgxNjRhMzNkMDA0ZjgxZjY0ZGU4ZmFjNjBjNzAwN2MxNGE3YTM0YTAxMTkwOGViOTZmNGY2ZDZhMjc4MTJlMSIsInRhZyI6IiJ9', NULL, '2024-06-13 16:11:38', '2024-07-07 12:45:53'),
(122, 'Bashar Sarkar', 'bashardbgramup@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 'eyJpdiI6IkQwa3poV2YxTkRaODJBUGNPSE85Nnc9PSIsInZhbHVlIjoiM2R2cHNETlZ5bm9ONlhsRTRPWk5IQT09IiwibWFjIjoiOGVmMzg3NGUyNDBhMDBhMDQ3NzIyMDhmNDRkYWZjN2IzMjcyN2RmZDkxZTM4NTg3NzViNWRkYjQ5NzRlOTVlMyIsInRhZyI6IiJ9', NULL, '2024-06-13 20:08:46', '2024-07-04 09:34:14'),
(124, 'Ra5252', 'gog41765@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '79', 'eyJpdiI6InFCc095Rlc0SDVrQnhXeUdlWTZqT1E9PSIsInZhbHVlIjoiRDFSMjg3R2JrbDljc2JldFE1YW0vUT09IiwibWFjIjoiNDM2OWU2MDUzZmNhZDc5MDRhM2Y0MTQ1NmI4M2ZiYzg1N2NhMGUzNDI3MzMyZWU1MDcxYWI5YWE2Nzg1Y2QwNyIsInRhZyI6IiJ9', NULL, '2024-06-16 09:58:07', '2024-07-17 21:53:28'),
(126, 'Lalchan Sarker', 'lalchansarker136@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '1', 'eyJpdiI6Ik1VU2hjZWdEVGIrdkc1N1ArZ2Q2U1E9PSIsInZhbHVlIjoieFRKM0U3bzZpSzVPQ1Vzejk1L0xVQT09IiwibWFjIjoiYzA5MzgxZDk0ZjYzN2ZjMmIwNWI3YzMzOTFjMGM4M2E5ZDM5YWNkNjJiNTgzNzlkMTA2YWVmZDdlM2YxNWFjNyIsInRhZyI6IiJ9', NULL, '2024-06-16 18:26:18', '2024-07-28 17:10:53'),
(127, 'Md Asadul Mia', 'asadulgraphic@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '197', 'eyJpdiI6Ik83NHB5c1NhSzRLYkhmZGZjQi9FQnc9PSIsInZhbHVlIjoiWm0wZEw4ME43K0xCYTBJUFpGZnVUb2ZJbWdLZm93eXpkYVpJbW5Wak96MD0iLCJtYWMiOiI1NzA1ZmM4NmM0N2Y4Y2EyZmM2NzJkOTY0Y2Y2NzkyMjNjY2QyNmUzODg1ZjM1ZGZlMWNjOWUzMzhkN2ExOTRhIiwidGFnIjoiIn0=', NULL, '2024-06-19 08:24:25', '2024-07-31 09:49:38'),
(128, 'MOHAMMAD SHAHARAZ', 'shaharaj689@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 'eyJpdiI6IklXK3NPMTZidmt5T3AwYUtrWGxra1E9PSIsInZhbHVlIjoieGVQWkpmajIwTmIrcU9Qdjd0NjhJdz09IiwibWFjIjoiMjk4NGI5ZWFkMmFiOTg5ZDY4MTg3ZTgzYTNiMDk3NjFmMDIzOGI1OTFmYjY3NTIwM2YxMDU0ZDUzNGQwMDk2MCIsInRhZyI6IiJ9', NULL, '2024-06-19 17:51:48', '2024-07-04 09:30:46'),
(129, 'Sayed', 'sheikhulsayed214@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 'eyJpdiI6InYyT05HVkQ4V2tMeUg2VU1rWkJKSXc9PSIsInZhbHVlIjoiZGxWaFFRSHEwaUxhUlBodEZvR0VXUT09IiwibWFjIjoiZGNiZjAxYjRmMzQ3ODI5YzMzNGE3ZTAxZWU1NmM4ZDI3MzdmZTA0Y2QwZWMzZjVjNjM1MTI0YTBhYzUwOTAzMiIsInRhZyI6IiJ9', NULL, '2024-06-20 10:20:21', '2024-07-04 09:30:16'),
(131, 'Elias', 'eliastek297@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 'eyJpdiI6ImlGazJMb2NEUUlvOUtnRDI3SXVIVUE9PSIsInZhbHVlIjoiRFNLTzBZdlZUa1dQNFRHZlUyR05Mdz09IiwibWFjIjoiYzEzNTVkMzJhYTc1N2Q4NWU3NmZhMGYyNGM0ZDUxYjg2OWY5NmNkMjA2YjY2ZjY5YWRmNmZlZGM1MWNiYWY4YyIsInRhZyI6IiJ9', NULL, '2024-06-21 19:01:37', '2024-07-04 09:29:39'),
(132, 'sr', 'sr@gmail.com', NULL, NULL, 1, NULL, 0, NULL, NULL, '0', 'eyJpdiI6IkU4a1ZWTVoyc3JiRksxalkwYVVjMEE9PSIsInZhbHVlIjoiN3BxKzE1VjIzRkozTHZkbWRobEx1UT09IiwibWFjIjoiNmNlZDEyOTUwMGEzNjg3YjM2MzNiZjJmODA4MjJmMjZhMzJhMWNjNzgwNzMwMWQxNDA5OTA0NmE2YzlhYjYyNSIsInRhZyI6IiJ9', NULL, '2024-06-23 10:18:34', '2024-07-01 21:56:25'),
(134, 'mazidhasan12', 'mazidgd12@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '75', 'eyJpdiI6Im1scTd3WThaWDJIMHdjV29Vdkh2a2c9PSIsInZhbHVlIjoiZE9WWEk3RFh6bHV3bEdQMDNKZHM5UT09IiwibWFjIjoiM2QzMmMzZDFmZDFkNjU2ZmMzMWM5Nzc2OTk1NzAwODE2NTZlYTRkNjhkNzA4YjE4NDZmZmZmZDBiNzA1ZDIxZSIsInRhZyI6IiJ9', NULL, '2024-06-23 10:33:43', '2024-07-15 14:30:25'),
(135, 'Abir Hasan', 'abirbd23242526@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '83', 'eyJpdiI6ImYycjYwM1djUDg0SFMrM2MzZTNXa2c9PSIsInZhbHVlIjoiUjdJQ2dCZkI5NlkwT0dDMDNkNFFyZz09IiwibWFjIjoiZDg5NDUzYTU1N2U0ZjM5YzFjMjI1MjFiNjhkNDU0MDliYTBhNWU3YTZlYzY4MTlmNTk1NzVmNjRkNWI1NDg3MyIsInRhZyI6IiJ9', NULL, '2024-06-23 12:14:24', '2024-07-16 15:05:57'),
(137, 'titul4197', 'mdtitulahmed@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 'eyJpdiI6ImNMUDJjemh6ZW4xMWVqZGVqS1prMmc9PSIsInZhbHVlIjoiRkYvYWpoamhjZk80MUF2ckdGWmFudz09IiwibWFjIjoiN2JhYzZiNGE1MDM1YTkwMzQzMWNiNzc1OGQxMzQwNjgyYTkzODNkZWQ5N2JmY2I3ZmQ4MTc3ODU0NmFiYzE5MiIsInRhZyI6IiJ9', NULL, '2024-06-23 23:37:40', '2024-07-04 09:26:22'),
(138, 'HADIUZZAMAN', 'hadiuzzaman286@gmali.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 'eyJpdiI6IkoxalpZeC9oSnYwQW5nbFZ1ZURzNkE9PSIsInZhbHVlIjoiZUo0ZDJKUElZamJXOWxIWlNzMFhuZz09IiwibWFjIjoiMGQ1ZmMxYTc2MjgyMjg2YTE0MDk1MDk5NTI4NTJjMjljM2YxMzMxZDMxMzJlNTZkZGY2MWFmNmYxMzI2Mjg0NSIsInRhZyI6IiJ9', NULL, '2024-06-24 09:52:16', '2024-07-04 09:25:56'),
(140, 'Al5@01325', 'Imd388953@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '164', 'eyJpdiI6IlI2M25HTTVOKzVMcGRDWXpEVGdEL3c9PSIsInZhbHVlIjoielAvb0MyeGhGakFMQ1VUR2RXL3Yxdz09IiwibWFjIjoiOWMyNjU0NGIxNTlkZWFhNWQzMzdjODA5YThmOTk0YzUzZGNjNGM5Nzc2MDM4MmIxMGRiZmM0NDdmOGIwMDBiMiIsInRhZyI6IiJ9', NULL, '2024-06-25 07:18:08', '2024-07-16 15:53:45'),
(141, 'Bala', 'hmbala1144@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '173', 'eyJpdiI6ImlDd3JrSHFvM2EzampLN0ExMHVucEE9PSIsInZhbHVlIjoiWUZ1M2FUR29Hem9lYkpnMlhQNDVjUT09IiwibWFjIjoiNGMxMDdiZTUxZmI5YWVjNWE5MmM1ZTlmNTRmODFiNzVhMWQ0OGM1MGNlOWM5MzA4Yzc3YzU1ZmU3OTFkNDk2YSIsInRhZyI6IiJ9', NULL, '2024-06-26 03:03:20', '2024-07-16 12:49:30'),
(143, 'DG Khulna', 'designghor0@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '33', 'eyJpdiI6Ikt6bm5iM0MvTDFDQkQreVVucnp3WkE9PSIsInZhbHVlIjoidElRUmFrMFQ1WlFyM0V5VkRrZ2RLUT09IiwibWFjIjoiOTE1ZmIzZjBjOTgyYmMxZTA3NzYzYmJiZjIwYjAzZTRmZTZiYTc2YmE3NmJiZmFhMDg1N2VhZDZlNDg0ZTYxYyIsInRhZyI6IiJ9', NULL, '2024-06-26 20:49:38', '2024-07-16 15:16:56'),
(144, 'MD EMRAN', 'hafejemran335@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 'eyJpdiI6IjU0RkFjWllqTHRINnVYWm5BbENmWkE9PSIsInZhbHVlIjoieVkvbG5PdjlDTVZsTnp5SDU0ejl3QT09IiwibWFjIjoiMzU3ZWM5Y2UxNGZkNjExYTBmMjhiZDVkMDAxMWQ0OTUyMWJiMzViNTcwYTlkYjk5MThiY2ZmN2E1NTUyYmYyZSIsInRhZyI6IiJ9', NULL, '2024-06-27 15:15:47', '2024-07-04 09:24:01'),
(145, 'Ananda', 'mdananda4547@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 'eyJpdiI6Ik1VUkJvRmdvTzlSMkRwMmVXQjRETmc9PSIsInZhbHVlIjoiYjJ2WlZnejZTSndsSmJIZUpQUWRMTENhaVIzZE8zbFVNR1hzTWVrRjdFQT0iLCJtYWMiOiJjNDhkZjY0Y2UwNWNiOWU2ODgxYWJmNzAwZWYxZjhlYmI5M2M1ODU2ZDE3MjEzZmYyMGUxZGNiMGM3NTVkMjVkIiwidGFnIjoiIn0=', NULL, '2024-06-27 16:04:46', '2024-07-04 09:23:28'),
(146, 'Shipon Miah', 'mdshiponcp39@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '37', 'eyJpdiI6InpsdklFdjNuYlk2K1dxQUkxTUNTaUE9PSIsInZhbHVlIjoiTWpqVW9TK3pBaEdTK3kwb0ZUUDkzUT09IiwibWFjIjoiOTc0ZjBhMTY5MjM4NzRmYjExNWE0NTI2MzUxNjA5OTVlYWU0ZTViMDcxNDY2N2NiYTI2YTc2Yzc0Y2QzYTk0YiIsInRhZyI6IiJ9', NULL, '2024-06-27 16:56:31', '2024-07-18 10:24:55'),
(147, 'akjahanersofi47@gmail.com', 'akjahanersofi47@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 'eyJpdiI6IjhjbHIvWWRiYlJpem5IVWwrc0ExT1E9PSIsInZhbHVlIjoiOHdvd000YkhVcU5oZ3FxVDY4c2pOUT09IiwibWFjIjoiYThlNzY5OWE3ZGMxYWFmNDdmNDg3OWNlZjVlNWM2OWM2MTA2NTM2NjdmOTI0ZmFhZWViZWUxZTM5NmVmNjE1OCIsInRhZyI6IiJ9', NULL, '2024-06-27 18:26:25', '2024-07-04 09:22:31'),
(149, 'hadijesmin@2002', 'hadiuzzaman286@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '29', 'eyJpdiI6IjZqTFIzSDVuUVMzUnVqdVNnRzdZSHc9PSIsInZhbHVlIjoiME5ld2hFbTYwZ2tROHdHUVcvOHlXZz09IiwibWFjIjoiNDRjZmQzNmJjYTBkOTlkODQ0YjZlNjQ2Yjg5ODZhNjI3Y2ExYzhjYzUzZDZjMGQ5OWYzNzVlZTA1MTQ4NmYyOSIsInRhZyI6IiJ9', NULL, '2024-06-28 21:33:33', '2024-07-16 12:48:05'),
(150, 'Mridha Sumon', 'mridhasumon80@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 'eyJpdiI6IkdEZnRGRVRxNFBJNlRxQUc5cEd1TWc9PSIsInZhbHVlIjoiQUVYMUlEaUMxcTVsTHJLU0lRZGdQUT09IiwibWFjIjoiOTIyMjAxNTgzMDM0MGEzMWU4NTkxMWQ2MjdjMGJlMzljMGY0YTYzNTc4YTQ1YjI3NmE0NTBkY2RhYzRiMDZiNyIsInRhZyI6IiJ9', NULL, '2024-06-29 02:18:14', '2024-07-04 09:20:26'),
(151, 'Hapania', 'hosainj378@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '303', 'eyJpdiI6Ilc2Z0JuT2hudm82TnBMSjRBbnMzdlE9PSIsInZhbHVlIjoiSXlvSTFKclRrVHQwYk9INGhqY3N0Zz09IiwibWFjIjoiOWUxMTdkOWJkMGQ1ZjNjODQxNDA5NmZjNWZlOTZhYjZkNDlkMzgyMTliOGVhZjRmZTRiOTQ2NGNjMzczM2VlOCIsInRhZyI6IiJ9', NULL, '2024-06-29 16:07:50', '2024-08-02 06:55:12'),
(152, 'তালুকদার ট্রেডার্স, লংগদু বাজার, রাঙ্গামাটি', 'ilovemother970@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '55', 'eyJpdiI6Ilc2NDhIL3BjT3A5eFNhTmc2WDNlSkE9PSIsInZhbHVlIjoiYXJKWmdLcTg3aDcxdnVsNnU4MDl6Zz09IiwibWFjIjoiZTdhNTNkYmI3NmU4Y2Q1MGZkZTg3ZmJmZDI1NmJkYzI3YTY1ZTVlOWY5N2VlNWJjNTQ3MWIxZmJkNDBmNDIxNyIsInRhZyI6IiJ9', NULL, '2024-06-29 18:55:34', '2024-08-02 19:27:02'),
(153, 'MuNnA Shoker', 'munnafaruk.Bd@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '29', 'eyJpdiI6IlcwRWRCenU4dTkxTkgzSFU3SVJWT2c9PSIsInZhbHVlIjoicnd0QVlEOUpUa2JVbWg3UndqRjM2UT09IiwibWFjIjoiYmM5ZjMzNTY5NGIxZWU1NmQ3NTNiMDc0MjkyZDM3NDA0MjZlMzllOTQ4NDAyYmE3ODQ0NGU5NGI3YjFmM2I5YSIsInRhZyI6IiJ9', NULL, '2024-06-30 03:44:17', '2024-07-14 12:29:55'),
(156, 'humaun', 'humaunakandha@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '100', 'eyJpdiI6ImZnblkvbEdVcktWaTlUY1lyUXZnbUE9PSIsInZhbHVlIjoienRXTkJZTGROdUowK3RSMXVmWFBsWW5rSkpJblBtK2JhMEliRGVHOFdxcz0iLCJtYWMiOiIyOWQ5NWU4NzBiZWY3MDU5YmU1NDUzYzlkODM0OTE1YzAwNzVhYjJhYzRmNjE4ODk5ODNhNjgxMjMwZTc2YjRiIiwidGFnIjoiIn0=', NULL, '2024-07-01 20:37:22', '2024-07-17 16:06:37'),
(158, 'Rayhan hossen', 'rayhanrs1819@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '175', 'eyJpdiI6ImJaZzFoSjN2L2FjSG1Ua2w5NExDcUE9PSIsInZhbHVlIjoiWHcvZ1c0QUc4QndISExFRnFHSW43QT09IiwibWFjIjoiMDdmOTk3MGZiNjc5NWI0YzVhMjRkYWUyNjQzZjNlZDhkMzU2YmI0NjY5ZTFjZGNhYzY5Y2UxMjEwNWU0OWE0NyIsInRhZyI6IiJ9', NULL, '2024-07-02 13:35:21', '2024-07-16 11:46:02'),
(160, 'faysal', 'faysalhasan7734@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 'eyJpdiI6IjBOdWFkQVhhLzBlOTg1YnowNHNIWFE9PSIsInZhbHVlIjoick9CWGNjektVdGtJTHpWYTNpMStSQT09IiwibWFjIjoiMGFhMDc5ZTY4ZGZkYjgwYmE3OTc3YWU3ZTk2NjhhMzY0ZTIyNDE2N2VkYzQ2YjY2NjVhMDc1NWQwMDk5MGI1YiIsInRhZyI6IiJ9', NULL, '2024-07-03 18:16:45', '2024-07-04 09:16:22'),
(163, 'New', 'new@gmail.com', NULL, NULL, 1, NULL, 0, NULL, NULL, '0', 'eyJpdiI6Imh1RzdiNmRKRlRIWWVybSs2S29GQUE9PSIsInZhbHVlIjoiZS9hQXgyOU5ZbEpQOEplOW5RSWdIUT09IiwibWFjIjoiYTJjZWMzYjdkNDRlY2I1M2NmNmI5YTYxYTNmMWQ5NjMxMTdjNWNlMjVkYjkyNDJkZGVjYmQ4MjlkZjEwMjY0YSIsInRhZyI6IiJ9', NULL, '2024-07-04 00:46:50', '2024-07-04 00:46:50'),
(170, 'NILOY', 'ovimanineel36@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '200', 'eyJpdiI6IkpGT255bkNYL1c0TlNrdnQ5RXJoWXc9PSIsInZhbHVlIjoiNS91blpsVnVPV2xzblNWUUtxbXI4Zz09IiwibWFjIjoiZDJmNjc5NmNiMDNjODI4YzY2MzQzNTFiYzgyMDViYmMwODIwYTNlMWY3ZjQyN2Y3NzQzYzMwMjVjNWQxMjFhOCIsInRhZyI6IiJ9', NULL, '2024-07-04 12:38:27', '2024-07-12 12:39:53'),
(171, 'armanmia@313', 'arman51214313@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '130', 'eyJpdiI6ImNNdGEvd0ZhREg5QThRbjdYdC9PUVE9PSIsInZhbHVlIjoib2U2RUs5RC9wTW9xWkx6S2xZSEw4QT09IiwibWFjIjoiMTM0NmVkZTlmOTliMzgyNDI5MzY3YWE3NWQ2NjA1NWNhMzA4NWIyNjZmZGMzNzdiMGZiNTllNDI4ZjUyMGRlZSIsInRhZyI6IiJ9', NULL, '2024-07-04 15:01:53', '2024-07-16 22:14:21'),
(172, 'SAIF HAMZA SIYAM', 'saifhamzasiyam@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 'eyJpdiI6IkNSbFZVSTl4NUF1VldGZUN0ZHZnbnc9PSIsInZhbHVlIjoia0RlTmhwY0VpdHJ4cDlqbjFzYlhNdz09IiwibWFjIjoiYWRlMmZjNzNjYjY5OTRmNDAzYmNiNzc5OWQ3NzQzYmY0OTk0Y2M1Mjg1OTI1ZTMzMGVmNTMyMWM2NTgzOTc0OCIsInRhZyI6IiJ9', NULL, '2024-07-04 15:36:33', '2024-07-04 15:36:33'),
(173, 'Md Elias', 'hamim.cxb@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '275', 'eyJpdiI6IllDcmRlQUMyNk9JaDV3OEduODV4RFE9PSIsInZhbHVlIjoib0RLQ0dYVFB2MFg3L0Y1SnBGVm1xZz09IiwibWFjIjoiMmJmZGRmZWZjNzdlNjFlZTM2MDA1YzAyOWQyYzU5ZTkxZGUyZTQwZGRmMWY0OGFjMGY2ZWU3ZTlkMjM3YzgzMCIsInRhZyI6IiJ9', NULL, '2024-07-04 22:17:14', '2024-07-15 17:45:32'),
(174, 'moderator', 'moderator@gmail.com', NULL, NULL, 2, NULL, 0, NULL, NULL, '0', 'eyJpdiI6Ik1wZWxyeDZtWjI5RTlCVWh0cVlpL1E9PSIsInZhbHVlIjoiWC9XaldTWVhUZU82R1cxZ01uN01HZz09IiwibWFjIjoiOWE5OThhMGI4NjgzMGQwNDE3NGNhOTUzOWIwNjRlY2I0MmY3YWE5ZGJlNThhYmU5N2JlNzA4MTZlNjFkYjJlYyIsInRhZyI6IiJ9', NULL, '2024-07-06 22:20:27', '2024-07-10 11:46:58'),
(175, 'MD TITUL MOLLA', 'titul4197@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '150', 'eyJpdiI6Ik5PZHVtRVMzbEF3S1VSc3JDSFpHMmc9PSIsInZhbHVlIjoiSW9HMnlFazBGMFR0ajFEVUpyZGE0UT09IiwibWFjIjoiZGRjOWZkYWIwY2ZmNDk1NjllYThiYjgxMDI1OWVlMzllYjk3MTA5YTE5MDM2Nzc3M2Q4NzJkNDZlOTA1ZmRhMyIsInRhZyI6IiJ9', NULL, '2024-07-07 07:46:03', '2024-07-16 12:19:40'),
(176, 'ohedus', 'mds009a@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 'eyJpdiI6InBVajVNRGRHRmhrS2NQNSswc3hrR3c9PSIsInZhbHVlIjoiaUdHSHlJalg4dEdWVVdNMXdWSHBxZz09IiwibWFjIjoiMWQ2ZmRlYTA5ODcxNTdjN2JjZDJlOGU1N2U1MjdkNjkxZTE3M2VmNzk1MGU0OGFlZjliYmFmZTAxNzVlNzkxZiIsInRhZyI6IiJ9', NULL, '2024-07-07 11:48:49', '2024-07-07 11:48:49'),
(177, 'rakanhosen06@gmail.com', 'rakanhosen07@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '175', 'eyJpdiI6IkFsOUdML24yYjBLZjgxNlAvMEpRMXc9PSIsInZhbHVlIjoiS01LVjAyc25zeTRabld3T3QrcXRoTW5VaG9WaUxlOTFWa3ZtcGJnYXZJST0iLCJtYWMiOiIzNDA4MTg4Nzg0ZDNhNjMzNTU1NTdiNzdlNjM4MWQwY2IxMzM5ODk5ZjA5NWIyNmIyOWUzZTczZWEyNjE2NjFjIiwidGFnIjoiIn0=', NULL, '2024-07-07 12:18:57', '2024-07-16 12:57:30'),
(178, 'Md.Mokbul Hossein', 'hossainmokbul113@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 'eyJpdiI6ImlUOGVGRzJFajZNU0d0SjB0MHJDbkE9PSIsInZhbHVlIjoiVDZjY3FBc0FkU1NKdE5DMmU1c2VEZz09IiwibWFjIjoiYTBiNmFiMWZjN2NiMGJkZThhNzNkNWJiMjFjODkzNzcwZWRiODEyNTljZjQ3MmY4MWRiOWYzNjcyNDkxYTA3OCIsInRhZyI6IiJ9', NULL, '2024-07-07 16:50:35', '2024-07-07 16:50:35'),
(180, 'tanvir', 'hossan_45@yahoo.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '10', 'eyJpdiI6IjE5VUV3S1kva1ZtK2d0MVhlQUR1ZFE9PSIsInZhbHVlIjoiNGtabS9QVjNiY0hIVWVEVnRoV1Fxdz09IiwibWFjIjoiNjY4ODVkOTBiZmYzNjQyOTNiNGRmMGZmYWZhYzA0MWIxMWU5MDU3ZWYxYmM3NzlmY2E1ZWNkODU1OTAyMTJlNSIsInRhZyI6IiJ9', NULL, '2024-07-09 21:32:04', '2024-07-16 16:31:29'),
(181, 'Din Mohammad Sharif', 'dinmohammadsharif95@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 'eyJpdiI6IlV4V0d6YlYzaUtOUWZ3bzBqZ0tKenc9PSIsInZhbHVlIjoiK3JMMXduV242aUlhMFkyMTJocTVHUT09IiwibWFjIjoiYzhlYThmOTk1ODE0YmI3YWIyOWQzNDQ4NzlhNjliMzRjN2UxMGRiMGUwY2UzNTZmY2M4NTk3MDFiMTcwMDI4ZiIsInRhZyI6IiJ9', NULL, '2024-07-10 12:45:59', '2024-07-10 12:45:59'),
(182, 'mdshakilkhanbd66', 'mdshakilkhanbd7538@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '175', 'eyJpdiI6IllRMklzdm9KdVNuc2hnejlUUGFQdUE9PSIsInZhbHVlIjoiT0poa1pLQlFJcUpHaU5mMWhlOG4xQT09IiwibWFjIjoiMjhmM2ExOGVhZWNiOWE5Nzc3ZDYyMDAxZWFmM2MzODhlZmUzYjA1ZjA5ZDlhNGVlOWFmNDZkOTE5ZmMyMWFlZiIsInRhZyI6IiJ9', NULL, '2024-07-10 15:05:10', '2024-07-15 16:29:33'),
(183, 'Ariyan Rakib', 'mdrakibhossain50@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 'eyJpdiI6InJ6UGpXT3RCSm9pMHhjY1NaWlpWcGc9PSIsInZhbHVlIjoiMC9CdXE3U1BhUG1ZNm5SSy9CaitkUT09IiwibWFjIjoiZjk2YzQyZjE4NWJiNWI1MWE4ZjA1OTNjNDg5ZGI4MDgyOGEwN2E5ZjM1YzE0ZDY1Y2YzMjI0ZmViMWFlOWZiMCIsInRhZyI6IiJ9', NULL, '2024-07-10 19:00:28', '2024-07-10 19:00:28'),
(185, 'Jouel', 'jouelrana12@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 'eyJpdiI6IjVGbE1mWDV6aklQdjZTYWM1VjZCeWc9PSIsInZhbHVlIjoiZytwS1djck9JRmFTLzdPK3dFMThVQT09IiwibWFjIjoiM2JkNDNjN2E4ZDY3ZDEwNmFmODQ1ZWNjMWIwZDVkNGVlZGY4ZTFkNjQ5NjA5Zjg0M2E3YTljNDc3YmIyNjI5ZSIsInRhZyI6IiJ9', NULL, '2024-07-12 22:27:40', '2024-07-12 22:27:40'),
(186, 'pretom', 'taslimul_islam@yahoo.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 'eyJpdiI6IlRqaVNDVXFZeVdGdEtuMngvbkg5VEE9PSIsInZhbHVlIjoibzVnZnNQc0NCSEQvczRrRmJ6RW5XUT09IiwibWFjIjoiOWFmOTE1ODU0MGU0ODgxOGM2ODUxNmIyM2UyMDllNTkzMTIzYjhmZTdhZjA5YThmMTQzMDMwYjc1N2NlZWY1NSIsInRhZyI6IiJ9', NULL, '2024-07-13 18:06:15', '2024-07-13 18:06:15'),
(187, 'MD ASHIK', 'ashikmahmud297@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 'eyJpdiI6Ijc2dlBOV1V4aDcxMzQxRHljd2hzZXc9PSIsInZhbHVlIjoiZ284VHhncWRmbnd5Sk12TXVuRjJLZz09IiwibWFjIjoiYTZkNWY4MWU4ZTA0MTE2OGI0YjFlMzQwZGE5NjVlMzU1ODhlZThhOWUwMjExYWM0MWZjZWIyYjRmNGE5NDAwOCIsInRhZyI6IiJ9', NULL, '2024-07-13 20:01:11', '2024-07-13 20:01:11'),
(188, 'MOHAMMAD SHAHARAZ', 'mvaiii592@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 'eyJpdiI6IkJ4Q3NaRXlnb1BwVnRnWnNPay9ZT1E9PSIsInZhbHVlIjoiRGZmNGF2LzZIaXpjSWFzMFdTaVpndz09IiwibWFjIjoiNDVkNDQyZTczY2YyZjRmZTFjMmQxNzRkZGNiZmM4ZWQ0ZThlZmVkZmQ1ZmFhMzlhOTdkOWY4N2VhZjRmNDZiMyIsInRhZyI6IiJ9', NULL, '2024-07-14 12:54:07', '2024-07-14 12:54:07'),
(189, 'Md. Sohel', 'mdsohelpersonal2@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 'eyJpdiI6Ik1wVmhiN2dmazZZT1IwbHlTczNzdUE9PSIsInZhbHVlIjoiNHNwWWs3bVg5WU0zUFBtNHlvRCsyZz09IiwibWFjIjoiNTExMTcyYzU4YTEwMjcxZDJiNjNiMDdjMjNkNmVlMWQ3NTk1NzljODE0N2JjM2QzYmZmYTgzM2ZkZDQzMGQxNyIsInRhZyI6IiJ9', NULL, '2024-07-14 14:08:03', '2024-07-14 14:08:03'),
(190, 'Md Hasan', 'admin@gmail.com', NULL, NULL, 2, NULL, 0, NULL, NULL, '0', 'eyJpdiI6IlNML1ltZ2ZGYjJydkx6OUpPYkl4UkE9PSIsInZhbHVlIjoia2haNjRSSVQwaDNBTzdRRXIra29MQT09IiwibWFjIjoiOWI0MGVhMmViMjE3YTdkYzk0YjdhYWFjYmI2YWY4MzIzYThlODFmMDFhOWRmNWQyZDg5YjUwYmU0OWVkNDU1MiIsInRhZyI6IiJ9', NULL, '2024-07-15 18:48:03', '2024-07-15 20:07:52'),
(191, 'arif8880', 'helplessperson8880@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 'eyJpdiI6IjZVU2NKNEhrVGF4dURYYldKOExJTkE9PSIsInZhbHVlIjoiTjdxeXRFZzVtTmtWUjIyRkw1RUF4dz09IiwibWFjIjoiNzVhMDlhM2VlNzAwYzg3YWRlNjQ0NjFmZTI3N2VlNTZkZWZjZmU2NDdkM2Q0NjQyMDNmMmQ3NjliMWRiOTgzMyIsInRhZyI6IiJ9', NULL, '2024-07-15 20:12:33', '2024-07-15 20:12:33'),
(192, 'Md Mostafa Kamal', 'mkmostafaudc@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 'eyJpdiI6Ikx4cEIvOS9JWWxieksxb2k1Tm8vbnc9PSIsInZhbHVlIjoiSWg1M3IvS0IyL3A4MDErWnpmdVVlZz09IiwibWFjIjoiMDdhOGU4YTViMDYwZGNhNTVlZTM1MWVmNDcyZTc5NDU2ZTAyODlhODU5Y2MwYzc5YWFhZjk5ZjRmNGJjODA2NSIsInRhZyI6IiJ9', NULL, '2024-07-15 20:15:21', '2024-07-15 20:15:21'),
(193, 'Kaosar', 'mdkaosar63@yahoo.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '150', 'eyJpdiI6Ik9wQXZub1R2THpUWVFpZ0wrWXB0K1E9PSIsInZhbHVlIjoiOENWaCtrais0bnZrNi9WeGNTK0liZz09IiwibWFjIjoiMTFjNzQ2MTljODBjMzgzYTE0OTlmMjRlZmFlYjlkZGViMzg0NWJkMWMxNjAyZTYwMTUwMmUxMmU2M2Y4N2Y1ZiIsInRhZyI6IiJ9', NULL, '2024-07-15 20:36:00', '2024-07-16 12:58:16'),
(194, 'wadud', 'wadud123biplob@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '275', 'eyJpdiI6IjFrUzR4VndOV2xYYlJEVlA2M005OUE9PSIsInZhbHVlIjoiSDhxclM0T1hHelBlY3NtYWZjN3BJZz09IiwibWFjIjoiNzI0Yjk1MmRhZTRlNzY4Y2ZhMWI3OTRlMzc1NGMyZTNjMjcwYmQyNDRhMjE1NjljY2U1NmM0ODBkYmVlZjI2NCIsInRhZyI6IiJ9', NULL, '2024-07-16 13:14:48', '2024-07-16 13:27:02'),
(195, 'eashah', 'eashak.bd84@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 'eyJpdiI6IndhSUNxSU9ya1ltdnUrLzlOWHZpYWc9PSIsInZhbHVlIjoiaElWM25RNUJGVzFvWXYxN3dsN2JMdz09IiwibWFjIjoiYzdjNTQ5ZGJlNGM1N2Y0Y2ZhYmYxMmQ0NTY0OTI3ZDgzZTFmMjE5NDJjNmY4MGUxZTQ4ODVjN2ZiZDA0NThiOSIsInRhZyI6IiJ9', NULL, '2024-07-16 13:28:08', '2024-07-16 13:28:08'),
(196, 'MD.RAKIB HOSEN', 'hosenmdrakib723@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '150', 'eyJpdiI6IlM3RHdUL0dqWlhIbGpoUEEzOFNQVGc9PSIsInZhbHVlIjoiMXJWNUFuOUpwU0IrbDJtTHRtQnZUZz09IiwibWFjIjoiYTU3OTBhMjc4NzNmNjNiNGUyZTFiNWViNmRkNGIzMjRhNjBjOTYwYTFiOWFkYTZmMjEwZWI3YTJkNzQ5MDIwNCIsInRhZyI6IiJ9', NULL, '2024-07-16 14:39:28', '2024-07-16 15:25:10'),
(197, 'Subel', 'thephenomenon910@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 'eyJpdiI6Im5ET0N5eGVRTGs3SEllRm9CaThMY3c9PSIsInZhbHVlIjoiM0dlRFlKV1M4ankzMjVCa0d4a0N0UT09IiwibWFjIjoiOGJiYTkyMWU0YmFkZTVkN2E5OGNiZDEyZWUyYTg5M2ZkZDk4YTM0ZWZjZGQ2M2I2YzdjMGEzNWMwYTk3YjAxZCIsInRhZyI6IiJ9', NULL, '2024-07-17 17:30:18', '2024-07-17 17:30:18'),
(198, 'rubel', 'khstudiobd@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 'eyJpdiI6IkhDT2xES29sQWJ3eDVoWnRYNGlyZ0E9PSIsInZhbHVlIjoibCtvcUk0QktZeCtBemdzV25NYW1xQT09IiwibWFjIjoiMzA2NmZjMmRmYWFkNjMwMTAwMzRhMjVhMjFjZTI0Y2ZkNGVkOGY2OWU5ZjNiZjljNmMwZDc5YWIyNDQ1YzI2NiIsInRhZyI6IiJ9', NULL, '2024-07-17 22:02:09', '2024-07-17 22:02:09'),
(199, 'Tek Cox', 'cxbfaisal@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 'eyJpdiI6IjRmNGRaSlBCdFd1QnREVlhVZ01VUkE9PSIsInZhbHVlIjoidzg0WlA4czMvRWxuaW9DNTJUd3JwZz09IiwibWFjIjoiOWVlNTE3ZmQzOGQwMGNjNGI4ZmU1ZWU3ZjU1Nzk3YmU3NDNlZTk0NjRmZjA1M2QzNGU0OWU3ZDg1NmRkNDBkZiIsInRhZyI6IiJ9', NULL, '2024-07-17 22:26:58', '2024-07-17 22:26:58'),
(200, 'RAKIBUL ISLAM', 'rakibulislam9253@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '200', 'eyJpdiI6IkJkNFp2SUpISTVtSk10czhvQmpPRGc9PSIsInZhbHVlIjoidmZzNnRWYy91Qy9mWjVQTlpEcDJpdz09IiwibWFjIjoiNDNlNDNhOTY5N2U4MzQ0ZDcwOTJhYTVmYzJjNzJhNzYyZGYzZDljMWE2ZjljZmMzMTRjNDExZDY4N2RlMThjMSIsInRhZyI6IiJ9', NULL, '2024-07-18 12:13:35', '2024-07-18 16:05:38'),
(201, 'mani', 'mani609170@gmail.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '0', 'eyJpdiI6Ik1HZW9XcmtOTE5PRmZBZzdsUmVvNmc9PSIsInZhbHVlIjoiaE1tbTBvMy9pYmVNUlYxMFlDMzlUUT09IiwibWFjIjoiMWNmYTFhMGM1MmQ1MTg3NGZkODMzNDc3MTlmNTdlNTZkNmRlOGZmNGE1ODRiM2JiNWUzNmJjOWZkZjU2ZTA1OSIsInRhZyI6IiJ9', NULL, '2024-07-24 19:34:17', '2024-07-24 19:34:17'),
(202, 'Tanveer', 'hossan_rana@yahoo.com', NULL, NULL, 0, NULL, 0, NULL, NULL, '200', 'eyJpdiI6IkF6SjRIVkkyV0J4Um41N0pVSTZPZnc9PSIsInZhbHVlIjoiS1NwMnp3N1BGWGRTU21reTVGZGY3QT09IiwibWFjIjoiNzY4OGI4ZWViZDBhMjE2MzYxOWI4MzAxOWRkNzVjYmE1N2VkOTg2ZGFhMTg3MDQwYzQ3NDc3MDU3NmRkOWEwMiIsInRhZyI6IiJ9', NULL, '2024-07-27 17:18:41', '2024-07-28 13:06:11');

-- --------------------------------------------------------

--
-- Table structure for table `user_notifications`
--

CREATE TABLE `user_notifications` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `order_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `msg` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_notifications`
--

INSERT INTO `user_notifications` (`id`, `user_id`, `order_type`, `msg`, `created_at`, `updated_at`) VALUES
(19, 170, NULL, 'Id Card Order Refunded.Please Reload.', '2024-07-12 12:39:53', '2024-07-12 12:39:53'),
(20, 73, NULL, 'Id Card Uploaded.Please Reload.', '2024-07-15 19:01:47', '2024-07-15 19:01:47'),
(21, 73, NULL, 'Id Card Order Refunded.Please Reload.', '2024-07-15 19:02:34', '2024-07-15 19:02:34'),
(22, 73, NULL, 'Id Card Order Refunded.Please Reload.', '2024-07-15 19:03:41', '2024-07-15 19:03:41');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `video` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
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
  `button_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `video_links`
--

INSERT INTO `video_links` (`id`, `button_name`, `link`, `status`, `created_at`, `updated_at`) VALUES
(1, 'রিচার্জ করার নিয়ম', 'https://drive.google.com/file/d/1-oMvpGT3bUwxqG12oRVSBP7afLD-_gLo/view?usp=drive_link', NULL, '2024-06-22 23:08:05', '2024-06-23 19:20:51');

-- --------------------------------------------------------

--
-- Table structure for table `website_links`
--

CREATE TABLE `website_links` (
  `id` bigint UNSIGNED NOT NULL,
  `bkash` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nagad` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bkash_type` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `nagad_type` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `whatsapp_group_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

INSERT INTO `website_links` (`id`, `bkash`, `nagad`, `bkash_type`, `nagad_type`, `whatsapp_group_link`, `email`, `facebook`, `instagram`, `linkedIn`, `twitter`, `youtube`, `number`, `address`, `map_link`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, 'https://chat.whatsapp.com/L4qUxWNwM9NL8vodc4TNXN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-01 02:07:30', '2024-07-05 20:38:03');

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
-- AUTO_INCREMENT for table `hide_unhides`
--
ALTER TABLE `hide_unhides`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `id_card_orders`
--
ALTER TABLE `id_card_orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

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
-- AUTO_INCREMENT for table `nid_makes`
--
ALTER TABLE `nid_makes`
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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT for table `user_notifications`
--
ALTER TABLE `user_notifications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
-- Constraints for table `user_notifications`
--
ALTER TABLE `user_notifications`
  ADD CONSTRAINT `user_notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

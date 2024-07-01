-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 21, 2024 at 10:21 AM
-- Server version: 8.0.36
-- PHP Version: 8.1.27

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
(1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 0, 1, '2024-06-09 01:42:23', '2024-06-14 23:50:16');

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
(1, 'প্রতি সাইন কপি রেট ২০ টাকা।', '20', 'প্রতি সার্ভার কপি রেট ২০টাকা।', '20', 'প্রতি NID Copy রেট ১০০ টাকা।', '100', NULL, NULL, 'প্রতি NID CARD মেক ৫ টাকা', '5', 'প্রতি মেক ৫ টাকা', '5', 'প্রতি নিবন্ধন তৈরিতে খরচ হবে ২০ টাকা', '20', 'প্রতি কপির মূল্য ২১ টাকা', '21', 'প্রতি মেক ১০ টাকা', 10, 'সর্বনিম্ন রিচার্জ 200 টাকা।', 200, '2024-05-01 02:17:55', '2024-06-16 17:18:35', 'প্রতি সাইন কপি রেট ১৭০ টাকা।', '170', 'প্রতি সার্ভার কপি রেট ১৭০ টাকা।', '170', 'প্রতি NID Copy রেট ২৯০ টাকা।', '290', NULL, NULL, 'Premium Member প্রতি মেক ২ টাকা', '2', 'Premium Member প্রতি মেক ২ টাকা', '2', 'প্রতি নিবন্ধন তৈরিতে খরচ হবে ১০ টাকা', '10', 'প্রতি কপির মূল্য ১০ টাকা', '10', 'প্রতি মেক ৫ টাকা', '5');

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
(1, 32, 1, 1, 1, 1, 0, 1, 0, 0, 0, 1, 0, 1, 0, 0, '2024-06-08 23:47:07', '2024-06-16 16:08:43'),
(33, 102, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-09 15:19:52', '2024-06-09 15:19:52');

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
  `dashboard` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `sign_copy`, `server_copy`, `id_card`, `biometric`, `new_nid`, `old_nid`, `birth`, `server_unofficial`, `sign_to_server`, `recharge`, `dashboard`, `created_at`, `updated_at`) VALUES
(1, 'সাইন কপি ইনশাআল্লাহ্ আগামী মাস থেকে চালু হবে/ আমাদের সাথে থাকার জন্য ধন্যবাদ', 'আপাতত সার্ভার কপি বন্ধ (সার্ভার কপি আনঅফিসিয়াল অপশন ব্যবহার করুন) ♥ ধন্যবাদ ♥', 'ইনশাআল্লাহ্ আগামী মাস থেকে চালু হবে/ আমাদের সাথে থাকার জন্য ধন্যবাদ', 'ইনশাআল্লাহ্ আগামী মাস থেকে চালু হবে/ আমাদের সাথে থাকার জন্য ধন্যবাদ', 'NID Make রাত/দিন ২৪ ঘণ্টা চালু ♥ ধন্যবাদ ♥', 'NID Make রাত/দিন ২৪ ঘণ্টা চালু ♥ ধন্যবাদ ♥', 'জন্ম নিবন্ধন নতুন ভার্সন pdf তৈরি করতে পারবেন  ♥ ধন্যবাদ ♥', 'সার্ভার চালু ♥', 'সাইন কপি থেকে সার্ভার কপি তৈরি । ♥ ধন্যবাদ ♥', 'অটোমেটিক রিচার্জ করুন, আপনার একাউন্টে টাকা অটোমেটিক এড হয়ে যাবে  ♥ ধন্যবাদ ♥', 'রিচার্জ করে আপনার একাউন্ট সচল রাখুন।', '2024-05-01 01:43:28', '2024-06-21 08:31:58');

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
  `notice` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `submit` int DEFAULT '0',
  `details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `premia`
--

INSERT INTO `premia` (`id`, `price`, `notice`, `message`, `submit`, `details`, `created_at`, `updated_at`) VALUES
(1, '300', 'আমরা ২০ জন প্রিমিয়াম মেম্বার নিব, দ্রুত আপনি প্রিমিয়াম মেম্বার হয়ে যান। পরে সুযোগ পাবেন না।', 'আপনার একাউন্ট থেকে ৩০০ টাকা কর্তন করা হবে', 1, '<h3><strong>প্রিমিয়ারম মেম্বারসীপ</strong></h3><p><strong>-----------------------------------</strong></p><h4><strong>শর্তাবলী-</strong></h4><p><strong>১। প্রিমিয়াম মেম্বারসীপের আবেদন করার জন্য আপনার একাউন্টে ৩০০ টাকা থাকতে হবে।</strong><br><strong>২। একটি নিদিষ্ট পরিমান টাকা আপনার একাউন্ট থেকে কেটে নেয়া হবে।</strong><br><strong>৩। প্রিমিয়াম মেম্বারসীপ প্রতি দুই মাস অন্তর অন্তর রেন্যু করাতে হবে। রেন্যু ফি ২০০ টাকা।</strong></p><h4><strong>যেসব সুযোগ সুবিদা পাবেন-</strong></h4><p><strong>১। প্রতি সার্ভার কপি মূল্য হবে ১০ টাকা।</strong><br><strong>২। NID Card/Sign Copy/ Official Server Copy সর্বোচ্চ কম মূল্যে প্রদান।</strong><br><strong>৩। সর্বক্ষেত্রে VIP সুযোগ সুবিধা পাবেন।</strong></p>', '2024-06-01 06:29:24', '2024-06-16 09:25:01');

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
(113, '127', 'Bkash Gateway', '01795107916', 'BFL8G13M2O', '200', 1, '2024-06-21 10:59:23', '2024-06-21 10:59:23');

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
(1, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, '2024-05-01 04:00:33', '2024-06-15 08:51:49');

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
  `balance` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `image`, `email_verified_at`, `is_admin`, `details`, `premium`, `balance`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(13, 'Admin', 'admin@admin.com', 'user/user-1883643859.jpg', NULL, 1, '<h4><strong>হ্যালো মেম্বারস</strong></h4><p>আমি এই ওয়েবসাইটের অ্যাডমিন আপনাদের উদ্দেশ্য করে কিছু কথা বলছি।</p><p>আমি আপনাদের মধ্যে যে সাইটটি নিয়ে এসেছি, এর মাধ্যমে আপনারা NID CARD/সাইন কপি/সার্ভার কপি থেকে শুরু করে আন-অফিসিয়াল সার্ভার কপি ডাউনলোড করতে পারবেন।</p><p>আপনার নিজের নিরাপত্তা ও সকলের নিরাপত্তার স্বার্থে &nbsp;Website এর লিংক অন্য কারো সাথে শেয়ার করা থেকে বিরত থাকুন। যদি কারো সাথে Website এর লিংক শেয়ার অথবা টাকার বিনিময়ে বিক্রি করেন তবে আপনার বিরুদ্ধে যথাযথ ব্যবস্থা গ্রহন করা হবে।</p><h4><strong>হ্যালো মেম্বারস</strong></h4><p>আপনারা কখনো অপ্রয়োজনে আমাকে ইনবক্সে মেসেজ করবেন না। সর্বদা নোটিশ ফলো করবেন, নোটিশে যা লেখা থাকবে তাই কার্যকর হবে। অনেক সময় সার্ভার কপি ডাউনলোড না হলে ২/৩ টা বাহির করার চেষ্টা করুন, যদি তারপরেও ডাউনলোড না হয়, এবং নোটিশে “সার্ভার কপি চালু” লেখা থাকে, তবে অ্যাডমিনকে মেসেজের মাধ্যমে অবগত করুন।</p><p>সবাইকে ধন্যবাদ</p>', 0, '0', 'eyJpdiI6IkY2V0hUU3l2VlZOeGtieVFVc0gyN1E9PSIsInZhbHVlIjoiNkhGUjltS3VtU2Z1YloxYnN4cGZBdz09IiwibWFjIjoiYTQyZWY5MDZkYjNiYzM5MzE1Y2Q2MDM5YTAyMzFjZTNkYTY4NGVmOThkMDExMGY5ODUxOGRhMDM4MzZmN2FmZiIsInRhZyI6IiJ9', NULL, '2023-06-08 05:32:42', '2024-06-15 08:42:18'),
(32, 'moderator', 'moderator@gmail.com', NULL, NULL, 2, NULL, 0, '0', 'eyJpdiI6Ik4zb3ZMZEVvZ3Q5STJGYVVvUlhrRlE9PSIsInZhbHVlIjoibksxZE43UHpsYnkvSGgxTU95TXlTdz09IiwibWFjIjoiMDEyNGE1MjAzMGI1OWNkZjFhNWI1OWE1ZDY2MDc2ZmM4NDRhMjZjMGEyOGFlNDNkZDczODA2M2JmOWM2NGY4NCIsInRhZyI6IiJ9', NULL, '2024-05-19 12:41:02', '2024-06-15 08:52:53'),
(33, '@Rifatmiah7770', 'muhammadrifat7770@gmail.com', NULL, NULL, 0, NULL, 0, '5', 'eyJpdiI6IjRoanlFQyt5TjNEaEFYbnFhTWN3Rnc9PSIsInZhbHVlIjoiZDlkcDhGUFZsZ2JTbzNsL2tOb2FGQT09IiwibWFjIjoiNTRlZTBlNDViMTUxNTE2YWM5YTEyYmZmMTc0MmI5ZWVlNjc1Y2E0ZjMxMTZkOWE3MjBjM2I0NzVlNmM2M2Y2MiIsInRhZyI6IiJ9', NULL, '2024-05-19 12:57:00', '2024-06-09 10:56:48'),
(42, 'KhalidHasan', 'sssagor299@gmail.com', NULL, NULL, 0, NULL, 2, '10', 'eyJpdiI6ImhIM3lYZkdiZ2RYVE1OOE13czdOa0E9PSIsInZhbHVlIjoibjdSY1ZFQTNOd0s1QVE0b3BXcTZjUT09IiwibWFjIjoiNzc1MzdiOWQ1ZmFkMDUwMTA0ZTc3NWVmNmE4NjBmMDNmMzQ0ODRmMDdlZDRhOGJjODA1ZjQ4MmM3YTRhN2Q3OCIsInRhZyI6IiJ9', NULL, '2024-05-20 07:06:18', '2024-06-19 10:48:12'),
(43, 'MD. RASEL MIA', 'Vaihot81@gmail.com', NULL, NULL, 0, NULL, 0, '101', 'eyJpdiI6IlNQQURMY3daSTVTNXpxTmhzVkJyekE9PSIsInZhbHVlIjoiTjZpS1VZaGk2KzBwOC93NHB5STVxUT09IiwibWFjIjoiMmJlNWRmMjhjMWUyYzdmYjgxNjYyN2VjODAzYzZkZGE3MjQ5NzQ1ZWYyMjUyZTJhYzE5ZDYxYWM0NDJlZTRkZCIsInRhZyI6IiJ9', NULL, '2024-05-20 07:41:40', '2024-06-13 15:15:14'),
(44, 'Admin', 'bismillacomputer.kha30@gmail.com', NULL, NULL, 0, NULL, 0, '179', 'eyJpdiI6Ii9KMDYyUm92NFFYaHdYODJVZG1qMlE9PSIsInZhbHVlIjoiSW1pNjNZM2tEM3dERDgwU09qaHd4Zz09IiwibWFjIjoiMzAzODJjNTdhMmMyYmI2YTE2Njk4ODcyOTdmYmU4OTg3YTEyOTc4ZWZlOGE3MmY5NDk5YTg2YTQ3ODg3MWQ4NCIsInRhZyI6IiJ9', NULL, '2024-05-20 07:53:39', '2024-06-21 11:01:46'),
(51, 'SHIHAB', 'nahiyanshihab201@gmail.com', NULL, NULL, 0, NULL, 0, '34', 'eyJpdiI6IjRoanlFQyt5TjNEaEFYbnFhTWN3Rnc9PSIsInZhbHVlIjoiZDlkcDhGUFZsZ2JTbzNsL2tOb2FGQT09IiwibWFjIjoiNTRlZTBlNDViMTUxNTE2YWM5YTEyYmZmMTc0MmI5ZWVlNjc1Y2E0ZjMxMTZkOWE3MjBjM2I0NzVlNmM2M2Y2MiIsInRhZyI6IiJ9', NULL, '2024-05-22 12:02:24', '2024-06-12 15:55:45'),
(57, 'JAKIR HOSSAIN', 'Mdjakirhossaim3@gmail.com', NULL, NULL, 0, NULL, 0, '324', 'eyJpdiI6IjRoanlFQyt5TjNEaEFYbnFhTWN3Rnc9PSIsInZhbHVlIjoiZDlkcDhGUFZsZ2JTbzNsL2tOb2FGQT09IiwibWFjIjoiNTRlZTBlNDViMTUxNTE2YWM5YTEyYmZmMTc0MmI5ZWVlNjc1Y2E0ZjMxMTZkOWE3MjBjM2I0NzVlNmM2M2Y2MiIsInRhZyI6IiJ9', NULL, '2024-05-23 10:52:09', '2024-06-12 14:03:44'),
(63, 'rajuahmed', 'rajuahmed3718@gmail.com', NULL, NULL, 0, NULL, 0, '119', 'eyJpdiI6IjRoanlFQyt5TjNEaEFYbnFhTWN3Rnc9PSIsInZhbHVlIjoiZDlkcDhGUFZsZ2JTbzNsL2tOb2FGQT09IiwibWFjIjoiNTRlZTBlNDViMTUxNTE2YWM5YTEyYmZmMTc0MmI5ZWVlNjc1Y2E0ZjMxMTZkOWE3MjBjM2I0NzVlNmM2M2Y2MiIsInRhZyI6IiJ9', NULL, '2024-05-26 09:59:00', '2024-06-13 13:49:28'),
(64, 'minhajulnizam74', 'minhajulnizam74@gmail.com', NULL, NULL, 0, NULL, 0, '119', 'eyJpdiI6IjRoanlFQyt5TjNEaEFYbnFhTWN3Rnc9PSIsInZhbHVlIjoiZDlkcDhGUFZsZ2JTbzNsL2tOb2FGQT09IiwibWFjIjoiNTRlZTBlNDViMTUxNTE2YWM5YTEyYmZmMTc0MmI5ZWVlNjc1Y2E0ZjMxMTZkOWE3MjBjM2I0NzVlNmM2M2Y2MiIsInRhZyI6IiJ9', NULL, '2024-05-26 11:06:27', '2024-06-09 12:55:59'),
(66, 'S.M SOJIB', 'sojibgazi21@gmail.com', NULL, NULL, 0, NULL, 0, '168', 'eyJpdiI6ImJFM05jT2FPaGJzdTNDTm1vZE04TXc9PSIsInZhbHVlIjoiNHJ3dWF6Mk9UVEFFRGNNemxaZ1lBUT09IiwibWFjIjoiYTgwNzkyZWYwZDUwNmJlZWEzNWFhZDhhZTBiOWMyY2U4ZDZjNjJiM2ZjZGI4YWY5MDZlZTVmZWQ5YzEzYjE0MCIsInRhZyI6IiJ9', NULL, '2024-05-26 17:50:37', '2024-06-13 15:57:11'),
(67, 'Md Abu Faisal', 'faislcxb@gmail.com', NULL, NULL, 0, NULL, 0, '309', 'eyJpdiI6Im5aKzlSaEpHT0dKTk9vR2dMNTZ3aWc9PSIsInZhbHVlIjoiMnZQenBaK3hRV2ZRV2w0dzFudURlZz09IiwibWFjIjoiY2JkMTJjYjU2MDY5NGE2Y2U1ZTBiZDczNWJiZmQ0ZjQ5NDJkMDljOTc0Yjk5YmE3OWU5NmQ1NjdhZGIwZjY3ZiIsInRhZyI6IiJ9', NULL, '2024-05-26 23:37:46', '2024-06-13 12:04:51'),
(68, 'Faharul', 'faharul.fcs@gmail.com', NULL, NULL, 0, NULL, 0, '148', 'eyJpdiI6Ii8rTFZ3VUV4eFBBdEJDWnpabktEQ2c9PSIsInZhbHVlIjoiWDVrY2ZUOVdhd0pRR1N5VmJBY0YxUT09IiwibWFjIjoiOWU3MTE1MmIwY2Y0NjFmYjg0YTY0YjUxNDZiZDM0M2IwMGM3Mjk3ZDk5MWQ5OWZjMzEzMDdhYjc5MmJjNzJjZSIsInRhZyI6IiJ9', NULL, '2024-05-27 12:00:05', '2024-06-12 11:05:15'),
(69, 'ahsan.msi', 'dhaka.msi@gmail.com', NULL, NULL, 0, NULL, 0, '19', 'eyJpdiI6IjRoanlFQyt5TjNEaEFYbnFhTWN3Rnc9PSIsInZhbHVlIjoiZDlkcDhGUFZsZ2JTbzNsL2tOb2FGQT09IiwibWFjIjoiNTRlZTBlNDViMTUxNTE2YWM5YTEyYmZmMTc0MmI5ZWVlNjc1Y2E0ZjMxMTZkOWE3MjBjM2I0NzVlNmM2M2Y2MiIsInRhZyI6IiJ9', NULL, '2024-05-29 09:58:06', '2024-06-08 14:06:19'),
(71, 'hasanupbd@gmail.com', 'hasanupbd@gmail.com', NULL, NULL, 0, NULL, 2, '86', 'eyJpdiI6IjRoanlFQyt5TjNEaEFYbnFhTWN3Rnc9PSIsInZhbHVlIjoiZDlkcDhGUFZsZ2JTbzNsL2tOb2FGQT09IiwibWFjIjoiNTRlZTBlNDViMTUxNTE2YWM5YTEyYmZmMTc0MmI5ZWVlNjc1Y2E0ZjMxMTZkOWE3MjBjM2I0NzVlNmM2M2Y2MiIsInRhZyI6IiJ9', NULL, '2024-05-29 13:09:35', '2024-06-11 14:21:32'),
(73, 'Rubel Sikder', 'premium@gmail.com', NULL, NULL, 0, NULL, 2, '1000', 'eyJpdiI6IklhYytqSnQxbWZXaGlSNlZJS1NYWUE9PSIsInZhbHVlIjoiWnFHVlFZbjU0dmVWdXRoMS9Pa1Evdz09IiwibWFjIjoiODczMjU1ZjViMmFiNjAyY2VkNmI1YmQ2NGI3MWRlZGU4M2MwOTZmMjA3MTI1NzUyODg4YjIzNWQ2M2E5YWYwMCIsInRhZyI6IiJ9', NULL, '2024-06-01 19:15:32', '2024-06-15 18:54:49'),
(74, 'Alivai', 'raihanmiziit@gmail.com', NULL, NULL, 0, NULL, 0, '10', 'eyJpdiI6IjRoanlFQyt5TjNEaEFYbnFhTWN3Rnc9PSIsInZhbHVlIjoiZDlkcDhGUFZsZ2JTbzNsL2tOb2FGQT09IiwibWFjIjoiNTRlZTBlNDViMTUxNTE2YWM5YTEyYmZmMTc0MmI5ZWVlNjc1Y2E0ZjMxMTZkOWE3MjBjM2I0NzVlNmM2M2Y2MiIsInRhZyI6IiJ9', NULL, '2024-06-01 22:23:17', '2024-06-05 16:47:46'),
(77, 'Ab1234##', 'mssanictraders2021@gmail.com', NULL, NULL, 0, NULL, 0, '100', 'eyJpdiI6IjRoanlFQyt5TjNEaEFYbnFhTWN3Rnc9PSIsInZhbHVlIjoiZDlkcDhGUFZsZ2JTbzNsL2tOb2FGQT09IiwibWFjIjoiNTRlZTBlNDViMTUxNTE2YWM5YTEyYmZmMTc0MmI5ZWVlNjc1Y2E0ZjMxMTZkOWE3MjBjM2I0NzVlNmM2M2Y2MiIsInRhZyI6IiJ9', NULL, '2024-06-02 12:39:39', '2024-06-02 16:55:59'),
(78, 'suvro', 'saikatsarkar1122@gmail.com', NULL, NULL, 0, NULL, 2, '20', 'eyJpdiI6ImVIZVpObEljOWV5d3dOY0R5WnQ1K0E9PSIsInZhbHVlIjoiZTVuUEIzTkt6VksvOUQ5MkwwRHorUT09IiwibWFjIjoiYmJmMGE1NmE0MmYzNTdkZmM0ZTRkYzJjY2U0YTRhMDNhNTNlZDE4MWY2ZDNjZDRlNzllNGIwZjY4ZmI3YzI0ZCIsInRhZyI6IiJ9', NULL, '2024-06-02 17:43:26', '2024-06-13 15:34:11'),
(83, 'Hemangshu bala', 'hmbala1144@gmail.com', NULL, NULL, 0, NULL, 0, '99', 'eyJpdiI6IjRoanlFQyt5TjNEaEFYbnFhTWN3Rnc9PSIsInZhbHVlIjoiZDlkcDhGUFZsZ2JTbzNsL2tOb2FGQT09IiwibWFjIjoiNTRlZTBlNDViMTUxNTE2YWM5YTEyYmZmMTc0MmI5ZWVlNjc1Y2E0ZjMxMTZkOWE3MjBjM2I0NzVlNmM2M2Y2MiIsInRhZyI6IiJ9', NULL, '2024-06-03 12:11:42', '2024-06-10 14:32:26'),
(87, 'asis', 'asisr1542@gmail.com', NULL, NULL, 0, NULL, 0, '17', 'eyJpdiI6InlKQWVmU0pZT3k3UHFVUktsRG0vU0E9PSIsInZhbHVlIjoiaGF2enZCbDFTN1EwZVFJNks2byt2dz09IiwibWFjIjoiMTQ5MDA4NjBhZGI3NGRmMmJkZDNhNmE3MjJiZmM0ZjNiNTNlMDVmMjdkZTFkZWE3MjczZjk3ZmU2NmZkMzM5ZSIsInRhZyI6IiJ9', NULL, '2024-06-03 19:52:37', '2024-06-12 11:28:22'),
(89, 'ABDULLAH AL MAHMUD', 'abdullahalnahmud@gmail.com', NULL, NULL, 0, NULL, 0, '33', 'eyJpdiI6IjRoanlFQyt5TjNEaEFYbnFhTWN3Rnc9PSIsInZhbHVlIjoiZDlkcDhGUFZsZ2JTbzNsL2tOb2FGQT09IiwibWFjIjoiNTRlZTBlNDViMTUxNTE2YWM5YTEyYmZmMTc0MmI5ZWVlNjc1Y2E0ZjMxMTZkOWE3MjBjM2I0NzVlNmM2M2Y2MiIsInRhZyI6IiJ9', NULL, '2024-06-04 12:59:36', '2024-06-12 13:17:23'),
(92, 'mahabul', 'mahabulalam71@gmail.com', NULL, NULL, 0, NULL, 0, '143', 'eyJpdiI6IjYvbXJOVFRuUVVuWDR5Y1c1UXhVT3c9PSIsInZhbHVlIjoiM21ML2Y4bzAvYysrVldBdk54a2JTQT09IiwibWFjIjoiNzBkMWNlMzg0YjBmYWIyMWQzOTk3NzMyYjYwZTcyNTIyZDIwZjNlNGNhZWU1YWVjN2Q4NDlhN2JkMTYyNGQ5YiIsInRhZyI6IiJ9', NULL, '2024-06-05 10:47:36', '2024-06-13 12:57:49'),
(96, 'Osman', 'osman55tjn@gmail.com', NULL, NULL, 0, NULL, 0, '8', 'eyJpdiI6IjRoanlFQyt5TjNEaEFYbnFhTWN3Rnc9PSIsInZhbHVlIjoiZDlkcDhGUFZsZ2JTbzNsL2tOb2FGQT09IiwibWFjIjoiNTRlZTBlNDViMTUxNTE2YWM5YTEyYmZmMTc0MmI5ZWVlNjc1Y2E0ZjMxMTZkOWE3MjBjM2I0NzVlNmM2M2Y2MiIsInRhZyI6IiJ9', NULL, '2024-06-05 21:45:36', '2024-06-13 14:19:16'),
(97, 'Mdkayes3859', 'cbmasud1@gmail.com', NULL, NULL, 0, NULL, 0, '26', 'eyJpdiI6IjhJTm5hVk1TWThKYkxBdkxZeEtHbEE9PSIsInZhbHVlIjoiTm1ULzFobTJETEU5QUJqVHEvQ0U1dz09IiwibWFjIjoiNThlMjAwZGFmYTg4ZWRkM2Y0MzUyOWE4ZmI1ZTViNjFiOWE3NzFmMzFjMThkZDUzZWJjMWIxZjYwNThlNzZhZCIsInRhZyI6IiJ9', NULL, '2024-06-06 13:08:28', '2024-06-20 10:17:43'),
(98, 'ncomputer', 'ncomputer74@gmail.com', NULL, NULL, 0, NULL, 0, '407', 'eyJpdiI6IkFjbWppaFZWUEF2VFp1NWx2T213NVE9PSIsInZhbHVlIjoiL1dmQ0VyUGQyRWYxOEdLMUVhQmp4UT09IiwibWFjIjoiZGZiMzA5M2IzZmQ4ZGMzZjQzMDZkZDFmNGJjMjE3OWNmNTUwZWVkZTAxZDNiOWZiYTY2OTlkNDBhNzIwMzU0NSIsInRhZyI6IiJ9', NULL, '2024-06-06 13:25:34', '2024-06-20 12:49:14'),
(100, 'Md Asadul Mia', 'asadulgraphics@gmail.com', NULL, NULL, 0, NULL, 0, '10', 'eyJpdiI6IjRoanlFQyt5TjNEaEFYbnFhTWN3Rnc9PSIsInZhbHVlIjoiZDlkcDhGUFZsZ2JTbzNsL2tOb2FGQT09IiwibWFjIjoiNTRlZTBlNDViMTUxNTE2YWM5YTEyYmZmMTc0MmI5ZWVlNjc1Y2E0ZjMxMTZkOWE3MjBjM2I0NzVlNmM2M2Y2MiIsInRhZyI6IiJ9', NULL, '2024-06-08 17:58:23', '2024-06-10 14:53:36'),
(105, 'IQBAL', 'Djlederiqbalbai@gmail.com', NULL, NULL, 0, NULL, 0, '40', 'eyJpdiI6Ilp3YWlyUzZGQTJHdFk0aTJsZXlZanc9PSIsInZhbHVlIjoiMFhNSWZ4RnRVaFFBOXZ5TkF3WTBVQT09IiwibWFjIjoiZTZlNDAyYzhiNjhhYjZhMGJiYWUyYWE0ZTA1OTA2M2NlZjg0Yzc0MTI0NDk5ODBiNDlhZGM3NGFjYjdjZGJkYSIsInRhZyI6IiJ9', NULL, '2024-06-10 20:35:23', '2024-06-12 12:30:52'),
(109, 'Rashel Islam', 'irashel51@gmail.com', NULL, NULL, 0, NULL, 0, '100', 'eyJpdiI6IlQ5ZXdRWU9pUXdXS1hzSGlNeHUxVnc9PSIsInZhbHVlIjoiaGpJOTV4dVZRR0xhUWNoUkxLNFN1QT09IiwibWFjIjoiMmVjYTBkN2VmYzJjYTFkMzRkNmI4MDYzMWM3YmU4ZTNiNzRhMTJhMDQxZDE4MGUzZmFmMjlkMzVmYjRiMzA3ZCIsInRhZyI6IiJ9', NULL, '2024-06-11 13:40:54', '2024-06-11 15:00:43'),
(113, 'madhobpal10', 'madhobpal10@gmail.com', NULL, NULL, 0, NULL, 2, '142', 'eyJpdiI6IkM3UzA5cmc1eGg3cUFIdHRsTENjcVE9PSIsInZhbHVlIjoiL0NPWUtqWXRtTmV3ajZPT0I4YTVodz09IiwibWFjIjoiYjRhMGE2ODFiYjc0NzE0NTNjZmFlZmQyZDUyYzYwZWQ1Mjg5MzZlYWQxOWE4MDM5NzE2NDdiNDIxMTM2M2Y2YiIsInRhZyI6IiJ9', NULL, '2024-06-11 17:15:39', '2024-06-20 13:12:36'),
(115, 'sapan', 'sapan.cec@gmail.com', NULL, NULL, 0, NULL, 0, '114', 'eyJpdiI6ImRwNGZqQ1ZsMHBhRzFpdWFpQVBmK0E9PSIsInZhbHVlIjoiUnhiRDkvTjhVemlIeFlGZGNoYWoyZz09IiwibWFjIjoiMDRiYTk1ZDA1OThiYWIxZDdkYjY2ZTM3NjEzNWIwZTQxNzc2ZDIwOWEwNGIyOWE1MmY2MWNlMjlmZWZkYTgzYSIsInRhZyI6IiJ9', NULL, '2024-06-12 12:44:54', '2024-06-19 12:44:54'),
(118, 'ariyan', 'ariyanmasum66@gamil.com', NULL, NULL, 0, NULL, 0, '0', 'eyJpdiI6ImNrUXFha3IvamMrVWZEMEdlM1VsUHc9PSIsInZhbHVlIjoiQ2FMZ1ZDd3FzOE5Xa3krdHdOTExtdz09IiwibWFjIjoiMTIxNGExYjYyYzIxMzhkMjI0N2JhMzYyNjE2NjcwYTViNjNmMTg4MDljNWZiYWFlNGIxZDMzNzVkYzk0ODdjYiIsInRhZyI6IiJ9', NULL, '2024-06-12 19:07:04', '2024-06-12 19:07:04'),
(119, 'md sohan', 'sohanreal567@gmail.com', NULL, NULL, 0, NULL, 0, '0', 'eyJpdiI6IlNQUzd6c25RSVM2enh4eFplMlBIUFE9PSIsInZhbHVlIjoic3ZkNVIxRXg3eDd2MC80MUMyenIzQT09IiwibWFjIjoiZTJjZWFiNGVjZDZjNTNiYzY1NmRlMTc3Y2QwMmFmZDA4YTk0MTQ5NmQ3ZDAwZGZhODQ4NjgxYzQzYjQ1NTI5ZCIsInRhZyI6IiJ9', NULL, '2024-06-12 20:55:06', '2024-06-12 20:55:06'),
(121, 'Hridoy Paul', 'paulhridoy861@gmail.com', NULL, NULL, 0, NULL, 0, '189', 'eyJpdiI6Ik9SbU04S3l0VDBFZGtTUFgrTU5BVVE9PSIsInZhbHVlIjoiYnVQQTVJQm01bEZkemRJOTdCQVZ2Zz09IiwibWFjIjoiZTg0NmQ2YzNhMWUwZGE5MjQ1YTI5MGYwYjcxOGUzY2FiNWNjZTg5NzM4MTYyODg3NjRhYTk5ZTEyMDMwOTIyYiIsInRhZyI6IiJ9', NULL, '2024-06-13 16:11:38', '2024-06-14 12:24:38'),
(122, 'Bashar Sarkar', 'bashardbgramup@gmail.com', NULL, NULL, 0, NULL, 0, '0', 'eyJpdiI6ImM2RnFUY0g4UVVadkhCN1ZHTXptM3c9PSIsInZhbHVlIjoiVXZMcDRjMUxQUWxhaE9tVGZuMnVudz09IiwibWFjIjoiN2Y1YzUzNjYwZmI2MjUzMGQyODI0NzQyNDExNjQyZGFiMDc3ZWFhOTRiNDAwODNmMzM5MjYwNjQzYWEzOTE5NCIsInRhZyI6IiJ9', NULL, '2024-06-13 20:08:46', '2024-06-13 20:08:46'),
(123, 'masum', 'masum22@gamil.com', NULL, NULL, 0, NULL, 0, '0', 'eyJpdiI6InBwRE5zZTIvVERIMjJ1REhPeWJyVVE9PSIsInZhbHVlIjoidGRrK2FSOHl4MTRETTNrMWVNaEpBUT09IiwibWFjIjoiMDViMzE2MWVkYWMxZjNjY2ZlMDJjYTFkNTBiNzJmMDY3YWMxNTdhMjE3MjQwMzM4NjUwMWI4ODgxMjExOTNjMCIsInRhZyI6IiJ9', NULL, '2024-06-14 17:57:27', '2024-06-14 17:57:27'),
(124, 'Ra5252', 'gog41765@gmail.com', NULL, NULL, 0, NULL, 0, '179', 'eyJpdiI6IjZQRUhSU1ZObU5NVGtHa0ZmL3RFVlE9PSIsInZhbHVlIjoiOVo2akoySkhUSENZQ2pGK3gwdWMzUT09IiwibWFjIjoiZGZiYWU2MGVjMzg3Y2RlYzg3MzM5MzEyMmEwM2JlZDc3NGVmMjQ5MWVlYmU5OGQ2MWIwZjEyYWZhYjNhOGQ2ZSIsInRhZyI6IiJ9', NULL, '2024-06-16 09:58:07', '2024-06-16 10:03:21'),
(125, 'mdredon', 'mdredonofficial@gmail.com', NULL, NULL, 0, NULL, 0, '0', 'eyJpdiI6Im5UNFF2QUg4dEtHbmZHRmo0Q3Q5Q0E9PSIsInZhbHVlIjoiSFQ5WERjZ1EvSFNYZDBubzVDVEQ1dz09IiwibWFjIjoiNjYyMzllODVkMGQyOTM3ODA2ZmVlOTNhZDljNWMyZGRjOTU0YTcwODZiYWE2M2ExZTUxOWIzMzEyZGZiN2FkMiIsInRhZyI6IiJ9', NULL, '2024-06-16 13:48:34', '2024-06-16 13:48:34'),
(126, 'Lalchan Sarker', 'lalchansarker136@gmail.com', NULL, NULL, 0, NULL, 0, '0', 'eyJpdiI6ImIvaExpdkR1QVJJaUtIR2JaZkRKV3c9PSIsInZhbHVlIjoiMEFhUnkvS2p0bTBVZUhaQjZZMnF0QT09IiwibWFjIjoiNjU4MTc0MzNhYjlkMmUzYTg1OTY0ZDczNDk5NmNkMThhNzM3YzIyNWM5NTg3M2E5ZjAxZTZkNGQ3YmYwMjcwOSIsInRhZyI6IiJ9', NULL, '2024-06-16 18:26:18', '2024-06-16 18:26:18'),
(127, 'Md Asadul Mia', 'asadulgraphic@gmail.com', NULL, NULL, 0, NULL, 0, '59', 'eyJpdiI6IldzYzJENVk5OHNIOEljS2puNGUwYlE9PSIsInZhbHVlIjoiQ2RHUUxTZGZLSjlCckZHblBsSEF0Rmtwd2ttZnF0bXNvYjlRdTViS29Xcz0iLCJtYWMiOiJjN2YwNGQwZjFmYTNhYzE2NGE2Yjc0YTViOTIwY2IyNjUxYzg0OGE2MGZhOWVlYTg3ZjMzYzUyZDQzMjUwYjAxIiwidGFnIjoiIn0=', NULL, '2024-06-19 08:24:25', '2024-06-21 17:16:49'),
(128, 'MOHAMMAD SHAHARAZ', 'shaharaj689@gmail.com', NULL, NULL, 0, NULL, 0, '0', 'eyJpdiI6Ik5MazhyWnA3amlUYzZ2TEt2Q2s1eEE9PSIsInZhbHVlIjoiU3hYZk5lbTZYVTM3L3ZJd3RReERudz09IiwibWFjIjoiMGJmN2NmZTZkMWRhYTQwZTFmN2FkNmU4YTk4MWJmODcyOThjYTU3NTNkOGY4NjIzNGVjMTE1ZjIwMTdlOGZmYyIsInRhZyI6IiJ9', NULL, '2024-06-19 17:51:48', '2024-06-19 17:51:48'),
(129, 'Sayed', 'sheikhulsayed214@gmail.com', NULL, NULL, 0, NULL, 0, '0', 'eyJpdiI6Im1FanpuQnlWZFVhOXBOK0JjZUpjZGc9PSIsInZhbHVlIjoiRFBBT0FtcWdkZFF5T1N6NUxtNTRjQT09IiwibWFjIjoiMzZlOGU3NjFiYWFhMGQ1YWNiMjYyNmM4Yzk2NDFkNGQzMWE0OTc2MmE4M2I3MTRkM2Y4OTJkZDA5NDVhYTVhZSIsInRhZyI6IiJ9', NULL, '2024-06-20 10:20:21', '2024-06-20 10:20:21'),
(131, 'Elias', 'eliastek297@gmail.com', NULL, NULL, 0, NULL, 0, '0', 'eyJpdiI6Ik9hQnE3Vmt2TEs4UXBUSjR6djgxbEE9PSIsInZhbHVlIjoiekQzL1BHaEJJOTZ0NGRpMThsUUh6QT09IiwibWFjIjoiZTgyMjdkYzBiZjNkYmQ4MzQ3MzQ4ZTcwMTFiNTg2NzdlNDIwYmMxYzI4MzEyODI3ZDMyYjNhYWNlMTM2OWNjYSIsInRhZyI6IiJ9', NULL, '2024-06-21 19:01:37', '2024-06-21 19:01:37');

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
-- Table structure for table `website_links`
--

CREATE TABLE `website_links` (
  `id` bigint UNSIGNED NOT NULL,
  `bkash` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nagad` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bkash_type` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `nagad_type` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
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

INSERT INTO `website_links` (`id`, `bkash`, `nagad`, `bkash_type`, `nagad_type`, `email`, `facebook`, `instagram`, `linkedIn`, `twitter`, `youtube`, `number`, `address`, `map_link`, `created_at`, `updated_at`) VALUES
(1, '01635478683', '00', 'পেমেন্ট', 'আপাতত নাই', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-01 02:07:30', '2024-06-10 17:06:40');

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
-- Indexes for table `videos`
--
ALTER TABLE `videos`
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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `server_copy_orders`
--
ALTER TABLE `server_copy_orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sign_copy_orders`
--
ALTER TABLE `sign_copy_orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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

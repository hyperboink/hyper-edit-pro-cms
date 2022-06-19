-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 19, 2022 at 07:54 AM
-- Server version: 8.0.29-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hypereditpro_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `info` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `address`, `phone`, `mobile`, `fax`, `email`, `info`, `updated_at`) VALUES
(1, 'Paris, France', '+1233494999', 'Mobile 123123', 'FAX 123887934', 'contactsettings@email.com', 'Information text here....', '2020-10-20 01:13:03');

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `id` int NOT NULL,
  `shortcode_form_id` int DEFAULT NULL,
  `shortcode_form_key` varchar(255) DEFAULT NULL,
  `shortcode` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `data` longtext,
  `status` tinyint(1) DEFAULT '1',
  `label_hidden` tinyint(1) DEFAULT '0',
  `placeholder_hidden` tinyint(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forms`
--

INSERT INTO `forms` (`id`, `shortcode_form_id`, `shortcode_form_key`, `shortcode`, `name`, `data`, `status`, `label_hidden`, `placeholder_hidden`, `created_at`) VALUES
(12, 1, 'contact', 'form_contact1', 'Contact Form', '[{\"type\":\"static_text\",\"customType\":\"\",\"label\":\"\",\"labelConcatenated\":\"\",\"required\":false,\"value\":\"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\",\"name\":\"form_1_static_text_1\",\"shortcode\":\"form_1\",\"inputIndex\":\"1\",\"options\":[]},{\"type\":\"text\",\"customType\":\"text\",\"label\":\"Name\",\"labelConcatenated\":\"Name\",\"placeholder\":\"Name\",\"required\":false,\"value\":\"\",\"name\":\"form_1_text_1\",\"options\":[]},{\"type\":\"text\",\"customType\":\"email\",\"label\":\"Email\",\"labelConcatenated\":\"Email\",\"placeholder\":\"Email\",\"required\":true,\"value\":\"\",\"name\":\"form_1_text_2\",\"options\":[]},{\"type\":\"text\",\"customType\":\"number\",\"label\":\"Phone\",\"labelConcatenated\":\"Phone\",\"placeholder\":\"Phone\",\"required\":false,\"value\":\"\",\"name\":\"form_1_text_3\",\"options\":[]},{\"type\":\"textarea\",\"customType\":\"\",\"label\":\"Message\",\"labelConcatenated\":\"Message\",\"placeholder\":\"Message\",\"required\":false,\"value\":\"\",\"name\":\"form_1_textarea_1\",\"options\":[]},{\"type\":\"select_basic\",\"customType\":\"\",\"label\":\"Favorite Color\",\"labelConcatenated\":\"Favorite_Color\",\"required\":false,\"value\":\"\",\"name\":\"form_1_select_basic_1\",\"shortcode\":\"form_1\",\"inputIndex\":\"1\",\"options\":[{\"text\":\"Blue\",\"value\":\"Blue\"},{\"text\":\"Green\",\"value\":\"Green\"},{\"text\":\"Lavender\",\"value\":\"Lavender\"}]},{\"type\":\"checkbox\",\"customType\":\"\",\"label\":\"Hobbies\",\"labelConcatenated\":\"Hobbies\",\"placeholder\":\"\",\"required\":false,\"value\":\"\",\"name\":\"form_1_checkbox_1\",\"shortcode\":\"form_1\",\"inputIndex\":\"1\",\"options\":[{\"text\":\"Pingpong\",\"value\":\"Pingpong\"},{\"text\":\"Coding\",\"value\":\"Coding\"},{\"text\":\"Sleeping\",\"value\":\"Sleeping\"}]},{\"type\":\"radio\",\"customType\":\"\",\"label\":\"Gender\",\"labelConcatenated\":\"Gender\",\"required\":false,\"value\":\"\",\"name\":\"form_1_radio_1\",\"shortcode\":\"form_1\",\"inputIndex\":\"1\",\"options\":[{\"text\":\"Male\",\"value\":\"Male\"},{\"text\":\"Female\",\"value\":\"Female\"}],\"placeholder\":\"\"},{\"type\":\"file\",\"customType\":\"\",\"label\":\"Upload\",\"labelConcatenated\":\"Upload\",\"required\":false,\"value\":\"\",\"name\":\"form_1_file_1\",\"shortcode\":\"form_1\",\"inputIndex\":\"1\",\"options\":[],\"placeholder\":\"\"}]', 1, 0, 1, '2020-10-29 11:00:27'),
(15, 4, 'rawr', 'form_rawr4', 'Email', '[{\"type\":\"text\",\"customType\":\"email\",\"label\":\"rawr\",\"labelConcatenated\":\"rawr\",\"placeholder\":\"placeholder\",\"required\":false,\"value\":\"\",\"name\":\"form_4_text_1\",\"options\":[]}]', 1, 0, 0, '2020-10-30 02:49:02'),
(30, 19, 'fjskhfkhs', 'form_19fjskhfkhs', 'Sample form name', '[{\"type\":\"text\",\"customType\":\"\",\"label\":\"Sample label here (click to edit)\",\"labelConcatenated\":\"Sample_label_here_(click_to_edit)\",\"placeholder\":\"placeholder\",\"required\":false,\"value\":\"\",\"name\":\"form_19_text_1\",\"shortcode\":\"form_19\",\"inputIndex\":\"1\",\"options\":[]},{\"type\":\"textarea\",\"customType\":\"\",\"label\":\"Sample label here (click to edit)\",\"labelConcatenated\":\"Sample_label_here_(click_to_edit)\",\"placeholder\":\"placeholder\",\"required\":false,\"value\":\"\",\"name\":\"form_19_textarea_1\",\"shortcode\":\"form_19\",\"inputIndex\":\"1\",\"options\":[]},{\"type\":\"checkbox\",\"customType\":\"\",\"label\":\"\",\"labelConcatenated\":\"\",\"required\":false,\"value\":\"\",\"name\":\"form_19_checkbox_1\",\"shortcode\":\"form_19\",\"inputIndex\":\"1\",\"options\":[{\"text\":\"Option 1\",\"value\":\"1\"},{\"text\":\"Option 2\",\"value\":\"2\"},{\"text\":\"Option 3\",\"value\":\"3\"}]},{\"type\":\"checkbox\",\"customType\":\"\",\"label\":\"\",\"labelConcatenated\":\"\",\"required\":false,\"value\":\"\",\"name\":\"form_19_checkbox_2\",\"shortcode\":\"form_19\",\"inputIndex\":2,\"options\":[{\"text\":\"Option 1\",\"value\":\"1\"},{\"text\":\"Option 2\",\"value\":\"2\"},{\"text\":\"Option 3\",\"value\":\"3\"}]},{\"type\":\"file\",\"customType\":\"\",\"label\":\"Sample label here (click to edit)\",\"labelConcatenated\":\"Sample_label_here_(click_to_edit)\",\"required\":false,\"value\":\"\",\"name\":\"form_19_file_1\",\"shortcode\":\"form_19\",\"inputIndex\":\"1\",\"options\":[]}]', 1, 0, 0, '2020-11-16 11:02:19'),
(31, 20, 'rawr', 'form_rawr20', 'rawr form', '[{\"type\":\"text\",\"customType\":\"text\",\"label\":\"Name\",\"labelConcatenated\":\"Name\",\"placeholder\":\"Name\",\"required\":false,\"value\":\"\",\"name\":\"form_20_text_1\",\"shortcode\":\"form_20\",\"inputIndex\":\"1\",\"options\":[]},{\"type\":\"text\",\"customType\":\"email\",\"label\":\"Email\",\"labelConcatenated\":\"Email\",\"placeholder\":\"Email\",\"required\":false,\"value\":\"\",\"name\":\"form_20_email_2\",\"shortcode\":\"form_20\",\"inputIndex\":2,\"options\":[]},{\"type\":\"file\",\"customType\":\"\",\"label\":\"Attach 1\",\"labelConcatenated\":\"Attach_1\",\"placeholder\":\"\",\"required\":false,\"value\":\"\",\"name\":\"form_20_file_1\",\"shortcode\":\"form_20\",\"inputIndex\":\"1\",\"options\":[]},{\"type\":\"file\",\"customType\":\"\",\"label\":\"attach 2\",\"labelConcatenated\":\"attach_2\",\"placeholder\":\"\",\"required\":false,\"value\":\"\",\"name\":\"form_20_file_2\",\"shortcode\":\"form_20\",\"inputIndex\":2,\"options\":[]}]', 1, 0, 0, '2020-11-16 12:04:12');

-- --------------------------------------------------------

--
-- Table structure for table `form_settings`
--

CREATE TABLE `form_settings` (
  `id` int NOT NULL,
  `form_id` int DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `cc` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `button_text` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_settings`
--

INSERT INTO `form_settings` (`id`, `form_id`, `email`, `cc`, `subject`, `button_text`, `status`, `created_at`) VALUES
(2, 12, 'alfiepogado@gmail.com', 'hyperboink@gmail.com, alfiepogado@yahoo.com', 'Online Inquiry', '', 0, '2020-10-29 11:00:27'),
(5, 15, NULL, NULL, NULL, NULL, 0, '2020-10-30 02:49:02'),
(20, 30, NULL, NULL, NULL, NULL, 0, '2020-11-16 11:02:20'),
(21, 31, '', '', 'kdfakhfkhj', 'Rarwr send', 0, '2020-11-16 12:04:12');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `shortcode_menu_id` int DEFAULT NULL,
  `shortcode_menu_key` varchar(255) DEFAULT NULL,
  `shortcode` varchar(255) DEFAULT NULL,
  `data_menu` longtext,
  `data_page` longtext,
  `status` tinyint(1) DEFAULT '1',
  `is_primary` tinyint(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `shortcode_menu_id`, `shortcode_menu_key`, `shortcode`, `data_menu`, `data_page`, `status`, `is_primary`, `created_at`) VALUES
(14, 'Main', 1, '', 'menu_1', '[{&quot;type&quot;:&quot;page&quot;,&quot;id&quot;:1,&quot;name&quot;:&quot;home-1&quot;,&quot;title&quot;:&quot;Home&quot;,&quot;slug&quot;:&quot;home&quot;},{&quot;type&quot;:&quot;page&quot;,&quot;id&quot;:18,&quot;name&quot;:&quot;about-us-18&quot;,&quot;title&quot;:&quot;About Us&quot;,&quot;slug&quot;:&quot;about-us&quot;}]', '[{&quot;type&quot;:&quot;page&quot;,&quot;id&quot;:15,&quot;name&quot;:&quot;toink-15&quot;,&quot;title&quot;:&quot;toink&quot;,&quot;slug&quot;:&quot;toink&quot;},{&quot;type&quot;:&quot;page&quot;,&quot;id&quot;:4,&quot;name&quot;:&quot;the-quick-brown-fox-4&quot;,&quot;title&quot;:&quot;the quick brown fox&quot;,&quot;slug&quot;:&quot;the-quick-brown-fox&quot;}]', 1, 0, '2022-06-18 12:29:47'),
(15, 'Menu 2', 2, '', 'menu_2', '[{&quot;type&quot;:&quot;page&quot;,&quot;id&quot;:1,&quot;name&quot;:&quot;home-1&quot;,&quot;title&quot;:&quot;Home&quot;,&quot;slug&quot;:&quot;home&quot;},{&quot;type&quot;:&quot;page&quot;,&quot;id&quot;:18,&quot;name&quot;:&quot;about-us-18&quot;,&quot;title&quot;:&quot;About Us&quot;,&quot;slug&quot;:&quot;about-us&quot;},{&quot;type&quot;:&quot;page&quot;,&quot;id&quot;:4,&quot;name&quot;:&quot;the-quick-brown-fox-4&quot;,&quot;title&quot;:&quot;the quick brown fox&quot;,&quot;slug&quot;:&quot;the-quick-brown-fox&quot;}]', '[]', 1, 0, '2022-06-18 12:30:27');

-- --------------------------------------------------------

--
-- Table structure for table `pages_custom_v2`
--

CREATE TABLE `pages_custom_v2` (
  `id` int NOT NULL,
  `filename` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `status` int DEFAULT '1',
  `raw` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages_custom_v2`
--

INSERT INTO `pages_custom_v2` (`id`, `filename`, `created_at`, `updated_at`, `status`, `raw`) VALUES
(4, 'testing-this-one', '2020-10-16 00:36:36', NULL, 1, 'testing this one');

-- --------------------------------------------------------

--
-- Table structure for table `pages_v1`
--

CREATE TABLE `pages_v1` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text,
  `status` tinyint(1) DEFAULT '1',
  `slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages_v1`
--

INSERT INTO `pages_v1` (`id`, `title`, `content`, `status`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'rawr woo', 'kladfa', 1, 'rawr-woo', '2020-10-15 00:46:41', NULL),
(5, 'testing rawr 101', 'sdf', 1, 'testing-rawr-101', '2020-10-15 06:26:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `page_layout_shortcodes`
--

CREATE TABLE `page_layout_shortcodes` (
  `id` int NOT NULL,
  `header` longtext,
  `footer` longtext,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_layout_shortcodes`
--

INSERT INTO `page_layout_shortcodes` (`id`, `header`, `footer`, `created_at`) VALUES
(1, '{\"image_logo\":{\"type\":\"image\",\"status\":\"first\",\"value\":\"1123.jpg\"}}', '{\"title_sample_footer\":{\"type\":\"title\",\"status\":\"first\",\"value\":\"Footer Title here\"},\"content_sample_footer\":{\"type\":\"content\",\"status\":\"first\",\"value\":\"&lt;p&gt;&lt;span style=&quot;font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify;&quot;&gt;Proin sed lectus libero. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla varius justo turpis, in convallis est feugiat id. Pellentesque non sem tristique, consequat tellus quis, dictum nisl. Sed semper purus et tristique convallis&lt;\\/span&gt;&lt;\\/p&gt;\"},\"custom-google-map_address\":{\"type\":\"custom-google-map\",\"status\":\"first\",\"value\":\"\"}}', '2020-11-09 10:23:15');

-- --------------------------------------------------------

--
-- Table structure for table `page_shortcodes`
--

CREATE TABLE `page_shortcodes` (
  `id` int NOT NULL,
  `page_template_id` int DEFAULT NULL,
  `content` longtext,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_shortcodes`
--

INSERT INTO `page_shortcodes` (`id`, `page_template_id`, `content`, `created_at`) VALUES
(1, 18, '{\"content_page\":{\"type\":\"content\",\"value\":\"&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px;&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sollicitudin auctor dapibus. Proin malesuada, ipsum non eleifend sagittis, lacus dolor placerat magna, sed efficitur augue eros eget tortor. Donec enim risus, sagittis sit amet ex ut, auctor mattis purus. Aliquam sit amet ornare tortor. Proin non aliquet nisl, sit amet suscipit ipsum. Praesent sodales bibendum enim, vitae porta massa. Cras tristique maximus pharetra. Morbi mauris arcu, elementum ac massa ut, molestie ullamcorper nunc. Pellentesque arcu metus, sodales non sem sit amet, hendrerit vulputate nisl. Fusce eget metus ultricies, maximus diam a, ultrices metus. Suspendisse ullamcorper neque dolor, in pulvinar augue fringilla ut. Vivamus risus nibh, egestas non ornare a, tempus non magna. Mauris imperdiet augue nec eros vulputate posuere. Vivamus scelerisque maximus dolor, ut malesuada risus tempus dictum. Cras lectus orci, tempus sit amet odio ut, maximus rutrum lectus. Vestibulum sem neque, iaculis quis commodo ac, dapibus ac purus.&lt;\\/p&gt;\\r\\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px;&quot;&gt;Proin sed lectus libero. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla varius justo turpis, in convallis est feugiat id. Pellentesque non sem tristique, consequat tellus quis, dictum nisl. Sed semper purus et tristique convallis. Phasellus massa ipsum, gravida non diam a, tincidunt tincidunt diam. Mauris imperdiet tempor nisl, ut tincidunt diam convallis eu. Phasellus condimentum malesuada malesuada. Vivamus ac libero ut massa varius dictum eu sed ligula. Nam nec mollis nisi, gravida sollicitudin turpis. Nullam ipsum lectus, ullamcorper sed pharetra vel, mattis eu sem. Nunc faucibus ut leo sit amet fringilla. Mauris quam mi, finibus eget ex sagittis, faucibus ullamcorper tellus.&lt;\\/p&gt;\\r\\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px;&quot;&gt;Nam velit elit, tincidunt nec pharetra vel, interdum sagittis ligula. Maecenas mattis, est eu mollis condimentum, eros tortor lobortis ex, a dignissim nulla enim a sapien. Aenean dignissim pretium purus non tristique. Integer nec nisl ut justo malesuada pulvinar et id risus. Nunc sit amet tellus augue. Nullam pharetra at justo venenatis gravida. In vel scelerisque est. Nullam mollis pharetra mauris non elementum. Aliquam nec lorem scelerisque, convallis tellus sed, vestibulum velit. Nunc justo elit, imperdiet suscipit nisi hendrerit, maximus posuere nisi. Duis ultricies faucibus risus et feugiat. Duis hendrerit, turpis vitae sodales volutpat, urna augue interdum lacus, vitae hendrerit ipsum dui eget mi. Fusce malesuada rutrum libero nec finibus.&lt;\\/p&gt;\\r\\n&lt;p&gt;&amp;nbsp;&lt;\\/p&gt;\",\"status\":\"first\"}}', '2020-11-14 00:07:45'),
(2, 1, '{\"image_feature\":{\"type\":\"image\",\"value\":\"banner.jpg\",\"status\":\"first\"},\"title_page_description\":{\"type\":\"title\",\"value\":\"This is a title description\",\"status\":\"first\"},\"content_page\":{\"type\":\"content\",\"value\":\"&lt;p&gt;&lt;span style=&quot;font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify;&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sollicitudin auctor dapibus. Proin malesuada, ipsum non eleifend sagittis, lacus dolor placerat magna, sed efficitur augue eros eget tortor. Donec enim risus, sagittis sit amet ex ut, auctor mattis purus. Aliquam sit amet ornare tortor. Proin non aliquet nisl, sit amet suscipit ipsum. Praesent sodales bibendum enim, vitae porta massa. Cras tristique maximus pharetra. Morbi mauris arcu, elementum ac massa ut, molestie ullamcorper nunc. Pellentesque arcu metus, sodales non sem sit amet, hendrerit vulputate nisl. Fusce eget metus ultricies, maximus diam a, ultrices metus. Suspendisse ullamcorper neque dolor, in pulvinar augue fringilla ut.&amp;nbsp;&lt;\\/span&gt;&lt;\\/p&gt;\",\"status\":\"first\"},\"gallery_1\":{\"type\":\"gallery\",\"value\":\"[{\\\"g_title\\\":\\\"\\\",\\\"g_image\\\":\\\"226.jpg\\\"},{\\\"g_title\\\":\\\"\\\",\\\"g_image\\\":\\\"929.jpg\\\"},{\\\"g_title\\\":\\\"\\\",\\\"g_image\\\":\\\"11231.jpg\\\"}]\",\"status\":\"first\"}}', '2020-11-14 23:03:23'),
(3, 16, '{\"content_page\":{\"type\":\"content\",\"value\":\"&lt;p&gt;I am holo the wise wolf!&lt;\\/p&gt;\",\"status\":\"first\"}}', '2020-11-15 02:38:41'),
(4, 15, '[]', '2020-11-28 02:10:22'),
(5, 4, '[]', '2020-11-28 04:30:28'),
(6, 17, '[]', '2020-11-30 13:31:28');

-- --------------------------------------------------------

--
-- Table structure for table `page_templates`
--

CREATE TABLE `page_templates` (
  `id` int NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `title_alias` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_templates`
--

INSERT INTO `page_templates` (`id`, `slug`, `title`, `title_alias`, `meta_keywords`, `meta_description`, `status`) VALUES
(1, 'home', 'Home', 'Home', '', '', '1'),
(4, 'the-quick-brown-fox', 'the quick brown fox', NULL, NULL, NULL, '1'),
(18, 'about-us', 'About Us', 'About Us', 'the quick, brown fox, jumps over, the lazy dog', 'This is a sample meta description.', '1');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int NOT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `site_title` varchar(32) NOT NULL,
  `maintenance` tinyint(1) DEFAULT '0',
  `meta_enabled` tinyint(1) DEFAULT '0',
  `default_page` varchar(255) DEFAULT NULL,
  `additional_script` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `user_id`, `site_title`, `maintenance`, `meta_enabled`, `default_page`, `additional_script`, `created_at`) VALUES
(1, 1, 'Sample Shortcodes CMS', 0, 1, 'home', '$(function(){\r\n	console.log(\'enchang!\');\r\n});', '2020-10-30 10:34:03');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `status` tinyint(1) DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `name`, `url`, `status`, `updated_at`) VALUES
(1, 'facebook', 'www.facebook.com', 1, '2020-10-20 13:57:08'),
(2, 'twitter', '#link of twitter', 1, '2020-10-20 13:57:08'),
(3, 'instagram', 'instagram.com', 1, '2020-10-20 13:57:08'),
(4, 'googleplus', 'google.com', 0, '2020-10-20 13:57:08'),
(5, 'youtube', 'youtube.com', 1, '2020-10-20 13:57:08'),
(6, 'linkedin', '', 1, '2020-10-20 13:57:08'),
(7, 'pinterest', 'pinterest.com', 0, '2020-10-20 13:57:08'),
(8, 'vimeo', 'sadfadsfsf', 1, '2020-10-20 13:57:08'),
(9, 'custom', 'testing', 1, '2020-10-20 13:57:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `remember_token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `remember_token`, `created_at`) VALUES
(1, 'pogadz', '$2a$08$QFFFg3AW33Ie0Am3oHGurOjKDgznJq66xaMS4YQ88DmnM5vAR1yw2', 'wootoinkrweawr@yahoo.com', '', '2020-10-30 09:10:35'),
(2, 'admin', '$2a$08$0mWURvSPPH1MeBZW9d36euDfplkUnouOs6mcw4qlOrpB/KbKzOg7q', 'admin@yahoo.com', '', '2020-11-28 03:22:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_settings`
--
ALTER TABLE `form_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_id` (`form_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages_custom_v2`
--
ALTER TABLE `pages_custom_v2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages_v1`
--
ALTER TABLE `pages_v1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_layout_shortcodes`
--
ALTER TABLE `page_layout_shortcodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_shortcodes`
--
ALTER TABLE `page_shortcodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_templates`
--
ALTER TABLE `page_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `site_title` (`site_title`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
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
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `form_settings`
--
ALTER TABLE `form_settings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pages_custom_v2`
--
ALTER TABLE `pages_custom_v2`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pages_v1`
--
ALTER TABLE `pages_v1`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `page_layout_shortcodes`
--
ALTER TABLE `page_layout_shortcodes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_shortcodes`
--
ALTER TABLE `page_shortcodes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `page_templates`
--
ALTER TABLE `page_templates`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `form_settings`
--
ALTER TABLE `form_settings`
  ADD CONSTRAINT `form_settings_ibfk_1` FOREIGN KEY (`form_id`) REFERENCES `forms` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

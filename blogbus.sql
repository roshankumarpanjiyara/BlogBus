-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:4000
-- Generation Time: Oct 30, 2022 at 03:55 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogbus`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fb_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `mobile_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `email`, `email_verified_at`, `google_id`, `fb_id`, `password`, `role_id`, `mobile_number`, `experience`, `designation`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'super_admin', 'roshanpanjiyara055@gmail.com', '2022-06-11 06:19:24', NULL, NULL, '$2y$10$AozBX/J3LBLoWG.EwgqFOezhn3AeoEsD.6uSkEap1Zn.wRYT/vmNm', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-11 06:19:24', '2022-06-11 06:19:24');

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Technology', 'technology', 'Super Admin', '2022-06-11 06:22:11', '2022-06-11 06:22:11'),
(2, 'Review', 'review', 'Super Admin', '2022-06-12 00:35:12', '2022-06-12 00:35:12'),
(3, 'News', 'news', 'Super Admin', '2022-06-12 00:35:19', '2022-06-12 00:35:19'),
(4, 'Article', 'article', 'Super Admin', '2022-06-12 00:35:24', '2022-06-12 00:35:24'),
(5, 'Gaming', 'gaming', 'Super Admin', '2022-06-12 00:35:29', '2022-06-12 00:35:29'),
(6, 'Education', 'education', 'Super Admin', '2022-06-12 00:35:47', '2022-06-12 00:35:47'),
(7, 'Travel', 'travel', 'Super Admin', '2022-06-12 00:35:55', '2022-06-12 00:35:55'),
(8, 'Poetry', 'poetry', 'Super Admin', '2022-06-12 00:36:08', '2022-06-12 00:36:08'),
(9, 'Recipe', 'recipe', 'Super Admin', '2022-06-12 00:36:22', '2022-06-12 00:36:22');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upvotes` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `downvotes` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `body`, `post_id`, `username`, `upvotes`, `downvotes`, `created_at`, `updated_at`) VALUES
(2, 'Roshan Kumar', 'evanxkumar@gmail.com', 'good', 6, 'roshan_kumar', 0, 0, '2022-06-12 02:40:50', '2022-06-12 02:40:50');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `email`, `name`, `body`, `created_at`, `updated_at`) VALUES
(2, 'roshanpanziarya055@gmail.com', 'roshan_200', 'heelo', '2022-06-12 02:16:43', '2022-06-12 02:16:43'),
(3, 'rajkumarpanjiyara8@gmail.com', 'Raj kumar', 'fbfgbfgb', '2022-06-12 03:05:58', '2022-06-12 03:05:58');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_05_08_122504_create_sessions_table', 1),
(7, '2022_05_08_123403_create_roles_table', 1),
(8, '2022_05_08_123437_create_permissions_table', 1),
(9, '2022_05_31_070616_create_admins_table', 1),
(10, '2022_06_03_073049_create_categories_table', 1),
(11, '2022_06_03_155021_create_posts_table', 1),
(12, '2022_06_06_092409_create_advertisements_table', 1),
(13, '2022_06_11_122139_create_comments_table', 2),
(14, '2022_06_11_124320_create_contacts_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('evanxkumar@gmail.com', '$2y$10$O6tFugL7wzR.pM/6K6tSWuiVNpA2PmN9xWjyGr2KixcRCvU5YzoNy', '2022-06-22 02:41:05'),
('roshanpanziarya055@gmail.com', '$2y$10$XOTAJ0fB17DsQFpqjzW3WugauzaG3ufGCAOweeSHKKaJCFF7qvAYm', '2022-06-23 04:59:59');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `role_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, '{\"role\":{\"can-view\":\"1\"},\"permission\":{\"can-view\":\"1\"},\"user\":{\"can-view\":\"1\"},\"catelog\":{\"can-view\":\"1\"},\"pending\":{\"can-view\":\"1\"},\"advertisement\":{\"can-view\":\"1\"},\"contact\":{\"can-view\":\"1\"}}', '2022-06-11 06:19:24', '2022-06-11 06:19:24'),
(2, 2, '{\"catelog\":{\"can-view\":\"1\"},\"pending\":{\"can-view\":\"1\"}}', '2022-06-11 06:19:24', '2022-06-11 06:19:24');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `reads` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `postmessage` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `username`, `title`, `slug`, `body`, `image`, `category_id`, `created_by`, `approved_by`, `status`, `reads`, `postmessage`, `created_at`, `updated_at`) VALUES
(4, 'roshan_kumar', 'Crypto currency', 'crypto-currency', '<p>What is Cryptocurrency ?<br />\r\n<br />\r\nAs indicated by Wikipedia, cryptographic money is additionally called as virtual cash or substitute cash.<br />\r\nA cryptographic money is a type of advanced cash which is intended to function as a mode of trade and uses a cryptography strategy to keep it secure the exchange.<br />\r\nDigital currency utilizes the decentralized organization. That implies you needn&#39;t bother with any outsider worker like bank, government, different specialists to play out an exchange with the shippers.<br />\r\n<br />\r\nWhat is CENTRAL NETWORK of the exchange ?<br />\r\n<br />\r\nThe Central organization is the most seasoned organization of the exchange.<br />\r\nThis organization includes you and the shipper as well as the outsider worker. Here banks, government, other focal specialists are the outsider worker which controls the progression of exchanges.<br />\r\nThese outsider workers go about as a center man and watch over the exchange done among us and the shipper. What&#39;s more, be prepared to take the expenses, obligations and oversees the manner in which we do exchanges.<br />\r\nThe measure of cash you spend on these outsider worker is called as Double Spending.<br />\r\nTwofold spending costs on these outsider workers is a major weight for us. We consider the prospects which can save our twofold spending on these outsider however we are defenseless till now.<br />\r\nPresently, here the comes the chance -<br />\r\nDECENTRALIZED NETWORK eliminates the obligatio11n of these outsider workers. These absolutely done between people groups like us and the traders without the obstruction of outsider or individuals&#39; name.<br />\r\nNote - It likewise eliminates the vulnerability of fakeness, racket, carrying, and confusion in continuous exchange.<br />\r\n<br />\r\nAs you would know, there are opportunities to get misrepresentation by these outsider as an individual premium in your cash on the grounds that as an issue of trust. You can&#39;t confide in every individual worker of the public authority who won&#39;t feel ravenousness towards your well deserved cash.<br />\r\nAlong these lines, utilizing cryptographic money technique in exchange eliminate the commitment of getting fakeness and sneaking, which is one of the significant favorable circumstances of bringing this innovation of scrambled cash into full presence.<br />\r\nWait.... till here it may propel you to quit perusing ahead. Will chip away at it. I for one recommend you perusing till the end. Since there are still left a ton to educate you concerning the insane going this patterns.<br />\r\n<br />\r\nIn the event that it is protected, at that point you need to know How ?<br />\r\n<br />\r\nTo play out any exchange in cryptographic money instead of genuine cash, to save your twofold spending on these outsider.<br />\r\nYou need to follow a few conventions so you can do the exchanges.<br />\r\nTo find out about the conventions/rules. Snap here.<br />\r\nalright ! I trust you comprehend the tale about digital money.</p>\r\n\r\n<p><br />\r\nThe amount Cryptocurrency is Secure ?<br />\r\nThere are various cryptographic forms of money accessible today. The absolute most famous digital money is -<br />\r\nBitcoin (BTC)<br />\r\nLitecoins (LTC)<br />\r\nEthereum (ETH)<br />\r\nZcash (ZEC)<br />\r\nRun<br />\r\nWave (XRP)<br />\r\nMonero (XMR)<br />\r\n<br />\r\nAs &quot;Cryptographic money&quot; presents itself.<br />\r\n<br />\r\n&#39;crypto&#39; signifies encode. Along these lines, this type of computerized money framework is encoded with s extraordinary sort of capacity/diagram called as the strategy for cryptography.<br />\r\nThis is an intricate organization engaged with digital currency make them hard to penetrate the security of cryptography.<br />\r\nIt employments of CSS that digital currency Security Standard to make sure about the chain of innovation such that programmers can not penetrate security without any problem.<br />\r\nStandard is a conventions which permit to use in fix strategy.<br />\r\nIndeed, it is protected to utilize.</p>', 'storage/posts/1735408078459898.jpg', 1, 'Roshan Kumar', 'Super Admin', 1, 25, NULL, '2022-06-12 00:38:33', '2022-06-12 03:12:56'),
(5, 'roshan_kumar', 'PUBG MOBILE INDIA SERIES 2020', 'pubg-mobile-india-series-2020', '<p><strong>A 2 min read to understand all about the PMIS 2020.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The second edition of PUBG MOBILE INDIA SERIES or the PMIS 2020 was announced by PUBG MOBILE. The tournament will have a grand prize pool of Rs.50 lac or Rs. 50,00,000. The registrations will commence from 6th of May on the official website of PUBG Mobile.</p>\r\n\r\n<p>Players can register for the tournament on the official website of&nbsp;<a href=\"https://www.sportskeeda.com/esports/pubg\" target=\"_top\">PUBG Mobile</a>&nbsp;India, and the full format of the competition has been announced on the official PUBG Mobile India YouTube channel.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The format of PMIS 2020 goes as follows :</p>\r\n\r\n<h3>Step 1 (Registration)</h3>\r\n\r\n<p>The players will have to register their whole squad on the official website on and from 6th May by filling up the required details, such as the in-game name, character ID, age, etc.</p>\r\n\r\n<p>The eligibility guidelines and other rules are yet to be announced, but will be out shortly on the website. All players will have to be citizens of India to participate in PMIS 2020.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>Step 2 (In-Game Qualifiers)</h3>\r\n\r\n<p>After the registrations, teams will participate in the PMIS 2020 in-game qualifiers, where they have to play a minimum of 10 and a maximum of 15 games. The ten games with the highest points will be counted for the final standings.</p>\r\n\r\n<p>The in-game qualifiers will go on for five days, and the top 248 teams will advance on to the next scene.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>Step 3 (First Phase of Qualifiers)</strong></h3>\r\n\r\n<p>This stage will feature the top 248 squads from the in-game qualifiers, along with the eight invited professional PUBG Mobile teams. The first phase of the qualifiers will go on for a total of five days, out of which the top 56 teams will advance to the succeeding stage- the quarter-finals.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>Step 4 (Quarter-Finals)</h3>\r\n\r\n<p>The 56 teams that qualify for the quarter-finals will join eight more professional PUBG Mobile teams, bringing the sum to 64 teams. These teams will battle against each other, and the top 32 teams on the ultimate points table will get their tickets to the semi-finals.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>Step 5 (Semi-Finals)</h3>\r\n\r\n<p>The top 32 teams from the quarter-finals will compete for a spot in the PUBG Mobile India Series 2020 Finals, and the best 16 teams with the highest points will get their slots for the final drama.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>Step 6 (Finals)</h3>\r\n\r\n<p>The 16 finalists will battle in the finals for the title and the massive prize pool of ?50,00,000. The tournament offers a big and prominent opportunity for the underdog teams to prove their worth and become popular among the PUBG Mobile fans.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Last year, in PMIS 2019, SouL uplifted the trophy, followed by God&#39;s Reign in second place. PUBG Mobile India Series 2019 turned out to be an event that gave rise to many professional teams, and this year&#39;s tournament is expected to follow suit in the same style.</p>', 'storage/posts/1735408121824924.jpg', 5, 'Roshan Kumar', 'Super Admin', 1, 0, NULL, '2022-06-12 00:39:14', '2022-06-12 00:55:43'),
(6, 'roshan_kumar', 'How to make Mango Mastani recipe', 'how-to-make-mango-mastani-recipe', '<p><strong>Mango Mastani recipe</strong></p>\r\n\r\n<p>Ingredients of Mango Mastani:</p>\r\n\r\n<p>1. Mango Slice(<strong>1.5 cup</strong>)</p>\r\n\r\n<p>2. Sugar(<strong>2 tbsp</strong>)</p>\r\n\r\n<p>3. Cream milk(<strong>1 cup</strong>)</p>\r\n\r\n<p>4. Vanilla ice cream</p>\r\n\r\n<p>5.&nbsp; Dry fruits(chopped)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Instructions:</strong></p>\r\n\r\n<p>1. Chop 2 to 3 mangoes about 1.5 cup.</p>\r\n\r\n<p>2. Add 2 tablespoon sugar to add taste if needed, to the mangoes and put it in the liquidizing jar and blend the ingredient till it become smooth.</p>\r\n\r\n<p>3.&nbsp; Then add 1 cup of cream milk and blend it again, now mango shake is done.</p>\r\n\r\n<p>4. Take some glasses put some sliced mago cubes in the glasses and add the mango shake upto 3/4th of the glass.</p>\r\n\r\n<p>5. Add 1 spoon of vanilla ice cream and put come mango cubes on top of the vanilla ice cream and put some dry fruits and candy coloured sprinkles over the mango cubes to add taste.</p>\r\n\r\n<p>7.Enjoy your shake!!!!!</p>', NULL, 9, 'Roshan Kumar', 'Super Admin', 1, 51, NULL, '2022-06-12 00:39:46', '2022-06-12 02:40:33'),
(7, 'roshan_kumar', 'Can You Answer This Tricky Questions?', 'can-you-answer-this-tricky-questions', '<p>Let&#39;s see who have so much intelligence!!!</p>\r\n\r\n<p>Drop your answers in the comment box....</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ol>\r\n	<li><strong>Suppose you are the owner of a shop. One day, someone stole a Rs 100 note from the shop. A week later the same person came and bought some good of Rs 30 and gave you the same 100 rupees note. What is the amount you will return to him?? How much loss do you have Rs 100 or Rs 200??</strong></li>\r\n	<li><strong>Complete this series of number:&nbsp; &nbsp; &nbsp; &nbsp;9 = 4, 21 = 9, 8 = 5, 7 = 5, 10 = 3, 99 = 10, 100 = 7, 16 = ?, 17 = ?</strong></li>\r\n	<li><strong>You have 9 identical coins. Only difference is the weight between those coins all coins have 1 gm except 1 which has 2 grams. You can weigh them only twice. How will you identify the odd one??</strong></li>\r\n	<li><strong>Combined price of a bat and a ball is Rs 220. If the cost of the bat is 200 more than the cost of the ball. What is the price of the ball??</strong></li>\r\n	<li><strong>How many times can you subtract 2 from 50?</strong></li>\r\n	<li><strong>If 30 is divided by half and add ten, what do you get?</strong></li>\r\n	<li><strong>If Thesera&#39;s daughter is my daughter&#39;s mother. Who am I to Thesera?</strong></li>\r\n	<li><strong>What&#39;s as big as an elephant but weighs absolutely nothing?</strong></li>\r\n	<li><strong>If Mr Smith&#39;s peacock lays an egg in Mr. Jonas yard, who owns the egg?</strong></li>\r\n	<li><strong>What do an island and the letter &#39;t&#39; have in common?</strong></li>\r\n</ol>', NULL, 4, 'Roshan Kumar', 'Super Admin', 1, 1, NULL, '2022-06-12 00:42:31', '2022-06-12 01:32:07'),
(8, 'raj_kumar', 'Lonely', 'lonely', '<p>In the crowd of our life,<br />\r\nWhen everyone is busy and tight,<br />\r\nNot even a second of their own,<br />\r\nIt&rsquo;s the time when I am lonely.</p>\r\n\r\n<p>When one feels that they need someone<br />\r\nIt&rsquo;s when I go to help the one.<br />\r\nBut being betrayed in return,<br />\r\nIt&rsquo;s then when I am lonely.</p>\r\n\r\n<p>Whether lonely or not;<br />\r\nIt&rsquo;s life where we go through a lot.<br />\r\nA life where we are alone,<br />\r\nAnd no one is beside us;<br />\r\nEscaping all the hurdles<br />\r\nReaching to our very goal.<br />\r\nMaking a journey alone,<br />\r\nTo reach the destiny.<br />\r\nBut someday when I look back and front<br />\r\nAll I see is that I am lonely.</p>', 'storage/posts/1735408467738373.jpeg', 8, 'Raj Kumar', 'Super Admin', 1, 30, NULL, '2022-06-12 00:44:44', '2022-06-12 00:55:48'),
(9, 'raj_kumar', 'Where can I get some?', 'where-can-i-get-some', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', NULL, 4, 'Raj Kumar', 'Super Admin', 1, 0, NULL, '2022-06-12 00:47:22', '2022-06-12 00:55:49'),
(10, 'raj_kumar', 'Why do we use it?', 'why-do-we-use-it', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', NULL, 3, 'Raj Kumar', 'Super Admin', 1, 0, NULL, '2022-06-12 00:48:11', '2022-06-12 00:55:50'),
(11, 'evan_kumar', 'How to be a good coder with entrepreneurial spirit?', 'how-to-be-a-good-coder-with-entrepreneurial-spirit', '<p>An entrepreneurial software engineer is someone who is passionate for his work &amp; applies top to bottom approach while solving a complex problem.</p>', 'storage/posts/1735408958798206.jpg', 6, 'Evan Kumar', 'Super Admin', 1, 20, NULL, '2022-06-12 00:52:32', '2022-06-12 00:55:52'),
(12, 'evan_kumar', 'Ask me Anything (AMA) with Yogesh Goyal (SDE @ Mylo, TIET alumnus)', 'ask-me-anything-ama-with-yogesh-goyal-sde-at-mylo-tiet-alumnus', '<p>Well, It totally depends on you, some take 3 months and some take about 5-6 months.&nbsp; You just take out 30-60 mins from your schedule initially and start learning the basics of c++ and after learning the basics, increase your time accordingly. Don&#39;t wait for a particular time to start learning c++.</p>', 'storage/posts/1735409005586050.jpg', 6, 'Evan Kumar', 'Super Admin', 1, 1, NULL, '2022-06-12 00:53:17', '2022-06-12 01:31:56'),
(13, 'evan_kumar', 'CodeStudio Library | Clone of an undirected graph', 'codestudio-library-clone-of-an-undirected-graph', '<p>Solution to Clone Graph:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>class Solution{ graphNode* cloneGraph(graphNode* node) { &nbsp; &nbsp;if (!node) &nbsp; &nbsp; &nbsp;return nullptr;</p>\r\n\r\n<p>&nbsp; &nbsp;queue&lt;graphNode*&gt; q{{node}}; &nbsp; &nbsp;unordered_map&lt;graphNode*, graphNode*&gt; map{{node, new graphNode(node-&gt;data)}};</p>\r\n\r\n<p>&nbsp; &nbsp;while (!q.empty()) { &nbsp; &nbsp; &nbsp;graphNode* u = q.front(); &nbsp; &nbsp; &nbsp;q.pop(); &nbsp; &nbsp; &nbsp;for (graphNode* v : u-&gt;neighbours) { &nbsp; &nbsp; &nbsp; &nbsp;if (!map.count(v)) { &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;map[v] = new graphNode(v-&gt;data); &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;q.push(v); &nbsp; &nbsp; &nbsp; &nbsp;} &nbsp; &nbsp; &nbsp; &nbsp;map[u]-&gt;neighbours.push_back(map[v]); &nbsp; &nbsp; &nbsp;} &nbsp; &nbsp;}</p>\r\n\r\n<p>&nbsp; &nbsp;return map[node]; &nbsp;}</p>\r\n\r\n<p>};</p>', NULL, 2, 'Evan Kumar', 'Super Admin', 1, 13, NULL, '2022-06-12 00:54:04', '2022-06-23 02:31:31');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', NULL, '2022-06-11 06:19:24', '2022-06-11 06:19:24'),
(2, 'Admin', NULL, '2022-06-11 06:19:24', '2022-06-11 06:19:24');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('g0vX7Vn0kJ2cTAQrbwcTin87tYBvUip9SYm1lPPO', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ3pJNWg4UUJHRUE1dk43TjRPUWxUYk9tQnd3SURrckZlQWxFQ3VIZyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fX0=', 1663417861),
('MrJIYRdeEY4FTyw3w98N3oaYfEIixrEyobsCivM9', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVzlBTHJiY1cwOWVBYW9HN1JaSlpIaVFkbnlKbVdDajZRZHgzOVJIViI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1663416431),
('WInvIIuogYpwPmZUm15vTpu9UEbNqg7Runt5UHeX', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieTRhc2MyQ053OERWekRRV09DMXZGbUxrbnRqb0s5VE42V0FxdjlNVCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTg6Imh0dHA6Ly9ibG9nYnVzLmNvbSI7fX0=', 1665304440);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fb_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `google_id`, `fb_id`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `mobile_number`, `experience`, `designation`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Roshan Kumar', 'roshan_kumar', 'evanxkumar@gmail.com', '2022-06-11 06:19:24', NULL, NULL, '$2y$10$emyWvfIkxzVN.1bJTgeHHOVJTUjOIHgYPV3PuDyUDzLrCprwdViqK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-11 06:19:24', '2022-06-11 06:19:24'),
(2, 'Raj Kumar', 'raj_kumar', 'rajkumarpanjiyara8@gmail.com', NULL, NULL, NULL, '$2y$10$EAJPu71GYoO9UVCLkASEfeLsHgN7pJABlxE7.51eS7XSVpA9NOwGe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-12 00:44:04', '2022-06-12 00:44:04'),
(3, 'Evan Kumar', 'evan_kumar', 'roshanpanziarya055@gmail.com', NULL, NULL, NULL, '$2y$10$gWckoWrGgDdPBNZ55MeOpuGXejvjRYnPUgHOc5VGuCW8pVlE/P4qO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-12 00:51:26', '2022-06-12 00:51:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_username_unique` (`username`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_upvotes_index` (`upvotes`),
  ADD KEY `comments_downvotes_index` (`downvotes`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_reads_index` (`reads`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

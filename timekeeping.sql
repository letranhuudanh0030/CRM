-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2021 at 11:10 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `timekeeping`
--

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`, `address`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Trey Glover', '216 O\'Hara Points\nEast Bellaport, ID 56223-4212', 1, '2021-01-28 03:01:36', '2021-01-28 03:01:36'),
(2, 'Alberto Smitham', '73656 Mraz Turnpike Suite 058\nEast Pearlie, FL 21558-0004', 1, '2021-01-28 03:01:36', '2021-01-28 03:01:36'),
(3, 'Mr. Arjun Wolf V', '59304 Christiansen Stream Suite 865\nAshtynshire, OR 26879-0605', 1, '2021-01-28 03:01:36', '2021-01-28 03:01:36'),
(4, 'Prof. Corrine Boehm DVM', '945 Lind Place\nWest Oren, HI 98609', 0, '2021-01-28 03:01:36', '2021-01-29 00:57:01'),
(9, 'Danh', 'Số 46, đường D15, KDC Việt Sing, An Phú, Thuận An, Bình Dương.', 1, '2021-02-04 00:09:29', '2021-02-04 00:09:29');

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` int(10) DEFAULT 0,
  `qty` int(11) DEFAULT 0,
  `status` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`id`, `name`, `type_id`, `qty`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Dr. Barton Hegmann', 1, 0, 1, '2021-01-28 03:01:36', '2021-01-28 03:01:36'),
(3, 'Katelin Pfeffer', 2, 0, 1, '2021-01-28 03:01:36', '2021-01-28 03:01:36'),
(4, 'Olin Kuhn', 3, 0, 1, '2021-01-28 03:01:36', '2021-01-28 03:01:36'),
(5, 'Daisy Christiansen', 0, 0, 0, '2021-01-28 03:01:36', '2021-01-29 00:47:16'),
(6, 'Ruby Braun', 0, 0, 1, '2021-01-28 03:01:36', '2021-01-28 19:51:58'),
(7, 'Wilfredo Wolf', 0, 0, 1, '2021-01-28 03:01:36', '2021-01-28 03:01:36'),
(8, 'Walter Leffler DDS', 0, 0, 1, '2021-01-28 03:01:37', '2021-01-28 03:01:37'),
(9, 'Prof. Anne Runte', 0, 0, 1, '2021-01-28 03:01:37', '2021-01-28 03:01:37'),
(10, 'Dorothy Schumm', 0, 0, 1, '2021-01-28 03:01:37', '2021-01-28 03:01:37'),
(11, 'Kirk Dach', 0, 0, 1, '2021-01-28 03:01:37', '2021-01-28 03:01:37'),
(12, 'Mr. Geoffrey Swaniawski', 0, 0, 1, '2021-01-28 03:01:37', '2021-01-28 03:01:37'),
(13, 'Delpha Zulauf 789', 0, 0, 1, '2021-01-28 03:01:37', '2021-01-29 01:42:01'),
(14, '3dds', 0, 0, 1, '2021-01-28 03:01:37', '2021-02-01 01:56:15'),
(15, 'asd', 0, 0, 1, '2021-01-28 03:01:37', '2021-02-01 01:56:10'),
(16, '123', 0, 0, 1, '2021-01-28 03:01:37', '2021-02-01 01:56:18'),
(18, 'Raphael Schoen', 0, 0, 1, '2021-01-28 03:01:37', '2021-02-01 01:53:46'),
(20, 'Prof. Hal Bechtelar V', 0, 0, 1, '2021-01-28 03:01:37', '2021-01-29 00:02:20'),
(31, 'test 1', 0, 0, 1, '2021-02-03 23:33:06', '2021-02-03 23:33:06'),
(42, 'test 2', 0, 0, 1, '2021-02-03 23:38:12', '2021-02-03 23:38:12'),
(43, 'test 3', 0, 0, 1, '2021-02-03 23:38:34', '2021-02-03 23:38:34'),
(44, 'test 3', 0, 0, 1, '2021-02-03 23:41:51', '2021-02-03 23:41:51'),
(45, 'test4', 0, 0, 1, '2021-02-03 23:44:07', '2021-02-03 23:44:07'),
(46, 'tst 5', 0, 0, 1, '2021-02-03 23:44:26', '2021-02-03 23:44:26'),
(47, 'txt 1', 0, 0, 1, '2021-02-03 23:51:17', '2021-02-03 23:51:17'),
(48, 'txt 12', 0, 0, 1, '2021-02-03 23:51:58', '2021-02-05 01:58:39'),
(49, 'test qwe', 1, 12, 1, '2021-02-05 01:59:00', '2021-02-05 02:00:19'),
(50, 'may game 1', 1, 5, 1, '2021-02-05 02:00:40', '2021-02-05 02:08:48');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `maintenances`
--

CREATE TABLE `maintenances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `device_id` int(10) DEFAULT NULL,
  `device_damaged` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `branch_id` int(10) UNSIGNED NOT NULL,
  `technicians_id` int(10) UNSIGNED NOT NULL,
  `result` int(11) DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `required_date` datetime DEFAULT NULL,
  `success_date` datetime DEFAULT NULL,
  `status` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `image_device_damaged` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_result` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `maintenances`
--

INSERT INTO `maintenances` (`id`, `device_id`, `device_damaged`, `user_id`, `branch_id`, `technicians_id`, `result`, `note`, `required_date`, `success_date`, `status`, `image_device_damaged`, `image_result`, `created_at`, `updated_at`) VALUES
(1, 2, 'Ullam necessitatibus dolor aliquam ut ullam. Dolor maiores ea repellat consequatur sit modi aut. Est reprehenderit dolorem nam velit eos. Sunt recusandae repellat consectetur minus repellat.', 10, 5, 10, 1, 'Consectetur perspiciatis alias neque aspernatur et. Fugit omnis doloremque odit aut voluptatibus autem. Excepturi non quis alias quidem et et. Ipsam deserunt magnam maxime fuga. Molestiae atque dicta ex sequi voluptas ad occaecati.', '2002-05-06 05:14:17', '1993-09-23 08:48:52', 1, NULL, NULL, '2021-01-28 03:01:37', '2021-01-28 03:01:37'),
(2, 3, 'Distinctio vitae aliquid quo maxime nulla distinctio. Qui perspiciatis dolorem deserunt cumque alias incidunt. Impedit vero ut accusantium dolorum cumque iure ea.', 2, 4, 6, 1, 'Minus minus aut non non molestiae. Illo quibusdam ut magnam quo dolor. Maiores molestias quod et numquam occaecati voluptas.', '1982-11-14 19:58:46', '2011-09-14 12:54:20', 1, NULL, NULL, '2021-01-28 03:01:37', '2021-01-28 03:01:37'),
(3, 14, 'Et distinctio commodi eos et aut cupiditate. Consequuntur maiores cupiditate rem. Ad ad sint a vero. Omnis rerum omnis porro fuga.', 5, 5, 12, 0, 'Ut itaque dolor facilis qui cupiditate sed ut et. Veniam non magnam dolores est.', '1971-06-24 07:22:29', '1991-05-09 06:56:01', 1, NULL, NULL, '2021-01-28 03:01:37', '2021-01-28 03:01:37'),
(4, 2, 'Est sit assumenda optio et omnis nisi nulla neque. Ut eius laborum quidem suscipit. Ut sint accusantium sed qui minus sint. Nihil aut quia voluptatibus.', 13, 4, 10, 2, 'Autem sunt nesciunt repellat fugiat et magni nobis. Voluptatem in labore perferendis fugiat inventore sit.', '2008-12-02 06:38:34', '1984-05-06 07:35:57', 1, NULL, NULL, '2021-01-28 03:01:37', '2021-01-28 03:01:37'),
(5, 20, 'Nulla magni ipsum possimus laboriosam tenetur velit quaerat. Reprehenderit sapiente amet tempora ex ullam perferendis cupiditate. Hic autem consequuntur eum velit quas ea voluptas.', 7, 4, 9, 0, 'Illo voluptatem maxime ullam aspernatur a. Et voluptas dicta consectetur dolorum. Voluptatem corrupti libero corrupti iste odio. Laborum deserunt qui veniam tempore cupiditate.', '2007-06-07 10:21:44', '1992-01-05 13:02:22', 1, NULL, NULL, '2021-01-28 03:01:37', '2021-01-28 03:01:37'),
(6, 6, 'Dolorem accusamus maxime amet. Debitis dolores omnis ab.', 2, 5, 11, 1, 'Eaque et sed et ut. Eos deserunt sit aut. Temporibus non voluptatem et expedita placeat at.', '2000-04-29 08:01:47', '2014-08-08 01:43:32', 1, NULL, NULL, '2021-01-28 03:01:37', '2021-01-28 03:01:37'),
(7, 14, 'Non qui qui ea eveniet et. Neque labore excepturi explicabo. Nam quis et qui autem error eum.', 12, 4, 5, 0, 'Nemo reiciendis omnis quia non. Praesentium fugiat rerum repellat aut dolorum impedit eum. Illum exercitationem et sed similique commodi eligendi beatae molestias. Laudantium iure omnis sit reprehenderit sapiente.', '1978-03-18 08:24:50', '2015-04-26 22:24:57', 1, NULL, NULL, '2021-01-28 03:01:37', '2021-01-28 03:01:37'),
(8, 1, 'Modi consequatur fugit similique quo non. Quia accusamus eum sapiente accusamus.', 15, 4, 8, 0, 'Quia sed sed aperiam. Consectetur perferendis excepturi rem sit cumque voluptatum. Itaque dolor sapiente nemo ex repellat sint numquam.', '1996-04-21 22:42:53', '1977-08-14 22:14:43', 1, NULL, NULL, '2021-01-28 03:01:37', '2021-01-28 03:01:37'),
(9, 12, 'Quis ut et est aut et velit. Amet voluptatibus inventore placeat delectus et excepturi. Rerum minima rerum architecto harum ipsam deleniti consequuntur.', 5, 3, 7, 0, 'Non est labore aspernatur nisi dolor. Aperiam et odio mollitia et dolores ex. Ea harum totam consequatur et vitae officiis. Quod est velit commodi rerum qui qui voluptatibus ex.', '1985-12-14 10:22:11', '1975-11-17 09:29:34', 1, NULL, NULL, '2021-01-28 03:01:37', '2021-01-28 03:01:37'),
(10, 19, 'Blanditiis quidem magnam rem voluptates dolores qui. Ratione nulla facere ut omnis incidunt possimus non. Voluptatibus ea ut ipsam possimus dolor.', 7, 4, 12, 2, 'Earum ea et deserunt nesciunt porro. Soluta qui impedit modi unde. Rerum corrupti et repudiandae. Tempora doloribus autem commodi eos assumenda.', '2007-09-30 11:22:05', '1972-04-27 11:56:34', 1, NULL, NULL, '2021-01-28 03:01:37', '2021-01-28 03:01:37'),
(11, 5, 'Itaque rerum minima tempore est ipsa. Nihil non quo nulla adipisci quo ipsum et provident. Est non consequatur laboriosam et.', 1, 1, 6, 0, 'Ut quidem saepe consequatur maiores eum minima. Et ut cumque id iste ut nulla. Nam animi ipsa magni necessitatibus optio cupiditate. Sunt maiores ut sit expedita sed.', '1998-07-02 09:20:03', '1993-11-27 03:21:33', 1, NULL, NULL, '2021-01-28 03:01:37', '2021-01-28 03:01:37'),
(12, 4, 'Amet rem dolorum officia eius asperiores molestiae similique voluptatum. Quia autem aliquid quas. Libero ea natus aut est. Repellat perferendis nesciunt quasi nobis omnis totam.', 1, 1, 9, 0, 'Accusamus eos ducimus laboriosam totam optio repellendus. Distinctio quas aspernatur perspiciatis. Perferendis recusandae minus tenetur facere id atque rem.', '1977-02-16 04:35:41', '1972-02-19 15:30:32', 1, NULL, NULL, '2021-01-28 03:01:38', '2021-01-28 03:01:38'),
(13, 11, 'Velit fugit autem in ipsum odit. Commodi nesciunt voluptatem et omnis et repudiandae. At unde voluptate nam deleniti fugiat repellendus quia sed. Nesciunt qui accusantium ullam iste.', 9, 5, 9, 0, 'At minima tempora excepturi saepe pariatur. Tempore sunt cumque rerum enim. Veritatis error rerum ea suscipit deserunt ea. Aliquid et rerum beatae repudiandae rem mollitia.', '1990-12-01 00:56:01', '2014-12-22 04:00:19', 1, NULL, NULL, '2021-01-28 03:01:38', '2021-01-28 03:01:38'),
(14, 5, 'Magni ab et incidunt aut et tenetur. Consequatur quia necessitatibus quia nisi. Hic rerum quia eaque eos consequatur et.', 11, 3, 15, 1, 'Exercitationem aliquam et id cumque. Et incidunt accusantium voluptate iusto debitis. Rem ratione dignissimos optio aut. Qui et exercitationem adipisci omnis nisi id veniam.', '1993-02-11 18:10:40', '1984-03-11 16:19:53', 1, NULL, NULL, '2021-01-28 03:01:38', '2021-01-28 03:01:38'),
(15, 4, 'Amet consequatur itaque odio neque. Dolorem corporis eveniet assumenda. Quod ut qui molestiae eum.', 10, 5, 7, 0, 'Delectus qui quo quia quae tempora vel accusamus. Velit fugiat delectus voluptas. Eum soluta dolor laboriosam.', '2009-10-12 12:33:45', '2011-11-15 01:41:53', 1, NULL, NULL, '2021-01-28 03:01:38', '2021-01-28 03:01:38'),
(16, 19, 'Molestiae in est ut enim. Expedita atque officiis a facilis repellendus. Voluptatem et voluptates necessitatibus non dolores doloribus velit.', 9, 3, 8, 0, 'Et molestiae dolor praesentium. Ex nihil aliquam explicabo laborum rerum tenetur laudantium harum. Dolor necessitatibus at eos doloribus consequatur et incidunt. Vitae ut ea nostrum incidunt neque velit perspiciatis.', '2020-10-28 02:15:05', '1986-03-29 05:49:37', 1, NULL, NULL, '2021-01-28 03:01:38', '2021-01-28 03:01:38'),
(17, 10, 'Fugiat unde assumenda natus vero quas. Placeat magni ducimus eum esse ipsam consequatur. Ipsam iure qui consequatur maxime fugit voluptatem.', 8, 5, 10, 2, 'Magni rem velit aut vel. Recusandae id deleniti cupiditate impedit veritatis. Ab ea ratione ut accusamus libero ullam. Qui repellat et aperiam consequuntur ut.', '2011-02-18 08:52:03', '1980-07-31 15:37:24', 1, NULL, NULL, '2021-01-28 03:01:38', '2021-01-28 03:01:38'),
(18, 12, 'Reprehenderit numquam consequatur sit rerum hic totam hic. Pariatur cumque voluptatibus aut ab. Dolore blanditiis nulla ducimus repellendus est. Quia nisi aut sit soluta. Beatae libero adipisci minima qui et.', 4, 2, 14, 0, 'Nisi est aut expedita animi. Sint voluptates impedit laudantium possimus et. Corrupti dolorem debitis quam nesciunt id voluptate et eaque. Error non aperiam ex maxime est.', '1978-09-20 22:58:46', '2013-08-02 05:29:06', 1, NULL, NULL, '2021-01-28 03:01:38', '2021-01-28 03:01:38'),
(19, 3, 'Fugit neque est ratione maxime. Soluta ratione aperiam quisquam. Consequuntur sequi quis eos et quia quae. Maxime in facilis ex minus accusamus eius.', 10, 2, 14, 0, 'Repellendus non aliquam nesciunt est. Eos deleniti cum vel culpa et voluptatem. Praesentium est eius praesentium ad.', '2016-07-07 03:59:53', '1970-02-26 18:07:02', 1, NULL, NULL, '2021-01-28 03:01:38', '2021-01-28 03:01:38'),
(20, 17, 'Porro consequatur ratione aspernatur a in. Omnis necessitatibus beatae atque sunt fugit. Natus asperiores porro nihil voluptatibus odio.', 6, 1, 6, 0, 'Atque autem et voluptates architecto ut voluptatem. Quasi illo earum quasi voluptatum perferendis dolore maiores quo. Nam repudiandae consequatur officiis doloribus consequatur vero.', '2002-09-03 00:11:59', '1986-10-06 15:08:17', 1, NULL, NULL, '2021-01-28 03:01:38', '2021-01-28 03:01:38'),
(21, 6, 'Architecto aut odit autem est odio eum. Rerum voluptate possimus corporis impedit magni. Numquam qui aut sequi est dolorum. Autem saepe exercitationem at quia sint tempora illo. Rerum nulla aut autem.', 8, 2, 2, 0, 'Vitae cum sequi natus voluptatem sint distinctio cupiditate. Dolorem omnis eveniet voluptatibus voluptates consequuntur voluptas fuga consectetur.', '1977-08-25 02:52:00', '2010-05-20 00:46:51', 1, NULL, NULL, '2021-01-28 03:01:38', '2021-01-28 03:01:38'),
(22, 1, 'Nostrum id consequuntur blanditiis excepturi qui. Harum et quia tenetur vitae tempore autem nesciunt facere. Consectetur quas non distinctio sint nisi.', 4, 4, 10, 1, 'Dolor laudantium rem vel ut numquam sunt. Est minus eos consequuntur occaecati hic cumque eius. Nihil officiis quo et ex provident. Quia id sed dolor enim nisi similique delectus saepe.', '2004-08-26 19:30:57', '2009-06-26 13:00:15', 1, NULL, NULL, '2021-01-28 03:01:38', '2021-01-28 03:01:38'),
(23, 3, 'Iusto eligendi culpa consequatur. Ducimus soluta labore reprehenderit animi libero consequatur. Nostrum quas incidunt voluptatem assumenda aut.', 14, 1, 7, 2, 'Aut pariatur quia qui nobis officia non itaque. Error architecto modi inventore. Ipsa accusamus ea laudantium tenetur soluta. Repudiandae sed ut nostrum excepturi expedita sequi.', '1987-09-12 18:13:04', '1986-04-16 15:39:11', 1, NULL, NULL, '2021-01-28 03:01:38', '2021-01-28 03:01:38'),
(24, 12, 'Voluptates dolor aut rerum sunt debitis explicabo rerum. Commodi repellat eius sunt et qui doloribus. Nesciunt autem maxime a. Quam inventore sit impedit culpa.', 12, 4, 9, 0, 'Corporis aperiam modi optio. Dolores aut doloribus laborum quo aut eos adipisci. Illo dolorum est quia animi eveniet. Quia iste aut et at est.', '1975-09-14 03:40:22', '1989-10-06 08:39:37', 1, NULL, NULL, '2021-01-28 03:01:38', '2021-01-28 03:01:38'),
(25, 5, 'Nostrum repudiandae voluptatibus veniam nihil consequatur. Et aut aliquam quae adipisci et. Esse nisi qui itaque similique ratione mollitia. Quisquam cum expedita nobis eos perspiciatis.', 10, 2, 8, 2, 'Sunt neque occaecati officiis omnis. Officiis eos deleniti pariatur quod autem quibusdam. Qui atque voluptas et et excepturi modi culpa. Asperiores quam maiores delectus consequuntur.', '1995-01-08 22:48:58', '1973-04-12 02:40:06', 1, NULL, NULL, '2021-01-28 03:01:38', '2021-01-28 03:01:38'),
(26, 13, 'Vero similique itaque in pariatur sunt aut. Voluptas reprehenderit quidem et. Numquam incidunt nesciunt assumenda molestiae corrupti. Qui ab ipsum molestiae placeat. Accusamus quod vitae pariatur et voluptate.', 9, 2, 9, 0, 'Corrupti sint iste et placeat aut. Minus et velit in ab. Dolorem qui omnis necessitatibus sed. Qui voluptatem earum dolor magnam harum et facere ut.', '1989-10-27 20:11:41', '1997-02-03 08:23:49', 1, NULL, NULL, '2021-01-28 03:01:38', '2021-01-28 03:01:38'),
(27, 3, 'Assumenda rerum fugit veritatis iusto autem iste vel. Sapiente deserunt quam magni aliquam. Porro omnis amet cum sint qui. Dolorem inventore illo aut porro quaerat voluptatum.', 10, 4, 6, 0, 'Veritatis earum quisquam aliquid expedita ex. Eligendi neque et qui quam repellendus. Cum vitae aut ipsum dolore et maxime voluptas.', '1992-10-18 08:06:13', '2018-03-02 08:26:48', 1, NULL, NULL, '2021-01-28 03:01:38', '2021-01-28 03:01:38'),
(29, 12, 'Voluptatibus ullam blanditiis animi laboriosam laudantium officia. Assumenda magnam quas dolorum qui cupiditate et sint. Minus velit et at natus similique.', 1, 1, 9, 1, 'Vel qui dolore magni ut natus tenetur. Iste suscipit consectetur similique at. Et et rerum maxime qui pariatur aspernatur. Ipsam eum nam laudantium repudiandae.', '1971-09-18 12:32:45', '2014-07-16 02:37:50', 1, NULL, NULL, '2021-01-28 03:01:38', '2021-01-28 03:01:38'),
(35, 1, '<p>drtghdfghdfghdfgh</p>', 17, 9, 5, 2, '<p>dfghdfghdfg</p>', '2021-04-02 14:46:20', '2021-04-02 14:46:21', 1, NULL, NULL, '2021-02-04 00:46:28', '2021-02-04 00:46:28');

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
(81, '2014_10_12_000000_create_users_table', 1),
(82, '2014_10_12_100000_create_password_resets_table', 1),
(83, '2019_08_19_000000_create_failed_jobs_table', 1),
(84, '2021_01_27_033450_create_devices_table', 1),
(85, '2021_01_27_033924_create_branches_table', 1),
(86, '2021_01_27_035334_create_permissions_table', 1),
(87, '2021_01_27_040541_create_maintenances_table', 1);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` smallint(5) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Quản lý', 1, '2021-01-28 03:01:35', '2021-02-01 00:58:06'),
(2, 'Kỹ thuật', 1, '2021-01-28 03:01:35', '2021-02-03 20:39:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `permission_id`, `phone`, `email`, `email_verified_at`, `password`, `remember_token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Matteo Mann', 1, '+5534434883103', 'botsford.mona@example.net', '2021-01-28 03:01:35', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'lTGoMHCUZ2', 1, '2021-01-28 03:01:35', '2021-01-28 03:01:35'),
(2, 'Prof. Adrain Bernhard IV', 1, '+9253369987403', 'manuela.ernser@example.org', '2021-01-28 03:01:35', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'JM4mzZJfmK', 1, '2021-01-28 03:01:35', '2021-01-28 03:01:35'),
(3, 'Annamarie Bashirian', 2, '+9130357597160', 'elaina.hagenes@example.org', '2021-01-28 03:01:35', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'tGD7gaFBac', 1, '2021-01-28 03:01:35', '2021-01-28 03:01:35'),
(4, 'Mr. Arnoldo Bogisich', 2, '+2962757719680', 'ransom.mante@example.net', '2021-01-28 03:01:35', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0Imml53NAb', 1, '2021-01-28 03:01:35', '2021-01-28 03:01:35'),
(5, 'Prof. Odie Block', 1, '+1226754852412', 'raven.farrell@example.net', '2021-01-28 03:01:35', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'FsWg5JmKRC', 1, '2021-01-28 03:01:35', '2021-01-28 03:01:35'),
(6, 'Elsa Rau', 1, '+3205497038527', 'zrice@example.org', '2021-01-28 03:01:35', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2D00AkOBuk', 1, '2021-01-28 03:01:35', '2021-01-28 03:01:35'),
(7, 'Ms. Gloria Welch II', 2, '+8275527986509', 'trever01@example.org', '2021-01-28 03:01:35', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '6XBgBm0XnA', 1, '2021-01-28 03:01:35', '2021-01-28 03:01:35'),
(8, 'Ms. Leonora Satterfield', 2, '+1664398179102', 'rachel52@example.org', '2021-01-28 03:01:35', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 't1V7NAIRX1', 1, '2021-01-28 03:01:36', '2021-01-28 03:01:36'),
(9, 'Jolie Fisher', 2, '+9425422368395', 'jbrown@example.org', '2021-01-28 03:01:35', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '6YFPNMxnLo', 1, '2021-01-28 03:01:36', '2021-01-28 03:01:36'),
(10, 'Shea Connelly I', 2, '+4771578097882', 'fernser@example.org', '2021-01-28 03:01:35', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'oKxAJ0vt7l', 1, '2021-01-28 03:01:36', '2021-01-28 03:01:36'),
(11, 'Camren Spinka II', 2, '+7670114748490', 'adelle.swift@example.org', '2021-01-28 03:01:35', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'CMa6xeYlEv', 1, '2021-01-28 03:01:36', '2021-01-28 03:01:36'),
(12, 'Miss Arielle Denesik', 2, '+9088644986167', 'ccollins@example.com', '2021-01-28 03:01:35', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'vgG1Ncq4lI', 1, '2021-01-28 03:01:36', '2021-01-28 03:01:36'),
(13, 'Stevie Feil', 2, '+4737760454726', 'madonna.heaney@example.net', '2021-01-28 03:01:35', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'LhTo4epS6o', 1, '2021-01-28 03:01:36', '2021-01-28 03:01:36'),
(14, 'Bettie Lueilwitz', 2, '+3951671221493', 'abbie71@example.org', '2021-01-28 03:01:35', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'imfIOmzRVb', 1, '2021-01-28 03:01:36', '2021-01-28 03:01:36'),
(16, 'Kỹ thuật', 2, '096666666', 'danh.nambo@gmail.com', NULL, '$2y$10$Kx48vkvBraHSKBqNQVvFlOE2dQOgoCA1Pc65aLWJJMw5Sun8k2Fa2', NULL, 1, '2021-02-02 01:20:07', '2021-02-03 00:43:35'),
(17, 'Danh admin', 1, '0966666666', 'admin@gmail.com', NULL, '$2y$10$Wd6rVaByvg5Nbz43dfaaA.kP9kzZzkL0kT2S90bbcp4HIqAOrhKau', NULL, 1, '2021-02-03 20:33:10', '2021-02-03 21:20:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maintenances`
--
ALTER TABLE `maintenances`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `maintenances`
--
ALTER TABLE `maintenances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

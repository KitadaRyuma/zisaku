-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2023-02-26 07:26:34
-- サーバのバージョン： 10.4.27-MariaDB
-- PHP のバージョン: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `mahjongs`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `comments`
--

CREATE TABLE `comments` (
  `id` int(10) NOT NULL,
  `title` varchar(10) NOT NULL,
  `comment` varchar(50) NOT NULL,
  `recommended` varchar(50) NOT NULL,
  `point_of_concern` varchar(10) NOT NULL,
  `review` int(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `comments`
--

INSERT INTO `comments` (`id`, `title`, `comment`, `recommended`, `point_of_concern`, `review`, `created_at`, `updated_at`) VALUES
(17, 'test', 'test', 'test', 'test', 3, '2023-02-26 14:17:45', '2023-02-26 14:17:45'),
(18, 'b', 'b', 'b', 'b', 1, '2023-02-26 14:18:28', '2023-02-26 14:18:28');

-- --------------------------------------------------------

--
-- テーブルの構造 `goods`
--

CREATE TABLE `goods` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `comment_id` int(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `stores`
--

CREATE TABLE `stores` (
  `id` int(10) NOT NULL,
  `area_id` int(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(10) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `station` varchar(10) NOT NULL,
  `business_hours` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `stores`
--

INSERT INTO `stores` (`id`, `area_id`, `name`, `address`, `tel`, `station`, `business_hours`, `created_at`, `updated_at`) VALUES
(1, 1, 'aaaa', 'kokkk', '0000000000', 'kokkk', '0:00~4:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 2, 'bbbb', 'cccc', '1111111111', 'dddd', '1:00~5:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 1, 'cccc', 'dddd', '2222222222', 'eeee', 'ffff', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 1, '終わり', '渋谷', '1112222333', '渋谷', '0:00~9:00', '2023-02-25 21:40:30', '2023-02-25 21:40:30'),
(9, 1, '終わり', '渋谷', '1112222333', '渋谷', '0:00~9:00', '2023-02-25 21:41:19', '2023-02-25 21:41:19'),
(10, 1, '終わり', '渋谷', '1112222333', '渋谷', '0:00~9:00', '2023-02-25 21:43:35', '2023-02-25 21:43:35'),
(11, 1, '終わり', '渋谷', '1112222333', '渋谷', '0:00~9:00', '2023-02-25 21:47:50', '2023-02-25 21:47:50');

-- --------------------------------------------------------

--
-- テーブルの構造 `stores_comments`
--

CREATE TABLE `stores_comments` (
  `id` int(10) NOT NULL,
  `store_id` int(10) NOT NULL,
  `comment_id` int(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `stores_comments`
--

INSERT INTO `stores_comments` (`id`, `store_id`, `comment_id`, `created_at`, `updated_at`) VALUES
(13, 1, 17, '2023-02-26 14:17:45', '2023-02-26 14:17:45'),
(14, 2, 18, '2023-02-26 14:18:28', '2023-02-26 14:18:28');

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` int(1) NOT NULL,
  `residence` varchar(50) NOT NULL,
  `role` int(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `gender`, `residence`, `role`, `created_at`, `updated_at`) VALUES
(12, '隆馬', 'excariver0807@gmail.com', '$2y$10$kWlSK2asrMUGfsRoYJUmGeMF8bx0cVdeT4oUyX0O6oqlSA127s2/6', 0, '9', 0, '2023-02-19 16:01:40', '2023-02-19 16:01:40'),
(14, 'ryuma', 'r.kitada.carecon@gmail.com', '$2y$10$239kQmeZMGpWRJahKRAJ.eAJtmyHVZcsHM7e7l1KSgmEk.HIZKoC2', 0, '23', 1, '2023-02-23 10:28:06', '2023-02-25 00:25:29'),
(18, '確認', 'kakunin@gmail.com', '$2y$10$qv5TJipkry9Mvqoth9qWa.nHLpIhHSGEr2X/jB2kev5xj2w8bnVNK', 0, '1', 0, '2023-02-25 20:12:31', '2023-02-25 20:12:31');

-- --------------------------------------------------------

--
-- テーブルの構造 `users_comments`
--

CREATE TABLE `users_comments` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `comment_id` int(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `users_comments`
--

INSERT INTO `users_comments` (`id`, `user_id`, `comment_id`, `created_at`, `updated_at`) VALUES
(16, 14, 17, '2023-02-26 14:17:45', '2023-02-26 14:17:45'),
(17, 14, 18, '2023-02-26 14:18:28', '2023-02-26 14:18:28');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `stores_comments`
--
ALTER TABLE `stores_comments`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `users_comments`
--
ALTER TABLE `users_comments`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- テーブルの AUTO_INCREMENT `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- テーブルの AUTO_INCREMENT `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- テーブルの AUTO_INCREMENT `stores_comments`
--
ALTER TABLE `stores_comments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- テーブルの AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- テーブルの AUTO_INCREMENT `users_comments`
--
ALTER TABLE `users_comments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

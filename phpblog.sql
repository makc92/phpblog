-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 15 2019 г., 16:32
-- Версия сервера: 5.6.38
-- Версия PHP: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `phpblog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'php'),
(2, 'javascript');

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `id_category` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `id_category`, `date`) VALUES
(4, 'lorem 1', 'lorem 1 lorem 1 lorem 1 lorem 1 lorem 1 lorem 1 lorem 1 lorem 1 lorem 1 lorem 1 lorem 1 lorem 1 lorem 1 ', 1, '2019-01-14 07:35:24'),
(5, 'lorem 2', 'lorem 2 lorem 2 lorem 2 lorem 2 lorem 2 lorem 2 lorem 2 lorem 2 lorem 2 lorem 2 lorem 2 lorem 2 lorem 2 lorem 2 lorem 2 lorem 2 ', 2, '2019-01-14 07:35:37');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(249) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(2) UNSIGNED NOT NULL DEFAULT '0',
  `verified` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `resettable` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `roles_mask` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `registered` int(10) UNSIGNED NOT NULL,
  `last_login` int(10) UNSIGNED DEFAULT NULL,
  `force_logout` mediumint(7) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `username`, `status`, `verified`, `resettable`, `roles_mask`, `registered`, `last_login`, `force_logout`) VALUES
(30, 'asd@mail.ru', '$2y$10$PHYQ1c4AchaF42GWZ0AjNu7675SDhbTmvL6i8.1iG9iVNeRxaoqFK', 'asd', 0, 1, 1, 0, 1547557813, NULL, 0),
(28, 'makc@mail.ru', '$2y$10$sEMN/fnd3zLnDmC0Zt/.Oea6d.ZUAeDN/BMQAp86Xxf2wTJO.sSWm', 'makc', 0, 1, 1, 0, 1547557778, NULL, 0),
(29, 'qwe@mail.ru', '$2y$10$5CWXCVxxsJaquFYehf2QiOjvVJXmA2qzSljNOWyNUA91YiQ1jVVVm', 'qwe', 0, 1, 1, 0, 1547557796, NULL, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users_confirmations`
--

CREATE TABLE `users_confirmations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `email` varchar(249) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selector` varchar(16) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `expires` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users_confirmations`
--

INSERT INTO `users_confirmations` (`id`, `user_id`, `email`, `selector`, `token`, `expires`) VALUES
(1, 1, 'makc@mail.ru', 'JFt8JC1QZK5VgWmO', '$2y$10$FPdZJunuiIcLxmkCZDDX2uRk0foZI5VG6kWXDGGMKymfpLQoFzaSu', 1547619258),
(11, 11, 'asdfas@dasd.er', 'w_tRzso9fQIBKape', '$2y$10$CbDfWcc1t3vXXaii0fMA0uGNWu51Dsz5yUMhJsRC1f5eD/aD7la0C', 1547623755),
(10, 10, 'kjsadhfjk@aklsjdf.er', 'xMmEgqU__vClUk00', '$2y$10$PPuBBfzqBX1tRFT4ryUcQOJFIeW2AekGlu1kKJYCTbR/fwkk1fOBK', 1547623662),
(9, 9, 'vzxcv@asd.we', 'S8NNSDxUiq-uP6ju', '$2y$10$Ji7HwAlQtK6sLUJckV3buuEW3M5uxXRf6keD54oLb1X7IaYssVziS', 1547623622),
(8, 8, 'xcvb@zxc.er', 'QovS8iBPRnqgCZe3', '$2y$10$4r170szY3Jc/2PC.xdl3XuZX2d7pyCt0B7vlmD2ZXixgvrlG0MUfi', 1547623567),
(7, 7, 'qwe@qwe.qwe', 'WwAMzSesoae_1-BZ', '$2y$10$jGD4PAt0YpF/XlEJzlrmmeQfuOf/gcKgucb2p9KJrqkGemiOKFgQ2', 1547623241),
(12, 12, 'fasdf@asd.asd', '8Oi0G7qbSX2H_oaY', '$2y$10$cfoMAkcWse43J9y8BMzfd.r4dq1JYqg1ygb.YntZYUgqIirOds38.', 1547623912),
(13, 13, 'qwe@qwe.qwe', 'KpLar6Q0XMALjUc4', '$2y$10$QePTEGatMbaFNOj9sjr50OIeu.dTBIKm.8nCE2k/EBw0tPsphwUgK', 1547624019),
(14, 14, 'asd@asd.asd', 'nit7ImXN_8LyU2XZ', '$2y$10$oGBgu/mtlL22kzO9ur7kOO./ZPdF/5OJuafQQ2ATktJc.UhRQjyUK', 1547624555),
(15, 15, 'gsdfg@ads.asd', '3JaCGPbqFk81zfR_', '$2y$10$9rRz.HNsFhvIVLzqr9gG3efMiCKX.StmkVdONdx1TN2Hjq6xNctU.', 1547624758),
(16, 16, 'asdf@asd.wqe', 'HaIbyXLcyOk8vFIl', '$2y$10$IcCB/CnA859TkiBXlQjVNukVwd.5AxTHo0WNyblgsEm31tY4vHmxe', 1547624813),
(17, 17, 'agsd@jfhsa.er', 'B3s0FbHDdP1Akd0N', '$2y$10$xOFUISrg9qbK6nJZ.Qqs4.Nuc5Usx5Gaun9A2H/cvYBBP3t4e9gJq', 1547624967),
(18, 18, 'asd@dasd.qwe', 'mJ0M5ZsURPMn2nO1', '$2y$10$ymBiqZa8whw30yJVaXaA4uEw0PXDp3WrlQ33upon3Pzw.nDgrFR1e', 1547627823),
(19, 19, 'asdasd@asd.asd', '7Jz09g1XioakBVcY', '$2y$10$0RphrXHtOww3.mu8H95NGOmtYWNGHS.6DPW.EfDUvKj1ZC8ocGCtW', 1547631856),
(20, 20, 'fhafjh@adksjd.ewe', 'B9FIhzHdIlMvEdVa', '$2y$10$8uSDOR3/rExndi9C48EFGeopLrbzMjuSfKaJfHvSyL5mwkrZc031a', 1547631943),
(21, 21, 'jhgkjsdhg@jhfsdkjf.rew', 'e6zYkQMQS3EeoKhY', '$2y$10$ZkhyozDyMWRL5pVYSrnxXu44LaHFreg3gCWXXrOvTsVR.49EwYLcS', 1547632001),
(22, 22, 'gsdfgdsfg@ads.wer', 'rZuC0TE30YwES9Mz', '$2y$10$wr/ALB8MPaGGnZOwgA5/U.L1xkXcTCqp.IHfIRZN.5VM.4DmAKcsO', 1547632097),
(23, 23, 'zxcmvmnasd@dasd.asd', 'xFK2z_A9WbyqV3G7', '$2y$10$pnuyUQL1/WG86rnby9AHou5NOwDLTbmhriql/qT916mY7z7rILUs6', 1547632273),
(24, 24, 'sdfgdsfgdsfgdsfg@asdasd.asd', 'y81Ufc8FqoBoRlco', '$2y$10$PD0BJpGOxhpKB3YP7wjFFO.ER0ily0xyIle2Pti.ixxs9kYmq.aEm', 1547632448),
(25, 25, 'hdfhd@afsdf.sdf', 'sG3T-HI_RuaHF2Xq', '$2y$10$avnwsae7uR7OCzmxUav/VOlbExtwkqv9x8RLDXJ0POcoWPehrwX/O', 1547632890),
(26, 26, 'kjhkhghj@asd.asd', '9-a0xtY5mBOeZVVf', '$2y$10$cARUnptSGieq6pDPdLIlROzbDmuN/KIluozXqWiFEj/G2KisV3V6.', 1547632985),
(27, 27, 'fasdfasdfasdf@adsdasd.ewr', 'k2KjumR7pmieNMto', '$2y$10$r4PXoSOSsXEYmYa.Ab0hPOQ4XJGOuztzHqOGmNb1YHvu/3cRyeqsq', 1547633058);

-- --------------------------------------------------------

--
-- Структура таблицы `users_remembered`
--

CREATE TABLE `users_remembered` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` int(10) UNSIGNED NOT NULL,
  `selector` varchar(24) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `expires` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users_resets`
--

CREATE TABLE `users_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` int(10) UNSIGNED NOT NULL,
  `selector` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `expires` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users_throttling`
--

CREATE TABLE `users_throttling` (
  `bucket` varchar(44) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `tokens` float UNSIGNED NOT NULL,
  `replenished_at` int(10) UNSIGNED NOT NULL,
  `expires_at` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users_throttling`
--

INSERT INTO `users_throttling` (`bucket`, `tokens`, `replenished_at`, `expires_at`) VALUES
('PZ3qJtO_NLbJfRIP-8b4ME4WA3xxc6n9nbCORSffyQ0', 2.00078, 1547557816, 1547989816),
('QduM75nGblH2CDKFyk0QeukPOwuEVDAUFE54ITnHM38', 72.0097, 1547557813, 1548097813),
('HIJQJPUQ2qyyTt0Q7_AuZA0pXm27czJnqpJsoA5IFec', 46.0278, 1547558829, 1547630829),
('QG-7mhO6KMAQVd27hY19XX1a63Bor0g5I5PFXNbxqNI', 29, 1547558809, 1547630809),
('py90jzaAqDRiDAr0XWq5MjGK_KelKoHOrEMJ_uKYlZE', 29, 1547558809, 1547630809),
('4gxBREtskFv7o_SFffe5pLdRPlNHI77zMSIjB-lGPJU', 29, 1547558821, 1547630821),
('dcskyzwyM3DXnSO8Rf6tWJDio42bE6PSoyLWrpd52zQ', 29, 1547558821, 1547630821),
('ZBi7ZuER6U942tIQnE1nMToWAP8X3_Ai7GcgMbKNQOg', 29, 1547558826, 1547630826),
('kIndTbNCmdqZu5JnLxHJS2eH0a44A3z6pyTtfRIA6mU', 29, 1547558826, 1547630826),
('KONb0ODRyJg8nWziLW3ZngynFkFk-ctRVHSM6bM6fiM', 29, 1547558829, 1547630829),
('rcEo_Pafe5FWvV3LeLKNCvOv364xs0EOO6V5iXO_YZI', 29, 1547558829, 1547630829);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Индексы таблицы `users_confirmations`
--
ALTER TABLE `users_confirmations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `selector` (`selector`),
  ADD KEY `email_expires` (`email`,`expires`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `users_remembered`
--
ALTER TABLE `users_remembered`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `selector` (`selector`),
  ADD KEY `user` (`user`);

--
-- Индексы таблицы `users_resets`
--
ALTER TABLE `users_resets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `selector` (`selector`),
  ADD KEY `user_expires` (`user`,`expires`);

--
-- Индексы таблицы `users_throttling`
--
ALTER TABLE `users_throttling`
  ADD PRIMARY KEY (`bucket`),
  ADD KEY `expires_at` (`expires_at`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT для таблицы `users_confirmations`
--
ALTER TABLE `users_confirmations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT для таблицы `users_remembered`
--
ALTER TABLE `users_remembered`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users_resets`
--
ALTER TABLE `users_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

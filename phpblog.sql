-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 30 2019 г., 21:46
-- Версия сервера: 5.6.37
-- Версия PHP: 7.1.7

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
  `image` varchar(255) NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `image`, `id_category`, `id_user`, `date`) VALUES
(18, 'Post1', 'fsad fas df sadfasdfasd fasdf', '5c5181da7b333.jpg', 2, 28, '2019-01-30 10:52:10'),
(19, 'f asdf asdf sadf ', '12341234123412341234', '5c5181e967621.jpg', 1, 28, '2019-01-30 10:52:25'),
(20, 'Title3', 'asd asdasdas das d', '5c518210540b7.jpg', 2, 28, '2019-01-30 10:53:04'),
(21, 'чмситмитс', 'пывпывапывап', '5c51a481af982.jpg', 1, 28, '2019-01-30 13:20:02');

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
(30, 'asd@mail.ru', '$2y$10$PHYQ1c4AchaF42GWZ0AjNu7675SDhbTmvL6i8.1iG9iVNeRxaoqFK', 'asd', 0, 1, 1, 0, 1547557813, 1548844762, 0),
(28, 'makc@mail.ru', '$2y$10$WYdUdRB1kqqLolNNgnu4meH5yMiIDLbz8QwWK3WcdsEOhIk2qX756', 'makc', 0, 1, 1, 0, 1547557778, 1548861137, 3),
(29, 'qwe@mail.ru', '$2y$10$5CWXCVxxsJaquFYehf2QiOjvVJXmA2qzSljNOWyNUA91YiQ1jVVVm', 'qwe', 0, 1, 1, 0, 1547557796, NULL, 0),
(31, 'gsdfgsdf@vdsfsadgsdag.wer', '$2y$10$tBSEE4hk7a29kboXVGir3Oc4T.Ls3NsX/wMBhh3wKYsG8bTA2jAHu', 'gsdfg', 0, 0, 1, 0, 1547641421, NULL, 0),
(32, 'hjklh@asdfsdaf.er', '$2y$10$hfMCbiImOkg/mzWwyICEmOTn.bStusCdjKGkWsj.tDzaOubpver9.', 'lhjkljk', 0, 0, 1, 0, 1547641496, NULL, 0),
(33, 'ytiyui@fasdfasdf.ert', '$2y$10$TL5Q7ebz7Rq3YzJDHMmK4ufZbWYYuxD0BGb8n2G275oi9IbVXyQw6', 'ytiyui', 0, 0, 1, 0, 1547641682, NULL, 0),
(34, 'proweb@proweb.uz', '$2y$10$rhvKvcWToX.3HdX9pJYCYOHAbERC1t16M2IBoZJzvqwHfd8XUp2h6', 'proweb', 0, 1, 1, 0, 1547642098, NULL, 0),
(35, 'asdasd@asdasd.asdasd', '$2y$10$Jmpwpdzwsju.3fdzvYsutOqndwIQfoEcIkUhLjdM8/xtQ8OnfaCaa', 'asdasd', 0, 1, 1, 0, 1547642331, NULL, 0),
(36, 'olga@mail.ru', '$2y$10$VX3ev8Vb9kgIOpByHBOR7O5Dx8iJjY9B0oRJmeMAIDmJWuKibMkkK', 'olga', 0, 1, 1, 0, 1547660576, 1547660617, 0),
(37, 'test@mail.ru', '$2y$10$966YyuGhq9lbQM.QZgO2me.1dw6x9T.kTgxNUvxq5kqma7N3.Dz/m', 'test', 0, 1, 1, 0, 1547997843, 1548844712, 2);

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
(27, 27, 'fasdfasdfasdf@adsdasd.ewr', 'k2KjumR7pmieNMto', '$2y$10$r4PXoSOSsXEYmYa.Ab0hPOQ4XJGOuztzHqOGmNb1YHvu/3cRyeqsq', 1547633058),
(31, 31, 'gsdfgsdf@vdsfsadgsdag.wer', 'C7JL_QDxSBMJ4oMl', '$2y$10$/ZwEWvKlErl.Y67E8nPwtu5c.nhTjpestnjwjKKVIcbOi43WRH7KC', 1547727821),
(32, 32, 'hjklh@asdfsdaf.er', 'Yp0L0Nvdc245ZaSo', '$2y$10$sEEv9ecodZt3.SErTVJB1egc/hV5oUcmCC20sY3ZNJBunO/ZsAY/u', 1547727896),
(33, 33, 'ytiyui@fasdfasdf.ert', 'MjTkP4V7ThljiiDT', '$2y$10$4R/XlmzRREYr8LNvxnC2pu.aIzHZHsIxPapa1RvYZ.ao7gE026gFm', 1547728082),
(38, 37, 'test2@mail.ru', 'iwNT0DDDv_APprUg', '$2y$10$baPlJYzqwoVZ2RZSQHbfruKnH2EqbSfaTlHI001nW6ZjRIkp8FcOW', 1548086081);

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
('A0A62BeNURwZbSF8Rxv-TzUWbVt6NPzF9QrOSqqzqgQ', 499, 1548010254, 1548183054),
('OMhkmdh1HUEdNPRi-Pe4279tbL5SQ-WMYf551VVvH8U', 19, 1548010254, 1548046254),
('3VrMU354Y_uVX22KD-pensoGyl9P8xi0fs5YhJZGrOk', 9.13587, 1548010270, 1548039069),
('TtYa9X6HiS1U2DKfuOZhosly5Dbf5aZF7rjJPiifsOA', 29, 1548008556, 1548080556),
('FY0mdk_Zc9uo9YWp72vETD_XQV320qsXZlsKz6_0sgI', 29, 1548008556, 1548080556),
('HIJQJPUQ2qyyTt0Q7_AuZA0pXm27czJnqpJsoA5IFec', 49, 1548008556, 1548080556),
('jfCOXazRUbLWJ9PO_tkVMERNYPXGzrW5FkUrTUtrx-I', 0, 1548008545, 1548181345),
('4SIEqVSrUfbHDykIMNzQgj4bibgxQ9QnYLpxlq-85Dk', 2, 1548008545, 1548526945),
('QduM75nGblH2CDKFyk0QeukPOwuEVDAUFE54ITnHM38', 74, 1548861137, 1549401137);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT для таблицы `users_confirmations`
--
ALTER TABLE `users_confirmations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT для таблицы `users_remembered`
--
ALTER TABLE `users_remembered`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `users_resets`
--
ALTER TABLE `users_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

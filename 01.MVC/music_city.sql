-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2022-03-30 21:58:37
-- サーバのバージョン： 10.4.21-MariaDB
-- PHP のバージョン: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `music_city`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL COMMENT 'システムID',
  `name` varchar(50) DEFAULT NULL COMMENT '氏名',
  `kana` varchar(50) DEFAULT NULL COMMENT 'フリガナ',
  `tel` varchar(11) DEFAULT NULL COMMENT '電話番号',
  `email` varchar(100) DEFAULT NULL COMMENT 'メールアドレス',
  `body` text DEFAULT NULL COMMENT 'お問い合わせ内容'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `kana`, `tel`, `email`, `body`) VALUES
(1, '井谷慎太郎', 'あああ', '08015597372', 'tp_s0905@icloud.com', ' l'),
(2, '井谷慎太郎', 'あああ', '08015597372', 'tp_s0905@icloud.com', ' '),
(3, '井谷慎太郎', 'あああ', '08015597372', 'tp-s@docomo.ne.jp', ' ss'),
(4, '井谷慎太郎', 'あああ', '08015597372', 'tp-s@docomo.ne.jp', ' '),
(5, '井谷慎太郎', 'あああ', '08015597372', 'tp-s@docomo.ne.jp', ' f'),
(6, '井谷慎太郎', 'あああ', '08015597372', 'tp-s@docomo.ne.jp', ' ddd'),
(7, '井谷慎太郎', 'ddd', '08015597372', 'tp-s@docomo.ne.jp', ' eee'),
(8, '井谷慎太郎', 'あああ', '08015597372', 'tp-s@docomo.ne.jp', ' ooo'),
(9, '井谷慎太郎', 'あああ', '08015597372', 'tp-s@docomo.ne.jp', ' ddd'),
(10, '井谷慎太郎', 'あああ', '08015597372', 'tp-s@docomo.ne.jp', ' sss'),
(11, '井谷慎太郎', 'あああ', '08015597372', 'tp-s@docomo.ne.jp', ' sss'),
(12, '井谷慎太郎', 'あああ', '08015597372', 'tp-s@docomo.ne.jp', ' sss'),
(13, '井谷慎太郎', 'あああ', '08015597372', 'tp-s@docomo.ne.jp', ' sss'),
(14, '井谷慎太郎', 'あああ', '08015597372', 'tp-s@docomo.ne.jp', ' sss'),
(15, '井谷慎太郎', 'あああ', '08015597372', 'tp-s@docomo.ne.jp', ' sss'),
(16, '井谷慎太郎', 'あああ', '08015597372', 'tp-s@docomo.ne.jp', ' ss'),
(17, '井谷慎太郎', 'あああ', '08015597372', 'tp-s@docomo.ne.jp', ' sss'),
(18, '井谷慎太郎', 'あああ', '08015597372', 'tp-s@docomo.ne.jp', ' sss'),
(19, '井谷慎太郎', 'あああ', '08015597372', 'tp-s@docomo.ne.jp', ' sss'),
(20, '井谷慎太郎', 'あああ', '08015597372', 'boke@boke.com', ' aaa'),
(21, '井谷慎太郎', 'あああ', '08015597372', 'boke@boke.com', ' ssss'),
(22, '井谷慎太郎', 'あああ', '08015597372', 'tp-s@docomo.ne.jp', ' sss'),
(23, '井谷慎太郎', 'あああ', '08015597372', 'tp-s@docomo.ne.jp', ' sss'),
(24, '井谷慎太郎', 'あああ', '08015597372', 'tp-s@docomo.ne.jp', ' sss'),
(25, '井谷慎太郎', 'あああ', '08015597372', 'tp-s@docomo.ne.jp', ' sss'),
(26, '井谷慎太郎', 'あああ', '08015597372', 'tp-s@docomo.ne.jp', ' sss'),
(27, '井谷慎太郎', 'あああ', '08015597372', 'tp-s@docomo.ne.jp', ' sss'),
(28, '井谷慎太郎', 'あああ', '08015597372', 'tp-s@docomo.ne.jp', ' sss'),
(29, '井谷慎太郎', 'あああ', '08015597372', 'tp-s@docomo.ne.jp', ' sss');

-- --------------------------------------------------------

--
-- テーブルの構造 `favorite`
--

CREATE TABLE `favorite` (
  `id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `good`
--

CREATE TABLE `good` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `delete_flg` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `users` int(11) NOT NULL COMMENT 'ユーザー',
  `product` int(11) NOT NULL COMMENT '商品名',
  `creater` int(11) NOT NULL COMMENT '制作者',
  `good` int(11) NOT NULL DEFAULT 0 COMMENT 'いいね'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `pay_method` varchar(50) DEFAULT NULL COMMENT '支払方法'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `orders`
--

INSERT INTO `orders` (`id`, `pay_method`) VALUES
(1, NULL),
(2, NULL),
(3, NULL),
(4, NULL),
(5, NULL),
(6, NULL),
(7, NULL),
(8, NULL),
(9, NULL),
(10, NULL),
(11, NULL),
(12, NULL),
(13, NULL),
(14, NULL),
(15, NULL),
(16, NULL),
(17, NULL),
(18, NULL),
(19, NULL),
(20, NULL),
(21, '1111111111'),
(22, '1111111111'),
(23, '1111111111'),
(24, '1111111111'),
(25, '1111111111'),
(26, '1111111111'),
(27, '1111111111'),
(28, '1111111111'),
(29, '1111111111'),
(30, '1111111111'),
(31, '1111111111'),
(32, '1111111111'),
(33, '1111111111'),
(34, '1111111111'),
(35, '1111111111'),
(36, '1111111111'),
(37, '1111111111'),
(38, '1111111111'),
(39, '1111111111'),
(40, '1111111111'),
(41, '1111111111'),
(42, '1111111111'),
(43, '1111111111'),
(44, '1111111111'),
(45, '1111111111');

-- --------------------------------------------------------

--
-- テーブルの構造 `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `product` varchar(50) NOT NULL COMMENT '商品名',
  `category` varchar(50) NOT NULL COMMENT 'ジャンル',
  `creater` varchar(50) NOT NULL COMMENT '制作者',
  `price` varchar(50) NOT NULL COMMENT '値段',
  `overview` varchar(100) NOT NULL COMMENT '概要'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `products`
--

INSERT INTO `products` (`id`, `product`, `category`, `creater`, `price`, `overview`) VALUES
(22, '0', 'あ', '08015597372', 'あ', ' sss'),
(24, 'aaaaa', 'aaaa', '08015597372', 'あ', ' ss'),
(25, '井谷慎太郎', 'aaaa', '08015597372', 'ss', ' ss'),
(27, '井谷慎太郎', 'あ', '08015597372', 'あ', ' k'),
(28, 'a', 'a', 'a', 'aa', ' aa'),
(29, 'aaaaa', 'aaaa', 'aaaa', '1500', ' sss'),
(30, 'gagaga', 'agagag', 'gagagag', 'gagag', ' ggg'),
(31, '井谷慎太郎', 'あ', '08015597372', '08015597372', ' aaa'),
(32, '井谷慎太郎', 'あ', '08015597372', '1500', ' sss'),
(33, '井谷慎太郎', 'あ', '08015597372', '1500', ' sss'),
(34, '井谷慎太郎', 'あ', '08015597372', '1500', ' sss'),
(35, '井谷慎太郎', 'あ', '08015597372', '1500', ' sss');

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `name` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL COMMENT 'メールアドレス',
  `password` varchar(100) DEFAULT NULL COMMENT 'パスワード',
  `role` int(11) NOT NULL DEFAULT 0 COMMENT '権限'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, '', 'aaa@icloud.com', 'roota', 1),
(2, '', 'tp_s0905@icloud.com', 'root', 1),
(3, '', 'tp_s0905@icloud.com', 'root', 0),
(4, '', 'tp-s@docomo.ne.jp', '$2y$10$S92YTygrsBWUDurzLvq9teY9Z3UMDZKJ6YiAgrkAIfvED7futO5GK', 0),
(5, '', 'tp-s@docomo.ne.jp', '$2y$10$S92YTygrsBWUDurzLvq9teY9Z3UMDZKJ6YiAgrkAIfvED7futO5GK', 0),
(6, '', NULL, '$2y$10$fmPUlaFtAl0FU3mTe2pCku/MsYW/.QpK.auLBpYWY1GsdbM7BPBDe', 0),
(7, '', NULL, '$2y$10$FxAZyam0Zapq8y5BMUn9WOrN9AgAk3xxcVktaCrhF61qLNMvGzTwS', 0),
(8, '', 'tp-s@docomo.ne.jp', '$2y$10$S92YTygrsBWUDurzLvq9teY9Z3UMDZKJ6YiAgrkAIfvED7futO5GK', 0),
(9, '', NULL, '$2y$10$UTGHE51H7Kj/WkSnOQdazORlAJalwV0KGdj2N0t20PwBNQL9.JM/y', 0),
(10, '', NULL, '$2y$10$YgCGGhY.aZRFG71sdA//kuxqNw9sMEB3Psk15Otq8wf6Ym0YkFcAK', 0),
(11, '', 'tp-s@docomo.ne.jp', '$2y$10$S92YTygrsBWUDurzLvq9teY9Z3UMDZKJ6YiAgrkAIfvED7futO5GK', 0),
(12, '', NULL, '$2y$10$JIQduToWj8q8KD92IgLeHewUIGjHZPNEewBlBGJs.ZZnSIh8F2WKi', 0),
(13, '', NULL, '$2y$10$Dim0yD1Os4fk39ipM51x9.g3Y0tTdX42Yi4t6PSSCtfrSMI.FO76e', 0),
(14, '', NULL, '$2y$10$YjQ7ZHHGjGNep7Ay3FCjh.dWW8JKZGEZcfeqWgE3sBInq0DRRGire', 0),
(15, '', 'root@icloud.com', '$2y$10$ERQQdO/BKVhaYc24PITbwuPUf5xT87RaIDLrEyr7IwHPf4j/lsyXO', 0),
(16, '', 'root@icloud.com', '$2y$10$v5YiATb/HxqmzPGUpQsihuvb37pjp8QzZVRM5ibOpzC8pdgeEklrW', 0),
(17, '', 'tp-s@docomo.ne.jp', '$2y$10$S92YTygrsBWUDurzLvq9teY9Z3UMDZKJ6YiAgrkAIfvED7futO5GK', 0),
(18, '', 'tp-s@docomo.ne.jp', '$2y$10$S92YTygrsBWUDurzLvq9teY9Z3UMDZKJ6YiAgrkAIfvED7futO5GK', 0),
(19, '', 'tp-s@docomo.ne.jp', '$2y$10$S92YTygrsBWUDurzLvq9teY9Z3UMDZKJ6YiAgrkAIfvED7futO5GK', 0),
(20, '', 'tp-s@docomo.ne.jp', '$2y$10$S92YTygrsBWUDurzLvq9teY9Z3UMDZKJ6YiAgrkAIfvED7futO5GK', 0),
(21, '', 'admin@iclorrd.com', '$2y$10$4OhZh/S2dsTB.PDoU/JxL.H.7Y7cscJniShcntUBpJ8ai/jzVwtiy', 1),
(26, '', 'tp-s@docomo.ne.jp', '$2y$10$S92YTygrsBWUDurzLvq9teY9Z3UMDZKJ6YiAgrkAIfvED7futO5GK', 0),
(27, '', 'aho@aho.com', '$2y$10$sJ68hCLEky7GSO5o1BCZp.RuP7PXU2tyetJEPVX.xoYDLs/M6mk/6', 0),
(28, '', 'boke@boke.com', '$2y$10$wPjW2ZuRjlgG3Bh0oI15w.Lsx6haBQxDcm3hnQL8kfkPsEvTQ8Upa', 0),
(29, '', 'tp-s@docomo.ne.jp', '$2y$10$S92YTygrsBWUDurzLvq9teY9Z3UMDZKJ6YiAgrkAIfvED7futO5GK', 0),
(30, '', 'tp-s@docomo.ne.jp', '$2y$10$S92YTygrsBWUDurzLvq9teY9Z3UMDZKJ6YiAgrkAIfvED7futO5GK', 0),
(31, '', 'tp-s@docomo.ne.jp', '$2y$10$S92YTygrsBWUDurzLvq9teY9Z3UMDZKJ6YiAgrkAIfvED7futO5GK', 0),
(32, '', 'tp-s@docomo.ne.jp', '$2y$10$S92YTygrsBWUDurzLvq9teY9Z3UMDZKJ6YiAgrkAIfvED7futO5GK', 0),
(33, '', 'tp-s@docomo.ne.jp', '$2y$10$S92YTygrsBWUDurzLvq9teY9Z3UMDZKJ6YiAgrkAIfvED7futO5GK', 0),
(34, '', 'tp-s@docomo.ne.jp', '$2y$10$S92YTygrsBWUDurzLvq9teY9Z3UMDZKJ6YiAgrkAIfvED7futO5GK', 0),
(35, '', 'tp-s@docomo.ne.jp', '$2y$10$S92YTygrsBWUDurzLvq9teY9Z3UMDZKJ6YiAgrkAIfvED7futO5GK', 0),
(36, '', 'tp-s@docomo.ne.jp', '$2y$10$S92YTygrsBWUDurzLvq9teY9Z3UMDZKJ6YiAgrkAIfvED7futO5GK', 0),
(37, '', 'tp-s@docomo.ne.jp', '$2y$10$S92YTygrsBWUDurzLvq9teY9Z3UMDZKJ6YiAgrkAIfvED7futO5GK', 0),
(38, '', 'tp-s@docomo.ne.jp', '$2y$10$S92YTygrsBWUDurzLvq9teY9Z3UMDZKJ6YiAgrkAIfvED7futO5GK', 0),
(39, '', 'tp-s@docomo.ne.jp', '$2y$10$S92YTygrsBWUDurzLvq9teY9Z3UMDZKJ6YiAgrkAIfvED7futO5GK', 0),
(40, '', 'tp-s@docomo.ne.jp', '$2y$10$S92YTygrsBWUDurzLvq9teY9Z3UMDZKJ6YiAgrkAIfvED7futO5GK', 0),
(41, '', 'tp-s@docomo.ne.jp', '$2y$10$S92YTygrsBWUDurzLvq9teY9Z3UMDZKJ6YiAgrkAIfvED7futO5GK', 0),
(42, '井谷慎太郎', 'tp-s@docomo.ne.jp', '$2y$10$S92YTygrsBWUDurzLvq9teY9Z3UMDZKJ6YiAgrkAIfvED7futO5GK', 0),
(43, '井谷慎太郎', 'tp-s@docomo.ne.jp', '$2y$10$S92YTygrsBWUDurzLvq9teY9Z3UMDZKJ6YiAgrkAIfvED7futO5GK', 0),
(44, '井谷慎太郎', 'tp-s@docomo.ne.jp', '$2y$10$S92YTygrsBWUDurzLvq9teY9Z3UMDZKJ6YiAgrkAIfvED7futO5GK', 0),
(45, '井谷慎太郎', 'tp-s@docomo.ne.jp', '$2y$10$S92YTygrsBWUDurzLvq9teY9Z3UMDZKJ6YiAgrkAIfvED7futO5GK', 0),
(46, '井谷慎太郎', 'tp-s@docomo.ne.jp', '$2y$10$S92YTygrsBWUDurzLvq9teY9Z3UMDZKJ6YiAgrkAIfvED7futO5GK', 0),
(47, 'aaa', 'aiai@icloud.com', '$2y$10$/FhOmF2GOGuFsr9Z39H0c.j5QWkRbPDzcZ2JSbDaGUuWKMYyNLA7C', 0),
(48, '井谷慎太郎', 'admin@admin.com', '$2y$10$IXuMFl0xtDjzDENTgIbwNuF37wJSjMn.Ltm.E6iNa5HoWOoUc9iPW', 1),
(49, '井谷慎太郎', 'tp-s@docomo.ne.jp', '$2y$10$S92YTygrsBWUDurzLvq9teY9Z3UMDZKJ6YiAgrkAIfvED7futO5GK', 0),
(50, '井谷慎太郎', 'tp-s@docomo.ne.jp', '$2y$10$S92YTygrsBWUDurzLvq9teY9Z3UMDZKJ6YiAgrkAIfvED7futO5GK', 0),
(51, '井谷慎太郎', 'tp-s@docomo.ne.jp', '$2y$10$S92YTygrsBWUDurzLvq9teY9Z3UMDZKJ6YiAgrkAIfvED7futO5GK', 0);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `good`
--
ALTER TABLE `good`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'システムID', AUTO_INCREMENT=30;

--
-- テーブルの AUTO_INCREMENT `favorite`
--
ALTER TABLE `favorite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `good`
--
ALTER TABLE `good`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID';

--
-- テーブルの AUTO_INCREMENT `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=46;

--
-- テーブルの AUTO_INCREMENT `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=36;

--
-- テーブルの AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

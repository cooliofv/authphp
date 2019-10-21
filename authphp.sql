-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 23 2019 г., 20:58
-- Версия сервера: 5.7.20
-- Версия PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `authphp`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `photo`, `token`) VALUES
(15, 'Док', 'cooliofv@gmail.com', '$2y$10$alRrosZyAPCiqUbGu8Nx5.t/i7a0qetCuLzowL/PSnJvcLpnKSRiW', '/photo/avatar.jpg', 'b2c1dcbedb169e57ae50a1bef6fd16af1218376f75e6737b0015c7f139c26280'),
(16, 'Абрамов Алексей', 'doctor@mail.ru', '$2y$10$JO5w8BjP1Mffxax0fSqMnuimk6YZBxqwBOOLeGuRRl4fkC0GxOlP.', '/photo/avatar.jpg', 'f09c743551f89036918aef5265a666a41e1da6ba5d6df96c42f82b0055442d18'),
(17, 'Путин Владимир Владимирович', 'admin@mail.ru', '$2y$10$6Gpht2/2T3vSxhGsF3mdweUpKp7pIFIwBb.7E.Jt5UJuQ7JFXbyGC', '/photo/avatar.jpg', '23c2b4b6097e7f193ca8e3697a4cbc061c0c2751c389a63e30d6f1a7b74f359d'),
(18, 'coolio', 'wfm@mail.ru', '$2y$10$78NiRzVt7sJfdpyYo24W5ufPSYcJsCrdK38P7FFpizW2siKL7PXk.', '/photo/avatar.jpg', 'aed945c7e4b99333f7c0f40b2f39fac2786209f49c49062ec5c179c1649a8484'),
(19, 'Ян', 'dar@gmail.com', '$2y$10$QCR.6ishAvO5sCN.tJmedO2/57sVu5/NMdUxifN97mAmiu/wgy/LG', '/photo/avatar.jpg', 'a6d5580d1f1c64d31f09a587c4eea5c5c28ea6855ffce6f76f3ac7465af827f0'),
(20, 'Aleksey', 'alex@mail.ru', '$2y$10$KRS5Ih1hWj.HzslqN/8NJ.xkGTDJbFp68s9N4.ZZ9.bGRFo1QRfpS', '/photo/avatar.jpg', '2e871239ffc0424e0f76f71e9bcade62555a4550e31f0fddf8696b4afa49db92');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

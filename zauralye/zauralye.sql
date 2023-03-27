-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 27 2023 г., 21:40
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `zauralye`
--

-- --------------------------------------------------------

--
-- Структура таблицы `navigation`
--

CREATE TABLE `navigation` (
  `id` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `navigation`
--

INSERT INTO `navigation` (`id`, `name`, `link`) VALUES
(1, 'Календарь туров', 'calendar.php'),
(2, 'Каталог', 'catalogue.php'),
(3, 'О нас', 'aboutUs.php');

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Клиент'),
(2, 'Модератор'),
(3, 'Администратор');

-- --------------------------------------------------------

--
-- Структура таблицы `tours`
--

CREATE TABLE `tours` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `desc` varchar(4096) NOT NULL,
  `type` int NOT NULL,
  `duration` varchar(4096) NOT NULL,
  `cost` int NOT NULL,
  `amount_of_days` int NOT NULL,
  `number of people` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `tours`
--

INSERT INTO `tours` (`id`, `name`, `desc`, `type`, `duration`, `cost`, `amount_of_days`, `number of people`) VALUES
(1, 'Тестовый тур проверка', 'Lorem Ipsum est cos cuentevas, la sentinniti de garaci of quertale. Lorem Ipsum est cos cuentevas, la sentinniti de garaci of quertale. Lorem Ipsum est cos cuentevas, la sentinniti de garaci of quertale. ', 3, '2', 1999, 2, 4),
(2, 'Тестовый тур проверка 2', 'Lorem Ipsum est cos cuentevas, la sentinniti de garaci of quertale. Lorem Ipsum est cos cuentevas, la sentinniti de garaci of quertale. Lorem Ipsum est cos cuentevas, la sentinniti de garaci of quertale. ', 1, '2', 2999, 2, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `tour_types`
--

CREATE TABLE `tour_types` (
  `id_type` int NOT NULL,
  `name_type` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `code_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `tour_types`
--

INSERT INTO `tour_types` (`id_type`, `name_type`, `code_type`) VALUES
(1, 'Санаторий', 'sanatorium'),
(2, 'Экскурсия', 'excursion'),
(3, 'Тур', 'tour'),
(4, 'Детский лагерь', 'kids_camp');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `surname` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `patronymic` varchar(100) DEFAULT NULL,
  `login` varchar(32) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `password` varchar(32) NOT NULL,
  `about` varchar(512) DEFAULT NULL,
  `role` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `surname`, `name`, `patronymic`, `login`, `email`, `phone`, `password`, `about`, `role`) VALUES
(9, 'Хаплинский', 'ZhoRaaa', 'xfxfx', 'testAcc', 'arturved07@gmail.com', '89962936906', '123123', NULL, 3),
(17, 'Рахматуллина', 'Айгуль', 'Расимовна', 'cvetlunny', 'cvetlunny@mail.ru', '89962936969', 'qweqwe', NULL, 3);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `navigation`
--
ALTER TABLE `navigation`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `tours`
--
ALTER TABLE `tours`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `tour_type` (`type`);

--
-- Индексы таблицы `tour_types`
--
ALTER TABLE `tour_types`
  ADD PRIMARY KEY (`id_type`),
  ADD KEY `id` (`id_type`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `navigation`
--
ALTER TABLE `navigation`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `tours`
--
ALTER TABLE `tours`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `tour_types`
--
ALTER TABLE `tour_types`
  MODIFY `id_type` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `tours`
--
ALTER TABLE `tours`
  ADD CONSTRAINT `tours_ibfk_1` FOREIGN KEY (`type`) REFERENCES `tour_types` (`id_type`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `roles` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 03 2018 г., 17:29
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
-- База данных: `yii2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `access`
--

CREATE TABLE `access` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `access`
--

INSERT INTO `access` (`id`, `user_id`, `event_id`) VALUES
(1, 3, 1),
(2, 2, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `calendar`
--

CREATE TABLE `calendar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Название',
  `text` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Текст заметки',
  `creator` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Автор заметки',
  `event_date` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Дата события',
  `creation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата внесения'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `calendar`
--

INSERT INTO `calendar` (`id`, `name`, `text`, `creator`, `event_date`, `creation_date`) VALUES
(1, 'Как стать востребованным Web-разработчиком с доходом от 100 000 рублей', 'После вебинара Вы будете знать:\r\n\r\nКак с нуля освоить профессию Web разработчика?\r\nКакие есть особенности у данной профессии?\r\nКакие языки программирования необходимо изучить, чтобы - освоить профессию Web разработчика?\r\nКак Web разработчику выйти на доход 100 000 – 150 000 рублей в месяц?\r\nКак всего за год можно освоить специальность Web разработчика, а не тратить 5 лет?\r\nКакие требования предъявляют к Web разработчикам работодатели?\r\nКлючевые ошибки при освоении данной профессии =(\r\nУзнаете, как освоить специальность Web разработчика на лучших условиях.\r\nКакие первые шаги нужно сделать, чтобы освоить профессию.\r\nПолучите ответы на свои вопросы ;)', '1', '04 июля, 2018', '2018-07-03 16:02:03'),
(2, 'Как протестировать SOAP-сервис', 'На вебинаре вы узнаете:\r\n\r\nчто такое веб-сервис и зачем он нужен при разработке приложений;\r\nчто такое SOAP-сервис;,\r\nкак работает протокол SOAP,\r\nкакова структура веб-сервиса (XML, XSD, WSDL).', '3', '25.08.2018', '2018-07-03 16:40:50');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `login` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`) VALUES
(1, 'admin', '12345'),
(2, 'Вася', '12345'),
(3, 'Петя', '12345'),
(4, 'Маша', '12345');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `access`
--
ALTER TABLE `access`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `access`
--
ALTER TABLE `access`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

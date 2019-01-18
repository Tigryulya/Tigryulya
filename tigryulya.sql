-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 18 2019 г., 16:58
-- Версия сервера: 5.6.41
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `tigryulya`
--

-- --------------------------------------------------------

--
-- Структура таблицы `css`
--

CREATE TABLE `css` (
  `id` int(11) NOT NULL,
  `page` varchar(250) NOT NULL,
  `class` varchar(250) NOT NULL,
  `width` varchar(11) NOT NULL,
  `height` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `defaults`
--

CREATE TABLE `defaults` (
  `id` int(11) NOT NULL,
  `url_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `defaults`
--

INSERT INTO `defaults` (`id`, `url_user`) VALUES
(1, 20);

-- --------------------------------------------------------

--
-- Структура таблицы `film`
--

CREATE TABLE `film` (
  `id` int(11) NOT NULL,
  `unical` varchar(500) NOT NULL,
  `name` varchar(250) NOT NULL,
  `icon` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `unical_id` varchar(1000) NOT NULL,
  `unical` varchar(500) NOT NULL,
  `name` varchar(250) NOT NULL,
  `date_create` datetime NOT NULL,
  `camera_50` varchar(1000) NOT NULL,
  `camera_100` varchar(1000) NOT NULL,
  `camera_200` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `unical_id` varchar(62) NOT NULL,
  `text` text NOT NULL,
  `image` varchar(500) DEFAULT NULL,
  `unical` varchar(500) NOT NULL,
  `day` varchar(2) NOT NULL,
  `month` varchar(2) NOT NULL,
  `year` varchar(4) NOT NULL,
  `clock` varchar(2) NOT NULL,
  `minutes` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `unical_id`, `text`, `image`, `unical`, `day`, `month`, `year`, `clock`, `minutes`) VALUES
(5, '0817235964', '123', NULL, '666', '18', '18', '2019', '14', '33');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL COMMENT 'Сортировка',
  `unical` varchar(500) NOT NULL COMMENT 'Уникальный id',
  `url` varchar(100) NOT NULL COMMENT 'То что будет находится в url строке',
  `gup` int(1) NOT NULL DEFAULT '0',
  `login` varchar(60) NOT NULL COMMENT 'Логин',
  `password` varchar(250) NOT NULL COMMENT 'Пароль',
  `email` varchar(250) NOT NULL COMMENT 'Электронная почта',
  `name` varchar(250) NOT NULL COMMENT 'Имя',
  `surname` varchar(250) NOT NULL COMMENT 'Фамилия',
  `surname_wonam` varchar(250) NOT NULL COMMENT 'Девичья фамилия',
  `sex` int(1) NOT NULL COMMENT 'Мой пол',
  `family` int(1) NOT NULL COMMENT 'Семейное положения',
  `birth_day` int(2) NOT NULL COMMENT 'День рождения',
  `birth_month` int(2) NOT NULL COMMENT 'Месяц рождения',
  `birth_year` int(4) NOT NULL COMMENT 'Год рождения',
  `birthday_access` int(1) NOT NULL COMMENT 'Показ даты рождения',
  `hometown` varchar(250) NOT NULL COMMENT 'Мой родной город',
  `languages` text NOT NULL COMMENT 'Языки которые я знаю',
  `country` varchar(250) NOT NULL COMMENT 'Страна',
  `city` varchar(250) NOT NULL COMMENT 'Город',
  `mobile` varchar(250) NOT NULL COMMENT 'Телефон',
  `add_phone` varchar(250) NOT NULL COMMENT 'Дополнительный телефон',
  `skype` varchar(250) NOT NULL COMMENT 'skype',
  `discord` varchar(250) NOT NULL COMMENT 'discord',
  `website` varchar(10000) NOT NULL COMMENT 'Сайт',
  `email_info` varchar(250) NOT NULL COMMENT 'Электронная почта',
  `add_email_info` varchar(250) NOT NULL COMMENT 'Дополнительная Электронная почта',
  `activity` text NOT NULL COMMENT 'Деятельность',
  `interests` text NOT NULL COMMENT 'Интересы',
  `favorite_music` text NOT NULL COMMENT 'Любимая музыка',
  `favorite_movies` text NOT NULL COMMENT 'Любимые фильмы',
  `favorite_tv` text NOT NULL COMMENT 'Любимые телешоу',
  `favorite_books` text NOT NULL COMMENT 'Любимые книги',
  `favorite_games` text NOT NULL COMMENT 'Любимые игры',
  `favorite_quotes` text NOT NULL COMMENT 'Любимые цитаты',
  `about_me` text NOT NULL COMMENT 'О себе',
  `political_preferences` int(2) NOT NULL COMMENT 'Полит. предпочтения',
  `worldview` int(2) NOT NULL COMMENT 'Мировоззрение',
  `main_life` int(2) NOT NULL COMMENT 'Главное в жизни',
  `main_people` int(2) NOT NULL COMMENT 'Главное в людях',
  `attitude_smoking` int(2) NOT NULL COMMENT 'Отношение к курению',
  `attitude_alcohol` int(2) NOT NULL COMMENT 'Отношение к алкоголю',
  `inspire` text NOT NULL COMMENT 'Вдохновляют'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `unical`, `url`, `gup`, `login`, `password`, `email`, `name`, `surname`, `surname_wonam`, `sex`, `family`, `birth_day`, `birth_month`, `birth_year`, `birthday_access`, `hometown`, `languages`, `country`, `city`, `mobile`, `add_phone`, `skype`, `discord`, `website`, `email_info`, `add_email_info`, `activity`, `interests`, `favorite_music`, `favorite_movies`, `favorite_tv`, `favorite_books`, `favorite_games`, `favorite_quotes`, `about_me`, `political_preferences`, `worldview`, `main_life`, `main_people`, `attitude_smoking`, `attitude_alcohol`, `inspire`) VALUES
(0, '123', 'id1', 1, 'Tigryulya', '1123456', '', 'Серёжа', 'Шадрин', '', 1, 0, 22, 10, 2002, 1, '123', '123', '123', '123', '123', '123', '123', '123', '123', '123', '', '123', '123', '123', '123', '123', '123', '123', '123', '123', 2, 2, 2, 2, 2, 2, '123'),
(0, '666', 'id2', 1, 'Varain', '123456', '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, ''),
(0, '', '', 0, '', 'sergej2017', 'edstres@yandex.ru', 'qwe', 'ewqerwq', '', 2, 0, 16, 0, 2005, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, ''),
(0, '', '', 0, '123', '123', 'edsfdsgftres@yandex.ru', 'qwe', 'ewqerwq', '', 2, 0, 16, 0, 2005, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, ''),
(0, '', '', 0, '123', '123', 'iughiouui@yandex.ru', 'estre', 'stres', '', 1, 0, 18, 0, 2002, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, ''),
(0, '', 'id1', 0, 'rtdytrdy', '123', 'ytrdytrd@yandex.ru', 'trdyt', 'rdytrd', '', 2, 0, 16, 0, 2003, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, ''),
(0, '', 'id1', 0, 'rtdytrdy', '123', 'ytrdytrd@yandex.ru', 'trdyt', 'rdytrd', '', 2, 0, 16, 0, 2003, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, ''),
(0, '', 'id1', 0, 'rtdytrdy', '123', 'ytrdytrd@yandex.ru', 'trdyt', 'rdytrd', '', 2, 0, 16, 0, 2003, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, ''),
(0, '', 'id1', 0, 'rtdytrdy', '123', 'ytrdytrd@yandex.ru', 'trdyt', 'rdytrd', '', 2, 0, 16, 0, 2003, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, ''),
(0, '', 'id1', 0, 'rtdytrdy', '123', 'ytrdytrd@yandex.ru', 'trdyt', 'rdytrd', '', 2, 0, 16, 0, 2003, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, ''),
(0, '', 'id1', 0, 'rtdytrdy', '123', 'ytrdytrd@yandex.ru', 'trdyt', 'rdytrd', '', 2, 0, 16, 0, 2003, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, ''),
(0, '', 'id1', 0, 'rtdytrdy', '123', 'ytrdytrd@yandex.ru', 'trdyt', 'rdytrd', '', 2, 0, 16, 0, 2003, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, ''),
(0, '', 'idArraz', 0, 'jkhkl', '123', 'dsdffgd@yandex.ru', 'hkjhkj', 'kjhkjhkjh', '', 2, 0, 18, 0, 2004, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, ''),
(0, '', 'id1', 0, 'jjjj', '123', 'uhuhu@yandex.ru', 'uhuh', 'uhuh', '', 1, 0, 18, 0, 2010, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, ''),
(0, '', 'id2', 0, 'errt', '123', 'errt@yandex.ru', 'errt', 'errt', '', 1, 0, 17, 0, 2001, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, ''),
(0, '', 'id3', 0, 'errt', '123', 'errt@yandex.ru', 'errt', 'errt', '', 1, 0, 17, 0, 2001, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, ''),
(0, '', 'id4', 0, 'errt', '123', 'errt@yandex.ru', 'errt', 'errt', '', 1, 0, 17, 0, 2001, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, ''),
(0, '', 'id5', 0, 'errt', '123', 'errt@yandex.ru', 'errt', 'errt', '', 1, 0, 17, 0, 2001, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, ''),
(0, '', 'id6', 0, 'errt', '123', 'errt@yandex.ru', 'errt', 'errt', '', 1, 0, 17, 0, 2001, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, ''),
(0, '', 'id7', 0, 'errt', '123', 'errt@yandex.ru', 'errt', 'errt', '', 1, 0, 17, 0, 2001, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, ''),
(0, '', 'id8', 0, 'errt', '123', 'errt@yandex.ru', 'errt', 'errt', '', 1, 0, 17, 0, 2001, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, ''),
(0, '', 'id9', 0, 'errt', '123', 'errt@yandex.ru', 'errt', 'errt', '', 1, 0, 17, 0, 2001, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, ''),
(0, '', 'id10', 0, 'errt', '123', 'errt@yandex.ru', 'errt', 'errt', '', 1, 0, 17, 0, 2001, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, ''),
(0, '', 'id11', 0, 'errt', '123', 'errt@yandex.ru', 'errt', 'errt', '', 1, 0, 17, 0, 2001, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, ''),
(0, '', 'id12', 0, 'errt', '123', 'errt@yandex.ru', 'errt', 'errt', '', 1, 0, 17, 0, 2001, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, ''),
(0, '', 'id13', 0, 'errt', '123', 'errt@yandex.ru', 'errt', 'errt', '', 1, 0, 17, 0, 2001, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, ''),
(0, '', 'id14', 0, 'errt', '123', 'errt@yandex.ru', 'errt', 'errt', '', 1, 0, 17, 0, 2001, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, ''),
(0, '', 'id15', 0, 'errt', '123', 'errt@yandex.ru', 'errt', 'errt', '', 1, 0, 17, 0, 2001, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, ''),
(0, '', 'id16', 0, 'errt', '123', 'errt@yandex.ru', 'errt', 'errt', '', 1, 0, 17, 0, 2001, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, ''),
(0, '', 'id17', 0, 'errt', '123', 'errt@yandex.ru', 'errt', 'errt', '', 1, 0, 17, 0, 2001, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, ''),
(0, '', 'id18', 0, 'errt', '123', 'errt@yandex.ru', 'errt', 'errt', '', 1, 0, 17, 0, 2001, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, ''),
(0, '', 'id19', 0, 'errt', '123', 'errt@yandex.ru', 'errt', 'errt', '', 1, 0, 17, 0, 2001, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, ''),
(0, '1427905836', 'id20', 0, 'errt', '123', 'errt@yandex.ru', 'errt', 'errt', '', 1, 0, 17, 0, 2001, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `css`
--
ALTER TABLE `css`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `defaults`
--
ALTER TABLE `defaults`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `css`
--
ALTER TABLE `css`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `defaults`
--
ALTER TABLE `defaults`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `film`
--
ALTER TABLE `film`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

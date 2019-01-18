<?php

include 'config/database.php';
include 'config/settings.php';

session_start();

$Connection = mysqli_connect($db['HOST'], $db['USER'], $db['PASS'], $db['BASE']);
if ($Connection == false)
{
	exit();
}

// if(!mysqli_query($Connection, "DROP TABLE `users`"))
// {
	// $add_table = "CREATE TABLE `users` (
	//   `id` int(11) NOT NULL COMMENT 'Сортировка',
	//   `unical` varchar(500) NOT NULL COMMENT 'Уникальный id',
	//   `url` varchar(100) NOT NULL COMMENT 'То что будет находится в url строке',
	//   `login` varchar(60) NOT NULL COMMENT 'Логин',
	//   `password` varchar(250) NOT NULL COMMENT 'Пароль',
	//   `email` varchar(250) NOT NULL COMMENT 'Электронная почта',
	//   `name` varchar(250) NOT NULL COMMENT 'Имя',
	//   `surname` varchar(250) NOT NULL COMMENT 'Фамилия',
	//   `surname_wonam` varchar(250) NOT NULL COMMENT 'Девичья фамилия',
	//   `sex` int(1) NOT NULL COMMENT 'Мой пол',
	//   `family` int(1) NOT NULL COMMENT 'Семейное положения',
	//   `birth_day` int(2) NOT NULL COMMENT 'День рождения',
	//   `birth_month` int(2) NOT NULL COMMENT 'Месяц рождения',
	//   `birth_year` int(4) NOT NULL COMMENT 'Год рождения',
	//   `birthday_access` int(1) NOT NULL COMMENT 'Показ даты рождения',
	//   `hometown` varchar(250) NOT NULL COMMENT 'Мой родной город',
	//   `languages` text NOT NULL COMMENT 'Языки которые я знаю',
	//   `country` varchar(250) NOT NULL COMMENT 'Страна',
	//   `city` varchar(250) NOT NULL COMMENT 'Город',
	//   `mobile` varchar(250) NOT NULL COMMENT 'Телефон',
	//   `add_phone` varchar(250) NOT NULL COMMENT 'Дополнительный телефон',
	//   `skype` varchar(250) NOT NULL COMMENT 'skype',
	//   `discord` varchar(250) NOT NULL COMMENT 'discord',
	//   `website` varchar(10000) NOT NULL COMMENT 'Сайт',
	//   `email_info` varchar(250) NOT NULL COMMENT 'Электронная почта',
	//   `add_email_info` varchar(250) NOT NULL COMMENT 'Дополнительная Электронная почта',
	//   `activity` text NOT NULL COMMENT 'Деятельность',
	//   `interests` text NOT NULL COMMENT 'Интересы',
	//   `favorite_music` text NOT NULL COMMENT 'Любимая музыка',
	//   `favorite_movies` text NOT NULL COMMENT 'Любимые фильмы',
	//   `favorite_tv` text NOT NULL COMMENT 'Любимые телешоу',
	//   `favorite_books` text NOT NULL COMMENT 'Любимые книги',
	//   `favorite_games` text NOT NULL COMMENT 'Любимые игры',
	//   `favorite_quotes` text NOT NULL COMMENT 'Любимые цитаты',
	//   `about_me` text NOT NULL COMMENT 'О себе',
	//   `political_preferences` int(2) NOT NULL COMMENT 'Полит. предпочтения',
	//   `worldview` int(2) NOT NULL COMMENT 'Мировоззрение',
	//   `main_life` int(2) NOT NULL COMMENT 'Главное в жизни',
	//   `main_people` int(2) NOT NULL COMMENT 'Главное в людях',
	//   `attitude_smoking` int(2) NOT NULL COMMENT 'Отношение к курению',
	//   `attitude_alcohol` int(2) NOT NULL COMMENT 'Отношение к алкоголю',
	//   `inspire` text NOT NULL COMMENT 'Вдохновляют'
	// ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

	// $result = mysqli_query($Connection, $add_table); 
// }

?>
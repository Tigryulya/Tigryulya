<?php

include '../system.php';
include '../security.php';

$errors = array();

$activity = htmlspecialchars(trim($_POST['activity']));
$interests = htmlspecialchars(trim($_POST['interests']));
$favorite_music = htmlspecialchars(trim($_POST['favorite_music']));
$favorite_movies = htmlspecialchars(trim($_POST['favorite_movies']));
$favorite_tv = htmlspecialchars(trim($_POST['favorite_tv']));
$favorite_books = htmlspecialchars(trim($_POST['favorite_books']));
$favorite_games = htmlspecialchars(trim($_POST['favorite_games']));
$favorite_quotes = htmlspecialchars(trim($_POST['favorite_quotes']));
$about_me = htmlspecialchars(trim($_POST['about_me']));

if (empty($errors) )
{
	echo 'Изменения сохранены.';
	$login = $_COOKIE['LG'];
	$opdate_info = mysqli_query($Connection, "UPDATE `users` SET `activity` = '$activity', `interests` = '$interests', `favorite_music` = '$favorite_music', `favorite_movies` = '$favorite_movies', `favorite_tv` = '$favorite_tv', `favorite_books` = '$favorite_books', `favorite_games` = '$favorite_games', `favorite_quotes` = '$favorite_quotes', `about_me` = '$about_me' WHERE `login` = '$login'");
}else
{
	echo array_shift($errors);//Вывод ошибок по очереди
}

?>
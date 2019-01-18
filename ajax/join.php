<?php

include '../system.php';
include '../security.php';

$errors = array();

if (htmlspecialchars(trim($_POST['login']) == ''))//Проверка проверка логина на существования
{
	$errors[] = 'Укажите логин'; //сохраняет в масив сообщение
}

if (!preg_match('/^[A-Za-z0-9|-|_]{3,32}$/', $_POST['login']) )
{
	$errors[] = 'Не коректный Логин';
}

if (htmlspecialchars(trim($_POST['password']) == ''))//Проверка проверка пароля на существования
{
	$errors[] = 'Укажите Пароль'; //сохраняет в масив сообщение
}

if (!preg_match('/^[A-Za-z0-9|_|-|!|.|+|=|(|)]{3,250}$/', $_POST['password']) )
{
	$errors[] = 'Не коректный пароль';
}

$login = $_POST['login'];
$password = $_POST['password'];

$check =  mysqli_fetch_array(mysqli_query($Connection, "SELECT * FROM `users` WHERE login = '$login'"));

if ($check['password'] != $_POST['password'])
{
	$errors[] = 'Такого пользователя не существует или не аверный пароль';
}

if (empty($errors) )
{
	//Авторизируем пользователя
	setcookie('LG', $login, time()+(60*60*24*30), '/', $_SERVER["SERVER_NAME"], 0);
	setcookie('PW', $password, time()+(60*60*24*30), '/', $_SERVER["SERVER_NAME"], 0);

	echo 'header';

}else
{
	echo array_shift($errors);//Вывод ошибок по очереди
}


?>
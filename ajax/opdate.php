<?php

include '../system.php';
include '../security.php';

$errors = array();

if (htmlspecialchars(trim($_POST['email']) == ''))
{
	$errors[] = 'Укажите Электронная почта';
}

if (!preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i", $_POST['email']) )
{
	$errors[] = 'Не верное ведденная Электронная почта';
}

$email = $_POST['email'];

$check_email = mysqli_fetch_array(mysqli_query($Connection, "SELECT * FROM `users` WHERE `email` = '$email'"));

if ($_POST['email'] == $check_email['email'])//Проверка проверка логина на существования
{
	$errors[] = 'Эта электроная почта уже занята'; //сохраняет в масив сообщение
}

if (empty($errors) )
{
	$_SESSION['verified'] = array(
		'login' => $_SESSION['verified']['login'],
		'name' => $_SESSION['verified']['name'],
		'surname' => $_SESSION['verified']['surname'],
		'email' => htmlspecialchars(trim($_POST['email'])),

		'day' => $_SESSION['verified']['day'],
		'month' => $_SESSION['verified']['month'],
		'year' => $_SESSION['verified']['year'],

		'sex' => $_SESSION['verified']['sex']
	);

	echo 'OK';

}else
{
	echo array_shift($errors);//Вывод ошибок по очереди
}

?>
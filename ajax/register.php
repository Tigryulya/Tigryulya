<?php

include '../system.php';
include '../security.php';

$errors = array();

if (htmlspecialchars(trim($_POST['login']) == ''))
{
	$errors[] = 'Пожалуйста, укажите логин';
}

if (!preg_match('/^[A-Za-z0-9|-|_]{3,32}$/', $_POST['login']) )
{
	$errors[] = 'Логин содержит не коректные символы';
}

if (htmlspecialchars(trim($_POST['name']) == ''))
{
	$errors[] = 'Укажите имя';
}

if (htmlspecialchars(trim($_POST['surname']) == ''))
{
	$errors[] = 'Укажите фамилию';
}

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

if ($_POST['day'] == 'day') 
{
	$errors[] = 'Укажите дату рождения'; //сохраняет в масив сообщение
}

if ($_POST['month'] == 'month') 
{
	$errors[] = 'Укажите дату рождения'; //сохраняет в масив сообщение
}

if ($_POST['year'] == 'year') 
{
	$errors[] = 'Укажите дату рождения'; //сохраняет в масив сообщение
}

if ($_POST['sex'] == '0') 
{
	$errors[] = 'Укажите свой пол'; //сохраняет в масив сообщение
}

function random($num = 10)
{
	return substr(str_shuffle('0123456789'), 0, $num);
}

if (empty($errors) )
{
	$cod = random(5);
	$_SESSION['code'] = md5($cod);

	setcookie('next_verified', 'next_verified', time()+(60*60*24*30), '/', $_SERVER["SERVER_NAME"], 0);
	
	echo 'OK';
	
	$_SESSION['verified'] = array(
		'login' => htmlspecialchars(trim($_POST['login'])),
		'name' => htmlspecialchars(trim($_POST['name'])),
		'surname' => htmlspecialchars(trim($_POST['surname'])),
		'email' => htmlspecialchars(trim($_POST['email'])),

		'day' => htmlspecialchars(trim($_POST['day'])),
		'month' => htmlspecialchars(trim($_POST['month'])),
		'year' => htmlspecialchars(trim($_POST['year'])),

		'sex' => htmlspecialchars(trim($_POST['sex']))
	);

	mail(htmlspecialchars(trim($_POST['email'])), 'Заголовок', $cod);

}else
{
	echo array_shift($errors);//Вывод ошибок по очереди
}

?>
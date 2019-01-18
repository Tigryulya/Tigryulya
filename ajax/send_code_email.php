<?php

include '../system.php';
include '../security.php';

$errors = array();

if (htmlspecialchars(trim($_POST['email']) == ''))
{
	$errors[] = 'Хм ошибка';
}

if (!preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i", $_POST['email']) )
{
	$errors[] = 'Хм ошибка';
}

$email = $_POST['email'];

$check_email = mysqli_fetch_array(mysqli_query($Connection, "SELECT * FROM `users` WHERE `email` = '$email'"));

if ($_POST['email'] == $check_email['email'])//Проверка проверка логина на существования
{
		$errors[] = 'Хм ошибка но такой email уже зарегистрирован';
}

if (empty($errors) )
{
	function random($num = 10)
	{
		return substr(str_shuffle('0123456789'), 0, $num);
	}

	$cod = random(5);
	$_SESSION['code'] = md5($cod);
	mail(htmlspecialchars(trim($_POST['email'])), 'Заголовок', $cod);
}else
{
	echo array_shift($errors);//Вывод ошибок по очереди
}

?>
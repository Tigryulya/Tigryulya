<?php

include '../system.php';
include '../security.php';

$errors = array();

if (htmlspecialchars(trim($_POST['password'] == '')))
{
	$errors[] = 'Пожалуста, укажите новый пароль';
}

if (empty($errors) )
{

	$login = $_SESSION['verified']['login'];
	$name = $_SESSION['verified']['name'];
	$surname = $_SESSION['verified']['surname'];
	$email = $_SESSION['verified']['email'];

	$date_day = $_SESSION['verified']['day'];
	$date_month = $_SESSION['verified']['month'];
	$date_year = $_SESSION['verified']['year'];

	$sex = $_SESSION['verified']['sex'];

	$password = htmlspecialchars(trim($_POST['password']));

	$url_user = mysqli_fetch_assoc(mysqli_query($Connection, "SELECT * FROM `defaults`"));

	$url = ++$url_user['url_user'];
	$user_url = 'id' . $url;

	mysqli_query($Connection, "UPDATE `defaults` SET `url_user` = '$url'");

	function id($num = 100)
	{
		return substr(str_shuffle('0123456789'), 0, $num);
	}

	$unical = id(99);

	$user_add = mysqli_query($Connection, "INSERT INTO `users` (`unical`, `url`, `login`, `name`, `surname`, `email`, `birth_day`, `birth_month`, `birth_year`, `sex`, `password`) VALUES ('$unical', '$user_url', '$login', '$name', '$surname', '$email', '$date_day', '$date_month', '$date_year', '$sex', '$password')");
	
	setcookie('LG', $login, time()+(60*60*24*30), '/', $_SERVER["SERVER_NAME"], 0);
	setcookie('PW', $password, time()+(60*60*24*30), '/', $_SERVER["SERVER_NAME"], 0);

	//echo 'OK';

}else
{
	echo array_shift($errors);//Вывод ошибок по очереди
}

?>
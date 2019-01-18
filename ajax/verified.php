<?php

include '../system.php';
include '../security.php';

$errors = array();

if (htmlspecialchars(trim($_POST['code'] == '')))
{
	$errors[] = 'Пожалуста, укажите код';
}

if (!preg_match('/^[0-9]{0,5}$/', $_POST['code']))
{
	$errors[] = 'Код не вырный ';
}

if ($_SESSION['code'] != md5($_POST['code']))
{
	$errors[] = 'Код не вырный ';
}

if (empty($errors) )
{
	setcookie('okay_password', $_POST['code'], time()+(60*60*24*30), '/register=verified', $_SERVER["SERVER_NAME"], 0);
	echo 'OK';
	unset($_SESSION['code']);

}else
{
	echo array_shift($errors);//Вывод ошибок по очереди
}

?>
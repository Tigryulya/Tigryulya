<?php

include '../system.php';
include '../security.php';

$errors = array();

$country = htmlspecialchars(trim($_POST['country']));
$city = htmlspecialchars(trim($_POST['city']));
$phone = htmlspecialchars(trim($_POST['phone']));
$add_phone = htmlspecialchars(trim($_POST['add_phone']));
$skype = htmlspecialchars(trim($_POST['skype']));
$discord = htmlspecialchars(trim($_POST['discord']));
$website = htmlspecialchars(trim($_POST['website']));
$email = htmlspecialchars(trim($_POST['email']));

if (empty($errors) )
{
	echo 'Изменения сохранены.';
	$login = $_COOKIE['LG'];
	$opdate_info = mysqli_query($Connection, "UPDATE `users` SET `country` = '$country', `city` = '$city', `mobile` = '$phone', `add_phone` = '$add_phone', `skype` = '$skype', `discord` = '$discord', `website` = '$website', `email_info` = '$email' WHERE `login` = '$login'");
}else
{
	echo array_shift($errors);//Вывод ошибок по очереди
}

?>
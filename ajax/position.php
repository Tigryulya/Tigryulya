<?php

include '../system.php';
include '../security.php';

$errors = array();

$political_preferences = htmlspecialchars(trim($_POST['political_preferences']));
$worldview = htmlspecialchars(trim($_POST['worldview']));
$main_life = htmlspecialchars(trim($_POST['main_life']));
$main_people = htmlspecialchars(trim($_POST['main_people']));
$attitude_smoking = htmlspecialchars(trim($_POST['attitude_smoking']));
$attitude_alcohol = htmlspecialchars(trim($_POST['attitude_alcohol']));
$inspire = htmlspecialchars(trim($_POST['inspire']));

if ($political_preferences != '1' && $political_preferences != '2' && $political_preferences != '3' && $political_preferences != '4' && $political_preferences != '5' && $political_preferences != '6' && $political_preferences != '7' && $political_preferences != '8' && $political_preferences != '9' && $political_preferences != '10')
{
	$errors[] = 'Ошибка в параметре "Полит. предпочтения"';
}

if ($worldview != '1' && $worldview != '2' && $worldview != '3' && $worldview != '4'  && $worldview != '5' && $worldview != '6' && $worldview != '7' && $worldview != '8' && $worldview != '9' && $worldview != '10')
{
	$errors[] = 'Ошибка в параметре "Мировоззрение"';
}

if ($main_life != '1' && $main_life != '2' && $main_life != '3' && $main_life != '4'  && $main_life != '5' && $main_life != '6' && $main_life != '7' && $main_life != '8' && $main_life != '9')
{
	$errors[] = 'Ошибка в параметре "Главное в жизни"';
}

if ($main_people != '1' && $main_people != '2' && $main_people != '3' && $main_people != '4'  && $main_people != '5' && $main_people != '6' && $main_people != '7')
{
	$errors[] = 'Ошибка в параметре "Главное в людях"';
}

if ($attitude_smoking != '1' && $attitude_smoking != '2' && $attitude_smoking != '3' && $attitude_smoking != '4'  && $attitude_smoking != '5' && $attitude_smoking != '6')
{
	$errors[] = 'Ошибка в параметре "Отношение к курению"';
}

if ($attitude_alcohol != '1' && $attitude_alcohol != '2' && $attitude_alcohol != '3' && $attitude_alcohol != '4'  && $attitude_alcohol != '5' && $attitude_alcohol != '6')
{
	$errors[] = 'Ошибка в параметре "Отношение к алкоголю"';
}

if (empty($errors) )
{
	echo 'Изменения сохранены.';
	$login = $_COOKIE['LG'];
	$opdate_info = mysqli_query($Connection, "UPDATE `users` SET `political_preferences` = '$political_preferences', `worldview` = '$worldview', `main_life` = '$main_life', `main_people` = '$main_people', `attitude_smoking` = '$attitude_smoking', `attitude_alcohol` = '$attitude_alcohol', `inspire` = '$inspire' WHERE `login` = '$login'");
}else
{
	echo array_shift($errors);//Вывод ошибок по очереди
}

?>
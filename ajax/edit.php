<?php

include '../system.php';
include '../security.php';

$errors = array();

$name = htmlspecialchars(trim($_POST['name']));
$surname = htmlspecialchars(trim($_POST['surname']));
$sex = htmlspecialchars(trim($_POST['sex']));
$family = htmlspecialchars(trim($_POST['family']));
$birth_day = htmlspecialchars(trim($_POST['birth_day']));
$birth_month = htmlspecialchars(trim($_POST['birth_month']));
$birth_year = htmlspecialchars(trim($_POST['birth_year']));
$birthday_access = htmlspecialchars(trim($_POST['birthday_access']));
$hometown = htmlspecialchars(trim($_POST['hometown']));
$languages = htmlspecialchars(trim($_POST['languages']));

if ($name == '')
{
	$errors[] = 'Пожалуйста, укажите ваше имя';
}

if ($surname == '')
{
	$errors[] = 'Пожалуйста, укажите вашу фамилию';
}

if ($sex != '1' && $sex != '2')
{
	$errors[] = 'Ошибка в параметре "Пол"';
}

if ($family != '0' && $family != '1' && $family != '2' && $family != '3' && $family != '4' && $family != '5' && $family != '6' && $family != '7' && $family != '8')
{
	$errors[] = 'Ошибка в параметре "Семейное положение"';
}

if ($birth_day != '1' && $birth_day != '2' && $birth_day != '3' && $birth_day != '4' && $birth_day != '5' && $birth_day != '6' && $birth_day != '7' && $birth_day != '8' && $birth_day != '9' && $birth_day != '10' && $birth_day != '11' && $birth_day != '12' && $birth_day != '13' && $birth_day != '14' && $birth_day != '15' && $birth_day != '16' && $birth_day != '17' && $birth_day != '18' && $birth_day != '19' && $birth_day != '20' && $birth_day != '21' && $birth_day != '22' && $birth_day != '23' && $birth_day != '24' && $birth_day != '25' && $birth_day != '26' && $birth_day != '27' && $birth_day != '28' && $birth_day != '29' && $birth_day != '30'  && $birth_day != '31')
{
	$errors[] = 'Ошибка в параметре "Дата рождение (День)"';
}

if ($birth_month != '1' && $birth_month != '2' && $birth_month != '3' && $birth_month != '4' && $birth_month != '5' && $birth_month != '6' && $birth_month != '7' && $birth_month != '8' && $birth_month != '9' && $birth_month != '10' && $birth_month != '11' && $birth_month != '12')
{
	$errors[] = 'Ошибка в параметре "Дата рождение (Месяц)"';
}

if ($birth_year != '2018' && $birth_year != '2017' && $birth_year != '2016' && $birth_year != '2015' && $birth_year != '2014' && $birth_year != '2013' && $birth_year != '2012' && $birth_year != '2011' && $birth_year != '2010' && $birth_year != '2009' && $birth_year != '2008' && $birth_year != '2007' && $birth_year != '2006' && $birth_year != '2005' && $birth_year != '2004' && $birth_year != '2003' && $birth_year != '2002' && $birth_year != '2001' && $birth_year != '2000')
{
	$errors[] = 'Ошибка в параметре "Дата рождение (Год)"';
}

if ($birthday_access != '1' && $birthday_access != '2' && $birthday_access != '3')
{
	$errors[] = 'Ошибка в параметре "Показа Даты Рождения"';
}

if (empty($errors) )
{
	echo 'Изменения сохранены.';
	$login = $_COOKIE['LG'];
	$opdate_info = mysqli_query($Connection, "UPDATE `users` SET `name` = '$name', `surname` = '$surname', `sex` = '$sex', `family` = '$family', `birth_day` = '$birth_day', `birth_month` = '$birth_month', `birth_year` = '$birth_year', `birthday_access` = '$birthday_access', `hometown` = '$hometown', `languages` = '$languages' WHERE `login` = '$login'");
}else
{
	echo array_shift($errors);//Вывод ошибок по очереди
}

?>
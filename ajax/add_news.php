<?php

include '../system.php';
include '../function.php';
include '../security.php';

$errors = array();

if (trim($_POST['text']) == '')
{
	$errors[] = '';
}

if (empty($errors) )
{
	$text =  trim($_POST['text']);
	$unical = $im_user['unical'];

	$day = date("d");
	$month = date("j");
	$year = date("Y");
	$clock = date("H");
	$minutes = date("i");

	function id($num = 100)
	{
		return substr(str_shuffle('0123456789'), 0, $num);
	}

	$unical_id = id(99);

	$add_news = mysqli_query($Connection, "INSERT INTO `news` (`unical_id`, `text`, `unical`, `day`, `month`, `year`, `clock`, `minutes`) VALUES ('$unical_id', '$text', '$unical', '$day', '$month', '$year', '$clock', '$minutes')");
}else
{
	echo array_shift($errors);//Вывод ошибок по очереди
}

?>
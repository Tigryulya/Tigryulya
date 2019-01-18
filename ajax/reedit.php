<?php

include '../system.php';
include '../security.php';

print_r($_POST);

$errors = array();

if (empty($errors) )
{
	$text =  trim($_POST['text']);
	$unical_id = $_POST['id'];

	mysqli_query($Connection, "UPDATE `news` SET `text` = '$text' WHERE `unical_id` = '$unical_id'");
}else
{
	echo array_shift($errors);//Вывод ошибок по очереди
}

?>

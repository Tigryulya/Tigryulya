<?php

include '../system.php';
include '../security.php';

$errors = array();

if ($_POST['server'] == 'Server')//Проверка проверка логина на существования
{
	$errors[] = 'Укажите Сервер'; //сохраняет в масив сообщение
}

if (htmlspecialchars(trim($_POST['server']) == ''))//Проверка проверка логина на существования
{
	$errors[] = 'Укажите Сервер'; //сохраняет в масив сообщение
}

if (htmlspecialchars(trim($_POST['name']) == ''))//Проверка проверка логина на существования
{
	$errors[] = 'Укажите имя файла'; //сохраняет в масив сообщение
}

if (htmlspecialchars(trim($_POST['description']) == ''))//Проверка проверка пароля на существования
{
	$errors[] = 'Укажите Описание'; //сохраняет в масив сообщение
}

if ($_FILES['file'] == '')//Проверка проверка пароля на существования
{
	$errors[] = 'Укажите файл'; //сохраняет в масив сообщение
}

if (isset($_FILES['file']) ) // Проверяет существование файла в хеше
{
	$file = $_FILES['file']['name'];
	$filename = '../web/clients/HiTech/mods/' . $file;

	if (file_exists($filename))// Проверка на существование файла в папке
	{
	    $errors[] = 'На данном сервере уже существует этот мод'; //сохраняет в масив сообщение
	}
}

if ($_POST['server_or_client'] == 'not_chosen')//Проверка проверка логина на существования
{
	$errors[] = 'Укажите Сервер 1'; //сохраняет в масив сообщение
}

if (empty($errors) )
{
	if (isset($_FILES['file']) )
	{
		$errors = array();
		$file = $_FILES['file']['name'];
		$file_size = $_FILES['file']['size'];
		$file_tmp = $_FILES['file']['tmp_name'];
		$file_type = $_FILES['file']['type'];
		$file_ext = strtolower(end(explode('.', $_FILES['file']['name'])));

		move_uploaded_file($file_tmp, '../web/clients/HiTech/mods/' . $file);

		$name = $_POST['name'];
		$description = $_POST['description'];
		$src = htmlspecialchars(trim(substr($file, 0)));
		$server = $_POST['server'];
		$server_or_client = $_POST['server_or_client'];

		$add_file_bd = mysqli_query($Connection, "INSERT INTO `mods` (`name`, `server_or_client`, `description`, `src`, `server`) VALUES ('$name', '$server_or_client', '$description', '$src', '$server')");


		$fh = fopen('../web/temp/HiTech', 'a');
		fwrite($fh, '');
		fclose($fh);
		unlink('../web/temp/HiTech');
	}
}else
{
	echo array_shift($errors);//Вывод ошибок по очереди
}

?>
<?php

include 'system.php';

if (!$_COOKIE['language']) setcookie('language', '0', time()+(60*60*24*30), '/', $_SERVER["SERVER_NAME"], 0);
if ($_COOKIE['language'] == '0')
{
	include 'language/RU_ru.php';

}else if ($_COOKIE['language'] == '1')
{
	include 'language/EN_en.php';
}

header('Content-Type: text/html; charset = utf-8');

$login = $_COOKIE['LG'];
$password = $_COOKIE['PW'];

	if ($login && $password)
	{
		$account = mysqli_fetch_array(mysqli_query($Connection, "SELECT * FROM `users` WHERE login = '$login'"));
		if ($account['password'] == $password)
		{
			//echo 'Okay';
		}
	}

	if (htmlspecialchars(trim($_SERVER['REQUEST_URI'] == '/'))) $page = 'join';
	else
	{
		$page = htmlspecialchars(trim(substr($_SERVER['REQUEST_URI'], 1)));
		if (!preg_match('/^[A-Za-z0-9|\_|\.|\/|=]{3,100}$/', $page))
		{
			echo 'Error';
			exit();
		}
	}
	$pages = htmlspecialchars(trim(substr($_SERVER['REQUEST_URI'], 1, 8)));
	$fr = htmlspecialchars(trim(substr($_SERVER['REQUEST_URI'], 10)));
	$edit = htmlspecialchars(trim(substr($_SERVER['REQUEST_URI'], 6)));

	$cinema_url = mysqli_fetch_array(mysqli_query($Connection, "SELECT * FROM `film`"));
	$Infos = mysqli_fetch_assoc(mysqli_query($Connection, "SELECT * FROM `users` WHERE `url` = '$page'"));
	if ($Infos['url']) $chesuihg = '1';

	$im_user = mysqli_fetch_array(mysqli_query($Connection, "SELECT * FROM `users` WHERE login = '$login'"));
	$url_send = $im_user['url'];



	if (file_exists('site/all/'.$page.'.php')) include 'site/all/'.$page.'.php';

	else if ($im_user['gup'] == '1' && $login && $password && file_exists('site/admin/'.$page.'.php')) include 'site/admin/'.$page.'.php';

	else if (!$login && !$password && file_exists('site/guest/'.$page.'.php')) include 'site/guest/'.$page.'.php';
	else if ( $login &&  $password && file_exists('site/register/'.$page.'.php')) include 'site/register/'.$page.'.php';

	else if ($login &&  $password && file_exists('site/guest/'.$page.'.php')) header('Location: /news');

	else if ($chesuihg == '1') include 'site/all/user.php';

	
	else if (!$login && !$password && $page. '=' .  $fr && file_exists('site/guest/register/'.$fr.'.php')) include 'site/guest/register/'.$fr.'.php';
	else if ($login && $password && $page. '=' .  $edit && file_exists('site/register/edit/'.$edit.'.php')) include 'site/register/edit/'.$edit.'.php';
	else if (htmlspecialchars(trim($_SERVER['REQUEST_URI'] == '/cinema/' . $cinema_url['unical']))) include 'site/all/cinema_found.php';
	else echo 'Hi Im Sorry page noy exists :('

 ?>
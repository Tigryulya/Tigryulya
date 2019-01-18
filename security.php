<?php

$login = $_COOKIE['LG'];
$password = $_COOKIE['PW'];

if ($login && $password)
{
	$account = mysqli_fetch_array(mysqli_query($Connection, "SELECT * FROM `users` WHERE login = '$login'"));
	if ($account['password'] != $password)
	{
		setcookie('LG', null, time()+(60*60*24*30), '/', $_SERVER["SERVER_NAME"], 0);
		setcookie('PW', null, time()+(60*60*24*30), '/', $_SERVER["SERVER_NAME"], 0);
		echo '<script type="text/javascript">document.location.href = "../";</script>';

	}
}

?>
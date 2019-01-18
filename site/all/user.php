<?php

include 'system.php';

$url_user = htmlspecialchars(trim(substr($_SERVER['REQUEST_URI'], 1)));

$user = mysqli_fetch_assoc(mysqli_query($Connection, "SELECT * FROM `users` WHERE `url` = '$url_user'"));

include 'template/default/user.html';
include 'include.php';

?>

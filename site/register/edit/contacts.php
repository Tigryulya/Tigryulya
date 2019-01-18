<?php

include 'system.php';

$login = $_COOKIE['LG'];

$edit = mysqli_fetch_assoc(mysqli_query($Connection, "SELECT * FROM `users` WHERE `login` = '$login'"));

include 'template/default/edit/contacts.html';
include 'include.php';

?>
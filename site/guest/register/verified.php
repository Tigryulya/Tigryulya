<?php

include 'system.php';

if (!$_COOKIE['next_verified']) header('Location: /');

include 'template/default/register/verified.html';
include 'include.php';

?>
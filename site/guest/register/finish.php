<?php

include '../system.php';

setcookie('okay_password', null, time()+(60*60*24*30), '/', $_SERVER["SERVER_NAME"], 0);

include 'template/default/register/finish.html';
include 'include.php';

?>
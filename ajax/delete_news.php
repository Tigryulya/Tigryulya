<?php
include '../system.php';
include '../security.php';

$unical_id = $_POST['id'];
$delete_news = mysqli_query($Connection, "DELETE FROM `news` WHERE `unical_id` = '$unical_id'");

?>
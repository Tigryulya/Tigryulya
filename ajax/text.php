<?php

include '../system.php';
include '../security.php';

if ($_POST['id'])
{
	$id = $_POST['id'];
	$ckeck_mods = mysqli_fetch_assoc(mysqli_query($Connection, "SELECT * FROM `mods` WHERE `id` = '$id'"));

	$fh = fopen('../web/clients/HiTech/mods/' . $ckeck_mods['src'], 'a');
	fwrite($fh, '');
	fclose($fh);
	unlink('../web/clients/HiTech/mods/' . $ckeck_mods['src']);

	$file_xesh = fopen('../web/temp/HiTech.php', 'a');
	fwrite($file_xesh, '');
	fclose($file_xesh);
	unlink('../web/temp/HiTech.php');

	$delete_file = mysqli_query($Connection, "DELETE FROM `mods` WHERE `id` = '$id'");
}

?>
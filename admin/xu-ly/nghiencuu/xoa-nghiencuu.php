<?php 
	include_once('../../../config/config.php');

	$id = $_POST["id"];

	$sql = "DELETE FROM `nghien_cuu` WHERE `nghien_cuu`.`id_nghien_cuu` = $id";
	mysqli_query($conn, $sql);
?>
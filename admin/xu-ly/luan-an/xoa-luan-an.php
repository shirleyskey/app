<?php 
	include_once('../../../config/config.php');

	$id = $_POST["id"];

	$sql = "DELETE FROM `luan_an` WHERE `luan_an`.`id` = $id";
	mysqli_query($conn, $sql);
?>
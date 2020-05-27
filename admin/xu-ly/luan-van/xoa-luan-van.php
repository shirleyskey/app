<?php 
	include_once('../../../config/config.php');

	$id = $_POST["id"];

	$sql = "DELETE FROM `luan_van` WHERE `luan_van`.`id` = $id";
	mysqli_query($conn, $sql);
?>
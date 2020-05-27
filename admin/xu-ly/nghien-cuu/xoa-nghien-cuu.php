<?php 
	include_once('../../../config/config.php');

	$id = $_POST["id"];

	$sql = "DELETE FROM `nghiencuu` WHERE `nghiencuu`.`id` = $id";
	mysqli_query($conn, $sql);
?>
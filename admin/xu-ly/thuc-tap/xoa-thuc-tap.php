<?php 
	include_once('../../../config/config.php');

	$id = $_POST["id"];

	$sql = "DELETE FROM `thuc_tap` WHERE `thuc_tap`.`id` = $id";
	mysqli_query($conn, $sql);
?>
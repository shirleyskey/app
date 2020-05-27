<?php 
	include_once('../../../config/config.php');

	$id = $_POST["id"];

	$sql = "DELETE FROM `khoa_luan` WHERE `khoa_luan`.`id` = $id";
	mysqli_query($conn, $sql);
?>
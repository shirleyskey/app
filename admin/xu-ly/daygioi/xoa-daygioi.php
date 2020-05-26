<?php 
	include_once('../../../config/config.php');

	$id = $_POST["id"];

	$sql = "DELETE FROM `day_gioi` WHERE `day_gioi`.`id_daygioi` = $id";
	mysqli_query($conn, $sql);
?>
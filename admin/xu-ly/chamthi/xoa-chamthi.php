<?php 
	include_once('../../../config/config.php');

	$id = $_POST["id"];

	$sql = "DELETE FROM `cham_thi` WHERE `cham_thi`.`id_chamthi` = $id";
	mysqli_query($conn, $sql);
?>
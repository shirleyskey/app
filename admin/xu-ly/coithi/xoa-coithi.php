<?php 
	include_once('../../../config/config.php');

	$id = $_POST["id"];

	$sql = "DELETE FROM `coi_thi` WHERE `coi_thi`.`id_coi_thi` = $id";
	mysqli_query($conn, $sql);
?>
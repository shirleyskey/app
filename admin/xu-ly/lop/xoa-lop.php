<?php 
	include_once('../../../config/config.php');

	$id = $_POST["id"];

	$sql = "DELETE FROM `lop_hoc` WHERE `lop_hoc`.`id_lop` = $id";
	mysqli_query($conn, $sql);
?>
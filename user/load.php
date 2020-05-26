<?php

include_once('../config/config.php');
//load.php

if(isset($_GET["id"])){
    $idlop =  $_GET["id"];
}
$sql = "SELECT `thoi_khoa_bieu` FROM `lop_hoc` WHERE `id_lop` = '$idlop'";
$qr = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($qr);


echo $row["thoi_khoa_bieu"];
?>

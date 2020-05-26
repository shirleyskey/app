<?php
//insert.php
include_once('../config/config.php');

if(isset($_POST["title"]))
{

 $idt = ($_POST["idt"]);
 
 $sql = "SELECT `thoi_khoa_bieu` FROM `lop_hoc` WHERE `id_lop` = '$idt'";
 $qr = mysqli_query($conn, $sql);
 $row = mysqli_fetch_array($qr);

 $rowtkb = json_decode($row["thoi_khoa_bieu"], true);
 
 $id = (int)$_POST["id"];
 $title = ($_POST["title"]);
 $start = ($_POST["start"]);
 $end = ($_POST["end"]);
 $arr = array(
    "id" => $id,
    "title"  => "$title",
    "start" => "$start",
    "end" => "$end"
);
echo ('<br>');
 array_push($rowtkb, $arr);
 var_dump( $rowtkb);
 echo ('<br>');
 $rowjson = json_encode($rowtkb);
 var_dump( $rowjson);
}
$sql2 = "UPDATE `lop_hoc` SET `thoi_khoa_bieu` = '$rowjson' WHERE `lop_hoc`.`id_lop` = $idt";
mysqli_query($conn, $sql2);

?>

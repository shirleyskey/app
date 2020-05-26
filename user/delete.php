
<?php

//delete.php
include_once('../config/config.php');
if(isset($_POST["id"]))
{
    $id = $_POST["id"];
    $idt = $_POST["idt"];
    $sql = "SELECT `thoi_khoa_bieu` FROM `lop_hoc` WHERE `id_lop` = '$idt'";
    $qr = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($qr);
    //Chuyển Json thành mảng
    $rowtkb = json_decode($row["thoi_khoa_bieu"], true);
    foreach($rowtkb as $key => $value){
        if($value["id"] == $id){
            $phantu = $key;
        }
    }
    //Xóa Phần Tử thứ phantu trong mảng
    unset($rowtkb[$phantu]);
    $out = array_values($rowtkb);
    var_dump( $rowtkb);
    // Chuyển về json
    $rowjson = json_encode($out, JSON_PRETTY_PRINT);
    var_dump( $rowjson);
    $sql = "UPDATE `lop_hoc` SET `thoi_khoa_bieu` = '$rowjson' WHERE `lop_hoc`.`id_lop` = $idt";
    mysqli_query($conn, $sql);
}

?>
<?php 
	include_once('../config/config.php');

    $id = $_POST["id"];
    $phantu = $_POST["phantu"];
    
    $sql = "SELECT `thoi_khoa_bieu` FROM `lop_hoc` WHERE `id_lop` = '$id'";
    $qr = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($qr);
    //Chuyển Json thành mảng
     $rowtkb = json_decode($row["thoi_khoa_bieu"], true);
    //Xóa Phần Tử thứ phantu trong mảng
    unset($rowtkb[$phantu]);
    // Chuyển về json
    $rowjson = json_encode($rowtkb);
 
    $sql = "UPDATE `lop_hoc` SET `thoi_khoa_bieu` = '$rowjson' WHERE `lop_hoc`.`id_lop` = $id";
    mysqli_query($conn, $sql);
		 ?>
<script>
	$(document).ready(function() {
		$('#rfpage').click(function(event) {
			window.location.reload();
		});
	});
</script>


	
?>
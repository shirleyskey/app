<?php 
	include_once('../config/config.php');

	$ids = $_POST["ids"];
	$tens = $_POST["tens"];
	$huongdans = (double)$_POST["huongdans"];
	$chams = (double)$_POST["chams"];
	$docs = (double)$_POST["docs"];
	


	
		$sql = "UPDATE `luan_an` SET `ten` = '$tens', `huong_dan` = '$huongdans', `cham` = '$chams', `doc` = '$docs'  WHERE `luan_an`.`id` = $ids";
		mysqli_query($conn, $sql); ?>

		<div class="alert alert-success fade in" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>GOOD!</strong> Sửa Thông tin thành công, mời <strong><a id="rfpage" title="Tải lại" style="color: #FFF">TẢI LẠI TRANG</a></strong>.
    	</div>
        <script>
			window.setTimeout(function(){window.location.href="";}, 100);
        </script> 
        



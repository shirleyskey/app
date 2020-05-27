<?php 
	include_once('../config/config.php');

	$idncs = $_POST["idncs"];
	$tenncs = $_POST["tenncs"];
	$huongdanncs = $_POST["huongdanncs"];
	$chamncs = $_POST["chamncs"];
	$docncs = $_POST["docncs"];

	
		$sql = "UPDATE `nghiencuu` SET `ten` = '$tenncs', `huong_dan` = '$huongdanncs', `cham` = '$chamncs', `doc` = '$docncs'  WHERE `nghiencuu`.`id` = $idncs";
		mysqli_query($conn, $sql); ?>

		<div class="alert alert-success fade in" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>GOOD!</strong> Sửa Thông tin thành công, mời <strong><a id="rfpage" title="Tải lại" style="color: #FFF">TẢI LẠI TRANG</a></strong>.
    	</div>
        <script>
			window.setTimeout(function(){window.location.href="";}, 100);
        </script> 
        



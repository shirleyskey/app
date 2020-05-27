<?php 
	include_once('../config/config.php');

	$idlvs = $_POST["idlvs"];
	$tenlvs = $_POST["tenlvs"];
	$huongdanlvs = $_POST["huongdanlvs"];
	$chamlvs = $_POST["chamlvs"];
	$doclvs = $_POST["doclvs"];

	
		$sql = "UPDATE `luan_van` SET `ten` = '$tenlvs', `huong_dan` = '$huongdanlvs', `cham` = '$chamlvs', `doc` = '$doclvs'  WHERE `luan_van`.`id` = $idlvs";
		mysqli_query($conn, $sql); ?>

		<div class="alert alert-success fade in" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>GOOD!</strong> Sửa Thông tin thành công, mời <strong><a id="rfpage" title="Tải lại" style="color: #FFF">TẢI LẠI TRANG</a></strong>.
    	</div>
        <script>
			window.setTimeout(function(){window.location.href="";}, 100);
        </script> 
        



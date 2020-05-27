<?php 
	include_once('../config/config.php');

	$idkls = $_POST["idkls"];
	$tenkls = $_POST["tenkls"];
	$huongdankls = $_POST["huongdankls"];
	$chamkls = $_POST["chamkls"];
	$dockls = $_POST["dockls"];

	
		$sql = "UPDATE `khoa_luan` SET `ten` = '$tenkls', `huong_dan` = '$huongdankls', `cham` = '$chamkls', `doc` = '$dockls'  WHERE `khoa_luan`.`id` = $idkls";
		mysqli_query($conn, $sql); ?>

		<div class="alert alert-success fade in" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>GOOD!</strong> Sửa Thông tin thành công, mời <strong><a id="rfpage" title="Tải lại" style="color: #FFF">TẢI LẠI TRANG</a></strong>.
    	</div>
        <script>
			window.setTimeout(function(){window.location.href="";}, 100);
        </script> 
        



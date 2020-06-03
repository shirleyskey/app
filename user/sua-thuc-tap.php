<?php 
	include_once('../config/config.php');

	$idtts = $_POST["idtts"];
	$diabantts = $_POST["diabantts"];
	$khoangcachtts = $_POST["khoangcachtts"];
	$sosvtts = $_POST["sosvtts"];
	

	
		$sql = "UPDATE `thuc_tap` SET `dia_ban` = '$diabantts', `khoang_cach` = '$khoangcachtts', `so_sv` = '$sosvtts'  WHERE `thuc_tap`.`id` = $idtts";
		mysqli_query($conn, $sql); ?>

		<div class="alert alert-success fade in" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>GOOD!</strong> Sửa Thông tin thành công, mời <strong><a id="rfpage" title="Tải lại" style="color: #FFF">TẢI LẠI TRANG</a></strong>.
    	</div>
        <script>
			window.setTimeout(function(){window.location.href="";}, 100);
        </script> 
        



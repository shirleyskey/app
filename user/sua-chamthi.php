<?php 
	include_once('../config/config.php');

	$idchamthi = $_POST["idchamthi"];
	$sobaithi = $_POST["sobaithi"];
	$hinhthuc = (int)$_POST["hinhthuc"];
	

	
		$sql = "UPDATE `cham_thi` SET `id_chamthi` = '$idchamthi', `so_bai_thi` = '$sobaithi', `hinh_thuc_cham` = '$hinhthuc' WHERE `cham_thi`.`id_chamthi` = $idchamthi";
		mysqli_query($conn, $sql); ?>

		<div class="alert alert-success fade in" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>GOOD!</strong> Sửa Thông tin Chấm Thi thành công, mời <strong><a id="rfpage" title="Tải lại" style="color: #FFF">TẢI LẠI TRANG</a></strong>.
    	</div>
		<script>
			window.setTimeout(function(){window.location.href="";}, 100);
        </script> 



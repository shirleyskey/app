<?php 
	include_once('../../../config/config.php');
	$idsua = $_POST["idsua"];
	$lops = $_POST["lops"];
	$gvs = $_POST["gvs"];
	if($lops == NULL || $gvs == NULL){ ?>
		<div class="alert alert-warning fade show" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>ERROR!</strong> Tên Lớp và Giáo Viên không được để trống.
    	</div>
	<?php }
	else{
		$sql = "UPDATE `cham_thi` SET `id_lop` = '$lops', `id_giaovien` = '$gvs' WHERE `cham_thi`.`id_chamthi` = $idsua";
		mysqli_query($conn, $sql); ?>

		<div class="alert alert-success fade show" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>GOOD!</strong> Sửa Thông tin Chấm Thi thành công, mời <strong><a id="rfpage" title="Tải lại" style="color: #FFF">TẢI LẠI TRANG</a></strong>.
    	</div>
		<script>
			window.setTimeout(function(){window.location.href="./index.php?menu=chamthi";}, 100);
		</script> 
<?php }
?>

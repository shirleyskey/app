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
		$sql = "UPDATE `day_gioi` SET `id_lop` = '$lops', `id_giaovien` = '$gvs' WHERE `day_gioi`.`id_daygioi` = $idsua";
		mysqli_query($conn, $sql); ?>

		<div class="alert alert-success fade show" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>GOOD!</strong> Sửa Thành Công!<strong><a id="rfpage" title="Tải lại" style="color: #FFF"></a></strong>.
		</div>
		<script>
			window.setTimeout(function(){window.location.href="./index.php?menu=daygioi";}, 100);
		</script> 

<?php }
?>


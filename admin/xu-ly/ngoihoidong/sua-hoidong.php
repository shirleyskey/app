<?php 
	include_once('../../../config/config.php');

	$ids = $_POST["ids"];
	$hdn = $_POST["hdn"];
	$gvn = $_POST["gvn"];
	
	

	if($gvn == NULL){ ?>

		<div class="alert alert-warning fade show" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>ERROR!</strong> Giáo Viên không được để trống.
    	</div>

	<?php }
	else{
		$sql = "UPDATE `ngoi_hoi_dong` SET `id_ngoihoidong` = '$ids', `hoat_dong` = '$hdn', `id_giaovien` = '$gvn' WHERE `ngoi_hoi_dong`.`id_ngoihoidong` = $ids";
		mysqli_query($conn, $sql); ?>

		<div class="alert alert-success fade show" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>GOOD!</strong> Sửa Thành Công!<strong><a id="rfpage" title="Tải lại" style="color: #FFF"></a></strong>.
		</div>
		<script>
			window.setTimeout(function(){window.location.href="./index.php?menu=ngoihoidong";}, 100);
		</script> 

<?php }
?>


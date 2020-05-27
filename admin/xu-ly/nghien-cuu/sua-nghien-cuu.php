<?php 
	include_once('../../../config/config.php');

	$idsua = $_POST["idsua"];
	$tens = $_POST["tens"];
	$gvs = $_POST["idgvs"];
	
	

	if($tens == NULL || $gvs == NULL){ ?>

		<div class="alert alert-warning fade show" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>ERROR!</strong> Các trường không được để trống.
    	</div>

	<?php }
	else{
		$sql = "UPDATE `nghiencuu` SET `ten` = '$tens', `id_giaovien` = '$gvs' WHERE `nghiencuu`.`id` = $idsua";
		mysqli_query($conn, $sql); ?>

		<div class="alert alert-success fade show" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>GOOD!</strong> Sửa thành công, mời <strong><a id="rfpage" title="Tải lại" style="color: #FFF">TẢI LẠI TRANG</a></strong>.
		</div>
		<script>
			window.setTimeout(function(){window.location.href="./index.php?menu=nghien-cuu";}, 100);
		</script> 

<?php }
?>


<?php 
	include_once('../../../config/config.php');
	
	$hd= ($_POST["hd"]);
	$gv = ($_POST["gv"]);
	

	

	if($hd == NULL || $gv == NULL){ ?>
		<div class="alert alert-warning fade show" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>ERROR!</strong> Các trường nhập không được để trống.
    	</div>
	
	<?php } else{
		$themsv = "INSERT INTO `ngoi_hoi_dong` (`id_ngoihoidong`, `id_giaovien`, `hoat_dong`) VALUES (NULL, '$gv', '$hd')";
		mysqli_query($conn, $themsv); ?>
			<div class="alert alert-success fade show" role="alert">
	      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
	      	<strong>GOOD!</strong> Thêm thành công!</a>.
			</div>
			<script>
			window.setTimeout(function(){window.location.href="./index.php?menu=ngoihoidong";}, 100);
		</script> 
		<?php } ?>

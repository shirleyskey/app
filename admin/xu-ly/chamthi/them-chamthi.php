<?php 
	include_once('../../../config/config.php');
	$lop= ($_POST["lop"]);
	$gv = ($_POST["gv"]);
	if($lop == NULL || $gv == NULL){ ?>
		<div class="alert alert-warning fade show" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>ERROR!</strong> Các trường nhập không được để trống.
    	</div>
	<?php } else{
		$themsv = "INSERT INTO `cham_thi` (`id_chamthi`, `id_lop`, `id_giaovien`) VALUES (NULL, '$lop', '$gv')";
		mysqli_query($conn, $themsv); ?>
			<div class="alert alert-success fade show" role="alert">
	      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
	      	<strong>GOOD!</strong> Thêm thành công, Vui lòng <a href="#" id="rfpage" title="TẢI LẠI TRANG" style="color: #FFF; font-weight: bold;">TẢI LẠI TRANG</a>.
			</div>
			<script>
			window.setTimeout(function(){window.location.href="./index.php?menu=chamthi";}, 100);
		</script> 
		<?php } ?>

<?php 
	include_once('../../../config/config.php');
	
	$ten= ($_POST["ten"]);
	$gv = ($_POST["gv"]);
	

	

	if($ten == NULL || $gv == NULL){ ?>
		<div class="alert alert-warning fade show" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>ERROR!</strong> Các trường nhập không được để trống <?php echo $lop; echo $gv; ?>.
    	</div>
	
	<?php } else{
		$themsv = "INSERT INTO `luan_van` (`id`, `ten`, `id_giaovien`) VALUES (NULL, '$ten', '$gv')";
		mysqli_query($conn, $themsv); ?>
			<div class="alert alert-success fade show" role="alert">
	      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
	      	<strong>GOOD!</strong> Thêm thành công, Vui lòng <a href="#" id="rfpage" title="TẢI LẠI TRANG" style="color: #FFF; font-weight: bold;">TẢI LẠI TRANG</a>.
			</div>
			<script>
			window.setTimeout(function(){window.location.href="./index.php?menu=luanvan";}, 100);
		</script> 
		<?php } ?>

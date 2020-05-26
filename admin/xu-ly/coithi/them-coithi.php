<?php 
	include_once('../../../config/config.php');
	
	$lop= ($_POST["lop"]);
	$gv = ($_POST["gv"]);
	

	

	if($lop == NULL || $gv == NULL){ ?>
		<div class="alert alert-warning fade in" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>ERROR!</strong> Các trường nhập không được để trống <?php echo $lop; echo $gv; ?>.
    	</div>
	
	<?php } else{
		$themsv = "INSERT INTO `coi_thi` (`id_coi_thi`, `id_lop`, `id_giaovien`) VALUES (NULL, '$lop', '$gv')";
		mysqli_query($conn, $themsv); ?>
			<div class="alert alert-success fade in" role="alert">
	      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
	      	<strong>GOOD!</strong> Thêm thành công, Vui lòng <a href="#" id="rfpage" title="TẢI LẠI TRANG" style="color: #FFF; font-weight: bold;">TẢI LẠI TRANG</a>.
			</div>
			<script>
			window.setTimeout(function(){window.location.href="./index.php?menu=coithi";}, 100);
		</script> 
		<?php } ?>
<script>
	$(document).ready(function() {
		$('#rfpage').click(function(event) {
			window.location.reload();
		});
	});
</script>
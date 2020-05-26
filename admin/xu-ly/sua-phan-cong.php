<?php 
	include_once('../../config/config.php');

	$idsua = $_POST["idsua"];
	$gv1 = $_POST["gv1"];
	$gv2 = $_POST["gv2"];
	

	if($gv1 == NULL || $gv2 == NULL){ ?>

		<div class="alert alert-warning fade show" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>ERROR!</strong> Không được thiếu giáo viên.
    	</div>

	<?php }
	else{
		$sql = "UPDATE `lop_hoc` SET `id_gvphutrach` = '$gv1', `id_gvthamgia` = '$gv2' WHERE `lop_hoc`.`id_lop` = $idsua";
		mysqli_query($conn, $sql); ?>

		<div class="alert alert-success fade show" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>GOOD!</strong> Sửa Giáo Viên Phụ Trách thành công, mời <strong><a id="rfpage" title="Tải lại" style="color: #FFF">TẢI LẠI TRANG</a></strong>.
		</div>
		<script>
			window.setTimeout(function(){window.location.href="./index.php?menu=phancong";}, 100);
		</script> 

<?php }
?>

<script>
	
	$(document).ready(function() {
		$('#rfpage').click(function(event) {
			location.reload();
		});
	});

</script>
<?php 
	include_once('../../../config/config.php');

	$idlop = $_POST["idlop"];
	$tenlop = $_POST["tenlop"];
	$chuyennganh = $_POST["chuyennganh"];
	$quymo = $_POST["quymo"];
	$siso = $_POST["siso"];
	$he = $_POST["he"];
	$ghichu = $_POST["ghichu"];

	if($tenlop == NULL || $chuyennganh == NULL || $quymo == NULL || $he == NULL){ ?>

		<div class="alert alert-warning fade show" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>ERROR!</strong> Phải Nhập Đầy Đủ Thông Tin Lớp
    	</div>

	<?php }
	else{
	
		$sql = "UPDATE `lop_hoc` SET `ten_lop` = '$tenlop', `chuyen_nganh` = '$chuyennganh', `quy_mo` = '$quymo', `si_so` = '$siso', `he` = '$he', `ghi-chu` = '$ghichu' WHERE `lop_hoc`.`id_lop` = $idlop";
		mysqli_query($conn, $sql); ?>

		<div class="alert alert-success fade show" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>GOOD!</strong> Sửa Thông Tin lớp thành công, mời <strong><a id="rfpage" title="Tải lại" style="color: #FFF">TẢI LẠI TRANG</a></strong>.
    	</div>
		<script>
			window.setTimeout(function(){window.location.href="./index.php?menu=lop";}, 100);
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
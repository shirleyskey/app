<?php 
	include_once('../config/config.php');

	$idcoithi = $_POST["idcoithi"];
	$totnghiep = $_POST["totnghiep"];
	$hocphan = $_POST["hocphan"];

	
		$sql = "UPDATE `coi_thi` SET `id_coi_thi` = '$idcoithi', `thi_tot_nghiep` = '$totnghiep', `thi_het_hoc_phan` = '$hocphan'  WHERE `coi_thi`.`id_coi_thi` = $idcoithi";
		mysqli_query($conn, $sql); ?>

		<div class="alert alert-success fade in" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>GOOD!</strong> Sửa Thông tin <?php echo $idcoithi; echo $totnghiep; echo $hocphan; ?>Chấm Thi thành công, mời <strong><a id="rfpage" title="Tải lại" style="color: #FFF">TẢI LẠI TRANG</a></strong>.
    	</div>



<script>
	
	$(document).ready(function() {
		$('#rfpage').click(function(event) {
			location.reload();
		});
	});

</script>
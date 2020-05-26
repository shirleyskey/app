<?php 
	include_once('../config/config.php');
	$idnghiencuu = $_POST["idnghiencuu"];
	$las = $_POST["las"];
	$clas = $_POST["clas"];
	$lvs = $_POST["lvs"];
	$clvs = $_POST["clvs"];
	$kls = $_POST["kls"];
	$ckls = $_POST["ckls"];
	$ncs = $_POST["ncs"];
	$tttns = $_POST["clas"];
	$ctttns = $_POST["ctttns"];

	
		$sql = "UPDATE `nghien_cuu` SET `luan_an` = '$las', `cham_luan_an` = '$clas', `luan_van` = '$lvs', `cham_luan_van` = '$clvs', `khoa_luan` = '$kls', `cham_khoa_luan` = '$ckls', `nc_khoa_hoc` = '$ncs', `thuc_tap_tot_nghiep` = '$tttns', `cham_thuc_tap_tot_nghiep` = '$ctttns'  WHERE `nghien_cuu`.`id_nghien_cuu` = $idnghiencuu";
		mysqli_query($conn, $sql); ?>

		<div class="alert alert-success fade show" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>GOOD!</strong> Sửa Thông tin <?php echo $idcoithi; echo $totnghiep; echo $hocphan; ?> thành công, mời <strong><a id="rfpage" title="Tải lại" style="color: #FFF">TẢI LẠI TRANG</a></strong>.
        </div>
        <script>
			window.setTimeout(function(){window.location.href="";}, 100);
		</script>



<script>
	
	$(document).ready(function() {
		$('#rfpage').click(function(event) {
			location.reload();
		});
	});

</script>
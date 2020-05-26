<?php 
	include_once('../config/config.php');
	$iddaygioi = $_POST["iddaygioi"];
	$bais = $_POST["bais"];
	$chams = $_POST["chams"];

	
		$sql = "UPDATE `day_gioi` SET `bai_day_gioi` = '$bais', `cham_day_gioi` = '$chams'  WHERE `day_gioi`.`id_daygioi` = $iddaygioi";
		mysqli_query($conn, $sql); ?>

		<div class="alert alert-success fade in" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>GOOD!</strong> Sửa Thông tin <?php echo $idcoithi; echo $totnghiep; echo $hocphan; ?>Chấm Thi thành công, mời <strong><a id="rfpage" title="Tải lại" style="color: #FFF">TẢI LẠI TRANG</a></strong>.
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
<?php 
	include_once('../config/config.php');
	$idngoihoidong = $_POST["idngoihoidong"];
	$hoatdongs = $_POST["hoatdongs"];
	$sogios = $_POST["sogios"];
	$ghichus = $_POST["ghichus"];

	
		$sql = "UPDATE `ngoi_hoi_dong` SET `hoat_dong` = '$hoatdongs', `so_gio` = '$sogios', `ghi_chu` = '$ghichus'  WHERE `ngoi_hoi_dong`.`id_ngoihoidong` = $idngoihoidong";
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
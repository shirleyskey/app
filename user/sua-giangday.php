<?php 
	include_once('../config/config.php');

	$idgiangday = $_POST["idgiangday"];
	$tggiangday = $_POST["tggiangday"];
	$giolythuyet = $_POST["giolythuyet"];
	$xemina = $_POST["xemina"];
	$thaoluan = $_POST["thaoluan"];
	$hinhthucthi = $_POST["hinhthucthi"];
	
	

	if($tggiangday == NULL || $giolythuyet == NULL || $xemina == NULL || $thaoluan == NULL || $hinhthucthi == NULL ){ ?>

		<div class="alert alert-warning fade show" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>ERROR!</strong> Các Trường không được để trống.
    	</div>

	<?php }
	else{
		$sql = "UPDATE `lop_hoc` SET `id_lop` = '$idgiangday', `thoi_gian` = '$tggiangday', `so_gio_ly_thuyet_gvphutrach` = '$giolythuyet', `xemina_gvphutrach` = '$xemina', `thaoluan_gvphutrach` = '$thaoluan', `hinh_thuc_thi` = '$hinhthucthi' WHERE `lop_hoc`.`id_lop` = $idgiangday";
		mysqli_query($conn, $sql); ?>

		<div class="alert alert-success fade show" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>GOOD!</strong> Sửa Thành Công!<strong><a id="rfpage" title="Tải lại" style="color: #FFF">TẢI LẠI TRANG</a></strong>.
    	</div>
		<script>
			window.setTimeout(function(){window.location.href="";}, 100);
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
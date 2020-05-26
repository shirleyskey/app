<?php 
	include_once('../config/config.php');

	$idthamgia = $_POST["idthamgia"];
	$thamgia2 = $_POST["thamgia2"];
	$giolythuyet2 = $_POST["giolythuyet2"];
	$xemina2 = $_POST["xemina2"];
	$thaoluan2 = $_POST["thaoluan2"];
	$hinhthucthi2 = $_POST["hinhthucthi2"];
	
	

	if($thamgia2 == NULL || $giolythuyet2 == NULL || $xemina2 == NULL || $thaoluan2 == NULL || $hinhthucthi2 == NULL ){ ?>

		<div class="alert alert-warning fade in" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>ERROR!</strong> Các Trường không được để trống.
    	</div>

	<?php }
	else{
		$sql = "UPDATE `lop_hoc` SET `id_lop` = '$idthamgia', `thoigian_gv_thamgia` = '$thamgia2', `so_gio_ly_thuyet_gvthamgia` = '$giolythuyet2', `xemina_gvthamgia` = '$xemina2', `thaoluan_gvthamgia` = '$thaoluan2', `hinh_thuc_thi` = '$hinhthucthi2' WHERE `lop_hoc`.`id_lop` = $idthamgia";
		mysqli_query($conn, $sql); ?>

		<div class="alert alert-success fade in" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>GOOD!</strong> Sửa Thông tin Tham Gia thành công, mời <strong><a id="rfpage" title="Tải lại" style="color: #FFF">TẢI LẠI TRANG</a></strong>.
    	</div>

<?php }
?>

<script>
	
	$(document).ready(function() {
		$('#rfpage').click(function(event) {
			location.reload();
		});
	});

</script>
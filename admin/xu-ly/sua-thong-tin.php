<?php 
	include_once('../../config/config.php');

	$idsua = $_POST["idsua"];
    $tenadmins = $_POST["tenadmins"];
    $mk = $_POST["matkhaus"];
	$tenadminhienthis = $_POST["tenadminhienthis"];
	$matkhaus = (md5($_POST["matkhaus"]));
	$sdts = $_POST["sdts"];
	$ngaysinhs = $_POST["ngaysinhs"];
	if($tenadmins == NULL || $mk == NULL || $tenadminhienthis == NULL){ ?>
		<div class="alert alert-warning fade show" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>ERROR!</strong>Các trường không được để trống.
    	</div>
	<?php }
	else{
		$sql = "UPDATE `tai_khoan` SET `ten_tai_khoan` = '$tenadmins', `ten_sinh_vien` = '$tenadminhienthis', `sdt` = '$sdts', `ngay_sinh` = '$ngaysinhs', `mat_khau` = '$matkhaus'  WHERE `tai_khoan`.`id_tai_khoan` = $idsua";
		mysqli_query($conn, $sql); ?>
		<div class="alert alert-success fade show" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>GOOD!</strong> Sửa Thông Tin thành công, mời <strong><a id="rfpage" title="Tải lại" style="color: #FFF">TẢI LẠI TRANG và Đăng Nhập Lại</a></strong>.
		</div>
		<script>
			window.setTimeout(function(){window.location.href="../tai-khoan/dang-xuat.php";}, 100);
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

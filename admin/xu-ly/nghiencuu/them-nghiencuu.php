<?php 
	include_once('../../../config/config.php');
	
	$gv = ($_POST["gv"]);
	$lat = htmlspecialchars($_POST["lat"]);
	$clat = htmlspecialchars($_POST["clat"]);
	$lvt = htmlspecialchars($_POST["lvt"]);
	$clvt = htmlspecialchars($_POST["clvt"]);
	$klt = htmlspecialchars($_POST["klt"]);
	$cklt = htmlspecialchars($_POST["cklt"]);
	$kht = htmlspecialchars($_POST["kht"]);
	$tttnt = htmlspecialchars($_POST["tttnt"]);
	$ctttnt = htmlspecialchars($_POST["ctttnt"]);
	if($gv == NULL){ ?>
		<div class="alert alert-warning fade in" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>ERROR!</strong> Các trường nhập không được để trống.
    	</div>
	
	<?php } else{
		$themsv = "INSERT INTO `nghien_cuu` (`id_nghien_cuu`, `id_giaovien`, `luan_an`, `cham_luan_an`, `luan_van`, `cham_luan_van`, `khoa_luan`, `cham_khoa_luan`, `nc_khoa_hoc`, `thuc_tap_tot_nghiep`, `cham_thuc_tap_tot_nghiep`) VALUES (NULL, '$gv', '$lat', '$clat', '$lvt', '$clvt', '$klt', '$cklt', '$kht', '$tttnt', '$ctttnt')";
		mysqli_query($conn, $themsv); ?> 
			<div class="alert alert-success fade in" role="alert">
	      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
			  <strong>GOOD!</strong> Thêm thành công!!!
			   <a href="#" id="rfpage" title="TẢI LẠI TRANG" style="color: #FFF; font-weight: bold;"></a>.
			</div>
			<script>
			window.setTimeout(function(){window.location.href="./index.php?menu=nghiencuu";}, 100);
		</script> 
		<?php } ?>

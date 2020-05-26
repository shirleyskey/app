<?php 
	include_once('../../../config/config.php');

	$idsua = $_POST["idsua"];
	$gvs = $_POST["gvs"];
	$las = htmlspecialchars($_POST["las"]);
	$clas = htmlspecialchars($_POST["clas"]);
	$lvs = htmlspecialchars($_POST["lvs"]);
	$clvs = htmlspecialchars($_POST["clvs"]);
	$kls = htmlspecialchars($_POST["kls"]);
	$ckls = htmlspecialchars($_POST["ckls"]);
	$khs = htmlspecialchars($_POST["khs"]);
	$tttns = htmlspecialchars($_POST["tttns"]);
	$ctttns = htmlspecialchars($_POST["ctttns"]);
	
	
	

	if($gvs == NULL){ ?>

		<div class="alert alert-warning fade in" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>ERROR!</strong> Giáo Viên không được để trống.
    	</div>

	<?php }
	else{
		$sql = "UPDATE `nghien_cuu` SET `id_giaovien` = '$gvs', `luan_an` = '$las', `cham_luan_an` = '$clas', `luan_van` = '$lvs', `cham_luan_van` = '$clvs', `khoa_luan` = '$kls', `cham_khoa_luan` = '$ckls', `nc_khoa_hoc` = '$khs', `thuc_tap_tot_nghiep` = '$tttns', `cham_thuc_tap_tot_nghiep` = '$ctttns' WHERE `nghien_cuu`.`id_nghien_cuu` = $idsua";
		mysqli_query($conn, $sql); ?>

		<div class="alert alert-success fade in" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
		  <strong>GOOD!</strong> Sửa thành công!!!
		  <strong><a id="rfpage" title="Tải lại" style="color: #FFF"></a></strong>.
		</div>
		<script>
			window.setTimeout(function(){window.location.href="./index.php?menu=nghiencuu";}, 100);
		</script> 

<?php }
?>


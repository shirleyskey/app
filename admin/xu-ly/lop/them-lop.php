<?php 
	include_once('../../../config/config.php');
	
	$tenlopt= htmlspecialchars($_POST["tenlopt"]);
	$chuyennganht = htmlspecialchars($_POST["chuyennganht"]);
	$quymot = htmlspecialchars($_POST["quymot"]);
	$sisot = htmlspecialchars($_POST["sisot"]);
	$het = htmlspecialchars($_POST["het"]);
	$ghichut = htmlspecialchars($_POST["ghichut"]);

	$kiemtra = "SELECT `ten_lop` FROM `lop_hoc` WHERE `ten_lop` = '$tenlopt'";
	$chay = mysqli_query($conn, $kiemtra);
	$xem = mysqli_fetch_assoc($chay);

	if($tenlopt == NULL || $chuyennganht == NULL || $quymot == NULL || $het == NULL || $ghichut == NULL){ ?>
		<div class="alert alert-warning fade show" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>ERROR!</strong> Các trường nhập không được để trống.
    	</div>
	<?php }elseif(mysqli_num_rows($chay) > 0){ ?>
		<div class="alert alert-warning fade show" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>ERROR!</strong> Tên Lớp<span style="font-weight:bold;text-transform: uppercase;text-decoration: underline;">
      	<?php echo $tenadmin;?>
      	</span> Đã tồn tại, Vui lòng chọn tên khác.
    	</div>
	<?php } else{
		$themsv = "INSERT INTO `lop_hoc` (`id_lop`, `ten_lop`, `chuyen_nganh`, `quy_mo`, `si_so`, `he`, `ghi-chu`) VALUES (NULL, '$tenlopt', '$chuyennganht', '$quymot', '$sisot', '$het', '$ghichut')";
		mysqli_query($conn, $themsv); ?>
			<div class="alert alert-success fade show" role="alert">
	      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
	      	<strong>GOOD!</strong> Thêm Lớp thành công, Vui lòng <a href="#" id="rfpage" title="TẢI LẠI TRANG" style="color: #FFF; font-weight: bold;">TẢI LẠI TRANG</a>.
			</div>
			<script>
			window.setTimeout(function(){window.location.href="./index.php?menu=lop";}, 100);
		</script> 
		<?php } ?>

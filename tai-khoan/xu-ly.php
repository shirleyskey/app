<?php 
	include_once('../config/config.php');
	$taikhoanlg =  addslashes($_POST["taikhoanlg"]);
	$matkhaulg = (md5($_POST["matkhaulg"]));

	$kiemtra = "SELECT * FROM `tai_khoan` WHERE 
	`ten_tai_khoan` = '".$taikhoanlg."' AND `mat_khau` = '".$matkhaulg."'";
	$chay = mysqli_query($conn, $kiemtra);
	$xem = mysqli_fetch_assoc($chay);

	if($taikhoanlg == NULL || $matkhaulg == NULL){ ?>
		<div class="alert alert-warning fade in" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>ERROR!</strong> Các trường nhập không được để trống.
    	</div>
	<?php } else{
	if(mysqli_num_rows($chay) > 0){
		session_start();
		$_SESSION["taikhoan"] = $xem["id_tai_khoan"];
		$_SESSION["nhomtk"] = $xem["nhom_tai_khoan"];
		$_SESSION["tensv"] = $xem["ten_sinh_vien"];
		$_SESSION["user"] = $xem["ten_tai_khoan"];
		$_SESSION["password"] = $xem["mat_khau"];
		
		$_SESSION["ns"] = $xem["ngay_sinh"];
		$_SESSION["sdt"] = $xem["sdt"];
	 ?>
		
		<div class="alert sign-in alert-success alert-dismissible fade show" role="alert">
			
			<span class="alert-text "><strong>GOOD!</strong> Đăng nhập thành công, trở về trang chủ sau 3s.</span>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true"><i class="ni ni-fat-remove"></i></span>
			</button>
		</div>
		<?php 
			 if ($_SESSION["nhomtk"] == 1) { ?>
				<script>
				  window.location.href = "../admin/index.php";
				</script>
			  <?php } else {  ?>
				<script>
				window.setTimeout(function(){window.location.href="../index.php";}, 1000);
				</script>
			<?php } ?>
	<?php } else { ?>
		
		<div class="alert sign-in alert-warning alert-dismissible fade show" role="alert">
			
			<span class="alert-text "><strong>ERROR!</strong> Tài khoản or Mật khẩu không chính xác.</span>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	<?php }}
	mysqli_close($conn);
 ?>
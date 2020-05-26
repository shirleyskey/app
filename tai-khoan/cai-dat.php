<?php 
	include_once('../config/config.php');
	$idtk = $_POST["idtk"];
	$tentk = $_POST["tentk"];
  $tenhienthitk = $_POST["tenhienthitk"];
  $mk = $_POST["matkhautk"];
  $matkhautk = (md5($_POST["matkhautk"]));
	$sdttk = $_POST["sdttk"];
	$ngaysinhtk = $_POST["ngaysinhtk"];
	if($tentk == NULL || $tenhienthitk == NULL || $mk == NULL ){ ?>
		<div class="alert alert-warning fade show" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>ERROR!</strong> Các Trường Nhập Không Được Để Trống
    	</div>

    <?php }
	else{
    
      $sql = "UPDATE `tai_khoan` SET `ten_tai_khoan` = '$tentk', `ten_sinh_vien` = '$tenhienthitk', `sdt` = '$sdttk', `ngay_sinh` = '$ngaysinhtk' WHERE `tai_khoan`.`id_tai_khoan` = $idtk";
      mysqli_query($conn, $sql); ?>
      <div class="alert alert-success fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
        <strong>GOOD!</strong> Sửa Thông Tin Tài Khoản thành công
        , mời <strong><a id="rfpage" title="Tải lại" style="color: #FFF">TẢI LẠI TRANG và Đăng Nhập lại</a></strong>.
      </div>
      <script>
			  window.setTimeout(function(){window.location.href="tai-khoan/dang-xuat.php";}, 100);
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
      
      
            
        




		

<?php 
	include_once('../config/config.php');
	
	$ids = ($_POST["ids"]);
	$ngays = ($_POST["ngays"]);
    $cas = ($_POST["cas"]);
    $buois = ($_POST["buois"]);
    $phantus = ($_POST["phantus"]);
    $arr = array(
        "ngay"  => "$ngays",
        "buoi" => "$buois",
        "ca" => "$cas"
    );
    

	$sql = "SELECT `thoi_khoa_bieu` FROM `lop_hoc` WHERE `id_lop` = '$ids'";
    $qr = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($qr);
    //Chuyển json từ CSDL thành mảng 
    $rowtkb = json_decode($row["thoi_khoa_bieu"], true);
    // Sửa phần tử thứ phantu thành mảng arr
    $rowtkb[$phantus] = $arr;
   

   
    // Decode về json 
    $rowjson = json_encode($rowtkb);

	if($ngays == NULL || $buois == NULL || $cas == NULL){ ?>
		<div class="alert alert-warning fade in" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>ERROR!</strong> Các trường nhập không được để trống.
        </div>

        <?php
 } else{
    $sql = "UPDATE `lop_hoc` SET `thoi_khoa_bieu` = '$rowjson' WHERE `lop_hoc`.`id_lop` = $ids";
    mysqli_query($conn, $sql);
		 ?>
			<div class="alert alert-success fade in" role="alert">
	      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
	      	<strong>GOOD!</strong> Sửa thành công, Vui lòng <a href="#" id="rfpage" title="TẢI LẠI TRANG" style="color: #FFF; font-weight: bold;">TẢI LẠI TRANG</a>.
	    	</div>
		<?php } ?>
<script>
	$(document).ready(function() {
		$('#rfpage').click(function(event) {
			window.location.reload();
		});
	});
</script>
<?php 
	include_once('../config/config.php');
	
	$tngay = ($_POST["tngay"]);
	$tbuoi = ($_POST["tbuoi"]);
    $tca = ($_POST["tca"]);
    $idt = ($_POST["idt"]);
    $arr = array(
        "ngay"  => "$tngay",
        "buoi" => "$tbuoi",
        "ca" => "$tca"
    );
    

	$sql = "SELECT `thoi_khoa_bieu` FROM `lop_hoc` WHERE `id_lop` = '$idt'";
    $qr = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($qr);
    
    $rowtkb = json_decode($row["thoi_khoa_bieu"], true);
    array_push($rowtkb, $arr);
    $rowjson = json_encode($rowtkb);

	if($tngay == NULL || $tbuoi == NULL || $tca == NULL){ ?>
		<div class="alert alert-warning fade in" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>ERROR!</strong> Các trường nhập không được để trống.
        </div>

        <?php
 } else{
    $sql = "UPDATE `lop_hoc` SET `thoi_khoa_bieu` = '$rowjson' WHERE `lop_hoc`.`id_lop` = $idt";
    mysqli_query($conn, $sql);
		 ?>
			<div class="alert alert-success fade in" role="alert">
	      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
	      	<strong>GOOD!</strong> Thêm thành công, Vui lòng <a href="#" id="rfpage" title="TẢI LẠI TRANG" style="color: #FFF; font-weight: bold;">TẢI LẠI TRANG</a>.
	    	</div>
		<?php } ?>
<script>
	$(document).ready(function() {
		$('#rfpage').click(function(event) {
			window.location.reload();
		});
	});
</script>
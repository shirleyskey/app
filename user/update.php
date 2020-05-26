<?php 
	include_once('../config/config.php');
	
	$idt = ($_POST["idt"]);
	$id = (int)($_POST["id"]);
    $title = ($_POST["title"]);
    $start = ($_POST["start"]);
    $end = ($_POST["end"]);
    $arr = array(
        "id"  => $id,
        "title" => "$title",
        "start" => "$start",    
        "end" => "$end"
    );

	$sql = "SELECT `thoi_khoa_bieu` FROM `lop_hoc` WHERE `id_lop` = '$idt'";
    $qr = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($qr);
    //Chuyển json từ CSDL thành mảng 
    $rowtkb = json_decode($row["thoi_khoa_bieu"], true);
    // Sửa phần tử thứ phantu thành mảng arr
    foreach($rowtkb as $key => $value){
        if($value["id"] == $id){
            $phantus = $key;
        }
    }
    var_dump( $arr);
    $rowtkb[$phantus] = $arr;
    // Decode về json 
    $rowjson = json_encode($rowtkb);
    
	?>
<script>
	$(document).ready(function() {
		$('#rfpage').click(function(event) {
			window.location.reload();
		});
	});
</script>
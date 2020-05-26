<?php
	include_once('../config/config.php');
	$title = "Admin - ";
	include_once('../header.php');
 ?>
<?php
		if($_SESSION["taikhoan"] == NULL){ ?>
			<script>
				window.location.href="../tai-khoan/dang-nhap.php";
			</script>
		<?php } elseif($_SESSION["nhomtk"] != 1){ ?>
			<div class="alert alert-danger fade in" role="alert" style="max-width:400px;margin:0 auto">
		      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
		      <strong>ERROR!</strong> Bạn không đủ quyền để truy cập trang này, trở lại trang chủ sau 3s.
		      <script>
	    	window.setTimeout(function(){window.location.href="../index.php";}, 3000);
	    	</script>
		    </div>
		<?php }else {?>
			<div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="index.php">Admin</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Lịch Trình Giảng Dạy</li>
                </ol>
              </nav>
            </div>
          </div>
		<?php
			$sql = "SELECT * FROM `lop_hoc`";
			$qr = mysqli_query($conn, $sql);
		 ?>
			<div class="caption">
			<h1 style="text-align: center">LỊCH TRÌNH GIẢNG DẠY</h1>
			</div>
			<hr>
			<div class="row">
				<table class="table table-bordered table-responsive">
					<tr class="chimuc">
						<th>STT</th>
						<th>Tên Lớp</th>
						<th>Thời Gian</th>
						<th>Hệ</th>
						<th>Quy Mô</th>
						<th>Giáo Viên Thực Hiện</th>
                        <th>Số Giờ Lý Thuyết</th>
                        <th>Xemina</th>
                        <th>Thảo Luận</th>
						<th>Hình Thức Thi</th>
						<th>Tổng Giờ</th>
					</tr>
					<tbody>
					<?php $stt = 1; ?>
					<?php while($row = mysqli_fetch_assoc($qr)){ ?>
						<tr>
							<td><?php echo $stt;?></td>
							<td>
							<?php echo $row["ten_lop"]; ?>
							</td>
							<td style="color: #f5365c;"><?php echo $row["thoi_gian"]?></td>
							<td><?php echo $row["he"]?></td>
							<td><?php echo $row["quy_mo"]?></td>
							<td  style="color: #fb6340;">
                            <?php $idgv1 = $row["id_gvphutrach"];
                            $sqlgv1 = "SELECT `ten_sinh_vien` FROM `tai_khoan` WHERE `id_tai_khoan` = '$idgv1'";
                            $qrgv1 = mysqli_query($conn, $sqlgv1);
                            $rowgv1 = mysqli_fetch_assoc($qrgv1);
                            echo $rowgv1["ten_sinh_vien"];
                            ?>
							</td>
							<td style="color: #f5365c;"><?php echo $row["so_gio_ly_thuyet"]?></td>
							<td style="color: #f5365c;"><?php echo $row["xemina"]?></td>
							<td style="color: #f5365c;"><?php echo $row["thaoluan"]?></td>
							<td><?php echo $row["hinh_thuc_thi"]?></td>
							<td><?php echo ($row["so_gio_ly_thuyet"] + $row["xemina"] + $row["thaoluan"])?></td>
						</tr>
						<?php $stt = $stt + 1; ?>
						<?php } ?>
					</tbody>
				</table>
<br>
			</div>
    <!-- Thông tin Admin -->
    <?php } ?>
</div>
 <?php 
	include_once('../footer.php');
 ?>


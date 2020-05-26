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
		<?php
			$sql = "SELECT * FROM `tai_khoan` WHERE `nhom_tai_khoan`=0";
			$qr = mysqli_query($conn, $sql);
		 ?>
		 	<div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="index.php">Admin</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Hoạt Động Khác</li>
                </ol>
              </nav>
            </div>
          </div>
			<div class="caption">
			<h1 style="text-align: center">TỔNG HỢP GIỜ GIẢNG</h1>
			</div>
			<hr>
			<div class="row">
				<table class="table table-bordered table-responsive">
					<tr class="chimuc">
						<th>STT</th>
						<th>Tên Giáo Viên</th>
						<th>Giờ Giảng</th>
						<th>Chấm Thi</th>
						<th>Coi Thi</th>
						<th>Hướng Dẫn Luận Án</th>
						<th>Chấm Luận Án</th>
						<th>Hướng Dẫn Luận Văn</th>
                        <th>Chấm Luận Văn</th>
                        <th>Hướng Dẫn Khóa Luận</th>
                        <th>Chấm Khóa Luận</th>
                        <th>Hướng Dẫn Thực Tập Tốt Nghiệp</th>
                        <th>Chuyên Đề Thực Tập Tốt Nghiệp</th>
                        <th>Chấm Dạy Giỏi</th>
						<th>Thực Hiện Bài  Dạy Giỏi</th>
						<th>Tổng Giờ</th>
					</tr>
					<tbody>
					<?php $stt = 1; ?>
					<?php while($row = mysqli_fetch_assoc($qr)){ ?>
						<tr>
							<td><?php echo $stt;?></td>
							<td>
							<?php echo $row["ten_sinh_vien"]; ?>
							</td>
							<td>
							<!--------------------------- $tonggiogiang -->
								<?php 
								$giaovien = $row["id_tai_khoan"];
								$sqlgv_phutrach = "SELECT * FROM `lop_hoc` WHERE `id_gvphutrach` = '$giaovien'";
								$qrgv_phutrach = mysqli_query($conn, $sqlgv_phutrach);
								$giogv_phutrach = 0;
								while($rowgv_phutrach = mysqli_fetch_assoc($qrgv_phutrach)){
									$giogv_phutrach = $giogv_phutrach + $rowgv_phutrach["so_gio_ly_thuyet_gvphutrach"] + $rowgv_phutrach["xemina_gvphutrach"] + $rowgv_phutrach["thaoluan_gvphutrach"];
								}

								$sqlgv_thamgia = "SELECT * FROM `lop_hoc` WHERE `id_gvthamgia` = '$giaovien'";
								$qrgv_thamgia = mysqli_query($conn, $sqlgv_thamgia);
								$giogv_thamgia = 0;
								while($rowgv_thamgia = mysqli_fetch_assoc($qrgv_thamgia)){
									$giogv_thamgia = $giogv_thamgia + $rowgv_thamgia["so_gio_ly_thuyet_gvthamgia"] + $rowgv_thamgia["xemina_gvthamgia"] + $rowgv_thamgia["thaoluan_gvthamgia"];
								}
								$tonggiogiang = $giogv_phutrach + $giogv_thamgia;
								echo ($tonggiogiang);
								?>
							
							</td>
							<!-- Chấm Thi---------------------- $tonggiochamthi -->
							<td style="color: #f5365c;">
							<?php 
							$idgv1 = $row["id_tai_khoan"];
                            $sqlchamthi = "SELECT * FROM `cham_thi` WHERE `id_giaovien` = '$idgv1'";
                            $qrchamthi = mysqli_query($conn, $sqlchamthi);
							$rowchamthi = mysqli_fetch_assoc($qrchamthi);
							$tonggiochamthi = $rowchamthi["thi_viet"] + $rowchamthi["thi_tieu_luan"] + $rowchamthi["thi_van_dap"] + $rowchamthi["thi_tot_nghiep"];
                            echo ($tonggiochamthi)  ;
                            ?>
                            </td>
						<!-- Coi Thi ------------------ $tonggiocoithi-->
						<td style="color: #f5365c;">
                            <?php 
                            $sqlcoithi = "SELECT * FROM `coi_thi` WHERE `id_giaovien` = '$idgv1'";
                            $qrcoithi = mysqli_query($conn, $sqlcoithi);
							$rowcoithi = mysqli_fetch_assoc($qrcoithi);
							$tonggiocoithi = $rowcoithi["thi_tot_nghiep"] + $rowcoithi["thi_het_hoc_phan"];
                            echo ($tonggiocoithi) ;
                            ?>
                            </td>
						<!-- Hướng Dẫn Luận Án-------------------- $tongluanan -->
						<td style="color: #f5365c;">
						<ul style="list-style-type: decimal-leading-zero;">
                            <?php 
                            $sqlnghiencuu = "SELECT * FROM `nghien_cuu` WHERE `id_giaovien` = '$idgv1'";
							$qrnghiencuu = mysqli_query($conn, $sqlnghiencuu);
							$sttluanan = 0;
							while($rownghiencuu = mysqli_fetch_assoc($qrnghiencuu)){
								$sttluanan = $sttluanan + 1;
							echo "<li> ".$rownghiencuu["luan_an"]."</li>";
							}
							$tongluanan = $sttluanan *10;
							?>
							</ul>
						</td>
						<!-- --------------$tongchamluanan -------------------->
						<td>
						<ul style="list-style-type: decimal-leading-zero;">
                            <?php 
								 $sqlnghiencuu2 = "SELECT * FROM `nghien_cuu` WHERE `id_giaovien` = '$idgv1'";
								 $qrnghiencuu2 = mysqli_query($conn, $sqlnghiencuu2);
								 $sttchamluanan = 0;
								 while($rownghiencuu2 = mysqli_fetch_assoc($qrnghiencuu2)){
									$sttchamluanan = $sttchamluanan + 1;
								 echo "<li> ".$rownghiencuu2["cham_luan_an"]."</li>";
								 }
								 $tongchamluanan = $sttchamluanan *10;
							?>
							</ul>
					
						</td>
						<!-- Hướng Dẫn Luận Văn ------------------  $tongluanvan -->
						<td>
						<ul style="list-style-type: decimal-leading-zero;">
                            <?php 
								 $sqlnghiencuu3 = "SELECT * FROM `nghien_cuu` WHERE `id_giaovien` = '$idgv1'";
								 $qrnghiencuu3 = mysqli_query($conn, $sqlnghiencuu3);
								 $sttluanvan = 0;
								 while($rownghiencuu3 = mysqli_fetch_assoc($qrnghiencuu3)){
									$sttluanvan = $sttluanvan + 1;
								 echo "<li> ".$rownghiencuu3["luan_van"]."</li>";
								 }
								 $tongluanvan = $sttluanvan *10;
							?>
							</ul>
						</td>	
						<!-- Chấm Luận Văn --------------------------- $tongchamluanvan-->
						<td>
						<ul style="list-style-type: decimal-leading-zero;">
                            <?php 
								 $sqlnghiencuu4 = "SELECT * FROM `nghien_cuu` WHERE `id_giaovien` = '$idgv1'";
								 $qrnghiencuu4 = mysqli_query($conn, $sqlnghiencuu4);
								 $sttchamluanvan = 0;
								 while($rownghiencuu4 = mysqli_fetch_assoc($qrnghiencuu4)){
									$sttchamluanvan = $sttchamluanvan + 1;
								 echo "<li> ".$rownghiencuu4["cham_luan_van"]."</li>";
								 }
								 $tongchamluanvan = $sttchamluanvan *10;
							?>
							</ul>
						</td>
						<!-- Hướng Dẫn Khóa Luận---------------- $tongkhoaluan  -->
						<td>
						<ul style="list-style-type: decimal-leading-zero;">
                            <?php 
								 $sqlnghiencuu5 = "SELECT * FROM `nghien_cuu` WHERE `id_giaovien` = '$idgv1'";
								 $qrnghiencuu5 = mysqli_query($conn, $sqlnghiencuu5);
								 $sttkhoaluan = 0;
								 while($rownghiencuu5 = mysqli_fetch_assoc($qrnghiencuu5)){
									$sttkhoaluan = $sttkhoaluan + 1;
								 echo "<li> ".$rownghiencuu5["khoa_luan"]."</li>";
								 }
								 $tongkhoaluan = $sttkhoaluan *10;
							?>
							</ul>
						</td>
						<!-- Chấm Khóa Luận --------------- $tongchamkhoaluan -->
						<td>
						<ul style="list-style-type: decimal-leading-zero;">
                            <?php 
								 $sqlnghiencuu6 = "SELECT * FROM `nghien_cuu` WHERE `id_giaovien` = '$idgv1'";
								 $qrnghiencuu6 = mysqli_query($conn, $sqlnghiencuu6);
								 $sttchamkhoaluan = 0;
								 while($rownghiencuu6 = mysqli_fetch_assoc($qrnghiencuu6)){
									$sttchamkhoaluan = $sttchamkhoaluan + 1;
								 echo "<li> ".$rownghiencuu6["cham_khoa_luan"]."</li>";
								 }
								 $tongchamkhoaluan = $sttchamkhoaluan *10;
							?>
							</ul>
						</td>
						<!-- Hướng Dẫn Thực Tập Tốt Nghiệp  ------------------ $tongtttn -->
						<td>
						<ul style="list-style-type: decimal-leading-zero;">
                            <?php 
								 $sqlnghiencuu7 = "SELECT * FROM `nghien_cuu` WHERE `id_giaovien` = '$idgv1'";
								 $qrnghiencuu7 = mysqli_query($conn, $sqlnghiencuu7);
								 $stttttn = 0;
								 while($rownghiencuu7 = mysqli_fetch_assoc($qrnghiencuu7)){
								 echo "<li> ".$rownghiencuu7["thuc_tap_tot_nghiep"]."</li>";
								 $stttttn = $stttttn + 1;
								 }
								 $tongtttn =  $stttttn * 10; 
							?>
							</ul>
						</td>
						<!-- Chuyên Đề Thực Tập Tốt Nghiệp ------------------- $tongtttn2   -->
						<td>
						<ul style="list-style-type: decimal-leading-zero;">
                            <?php 
								 $sqlnghiencuu8 = "SELECT * FROM `nghien_cuu` WHERE `id_giaovien` = '$idgv1'";
								 $qrnghiencuu8 = mysqli_query($conn, $sqlnghiencuu8);
								 $stttttn2 = 0;
								 while($rownghiencuu8 = mysqli_fetch_assoc($qrnghiencuu8)){
								 echo "<li> ".$rownghiencuu8["cham_thuc_tap_tot_nghiep"]."</li>";
								 $stttttn2 = $stttttn2 + 1;
								 }
								 $tongtttn2 =  $stttttn2 * 10; 
							?>
							</ul>
						</td>
						<!-- Chấm Dạy Giỏi --------------- $tongchamdaygioi  -->
						<td>
                            <?php 
                            $sqldaygioi = "SELECT * FROM `day_gioi` WHERE `id_giaovien` = '$idgv1'";
                            $qrdaygioi = mysqli_query($conn, $sqldaygioi);
                            $rowdaygioi = mysqli_fetch_assoc($qrdaygioi);
                            echo $rowdaygioi["cham_day_gioi"];
							$tongchamdaygioi = $rowdaygioi["cham_day_gioi"];
							?>
                        </td>
						<!-- Thực Hiện Bài  Dạy Giỏi ---------------- $tongdaygioi  -->
						<td>
						<?php 
                            $sqldaygioi = "SELECT * FROM `day_gioi` WHERE `id_giaovien` = '$idgv1'";
                            $qrdaygioi = mysqli_query($conn, $sqldaygioi);
                            $rowdaygioi = mysqli_fetch_assoc($qrdaygioi);
							echo $rowdaygioi["bai_day_gioi"];
							$tongdaygioi = $rowdaygioi["bai_day_gioi"]; 
                            ?>
						</td>
						<td>
							<?php 
							echo ($tongdaygioi+ $tongchamdaygioi + $tongtttn2 + $tongtttn + $tongchamkhoaluan + $tongkhoaluan + $tongchamluanvan + $tongluanvan + $tongchamluanan + $tongluanan + $tonggiocoithi + $tonggiochamthi + $tonggiogiang);

							?>
						</td>
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
<!-- Modal Sửa Admin-->
<div class="modal fade" id="ModalSuaAdmin" style="color: #FFF">
	<div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">SỬA LỊCH GIẢNG</h4>
        </div><div class="container"></div>
        <div class="modal-body">
          	<div id="thongbaosualop"></div>
              <input type="text" id="idsua" class="hidden">
				Giáo Viên Phụ Trách
				<div class="form-group">
			    <div class="input-group">
			    <div class="input-group-addon">
			    <span class="glyphicon glyphicon-user"></span>
			    </div>
			    <select id="gv1" class="form-control">
		    		<option value="">Chọn Giáo Viên</option>
		    		<?php
		    		$sqlgv = "SELECT * FROM `tai_khoan`";
		    		$chaygv = mysqli_query($conn,$sqlgv);
		    		while($xemgv = mysqli_fetch_assoc($chaygv)){
		    		 ?>
		    		<option value="<?php echo $xemgv["id_tai_khoan"];?>">
		    			<?php echo $xemgv["id_tai_khoan"]; echo " - "; echo $xemgv["ten_sinh_vien"]; ?>
		    		</option>
		    		<?php } ?>
		    	</select>
			    </div>
			    </div>
			    Giáo Viên Tham Gia
				<div class="form-group">
			    <div class="input-group">
			    <div class="input-group-addon">
			    <span class="glyphicon glyphicon-user"></span>
			    </div>
                <select id="gv2" class="form-control">
		    		<option value="">Chọn Giáo Viên</option>
		    		<?php
		    		$sqlgv = "SELECT * FROM `tai_khoan`";
		    		$chaygv = mysqli_query($conn,$sqlgv);
		    		while($xemgv = mysqli_fetch_assoc($chaygv)){
		    		 ?>
		    		<option value="<?php echo $xemgv["id_tai_khoan"];?>">
		    			<?php echo $xemgv["ten_sinh_vien"]; ?>
		    		</option>
		    		<?php } ?>
		    	</select>
			    </div>
			    </div>

			   

			    <center>
					<button type="button" id="suaadmin" class="btn btn-success">CẬP NHẬT</button>
				</center>
		   </div>
        </div>
      </div>
    </div>
</div>
<!-- End Modal Edit Admin -->



<script>
	
	$(document).ready(function() {
		
		$('button#sua').click(function(event) {
            var id = $(this).attr('ids');
			$('#ModalSuaAdmin').modal();
			$('#idsua').val(id);
		});

		$('#suaadmin').click(function(event) {
			$.ajax({
				url: 'xu-ly/lop/sua-lop.php',
				type: 'POST',
				dataType: 'HTML',
				data: {
					idsua: $('#idsua').val(),
                    gv1: $('#gv1').val(),
                    gv2: $('#gv2').val()
					
				},
			success: function(data){
				$('#thongbaosualop').html(data);
			}
			});
			
		});

	});

</script>
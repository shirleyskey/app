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
                  <li class="breadcrumb-item active" aria-current="page">Tổng Hợp Luận Án, Luận Văn, Khóa Luận, NCKH, TTTN</li>
                </ol>
              </nav>
            </div>
          </div>
			<div class="caption">
			<h1 style="text-align: center">LUẬN ÁN, LUẬN VĂN, KHÓA LUẬN, NCKH, TTTN</h1>
			</div>
			<hr>
			<div class="row">
				<table class="table table-bordered table-responsive">
					<tr class="chimuc">
						<th rowspan="2">STT</th>
						<th rowspan="2">Tên Giáo Viên</th>
						<th colspan="4">Luận Án</th>
						<th colspan="4">Luận Văn</th>
						<th colspan="4">Khóa Luận</th>
						<th colspan="4">Thực Tập Tốt Nghiệp</th>
						<th colspan="4">Nghiên Cứu Khoa Học</th>
					</tr>
					<tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>Tên </td>
                            <td>Hướng Dẫn</td>
                            <td>Chấm</td>
                            <td>Đọc & Nhận Xét</td>
                            <td>Tên </td>
                            <td>Hướng Dẫn</td>
                            <td>Chấm</td>
                            <td>Đọc & Nhận Xét</td>
                            <td>Tên </td>
                            <td>Hướng Dẫn</td>
                            <td>Chấm</td>
                            <td>Đọc & Nhận Xét</td>
                            <td>Tên </td>
                            <td>Hướng Dẫn</td>
                            <td>Chấm</td>
                            <td>Đọc & Nhận Xét</td>
                            <td>Tên </td>
                            <td>Hướng Dẫn</td>
                            <td>Chấm</td>
                            <td>Đọc & Nhận Xét</td>
                            
                           

                        </tr>

					<?php $stt = 1;?>
					<?php while($row = mysqli_fetch_assoc($qr)){ ?>
						<tr>
							<td><?php echo $stt;?></td>
							<td>
							<?php echo $row["ten_sinh_vien"]; ?>
							</td>
							
                            <!-- Hướng Dẫn Luận Án-------------------- $tongluanan -->
                            <td style="color: #f5365c;" class="gach">
                            <ul style="list-style:none" class="gach">
                                <?php 
                                $idgv1 = $row["id_tai_khoan"];
                                $sqlluanan = "SELECT * FROM `luan_an` WHERE `id_giaovien` = '$idgv1'";
                                $qrluanan = mysqli_query($conn, $sqlluanan);
                                
                                while($rowluanan = mysqli_fetch_assoc($qrluanan)){
                                
                                echo "<li> ".$rowluanan["ten"]."</li>";
                                }
                                ?>
                                </ul>
                            </td>
                            <td style="color: #f5365c;">
                            <ul style="list-style:none" class="gach">
                                <?php 
                                $idgv1 = $row["id_tai_khoan"];
                                $sqlluanan = "SELECT * FROM `luan_an` WHERE `id_giaovien` = '$idgv1'";
                                $qrluanan = mysqli_query($conn, $sqlluanan);
                                
                                while($rowluanan = mysqli_fetch_assoc($qrluanan)){
                                
                                echo "<li> ".$rowluanan["huong_dan"]."</li>";
                                
                                }
                                ?>
                                </ul>
                            </td>
                            <td style="color: #f5365c;">
                            <ul style="list-style:none">
                                <?php 
                                $idgv1 = $row["id_tai_khoan"];
                                $sqlluanan = "SELECT * FROM `luan_an` WHERE `id_giaovien` = '$idgv1'";
                                $qrluanan = mysqli_query($conn, $sqlluanan);
                                
                                while($rowluanan = mysqli_fetch_assoc($qrluanan)){
                                
                                echo "<li> ".$rowluanan["cham"]."</li>";
                                }
                                ?>
                                </ul>
                            </td>
                            <td style="color: #f5365c;">
                            <ul style="list-style:none">
                                <?php 
                                $idgv1 = $row["id_tai_khoan"];
                                $sqlluanan = "SELECT * FROM `luan_an` WHERE `id_giaovien` = '$idgv1'";
                                $qrluanan = mysqli_query($conn, $sqlluanan);
                                
                                while($rowluanan = mysqli_fetch_assoc($qrluanan)){
                                
                                echo "<li> ".$rowluanan["doc"]."</li>";
                                }
                                ?>
                                </ul>
                            </td>
                            <td style="color: #f5365c;">
                            <ul style="list-style:none">
                                <?php 
                                $idgv1 = $row["id_tai_khoan"];
                                $sqlluanan = "SELECT * FROM `luan_van` WHERE `id_giaovien` = '$idgv1'";
                                $qrluanan = mysqli_query($conn, $sqlluanan);
                                
                                while($rowluanan = mysqli_fetch_assoc($qrluanan)){
                                
                                echo "<li> ".$rowluanan["ten"]."</li>";
                                }
                                ?>
                                </ul>
                            </td>
                            <td style="color: #f5365c;">
                            <ul style="list-style:none">
                                <?php 
                                $idgv1 = $row["id_tai_khoan"];
                                $sqlluanan = "SELECT * FROM `luan_van` WHERE `id_giaovien` = '$idgv1'";
                                $qrluanan = mysqli_query($conn, $sqlluanan);
                                
                                while($rowluanan = mysqli_fetch_assoc($qrluanan)){
                                
                                echo "<li> ".$rowluanan["huong_dan"]."</li>";
                                }
                                ?>
                                </ul>
                            </td>
                            <td style="color: #f5365c;">
                            <ul style="list-style:none">
                                <?php 
                                $idgv1 = $row["id_tai_khoan"];
                                $sqlluanan = "SELECT * FROM `luan_van` WHERE `id_giaovien` = '$idgv1'";
                                $qrluanan = mysqli_query($conn, $sqlluanan);
                                
                                while($rowluanan = mysqli_fetch_assoc($qrluanan)){
                                
                                echo "<li> ".$rowluanan["cham"]."</li>";
                                }
                                ?>
                                </ul>
                            </td>
                            <td style="color: #f5365c;">
                            <ul style="list-style:none">
                                <?php 
                                $idgv1 = $row["id_tai_khoan"];
                                $sqlluanan = "SELECT * FROM `luan_van` WHERE `id_giaovien` = '$idgv1'";
                                $qrluanan = mysqli_query($conn, $sqlluanan);
                                
                                while($rowluanan = mysqli_fetch_assoc($qrluanan)){
                                
                                echo "<li> ".$rowluanan["doc"]."</li>";
                                }
                                ?>
                                </ul>
                            </td>
                            <td style="color: #f5365c;">
                            <ul style="list-style:none">
                                <?php 
                                $idgv1 = $row["id_tai_khoan"];
                                $sqlluanan = "SELECT * FROM `khoa_luan` WHERE `id_giaovien` = '$idgv1'";
                                $qrluanan = mysqli_query($conn, $sqlluanan);
                                
                                while($rowluanan = mysqli_fetch_assoc($qrluanan)){
                                
                                echo "<li> ".$rowluanan["ten"]."</li>";
                                }
                                ?>
                                </ul>
                            </td>
                            <td style="color: #f5365c;">
                            <ul style="list-style:none">
                                <?php 
                                $idgv1 = $row["id_tai_khoan"];
                                $sqlluanan = "SELECT * FROM `khoa_luan` WHERE `id_giaovien` = '$idgv1'";
                                $qrluanan = mysqli_query($conn, $sqlluanan);
                                
                                while($rowluanan = mysqli_fetch_assoc($qrluanan)){
                                
                                echo "<li> ".$rowluanan["huong_dan"]."</li>";
                                }
                                ?>
                                </ul>
                            </td>
                            <td style="color: #f5365c;">
                            <ul style="list-style:none">
                                <?php 
                                $idgv1 = $row["id_tai_khoan"];
                                $sqlluanan = "SELECT * FROM `khoa_luan` WHERE `id_giaovien` = '$idgv1'";
                                $qrluanan = mysqli_query($conn, $sqlluanan);
                                
                                while($rowluanan = mysqli_fetch_assoc($qrluanan)){
                                
                                echo "<li> ".$rowluanan["cham"]."</li>";
                                }
                                ?>
                                </ul>
                            </td>
                            <td style="color: #f5365c;">
                            <ul style="list-style:none">
                                <?php 
                                $idgv1 = $row["id_tai_khoan"];
                                $sqlluanan = "SELECT * FROM `khoa_luan` WHERE `id_giaovien` = '$idgv1'";
                                $qrluanan = mysqli_query($conn, $sqlluanan);
                                
                                while($rowluanan = mysqli_fetch_assoc($qrluanan)){
                                
                                echo "<li> ".$rowluanan["doc"]."</li>";
                                }
                                ?>
                                </ul>
                            </td>
                            <td style="color: #f5365c;">
                            <ul style="list-style:none">
                                <?php 
                                $idgv1 = $row["id_tai_khoan"];
                                $sqlluanan = "SELECT * FROM `thuc_tap` WHERE `id_giaovien` = '$idgv1'";
                                $qrluanan = mysqli_query($conn, $sqlluanan);
                                
                                while($rowluanan = mysqli_fetch_assoc($qrluanan)){
                                
                                echo "<li> ".$rowluanan["ten"]."</li>";
                                }
                                ?>
                                </ul>
                            </td>
                            <td style="color: #f5365c;">
                            <ul style="list-style:none">
                                <?php 
                                $idgv1 = $row["id_tai_khoan"];
                                $sqlluanan = "SELECT * FROM `thuc_tap` WHERE `id_giaovien` = '$idgv1'";
                                $qrluanan = mysqli_query($conn, $sqlluanan);
                                
                                while($rowluanan = mysqli_fetch_assoc($qrluanan)){
                                
                                echo "<li> ".$rowluanan["huong_dan"]."</li>";
                                }
                                ?>
                                </ul>
                            </td>
                            <td style="color: #f5365c;">
                            <ul style="list-style:none">
                                <?php 
                                $idgv1 = $row["id_tai_khoan"];
                                $sqlluanan = "SELECT * FROM `thuc_tap` WHERE `id_giaovien` = '$idgv1'";
                                $qrluanan = mysqli_query($conn, $sqlluanan);
                                
                                while($rowluanan = mysqli_fetch_assoc($qrluanan)){
                                
                                echo "<li> ".$rowluanan["cham"]."</li>";
                                }
                                ?>
                                </ul>
                            </td>
                            <td style="color: #f5365c;">
                            <ul style="list-style:none">
                                <?php 
                                $idgv1 = $row["id_tai_khoan"];
                                $sqlluanan = "SELECT * FROM `thuc_tap` WHERE `id_giaovien` = '$idgv1'";
                                $qrluanan = mysqli_query($conn, $sqlluanan);
                                
                                while($rowluanan = mysqli_fetch_assoc($qrluanan)){
                                
                                echo "<li> ".$rowluanan["doc"]."</li>";
                                }
                                ?>
                                </ul>
                            </td>
                            <td style="color: #f5365c;">
                            <ul style="list-style:none">
                                <?php 
                                $idgv1 = $row["id_tai_khoan"];
                                $sqlluanan = "SELECT * FROM `nghiencuu` WHERE `id_giaovien` = '$idgv1'";
                                $qrluanan = mysqli_query($conn, $sqlluanan);
                                
                                while($rowluanan = mysqli_fetch_assoc($qrluanan)){
                                
                                echo "<li> ".$rowluanan["ten"]."</li>";
                                }
                                ?>
                                </ul>
                            </td>
                            <td style="color: #f5365c;">
                            <ul style="list-style:none">
                                <?php 
                                $idgv1 = $row["id_tai_khoan"];
                                $sqlluanan = "SELECT * FROM `nghiencuu` WHERE `id_giaovien` = '$idgv1'";
                                $qrluanan = mysqli_query($conn, $sqlluanan);
                                
                                while($rowluanan = mysqli_fetch_assoc($qrluanan)){
                                
                                echo "<li> ".$rowluanan["huongdan"]."</li>";
                                }
                                ?>
                                </ul>
                            </td>
                            <td style="color: #f5365c;">
                            <ul style="list-style:none">
                                <?php 
                                $idgv1 = $row["id_tai_khoan"];
                                $sqlluanan = "SELECT * FROM `nghiencuu` WHERE `id_giaovien` = '$idgv1'";
                                $qrluanan = mysqli_query($conn, $sqlluanan);
                                
                                while($rowluanan = mysqli_fetch_assoc($qrluanan)){
                                
                                echo "<li> ".$rowluanan["cham"]."</li>";
                                }
                                ?>
                                </ul>
                            </td>
                            <td style="color: #f5365c;">
                            <ul style="list-style:none">
                                <?php 
                                $idgv1 = $row["id_tai_khoan"];
                                $sqlluanan = "SELECT * FROM `nghiencuu` WHERE `id_giaovien` = '$idgv1'";
                                $qrluanan = mysqli_query($conn, $sqlluanan);
                                
                                while($rowluanan = mysqli_fetch_assoc($qrluanan)){
                                
                                echo "<li> ".$rowluanan["doc"]."</li>";
                                }
                                ?>
                                </ul>
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
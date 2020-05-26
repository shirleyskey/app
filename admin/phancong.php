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
                  <li class="breadcrumb-item active" aria-current="page">Phân Công Lịch Giảng</li>
                </ol>
              </nav>
            </div>
          </div>
		<?php
			$sql = "SELECT * FROM `lop_hoc`";
			$qr = mysqli_query($conn, $sql);
		 ?>
			<div class="caption">
			<h1 style="text-align: center">PHÂN CÔNG LỊCH GIẢNG</h1>
			</div>
			<hr>
			<div class="row">
				<table class="table table-bordered table-responsive">
					<tr class="chimuc">
						<th>STT</th>
						<th>Tên Lớp</th>
						<th>Chuyên Ngành</th>
						<th>Thời Gian Giảng Dạy</th>
						<th>Quy Mô</th>
						<th>Giáo Viên Phụ Trách</th>
                        <th>Giáo Viên Tham Gia</th>
                        <th>Ghi Chú</th>
						<th>Quản Lý</th>
					</tr>
					<tbody>
					<?php $stt = 1; ?>
					<?php while($row = mysqli_fetch_assoc($qr)){ ?>
						<tr>
							<td><?php echo $stt;?></td>
							<td>
							<?php echo $row["ten_lop"]; ?>
							</td>
							<td><?php echo $row["chuyen_nganh"]?></td>
							<td style="color: #f5365c;"><?php echo $row["thoi_gian"]?></td>
							<td><?php echo $row["quy_mo"]?></td>
							<td style="color: #fb6340;">
                            <?php $idgv1 = $row["id_gvphutrach"];
                            $sqlgv1 = "SELECT `ten_sinh_vien` FROM `tai_khoan` WHERE `id_tai_khoan` = '$idgv1'";
                            $qrgv1 = mysqli_query($conn, $sqlgv1);
                            $rowgv1 = mysqli_fetch_assoc($qrgv1);
                            echo $rowgv1["ten_sinh_vien"];
                            ?>
                            </td>
                            <td style="color: #fb6340;"><?php
                            $idgv2 = $row["id_gvthamgia"];
                            $sqlgv2 = "SELECT `ten_sinh_vien` FROM `tai_khoan` WHERE `id_tai_khoan` = '$idgv2'";
                            $qrgv2 = mysqli_query($conn, $sqlgv2);
                            $rowgv2 = mysqli_fetch_assoc($qrgv2);
                            echo $rowgv2["ten_sinh_vien"];
                            ?></td>
							<td><?php echo $row["ghi-chu"]?></td>
							
							<td align="center">
								<button type="button" id="sua" class="btn btn-warning btn-xs button-sua" title="Sửa" 
								ids="<?php echo $row["id_lop"]?>" >
								<span class="glyphicon glyphicon-edit"></span>
								<span class="btn-inner--icon"><i class="ni ni-settings"></i></span></button>
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
<!-- <div class="modal fade" id="ModalSuaAdmin" style="color: #FFF">
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
</div> -->
<div class="modal fade" id="ModalSuaAdmin" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
              <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="text-center" style="color: white">SỬA LỊCH GIẢNG</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="ni ni-fat-remove" style="color: white"></i>
                    </button>
                  </div>
                  <div class="container"></div>
                  <div class="modal-body">
				  <div id="thongbaosualop"></div>
                    <label for=""> Giáo Viên Phụ Trách</label>
                   
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon">
                        <span><i class="ni ni-circle-08"></i> </span>
                        </div>
                        <input type="text" id="idsua" class="hidden">
						<select id="gv1" class="form-control">
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
                    <label for=""> Giáo Viên Tham Gia</label>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon">
                        <span><i class="ni ni-circle-08"></i> </span>
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
                      <button type="button" id="btnthongtin" class="btn btn-success button-update">CẬP NHẬT</button>
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

		$('#btnthongtin').click(function(event) {
			$.ajax({
				url: 'xu-ly/sua-phan-cong.php',
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
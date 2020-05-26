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
                  <li class="breadcrumb-item active" aria-current="page">Danh Sách Dạy Giỏi</li>
                </ol>
              </nav>
            </div>
          </div>
    <div style="color:#FFF" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 adminhihi">
		<div class="list-group-item">
		<?php
			$sql = "SELECT * FROM `day_gioi`";
			$qr = mysqli_query($conn, $sql);
		 ?>
			<div class="caption">
			<h1 style="text-align: center">QUẢN LÝ DẠY GIỎI</h1>
			</div>
			<hr>
			<div class="row">
				<table class="table table-bordered table-responsive">
					<tr class="chimuc">
						<th>STT</th>
						<th>Tên Giáo Viên</th>
						<th>Tên Lớp</th>
						<th>Bài Dạy Giỏi</th>
						<th>Chấm Dạy Giỏi</th>
						<th>Tổng Giờ</th>
						<th>Quản Lý</th>
					</tr>
					<tbody>
						<?php $stt = 1; ?>
					<?php while($row = mysqli_fetch_assoc($qr)){ ?>
						<tr>
							<td><?php echo $stt; $stt += 1;?></td>
							
							<td><?php 
								$idgv = $row["id_giaovien"];
								$sqlgv = "SELECT `ten_sinh_vien` FROM `tai_khoan` WHERE `id_tai_khoan` = '$idgv'";
								$qrgv = mysqli_query($conn, $sqlgv);
								$rowgv = mysqli_fetch_assoc($qrgv);
								echo $rowgv["ten_sinh_vien"];
							
							?>
							</td>
							
							<td><?php
							$idlop = $row["id_lop"];
							$sqllop = "SELECT `ten_lop` FROM `lop_hoc` WHERE `id_lop` = '$idlop'";
							$qrlop = mysqli_query($conn, $sqllop);
							$rowlop = mysqli_fetch_assoc($qrlop);
							echo $rowlop["ten_lop"];
							?></td>

							<td><?php echo $row["bai_day_gioi"]?></td>
							<td><?php echo $row["cham_day_gioi"]?></td>
							<td><?php echo ($row["bai_day_gioi"] + $row["bai_day_gioi"]) ?></td>
							<td align="center">
								<button type="button" id="sua" class="btn btn-warning btn-xs button-sua" title="Sửa" ids="<?php echo $row["id_daygioi"]?>" lops="<?php echo $row["id_lop"]?>" gvs="<?php echo $row["id_giaovien"]?>" ><span class="glyphicon glyphicon-edit"></span>
								<span class="btn-inner--icon"><i class="ni ni-settings"></i></span>
    							
							</button>
  								<button type="button" id="xoa" xoa="<?php echo $row["id_daygioi"]?>" class="btn btn-danger btn-xs button-sua" title="Xóa"><span class="glyphicon glyphicon-trash"></span>
								  <span class="btn-inner--icon"><i class="ni ni-fat-remove"></i></span>
    							 
							</button>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
<br>
<center>
	<button type="button" class="btn btn-success"  data-toggle="modal" data-target="#themadmin">THÊM DẠY GIỎI</button>
</center>
			</div>

		</div>
    </div>
    <!-- Thông tin Admin -->
  
	<?php } ?>
</div>
 <?php 
	include_once('../footer.php');
 ?>



<!-- START THÊM DẠY GIỎI  -->
<div class="modal fade" id="themadmin" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
              <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="text-center" style="color: white">THÊM DẠY GIỎI MỚI</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="ni ni-fat-remove" style="color: white"></i>
                    </button>
                  </div>
                  <div class="container"></div>
                  <div class="modal-body">
                    <div id="thongbaothemadmin"></div>
					<label for="">Chọn Giáo Viên:</label>
				   <div class="form-group">
					 <div class="input-group">
					   <div class="input-group-addon">
					   <!-- <span><i class="ni ni-briefcase-24"></i> </span> -->
					   <span><i class="ni ni-circle-08"></i> </span>
					   </div>
					   <input type="text" id="idsua" class="hidden">
					   <select id="gv" class="form-control">
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
				   <label for="">Tên Lớp: </label>
				   <div class="form-group">
					 <div class="input-group">
					   <div class="input-group-addon">
					   <span><i class="ni ni-briefcase-24"></i> </span>
					   </div>
							<select id="lop" class="form-control">
							<option value="">Chọn Lớp</option>
							<?php
							$sqllop = "SELECT * FROM `lop_hoc`";
							$chaylop = mysqli_query($conn,$sqllop);
							while($xemlop = mysqli_fetch_assoc($chaylop)){
							?>
							<option value="<?php echo $xemlop["id_lop"];?>">
								<?php echo $xemlop["ten_lop"]; ?>
							</option>
							<?php } ?>
						</select>
					   </select>
					 </div>
				   </div>
                    <center>
                      <button type="button" id="themadminmoi" class="btn btn-success button-update">THÊM DẠY GIỎI MỚI</button>
                    </center>
                  </div>
                </div>
              </div>
            </div>
          </div>
          

<!-- END THÊM DẠY GIỎI  -->



<!-- End Modal Edit Admin -->

<div class="modal fade" id="ModalSuaAdmin" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
              <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="text-center" style="color: white">SỬA THÔNG TIN DẠY GIỎI</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="ni ni-fat-remove" style="color: white"></i>
                    </button>
                  </div>
                  <div class="container"></div>
                  <div class="modal-body">
                    <div id="thongbaosuaadmin"></div>
					<label for="">Giáo Viên:</label>
                   
				   <div class="form-group">
					 <div class="input-group">
					   <div class="input-group-addon">
					   <span><i class="ni ni-briefcase-24"></i> </span>
					   </div>
					   <input type="text" id="idsua" class="hidden">
					   <select id="gvs" class="form-control">
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
				   
				   <label for=""> Chọn Lớp: </label>
				   <div class="form-group">
					 <div class="input-group">
					   <div class="input-group-addon">
					   <span><i class="ni ni-circle-08"></i> </span>
					   </div>
							<select id="lops" class="form-control">
							<option value="">Chọn Lớp</option>
							<?php
							$sqllop = "SELECT * FROM `lop_hoc`";
							$chaylop = mysqli_query($conn,$sqllop);
							while($xemlop = mysqli_fetch_assoc($chaylop)){
							?>
							<option value="<?php echo $xemlop["id_lop"];?>">
								<?php echo $xemlop["ten_lop"]; ?>
							</option>
							<?php } ?>
						</select>
					 </div>
				   </div>
                    <center>
                      <button type="button" id="suaadmin" class="btn btn-success button-update">CẬP NHẬT</button>
                    </center>
                  </div>
                </div>
              </div>
            </div>
          </div>
<!-- START SỬA DẠY GIỎI  -->


END SỬA DẠY GIỎI 



<script>
	
	$(document).ready(function() {
		$('button#xoa').click(function(event) {
			var id = $(this).attr('xoa');
			var xoa = confirm("Bạn có thực sự muốn xóa dạy giỏi này không?");
			if (xoa == true) {
				if(id == 0){
					alert("Dạy Giỏi Này không Thể Bị Xóa!");
				}
				else 
				{
				    $.ajax({
				    	url: 'xu-ly/daygioi/xoa-daygioi.php',
				    	type: 'POST',
				    	dataType: 'HTML',
				    	data: {id: id},
				    });
				    alert("Xóa Thành Công!");
				    location.reload();
				}
			}
		});

		$('button#themadminmoi').click(function(event) {
			$.ajax({
				url: 'xu-ly/daygioi/them-daygioi.php',
				type: 'POST',
				dataType: 'HTML',
				data: {
					gv: $('#gv').val(),
					lop: $('#lop').val(),
					
				},
			success: function(data){
				$('#thongbaothemadmin').html(data);
			}
			});
		});

		$('button#sua').click(function(event) {
			var id = $(this).attr('ids');
			
			$('#ModalSuaAdmin').modal();
			$('#idsua').val(id);
			
		});

		$('#suaadmin').click(function(event) {
			$.ajax({
				url: 'xu-ly/daygioi/sua-daygioi.php',
				type: 'POST',
				dataType: 'HTML',
				data: {
					idsua: $('#idsua').val(),
					lops: $('#lops').val(),
					gvs: $('#gvs').val(),
					
				},
			success: function(data){
				$('#thongbaosuaadmin').html(data);
			}
			});
			
		});

	});

</script>
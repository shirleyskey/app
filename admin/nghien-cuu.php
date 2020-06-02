<?php
	include_once('../config/config.php');
	$title = "Nghiên Cứu Khoa Học - ";
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
                  <li class="breadcrumb-item active" aria-current="page">Nghiên Cứu Khoa Học</li>
                </ol>
              </nav>
            </div>
          </div>
    <div style="color:#FFF" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 adminhihi">
		<div class="list-group-item">
		<?php
			$sql = "SELECT * FROM `nghiencuu`";
			$qr = mysqli_query($conn, $sql);
		 ?>
			<div class="caption">
			<h1 style="text-align: center">QUẢN LÝ NGHIÊN CỨU KHOA HỌC</h1>
			</div>
			<hr>
			<div class="row">
				<table class="table table-bordered table-responsive">
					<tr class="chimuc">
						<th>STT</th>
						<th>Tên Giáo Viên</th>
						<th>Tên NCKH</th>
						<th>Hướng Dẫn</th>
						<th>Chấm</th>
						<th>Đọc & Nhận Xét</th>
						<th>Quản Lý</th>
					</tr>
					<tbody>
						<?php $stt =1; ?>
					<?php while($row = mysqli_fetch_assoc($qr)){ ?>
						<tr>
							<td><?php echo $stt; $stt += 1; ?></td>
							<td><?php 
								$idgv = $row["id_giaovien"];
								$sqlgv = "SELECT `ten_sinh_vien` FROM `tai_khoan` WHERE `id_tai_khoan` = '$idgv'";
								$qrgv = mysqli_query($conn, $sqlgv);
								$rowgv = mysqli_fetch_assoc($qrgv);
								echo $rowgv["ten_sinh_vien"];
							
							?>
							</td>
							<td><?php echo $row["ten"]?></td>
							<td><?php echo $row["huong_dan"]?></td>
							<td><?php echo $row["cham"]?></td>
							<td><?php echo $row["doc"]?></td>
							
							<td align="center">
                                <button type="button" id="sua" class="btn btn-warning btn-xs button-sua" title="Sửa" 
                                tens="<?php echo $row["ten"]?>" 
                                idgvs="<?php echo $row["id_giaovien"]?>" 
                                idsua="<?php echo $row["id"]?>" ><span class="glyphicon glyphicon-edit"></span>
								<span class="btn-inner--icon"><i class="ni ni-settings"></i></span>
							</button>
  								<button type="button" id="xoa" xoa="<?php echo $row["id"]?>" class="btn btn-danger btn-xs button-sua" title="Xóa"><span class="glyphicon glyphicon-trash"></span>
								  <span class="btn-inner--icon"><i class="ni ni-fat-remove"></i></span>
							</button>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
<br>
<center>
	<button type="button" class="btn btn-success"  data-toggle="modal" data-target="#themadmin">THÊM NCKH</button>
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


<!-- Start  -->
<div class="modal fade" id="themadmin" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
              <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="text-center" style="color: white">THÊM NCKH MỚI</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="ni ni-fat-remove" style="color: white"></i>
                    </button>
                  </div>
                  <div class="container"></div>
                  <div class="modal-body">
                    <div id="thongbaothemadmin"></div>
                   
                    <label for=""> Chọn Giáo Viên: </label>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon">
                        <span><i class="ni ni-circle-08"></i> </span>
                        </div>
						<select id="idgv" class="form-control">
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
                    <label for="">   Tên Thực NCKH:</label>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon">
                        <span><i class="ni ni-briefcase-24"></i></span>
                        </div>
                        <input class="form-control" id="ten" type="text" placeholder="Tên Hiển Thị:......">
                      </div>
                    </div>
                    <center>
                      <button type="button" id="themadminmoi" class="btn btn-success button-update">THÊM NCKH MỚI</button>
                    </center>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
<!-- End  -->
<!-- START  -->
<div class="modal fade" id="ModalSuaAdmin" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
              <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="text-center" style="color: white">SỬA THÔNG TIN NCKH</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="ni ni-fat-remove" style="color: white"></i>
                    </button>
                  </div>
                  <div class="container"></div>
                  <div class="modal-body">
                    <div id="thongbaosuaadmin"></div>
					
				   <label for="">  Giáo Viên: </label>
				   <div class="form-group">
					 <div class="input-group">
					   <div class="input-group-addon">
					   <span><i class="ni ni-circle-08"></i> </span>
                       </div>
                       <input type="text" id="idsua" class="hidden">
					   <select id="idgvs" class="form-control">
						   <option value="" class="b">Chọn Giáo Viên</option>
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
                   <label for="">   Tên NCKH:</label>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon">
                        <span><i class="ni ni-briefcase-24"></i></span>
                        </div>
                        <input class="form-control" id="tens" type="text" placeholder="Tên Hiển Thị:......">
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
<!-- END  -->


<script>
	
	$(document).ready(function() {
		$('button#xoa').click(function(event) {
			var id = $(this).attr('xoa');
			var xoa = confirm("Bạn có thực sự muốn xóa không?");
			if (xoa == true) {
				if(id == 0){
					alert("NCKH Này không Thể Bị Xóa!");
				}
				else 
				{
				    $.ajax({
				    	url: 'xu-ly/nghien-cuu/xoa-nghien-cuu.php',
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
				url: 'xu-ly/nghien-cuu/them-nghien-cuu.php',
				type: 'POST',
				dataType: 'HTML',
				data: {
					ten: $('#ten').val(),
					gv: $('#idgv').val(),
				},
			success: function(data){
				$('#thongbaothemadmin').html(data);
			}
			});
		});

		$('button#sua').click(function(event) {
			var id = $(this).attr('idsua');
            var tens = $(this).attr('tens');
           

			$('#ModalSuaAdmin').modal();
			$('#idsua').val(id);
			$('#tens').val(tens);

		});

		$('#suaadmin').click(function(event) {
			$.ajax({
				url: 'xu-ly/nghien-cuu/sua-nghien-cuu.php',
				type: 'POST',
				dataType: 'HTML',
				data: {
					idsua: $('#idsua').val(),
					tens: $('#tens').val(),
					idgvs: $('#idgvs').val(),
				},
			success: function(data){
				$('#thongbaosuaadmin').html(data);
			}
			});
			
		});

	});

</script>
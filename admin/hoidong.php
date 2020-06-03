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
                  <li class="breadcrumb-item active" aria-current="page">Hoạt Động Khác</li>
                </ol>
              </nav>
            </div>
          </div>
    <div style="color:#FFF" class="col-xs-12 col-sm-9 col-md-9 col-lg-9 adminhihi">
		<div class="list-group-item">
		<?php
			$sql = "SELECT * FROM `ngoi_hoi_dong`";
			$qr = mysqli_query($conn, $sql);
		 ?>
			<div class="caption">
			HOẠT ĐỘNG KHÁC
			</div>
			<hr>
			<div class="row">
				<table class="table table-bordered table-responsive">
					<tr class="chimuc">
						<th>ID</th>
						<th>Tên Giáo Viên</th>
						<th>Tên Hoạt Động</th>
						<th>Số Giờ</th>
						<th>Ghi Chú</th>
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
							<td>
							<?php echo $row["hoat_dong"]; ?>
							</td>
							<td><?php echo $row["so_gio"]?></td>
							<td><?php echo $row["ghi_chu"]?></td>
							
							
							<td align="center">
								<button type="button" id="sua" class="btn btn-warning btn-xs button-sua" title="Sửa" 
								ids="<?php echo $row["id_ngoihoidong"]?>" 
								gvn="<?php echo $row["id_giaovien"]?>" 
								hdn="<?php echo $row["hoat_dong"]?>" 
								
								><span class="btn-inner--icon"><i class="ni ni-settings"></i></span>
								</button>
								  <button type="button" id="xoa" xoa="<?php echo $row["id_ngoihoidong"]?>" class="btn btn-danger btn-xs button-sua" title="Xóa">
								  <span class="btn-inner--icon"><i class="ni ni-fat-remove"></i></span>
  								</button>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
<br>
<center>
	<button type="button" class="btn btn-success"  data-toggle="modal" data-target="#themadmin">THÊM ADMIN</button>
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


<!-- Modal Thêm Admin -->
<!-- <div class="modal fade" id="themadmin" style="color: #FFF">
	<div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">THÊM ADMIN MỚI</h4>
        </div><div class="container"></div>
        <div class="modal-body">
          <div id="thongbaothemadmin"></div>
				Tên Giáo Viên:
				<div class="form-group">
			    <div class="input-group">
			    <div class="input-group-addon">
			    <span class="glyphicon glyphicon-barcode"></span>
			    </div>
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

			    Tên Hoạt Động:
				<div class="form-group">
			    <div class="input-group">
			    <div class="input-group-addon">
			    <span class="glyphicon glyphicon-user"></span>
			    </div>
			    <input class="form-control" id="hd" type="text" placeholder="Tên Hoạt Động...">
			    </div>
			    </div>
			    
			   

			    <center>
					<button type="button" id="themadminmoi" class="btn btn-success">THÊM</button>
				</center>
		   </div>
        </div>
      </div>
    </div>
</div> -->
<!-- End Modal -->

<!-- Modal Sửa Admin-->
<!-- <div class="modal fade" id="ModalSuaAdmin" style="color: #FFF">
	<div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">SỬA ADMIN</h4>
        </div><div class="container"></div>
        <div class="modal-body">
          	<div id="thongbaosuaadmin"></div>
				Tên Tài Khoản:
				<div class="form-group">
			    <div class="input-group">
			    <div class="input-group-addon">
			    <span class="glyphicon glyphicon-barcode"></span>
			    </div>
				<input type="text" id="ids" class="hidden">
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

			    Tên Hoạt Động:
				<div class="form-group">
			    <div class="input-group">
			    <div class="input-group-addon">
			    <span class="glyphicon glyphicon-user"></span>
			    </div>
			    <input class="form-control" id="hds" type="text" placeholder="Tên Hoạt Động...">
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
<!-- End Modal Edit Admin -->


<div class="modal fade" id="themadmin" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
              <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="text-center" style="color: white">THÊM </h4>
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
                    <label for="">   Tên Hoạt Động:</label>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon">
                        <span><i class="ni ni-briefcase-24"></i></span>
                        </div>
                        <input class="form-control" id="hd" type="text" placeholder="Tên Hoạt Động...">
                      </div>
                    </div>
                    <center>
                      <button type="button" id="themadminmoi" class="btn btn-success button-update">THÊM MỚI</button>
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
                    <h4 class="text-center" style="color: white">SỬA THÔNG TIN </h4>
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
                       <input type="text" id="ids" class="hidden">
							<select id="gvn" class="form-control">
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
                   <label for="">   Tên Hoạt Động:</label>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon">
                        <span><i class="ni ni-briefcase-24"></i></span>
                        </div>
                        <input class="form-control" id="hdn" type="text" placeholder="Tên Hoạt Động...">
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
			var xoa = confirm("Bạn có thực sự muốn xóa ?");
			if (xoa == true) {
				if(id == 0){
					alert(" không Thể Bị Xóa!");
				}
				else 
				{
				    $.ajax({
				    	url: 'xu-ly/ngoihoidong/xoa-hoidong.php',
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
				url: 'xu-ly/ngoihoidong/them-hoidong.php',
				type: 'POST',
				dataType: 'HTML',
				data: {
					gv: $('#gv').val(),
					hd: $('#hd').val()
				},
			success: function(data){
				$('#thongbaothemadmin').html(data);
			}
			});
		});

		$('button#sua').click(function(event) {
			var ids = $(this).attr('ids');
			var gvn = $(this).attr('gvn');
			var hdn = $(this).attr('hdn');
			
			$('#ModalSuaAdmin').modal();
			$('#ids').val(ids);
			$('#gvn').val(gvn);
			$('#hdn').val(hdn);
			
		});

		$('#suaadmin').click(function(event) {
			$.ajax({
				url: 'xu-ly/ngoihoidong/sua-hoidong.php',
				type: 'POST',
				dataType: 'HTML',
				data: {
					ids: $('#ids').val(),
					gvn: $('#gvn').val(),
					hdn: $('#hdn').val(),
					
				},
			success: function(data){
				$('#thongbaosuaadmin').html(data);
			}
			});
			
		});

	});

</script>
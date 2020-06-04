<?php
	include_once('../config/config.php');
	$title = "Thực Tập - ";
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
                  <li class="breadcrumb-item active" aria-current="page">Thực Tập TN</li>
                </ol>
              </nav>
            </div>
          </div>
    <div style="color:#FFF" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 adminhihi">
		<div class="list-group-item">
		<?php
			$sql = "SELECT * FROM `thuc_tap`";
			$qr = mysqli_query($conn, $sql);
		 ?>
			<div class="caption">
			<h1 style="text-align: center">QUẢN LÝ THỰC TẬP TN</h1>
			</div>
			<hr>
			<div class="row">
				<table class="table table-bordered table-responsive">
					<tr class="chimuc">
						<th>STT</th>
						<th>Tên Giáo Viên</th>
						<th>Địa Bàn</th>
						<th>Khoảng Cách</th>
						<th>Số Sinh Viên</th>
						<th>Tổng Giờ</th>
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
							<td><?php echo $row["dia_ban"]?></td>
							<td><?php echo $row["khoang_cach"]?></td>
							<td><?php echo $row["so_sv"]?></td>
							<td><?php echo ($row["khoang_cach"]*0.02*$row["so_sv"] ); echo " giờ"; ?></td>
							
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
	<button type="button" class="btn btn-success"  data-toggle="modal" data-target="#themadmin">THÊM TTTN</button>
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
                    <h4 class="text-center" style="color: white">THÊM TTTN MỚI</h4>
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
					<label for=""> Địa Bàn: </label>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon">
                        <span><i class="ni ni-circle-08"></i> </span>
                        </div>
						<input class="form-control" type="text" id="diaban">
                      </div>
                    </div>
                   
                    <center>
                      <button type="button" id="themadminmoi" class="btn btn-success button-update">THÊM THỰC TẬP TN MỚI</button>
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
                    <h4 class="text-center" style="color: white">SỬA THÔNG TIN TTTN</h4>
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
					alert("Thực Tập TN Này không Thể Bị Xóa!");
				}
				else 
				{
				    $.ajax({
				    	url: 'xu-ly/thuc-tap/xoa-thuc-tap.php',
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
				url: 'xu-ly/thuc-tap/them-thuc-tap.php',
				type: 'POST',
				dataType: 'HTML',
				data: {
					gv: $('#idgv').val(),
					diaban: $('#diaban').val(),
				},
			success: function(data){
				$('#thongbaothemadmin').html(data);
			}
			});
		});

		$('button#sua').click(function(event) {
			var id = $(this).attr('idsua');
           

			$('#ModalSuaAdmin').modal();
			$('#idsua').val(id);

		});

		$('#suaadmin').click(function(event) {
			$.ajax({
				url: 'xu-ly/thuc-tap/sua-thuc-tap.php',
				type: 'POST',
				dataType: 'HTML',
				data: {
					idsua: $('#idsua').val(),
					idgvs: $('#idgvs').val(),
				},
			success: function(data){
				$('#thongbaosuaadmin').html(data);
			}
			});
			
		});

	});

</script>
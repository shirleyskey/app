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
	<!-- Navbar -->

	<div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="index.php">Admin</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Tài Khoản Quản Trị</li>
                </ol>
              </nav>
            </div>
          </div>

    <div style="color:#FFF" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 adminhihi">
		<div class="list-group-item">
		<?php
			$sql = "SELECT * FROM `tai_khoan` WHERE `nhom_tai_khoan` = 1";
			$qr = mysqli_query($conn, $sql);
		 ?>
			<div class="caption">
			<h1 style="text-align: center">TÀI KHOẢN QUẢN TRỊ</h1>
			</div>
			<hr>
				<table class="table table-bordered color-border">
					<tr class="chimuc">
						<th>STT</th>
						<th>TÊN TÀI KHOẢN</th>
						<th>TÊN HIỂN THỊ</th>
						<th>SỐ ĐIỆN THOẠI</th>
						<th>NGÀY SINH</th>
						<th>QUẢN LÝ</th>
					</tr>
						<?php $stt =1;  ?>
					<?php while($row = mysqli_fetch_assoc($qr)){ ?>
						<tr>
							<td><?php echo $stt; $stt+=1; ?> </td>
							<td>
							<?php echo $row["ten_tai_khoan"]; ?>
							</td>
							<td><?php echo $row["ten_sinh_vien"]?></td>
							<td><?php echo $row["sdt"]?></td>
							<td><?php echo $row["ngay_sinh"]?></td>
							<td align="center">
								<button type="button" id="sua" class="btn btn-warning btn-xs button-sua" title="Sửa" tad="<?php echo $row["ten_tai_khoan"]?>" tadht="<?php echo $row["ten_sinh_vien"]?>" sdt="<?php echo $row["sdt"]?>" ns="<?php echo $row["ngay_sinh"]?>" ids="<?php echo $row["id_tai_khoan"]?>"><span class="glyphicon glyphicon-edit"></span>
								<span class="btn-inner--icon"><i class="ni ni-settings"></i></span>
							</button>
  								<button type="button" id="xoa" xoa="<?php echo $row["id_tai_khoan"]?>" class="btn btn-danger btn-xs button-sua" title="Xóa"><span class="glyphicon glyphicon-trash"></span>
								  <span class="btn-inner--icon"><i class="ni ni-fat-remove"></i></span>
							</button>
							</td>
						</tr>
						<?php } ?>
				</table>
<br>
<center>
	<button type="button" class="btn btn-success"  data-toggle="modal" data-target="#themadmin">THÊM ADMIN</button>
</center>
		</div>
    </div>
    <!-- Thông tin Admin -->
	<?php } ?>
</div>
 <?php 
	include_once('../footer.php');
 ?>

<!-- Start Them  -->
<div class="modal fade" id="themadmin" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
              <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="text-center" style="color: white">THÊM ADMIN MỚI</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="ni ni-fat-remove" style="color: white"></i>
                    </button>
                  </div>
                  <div class="container"></div>
                  <div class="modal-body">
                    <div id="thongbaothemadmin"></div>
                    <label for=""> Tên Tài Khoản:</label>
                   
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon">
                        <span><i class="ni ni-circle-08"></i> </span>
                        </div>
                        <input type="text" id="idgiangday" class="hidden">
                        <input class="form-control" id="tenadmin" type="text" autofocus="autofocus" placeholder="Tên Tài Khoản...">
                      </div>
                    </div>
                    <label for=""> Tên Hiển Thị:</label>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon">
                        <span><i class="ni ni-circle-08"></i> </span>
                        </div>
                        <input class="form-control" id="tenadminht" type="text" placeholder="Tên Hiển Thị...">
                      </div>
                    </div>
                    <label for="">Số Điện Thoại:</label>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon">
                        <span><i class="ni ni-mobile-button"></i> </span>
                        </div>
                        <input class="form-control" id="sdt" type="text" placeholder="Số Điện Thoại...">
                      </div>
                    </div>
                    <label for="">Ngày Sinh:</label>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon">
                        <span><i class="ni ni-calendar-grid-58"></i> </span>
                        </div>
                        <input class="form-control" id="ngaysinh" type="text" placeholder="Ngày Sinh...">
                      </div>
                    </div>
                  
                   
                    <center>
                      <button type="button" id="themadminmoi" class="btn btn-success button-update">THÊM ADMIN</button>
                    </center>
                  </div>
                </div>
              </div>
            </div>
          </div>
<!-- End Them  -->
<!-- Start  -->
<div class="modal fade" id="ModalSuaAdmin" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
              <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="text-center" style="color: white">SỬA ADMIN</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="ni ni-fat-remove" style="color: white"></i>
                    </button>
                  </div>
                  <div class="container"></div>
                  <div class="modal-body">
                    <div id="thongbaosuaadmin"></div>
                    <label for=""> Tên Tài Khoản:</label>
                   
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon">
                        <span><i class="ni ni-circle-08"></i> </span>
                        </div>
                        <input type="text" id="idsua" class="hidden">
                        <input class="form-control" id="tenadmins" type="text" autofocus="autofocus" placeholder="Tên Tài Khoản...">
                      </div>
                    </div>
                    <label for="">Tên Hiển Thị:</label>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon">
                        <span><i class="ni ni-lock-circle-open"></i> </span>
                        </div>
                        <input class="form-control" id="tenadminhts" type="text" placeholder="Tên Hiển Thị">
                      </div>
                    </div>
                    <label for="">Mật Khẩu::</label>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon">
                        <span><i class="ni ni-lock-circle-open"></i> </span>
                        </div>
                        <input class="form-control" id="passadminhts" type="password" placeholder="........">
                      </div>
                    </div>
                    <label for="">  Số Điện Thoại:</label>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon">
                        <span><i class="ni ni-single-02"></i> </span>
                        </div>
                        <input class="form-control" id="sdts" type="text"  placeholder="Số Điện Thoại...">
                      </div>
                    </div>
                    <label for="">  Ngày Sinh:</label>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon">
                        <span><i class="ni ni-mobile-button"></i> </span>
                        </div>
                        <input class="form-control" id="ngaysinhs" type="text" placeholder="Ngày Sinh...">
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
<!-- End  -->
<script>
	$(document).ready(function() {
		$('button#xoa').click(function(event) {
			var id = $(this).attr('xoa');
			var xoa = confirm("Bạn có thực sự muốn xóa Admin này ?");
			if (xoa == true) {
				if(id == 0){
					alert("Administrator Này không Thể Bị Xóa!");
				}
				else 
				{
				    $.ajax({
				    	url: 'xu-ly/admin/xoa-admin.php',
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
				url: 'xu-ly/admin/them-admin.php',
				type: 'POST',
				dataType: 'HTML',
				data: {
					tenadmin: $('#tenadmin').val(),
					tenadminht: $('#tenadminht').val(),
					sdt: $('#sdt').val(),
					ngaysinh: $('#ngaysinh').val()
				},
			success: function(data){
				$('#thongbaothemadmin').html(data);
			}
			});
		});

		$('button#sua').click(function(event) {
			var id = $(this).attr('ids');
			var tad = $(this).attr('tad');
			var tadht = $(this).attr('tadht');
			var sdt = $(this).attr('sdt');
			var ns = $(this).attr('ns');
			$('#ModalSuaAdmin').modal();
			$('#idsua').val(id);
			$('#tenadmins').val(tad);
			$('#tenadminhts').val(tadht);
			$('#sdts').val(sdt);
			$('#ngaysinhs').val(ns);
		});
		$('#suaadmin').click(function(event) {
			$.ajax({
				url: 'xu-ly/admin/sua-admin.php',
				type: 'POST',
				dataType: 'HTML',
				data: {
					idsua: $('#idsua').val(),
					tenadmins: $('#tenadmins').val(),
					passadminhts: $('#passadminhts').val(),
					tenadminhts: $('#tenadminhts').val(),
					sdts: $('#sdts').val(),
					ngaysinhs: $('#ngaysinhs').val()
				},
			success: function(data){
				$('#thongbaosuaadmin').html(data);
			}
			});
			
		});

	});
</script>
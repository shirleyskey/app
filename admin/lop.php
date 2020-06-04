<?php
	include_once('../config/config.php');
	$title = "Lớp - ";
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
                  <li class="breadcrumb-item active" aria-current="page">Lớp Học</li>
                </ol>
              </nav>
            </div>
          </div>
    <div style="color:#FFF" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 adminhihi">
		<div class="list-group-item">
		<?php
			$sql = "SELECT * FROM `lop_hoc`";
			$qr = mysqli_query($conn, $sql);
		 ?>
			<div class="caption">
			<h1 style="text-align: center">QUẢN LÝ LỚP</h1>
			</div>
			<hr>
			<div class="row">
				<table class="table table-bordered">
					<tr class="chimuc">
						<th>STT</th>
						<th>Tên Lớp</th>
						<th>CHuyên Ngành</th>
						<th>Quy Mô</th>
						<th>Sĩ Số</th>
						<th>Hệ</th>
						<th>Ghi Chú</th>
						<th>Quản Lý</th>
					</tr>
					<tbody>
						<?php $stt = 1; ?>
					<?php while($row = mysqli_fetch_assoc($qr)){ ?>
						<tr>
							<td><?php echo $stt; $stt += 1; ?></td>
							<td>
							<?php echo $row["ten_lop"]; ?>
							</td>
							<td><?php echo $row["chuyen_nganh"]?></td>
							<td><?php echo $row["quy_mo"]?></td>
							<td><?php echo $row["si_so"]?></td>
							<td><?php echo $row["he"]?></td>
							<td><?php echo $row["ghi-chu"]?></td>
							<td align="center">
								<button type="button" id="sua" class="btn btn-warning btn-xs button-sua" title="Sửa" 
                tenlop="<?php echo $row["ten_lop"]?>" 
                chuyennganh="<?php echo $row["chuyen_nganh"]?>" 
                quymo="<?php echo $row["quy_mo"]?>" 
                siso="<?php echo $row["si_so"]?>" 
                idlop="<?php echo $row["id_lop"]?>" he="<?php echo $row["he"]?>" ghichu="<?php echo $row["ghi-chu"]?>"><span class="glyphicon glyphicon-edit"></span>
								<span class="btn-inner--icon"><i class="ni ni-settings"></i></span>
							</button>
  								<button type="button" id="xoa" xoa="<?php echo $row["id_lop"]?>" class="btn btn-danger btn-xs button-sua" title="Xóa"><span class="glyphicon glyphicon-trash"></span>
								  <span class="btn-inner--icon"><i class="ni ni-fat-remove"></i></span>
							</button>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
<br>
<center>
	<button type="button" class="btn btn-success"  data-toggle="modal" data-target="#themadmin">THÊM LỚP</button>
</center>
			</div>

		</div>
    </div>
    <!-- Thông tin Lớp -->
	<?php } ?>

</div>
 <?php 
	include_once('../footer.php');
 ?>

<!-- End Modal -->

<!-- start  -->
<div class="modal fade" id="themadmin" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
              <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="text-center" style="color: white">THÊM LỚP MỚI</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="ni ni-fat-remove" style="color: white"></i>
                    </button>
                  </div>
                  <div class="container"></div>
                  <div class="modal-body">
                    <div id="thongbaothemadmin"></div>
                    <label for=""> Tên Lớp:</label>
                   
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon">
                        <span><i class="ni ni-circle-08"></i> </span>
                        </div>
                        
                        <input class="form-control" id="tenlopt" type="text" autofocus="autofocus" placeholder="Tên Lớp:...">
                      </div>
                    </div>
                    <label for=""> Chuyên Ngành:</label>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon">
                        <span><i class="ni ni-briefcase-24"></i> </span>
                        </div>
                        <input class="form-control" id="chuyennganht" type="text" placeholder=" Chuyên Ngành:......">
                      </div>
                    </div>
                    <label for="">Quy Mô:</label>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon">
                        <span><i class="ni ni-building"></i> </span>
                        </div>
                        <input class="form-control" id="quymot" type="text" placeholder="Quy Mô:........">
                      </div>
                    </div>
                    <label for="">Sĩ Số:</label>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon">
                        <span><i class="ni ni-building"></i> </span>
                        </div>
                        <input class="form-control" id="sisot" type="text" placeholder="Sĩ Số:........">
                      </div>
                    </div>
                    <label for=""> Hệ:</label>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon">
                        <span><i class="ni ni-credit-card"></i> </span>
                        </div>
                        <input class="form-control" id="het" type="text" placeholder="Hệ:......." >
                      </div>
                    </div>
                    <label for="">Ghi Chú:</label>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon">
                        <span><i class="ni ni-calendar-grid-58"></i> </span>
                        </div>
                        <input class="form-control" id="ghichut" type="text" placeholder="Ghi Chú:.......">
                      </div>
                    </div>
                   
                    <center>
                      <button type="button" id="themadminmoi" class="btn btn-success button-update">THÊM LỚP MỚI</button>
                    </center>
                  </div>
                </div>
              </div>
            </div>
          </div>
          

<!-- End  -->

<!-- Start  -->
<div class="modal fade" id="ModalSuaAdmin" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
              <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="text-center" style="color: white">SỬA THÔNG TIN LỚP</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="ni ni-fat-remove" style="color: white"></i>
                    </button>
                  </div>
                  <div class="container"></div>
                  <div class="modal-body">
                    <div id="thongbaosuaadmin"></div>
                    <label for=""> Tên Lớp:</label>
                   
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon">
                        <span><i class="ni ni-circle-08"></i> </span>
                        </div>
						<input type="text" id="idlop" class="hidden">
                        <input class="form-control" id="tenlop" type="text" autofocus="autofocus">
                      </div>
                    </div>
                    <label for=""> Chuyên Ngành:</label>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon">
                        <span><i class="ni ni-briefcase-24"></i> </span>
                        </div>
                        <input class="form-control" id="chuyennganh" type="text" placeholder=" Chuyên Ngành:......">
                      </div>
                    </div>
                    <label for="">Quy Mô:</label>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon">
                        <span><i class="ni ni-building"></i> </span>
                        </div>
                        <input class="form-control" id="quymo" type="text" placeholder="Quy Mô:........">
                      </div>
                    </div>
                    <label for="">Sĩ Số:</label>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon">
                        <span><i class="ni ni-building"></i> </span>
                        </div>
                        <input class="form-control" id="siso" type="text" placeholder="Sĩ Số:........">
                      </div>
                    </div>
                    <label for=""> Hệ:</label>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon">
                        <span><i class="ni ni-credit-card"></i> </span>
                        </div>
                        <input class="form-control" id="he" type="text" placeholder="Hệ:......." >
                      </div>
                    </div>
                    <label for="">Ghi Chú:</label>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon">
                        <span><i class="ni ni-calendar-grid-58"></i> </span>
                        </div>
                        <input class="form-control" id="ghichu" type="text" placeholder="Ghi Chú:.......">
                      </div>
                    </div>
                   
                    <center>
                      <button type="button" id="suaadmin" class="btn btn-success button-update">SỬA</button>
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
			var xoa = confirm("Bạn có thực sự muốn xóa Lớp này không ?");
			if (xoa == true) {
				if(id == 0){
					alert("Lớp Này không Thể Bị Xóa!");
				}
				else 
				{
				    $.ajax({
				    	url: 'xu-ly/lop/xoa-lop.php',
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
				url: 'xu-ly/lop/them-lop.php',
				type: 'POST',
				dataType: 'HTML',
				data: {
					tenlopt: $('#tenlopt').val(),
					chuyennganht: $('#chuyennganht').val(),
					quymot: $('#quymot').val(),
					sisot: $('#sisot').val(),
					het: $('#het').val(),
					ghichut: $('#ghichut').val()
				},
			success: function(data){
				$('#thongbaothemadmin').html(data);
			}
			});
		});

		$('button#sua').click(function(event) {
			var idlop = $(this).attr('idlop');
			var tenlop = $(this).attr('tenlop');
			var chuyennganh = $(this).attr('chuyennganh');
			var quymo = $(this).attr('quymo');
			var siso = $(this).attr('siso');
			var he = $(this).attr('he');
			var ghichu = $(this).attr('ghichu');
			$('#ModalSuaAdmin').modal();
			$('#idlop').val(idlop);
			$('#tenlop').val(tenlop);
			$('#chuyennganh').val(chuyennganh);
			$('#quymo').val(quymo);
			$('#siso').val(siso);
			$('#he').val(he);
			$('#ghichu').val(ghichu);
		});

		$('#suaadmin').click(function(event) {
			$.ajax({
				url: 'xu-ly/lop/sua-lop.php',
				type: 'POST',
				dataType: 'HTML',
				data: {
					idlop: $('#idlop').val(),
					tenlop: $('#tenlop').val(),
					chuyennganh: $('#chuyennganh').val(),
					quymo: $('#quymo').val(),
					siso: $('#siso').val(),
					he: $('#he').val(),
					ghichu: $('#ghichu').val()
				},
			success: function(data){
				$('#thongbaosuaadmin').html(data);
			}
			});
			
		});

	});

</script>
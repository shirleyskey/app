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

    <div style="color:#FFF" class="col-xs-12 col-sm-12 col-md-12 col-lg-12  adminhihi">
		<div class="list-group-item">
		<?php
			$sql = "SELECT * FROM `nghien_cuu`";
			$qr = mysqli_query($conn, $sql);
		 ?>
			<div class="caption">
			<h1 style="text-align: center">NCKH, THỰC TẬP, KHÓA LUẬN</h1>
			</div>
			<hr>
			<div class="row">
				<table class="table table-bordered table-responsive">
					<tr class="chimuc">
						<th>STT</th>
						<th>Tên Giáo Viên</th>
						<th>Luận Án</th>
						<th>Chấm Luận Án</th>
						<th>Luận Văn</th>
						<th>Chấm Luận Văn</th>
						<th>Khóa Luận</th>
						<th>Chấm Khóa Luận</th>
						<th>NC Khoa Học</th>
						<th>Thực Tập Tốt Nghiệp</th>
						<th>Chấm Thực Tập Tốt Nghiệp</th>
						<th>Quản Lý</th>
					</tr>
					<tbody>
						<?php $stt =1; ?>
					<?php while($row = mysqli_fetch_assoc($qr)){ ?>
						<tr>
							<td><?php echo $stt; $stt+= 1; ?></td>
							
							<td><?php 
								$idgv = $row["id_giaovien"];
								$sqlgv = "SELECT `ten_sinh_vien` FROM `tai_khoan` WHERE `id_tai_khoan` = '$idgv'";
								$qrgv = mysqli_query($conn, $sqlgv);
								$rowgv = mysqli_fetch_assoc($qrgv);
								echo $rowgv["ten_sinh_vien"];
							
							?>
							</td>
							
							<td><?php echo $row["luan_an"]?></td>
							<td><?php echo $row["cham_luan_an"]?></td>
							<td><?php echo $row["luan_van"]?></td>
							<td><?php echo $row["cham_luan_van"]?></td>
							<td><?php echo $row["khoa_luan"]?></td>
							<td><?php echo $row["cham_khoa_luan"]?></td>
							<td><?php echo $row["nc_khoa_hoc"]?></td>
							<td><?php echo $row["thuc_tap_tot_nghiep"]?></td>
							<td><?php echo $row["cham_thuc_tap_tot_nghiep"]?></td>
							
							
							<td align="center">
							<button type="button" id="sua"  
							ids="<?php echo $row["id_nghien_cuu"]?>" 
							gvs="<?php echo $row["id_giaovien"]?>" 
							las="<?php echo $row["luan_an"]?>" 
							clas="<?php echo $row["cham_luan_an"]?>" 
							lvs="<?php echo $row["luan_van"]?>" 
							clvs="<?php echo $row["cham_luan_van"]?>" 
							kls="<?php echo $row["khoa_luan"]?>" 
							ckls="<?php echo $row["cham_khoa_luan"]?>" 
							khs="<?php echo $row["nc_khoa_hoc"]?>" 
							tttns="<?php echo $row["thuc_tap_tot_nghiep"]?>" 
							ctttns="<?php echo $row["cham_thuc_tap_tot_nghiep"]?>" 
							
							class="btn btn-warning btn-xs button-sua" ><span class="glyphicon glyphicon-edit"></span>
								  <span class="btn-inner--icon"><i class="ni ni-fat-remove"></i></span>
							</button>
								
							<button type="button" id="xoa"  xoa="<?php echo $row["id_nghien_cuu"]?>" class="btn btn-danger btn-xs button-sua" title="Xóa"><span class="glyphicon glyphicon-trash"></span>
								<span class="btn-inner--icon"><i class="ni ni-fat-remove"></i></span>
							</button>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
<br>
<center>
	<button type="button" class="btn btn-success"  data-toggle="modal" data-target="#themadmin">THÊM NGHIÊN CỨU</button>
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



<!-- START THÊM  -->
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
					<label for="">Tên Giáo Viên:</label>
                   
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

				   <label for=""> Luận Án: </label>
				   <div class="form-group">
					 <div class="input-group">
					   <div class="input-group-addon">
					   <span><i class="ni ni-circle-08"></i> </span>
					   </div>
					   <input class="form-control" id="lat" type="text" placeholder="Tên Luận Án:......">
					 </div>
				   </div>

				   <label for=""> Chấm Luận Án: </label>
				   <div class="form-group">
					 <div class="input-group">
					   <div class="input-group-addon">
					   <span><i class="ni ni-circle-08"></i> </span>
					   </div>
					   <input class="form-control" id="clat" type="text" placeholder="Tên Chấm Luận Án:......">
					 </div>
				   </div>

				  
				   <label for=""> Luận Văn: </label>
				   <div class="form-group">
					 <div class="input-group">
					   <div class="input-group-addon">
					   <span><i class="ni ni-circle-08"></i> </span>
					   </div>
					   <input class="form-control" id="lvt" type="text" placeholder="Luận Văn:......">
					 </div>
				   </div>

				   <label for=""> Chấm Luận Văn: </label>
				   <div class="form-group">
					 <div class="input-group">
					   <div class="input-group-addon">
					   <span><i class="ni ni-circle-08"></i> </span>
					   </div>
					   <input class="form-control" id="clvt" type="text" placeholder="Tên Chấm Luận Văn:......">
					 </div>
				   </div>

				   <label for=""> Khóa Luận: </label>
				   <div class="form-group">
					 <div class="input-group">
					   <div class="input-group-addon">
					   <span><i class="ni ni-circle-08"></i> </span>
					   </div>
					   <input class="form-control" id="klt" type="text" placeholder="Khóa Luận:......">
					 </div>
				   </div>

				   <label for="">Chấm Khóa Luận: </label>
				   <div class="form-group">
					 <div class="input-group">
					   <div class="input-group-addon">
					   <span><i class="ni ni-circle-08"></i> </span>
					   </div>
					   <input class="form-control" id="cklt" type="text" placeholder="Chấm Khóa Luận:......">
					 </div>
				   </div>

				   <label for="">NNKH: </label>
				   <div class="form-group">
					 <div class="input-group">
					   <div class="input-group-addon">
					   <span><i class="ni ni-circle-08"></i> </span>
					   </div>
					   <input class="form-control" id="kht" type="text" placeholder="NNKH:......">
					 </div>
				   </div>
				   <label for="">TTTN: </label>
				   <div class="form-group">
					 <div class="input-group">
					   <div class="input-group-addon">
					   <span><i class="ni ni-circle-08"></i> </span>
					   </div>
					   <input class="form-control" id="tttnt" type="text" placeholder="TTTN:......">
					 </div>
				   </div>
				   <label for="">Chấm TTTN: </label>
				   <div class="form-group">
					 <div class="input-group">
					   <div class="input-group-addon">
					   <span><i class="ni ni-circle-08"></i> </span>
					   </div>
					   <input class="form-control" id="ctttnt" type="text" placeholder="Chấm TTTN:......">
					 </div>
				   </div>
				   
                    <center>
                      <button type="button" id="themadminmoi" class="btn btn-success button-update">THÊM NGHIÊN CỨU MỚI</button>
                    </center>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
<!-- END THÊM  -->


<!-- End Modal Edit Admin -->
<div class="modal fade" id="ModalSuaAdmin" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
              <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="text-center" style="color: white">SỬA THÔNG TIN NGHIÊN CỨU</h4>
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
				   
				   <label for=""> Luận Án: </label>
				   <div class="form-group">
					 <div class="input-group">
					   <div class="input-group-addon">
					   <span><i class="ni ni-circle-08"></i> </span>
					   </div>
					   <input class="form-control" id="las" type="text" placeholder="Tên Luận Án:......">
					 </div>
				   </div>

				   <label for=""> Chấm Luận Án: </label>
				   <div class="form-group">
					 <div class="input-group">
					   <div class="input-group-addon">
					   <span><i class="ni ni-circle-08"></i> </span>
					   </div>
					   <input class="form-control" id="clas" type="text" placeholder="Tên Chấm Luận Án:......">
					 </div>
				   </div>

				  
				   <label for=""> Luận Văn: </label>
				   <div class="form-group">
					 <div class="input-group">
					   <div class="input-group-addon">
					   <span><i class="ni ni-circle-08"></i> </span>
					   </div>
					   <input class="form-control" id="lvs" type="text" placeholder="Luận Văn:......">
					 </div>
				   </div>

				   <label for=""> Chấm Luận Văn: </label>
				   <div class="form-group">
					 <div class="input-group">
					   <div class="input-group-addon">
					   <span><i class="ni ni-circle-08"></i> </span>
					   </div>
					   <input class="form-control" id="clvs" type="text" placeholder="Tên Chấm Luận Văn:......">
					 </div>
				   </div>

				   <label for=""> Khóa Luận: </label>
				   <div class="form-group">
					 <div class="input-group">
					   <div class="input-group-addon">
					   <span><i class="ni ni-circle-08"></i> </span>
					   </div>
					   <input class="form-control" id="kls" type="text" placeholder="Khóa Luận:......">
					 </div>
				   </div>

				   <label for="">Chấm Khóa Luận: </label>
				   <div class="form-group">
					 <div class="input-group">
					   <div class="input-group-addon">
					   <span><i class="ni ni-circle-08"></i> </span>
					   </div>
					   <input class="form-control" id="ckls" type="text" placeholder="Chấm Khóa Luận:......">
					 </div>
				   </div>

				   <label for="">NNKH: </label>
				   <div class="form-group">
					 <div class="input-group">
					   <div class="input-group-addon">
					   <span><i class="ni ni-circle-08"></i> </span>
					   </div>
					   <input class="form-control" id="khs" type="text" placeholder="NNKH:......">
					 </div>
				   </div>
				   <label for="">TTTN: </label>
				   <div class="form-group">
					 <div class="input-group">
					   <div class="input-group-addon">
					   <span><i class="ni ni-circle-08"></i> </span>
					   </div>
					   <input class="form-control" id="tttns" type="text" placeholder="TTTN:......">
					 </div>
				   </div>
				   <label for="">Chấm TTTN: </label>
				   <div class="form-group">
					 <div class="input-group">
					   <div class="input-group-addon">
					   <span><i class="ni ni-circle-08"></i> </span>
					   </div>
					   <input class="form-control" id="ctttns" type="text" placeholder="Chấm TTTN:......">
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
<!-- START SUA  -->




<script>
	
	$(document).ready(function() {
		$('button#xoa').click(function(event) {
			var id = $(this).attr('xoa');
			var xoa = confirm("Bạn có thực sự muốn xóa Nghiên cứu này không?");
			if (xoa == true) {
				if(id == 0){
					alert("Nghiên Cứu Này không Thể Bị Xóa!");
				}
				else 
				{
				    $.ajax({
				    	url: 'xu-ly/nghiencuu/xoa-nghiencuu.php',
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
				url: 'xu-ly/nghiencuu/them-nghiencuu.php',
				type: 'POST',
				dataType: 'HTML',
				data: {
					gv: $('#gv').val(),
					lat: $('#lat').val(),
					clat: $('#clat').val(),
					lvt: $('#lvt').val(),
					clvt: $('#clvt').val(),
					klt: $('#klt').val(),
					cklt: $('#cklt').val(),
					kht: $('#kht').val(),
					tttnt: $('#tttnt').val(),
					ctttnt: $('#ctttnt').val(),
				},
			success: function(data){
				$('#thongbaothemadmin').html(data);
			}
			});
		});

		$('button#sua').click(function(event) {
			var ids = $(this).attr('ids');
			var gvs = $(this).attr('gvs');
			var las = $(this).attr('las');
			var clas = $(this).attr('clas');
			var lvs = $(this).attr('lvs');
			var clvs = $(this).attr('clvs');
			var kls = $(this).attr('kls');
			var ckls = $(this).attr('ckls');
			var khs = $(this).attr('khs');
			var tttns = $(this).attr('tttns');
			var ctttns = $(this).attr('ctttns');

			
			$('#ModalSuaAdmin').modal();
			$('#idsua').val(ids);
			$('#gvs').val(gvs);
			$('#las').val(las);
			$('#clas').val(clas);
			$('#lvs').val(lvs);
			$('#clvs').val(clvs);
			$('#kls').val(kls);
			$('#ckls').val(ckls);
			$('#khs').val(khs);
			$('#tttns').val(tttns);
			$('#ctttns').val(ctttns);
			
		});

		$('#suaadmin').click(function(event) {
			$.ajax({
				url: 'xu-ly/nghiencuu/sua-nghiencuu.php',
				type: 'POST',
				dataType: 'HTML',
				data: {
					idsua: $('#idsua').val(),
					gvs: $('#gvs').val(),
					las: $('#las').val(),
					clas: $('#clas').val(),
					lvs: $('#lvs').val(),
					clvs: $('#clvs').val(),
					kls: $('#kls').val(),
					ckls: $('#ckls').val(),
					khs: $('#khs').val(),
					tttns: $('#tttns').val(),
					ctttns: $('#ctttns').val(),
				},
			success: function(data){
				$('#thongbaosuaadmin').html(data);
			}
			});
			
		});

	});

</script>
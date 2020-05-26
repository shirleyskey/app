
<?php
	$title = "Thời Khóa Biểu - ";
	include_once('../header.php');
  include_once('../config/config.php');
  if($_SESSION["taikhoan"] == NULL){?>
    <script>
      window.location.href="tai-khoan/dang-nhap.php";
    </script>
  <?php } else{
 ?>
<div class="container-fluid">
	<!-- Navbar -->
	<div class="hidden-lg hidden-md hidden-md hidden-sm navbar navbar-default navbar-fixed-top " role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Menu</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Giáo Viên</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../images/avatar.png" alt="Ảnh đại diện" style="width:40px; height:40px; border-radius:3px; padding:3px; border: 1px solid #CCC">
              <?php echo $_SESSION["tensv"]; ?> <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
              <?php if($_SESSION["nhomtk"] == 1){ ?>
                <li><a href="admin">
                <span class="glyphicon glyphicon-tower"></span>
                Trang Quản Trị</a></li>
                <?php } else {} ?>
                <li><a href="thong-tin.php">
                <span class="glyphicon glyphicon-user"></span>
                Trang Cá Nhân</a></li>
                <li><a href="tai-khoan/dang-xuat.php">
                <span class="glyphicon glyphicon-log-out"></span>
                Đăng Xuất</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    <!-- End Navbar -->
	<div class="row">
    <div class="hidden-xs col-sm-3 col-md-3 col-lg-3">
    	<div class="thongtinad">
    		<img src="../images/c500.jpg" alt="Ảnh bìa">
    		<img src="../images/avatar.png" class="avatar" alt="Ảnh đại diện">
    		<p><?php echo $_SESSION["tensv"]; ?></p>
    	</div>

    	<div class="menu">
    		<div class="list-group">
        <a href="#thongtin" class="list-group-item">
          <table>
            <tr>
            <!-- Tên Giảng Viên  -->
              <td style="width:30px;"  title="Tên Sinh Viên"><span class="glyphicon glyphicon-user"></span></td>
              <td><strong><?php echo $_SESSION["tensv"]; ?></strong></td>
            </tr>
            <tr>
            <!-- Khoa của giảng viên  -->
              <td style="width:30px;" title="Sinh Viên khoa"><span class="glyphicon glyphicon-th-large"></span></td>
              <td><strong>Khoa Quản lý Nhà nước về An ninh Quốc gia</strong></td>
            </tr>
            <tr>
             <!-- Số điện thoại của giảng viên  -->
              <td style="width:30px;" title="Số Điện Thoại"><span class="glyphicon glyphicon-phone"></span></td>
              <td> <strong> <?php echo $_SESSION["sdt"]; ?></strong></td>
            </tr>
            <tr>
            <!-- Ngày sinh của giảng viên  -->
              <td style="width:30px;" title="Ngày Sinh"><span class="glyphicon glyphicon-calendar"></span></td>
              <td> <strong> <?php echo $_SESSION["ns"]; ?></strong></td>
            </tr>
          </table>
        </a>
          <?php if($_SESSION["nhomtk"] == 1){ ?>
          <a href="admin" class="list-group-item" style="text-align:center">
          <span style="font-size:40px; color: #D9EDF7" class="glyphicon glyphicon-cog"></span> <br>
          QUẢN TRỊ
          </a>
          <?php } else {?>
        
          <button type="button" id="sua" class="setting">
              <a href="../thong-tin.php">
            <span style="font-size:40px; color: #D9EDF7" class="glyphicon glyphicon-cog"></span> <br>
            <span> TRANG CHỦ</span>
            </a>
        </button>
         <?php 
        } ?>
        
			  <a href="tai-khoan/dang-xuat.php" class="list-group-item" style="text-align:center">
			  <span style="font-size:40px; color:#D9534F" class="glyphicon glyphicon-log-out"></span> <br>
			 ĐĂNG XUẤT
			  </a>
			</div>
    	</div>
    </div>

    <div id="suathongtin"></div>
    <div style="color:#FFF" class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
    <div id="dulieudiem">
        <?php
            if(isset($_GET["tkb"])){
                $idlop = $_GET["tkb"];
            }
            $sql = "SELECT * FROM `lop_hoc` WHERE `id_lop` = '$idlop'";
            $qr = mysqli_query($conn, $sql);
        ?>    
<!-- Danh Sách Giảng Dạy -->
        <?php if(mysqli_num_rows($qr) > 0) {?>
            <div class=" bang col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h2><span class="glyphicon glyphicon-calendar icon-table"></span>THỜI KHÓA BIỂU</h2>
                        <?php while($row = mysqli_fetch_assoc($qr)){?>
                            <?php 
                             $thoikhoabieu = $row["thoi_khoa_bieu"];
                             $jsontkb = json_decode($thoikhoabieu, true);
                             foreach($jsontkb as $key=>$value){?>
                              <div class="tkb col-xs-2 col-sm2 col-md-2 col-lg-2">
                                 <p class="ngay" style="color:black"><?php echo $value["ngay"]; ?></p>
                                 <p class="buoi" style="color:black"><?php echo $value["buoi"]; ?></p>
                                 <p class="ca" style="color:black"><?php echo $value["ca"]; ?></p>
                                <button type="button" id="sua" class="btn btn-warning btn-xs" title="Sửa"
                                  ngays="<?php echo $value["ngay"];?>"
                                  buois="<?php echo $value["buoi"];?>" 
                                  cas="<?php echo $value["ca"];?>" 
                                  ids="<?php echo $_GET["tkb"]?>"
                                  phantus="<?php echo $key; ?>"
                                ><span class="glyphicon glyphicon-edit"></span>
								</button>
  								<button type="button" id="xoa" phantu="<?php echo $key; ?>" xoa="<?php echo $_GET["tkb"]?>" class="btn btn-danger btn-xs" title="Xóa"><span class="glyphicon glyphicon-trash"></span>
  								</button>
                            </div>
                        <?php
                             }
                        ?>
                        <?php }} ?>
                  <?php } ?>
                  <br>
<div id="thongbaoxoa"></div>
                  </div>
                  <hr>
                  <center>
	<button type="button" class="btn btn-success"  data-toggle="modal" data-target="#themadmin">THÊM CA HỌC</button>
</center>


<!-- Modal Thêm Thời Khóa Biểu-->
<div class="modal fade" id="themadmin" style="color: #FFF">
	<div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">THÊM CA HỌC MỚI</h4>
        </div><div class="container"></div>
        <div class="modal-body">
          <div id="thongbaothemadmin"></div>
				Ngày Học:
				<div class="form-group">
			    <div class="input-group">
			    <div class="input-group-addon">
			    <span class="glyphicon glyphicon-barcode"></span>
                </div>
                <input type="text" id="idt" class="hidden" value="<?php echo $_GET["tkb"]; ?>">
			    <input class="form-control" id="tngay" type="text" autofocus="autofocus" placeholder="VD: 02/03/2020...">
			    </div>
			    </div>
			    Buổi Học:
				<div class="form-group">
			    <div class="input-group">
			    <div class="input-group-addon">
			    <span class="glyphicon glyphicon-user"></span>
			    </div>
			    <input class="form-control" id="tbuoi" type="text" placeholder="VD: Sáng/Chiều...">
			    </div>
			    </div>
			    Ca Học:
				<div class="form-group">
			    <div class="input-group">
			    <div class="input-group-addon">
			    <span class="glyphicon glyphicon-phone"></span>
			    </div>
			    <input class="form-control" id="tca" type="text" placeholder="VD: Ca 1 or 2...">
			    </div>
			    </div>
			    <center>
					<button type="button" id="themadminmoi" class="btn btn-success">THÊM CA HỌC</button>
				</center>
		   </div>
        </div>
      </div>
    </div>
</div>
<!-- End Modal -->

<!-- Modal Sửa Admin-->
<div class="modal fade" id="ModalSuaAdmin" style="color: #FFF">
	<div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">SỬA CA HỌC</h4>
        </div><div class="container"></div>
        <div class="modal-body">
          	<div id="thongbaosuaadmin"></div>
				Ngày Học:
				<div class="form-group">
			    <div class="input-group">
			    <div class="input-group-addon">
			    <span class="glyphicon glyphicon-barcode"></span>
			    </div>
                <input type="text" id="ids" class="hidden">
                <input type="text" id="phantus" class="hidden">
			    <input class="form-control" id="ngays" type="text" autofocus="autofocus" placeholder="">
			    </div>
			    </div>

			    Buổi Học:
				<div class="form-group">
			    <div class="input-group">
			    <div class="input-group-addon">
			    <span class="glyphicon glyphicon-user"></span>
			    </div>
			    <input class="form-control" id="buois" type="text" placeholder="">
			    </div>
				</div>
				
				Ca Học:
				<div class="form-group">
			    <div class="input-group">
			    <div class="input-group-addon">
			    <span class="glyphicon glyphicon-user"></span>
			    </div>
			    <input class="form-control" id="cas" type="text" placeholder="">
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
		$('button#xoa').click(function(event) {
            var id = $(this).attr('xoa');
            var phantu = $(this).attr('phantu');
            
			var xoa = confirm("Bạn có thực sự muốn xóa Ca Học Này?");
			if (xoa == true) {
				
				    $.ajax({
				    	url: 'xoa-thoikhoabieu.php',
				    	type: 'POST',
				    	dataType: 'HTML',
                        data: {
                            id: id,
                            phantu: phantu
                        
                        },
                        
				    });
				    alert("Xóa Thành Công!");
				    location.reload();
				}
			
		});

		$('button#themadminmoi').click(function(event) {
			$.ajax({
				url: 'them-thoikhoabieu.php',
				type: 'POST',
				dataType: 'HTML',
				data: {
					tngay: $('#tngay').val(),
					tbuoi: $('#tbuoi').val(),
                    tca: $('#tca').val(),
                    idt: $('#idt').val()
				},
			success: function(data){
				$('#thongbaothemadmin').html(data);
			}
			});
		});

		$('button#sua').click(function(event) {
			var ids = $(this).attr('ids');
			var cas = $(this).attr('cas');
			var buois = $(this).attr('buois');
			var ngays = $(this).attr('ngays');
			var phantus = $(this).attr('phantus');
			$('#ModalSuaAdmin').modal();
			$('#ids').val(ids);
			$('#cas').val(cas);
			$('#buois').val(buois);
			$('#ngays').val(ngays);
			$('#phantus').val(phantus);
		});
		$('#suaadmin').click(function(event) {
			$.ajax({
				url: 'sua-thoikhoabieu.php',
				type: 'POST',
				dataType: 'HTML',
				data: {
					ids: $('#ids').val(),
					cas: $('#cas').val(),
					buois: $('#buois').val(),
					ngays: $('#ngays').val(),
					phantus: $('#phantus').val(),
				},
			success: function(data){
				$('#thongbaosuaadmin').html(data);
			}
			});
			
		});

	});

</script>

</script>
      <?php 
        include_once('footer.php');
      ?>











            



    
            
            
            
            
            
            
            
            
            
            
    

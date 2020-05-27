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
      

  <!-- START  -->
  <body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white divcollap" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <!-- <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="../assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
        </a>
      </div> -->
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="?menu=bangdk" id="dieukhien">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Quản Trị</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?menu=phancong" id="phancong">
                <i class="ni ni-badge text-orange"></i>
                <span class="nav-link-text">Phân Công Lịch Giảng</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?menu=lichtrinh" id="lichtrinh">
                <i class="ni ni-calendar-grid-58 text-primary"></i>
                <span class="nav-link-text">Lịch trình giảng dạy</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?menu=hoatdongkhac" id="khac">
                <i class="ni ni-bullet-list-67 text-yellow"></i>
                <span class="nav-link-text">Tổng Hợp Giờ Giảng </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../tai-khoan/dang-xuat.php" >
                <i class="ni ni-button-power"></i>
                <span class="nav-link-text logout">Đăng Xuất</span>
              </a>
            </li>
           
          </ul>
          <!-- Divider -->
          <hr class="my-3">
          <!-- Heading -->
          <!-- Navigation -->
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-default border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          <button class="ni ni-bullet-list-67 collap" >
            
          </button>
         
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
            <li class="nav-item d-sm-none">
              <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                <i class="ni ni-zoom-split-in"></i>
              </a>
            </li>
            
           
          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
          <li class="nav-item dropdown">
                      <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media align-items-center">
                          <span class="avatar avatar-sm rounded-circle">
                            <img alt="Image placeholder" src="<?php echo $url; ?>assets/img/theme/avatar.png">
                          </span>
                          <div class="media-body  ml-2  d-none d-lg-block">
                            <span class="mb-0 text-sm  font-weight-bold"> <?php echo $_SESSION["tensv"]; ?></span>
                          </div>
                        </div>
                      </a>
                      <div class="dropdown-menu  dropdown-menu-right ">
                        <div class="dropdown-header noti-title">

                          <img src="<?php echo $url; ?>assets/img/theme/c500.jpg" alt="Image placeholder" class="card-img-top">
                          <div class="row justify-content-center">
                            <div class="col-lg-1 order-lg-1">
                              <div class="card-profile-image">
                                <a href="#">
                                  <img src="<?php echo $url; ?>assets/img/theme/avatar.png" class="rounded-circle">
                                </a>
                              </div>
                            </div>
                          </div>
                          <div class="card-body pt-6">
                            <div class="text-left">
                              <h5 class="h2">
                                <i class="ni ni-single-02"></i>
                                <?php echo $_SESSION["tensv"]; ?><span class="font-weight-light"></span>
                              </h5>
                              <div class="h5 font-weight-300">
                                <i class="ni ni-single-copy-04 mr-2"></i><?php echo $_SESSION["ns"]; ?>
                              </div>
                              <div class="h5 font-weight-300">
                                <i class="ni ni-mobile-button mr-2"></i>
                                <?php echo $_SESSION["sdt"]; ?>
                              </div>

                              <div>
                                <h6>
                                  <i class="ni ni-briefcase-24 mr-2"></i>
                                  Khoa Quản Lý Nhà Nước Về An Ninh Quốc Gia
                                </h6>
                              </div>
                              <div>
                                <a href="../tai-khoan/dang-xuat.php" class="dropdown-item text-center mt-2" style="color: #F86241">
                                  <i class="ni ni-button-power"></i>
                                  Đăng Xuất
                                </a>
                              </div>
                            </div>
                          </div>

                        </div>
                      </div>
                    </li>
                    <!-- End Profile  -->
                    <!-- Start Sửa thông tin cá nhân -->
                    <li class="nav-item dropdown">
                      <button type="button" data-toggle="modal" data-target="#ModalSuaThongTin" id="suathongtin" idtk="<?php echo $_SESSION["taikhoan"] ?>" tentk="<?php echo $_SESSION["user"] ?>" tenhienthitk="<?php echo $_SESSION["tensv"] ?>" sdttk="<?php echo $_SESSION["sdt"] ?>" ngaysinhtk="<?php echo $_SESSION["ns"] ?>" matkhautk="<?php echo $_SESSION["password"] ?>" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="ni ni-settings-gear-65"></i>
                      </button>
                    </li>
                   
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
  <!-- END  -->
			<?php
				if($_GET["menu"] == "bangdk"){
					include_once('bangdk.php');
				} elseif($_GET["menu"] == "phancong"){
					include_once('phancong.php');
				} elseif($_GET["menu"] == "lichtrinh"){
					include_once('lichtrinh.php');
        } elseif($_GET["menu"] == "hoatdongkhac"){
          include_once('hoatdongkhac.php');
        } elseif($_GET["menu"] == "admin"){
          include_once('admin.php');
        } elseif($_GET["menu"] == "giaovien"){
          include_once('giaovien.php');
        } elseif($_GET["menu"] == "lop"){
          include_once('lop.php');
        } elseif($_GET["menu"] == "chamthi"){
          include_once('chamthi.php');
        } elseif($_GET["menu"] == "coithi"){
          include_once('coithi.php');
        } elseif($_GET["menu"] == "nghiencuu"){
          include_once('nghiencuu.php');
        } elseif($_GET["menu"] == "daygioi"){
          include_once('daygioi.php');
        } elseif($_GET["menu"] == "ngoihoidong"){
          include_once('hoidong.php');
        } elseif($_GET["menu"] == "luanan"){
          include_once('luan-an.php');
        } elseif($_GET["menu"] == "luanvan"){
          include_once('luan-van.php');
        } elseif($_GET["menu"] == "khoaluan"){
          include_once('khoa-luan.php');
        } elseif($_GET["menu"] == "thuctap"){
          include_once('thuc-tap.php');
        }  elseif($_GET["menu"] == "nghien-cuu"){
          include_once('nghien-cuu.php');
        } 

       
        else{
					include_once('bangdk.php');
        }
        
			 ?>
    
    

    <?php } ?>
</div>


            <!-- Start Sửa Thông Tin  -->
            <div class="modal fade" id="ModalSuaThongTin" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
              <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="text-center" style="color: white">SỬA THÔNG TIN TÀI KHOẢN</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="ni ni-fat-remove" style="color: white"></i>
                    </button>
                  </div>
                  <div class="container"></div>
                  <div class="modal-body">
                    <div id="thongbaosuaadmin"></div>
                    <label for=""> Tên Tài Khoản Đăng Nhập:</label>
                   
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon">
                        <span><i class="ni ni-circle-08"></i> </span>
                        </div>
                        <input type="text" id="idtk" class="hidden">
                        <input class="form-control" id="tentk" type="text" autofocus="autofocus" placeholder="Tên Đăng Nhập ...">
                      </div>
                    </div>
                    <label for=""> Nhập Mật Khẩu:</label>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon">
                        <span><i class="ni ni-lock-circle-open"></i> </span>
                        </div>
                        <div class="input-group" id="show_hide_password">
                          <input class="form-control" type="password" id="matkhautk">
                          <div class="input-group-addon">
                            <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                   
                    <label for=""> Tên Hiển Thị:</label>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon">
                        <span><i class="ni ni-single-02"></i> </span>
                        </div>
                        <input class="form-control" id="tenhienthitk" type="text">
                      </div>
                    </div>
                    <label for="">  Số Điện Thoại:</label>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon">
                        <span><i class="ni ni-mobile-button"></i> </span>
                        </div>
                        <input class="form-control" id="sdttk" type="text" placeholder=".......">
                      </div>
                    </div>
                    <label for=""> Ngày Sinh:</label>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon">
                          <span><i class="ni ni-calendar-grid-58"></i> </span>
                        </div>
                        <input class="form-control" id="ngaysinhtk" type="text" placeholder="......">
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
          <!-- End Sửa Thông Tin  -->
 <?php 
	include_once('../footer.php');
 ?>
 <script>
 	$(document).ready(function() {

    $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "fa-eye-slash" );
            $('#show_hide_password i').removeClass( "fa-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass( "fa-eye-slash" );
            $('#show_hide_password i').addClass( "fa-eye" );
        }
    });


 		$('.collap').click(function(){
        $('.divcollap').toggleClass("collap_menu");
        $('.main-content').toggleClass("collap_menu");
     });

     $('button#suathongtin').click(function(event) {
        var idtk = $(this).attr('idtk');
        var tentk = $(this).attr('tentk');
        var tenhienthitk = $(this).attr('tenhienthitk');
        var sdttk = $(this).attr('sdttk');
        var ngaysinhtk = $(this).attr('ngaysinhtk');
        var matkhautk = $(this).attr('matkhautk');
        $('#ModalSuaThongTin').modal();
        $('#idtk').val(idtk);
        $('#tentk').val(tentk);
        $('#tenhienthitk').val(tenhienthitk);
        $('#sdttk').val(sdttk);
        $('#ngaysinhtk').val(ngaysinhtk);
      });

      $('#btnthongtin').click(function(event) {
			$.ajax({
				url: 'xu-ly/sua-thong-tin.php',
				type: 'POST',
				dataType: 'HTML',
				data: {
					idsua: $('#idtk').val(),
					tenadmins: $('#tentk').val(),
					tenadminhienthis: $('#tenhienthitk').val(),
          matkhaus: $('#matkhautk').val(),
					sdts: $('#sdttk').val(),
					ngaysinhs: $('#ngaysinhtk').val()
				},
			success: function(data){
				$('#thongbaosuaadmin').html(data);
			}
			});
			
		});

 		// $('a#dieukhien').addClass('chon');
 		// $('a#phancong').removeClass('chon');
 		// $('a#lichtrinh').removeClass('chon');
 		// $('a#khac').removeClass('chon');
 	});
 </script>

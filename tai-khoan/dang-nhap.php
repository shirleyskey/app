<body class="bg-default">
<?php 
	$title = "Đăng Nhập - ";
	include_once('../header.php');
 ?>

<!-- Main content -->
<div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-primary py-5 py-lg-7 pt-lg-9">
      <h1 class="text-white text-center display-2" style="font-weight: 700;">HỌC VIỆN AN NINH NHÂN DÂN</h1>
      <p class="text-lead text-white text-center mb-5 display-3">KHOA QUẢN LÝ NHÀ NƯỚC VỀ AN NINH QUỐC GIA</p>
    </div>
    </div>
    <!-- Page content -->
    <div class="container mt--6 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary border-0 mb-0">
          <div id="thongbaodn"></div>
            <div class="card-body px-lg-5 py-lg-5 sign-in">
              <h2 class="mb-3" style="text-align: center; font-weight:bold">ĐĂNG NHẬP TÀI KHOẢN</h2>
              <form role="form mt-3" method="POST" action="javascript:;">
                <div class="form-group form-group-sign-in mb-3">
                  <div class="input-group input-group-sign-in input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                    </div>
                    <input class="form-control" placeholder="Tài Khoản..." id="taikhoanlg" type="text" autofocus="autofocus">
                  </div>
                </div>
                <div class="form-group form-group-sign-in">
                  <div class="input-group input-group-sign-in input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Mật Khẩu..." id="matkhaulg" type="password">
                  </div>
                </div>
                <div class="custom-control custom-control-alternative custom-checkbox">
                 
                <label class="sign-in">
                  	<input type="checkbox" checked="checked"> Lưu đăng nhập
                  	</label> 
                </div>
                <div class="text-center">
                <input type="submit" id="dangnhaptk" class="btn btn-primary my-4" value="ĐĂNG NHẬP">
                </div>
              </form>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-6">
              <a href="#" class="text-light"><small>Quên mật khẩu?</small></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

 <?php 
	include_once('../footer.php');
 ?>
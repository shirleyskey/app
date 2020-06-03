
<?php include_once('../config/config.php');
 	session_start();
		if($_SESSION["taikhoan"] == NULL){ ?>
			<script>
				window.location.href="../tai-khoan/dang-nhap.php";
			</script>
		<?php } elseif($_SESSION["nhomtk"] != 1){ ?>
		      <script>
	    	window.location.href="../index.php";
	    	</script>
		    </div>
		<?php }else { ?>

		<?php
			$qrad = mysqli_query($conn, "SELECT `nhom_tai_khoan` FROM `tai_khoan` WHERE `nhom_tai_khoan` = 1");

			$qrgiaovien = mysqli_query($conn, "SELECT `id_tai_khoan` FROM `tai_khoan` WHERE `nhom_tai_khoan` = 0");

			$qrlop = mysqli_query($conn, "SELECT `id_lop` FROM `lop_hoc`");

			$qrchamthi = mysqli_query($conn, "SELECT `id_chamthi` FROM `cham_thi`");

			$qrcoithi = mysqli_query($conn, "SELECT `id_coi_thi` FROM `coi_thi`");

			$qrnghiencuu = mysqli_query($conn, "SELECT `id_nghien_cuu` FROM `nghien_cuu`");

			$qrdaygioi = mysqli_query($conn, "SELECT `id_daygioi` FROM `day_gioi`");

      $qrngoihoidong = mysqli_query($conn, "SELECT `id_ngoihoidong` FROM `ngoi_hoi_dong`");
      
      $qrluanan = mysqli_query($conn, "SELECT `id` FROM `luan_an`");

      $qrluanvan = mysqli_query($conn, "SELECT `id` FROM `luan_van`");

      $qrkhoaluan = mysqli_query($conn, "SELECT `id` FROM `khoa_luan`");

      $qrthuctap = mysqli_query($conn, "SELECT `id` FROM `thuc_tap`");

      $qrnc = mysqli_query($conn, "SELECT `id` FROM `nghiencuu`");


		?>

<!----------------------------------- START  ------------------------------------>
 
 <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Admin</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Quản Trị</li>
                </ol>
              </nav>
            </div>
          </div>
          <!-- Card stats -->
          <div class="row bangdk">
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0 ">Admin</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo mysqli_num_rows($qrad);?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-cyan text-white rounded-circle shadow">
                        <i class="ni ni-single-02"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <a href="?menu=admin"><span class="text-nowrap" style="">Xem chi tiết</span></a>
                    <span class="text-success mr-2"></span>
                </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Giáo viên</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo mysqli_num_rows($qrgiaovien);?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                        <i class="ni ni-circle-08"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <a href="?menu=giaovien"><span class="text-nowrap" style="">Xem chi tiết</span></a>
                    <span class="text-success mr-2"></span>
                </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Quản lý Lớp</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo mysqli_num_rows($qrlop);?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                        <i class="ni ni-briefcase-24"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <a href="?menu=lop"><span class="text-nowrap" style="">Xem chi tiết</span></a>
                    <span class="text-success mr-2"></span>
                </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Quản lý Chấm Thi</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo mysqli_num_rows($qrchamthi);?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                        <i class="ni ni-chart-bar-32"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <a href="?menu=chamthi"><span class="text-nowrap" style="">Xem chi tiết</span></a>
                    <span class="text-success mr-2"></span>
                </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card card-stats">
                  <!-- Card body -->
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Quản Lý Coi Thi</h5>
                        <span class="h2 font-weight-bold mb-0"><?php echo mysqli_num_rows($qrcoithi);?></span>
                      </div>
                      <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-cyan text-white rounded-circle shadow">
                          <i class="ni ni-check-bold"></i>
                        </div>
                      </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                        <a href="?menu=coithi"><span class="text-nowrap" style="">Xem chi tiết</span></a>
                        <span class="text-success mr-2"></span>
                    </p>
                  </div>
                </div>
              </div>
              <!-- <div class="col-xl-3 col-md-6">
                <div class="card card-stats">
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Quản lý nghiên cứu</h5>
                        <span class="h2 font-weight-bold mb-0"><?php echo mysqli_num_rows($qrnghiencuu);?></span>
                      </div>
                      <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                          <i class="ni ni-book-bookmark"></i>
                        </div>
                      </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                        <a href="?menu=nghiencuu"><span class="text-nowrap" style="">Xem chi tiết</span></a>
                        <span class="text-success mr-2"></span>
                    </p>
                  </div>
                </div>
              </div> -->
              <div class="col-xl-3 col-md-6">
                <div class="card card-stats">
                  <!-- Card body -->
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Quản lý dạy giỏi</h5>
                        <span class="h2 font-weight-bold mb-0"><?php echo mysqli_num_rows($qrdaygioi);?></span>
                      </div>
                      <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                          <i class="ni ni-active-40"></i>
                        </div>
                      </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                        <a href="?menu=daygioi"><span class="text-nowrap" style="">Xem chi tiết</span></a>
                        <span class="text-success mr-2"></span>
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-md-6">
                <div class="card card-stats">
                  <!-- Card body -->
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Hoạt Động Khác</h5>
                        <span class="h2 font-weight-bold mb-0"><?php echo mysqli_num_rows($qrngoihoidong);?></span>
                      </div>
                      <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                          <i class="ni ni-active-40"></i>
                        </div>
                      </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                        <a href="?menu=ngoihoidong"><span class="text-nowrap" style="">Xem chi tiết</span></a>
                        <span class="text-success mr-2"></span>
                    </p>
                  </div>
                </div>
              </div>
              <!-- Quản lý Luận Văn  -->
              <div class="col-xl-3 col-md-6">
                <div class="card card-stats">
                  <!-- Card body -->
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Quản Lý Luận Văn</h5>
                        <span class="h2 font-weight-bold mb-0"><?php echo mysqli_num_rows($qrluanvan);?></span>
                      </div>
                      <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                          <i class="ni ni-active-40"></i>
                        </div>
                      </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                        <a href="?menu=luanvan"><span class="text-nowrap" style="">Xem chi tiết</span></a>
                        <span class="text-success mr-2"></span>
                    </p>
                  </div>
                </div>
              </div>

              <!-- End Quản Lý Luận VĂn  -->
               <!-- Quản lý Luận Án -->
               <div class="col-xl-3 col-md-6">
                <div class="card card-stats">
                  <!-- Card body -->
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Quản Lý Luận Án</h5>
                        <span class="h2 font-weight-bold mb-0"><?php echo mysqli_num_rows($qrluanan);?></span>
                      </div>
                      <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                          <i class="ni ni-active-40"></i>
                        </div>
                      </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                        <a href="?menu=luanan"><span class="text-nowrap" style="">Xem chi tiết</span></a>
                        <span class="text-success mr-2"></span>
                    </p>
                  </div>
                </div>
              </div>

              <!-- End Quản Lý Luận Án  -->
               <!-- Quản lý Khóa Luận  -->
               <div class="col-xl-3 col-md-6">
                <div class="card card-stats">
                  <!-- Card body -->
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0"> Quản Lý Khóa Luận</h5>
                        <span class="h2 font-weight-bold mb-0"><?php echo mysqli_num_rows($qrkhoaluan);?></span>
                      </div>
                      <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                          <i class="ni ni-paper-diploma"></i>
                        </div>
                      </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                        <a href="?menu=khoaluan"><span class="text-nowrap" style="">Xem chi tiết</span></a>
                        <span class="text-success mr-2"></span>
                    </p>
                  </div>
                </div>
              </div>

              <!-- End Quản Lý Khóa Luận  -->
              <!-- Quản lý Nghiên Cứu  -->
              <!-- <div class="col-xl-3 col-md-6">
                <div class="card card-stats">
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Nghiên Cứu Khoa Học</h5>
                        <span class="h2 font-weight-bold mb-0"><?php echo mysqli_num_rows($qrnc);?></span>
                      </div>
                      <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
                          <i class="ni ni-single-copy-04"></i>
                        </div>
                      </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                        <a href="?menu=nghien-cuu"><span class="text-nowrap" style="">Xem chi tiết</span></a>
                        <span class="text-success mr-2"></span>
                    </p>
                  </div>
                </div>
              </div> -->

              <!-- End Quản Lý Khóa Luận  -->
              
                <!-- Thực Tập TN  -->
                <div class="col-xl-3 col-md-6">
                <div class="card card-stats">
                  <!-- Card body -->
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Thực Tập Tốt Nghiệp</h5>
                        <span class="h2 font-weight-bold mb-0"><?php echo mysqli_num_rows($qrthuctap);?></span>
                      </div>
                      <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                          <i class="ni ni-hat-3"></i>
                        </div>
                      </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                        <a href="?menu=thuctap"><span class="text-nowrap" style="">Xem chi tiết</span></a>
                        <span class="text-success mr-2"></span>
                    </p>
                  </div>
                </div>
              </div>

              <!-- End Thực Tập TN -->

             
              <!-- End Thực Tập TN -->
          </div>
        </div>
      </div>
    </div>
    
<!---------------------- END  ----------------------------------->

<?php } ?>
<script>
 	$(document).ready(function() {
 		$('a#bangdk').addClass('chon');
 		$('a#themsv').removeClass('chon');
 		$('a#quanlysv').removeClass('chon');
 		$('a#quanlykhoa').removeClass('chon');
 	});
 </script>
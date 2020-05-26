<?php
	$title = "Thời Khóa Biểu - ";
	session_start();
	error_reporting(0);
  $url = "http://localhost/hvan/";
  include_once('../config/config.php');
  if(isset($_GET["tkb"])){
    $idlop =  $_GET["tkb"];
    }
    $sql = "SELECT `thoi_khoa_bieu`, `ten_lop` FROM `lop_hoc` WHERE `id_lop` = '$idlop'";
    $qr = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($qr);
    $event = $row["thoi_khoa_bieu"];
    $lop = $row["ten_lop"];
 ?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <title><?php echo $title;?>Khoa Quản Lý Nhà Nước</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <!-- <link rel="stylesheet" href="<?php echo $url;?>css/reset.css"> -->
  <title>Trang chủ - Học Viện An ninh Nhân dân</title>
  <!-- Favicon -->
  <link rel="icon" href="<?php echo $url;?>assets/img/brand/logoC500.png" type="image/png">
  <!-- Icons -->
  <link rel="stylesheet" href="<?php echo $url;?>assets/css/calendar/fullcalendar.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo $url;?>assets/css/style.css" type="text/css">
  <?php  
  if($_SESSION["taikhoan"] == NULL){?>
    <script>
      window.location.href="tai-khoan/dang-nhap.php";
    </script>
  <?php } else{
 ?>
 
  <script src="<?php echo $url;?>assets/js/calendar/jquery.min.js"></script>
  <script src="<?php echo $url;?>assets/js/calendar/jquery-ui.min.js"></script>
  <script src="<?php echo $url;?>assets/js/calendar/moment.min.js"></script>
  <script src="<?php echo $url;?>assets/js/calendar/fullcalendar.min.js"></script>
  <script src="<?php echo $url;?>assets/js/calendar/locale-all.js"></script>

  <script>
   $(document).ready(function() {
    var idt = $('#idt').val();
    var calendar = $('#calendar').fullCalendar({
      locale: 'vi',
      lang: 'vi',
     editable:true,
     header:{
      left:'prev,next today',
      center:'title',
      right: '',
     },
     events: <?php echo $event;?>,
     selectable:true,
     selectHelper:true,
     //select để thêm thời khóa biểu
     select: function(start, end, allDay)
     {
      var title = prompt("Nhập Tên Ca Học (Không Dấu)");
      var id = prompt("Tiết Học Số Mấy:");
      
      if(title)
      {
       var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
       var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
       $.ajax({
        url:"insert.php",
        type:"POST",
        data:{idt:idt, id:id, title:title, start:start, end:end},
        success:function(data)
        {
         calendar.fullCalendar('refetchEvents');
         alert("Thêm Ca Học Thành Công");
         window.setTimeout(function(){window.location.href="";}, 10);
         
        }
       })
      }
     },
    
     eventClick:function(event)
     {
      if(confirm("Bạn có thực sự muốn xóa ca học này không ?"))
      {
       var id = event.id;
       $.ajax({
        url:"delete.php",
        type:"POST",
        data:{idt:idt,id:id},
        success:function(data)
        {
         calendar.fullCalendar('refetchEvents');
         alert("Ca Học Đã Được Xóa Thành Công!!");
         window.setTimeout(function(){window.location.href="";}, 10);

        
        }
       })
      }
     },
    });
   });
    
   </script>
  </head>
  <body class="thoi_khoa_bieu">
   <br />
   <h2 align="center">
   <span class="icon-tkb glyphicon glyphicon-calendar" aria-hidden="true"></span>
     <a href="#" class="thoi_khoa_bieu">
  
     THỜI KHÓA BIỂU LỚP<?php echo " "; echo $lop; ?></a></h2>
   <br />
   <div class="container">
      <div id="thongbao"></div>
      <div id="calendar"></div>
      <input type="text" id="idt" class="hidden" value="<?php echo $_GET["tkb"]; ?>">
   </div>
   </body>
</html> 
<?php } ?>
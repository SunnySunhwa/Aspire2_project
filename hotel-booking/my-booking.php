<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>Hotel Booking System</title>
<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<link href="assets/css/slick.css" rel="stylesheet">
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<link href="assets/css/font-awesome.min.css" rel="stylesheet">
<link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,700" rel="stylesheet">
</head>
<body>
        
<!--Header-->
<?php include('includes/header.php');?>
<!--Page Header-->
<!-- /Header --> 

<!--Page Header-->
<section class="page-header profile_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>My Booking</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="#">Home</a></li>
        <li>My Booking</li>
      </ul>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
<!-- /Page Header--> 


<section class="user_profile inner_pages">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-sm-3">
       <?php include('includes/sidebar.php');?>
   
      <div class="col-md-8 col-sm-8">
        <div class="profile_wrap">
          <h5 class="uppercase underline">My Booikngs </h5>
          <div class="my_vehicles_list">
            <ul class="vehicle_listing"><?php 
$useremail=$_SESSION['login'];
 $sql = "SELECT rooms.RoomImage1 as RoomImage1,rooms.RoomName,rooms.id as vid,floor.RoomFloor,booking.FromDate,booking.ToDate,booking.message,booking.Status  from booking join rooms on booking.RoomId=rooms.id join floor on floor.id=rooms.RoomFloor where booking.userEmail=:useremail";
$query = $dbh -> prepare($sql);
$query-> bindParam(':useremail', $useremail, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  ?>

<li class="gray-bg" style="padding:20px">
                <div class="vehicle_img"> <a href="room-details.php?vhid=<?php echo htmlentities($result->vid);?>"><img src="admin/img/rooms/<?php echo htmlentities($result->RoomImage1);?>" alt="image"></a> </div>
                <div class="vehicle_title">
                  <h6><a href="vehical-details.php?vhid=<?php echo htmlentities($result->vid);?>""> <?php echo htmlentities($result->RoomFloor);?> , <?php echo htmlentities($result->RoomName);?></a></h6>
                  <p><b>From</b> <?php echo htmlentities($result->FromDate);?><br /> <b>To</b> <?php echo htmlentities($result->ToDate);?></p>
                </div>
                <?php if($result->Status==1)
                { ?>
                <div class="vehicle_status"> <p href="#" class="btn btn-xs active-btn" style="background: green">Confirmed</>
                           <div class="clearfix"></div>
        </div>

              <?php } else if($result->Status==2) { ?>
 <div class="vehicle_status"> <p href="#" class="btn btn-xs">Cancelled</p>
            <div class="clearfix"></div>
        </div>
             


                <?php } else { ?>
 <div class="vehicle_status"> <p href="#" class="btn btn-xs" style="background: orange">Not Confirm yet</p>
            <div class="clearfix"></div>
        </div>
                <?php } ?>
       <div style="float: left; padding-top:43px"><p><b>Message</b><br><?php echo htmlentities($result->message);?> </p></div>
              </li>
              <?php }} ?>
             
         
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include('includes/footer.php');?>

<!-- Scripts --> 
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 
<!--bootstrap-slider-JS--> 
<script src="assets/js/bootstrap-slider.min.js"></script> 
<!--Slider-JS--> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>
</body>
</html>
<?php } ?>
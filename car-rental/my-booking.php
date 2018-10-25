<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0){	
  echo "<script type = \"text/javascript\">
						alert(\"Something went wrong \");
						window.location = (\"index.php\")
						</script>";
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
<title>Car Rental System</title>
<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<link href="assets/css/slick.css" rel="stylesheet">
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<link href="assets/css/font-awesome.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Exo+2" rel="stylesheet">
 <style>
    .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
    </style>
</head>
<body>

<!--Header-->
<?php include('includes/header.php');?>

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
            <ul class="vehicle_listing">

<?php 
$useremail=$_SESSION['login'];
 $sql = "SELECT VEHICLES.Vimage1 as Vimage1,VEHICLES.VehiclesTitle,VEHICLES.id as vid,BRANDS.BrandName,BOOKING.FromDate,BOOKING.ToDate,BOOKING.message,BOOKING.Status  from BOOKING join VEHICLES on BOOKING.VehicleId=VEHICLES.id join BRANDS on BRANDS.id=VEHICLES.VehiclesBrand where BOOKING.userEmail=:useremail";
$query = $dbh -> prepare($sql);
$query-> bindParam(':useremail', $useremail, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  ?>

<li class="gray-bg">
                <div class="vehicle_img"> <a href="vehical-details.php?vhid=<?php echo htmlentities($result->vid);?>"><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" alt="image"></a> </div>
                <div class="vehicle_title">
                  <h6><a href="vehical-details.php?vhid=<?php echo htmlentities($result->vid);?>""> <?php echo htmlentities($result->BrandName);?> , <?php echo htmlentities($result->VehiclesTitle);?></a></h6>
                  <p><b>From Date:</b> <?php echo htmlentities($result->FromDate);?><br /> <b>To Date:</b> <?php echo htmlentities($result->ToDate);?></p>
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
<!--/my-vehicles--> 


<!--Footer -->
<?php include('includes/footer.php');?>

<!--Back to top-->
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>

<!--Login-Form -->
<?php include('includes/login.php');?>
<!--Register-Form -->
<?php include('includes/registration.php');?>
<!--Forgot-password-Form -->
<?php include('includes/forgotpassword.php');?>

<!-- Scripts --> 
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 
<!--Google captcha-->
<script src='https://www.google.com/recaptcha/api.js'></script>
</body>

</html>
<?php } ?>
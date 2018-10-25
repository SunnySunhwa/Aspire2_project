<?php 
session_start();
include('includes/config.php');
error_reporting(0);

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
</head>
<body>


<!--Header-->
<?php include('includes/header.php');?>

<!-- Banners -->
<section id="banner" class="banner-section">
  <div class="container">
    <div class="div_zindex">
      <div class="row">
        <div class="col-md-5 col-md-push-7">
          <div class="banner_content">
            <h1>Your ideal car</h1>
            <p>We ask each of our customers to rate the company that provided their car. Check the scores - and make the right choice. </p>
            <a href="#" class="btn">Read More <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a> </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /Banners --> 


<section class="section-padding gray-bg">
  <div class="container">
    <div class="section-header text-center">
      <h2>New Zealand <span>Car Hire & Driving Holidays</span></h2>
      <p>If you’re travelling to New Zealand for the ultimate driving holiday, or a local looking for the best car hire deal, <br> Apex has the right vehicle at the best price for you. Apex offers a wide selection of rental vehicles including small economy cars,<br>mid-sized and full sized sedans, station wagons, 4WD’s and people movers that will be perfect for your holiday, sports team, or business needs.
      Experience car hire the Kiwi way and let Australasia’s largest home grown car rental company get you on the road to discovery, <br> with a friendly smile and local knowledge and tips to help you make the most of your journey. </p>
    </div>
    <div class="row"> 
  </div>
</section>

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
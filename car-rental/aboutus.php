<?php
session_start();
error_reporting(0);
include('includes/config.php');
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
<style type="text/css">
.section-header #team_intro {
  margin-top: 50px;
  max-width: 40%;
}

.section-header ul#team_intro li{
  font-size: 14px;
  list-style: none;
  margin: 0;
}
</style>
</head>
<body>

  <!--Header-->
  <?php include('includes/header.php');?>
  <section class="page-header aboutus_page">
    <div class="container">
      <div class="page-header_wrap">
        <div class="page-heading">
          <h1>About Us</h1>
        </div>
        <ul class="coustom-breadcrumb">
          <li>
            <a href="#">Home</a>
          </li>
          <li>About Us</li>
        </ul>
      </div>
    </div>
    <!-- Dark Overlay-->
    <div class="dark-overlay"></div>
  </section>
  <section class="about_us section-padding">
    <div class="container">
      <div class="section-header text-center">
        <h2>About us</h2>
        <p style="font-size: 14px; text-align: justify;">
        One of our top priorities is to adjust each package we offer to our customer’s exact needs. We offer a variety of options that can enhance your experience, always according to your necessities and help you get the best out of your holidays or your business trip.
        Our constant market research ensures the finest FINAL prices for your Cheap Car Hire in your desired destination. Since option prices and fees are included, with EconomyCarRentals there are never surprises at the desk!<br/> We know you're familiar with Budget Car Rental, one of the world's best-known car rental brands, but did you know that it is owned by Avis Budget Group, Inc.? This is the same company who owns other popular car rental brands, including Avis, a leader in innovation and mobility solutions. Avis Car Sales is the segment of the Avis brand where you can actually buy cars.

        Avis Car Sales offers customers a better way to purchase pre-owned vehicles. You can visit one of our retail locations, or you can select from thousands of vehicles available online. Each vehicle is competitively priced and passes a rigorous inspection by a certified mechanic.  There are multiple financing options available, and trade-ins are accepted.

        Best of all, you can feel confident that you are receiving the same value and service with Avis Car Sales that you've come to expect from the Budget brand.
        </p>
        <ul id="team_intro">
          <h4>Team Member</h4>
          <li><b>(1) Alex Alcaide</b> - YIB000011S</li>
          <li><b>(2) Ankit choudhary</b> - YIB00001XF</li>
          <li><b>(3) Sunhwa Kim</b> - YIB0000318</li>
        </ul>
      </div>
    </div>
  </section>
  <!-- /About-us-->



<!--Footer -->
<?php include('includes/footer.php');?>
<!-- /Footer--> 

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
<!--bootstrap-slider-JS--> 
<script src="assets/js/bootstrap-slider.min.js"></script> 
<!--Slider-JS--> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>

</body>

</html>
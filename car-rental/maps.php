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
<style>
  /* Always set the map height explicitly to define the size of the div
    * element that contains the map. */

  /* Optional: Makes the sample page fill the window. */
  html, body {
    height: 100%;
    margin: 0;
    padding: 0;
  }
  
</style>
</head>
        
<?php include('includes/header.php');?>

<!--Page Header-->
<section class="page-header contactus_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>Location</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="#">Home</a></li>
        <li>Location</li>
      </ul>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
<!-- /Page Header--> 

<!--Google Map-->
<div id="map" style="height:100%;"></div>
<script src="./googlemap.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDYZnUY4ENtpMktD3G5qtFvWM3E-oTURpo&callback=initMap&callback=initMap"
    async defer></script>

<?php include('includes/footer.php');?>
<!--Back to top-->
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
<!--/Back to top--> 

<?php include('includes/login.php');?>
<?php include('includes/registration.php');?>
<?php include('includes/forgotpassword.php');?>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 
<!--Google captcha-->
<script src='https://www.google.com/recaptcha/api.js'></script>
</body>
</html>
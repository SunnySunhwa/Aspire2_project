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
<title>Hotel Booking System</title>
<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<link href="assets/css/slick.css" rel="stylesheet">
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<link href="assets/css/font-awesome.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,700" rel="stylesheet">
</head>
<body>

        
<!--Header-->
<?php include('includes/header.php');?>
<!-- /Header --> 

<!-- Banners -->
<section id="banner" class="banner-section">
  <div class="container">
    <div class="div_zindex">
      <div class="row">
        <div class="col-md-5 col-md-push-7">
          <div class="banner_content">
            <h1>Welcome</h1>
            <p>service and engaging experiences. Meticulously tailored to your way of life, we are devoted to making your stay just right.</p>
            <a href="./aboutus.php" class="btn">Read More <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a> </div>
        </div>
      </div>
    </div>
  </div>
  <div class="dark-overlay2"></div>
</section>
<!-- /Banners --> 

<section class="section-padding gray-bg">
  <div class="container">
    <div class="section-header text-center">
      <h2>STIMULATING <span>THE SENSES</span></h2>
      <p>Driven to inspire and innovate, Cordis Auckland offers you a warm welcome, heartfelt service and stylish, contemporary facilities. Stay in touch with our state-of-the-art broadband or step out to experience the best of vibrant Auckland. Aspire2 Hotel, Auckland by Langham Hospitality Group is for guests on the go, who appreciate heartfelt service and engaging experiences. Meticulously tailored to your way of life, we are devoted to making your stay just right. At the heart of Auckland’s lively uptown area, Auckland by Langham Hospitality Group puts the city’s fashionable boutiques, galleries and museums within easy reach, so you can make the most of your day. Whether you’re travelling for work, family or leisure, a stay at Cordis, Auckland by Langham Hospitality Group lets you embrace your Auckland adventure in style. </p>
    </div>
    <div class="row"> 
  </div>
</section>

<!--Footer -->
<?php include('includes/footer.php');?>
  <!-- /Footer-->

  <!--Back to top-->
  <div id="back-top" class="back-top">
    <a href="#top">
      <i class="fa fa-angle-up" aria-hidden="true"></i>
    </a>
  </div>
  <!--/Back to top-->

  <?php include('includes/login.php');?>
  <?php include('includes/registration.php');?>
  <?php include('includes/forgotpassword.php');?>

  <!-- Scripts -->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/interface.js"></script>
  <script src="assets/js/bootstrap-slider.min.js"></script>
  <script src="assets/js/slick.min.js"></script>
  <script src="assets/js/owl.carousel.min.js"></script>
</body>

</html>
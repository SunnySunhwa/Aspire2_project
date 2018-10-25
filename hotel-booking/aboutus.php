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
          Hotel room booking system is a software solution project that will address the hotel industry problems using an old system
          or a manual system of booking rooms. Specifically, this will be about the creation of a website where customers
          can make or cancel room reservations online and also for a hotel administrator electronically update hotel-related
          information. The project will focus on three phases. First is project requirements which includes developing documentation
          and second is architecture design of the website will be developed to describe the product and third is implementation
          and testing of the system. Moreover, our project will detail all the three phases as mentioned above and estimate
          time for the deliverables. The duration of this project is assumed to be 10 weeks as specified in the Gantt chart.
          The approach to be used is the Scrum methodology. Using this method, the team consists of only three members.
        </p>
        <ul id="team_intro">
          <h4>Team Member</h4>
          <li><b>(1) Alex Alcaide</b> - YIB000011S</li>
          <li><b>(2) Ramandeep Kaur</b> - YIB00002YF</li>
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
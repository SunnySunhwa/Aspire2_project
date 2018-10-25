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
<style type = "text/css">
.ellipsis{
  max-width: 400px;
	padding: 20px 0 10px 0;
	overflow: hidden;
}
</style>
</head>
<body>

<!--Header--> 
<?php include('includes/header.php');?>
<!-- /Header --> 

<!--Page Header-->
<section class="page-header listing_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>Searching List</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="#">Home</a></li>
        <li>Searching List</li>
      </ul>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
<!-- /Page Header--> 

<!--Listing-->
<section class="listing-page">
  <div class="container">
    <div class="row">
      <div class="col-md-9 col-md-push-3">
        <div class="result-sorting-wrapper">
          <div class="sorting-count">
<?php 
//Query for Listing count
$suitable=$_POST['suitable'];
$roomtype=$_POST['roomtype'];
$sql = "SELECT * from rooms where rooms.Suitable=:suitable and rooms.RoomType=:roomtype";
$query = $dbh -> prepare($sql);
$query -> bindParam(':suitable',$suitable, PDO::PARAM_STR);
$query -> bindParam(':roomtype',$roomtype, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=$query->rowCount();
?>
<p><span><?php echo htmlentities($cnt);?> Listings</span></p>
</div>
</div>

<?php 
$sql = "SELECT * from rooms where rooms.Suitable=
:suitable and rooms.RoomType=:roomtype";
$query = $dbh -> prepare($sql);
$query -> bindParam(':suitable',$suitable, PDO::PARAM_STR);
$query -> bindParam(':roomtype',$roomtype, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  ?>
        <div class="product-listing-m gray-bg">
          <div class="product-listing-img"><img src="admin/img/rooms/<?php echo htmlentities($result->RoomImage1);?>" class="img-responsive" alt="Image" /> </a> 
          </div>
          <div class="product-listing-content">
            <h5><a href="room-details.php?vhid=<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->RoomFloor);?> , <?php echo htmlentities($result->RoomName);?></a></h5>
            <p class="list-price">$<?php echo htmlentities($result->PricePerDay);?> Per Day</p>
            <ul>
              <li><i class="fa fa-user" aria-hidden="true"></i><?php echo htmlentities($result->Suitable);?> person</li>
              <li><i class="fa fa-hotel" aria-hidden="true"></i><?php echo htmlentities($result->RoomType);?></li>
            </ul>
            <div id="room-overview" class="ellipsis"><?php echo htmlentities($result->RoomOverview);?></div>
            <a href="room-details.php?vhid=<?php echo htmlentities($result->id);?>" class="btn">View Details <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
          </div>
        </div>
      <?php }} ?>
         </div>
      
       
       <!--Side-Bar-->
       <aside class="col-md-3 col-md-pull-9">
        <div class="sidebar_widget">
          <div class="widget_heading">
            <h5><i class="fa fa-filter" aria-hidden="true"></i> Find Your Room </h5>
          </div>
          <div class="sidebar_filter">
            <form action="search-result.php" method="post">
              <div class="form-group select">
                <select class="form-control">
                  <option>Suitable for</option>
<option value="Single"> Signle</option>
<option value="Couple"> Couple</option>
<option value="Family"> Family</option>
                </select>
              </div>
              <div class="form-group select">
                <select class="form-control">
                  <option>Select Room Type</option>
<option value="Standard">Standard</option>
<option value="Superior">Superior</option>
<option value="Delux">Delux</option>
<option value="Suite">Suite</option>
                </select>
              </div>
             
              <div class="form-group">
                <button type="submit" class="btn btn-block"><i class="fa fa-search" aria-hidden="true"></i> Search Room</button>
              </div>
            </form>
          </div>
        </div>
      </aside>
      <!--/Side-Bar--> 
    </div>
  </div>
</section>
<!-- /Listing--> 
<?php include('includes/footer.php');?>
<!--Back to top-->
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
<!--/Back to top--> 

<?php include('includes/login.php');?>
<?php include('includes/registration.php');?>
<?php include('includes/forgotpassword.php');?>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.dotdotdot.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
	$(".ellipsis").dotdotdot({
		height: 70,
		fallbackToLetter: true,
		watch: true,
	});
});
</script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 
<!--bootstrap-slider-JS--> 
<script src="assets/js/bootstrap-slider.min.js"></script> 
<!--Slider-JS--> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>

</body>
</html>

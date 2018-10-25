<?php 
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0){	
   echo "<script type = \"text/javascript\">
						alert(\"Something went wrong \");
						window.location = (\"index.php\")
						</script>";
}
else{ 
  if(isset($_POST['submit'])){
    $fromdate=$_POST['fromdate'];
    $todate=$_POST['todate']; 
    $message=$_POST['message'];
    $useremail=$_SESSION['login'];
    $status=0;
    $vhid=$_GET['vhid'];
    $sql="INSERT INTO  BOOKING(userEmail,VehicleId,FromDate,ToDate,message,Status) VALUES(:useremail,:vhid,:fromdate,:todate,:message,:status)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':useremail',$useremail,PDO::PARAM_STR);
    $query->bindParam(':vhid',$vhid,PDO::PARAM_STR);
    $query->bindParam(':fromdate',$fromdate,PDO::PARAM_STR);
    $query->bindParam(':todate',$todate,PDO::PARAM_STR);
    $query->bindParam(':message',$message,PDO::PARAM_STR);
    $query->bindParam(':status',$status,PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();

    if($lastInsertId){
    echo "<script>alert('Booking successfull.');</script>";
    } else {
    echo "<script>alert('Something went wrong. Please try again');</script>";
    }
  }
}

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

<!--Listing-Image-Slider-->

<?php 
$vhid=intval($_GET['vhid']);
$sql = "SELECT VEHICLES.*,BRANDS.BrandName,BRANDS.id as bid  from VEHICLES join BRANDS on BRANDS.id=VEHICLES.VehiclesBrand where VEHICLES.id=:vhid";
$query = $dbh -> prepare($sql);
$query->bindParam(':vhid',$vhid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  
$_SESSION['brndid']=$result->bid;  
?>  

<section id="listing_img_slider">
  <div><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" class="img-responsive" alt="image" width="900" height="560"></div>
  <div><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage2);?>" class="img-responsive" alt="image" width="900" height="560"></div>
  <div><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage3);?>" class="img-responsive" alt="image" width="900" height="560"></div>
  <div><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage4);?>" class="img-responsive"  alt="image" width="900" height="560"></div>
  <?php if($result->Vimage5=="")
{

} else {
  ?>
  <div><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage5);?>" class="img-responsive" alt="image" width="900" height="560"></div>
  <?php } ?>
</section>
<!--/Listing-Image-Slider-->


<!--Listing-detail-->
<section class="listing-detail">
  <div class="container">
    <div class="listing_detail_head row">
      <div class="col-md-9">
        <h3><?php echo htmlentities($result->VehiclesTitle);?></h3>
        <h5><?php echo htmlentities($result->BrandName);?></h5>
      </div>
      <div class="col-md-3">
        <div class="price_info">
          <p>$<?php echo htmlentities($result->PricePerDay);?> </p>Per Day
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-9">
        <div class="listing_more_info">
          <div class="listing_detail_wrap"> 
            <!-- Nav tabs -->
            <ul class="nav nav-tabs gray-bg" role="tablist">
              <li role="presentation" class="active"><a href="#vehicle-overview " aria-controls="vehicle-overview" role="tab" data-toggle="tab">Vehicle Overview </a></li>
          
              <li role="presentation"><a href="#accessories" aria-controls="accessories" role="tab" data-toggle="tab">Accessories</a></li>
            </ul>
            
            <!-- Tab panes -->
            <div class="tab-content"> 
              <!-- vehicle-overview -->
              <div role="tabpanel" class="tab-pane active" id="vehicle-overview">
                <div class="main_features">
                  <ul>
                    <li> <i class="fa fa-calendar" aria-hidden="true"></i>
                      <h5><?php echo htmlentities($result->ModelYear);?></h5>
                      <p>Reg.Year</p>
                    </li>
                    <li> <i class="fa fa-cogs" aria-hidden="true"></i>
                      <h5><?php echo htmlentities($result->FuelType);?></h5>
                      <p>Fuel Type</p>
                    </li>
                    <li> <i class="fa fa-user-plus" aria-hidden="true"></i>
                      <h5><?php echo htmlentities($result->SeatingCapacity);?></h5>
                      <p>Seats</p>
                    </li>
                  </ul>
                </div>
                <p><?php echo htmlentities($result->VehiclesOverview);?></p>
              </div>
              
              
              <!-- Accessories -->
              <div role="tabpanel" class="tab-pane" id="accessories"> 
                <!--Accessories-->
                <table>
                  <thead>
                    <tr>
                      <th colspan="2">Accessories</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Air Conditioner</td>
                      <?php if($result->AirConditioner==1)
                      {
                      ?>
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                    <?php } else { ?> 
                      <td><i class="fa fa-close" aria-hidden="true"></i></td>
                      <?php } ?> </tr>

                    <tr>
                    <td>AntiLock Braking System</td>
                    <?php if($result->AntiLockBrakingSystem==1)
                    {
                    ?>
                    <td><i class="fa fa-check" aria-hidden="true"></i></td>
                    <?php } else {?>
                    <td><i class="fa fa-close" aria-hidden="true"></i></td>
                    <?php } ?></tr>

                    <tr>
                    <td>Power Steering</td>
                    <?php if($result->PowerSteering==1)
                    {
                    ?>
                    <td><i class="fa fa-check" aria-hidden="true"></i></td>
                    <?php } else { ?>
                    <td><i class="fa fa-close" aria-hidden="true"></i></td>
                    <?php } ?>
                    </tr>
                   
                    <tr>
                    <td>Power Door Locks</td>
                    <?php if($result->PowerDoorLocks==1)
                    {
                    ?>
                    <td><i class="fa fa-check" aria-hidden="true"></i></td>
                    <?php } else { ?>
                    <td><i class="fa fa-close" aria-hidden="true"></i></td>
                    <?php } ?>
                    </tr>
                    <tr>
                    <td>Brake Assist</td>
                    <?php if($result->BrakeAssist==1)
                    {
                    ?>
                    <td><i class="fa fa-check" aria-hidden="true"></i></td>
                    <?php  } else { ?>
                    <td><i class="fa fa-close" aria-hidden="true"></i></td>
                    <?php } ?>
                    </tr>

                    <tr>
                    <td>Driver Airbag</td>
                    <?php if($result->DriverAirbag==1)
                    {
                    ?>
                    <td><i class="fa fa-check" aria-hidden="true"></i></td>
                    <?php } else { ?>
                    <td><i class="fa fa-close" aria-hidden="true"></i></td>
                    <?php } ?>
                    </tr>
                    
                    <tr>
                    <td>Passenger Airbag</td>
                    <?php if($result->PassengerAirbag==1)
                    {
                    ?>
                    <td><i class="fa fa-check" aria-hidden="true"></i></td>
                    <?php } else {?>
                    <td><i class="fa fa-close" aria-hidden="true"></i></td>
                    <?php } ?>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          
        </div>
<?php }} ?>
   
      </div>
      
      <!--Side-Bar-->
      <aside class="col-md-3">
        <div class="sidebar_widget">
          <div class="widget_heading">
            <h5><i class="fa fa-envelope" aria-hidden="true"></i>Book Now</h5>
          </div>
          <form method="post">
            <div class="form-group">
              <input type="text" class="form-control" name="fromdate" placeholder="From Date(dd/mm/yyyy)" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="todate" placeholder="To Date(dd/mm/yyyy)" required>
            </div>
            <div class="form-group">
              <textarea rows="4" class="form-control" name="message" placeholder="Message" required></textarea>
            </div>
          <?php if($_SESSION['login'])
              {?>
              <div class="form-group">
                <input type="submit" class="btn"  name="submit" value="Book Now">
              </div>
              <?php } else { ?>
<a href="#loginform" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Login For Book</a>

              <?php } ?>
          </form>
        </div>
      </aside>
      <!--/Side-Bar--> 
    </div>
    
    <div class="space-20"></div>
    
  </div>
</section>
<!--/Listing-detail--> 

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
		height: 50,
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
<!--Google captcha-->
<script src='https://www.google.com/recaptcha/api.js'></script>

</body>
</html>
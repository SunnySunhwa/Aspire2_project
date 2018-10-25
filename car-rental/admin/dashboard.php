<?php
session_start();
error_reporting(0);
include 'includes/config.php';
if(strlen($_SESSION['alogin'])==0){	
  header('location:index.php');
  echo "<script>alert('Invalid Details. Check your account');</script>";
} else{
    
  if(isset($_GET['del']))
  {
    $id=$_GET['del'];
    $query = "DELETE from USERS WHERE id=$id";

    $rs = $conn->query($query);
    $num = $rs->num_rows;
    $rows = $rs->fetch_assoc();

    $msg="Page data updated  successfully";
  }

?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Car Rental System | Admin</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
</head>

<body>
<?php include('includes/header.php');?>

	<div class="ts-main-content">
	<?php include('includes/auth_check.php');?>


		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
						<h2 class="page-title">Dashboard</h2>
						<div class="row">
							<div class="col-md-12">
								<div class="row">


									<!-- each card section -->
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-primary text-light">
												<div class="stat-panel text-center">
													<?php 
													include 'includes/config.php';
													$sel1 ="SELECT id from USERS ";
													$rs1 = $conn->query($sel1);
													$total_users = $rs1->num_rows;
													?>
													<div class="stat-panel-number h1 ">
													<?php echo $total_users;?></div>
													<div class="stat-panel-title text-uppercase">Registered Users</div>
												</div>
											</div>
											<?php
						 						if($_SESSION['level']==1){
												?>
												<a href="#" class="block-anchor panel-footer text-center">
												<i class="fa fa-close"></i> You don't have authority <i class="fa fa-close"></i></a>
											<?php
												} else{
											?>
											<a href="manage-user.php" class="block-anchor panel-footer text-center">Full Detail <i class="fa fa-arrow-right"></i></a>
											<?php
												}
											?>
										</div>
									</div><!-- // each card-->


									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-success text-light">
												<div class="stat-panel text-center">
												<?php 
													include 'includes/config.php';
													$sel2 ="SELECT id from VEHICLES ";
													$rs2 = $conn->query($sel2);
													$total_cars = $rs2->num_rows;
												?>
													<div class="stat-panel-number h1 ">
													<?php echo $total_cars;?></div>
													<div class="stat-panel-title text-uppercase">Listed Vehicles</div>
												</div>
											</div>
											<a href="manage-vehicles.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>


									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-info text-light">
												<div class="stat-panel text-center">
												<?php 
													include 'includes/config.php';
													$sel3 ="SELECT id from BOOKING ";
													$rs3 = $conn->query($sel3);
													$total_booking = $rs3->num_rows;
												?>
													<div class="stat-panel-number h1 ">
													<?php echo $total_booking;?></div>
													<div class="stat-panel-title text-uppercase">Total Bookings</div>
												</div>
											</div>
											<a href="manage-bookings.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>


									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-warning text-light">
												<div class="stat-panel text-center">
												<?php 
													include 'includes/config.php';
													$sel4 ="SELECT id from BRANDS ";
													$rs4 = $conn->query($sel4);
													$total_brands = $rs4->num_rows;
												?>												
													<div class="stat-panel-number h1 ">
													<?php echo $total_brands;?></div>
													<div class="stat-panel-title text-uppercase">Listed Brands</div>
												</div>
											</div>
											<a href="manage-brands.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>


								</div>
							</div>

							<div class="col-md-12" style="margin-top:30px;">
							<h2 class="page-title">Reports</h2>
							<h5>Number of bookings per User</h5>
							<div id="myDiv"></div>
							</div>
						</div>
					</div>
				</div>



							</div>
						</div>
					</div>
				</div>









			</div>
		</div>
	</div>
	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
	
	<script>
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "reporthandler.php", true);

        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        reportData = JSON.parse(this.responseText);
        
        var usernames= reportData.username;
        var requests= reportData.request;

        var data=
        [{
            x:usernames,
            y: requests,
            type: 'bar'
        }
        ];

        Plotly.newPlot('myDiv', data);
        }
        };
        
        xmlhttp.send();
        </script>
</body>
</html>
<?php } ?>
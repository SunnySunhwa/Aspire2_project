<?php
session_start();
error_reporting(0);
include 'includes/config.php';
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
} else{
if(isset($_REQUEST['eid']))
	{
$eid=intval($_GET['eid']);
$status="2";
$sql1 = "UPDATE BOOKING SET Status='$status' WHERE  id='$eid'";
$result1 = $conn->query($sql1);
$msg="Booking Successfully Cancelled";
}


if(isset($_REQUEST['aeid']))
	{
$aeid=intval($_GET['aeid']);
$status=1;
$sql2 = "UPDATE BOOKING SET Status='$status' WHERE  id='$aeid'";
$result2 = $conn->query($sql2);
$msg="Booking Successfully Confirmed";
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
</head>

<body>
	<?php include('includes/header.php');?>

	<div class="ts-main-content">
		<?php include('includes/auth_check.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Manage Bookings</h2>

						<div class="panel panel-default">
							<div class="panel-heading">Bookings Info</div>
							<div class="panel-body">
							<?php if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo $msg; ?> </div><?php }
				else if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo $error; ?> </div><?php } ?>
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>#</th>
											<th>Name</th>
											<th>Vehicle</th>
											<th>From Date</th>
											<th>To Date</th>
											<th>Message</th>
											<th>Status</th>
											<th>Posting date</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
						<?php
							$sql = "SELECT USERS.FullName,BRANDS.BrandName,VEHICLES.VehiclesTitle,BOOKING.FromDate,BOOKING.ToDate,BOOKING.message,BOOKING.VehicleId as vid,BOOKING.Status,BOOKING.PostingDate,BOOKING.id  from BOOKING join VEHICLES on VEHICLES.id=BOOKING.VehicleId join USERS on USERS.EmailId=BOOKING.userEmail join BRANDS on VEHICLES.VehiclesBrand=BRANDS.id  ";
							$rs = $conn -> query($sql);
							$cnt=1;
							while($rws = $rs->fetch_assoc()){
								?>	
								<tr>
									<td><?php echo $cnt;?></td>
									<td><?php echo $rws['FullName'];?></td>
									<td><a href="edit-vehicle.php?id=<?php echo $rws['vid'];?>">[<?php echo $rws['BrandName'];?>] <?php echo $rws['VehiclesTitle'];?></td>
									<td><?php echo $rws['FromDate'];?></td>
									<td><?php echo $rws['ToDate'];?></td>
									<td><?php echo $rws['message'];?></td>
									<td><?php 
								if($rws['Status']==0)
								{
								echo htmlentities('Not Confirmed yet');
								} else if ($rws['Status']==1) {
								echo htmlentities('Confirmed');
								}
								else{
									echo htmlentities('Cancelled');
								}
								?></td>
									<td><?php echo $rws['PostingDate'];?></td>
									<td>
										<a class="btn-green" href="manage-bookings.php?aeid=<?php echo $rws['id'];?>" onclick="return confirm('Do you really want to Confirm this booking')"> Confirm</a> 
										<a class="btn-red" href="manage-bookings.php?eid=<?php echo $rws['id'];?>" onclick="return confirm('Do you really want to Cancel this Booking')"> Cancel</a>
									</td>
								</tr>
								<?php $cnt=$cnt+1; }} ?>
							</tbody>
						</table>
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
	<script src="js/fileinput.js"></script>
	<script src="js/main.js"></script>
</body>
</html>

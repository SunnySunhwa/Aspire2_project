<?php
session_start();
error_reporting(0);
include 'includes/config.php';
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{ 

if(isset($_POST['submit'])){
	$vehicletitle=$_POST['vehicletitle'];
	$brand=$_POST['brandname'];
	$vehicleoverview=$_POST['vehicalorcview'];
	$priceperday=$_POST['priceperday'];
	$fueltype=$_POST['fueltype'];
	$modelyear=$_POST['modelyear'];
	$seatingcapacity=$_POST['seatingcapacity'];
	$vimage1=$_FILES["img1"]["name"];
	$vimage2=$_FILES["img2"]["name"];
	$vimage3=$_FILES["img3"]["name"];
	$vimage4=$_FILES["img4"]["name"];
	$vimage5=$_FILES["img5"]["name"];
	$airconditioner=$_POST['airconditioner'];
	$powerdoorlocks=$_POST['powerdoorlocks'];
	$antilockbrakingsys=$_POST['antilockbrakingsys'];
	$brakeassist=$_POST['brakeassist'];
	$powersteering=$_POST['powersteering'];
	$driverairbag=$_POST['driverairbag'];
	$passengerairbag=$_POST['passengerairbag'];
	$powerwindow=$_POST['powerwindow'];
	$cdplayer=$_POST['cdplayer'];
	$centrallocking=$_POST['centrallocking'];
	$crashcensor=$_POST['crashcensor'];
	$leatherseats=$_POST['leatherseats'];
	move_uploaded_file($_FILES["img1"]["tmp_name"],"img/vehicleimages/".$vehicletitle.$_FILES["img1"]["name"]);
	move_uploaded_file($_FILES["img2"]["tmp_name"],"img/vehicleimages/".$vehicletitle.$_FILES["img2"]["name"]);
	move_uploaded_file($_FILES["img3"]["tmp_name"],"img/vehicleimages/".$vehicletitle.$_FILES["img3"]["name"]);
	move_uploaded_file($_FILES["img4"]["tmp_name"],"img/vehicleimages/".$vehicletitle.$_FILES["img4"]["name"]);
	move_uploaded_file($_FILES["img5"]["tmp_name"],"img/vehicleimages/".$vehicletitle.$_FILES["img5"]["name"]);

$sql="INSERT INTO VEHICLES (id, VehiclesTitle,VehiclesBrand, VehiclesOverview, PricePerDay,FuelType, ModelYear, SeatingCapacity, Vimage1,Vimage2, Vimage3, Vimage4, Vimage5, AirConditioner,PowerDoorLocks, AntiLockBrakingSystem, BrakeAssist, PowerSteering, DriverAirbag, PassengerAirbag) VALUES(LAST_INSERT_ID(), '$vehicletitle','$brand', '$vehicleoverview','$priceperday', '$fueltype', '$modelyear','$seatingcapacity','$vimage1', '$vimage2', '$vimage3', '$vimage4', '$vimage5', '$airconditioner', '$powerdoorlocks','$antilockbrakingsys', '$brakeassist', '$powersteering', '$driverairbag', '$passengerairbag')";
	$rs = $conn->query($sql);
	$num = $rs->num_rows;
	$msg="Vehicle Created successfully";
		if($num = 0){
			$error="Something went wrong. Please try again";
		} 
	}
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
					
						<h2 class="page-title">Add Vehicle</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Basic Info</div>
									<?php if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo $msg; ?> </div><?php }
				else if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo $error; ?> </div><?php } ?>

									<div class="panel-body">
<form method="post" class="form-horizontal" enctype="multipart/form-data">

	<div class="form-group">
		<label class="col-sm-2 control-label">Vehicle Title<span style="color:red">*</span></label>
		<div class="col-sm-4">
			<input type="text" name="vehicletitle" class="form-control" required>
		</div>

		
		<label class="col-sm-2 control-label">Select Brand<span style="color:red">*</span></label>
		<div class="col-sm-4">
		<select class="selectpicker" name="brandname" required>
			<option value=""> Select </option>
			<?php
			$ret="SELECT id, BrandName from BRANDS";
			$rs = $conn->query($ret);
			while($rws = $rs->fetch_assoc()){
			?>
			<option value="<?php echo $rws['id'];?>"><?php echo $rws['BrandName'];?></option>
			<?php } ?>

		</select>
		</div>
	</div>
											
<div class="hr-dashed"></div>


<div class="form-group">
	<label class="col-sm-2 control-label">Vehical Overview<span style="color:red">*</span></label>
	<div class="col-sm-10">
	<textarea class="form-control" name="vehicalorcview" rows="3" required></textarea>
	</div>
</div>




<div class="form-group">
	<label class="col-sm-2 control-label">Price Per Day<span style="color:red">*</span></label>
	<div class="col-sm-4">
		<input type="text" name="priceperday" class="form-control" required>
	</div>

	<label class="col-sm-2 control-label">Select Fuel Type<span style="color:red">*</span></label>
	<div class="col-sm-4">
		<select class="selectpicker" name="fueltype" required>
			<option value=""> Select </option>
			<option value="Petrol">Petrol</option>
			<option value="Diesel">Diesel</option>
			<option value="CNG">CNG</option>
		</select>
	</div>
</div>


<div class="form-group">
	<label class="col-sm-2 control-label">Model Year<span style="color:red">*</span></label>
	<div class="col-sm-4">
		<input type="text" name="modelyear" class="form-control" required>
	</div>


	<label class="col-sm-2 control-label">Seating Capacity<span style="color:red">*</span></label>
	<div class="col-sm-4">
		<input type="text" name="seatingcapacity" class="form-control" required>
	</div>
</div>

<div class="hr-dashed"></div>


<div class="form-group">
	<div class="col-sm-12">
		<h4><b>Upload Images</b></h4>
	</div>
</div>


<div class="form-group">
	<div class="col-sm-4">
		IMG 1<span style="color:red">*</span><input type="file" name="img1" required>
	</div>
	<div class="col-sm-4">
		IMG 2<span style="color:red">*</span><input type="file" name="img2" required>
	</div>
	<div class="col-sm-4">
		IMG 3<span style="color:red">*</span><input type="file" name="img3" required>
	</div>
</div>

<div class="hr-dashed"></div>		
<div class="form-group">
	<div class="col-sm-4">
		IMG 4<span style="color:red">*</span><input type="file" name="img4" required>
	</div>
	<div class="col-sm-4">
		IMG 5<input type="file" name="img5">
	</div>
</div>

<div class="hr-dashed"></div>									
</div>
</div>
</div>
</div>
							

<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading">Accessories</div>
<div class="panel-body">


<div class="form-group">
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="airconditioner" name="airconditioner" value="1">
<label for="airconditioner"> Air Conditioner </label>
</div>
</div>
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="powerdoorlocks" name="powerdoorlocks" value="1">
<label for="powerdoorlocks"> Power Door Locks </label>
</div></div>
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="antilockbrakingsys" name="antilockbrakingsys" value="1">
<label for="antilockbrakingsys"> AntiLock Braking System </label>
</div></div>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="brakeassist" name="brakeassist" value="1">
<label for="brakeassist"> Brake Assist </label>
</div>
</div>



<div class="form-group">
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="powersteering" name="powersteering" value="1">
<input type="checkbox" id="powersteering" name="powersteering" value="1">
<label for="inlineCheckbox5"> Power Steering </label>
</div>
</div>
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="driverairbag" name="driverairbag" value="1">
<label for="driverairbag">Driver Airbag</label>
</div>
</div>
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="passengerairbag" name="passengerairbag" value="1">
<label for="passengerairbag"> Passenger Airbag </label>
</div></div>
</div>






									</div>
								</div>
							</div>
						</div>
																<div class="col-sm-12 text-center">
																	<button class="btn-submit" style="background:#555" type="reset">Cancel</button>
																	<button class="btn-submit" name="submit" type="submit">Save changes</button>
																</div>
				
														</form>
						
					

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
</body>
</html>
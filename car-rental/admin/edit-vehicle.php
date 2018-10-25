<?php
session_start();
error_reporting(0);
include 'includes/config.php';
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{ 

if(isset($_POST['submit']))
  {
$vehicletitle=$_POST['vehicletitle'];
$brand=$_POST['brandname'];
$vehicleoverview=$_POST['vehicalorcview'];
$priceperday=$_POST['priceperday'];
$fueltype=$_POST['fueltype'];
$modelyear=$_POST['modelyear'];
$seatingcapacity=$_POST['seatingcapacity'];
$airconditioner=$_POST['airconditioner'];
$powerdoorlocks=$_POST['powerdoorlocks'];
$antilockbrakingsys=$_POST['antilockbrakingsys'];
$brakeassist=$_POST['brakeassist'];
$powersteering=$_POST['powersteering'];
$driverairbag=$_POST['driverairbag'];
$passengerairbag=$_POST['passengerairbag'];
$id=intval($_GET['id']);

$query="UPDATE VEHICLES set VehiclesTitle='$vehicletitle',VehiclesBrand='$brand', VehiclesOverview='$vehicleoverview',PricePerDay='$priceperday', FuelType='$fueltype',ModelYear='$modelyear', SeatingCapacity='$seatingcapacity',AirConditioner='$airconditioner', PowerDoorLocks='$powerdoorlocks', AntiLockBrakingSystem='$antilockbrakingsys', BrakeAssist='$brakeassist', PowerSteering='$powersteering', DriverAirbag='$driverairbag', PassengerAirbag='$passengerairbag' where id='$id'";
$rs = $conn->query($query);
$num = $rs->num_rows;
	if($num = 0){
		$error="Something went wrong. Please try again";
	} 
	$msg="Vehicle Updated successfully";
	}
}
?>


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
	<style>

		</style>
</head>

<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include 'includes/auth_check.php';?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Edit Vehicle</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Basic Info</div>
									<div class="panel-body">

									<?php if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo $msg; ?> </div><?php }
				else if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo $error; ?> </div><?php } ?>

<?php 
$id=intval($_GET['id']);
$sel ="SELECT VEHICLES.*, BRANDS.BrandName,BRANDS.id as bid from VEHICLES join BRANDS on BRANDS.id=VEHICLES.VehiclesBrand where VEHICLES.id=$id";
$res = $conn->query($sel);
while($rws = $res->fetch_assoc()){
?>

<form method="post" class="form-horizontal" enctype="multipart/form-data">

	<div class="form-group">
		<label class="col-sm-2 control-label">Vehicle Title<span style="color:red">*</span></label>
			<div class="col-sm-4">
				<input type="text" name="vehicletitle" class="form-control" value="<?php echo $rws['VehiclesTitle']?>" required>
			</div>


		<label class="col-sm-2 control-label">Select Brand<span style="color:red">*</span></label>
		<div class="col-sm-4">
			<select class="selectpicker" name="brandname" required>
				<option value="<?php echo $rws['bid'];?>"><?php echo $bdname=$rws['BrandName']; ?></option>

			<?php
			$ret="SELECT id, BrandName from BRANDS";
			$result= $conn->query($ret);
			while($rows = $result->fetch_assoc()){
			if($rows['BrandName']==$bdname)
			{
			continue;
			} else{
			?>
			<option value="<?php echo $rows['id'];?>"><?php echo $rows['BrandName'];?></option>
			<?php }} ?>

			</select>
		</div>
	</div>
											
	<div class="hr-dashed"></div>
	
	<div class="form-group">
		<label class="col-sm-2 control-label">Vehical Overview<span style="color:red">*</span></label>
		<div class="col-sm-10">
		<textarea class="form-control" name="vehicalorcview" rows="3" required><?php echo $rws['VehiclesOverview'];?></textarea>
		</div>
	</div>

	<div class="form-group">
	<label class="col-sm-2 control-label">Price Per Day<span style="color:red">*</span></label>
		<div class="col-sm-4">
		<input type="text" name="priceperday" class="form-control" value="<?php echo $rws['PricePerDay'];?>" required>
		</div>
	<label class="col-sm-2 control-label">Select Fuel Type<span style="color:red">*</span></label>
		<div class="col-sm-4">
			<select class="selectpicker" name="fueltype" required>
				<option value="<?php echo $rws['FuelType'];?>"> <?php echo $rws['FuelType'];?></option>
				<option value="Petrol">Petrol</option>
				<option value="Diesel">Diesel</option>
				<option value="CNG">CNG</option>
			</select>
		</div>
	</div>


	<div class="form-group">
		<label class="col-sm-2 control-label">Model Year<span style="color:red">*</span></label>
			<div class="col-sm-4">
			<input type="text" name="modelyear" class="form-control" value="<?php echo $rws['ModelYear'];?>" required>
			</div>
		<label class="col-sm-2 control-label">Seating Capacity<span style="color:red">*</span></label>
			<div class="col-sm-4">
			<input type="text" name="seatingcapacity" class="form-control" value="<?php echo $rws['SeatingCapacity'];?>" required>
			</div>
	</div>
	
	<div class="hr-dashed"></div>								
	
	<div class="form-group">
		<div class="col-sm-12">
		<h4><b>Vehicle Images</b></h4>
		</div>
	</div>


	<div class="form-group">
		<div class="col-sm-4">
			<img src="img/vehicleimages/<?php echo $rws['Vimage1'];?>" class="edit-image">
			<a class="btn-set" href="changeimage1.php?imgid=<?php echo $rws['id']?>">Change IMG</a>
		</div>

		<div class="col-sm-4">
			<img src="img/vehicleimages/<?php echo $rws['Vimage2'];?>" class="edit-image">
			<a class="btn-set" href="changeimage2.php?imgid=<?php echo $rws['id']?>">Change IMG</a>
		</div>

		<div class="col-sm-4">
			<img src="img/vehicleimages/<?php echo $rws['Vimage3'];?>" class="edit-image">
			<a class="btn-set" href="changeimage3.php?imgid=<?php echo $rws['id']?>">Change IMG</a>
		</div>
	</div>


	<div class="form-group">
		<div class="col-sm-4">
			<img src="img/vehicleimages/<?php echo $rws['Vimage4'];?>" class="edit-image">
			<a class="btn-set" href="changeimage4.php?imgid=<?php echo $rws['id']?>">Change IMG</a>
		</div>

		<div class="col-sm-4">
		<?php if($rws['Vimage5']=="")
		{ echo "File not available";
		} else {?>
			<img src="img/vehicleimages/<?php echo $rws['Vimage5'];?>" class="edit-image">
			<a class="btn-set" href="changeimage5.php?imgid=<?php echo $rws['id']?>">Change IMG</a>
		<?php } ?>
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
				<?php if($rws['AirConditioner']==1)
				{?>
				<div class="checkbox checkbox-inline">
					<input type="checkbox" id="inlineCheckbox1" name="airconditioner" checked value="1">
					<label for="inlineCheckbox1"> Air Conditioner </label>
				</div>

				<?php } else { ?>
				<div class="checkbox checkbox-inline">
					<input type="checkbox" id="inlineCheckbox1" name="airconditioner" value="1">
					<label for="inlineCheckbox1"> Air Conditioner </label>
				</div>

				<?php } ?>
				</div>
				<div class="col-sm-3">
				<?php if($rws['PowerDoorLocks']==1)
				{?>
					<div class="checkbox checkbox-inline">
						<input type="checkbox" id="inlineCheckbox1" name="powerdoorlocks" checked value="1">
						<label for="inlineCheckbox2"> Power Door Locks </label>
					</div>

				<?php } else {?>
				<div class="checkbox checkbox-success checkbox-inline">
					<input type="checkbox" id="inlineCheckbox1" name="powerdoorlocks" value="1">
					<label for="inlineCheckbox2"> Power Door Locks </label>
				</div>

				<?php }?>
				</div>
				<div class="col-sm-3">
				<?php if($rws['AntiLockBrakingSystem']==1)
				{?>
					<div class="checkbox checkbox-inline">
						<input type="checkbox" id="inlineCheckbox1" name="antilockbrakingsys" checked value="1">
						<label for="inlineCheckbox3"> AntiLock Braking System </label>
					</div>
					
				<?php } else {?>
				<div class="checkbox checkbox-inline">
					<input type="checkbox" id="inlineCheckbox1" name="antilockbrakingsys" value="1">
					<label for="inlineCheckbox3"> AntiLock Braking System </label>
				</div>
				<?php } ?>
				</div>


				<div class="col-sm-3">
					<?php if($rws['BrakeAssist']==1)
					{?>
					<div class="checkbox checkbox-inline">
						<input type="checkbox" id="inlineCheckbox1" name="brakeassist" checked value="1">
						<label for="inlineCheckbox3"> Brake Assist </label>
					</div>
					
					<?php } else {?>
					<div class="checkbox checkbox-inline">
						<input type="checkbox" id="inlineCheckbox1" name="brakeassist" value="1">
						<label  for="inlineCheckbox3"> Brake Assist </label>
					</div>
				<?php } ?>
				</div>

				<div class="form-group">
				<?php if($rws['PowerSteering']==1)
				{?>

				<div class="col-sm-3">
					<div class="checkbox checkbox-inline">
						<input type="checkbox" id="inlineCheckbox1" name="powersteering" checked value="1">
						<label for="inlineCheckbox1"> Power Steering </label>
					</div>


				<?php } else {?>
				<div class="col-sm-3">
					<div class="checkbox checkbox-inline">
						<input type="checkbox" id="inlineCheckbox1" name="powersteering" value="1">
						<label for="inlineCheckbox1"> Power Steering </label>
					</div>
				<?php } ?>
				</div>

				<div class="col-sm-3">
				<?php if($rws['DriverAirbag']==1)
				{ ?>
					<div class="checkbox checkbox-inline">
						<input type="checkbox" id="inlineCheckbox1" name="driverairbag" checked value="1">
						<label for="inlineCheckbox2">Driver Airbag</label>
					</div>


				<?php } else { ?>
					<div class="checkbox checkbox-inline">
						<input type="checkbox" id="inlineCheckbox1" name="driverairbag" value="1">
						<label for="inlineCheckbox2">Driver Airbag</label>
					<?php } ?>
					</div>


				<div class="col-sm-3">
				<?php if($rws['DriverAirbag']==1)
				{?>
					<div class="checkbox checkbox-inline">
						<input type="checkbox" id="inlineCheckbox1" name="passengerairbag" checked value="1">
						<label for="inlineCheckbox3"> Passenger Airbag </label>
					</div>

				<?php } else { ?>
					<div class="checkbox checkbox-inline">
						<input type="checkbox" id="inlineCheckbox1" name="passengerairbag" value="1">
						<label for="inlineCheckbox3"> Passenger Airbag </label>
					</div>
				<?php } ?>
				</div>
				<?php } ?>


									</div>
								</div>
							</div>
						</div>
						
						
						<div class="col-sm-12 text-center" >
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
<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0){	
header('location:index.php');
} else{
		if(isset($_POST['update'])){
		$vimage3=$_FILES["img3"]["name"];
		$id=intval($_GET['imgid']);
		move_uploaded_file($_FILES["img3"]["tmp_name"],"img/vehicleimages/".$_FILES["img3"]["name"]);
		$sql="UPDATE VEHICLES SET Vimage3='$vimage3' where id='$id'";
		$rs = $conn->query($sql);
		$msg="Image updated successfully";
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
					
						<h2 class="page-title">Vehicle Image 3 </h2>

						<div class="row">
							<div class="col-md-10">
								<div class="panel panel-default">
									<div class="panel-heading">Vehicle Image 3 Details</div>
									<div class="panel-body">
										<form method="post" class="form-horizontal" enctype="multipart/form-data">
										
										<?php if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo $msg; ?> </div><?php }
										else if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo $error; ?> </div><?php } ?>



											<div class="form-group">
												<label class="col-sm-4 control-label">Current Image3</label>
												<?php 
												$id=intval($_GET['imgid']);
												$sel ="SELECT Vimage3 from VEHICLES where VEHICLES.id='$id'";
												$result = $conn -> query($sel);
												$cnt=1;
												while($rows = $result->fetch_assoc()){
													?>
													<div class="col-sm-8">
													<img src="img/vehicleimages/<?php echo $rows['Vimage3'];?>" class="edit-image">
													</div>
												<?php }?>
											</div>

											<div class="form-group">
												<label class="col-sm-4 control-label">Upload New Image 3<span style="color:red">*</span></label>
												<div class="col-sm-8">
													<input type="file" name="img3" required>
												</div>
											</div>
												
										</div>
									</div>
								</div>
								<div class="col-sm-12 text-center">
									<button class="btn-submit" name="update" type="submit">Save Change</button>
								</div>

						</form>
								
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
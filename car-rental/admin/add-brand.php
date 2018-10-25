<?php
session_start();
error_reporting(0);
include 'includes/config.php';
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
echo "<script>alert('Invalid Details. Check your account');</script>";
} else{
	if(isset($_POST['submit']))
	{
	$brand=$_POST['brand'];
	$sql="INSERT INTO  BRANDS (id, BrandName) VALUES(LAST_INSERT_ID(), '$brand')";
	$rs = $conn->query($sql);
	$num = $rs->num_rows;
	$msg="Brand Created successfully";
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
	<?php include 'includes/auth_check.php';?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Add Brand</h2>

						<div class="row">
							<div class="col-md-10">
								<div class="panel panel-default">
									<div class="panel-heading">Form fields</div>
									<div class="panel-body">
										<form method="post" name="chngpwd" class="form-horizontal" onSubmit="return valid();">
										
											
  	        	  <?php if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo $msg; ?> </div><?php }
				else if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo $error; ?> </div><?php } ?>

											<div class="form-group">
												<label class="col-sm-4 control-label">Brand Name<span style="color:red">*</span></label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="brand" id="brand" required>
												</div>
											</div>
											
										
											
										</div>
									</div>
								</div>
														<div class="col-sm-12 text-center">
															<button class="btn-submit" name="submit" type="submit">Submit</button>
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
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>

</body>

</html>
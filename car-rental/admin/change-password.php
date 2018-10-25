<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
// Code for change password	
	if(isset($_POST['submit'])){
		$password=md5($_POST['password']);
		$newpassword=md5($_POST['newpassword']);
		$username=$_SESSION['alogin'];
		$sql ="SELECT Password FROM USERS WHERE EmailId='$username' and Password='$password'";
		$res= $conn -> query($sql);
		$num = $res->num_rows;
		$rws = $res -> fetch_assoc();
		if($num > 0){
			$sql1="UPDATE USERS SET Password='$newpassword' where EmailId='$username'";
			$res1 = $conn->query($sql1);
			$msg="Your Password succesfully changed";
		} else {
			$error="Your current password is not valid.";	
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
	<script type="text/javascript">
	function valid(){
		if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value){
			alert("New Password and Confirm Password Field do not match  !!");
			document.chngpwd.confirmpassword.focus();
			return false;
		}
		return true;
	}
	</script>

</head>

<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/auth_check.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Change Password</h2>

						<div class="row">
							<div class="col-md-10">
								<div class="panel panel-default">
									<div class="panel-heading">Form fields</div>
									<div class="panel-body">
										<form method="post" name="chngpwd" class="form-horizontal" onSubmit="return valid();">
											
										<?php if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo $msg; ?> </div><?php }
										else if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo $error; ?> </div><?php } ?>
											<div class="form-group">
												<label class="col-sm-4 control-label">Current Password</label>
												<div class="col-sm-8">
													<input type="password" class="form-control" name="password" id="password" required>
												</div>
											</div>
											<div class="hr-dashed"></div>
											
											<div class="form-group">
												<label class="col-sm-4 control-label">New Password</label>
												<div class="col-sm-8">
													<input type="password" class="form-control" name="newpassword" id="newpassword" required>
												</div>
											</div>
											<div class="hr-dashed"></div>

											<div class="form-group">
												<label class="col-sm-4 control-label">Confirm Password</label>
												<div class="col-sm-8">
													<input type="password" class="form-control" name="confirmpassword" id="confirmpassword" required>
												</div>
											</div>
											<div class="hr-dashed"></div>
										
								
											
												<div class="col-sm-12 text-center">
													<button class="btn-submit" name="submit" type="submit">Save changes</button>
												</div>

										</form>

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
	<script src="js/fileinput.js"></script>
	<script src="js/main.js"></script>

</body>

</html>
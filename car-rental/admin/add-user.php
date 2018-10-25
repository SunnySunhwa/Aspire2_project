<?php
session_start();
error_reporting(0);
include 'includes/config.php';
if(strlen($_SESSION['alogin'])==0 
|| !($_SESSION['level']==2)){	
  echo "<script type = \"text/javascript\">
						alert(\"You don't have authority. Please Login as ADMIN\");
						window.location = (\"index.php\")
						</script>";
}
else{ 

if(isset($_POST['submit'])){
  $username=$_POST['username'];
  $level=$_POST['level'];
  $useremail=$_POST['useremail'];
  $contactno=$_POST['contactno'];
  $status=$_POST['status'];
  $pwd=md5($_POST['pwd']);
$sql="INSERT INTO USERS (id, FullName, EmailId, Password, ContactNo, Level, Status ) VALUES(LAST_INSERT_ID(),'$username', '$useremail','$pwd', '$contactno', '$level', '$status')";
$rs = $conn->query($sql);
$num = $rs->num_rows;
$msg="User Created successfully";

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
					
						<h2 class="page-title">Add User</h2>

						<div class="row">
							<div class="col-md-10">
								<div class="panel panel-default">
									<div class="panel-heading">Form fields</div>
									<div class="panel-body">
									<form method="post" class="form-horizontal" enctype="multipart/form-data">
										
											
										<?php if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo $msg; ?> </div><?php }
				else if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo $error; ?> </div><?php } ?>

								<div class="form-group">
								<label class="col-sm-4 control-label">User Type<span style="color:red">*</span></label>
                <div class="col-sm-2">
                  <select class="selectpicker" name="level" required>
                    <option value="0">User</option>
                    <option value="1">Staff</option>
                    <option value="2">Admin</option>
                  </select>
		            </div>
              </div>

							<div class="form-group">
								<label class="col-sm-4 control-label">Status<span style="color:red">*</span></label>
                <div class="col-sm-2">
                  <select class="selectpicker" name="status" required>
                    <option value="0">Active</option>
                    <option value="1">Inactive</option>
                  </select>
		            </div>
              </div>

											<div class="form-group">
												<label class="col-sm-4 control-label">User Email<span style="color:red">*</span></label>
												<div class="col-sm-8">
													<input type="email" class="form-control" name="useremail" required>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-sm-4 control-label">password<span style="color:red">*</span></label>
												<div class="col-sm-8">
													<input type="password" class="form-control" name="pwd" required>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-4 control-label">User Full Name<span style="color:red">*</span></label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="username" required>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-sm-4 control-label">Contact No</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="contactno">
												</div>
											</div>
											
										</div>
									</div>
								</div>
														<div class="col-sm-12 text-center">
                            <button class="btn-submit" style="background:#555" type="reset">Cancel</button>
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
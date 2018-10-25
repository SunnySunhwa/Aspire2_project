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

if(isset($_POST['submit']))
  {
$username=$_POST['username'];
$level=$_POST['level'];
$useremail=$_POST['useremail'];
$contactno=$_POST['contactno'];
$status=$_POST['status'];
$pwd=$_POST['pwd'];
$id=intval($_GET['id']);
$sql="UPDATE USERS set FullName='$username', EmailId='$useremail', ContactNo='$contactno', level='$level', Password='$pwd', Status='$status' where id='$id'";
$rs = $conn->query($sql);
$num = $rs->num_rows;
	if($num = 0){
		$error="Something went wrong. Please try again";
	} 
	$msg="Data updated successfully";
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
	<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
</head>

<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/auth_check.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Edit User</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Basic Info</div>
									<div class="panel-body">
										<form method="post" name="chngpwd" class="form-horizontal" onSubmit="return valid();" enctype="multipart/form-data">
<?php if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>

	<?php 
		$id=intval($_GET['id']);
		$sel="SELECT * from USERS where id='$id'";
		$rs = $conn->query($sel);
		while($rws = $rs->fetch_assoc()){
			?>
							<div class="form-group">
								<label class="col-sm-4 control-label">User Type<span style="color:red">*</span></label>

								<div class="col-sm-8">
									<div class="radio-inline">
										<input class="form-check-inline" type="radio" name="level"
										<?php if ($rws['Level']==0) echo "checked";?>
										value="0">User
									</div>

									<div class="radio-inline">
										<input class="form-check-inline" type="radio" name="level"
										<?php if ($rws['Level']==1) echo "checked";?>
										value="1">Staff
									</div>

									<div class="radio-inline">
										<input class="form-check-inline" type="radio" name="level"
										<?php if ($rws['Level']==2) echo "checked";?>
										value="2">Admin
									</div>
									
								</div>
              </div>


                <div class="form-group">
                  <label class="col-sm-4 control-label">User Email<span style="color:red">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" name="useremail" class="form-control" value="<?php echo $rws['EmailId'];?>" required>
                  </div>
								</div>

                <div class="form-group">
                  <label class="col-sm-4 control-label">Password<span style="color:red">*</span></label>
                  <div class="col-sm-8">
                    <input type="password" name="pwd" class="form-control" value="<?php echo $rws['Password'];?>" required>
                  </div>
								</div>
								
								<div class="form-group">
                  <label class="col-sm-4 control-label">User Full Name<span style="color:red">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" name="username" class="form-control" value="<?php echo $rws['FullName'];?>" required>
                  </div>
                </div>



                <div class="form-group">
                  <label class="col-sm-4 control-label">Contact No<span style="color:red">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" name="contactno" class="form-control" value="<?php echo $rws['ContactNo'];?>" required>
                  </div>
								</div>


								<div class="form-group">
									<label class="col-sm-4 control-label">Status<span style="color:red">*</span></label>

									<div class="col-sm-8">
										<div class="radio-inline">
											<input class="form-check-inline" type="radio" name="status"
											<?php if ($rws['Status']==0) echo "checked";?>
											value="0">Active
										</div>

										<div class="radio-inline">
											<input class="form-check-inline" type="radio" name="status"
											<?php if ($rws['Status']==1) echo "checked";?>
											value="1">Inactive
										</div>
									</div>
								</div>


                <div class="form-group">
                  <label class="col-sm-4 control-label">Registered Date<span style="color:red">*</span></label>
                  <div class="col-sm-8">
                    <p style="margin-top:1em;"><?php echo $rws['RegisterDate'];?></p>
                  </div>
								</div>



		<?php } ?>
		</div>
  </div>
										<div class="col-sm-12 text-center" >
											<button class="btn-submit" name="submit" type="submit">Save changes</button>
										</div>
		
					</form>
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
	<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
</body>

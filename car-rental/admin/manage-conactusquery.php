<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
if(isset($_REQUEST['eid'])){
	$eid=intval($_GET['eid']);
	$status=1;
	$sql1 = "UPDATE CONTACTUS_QUERY SET status='$status' WHERE  id='$eid'";
	$result = $conn->query($sql1);
	$msg="Query Successfully Inacrive";
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

						<h2 class="page-title">Manage Contact Us Queries</h2>

						<div class="panel panel-default">
							<div class="panel-heading">User queries</div>
							<div class="panel-body">
							<?php if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo $msg; ?> </div><?php }
				else if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo $error; ?> </div><?php } ?>
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>#</th>
											<th>Name</th>
											<th>Email</th>
											<th>Contact No</th>
											<th>Message</th>
											<th>Posting date</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
								<?php
									$sql = "SELECT * from  CONTACTUS_QUERY ";
									$rs = $conn -> query($sql);
									$cnt=1;
									while($rws = $rs->fetch_assoc()){
										?>	
										<tr>
											<td><?php echo $cnt;?></td>
											<td><?php echo $rws['name'];?></td>
											<td><?php echo $rws['EmailId'];?></td>
											<td><?php echo $rws['ContactNumber'];?></td>
											<td><?php echo $rws['Message'];?></td>
											<td><?php echo $rws['PostingDate'];?></td>
											<?php if($rws['status']==1){
												?><td>Read</td>
											<?php } else {?>

											<td>
											<a class="btn-green" href="manage-conactusquery.php?eid=<?php echo $rws['id'];?>" onclick="return confirm('Do you really want to read')" >New</a>
											</td>
											<?php } ?>
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

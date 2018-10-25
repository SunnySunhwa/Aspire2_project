<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
if(isset($_GET['del']))
{
	$id=$_GET['del'];
	$sql = "DELETE from BRANDS  WHERE id= '$id'";
	$query = $conn -> query($sql);
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

</head>

<body>
	<?php include('includes/header.php');?>

	<div class="ts-main-content">
	<?php include 'includes/auth_check.php';?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Manage Brands</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Listed  Brands</div>
							<div class="panel-body">
							<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>#</th>
											<th>Brand Name</th>
											<th>Creation Date</th>
											<th>Updation date</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>

									<?php 
									$sql = "SELECT * from  BRANDS ";
									$rs = $conn->query($sql);
           				$cnt = 1;
									while($rws = $rs->fetch_assoc()){				?>	
										<tr>
											<td><?php echo $cnt;?></td>
											<td><?php echo $rws['BrandName'];?></td>
											<td><?php echo $rws['CreationDate'];?></td>
											<td><?php echo $rws['UpdationDate'];?></td>
<td><a class="btn-green" href="edit-brand.php?id=<?php echo $rws['id'];?>">Edit</a>&nbsp;&nbsp;
<a class="btn-red" href="manage-brands.php?del=<?php echo $rws['id'];?>" onclick="return confirm('Do you want to delete');">Delete</i></a></td>
										</tr>
										<?php $cnt=$cnt+1; } ?>
										
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
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
<?php } ?>

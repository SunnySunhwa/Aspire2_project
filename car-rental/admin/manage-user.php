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
} else{
    
  if(isset($_GET['del']))
  {
    $id=intval($_GET['del']);
    $query = "DELETE FROM `USERS` WHERE `USERS`.`id` = $id";
    $rs = $conn->query($query);

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
	<?php include('includes/header.php');
	?>

	<div class="ts-main-content">
	<?php include 'includes/auth_check.php';?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">User List</h2>

						<div class="panel panel-default">
							<div class="panel-heading">Registered Users</div>
							<div class="panel-body">
							<?php if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo $msg; ?> </div><?php }
				else if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo $error; ?> </div><?php } ?>
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>#</th>
											<th> Name</th>
											<th>Email </th>
											<th>Contact no</th>
											<th>User type</th>
											<th>Registered Date</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
          <?php
						$sel = "SELECT * FROM USERS ";
            $rs = $conn->query($sel);
            $cnt = 1;
						while($rws = $rs->fetch_assoc()){
			?>
      <tr>
        <td><?php echo $cnt;?></td>
        <td><?php echo $rws['FullName'];?></td>
        <td><?php echo $rws['EmailId'];?></td>
        <td><?php echo $rws['ContactNo'];?></td>
        <?php if($rws['Level']==0){ 
          ?><td>User</td>
          <?php
						} else if($rws['Level']==1){
					?>
          <td>Staff</td>
					<?php }else if($rws['Level']==2){?>
						<td>Admin</td>
					<?php }?>
        <td><?php echo $rws['RegisterDate'];?></td>
        <?php if($rws['Status']==1){ 
          ?><td>Inactive</td>
          <?php
						} else{
					?>
          <td>Active</td>
          <?php }?>
        <td><a class="btn-green" href="edit-user.php?id=<?php echo $rws['id'];?>">Edit</i></a>&nbsp;&nbsp;
<a class="btn-red" href="manage-user.php?del=<?php echo $rws['id'];?>" onclick="return confirm('Do you want to delete');">Delete</a></td>
			</tr>
			<?php $cnt = $cnt+1;
				}
			?>
										
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

<div class="brand clearfix">
	<a href="dashboard.php" style="font-size: 20px; line-height:60px; padding-left:20px;">Car Rental - ADMIN</a>  
		<span class="menu-btn"><i class="fa fa-bars"></i></span>
		<ul class="ts-profile-nav">
			
			<li class="ts-account">
			<?php if($_SESSION['level']==1){
				?><a href="#"> STAFF <i class="fa fa-angle-down hidden-side"></i></a>
				<?php
				}else{
					?><a href="#"> ADMIN <i class="fa fa-angle-down hidden-side"></i></a>
					<?php 
				}?>
				<ul>
					<li><a href="change-password.php">Change Password</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</li>
		</ul>
	</div>

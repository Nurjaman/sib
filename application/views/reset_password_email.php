 <link href="<?php echo base_url() ?>public/home/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

 <link href="<?php echo base_url() ?>public/assets/tampilan_forgot/css/style.css" rel="stylesheet" type="text/css" media="all" />
 <!-- //Custom Theme files -->
 <!-- font-awesome icons -->
 <link href="<?php echo base_url() ?>public/assets/tampilan_forgot/css/font-awesome.css" rel="stylesheet"> 


 <link href="//fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

 <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

 <?php echo validation_errors(); ?>
 <!-- main -->
 <div class="main-agile">
 	<p>
 	<div class="content">
 		<div class="top-grids-center">
 			<div class="top-grids-center">
					<!-- <div class="signin-form reset-password">
						<h3>Reset Password</h3>
						<form action="#" method="post">
							<input type="password" placeholder="Password" name="Password" required="">
							<input type="password" placeholder="Repeat Password" name="Repeat Password" required="">
							<input type="submit" class="send" value="Update Password">
						</form>
					</div> -->

					<div class="signin-form">
						<h3>Recover Password</h3>
						<form class="form-horizontal" action="<?php echo base_url().'user/email_reset_password_validation'; ?>" method="post" enctype="multipart/form-data">
							<input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo set_value('email') ?>" name="email" aria-describedby="emailHelp" placeholder="Email" required>

							<input type="submit" class="send" value="Submit Reset">
							<div class="signin-agileits-bottom"> 
								<p><a href="#" onclick="goBack()"><i class="fa fa-arrow-left" aria-hidden="true"></i> Cancel and go back to Sistem Informasi Billboard</a></p>    

							</div>
						</form>
					</div>
				</div>
				<div class="clear"> </div>
			</div>
		</div>
	</div>	


	<script>
		function goBack() {
			window.history.back();
		}
	</script>
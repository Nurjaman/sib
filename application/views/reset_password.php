<link href="<?php echo base_url() ?>public/home/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<link href="<?php echo base_url() ?>public/assets/tampilan_forgot/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- font-awesome icons -->
<link href="<?php echo base_url() ?>public/assets/tampilan_forgot/css/font-awesome.css" rel="stylesheet"> 


<link href="//fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>



<?php 
$reset_key = $this->uri->segment(3);
?>
<?php echo validation_errors(); ?>
<div class="main-agile">
	<p>
		<div class="content">
			<div class="top-grids-center">
				<div class="top-grids-center">

					<form class="form-horizontal" action="<?php echo base_url().'user/reset_password_validation'; ?>" method="post" enctype="multipart/form-data">
<!-- 						<div class="modal-body">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text">Email   </span>
								</div>
								<input type="text" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Email">
								<p class="help-block"><?php  //echo form_error('Email', '<small class="text-red">', '</small>'); ?></p>
							</div>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text">Password   </span>
								</div>
								<input type="password" class="form-control" id="exampleInputEmail1" name="password" aria-describedby="emailHelp" placeholder="Email">
								<p class="help-block"><?php  //echo form_error('Email', '<small class="text-red">', '</small>'); ?></p>
							</div>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text">Confirm Password   </span>
								</div>
								<input type="password" class="form-control" id="exampleInputEmail1" name="retype_password" aria-describedby="emailHelp" placeholder="Email">

								<p class="help-block"><?php  //echo form_error('Email', '<small class="text-red">', '</small>'); ?></p>
							</div>

						</div>
						<div class="modal-footer">
							<button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
							<button type="submit" class="btn btn-info"><i class="fa fa-save"></i>Reset Password</button>
						</div>
					</form> -->

					<div class="signin-form recover-password">
						<h3>Reset Password</h3>
						<form class="form-horizontal" action="<?php echo base_url().'user/email_reset_password_validation'; ?>" method="post" enctype="multipart/form-data">
							<input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo set_value('email') ?>" name="email" aria-describedby="emailHelp" placeholder="Email" required>

							<input type="password" class="form-control" id="exampleInputEmail1" name="password" aria-describedby="emailHelp" placeholder="Password">

							<input type="password" class="form-control" id="exampleInputEmail1" name="retype_password" aria-describedby="emailHelp" placeholder="Retype Password">

							<input type="text" value="<?php echo $reset_key; ?>" name="reset_key">

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




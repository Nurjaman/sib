 <link href="<?php echo base_url() ?>public/home/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


 			<?php echo validation_errors(); ?>
 			<form class="form-horizontal" action="<?php echo base_url().'user/email_reset_password_validation'; ?>" method="post" enctype="multipart/form-data">
 				<div class="modal-body">
 					<div class="input-group mb-3">
 						<div class="input-group-prepend">
 							<span class="input-group-text">Email   </span>
 						</div>
 						<input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo set_value('email') ?>" name="email" aria-describedby="emailHelp" placeholder="Email">
 						<p class="help-block"><?php  echo form_error('Email', '<small class="text-red">', '</small>'); ?></p>
 					</div>

 				</div>
 				<div class="modal-footer">
 					<button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
 					<button type="submit" class="btn btn-info"><i class="fa fa-save"></i>Reset Password</button>
 				</div>
 			</form>

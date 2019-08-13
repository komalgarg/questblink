<!-- signup form start -->
<section id="signup-form">
	<div class="col-md-4 offset-md-4 container">
		<div class="row">
			<div class="signup-form-list col-md-12">
			  <h2>Login</h2>
				<form action="<?php echo base_url().'check_login';?>" method="post">
				<?php echo '<span class="error">'. $this->session->flashdata('error').'</span>'; ?>
					<div class="form-row">
						<div class="col">
						  <input type="email" class="form-control" placeholder="Email" name="email">
						  <?php echo form_error('email', '<span class="error">', '</small>'); ?>
					  </div>
					  <div class="form-row">
						<div class="col">
						  <input type="password" class="form-control" placeholder="Password" name="password">
						  <?php echo form_error('password', '<span class="error">', '</small>'); ?>
						</div>
					  </div>
					  <div class="text-center">
						<button type="submit" class="btn btn-primary mb-2 btn-pink">Login</button>
					  </div>
				</form>
				<p>If you are a new user, <a href="<?php echo base_url().'sign-up'; ?>">click here</a></p>
				<p>Forget your password? <a href="<?php echo base_url().'forget-password'; ?>">click here.</a></p>
			</div>
		</div>
	</div>
</section>
<!-- signup form end -->
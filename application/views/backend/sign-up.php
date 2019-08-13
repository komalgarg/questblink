<!-- signup form start -->
<section id="signup-form">
	<div class="col-md-6 offset-md-3 container">
		<div class="row">
			<div class="signup-form-list col-md-12">
			  <h2>Sign Up</h2>
				<form action="<?php echo base_url().'register';?>" method="post" enctype="multipart/form-data">
				<?php echo '<span class="error">'. $this->session->flashdata('error').'</span>'; ?>
					<div class="form-row">
						<div class="col">
						  <input type="text" class="form-control" placeholder="First name" name="fname">
						  <?php echo form_error('fname', '<span class="error">', '</small>'); ?>
						</div>
						<div class="col">
						  <input type="text" class="form-control" placeholder="Last name" name="lname">
						  <?php echo form_error('lname', '<span class="error">', '</small>'); ?>
						</div>
					  </div>
					  <div class="form-row">
						<div class="col">
						  <input type="email" class="form-control" placeholder="Email" name="email">
						  <?php echo form_error('email', '<span class="error">', '</small>'); ?>
						</div>
						<div class="col">
						  <input type="password" class="form-control" placeholder="Password" name="password">
						  <?php echo form_error('password', '<span class="error">', '</small>'); ?>
						</div>
					  </div>
					  <div class="form-row">
					  <label>User Role</label>
						  <select class="form-control" name="user_role">
							<option value="2">Seller</option>
							<option value="3">Buyer</option>
							<option value="4">Blogger</option>
						  </select>
						  <?php echo form_error('user_role', '<span class="error">', '</small>'); ?>
					  </div>
					  <div class="form-row">
						<label>Upload profile picture</label>
						<input type="file" class="form-control" name="profile_pic">
					  </div>
					  <div class="text-center">
						<button type="submit" class="btn btn-primary mb-2 btn-pink">SUBMIT</button>
					  </div>
				</form>
				<p>If you are already registered, <a href="<?php echo base_url().'login'; ?>">click here</a></p>
			</div>
		</div>
	</div>
</section>
<!-- signup form end -->
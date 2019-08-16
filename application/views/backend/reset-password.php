<!-- signup form start -->

<section id="signup-form">
	<div class="col-md-4 offset-md-4 container">
		<div class="row">
			<div class="signup-form-list col-md-12">
			  <h2>Reset Password</h2>
				<form action="<?php echo base_url() ?>update_password" method="POST">
					<div class="form-row">
						<div class="col">
						  <input type="password" class="form-control" placeholder="Enter Password" name="password">
						</div>
					</div>
					<div class="form-row">
						<div class="col">
							<input type="password" class="form-control" placeholder="Confirm Password" name="password1">
						</div>
					</div>	
					<div class="form-row">
						<div class="col">
							<input type="hidden" class="form-control"  name="userId" value="<?php echo $id ?>">
						</div>
					</div>	
					<div class="text-center">
					<button type="submit" class="btn btn-primary mb-2 btn-pink">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<!-- signup form end -->
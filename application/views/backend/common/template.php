<?php
if($sidebar == 1) { ?>
	<div id="wrapper">
	    <?php echo $this->load->view('backend/common/header-backend'); 
		$this->load->view('backend/common/left-nav'); ?>
		<div id="page-wrapper" class="gray-bg dashbard-1">
			<?php $this->load->view('backend/common/top-nav'); ?>
			<?php $this->load->view('backend/'.$template); ?>
		</div>
	</div>
<?php } else { 
    $this->load->view('backend/common/header'); 
	$this->load->view('backend/'.$template);
	$this->load->view('backend/common/footer');
}
 ?>



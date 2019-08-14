<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <strong class="font-bold"><?php echo $this->session->userdata('user')['fname'] . ' ' . $this->session->userdata('user')['lname']; ?></strong>
                </div>
                <div class="logo-element">
                    <i class="fa fa-th-large"></i>
                </div>
            </li>
            <li <?php echo ($this->uri->segment(2) == "dashboard") ? 'class="active"' : ''; ?>>
                <a href="<?php echo base_url('admin/dashboard'); ?>">
                    <i class="fa fa-th-large"></i> 
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>
			<?php if ($this->session->userdata('user')['user_role'] == 1) { ?>
				<li <?php echo ($this->uri->segment(2) == "category") ? 'class="active"' : ''; ?>>
					<a href="<?php echo base_url() . 'admin/category'; ?>">
						<i class="fa fa-edit"></i> 
						<span class="nav-label">Categories</span>
					</a>
				</li>
			<?php } else if($this->session->userdata('user')['user_role'] == 2) { ?>
				<li <?php echo ($this->uri->segment(2) == "upload-file") ? 'class="active"' : ''; ?>>
					<a href="<?php echo base_url() . 'seller/upload-file'; ?>">
						<i class="fa fa-edit"></i> 
						<span class="nav-label">Upload New File</span>
					</a>
				</li>
			<?php } else if($this->session->userdata('user')['user_role'] == 3) { ?>
			
			<?php } else if($this->session->userdata('user')['user_role'] == 4) { ?>
				<li <?php echo ($this->uri->segment(2) == "add-blog") ? 'class="active"' : ''; ?>>
					<a href="<?php echo base_url() . 'blogger/add-blog'; ?>">
						<i class="fa fa-edit"></i> 
						<span class="nav-label">Add New Blog</span>
					</a>
				</li>
			<?php } ?>
			
        </ul>
    </div>
</nav>
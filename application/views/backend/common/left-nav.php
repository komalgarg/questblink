<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <strong class="font-bold">Administrator</strong>
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
            <li <?php echo ($this->uri->segment(2) == "change_pwd") ? 'class="active"' : ''; ?>>
                <a href="<?php echo base_url('admin/change_pwd'); ?>">
                    <i class="fa fa-edit"></i> 
                    <span class="nav-label">Change Password</span>
                </a>
            </li>
			<?php if ($this->session->userdata('user')['user_role'] == 1) { ?>
				<li <?php echo ($this->uri->segment(2) == "category") ? 'class="active"' : ''; ?>>
					<a href="<?php echo base_url() . 'admin/category'; ?>">
						<i class="fa fa-edit"></i> 
						<span class="nav-label">Categories</span>
					</a>
				</li>
			<?php }?>
        </ul>
    </div>
</nav>
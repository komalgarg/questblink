<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?php echo config_item('asset'); ?>css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo config_item('asset'); ?>css/style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Questblinkstock</title>
  </head>
  <body>
    <!-- header start -->
    <header>
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light">
          <a class="navbar-brand" href="#">
            <img src="<?php echo config_item('asset'); ?>images/logo/questblinklogo.png" alt="" width="15%">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item <?php echo ($this->uri->segment(1) == '') ? 'active' : ''; ?>">
                <a class="nav-link" href="<?php echo base_url(); ?>">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item <?php echo ($this->uri->segment(1) == 'about-us') ? 'active' : ''; ?>">
                <a class="nav-link" href="<?php echo base_url() .'about-us'; ?>">About us</a>
              </li>
			  <li class="nav-item <?php echo ($this->uri->segment(1) == 'pricing') ? 'active' : ''; ?>">
                <a class="nav-link" href="#">Pricing</a>
              </li>
			  <li class="nav-item <?php echo ($this->uri->segment(1) == 'gallery') ? 'active' : ''; ?>">
                <a class="nav-link" href="#">Gallery</a>
              </li>
			  <li class="nav-item <?php echo ($this->uri->segment(1) == 'career') ? 'active' : ''; ?>">
                <a class="nav-link" href="<?php echo base_url() .'career'; ?>">Career</a>
              </li>
              <li class="nav-item <?php echo ($this->uri->segment(1) == 'contact-us') ? 'active' : ''; ?>">
                <a class="nav-link" href="<?php echo base_url() .'contact-us'; ?>">Contact us</a>
              </li>
              <li class="nav-item <?php echo ($this->uri->segment(1) == 'login') ? 'active' : ''; ?>">
                <a class="nav-link signup-btn" href="<?php echo base_url() .'login'; ?>">Login</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </header>
    <!-- header end -->
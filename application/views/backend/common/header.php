<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?php echo config_item('backend_asset'); ?>css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo config_item('backend_asset'); ?>css/style1.css">
    <title>Questblinkstock</title>
  </head>
  <body>
    <!-- header start -->
    <header>
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light">
          <a class="navbar-brand" href="#">
            <img src="<?php echo config_item('asset'); ?>images/questblinklogo.png" alt="" width="15%">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Contact us</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Documentation
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">License Agreement</a>
                  <a class="dropdown-item" href="#">Website terms of use</a>
                  <a class="dropdown-item" href="#">Career</a>
                  <a class="dropdown-item" href="#">Privacy policy</a>
                  <a class="dropdown-item" href="#">Help</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link signup-btn" href="#">Login</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </header>
    <!-- header end -->
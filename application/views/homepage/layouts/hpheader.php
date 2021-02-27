<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>

	<!-- Font Awesome Icons -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
	<!-- IonIcons -->
	  	<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Theme style -->
	  	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
	<!-- Google Font: Source Sans Pro -->
	  	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<!-- Ekko Lightbox -->
  		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/ekko-lightbox/ekko-lightbox.css">


	<!-- jQuery -->
		<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap -->
		<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE -->
		<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.js"></script>
	<!-- OPTIONAL SCRIPTS -->
		<script src="<?php echo base_url(); ?>assets/plugins/chart.js/Chart.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
		<script src="<?php echo base_url(); ?>assets/dist/js/pages/dashboard3.js"></script>
	<!-- Ekko Lightbox -->
		<script src="<?php echo base_url(); ?>assets/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
	<!-- jquery-validation -->
		<script src="<?php echo base_url(); ?>assets/plugins/jquery-validation/jquery.validate.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/jquery-validation/additional-methods.min.js"></script>

	<script>
	  $(function () {
	    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
	      event.preventDefault();
	      $(this).ekkoLightbox({
	        alwaysShowClose: true
	      });
	    });

	    $('.filter-container').filterizr({gutterPixels: 3});
	    $('.btn[data-filter]').on('click', function() {
	      $('.btn[data-filter]').removeClass('active');
	      $(this).addClass('active');
	    });
	  })
	</script>
</head>
<body background="<?php echo site_url('/'); ?>assets/dist/img/boxed-bg.jpg">
	<!-- Navbar -->
	  <nav class="navbar navbar-expand navbar-light navbar-primary">
	    <div class="container">
	      <a href="<?php echo site_url(); ?>" class="navbar-brand">
	        <img src="<?php echo base_url(); ?>assets/dist/img/Elogo.png" width="127" height="127" alt="" class="brand-image img-circle elevation-3"
	             style="opacity: .8">
	        <span class="brand-text font-weight-light" style="color: white;"><b>STORE</b></span>
	      </a>
	      <!-- Left navbar links -->
	      <ul class="navbar-nav">
	        <li class="nav-item">
	        </li>
	        <li class="nav-item d-none d-sm-inline-block">
	          <a href="<?php echo site_url(); ?>" class="nav-link" style="color: white;">Home</a>
	        </li>
	        <li class="nav-item d-none d-sm-inline-block">
	          <a href="#" class="nav-link" style="color: white;">Contact</a>
	        </li>
	        <li class="nav-item dropdown">
	          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">
	            Help
	          </a>
	          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
	            <a class="dropdown-item" href="#">FAQ</a>
	            <a class="dropdown-item" href="#">Support</a>
	            <div class="dropdown-divider"></div>
	            <a class="dropdown-item" href="#">Contact</a>
	          </div>
	        </li>
	      </ul>
	      <!-- Right navbar links -->
		    <ul class="navbar-nav ml-auto">
		     	<?php if (empty($this->session->userdata('userId'))): ?>
		     	   	<li class="nav-item dropdown" style="color: white;">
			            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="nav-link dropdown-toggle" style="color: white;"><i class="fas fa-sign-in-alt"></i> Login</a>
			            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadowd" style="left: 0px; right: inherit;">
			              <li>
			              	<a class="dropdown-item" href="<?php echo base_url(); ?>welcome/login"> Login as Buyer</a>
			              </li>
			              <li>
			              	<a class="dropdown-item" href="<?php echo site_url(); ?>seller/login">login as Seller</a>
			              </li>
			            </ul>
			        </li>
			        |
			        <li class="nav-item dropdown">
			            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="nav-link dropdown-toggle" style="color: white;"><i class="fas fa-sign-in-alt"></i> Sign up</a>
			            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadowd" style="left: 0px; right: inherit;">
			              <li>
			              	<a class="dropdown-item" href="<?php echo base_url(); ?>welcome/signup"> Sign up as Buyer</a>
			              </li>
			              <li>
			              	<a class="dropdown-item" href="<?php echo site_url(); ?>seller/signup">Sign up as Seller</a>
			              </li>
			            </ul>
			        </li>
		     	<?php else: ?>
		        	<li class="nav-item ">
		        		<a class="nav-link" href="<?php echo site_url(); ?>buyer" style="color: white;">
		        			<i class="fas fa-user"></i> <?php echo ucwords($this->session->userdata('first_name').' '.$this->session->userdata('mid_name')[0].'. '.$this->session->userdata('last_name')); ?></a>
				    </li>    
		        	<li class="nav-item dropdown">
				        <a class="nav-link" href="<?php echo site_url(); ?>buyer/mycart"  style="color: white;font-size: 20px;">
				          <i class="fas fa-cart-plus"></i>
				          <span class="badge badge-danger navbar-badge"><?php echo count($carts); ?></span>
				        </a>
				    </li>
		     	<?php endif ?>
		    </ul>
	    </div>
	  </nav>	  	
    <nav class="navbar navbar-expand navbar-light navbar-primary">
      <div class="container">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search">
            <div class="input-group-btn">
              <button class="btn btn-default" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
        </div>
      </div>
    </nav>
	<!-- /.navbar -->

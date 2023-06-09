<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Coffee - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php 
    asset('stylesheet', [
      'css/open-iconic-bootstrap.min.css',
      'css/animate.css',
      'css/owl.carousel.min.css',
      'css/owl.theme.default.min.css',
      "css/magnific-popup.css",
      "css/aos.css",
      "css/ionicons.min.css",
      "css/bootstrap-datepicker.css",
      "css/jquery.timepicker.css",
      "css/flaticon.css",
      "css/icomoon.css",
      "css/style.css"
    ]);
    
    ?>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    
  </head>
  <body>
    <?php
    if(isset($notification)) {
     echo $notification;
    }
    ?>
  	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">Coffee<small>Blend</small></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="/" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="/menu" class="nav-link">Menu</a></li>
	          <li class="nav-item"><a href="/services" class="nav-link">Services</a></li>
	          <li class="nav-item"><a href="/about" class="nav-link">About</a></li>
	         
	          <li class="nav-item"><a href="/contact" class="nav-link">Contact</a></li>
            <?php if(isset($_SESSION['username'])): ?>
	          <li class="nav-item cart"><a href="/cart" class="nav-link"><span class="icon icon-shopping_cart"></span></a>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?= $_SESSION['username'] ?>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="/logout">Logout</a></li>
              </ul>
            </li>
            <?php else: ?>
            <li class="nav-item"><a href="/login" class="nav-link">login</a></li>
            <li class="nav-item"><a href="/register" class="nav-link">register</a></li>
            <?php endif; ?>

	        </ul>
	      </div>
		</div>
	  </nav>
    <!-- END nav -->
<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<title><?= $title ?> | TokunboCars.NG</title>
                
                
                
                <meta name="description" content="<?= $title ?> | Tokunbo Cars Nigeria a brand of CARSNOWNOW LIMITED which offers the most flexible, reliable and affordable alternative for purchasing a “Used” car from the United States, We have carefully created a DIY(do it yourself) system that allows you buy cars of your choice at extremely affordable rates"/>
<meta name="robots" content="noodp"/>
<meta name="keywords" content="tokunbo, US cars, Buy tokunbo cars, tokunbo cars in Nigeria, tokunbo cars in Lagos, tokunbo cars in Abuja, olx, jiji, olx cars, jiji cars, cars in Nigeria, cars, toyota, camry, corolla, acura, ford, edge, bmw, lexus, rx330, rx350, es300, es330, es 350, is250, highlander, chevrolet"/>
<link rel="canonical" href="https://tokunbocars.ng/" />
<link rel="publisher" href="https://business.google.com/b/103903205382144847070/dashboard/l/16294573529077345710?hl=en"/>
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="website" />
<meta property="og:title" content="<?= $title ?> | Nigeria's No. 1 Site for Tokunbo Cars" />
<meta property="og:description" content="<?= $title ?> | TokunboCars - Nigeria's No. 1 Site for Tokunbo Cars" />
<meta property="og:url" content="https://tokunbocars.ng/" />
<meta property="og:site_name" content="TokunboCars.NG" />
                
                

		<link rel="shortcut icon" type="image/x-icon" href="<?= base_url()?>images/favicon.png" />

		<link href="<?= base_url()?>css/master.css" rel="stylesheet">

		<!-- SWITCHER -->
		<link rel="stylesheet" id="switcher-css" type="text/css" href="<?= base_url()?>assets/switcher/css/switcher.css" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="<?= base_url()?>assets/switcher/css/color2.css" title="color2" media="all" data-default-color="true"/>
        <link href="<?php echo base_url(); ?>assets/admin/css/sweetalert.css" rel="stylesheet" type="text/css" />
		<!-- <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/owl-carousel/owl.carousel.css"> -->
		<!-- <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/owl-carousel/owl.theme.css"> -->


		<!--[if lt IE 9]>
		<script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
                
                
                <!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
 fbq('init', '396502644107667'); 
fbq('track', 'PageView');
</script>
<noscript>
 <img height="1" width="1" 
src="https://www.facebook.com/tr?id=396502644107667&ev=PageView
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-113820192-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-113820192-1');
</script>

	</head><body class="m-listingsTwo" data-equal-height=".b-auto__main-item">
            <?php 
$sold = $this->model_getvalues->getCount("cars", "status", 4);
$avail = $this->model_getvalues->getCount("cars", "status !=", 4);
 ?>

		<!-- Loader -->
		<!-- <div id="page-preloader"><span class="spinner"></span></div> -->
		<!-- Loader end -->
		<!-- Start Switcher -->
		
		<!-- End Switcher -->
	
                <header class="b-topBar wow slideInDown" data-wow-delay="0.7s" style="background-color: rgb(152, 20, 10)">
			<div class="container">
				


				<div class="row">
					<div class="col-md-6 col-xs-12">
                                            
                                    <form class='s-submit' method="post" action="<?= base_url() ?>search/header_search">
                                            <div class="b-submit__main-contacts-price-input" style="margin-top: 5px">
													<span class="fa fa-search"></span>
                                                                                                        <input type='text' name="txtSearch" placeholder="Search cars by VIN, Stock, Make, Model or Year"/>
													<button class="b-submit__main-contacts-price-input-usd">
														Search
													</button>
												</div>
                                            </form>
					</div>
                                    
					

					<div class="col-md-6 col-xs-12">
                                            <nav class="b-topBar__nav" style="border: none">
							<ul>
                                                            <li style="border: none; float: left"><a href="#" style="text-decoration: none"><?= $avail + 71 ?> Cars Available, 163 Cars Sold</a></li>
								<?php 
								if (!isset($_SESSION['email'])) {?>
									<li><a href="<?php echo base_url() ."users/register";?>">Register</a></li>
                                                                        <li style="border: none"><a href="<?php echo base_url() ."users/login";?>">Login </a> </li>
								<?php } ?>
							<?php
							if (isset($_SESSION['email'])) {
                                                            
                $user = $this->model_getvalues->getDetails("users", "email", $_SESSION['email']);
                                                            ?>
								<li style="border: none"><a href="<?php echo base_url() ."users/dashboard";?>">Dashboard (<?= $user['fullname'] ?>) </a> </li>
								<?php } ?>

								
							</ul>
						</nav>
					</div>
					
					</div>
				</div>
			</div>
		</header><!--b-topBar-->

		<nav class="b-nav">
			<div class="container">
				<div class="row">
					<div class="col-sm-3 col-xs-4">
						<div class="b-nav__logo wow slideInLeft" data-wow-delay="0.3s">
                                                    <img src="<?= base_url() ?>images/tokunbo-cars-logo2.jpg" style="width: 250px" />
						</div>
					</div>
					<div class="col-sm-9 col-xs-8">
						<div class="b-nav__list wow slideInRight" data-wow-delay="0.3s">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>
							<div class="collapse navbar-collapse navbar-main-slide" id="nav">
								<ul class="navbar-nav-menu">
									<!-- <li class="dropdown">
										<a class="dropdown-toggle" data-toggle='dropdown' href="index">Home <span class="fa fa-caret-down"></span></a>
										<ul class="dropdown-menu h-nav">
											<li><a href="home.html">Home Page 1</a></li>
											<li><a href="home-2.html">Home Page 2</a></li>
										</ul>
									</li>
									<li class="dropdown">
										<a class="dropdown-toggle" data-toggle='dropdown' href="list">Grid <span class="fa fa-caret-down"></span></a>
										<ul class="dropdown-menu h-nav">
											<li><a href="listings.html">listing 1</a></li>
											<li><a href="listingsTwo.html">listing 2</a></li>
											<li><a href="listTable.html">listing 3</a></li>
											<li><a href="listTableTwo.html">listing 4</a></li>
										</ul>
									</li> -->
									<li><a href="<?php echo base_url() ;?>">Home</a></li>
									<li><a href="<?php echo base_url() ."about";?>">About</a></li>
                                                                        <li class="dropdown">
										<a class="dropdown-toggle" data-toggle='dropdown' href="list">View All Cars <span class="fa fa-caret-down"></span></a>
										<ul class="dropdown-menu h-nav">
											<li><a href="<?php echo base_url() ."cars/buy_now";?>">Buy Now (Cheapest)</a></li>
											<li><a href="<?php echo base_url() ."cars/sail";?>"> On Sail (Cheaper)</a></li>
											<li><a href="<?php echo base_url() ."cars/ground";?>"> On Ground (Cheap)</a></li>
										</ul>
									</li>
									<li><a href="<?php echo base_url() ."payment-plans";?>">Payment Options </a></li>
									
                                                                          <li class="dropdown">
										<a class="dropdown-toggle" data-toggle='dropdown' href="list">Useful Links <span class="fa fa-caret-down"></span></a>
										<ul class="dropdown-menu h-nav">
                                                                                    <li><a href="<?php echo base_url() ."request";?>">Request A Car</a></li>
                                                                                    <li><a href="<?php echo base_url() ."agents";?>">Become an Agent</a></li>
                                                                                    <li><a href="<?php echo base_url() ."partners";?>">Become a Reseller/Partner</a></li>
                                                                                    <li><a href="<?php echo base_url() ."tip";?>">TokunboCars.NG Investment Program (TIP)</a></li>
										</ul>
									</li>
									<li><a href="<?php echo base_url() ."contact";?>">Contact</a></li>
									<li><a href="<?php echo base_url() ."blog";?>">Blog</a></li>
									<!--<li><a href="<?php echo base_url() ."signup";?>">Car Dealers</a></li>-->
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</nav><!--b-nav-->
		<!--End of Header-->
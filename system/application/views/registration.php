<!DOCTYPE html>
<html>
	
<!-- Mirrored from coderthemes.com/ubold_1.1/dark/page-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 05 Dec 2015 17:22:52 GMT -->
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
		<meta name="author" content="Coderthemes">

		<link rel="shortcut icon" href="<?= base_url()?>asset/images/favicon_1.ico">

		<title>Registration </title>

		<link href="<?= base_url()?>asset/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url()?>asset/css/core.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url()?>asset/css/components.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url()?>asset/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url()?>asset/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url()?>asset/css/responsive.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="<?= base_url()?>asset/js/modernizr.min.js"></script>

<script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-69506598-1', 'auto');
          ga('send', 'pageview');
    </script>

	</head>
	<body>

        <div class="animationload">
            <div class="loader"></div>
        </div>

		<div class="account-pages"></div>
		<div class="clearfix"></div>
		<div class="wrapper-page">
			<div class=" card-box">
				<?php if (isset ($_SESSION['success'])) { ?>
				<?php echo $_SESSION['success']; ?>
				<?php } ?>
					
				<?php echo validation_errors(); ?>
				<div class="panel-heading">
					<h3 class="text-center">Create an <strong class="text-custom">Account</strong> </h3>
				</div>

				<div class="panel-body">
					<form class="form-horizontal m-t-20" action="<?php echo base_url() ."users/register";?>" method="post">

						<div class="form-group ">
							<div class="col-xs-12">
								<input class="form-control" type="text" name="fullname" required="" value="<?= set_value('fullname') ?>" placeholder="Fullname">
							</div>
						</div>

						<div class="form-group ">
							<div class="col-xs-12">
								<input class="form-control" type="email" name="email" required="" value="<?= set_value('email') ?>" placeholder="Email">
							</div>
						</div>

						<div class="form-group ">
							<div class="col-xs-12">
								<input class="form-control" type="text" name="phone" required="" placeholder="Phone Number" value="<?= set_value('phone') ?>">
							</div>
						</div>

						<div class="form-group ">
							<div class="col-xs-12">
								<input class="form-control" type="text" name="address" required="" value="<?= set_value('address') ?>" placeholder="Address">
							</div>
						</div>

						<div class="form-group ">
							<div class="col-xs-12">
								<input class="form-control" type="text" name="company" required="" value="<?= set_value('company') ?>" placeholder="Company">
							</div>
						</div>				
								

						<div class="form-group">
							<div class="col-xs-12">
								<input class="form-control" type="password" name="passwd" required="" placeholder="Password">
							</div>
						</div>

						<div class="form-group">
							<div class="col-xs-12">
								<input class="form-control" type="password" name="password2" required="" placeholder="Confirm Password">
							</div>
						</div>

						

						


						<div class="form-group">
							<div class="col-xs-12">
								<div class="checkbox checkbox-primary">
									<input id="checkbox-signup" type="checkbox" checked="checked">
									<label for="checkbox-signup">I accept <a href="#">Terms and Conditions</a></label>
								</div>
							</div>
						</div>

						<div class="form-group text-center m-t-40">
							<div class="col-xs-12">
								<button class="btn btn-pink btn-block text-uppercase waves-effect waves-light" name="submit" type="submit">
									Register
								</button>
							</div>
						</div>

					</form>

				</div>
			</div>

			<div class="row">
				<div class="col-sm-12 text-center">
					<p>
						Already have account?<a href="login" class="text-primary m-l-5"><b> Login</b></a>
					</p>
				</div>
			</div>

		</div>

		<script>
			var resizefunc = [];
		</script>

		<!-- jQuery  -->
        <script src="<?= base_url()?>asset/js/jquery.min.js"></script>
        <script src="<?= base_url()?>asset/js/bootstrap.min.js"></script>
        <script src="<?= base_url()?>asset/js/detect.js"></script>
        <script src="<?= base_url()?>asset/js/fastclick.js"></script>
        <script src="<?= base_url()?>asset/js/jquery.slimscroll.js"></script>
        <script src="<?= base_url()?>asset/js/jquery.blockUI.js"></script>
        <script src="<?= base_url()?>asset/js/waves.js"></script>
        <script src="<?= base_url()?>asset/js/wow.min.js"></script>
        <script src="<?= base_url()?>asset/js/jquery.nicescroll.js"></script>
        <script src="<?= base_url()?>asset/js/jquery.scrollTo.min.js"></script>


        <script src="<?= base_url()?>asset/js/jquery.core.js"></script>
        <script src="<?= base_url()?>asset/js/jquery.app.js"></script>

	</body>

<!-- Mirrored from coderthemes.com/ubold_1.1/dark/page-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 05 Dec 2015 17:22:52 GMT -->
</html>
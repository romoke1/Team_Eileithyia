<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TokunboCars Admin</title>
<!--// Stylesheets //-->
<link href="<?php echo base_url(); ?>assets/admin/css/style.css" rel="stylesheet" media="screen" />
<link href="<?php echo base_url(); ?>assets/admin/css/bootstrap.css" rel="stylesheet" media="screen" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/icheck.min.js"></script>
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
</head>

<body>
<!-- Wrapper Start -->
<div class="loginwrapper whiter">
	<span class="circle"></span>
	<div class="loginone">
    	<header>
            ADMIN
            <p>Enter your credentials to login to your account</p>
        </header>
        <?php echo form_open() ?>
        	<div class="username">
        		<input type="text" class="form-control" placeholder="Enter your email" name="txtAdminUsername" />
                <i class="glyphicon glyphicon-user"></i>
            </div>
            <div class="password">
            	<input type="password" class="form-control" placeholder="Enter your password" name="txtAdminPasswd" />
                <i class="glyphicon glyphicon-lock"></i>
            </div>
            <div class="custom-radio-checkbox">
                <input tabindex="1" type="checkbox" class="bluecheckradios">
                <label>Remember me</label>
            </div>
			<script>
				$(document).ready(function(){
				  $('.bluecheckradios').iCheck({
					checkboxClass: 'icheckbox_flat-blue',
					radioClass: 'iradio_flat-blue',
					increaseArea: '20%' // optional
				  });
				});  	
			</script>
            <input type="submit" class="btn btn-primary style2" value="Sign In" />
        <?php echo form_close() ?>
        <footer style='text-align: center'>
        	<!--<a href="#" class="forgot pull-left">I forgot my password</a>-->
            <div class="clear"></div>
            
            <?php echo validation_errors(); ?>
        </footer>
    </div>
</div>
<!-- Wrapper End -->
</body>
</html>

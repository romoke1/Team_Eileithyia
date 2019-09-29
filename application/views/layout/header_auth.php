<!DOCTYPE html>
<html>
<head>

<style type="text/css">
	


.top-menu{
    /*background-color: rgb(21,17,92);*/
    font-family: 'Lato', sans-serif;


}

#navbarText ul li a{		

    color:white;
    padding: 20px;
}

.details button{

	width: 200px;
	height: 50px;
	border-radius: 10px;
	border: 0px;
	color: #650099;
	font-weight: bold;
	font-size: 1.3em;
}


.details button:hover{

	
	

	color: white;
	background-color: blue;
}


.details h2{

	
	color: white;
	
}


.details p{

	
	color: white;
	font-size: 1.2em;
}

.study-image img{

	width: 90%;
	height: 60%;
	margin-top: 20%;
}

.footer{

	border-top: 2px solid white;
	color: white;
}

.footer i{

	color: white;
}


section {
        background: #006494;

/*      background:  linear-gradient(blue,purple);
	   Fallback for browsers that don't support gradients 
        background: blue;
         For Safari 5.1 to 6.0 
        background: -webkit-linear-gradient(blue, purple);
         For Internet Explorer 10 
        background: -ms-linear-gradient(blue, purple);
         Standard syntax 
        background: linear-gradient(blue, purple);
        height: 625px;*/

}


.footer .socialMedia a{
	padding: 20px;
	font-size: 20px;
}

.footer .socialMedia a i{
	padding-top: 10px;
	
}

.footer .copyRight{
	
	font-size: 1em;
	font-weight: bold;
	padding-top: 10px;
}

/*.instructor-signupForm{

	margin-top: 5%;
	margin-bottom: 3%;
}*/

/*.instructor-signupForm input[type="text"]{

	
	margin-bottom: 50px;
}*/

</style>

 

<!--ADDING THE CSS FOR BOOTSTRAP -->

	<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">

<!--ADDING THE JS FOR BOOTSTRAP -->
<script type="text/javascript" src="<?= base_url()?>assets/bootstrap/js/jquery.js"></script>

<script type="text/javascript" src="<?= base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>

<!-- Adding Toastr Files -->
<link href="<?= base_url()?>assets/toast/toastr.min.css" rel="stylesheet">
<script src="<?= base_url()?>assets/toast/toastr.min.js"></script>

<title><?= $title ?></title>
</head>
<body>

<!-- MENU STARTS FROM HERE -->
<header>
	<div class="container-fluid">
		<div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top-menu">

                           <nav class="navbar navbar-expand-lg navbar-light text-white">
                        <a class="navbar-brand" href="<?= base_url() ?>" style="color: black;"><i class="fa fa-graduation-cap" style="font-size:30px; color: black;"></i><b>Thyia E-Learning Classroom</b></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarText">
                            <ul class="navbar-nav ml-auto">
                                  <li class="nav-item active">
                                      <a class="nav-link" href="<?= base_url() ?>student/signup" style="color: black; font-weight: bold;">Student Enroll<span class="sr-only">(current)</span></a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url() ?>teacher/signup" style="color: black; font-weight: bold;">Become a Teacher</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url() ?>teacher/signin" style="color: black; font-weight: bold;">Login as Teacher</a>
                                  </li>

                                  <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url() ?>student/signin" style="color: black; font-weight: bold;">Login as Student</a>
                                  </li>

                            </ul>

                        </div>
                    </nav>

                    </div>
		</div>
	</div>
</header>

<!-- MENU ENDS FROM HERE -->
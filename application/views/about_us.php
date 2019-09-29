<!DOCTYPE html>
<html>
    <head>

        <style type="text/css">
            .top-menu{
                background-color: white);
                font-family: 'Lato', sans-serif;
            }

            #navbarText ul li a{		
                color:black;
                padding: 20px;
            }

            .details button{
                width: 200px;
                height: 50px;
                border-radius: 10px;
                border: 0px;
                color: white;
                font-weight: bold;
                font-size: 1.3em;
            }


            .details button:hover{




                color: white;
                background-color: white;
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


                /* background:  linear-gradient(blue,purple); */
                /* Fallback for browsers that don't support gradients */
                /* background: blue; */
                /* For Safari 5.1 to 6.0 */
                /* background: -webkit-linear-gradient(blue, purple); */
                /* For Internet Explorer 10 */
                /* background: -ms-linear-gradient(blue, purple); */
                /* Standard syntax */
                /* background: linear-gradient(blue, purple); */
                background: #006494;

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


            .aboutUs-top-left h1{
                color: white;
                text-align: center;
                padding-top: 30%;
            }

            .aboutUs-top-left p{
                color: white;
                text-align: center;
                font-size: 1.2em;
            }

            .aboutUs-top-right img{
                width: 80%;
                margin-top: 15%;
                margin-left: 10%;


            }


            .aboutUs-middle-left img{

                width: 60%;
                margin-left: 25%;

            }

            .aboutUs-middle-right{

                color: white;
                text-align: center;
                font-size: 2em;
            }

            .aboutUs-middle-right ul li{

                list-style: none;

            }


            .aboutUs-middle-right ul{

                margin-top: 10%;

            }

            .aboutUs-images-team img{

                width: 120px;
                height: 120px;
                margin-top: 10%;
            }

            .aboutUs-images-team h4,p{

                color: white;
                text-align: center;
            }



            .aboutUs-images-team .team-images{

                border: 2px solid white;

                margin-top: 5%;
            }


            .aboutUs-images-team .nav{
                padding-left: 40%;
                padding-bottom: 15%;
            }

            .aboutUs-images-team .nav .fa{
                padding:5px;
                color: white;
            }
        </style>



        <!--ADDING THE CSS FOR BOOTSTRAP -->

        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


        <link href="https://fonts.googleapis.com/css?family=Acme|Be+Vietnam|Lato|Righteous&display=swap" rel="stylesheet">

        <title>About Us | Thyia E-Learning Classroom</title>
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

        
<section>
	<div class="container-fluid">
		<div class="row">

<!-- ABOUT US TO START FROM HERE-->
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 aboutUs-top-right">
				<h1 style="text-align: center; color: white; padding-top: 50px; font-family: 'Righteous', cursive;
">Meet Us</h1>
			</div>


			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 aboutUs-top-left" >
				<h1>About Team Eilethyia</h1>
				<p style="	font-family: 'Be Vietnam', sans-serif;">
					We are all very different and unique being. Born in diffrent cities, diffrent time, different race, different origin. But we have something that unites us and that is solving human problems and making life easy for human using technology. We are just more than a team, we are Family.
				</p>
			</div>


			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 aboutUs-top-right">
				<img src="https://res.cloudinary.com/afaraitsulaimon/image/upload/v1569576407/ivugfx5sdu6ldlxxesvx.png">
			</div>

	   </div>
	</div>
	
<!-- ABOUT US TOP ENDS FROM HERE-->

			

 <!-- ABOUT US MIDDLE START FROM HERE-->

<div class="container-fluid" style="margin-top: 100px; margin-bottom: 100px;">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 aboutUs-middle-left" >

				<img src="https://res.cloudinary.com/afaraitsulaimon/image/upload/v1569576402/woxlulgqmqkk6tnanxws.jpg">

				
			</div>


			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 aboutUs-middle-right">

					<ul style="font-family: 'Acme', sans-serif;">
						<li>Creativity is our key</li>
						<li>World class UI/UX</li>
						<li>Unique Frontend Designers</li>
						<li>Excellent Backend Engineers </li>
						<li>Great Digital Marketers</li>
					</ul>
			</div>
        </div>
	</div>
<!-- ABOUT US MIDDLE ENDS HERE FROM HERE-->





 <!-- ABOUT US TEAM IMAGES START FROM HERE NO1-->

<div class="container-fluid">
		<div class="row justify-content-around aboutUs-images-team">
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 team-images"  >

              <img src="https://res.cloudinary.com/ufonumo/image/upload/v1569576516/1551376595934_720_ykoqgk.jpg" class="mx-auto d-block rounded-circle">
              <h4>Amah Gift</h4>
              <p>Back-end Developer (Team Lead)</p>
              <ul class="nav ">
              	
              	<li><a href="#facebook.com/thyiaelearn"><i class='fa fa-facebook'></i></a></li>
              	<li><a href="#facebook.com/thyiaelearn"><i class='fa fa-twitter'></i></a></li>
              	<li><a href="#facebook.com/thyiaelearn"><i class='fa fa-github'></i></a></li>
              </ul>
				
			</div>


			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 team-images">
				<img src="https://res.cloudinary.com/ufonumo/image/upload/v1566585776/IMG_20190123_131320_mccadv.jpg" class="mx-auto d-block rounded-circle">
              <h4>Ufonabasi Umo</h4>
              <p>Front-end Developer</p>
              <ul class="nav">
              	
              	<li><a href="#facebook.com/thyiaelearn"><i class='fa fa-facebook'></i></a></li>
              	<li><a href="#facebook.com/thyiaelearn"><i class='fa fa-twitter'></i></a></li>
              	<li><a href="#facebook.com/thyiaelearn"><i class='fa fa-github'></i></a></li>
              </ul>
					
			</div>
        


			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 team-images" >

				<img src="https://res.cloudinary.com/dznivpcs7/image/upload/v1569578628/personal%20pictures/ogwo.jpg" class="mx-auto d-block rounded-circle">
              <h4>Ogwo Chinaza Ogwo</h4>
              <p>Mobile Android Developer </p>
              <ul class="nav">
              	
              	<li><a href="#facebook.com/thyiaelearn"><i class='fa fa-facebook'></i></a></li>
              	<li><a href="#facebook.com/thyiaelearn"><i class='fa fa-twitter'></i></a></li>
              	<li><a href="#facebook.com/thyiaelearn"><i class='fa fa-github'></i></a></li>
              </ul>
			</div>

		</div>
	</div>		
<!-- ABOUT US TEAM IMAGES ENDS HERE NO1-->





 <!-- ABOUT US TEAM IMAGES START FROM HERE NO2-->

<div class="container-fluid">
		<div class="row justify-content-around aboutUs-images-team">
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 team-images"  >

              <img src="https://res.cloudinary.com/ndekong/image/upload/v1569576128/nucb2h5xv0go9g0p5xhj.jpg" class="mx-auto d-block rounded-circle">
              <h4>Ndiuwem Ekong</h4>
              <p>Mobile Android Developer</p>
              <ul class="nav">
              	
              	<li><a href="#facebook.com/thyiaelearn"><i class='fa fa-facebook'></i></a></li>
              	<li><a href="#facebook.com/thyiaelearn"><i class='fa fa-twitter'></i></a></li>
              	<li><a href="#facebook.com/thyiaelearn"><i class='fa fa-github'></i></a></li>
              </ul>
				
			</div>


			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 team-images">
				<img src="https://res.cloudinary.com/devamby/image/upload/v1566569040/IMG-20190821-WA0034_oqkhso.jpg" class="mx-auto d-block rounded-circle">
              <h4>Akindipe Bukola</h4>
              <p>Front-end Developer</p>
              <ul class="nav">
              	
              	<li><a href="#facebook.com/thyiaelearn"><i class='fa fa-facebook'></i></a></li>
              	<li><a href="#facebook.com/thyiaelearn"><i class='fa fa-twitter'></i></a></li>
              	<li><a href="#facebook.com/thyiaelearn"><i class='fa fa-github'></i></a></li>
              </ul>
					
			</div>
        


			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 team-images" >

				<img src="https://res.cloudinary.com/bimie/image/upload/v1569530359/m8gluqlas5opd16djycy.jpg" class="mx-auto d-block rounded-circle">
              <h4>Babatola Temitope</h4>
              <p>Front-end Developer</p>
              <ul class="nav">
              	
              	<li><a href="#facebook.com/thyiaelearn"><i class='fa fa-facebook'></i></a></li>
              	<li><a href="#facebook.com/thyiaelearn"><i class='fa fa-twitter'></i></a></li>
              	<li><a href="#facebook.com/thyiaelearn"><i class='fa fa-github'></i></a></li>
              </ul>
			</div>

		</div>
	</div>		
<!-- ABOUT US TEAM IMAGES ENDS HERE NO2-->






 <!-- ABOUT US TEAM IMAGES START FROM HERE NO3-->

<div class="container-fluid">
		<div class="row justify-content-around aboutUs-images-team">
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 team-images"  >

              <img src="https://res.cloudinary.com/ufonumo/image/upload/v1569576003/IMG-20190927-WA0001_fadxzh.jpg" class="mx-auto d-block rounded-circle">
              <h4>Echefu Louis </h4>
              <p>Digital Marketer</p>
              <ul class="nav">
              	
              	<li><a href="#facebook.com/thyiaelearn"><i class='fa fa-facebook'></i></a></li>
              	<li><a href="#facebook.com/thyiaelearn"><i class='fa fa-twitter'></i></a></li>
              	<li><a href="#facebook.com/thyiaelearn"><i class='fa fa-github'></i></a></li>
              </ul>
				
			</div>


			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 team-images">
				<img src="https://res.cloudinary.com/akosworldwide/image/upload/v1567509276/Personal%20Images/Ojeba_John_Akoji_jhcczz.png" class="mx-auto d-block rounded-circle">
              <h4>Ojeba John Akoji </h4>
              <p>Designer/Front-end Developer</p>
              <ul class="nav">
              	
              	<li><a href="#facebook.com/thyiaelearn"><i class='fa fa-facebook'></i></a></li>
              	<li><a href="#facebook.com/thyiaelearn"><i class='fa fa-twitter'></i></a></li>
              	<li><a href="#facebook.com/thyiaelearn"><i class='fa fa-github'></i></a></li>
              </ul>
					
			</div>
        


			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 team-images" >

				<img src="https://res.cloudinary.com/dhtxiw89g/image/upload/v1566647586/IMG_20180606_083511.jpg" class="mx-auto d-block rounded-circle">
              <h4>Okpala Faith </h4>
              <p>Front-end Developer</p>
              <ul class="nav">
              	
              	<li><a href="#facebook.com/thyiaelearn"><i class='fa fa-facebook'></i></a></li>
              	<li><a href="#facebook.com/thyiaelearn"><i class='fa fa-twitter'></i></a></li>
              	<li><a href="#facebook.com/thyiaelearn"><i class='fa fa-github'></i></a></li>
              </ul>
			</div>

		</div>
	</div>		
<!-- ABOUT US TEAM IMAGES ENDS HERE NO3-->



	
 

  <!-- ABOUT US TEAM IMAGES START FROM HERE NO4-->

 <div class="container-fluid">
 		<div class="row justify-content-around aboutUs-images-team">
 			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 team-images"  >

               <img src="https://res.cloudinary.com/abie/image/upload/v1566808171/Ebere%20Image%20Start%20NG/Slack_qlrfrf.jpg" class="mx-auto d-block rounded-circle">
               <h4>Eberechukwu Mabi </h4>
               <p>Digital Marketer</p>
               <ul class="nav">
               	
               	<li class=" fa-align-center"><a href="#facebook.com/thyiaelearn"><i class='fa fa-facebook'></i></a></li>
               	<li><a href="#facebook.com/thyiaelearn"><i class='fa fa-twitter'></i></a></li>
               	<li><a href="#facebook.com/thyiaelearn"><i class='fa fa-github'></i></a></li>
               </ul>
 				
 			</div>


 			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 team-images">
 				<img src="https://res.cloudinary.com/afaraitsulaimon/image/upload/v1566558222/jnuxyo4qweq4vbfjkryi.jpg" class="mx-auto d-block rounded-circle">
               <h4>Afarait Sulaimon Bola</h4>
               <p>Back-end Developer</p>
               <ul class="nav">
               	
               	<li><a href="#facebook.com/thyiaelearn"><i class='fa fa-facebook'></i></a></li>
               	<li><a href="#facebook.com/thyiaelearn"><i class='fa fa-twitter'></i></a></li>
               	<li><a href="#facebook.com/thyiaelearn"><i class='fa fa-github'></i></a></li>
               </ul>
 					
 			</div>
         


 			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 team-images" >

 				<img src="https://res.cloudinary.com/slarin/image/upload/v1569551113/seun_fadeyi_f0qmr4.jpg" class="mx-auto d-block rounded-circle">
               <h4>Seun Fadeyi</h4>
               <p>Front-end Developer</p>
               <ul class="nav">
               	
               	<li><a href="#facebook.com/thyiaelearn"><i class='fa fa-facebook'></i></a></li>
               	<li><a href="#facebook.com/thyiaelearn"><i class='fa fa-twitter'></i></a></li>
               	<li><a href="#facebook.com/thyiaelearn"><i class='fa fa-github'></i></a></li>
               </ul>
 			</div>

 		</div>
 	</div>		
 <!-- ABOUT US TEAM IMAGES ENDS HERE NO4-->


  <!-- ABOUT US TEAM IMAGES START FROM HERE NO5-->

 <div class="container-fluid">
 		<div class="row justify-content-around aboutUs-images-team">
 			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 team-images"  >

               <img src="https://res.cloudinary.com/jolugba/image/upload/v1566644226/IMG_20190815_114239_070_pvt8zf.jpg" class="mx-auto d-block rounded-circle">
               <h4>Esther Jolugba</h4>
               <p>Mobile(Android)</p>
               <ul class="nav">
               	
               	<li><a href="#facebook.com/thyiaelearn"><i class='fa fa-facebook'></i></a></li>
               	<li><a href="#facebook.com/thyiaelearn"><i class='fa fa-twitter'></i></a></li>
               	<li><a href="#facebook.com/thyiaelearn"><i class='fa fa-github'></i></a></li>
               </ul>
 				
 			</div>


 			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 team-images">
 				<img src="https://res.cloudinary.com/dirkmal/image/upload/v1569582037/me.jpg" class="mx-auto d-block rounded-circle">
               <h4>Kamal Samaila</h4>
               <p>Backend Developer</p>
               <ul class="nav">
               	
               	<li><a href="#facebook.com/thyiaelearn"><i class='fa fa-facebook'></i></a></li>
               	<li><a href="#facebook.com/thyiaelearn"><i class='fa fa-twitter'></i></a></li>
               	<li><a href="#facebook.com/thyiaelearn"><i class='fa fa-github'></i></a></li>
               </ul>
 					
 			</div>
         


 			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 team-images" >

 				<img src="https://res.cloudinary.com/ayomipo9298/image/upload/v1567763533/IMG_20190204_231240_535_vflm0b.jpg" class="mx-auto d-block rounded-circle">
               <h4>Akinola Ayomipo </h4>
               <p>Backend Developer</p>
               <ul class="nav">
               	
               	<li><a href="#facebook.com/thyiaelearn"><i class='fa fa-facebook'></i></a></li>
               	<li><a href="#facebook.com/thyiaelearn"><i class='fa fa-twitter'></i></a></li>
               	<li><a href="#facebook.com/thyiaelearn"><i class='fa fa-github'></i></a></li>
               </ul>
 			</div>

 		</div>
 	</div>		
 <!-- ABOUT US TEAM IMAGES ENDS HERE NO5-->






  <!-- ABOUT US TEAM IMAGES START FROM HERE NO6-->

 <div class="container-fluid">
 		<div class="row justify-content-around aboutUs-images-team">
 			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 team-images"  >

               <img src="https://res.cloudinary.com/sweetim/image/upload/v1566577735/start.ng/passport_2_pmxyzp.jpg" class="mx-auto d-block rounded-circle">
               <h4>Ndifreke Edem </h4>
               <p>Digital Marketer</p>
               <ul class="nav">
               	
               	<li><a href="#facebook.com/thyiaelearn"><i class='fa fa-facebook'></i></a></li>
               	<li><a href="#facebook.com/thyiaelearn"><i class='fa fa-twitter'></i></a></li>
               	<li><a href="#facebook.com/thyiaelearn"><i class='fa fa-github'></i></a></li>
               </ul>
 				
 			</div>


 			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 team-images">
 				<img src="https://res.cloudinary.com/ufonumo/image/upload/v1569530817/IMG_20190923_205449_285_hnmeap.jpg" class="mx-auto d-block rounded-circle">
               <h4>Ore Remilekun </h4>
               <p>UI/UX</p>
               <ul class="nav">
               	
               	<li><a href="#facebook.com/thyiaelearn"><i class='fa fa-facebook'></i></a></li>
               	<li><a href="#facebook.com/thyiaelearn"><i class='fa fa-twitter'></i></a></li>
               	<li><a href="#facebook.com/thyiaelearn"><i class='fa fa-github'></i></a></li>
               </ul>
 					
 			</div>
         


 			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 team-images" >

 				<img src="https://res.cloudinary.com/romoke1/image/upload/v1566550802/img/atinu" class="mx-auto d-block rounded-circle">
               <h4>Atinu Odunuga</h4>
               <p>Front-end Developer</p>
               <ul class="nav">
               	
               	<li><a href="#facebook.com/thyiaelearn"><i class='fa fa-facebook'></i></a></li>
               	<li><a href="#facebook.com/thyiaelearn"><i class='fa fa-twitter'></i></a></li>
               	<li><a href="#facebook.com/thyiaelearn"><i class='fa fa-github'></i></a></li>
               </ul>
			 </div>
			 

			 

 		</div>
	 </div>	
	 
	 
 <!-- ABOUT US TEAM IMAGES ENDS HERE NO7-->
   

 <div class="container-fluid">
	<div class="row justify-content-around aboutUs-images-team">
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 team-images"  >

		  <img src="https://res.cloudinary.com/ufonumo/image/upload/v1569610631/img_20171222_155713_720_v2t1x8.jpg" class="mx-auto d-block rounded-circle">
		  <h4>Chineme Chukwu</h4>
		  <p>Front-End Developer</p>
		  <ul class="nav">
			  
			  <li><a href="#facebook.com/thyiaelearn"><i class='fa fa-facebook'></i></a></li>
			  <li><a href="#facebook.com/thyiaelearn"><i class='fa fa-twitter'></i></a></li>
			  <li><a href="#facebook.com/thyiaelearn"><i class='fa fa-github'></i></a></li>
		  </ul>
			
		</div>


		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 team-images">
			<img src="https://res.cloudinary.com/peculiarpec/image/upload/v1569601102/446721535_407778_tjwlwu.jpg" class="mx-auto d-block rounded-circle">
		  <h4>Peculiar Umeh</h4>
		  <p>Mobile-(Android)</p>
		  <ul class="nav">
			  
			  <li><a href="#facebook.com/thyiaelearn"><i class='fa fa-facebook'></i></a></li>
			  <li><a href="#facebook.com/thyiaelearn"><i class='fa fa-twitter'></i></a></li>
			  <li><a href="#facebook.com/thyiaelearn"><i class='fa fa-github'></i></a></li>
		  </ul>
				
		</div>
	


		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 team-images" >

			<img src="https://res.cloudinary.com/ufonumo/image/upload/v1569614181/medp_720_g7r1hf.jpg" class="mx-auto d-block rounded-circle">
		  <h4>Badejo Adesire</h4>
		  <p>Mobile - (Android)</p>
		  <ul class="nav">
			  
			  <li><a href="#facebook.com/thyiaelearn"><i class='fa fa-facebook'></i></a></li>
			  <li><a href="#facebook.com/thyiaelearn"><i class='fa fa-twitter'></i></a></li>
			  <li><a href="#facebook.com/thyiaelearn"><i class='fa fa-github'></i></a></li>
		  </ul>
		</div>
		

		

	</div>
</div>		
<!-- ABOUT US TEAM IMAGES ENDS HERE NO7-->


	 
 <!-- ABOUT US TEAM IMAGES ENDS HERE NO7-->
   

 <div class="container-fluid">
	<div class="row justify-content-around aboutUs-images-team">
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 team-images"  >

		  <img src="https://res.cloudinary.com/ufonumo/image/upload/v1569705312/image_from_ios_720_ddr31o.jpg" class="mx-auto d-block rounded-circle">
		  <h4>Onyia Ifeanyichukwu Joel</h4>
		  <p>Mobile- (Andriod)</p>
		  <ul class="nav">
			  
			  <li><a href="#facebook.com/thyiaelearn"><i class='fa fa-facebook'></i></a></li>
			  <li><a href="#facebook.com/thyiaelearn"><i class='fa fa-twitter'></i></a></li>
			  <li><a href="#facebook.com/thyiaelearn"><i class='fa fa-github'></i></a></li>
		  </ul>
			
		</div>


		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 team-images">
			<img src="https://res.cloudinary.com/ufonumo/image/upload/v1569705312/img_20190905_100740_9_720_q8hilv.jpg" class="mx-auto d-block rounded-circle">
		  <h4>Jeremiah Eze</h4>
		  <p>Design/Digital marketing</p>
		  <ul class="nav">
			  
			  <li><a href="#facebook.com/thyiaelearn"><i class='fa fa-facebook'></i></a></li>
			  <li><a href="#facebook.com/thyiaelearn"><i class='fa fa-twitter'></i></a></li>
			  <li><a href="#facebook.com/thyiaelearn"><i class='fa fa-github'></i></a></li>
		  </ul>
				
		</div>
	


		

		

	</div>
</div>		
<!-- ABOUT US TEAM IMAGES ENDS HERE NO7-->






<!--footer part-->


		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center; color: white; margin-top: 50px; margin-bottom:30px;">
          
                    <a href="#top">top</a>
				</div>
			</div>
			
		</div>




	<!--footer part-->


		<div class="container footer">
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 copyRight">
                   <span>&copy Thyia E-Learning School 2019</span>

				</div>
 <!-- social media on footer starts here-->

    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
					<ul class=" nav fa-pull-right socialMedia">
						
						<li><a href="#facebook.com/thyiaelearn"><i class='fa fa-facebook'></i></a></li>
						<li><a href="#facebook.com/thyiaelearn"><i class='fa fa-twitter'></i></a></li>
						<li><a href="#facebook.com/thyiaelearn"><i class='fa fa-github'></i></a></li>
					</ul>

				</div>
			</div>
			
		</div>

</section>


        <!--ADDING THE JS FOR BOOTSTRAP -->
        <script type="text/javascript" src="bootstrap/js/jquery.js"></script>

        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>




    </body>
</html>
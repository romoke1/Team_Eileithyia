<!-- Contents Starts Here-->

		<section class="b-pageHeader">
			<div class="container">
				<h1 class=" wow zoomInLeft" data-wow-delay="0.5s">Contact Us</h1>
				<div class="b-pageHeader__search wow zoomInRight" data-wow-delay="0.5s">
					<h3>Get In Touch With Us Now</h3>
				</div>
			</div>
		</section><!--b-pageHeader-->

		<div class="b-breadCumbs s-shadow wow zoomInUp" data-wow-delay="0.5s">
			<div class="container">
				<a href="home" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span><a href="contact" class="b-breadCumbs__page m-active">Contact Us</a>
			</div>
		</div><!--b-breadCumbs-->

		

		<section class="b-contacts s-shadow">
			<div class="container">
				<div class="row">
					<div class="col-xs-6">
						<div class="b-contacts__form">
							<header class="b-contacts__form-header s-lineDownLeft wow zoomInUp" data-wow-delay="0.5s">
								<h2 class="s-titleDet">Contact Form</h2> 
							</header>
							<p class=" wow zoomInUp" data-wow-delay="0.5s">Enter your comments through the form below, and our customer service professionals will contact you as soon as possible.</p>
							<div id="success"></div>
							<form method="POST" action="<?= base_url();?>users/send_mail"  class="s-form wow zoomInUp" data-wow-delay="0.5s">
								<input type="text" placeholder="YOUR NAME" value="" name="name" id="user-name" />
								<input type="text" placeholder="EMAIL ADDRESS " value="" name="email" id="user-email" />
								<input type="text" placeholder="PHONE NO." value="" name="phone" id="user-phone" />
								<input type="text" placeholder="SUBJECT" value="" name="subject" id="user-name" />
								<textarea id="user-message" name="message" placeholder="COMMENT/SUGGESTIONS/FEEDBACK"></textarea>
								<button type="submit" class="btn m-btn" name="mail">SUBMIT NOW<span class="fa fa-angle-right"></span></button>
							</form>
						</div>
					</div>
					<div class="col-xs-6">
						<div class="b-contacts__address">
							<div class="b-contacts__address-hours">
								<h2 class="s-titleDet wow zoomInUp" data-wow-delay="0.5s">opening hours</h2>
								<div class="b-contacts__address-hours-main wow zoomInUp" data-wow-delay="0.5s">
									<div class="row">
										<div class="col-md-6 col-xs-12">
											<h5>Sales Department</h5>
											<p>Mon-Sat : 8:00am - 5:00pm <br/>Sunday is closed</p>
										</div>
										<div class="col-md-6 col-xs-12">
											<h5>Service Department</h5>
											<p>Mon-Fri : 8:00am - 5:00pm <br/>Sat & Sunday is closed</p>
										</div>
									</div>
								</div>
							</div>
							<div class="b-contacts__address-info">
								<h2 class="s-titleDet wow zoomInUp" data-wow-delay="0.5s">Contact Information</h2>
								<address class="b-contacts__address-info-main wow zoomInUp" data-wow-delay="0.5s">
									<div class="b-contacts__address-info-main-item">
										<span class="fa fa-home"></span>
										ADDRESS
										<p> 7, OYINLOLA STREET, SOBO BUS-STOP AKOWONJO, LAGOS</p>
									</div>
									<div class="b-contacts__address-info-main-item">
										<div class="row">
											<div class="col-lg-3 col-md-4 col-xs-12">
												<span class="fa fa-phone"></span>
												PHONE
											</div>
											<div class="col-lg-9 col-md-8 col-xs-12">
												<em>09060196754</em>
											</div>
										</div>
									</div>
									
									<div class="b-contacts__address-info-main-item">
										<div class="row">
											<div class="col-lg-3 col-md-4 col-xs-12">
												<span class="fa fa-envelope"></span>
												EMAIL
											</div>
											<div class="col-lg-9 col-md-8 col-xs-12">
												<em>support@tokunbocars.com</em>
											</div>
										</div>
									</div>
								</address>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section><!--b-contacts-->

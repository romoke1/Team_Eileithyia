<!-- Contents Starts Here-->
		<section class="b-pageHeader">
			<div class="container">
				<h1 class="wow zoomInLeft" data-wow-delay="0.7s">Custom Request</h1>
				<div class="b-pageHeader__search wow zoomInRight" data-wow-delay="0.7s">
					<h3>Get Your Dream Car</h3>
				</div>
			</div>
		</section><!--b-pageHeader-->

		<div class="b-breadCumbs s-shadow">
			<div class="container">
                            <a href="<?= base_url() ?>" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span><a href="about" class="b-breadCumbs__page m-active">Custom Request</a>
			</div>
		</div><!--b-breadCumbs-->

<!--		<section class="b-best">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-xs-12">
						<img class="img-responsive center-block wow zoomInUp" data-wow-delay="0.5s" alt="Request a Car" src="<?= base_url()?>/images/custom.jpg" />
					</div>
					<div class="col-sm-6 col-xs-12">
						<div class="b-best__info">
							<header class="s-lineDownLeft b-best__info-head">
								<h2 class="wow zoomInUp" data-wow-delay="0.5s">REQUEST FOR A SPECIFIC CAR
</h2>
							</header>
							<h6 class="wow zoomInUp" data-wow-delay="0.5s">Do you need a particular car but can't find it on our website?</h6>
							<p class="wow zoomInUp" data-wow-delay="0.5s">Place a custom request and we will respond in less than 24hrs. Please see below the simple steps in placing a custom request</p>
                                                       <ol class="s-list">
                                                            <li><span class="fa fa-check"></span>Register on this website. <a href="<?= base_url() ?>users/register">Click here to Register</a> </li>
								<li><span class="fa fa-check"></span>Wait for Activation Link in your email. Click on the Activation button when you receive the email. then Login with your Email and Password</li>
								<li><span class="fa fa-check"></span>Click on the 'Open Ticket' menu link on your dashboard</li>
								<li><span class="fa fa-check"></span>Select 'Custom Request' in the Department Drop down and type your description in the 'Message' textbox.</li>
								<li><span class="fa fa-check"></span>Click on the 'Submit' button and we will get back to you in less than 24hrs </li>
							</ol>
                                                            <div class="b-search__main-form-submit" style="text-align: left">
            <a href="<?= base_url() ?>users/register"><button type="button" class="btn m-btn">Register and Get Started<span class="fa fa-angle-right"></span></button></a>
                        </div>
						</div>
					</div>
				</div>
			</div>
		</section>
                -->
                <!--b-best-->

		<section class="b-best">
			<div class="container">
				<div class="row">
                                    <?= validation_errors()?>
                                    <?= $status ?>
					<div class="col-sm-6 col-xs-12">
						<img class="img-responsive center-block wow zoomInUp" data-wow-delay="0.5s" alt="Request a Car" src="<?= base_url()?>/images/custom.jpg" />
					</div>
					<div class="col-sm-6 col-xs-12">
						<div class="b-best__info">
							<header class="s-lineDownLeft b-best__info-head">
								<h2 class="wow zoomInUp" data-wow-delay="0.5s">REQUEST FOR A SPECIFIC CAR
</h2>
							</header>
							<h6 class="wow zoomInUp" data-wow-delay="0.5s">Do you need a particular car but can't find it on our website?</h6>
							<p class="wow zoomInUp" data-wow-delay="0.5s">Place a custom request and we will respond in less than 24hrs. Please see below the simple steps in placing a custom request</p>
                                                       
                                                        <form method="POST" action="<?= base_url(); ?>pages/request"  class="s-form wow zoomInUp" data-wow-delay="0.5s">
                                                            
                                                            <div class="row">
                                                            
                                                                <div class="col-md-6">
                                                                    <input type="text" name="txtFname" required="" value="<?= set_value('txtFname') ?>" placeholder="Fullname"  />
                                                                </div>
                                                            
                                                                <div class="col-md-6">
                                                                    <input type="text" name="txtSubject" required="" value="<?= set_value('txtSubject') ?>" placeholder="Subject"  />
                                                                </div>
                                                                
                                                                <div class="col-md-6">
                                                                    <input type="email" name="txtEmail" required="" value="<?= set_value('txtEmail') ?>" placeholder="Email" />
                                                                </div>
                                                                
                                                                <div class="col-md-6">
                                                                    <input type="text" name="txtPhone" required="" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" placeholder="Phone Number" value="<?= set_value('txtPhone') ?>" />
                                                                </div>
                                                                
                                                                <div class="col-md-12">
                                                                    <textarea id="user-message" name="txtDetails" placeholder="ENTER FULL DETAILS OF THE CAR YOU WANT HERE" required=""></textarea>
                                                                    <button type="submit" name="request" class="btn m-btn">REQUEST NOW<span class="fa fa-angle-right"></span></button>
                                                                </div>
                                                           
                                                            </div>
                                                            
                                                        </form>
                                                        
<!--                                                        <ol class="s-list">
                                                            <li><span class="fa fa-check"></span>Register on this website. <a href="<?= base_url() ?>users/register">Click here to Register</a> </li>
								<li><span class="fa fa-check"></span>Wait for Activation Link in your email. Click on the Activation button when you receive the email. then Login with your Email and Password</li>
								<li><span class="fa fa-check"></span>Click on the 'Open Ticket' menu link on your dashboard</li>
								<li><span class="fa fa-check"></span>Select 'Custom Request' in the Department Drop down and type your description in the 'Message' textbox.</li>
								<li><span class="fa fa-check"></span>Click on the 'Submit' button and we will get back to you in less than 24hrs </li>
							</ol>
                                                            <div class="b-search__main-form-submit" style="text-align: left">
            <a href="<?= base_url() ?>users/register"><button type="button" class="btn m-btn">Register and Get Started<span class="fa fa-angle-right"></span></button></a>
                        </div>-->
						</div>
					</div>
				</div>
			</div>
		</section><!--b-best-->


		<section class="b-more">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-xs-12">
						<div class="b-more__why wow zoomInLeft" data-wow-delay="0.5s">
							<h2 class="s-title">WHY CHOOSE US</h2>
							<p>Tokunbo Cars Nigeria is your best option for a reliable car purchase  and here is our promise to you:</p>
							<ul class="s-list">
								<li><span class="fa fa-check"></span>No hidden Charges</li>
								<li><span class="fa fa-check"></span>Cars will always be cheaper on TokunboCars.ng with minimum N500,000 difference from prevailing market price</li>
								<li><span class="fa fa-check"></span>All cars will be landing in lagos port to eradicate fear of fake customs paper </li>
								<li><span class="fa fa-check"></span>All custom duties will be paid in full on all cars so you dont have to worry about customs harassment</li>
								<li><span class="fa fa-check"></span>Our payment options will always be flexible </li>
								<li><span class="fa fa-check"></span>Delivery will always be on schedule, no unnecessary wait time </li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6 col-xs-12">
						<div class="b-more__info wow zoomInRight" data-wow-delay="0.5s">
							<h2 class="s-title">MORE INFO</h2>
							<div class="b-more__info-block">
								<div class="b-more__info-block-title">CHEAPEST PRICE YOU CAN GET<a class="j-more" href="#"><span class="fa fa-angle-left"></span></a></div>
								<div class="b-more__info-block-inside j-inside">
									<p>We boast of the cheapest car prices yet with premium quality, we are assure you that you can not get it cheaper elsewhere.</p>
								</div>
							</div>
							<div class="b-more__info-block">
								<div class="b-more__info-block-title">LARGE NUMBER OF VEHICLES<a href="#" class="j-more"><span class="fa fa-angle-left"></span></a></div>
								<div class="b-more__info-block-inside j-inside">
									<p>We offer a wide range makes and model that will suit your taste, your taste is our business.</p>
								</div>
							</div>
							<div class="b-more__info-block">
								<div class="b-more__info-block-title">BEST FLEXIBLE PAYMENT PLAN<a href="#" class="j-more"><span class="fa fa-angle-left"></span></a></div>
								<div class="b-more__info-block-inside j-inside">
									<p>Our unique payment plans helps you plan your car purchase and ease you the stress of raising so much money to start a car plan. We are simply your best option.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section><!--b-more-->
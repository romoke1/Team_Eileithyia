
		<section class="b-pageHeader">
			<div class="container">
				<h1 class="wow zoomInLeft" data-wow-delay="0.3s">Order Details</h1>
				<div class="b-pageHeader__search wow zoomInRight" data-wow-delay="0.3s">
					<h3>Your car order details</h3>
				</div>
			</div>
		</section><!--b-pageHeader-->

		<div class="b-breadCumbs s-shadow">
			<div class="container wow zoomInUp" data-wow-delay="0.3s">
				<a href="home.html" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span><a href="submit5.html" class="b-breadCumbs__page m-active">Submit a Vehicle</a>
			</div>
		</div><!--b-breadCumbs-->

		<div class="b-infoBar">
			<div class="container">
				<div class="row">
					<div class="col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
						<div class="b-infoBar__progress wow zoomInUp" data-wow-delay="0.3s">
							<div class="b-infoBar__progress-line clearfix">
                                                            <div class="b-infoBar__progress-line-step m-active" style="width: 50%">
									<div class="b-infoBar__progress-line-step-circle">
										<div class="b-infoBar__progress-line-step-circle-inner m-active"></div>
									</div>
								</div>
								<div class="b-infoBar__progress-line-step ">
									<div class="b-infoBar__progress-line-step-circle">
										<div class="b-infoBar__progress-line-step-circle-inner m-active"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><!--b-infoBar-->

		<div class="b-submit">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-4 col-sm-5 col-xs-6">
						<aside class="b-submit__aside">
							<div class="b-submit__aside-step m-active wow zoomInUp" data-wow-delay="0.3s">
								<h3>Step 1</h3>
								<div class="b-submit__aside-step-inner m-active clearfix">
									<div class="b-submit__aside-step-inner-icon">
										<span class="fa fa-car"></span>
									</div>
									<div class="b-submit__aside-step-inner-info">
										<h4>Order Information</h4>
										<p>Order details</p>
										<div class="b-submit__aside-step-inner-info-triangle"></div>
									</div>
								</div>
							</div>
							<div class="b-submit__aside-step wow zoomInUp" data-wow-delay="0.3s">
								<h3>Step 2</h3>
								<div class="b-submit__aside-step-inner clearfix">
									<div class="b-submit__aside-step-inner-icon">
										<span class="fa fa-money"></span>
									</div>
									<div class="b-submit__aside-step-inner-info">
										<h4>Make Payment</h4>
										<p>Choose Payment method</p>
									</div>
								</div>
							</div>
						</aside>
					</div>
					<div class="col-lg-9 col-md-8 col-sm-7 col-xs-6">
						<div class="b-submit__main">
							<form action="" method="post" class='s-submit'>
                                                            <div class="b-submit__main-contacts-price" style="margin-bottom: 20px">
										<div class="b-submit__main-contacts-price-plan"><span>CONGRATULATIONS!</span>
                                                                                    <br />You have purchased <?= $car_detail['year']. " ".$make_detail['name']." ".$model_detail['name'] ?></div>
									</div>
								<div class="b-submit__main-plan wow zoomInUp" data-wow-delay="0.3s">
                                                                    
                                                                    
									<header class="s-headerSubmit s-lineDownLeft">
										<h2>Order Information</h2>
									</header>
									<div class="row">
										<div class="col-xs-6">
                                                                                    <h4 class="b-detail__main-aside-desc-title"><strong>Fullname:</strong> <?= $user['fullname'] ?></h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><strong>Member ID:</strong> <?= $user['user_id'] ?></p>
										</div>
									</div>
                                                                    <div class="row">
										<div class="col-xs-6">
                                                                                    <h4 class="b-detail__main-aside-desc-title"><strong>Car Stock ID:</strong> <a style="text-decoration: underline" href="<?= base_url()."cars/item/".$car_detail['car_id'];?>"> <?= $car_detail['car_id'];?></a></h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><strong>Purchase Date:</strong> <?= date('D, jS M Y h:i A', strtotime($order['created_at']));?></p>
										</div>
									</div>
                                                                    <div class="row">
										<div class="col-xs-6">
                                                                                    <h4 class="b-detail__main-aside-desc-title"><strong>First Payment Amount:</strong> N<?= number_format($first, 0); ?></h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><strong>First Payment Deadline:</strong> <?= date('D, jS M Y h:i A', strtotime("+1 days", (strtotime($order['created_at']))));?></p>
										</div>
									</div>
                                                                    
                                                                     <div class="row">
										<div class="col-xs-12">
                                                                                    <div class="alert alert-danger">
                                                                                        <strong>PLEASE NOTE: </strong> Our payment policy requires the  <strong>First Payment Amount</strong> be made before the <strong>First Payment Deadline</strong> above. Failure to do so will lead to suspension of your account.
                                                                                    </div>
										</div>
                                                                         
                                                                     </div>
                                                                    <div class="s-form">
                                                                    <div class="b-submit__main-element">
										<label>Enter Your Order Note for this car </label>
										<div class="row m-smallPadding">
											<div class="col-xs-12">
                                                                                           <textarea name="txtNote" placeholder="write additional info you want us to know about your order"></textarea>
											</div>
										</div>
                                                                    </div><input type="hidden" name="hd" value="dd" />
                                                                    </div>
                                                                    <div class="s-submit">
									<button type="submit" class="btn m-btn pull-right wow zoomInUp" data-wow-delay="0.3s">PROCEED to Payment Options <span class="fa fa-angle-right"></span></button>
								</div>
									
								</div>
								
							</form>
						</div>
					</div>
				</div>
			</div>
		</div><!--b-submit-->

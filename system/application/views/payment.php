
		<section class="b-pageHeader">
			<div class="container">
				<h1 class="wow zoomInLeft" data-wow-delay="0.3s">Order Payment</h1>
				<div class="b-pageHeader__search wow zoomInRight" data-wow-delay="0.3s">
					<h3>Make payment for your car</h3>
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
								<div class="b-infoBar__progress-line-step m-active">
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
										<div class="b-submit__aside-step-inner-info"></div>
									</div>
								</div>
							</div>
                                                    
                                                    <div class="b-submit__aside-step m-active wow zoomInUp" data-wow-delay="0.3s">
								<h3>Step 1</h3>
								<div class="b-submit__aside-step-inner m-active clearfix">
									<div class="b-submit__aside-step-inner-icon">
										<span class="fa fa-money"></span>
									</div>
									<div class="b-submit__aside-step-inner-info">
										<h4>Make Payment</h4>
										<p>Choose Payment Method</p>
										<div class="b-submit__aside-step-inner-info-triangle"></div>
									</div>
								</div>
							</div>
							
						</aside>
					</div>
					<div class="col-lg-9 col-md-8 col-sm-7 col-xs-6">
						<div class="b-submit__main">
							<form action="" method="post" class='s-submit'>
                                                            
                                                            <div class="b-submit__main-contacts-price" style="margin-bottom: 20px">
										<div class="b-submit__main-contacts-price-plan">Invoice ID: <span><?= $order_id ?></span></div>
									</div>
                                                           
								<div class="b-submit__main-plan wow zoomInUp" data-wow-delay="0.3s">
									<header class="s-headerSubmit s-lineDownLeft">
                                                                            <h2>Payment Details <span class="b-submit__main-plan-money">( <span class="b-submit__main-plan-money-num">N<?= number_format($payment_detail['payment_amount'], 0) ?></span> <span class="b-submit__main-plan-money-note">First Payment</span> )</span></h2>
									</header>
									<p>Please select your preferred payment method below </p>
									<div class="b-submit__main-contacts-check">
                                                                            <input type="radio" name="check2" id="check1" checked="" onclick="change_payment('bank');" />
										<label class="s-submitCheckLabel" for="check1"><span class="m-circle"></span></label>
										<label class="s-submitCheck" for="check1">BANK PAYMENT</label>
										<input type="radio" name="check2" id="check2" onclick="change_payment('online');" />
										<label class="s-submitCheckLabel" for="check2"><span class="m-circle"></span></label>
										<label class="s-submitCheck" for="check2">ONLINE PAYMENT (MASTERCARD, VISA, VERVE)</label>
										<input type="radio" name="check2" id="check3" onclick="change_payment('bitcoin');" />
										<label class="s-submitCheckLabel" for="check3"><span class="m-circle"></span></label>
										<label class="s-submitCheck" for="check3">BITCOIN </label>
									</div>
                                                                        
                                                                        
                                                                        <div class="alert alert-info" id="bank">
                                                                            <h5>Bank Details</h5>
                                                                            <table class="table">
                                                                                <tbody>
                                                                                    <tr><td>Account Name</td><td>CarsNowNow Limited</td></tr>
                                                                                    <tr><td>GTBank Account Number</td><td>0253524842</td></tr>
                                                                                    <tr><td>Zenith Account Number</td><td>1014925095</td></tr>
                                                                                    <tr><td>UBA Account Number</td><td>1020377204</td></tr>
                                                                                </tbody>
                                                                            </table>
                                                                            
                                                                            <p>After payment, please send your payment details to payments@tokunbocars.ng or call 08101954111</p>
                                                                            <a href="<?= base_url() ?>users/purchases"> <button type="button" class="btn m-btn zoomInUp">Confirm Bank as Payment Option <span class="fa fa-angle-right"></span></button></a>
                                                                        </div>
                                                                        
                                                                        <div class="alert alert-info" style="display: none" id="online">
                                                                            <h5>Online Payment</h5>
                                                                            <p>Click the payment button below. The payment popup will display</p>
                                                                            
<div class="get-btn">
    <form >
                            <script src="https://js.paystack.co/v1/inline.js"></script>
                            <button type="button" onclick="payWithPaystack()" class="btn m-btn zoomInUp">Make Payment <span class="fa fa-angle-right"></span></button>
    </form>
    
                        <script>
                            function payWithPaystack(){
                            var handler = PaystackPop.setup({
                            key: 'pk_live_5d7691d0a4ba563a07974bcc743e3c8a228cc27a',
                                    email: '<?= $user['email'] ?>',
                                    amount: <?= $payment_detail['payment_amount'] *  100 ?>,
                                    ref: '<?= rand(1, 495857) ?>', // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                                    metadata: {
                                    custom_fields: [
                                    {
                                    display_name: "Mobile Number",
                                            variable_name: "mobile_number",
                                            value: '<?= $user['phone'] ?>',
                                            
                                            display_name: "Full Name",
                                            variable_name: "full_name",
                                            value: '<?= $user['fullname'] ?>'
                                    }
                                    ]
                                    },
                                    callback: function(response){
                                    alert('Success. transaction ref is ' + response.reference);
                                    window.location.assign('https://tokunbocars.com/cars/payment_status/' + response.reference + '/' + <?= $order_id ?> + '');
                                    },
                                    onClose: function(){
                                    alert('window closed');
                                    }
                            });
                            handler.openIframe();
                            }
                        </script>
</div>
                                                                        </div>
                                                                        
                                                                        <div class="alert alert-info" style="display: none" id="bitcoin">
                                                                            <h5>Bitcoin Payment</h5>
                                                                            <p>Sorry! This payment method will be available soon!</p>
                                                                        </div>
									
								</div>
								
							</form>
						</div>
					</div>
				</div>
			</div>
		</div><!--b-submit-->


<section class="b-pageHeader">
    <div class="container">
        <h1 class="wow zoomInLeft" data-wow-delay="0.5s">Vehicle Details Page</h1>
    </div>
</section><!--b-pageHeader-->

<div class="b-breadCumbs s-shadow wow zoomInUp" data-wow-delay="0.5s">
    <div class="container">
        <a href="<?= base_url() ?>" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span><a href="#" class="b-breadCumbs__page m-active">Car Details</a>
    </div>
</div><!--b-breadCumbs-->

<div class="b-infoBar">
    <div class="container">
        <div class="row wow zoomInUp" data-wow-delay="0.5s">
            <div class="col-xs-3">

            </div>
            <div class="col-xs-9">
                <div class="b-infoBar__btns">
                    <a href="#" class="btn m-btn m-infoBtn">SHARE THIS VEHICLE<span class="fa fa-angle-right"></span></a>
                    <a href="#" class="btn m-btn m-infoBtn">ADD TO FAVOURITES<span class="fa fa-angle-right"></span></a>
                </div>
            </div>
        </div>
    </div>
</div><!--b-infoBar-->




<section class="b-detail s-shadow">
    <div class="container">
        <header class="b-detail__head s-lineDownLeft wow zoomInUp" data-wow-delay="0.5s">
            <div class="row">
                <div class="col-sm-9 col-xs-12">
                    <div class="b-detail__head-title"> 
                        <h1><?= $car_detail['year']; ?> <?= $make_detail['name']; ?> <?= $model_detail['name'] . " " . $car_detail['others']; ?></h1>
                        <h3>Stock #: <?= $car_detail['car_id']; ?></h3>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-12">
                    <div class="b-detail__head-price">
                        <div class="b-detail__head-price-num">&#8358;<?= number_format($car_detail['amount']); ?> </div>
                        <?php if ($car_detail['status'] !== '3') { echo "<p>Excluding Clearing Cost</p>"; }; ?>
                    </div>
                </div>
            </div>
        </header>
        <div class="b-detail__main">
            <div class="row">
                <div class="col-md-8 col-xs-12">
                    <div class="b-detail__main-info">
                        <div class="b-detail__main-info-images wow zoomInUp" data-wow-delay="0.5s">
                            <div class="row m-smallPadding">
                                <div class="col-xs-10">
                                    <ul class="b-detail__main-info-images-big bxslider enable-bx-slider" data-pager-custom="#bx-pager" data-mode="horizontal" data-pager-slide="true" data-mode-pager="vertical" data-pager-qty="5">

                                        <li class="s-relative">                                        
                                            <img class="center-block" src="<?= base_url() ?>upload/<?= $car_detail['image_1']; ?>" alt="<?= $car_detail['year'] . " " . $make_detail['name'] . " " . $model_detail['name'] ?>" />
                                        </li>
                                        <li class="s-relative">                                        
                                            <img class="center-block" src="<?= base_url() ?>upload/<?= $car_detail['image_2']; ?>" alt="<?= $car_detail['year'] . " " . $make_detail['name'] . " " . $model_detail['name'] ?>" />
                                        </li>
                                        <li class="s-relative">                                        
                                            <img class="center-block" src="<?= base_url() ?>upload/<?= $car_detail['image_3']; ?>" alt="<?= $car_detail['year'] . " " . $make_detail['name'] . " " . $model_detail['name'] ?>" />
                                        </li>
                                        <li class="s-relative">                                        
                                            <img class="center-block" src="<?= base_url() ?>upload/<?= $car_detail['image_4']; ?>" alt="<?= $car_detail['year'] . " " . $make_detail['name'] . " " . $model_detail['name'] ?>" />
                                        </li>
                                        <li class="s-relative">                                        
                                            <img class="center-block" src="<?= base_url() ?>upload/<?= $car_detail['image_5']; ?>" alt="<?= $car_detail['year'] . " " . $make_detail['name'] . " " . $model_detail['name'] ?>" />
                                        </li>
                                        <li class="s-relative">                                        
                                            <img class="center-block" src="<?= base_url() ?>upload/<?= $car_detail['image_6']; ?>" alt="<?= $car_detail['year'] . " " . $make_detail['name'] . " " . $model_detail['name'] ?>" />
                                        </li>
                                        <li class="s-relative">                                        
                                            <img class="center-block" src="<?= base_url() ?>upload/<?= $car_detail['image_7']; ?>" alt="<?= $car_detail['year'] . " " . $make_detail['name'] . " " . $model_detail['name'] ?>" />
                                        </li>
                                        <li class="s-relative">                                        
                                            <img class="center-block" src="<?= base_url() ?>upload/<?= $car_detail['image_8']; ?>" alt="<?= $car_detail['year'] . " " . $make_detail['name'] . " " . $model_detail['name'] ?>" />
                                        </li>


                                    </ul>
                                    <h4 style="text-align: center; text-decoration: underline"><a href="<?= base_url() ?>cars/images/<?= $car_detail['car_id']; ?>" target="_blank">View All Images</a></h4>
                                </div>
                                <div class="col-xs-2 pagerSlider pagerVertical">
                                    <div class="b-detail__main-info-images-small" id="bx-pager">

                                        <a href="#" data-slide-index="0" class="b-detail__main-info-images-small-one">
                                            <img class="img-responsive" src="<?= base_url() ?>upload/<?= $car_detail['image_1']; ?>" alt="<?= $car_detail['year'] . " " . $make_detail['name'] . " " . $model_detail['name'] ?>" />
                                        </a>
                                        <a href="#" data-slide-index="1" class="b-detail__main-info-images-small-one">
                                            <img class="img-responsive" src="<?= base_url() ?>upload/<?= $car_detail['image_2']; ?>" alt="<?= $car_detail['year'] . " " . $make_detail['name'] . " " . $model_detail['name'] ?>" />
                                        </a>
                                        <a href="#" data-slide-index="2" class="b-detail__main-info-images-small-one">
                                            <img class="img-responsive" src="<?= base_url() ?>upload/<?= $car_detail['image_3']; ?>" alt="<?= $car_detail['year'] . " " . $make_detail['name'] . " " . $model_detail['name'] ?>" />
                                        </a>
                                        <a href="#" data-slide-index="3" class="b-detail__main-info-images-small-one">
                                            <img class="img-responsive" src="<?= base_url() ?>upload/<?= $car_detail['image_4']; ?>" alt="<?= $car_detail['year'] . " " . $make_detail['name'] . " " . $model_detail['name'] ?>" />
                                        </a>
                                        <a href="#" data-slide-index="4" class="b-detail__main-info-images-small-one">
                                            <img class="img-responsive" src="<?= base_url() ?>upload/<?= $car_detail['image_5']; ?>" alt="<?= $car_detail['year'] . " " . $make_detail['name'] . " " . $model_detail['name'] ?>" />
                                        </a>
                                        <a href="#" data-slide-index="5" class="b-detail__main-info-images-small-one">
                                            <img class="img-responsive" src="<?= base_url() ?>upload/<?= $car_detail['image_6']; ?>" alt="<?= $car_detail['year'] . " " . $make_detail['name'] . " " . $model_detail['name'] ?>" />
                                        </a>
                                        <a href="#" data-slide-index="6" class="b-detail__main-info-images-small-one">
                                            <img class="img-responsive" src="<?= base_url() ?>upload/<?= $car_detail['image_7']; ?>" alt="<?= $car_detail['year'] . " " . $make_detail['name'] . " " . $model_detail['name'] ?>" />
                                        </a>
                                        <a href="#" data-slide-index="7" class="b-detail__main-info-images-small-one">
                                            <img class="img-responsive" src="<?= base_url() ?>upload/<?= $car_detail['image_8']; ?>" alt="<?= $car_detail['year'] . " " . $make_detail['name'] . " " . $model_detail['name'] ?>" />
                                        </a>




                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--<div class="b-detail__main-info-characteristics wow zoomInUp" data-wow-delay="0.5s">
                                <div class="b-detail__main-info-characteristics-one">
                                        <div class="b-detail__main-info-characteristics-one-top">
                                                <div><span class="fa fa-car"></span></div>
                                                <p>Brand New</p>
                                        </div>
                                        <div class="b-detail__main-info-characteristics-one-bottom">
                                                Status
                                        </div>
                                </div>
                                <div class="b-detail__main-info-characteristics-one">
                                        <div class="b-detail__main-info-characteristics-one-top">
                                                <div><span class="fa fa-trophy"></span></div>
                                                <p>5,000KM</p>
                                        </div>
                                        <div class="b-detail__main-info-characteristics-one-bottom">
                                                Warrenty
                                        </div>
                                </div>
                                <div class="b-detail__main-info-characteristics-one">
                                        <div class="b-detail__main-info-characteristics-one-top">
                                                <div><span class="fa fa-at"></span></div>
                                                <p>Auto</p>
                                        </div>
                                        <div class="b-detail__main-info-characteristics-one-bottom">
                                                Transmission
                                        </div>
                                </div>
                                <div class="b-detail__main-info-characteristics-one">
                                        <div class="b-detail__main-info-characteristics-one-top">
                                                <div><span class="fa fa-car"></span></div>
                                                <p>FWD</p>
                                        </div>
                                        <div class="b-detail__main-info-characteristics-one-bottom">
                                                Drivetrain
                                        </div>
                                </div>
                                <div class="b-detail__main-info-characteristics-one">
                                        <div class="b-detail__main-info-characteristics-one-top">
                                                <div><span class="fa fa-user"></span></div>
                                                <p>5</p>
                                        </div>
                                        <div class="b-detail__main-info-characteristics-one-bottom">
                                                Passangers
                                        </div>
                                </div>
                                <div class="b-detail__main-info-characteristics-one">
                                        <div class="b-detail__main-info-characteristics-one-top">
                                                <div><span class="fa fa-fire-extinguisher"></span></div>
                                                <p>10.8L</p>
                                        </div>
                                        <div class="b-detail__main-info-characteristics-one-bottom">
                                                In City
                                        </div>
                                </div>
                                <div class="b-detail__main-info-characteristics-one">
                                        <div class="b-detail__main-info-characteristics-one-top">
                                                <div><span class="fa fa-fire-extinguisher"></span></div>
                                                <p>7.5L</p>
                                        </div>
                                        <div class="b-detail__main-info-characteristics-one-bottom">
                                                On Highway
                                        </div>
                                </div>
                        </div>-->
                        <div class="b-detail__main-info-text wow zoomInUp" data-wow-delay="0.5s">
                            <div class="b-detail__main-aside-about-form-links">
                                <a href="#" class="j-tab m-active s-lineDownCenter" data-to='#info1'><h2 class="s-titleDet">Description</h2></a>
                            </div>
                            <div id="info1">
                                <div class="b-detail__main-aside-desc wow zoomInUp" data-wow-delay="0.5s">
                                    
                                    <?php 
                                        if($car_detail['status'] !== '3') :
                                    ?>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <h4 class="b-detail__main-aside-desc-title"><strong>Estimated Clearing Cost: </strong> &#8358;<?= number_format($car_detail['ecc'], 0); ?></h4>
                                        </div>

                                        <div class="col-xs-6">
                                            <p class="b-detail__main-aside-desc-value"><strong>Estimated Arrival Date:</strong> 
                                                <?php
                                                switch ($car_detail['status']) {
                                                    case 1:
                                                        echo date('jS M Y', strtotime("+45 days", (strtotime(date('Y-m-d')))));
                                                        break;

                                                    case 2:
                                                        echo $car_detail['ead'];
                                                        break;

                                                    case 3:
                                                        echo 'Car Arrived';
                                                }
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                    
                                    <?php endif; ?>
                                    
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <h4 class="b-detail__main-aside-desc-title"><strong>This car is sold by Others for:</strong> &#8358;<?= number_format($car_detail['ctv']); ?> (Current Market Value)</h4>
                                        </div>
                                        <div class="col-xs-6">
                                            <p class="b-detail__main-aside-desc-value"><strong>Estimated Repair Cost:</strong> <?php if($car_detail['erc'] == 1): echo "&#8358; *******"; else: echo '&#8358;'.number_format($car_detail['erc']); endif; ?></p>
                                        </div>
                                    </div>

                                    

                                    <div class="row">
                                        <div class="col-xs-6">
                                            <h4 class="b-detail__main-aside-desc-title"><strong>Make:</strong> <?= $make_detail['name'] ?> </h4>
                                        </div>
                                        <div class="col-xs-6">
                                            <p class="b-detail__main-aside-desc-value"><strong>Model:</strong>  <?= $model_detail['name'] ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <h4 class="b-detail__main-aside-desc-title"><strong>VIN:</strong>
                                                
                                                <?php 
								if (!isset($_SESSION['email'])) {
                                                                    echo substr($car_detail['vin'], 0, -7).'*******'.' (<a href="https://tokunbocars.ng/users/login" style="text-decoration: underline">Login to View</a>)';
                                                                }else{
                                                                    echo $car_detail['vin'];
                                                                }  ?>
                                            </h4>
                                        </div>
                                        <div class="col-xs-6">
                                            <p class="b-detail__main-aside-desc-value"><strong>Mileage:</strong>  <?php
                                                if ($car_detail['odometer'] === '0') {


                                                    echo 'Not Provided';
                                                } else {
                                                    echo $car_detail['odometer'] . 'mi';
                                                }
                                                ?></p>


                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <h4 class="b-detail__main-aside-desc-title"><strong>Body Type:</strong> <?= $car_detail['body']; ?></h4>
                                        </div>
                                        <div class="col-xs-6">
                                            <p class="b-detail__main-aside-desc-value"><strong>Vehicle Status:</strong> <?= $car_detail['run']; ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <h4 class="b-detail__main-aside-desc-title"><strong>Fuel:</strong> <?= $car_detail['fuel']; ?></h4>
                                        </div>
                                        <div class="col-xs-6">
                                            <p class="b-detail__main-aside-desc-value"><strong>Transmission:</strong> <?= $car_detail['transmission']; ?></p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-6">
                                            <h4 class="b-detail__main-aside-desc-title"><strong>Damage:</strong> <?= $car_detail['damage']; ?></h4>
                                        </div>
                                        <div class="col-xs-6">
                                            <p class="b-detail__main-aside-desc-value"><strong>Car Keys:</strong> <?= $car_detail['car_keys']; ?></p>
                                        </div>
                                    </div>

                                    

                                    <div class="row">
                                        <div class="col-xs-6">
                                            <h4 class="b-detail__main-aside-desc-title"><strong>Airbags: </strong> <?= $car_detail['airbags']; ?></h4>
                                        </div>

                                        <div class="col-xs-6">
                                            <h4 class="b-detail__main-aside-desc-title"><strong>Cylinders: </strong> <?= $car_detail['cylinder']; ?> Cylinders</h4>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <!--<div class="b-detail__main-info-extra wow zoomInUp" data-wow-delay="0.5s">
                                <h2 class="s-titleDet">EXTRA FEATURES</h2>
                                <div class="row">
                                        <div class="col-xs-4">
                                                <ul>
                                                        <li><span class="fa fa-check"></span>Security System</li>
                                                        <li><span class="fa fa-check"></span>Air Conditioning</li>
                                                        <li><span class="fa fa-check"></span>Alloy Wheels</li>
                                                        <li><span class="fa fa-check"></span>Anti-Lock Brakes (ABS)</li>
                                                        <li><span class="fa fa-check"></span>Anti-Theft</li>
                                                        <li><span class="fa fa-check"></span>Anti-Starter</li>
                                                </ul>
                                        </div>
                                        <div class="col-xs-4">
                                                <ul>
                                                        <li><span class="fa fa-check"></span>Dual Airbag</li>
                                                        <li><span class="fa fa-check"></span>Intermittent Wipers</li>
                                                        <li><span class="fa fa-check"></span>Keyless Entry</li>
                                                        <li><span class="fa fa-check"></span>Power Mirrors</li>
                                                        <li><span class="fa fa-check"></span>Power Seat</li>
                                                        <li><span class="fa fa-check"></span>Power Steering</li>
                                                </ul>
                                        </div>
                                        <div class="col-xs-4">
                                                <ul>
                                                        <li><span class="fa fa-check"></span>CD Player</li>
                                                        <li><span class="fa fa-check"></span>Driver Side Airbag</li>
                                                        <li><span class="fa fa-check"></span>Power Windows</li>
                                                        <li><span class="fa fa-check"></span>Remote Start</li>
                                                </ul>
                                        </div>
                                </div>
                        </div>-->
                    </div>
                </div>
                <div class="col-md-4 col-xs-12">
                    <aside class="b-detail__main-aside">

                        <div class="b-detail__main-aside-about wow zoomInUp" data-wow-delay="0.5s">

                            <div class="b-detail__main-aside-payment wow zoomInUp" data-wow-delay="0.5s">
                                <h2 class="s-titleDet">CAR PAYMENT DETAILS</h2>

<?php if ($car_detail['status'] == 1) : ?>

                                    <!-- Start of BUY NOW Cars -->

                                    <div class="b-detail__main-aside-about-seller" style="text-align: center; padding: 10px 20px 20px 20px">
                                        <label for="ddlRun">Select Payment Plan</label>
                                        <select name="ddlPlan" class="form-control" id="ddlPlan" onchange="payPlan()" >
                                            <option value="">Select Plan</option>
                                            <option value="one">One Time Payment (5% Discount)</option>
                                            <option value="two">Pay As You Go</option>
                                            <option value="three">Pay Small Small</option>
                                        </select>
                                    </div>

                                    <!-- Start of Full Payment -->
                                    <div id="one" style="display: none">
                                        <h6>Full Payment</h6>
                                        <div class="b-detail__main-aside-about-call">
                                            <span class="fa fa-diamond"></span>
                                            <div> &#8358;<?= number_format(($car_detail['amount'] * 0.95), 0) ?> <p>95%</p></div>
                                            <p><span>5%</span> has been discounted on this plan</p>
                                        </div>



                                    </div>

                                    <!-- End of Full Payment -->


                                    <!-- Start of Pay As You Go -->

                                    <div id="two" style="display: none">
                                        <h6>First Payment</h6>
                                        <div class="b-detail__main-aside-about-call">
                                            <span class="fa fa-cart-arrow-down"></span>
                                            <div> &#8358;<?= $first ?> <p><?= $p1 ?></p></div>
                                            <p>This payment enables us buy the car for you</p>
                                        </div>

                                        <h6>Second Payment</h6>
                                        <div class="b-detail__main-aside-about-call">
                                            <span class="fa fa-ship"></span>
                                            <div>&#8358;<?= $second ?> <p><?= $p2 ?></p></div>
                                            <p>This Payment enables us ship your car</p>
                                        </div>

                                        <h6>Third Payment</h6>
                                        <div class="b-detail__main-aside-about-call">
                                            <span class="fa fa-automobile"></span>
                                            <div>&#8358;<?= $third ?> <p><?= $p3 ?></p></div>
                                            <p>This Payment entitles you to your car</p>
                                        </div>

                                    </div>

                                    <!-- End of Pay As You Go -->


                                    <!-- Start of Pay Small Small -->

                                    <div id="three" style="display: none">
                                        <h6>Initial Payment</h6>
                                        <div class="b-detail__main-aside-about-call">
                                            <span class="fa fa-bank"></span>
                                            <div> &#8358;<?= $small ?> <p>50%</p></div>
                                            <p>Must be made to process your purchase</p>
                                        </div>


                                        <label for="ddlRun" style="margin-top: 20px">Select Number of Months you want to Pay</label>
                                        <select name="ddlPlan" class="form-control" id="ddlMonths" onchange="monthly()" >
                                            <option value="">Select Months</option>
                                            <option value="3">3 Months (2% Fee)</option>
                                            <option value="4">4 Months (4.5% Fee) </option>
                                            <option value="5">5 Months (8% Fee)</option>
                                            <option value="6">6 Months (12% Fee) </option>
                                        </select>
                                        <input id="hdMoney" type="hidden" value="<?= $car_detail['amount'] * 0.5 ?>" />

                                        <h6>Monthly Payment</h6>


                                        <div class="b-detail__main-aside-about-call" id="3" style="display: none">
                                            <span class="fa fa-calendar"></span>
                                            <div>&#8358;<?= number_format($charge3, 0) ?> <p>Monthly</p></div>
                                            <p>This payment is to be made every 30day after Initial Payment</p>
                                        </div>

                                        <div class="b-detail__main-aside-about-call" id="4" style="display: none">
                                            <span class="fa fa-calendar"></span>
                                            <div>&#8358;<?= number_format($charge4, 0) ?> <p>Monthly</p></div>
                                            <p>This payment is to be made every 30day after Initial Payment</p>
                                        </div>

                                        <div class="b-detail__main-aside-about-call" id="5" style="display: none">
                                            <span class="fa fa-calendar"></span>
                                            <div>&#8358;<?= number_format($charge5, 0) ?> <p>Monthly</p></div>
                                            <p>This payment is to be made every 30day after Initial Payment</p>
                                        </div>

                                        <div class="b-detail__main-aside-about-call" id="6" style="display: none">
                                            <span class="fa fa-calendar"></span>
                                            <div>&#8358;<?= number_format($charge6, 0) ?> <p>Monthly</p></div>
                                            <p>This payment is to be made every 30day after Initial Payment</p>
                                        </div>

                                        <!-- End of Pay Small Small -->



                                    </div>

                                    <!-- End of BUY NOW Cars  -->

                                    <!-- Start of On Sail Cars  -->

<?php elseif ($car_detail['status'] == 2) : ?>

                                    <h6>First Payment</h6>
                                    <div class="b-detail__main-aside-about-call">
                                        <span class="fa fa-cart-arrow-down"></span>
                                        <div> &#8358;<?= $first ?> <p>60%</p></div>
                                        <p>This Payment entitles this car to <span>You</span>. </p>
                                    </div>

                                    <h6>Second Payment</h6>
                                    <div class="b-detail__main-aside-about-call">
                                        <span class="fa fa-ship"></span>
                                        <div>&#8358;<?= $second ?> <p>40%</p></div>
                                        <p>This is paid when you car arrives</p>
                                    </div>

                                    <!-- End of On Sail Cars  -->

                                    <!-- Start of On Ground Cars  -->

<?php elseif ($car_detail['status'] == 3) : ?>

                                    <h6>Payment</h6>
                                    <div class="b-detail__main-aside-about-call">
                                        <span class="fa fa-cart-arrow-down"></span>
                                        <div> &#8358;<?= $first ?> <p>100%</p></div>
                                    </div>

<?php else : ?>

                                    <div class="alert alert-success">

                                        <h2 style="text-align: center">SOLD!</h2>
                                    </div>

<?php endif; ?>

                                <p>&nbsp;</p>

<?php if ($car_detail['status'] == 1) : ?>

                                    <div class="" style="text-align: center; padding: 0px">
                                        <input type="hidden" name="CarName" id="CarName" value="<?= $car_detail['year']; ?> <?= $make_detail['name']; ?> <?= $model_detail['name'] . " " . $car_detail['others']; ?>">
                                        <button onclick="buy_car2(<?= $car_detail['car_id'] ?>)" type="button" class="btn m-btn btn-success" style="width: 100%; padding-top: 7px; padding-bottom: 7px; margin-top: 0px">BUY NOW<span class="fa fa-angle-right"></span></button>

                                    </div>

<?php elseif ($car_detail['status'] == 4): ?>



<?php else: ?>

                                    <div class="" style="text-align: center; padding: 0px">
                                        <input type="hidden" name="CarName" id="CarName" value="<?= $car_detail['year']; ?> <?= $make_detail['name']; ?> <?= $model_detail['name'] . " " . $car_detail['others']; ?>">

                                        <button onclick="buy_car(<?= $car_detail['car_id'] ?>)" type="button" class="btn m-btn btn-success" style="width: 100%; padding-top: 7px; padding-bottom: 7px; margin-top: 0px">BUY NOW<span class="fa fa-angle-right"></span></button>

                                    </div>

<?php endif; ?>

                            </div>
                            <h2 class="s-titleDet" style="margin-top: 50px">INQUIRE ABOUT THIS VEHICLE</h2>
                            <div class="b-detail__main-aside-about-call">
                                <span class="fa fa-phone"></span>
                                <div>09060196754</div>
                                <p>Call our office Number now to ask.</p>
                            </div>
                            <div class="b-detail__main-aside-about-seller" style="text-align: center">
                                <button type="submit" class="btn m-btn">Send a Message<span class="fa fa-angle-right"></span></button>
                            </div>

                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>


<!--b-detail-->

<section class="b-related m-home">
    <div class="container">
        <h5 class="s-titleBg wow zoomInUp" data-wow-delay="0.5s">RECENT CARS</h5><br />
        <h2 class="s-title wow zoomInUp" data-wow-delay="0.5s">RELATED CARS ON SALE</h2>
        <div class="row">
            <?php
            foreach ($lists as $list) {

                $make = $this->model_getvalues->getDetails("make", "make_id", $list->make);
                $model = $this->model_getvalues->getDetails("model", "model_id", $list->model);
                ?>
                <div class="col-md-3 col-xs-6">
                    <div class="b-auto__main-item wow zoomInLeft" data-wow-delay="0.5s">
                        <a href="<?= base_url(); ?>cars/item/<?= $list->car_id; ?>"><img class="img-responsive center-block" style="height: 150px"  src="<?= base_url() ?>upload/<?= $list->image_1; ?>" alt="<?php echo $list->year; ?> <?= $make['name']; ?> <?= $model['name']; ?>" /></a>
                        
                        <h2><a href="<?= base_url(); ?>cars/item/<?= $list->car_id; ?>"><?php echo $list->year; ?> <?= $make['name']; ?> <?= $model['name']; ?></a></h2>
                        <div class="b-auto__main-item-info s-lineDownLeft">
                            <span class="m-price">
                                &#8358;<?= number_format($list->amount, 0) ?>
                            </span>
                            <span class="m-number">
                                <span class="fa fa-tachometer"></span><?= number_format($list->odometer, 0); ?>
                            </span>
                        </div>
                        <!--<div class="b-featured__item-links m-auto">
                                <a href="#">Used</a>
                                <a href="#">2014</a>
                                <a href="#">Manual</a>
                                <a href="#">Orange</a>
                                <a href="#">Petrol</a>
                        </div>-->
                    </div>
                </div>

<?php } ?>
        </div>
    </div>
</section><!--"b-related-->


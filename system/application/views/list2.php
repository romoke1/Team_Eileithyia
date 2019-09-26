<!-- Contents Starts Here-->
		<section class="b-pageHeader">
			<div class="container">
				<h1 class="wow zoomInLeft" data-wow-delay="0.5s">Auto Listings</h1>
				<div class="b-pageHeader__search wow zoomInRight" data-wow-delay="0.5s">
					<h3>Your search returned 28 results</h3>
				</div>
			</div>
		</section><!--b-pageHeader-->

		<div class="b-breadCumbs s-shadow">
			<div class="container wow zoomInUp" data-wow-delay="0.5s">
				<a href="home" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span><a href="grid" class="b-breadCumbs__page m-active">Lists</a>
			</div>
		</div><!--b-breadCumbs-->

		<div class="b-infoBar">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-xs-12">
						<div class="b-infoBar__compare wow zoomInUp" data-wow-delay="0.5s">
							<div class="dropdown">
								<a href="#" class="dropdown-toggle b-infoBar__compare-item" data-toggle='dropdown'><span class="fa fa-clock-o"></span>RECENTLY VIEWED<span class="fa fa-caret-down"></span></a>
								<ul class="dropdown-menu">
									<li><a href="#">Item</a></li>
									<li><a href="#">Item</a></li>
									<li><a href="#">Item</a></li>
									<li><a href="#">Item</a></li>
								</ul>
							</div>
							<a href="#" class="b-infoBar__compare-item"><span class="fa fa-compress"></span>COMPARE VEHICLES: 2</a>
						</div>
					</div>
					<div class="col-lg-8 col-xs-12">
						<div class="b-infoBar__select wow zoomInUp" data-wow-delay="0.5s">
							<form method="post" action="http://templines.rocks/">
								<div class="b-infoBar__select-one">
									<span class="b-infoBar__select-one-title">SELECT VIEW</span>
									<a href="listings.html" class="m-list"><span class="fa fa-list"></span></a>
									<a href="listTableTwo.html" class="m-table m-active"><span class="fa fa-table"></span></a>
								</div>
								<div class="b-infoBar__select-one">
									<span class="b-infoBar__select-one-title">SHOW ON PAGE</span>
									<select name="select1" class="m-select">
										<option value="" selected="">10 items</option>
									</select>
									<span class="fa fa-caret-down"></span>
								</div>
								<div class="b-infoBar__select-one">
									<span class="b-infoBar__select-one-title">SORT BY</span>
									<select name="select2" class="m-select">
										<option value="" selected="">Last Added</option>
									</select>
									<span class="fa fa-caret-down"></span>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div><!--b-infoBar-->

		<div class="b-items">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-sm-4 col-xs-12">
						<aside class="b-items__aside">
							<h2 class="s-title wow zoomInUp" data-wow-delay="0.5s">REFINE YOUR SEARCH</h2>
							<div class="b-items__aside-main wow zoomInUp" data-wow-delay="0.5s">
								<form>
									<div class="b-items__aside-main-body">
										<div class="b-items__aside-main-body-item">
											<label>SELECT A MAKE</label>
											<div>
												<select name="select1" id="make_cat" class="m-select" onchange="fetchCourses2()">
													<option value="" selected="">Any Make</option>
													<?php
                                            foreach ($make as $make) {
                                               
                                                echo '<option value="'.$make->make_id.'">' . $make->name . '</option>';
                                            }
                                            ?>
												</select>
												<span class="fa fa-caret-down"></span>
											</div>
										</div>
										<div class="b-items__aside-main-body-item" id="fetchmodel">
											<label>SELECT A MODEL</label>
											
										</div>
										<div class="b-items__aside-main-body-item">
											<label>PRICE RANGE</label>
											<div class="slider"></div>
											<input type="hidden" name="min" value="100" class="j-min" />
											<input type="hidden" name="max" value="1000" class="j-max" />
										</div>
										<div class="b-items__aside-main-body-item">
											<label>VEHICLE TYPE</label>
											<div>
												<select name="select1" class="m-select">
													<option value="" selected="">Any Type</option>
												</select>
												<span class="fa fa-caret-down"></span>
											</div>
										</div>
										<div class="b-items__aside-main-body-item">
											<label>VEHICLE STATUS</label>
											<div>
												<select name="select1" class="m-select">
													<option value="" selected="">Any Status</option>
												</select>
												<span class="fa fa-caret-down"></span>
											</div>
										</div>
										<div class="b-items__aside-main-body-item">
											<label>FUEL TYPE</label>
											<div>
												<select name="select1" class="m-select">
													<option value="" selected="">All Fuel Types</option>
												</select>
												<span class="fa fa-caret-down"></span>
											</div>
										</div>
									</div>
									<footer class="b-items__aside-main-footer">
										<button type="submit" class="btn m-btn">FILTER VEHICLES<span class="fa fa-angle-right"></span></button><br />
										<a href="#">RESET ALL FILTERS</a>
									</footer>
								</form>
							</div>
							<div class="b-items__aside-sell wow zoomInUp" data-wow-delay="0.5s">
								<div class="b-items__aside-sell-img">
									<h3>SELL YOUR CAR</h3>
								</div>
								<div class="b-items__aside-sell-info">
									<p>
										Nam tellus enimds eleifend dignis lsim
										biben edum tristique sed metus fusce
										Maecenas lobortis.
									</p>
									<a href="submit1.html" class="btn m-btn">REGISTER NOW<span class="fa fa-angle-right"></span></a>
								</div>
							</div>
						</aside>
					</div>
                                    
                                    
                                    
                                    
					<div class="col-lg-9 col-sm-8 col-xs-12">
						<div class="row m-border">

							<?php foreach ($list as $key => $list): ?>

								<?php 

								$price =  60/100 * $list->amount;
							    


                      $date = $list->ead;
                      $day = substr($date,8,8);
                      
                      $year = substr($date,0,4);
                      
                      $month = substr($date,5,2);

                      if ($month == 01) {
                        $month = "January";
                      }
                      elseif ($month == 02) {

                        $month = "February";
                        
                      } elseif ($month == 03) {
                        $month = "March";
                      } elseif ($month == 04) {
                        $month = "April";
                      } elseif ($month == 05) {
                        $month = "May";
                      } elseif ($month == 06) {
                        $month = "June";
                      } elseif ($month == 07) {
                        $month = "July";
                      } elseif ($month == 08) {
                        $month = "August";
                      } elseif ($month == 09) {
                        $month = "Septembre";
                      } elseif ($month == 10) {
                        $month = "October";
                      }elseif ($month == 11) {
                        $month = "November";
                      }
                      else{
                        $month = "December";
                      }
                      
                       
								$img =  $list->images;
								$imm = explode(',', $img);
								$imm[0];
								
                                                                $car_image = $this->model_getvalues->getDetails("car_images", "cars_id", $list->car_id);

								$mid = $list->make_id;
								$moid = $list->model_id;

								$sql = "SELECT * FROM make WHERE make_id = '$mid'";
								$query = $this->db->query($sql);
								foreach ($query->result_array() as $key => $make) {

								$mosql = "SELECT * FROM model WHERE model_id = '$moid'";
								$moquery = $this->db->query($mosql);
								foreach ($moquery->result_array() as $key => $model) {
									
								
								
								
						?>

									


								
										
								
			<div class="col-lg-4 col-md-6 col-xs-12 wow zoomInUp" data-wow-delay="0.5s">
								<div class="b-items__cell">
									<div class="b-items__cars-one-img">
										<img class='img-responsive' src="<?= base_url()?>upload/<?php echo $car_image['image_1'];?>" alt='<?php echo $list->year; ?> <?= $make['name'];?> <?= $model['name'];?>'/>
										<a data-toggle="modal" data-target="#myModal" href="#" class="b-items__cars-one-img-video"><span class="fa fa-film"></span>VIDEO</a>
										<span class="b-items__cars-one-img-type m-premium">PREMIUM</span>
										<form action="http://templines.rocks/" method="post">
											<input type="checkbox" name="check3" id='check3'/>
											<label for="check3" class="b-items__cars-one-img-check"><span class="fa fa-check"></span></label>
										</form>
									</div>
									<div class="b-items__cell-info">
										<div class="s-lineDownLeft b-items__cell-info-title">
											<h2 class=""><a href="detail.html"><?php echo $list->year; ?> <?= $make['name'];?> <?= $model['name'];?></a></h2>
										</div>

										<p>This car will arrive Lagos on or before <?= $day; ?> <?= $month; ?> <?= $year; ?> if you pay <strong> N</strong><?=  number_format($price);?> today.
										<div>
											<div class="row m-smallPadding">
												<div class="col-xs-5">
													<span class="b-items__cars-one-info-title">Damage:</span>
													<span class="b-items__cars-one-info-title">Run & Drive:</span>
													<span class="b-items__cars-one-info-title">Mileage:</span>
													<span class="b-items__cars-one-info-title">Transmission:</span>
													
												</div>
												<div class="col-xs-7">
													<span class="b-items__cars-one-info-value"><?= $list->damage; ?></span>
													<span class="b-items__cars-one-info-value"><?= $list->run;?></span>
													<span class="b-items__cars-one-info-value"><?= $list->odometer; ?></span>
													<span class="b-items__cars-one-info-value"><?= $list->transmission;?></span>
												</div>
                                                                                            <h5 class="b-items__cell-info-price" style="padding-top: 35px"><span>Price:</span> N<?=  number_format($list->amount); ?></h5><a href="<?= base_url();?>users/car_details/<?= $list->car_id; ?>" class="btn m-btn" style="margin-top: 20px">VIEW DETAILS<span class="fa fa-angle-right"></span></a>
											</div>
										
												
											
											
										</div>
									</div>
								</div>
							</div>
		
						
						<?php } ?>
						<?php } ?>
						<?php endforeach; ?>

							

							
					</div>
				</div>
			</div>
		</div><!--b-items-->

		<div class="b-features">
			<div class="container">
				<div class="row">
					<div class="col-md-9 col-md-offset-3 col-xs-6 col-xs-offset-6">
						<ul class="b-features__items">
							<li class="wow zoomInUp" data-wow-delay="0.3s" data-wow-offset="100">Low Prices, No Haggling</li>
							<li class="wow zoomInUp" data-wow-delay="0.3s" data-wow-offset="100">Largest Car Dealership</li>
							<li class="wow zoomInUp" data-wow-delay="0.3s" data-wow-offset="100">Multipoint Safety Check</li>
						</ul>
					</div>
				</div>
			</div>
		</div><!--b-features-->
		
		<div class="b-info">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-xs-6">
						<aside class="b-info__aside wow zoomInLeft" data-wow-delay="0.3s">
							<article class="b-info__aside-article">
								<h3>OPENING HOURS</h3>
								<div class="b-info__aside-article-item">
									<h6>Sales Department</h6>
									<p>Mon-Sat : 8:00am - 5:00pm<br />
										Sunday is closed</p>
								</div>
								<div class="b-info__aside-article-item">
									<h6>Service Department</h6>
									<p>Mon-Sat : 8:00am - 5:00pm<br />
										Sunday is closed</p>
								</div>
							</article>
							<article class="b-info__aside-article">
								<h3>About us</h3>
								<p>Vestibulum varius od lio eget conseq
									uat blandit, lorem auglue comm lodo 
									nisl non ultricies lectus nibh mas lsa 
									Duis scelerisque aliquet. Ante donec
									libero pede porttitor dacu msan esct
									venenatis quis.</p>
							</article>
							<a href="about" class="btn m-btn">Read More<span class="fa fa-angle-right"></span></a>
						</aside>
					</div>
					<div class="col-md-3 col-xs-6">
						<div class="b-info__latest">
							<h3>LATEST AUTOS</h3>
							<div class="b-info__latest-article wow zoomInUp" data-wow-delay="0.3s">
								<div class="b-info__latest-article-photo m-audi"></div>
								<div class="b-info__latest-article-info">
									<h6><a href="detail.html">MERCEDES-AMG GT S</a></h6>
									<p><span class="fa fa-tachometer"></span> 35,000 KM</p>
								</div>
							</div>
							<div class="b-info__latest-article wow zoomInUp" data-wow-delay="0.3s">
								<div class="b-info__latest-article-photo m-audiSpyder"></div>
								<div class="b-info__latest-article-info">
									<h6><a href="#">AUDI R8 SPYDER V-8</a></h6>
									<p><span class="fa fa-tachometer"></span> 35,000 KM</p>
								</div>
							</div>
							<div class="b-info__latest-article wow zoomInUp" data-wow-delay="0.3s">
								<div class="b-info__latest-article-photo m-aston"></div>
								<div class="b-info__latest-article-info">
									<h6><a href="#">ASTON MARTIN VANTAGE</a></h6>
									<p><span class="fa fa-tachometer"></span> 35,000 KM</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-xs-6">
						<div class="b-info__twitter">
							<h3>from twitter</h3>
							<div class="b-info__twitter-article wow zoomInUp" data-wow-delay="0.3s">
								<div class="b-info__twitter-article-icon"><span class="fa fa-twitter"></span></div>
								<div class="b-info__twitter-article-content">
									<p>Duis scelerisque aliquet ante donec libero pede porttitor dacu</p>
									<span>20 minutes ago</span>
								</div>
							</div>
							<div class="b-info__twitter-article wow zoomInUp" data-wow-delay="0.3s">
								<div class="b-info__twitter-article-icon"><span class="fa fa-twitter"></span></div>
								<div class="b-info__twitter-article-content">
									<p>Duis scelerisque aliquet ante donec libero pede porttitor dacu</p>
									<span>20 minutes ago</span>
								</div>
							</div>
							<div class="b-info__twitter-article wow zoomInUp" data-wow-delay="0.3s">
								<div class="b-info__twitter-article-icon"><span class="fa fa-twitter"></span></div>
								<div class="b-info__twitter-article-content">
									<p>Duis scelerisque aliquet ante donec libero pede porttitor dacu</p>
									<span>20 minutes ago</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-xs-6">
						<address class="b-info__contacts wow zoomInUp" data-wow-delay="0.3s">
							<p>contact us</p>
							<div class="b-info__contacts-item">
								<span class="fa fa-map-marker"></span>
								<em>202 W 7th St, Suite 233 Los Angeles,
									California 90014 USA</em>
							</div>
							<div class="b-info__contacts-item">
								<span class="fa fa-phone"></span>
								<em>Phone:  1-800- 624-5462</em>
							</div>
							<div class="b-info__contacts-item">
								<span class="fa fa-fax"></span>
								<em>FAX:  1-800- 624-5462</em>
							</div>
							<div class="b-info__contacts-item">
								<span class="fa fa-envelope"></span>
								<em>Email:  info@domain.com</em>
							</div>
						</address>
						<address class="b-info__map">
							<a href="contacts.html">Open Location Map</a>
						</address>
					</div>
				</div>
			</div>
		</div><!--b-info-->

		
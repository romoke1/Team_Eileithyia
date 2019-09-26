<?php 
$page = "Dashboard";
 ?>

                        <div class="row">
                            <div class="col-sm-7">
                                <h4 class="page-title">Dashboard</h4>
                                <p class="text-muted page-title-alt">Welcome <strong><?php echo $user['fullname']; ?>!</strong></p>
                            </div>
                        </div>

                        <div class="col-md-9" style="float: right; margin-top: -400px; margin-right: 50px;">
                         <div class="row">
                            <div class="col-md-2 col-lg-3">
                                <div class="widget-bg-color-icon card-box fadeInDown animated">
                                    <div class="bg-icon bg-icon-info pull-left">
                                        <i class="md md-attach-money text-info"></i>
                                    </div>
                                    <div class="text-center">
                                        <h3 class="text-dark"><b class="counter"><?= $countPur ?></b></h3>
                                        <p class="text-muted">Purchases</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                            <div class="col-md-2 col-lg-3">
                                <div class="widget-bg-color-icon card-box">
                                    <div class="bg-icon bg-icon-pink pull-left">
                                        <i class="md md-add-shopping-cart text-pink"></i>
                                    </div>
                                    <div class="text-center">
                                        <h3 class="text-dark"><b class="counter"><?= $countInv ?></b></h3>
                                        <p class="text-muted">Invoices</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                            <div class="col-md-2 col-lg-3">
                                <div class="widget-bg-color-icon card-box">
                                    <div class="bg-icon bg-icon-purple pull-left">
                                        <i class="md md-equalizer text-purple"></i>
                                    </div>
                                    <div class="text-center">
                                        <h3 class="text-dark"><b class="counter"><?= $countTic ?></b></h3>
                                        <p class="text-muted">Tickets</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                            <div class="col-md-2 col-lg-3">
                                <div class="widget-bg-color-icon card-box">
                                    <div class="bg-icon bg-icon-success pull-left">
                                        <i class="md md-remove-red-eye text-success"></i>
                                    </div>
                                    <div class="text-center">
                                        <h3 class="text-dark"><b class="counter">0</b></h3>
                                        <p class="text-muted">Watchlist</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                       
                                   
                        	<!-- end col -->



                        </div>
                        <!-- end row -->


                    </div> <!-- container -->

                </div> <!-- content -->

       
                            

<section class="b-pageHeader">
            <div class="container">
                <h1 class=" wow zoomInLeft" data-wow-delay="0.5s"><?php echo $title; ?> </h1>
                
            </div>
        </section><!--b-pageHeader-->

        <div class="b-breadCumbs s-shadow wow zoomInUp" data-wow-delay="0.5s">
            <div class="container">
                <a href="home" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span><a href="dashboard" class="b-breadCumbs__page m-active"><?php echo $title; ?></a>
            </div>
        </div><!--b-breadCumbs-->


                      

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
        
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->

        <div class="col-md-3">
          <div class="b-blog__aside-categories wow zoomInUp" data-wow-delay="0.3s">
                                <header class="s-lineDownLeft">
                                    <h2 class="s-titleDet">CATEGORIES</h2>
                                </header>
                                <nav>
                                    <ul class="b-blog__aside-categories-list">
                                        <li><a href="<?= base_url() ?>users/dashboard">Dashboard</a></li>
                                        <li><a href="<?= base_url() ?>users/profile">Profile</a></li>
                                        <?php 
                                            if($this->model_getvalues->getCount("partners", "user_id", $this->session->userdata('user_id')) > 0 ) :
                                        ?>
                                        <li><a href="<?= base_url() ?>users/partner_dashboard">Reseller/Partner Dashboard</a></li>
                                        
                                        <?php else : ?>
                                        
                                         <li><a href="<?= base_url() ?>users/partner_join">Become a Reseller/Partner</a></li>
                                        
                                        <?php endif; ?>
                                        
                                        <li><a href="<?= base_url() ?>users/purchases">Order History</a></li>
                                        <li><a href="<?= base_url() ?>users/my_invoices"> Invoices</a></li>
                                        <li><a href="#">Track Vehicles</a></li>
                                        <li><a href="<?= base_url() ?>users/open-ticket">Open Ticket</a></li>
                                        <li><a href="<?= base_url() ?>users/tickets">Tickets</a></li>
                                        <li><a href="<?= base_url() ?>users/change_password">Change Password</a></li>
                                        <li><a href="logout">Logout</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
<!DOCTYPE html>
<html lang="en-150">
    <head>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>TOKUNBO CARS ADMIN</title>
        <!--// Stylesheets //-->
        <script type="text/javascript" src="<?php echo base_url(); ?>cjax/core/js/cjax-5.8.js"></script>
        <link href="<?php echo base_url(); ?>assets/admin/css/style.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/admin/css/sweetalert.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/admin/css/bootstrap.css" rel="stylesheet" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/admin/css/select.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/admin/css/datepicker.css">
        <!--// Javascript //-->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/sky.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/jquery.accordion.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/select.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/datepicker.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/jquery.custom-scrollbar.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/icheck.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/selectnav.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/functions.js"></script>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/base/jquery.ui.all.css">
        <script src="<?php echo base_url(); ?>assets/admin/js/ui/jquery.ui.core.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/ui/jquery.ui.datepicker.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/sweetalert.js"></script>
        <script>

            $(function () {
                $("#datepicker").datepicker();
            });

            $(function () {
                $("#datepicker2").datepicker();
            });
        </script>
        <script>
            $(document).ready(function () {

                $('.bluecheckradios').iCheck({
                    checkboxClass: 'icheckbox_flat-blue',
                    radioClass: 'iradio_flat-blue',
                    increaseArea: '20%' // optional
                });
            });
        </script>

        <style>
            .skyBg
            {
                /*background-color: #1b7e5a;*/
                color: #FFFFFF !important;
            }

            .nw{

                color: #FFFFFF !important;
            }
        </style>
    </head>
    <body>
        <div style="width: 100%; margin-bottom: 200px; height: 2000px; background-image: url(<?php echo base_url(); ?>assets/admin/images/trans2.png); z-index: 5; position: fixed; display: none; padding-bottom: 100px; top: 0;" id="popper">

            <div style="margin: 80px auto 200px auto; border-radius: 20px; box-shadow:4px 4px 8px #000; width: 60%; background-color: #FFFFFF; padding-top: -200px;" id="popContent"></div>

        </div>

        <!-- Wrapper Start -->
        <div class="wrapper" class="skyBg">
            <div class="structure-row" class="skyBg" >
                <!-- Sidebar Start -->
                <aside class="sidebar" class="skyBg" >
                    <div class="sidebar-in"  class="skyBg">
                        <!-- Sidebar Header Start -->
                        <header class="skyBg">
                            <!-- Logo Start -->
                            <div class="logo">
                                <h1>TCN Admin </h1>
                            </div>
                            <!-- Logo End -->
                            <!-- Toggle Button Start -->
                            <a href="#" class="togglemenu">&nbsp;</a>
                            <!-- Toggle Button End -->
                            <div class="clearfix"></div>
                        </header>
                        <!-- Sidebar Header End -->
                        <!-- Sidebar Navigation Start -->
                        <nav class="navigation skyBg nw">
                            <ul class="navi-acc" id="nav2">
                                <?php
                                $level = $this->model_getvalues->getDetails("admin", "level", $this->session->userdata('level'));
                                ?>
                                <li>
                                    <a href="<?= base_url()?>admin/dashboard" class="dashboard">Dashboard</a>
                                   
                                        </li>
                                        
                                    <li>
                                        <a href="<?= base_url()?>admin/users" class="loginoptions">Users</a>
                                       
                                    </li>
                                    
                                    <li>
                                        <a href="<?= base_url()?>admin/make" class="pages">Make</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url()?>admin/model" class="maps">Model</a>
                                       
                                    </li>
                                     <li>
                                         <a href="<?= base_url()?>admin/add_cars" class="pages">Add Cars</a>
                                    </li>
                                    
                                     <?php
                                       if($level['level'] == 'super'){
                                    ?>
                                    <li>
                                        <a href="#" class="pages">Publish Car</a>
                                             <ul>
                                                 <li><a href="<?= base_url()?>admin/published_car">Published Cars</a></li>
                                                 <li><a href="<?= base_url()?>admin/unpublished_car">Unpublished Cars</a></li>
                                            </ul>
                                    </li>
                                    
                                     <li>
                                        <a href="<?= base_url()?>admin/dealers" class="loginoptions">Dealers</a>
                                       
                                    </li>
                                    <?php
                                       }
                                     ?>

                                    <li>
                                        <a href="#" class="pages">Cars</a>
                                             <ul>
                                                 <li><a href="<?= base_url()?>admin/cars1">Buy Now Cars</a></li>
                                                 <li><a href="<?= base_url()?>admin/cars2">On Sail Cars</a></li>
                                                 <li><a href="<?= base_url()?>admin/cars3">On Ground Cars</a></li>
                                                 <li><a href="<?= base_url()?>admin/cars4">Sold Cars</a></li>
                                            </ul>
                                    </li>
                                    <li>
                                        <a href="<?= base_url()?>admin/orders" class="pages">Orders</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url()?>admin/invoices" class="pages">Invoices</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url()?>admin/create_invoice" class="pages">Create Invoice</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url()?>admin/tickets" class="pages">Tickets</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url()?>admin/agents" class="pages">Agents</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url()?>admin/partners" class="pages">Partners</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url()?>admin/logout" class="forms">Logout</a>
                                       
                                    </li>
                                  


                            </ul>
                            <div class="clearfix"></div>
                        </nav>
                        <!-- Sidebar Navigation End -->
                        <!-- Shadow Start -->
                        <span class="shadows"></span>
                        <!-- Shadow End -->
                    </div>
                </aside>
                <!-- Sidebar End -->
                <!-- Right Section Start -->
                <div class="right-sec">
                    <!-- Right Section Header Start -->
                    <header>
                        <!-- User Section Start -->
                        <div class="user">
                            <!--<figure>
                              <a href="#"><img src="<?php echo base_url(); ?>assets/admin/images/user2.jpg" alt="Admin" /></a>
                           </figure>-->
                            <div class="welcome">
                                <p></p>
                                <h5>Hello <?= $this->session->userdata("name") ?>,</h5>
                            </div>
                        </div>
                        <!-- Search Section End -->
                        <!-- Header Top Navigation Start -->
                        <nav class="topnav">
                            <ul id="nav1">


                                <li class="settings">
                                    <a href="<?php echo base_url() . 'app/my_profile/' ?>"><i class="glyphicon glyphicon-wrench"></i>Settings</a>
                                    <div class="popdown popdown-right settings">
                                        <nav>
                                            <a href="<?php echo base_url() ?>settings/change_password"><i class="glyphicon glyphicon-edit"></i>Change Password</a>

                                            <a href="<?php echo base_url() . 'admin/logout' ?>"><i class="glyphicon glyphicon-log-out"></i>Log out</a>
                                        </nav>
                                    </div>
                                </li>
                            </ul>
                        </nav>
                        <!-- Header Top Navigation End -->
                        <div class="clearfix"></div>
                    </header>
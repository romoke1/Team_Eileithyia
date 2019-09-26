<!DOCTYPE html>
<html lang="en">

    <head>
        <meta name="description" content="TokunboCars Dealer - sign up | Tokunbo Cars Nigeria a brand of CARSNOWNOW LIMITED which offers the most flexible, reliable and affordable alternative for purchasing a “Used” car from the United States, We have carefully created a DIY(do it yourself) system that allows you buy cars of your choice at extremely affordable rates"/>
        <meta name="robots" content="noodp"/>
        <meta name="keywords" content="tokunbo, US cars, Buy tokunbo cars, tokunbo cars in Nigeria, tokunbo cars in Lagos, tokunbo cars in Abuja, olx, jiji, olx cars, jiji cars, cars in Nigeria, cars, toyota, camry, corolla, acura, ford, edge, bmw, lexus, rx330, rx350, es300, es330, es 350, is250, highlander, chevrolet"/>
        <link rel="canonical" href="https://tokunbocars.ng/" />
        <link rel="publisher" href="https://business.google.com/b/103903205382144847070/dashboard/l/16294573529077345710?hl=en"/>
        <meta property="og:locale" content="en_US" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="TokunboCars Dealer - Sign up | Nigeria's No. 1 Site for Tokunbo Cars" />
        <meta property="og:description" content="TokunboCars Dealer - Sign up | TokunboCars - Nigeria's No. 1 Site for Tokunbo Cars" />
        <meta property="og:url" content="https://tokunbocars.ng/" />
        <meta property="og:site_name" content="TokunboCars.NG" />

        <!-- Facebook Pixel Code -->
        <script>
            !function (f, b, e, v, n, t, s)
            {
                if (f.fbq)
                    return;
                n = f.fbq = function () {
                    n.callMethod ?
                            n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                };
                if (!f._fbq)
                    f._fbq = n;
                n.push = n;
                n.loaded = !0;
                n.version = '2.0';
                n.queue = [];
                t = b.createElement(e);
                t.async = !0;
                t.src = v;
                s = b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t, s)
            }(window, document, 'script',
                    'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '396502644107667');
            fbq('track', 'PageView');
        </script>
        <noscript>
    <img height="1" width="1" 
         src="https://www.facebook.com/tr?id=396502644107667&ev=PageView
         &noscript=1"/>
    </noscript>
    <!-- End Facebook Pixel Code -->

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-113820192-1"></script>
    <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'UA-113820192-1');
    </script>

    <title><?= $title ?></title>
    <!-- Site favicon -->
    <link rel='shortcut icon' type='image/x-icon' href='<?= base_url() ?>images/favicon.png' />
    <!-- /site favicon -->
    <link href="<?= base_url() ?>dealers/toast/toastr.min.css" rel="stylesheet">

    <!-- Entypo font stylesheet -->
    <link href="<?= base_url() ?>dealers/css/entypo.css" rel="stylesheet">
    <!-- /entypo font stylesheet -->

    <!-- Font awesome stylesheet -->
    <link href="<?= base_url() ?>dealers/css/font-awesome.min.css" rel="stylesheet">
    <!-- /font awesome stylesheet -->

    <!-- Bootstrap stylesheet min version -->
    <link href="<?= base_url() ?>dealers/css/bootstrap.min.css" rel="stylesheet">
    <!-- /bootstrap stylesheet min version -->

    <!-- Integral core stylesheet -->
    <link href="<?= base_url() ?>dealers/css/integral-core.css" rel="stylesheet">
    <!-- /integral core stylesheet -->

    <!--Jvector Map-->
    <link href="<?= base_url() ?>dealers/plugins/jvectormap/css/jquery-jvectormap-2.0.3.css" rel="stylesheet">

    <link href="<?= base_url() ?>dealers/css/integral-forms.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/admin/css/select.css" rel="stylesheet">


    <!--Load JQuery-->
    <script src="<?= base_url() ?>dealers/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/sky.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/select.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/datepicker.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/ui/jquery.ui.datepicker.js"></script>
    <script src="<?= base_url() ?>dealers/toast/toastr.min.js"></script>

    <script src="<?= base_url() ?>dealers/js/bootstrap.min.js"></script>

</head>
<body>


    <!-- Page container -->
    <div class="page-container">

        <!-- Page Sidebar -->
        <div class="page-sidebar">

            <!-- Site header  -->
            <header class="site-header">
                <div class="site-logo"><a href="index.html"><img src="<?= base_url() ?>dealers/logo2.jpg" width="100%" alt="TokunboCars.NG" title="TokunboCars.NG"></a></div>
                <div class="sidebar-collapse hidden-xs"><a class="sidebar-collapse-icon" href="#"><i class="icon-menu"></i></a></div>
                <div class="sidebar-mobile-menu visible-xs"><a data-target="#side-nav" data-toggle="collapse" class="mobile-menu-icon" href="#"><i class="icon-menu"></i></a></div>
            </header>
            <!-- /site header -->

            <!-- Main navigation -->
            <ul id="side-nav" class="main-menu navbar-collapse collapse">
                <li class="<?php
                if ($page == 'dashboard'): echo 'active';
                endif;
                ?>"><a href="<?= base_url() ?>dealers/dashboard"><i class="icon-gauge"></i><span class="title">Dashboard</span></a></li>
               
                <?php 
                
                    $dealers = $this->model_getvalues->getDetails("dealers", "dealer_id", $this->session->userdata('dealer_id'));
                
                    if($dealers['status'] == 1){
                 ?>
                <li class="<?php
                    if ($page == 'add_cars'): echo 'active';
                    endif;
                    ?>"><a href="<?= base_url() ?>dealers/add_cars"><i class="fa fa-car"></i><span class="title">Add Car</span></a>
                </li>
                
                <li class="<?php
                    if ($page == 'orders_history'): echo 'active';
                    endif;
                    ?>"><a href="<?= base_url() ?>dealers/orders_history"><i class="icon-chart-bar"></i><span class="title">Order History</span></a>
                </li>
                <?php
                    }
                ?>
                
                
                <li class="<?php
                    if ($page == 'account_settings'): echo 'active';
                    endif;
                    ?>"><a href="<?= base_url() ?>dealers/account_settings"><i class="icon-cog"></i><span class="title">Account Settings</span></a>
                </li>
                
                <li class="<?php
                    if ($page == 'change_password'): echo 'active';
                    endif;
                    ?>"><a href="<?= base_url() ?>dealers/change_password"><i class="fa fa-toggle-on"></i><span class="title">Change Password</span></a>
                </li>
                
                <li class="<?php
                    if ($page == 'logout'): echo 'active';
                    endif;
                    ?>"><a href="<?= base_url() ?>dealers/logout"><i class="fa fa-power-off"></i><span class="title">Logout</span></a>
                </li>
            </ul>
            <!-- /main navigation -->
            <?php
                if($this->session->userdata('is_logged_in'))
                {
                    $dealer = $this->model_getvalues->getDetails("dealers", "dealer_id", $this->session->userdata('dealer_id'));
                    
            ?>
            <?php
                    if($dealer['verify_code'] == NULL){
            ?>
            <div style="position: fixed; top: 88%; width: 18.3%; background: pink; color: #800;  border-color: #800" class="alert alert-warning" role="alert"><strong>Oooops,</strong> Incomplete account registration. <a style="color: red; font-weight: bold;" href="<?= base_url()?>dealers/verification/<?= $dealer['dealer_id']?>">Click here to complete Registration</a></div>
            <?php
                    }elseif($dealer['verify_image'] == NULL){
            ?>
            <div style="position: fixed; top: 88%; width: 18.3%;  background: pink; color: #800; border-color: #800;" class="alert alert-warning" role="alert"><strong>Oooops,</strong> Incomplete account registration. <a style="color: red; font-weight: bold;" href="<?= base_url()?>dealers/id_verification/<?= $dealer['dealer_id']?>">Click here to complete Registration</a></div>
            <?php
                    }elseif((!$dealer) || ($dealer['status'] === '0')){
               ?>
                        <div style="position: fixed; top: 88%; width: 18.3%;" class="alert alert-danger" role="alert">Your account is not yet verified because it's been reviewed by the Admin</div>
            <?php
                    }
                }
            ?>
            
        </div>
        <!-- /page sidebar -->

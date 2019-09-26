<!DOCTYPE html>
<html>
    
<!-- Mirrored from coderthemes.com/ubold_1.1/dark/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 05 Dec 2015 17:13:37 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="<?= base_url()?>asset/images/favicon_1.ico">

        <title>Dashboard</title>

        <!--Morris Chart CSS -->
		<link rel="stylesheet" href="<?= base_url()?>asset/plugins/morris/morris.css">

        <link href="<?= base_url()?>asset/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url()?>asset/css/core.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url()?>asset/css/components.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url()?>asset/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url()?>asset/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url()?>asset/css/responsive.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url()?>asset/css/bootstrap-fileupload.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url()?>asset/plugins/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="<?= base_url()?>asset/js/modernizr.min.js"></script>

<script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-69506598-1', 'auto');
          ga('send', 'pageview');
    </script>


    </head>


    <body class="fixed-left">

        <div class="animationload">
            <div class="loader"></div>
        </div>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <!-- <div class="topbar-left">
                    <div class="text-center">
                        <a href="index.html" class="logo"><i class="icon-magnet icon-c-logo"></i><span>Ub<i class="md md-album"></i>ld</span></a>
                    </div>
                </div> -->

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left">
                                    <i class="ion-navicon"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>

                           <!--  <form role="search" class="navbar-left app-search pull-left hidden-xs">
			                     <input type="text" placeholder="Search..." class="form-control">
			                     <a href="#"><i class="fa fa-search"></i></a>
			                </form> -->


                            <ul class="nav navbar-nav navbar-right pull-right">
                                <!-- <li class="dropdown hidden-xs">
                                    <a href="#" data-target="#" class="dropdown-toggle waves-effect" data-toggle="dropdown" aria-expanded="true">
                                        <i class="icon-bell"></i> <span class="badge badge-xs badge-danger">3</span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-lg">
                                        <li class="notifi-title"><span class="label label-default pull-right">New 3</span>Notification</li>
                                        <li class="list-group nicescroll notification-list"> -->
                                           <!-- list item-->
                                           <!-- <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="pull-left p-r-10">
                                                    <em class="fa fa-diamond fa-2x text-primary"></em>
                                                 </div>
                                                 <div class="media-body">
                                                    <h5 class="media-heading">A new order has been placed A new order has been placed</h5>
                                                    <p class="m-0">
                                                        <small>There are new settings available</small>
                                                    </p>
                                                 </div>
                                              </div>
                                           </a> -->

                                           <!-- list item-->
                                           <!-- <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="pull-left p-r-10">
                                                    <em class="fa fa-cog fa-2x text-custom"></em>
                                                 </div>
                                                 <div class="media-body">
                                                    <h5 class="media-heading">New settings</h5>
                                                    <p class="m-0">
                                                        <small>There are new settings available</small>
                                                    </p>
                                                 </div>
                                              </div>
                                           </a> -->

                                           <!-- list item-->
                                           <!-- <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="pull-left p-r-10">
                                                    <em class="fa fa-bell-o fa-2x text-danger"></em>
                                                 </div>
                                                 <div class="media-body">
                                                    <h5 class="media-heading">Updates</h5>
                                                    <p class="m-0">
                                                        <small>There are <span class="text-primary font-600">2</span> new updates available</small>
                                                    </p>
                                                 </div>
                                              </div>
                                           </a> -->

                                           <!-- list item-->
                                           <!-- <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="pull-left p-r-10">
                                                    <em class="fa fa-user-plus fa-2x text-info"></em>
                                                 </div>
                                                 <div class="media-body">
                                                    <h5 class="media-heading">New user registered</h5>
                                                    <p class="m-0">
                                                        <small>You have 10 unread messages</small>
                                                    </p>
                                                 </div>
                                              </div>
                                           </a> -->

                                           <!-- list item-->
                                           <!-- <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="pull-left p-r-10">
                                                    <em class="fa fa-diamond fa-2x text-primary"></em>
                                                 </div>
                                                 <div class="media-body">
                                                    <h5 class="media-heading">A new order has been placed A new order has been placed</h5>
                                                    <p class="m-0">
                                                        <small>There are new settings available</small>
                                                    </p>
                                                 </div>
                                              </div>
                                           </a> -->

                                           <!-- list item-->
                                            <!-- <a href="javascript:void(0);" class="list-group-item">
                                                <div class="media">
                                                    <div class="pull-left p-r-10">
                                                     <em class="fa fa-cog fa-2x text-custom"></em>
                                                    </div>
                                                    <div class="media-body">
                                                      <h5 class="media-heading">New settings</h5>
                                                      <p class="m-0">
                                                        <small>There are new settings available</small>
                                                    </p>
                                                    </div>
                                              </div>
                                           </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="list-group-item text-right">
                                                <small class="font-600">See all notifications</small>
                                            </a>
                                        </li>
                                    </ul>
                                </li> -->
                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect"><i class="icon-size-fullscreen"></i></a>
                                </li>
                                <li class="hidden-xs">
                                    <a href="#" class="right-bar-toggle waves-effect"><i class="icon-settings"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle profile waves-effect" data-toggle="dropdown" aria-expanded="true"> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="edit_profile"><i class="ti-user m-r-5"></i> Edit Profile</a></li>
                                        <li><a href="change_password"><i class="ti-settings m-r-5"></i> Change Password</a></li>
                                        <li><a href="logout"><i class="ti-power-off m-r-5"></i> Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>

                        	<li class="text-muted menu-title">Navigation</li>


                            <li class="">
                                <a href="index" class="waves-effect waves-light"><i class="ti-home"></i> <span> Home </span> </a>
                               
                            </li>
                            <li class="">
                                <a href="dashboard" class="waves-effect waves-light"><i class="ti-home"></i> <span> Dashboard </span> </a>
                               
                            </li>
                             <li class="">
                                <a href="view_friend" class="waves-effect waves-light"><i class="ti-menu-alt"></i><span>Watchlist </span></a>
                               
                            </li>

                             <li class="">
                                <a href="profile" class="waves-effect waves-light"><i class="ti-gift"></i><span> Profile </span></a>
                               
                            </li>

                                                                 
                            <li class="">
                                <a href="add_friend" class="waves-effect waves-light"><i class="ti-pencil-alt"></i><span> Wallet </span></a>
                               
                            </li>

                            <li class="">
                                <a href="view_friend" class="waves-effect waves-light"><i class="ti-menu-alt"></i><span>Track Vehicles </span></a>
                               
                            </li>
                             <li class="">
                                <a href="view_friend" class="waves-effect waves-light"><i class="ti-menu-alt"></i><span>Approval </span></a>
                               
                            </li>
                             <li class="">
                                <a href="view_friend" class="waves-effect waves-light"><i class="ti-menu-alt"></i><span>Tickets </span></a>
                               
                            </li>
                            <li><a href="logout"><i class="ti-power-off m-r-5"></i> Logout</a></li>

                           

                           
                            

                           
                           

                            

                          

                           


                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End -->

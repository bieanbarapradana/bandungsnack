<!DOCTYPE html>

<html class="no-js"> 

    <head>

        <meta charset="utf-8">



        <title>BandungSnack.com</title>



        <meta name="description" content="ProUI is a Responsive Bootstrap Admin Template created by pixelcave and published on Themeforest.">

        <meta name="author" content="pixelcave">

        <meta name="robots" content="noindex, nofollow">



        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">



        <!-- Icons -->

        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->

        <link rel="shortcut icon" href="<?=base_url('assets/back-end/img/favicon.ico');?>">

        <link rel="apple-touch-icon" href="<?=base_url('assets/back-end/img/icon57.png');?>" sizes="57x57">

        <link rel="apple-touch-icon" href="<?=base_url('assets/back-end/img/icon72.png');?>" sizes="72x72">

        <link rel="apple-touch-icon" href="<?=base_url('assets/back-end/img/icon76.png');?>" sizes="76x76">

        <link rel="apple-touch-icon" href="<?=base_url('assets/back-end/img/icon114.png');?>" sizes="114x114">

        <link rel="apple-touch-icon" href="<?=base_url('assets/back-end/img/icon120.png');?>" sizes="120x120">

        <link rel="apple-touch-icon" href="<?=base_url('assets/back-end/img/icon144.png');?>" sizes="144x144">

        <link rel="apple-touch-icon" href="<?=base_url('assets/back-end/img/icon152.png');?>" sizes="152x152">

       

        <?php

          if(isset($add_css)):

            foreach($add_css as $css):

        ?>

        <link rel="stylesheet" href="<?=$css?>">

        <?php

            endforeach;

          endif;

        ?>

        <script src="<?=base_url('assets/back-end/js/vendor/modernizr-2.7.1-respond-1.4.2.min.js')?>"></script>

    </head>

    <body>

        <div class="preloader themed-background">

            <h1 class="push-top-bottom text-light text-center"><strong>Bandung</strong>Snack</h1>

            <div class="inner">

                <h3 class="text-light visible-lt-ie9 visible-lt-ie10"><strong>Loading..</strong></h3>

                <div class="preloader-spinner hidden-lt-ie9 hidden-lt-ie10"></div>

            </div>

        </div>

       

        <div id="page-container" class="sidebar-partial sidebar-visible-lg sidebar-no-animations">

          



            <!-- Main Sidebar -->

            <div id="sidebar">

                <!-- Wrapper for scrolling functionality -->

                <div class="sidebar-scroll">

                    <!-- Sidebar Content -->

                    <div class="sidebar-content">

                        <!-- Brand -->

                        <a href="<?=base_url('admin')?>" class="sidebar-brand">

                            <i class="gi gi-shopping_cart"></i><strong>Bandung</strong>Snack

                        </a>

                        <!-- END Brand -->



                        <!-- User Info -->

                        <div class="sidebar-section sidebar-user clearfix">

                            <div class="sidebar-user-avatar">

                                <a href="page_ready_user_profile.html">

                                    <img src="<?=base_url('assets/profile/admin/'.$this->session->userdata('profile'));?>" alt="avatar">

                                </a>

                            </div>

                            <div class="sidebar-user-name">John Doe</div>

                            <div class="sidebar-user-links">

                                <a href="<?=base_url('Profile')?>" data-toggle="tooltip" data-placement="bottom" title="Profile"><i class="gi gi-user"></i></a>

                                <a href="<?=base_url('Profile/edit/'.$this->session->userdata('id_users'))?>" data-toggle="modal" class="enable-tooltip" data-placement="bottom" title="Settings"><i class="gi gi-cogwheel"></i></a>

                                <a href="<?=base_url('auth/logout')?>" data-toggle="tooltip" data-placement="bottom" title="Logout"><i class="gi gi-exit"></i></a>

                            </div>

                        </div>

                        <!-- END User Info -->



                        <!-- Theme Colors -->

                        <!-- Change Color Theme functionality can be found in js/app.js - templateOptions() -->

                      

                        <!-- END Theme Colors -->



                        <!-- Sidebar Navigation -->

                        <ul class="sidebar-nav">

                            <li>

                                <a href="<?=base_url('Dashboard')?>" class=" active"><i class="gi gi-stopwatch sidebar-nav-icon"></i>Dashboard</a>

                            </li>

                            

                            <li class="sidebar-header">

                               

                                <span class="sidebar-header-title">Menu</span>

                            </li>

                            <?php

                                if ($this->session->userdata('akses')=='super admin') 

                                {

                                    include 'menu-super-admin.php';

                                }

                                elseif ($this->session->userdata('akses')=='admin') 

                                {

                                    # code...

                                }

                                elseif ($this->session->userdata('akses')=='customer care') 

                                {

                                    include 'menu-customer-care.php';

                                }



                            ?>

                            

                           

                        </ul>

                    </div>

                    <!-- END Sidebar Content -->

                </div>

                <!-- END Wrapper for scrolling functionality -->

            </div>

            <!-- END Main Sidebar -->



            <!-- Main Container -->

            <div id="main-container">

               

                <header class="navbar navbar-default">

                    <!-- Left Header Navigation -->

                    <ul class="nav navbar-nav-custom">

                        <!-- Main Sidebar Toggle Button -->

                        <li>

                            <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar');">

                                <i class="fa fa-bars fa-fw"></i>

                            </a>

                        </li>

                       

                    </ul>

                    <ul class="nav navbar-nav-custom pull-right"  id="pesan">
                        <li>

                            <!-- If you do not want the main sidebar to open when the alternative sidebar is closed, just remove the second parameter: App.sidebar('toggle-sidebar-alt'); -->

                            <a href="<?=base_url('Orders')?>">

                                <i class="gi gi-cart_in"></i>

                                <span class="label label-primary label-indicator animation-floating" id="new_order"></span>

                            </a>

                        </li>
                        <li>

                            <!-- If you do not want the main sidebar to open when the alternative sidebar is closed, just remove the second parameter: App.sidebar('toggle-sidebar-alt'); -->

                            <a href="a">

                                <i class="gi gi-message_plus"></i>

                                <span class="label label-primary label-indicator animation-floating" id="notifikasi"></span>

                            </a>

                        </li>
                        <li>

                            <!-- If you do not want the main sidebar to open when the alternative sidebar is closed, just remove the second parameter: App.sidebar('toggle-sidebar-alt'); -->

                            <a href="<?=base_url('Orders/orders_payment')?>">

                                <i class="gi gi-globe"></i>

                                <span class="label label-primary label-indicator animation-floating" id="konfirmasi_pembayaran"></span>

                            </a>

                        </li>


                        <li class="dropdown">

                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">

                                <img src="<?=base_url('assets/profile/admin/'.$this->session->userdata('profile'));?>" alt="avatar"> <i class="fa fa-angle-down"></i>

                            </a>

                            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">

                                <li class="dropdown-header text-center">Account</li>

                               

                                <li>

                                    <a href="<?=base_url('Profile')?>">

                                        <i class="fa fa-user fa-fw pull-right"></i>

                                        Profile

                                    </a>

                                    <!-- Opens the user settings modal that can be found at the bottom of each page (page_footer.html in PHP version) -->

                                    <a href="<?=base_url('Profile/edit/'.$this->session->userdata('id_users'))?>" data-toggle="modal">

                                        <i class="fa fa-cog fa-fw pull-right"></i>

                                        Settings

                                    </a>

                                </li>

                                <li class="divider"></li>

                                <li>

                                    <a href="<?=base_url('auth/logout')?>"><i class="fa fa-ban fa-fw pull-right"></i> Logout</a>

                                </li>

                            </ul>

                        </li>

                        <!-- END User Dropdown -->

                    </ul>

                    <!-- END Right Header Navigation -->

                </header>

                <!-- END Header -->



                <!-- Page content -->
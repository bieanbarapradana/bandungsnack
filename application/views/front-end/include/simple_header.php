<!DOCTYPE html>

<!--[if IE 7 ]><html class="ie ie7 lte9 lte8 lte7" lang="en-US"><![endif]-->

<!--[if IE 8]><html class="ie ie8 lte9 lte8" lang="en-US">	<![endif]-->

<!--[if IE 9]><html class="ie ie9 lte9" lang="en-US"><![endif]-->

<!--[if (gt IE 9)|!(IE)]><!-->

<html class="noIE" lang="en-US">

<!--<![endif]-->



<head>

<meta property="og:title" content="Bandungsnack" />
<meta property="og:site_name" content="Bandungsnack.com" />
<meta property="og:url" content="http://bandungsnack.com/" />
<meta property="og:image" content="http://bandungsnack.com/assets/front-end/images/bandungsnack.png" />
<meta property="og:type" content="ecommerce" />






<link href="<?=base_url('assets/front-end/images/ico..html');?>" rel="shortcut icon">

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">



<title>Bandung Snack</title>







<!-- Reset CSS -->



<?php



          if(isset($add_css)):



            foreach($add_css as $css):



        ?>



        <link rel="stylesheet" href="<?=$css?>">



        <?php



            endforeach;



          endif;



        ?>



<!--link href="css/skin/color.css" id="colorstyle" rel="stylesheet"-->

<!--

<?php

  $tanggal = date('Y-m-d');

$day = date('D', strtotime($tanggal));

$dayList = array(

  'Sun' => 'Minggu',

  'Mon' => 'Senin',

  'Tue' => 'Selasa',

  'Wed' => 'Rabu',

  'Thu' => 'Kamis',

  'Fri' => 'Jumat',

  'Sat' => 'Sabtu'

);

//echo "Tanggal {$tanggal} adalah hari : " . $dayList[$day];

  if ($dayList[$day]=='Minggu') 

  {

    ?>

      <link href="<?=base_url('assets/front-end/css/skin/steel-blue.css')?>" id="colorstyle" rel="stylesheet">



    <?php

  }

  elseif ($dayList[$day]=='Senin') 

  {

    ?>

      <link href="<?=base_url('assets/front-end/css/skin/blue-red.css')?>" id="colorstyle" rel="stylesheet">

   

    <?php 

  }

  elseif ($dayList[$day]=='Selasa') 

  {

    ?>

      <link href="<?=base_url('assets/front-end/css/skin/gray.css')?>" id="colorstyle" rel="stylesheet">

    <?php 

  }

  elseif ($dayList[$day]=='Rabu') 

  {

    ?>

      <link href="<?=base_url('assets/front-end/css/skin/cadetblue-violetred.css')?>" id="colorstyle" rel="stylesheet">

    <?php 

  }

  elseif ($dayList[$day]=='Kamis') 

  {

    ?>

      <link href="<?=base_url('assets/front-end/css/skin/midnight-blue.css')?>" id="colorstyle" rel="stylesheet">

    <?php 

  }

  elseif ($dayList[$day]=='Jumat') 

  {

    ?>

      <link href="<?=base_url('assets/front-end/css/skin/mediumpurple-seagreen.css')?>" id="colorstyle" rel="stylesheet">

    <?php 

  }

  elseif ($dayList[$day]=='Sabtu') 

  {

    ?>

      <link href="<?=base_url('assets/front-end/css/skin/steel-blue.css')?>" id="colorstyle" rel="stylesheet">

    <?php 

  }

  else

  {

    ?>

      <link href="<?=base_url('assets/front-end/css/skin/color.css')?>" id="colorstyle" rel="stylesheet">

    <?php

  }

  

  

  

?>

-->

<link href="<?=base_url('assets/front-end/css/skin/steel-blue.css')?>" id="colorstyle" rel="stylesheet">

<!--link href="<?=base_url('assets/front-end/css/skin/color.css')?>" id="colorstyle" rel="stylesheet"-->







<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->



<!--[if lt IE 9]> <script src="js/html5shiv.js"></script> <script src="js/respond.min.js"></script> <![endif]-->







<!-- Bootstrap core JavaScript -->









<!--[if IE 8]>



    <script type="text/javascript" src="js/selectivizr.js"></script>



    <![endif]-->







</head>











<!-- Header -->

<header> 

  <!-- Top Heading Bar -->

  <div class="container">

    <div class="row">

      <div class="col-md-12">

        <div class="topheadrow">

          <ul class="nav nav-pills pull-left">



            <!--li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" href="#a">ENG <i class="fa fa-angle-down fa-fw"></i> </a>



              <ul class="dropdown-menu" role="menu">



                <li><a href="#a">ENG</a></li>



                <li><a href="#a">JPN</a></li>



                <li><a href="#a">CHI</a></li>



              </ul>



            </li>



            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" href="#a">USD <i class="fa fa-angle-down fa-fw"></i> </a>



              <ul class="dropdown-menu" role="menu">



                <li><a href="#a">USD</a></li>



                <li><a href="#a">PKR</a></li>



                <li><a href="#a">JPY</a></li>



              </ul>



            </li-->

                 <?php

          $total_jajanan_baru = 0;

            foreach ($this->cart->contents() as $key => $value) {

              $total_jajanan_baru = $total_jajanan_baru + $value['qty'];

              

            }

           // echo var_dump($this->cart->contents());

        ?>
<li> <a href="<?=base_url('Cart')?>" > <i class="fa fa-shopping-cart fa-fw"></i> <span class="hidden-xs">Keranjang Belanja(<span id="new_cart"></span>)</span> </a> </li>
<li> <a href="<?=base_url('Tracking')?>" > <i class="fa fa-car fa-fw"></i> <span class="hidden-xs">Lacak Pesanan</span> </a> </li>

            <?php



              if ($this->session->userdata('login_in_customer')) 



              {

                ?>

                  

            <li class="hidden-md hidden-sm"> <a href="<?=base_url('Transaksi')?>"> <i class="fa fa-history fa-fw"></i> <span class="hidden-xs hidden-md">Transaksi</span> <span  style="color:red" id="new_order"></span></a> </li>

            <li class="hidden-sm hidden-sm"> <a href="<?=base_url('Blog')?>"> <i class="fa fa-th-large fa-fw"></i> <span class="hidden-xs">Blog(0)</span></a> </li>

            <li class="hidden-sm hidden-sm"> <a href="<?=base_url('Forum')?>"> <i class="fa fa-paperclip fa-fw"></i> <span class="hidden-xs">Forum(0)</span></a> </li>

            <li class="hidden-xs hidden-sm"> <a href="<?=base_url('Newspaper')?>"> <i class="fa fa-newspaper-o fa-fw"></i> <span class="hidden-xs">News Paper(0)</span></a> </li>



                <?php

              }



            ?>

            </ul>

          <ul class="nav nav-pills pull-right">



           <?php

                if ($this->session->userdata('login_in_customer')) {

                  ?>

                      <li class="dropdown hidden-xs" onclick="window.location.href='<?=base_url('Pemberitahuan')?>'"> 



                      <a class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" href="<?=base_url('Pemberitahuan')?>"> 



                      <i class="fa fa-globe fa-fw"></i> <span class="hidden-xs">Pemberitahuan</span> <span style="color:red" id="new_notifikasi"></span></a></li>

                     <li class="dropdown hidden-xs" onclick="window.location.href='<?=base_url('Account')?>'"> <a class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" href="<?=base_url('Account')?>"> <i class="fa fa-user fa-fw"></i> <span class="hidden-xs">ACCOUNT</span></a></li>

                     <!-- <li class="dropdown hidden-xs" onclick="window.location.href='<?=base_url('Setting')?>'"> <a class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" href="<?=base_url('Setting')?>"> <i class="fa fa-gears fa-fw"></i> <span class="hidden-xs">SETTING</span></a></li> -->

                     <li class="dropdown"> <a  href="<?=base_url('Auth/logout_u')?>"> <i class="fa fa-sign-out fa-fw"></i> <span class="hidden-xs">LOG OUT</span></a></li>

                  <?php

                }

                else

                {

           ?>

 
		   

             <li class="dropdown"> <a class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" href="#a"> <i class="fa fa-user fa-fw"></i> <span class="hidden-xs">AKTIVASI</span></a>



              <div class="loginbox dropdown-menu"> 

              <span class="form-header" style="font-family:arial;"><i class="fa fa-cogs"></i> Aktivasi</span>



                <form action="<?=base_url('Auth/active')?>" method="POST">



                  <div class="form-group"> <i class="fa fa-user fa-fw"></i>



                    <input class="form-control" id="username" name="username" placeholder="Username" type="text" data-validation="required">



                  </div>



                  <div class="form-group"> <i class="fa fa-lock fa-fw"></i>



                    <input class="form-control" id="activate_code" name="activate_code" placeholder="Kode Aktivasi" type="text" data-validation="required">



                  </div>



                    <div class="btn-group" role="group" aria-label="..."  style="text-align:center;">

                    <button class="col-xs-12 btn medium color1 pull-left" type="submit">ACTIVE</button>

                

                    </div>

                  



                    </form>



              </div>



            </li>

            <li class="dropdown"> <a class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" href="#a"> <i class="fa fa-user fa-fw"></i> <span class="hidden-xs"> Login</span></a>



              <div class="loginbox dropdown-menu"> 

              <span class="form-header" style="font-family:arial;"><i class="fa fa-lock"></i> Login</span></center>



                <form action="<?=base_url('Auth/validate')?>" method="POST">



                  <div class="form-group"> <i class="fa fa-user fa-fw"></i>



                    <input class="form-control" id="username" name="username" placeholder="Username" type="text" data-validation="required">



                  </div>



                  <div class="form-group"> <i class="fa fa-lock fa-fw"></i>



                    <input class="form-control" id="InputPassword" id="password" name="password" placeholder="Password" type="password" data-validation="required">



                  </div>



                    <div class="btn-group" role="group" aria-label="..."  style="text-align:center;">

                    <button class="col-xs-6 btn medium color1 pull-left" type="submit">LOGIN</button>

                

                    <button class="col-xs-6 btn medium color1 pull-right" type="button" onclick="window.location.href='<?=base_url('Registrasi')?>'">SIGNUP</button>

                    </div>

                    



                    </form>



              </div>



            </li>

            <?php } ?>



          </ul>

        </div>

      </div>

    </div>

  </div>

  <!-- end: Top Heading Bar -->

  

  <div class="f-space20"></div>

  <!-- Logo and Search -->

  <div class="container">

    <div class="row clearfix">

       <div class="col-lg-3 col-xs-12">



        <div class="logo col-lg-12" > <a href="<?=base_url()?>" title="Bandung Snack"><!-- <img alt="Flatro - Responsive Metro Inspired Flat ECommerce theme" src="<?=base_url('assets/front-end/images/logo2.png');?>"> -->



          



          <div class="logotext hidden-xs" style="margin-bottom:-5%;margin-left:-20%;" ><img class="col-md-12 col-lg-12 col-xs-12 col-sm-12"  src="<?=base_url('assets/front-end/images/bandungsnack.png');?>" style="width:100%;margin-top:-10%">



          </div>





          </a> </div>



      </div>

      <!-- end: logo -->

      <div class="visible-xs f-space20"></div>

      <!-- search -->

      <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12 pull-right">

        <div class="searchbar">

          <form action="<?=base_url('Search/search')?>" method="POST">



            <ul class="pull-left">

              <li class="input-prepend dropdown" data-select="true"> <a class="add-on dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" href="#a"> <span class="dropdown-display">Semua

                Kategori</span> <i class="fa fa-sort fa-fw"></i> </a> 

                <!-- this hidden field is used to contain the selected option from the dropdown -->

                <input class="dropdown-field" type="hidden" value="All Categories"/>

                <ul class="dropdown-menu" role="menu">

                  <li onclick="window.location.href='<?=base_url('Search/search/1/20/new_product')?>'"><a href="">Baru</a></li>

                  <li onclick="window.location.href='<?=base_url('Search/search/1/20/high_rate')?>'"><a href="" >Terlaris</a></li>

                  <li onclick="window.location.href='<?=base_url('Search/search/1/20')?>'"><a href="" >Semua Snack</a></li>
				  
				   <li onclick="window.location.href='<?=base_url('Produk_Kue_Basah')?>'"><a href="" >Kue Basah</a></li>

                  <li onclick="window.location.href='<?=base_url('Brands')?>'"><a href="" data-value="Mobile Phones">Mitra</a></li>

                  <!--li><a href="#a" data-value="Computers">Local Snack</a></li-->

                  <li onclick="window.location.href='<?=base_url('Search/search/1/20')?>'"><a href="" >Semua Kategori</a></li>

                </ul>

              </li>

            </ul>

            <div class="searchbox pull-left">

              <input class="searchinput" id="search" placeholder="Search..." name="search" type="search">

              <button class="fa fa-search fa-fw" type="submit"></button>

            </div>

          </form>

        </div>

      </div>

      <!-- end: search --> 

      

    </div>

  </div>

  <!-- end: Logo and Search -->

  <div class="f-space20"></div>

  <!-- Menu -->

  <div class="container">

    <div class="row clearfix">

      <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 menu-col">

        <div class="menu-heading menuHeadingdropdown"> <span> <i class="fa fa-bars"></i> Kategori <i class="fa fa-angle-down"></i></span> </div>

        <!-- Mega Menu -->

        <div class="menu3dmega vertical menuMegasub" id="menuMega">

          <ul>

            <!-- Menu Item Links for Mobiles Only -->

            <li class="visible-xs"> <a href="<?=base_url('Welcome')?>"> <i class="fa fa-home"></i> <span>Beranda</span> <i class="fa fa-angle-right"></i> </a>

              <div class="dropdown-menu flyout-menu"> 

                <!-- Sub Menu -->

                <ul>

                  <li><a href="<?=base_url('About')?>">Tentang Kami</a></li>

                  <li><a href="blog.html">Blog</a></li>

                  <li> <a href="#a"><span>Account</span> <i class="fa fa-caret-right"></i> </a>

                    <ul class="dropdown-menu sub flyout-menu">

                      <li><a href="#a">Login/Register</a></li>

                      <li><a href="#a">My Orders</a></li>

                      <li><a href="#a">Wish list</a></li>

                      <li><a href="<?=base_url('cart');?>">Shopping Cart</a></li>

                      <li><a href="<?=base_url('Checkout')?>">Checkout</a></li>

                    </ul>

                  </li>

                  <li> <a href="#a"><span>Product</span> <i class="fa fa-caret-right"></i> </a>

                    <ul class="dropdown-menu sub flyout-menu">

                      <li><a href="<?=base_url('Category_grid')?>">Category Grid</a></li>

                      <li><a href="<?=base_url('Category_list')?>">Category List</a></li>

                      <li><a href="product.html">Product Page</a> </li>

                    </ul>

                  </li>

                  <li><a href="<?=base_url('cart');?>">Shoping Cart</a></li>

                  <li><a href="<?=base_url('Checkout')?>">Checkout</a></li>

                  <li><a href="<?=base_url('Blog_single')?>">Blog Post</a></li>

                  <li><a href="<?=base_url('Contact')?>">Contact us</a></li>

                </ul>

                <!-- end: Sub Menu --> 

              </div>

            </li>

            <!-- end: Menu Item --> 

            <!-- Menu Item for Tablets and Computers Only-->

             <li class="hidden-xs"> <a href=""> <i class="fa fa-files-o"></i> <span> Halaman </span> <i class="fa fa-angle-right"></i> </a>



              <div class="dropdown-menu flyout-menu"> 



                <!-- Sub Menu -->



                <ul>



                  <li><a href="<?=base_url('')?>">Beranda</a></li>



                  <li><a href="<?=base_url('About')?>">Tentang Kami</a></li>



                  <li><a href="<?=base_url('Blog')?>">Blog</a></li>



                  <li><a href="<?=base_url('Contact')?>">Kontak</a></li>



                  <li> <a href="<?=base_url('Search/search/1/20')?>">Semua Snack </a></li>



                  <li><a href="<?=base_url('cart')?>">Keranjang Belanja</a></li>



                  <li><a href="<?=base_url('checkout')?>">Checkout</a></li>



                  <li><a href="<?=base_url('Contact')?>">Hubungi Kami</a></li>



                </ul>



                <!-- end: Sub Menu --> 



              </div>



            </li>

            <!-- end: Menu Item --> 

            <!-- Menu Item -->

            <li> <a href="#a"> <i class="fa fa-shopping-cart"></i> <span>Snack Baru</span> <i class="fa fa-angle-right"></i> </a>



              <div class="dropdown-menu"> 



                <!-- Sub Menu -->



                <div class="content">



                  <div class="row">

                  <?php



                      foreach ($data_seller as $key => $value) {

                        ?>



                         <div class="col-md-4"> <a class="menu-title" href="<?=base_url('Brands/product/'.$value->id_seller)?>"><?=$value->seller_name?></a>



                          <ul>



                              <?php



                                foreach ($data_product->get_data_product_use_id_seller($value->id_seller)->result() as $product_seller) 



                                {

                                

                                    ?>



                                      <li><a href="<?=base_url('jajan/detail/'.$product_seller->id_product);?>"><?=$product_seller->product_name?></a></li>

                                

                                    <?php

                                }



                              ?>



                          </ul>



                        </div>



                        <?php



                      }



                  ?>

                   





                  </div>



                 



                </div>



                <!-- end: Sub Menu --> 



              </div>



            </li>
			
			
			<li> <a href="#a"> <i class="fa fa-user"></i> <span>Supplier</span> <i class="fa fa-angle-right"></i> </a>



              <div class="dropdown-menu"> 



                <!-- Sub Menu -->



                <div class="content">



                  <div class="row">

                  



                         <div class="col-md-4"> <a class="menu-title" href="#"></a>



                          <ul>



                              



                                      <li><a href="#">Syarat dan Ketentuan</a></li>
									  <li><a href="#">Registrasi</a></li>

                                




                          </ul>



                        </div>



                        

                   





                  </div>



                 



                </div>



                <!-- end: Sub Menu --> 



              </div>



            </li>
			
			<li> <a href="#a"> <i class="fa fa-user"></i> <span>Reseller</span> <i class="fa fa-angle-right"></i> </a>



              <div class="dropdown-menu"> 



                <!-- Sub Menu -->



                <div class="content">



                  <div class="row">

                  



                         <div class="col-md-4"> <a class="menu-title" href="#"></a>



                          <ul>



                              



                                      <li><a href="#">Syarat dan Ketentuan</a></li>
									  <li><a href="#">Registrasi</a></li>

                                




                          </ul>



                        </div>



                        

                   





                  </div>



                 



                </div>



                <!-- end: Sub Menu --> 



              </div>



            </li>

            <!-- end: Menu Item --> 

            <!-- Menu Item -->

           

            <li> <a href="#a"> <i class="fa fa-edit"></i> <span>Terlaris</span> <i class="fa fa-angle-right"></i> </a>



              <div class="dropdown-menu"> 



                <!-- Sub Menu -->



                <div class="content">



                  <div class="row">



                    <div class="col-md-5"> <a class="menu-title" href="<?=base_url('Search/search/1/20/high_rate')?>">Terlaris</a>



                      <ul>

                      <?php

                            foreach ($list_terlaris as $key => $value) {

                              ?>  

                                <li><a href="<?=base_url('jajan/detail/'.$value->id_product)?>"><?=$value->product_name?></a></li>

                              <?php

                            }

                      ?>





                      



                      </ul>



                    </div>

                    <?php

                      if ($paling_laris==null) {

                        # code...

                      }

                      else

                      {

                    ?>

                    <div class="col-md-7">



                      <div class="product-block">



                        <div class="image">



                          <div class="product-label product-sale"><span>TERLARIS</span></div>



                          <a class="img" href="<?=base_url('jajan/detail/'.$paling_laris->id_product)?>"><img alt="product info" src="<?=base_url('assets/products/'.$paling_laris->photo);?>" title="product title"></a> </div>



                        <div class="product-meta">



                          <div class="name"><a href="<?=base_url('jajan/detail/'.$paling_laris->id_product)?>"><?=$paling_laris->product_name?></a></div>



                          <div class="big-price"> 

                          <?php

                              if ($paling_laris->discount==0) 

                              {

                                ?>

                                 <span class="price-new"  style="font-size:12pt;"><span class="sym">Rp, </span><?=number_format($paling_laris->product_price)?></span> 

                                <?php

                              }

                              else

                              {

                                $harga_setelah_discount = $paling_laris->product_price - ($paling_laris->product_price * ($paling_laris->discount /100));

                                ?>

                                 <span class="price-new" style="font-size:12pt;"><span class="sym">Rp, </span><?=number_format($harga_setelah_discount)?></span> 

                          <span class="price-old" style="font-size:12pt;"><span class="sym">Rp, </span><?=number_format($paling_laris->product_price)?></span> 

                                <?php

                              }

                          ?>

                         





                          </div>



                          <div class="big-btns"> 

                          <a class="btn btn-default btn-view pull-left" href="<?=base_url('jajan/detail/'.$paling_laris->id_product)?>">View</a>

                           <a class="btn btn-default btn-addtocart pull-right" href="<?=base_url('Shoppingcart/add/'.$paling_laris->id_product)?>">Add to Cart</a>

                             </div>



                          <div class="small-price"> 

                          <?php

                              if ($paling_laris->discount==0) 

                              {

                                ?>

                                 <span class="price-new"  style="font-size:12pt;"><span class="sym">Rp, </span><?=number_format($paling_laris->product_price)?></span> 

                                <?php

                              }

                              else

                              {

                                $harga_setelah_discount = $paling_laris->product_price - ($paling_laris->product_price * ($paling_laris->discount /100));

                                ?>

                                 <span class="price-new" style="font-size:12pt;"><span class="sym">Rp, </span><?=number_format($harga_setelah_discount)?></span> 

                                <?php

                              }

                          ?>

                            </div>



                          <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-half-o"></i> <i class="fa fa-star-o"></i> </div>



                          <div class="small-btns">



                            <button class="btn btn-default btn-compare pull-left" data-toggle="tooltip" title="Add to Compare"> <i class="fa fa-retweet fa-fw"></i> </button>



                            <button class="btn btn-default btn-wishlist pull-left" data-toggle="tooltip" title="Add to Wishlist"> <i class="fa fa-heart fa-fw"></i> </button>



                            <a href="<?=base_url('Shoppingcart/add/'.$paling_laris->id_product)?>" class="btn btn-default btn-addtocart pull-left" data-toggle="tooltip" title="Tambahkan Ke Keranjang"> <i class="fa fa-shopping-cart fa-fw"></i> </a>



                          </div>



                        </div>



                        <div class="meta-back"></div>



                      </div>



                    </div>

                    <?php }?>

                  </div>



                </div>



                <!-- end: Sub Menu --> 



              </div>



            </li>



            <!-- end: Menu Item --> 



            <!-- Menu Item -->



            <li> <a href="<?=base_url('Search/search/1/20')?>"> <i class="fa fa-video-camera"></i> <span>Semua Snack</span></a> </li>



            <!-- end: Menu Item --> 



            <!-- Menu Item -->



            <li> <a href="<?=base_url('Brands')?>"> <i class="fa fa-mobile"></i> <span>Brands</span></a> </li>



            <!-- end: Menu Item --> 



            <!-- Menu Item -->



            <li> <a href="<?=base_url('Local')?>"> <i class="fa fa-laptop"></i> <span>Local Snack</span></a> </li>



            <!-- end: Menu Item --> 

            

            <!-- Menu Item -->



           



            <!-- end: Menu Item --> 

            

             <!-- Menu Item -->



           

            

          </ul>

        </div>

        <!-- end: Mega Menu --> 

      </div>

      <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 menu-col-2"> 

        <!-- Navigation Buttons/Quick Cart for Tablets and Desktop Only -->

        <div class="menu-links hidden-xs">

          <ul class="nav nav-pills nav-justified">

           

            <li> <a href="<?=base_url('Welcome')?>"> <i class="fa fa-home fa-fw"></i> <span class="hidden-sm">Beranda</span></a> </li>



            <li> <a href="<?=base_url('About')?>"> <i class="fa fa-info-circle fa-fw"></i> <span class="hidden-sm">Tentang Kami</span></a> </li>



            <li> <a href="<?=base_url('Blog')?>"> <i class="fa fa-bullhorn fa-fw"></i> <span class="hidden-sm">Blog</span></a> </li>



            <li> <a href="<?=base_url('Contact')?>"> <i class="fa fa-pencil-square-o fa-fw"></i> <span class="hidden-sm ">Kontak</span></a> </li>

            <?php

            $tot_harga = 0;

            $total_barang_belanja = 0;

              foreach ($this->cart->contents() as $key => $value) {

                      $total_barang_belanja = $total_barang_belanja + $value['qty'];

                      $tot_harga = $tot_harga + ($value['qty'] * $value['harga_baru']);

              }

            ?>
 <li class="dropdown"> <a href="<?=base_url('cart');?>"> <i class="fa fa-shopping-cart fa-fw"></i> <span class="hidden-sm" id="new_cart_header"> <!-- <?=$total_barang_belanja?>  items | Rp <?=number_format($tot_harga)?> --></span></a> 


              <!-- Quick Cart -->

              <div class="dropdown-menu quick-cart" id="detail_cart">

                <!-- <div class="qc-row qc-row-heading"> 

                <span class="qc-col-qty">QTY.</span> 

                <span class="qc-col-name" id="total_jajan">

                </span> <span class="qc-col-price" id="total_harga"></span> 

                </div> -->

               <!--  <?php

                    foreach ($this->cart->contents() as $key => $value) {

                      ?>



                <div class="qc-row qc-row-item"> <span class="qc-col-qty"><?=$value['qty']?></span> <span class="qc-col-name"><a href="#a"><?=$value['name']?></a></span> <span class="qc-col-price">

                  <?php

                     echo $tot_harga_baru = ($value['qty'] * $value['harga_baru']);

                  ?>



                </span> <span class="qc-col-remove"> <a href="<?=base_url('Shoppingcart/delete/'.$value['rowid'])?>"><i class="fa fa-times fa-fw"></i></a> </span> </div>

                

                      <?php

                    }



                ?> -->



                

                <div class="qc-row-bottom"><a class="btn qc-btn-viewcart" href="<?=base_url('cart')?>">view

                  cart</a><a class="btn qc-btn-checkout" href="<?=base_url('Checkout')?>">check
                  out</a></div>

              </div>

              <!-- end: Quick Cart --> 

            </li>

          </ul>

        </div>

        <!-- end: Navigation Buttons/Quick Cart Tablets and large screens Only --> 

        

      </div>

    </div>

  </div>

</header>

<!-- end: Header -->



<div class="row clearfix"></div>

<div class="container">

  <div class="row">

    <div class="col-md-12">

      <div class="breadcrumb"> <a href="<?=base_url('Welcome')?>"> <i class="fa fa-home fa-fw"></i> Beranda </a> <i class="fa fa-angle-right fa-fw"></i> <a href="<?=base_url('About')?>"> Tentang Kami </a> </div>

      

      <!-- Quick Help for tablets and large screens -->

      <div class="quick-message hidden-xs">

        <div class="quick-box">

          <div class="quick-slide"> <span class="title">Bantuan</span>

            <div class="quickbox slide" id="quickbox">

              <div class="carousel-inner">

                <div class="item active"> <a href="#"> <i class="fa fa-envelope fa-fw"></i> Pesan Cepat</a> </div>

                <div class="item"> <a href="#"> <i class="fa fa-question-circle fa-fw"></i> FAQ</a> </div>

                <div class="item"> <a href="#"> <i class="fa fa-phone fa-fw"></i>+62 822-2537-3657</a> </div>

              </div>

            </div>

            <a class="left carousel-control" data-slide="prev" href="#quickbox"> <i class="fa fa-angle-left fa-fw"></i> </a> <a class="right carousel-control" data-slide="next" href="#quickbox"> <i class="fa fa-angle-right fa-fw"></i> </a> </div>

        </div>

      </div>

      <!-- end: Quick Help --> 

      

    </div>

  </div>

</div>
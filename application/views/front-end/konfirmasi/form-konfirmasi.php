

<!-- end: Page title -->
<div class="row clearfix f-space10"></div>
<div class="container"> 
  <!-- row -->
  <div class="row">
    <div class="col-md-9 col-sm-12 col-xs-12 main-column box-block"> 
      
      <!-- Checkout Options -->
      <div class="box-content checkout-op">
        <div class="panel-group" id="checkout-options"> 
          
          <!-- login and register panel -->
          <div class="panel panel-default">
            <div class="panel-heading opened" data-parent="#checkout-options" data-target="#op1" >
              <h4 class="panel-title"> <a href="#a"> <span class="fa fa-plus"></span> Form Registrasi </a><span class="op-number"></span> </h4>
            </div>
            <div class="panel-collapse collapse in" id="op1">
               <div class="panel-body">
                <div class="row co-row">
                  <form id="validasi-registrasi" action="<?=base_url('Registrasi/daftar')?>" method="POST">
                    <!-- Register -->
                    
                    <div class="col-md-12 col-xs-12">
                    <center>
                      <div class="box-content form-box">
                         <h2 class="title"></h2>
                      <p>Isilah data diri anda sesuai dengan form yang disediakan.</p>
                      <p>Inget Ngemil Inget Bandung Snack....</p>
                        <div style="color: red;text-align:left;font-family:arial;font-size:10pt;margin-bottom:-10px;margin-left:40px" id="invalid-username" class="error_msg"></div>
                        <?php

                          if ($this->session->flashdata('username') != null) {
                           ?>
                       <input type="text" name="username" id="username" placeholder="Username" class="input4" Value="<?=$this->session->flashdata('username')?>" required="" >
                            <?php
                          }
                          else
                          {
                             ?>
                       <input type="text" name="username" id="username" placeholder="Username" class="input4" required="" >
                            <?php
                          }
                        ?>

                        <div style="color: red;text-align:left;font-family:arial;font-size:10pt;margin-bottom:-10px;margin-left:40px" id="invalid-password" class="error_msg"></div>

                        <input type="password" name="password" id="password" placeholder="Password" class="input4" required="">

                         <div style="color: red;text-align:left;font-family:arial;font-size:10pt;margin-bottom:-10px;margin-left:40px" id="invalid-re_password" class="error_msg"></div>
                        <input type="password" name="re_password" id="re_password" placeholder="Re Password" class="input4" required="">
                       
                        <div style="color: red;text-align:left;font-family:arial;font-size:10pt;margin-bottom:-10px;margin-left:40px" id="invalid-first_name" class="error_msg"></div>
                         <?php

                          if ($this->session->flashdata('first_name') != null) {
                           ?>
                        <input type="text" name="first_name" id="first_name" placeholder="Nama Depan" class="input4" required="" value="<?=$this->session->flashdata('first_name')?>">
                        <?php } else { ?>
                          <input type="text" name="first_name" id="first_name" placeholder="Nama Depan" class="input4" required="">
                          <?php } ?>
                        <div style="color: red;text-align:left;font-family:arial;font-size:10pt;margin-bottom:-10px;margin-left:40px" id="invalid-last_name" class="error_msg"></div>
                        <input type="text" name="last_name" id="last_name" placeholder="Nama Belakang" class="input4" required="">
                        
                        <div style="color: red;text-align:left;font-family:arial;font-size:10pt;margin-bottom:-10px;margin-left:40px" id="invalid-email" class="error_msg"></div>
                        <input type="text" name="email" id="email" placeholder="Email" class="input4"  required="">
                       
                       <div style="color: red;text-align:left;font-family:arial;font-size:10pt;margin-bottom:-10px;margin-left:40px" id="invalid-contact" class="error_msg"></div>
                        <input type="text" name="contact" id="contact" placeholder="No Telp" class="input4" required="">

                        <div style="color: red;text-align:left;font-family:arial;font-size:10pt;margin-bottom:-10px;margin-left:40px" id="invalid-address" class="error_msg"></div>
                        <textarea type="text" name="address" id="address" placeholder="Alamat" class="input4" required=""></textarea>

                        <button type="submit" class="btn medium color1 input4">DAFTAR</button>
                        <button type="button" class="btn medium color2 input4" onclick="window.location.href='<?=base_url('Registrasi/batal')?>'">BATAL</button>
                      </div>
                      </center>
                    </div>
                  </form>
                  <!-- end: Register --> 
                  
                </div>
              </div>
            </div>
          </div>
          
          <!-- end: login and register panel --> 

        </div>
      </div>
      <!-- end: Checkout Options --> 
      
    </div>
    <!-- side bar -->
     <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 box-block sidebar">

      <div class="box-heading"><span>Promo Spesial</span></div>

      <div class="box-content">

        <div class="box-products slide carousel-fade" id="productc2">

          <ol class="carousel-indicators">

            <li class="active" data-slide-to="0" data-target="#productc2"></li>

            <li class="" data-slide-to="1" data-target="#productc2"></li>

            <li class="" data-slide-to="2" data-target="#productc2"></li>

          </ol>

          <div class="carousel-inner"> 

            <!-- item -->
            <?php
              if ($promo_spesial_1==null) {
                # code...
              }
              else
              {
            ?>
            <div class="item active">

              <div class="product-block">

                <div class="image">

                  <div class="product-label product-hot"><span>HOT</span></div>

                  <a class="img" href="<?=base_url('Jajan/detail/'.$promo_spesial_1->id_product)?>"><img alt="product info" style="height:350px;" src="<?=base_url('assets/products/'.$promo_spesial_1->photo);?>" title="product title"></a> </div>

                <div class="product-meta">

                  <div class="name"><a href="<?=base_url('Jajan/detail/'.$promo_spesial_1->id_product)?>"><?=$promo_spesial_1->product_name?></a></div>
                  <?php

                    $harga_promo_spesial = $promo_spesial_1->product_price - ($promo_spesial_1->product_price * ($promo_spesial_1->discount /100));

                  ?>
                  <div class="big-price"  style="font-size:12pt;"> <span class="price-new"><span class="sym">Rp, </span><?=number_format($harga_promo_spesial)?></span> </div>

                  <div class="big-btns"> <a class="btn btn-default btn-view pull-left" href="<?=base_url('Jajan/detail/'.$promo_spesial_1->id_product)?>">View</a> <a class="btn btn-default btn-addtocart pull-right" href="<?=base_url('Shoppingcart/add/'.$promo_spesial_1->id_product)?>">Add to

                    Cart</a> </div>

                </div>

                <div class="meta-back"></div>

              </div>

            </div>
            <?php }?>

            <!-- end: item --> 

            <!-- item -->
            <?php
              if ($new_product==null) {
                # code...
              }
              else
              {
            ?>
            <div class="item">

              <div class="product-block">

                <div class="image"> <a class="img" href="<?=base_url('Jajan/detail/'.$new_product->id_product)?>"><img alt="product info" style="height:350px;"  src="<?=base_url('assets/products/'.$new_product->photo);?>" title="product title"></a> </div>

                <div class="product-meta">

                  <div class="name"><a href="<?=base_url('Jajan/detail/'.$new_product->id_product)?>"><?=$new_product->product_name?></a></div>

                  <div class="big-price"  style="font-size:12pt;"> <span class="price-new"><span class="sym">Rp, </span><?=number_format($new_product->product_price)?></span> </div>

                  <div class="big-btns"> <a class="btn btn-default btn-view pull-left" href="<?=base_url('Jajan/detail/'.$new_product->id_product)?>">View</a> <a class="btn btn-default btn-addtocart pull-right" href="<?=base_url('Shoppingcart/add/'.$new_product->id_product)?>">Add to

                    Cart</a> </div>

                </div>

                <div class="meta-back"></div>

              </div>

            </div>
            <?php }?>
            <!-- end: item --> 

            <!-- item -->
            <?php 
            if ($promo_spesial_2==null) {
              # code...
            }
            else
            {
            ?>
            <div class="item">

              <div class="product-block">

                <div class="image"> <a class="img" href="<?=base_url('Jajan/detail/'.$promo_spesial_2->id_product)?>"><img alt="product info" style="height:350px;" src="<?=base_url('assets/products/'.$promo_spesial_2->photo);?>"  title="product title"></a> </div>

                <div class="product-meta">

                  <div class="name"><a href="<?=base_url('Jajan/detail/'.$promo_spesial_2->id_product)?>"><?=$promo_spesial_2->product_name?></a></div>
                   <?php

                    $harga_promo_spesial_2 = $promo_spesial_2->product_price - ($promo_spesial_2->product_price * ($promo_spesial_2->discount /100));

                  ?>
                  <div class="big-price"> <span class="price-new"  style="font-size:12pt;"><span class="sym">Rp, </span><?=number_format($harga_promo_spesial_2)?></span> </div>

                  <div class="big-btns"> <a class="btn btn-default btn-view pull-left" href="<?=base_url('Jajan/detail/'.$promo_spesial_2->id_product)?>">View</a> <a class="btn btn-default btn-addtocart pull-right" href="<?=base_url('Shoppingcart/add/'.$promo_spesial_2->id_product)?>">Add to

                    Cart</a> </div>

                </div>

                <div class="meta-back"></div>

              </div>

            </div>
            <?php }?>
            <!-- end: item --> 

          </div>

        </div>

        <div class="carousel-controls"> <a class="carousel-control left" data-slide="prev" href="#productc2"> <i class="fa fa-angle-left fa-fw"></i> </a> <a class="carousel-control right" data-slide="next" href="#productc2"> <i class="fa fa-angle-right fa-fw"></i> </a> </div>

        <div class="nav-bg"></div>

      </div>

    </div>
    <!-- end:sidebar --> 
  </div>
  <!-- end:row --> 
</div>
<!-- end: container-->

<div class="row clearfix f-space30"></div>

<!-- Rectangle Banners -->

<div class="container">
  <div class="row">
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
      <div class="rec-banner blue">
        <div class="banner"> <i class="fa fa-thumbs-up"></i>
          <h3>Guarantee</h3>
          <p>100% Money Back Guarantee*</p>
        </div>
      </div>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
      <div class="rec-banner red">
        <div class="banner"> <i class="fa fa-tags"></i>
          <h3>Affordable</h3>
          <p>Convenient & affordable prices for you</p>
        </div>
      </div>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
      <div class="rec-banner orange">
        <div class="banner"> <i class="fa fa-headphones"></i>
          <h3>24/7 Support</h3>
          <p>We support everything we sell</p>
        </div>
      </div>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
      <div class="rec-banner lightblue">
        <div class="banner"> <i class="fa fa-female"></i>
          <h3>Summer Sale</h3>
          <p>Upto 50% off on all women wear</p>
        </div>
      </div>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
      <div class="rec-banner darkblue">
        <div class="banner"> <i class="fa fa-gift"></i>
          <h3>Surprise Gift</h3>
          <p>Value $50 on orders over $700</p>
        </div>
      </div>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
      <div class="rec-banner black">
        <div class="banner"> <i class="fa fa-truck"></i>
          <h3>Free Shipping</h3>
          <p>All over in world over $100</p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end: Rectangle Banners -->
<div class="row clearfix f-space30"></div>

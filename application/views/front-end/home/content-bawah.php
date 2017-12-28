<?php 
if (count($cek_jumlah) ==0) {
  # code...
}
else
{


?>
<div class="container">

  <div class="row"> 

    <!-- Sidebar -->

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
              if ($new_product==null) {
                # code...
              }
              else
              {
            ?>
            <div class="item active">

              <div class="product-block">

                <div class="image">

                  <div class="product-label product-hot"><span>JAJAN BARU</span></div>

                  <a class="img" href="<?=base_url('Jajan/detail/'.$new_product->id_product)?>"><img alt="product info" style="height:265px;" src="<?=base_url('assets/products/'.$new_product->photo);?>" title="product title"></a> </div>

                <div class="product-meta">

                  <div class="name"><a href="<?=base_url('Jajan/detail/'.$new_product->id_product)?>"><?=$new_product->product_name?></a></div>
                  <?php

                    $harga_promo_spesial = $new_product->product_price - ($new_product->product_price * ($new_product->discount /100));

                  ?>
                  <div class="big-price"  style="font-size:12pt;"> <span class="price-new"><span class="sym">Rp, </span><?=number_format($harga_promo_spesial)?></span> </div>

                  <div class="big-btns"> 
                  <a class="btn btn-default btn-view pull-left" href="<?=base_url('Jajan/detail/'.$new_product->id_product)?>">View</a>


                     <?php
                          if ($new_product->stock==0) {
                            ?>
                           <button value="<?php echo $value->id_product; ?>" class="btn btn-default btn-addtocart pull-right  stock_abis" >Add to Cart</button>
      <?php
                          }
                          elseif ($new_product->stock<0) {
                           ?>
                          <button value="<?php echo $value->id_product; ?>" class="btn btn-default btn-addtocart pull-right  stock_abis" >Add to Cart</button>
      <?php
                          }
                          else{
                            ?>
                          <button value="<?php echo $new_product->id_product; ?>" class="btn btn-default btn-addtocart pull-right  addlabtype" >Add to Cart</button>

                            <?php
                          }
                      ?>
                    </div>

                </div>

                <div class="meta-back"></div>

              </div>

            </div>
            <?php }?>

            <!-- end: item --> 

            <!-- item -->
            <?php
              if ($promo_spesial_1==null) {
                # code...
              }
              else
              {
            ?>
            <div class="item">

              <div class="product-block">

                <div class="image"> <a class="img" href="<?=base_url('Jajan/detail/'.$promo_spesial_1->id_product)?>"><img alt="product info" style="height:265px;"  src="<?=base_url('assets/products/'.$promo_spesial_1->photo);?>" title="product title"></a> </div>

                <div class="product-meta">

                  <div class="name"><a href="<?=base_url('Jajan/detail/'.$promo_spesial_1->id_product)?>"><?=$promo_spesial_1->product_name?></a></div>

                  <div class="big-price"  style="font-size:12pt;"> <span class="price-new"><span class="sym">Rp, </span><?=number_format($promo_spesial_1->product_price)?></span> </div>

                  <div class="big-btns"> <a class="btn btn-default btn-view pull-left" href="<?=base_url('Jajan/detail/'.$promo_spesial_1->id_product)?>">View</a> 

                 
                     <?php
                          if ($promo_spesial_1->stock==0) {
                            ?>
                        <button value="<?php echo $promo_spesial_1->id_product; ?>" class="btn btn-default btn-addtocart pull-right  stock_abis" >Add to Cart</button>

                            <?php
                          }
                          elseif ($promo_spesial_1->stock<0) {
                            ?>
                      <button value="<?php echo $promo_spesial_1->id_product; ?>" class="btn btn-default btn-addtocart pull-right  stock_abis" >Add to Cart</button>
                                 <?php
                          }
                          else{
                            ?>
                       <button value="<?php echo $promo_spesial_1->id_product; ?>" class="btn btn-default btn-addtocart pull-right  addlabtype" >Add to Cart</button>
                       <?php
                          }
                      ?>
                    </div>

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

                <div class="image"> <a class="img" href="<?=base_url('Jajan/detail/'.$promo_spesial_2->id_product)?>"><img alt="product info" style="height:265px;" src="<?=base_url('assets/products/'.$promo_spesial_2->photo);?>"  title="product title"></a> </div>

                <div class="product-meta">

                  <div class="name"><a href="<?=base_url('Jajan/detail/'.$promo_spesial_2->id_product)?>"><?=$promo_spesial_2->product_name?></a></div>
                   <?php

                    $harga_promo_spesial_2 = $promo_spesial_2->product_price - ($promo_spesial_2->product_price * ($promo_spesial_2->discount /100));

                  ?>
                  <div class="big-price"> <span class="price-new"  style="font-size:12pt;"><span class="sym">Rp, </span><?=number_format($harga_promo_spesial_2)?></span> </div>

                  <div class="big-btns"> <a class="btn btn-default btn-view pull-left" href="<?=base_url('Jajan/detail/'.$promo_spesial_2->id_product)?>">View</a>
                    
                     <?php
                          if ($promo_spesial_2->stock==0) {
                            ?>
                            <button value="<?php echo $promo_spesial_2->id_product; ?>" class="btn btn-default btn-addtocart pull-right  stock_abis" >Add to Cart</button>
                            <?php
                          }
                          elseif ($promo_spesial_2->stock<0) 
                          {
                           ?>
                           <button value="<?php echo $promo_spesial_2->id_product; ?>" class="btn btn-default btn-addtocart pull-right  stock_abis" >Add to Cart</button>
                           <?php 
                          }
                          else{
                            ?>
                      <button value="<?php echo $promo_spesial_2->id_product; ?>" class="btn btn-default btn-addtocart pull-right  addlabtype" >Add to Cart</button> 
                            <?php
                          }
                      ?>
                    </div>

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
            <div class="row clearfix f-space10"></div>

      <!-- Get Updates Box -->

      <div class="box-content">

        <div class="subscribe">

          <div class="heading">

            <h3>Get updates</h3>

          </div>

          <div class="formbox">

            <form>

              <i class="fa fa-envelope fa-fw"></i>

              <input class="form-control" id="InputUserEmail" placeholder="Your e-mail..." type="text">

              <button class="btn color1 normal pull-right" type="submit">Sign

              up</button>

            </form>

          </div>

        </div>

      </div>
    </div>

    <!-- end: Sidebar -->

    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">

      <div class="row">

        <div class="col-md-8 blog-block"> 

          <!-- Blog widget Box -->

          <div class="box-content slide carousel-fade" id="blogslide">

            <div class="carousel-inner"> 

              <!-- Post -->

              <div class="blog-entry item">

                <div class="image"> <span class="blogico"> <i class="fa fa-bullhorn fa-fw"></i><br>

                  Blog entry</span> <img class="ani-image" src="<?=base_url('assets/front-end/images/blog-4.jpg');?>" alt="image info"> </div>

                <div class="entry-row">

                  <div class="date col-xs-12"><span>12</span><span>Aug 2013</span></div>

                  <div class="blog-text"> <span>A decent blog title goes here...</span> <span>Appropriately supply high-quality intellectual capital afterzxcz

                    client-centered quality vectors. Collaboratively orchestrate end-to-end

                    strategic theme areas after...</span> <span> <a href="#a"> <i class="fa fa-user fa-fw"></i>John Doe</a> <a href="#a"> <i class="fa fa-comments fa-fw"></i>4 Comments</a> </span> </div>

                </div>

              </div>

              <!--END Post --> 

              <!-- Post -->

              <div class="blog-entry item">

                <div class="image"> <span class="blogico"> <i class="fa fa-bullhorn fa-fw"></i><br>

                  Blog entry</span> <img class="ani-image" src="<?=base_url('assets/front-end/images/blog-1.jpg');?>" alt=""> </div>

                <div class="entry-row">

                  <div class="date col-xs-12"><span>27</span><span>Oct 2013</span></div>

                  <div class="blog-text"> <span>Nulla quis lorem ut libero malesuada...</span> <span>Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Donec

                    rutrum congue leo eget malesuada. Nulla quis lorem ut libero malesuada

                    feugiat. Curabitur arcu erat, accumsan id imperdiet....</span> <span> <a href="#a"> <i class="fa fa-user fa-fw"></i>John Doe</a> <a href="#a"> <i class="fa fa-comments fa-fw"></i>2 Comments</a> </span> </div>

                </div>

              </div>

              <!--END Post --> 

              <!-- Post -->

              <div class="blog-entry item active">

                <div class="image"> <span class="blogico"> <i class="fa fa-bullhorn fa-fw"></i><br>

                  Blog entry</span> <img class="ani-image" src="<?=base_url('assets/front-end/images/blog-2.jpg');?>" alt=""> </div>

                <div class="entry-row">

                  <div class="date col-xs-12"><span>05</span><span>Feb 2013</span></div>

                  <div class="blog-text"> <span>Convallis a pellentesque nec, egestas...</span> <span>Praesent sapien massa, convallis a pellentesque nec, egestas non

                    nisi. Vivamus magna justo, lacinia eget consectetur sed, convallis at

                    tellus. Sed porttitor lectus nibh....</span> <span> <a href="#a"> <i class="fa fa-user fa-fw"></i>John Doe</a> <a href="#a"> <i class="fa fa-comments fa-fw"></i>14 Comments</a> </span> </div>

                </div>

              </div>

              <!--END Post --> 

              <!-- Post -->

              <div class="blog-entry item">

                <div class="image"> <span class="blogico"> <i class="fa fa-bullhorn fa-fw"></i><br>

                  Blog entry</span> <img class="ani-image" src="<?=base_url('assets/front-end/images/blog-3.jpg');?>" alt=""> </div>

                <div class="entry-row">

                  <div class="date col-xs-12"><span>11</span><span>Jan 2013</span></div>

                  <div class="blog-text"><span>Dynamically empower equity...</span> <span>Completely cultivate standardized internal or "organic" sources

                    with unique total linkage. Dynamically empower equity invested e-markets

                    without premier schemas....</span> <span> <a href="#a"> <i class="fa fa-user fa-fw"></i>John Doe</a> <a href="#a"> <i class="fa fa-comments fa-fw"></i>19 Comments</a> </span> </div>

                </div>

              </div>

              <!--END Post --> 

            </div>

            <div class="carousel-controls"> <a class="carousel-control left" data-slide="prev" href="#blogslide"> <i class="fa fa-angle-left fa-fw"></i> </a> <a class="carousel-control right" data-slide="next" href="#blogslide"> <i class="fa fa-angle-right fa-fw"></i> </a> </div>

          </div>

          <!-- end: Blog widget Box -->

          <div class="f-space10"></div>

        </div>

        <div class="col-md-4 twitter-block"> 

          <!-- twitter widget box -->

          <div class="box-content">

            <div class="twitter-box"> <i class="fa fa-twitter fa-fw"></i>

              <div class="title">Latest Tweets</div>

              <div class="carousel-fade slide" id="tweets">

                <div class="carousel-inner"> 

                  <!-- tweet -->

                  <div class="tweet item active"><span>RT: <em>@Interactively</em> implement unique e-business with dynamic benefits. Authoritatively target

                    sustainable paradigms before strategic architectures. <b> http://goo.gl/4N8JN </b>- <em>@flatro</em> <br>

                    <br>

                    about 8 hours ago</span></div>

                  <!-- end: tweet --> 

                  <!-- tweet -->

                  <div class="tweet item"><span>RT: <em>@Architectures</em> paradigms before strategic architectures implement unique e-business with

                    dynamic benefits. Authoritatively target sustainable. <b> http://goo.gl/4N8JN </b>- <em>@flatro</em> <br>

                    <br>

                    about 2 hours ago</span></div>

                  <!-- end: tweet --> 

                </div>

              </div>

            </div>

          </div>

          <!-- end: twitter widget box -->

          <div class="f-space10"></div>

        </div>

      </div>

      <div class="row"> 

        <!-- Brands -->

        <div class="col-md-12 main-column box-block brands-block">

          <div class="box-heading"><span>Mitra</span></div>

          <div class="box-content">

            <div class="box-products box-brands slide" id="brands">

              <div class="carousel-controls"> <a class="carousel-control left" data-slide="prev" href="#brands"> <i class="fa fa-angle-left fa-fw"></i> </a> <a class="carousel-control right" data-slide="next" href="#brands"> <i class="fa fa-angle-right fa-fw"></i> </a> </div>

              <div class="carousel-inner">

                <div class="brands-row item active">

                  <div class="brand-logo"><a href="#a"><img src="<?=base_url('assets/front-end/images/brands/logo1.png');?>" alt=""></a></div>

                  <div class="brand-logo"><a href="#a"><img src="<?=base_url('assets/front-end/images/brands/logo2.png');?>" alt=""></a></div>

                  <div class="brand-logo"><a href="#a"><img src="<?=base_url('assets/front-end/images/brands/logo3.png');?>" alt=""></a></div>

                  <div class="brand-logo"><a href="#a"><img src="<?=base_url('assets/front-end/images/brands/logo4.png');?>" alt=""></a></div>

                </div>

                <div class="brands-row item">
                  <div class="brand-logo"><a href="#a"><img src="<?=base_url('assets/front-end/images/brands/logo4.png');?>" alt=""></a></div>

                  <div class="brand-logo"><a href="#a"><img src="<?=base_url('assets/front-end/images/brands/logo3.png');?>" alt=""></a></div>

                  <div class="brand-logo"><a href="#a"><img src="<?=base_url('assets/front-end/images/brands/logo2.png');?>" alt=""></a></div>

                  <div class="brand-logo"><a href="#a"><img src="<?=base_url('assets/front-end/images/brands/logo1.png');?>" alt=""></a></div>

                </div>

              </div>

            </div>

          </div>

        </div>

      </div>

      <!-- end: Brands --> 

    </div>

  </div>

</div>

<!-- end: Widgets -->

<div class="row clearfix f-space30"></div>
<?php } ?>


<div class="row clearfix f-space10"></div>



<?php



  if ($terlaris_aktif==null) {

    # code...

  }

  else

 {

?>

<div class="container">



  <div class="row">



    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 main-column box-block">



      <div class="box-heading"><span>TERLARIS</span></div>



      <div class="box-content">



        <div class="box-products slide" id="productc3">



          <div class="carousel-controls"> <a class="carousel-control left" data-slide="prev" href="#productc3"> <i class="fa fa-angle-left fa-fw"></i> </a> <a class="carousel-control right" data-slide="next" href="#productc3"> <i class="fa fa-angle-right fa-fw"></i> </a> </div>



          <div class="carousel-inner"> 



            <!-- Items Row -->



            <div class="item active">



              <div class="row box-product"> 



                <!-- Product -->

                <?php



                    foreach ($terlaris_aktif as $key => $value) {

                        ?>



                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">



                  <div class="product-block">



                    <div class="image">

                    <?php

                      if ($value->stock==0) 

                      {

                        ?>

                         <div class="product-label product-sale"><span>HABIS</span></div>

                        <?php

                      }

                      elseif ($value->promo==1) 

                      {

                        ?>

                         <div class="product-label product-promo"><span>PROMO</span></div>

                        <?php

                      }

                      else

                      {

                        

                      }

                    ?>

                     



                      <a class="img" href="<?=base_url('Jajan/detail/'.$value->id_product)?>"><img alt="product info" style="height:350px;" src="<?=base_url('assets/products/'.$value->photo);?>"  title="product title"></a> </div>



                    <div class="product-meta">



                      <div class="name"><a href="<?=base_url('Jajan/detail/'.$value->id_product)?>"><?=$value->product_name?></a></div>



                      <div class="big-price"> 

                      <?php

                        if ($value->discount==0)

                        {

                          ?>

                           <span class="price-new" style="font-size:12pt;"><span class="sym">Rp, </span><?=number_format($value->product_price)?></span> 

                          <?php

                        }

                        else

                        {

                            $harga_setelah_discount_terlaris = $value->product_price - ($value->product_price * ($value->discount / 100) );

                          ?>



                             <span class="price-new" style="font-size:12pt;"><span class="sym">Rp, </span><?=number_format($harga_setelah_discount_terlaris)?></span> 

                            <span class="price-old" style="font-size:12pt;"><span class="sym">Rp, </span><?=number_format($value->product_price)?></span> 

                          <?php

                        }

                      ?>

                     



                      </div>



                      <div class="big-btns"> <a class="btn btn-default btn-view pull-left" href="<?=base_url('Jajan/detail/'.$value->id_product)?>">View</a> 



                    

                         <?php

                          if ($value->stock==0) {

                            ?>

                      <a class="btn btn-default btn-addtocart pull-right" href="<?=base_url('Shoppingcart/stock_abis/')?>">Add to Cart</a> 

                            <?php

                          }elseif ($value->stock<0) {

                            ?>

                      <a class="btn btn-default btn-addtocart pull-right" href="<?=base_url('Shoppingcart/stock_abis/')?>">Add to Cart</a> 

                            <?php

                          }

                          else{

                            ?>

                      <a class="btn btn-default btn-addtocart pull-right" href="<?=base_url('Shoppingcart/add/'.$value->id_product)?>">Add to Cart</a> 

                            <?php

                          }

                      ?>

                        </div>



                      <div class="small-price"> 

                       <?php

                        if ($value->discount==0)

                        {

                          ?>

                           <span class="price-new" style="font-size:12pt;"><span class="sym">Rp, </span><?=number_format($value->product_price)?></span> 

                          <?php

                        }

                        else

                        {

                            $harga_setelah_discount_terlaris = $value->product_price - ($value->product_price * ($value->discount / 100) );

                          ?>



                             <span class="price-new" style="font-size:12pt;"><span class="sym">Rp, </span><?=number_format($harga_setelah_discount_terlaris)?></span> 

                         

                          <?php

                        }

                      ?>

                      </div>



                      <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-half-o"></i> <i class="fa fa-star-o"></i> </div>



                      <div class="small-btns">



                        <button class="btn btn-default btn-compare pull-left" data-toggle="tooltip" title="Add to Compare"> <i class="fa fa-retweet fa-fw"></i> </button>



                        <button class="btn btn-default btn-wishlist pull-left" data-toggle="tooltip" title="Add to Wishlist"> <i class="fa fa-heart fa-fw"></i> </button>



                        <?php

                            if ($value->stock==0) 

                            {

                              ?>

                              <a href="<?=base_url('Shoppingcart/stock_abis')?>" class="btn btn-default btn-addtocart pull-left" data-toggle="tooltip" title="Tambahkan Ke Keranjang"> <i class="fa fa-shopping-cart fa-fw"></i> </a>

                              <?php 

                            }

                            elseif ($value->stock<0) {

                              ?>

                      <a href="<?=base_url('Shoppingcart/stock_abis')?>" class="btn btn-default btn-addtocart pull-left" data-toggle="tooltip" title="Tambahkan Ke Keranjang"> <i class="fa fa-shopping-cart fa-fw"></i> </a>

                             



                                   <?php

                                 }

                              else

                            {

                              ?>

                              <a href="<?=base_url('Shoppingcart/add/'.$value->id_product)?>" class="btn btn-default btn-addtocart pull-left" data-toggle="tooltip" title="Tambahkan Ke Keranjang"> <i class="fa fa-shopping-cart fa-fw"></i> </a>

                              <?php

                            }

                        ?>                





                      </div>



                    </div>



                    <div class="meta-back"></div>



                  </div>



                </div>





                        <?php

                    }



                ?>



                <!-- end: Product --> 





              </div>



            </div>



            <!-- end: Items Row --> 



            <!-- Items Row -->



            <div class="item">



              <div class="row box-product"> 

 <!-- Product -->

                <?php



                    foreach ($terlaris_non_aktif as $key => $value) {

                        ?>



                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">



                  <div class="product-block">



                    <div class="image">

                    <?php

                      if ($value->stock==0) 

                      {

                        ?>

                         <div class="product-label product-sale"><span>HABIS</span></div>

                        <?php

                      }

                      elseif ($value->promo==1) 

                      {

                        ?>

                         <div class="product-label product-promo"><span>PROMO</span></div>

                        <?php

                      }

                      else

                      {

                        

                      }

                    ?>

                     



                      <a class="img" href="<?=base_url('Jajan/detail/'.$value->id_product)?>"><img alt="product info" style="height:350px;" src="<?=base_url('assets/products/'.$value->photo);?>"  title="product title"></a> </div>



                    <div class="product-meta">



                      <div class="name"><a href="<?=base_url('Jajan/detail/'.$value->id_product)?>"><?=$value->product_name?></a></div>



                      <div class="big-price"> 

                      <?php

                        if ($value->discount==0)

                        {

                          ?>

                           <span class="price-new" style="font-size:12pt;"><span class="sym">Rp, </span><?=number_format($value->product_price)?></span> 

                          <?php

                        }

                        else

                        {

                            $harga_setelah_discount_terlaris = $value->product_price - ($value->product_price * ($value->discount / 100) );

                          ?>



                             <span class="price-new"  style="font-size:12pt;"><span class="sym">Rp, </span><?=number_format($harga_setelah_discount_terlaris)?></span> 

                            <span class="price-old"  style="font-size:12pt;"><span class="sym">Rp, </span><?=number_format($value->product_price)?></span> 

                          <?php

                        }

                      ?>

                     



                      </div>



                      <div class="big-btns"> <a class="btn btn-default btn-view pull-left" href="<?=base_url('Jajan/detail/'.$value->id_product)?>">View</a> 



                     

                         <?php

                          if ($value->stock==0) {

                            ?>

                      <a class="btn btn-default btn-addtocart pull-right" href="<?=base_url('Shoppingcart/stock_abis/')?>">Add to Cart</a> 

                            <?php

                          }elseif ($value->stock<0) 

                          {

                            ?>

                      <a class="btn btn-default btn-addtocart pull-right" href="<?=base_url('Shoppingcart/stock_abis/')?>">Add to Cart</a> 

                            <?php

                          }

                          else{

                            ?>

                      <a class="btn btn-default btn-addtocart pull-right" href="<?=base_url('Shoppingcart/add/'.$value->id_product)?>">Add to Cart</a> 

                            <?php

                          }

                      ?>



                        </div>



                      <div class="small-price"> 

                       <?php

                        if ($value->discount==0)

                        {

                          ?>

                           <span class="price-new" style="font-size:12pt;"><span class="sym">Rp, </span><?=number_format($value->product_price)?></span> 

                          <?php

                        }

                        else

                        {

                            $harga_setelah_discount_terlaris = $value->product_price - ($value->product_price * ($value->discount / 100) );

                          ?>



                             <span class="price-new" style="font-size:12pt;"><span class="sym">Rp, </span><?=number_format($harga_setelah_discount_terlaris)?></span> 

                         

                          <?php

                        }

                      ?>

                      </div>



                      <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-half-o"></i> <i class="fa fa-star-o"></i> </div>



                      <div class="small-btns">



                        <button class="btn btn-default btn-compare pull-left" data-toggle="tooltip" title="Add to Compare"> <i class="fa fa-retweet fa-fw"></i> </button>



                        <button class="btn btn-default btn-wishlist pull-left" data-toggle="tooltip" title="Add to Wishlist"> <i class="fa fa-heart fa-fw"></i> </button>



                         <?php

                            if ($value->stock==0) 

                            {

                              ?>

                              <a href="<?=base_url('Shoppingcart/stock_abis')?>" class="btn btn-default btn-addtocart pull-left" data-toggle="tooltip" title="Tambahkan Ke Keranjang"> <i class="fa fa-shopping-cart fa-fw"></i> </a>

                              <?php 

                            }elseif ($value->stock<0) {

                              

                              ?>

                              <a href="<?=base_url('Shoppingcart/stock_abis')?>" class="btn btn-default btn-addtocart pull-left" data-toggle="tooltip" title="Tambahkan Ke Keranjang"> <i class="fa fa-shopping-cart fa-fw"></i> </a>

                              <?php 

                            }

                            else

                            {

                              ?>

                              <a href="<?=base_url('Shoppingcart/add/'.$value->id_product)?>" class="btn btn-default btn-addtocart pull-left" data-toggle="tooltip" title="Tambahkan Ke Keranjang"> <i class="fa fa-shopping-cart fa-fw"></i> </a>

                              <?php

                            }

                        ?>                





                      </div>



                    </div>



                    <div class="meta-back"></div>



                  </div>



                </div>





                        <?php

                    }



                ?>



                <!-- end: Product --> 



              </div>



            </div>



            <!-- end: Items Row --> 



          </div>



        </div>



      </div>



    </div>



  </div>



</div>

<?php } ?>
<!-- Products -->

<?php

  if ($data_product_atas==null) {

    # code...

  }

  else

  {

?>

<div class="row clearfix f-space30"></div>



<div class="container">



  <div class="row">

  <?php

    if ($promo_spesial_1==null) 

    {

        ?>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 main-column box-block">



        <?php

    }

    else

    {

        ?>

    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 main-column box-block">

        <?php



    }

  ?>



      <div class="box-heading"><span>jajanan baru </span></div>



      <div class="box-content">



        <div class="box-products slide" id="productc1">



             <div class="carousel-controls"> <a class="carousel-control left" data-slide="prev" href="#productc1"> <i class="fa fa-angle-left fa-fw"></i> </a> <a class="carousel-control right" data-slide="next" href="#productc1"> <i class="fa fa-angle-right fa-fw"></i> </a> </div>



          <div class="carousel-inner"> 



            <!-- Items Row -->



            <div class="item active">



              <div class="row box-product"> 



              <?php



                    foreach ($data_product_atas as $key => $value) 



                    {

                    

                        ?>



            <!-- Product -->



            <?php

                if ($promo_spesial_1==null) 

                {

                  ?>

                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">

                  <?php

                }

                  else

                  {

                    ?>

                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                    <?php

                  }

            ?>



                  <div class="product-block">



                    <div class="image">





                      <?php

                        if ($value->stock==0)

            {

                                  ?>

                  <div class="product-label product-hot"><span>HABIS</span></div>

                                 <?php

                        }

                        else

            {

                          if ($value->promo == 1) 



                          {

                            

                            ?>



                                 <div class="product-label product-sale"><span>PROMO</span></div>



                            <?php

                           

                          }



                          else



                          {



                            ?>





                            <?php



                          }

                        }



                      ?>

                     

          



            <a class="img" href="<?=base_url('Jajan/detail/'.$value->id_product)?>"><img style="height:350px;" alt="product info" src="<?=base_url('assets/products/'.$value->photo);?>" title="<?=$value->product_name?>"></a> 

          </div>



                    <div class="product-meta">



                      <div class="name"><a href="<?=base_url('Jajan/detail/'.$value->id_product)?>"><?=$value->product_name?></a></div>



                      <div class="big-price"> 



                     <?php

                          $harga_setelah_discount = 0;

                          if ($value->discount!= 0) 



                          {



                            $harga_setelah_discount = $value->product_price - ( $value->product_price * ( $value->discount * (1 / 100) ));



                            ?>



                <span class="price-new" style="font-size:12pt;"><span class="sym">Rp, </span><?=number_format($harga_setelah_discount)?></span> 



                <span class="price-old"  style="font-size:12pt;"><span class="sym">Rp, </span><?=number_format($value->product_price)?></span> 



                            <?php

                          }



                          else



                          {



                            $harga_setelah_discount = $value->product_price ;



                            ?>

                            

                <span class="price-new"  style="font-size:12pt;"><span class="sym">Rp, </span><?=number_format($harga_setelah_discount)?></span> 



                            <?php



                          }

                     ?>



                   

                      </div>



                      <div class="big-btns"> <a class="btn btn-default btn-view pull-left" href="<?=base_url('Jajan/detail/'.$value->id_product)?>">View</a> 

                      <?php

                          if ($value->stock==0) 

              {

                            ?>

                <a class="btn btn-default btn-addtocart pull-right" href="<?=base_url('Shoppingcart/stock_abis/')?>">Add to Cart</a> 

                            <?php

                          }

                          elseif ($value->stock < 0) 

              {

                           ?>

                <a class="btn btn-default btn-addtocart pull-right" href="<?=base_url('Shoppingcart/stock_abis/')?>">Add to Cart</a> 

                            <?php 

                          }

                          else

              {

                            ?>

                <a class="btn btn-default btn-addtocart pull-right" href="<?=base_url('Shoppingcart/add/'.$value->id_product)?>">Add to Cart</a> 

                            <?php

                          }

            ?>



                        </div>



                      <div class="small-price">



                        <?php

                $harga_setelah_discount = 0;



                  if ($value->discount!= 0) 



                  {



                    $harga_setelah_discount =  $value->product_price - (  $value->product_price * ( $value->discount * (1 / 100) ) );



                      ?>



                        <span class="price-new"  style="font-size:12pt;"><span class="sym">Rp, </span><?=number_format($harga_setelah_discount)?></span> 





                      <?php

                  }



                  else



                  {



                    $harga_setelah_discount = $value->product_price ;



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

                        <?php

                            if ($value->stock==0) 

                            {

                              ?>

                  <a href="<?=base_url('Shoppingcart/stock_abis')?>" class="btn btn-default btn-addtocart pull-left" data-toggle="tooltip" title="Tambahkan Ke Keranjang"> <i class="fa fa-shopping-cart fa-fw"></i> </a>

                              <?php 

                            }

                            elseif ($value->stock<0)

              {

                              

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

                      



                        <?php

                          



                        ?>

                      </div>



                    </div>



                    <div class="meta-back"></div>



                  </div>



                </div>



                <!-- end: Product --> 



                 <?php



                    }



              ?>



              </div>



            </div>



            <!-- end: Items Row --> 



            <!-- Items Row -->



            <div class="item">



              <div class="row box-product"> 



                <!-- Product -->



               <?php



                    foreach ($data_product_atas_next as $key => $value) 



                    {

                    

                        ?>



                <!-- Product -->

                  <?php 

                      if ($promo_spesial_1==null) 

                      {

                   

                        ?>

                          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">



                        <?php

                      }

                    else

                    {

                      ?>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">



                      <?php

                    }



                  ?>



                  <div class="product-block">



                    <div class="image">





                      <?php

                       if ($value->stock==0) 

            {

                                  ?>

                    <div class="product-label product-hot"><span>HABIS</span></div>

                                 <?php

                        }

                        else

            {

                          if ($value->promo == 1) 



                          {

                            

                ?>



                                 <div class="product-label product-sale"><span>PROMO</span></div>



                <?php

                           

                          }



                          else



                          {



                            ?>





                            <?php



                          }

                        }



                     ?>

                     



                      <a class="img" href="<?=base_url('Jajan/detail/'.$value->id_product)?>"><img style="height:350px;" alt="product info" src="<?=base_url('assets/products/'.$value->photo);?>" title="<?=$value->product_name?>"></a> </div>



                    <div class="product-meta">



                      <div class="name"><a href="<?=base_url('Jajan/detail/'.$value->id_product)?>"><?=$value->product_name?></a></div>



                      <div class="big-price"> 



                      <?php

                          $harga_setelah_discount = 0;

                          if ($value->discount!= 0) 



                          {



                            $harga_setelah_discount = $value->product_price * ( $value->discount * (1 / 100) );



                            ?>



                            <span class="price-new"  style="font-size:12pt;"><span class="sym">Rp, </span><?=number_format($harga_setelah_discount)?></span> 



                            <span class="price-old" style="font-size:12pt;"><span class="sym">Rp, </span><?=number_format($value->product_price)?></span> 



                            <?php

                          }



                          else



                          {



                            $harga_setelah_discount = $value->product_price ;



                            ?>

                            

                            <span class="price-new" style="font-size:12pt;"><span class="sym">Rp, </span><?=number_format($harga_setelah_discount)?></span> 



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

                          }

                          elseif ($value->stock<0) {

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

                          $harga_setelah_discount = 0;



                          if ($value->discount!= 0) 



                          {



                            $harga_setelah_discount = $value->product_price * ( $value->discount * (1 / 100) );



                            ?>



                           <span class="price-new" style="font-size:12pt;"><span class="sym">Rp, </span><?=number_format($harga_setelah_discount)?></span> 





                            <?php

                          }



                          else



                          {



                            $harga_setelah_discount = $value->product_price ;



                            ?>

                            



                           <span class="price-new"  style="font-size:12pt;"><span class="sym">Rp, </span><?=number_format($harga_setelah_discount)?></span> 



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

                            elseif ($value->stock<0) 

                            {

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



                <!-- end: Product --> 



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

    <?php

      if ($promo_spesial_1==null) {

        # code...

      }

      else

      {

    ?>

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



                  <a class="img" href="<?=base_url('Jajan/detail/'.$promo_spesial_1->id_product)?>"><img alt="product info" style="height:350px;" src="<?=base_url('assets/products/'.$promo_spesial_1->photo);?>" title="product title"></a> 

        </div>



                <div class="product-meta">



                  <div class="name"><a href="<?=base_url('Jajan/detail/'.$promo_spesial_1->id_product)?>"><?=$promo_spesial_1->product_name?></a></div>

                  <?php



                    $harga_promo_spesial = $promo_spesial_1->product_price - ($promo_spesial_1->product_price * ($promo_spesial_1->discount /100));



                  ?>

                  <div class="big-price"  style="font-size:12pt;"> <span class="price-new"><span class="sym">Rp, </span><?=number_format($harga_promo_spesial)?></span> </div>



                  <div class="big-btns"> 

                  <a class="btn btn-default btn-view pull-left" href="<?=base_url('Jajan/detail/'.$promo_spesial_1->id_product)?>">View</a>





                     <?php

                          if ($promo_spesial_1->stock==0) {

                            ?>

                      <a class="btn btn-default btn-addtocart pull-right" href="<?=base_url('Shoppingcart/stock_abis/')?>">Add to Cart</a> 

                            <?php

                          }

                          elseif ($promo_spesial_1->stock<0) {

                           ?>

                      <a class="btn btn-default btn-addtocart pull-right" href="<?=base_url('Shoppingcart/stock_abis/')?>">Add to Cart</a> 

                            <?php

                          }

                          else{

                            ?>

                      <a class="btn btn-default btn-addtocart pull-right" href="<?=base_url('Shoppingcart/add/'.$promo_spesial_1->id_product)?>">Add to Cart</a> 

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



                  <div class="big-btns"> <a class="btn btn-default btn-view pull-left" href="<?=base_url('Jajan/detail/'.$new_product->id_product)?>">View</a> 



                 

                     <?php

                          if ($new_product->stock==0) {

                            ?>

                      <a class="btn btn-default btn-addtocart pull-right" href="<?=base_url('Shoppingcart/stock_abis/')?>">Add to Cart</a> 

                            <?php

                          }

                          elseif ($new_product->stock<0) {

                            ?>

                      <a class="btn btn-default btn-addtocart pull-right" href="<?=base_url('Shoppingcart/stock_abis/')?>">Add to Cart</a> 

                            <?php

                          }

                          else{

                            ?>

                      <a class="btn btn-default btn-addtocart pull-right" href="<?=base_url('Shoppingcart/add/'.$new_product->id_product)?>">Add to Cart</a> 

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



                <div class="image"> <a class="img" href="<?=base_url('Jajan/detail/'.$promo_spesial_2->id_product)?>"><img alt="product info" style="height:350px;" src="<?=base_url('assets/products/'.$promo_spesial_2->photo);?>"  title="product title"></a> </div>



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

                      <a class="btn btn-default btn-addtocart pull-right" href="<?=base_url('Shoppingcart/stock_abis/')?>">Add to Cart</a> 

                            <?php

                          }

                          elseif ($promo_spesial_2->stock<0) 

                          {

                           ?>

                      <a class="btn btn-default btn-addtocart pull-right" href="<?=base_url('Shoppingcart/stock_abis/')?>">Add to Cart</a> 

                            <?php 

                          }

                          else{

                            ?>

                      <a class="btn btn-default btn-addtocart pull-right" href="<?=base_url('Shoppingcart/add/'.$promo_spesial_2->id_product)?>">Add to Cart</a> 

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



    </div>

    <?php } ?>

  </div>



</div>





<div class="row clearfix f-space30"></div>





<!-- end: Products --> 



<!-- Rectangle Banners -->





<!-- end: Rectangle Banners --> 



<!-- Widgets -->







<?php }?>
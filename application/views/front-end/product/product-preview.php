<div class="row clearfix f-space10"></div>
<div class="container"> 
  <!-- row -->
  <div class="row">
    <div class="col-md-12 box-block"> 
      
      <!--  box content -->
      
      <div class="box-content"> 
        <!-- single product -->
        <div class="single-product"> 
          <!-- Images -->
          <div class="images col-md-6 col-sm-12 col-xs-12">
            <div class="row"> 
              <!-- Small Images -->
              <div class="thumbs col-md-3 col-sm-3 col-xs-3"  id="thumbs">
                <ul>
                  <li class=""><a href="#a" data-image="<?=base_url('assets/products/'.$data_product_detail->photo)?>" data-zoom-image="images/products/product1.jpg" class="elevatezoom-gallery active" ><img src="<?=base_url('assets/products/'.$data_product_detail->photo)?>" alt="small image" /></a></li>
                  <li class=""> <a href="#a" data-image="<?=base_url('assets/products/'.$data_product_detail->photo)?>" data-zoom-image="<?=base_url('assets/products/'.$data_product_detail->photo)?>"  class="elevatezoom-gallery" > <img src="<?=base_url('assets/products/'.$data_product_detail->photo)?>" alt="small image" /></a></li>
                  <li class=""> <a href="#a" data-image="<?=base_url('assets/products/'.$data_product_detail->photo)?>" data-zoom-image="images/products/product1-2.jpg" class="elevatezoom-gallery"><img src="<?=base_url('assets/products/'.$data_product_detail->photo)?>" alt="small image" /></a></li>
                </ul>
              </div>
              <!-- end: Small Images --> 
              <!-- Big Image and Zoom -->
              <div class="big-image col-md-9 col-sm-9 col-xs-9"> 
              <img id="product-image" src="<?=base_url('assets/products/'.$data_product_detail->photo)?>" data-zoom-image="<?=base_url('assets/products/'.$data_product_detail->photo)?>" alt="big image" /> 
              </div>
              <!-- end: Big Image and Zoom --> 
            </div>
          </div>
          
          <!-- end: Images --> 
          
          <!-- product details -->
          
          <div class="product-details col-md-6 col-sm-12 col-xs-12"> 
            
            <!-- Title and rating info -->
            <div class="title">
              <h1><?=$data_product_detail->product_name?></h1>
              <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-half-o"></i> <i class="fa fa-star-o"></i> 
              <?php
                if ($data_product_detail->promo==0) 
                {
                  ?>

              <span class="sym"><del> Promo</del></span> 
                 <?php
                }
                else
                {
                  ?>
              <span>Promo</span> 

                  <?php
                }

                if ($data_product_detail->discount==0) {
                  ?>
                  <span>0 %</span>
                  <?php
                }
                else
                {
                  ?>
              <span><?=$data_product_detail->discount?> %</span> 
                  <?php
                }
              ?>
              </div>
            </div>
            <!-- end: Title and rating info -->
            
            <div class="row"> 
              <!-- Availability, Product Code, Brand and short info -->
              <div class="short-info-wr col-md-12 col-sm-12 col-xs-12">
                <div class="short-info">
                  
                  <div class="product-attr-text">Brand : <span><?=$data_product_detail->seller_name?></span></div>
                  <p class="short-info-p"> <?=$data_product_detail->description?> </p>
                </div>
              </div>
              <!-- end: Availability, Product Code, Brand and short info --> 
              
            </div>
            <div class="row">
              <div class="short-info-opt-wr col-md-4 col-sm-4 col-xs-12">
                <div class="short-info-opt">
                  <div class="att-row">
                    <div class="qty-wr">
                      <div class="qty-text hidden-xs">Stock : <?=$data_product_detail->stock?></div>
                    </div>
                   
                  </div>
                </div>
              </div>
              <div class="short-info-share-wr  col-md-8 col-sm-8 col-xs-12">
                
                      <?php
                        if ($data_product_detail->stock==0) {
                          ?>
                          <div class="short-info-opt  details btn btn-addtocart" style="background:#e65a4b"> 
                  <!-- AddThis Button BEGIN -->
                    <div class="att-row">
                    <div class="qty-wr" style="font-style:both;">
                      <div class="qty-text hidden-xs" style="color: #ffffff;" >Tidak Tersedia</div>
                         </div>
                   
                  </div>
                </div>
                          <?php
                        }
                        elseif ($data_product_detail->stock<0) {
                         ?>
                      
                          <div class="short-info-opt  details btn btn-addtocart" style="background:#e65a4b"> 
                  <!-- AddThis Button BEGIN -->
                    <div class="att-row">
                    <div class="qty-wr" style="font-style:both;">
                      <div class="qty-text hidden-xs" style="color: #ffffff;" >Tidak Tersedia</div>
                         </div>
                   
                  </div>
                </div>
                          <?php 
                        }
                        else
                        {
                          ?>
                       <div class="short-info-opt  details btn btn-addtocart" style="background:#2b8cbe;"> 
                  <!-- AddThis Button BEGIN -->
                    <div class="att-row">
                    <div class="qty-wr" style="font-style:both;">

                      <div class="qty-text hidden-xs"  style="color:#fff">Tersedia</div>
                         </div>
                   
                  </div>
                </div>
                          <?php
                        }
                      ?>
                   
              </div>
            </div>
            <div class="row">
              <div class="price-wr col-md-4 col-sm-4 col-xs-12">
                <div class="big-price"> 
                <?php
                    if ($data_product_detail->discount==0) {
                      ?>
                        <span class="price-new" style="font-size:12pt;"><span class="sym">Rp, </span><?=number_format($data_product_detail->product_price)?></span> 
                      <?php
                    }
                    else
                    {
                      $harga_baru = $data_product_detail->product_price - ($data_product_detail->product_price / 100);
                      ?>
                        <span class="price-old"><span class="sym">Rp, </span><?=number_format($data_product_detail->product_price)?></span> 

                <span class="price-new" style="font-size:12pt;"><span class="sym">Rp, </span><?=number_format($harga_baru)?></span> 
      
                      <?php
                    }

                ?>
                
                </div>
              </div>
              <div class="product-btns-wr col-md-8 col-sm-8 col-xs-12">
                <div class="product-btns">
                  <div class="product-big-btns">

                    <?php
                        if ($data_product_detail->stock==0) {
                          ?>
                           <a href="<?=base_url('Shoppingcart/stock_abis');?>" class="btn btn-addtocart"> <i class="fa fa-shopping-cart fa-fw"></i> Add to Cart </a>
                          <?php
                        }
                        elseif ($data_product_detail->stock<0) {
                                                   ?>
                           <a href="<?=base_url('Shoppingcart/stock_abis');?>" class="btn btn-addtocart"> <i class="fa fa-shopping-cart fa-fw"></i> Add to Cart </a>
                          <?php
                        }
                        else
                        {
                          ?>
                           <button value="<?php echo $data_product_detail->id_product;?>" class="btn btn-addtocart stock_abis"> <i class="fa fa-shopping-cart fa-fw"></i> Add to Cart </button>

                          <?php
                        }
                    ?>
                   
					
                    <button class="btn btn-compare" data-toggle="tooltip" title="Add to Compare"> <i class="fa fa-retweet fa-fw"></i> </button>
                    <button class="btn btn-wishlist" data-toggle="tooltip" title="Add to Wishlist"> <i class="fa fa-heart fa-fw"></i> </button>
                    <button class="btn btn-sendtofriend" data-toggle="tooltip" title="Send to Friend"> <i class="fa fa-envelope fa-fw"></i> </button>
     <!--  <div class="product-btns-wr col-md-4 col-sm-4 col-xs-12">            
    <label style="color:black;" for="exampleSelect1">Pembelian min 1Kg</label>
    <select class="form-control" id="exampleSelect1">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
	</div> -->
				  </div>
                </div>
              </div>
            </div>
          </div>
          
          <!-- end: product details --> 
          
        </div>
        
        <!-- end: single product --> 
        
      </div>
      
      <!-- end: box content --> 
      
    </div>
  </div>
  <!-- end:row --> 
</div>
<!-- end: container-->

<div class="row clearfix f-space30"></div>


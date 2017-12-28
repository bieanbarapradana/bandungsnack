<?php

  if ($terlaris_aktif==null) {
    # code...
  }
  else
 {
?>
<div class="row clearfix f-space10"></div>

<div class="container">

  <div class="row">

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 main-column box-block">

         <div class="box-heading category-heading"><span>Showing 1 to <?=$get_batas_awal?> in page <?=$page?> of <?=count($search_2)?> (<?=ceil(count($search_2) / 8)?> Pages)</span>
        <ul class="nav nav-pills pull-right">
          <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" href="#a"> <?=$limit?> per page <i class="fa fa-sort fa-fw"></i> </a>
            <ul class="dropdown-menu" role="menu">
              <?php
                $no=4;
                for ($i=0; $i < ceil(count($search_2)/ 20) ; $i++) { 
                  # code...
                  if ($sort==null) {
                   
                    ?>   
                     <li><a href="<?=base_url('Search/search/1/'.$no.'/high_rate/'.$keyword )?>"><?=$no?> per page</a></li>
                    <?php # code...
                  }
                  else
                  {
                    ?>    <li><a href="<?=base_url('Search/search/1/'.$no.'/'.$sort.'/'.$keyword )?>"><?=$no?> per page</a></li>
                    <?php
                  }
                  ?>

          

                  <?php
                  $no=$no+4;
                }
              ?>
              <li><a href="<?=base_url('Search/search/1/'.ceil(count($search_2))).'/high_rate/'.$keyword?>">All page</a></li>
             
            </ul>
          </li>
          <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" href="#a"> Sort by <i class="fa fa-sort fa-fw"></i> </a>
            <ul class="dropdown-menu" role="menu">
              <?php
                if ($keyword==null) 
                {
                 
                  ?>
                  <li><a href="<?=base_url('Search/search/1/20/sort_asc')?>">Name (A-Z)</a></li>
              <li><a href="<?=base_url('Search/search/1/20/sort_desc')?>">Name (Z-A)</a></li>
              <li><a href="<?=base_url('Search/search/1/20/low_price')?>">Price (Low-High)</a></li>
              <li><a href="<?=base_url('Search/search/1/20/high_price')?>">Price (High-Low)</a></li>
              <li><a href="<?=base_url('Search/search/1/20/high_rate')?>">Rating Highest</a></li>
              <li><a href="<?=base_url('Search/search/1/20/low_rate')?>">Rating Lowest</a></li>
                  <?php # code...
                }
                else
                {
                  ?>
                  <li><a href="<?=base_url('Search/search/1/20/sort_asc/'.$keyword)?>">Name (A-Z)</a></li>
              <li><a href="<?=base_url('Search/search/1/20/sort_desc/'.$keyword)?>">Name (Z-A)</a></li>
              <li><a href="<?=base_url('Search/search/1/20/low_price/'.$keyword)?>">Price (Low-High)</a></li>
              <li><a href="<?=base_url('Search/search/1/20/high_price/'.$keyword)?>">Price (High-Low)</a></li>
              <li><a href="<?=base_url('Search/search/1/20/high_rate/'.$keyword)?>">Rating Highest</a></li>
              <li><a href="<?=base_url('Search/search/1/20/low_rate/'.$keyword)?>">Rating Lowest</a></li>
                  <?php
                }
              ?>
              
            </ul>
          </li>
          <li class="view-grid "> <a href=""> <i class="fa fa-th-large fa-fw"></i></a> </li>
        </ul>
      </div>

      <div class="box-content">

        <div class="box-products slide" id="productc3">

         

          <div class="carousel-inner"> 

            <!-- Items Row -->

            <div class="item active">

              <div class="row box-product"> 

                <!-- Product -->
                <?php

                    foreach ($search as $key => $value) {
                        ?>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <div class="row clearfix f-space10"></div>

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

                      <div class="big-btns"> 

                      <a class="btn btn-default btn-view pull-left" href="<?=base_url('Jajan/detail/'.$value->id_product)?>">View</a> 

                      <!-- <a class="btn btn-default btn-addtocart pull-right" href="<?=base_url('Shoppingcart/add/'.$value->id_product)?>">Add to
                        Cart</a> 
 -->
 <?php
                          if ($value->stock==0) 
              {
                            ?>
               <button value="<?php echo $value->id_product; ?>" class="btn btn-default btn-addtocart pull-right  stock_abis" >Add to Cart</button>
                            <?php
                          }
                          elseif ($value->stock < 0) 
              {
                           ?>
                    <button value="<?php echo $value->id_product; ?>" class="btn btn-default btn-addtocart pull-right  stock_abis" >Add to Cart</button>
                            <?php 
                          }
                          else
              {
                            ?>
                <button value="<?php echo $value->id_product; ?>" class="btn btn-default btn-addtocart pull-right  addlabtype" >Add to Cart</button>
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

<!--                       <a href="<?=base_url('Shoppingcart/add/'.$value->id_product)?>" class="btn btn-default btn-addtocart pull-left" data-toggle="tooltip" title="Tambahkan Ke Keranjang"> <i class="fa fa-shopping-cart fa-fw"></i> </a> -->
<?php
                            if ($value->stock==0) 
                            {
                              ?>
                  <button value="<?php echo $value->id_product; ?>" class="btn btn-default btn-addtocart pull-left stock_abis" data-toggle="tooltip" title="Tambahkan Ke Keranjang"> <i class="fa fa-shopping-cart fa-fw"></i> </button>
                              <?php 
                            }
                            elseif ($value->stock<0)
              {
                              
                              ?>
                  <button value="<?php echo $value->id_product; ?>" class="btn btn-default btn-addtocart pull-left stock_abis" data-toggle="tooltip" title="Tambahkan Ke Keranjang"> <i class="fa fa-shopping-cart fa-fw"></i> </button>
                              <?php 
                            }
                            else
                            {
                              ?>
                              <button value="<?php echo $value->id_product; ?>" class="btn btn-default btn-addtocart pull-left addlabtype" data-toggle="tooltip" title="Tambahkan Ke Keranjang"> <i class="fa fa-shopping-cart fa-fw"></i> </button>
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

      <div class="box-heading">
        
           <div class="pull-left">
            <ul class="pagination pagination-xs">
              <li><a href="">Showing 1 to <?=$get_batas_awal?> in page <?=$page?> of <?=count($search_2)?> (<?=ceil(count($search_2) / 8)?> Pages)</a></li>
              
            </ul>
          </div>
          <?php
            if ($keyword==null)

            {
              ?>
          <div class="pull-right">
            <ul class="pagination pagination-xs">
              <li class="disabled"><a href="#"><i class="fa fa-angle-left"></i></a></li>
              <?php

                  $index_pagging = ceil(count($search_2) / $limit);
                  for ($i=1; $i <= $index_pagging ; $i++) { 
                        if ($page==$i) {
                          
                        
                      ?>
                          <li class="active"><a href="<?=base_url('Search/search/'.$i.'/'.$limit.'/'.$keyword)?>" ><?=$i?></a></li>

                      <?php
                    }
                    else
                    {
                      ?>

                          <li><a href="<?=base_url('Search/search/'.$i.'/'.$limit.'/'.$keyword)?>" ><?=$i?></a></li>

                      <?php
                    }
                  }
              ?>
              
              <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
            </ul>
          </div>
                        <?php
            }
            else
            {
              ?>
                  <div class="pull-right">
            <ul class="pagination pagination-xs">
              <li class="disabled"><a href="#"><i class="fa fa-angle-left"></i></a></li>
              <?php

                  $index_pagging = ceil(count($search_1) / $limit);
                  for ($i=1; $i <= $index_pagging ; $i++) { 
                        if ($page==$i) {
                          
                        
                      ?>
                          <li class="active"><a href="<?=base_url('Search/search/'.$i.'/'.$limit.'/'.$keyword)?>" ><?=$i?></a></li>

                      <?php
                    }
                    else
                    {
                      ?>

                          <li><a href="<?=base_url('Search/search/'.$i.'/'.$limit.'/'.$keyword)?>" ><?=$i?></a></li>

                      <?php
                    }
                  }
              ?>
              
              <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
            </ul>
          </div>
              <?php
            }
          ?>

      </div>

           
            <!-- end: Items Row --> 

            <!-- Items Row -->

          

            <!-- end: Items Row --> 

          </div>

        </div>

      </div>

    </div>

  </div>

</div>
<?php } ?>


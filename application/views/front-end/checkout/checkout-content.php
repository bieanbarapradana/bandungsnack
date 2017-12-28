<?php
    if (!$this->session->userdata('login_in_customer')) {
        redirect(base_url('auth/belum_login'));
    }
    else
    {

?>
<div class="row clearfix f-space10"></div>
<!-- Page title -->
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="page-title">
           
        <?php
          $total_jajanan_baru = 0;
            foreach ($this->cart->contents() as $key => $value) {
              $total_jajanan_baru = $total_jajanan_baru + $value['qty'];
              
            }
           // echo var_dump($this->cart->contents());
        ?>
        <center><h2><i class="fa fa-shopping-cart fa-fw color2"></i> Checkout (<?php $total_jajanan=0; echo $total_jajanan_baru?> Snack)</h2>  </center>

      </div>
    </div>
  </div>
</div>
<!-- end: Page title -->
<div class="row clearfix f-space10"></div>
<div class="container"> 
  <!-- row -->
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 main-column box-block"> 
      
      <!-- Checkout Options -->
      <div class="box-content checkout-op">
        <div class="panel-group" id="checkout-options"> 
          
          <!-- login and register panel -->
          <div class="panel panel-default">
            <div class="panel-heading opened" data-parent="#checkout-options" data-target="#op1" data-toggle="collapse">
              <h4 class="panel-title"> <a href="#a"> <span class="fa fa-shopping-cart"></span> DETAIL BELANJA </a> </h4>
            </div>

            <div class="panel-collapse collapse in" id="op1">

              <div class="panel-body">
              
                <div class="row co-row">
                  <div class="col-md-12 col-xs-12">
                    <div class="box-content form-box">
                      
                      <!-- product -->
                      <?php
                        foreach ($this->cart->contents() as $key => $value) {
                          ?>
                      <div class="row">
                        <div class="product">
                          <div class="col-md-2 col-sm-3 hidden-xs p-wr " >
                            <div class="product-attrb-wr" >
                              <div class="product-attrb">
                                <div class="image"> <a class="img" href="<?=base_url('Jajan/detail/'.$value['id'])?>"><img alt="product info" src="<?=base_url('assets/products/'.$value['photo'])?>" title="product title"></a> </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3 col-sm-7 col-xs-9 p-wr">
                            <div class="product-attrb-wr" style="padding:25px">
                              <div class="product-meta">
                                <div class="name">
                                  <h3><a href="<?=base_url('Jajan/detail/'.$value['id'])?>"><?=$value['name']?></a></h3>
                                </div>
                                <div class="price"> <span class="price-new"><span class="sym">Rp </span><?php echo number_format($value['harga_baru']); ?></span> <span class="price-old"><span class="sym">Rp </span><?php echo number_format($value['price']); ?></span> </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3 hidden-sm hidden-xs p-wr">
                            <div class="product-attrb-wr" style="padding:30px">
                               <div class="product-attrb">
                            <div> <span>Detail </span>  </div>
                            <?php
                            if ($value['promo']==1) 
                            {
                             ?>

                          <div class="att"> <span>Promo :</span> <span class="size"><button class="btn color1">YES</button></span> </div>
                              <?php
                            }
                            else
                            {
                              ?>

                          <div class="att"> <span>Promo :</span> <span class="size"><button class="btn color2">NO</button></span> </div>
                              <?php
                            }
                          ?>
                            <div class="att"> <span>Discount :</span> <span class="size"><?=$value['discount']?> %</span> </div>
                          </div>
                            </div>
                          </div>
                          <div class="col-md-1 hidden-sm hidden-xs p-wr" >
                            <div class="product-attrb-wr " style="padding:30px">
                              <div class="product-attrb">
                                <div class="qtyinput">
              
                                <div class="price"> 
                                    <span class="t-price" style="font-size:12pt;"><?php echo $value['qty']; ?></span>
                                    </div>
                              </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-2 hidden-sm hidden-xs p-wr">
                            <div class="product-attrb-wr" style="padding:30px">
                  <div class="product-attrb">
         
                 <div class="price"> 
                  <span class="t-price"  style="font-size:12pt;">Rp <?php echo number_format($value['harga_baru'] * $value['qty']); ?></span>
                  </div>
             
           
          </div>
                            </div>
                          </div>
                          <div class="col-md-1 col-sm-2 col-xs-3 p-wr">
                            <div class="product-attrb-wr" style="padding:30px">
                              <div class="product-attrb">
                                <div class="remove"> <a href="<?=base_url('Shoppingcart/delete/'.$value['rowid'])?>"  class="color2" data-toggle="tooltip" data-original-title="Remove"><i class="fa fa-trash-o fa-fw color2"></i></a> </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        </div>
                      
                          <?php
                        }
                      ?>
                      <!-- end: product --> 
<div class="row clearfix f-space10"></div>

                  <?php
            $tot_harga = 0;
            $tot_harga_normal = 0;
            $total_barang_belanja = 0;
            $total_diskon = 0;
              foreach ($this->cart->contents() as $key => $value) {
                      $total_barang_belanja = $total_barang_belanja + $value['qty'];
                      $tot_harga = $tot_harga + ($value['qty'] * $value['harga_baru']);
                      $tot_harga_normal = $tot_harga_normal + ($value['qty'] *($value['price'] + $value['harga_baru']));
                      $total_diskon = $total_diskon + $value['discount'];
              }
            ?>






      <div class="col-lg-4 cart-box-wr p-wr" style="width:313px">
        <div class="cart-box-tm">
          <div class="tm3 bgcolor1">Tanggal</div>
          <div class="tm2"> <?=date('d-M-Y')?></div>
        </div>
        <div class="cart-box-tm">
          <div class="tm3">ID Akun </div>
          <div class="tm2">ID0<?=$this->session->userdata('id_customers')?></div>
        </div>
        </div>

      <div class="col-lg-4 cart-box-wr p-wr"  style="width:313px">
        <div class="cart-box-tm">
          <div class="tm3 bgcolor1">Total Snack</div>
          <div class="tm2"> <?=$total_barang_belanja?> Snack</div>
        </div>
        <div class="cart-box-tm">
          <div class="tm3">Total Bayar</div>
          <div class="tm2"><?=number_format($tot_harga)?></div>
        </div>
        </div>
      <div class="col-lg-4 cart-box-wr p-wr" style="width:313px">

        <div class="cart-box-tm">
          <div class="tm3">Diskon</div>
          <div class="tm2"><?=$total_diskon?> %</div>
        </div>
        

        <div class="cart-box-tm">
          <?php
          $ppn = $tot_harga * 0.05;
          ?>
          <div class="tm3">PPN (5%) </div>
          <div class="tm2"><?=number_format($ppn)?></div>
        </div>
        </div>

      <div class="col-lg-4 cart-box-wr p-wr" style="width:313px">

        <div class="cart-box-tm">
          <div class="tm3 bgcolor2">Total </div>
          <div class="tm4 bgcolor2"><?=number_format($ppn+$tot_harga)?></div>
        </div>
        <div class="cart-box-tm">
          <?php
              if ($this->cart->contents()==null) 
              {
                ?>
                
          <div style="text-align:center" class="tm3 bgcolor3" onclick="window.location.href='<?=base_url('Checkout/no_cart')?>'">Lanjutkan</div>
                <?php    
              }
              else
              {
                ?>

          <div style="text-align:center" class="tm3 bgcolor2" data-toggle="modal" data-target="#edit_data" >Lanjutkan </div>
                <?php    
              }
          ?>
        </div>
      </div>
    


                      </div>

                      </div>

                  </div>
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

<?php } ?>

<div id="edit_data" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <center><h4 class="modal-title"> <i class="fa fa-key"></i> Silahkan periksa kembali data anda </h4></center>
      </div>
      <form action="<?=base_url('Proses_orders/add')?>" id="validasi-reset_password" method="POST">

      <div class="modal-body">
        <center> 
        <div class="box">
            <div style="text-align:left;"><label>Nama Depan</label></div>
             <div style="color: red;text-align:left;font-family:arial;font-size:10pt;" id="invalid-first_name" class="error_msg"></div>
                        <?php
                            if ($data_account->first_name=='Unknwon') {
                             
                              ?>
                              
                        <input type="text" name="first_name" id="first_name" placeholder="Nama depan" class="input4" required="">
                              <?php   
                            }
                            else
                            {
                              ?>

                        <input type="text" name="first_name" id="first_name" placeholder="Nama depan" class="input4" required="" value="<?=$data_account->first_name?>">
                              <?php   
                            }
                        ?>
            <div style="text-align:left;"><label>Nama Belakang</label></div>
                        
                        <div style="color: red;text-align:left;font-family:arial;font-size:10pt;" id="invalid-last_name" class="error_msg"></div>
                        
                           <?php
                            if ($data_account->last_name=='Unknwon') {
                             
                              ?>

                        <input type="text" name="last_name" id="last_name" placeholder="Nama Belakang" class="input4" required="">
                              <?php
                            }
                            else
                            {

                              ?>

                        <input type="text" name="last_name" id="last_name" placeholder="Email" class="input4" required="" value="<?=$data_account->last_name?>">
                              <?php
                            }
                            ?>
            <div style="text-align:left;"><label>No Telfon</label></div>
                        
                        <div style="color: red;text-align:left;font-family:arial;font-size:10pt;" id="invalid-contact" class="error_msg"></div>
                        <input type="text" name="contact" id="contact" placeholder="Email" class="input4" required="" value="<?=$data_account->contact?>">
            <div style="text-align:left;"><label>Alamat Pengiriman </label></div>

                        <div style="color: red;text-align:left;font-family:arial;font-size:10pt;" id="invalid-address" class="error_msg"></div>
                        <?php
                            if ($data_account->last_name=='Unknwon') {

                        ?>
                        <textarea type="text" rows="10" name="address" id="address" placeholder="Alamat" class="input4" required=""></textarea>
                        <?php
                          }
                          else
                          {
                            ?>
                         <textarea type="text" rows="10" name="address" id="address" placeholder="Alamat" class="input4" required=""><?=$data_account->address?></textarea>
                            <?php
                          }
                        ?>
                       
                        
                      
                        </center>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-default" value="Simpan">
      </form>
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
      </div>
    </div>

  </div>
</div>
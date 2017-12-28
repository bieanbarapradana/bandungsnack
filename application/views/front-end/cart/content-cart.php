
<div class="row clearfix f-space10"></div>

        <?php
  
  if ($this->cart->contents()==NULL) 

  {
    ?>

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
        <center><h2 style="font-size: 25px;font-weight: 900;"><i style="" class="fa fa-shopping-cart fa-fw"></i> Total Keranjang Belanja Anda (<?php $total_jajanan=0; echo $total_jajanan_baru?> Snack)</h2>  </center>

      </div>
    </div>
  </div>
</div>
<div class="row clearfix f-space10"></div>

    <?php
    # code...
  }
  else
  {
    ?>
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
        <center><h2 style="font-size: 25px;font-weight: 900;"> Total Keranjang Belanja Anda (<?php $total_jajanan=0; echo $total_jajanan_baru?> Snack)</h2>  </center>

      </div>
    </div>
  </div>
</div>
<div class="row clearfix f-space10"></div>

    <?php
  }
  
?>
<div class="container">
  <div class="row">
    <div class="product">
      <div class="col-md-2 hidden-sm hidden-xs p-wr" >
        <div class="product-attrb-wr"  style="height:65px;" >
          <div class="product-attrb">
            <div class="price"> 
                  <span class="t-price" style="font-size:12pt;">IMAGE</span>
                  </div>
          </div>
        </div>
      </div>

      <div class="col-md-3 col-sm-7 col-xs-9 p-wr">
        <div class="product-attrb-wr" style="height:60px;">
         <div class="product-attrb">
            <div class="price"> 
                  <span class="t-price" style="font-size:12pt;">PRODUCT</span>
                  </div>
          </div>
        </div>
      </div>
      <div class="col-md-2 hidden-sm hidden-xs p-wr">
        <div class="product-attrb-wr" style="height:60px;">
          <div class="product-attrb">
            <div class="price"> 
                  <span class="t-price" style="font-size:12pt;">INFO</span>
                  </div>
          </div>
        </div>
      </div>
      <div class="col-md-2 hidden-sm hidden-xs p-wr">
        <div class="product-attrb-wr" style="height:60px;">
          <div class="product-attrb">
            <div class="qtyinput">
              
              <div class="price"> 
                  <span class="t-price" style="font-size:12pt;">QTY</span>
                  </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-2 hidden-sm hidden-xs p-wr">
        <div class="product-attrb-wr" style="height:60px;">
          <div class="product-attrb">
         
                 <div class="price"> 
                  <span class="t-price" style="font-size:12pt;">TOTAL</span>
                  </div>
             
           
          </div>
        </div>
      </div>
      <div class="col-md-1 col-sm-2 col-xs-3 p-wr">
        <div class="product-attrb-wr" style="height:60px;">
          <div class="product-attrb">
         
                 <div class="price"> 
                  <span class="t-price">X</span>
                  </div>
             
           
          </div>
        </div>
      </div>

    </div>

  </div>
<div class="row clearfix f-space10"></div>

</div>
<?php

  if ($this->cart->contents()==NULL) 
  {
    ?>
<div class="row clearfix f-space10"></div>
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
        <center><h2 style="font-size: 25px;font-weight: 900;color: #e65a4b;"><i style="color: #e65a4b;" class="fa fa-shopping-cart fa-fw"></i> Tidak Ada Detail Belanja</h2>  </center>

      </div>
    </div>
  </div>
</div>
<div class="row clearfix f-space10"></div>

    <?php
  }
  else
  {
?>
<!-- product -->
<?php $i = 1; $total_jajanan =0;$total_harga_bayar =0;$total_harga_lama =0;?>

<?php foreach ($this->cart->contents() as $items): ?>
        <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>



<div class="container">
  <div class="row">
    <div class="product">
      <div class="col-md-2 col-sm-3 hidden-xs p-wr">
        <div class="product-attrb-wr">
          <div class="product-attrb">
            <div class="image"> <a class="img" href="<?=base_url('Jajan/detail/'.$items['id']);?>"><img alt="product info" src="<?=base_url('assets/products/'.$items['photo'])?>" title="product title"></a> </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-7 col-xs-9 p-wr">
        <div class="product-attrb-wr">
          <div class="product-meta">
            <div class="name">
              <h3><a href="<?=base_url('Jajan/detail/'.$items['id'])?>"><?php echo $items['name']; ?></a></h3>
            </div>
            <div class="price"> 
                    <span class="price-new"><span class="sym">Rp </span><?php echo number_format($items['harga_baru']); ?></span> 
                <?php
                  if ($items['discount']==0) 
                  {
                    # code...
                  }
                  else
                  {
                    ?>
                <span class="price-old"><span class="sym">Rp </span><?php echo number_format($items['price']); ?></span>
                    <?php
                  }
                ?>
          

            </div>
             </div>
        </div>
      </div>
      <div class="col-md-2 hidden-sm hidden-xs p-wr">
        <div class="product-attrb-wr">
          <div class="product-attrb">
            <?php
              if ($items['promo']==1) 
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
            <div class="att"> <span>Discount :</span> <span class="size"><?=$items['discount']?> %</span> </div>
          </div>
        </div>
      </div>
      <div class="col-md-2 hidden-sm hidden-xs p-wr">
        <div class="product-attrb-wr">
          <div class="product-attrb">
            <div class="qtyinput">
              
              <div class="price"> 
                  <span class="t-price" style="font-size:12pt;"><?php echo $items['qty']; ?></span>
                  </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-2 hidden-sm hidden-xs p-wr">
        <div class="product-attrb-wr">
          <div class="product-attrb">
         
                 <div class="price"> 
                  <span class="t-price" style="font-size:12pt;">Rp <?php echo number_format($items['harga_baru'] * $items['qty']); ?></span>
                  </div>
             
           
          </div>
        </div>
      </div>
      <div class="col-md-1 col-sm-2 col-xs-3 p-wr">
        <div class="product-attrb-wr">
          <div class="product-attrb">
            <div class="remove"> <a href="<?=base_url('Shoppingcart/delete/'.$items['rowid'])?>" class="color2" data-toggle="tooltip" data-original-title="Remove"><i class="fa fa-trash-o fa-fw color2"></i></a> </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
<!-- end: product -->
<?php $i++;  ?>
<?php  $total_jajanan = $total_jajanan + $items['qty']?>
<?php  $total_harga_bayar = $total_harga_bayar + ( $items['harga_baru'] * $items['qty'])?>
<?php  $total_harga_lama = $total_harga_lama + ( $items['price']  * $items['qty'])?>

<?php endforeach; ?>

<!-- end: product -->


<div class="row clearfix f-space30"></div>

  <div class="container">
  <div class="row"> 
    <!--  Total amount -->
    

      <div class="col-md-10 col-sm-10 col-xs-12 cart-box-wr">
          <div class="box-content "  style="background:#00aff0">
        <div class="cart-box-tm"  style="background:#00aff0">
          <div class="tm1"  style="background:#00aff0;color:#fff;text-align:center;">Informasi Belanja anda</div>
        </div>
        </div>
      <div class="box-content">
        <div class="cart-box-tm">
          <div class="tm1">Total Jajan</div>
          <div class="tm2"><?php echo count($this->cart->contents()) ;?>Jajan</div>
        </div>
       </div>
         <div class="box-content">
        <div class="cart-box-tm">
          <div class="tm1">Jumlah Jajan</div>
          <div class="tm2"><?php if($total_jajanan==0) {  echo "0 Jajan"; } else { echo $total_jajanan." Jajan";}?> </div>
        </div> 
       </div>
     <div class="box-content">
        <div class="cart-box-tm">
          <div class="tm1">Harga Sebelum Discount</div>
          <div class="tm2"><?=number_format($total_harga_lama)?></div>
        </div>
       </div>
        <div class="box-content">
        <div class="cart-box-tm">
          <div class="tm1">Harga Setelah Discount</div>
          <div class="tm2"><?=number_format($total_harga_bayar)?></div>
        </div>
       </div>
       </div>
      <div class="col-md-2 col-sm-2 col-xs-12 cart-box-wr">
     
      <div class="box-content ">
         <div class="cart-box-tm ">
       
          <div class="tm1"  style="background:#00aff0;color:#fff;text-align:center;">INFO</div>

        </div>
      </div>
       <div class="box-content ">
         <div class="cart-box-tm ">
        <a href="<?=base_url()?>"><button class="btn large color3">LANJUT BELANJA</button></a>
        </div>
      </div>
       <div class="box-content">
         <div class="cart-box-tm">
        <a href="<?=base_url('checkout')?>"><button class="btn large col-md-12 col-sm-12 col-xs-12 cart-box-wr" style="background:#feaa37">SELESAI BELANJA</button></a>
        </div>
      </div>
         <div class="box-content "  style="background:#e65a4b">
        <div class="cart-box-tm"  style="background:#e65a4b">
          <a href="<?=base_url('Shoppingcart/cart_destroy')?>"><div class="tm1"  style="background:#e65a4b;color:#fff;text-align:center;" >BATAL</div></a>
        </div>
        </div>
    </div>
    
    <!-- end: Total amount --> 
    
  </div>
</div>
<div class="row clearfix f-space30"></div>
<?php }?>
<!-- Rectangle Banners -->

<!-- end: Rectangle Banners -->
<!-- end: Products --> 

<!-- Rectangle Banners -->


<!-- end: Rectangle Banners --> 

<!-- Widgets -->
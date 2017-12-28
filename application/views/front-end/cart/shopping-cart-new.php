
<div class="row clearfix f-space10"></div>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="page-title">
        <h2>Total Snack <?=$cart->total?> (<?=$sum_cart->total?>)</h2>
      </div>
    </div>
  </div>
</div>
<div class="row clearfix f-space10"></div>
<!-- product -->

<?php $i = 1; ?>

<?php foreach ($this->cart->contents() as $items): ?>

        <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>

        <tr>
                <td><?php echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?></td>
                <td>
                        <?php echo $items['name']; ?>

                        <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>

                                <p>
                                        <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

                                                <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

                                        <?php endforeach; ?>
                                </p>

                        <?php endif; ?>

                </td>
                <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
                <td style="text-align:right">$<?php echo $this->cart->format_number($items['subtotal']); ?></td>
        </tr>




<div class="container">
  <div class="row">
    <div class="product">
      <div class="col-md-2 col-sm-3 hidden-xs p-wr">
        <div class="product-attrb-wr">
          <div class="product-attrb">
            <div class="image"> <a class="img" href="<?=base_url('Jajan/detail/');?>"><img alt="product info" src="<?=base_url('assets/products/'.$value->photo)?>" title="product title"></a> </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-7 col-xs-9 p-wr">
        <div class="product-attrb-wr">
          <div class="product-meta">
            <div class="name">
              <h3><a href="<?=base_url('Jajan/detail/')?>">aa</a></h3>
            </div>
            <div class="price"> 
                    <span class="price-new"><span class="sym">Rp, </span><?php echo $this->cart->format_number($items['price']); ?></span> 
               
          

            </div>
             </div>
        </div>
      </div>
      <div class="col-md-2 hidden-sm hidden-xs p-wr">
        <div class="product-attrb-wr">
          <div class="product-attrb">
            <div data-toggle="tooltip" title="" class="att color bg-teal" data-original-title="Detail"> <span>Detail </span>  </div>
            <div class="att"> <span>Promo :</span> <span class="size"><button class="btn color2">NO</button></span> </div>
            <div class="att"> <span>Discount :</span> <span class="size"><?=$value->discount?> %</span> </div>
          </div>
        </div>
      </div>
      <form action="aaa" method="POST">
      <div class="col-md-2 hidden-sm hidden-xs p-wr">
        <div class="product-attrb-wr">
          <div class="product-attrb">
            <div class="qtyinput">
              <div class="quantity-inp">
              <?php echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?>
                <div class="quantity-txt minusbtn"><a href="#a" class="qty qtyminus" ><i class="fa fa-minus fa-fw"></i></a></div>
                <div class="quantity-txt plusbtn"><a href="#a" class="qty qtyplus" ><i class="fa fa-plus fa-fw"></i></a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-2 hidden-sm hidden-xs p-wr">
        <div class="product-attrb-wr">
          <div class="product-attrb">
         
                 <div class="price"> <span class="t-price">Rp, <span class="sym"></span><?php echo $this->cart->format_number($items['subtotal']); ?></span> </div>
             
           
          </div>
        </div>
      </div>
      <div class="col-md-1 col-sm-2 col-xs-3 p-wr">
        <div class="product-attrb-wr">
          <div class="product-attrb">
            <div class="remove"> <a href=""  class="color1" data-toggle="tooltip" data-original-title="Update"><i class="fa fa-check fa-fw color1" type="submit"></i></a> </div>
            
            <div class="remove"> <a href="#a" class="color2" data-toggle="tooltip" data-original-title="Remove"><i class="fa fa-trash-o fa-fw color2"></i></a> </div>
          </div>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- end: product -->
<div class="row clearfix f-space30"></div>
<?php $i++; ?>

<?php endforeach; ?>
<!-- end: product -->
<div class="row clearfix f-space30"></div>
<div class="container">
  <div class="row"> 
    <!-- 	Total amount -->
    
    <div class="col-md-5 col-sm-5 col-xs-12 cart-box-wr">
    <div class="box-content "  style="background:#00aff0">
        <div class="cart-box-tm"  style="background:#00aff0">
          <div class="tm1"  style="background:#00aff0;color:#fff;text-align:center;">Informasi Account</div>
        </div>
        </div>
      <div class="box-content">
        <div class="cart-box-tm">
          <div class="tm1">Nama Lengkap</div>
          <div class="tm2"><?=$this->session->userdata('first_name').' '.$this->session->userdata('last_name')?></div>
        </div>
        </div>
        <div class="box-content">
        <div class="cart-box-tm">
          <div class="tm1">Email</div>
          <div class="tm2"><?=$this->session->userdata('email')?></div>
        </div>
        </div>
        <div class="box-content">
        <div class="cart-box-tm">
          <div class="tm1">Alamat</div>
          <div class="tm2"><?=$this->session->userdata('address')?></div>
        </div>
        </div>
        <div class="box-content">
        <div class="cart-box-tm">
          <div class="tm1">No Telp</div>
          <div class="tm2"><?=$this->session->userdata('contact')?></div>
        </div>
        </div>
        </div>
      <div class="col-md-5 col-sm-5 col-xs-12 cart-box-wr">
          <div class="box-content "  style="background:#00aff0">
        <div class="cart-box-tm"  style="background:#00aff0">
          <div class="tm1"  style="background:#00aff0;color:#fff;text-align:center;">Informasi Belanja anda</div>
        </div>
        </div>
      <div class="box-content">
        <div class="cart-box-tm">
          <div class="tm1">Total Jajan</div>
          <div class="tm2"><?=$cart->total?> Jajan</div>
        </div>
       </div>
         <div class="box-content">
        <div class="cart-box-tm">
          <div class="tm1">Jumlah Jajan</div>
          <div class="tm2"><?=$sum_cart->total?> Jajan</div>
        </div>
       </div>
        <div class="box-content">
        <div class="cart-box-tm">
          <div class="tm1">Harga Sebelum Discount</div>
          <div class="tm2">$23.60</div>
        </div>
       </div>
        <div class="box-content">
        <div class="cart-box-tm">
          <div class="tm1">Harga Setelah Discount</div>
          <div class="tm2">$23.60</div>
        </div>
       </div>
       </div>
      <div class="col-md-2 col-sm-2 col-xs-12 cart-box-wr">
       <div class="box-content "  style="background:#00aff0">
        <div class="cart-box-tm"  style="background:#00aff0">
          <div class="tm1"  style="background:#00aff0;color:#fff;text-align:center;">NEXT</div>
        </div>
        </div>
<div class="row clearfix f-space30"></div>
      <div class="box-content">
         <div class="cart-box-tm">
        <button class="btn large color1">Proceed to Checkout</button>
        </div>
      </div>
<div class="row clearfix f-space30"></div>
       <div class="box-content">
         <div class="cart-box-tm">
        <button class="btn large color1">Proceed to Checkout</button>
        </div>
      </div>
    </div>
    
    <!-- end: Total amount --> 
    
  </div>
</div>
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
<div class="row clearfix f-space30"></div>

<!-- end: Rectangle Banners -->

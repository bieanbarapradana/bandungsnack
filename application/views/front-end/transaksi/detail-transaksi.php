<?php
    if (!$this->session->userdata('login_in_customer')) {
        redirect(base_url('auth/belum_login'));
    }
    else
    {

?>

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
                      
                    
                      <!-- end: product --> 
<div class="row clearfix f-space10"></div>
                  <table style="width: 100%;border-collapse: collapse;box-shadow: 0 2px 3px 1px #ddd;overflow: hidden;border:10px solid #fff;">
                  <tr style='background:#11acee;'>
        <th colspan=7; style="vertical-align: top;text-align: center;">
        <p><h1>Bandungsnack.com</h1><br/><button style="margin-top:-20px;" class="btn btn-primary" onclick="window.location.href='<?=base_url('Transaksi')?>'">Kembali</button></p></th>

        </tr>
        
         <tr style='background:#eee;'>
        <td colspan=7; style="vertical-align: top;padding:10px 7px;text-align: justify;margin:0;">

         Kepada Yth. <strong>Sdr/i. <?=$data_order->first_name." ".$data_order->last_name?>,</strong>
                    <p>
                    
                    Terima kasih atas pemesanan produk kami
                    <p>
                    Kami akan memproses order Anda setelah kami menerima bukti atau pembayaran yang telah Anda lakukan. Bila dalam waktu 1 minggu dari tanggal pendaftaran kami tidak menerima bukti atau info pembayaran dari Anda, kami menganggap Anda telah membatalkan order Anda. </p>
                    <p>

                 </tr>
                <tr style="background:#ccc;">
          <th colspan=2; style="vertical-align: top;padding:10px 7px;text-align: left;margin:0;">Info</th>
          <th colspan=5; style="vertical-align: top;padding:10px 7px;text-align: left;margin:0;">Detail </th>
        </tr>

         <tr style="background:#fff;">
          <th colspan=2; style="vertical-align: top;padding:10px 7px;text-align: left;margin:0;">Order ID </th>
          <td colspan=5; style="vertical-align: top;padding:10px 7px;text-align: left;margin:0;"> MKT/<?=$data_order->id_orders."/".date('d')."/".date('m')."/".date('y')?></td>
        </tr>
         <tr style="background:#fff;">
          <th colspan=2; style="vertical-align: top;padding:10px 7px;text-align: left;margin:0;">Nama Lengkap</th>
          <td colspan=5; style="vertical-align: top;padding:10px 7px;text-align: left;margin:0;"><?=$data_order->first_name." ".$data_order->last_name?></td>
        </tr>
         <tr style="background:#eee;">
          <th colspan=2; style="vertical-align: top;padding:10px 7px;text-align: left;margin:0;">Alamat</th>
          <td colspan=5; style="vertical-align: top;padding:10px 7px;text-align: left;margin:0;"><?=$data_order->address?></td>
        </tr>
         <tr style="background:#fff;">
          <th colspan=2; style="vertical-align: top;padding:10px 7px;text-align: left;margin:0;">No Telfon</th>
          <td colspan=5; style="vertical-align: top;padding:10px 7px;text-align: left;margin:0;"><?=$data_order->contact?></td>
        </tr>
         
                  <tr style='background:#eee;'>
        
         <tr style='background:#444444;'>
        <th colspan=7; style="vertical-align: top;padding:10px 7px;text-align: center;margin:0;">
        <h2 style="color:#fff;">Detail Orders</h2></th>
        </tr>
        </tr>
                    <tr style='background:#ccc;'>
        <th style="vertical-align: top;padding:10px 7px;text-align: center;margin:0;">No</th>
        <th style="vertical-align: top;padding:10px 7px;text-align: left;margin:0;">Kode Produk</th>
        <th style="vertical-align: top;padding:10px 7px;text-align: left;margin:0;">Nama Produk</th>
        <th style="vertical-align: top;padding:10px 7px;text-align: right;margin:0;">Harga Produk</th>
        <th style="vertical-align: top;padding:10px 7px;text-align: center;margin:0;">QTY</th>
        <th style="vertical-align: top;padding:10px 7px;text-align: center;margin:0;">Discount</th>
        <th style="vertical-align: top;padding:10px 7px;text-align: left;margin:0;">Total</th>
        </tr>
                <?php           
            $no=1;
                $total_bayar = 0;
                foreach ($data_detail_order  as $key => $value) {
                  if ($no % 2 == 0) {
                    $warna ='#eee';
                  }
                  else
                  {
                    $warna ='#fff';
                  }
                  ?>
                   <tr  style="background:"<?=$warna?>">

                    <td  style="vertical-align: top;padding:10px 7px;text-align: center;margin:0;" ><?=$no?></td>
                    <td  style="vertical-align: top;padding:10px 7px;text-align: left;margin:0;" ><?=$value->id_orders?></td>
                    <td  style="vertical-align: top;padding:10px 7px;text-align: left;margin:0;" ><?=$value->product_name?></td>
                    <td  style="vertical-align: top;padding:10px 7px;text-align: right;margin:0;" >Rp, <?=number_format($value->product_price)?></td>
                    <td  style="vertical-align: top;padding:10px 7px;text-align: center;margin:0;" ><?=$value->qty?></td>
                    <td  style="vertical-align: top;padding:10px 7px;text-align: center;margin:0;" ><?=$value->discount?> % </td>
                    <td  style="vertical-align: top;padding:10px 7px;text-align: left;margin:0;" ><?=number_format($value->qty * ($value->product_price - ($value->product_price * ($value->discount / 100 ))))?></td>
                    </tr>
                    <?php
                    //echo $value->id_produk;
                  $total_bayar = $total_bayar + ($value->qty * ($value->product_price - ($value->product_price * ($value->discount / 100 ))));
                    $no++;
                }
                ?>
                  <tr style='background:#ccc;'>
        <th colspan=6; style="vertical-align: top;padding:10px 7px;text-align: right;margin:0;">Total Bayar</th>
        <th style="vertical-align: top;padding:10px 7px;text-align: left;margin:0;">Rp <?=number_format($total_bayar)?></th>
        </tr>

        <tr style='background:#fff;'>
        <th colspan=7 style="vertical-align: top;padding:10px 7px;text-align: center;margin:0;">  </th>
        
        </tr>
       
                </table>
  


 

       

   
    


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
<script type="text/javascript">
  
  $(document).ready(function() {
    $('#example').DataTable();
} );
</script>

<!--akhir-->
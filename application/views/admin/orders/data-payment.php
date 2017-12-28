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
    <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                 <th>No</th>
                 <th  style="text-align:left;">Nomer Transaksi</th>
                 <th  style="text-align:left;">Name</th>
                 <th>Tanggal Transaksi</th>
                 <th>Status Pengiriman</th>
                 <th>Status Pembayaran</th>
                 <th>Konfirmasi Pembayaran </th>
                 <th style="text-align:center;">Aksi</th>
            </tr>
        </thead>
       
        <tbody>
             <?php
          $no=1;
            foreach ($data_transaksi as $key => $value) 
            {

              ?>
            <tr>
                <td style="text-align:center;"><?=$no?></td>
                <td style="text-align:center;">MKT/<?=$value->id_orders.'/'.substr($value->order_date,8,2).'/'.substr($value->order_date,5,2).'/'.substr($value->order_date,0,4)?></td>
                <td style="text-align:left;"><?=$value->first_name.' '.$value->last_name?></td>
                <td style="text-align:center;"><?=$value->order_date?></td>
                <?php
                  if ($value->shipping_status=='not confirmed') 
                  {
                    ?>
                        <td style="text-align:center;">Pendding</td>
                    <?php
                  }
                  elseif ($value->shipping_status=='packing') 
                  {
                    ?>
                        <td style="text-align:center;">Packing</td>
                    <?php
                  }
                  elseif ($value->shipping_status=='pending') 
                  {
                    ?>
                        <td style="text-align:center;">Pendding</td>
                    <?php
                  }
                  else
                  {
                    ?>
                        <td style="text-align:center;">Pendding</td>
                    <?php
                  }
                ?>
                <?php
                  if ($value->payment_status=='not confirmed') 
                  {
                    ?>
                <td style="text-align:center;">Belum Konfirmasi</td>
                    <?php
                  }
                  elseif ($value->payment_status=='confirmed') 
                  {
                    ?>
                <td style="text-align:center;">Telah Konfirmasi</td>
                    <?php
                  }
                  else
                  {
                    ?>
                <td style="text-align:center;">Belum Konfirmasi</td>
                    <?php
                  }

                ?>
                <?php
                    if ($value->payment_status=='not confirmed') 
                    {
                      ?>
                <td style="text-align:center;"><a style="color:#000;" type="button" data-toggle="modal" data-target="#<?=$value->id_orders?>"   style="color:#fff;"><i style="color:red;" class="fa fa-tags"></i> &nbsp; Lakukan Konfirmasi</a></td>
                      <?php
                    }
                    elseif ($value->payment_status=='confirmed') 
                    {
                      ?>
                <td style="text-align:center;"><a  style="color:#000;" type="button" data-toggle="modal" data-target="#<?=$value->id_orders?>"   style="color:#fff;"><i style="color:blue;" class="fa fa-tags"></i> &nbsp;  Edit Konfirmasi</a></td>
                      <?php
                    }
                    else
                    {
                      ?>

                <td style="text-align:center;"><?=$value->payment_status?></td>
                      <?php
                    }
                ?>


                <!--awal -->
                <td><a href="<?=base_url('Transaksi/detail/'.$value->id_orders)?>"><i style="color:#000;" class="fa fa-file"></i></a></td>

              <?php
                  if ($value->payment_status=='not confirmed') {
                    # code...
                  
              ?>
        <div id="<?=$value->id_orders?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <center><h4 class="modal-title"> <i class="fa fa-key"></i> Konfirmasi Pembayaran </h4></center>
      </div>
      <form enctype="multipart/form-data"  action="<?=base_url('Transaksi/update_payment_status/'.$value->id_orders)?>" id="validasi-change_email" method="POST">

      <div class="modal-body">
        <center> 
        <div class="box">
           <div style="color: red;text-align:left;font-family:arial;font-size:10pt;" id="invalid-email" class="error_msg"></div>
                        <input type="text" name="email" id="email" placeholder="Email" class="input4" required="" value="MKT/<?=$value->id_orders.'/'.substr($value->order_date,8,2).'/'.substr($value->order_date,5,2).'/'.substr($value->order_date,0,4)?>">
                         <div style="color: red;text-align:left;font-family:arial;font-size:10pt;" id="invalid-password" class="error_msg"></div>
                      <div style="color: red;text-align:left;font-family:arial;font-size:10pt;" id="invalid-email" class="error_msg"></div>
                        <input type="file" name="photo" id="photos" placeholder="Email" class="input4" required="" >
                         <div style="color: red;text-align:left;font-family:arial;font-size:10pt;" id="invalid-photo" class="error_msg"></div>
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
<?php
  }
  elseif ($value->payment_status=='confirmed') 
  {
    ?>

        <div id="<?=$value->id_orders?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <center><h4 class="modal-title"> <i class="fa fa-key"></i> Konfirmasi Pembayaran </h4></center>
      </div>
      <form enctype="multipart/form-data"  action="<?=base_url('Transaksi/update_payment_status/'.$value->id_orders)?>" id="validasi-change_email" method="POST">

      <div class="modal-body">
        <center> 
        <div class="box">
           <div style="color: red;text-align:left;font-family:arial;font-size:10pt;" id="invalid-email" class="error_msg"></div>
                        <input type="text" name="email" id="email" placeholder="Email" class="input4" required="" value="MKT/<?=$value->id_orders.'/'.substr($value->order_date,8,2).'/'.substr($value->order_date,5,2).'/'.substr($value->order_date,0,4)?>" readonly="">
                         <div style="color: red;text-align:left;font-family:arial;font-size:10pt;" id="invalid-password" class="error_msg"></div>
                      <div style="color: red;text-align:left;font-family:arial;font-size:10pt;" id="invalid-email" class="error_msg"></div>
                      <?php
                        error_reporting(0);
                        $d_payment = $data_pembayaran->get_data_use_id_order($value->id_orders)->row();
                  //   var_dump($d_payment);
                          ?>

                      <img src="<?=base_url('assets/bukti/transaksi/'.$d_payment->bukti)?>">

                        <!--input type="file" name="photo" id="photo" placeholder="Email" class="input4" required=""-->
                         <div style="color: red;text-align:left;font-family:arial;font-size:10pt;" id="invalid-photo" class="error_msg"></div>
                        </center>
      </div>
      <div class="modal-footer">
      
      </form>
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
      </div>
    </div>

  </div>
</div>
    <?php
  }
?>



            </tr>
              <?php
              $no++;
            }
        ?>
        </tbody>
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
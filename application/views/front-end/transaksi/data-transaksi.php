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
 <!-- side bar -->

    <!-- end:sidebar --> 

    <table id="example"  style="width: 100%;border-collapse: collapse;box-shadow: 0 2px 3px 1px #ddd;overflow: hidden;border:10px solid #fff;">
        <thead>
            <tr  style='background:#11acee;'>
                 <th style="vertical-align: top;padding:10px 7px;text-align: center;margin:0;">No</th>
                 <th style="vertical-align: top;padding:10px 7px;text-align: center;margin:0;">Nomer Transaksi</th>
                 <th  style="text-align:left;">Name</th>
                 <th style="vertical-align: top;padding:10px 7px;text-align: center;margin:0;">Tanggal Transaksi</th>
                 <th style="vertical-align: top;padding:10px 7px;text-align: center;margin:0;">Status Pengiriman</th>
                 <th style="vertical-align: top;padding:10px 7px;text-align: center;margin:0;">Status Pembayaran</th>
                 <th style="vertical-align: top;padding:10px 7px;text-align: center;margin:0;">Konfirmasi Pembayaran </th>
                 <th  style="vertical-align: top;padding:10px 7px;text-align: center;margin:0;">Aksi</th>
            </tr>
        </thead>
       
        <tbody>
             <?php
          $no=1;
            foreach ($data_transaksi as $key => $value) 
            {

              ?>
            <tr >
                <td   style="vertical-align: top;padding:10px 7px;text-align: center;margin:0;" ><?=$no?></td>
                <td   style="vertical-align: top;padding:10px 7px;text-align: center;margin:0;" >MKT/<?=$value->id_orders.'/'.substr($value->order_date,8,2).'/'.substr($value->order_date,5,2).'/'.substr($value->order_date,0,4)?></td>
                <td   style="vertical-align: top;padding:10px 7px;text-align: center;margin:0;" ><?=$value->first_name.' '.$value->last_name?></td>
                <td  style="vertical-align: top;padding:10px 7px;text-align: center;margin:0;" ><?=$value->order_date?></td>
                
                        <td  style="vertical-align: top;padding:10px 7px;text-align: center;margin:0;" ><?=$value->shipping_status?></td>
                <td  style="vertical-align: top;padding:10px 7px;text-align: center;margin:0;" ><?=$value->payment_status?></td>
                
                <?php
                    if ($value->payment_status=='not confirmed') 
                    {
                      ?>
                <td  style="vertical-align: top;padding:10px 7px;text-align: center;margin:0;" ><a style="color:#000;" type="button" data-toggle="modal" data-target="#<?=$value->id_orders?>"   style="color:#fff;"><i style="color:red;" class="fa fa-tags"></i> &nbsp; Lakukan Konfirmasi</a></td>
                      <?php
                    }
                    elseif ($value->payment_status=='confirmed') 
                    {
                      ?>
                <td  style="vertical-align: top;padding:10px 7px;text-align: center;margin:0;" ><a  style="color:#000;" type="button" data-toggle="modal" data-target="#<?=$value->id_orders?>"   style="color:#fff;"><i style="color:blue;" class="fa fa-tags"></i> &nbsp;  Edit Konfirmasi</a></td>
                      <?php
                    }

                    elseif ($value->payment_status=='Approved') 
                    {
                      ?>
                <td  style="vertical-align: top;padding:10px 7px;text-align: center;margin:0;" ><a  style="color:#000;" type="button" data-toggle="modal" data-target="#<?=$value->id_orders?>"   style="color:#fff;"><i style="color:blue;" class="fa fa-tags"></i> &nbsp;  Approved</a></td>
                      <?php
                    }
                    else
                    {
                      ?>

                <td  style="vertical-align: top;padding:10px 7px;text-align: center;margin:0;" ><?=$value->payment_status?></td>
                      <?php
                    }
                ?>


                <!--awal -->
                <td><a href="<?=base_url('Transaksi/detail/'.$value->id_orders)?>"><i style="color:#000;" class="fa fa-file"></i></a></td>

              <?php
                  if ($value->payment_status=='not confirmed') {
                    # code...
                  
              ?>
        <div id="<?=$value->id_orders?>" class="modal modal-transparent fade" role="dialog">
  <div class="modal-dialog modal-transparent modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <center><h4 class="modal-title"> <i class="fa fa-key"></i> Konfirmasi Pembayaran </h4></center>
      </div>
      <form enctype="multipart/form-data"  action="<?=base_url('Transaksi/update_payment_status/'.$value->id_orders)?>"   id="validasi-konfirmasi-pembayaran" method="POST">

      <div class="modal-body">
        <center> 
        <div class="box">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          
                          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                             <h4 class="modal-title" style="text-align:left;margin-top:30px;text-transform:capitalize;"> Nama Lengkap </h4>
                          </div>
                          
                          <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                            <div style="color: red;text-align:left;font-family:arial;font-size:10pt;" id="invalid-nama_account" class="error_msg"></div>

                          <input style="border-radius:4px;text-transform:capitalize;" type="text" name="nama_account" id="nama_account" placeholder="Email" class="input4" required="" value="<?=$this->session->userdata('first_name_customer')?> <?=$this->session->userdata('last_name_customer')?>" readonly="">
                          </div>

                        </div>
          

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                             <h4 class="modal-title" style="text-align:left;margin-top:30px;text-transform:capitalize;"> Nomer faktur </h4>
                          </div>
                          
                          <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                            <div style="color: red;text-align:left;font-family:arial;font-size:10pt;" id="invalid-no_faktur" class="error_msg"></div>

                          <input style="border-radius:4px;" type="text" name="no_faktur" id="no_faktur" placeholder="Email" class="input4" required="" value="MKT/<?=$value->id_orders.'/'.substr($value->order_date,8,2).'/'.substr($value->order_date,5,2).'/'.substr($value->order_date,0,4)?>" readonly="">
                          </div>

                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                             <h4 class="modal-title" style="text-align:left;margin-top:30px;text-transform:capitalize;"> pemilik rekening </h4>
                          </div>
                          
                          <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                            <div style="color: red;text-align:left;font-family:arial;font-size:10pt;" id="invalid-atas_nama" class="error_msg"></div>

                          <input style="border-radius:4px;" type="text" name="atas_nama" id="atas_nama" placeholder="Atas Nama" class="input4" required="">
                          </div>

                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                             <h4 class="modal-title" style="text-align:left;margin-top:30px;text-transform:capitalize;"> Bukti transfer </h4>
                          </div>
                          
                          <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                            <div style="color: red;text-align:left;font-family:arial;font-size:10pt;" id="invalid-email" class="error_msg"></div>

                          <input  style="border-radius:4px;"  type="file" name="photo" id="photos" placeholder="Email" class="input4" required="" >
                          </div>

                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                             <h4 class="modal-title" style="text-align:left;margin-top:30px;text-transform:capitalize;"> tanggal transfer </h4>
                          </div>
                          
                          <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                            <div style="color: red;text-align:left;font-family:arial;font-size:10pt;" id="invalid-tanggal_transfer" class="error_msg"></div>

                          <input  style="border-radius:4px;"  type="date" name="tanggal_transfer" id="tanggal_transfer" placeholder="Email" class="input4" required="" >
                          </div>

                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                             <h4 class="modal-title" style="text-align:left;margin-top:20px;text-transform:capitalize;"> Pembayaran dari bank </h4>
                          </div>
                          
                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <div class="col-lg-1 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1">

                             <h4 class="modal-title" style="text-align:right;margin-top:20px;text-transform:capitalize;"> dari </h4>
                              </div>                            
                            
                              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                <select class="input4" name="bank" id="bank"  style="border-radius:4px;">
                                  <Option value="">Pilih Bank</Option>
                                  <Option value="Mandiri">Mandiri</Option>
                                  <Option value="BNI">BNI</Option>
                                  <Option value="BRI">BRI</Option>

                                </select>
                              </div>
                              <div class="col-lg-1">

                             <h4 class="modal-title" style="text-align:left;margin-top:20px;text-transform:capitalize;"> ke </h4>
                              </div>                            
                            
                              <div class="col-lg-6">

                                <select class="input4" name="ke" id="ke" style="border-radius:4px;">
                                  <Option value="">Pilih Bank</Option>
                                  <Option value="Mandiri-1390010778227-Iman Ahmad Setyawan">Mandiri-1390010778227-Iman Ahmad Setyawan</Option>
                                  <Option value="BNI-0461158360-Iman Ahmad Setyawan">BNI-0461158360-Iman Ahmad Setyawan</Option>
                                  <Option value="BRI-168001000345536-Iman Ahmad Setyawan">BRI-168001000345536-Iman Ahmad Setyawan</Option>

                                </select>
                              </div>

                          </div>

                        </div>
                         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                             <h4 class="modal-title" style="text-align:left;margin-top:30px;text-transform:capitalize;"> Nominal transfer </h4>
                          </div>
                          
                          <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                            <div style="color: red;text-align:left;font-family:arial;font-size:10pt;" id="invalid-nominal" class="error_msg"></div>

                          <input  style="border-radius:4px;"  type="text" name="nominal" id="nominal" placeholder="Masukkan Nominal Transfer anda" class="input4" required="" >
                          </div>

                        </div>

                        
                       
                      <div style="color: red;text-align:left;font-family:arial;font-size:10pt;" id="invalid-email" class="error_msg"></div>
                        <input style="margin-left:-30px;color:#fff;text-align:center;background:#990b01;" type="text" name=sss id="photos" placeholder="Email" class="input4" required="" value="Harap di isi dengan baik" readonly>
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
       $d_payment = $data_pembayaran->get_data_use_id_order($value->id_orders)->row();

    ?>

        <div id="<?=$value->id_orders?>" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <center><h4 class="modal-title"> <i class="fa fa-key"></i> Konfirmasi Pembayaran </h4></center>
      </div>
      <form enctype="multipart/form-data"  action="<?=base_url('Transaksi/update_payment_status/'.$value->id_orders)?>" id="validasi-change_email" method="POST">

      <div class="modal-body">
        <div class="box">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <h4 style="text-transform:capitalize;">Nama Account</h4>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
            <h4 style="text-transform:capitalize;">: <?=$this->session->userdata('first_name_customer')?> <?=$this->session->userdata('last_name_customer')?></h4>
            </div>
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <h4 style="text-transform:capitalize;">nomer faktur</h4>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
            <h4 style="text-transform:capitalize;">: <?=$d_payment->no_factur?></h4>
            </div>
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <h4 style="text-transform:capitalize;">pemilik rekening</h4>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
            <h4 style="text-transform:capitalize;">: <?=$d_payment->atas_nama?></h4>
            </div>
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <h4 style="text-transform:capitalize;">bukti</h4>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
              <?php
                if ($d_payment->bukti==null) 
                {
                     ?>
            <h4 style="text-transform:capitalize;">: <a style="color:#000;" href="ss" target="_blank">Tidak Terlampir <i class="fa fa-file"></i></a></h4>
                  <?php
                }
                else
                {
                  ?>
            <h4 style="text-transform:capitalize;">: <a style="color:#000;" href="<?=base_url('assets/bukti/transaksi/'.$d_payment->bukti)?>" target="_blank">Terlampir <i class="fa fa-file"></i></a></h4>

                  <?php
                }
              ?>
            </div>
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <h4 style="text-transform:capitalize;">Tanggal Transfer</h4>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
            <h4 style="text-transform:capitalize;">: <?=$d_payment->payment_date?></h4>
            </div>
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <h4 style="text-transform:capitalize;"> Pembayaran dari bank </h4>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
            :
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
             
              <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1">
            <h4 style="text-transform:capitalize;">Dari : <?=$d_payment->bank?>-<?=$d_payment->atas_nama?></h4>
              </div>
              
              <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
            <h4 style="text-transform:capitalize;">Ke : <?=$d_payment->ke?></h4>
              </div>
            </div>
          </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <h4 style="text-transform:capitalize;">Nominal</h4>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
            <h4 style="text-transform:capitalize;">: Rp, <?=number_format($d_payment->nominal)?></h4>
            </div>
          </div>
          
          </div>
  

           <div style="color: red;text-align:left;font-family:arial;font-size:10pt;" id="invalid-email" class="error_msg"></div>
                        <center><input style="margin-left:-30px;color:#fff;text-align:center;background:#44dfff;" type="text" name=sss id="photos" placeholder="Email" class="input4" required="" value="Harap di isi dengan baik" readonly></center>
                     
                        <!--input type="file" name="photo" id="photo" placeholder="Email" class="input4" required=""-->
                         <div style="color: red;text-align:left;font-family:arial;font-size:10pt;" id="invalid-photo" class="error_msg"></div>
      </div>
      <div class="modal-footer">
      
      </form>
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
      </div>
    </div>

  </div>
</div>
    <?php
  }elseif ($value->payment_status=='Approved') 
  {
       $d_payment = $data_pembayaran->get_data_use_id_order($value->id_orders)->row();

    ?>

        <div id="<?=$value->id_orders?>" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <center><h4 class="modal-title"> <i class="fa fa-key"></i> Konfirmasi Pembayaran </h4></center>
      </div>
      <form enctype="multipart/form-data"  action="<?=base_url('Transaksi/update_payment_status/'.$value->id_orders)?>" id="validasi-change_email" method="POST">

      <div class="modal-body">
        <div class="box">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <h4 style="text-transform:capitalize;">Nama Account</h4>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
            <h4 style="text-transform:capitalize;">: <?=$this->session->userdata('first_name_customer')?> <?=$this->session->userdata('last_name_customer')?></h4>
            </div>
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <h4 style="text-transform:capitalize;">nomer faktur</h4>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
            <h4 style="text-transform:capitalize;">: <?=$d_payment->no_factur?></h4>
            </div>
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <h4 style="text-transform:capitalize;">pemilik rekening</h4>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
            <h4 style="text-transform:capitalize;">: <?=$d_payment->atas_nama?></h4>
            </div>
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <h4 style="text-transform:capitalize;">bukti</h4>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
              <?php
                if ($d_payment->bukti==null) 
                {
                     ?>
            <h4 style="text-transform:capitalize;">: <a style="color:#000;" href="ss" target="_blank">Tidak Terlampir <i class="fa fa-file"></i></a></h4>
                  <?php
                }
                else
                {
                  ?>
            <h4 style="text-transform:capitalize;">: <a style="color:#000;" href="<?=base_url('assets/bukti/transaksi/'.$d_payment->bukti)?>" target="_blank">Terlampir <i class="fa fa-file"></i></a></h4>

                  <?php
                }
              ?>
            </div>
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <h4 style="text-transform:capitalize;">Tanggal Transfer</h4>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
            <h4 style="text-transform:capitalize;">: <?=$d_payment->payment_date?></h4>
            </div>
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <h4 style="text-transform:capitalize;"> Pembayaran dari bank </h4>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
            :
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
             
              <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1">
            <h4 style="text-transform:capitalize;">Dari : <?=$d_payment->bank?>-<?=$d_payment->atas_nama?></h4>
              </div>
              
              <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
            <h4 style="text-transform:capitalize;">Ke : <?=$d_payment->ke?></h4>
              </div>
            </div>
          </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <h4 style="text-transform:capitalize;">Nominal</h4>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
            <h4 style="text-transform:capitalize;">: Rp, <?=number_format($d_payment->nominal)?></h4>
            </div>
          </div>
          
          </div>
  

           <div style="color: red;text-align:left;font-family:arial;font-size:10pt;" id="invalid-email" class="error_msg"></div>
                        <center><input style="margin-left:-30px;color:#fff;text-align:center;background:#44dfff;" type="text" name=sss id="photos" placeholder="Email" class="input4" required="" value="Harap di isi dengan baik" readonly></center>
                     
                        <!--input type="file" name="photo" id="photo" placeholder="Email" class="input4" required=""-->
                         <div style="color: red;text-align:left;font-family:arial;font-size:10pt;" id="invalid-photo" class="error_msg"></div>
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
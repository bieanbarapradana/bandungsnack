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
                 <th style="vertical-align: top;padding:10px 7px;text-align: center;margin:0;width:5%">No</th>
                 <th style="vertical-align: top;padding:10px 7px;text-align: center;margin:0;">Waktu</th>
                 <th style="vertical-align: top;padding:10px 7px;text-align: center;margin:0;">Deskripsi</th>
                 <th style="vertical-align: top;padding:10px 7px;text-align: center;margin:0;">Status</th>
            </tr>
        </thead>
       
        <tbody>
             <?php
          $no=1;
            foreach ($data_pemberitahuan as $key => $value) 
            {

              ?>
            <tr >
                <td   style="vertical-align: top;padding:10px 7px;text-align: center;margin:0;" ><?=$no?></td>
                <td   style="vertical-align: top;padding:10px 7px;text-align: left;margin:0;" ><?=$value->waktu?></td>
                <td   style="vertical-align: top;padding:10px 7px;text-align: left;margin:0;" ><?=$value->isi?></td>
                <?php
                  if ($value->status==0) {
                    ?>
                      <td style="vertical-align: top;padding:10px 7px;text-align: center;margin:0;" ><a href="<?=base_url($value->link)?>"  style="color:red;"><i style="color:blue;" class="fa fa-check-square-o"></i></a></td>
                    <?php
                  }
                  else{
                     ?>
                      <td style="vertical-align: top;padding:10px 7px;text-align: center;margin:0;" ><a href="<?=base_url($value->link)?>"  style="color:red;"><i style="color:blue;" class="fa fa-check-square-o"></i></a></td>
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
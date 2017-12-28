

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
            <div class="panel-heading opened" data-parent="#checkout-options" data-target="#op1" >
              <h4 class="panel-title"> <a href="#a"> <span class="fa fa-plus"></span> Form Registrasi Registrasi Reseller </a><span class="op-number"></span> </h4>
            </div>
            <div class="panel-collapse collapse in" id="op1">
               <div class="panel-body">
                <div class="row co-row">
                  <form id="validasi-registrasi" action="<?=base_url('Registrasi/daftar')?>" method="POST">
                    <!-- Register -->
                    
                    <div class="col-md-12 col-xs-12">
                    <center>
                      <div class="box-content form-box">
                         <h2 class="title"></h2>
                   
                        <div style="color: red;text-align:left;font-family:arial;font-size:10pt;margin-bottom:-10px;margin-left:40px" id="invalid-username" class="error_msg"></div>
                        <?php

                          if ($this->session->flashdata('username') != null) {
                           ?>
                       <input type="text" name="username" id="username" style="border-radius:5px;height:60px;font-size:15pt;" placeholder="Username" class="input4" Value="<?=$this->session->flashdata('username')?>" required="" >
                            <?php
                          }
                          else
                          {
                             ?>
                       <input type="text" name="username" style="border-radius:5px;height:60px;font-size:15pt;" id="username" placeholder="Username" class="input4" required="" >
                            <?php
                          }
                        ?>

                        <div style="color: red;text-align:left;font-family:arial;font-size:10pt;margin-bottom:-10px;margin-left:40px" id="invalid-password" class="error_msg"></div>

                        <input type="password" style="border-radius:5px;height:60px;font-size:15pt;" name="password" id="password" placeholder="Password" class="input4" required="">

                         <div style="color: red;text-align:left;font-family:arial;font-size:10pt;margin-bottom:-10px;margin-left:40px" id="invalid-re_password" class="error_msg"></div>
                        <input type="password" name="re_password" style="border-radius:5px;height:60px;font-size:15pt;" id="re_password" placeholder="Re Password" class="input4" required="">
                       
                        <div style="color: red;text-align:left;font-family:arial;font-size:10pt;margin-bottom:-10px;margin-left:40px" id="invalid-first_name" class="error_msg"></div>
                         <?php

                          if ($this->session->flashdata('first_name') != null) {
                           ?>
                        <input type="hidden" name="first_name" style="border-radius:5px;height:60px;font-size:15pt;" id="first_name" placeholder="Nama Depan" class="input4" required="" value="<?=$this->session->flashdata('first_name')?>">
                        <?php } else { ?>
                          <input type="hidden" value="Unknwon" name="first_name" style="border-radius:5px;height:60px;font-size:15pt;" id="first_name" placeholder="Nama Depan" class="input4" required="">
                          <?php } ?>

                        <div style="color: red;text-align:left;font-family:arial;font-size:10pt;margin-bottom:-10px;margin-left:40px" id="invalid-last_name" class="error_msg"></div>
                         <?php

                          if ($this->session->flashdata('last_name') != null) {
                           ?>
                        <input type="hidden" name="last_name" style="border-radius:5px;height:60px;font-size:15pt;" id="last_name" placeholder="Nama Belakang" class="input4" required="" value="<?=$this->session->flashdata('last_name')?>">
                        <?php } else { ?>
                          <input type="hidden" value="Unknwon" name="last_name" style="border-radius:5px;height:60px;font-size:15pt;" id="last_name" placeholder="Nama Belakang" class="input4" required="">
                          <?php } ?>


                        <div style="color: red;text-align:left;font-family:arial;font-size:10pt;margin-bottom:-10px;margin-left:40px" id="invalid-email" class="error_msg"></div>

                        <?php

                          if ($this->session->flashdata('email') != null) {
                           ?>
                        <input type="text" name="email" style="border-radius:5px;height:60px;font-size:15pt;" id="email" placeholder="Email" class="input4"  required="" value="<?=$this->session->flashdata('email')?>">
                        <?php } else { ?>
                          <input type="text" name="email" style="border-radius:5px;height:60px;font-size:15pt;" id="email" placeholder="Email" class="input4"  required="">
                          <?php } ?>

                        
                       
                       <div style="color: red;text-align:left;font-family:arial;font-size:10pt;margin-bottom:-10px;margin-left:40px" id="invalid-contact" class="error_msg"></div>

                        <?php

                          if ($this->session->flashdata('contact') != null) {
                           ?>
                       
                        <input type="text" name="contact" style="border-radius:5px;height:60px;font-size:15pt;" id="contact" placeholder="No Telp" class="input4" required="" value="<?=$this->session->flashdata('contact')?>">
                        <?php } else { ?>
                         
                        <input type="text" name="contact" style="border-radius:5px;height:60px;font-size:15pt;" id="contact" placeholder="No Telp" class="input4" required="">
                          <?php } ?>


                        <div style="color: red;text-align:left;font-family:arial;font-size:10pt;margin-bottom:-10px;margin-left:40px" id="invalid-address" class="error_msg"></div>
                         <?php

                          if ($this->session->flashdata('address') != null) {
                           ?>
                          <textarea type="hidden" value="Unknwon" name="address" style="display: none;border-radius:5px;height:60px;font-size:15pt;" id="address" placeholder="Alamat" class="input4" required=""><?=$this->session->flashdata('address')?></textarea>
                        <?php } else { ?>
                         
                       <textarea type="hidden" value="Unknwon" name="address" style="display: none;border-radius:5px;height:60px;font-size:15pt;" id="address" placeholder="Alamat" class="input4" required="">Unknwon </textarea>
                          <?php } ?>
                         
                          <br>
                           <div  class="col-md-12 col-xs-12">

                       
                        <div  class="col-md-6 col-xs-6">
                        <button type="button" style="border-radius:5px;height:60px;font-size:15pt;" class="btn medium color2 input4" onclick="window.location.href='<?=base_url('Registrasi/batal')?>'">BATAL</button>

                        </div>
                         <div  class="col-md-6 col-xs-6">
                          <button  type="submit" style="border-radius:5px;height:60px;font-size:15pt;" class="btn medium color1 input4">DAFTAR</button>
                          
                        </div>
                        </div>
                      </div>

                      </center>
                    </div>
                  </form>
                  <!-- end: Register --> 
                  
                </div>
              </div>
            </div>
          </div>
          
          <!-- end: login and register panel --> 

        </div>
      </div>
      <!-- end: Checkout Options --> 
      
    </div>
  
  </div>
  <!-- end:row --> 
</div>
<!-- end: container-->

<div class="row clearfix f-space30"></div>

<!-- Rectangle Banners -->


<!-- end: Rectangle Banners -->
<div class="row clearfix f-space30"></div>

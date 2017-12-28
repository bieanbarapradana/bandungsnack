<div class="row clearfix f-space10"></div>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="page-title">
        <center><h2 style="font-size: 25px;font-weight: 900;text-transform:capitalize;">ID0<?=$this->session->userdata('id_customers')?> - <?=$this->session->userdata('first_name_customer')?>&nbsp;<?=$this->session->userdata('last_name_customer')?>  </h2></center>
      </div>
    </div>
  </div>
</div>
<div class="row clearfix f-space10"></div>
<div class="container">
  <div class="row">
    <div class="col-md-12">

  <div class="about-company-container">
        <!-- Modal -->

        <div class="row">
        <?php
            if ($data_account->profile==null) 
            {
              ?>
               <div type="button" data-toggle="modal" data-target="#myModal" class="col-lg-6 col-md-5 col-sm-12 about-image"><img src="<?=base_url('assets/profile/admin/profile_picture_handsome_men_avatar-512.png')?>" alt="about company"></div>
        
              <?php
            }
            else
            {
              ?>
               <div type="button" data-toggle="modal" data-target="#myModal" class="col-lg-6 col-md-5 col-sm-12 about-image"><img src="<?=base_url('assets/profile/cust/'.$data_account->profile)?>" alt="about company"></div>
        
              <?php
            }
        ?>
         
          <div class="col-lg-6 col-md-7 col-sm-12 about-company" >
          <br>
            <center ><h2>INFORMATION</h2></center>
            <br/>
            <br/>
            <div class="col-lg-12">
              
              <table class="table " style="border:3px solid #2b8cbe;">
                  <thead  style="border:3px solid #2b8cbe;">
                    <tr style="border:3px solid #2b8cbe;">
                      <th style="border:3px solid #2b8cbe;background:#2b8cbe;;font-style:bold;color:#fff;"><h6>INFO</h6></th>
                      <th  style="border:3px solid #2b8cbe;background:#2b8cbe;color:#fff;"><h6>DETAIL</h6></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr style="background:#009bdd">
                      <td style="border:3px solid #009bdd;color:#fff;"><h6>Id Account</h6></td>
                      <td style="border:3px solid #009bdd;color:#fff;"><h6><?=$data_account->id_customers?></h6></td>
                    </tr>
                    <tr style="background:#009bdd">
                      <td style="border:3px solid  #009bdd;color:#fff;"><h6>Nama Depan</h6></td>
                      <td style="border:3px solid #009bdd;color:#fff;"><h6><?=$data_account->first_name?></h6></td>
                    </tr>
                    <tr style="background:#009bdd">
                      <td style="border:3px solid #009bdd;color:#fff;"><h6>Nama Belakang</h6></td>
                      <td style="border:3px solid #009bdd;color:#fff;"><h6><?=$data_account->last_name?></h6></td>
                    </tr>
                    <tr style="background:#009bdd">
                      <td style="border:3px solid #009bdd;color:#fff;"><h6>Username</h6></td>
                      <td style="border:3px solid #009bdd;color:#fff;"><h6><?=$data_account->username?></h6></td>
                    </tr>
                    <tr style="background:#009bdd">
                      <td style="border:3px solid #009bdd;color:#fff;"><h6>Email</h6></td>
                      <td style="border:3px solid #009bdd;color:#fff;"><h6><?=$data_account->email?></h6></td>
                    </tr>
                    <tr style="background:#009bdd">
                      <td style="border:3px solid #009bdd;color:#fff;"><h6>No Telp</h6></td>
                      <td style="border:3px solid #009bdd;color:#fff;"><h6><?=$data_account->contact?></h6></td>
                    </tr>
                    <tr  style="background:#009bdd">
                      <td style="border:3px solid #009bdd;color:#fff;"><h6>Alamat</h6></td>
                      <td style="border:3px solid #009bdd;color:#fff;"><h6><?=$data_account->address?></h6></td>
                    </tr>
                  </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row clearfix f-space30"></div>
<!-- shop features -->
<div class="container">
  <div class="row">
   
     <div class="col-md-3">
      <div class=" feature-box"  style="background:#2b8cbe">
        <center><div class="feature-title"><h4 style="color:#fff;" >Ubah Password</h4><br><br><a  type="button" data-toggle="modal" data-target="#change_password"   style="color:#fff;"><i class="fa fa-key circle-icon"  style="background:#fff;"></i></a><br>
          
        </div><br/></center>
        <center><p style="font-style:justify;color:#fff;"> Silahkan Melakukan Perubahan <strong>Password</strong>.</p></center>
        <center><a class="btn btn-danger" href="<?=base_url('user_guide')?>"><strong>Baca Doc </strong></a></center>
      </div>
    </div>
    <!-- end: feature box --> 
    <!-- feature box -->

     <div class="col-md-3">
      <div class=" feature-box"  style="background:#2b8cbe">
        <center><div class="feature-title"><h4 style="color:#fff;">Ubah Email</h4><br><br><a  type="button" data-toggle="modal" data-target="#change_email"   style="color:#fff;"><i class="fa fa-envelope circle-icon"  style="background:#fff;"></i></a><br>
          
        </div><br/></center>
        <center><p style="font-style:justify;color:#fff;"> Silahkan Melakukan Perubahan <strong>Email</strong>.</p></center>
        <center><a class="btn btn-danger" href="<?=base_url('user_guide')?>"><strong>Baca Doc </strong></a></center>
      </div>
    </div>
    <!-- end: feature box --> 
    <!-- feature box -->
    
    <div class="col-md-3">
      <div class=" feature-box"  style="background:#2b8cbe">
        <center><div class="feature-title"><h4 style="color:#fff;">Ubah Data </h4><br><br><a  type="button" data-toggle="modal" data-target="#edit_data"   style="color:#fff;"><i class="fa fa-edit circle-icon"  style="background:#fff;"></i></a><br>
          
        </div><br/></center>
        <center><p style="font-style:justify;color:#fff;"> Silahkan Melakukan Perubahan <strong>Data</strong>. </p></center>
        <center><a class="btn btn-danger" href="<?=base_url('user_guide')?>"><strong>Baca Doc </strong></a></center>
      </div>
    </div>
    <!-- end: feature box --> 
    <!-- feature box -->
      <div class="col-md-3">
      <div class=" feature-box"  style="background:#2b8cbe">
        <center><div class="feature-title"><h4 style="color:#fff;">Pemberitahuan</h4><br><br><a   type="button" data-toggle="modal" data-target="#pemberitahuan" style="color:#fff;"><i class="fa fa-globe circle-icon"  style="background:#fff;"></i></a><br>
          
        </div><br/></center>
        <center><p style="font-style:justify;color:#fff;"> Silahkan Melakukan Setting <strong>Pemberitahuan</strong>. </p></center>
        <center><a class="btn btn-danger" href="<?=base_url('user_guide')?>"><strong>Baca Doc </strong></a></center>
      </div>
    </div>

  </div>
</div>
<!-- end: shop features -->

<!-- end: big unit -->
<div class="row clearfix f-space30"></div>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <center><h4 class="modal-title">Ubah Profile</h4></center>
      </div>
      <form  enctype="multipart/form-data" action="<?=base_url('Account/change_pic_profile')?>" method="POST">

      <div class="modal-body">
        <center> <div class="box">
          <input type="file"   name="photo" id="file-1" class="inputfile inputfile-1 btn btn-primary" style="background:#ccc;display:none;" />
          <label for="file-1" ><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choose a file&hellip;</span></label>
          
        </div></center>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-default"/>
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
      </form>
      </div>
    </div>

  </div>
</div>

<div id="change_password" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <center><h4 class="modal-title"> <i class="fa fa-key"></i> Ubah Password</h4></center>
      </div>
      <form action="<?=base_url('Account/change_password')?>" id="validasi-reset_password" method="POST">

      <div class="modal-body">
        <center> 
        <div class="box">
           <div style="color: red;text-align:left;font-family:arial;font-size:10pt;" id="invalid-old_password" class="error_msg"></div>
                        <input type="password" name="old_password" id="old_password" placeholder="Password Lama" class="input4" required="">
                         <div style="color: red;text-align:left;font-family:arial;font-size:10pt;" id="invalid-password" class="error_msg"></div>
                        <input type="password" name="password" id="password" placeholder="Password Baru" class="input4" required="">

                         <div style="color: red;text-align:left;font-family:arial;font-size:10pt;" id="invalid-re_password" class="error_msg"></div>

                        <input type="password" name="re_password" id="re_password" placeholder="Ulangi Password Baru" class="input4" required="">
                        </div>
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
<div id="change_email" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <center><h4 class="modal-title"> <i class="fa fa-key"></i> Ubah Email</h4></center>
      </div>
      <form action="<?=base_url('Account/change_email')?>" id="validasi-change_email" method="POST">

      <div class="modal-body">
        <center> 
        <div class="box">
           <div style="color: red;text-align:left;font-family:arial;font-size:10pt;" id="invalid-email" class="error_msg"></div>
                        <input type="text" name="email" id="email" placeholder="Email" class="input4" required="">
                         <div style="color: red;text-align:left;font-family:arial;font-size:10pt;" id="invalid-password" class="error_msg"></div>
                      
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
<div id="edit_data" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <center><h4 class="modal-title"> <i class="fa fa-key"></i> Ubah Data </h4></center>
      </div>
      <form action="<?=base_url('Account/update_data')?>" id="validasi-change_data" method="POST">

      <div class="modal-body">
        <center> 
        <div class="box">
           <div style="color: red;text-align:left;font-family:arial;font-size:10pt;" id="invalid-first_name" class="error_msg"></div>
                        <input type="text" name="first_name" id="first_name" placeholder="Nama depan" class="input4" required="" value="<?=$data_account->first_name?>">
                        
                        <div style="color: red;text-align:left;font-family:arial;font-size:10pt;" id="invalid-last_name" class="error_msg"></div>
                        <input type="text" name="last_name" id="last_name" placeholder="Email" class="input4" required="" value="<?=$data_account->last_name?>">
                        
                        <div style="color: red;text-align:left;font-family:arial;font-size:10pt;" id="invalid-email" class="error_msg"></div>
                        <input type="text" name="contact" id="contact" placeholder="Email" class="input4" required="" value="<?=$data_account->contact?>">

                        <div style="color: red;text-align:left;font-family:arial;font-size:10pt;" id="invalid-email" class="error_msg"></div>
                         <textarea type="text" rows="10" name="address" id="address" placeholder="Alamat" class="input4" required=""><?=$data_account->address?></textarea>
                       
                        
                      
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
<div id="pemberitahuan" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <center><h4 class="modal-title"> <i class="fa fa-key"></i> Setting Pemberitahuan </h4></center>
      </div>
      <form action="<?=base_url('Account/pemberitahuan_update')?>" id="validasi-change_data" method="POST">

      <div class="modal-body">
        <div class="box">
       <table>
        <tr>
          <th class="col-lg-1">No </th>
          <th class="col-lg-8">Info </th>
          <th class="col-lg-1">Yes </th>
          <th class="col-lg-1">No </th>
        </tr>
         <tr>
          <th class="col-lg-1">1</th>

           <th class="col-lg-8"> <h5 class="modal-title">  Pemberitahuan Product Baru</h5></th>

           <?php
            if ($pemberitahuan->new_product==0) {
             
              ?>
           <th  class="col-lg-1">
           <input type="radio" name="new_product" id="new_product" value="0" checked>
              </th>
              <th  class="col-lg-1">
           <input type="radio" name="new_product" id="new_product"  value="1">
           </th>
              <?php
            }
            else
            {
              ?>
        <th  class="col-lg-1">
           <input type="radio" name="new_product" id="new_product" value="0" >
              </th>
              <th  class="col-lg-1">
           <input type="radio" name="new_product" id="new_product"  value="1" checked>
           </th>
              <?php
            }
           ?>
           
        
         </tr>
         <tr>
          <th class="col-lg-1">2</th>

           <th class="col-lg-8"> <h5 class="modal-title">  Pemberitahuan Promo Product</h5></th>
           <?php
            if ($pemberitahuan->promo==0) {
             
              ?>
           <th  class="col-lg-1">
           <input type="radio" name="promo" id="promo" value="0" checked>
              </th>
              <th  class="col-lg-1">
           <input type="radio" name="promo" id="promo"  value="1">
           </th>
              <?php
            }
            else
            {
              ?>
        <th  class="col-lg-1">
           <input type="radio" name="promo" id="promo" value="0" >
              </th>
              <th  class="col-lg-1">
           <input type="radio" name="promo" id="promo"  value="1" checked>
           </th>
              <?php
            }
           ?>

        
         </tr>
         <tr>
          <th class="col-lg-1">3</th>

           <th class="col-lg-8"> <h5 class="modal-title">  Pemberitahuan Discount Product</h5></th>
            <?php
            if ($pemberitahuan->discount==0) {
             
              ?>
           <th  class="col-lg-1">
           <input type="radio" name="discount" id="discount" value="0" checked>
              </th>
              <th  class="col-lg-1">
           <input type="radio" name="discount" id="discount"  value="1">
           </th>
              <?php
            }
            else
            {
              ?>
        <th  class="col-lg-1">
           <input type="radio" name="discount" id="discount" value="0" >
              </th>
              <th  class="col-lg-1">
           <input type="radio" name="discount" id="discount"  value="1" checked>
           </th>
              <?php
            }
           ?>
        
         </tr>
        
       </table>
       
       
                        </div>
                       
                        
                      
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-default" value="Simpan">
      </form>
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
      </div>
    </div>

  </div>
</div>



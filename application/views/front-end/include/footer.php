
<script type="text/javascript" >
    (function(){
        $(document).on('click','.addlabtype',function(){
            var id= $(this).val(),
                dataString = "id=" + id;

                $.ajax({
                    type:"POST",
                    url: "<?=base_url('Shoppingcart/add')?>",
                    data:dataString,
                    success:function(data){
      
                                     function generate(type, text) {



                var n = noty({

                    text        : text,

                    type        : type,

                    dismissQueue: true,

                    layout      : 'topRight',

                    closeWith   : ['click','timeout'],

                    theme       : 'defaultTheme',

                    maxVisible  : 10,

                     timeout     :10000,

                    animation   : {

                        open  : 'animated bounceInRight',

                        close : 'animated bounceOutRight',

                        easing: 'swing',

                        speed : 500

                    }

                });





                console.log('html: ' + n.options.id);

            }



            function generateAll() {

               var isi = '<div class="activity-item"><div class="activity"> <span>Berhasil Ditambahkan Kekeranjang</span> </div> </div>';

                generate('information',isi);

            }



            $(document).ready(function () {



                setTimeout(function() {

                    generateAll();

                }, 500);



            });
                    }
                })
        });
    })()
</script>
<script type="text/javascript" >
    (function(){
        $(document).on('click','.stock_abis',function(){
            var id= $(this).val(),
                dataString = "id=" + id;

                $.ajax({
                    type:"POST",
                    url: "<?=base_url('Shoppingcart/adda')?>",
                    data:dataString,
                    success:function(data){
      
              function generate(type, text) {



                var n = noty({

                    text        : text,

                    type        : type,

                    dismissQueue: true,

                    layout      : 'topRight',

                    closeWith   : ['click','timeout'],

                    theme       : 'defaultTheme',

                    maxVisible  : 10,

                     timeout     :10000,

                    animation   : {

                        open  : 'animated bounceInRight',

                        close : 'animated bounceOutRight',

                        easing: 'swing',

                        speed : 500

                    }

                });





                console.log('html: ' + n.options.id);

            }



            function generateAll() {

               var isi = '<div class="activity-item"><div class="activity"> <span>Maaf stock barang habis</span> </div> </div>';

                generate('error',isi);

            }



            $(document).ready(function () {



                setTimeout(function() {

                    generateAll();

                }, 500);



            });
                    }
                })
        });
    })()
</script>
<script type="text/javascript" >
    (function(){
        $(document).on('click','.delete_data',function(){
            var id= $(this).val(),
                dataString = "id=" + id;

                $.ajax({
                    type:"POST",
                    url: "<?=base_url('Shoppingcart/delete')?>",
                    data:dataString,
                    success:function(data){
      
              function generate(type, text) {



                var n = noty({

                    text        : text,

                    type        : type,

                    dismissQueue: true,

                    layout      : 'topRight',

                    closeWith   : ['click','timeout'],

                    theme       : 'defaultTheme',

                    maxVisible  : 10,

                     timeout     :10000,

                    animation   : {

                        open  : 'animated bounceInRight',

                        close : 'animated bounceOutRight',

                        easing: 'swing',

                        speed : 500

                    }

                });





                console.log('html: ' + n.options.id);

            }



            function generateAll() {

               var isi = '<div class="activity-item"><div class="activity"> <span>Berhasil delete daftar jajanan</span> </div> </div>';

                generate('success',isi);

            }



            $(document).ready(function () {



                setTimeout(function() {

                    generateAll();

                }, 500);



            });
                    }
                })
        });
    })()
</script>
<footer class="footer">



  <div class="container">



    <div class="row">



      <div class="col-sm-5 col-xs-12 shopinfo">



        <h4 class="title">Bandung Snack</h4>



        <p> Bandungsnack merupakan salah satu online marketplace terkemuka di Indonesia khususnya di bandung. Seperti halnya situs layanan jual-beli menyediakan sarana jual-beli dari konsumen ke konsumen. Siapa pun dapat menjual snack dan melayani pembeli dari seluruh Indonesia untuk transaksi satuan maupun banyak.</p>



        <p> "Inget Ngemil Inget Bandung Snack". </p>



      </div>



      <div class="col-sm-2 col-xs-12 footermenu">



        <h4 class="title">Information</h4>



        <ul>



          <li class="item"> <a href="#a">Info Pengiriman</a></li>



          <li class="item"> <a href="#a">FAQs</a></li>



          <li class="item"> <a href="#a">Cara Pembayaran</a></li>



          


        </ul>



      </div>



      


      <div class="col-sm-5 col-xs-12 getintouch">



        <h4 class="title">get in touch</h4>



        <ul>



          <li>



            <div class="icon"><i class="fa fa-map-marker fa-fw"></i></div>



            <div class="c-info"> <span>Jalan Telekomunikasi No. 1 Terusan Buah Batu, Dayeuhkolot Bandung<br>



              <a href="#a">Find us on map</a></span></div>



          </li>



          <li>



            <div class="icon"><i class="fa fa-envelope-o fa-fw"></i></div>



            <div class="c-info"> <span>Email Us At:<br>



              <a href="#a">cs@bandungsnack.com</a></span></div>



          </li>



          <li>



            <div class="icon"><i class="fa fa-phone fa-fw"></i></div>



            <div class="c-info"> <span>24/7 Phone Support:<br>



              <a href="#a">+62 822-2537-3657</a></span></div>



          </li>



          



        </ul>



        <div class="social-icons">



          <ul>



            


            <li class="icon linkedin"><a href="#a"><i class="fa fa-instagram fa-fw"></i></a></li>



            <li class="icon twitter"><a href="https://twitter.com/bdgsnack"><i class="fa fa-twitter fa-fw"></i></a></li>



            <li class="icon facebook"><a href="https://www.facebook.com/bdgsnack"><i class="fa fa-facebook fa-fw"></i></a></li>

            
	

          </ul>



        </div>



      </div>



    </div>



  </div>



  <div class="copyrights">



    <div class="container">



      <div class="row">



        <div class="col-lg-8 col-sm-8 col-xs-12"> <span class="copytxt">&copy; Copyright 2016 by <a href="#a">Mitrakomitel</a> -  All rights reserved</span> </div>



        <div class="col-lg-4 col-sm-4 col-xs-12 payment-icons"> <a href="#a"> <img src="<?=base_url('assets/front-end/images/icons/icon-bank-mandiri.png');?>" alt="Mandiri"> </a> <a href="#a"> <img src="<?=base_url('assets/front-end/images/icons/icon-bank-bri.png');?>" alt="BRI"> </a> <a href="#a"> <img src="<?=base_url('assets/front-end/images/icons/icon-bank-bni.png');?>" alt="BNI"> </a> </div>



      </div>



    </div>



  </div>



</footer>





<!-- end: footer --> 



 <?php



          if(isset($add_js)):



            foreach($add_js as $js):



        ?>



        <script src="<?=$js?>"></script>



        <?php



            endforeach;



          endif;



        ?>




<!-- 

<script type="text/javascript">
  $(document).ready(function(){
                 
      function search(){

         var id=$("#search").val();

          if(id!=""){
              $("#result").html("<img src='img/ajax-loader.gif'/>");
                $.ajax({
                    type:"POST",
                    url:"<?=base_url('Form_lacak/get_data_order')?>",
                    //url:"search.php",
                    data:"id="+id,
                    success:function(data){
                      $("#result").html(data);
                      $("#search").val("");
                    }
                });
          }                                    
      }

      $("#button").click(function(){
          search();
      });

      $('#search').keyup(function(e) {
          if(e.keyCode == 13) {
             search();
          }
      });
  });
</script> -->





        <?php







           if (isset($additional)) {



                        foreach ($additional as $value) {



                            echo $value;



                        }



                    }



          ?>





<!-- Style Switcher JS --> 

    <script src="<?=base_url('assets/notif/js/notif_cust.js');?>"></script> 



 <?php



   if (isset($validasi)) {

                foreach ($validasi as $value) {

                    echo $value;

                }

            }

  ?>
<?php



   if (isset($kondisi)) {

                foreach ($kondisi as $value) {

                    echo $value;

                }

            }

  ?>



<script>







(function($) {



  "use strict";



 $('#menuMega').menu3d();



                $('#iview').iView({



                    pauseTime: 10000,



                    pauseOnHover: true,



                    directionNavHoverOpacity: 0.6,



                    timer: "360Bar",



                    timerBg: '#2da5da',



                    timerColor: '#fff',



                    timerOpacity: 0.9,



                    timerDiameter: 20,



                    timerPadding: 1,



					touchNav: true,



                    timerStroke: 2,



                    timerBarStrokeColor: '#fff'



                });



				



                $('.quickbox').carousel({



                    interval: 10000



                });



               $('#monthly-deals').carousel({



                    interval: 3000



                });



                $('#productc2').carousel({



                    interval: 4000



                });



                $('#tweets').carousel({



                    interval: 5000



                });



})(jQuery);











          



        </script>



         <?php



        /// awal pengecekan notifikasi yang akan di munculkan 



        if($this->session->flashdata() != null)



        {



            /// awal notifikasi aktivasi pegawai sukses



            if ($this->session->flashdata('used_email') =='used_email') 



            {



                if (isset($used_email)) 



                {



                    foreach ($used_email as $value) 



                    {



                        echo "<script type='text/javascript' src='".$value."'></script>";



                    }



                }



            }



            elseif($this->session->flashdata('invalid_login') =='invalid_login') 



            {



                if (isset($invalid_login)) 



                {



                    foreach ($invalid_login as $value) 



                    {



                        echo "<script type='text/javascript' src='".$value."'></script>";



                    }



                }



            }



            elseif($this->session->flashdata('pemberitahuan_harus_login') =='pemberitahuan_harus_login') 



            {



                if (isset($pemberitahuan_harus_login)) 



                {



                    foreach ($pemberitahuan_harus_login as $value) 



                    {



                        echo "<script type='text/javascript' src='".$value."'></script>";



                    }



                }



            }



            elseif($this->session->flashdata('sukses_ditambah') =='sukses_ditambah') 



            {



                if (isset($sukses_ditambah)) 



                {



                    foreach ($sukses_ditambah as $value) 



                    {



                        echo "<script type='text/javascript' src='".$value."'></script>";



                    }



                }



            }



            elseif($this->session->flashdata('gagal_ditambah') =='gagal_ditambah') 



            {



                if (isset($gagal_ditambah)) 



                {



                    foreach ($gagal_ditambah as $value) 



                    {



                        echo "<script type='text/javascript' src='".$value."'></script>";



                    }



                }



            }



            elseif($this->session->flashdata('stock_abis') =='stock_abis') 



            {



                if (isset($stock_abis)) 



                {



                    foreach ($stock_abis as $value) 



                    {



                        echo "<script type='text/javascript' src='".$value."'></script>";



                    }



                }



            }



            elseif($this->session->flashdata('invalid_image') =='invalid_image') 



            {



                if (isset($invalid_image)) 



                {



                    foreach ($invalid_image as $value) 



                    {



                        echo "<script type='text/javascript' src='".$value."'></script>";



                    }



                }



            }

            elseif($this->session->flashdata('sukses_update_foto_profile') =='sukses_update_foto_profile') 



            {



                if (isset($sukses_update_foto_profile)) 



                {



                    foreach ($sukses_update_foto_profile as $value) 



                    {



                        echo "<script type='text/javascript' src='".$value."'></script>";



                    }



                }



            }



            elseif($this->session->flashdata('gagal_update_foto_profile') =='gagal_update_foto_profile') 



            {



                if (isset($gagal_update_foto_profile)) 



                {



                    foreach ($gagal_update_foto_profile as $value) 



                    {



                        echo "<script type='text/javascript' src='".$value."'></script>";



                    }



                }



            }



            elseif($this->session->flashdata('password_lama_tidak_sama') =='password_lama_tidak_sama') 



            {



                if (isset($password_lama_tidak_sama)) 



                {



                    foreach ($password_lama_tidak_sama as $value) 



                    {



                        echo "<script type='text/javascript' src='".$value."'></script>";



                    }



                }



            }



            elseif($this->session->flashdata('update_password_sukses') =='update_password_sukses') 



            {



                if (isset($update_password_sukses)) 



                {



                    foreach ($update_password_sukses as $value) 



                    {



                        echo "<script type='text/javascript' src='".$value."'></script>";



                    }



                }



            }



            elseif($this->session->flashdata('update_password_gagal') =='update_password_gagal') 



            {



                if (isset($update_password_gagal)) 



                {



                    foreach ($update_password_gagal as $value) 



                    {



                        echo "<script type='text/javascript' src='".$value."'></script>";



                    }



                }



            }



            elseif($this->session->flashdata('sukses_change_email') =='sukses_change_email') 



            {



                if (isset($sukses_change_email)) 



                {



                    foreach ($sukses_change_email as $value) 



                    {



                        echo "<script type='text/javascript' src='".$value."'></script>";



                    }



                }



            }





            elseif($this->session->flashdata('gagal_change_email') =='gagal_change_email') 



            {



                if (isset($gagal_change_email)) 



                {



                    foreach ($gagal_change_email as $value) 



                    {



                        echo "<script type='text/javascript' src='".$value."'></script>";



                    }



                }



            }

            



            elseif($this->session->flashdata('tidak_ada_perubahan_email') =='tidak_ada_perubahan_email') 



            {



                if (isset($tidak_ada_perubahan_email)) 



                {



                    foreach ($tidak_ada_perubahan_email as $value) 



                    {



                        echo "<script type='text/javascript' src='".$value."'></script>";



                    }



                }



            }



            elseif($this->session->flashdata('update_data_customer_sukses') =='update_data_customer_sukses') 



            {



                if (isset($update_data_customer_sukses)) 



                {



                    foreach ($update_data_customer_sukses as $value) 



                    {



                        echo "<script type='text/javascript' src='".$value."'></script>";



                    }



                }



            }

            

            elseif($this->session->flashdata('update_data_customer_gagal') =='update_data_customer_gagal') 



            {



                if (isset($update_data_customer_gagal)) 



                {



                    foreach ($update_data_customer_gagal as $value) 



                    {



                        echo "<script type='text/javascript' src='".$value."'></script>";



                    }



                }



            }



            elseif($this->session->flashdata('info_belum_login') =='info_belum_login') 



            {



                if (isset($info_belum_login)) 



                {



                    foreach ($info_belum_login as $value) 



                    {



                        echo "<script type='text/javascript' src='".$value."'></script>";



                    }



                }



            }



            elseif($this->session->flashdata('no_cart') =='no_cart') 



            {



                if (isset($no_cart)) 



                {



                    foreach ($no_cart as $value) 



                    {



                        echo "<script type='text/javascript' src='".$value."'></script>";



                    }



                }



            }



            elseif($this->session->flashdata('gagal_registrasi') =='gagal_registrasi') 



            {



                if (isset($gagal_registrasi)) 



                {



                    foreach ($gagal_registrasi as $value) 



                    {



                        echo "<script type='text/javascript' src='".$value."'></script>";



                    }



                }



            }



            elseif($this->session->flashdata('sukses_registrasi') =='sukses_registrasi') 



            {



                if (isset($sukses_registrasi)) 



                {



                    foreach ($sukses_registrasi as $value) 



                    {



                        echo "<script type='text/javascript' src='".$value."'></script>";



                    }



                }



            }



            elseif($this->session->flashdata('used_username') =='used_username') 



            {



                if (isset($used_username)) 



                {



                    foreach ($used_username as $value) 



                    {



                        echo "<script type='text/javascript' src='".$value."'></script>";



                    }



                }



            }



            elseif($this->session->flashdata('belum_aktivasi') =='belum_aktivasi') 



            {



                if (isset($belum_aktivasi)) 



                {



                    foreach ($belum_aktivasi as $value) 



                    {



                        echo "<script type='text/javascript' src='".$value."'></script>";



                    }



                }



            }



            elseif($this->session->flashdata('aktivasi_berhasil') =='aktivasi_berhasil') 



            {



                if (isset($aktivasi_berhasil)) 



                {



                    foreach ($aktivasi_berhasil as $value) 



                    {



                        echo "<script type='text/javascript' src='".$value."'></script>";



                    }



                }



            }



            elseif($this->session->flashdata('aktivasi_gagal') =='aktivasi_gagal') 



            {



                if (isset($aktivasi_gagal)) 



                {



                    foreach ($aktivasi_gagal as $value) 



                    {



                        echo "<script type='text/javascript' src='".$value."'></script>";



                    }



                }



            }

            



            elseif($this->session->flashdata('account_telah_teraktivasi') =='account_telah_teraktivasi') 



            {



                if (isset($account_telah_teraktivasi)) 



                {



                    foreach ($account_telah_teraktivasi as $value) 



                    {



                        echo "<script type='text/javascript' src='".$value."'></script>";



                    }



                }



            }



            elseif($this->session->flashdata('sukses_payment_conf') =='sukses_payment_conf') 



            {



                if (isset($sukses_payment_conf)) 



                {



                    foreach ($sukses_payment_conf as $value) 



                    {



                        echo "<script type='text/javascript' src='".$value."'></script>";



                    }



                }



            }



            elseif($this->session->flashdata('gagal_payment_conf') =='gagal_payment_conf') 



            {



                if (isset($gagal_payment_conf)) 



                {



                    foreach ($gagal_payment_conf as $value) 



                    {



                        echo "<script type='text/javascript' src='".$value."'></script>";



                    }



                }



            }



            elseif($this->session->flashdata('update_pemberitahuan_sukses') =='update_pemberitahuan_sukses') 



            {



                if (isset($update_pemberitahuan_sukses)) 



                {



                    foreach ($update_pemberitahuan_sukses as $value) 



                    {



                        echo "<script type='text/javascript' src='".$value."'></script>";



                    }



                }



            }



            elseif($this->session->flashdata('update_pemberitahuan_gagal') =='update_pemberitahuan_gagal') 



            {



                if (isset($update_pemberitahuan_gagal)) 



                {



                    foreach ($update_pemberitahuan_gagal as $value) 



                    {



                        echo "<script type='text/javascript' src='".$value."'></script>";



                    }



                }



            }





        }



        ?>



</body>



</html>
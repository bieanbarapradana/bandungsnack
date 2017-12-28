        <script src="<?=base_url('assets/back-end/js/jquery.min.js')?>"></script>

        <script>!window.jQuery && document.write(decodeURI('%3Cscript src="js/vendor/jquery-1.11.1.min.js"%3E%3C/script%3E'));</script>

        <?php

          if(isset($add_js)):

            foreach($add_js as $js):

        ?>

        <script src="<?=$js?>"></script>

        <?php

            endforeach;

          endif;

        ?>

           <?php

        /// awal pengecekan notifikasi yang akan di munculkan 

        if($this->session->flashdata() != null)

        {

            /// awal notifikasi aktivasi pegawai sukses

            if ($this->session->flashdata('no_akses') =='no_akses') 

            {

                if (isset($no_akses)) 

                {

                    foreach ($no_akses as $value) 

                    {

                        echo "<script type='text/javascript' src='".$value."'></script>";

                    }

                }

            }

            elseif($this->session->flashdata('lock_account') =='lock_account') 

            {

                if (isset($lock_account)) 

                {

                    foreach ($lock_account as $value) 

                    {

                        echo "<script type='text/javascript' src='".$value."'></script>";

                    }

                }

            }

            elseif($this->session->flashdata('gagal_login') =='gagal_login') 

            {

                if (isset($gagal_login)) 

                {

                    foreach ($gagal_login as $value) 

                    {

                        echo "<script type='text/javascript' src='".$value."'></script>";

                    }

                }

            }

            

        }

        ?>

        <script>$(function(){ Login.init(); });</script>

    </body>

</html>
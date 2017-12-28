<!-- Footer -->

                <footer class="clearfix">

                    <div class="pull-right">

                        Created <i class="gi gi-shopping_cart text-danger"></i> by <a href="<?=base_url()?>" target="_blank">mitrakomitel</a>

                    </div>

                    <div class="pull-left">

                        <span id="year-copy"></span> &copy; <a href="<?=base_url()?>" target="_blank">Bandungsnack.com</a>

                    </div>

                </footer>

                <!-- END Footer -->

            </div>

            <!-- END Main Container -->

        </div>

        <!-- END Page Container -->



        <!-- Scroll to top link, initialized in js/app.js - scrollToTop() -->

        <a href="#" id="to-top"><i class="fa fa-angle-double-up"></i></a>



        <!-- User Settings, modal which opens from Settings link (found in top right user menu) and the Cog link (found in sidebar user info) -->

        <div id="modal-user-settings" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">

            <div class="modal-dialog">

                <div class="modal-content">

                    <!-- Modal Header -->

                    <div class="modal-header text-center">

                        <h2 class="modal-title"><i class="fa fa-pencil"></i> Settings</h2>

                    </div>

                    <!-- END Modal Header -->



                    <!-- Modal Body -->

                    <div class="modal-body">

                        <form action="<?=base_url('auth/update/'.$this->session->userdata('id_users'))?>" method="POST" enctype="multipart/form-data" class="form-horizontal form-bordered" onsubmit="return false;">

                            <fieldset>

                                <legend>Vital Info</legend>

                                <div class="form-group">

                                    <label class="col-md-4 control-label">Username</label>

                                    <div class="col-md-8">

                                        <p class="form-control-static"><?=$this->session->userdata('username')?></p>

                                    </div>

                                </div>

                                <div class="form-group">

                                    <label class="col-md-4 control-label" for="user-settings-email">Email</label>

                                    <div class="col-md-8">

                                        <input type="email" id="user-settings-email" name="user-settings-email" class="form-control" value="<?=$this->session->userdata('email')?>">

                                    </div>

                                </div>

                                <div class="form-group">

                                    <label class="col-md-4 control-label" for="user-settings-notifications">Email Notifications</label>

                                    <div class="col-md-8">

                                        <label class="switch switch-primary">

                                            <input type="checkbox" id="user-settings-notifications" name="user-settings-notifications" value="1" checked>

                                            <span></span>

                                        </label>

                                    </div>

                                </div>

                            </fieldset>

                            <fieldset>

                                <legend>Password Update</legend>

                                <div class="form-group">

                                    <label class="col-md-4 control-label" for="user-settings-password">New Password</label>

                                    <div class="col-md-8">

                                        <input type="password" id="user-settings-password" name="user-settings-password" class="form-control" placeholder="Please choose a complex one..">

                                    </div>

                                </div>

                                <div class="form-group">

                                    <label class="col-md-4 control-label" for="user-settings-repassword">Confirm New Password</label>

                                    <div class="col-md-8">

                                        <input type="password" id="user-settings-repassword" name="user-settings-repassword" class="form-control" placeholder="..and confirm it!">

                                    </div>

                                </div>

                            </fieldset>

                            <div class="form-group form-actions">

                                <div class="col-xs-12 text-right">

                                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>

                                    <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>

                                </div>

                            </div>

                        </form>

                    </div>

                    <!-- END Modal Body -->

                </div>

            </div>

        </div>

        <!-- END User Settings -->



        <!-- Remember to include excanvas for IE8 chart support -->

        <!--[if IE 8]><script src="js/helpers/excanvas.min.js"></script><![endif]-->



        <!-- Include Jquery library from Google's CDN but if something goes wrong get Jquery from local file (Remove 'http:' if you have SSL) -->

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

       


        <script src="http://maps.google.com/maps/api/js?sensor=true"></script>

      



        <!-- ckeditor.js, load it only in the page you would like to use CKEditor (it's a heavy plugin to include it with the others!) -->

        <?php

          if(isset($add_js)):

            foreach($add_js as $js):

        ?>

        <script src="<?=$js?>"></script>

        <?php

            endforeach;

          endif;

        ?>


    <script src="<?=base_url('assets/notif/js/notif.js');?>"></script> 
        


        <?php



           if (isset($additional)) {

                        foreach ($additional as $value) {

                            echo $value;

                        }

                    }

          ?>

          

        <?php



   if (isset($data)) {

                foreach ($data as $value) {

                    echo $value;

                }

            }

  ?>

    <?php

        /// awal pengecekan notifikasi yang akan di munculkan 

        if($this->session->flashdata() != null)

        {

            /// awal notifikasi aktivasi pegawai sukses

            if ($this->session->flashdata('sukses_add_seller') =='sukses_add_seller') 

            {

                if (isset($sukses_add_seller)) 

                {

                    foreach ($sukses_add_seller as $value) 

                    {

                        echo "<script type='text/javascript' src='".$value."'></script>";

                    }

                }

            }

            elseif($this->session->flashdata('sukses_update_seller') =='sukses_update_seller') 

            {

                if (isset($sukses_update_seller)) 

                {

                    foreach ($sukses_update_seller as $value) 

                    {

                        echo "<script type='text/javascript' src='".$value."'></script>";

                    }

                }

            }

            elseif($this->session->flashdata('sukses_delete_seller') =='sukses_delete_seller') 

            {

                if (isset($sukses_delete_seller)) 

                {

                    foreach ($sukses_delete_seller as $value) 

                    {

                        echo "<script type='text/javascript' src='".$value."'></script>";

                    }

                }

            }

            elseif($this->session->flashdata('sukses_add_categories') =='sukses_add_categories') 

            {

                if (isset($sukses_add_categories)) 

                {

                    foreach ($sukses_add_categories as $value) 

                    {

                        echo "<script type='text/javascript' src='".$value."'></script>";

                    }

                }

            }

            elseif($this->session->flashdata('gagal_add_categories') =='gagal_add_categories') 

            {

                if (isset($gagal_add_categories)) 

                {

                    foreach ($gagal_add_categories as $value) 

                    {

                        echo "<script type='text/javascript' src='".$value."'></script>";

                    }

                }

            }

            elseif($this->session->flashdata('sukses_update_categories') =='sukses_update_categories') 

            {

                if (isset($sukses_update_categories)) 

                {

                    foreach ($sukses_update_categories as $value) 

                    {

                        echo "<script type='text/javascript' src='".$value."'></script>";

                    }

                }

            }

            elseif($this->session->flashdata('gagal_update_categories') =='gagal_update_categories') 

            {

                if (isset($gagal_update_categories)) 

                {

                    foreach ($gagal_update_categories as $value) 

                    {

                        echo "<script type='text/javascript' src='".$value."'></script>";

                    }

                }

            }

            elseif($this->session->flashdata('sukses_delete_categories') =='sukses_delete_categories') 

            {

                if (isset($sukses_delete_categories)) 

                {

                    foreach ($sukses_delete_categories as $value) 

                    {

                        echo "<script type='text/javascript' src='".$value."'></script>";

                    }

                }

            }

            elseif($this->session->flashdata('gagal_delete_categories') =='gagal_delete_categories') 

            {

                if (isset($gagal_delete_categories)) 

                {

                    foreach ($gagal_delete_categories as $value) 

                    {

                        echo "<script type='text/javascript' src='".$value."'></script>";

                    }

                }

            }

            elseif($this->session->flashdata('sukses_add_users') =='sukses_add_users') 

            {

                if (isset($sukses_add_users)) 

                {

                    foreach ($sukses_add_users as $value) 

                    {

                        echo "<script type='text/javascript' src='".$value."'></script>";

                    }

                }

            }

            elseif($this->session->flashdata('gagal_add_users') =='gagal_add_users') 

            {

                if (isset($gagal_add_users)) 

                {

                    foreach ($gagal_add_users as $value) 

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

            elseif($this->session->flashdata('sukses_update_users') =='sukses_update_users') 

            {

                if (isset($sukses_update_users)) 

                {

                    foreach ($sukses_update_users as $value) 

                    {

                        echo "<script type='text/javascript' src='".$value."'></script>";

                    }

                }

            }

            elseif($this->session->flashdata('gagal_update_users') =='gagal_update_users') 

            {

                if (isset($gagal_update_users)) 

                {

                    foreach ($gagal_update_users as $value) 

                    {

                        echo "<script type='text/javascript' src='".$value."'></script>";

                    }

                }

            }

            elseif($this->session->flashdata('sukses_flag_user') =='sukses_flag_user') 

            {

                if (isset($sukses_flag_user)) 

                {

                    foreach ($sukses_flag_user as $value) 

                    {

                        echo "<script type='text/javascript' src='".$value."'></script>";

                    }

                }

            }

            elseif($this->session->flashdata('gagal_flag_user') =='gagal_flag_user') 

            {

                if (isset($gagal_flag_user)) 

                {

                    foreach ($gagal_flag_user as $value) 

                    {

                        echo "<script type='text/javascript' src='".$value."'></script>";

                    }

                }

            }

            elseif($this->session->flashdata('sukses_unflag_user') =='sukses_unflag_user') 

            {

                if (isset($sukses_unflag_user)) 

                {

                    foreach ($sukses_unflag_user as $value) 

                    {

                        echo "<script type='text/javascript' src='".$value."'></script>";

                    }

                }

            }

            elseif($this->session->flashdata('gagal_unflag_user') =='gagal_unflag_user') 

            {

                if (isset($gagal_unflag_user)) 

                {

                    foreach ($gagal_unflag_user as $value) 

                    {

                        echo "<script type='text/javascript' src='".$value."'></script>";

                    }

                }

            }

            elseif($this->session->flashdata('gagal_unflag_user') =='gagal_unflag_user') 

            {

                if (isset($gagal_unflag_user)) 

                {

                    foreach ($gagal_unflag_user as $value) 

                    {

                        echo "<script type='text/javascript' src='".$value."'></script>";

                    }

                }

            }

            elseif($this->session->flashdata('gagal_unflag_user') =='gagal_unflag_user') 

            {

                if (isset($gagal_unflag_user)) 

                {

                    foreach ($gagal_unflag_user as $value) 

                    {

                        echo "<script type='text/javascript' src='".$value."'></script>";

                    }

                }

            }

            elseif($this->session->flashdata('sukses_add_product') =='sukses_add_product') 

            {

                if (isset($sukses_add_product)) 

                {

                    foreach ($sukses_add_product as $value) 

                    {

                        echo "<script type='text/javascript' src='".$value."'></script>";

                    }

                }

            }

            elseif($this->session->flashdata('gagal_add_product') =='gagal_add_product') 

            {

                if (isset($gagal_add_product)) 

                {

                    foreach ($gagal_add_product as $value) 

                    {

                        echo "<script type='text/javascript' src='".$value."'></script>";

                    }

                }

            }

            elseif($this->session->flashdata('sukses_update_product') =='sukses_update_product') 

            {

                if (isset($sukses_update_product)) 

                {

                    foreach ($sukses_update_product as $value) 

                    {

                        echo "<script type='text/javascript' src='".$value."'></script>";

                    }

                }

            }

            elseif($this->session->flashdata('gagal_update_product') =='gagal_update_product') 

            {

                if (isset($gagal_update_product)) 

                {

                    foreach ($gagal_update_product as $value) 

                    {

                        echo "<script type='text/javascript' src='".$value."'></script>";

                    }

                }

            }

            elseif($this->session->flashdata('sukses_flag_product') =='sukses_flag_product') 

            {

                if (isset($sukses_flag_product)) 

                {

                    foreach ($sukses_flag_product as $value) 

                    {

                        echo "<script type='text/javascript' src='".$value."'></script>";

                    }

                }

            }

            elseif($this->session->flashdata('sukses_unflag_product') =='sukses_unflag_product') 

            {

                if (isset($sukses_unflag_product)) 

                {

                    foreach ($sukses_unflag_product as $value) 

                    {

                        echo "<script type='text/javascript' src='".$value."'></script>";

                    }

                }

            }

            elseif($this->session->flashdata('gagal_flag_product') =='gagal_flag_product') 

            {

                if (isset($gagal_flag_product)) 

                {

                    foreach ($gagal_flag_product as $value) 

                    {

                        echo "<script type='text/javascript' src='".$value."'></script>";

                    }

                }

            }

            elseif($this->session->flashdata('gagal_unflag_product') =='gagal_unflag_product') 

            {

                if (isset($gagal_unflag_product)) 

                {

                    foreach ($gagal_unflag_product as $value) 

                    {

                        echo "<script type='text/javascript' src='".$value."'></script>";

                    }

                }

            }

            

        }

        ?>

    </body>

</html>
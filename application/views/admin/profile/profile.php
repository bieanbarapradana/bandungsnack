  <div id="page-content">

                    <!-- User Profile Header -->

                    <!-- For an image header add the class 'content-header-media' and an image as in the following example -->

                    <div class="content-header content-header-media">

                        <div class="header-section">

                            <img width="80px" height="80px" src="<?=base_url('assets/profile/admin/'.$this->session->userdata('profile'));?>" alt="Avatar" class="pull-right img-circle">

                            <h1 style="text-transform: capitalize;"><?=$data_profile->first_name.' '.$data_profile->last_name?><br><small style="text-transform: lowercase;" ><?=$data_profile->username?> &amp; <?=$data_profile->email?></small></h1>

                        </div>

                        <!-- For best results use an image with a resolution of 2560x248 pixels (You can also use a blurred image with ratio 10:1 - eg: 1000x100 pixels - it will adjust and look great!) -->

                        <img src="<?=base_url('assets/back-end/img/placeholders/headers/profile_header.jpg');?>" alt="header image" class="animation-pulseSlow">

                    </div>

                    <!-- END User Profile Header -->



                    <!-- User Profile Content -->

                    <div class="row">

                       



                        <!-- Second Column -->

                        <div class="col-md-12 col-lg-12">

                            <!-- Info Block -->

                            <div class="block">

                                <!-- Info Title -->

                                <div class="block-title">

                                    <div class="block-options pull-right">

                                          <a href="<?=base_url('Profile/edit/'.$data_profile->id_users)?>" class="btn btn-sm btn-alt btn-default" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>

                                    </div>

                                    <h2>About <strong style="text-transform: capitalize;"><?=$data_profile->first_name.' '.$data_profile->last_name?>.</strong> <small>&bull; <i class="fa fa-file-text text-primary"></i> <a href="javascript:void(0)" data-toggle="tooltip" title="Download Bio in PDF">Bio</a></small></h2>

                                </div>

                                <!-- END Info Title -->



                                <!-- Info Content -->

                                <table class="table table-borderless table-striped">

                                    <tbody>

                                        <tr>

                                            <td style="width: 20%;"><strong>Full Name</strong></td>

                                            <td  style="text-transform: capitalize;"><i><?=$data_profile->first_name.' '.$data_profile->last_name?>.</i></td>

                                        </tr>

                                        <tr>

                                            <td><strong>User ID</strong></td>

                                            <td><i><?=$data_profile->id_users?></i></td>

                                        </tr>

                                        <tr>

                                            <td><strong>Username</strong></td>

                                            <td><i><?=$data_profile->username?></i></td>

                                        </tr>

                                        <tr>

                                            <td><strong>Password</strong></td>

                                            <td><a href=""><i class="label label-danger">Change Password <i class="fa fa-pencil"></i></i></a></td>

                                        </tr>

                                        <tr>

                                            <td><strong>Flag</strong></td>

                                            <td><i><?=$data_profile->flag?></i></td>

                                        </tr>

                                        <tr>

                                            <td><strong>Access ID</strong></td>

                                            <td><i><?=$data_profile->id_user_akses?></i></td>

                                        </tr>

                                        <tr>

                                            <td><strong>Access</strong></td>

                                            <td   style="text-transform: capitalize;"><i><?=$data_profile->label?></i></td>

                                        </tr>

                                        <tr>

                                            <td><strong>Access Description</strong></td>

                                            <td   style="text-transform: capitalize;"><i><?=$data_profile->description?></i></td>

                                        </tr>

                                       

                                    </tbody>

                                </table>

                                <!-- END Info Content -->

                            </div>

                            <!-- END Info Block -->



                           

                           

                            <!-- END Friends Block -->



                            <!-- Twitter Block -->

                            <div class="block full">

                                <!-- Twitter Title -->

                                <div class="block-title">

                                    <div class="block-options pull-right">

                                        <a href="javascript:void(0)" class="btn btn-sm btn-alt btn-default" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>

                                    </div>

                                    <h2><i>Log <strong>Activity</strong></i></h2>

                                </div>

                                <!-- END Twitter Title -->



                                <!-- Twitter Content -->

                               

                                <ul class="media-list">

                                    <li class="media">

                                        <a href="page_ready_user_profile.html" class="pull-left">

                                          1

                                        </a>

                                        <div class="media-body">

                                            <span class="text-muted pull-right"><small><em>30 min ago</em></small></span>

                                            <i><strong><?=$data_profile->first_name.' '.$data_profile->last_name?>.</strong></i>

                                            <p><i>Masuk kedalam aplikasi.</i> </p>

                                        </div>

                                    </li>

                                    

                                </ul>

                                <!-- END Twitter Content -->

                            </div>

                            <!-- END Twitter Block -->

                        </div>

                        <!-- END Second Column -->

                    </div>

                    <!-- END User Profile Content -->

                </div>

                <!-- Page content -->
                <div id="page-content">
                    <!-- Validation Header -->
                          <div class="content-header">
                        <div class="header-section">
                            <h1>
                                <i class="gi gi-user"></i><?=$label['sub_parent']?><br>
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                        <li><?=$label['home']?></li>
                        <li><a href="<?=base_url($label['link_parent'])?>"><?=$label['parent']?></a></li>
                        <li><a href="<?=base_url($label['link_sub_parent'])?>"><?=$label['sub_parent']?></a></li>
                    </ul>
                    <!-- END Validation Header -->

                    <div class="row">
                        <div class="col-md-12">
                            <!-- Form Validation Example Block -->
                            <div class="block">
                                <!-- Form Validation Example Title -->
                                <div class="block-title">
                                    <h2><strong><?=$label['sub_parent']?></strong></h2>
                                </div>
                                <!-- END Form Validation Example Title -->

                                <form id="form-validation" action="<?=base_url('Profile/proses_update/'.$data_users->id_users)?>" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                                      
                                    <fieldset>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="username">Username <span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <input type="text" id="username" name="username" class="form-control" placeholder="Username" value="<?=$data_users->username?>">
                                                    <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="email">Email <span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <input type="text" id="email" name="email" class="form-control" placeholder="Email" value="<?=$data_users->email?>">
                                                    <span class="input-group-addon"><i class="gi gi-envelope"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="first_name">First name <span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <input type="text"  id="first_name" name="first_name" class="form-control" placeholder="First name" value="<?=$data_users->first_name?>">
                                                    <span class="input-group-addon"><i class="gi gi-font"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="last_name">Last name <span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Last name" value="<?=$data_users->last_name?>">
                                                    <span class="input-group-addon"><i class="gi gi-font"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                       
                                       
                                    </fieldset>
                                    <div class="form-group form-actions">
                                        <div class="col-md-8 col-md-offset-3">
                                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Save</button>
                                            <a href="<?=base_url('Users')?>" class="btn btn-sm btn-warning"><i class="fa fa-times"></i> Back</a>
                                        </div>
                                    </div>
                                </form>
                                <!-- END Form Validation Example Content -->

                                <!-- Terms Modal -->
                               
                                <!-- END Terms Modal -->
                            </div>
                            <!-- END Validation Block -->
                        </div>
                      
                    </div>
                </div>
                <!-- END Page Content -->
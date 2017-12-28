
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

                                <!-- Form Validation Example Content -->
                                <form id="form-validation" action="<?=base_url('Users/proses_add')?>" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                                    <fieldset>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="username">Username <span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <input type="text" id="username" name="username" class="form-control" placeholder="Username">
                                                    <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="password">Password<span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                                                    <span class="input-group-addon"><i class="gi gi-lock"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="re_password">Re-password <span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <input type="text" id="re_password" name="re_password" class="form-control" placeholder="Re-password">
                                                    <span class="input-group-addon"><i class="gi gi-unlock"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="email">Email <span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <input type="text" id="email" name="email" class="form-control" placeholder="Email">
                                                    <span class="input-group-addon"><i class="gi gi-envelope"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="first_name">First name <span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <input type="text"  id="first_name" name="first_name" class="form-control" placeholder="First name">
                                                    <span class="input-group-addon"><i class="gi gi-font"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="last_name">Last name <span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Last name">
                                                    <span class="input-group-addon"><i class="gi gi-font"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="profile">Profile<span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <div class="input-group">

                                                    <input type="file"  id="profile"  name="profile" class="form-control" placeholder="Category Name">
                                                    <span class="input-group-addon"><i class="gi gi-leaf"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-chosen">User Akses</label>
                                            <div class="col-md-8">
                                                <select id="example_chosen" name="example_chosen" class="select-chosen form-control" data-placeholder="Choose a Users akses.." style="width: 250px;">
                                                    <option></option>
                                                    <?php
                                                        foreach ($akses as $value) {
                                                            ?>
                                                            <option value="<?=$value->id_user_akses?>" ><?=$value->label?></option>

                                                            <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                       
                                    </fieldset>
                                    <div class="form-group form-actions">
                                        <div class="col-md-8 col-md-offset-3">
                                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-arrow-right"></i> Submit</button>
                                            <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>
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
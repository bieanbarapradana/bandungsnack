
                <!-- Page content -->
                <div id="page-content">
                    <!-- Validation Header -->
                    <div class="content-header">
                        <div class="header-section">
                            <h1>
                                <i class="gi gi-trash"></i><?=$label['sub_parent']?><br>
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
                                <?php
                                    if (isset($view)==0) 
                                    {
                                        ?>
                                <form id="form-validation" action="<?=base_url('Users/to_delete/'.$id_users.'/bloked')?>" method="post" class="form-horizontal form-bordered">

                                        <?php
                                    }
                                    else
                                    {
                                        ?>
                                <form id="form-validation" action="<?=base_url('Users/to_delete/'.$id_users)?>" method="post" class="form-horizontal form-bordered">

                                        <?php
                                    }
                                ?>
                                    <fieldset>
                                     <div class="form-group">
                                            <label class="col-md-3 control-label" for="address">Captcha<span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <?=$captcha_image?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="seller_name">Re-Captcha <span class="text-danger">*</span></label>
                                            <div class="col-md-5">
                                                <div class="input-group">
                                                    <input type="text" id="re_captcha" name="re_captcha" class="form-control" placeholder="Re-Captcha">
                                                    <input class="form-control form-white" type="hidden" name="captcha" id="captcha" value="<?=$kode_capt?>" required="">
                                                    <span class="input-group-addon"><i class="fa fa-circle-o"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div class="form-group form-actions">
                                        <div class="col-md-8 col-md-offset-3">
                                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-trash-o"></i> Submit</button>
                                           
                                </form>
                                 <a href="<?=base_url('Users')?>" class="btn btn-sm btn-warning"><i class="fa fa-times"></i> Cencel</a>
                                        </div>
                                    </div>
                                <!-- END Form Validation Example Content -->

                                <!-- Terms Modal -->
                               
                                <!-- END Terms Modal -->
                            </div>
                            <!-- END Validation Block -->
                        </div>
                      
                    </div>
                </div>
                <!-- END Page Content -->
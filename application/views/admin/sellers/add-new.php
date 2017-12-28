

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

                                <form id="form-validation" action="<?=base_url('Seller/add_data')?>" method="post" class="form-horizontal form-bordered">

                                    <fieldset>

                                        <div class="form-group">

                                            <label class="col-md-3 control-label" for="seller_name">Seller Name <span class="text-danger">*</span></label>

                                            <div class="col-md-8">

                                                <div class="input-group">

                                                    <input type="text" id="seller_name" name="seller_name" class="form-control" placeholder="Seller Name">

                                                    <span class="input-group-addon"><i class="gi gi-user"></i></span>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="form-group">

                                            <label class="col-md-3 control-label" for="address">Address<span class="text-danger">*</span></label>

                                            <div class="col-md-8">

                                                <textarea id="address" name="address" rows="6" class="form-control" placeholder="Seller Address"></textarea>

                                            </div>

                                        </div>

                                         <div class="form-group">

                                            <label class="col-md-3 control-label" for="contact">Contact<span class="text-danger">*</span></label>

                                            <div class="col-md-8">

                                                <div class="input-group">

                                                    <input type="text" id="contact" name="contact" class="form-control" placeholder="Contact">

                                                    <span class="input-group-addon"><i class="gi gi-earphone"></i></span>

                                                </div>

                                            </div>

                                        </div>
                                        <div class="form-group">

                                            <label class="col-md-3 control-label" for="contact">Email<span class="text-danger">*</span></label>

                                            <div class="col-md-8">

                                                <div class="input-group">

                                                    <input type="email" id="email" name="email" class="form-control" placeholder="Email">

                                                    <span class="input-group-addon"><i class="gi gi-earphone"></i></span>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="form-group">

                                            <label class="col-md-3 control-label"><a href="#modal-terms" data-toggle="modal">Service Terms</a> <span class="text-danger">*</span></label>

                                            <div class="col-md-8">

                                                <label class="switch switch-primary" for="val_terms">

                                                    <input type="checkbox" id="val_terms" name="val_terms" value="1">

                                                    <span data-toggle="tooltip" title="I agree to the terms!"></span>

                                                </label>

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
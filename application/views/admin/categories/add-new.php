
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
                                <form id="form-validation" action="<?=base_url('Categories/add_data')?>" method="post" class="form-horizontal form-bordered">
                                    <fieldset>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="category_name">Category Name <span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <input type="text" id="category_name" name="category_name" class="form-control" placeholder="Category Name">
                                                    <span class="input-group-addon"><i class="gi gi-leaf"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="deskripsi">Description<span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <textarea id="deskripsi" name="deskripsi" rows="6" class="form-control" placeholder="Description"></textarea>
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
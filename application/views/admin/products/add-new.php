<div id="page-content">

                    <!-- Components Header -->



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



                   

                    <!-- END Components Header -->

                        <div class="row">

                        <div class="col-md-12">

                         <!-- Dropzone Block -->

                            

                            <div class="block  full">

                                <!-- Form Validation Example Title -->

                                <div class="block-title">

                                    <h2><strong><?=$label['sub_parent']?></strong></h2>

                                </div>

                                <!-- END Form Validation Example Title -->



                                <!-- Form Validation Example Content -->

                                <form id="form-validation" action="<?=base_url('Product/proses_add')?>" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">

                                    <fieldset>



                                       <div class="form-group">

                                            <label class="col-md-3 control-label" for="id_seller">Seller name<span class="text-danger">*</span></label>

                                            <div class="col-md-8">

                                                <select id="id_seller" name="id_seller" class="select-chosen" data-placeholder="Choose Seller name" style="width: 250px;">

                                                    <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->

                                                    <?php

                                                        foreach ($data_seller as $value) {

                                                            ?>

                                                                <option value="<?=$value->id_seller?>"><?=$value->seller_name?></option>

                                                            <?php

                                                        }

                                                    ?>

                                                    

                                                </select>

                                            </div>

                                        </div>

                                        <div class="form-group">

                                            <label class="col-md-3 control-label" for="id_category">Category Name <span class="text-danger">*</span></label>

                                            <div class="col-md-8">

                                               <select id="id_category" name="id_category" class="select-chosen" data-placeholder="Choose Category" style="width: 250px;">

                                                    <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->

                                                    <?php

                                                        foreach ($data_category as $value) {

                                                            ?>

                                                                <option value="<?=$value->id_category?>"><?=$value->category_name?></option>

                                                            <?php

                                                        }

                                                    ?>

                                                    

                                                </select>

                                            </div>

                                        </div>

                                      

                                         <div class="form-group">

                                            <label class="col-md-3 control-label" for="product_name">Product name<span class="text-danger">*</span></label>

                                            <div class="col-md-8">

                                                    <input type="text" id="product_name" name="product_name" class="form-control" placeholder="Product name">

                                            </div>

                                        </div>

                                        <div class="form-group">

                                            <label class="col-md-3 control-label" for="product_price">Product price<span class="text-danger">*</span></label>

                                            <div class="col-md-8">

                                                    <input type="text" id="product_price" name="product_price" class="form-control" placeholder="Product price">

                                            </div>

                                        </div>

                                        <div class="form-group">

                                            <label class="col-md-3 control-label" for="stock">Stock<span class="text-danger">*</span></label>

                                            <div class="col-md-8">

                                                    <input type="text" id="stock" name="stock" class="form-control" placeholder="Stock">

                                            </div>

                                        </div>

                                         <div class="form-group">

                                            <label class="col-md-3 control-label" for="photo">Photo 1<span class="text-danger">*</span></label>

                                            <div class="col-md-8">



                                                    <input type="file"  id="photo"  name="photo" class="form-control" placeholder="Category Name">

                                            </div>

                                        </div>
                                          <!--div class="form-group">

                                            <label class="col-md-3 control-label" for="photo">Photo 2<span class="text-danger">*</span></label>

                                            <div class="col-md-8">



                                                    <input type="file"  id="photo1"  name="file_name[]" class="form-control" placeholder="Category Name">

                                            </div>

                                        </div>
                                          <div class="form-group">

                                            <label class="col-md-3 control-label" for="photo">Photo 3<span class="text-danger">*</span></label>

                                            <div class="col-md-8">



                                                    <input type="file"  id="photo2"  name="file_name[]" class="form-control" placeholder="Category Name">

                                            </div>

                                        </div-->

                                        <div class="form-group">

                                            <label class="col-md-3 control-label" for="promo">Promo</label>

                                            <div class="col-md-8">

                                                <select id="promo" name="promo" class="select-chosen" data-placeholder="Choose Promo" style="width: 250px;">

                                                    <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->

                                                    <option value="1">Yes</option>

                                                    <option value="0">No</option>

                                                    

                                                </select>

                                            </div>

                                        </div>

                                         <div class="form-group">

                                            <label class="col-md-3 control-label" for="discount">Discount<span class="text-danger">*</span></label>

                                            <div class="col-md-8">

                                                    <input type="text" id="discount" name="discount" class="form-control" placeholder="Discount">

                                            </div>

                                        </div>

                                        <div class="form-group">

                                            <label class="col-md-3 control-label" for="description">Description<span class="text-danger">*</span></label>

                                            <div class="col-md-8">

                                                <textarea id="description" name="description" rows="6" class="form-control" placeholder="Description of product"></textarea>

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

                                       <div class="form-group form-actions">

                                        <div class="col-md-8 col-md-offset-3">

                                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-arrow-right"></i> Submit</button>

                                            <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>

                                        </div>

                                    </div>

                                    </fieldset>

                                    

                                </form>

                                <!-- END Form Validation Example Content -->



                                <!-- Terms Modal -->

                               

                                <!-- END Terms Modal -->

                            </div>

                            <!-- END Validation Block -->

                        </div>

                      

                    </div>

                    <!-- END CKEditor Block -->

                </div>

                <!-- Page content -->

               
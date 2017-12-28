

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
                                <?php
                                    if ($link==null) 
                                    {
                                        ?>
                                        <form id="form-validation" action="<?=base_url('Orders/proses_update/'.$data_orders->id_orders)?>" method="post" class="form-horizontal form-bordered">
                                        <?php        
                                    }
                                    else
                                    {
                                        ?>
                                        <form id="form-validation" action="<?=base_url('Orders/proses_update/'.$data_orders->id_orders.'/od_py')?>" method="post" class="form-horizontal form-bordered">
                                        <?php        
                                    }
                                ?>
                                

                                    <fieldset>

                                          <div class="form-group">

                                            <label class="col-md-3 control-label" for="shipping_status">Shipping Status <span class="text-danger">*</span></label>

                                            <div class="col-md-8">

                                               <select id="shipping_status" name="shipping_status" class="select-chosen" data-placeholder="Choose Category" style="width: 250px;">

                                                    <option value="<?=$data_orders->shipping_status?>"><?=$data_orders->shipping_status?></option>
                                                    <option value="Pandding">Padding</option>
                                                    <option value="Manifest">Manifest</option>
                                                    <option value="On-Process">On-Process</option>
                                                    <option value="On-Transit">On-Transit</option>
                                                    <option value="Received On Destinnation">Received On Destinnation</option>
                                                    <option value="Delivered">Delivered</option>
                                                    <option value="Criss Cross">Criss Cross</option>
                                                    <option value="Cnee Unknown">Cnee Unknown</option>
                                                    <option value="AU to OPS">AU to OPS</option>
                                                    <option value="AU (Antar Ulang)">AU (Antar Ulang)</option>
                                                    <option value="Redelivered">Redelivered</option>
                                                    <option value="BA (Bad Address)">BA (Bad Address)</option>
                                                    <option value="MR (Misroute)">MR (Misroute)</option>
                                                    <option value="Closed Once Delivery Attempt">Closed Once Delivery Attempt</option>
                                                    <option value="NTH (Not At Home)">NTH (Not At Home)</option>
                                                    <!-- Required for data-placeholder attribute to work with Chosen plugin -->

                                                    

                                                    

                                                </select>

                                            </div>

                                        </div>
                                         <div class="form-group">

                                            <label class="col-md-3 control-label" for="payment_status">Payment Status <span class="text-danger">*</span></label>

                                            <div class="col-md-8">

                                               <select id="payment_status" name="payment_status" class="select-chosen" data-placeholder="Choose Category" style="width: 250px;">

                                                    <option value="<?=$data_orders->payment_status?>"><?=$data_orders->payment_status?></option><!-- Required for data-placeholder attribute to work with Chosen plugin --> 
                                                    <option value="approved">approved</option>
                                                    <option value="confirmed">confirmed</option>

                                                    

                                                    

                                                </select>

                                            </div>

                                        </div>
                                      

                                       

                                    </fieldset>

                                    <div class="form-group form-actions">

                                        <div class="col-md-8 col-md-offset-3">

                                          <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Save</button>

                                            <button type="button"  class="btn btn-sm btn-warning"><i class="fa fa-times"></i> Back</button>

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
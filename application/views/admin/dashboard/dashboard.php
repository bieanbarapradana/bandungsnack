                <div id="page-content">
                    <div class="content-header content-header-media">
                        <div class="header-section">
                            <div class="row">
                                <div class="col-md-4 col-lg-6 hidden-xs hidden-sm">
                                    <h1>Welcome <strong><?=$this->session->userdata('full_name')?></strong><br><small>You Look Awesome!</small></h1>
                                </div>
                                <div class="col-md-8 col-lg-6">
                                    <div class="row text-center">
                                        <div class="col-xs-4 col-sm-3">
                                            <h2 class="animation-hatch">
                                                $<strong>93.7k</strong><br>
                                                <small><i class="fa fa-thumbs-o-up"></i> Great</small>
                                            </h2>
                                        </div>
                                        <div class="col-xs-4 col-sm-3">
                                            <h2 class="animation-hatch">
                                                <strong>167k</strong><br>
                                                <small><i class="fa fa-heart-o"></i> Likes</small>
                                            </h2>
                                        </div>
                                        <div class="col-xs-4 col-sm-3">
                                            <h2 class="animation-hatch">
                                                <strong>101</strong><br>
                                                <small><i class="fa fa-calendar-o"></i> Events</small>
                                            </h2>
                                        </div>
                                        <!-- We hide the last stat to fit the other 3 on small devices -->
                                        <div class="col-sm-3 hidden-xs">
                                            <h2 class="animation-hatch">
                                                <strong>27&deg; C</strong><br>
                                                <small><i class="fa fa-map-marker"></i> Sydney</small>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                                <!-- END Top Stats -->
                            </div>
                        </div>
                        <!-- For best results use an image with a resolution of 2560x248 pixels (You can also use a blurred image with ratio 10:1 - eg: 1000x100 pixels - it will adjust and look great!) -->
                        <img src="<?=base_url('assets/back-end/img/placeholders/headers/dashboard_header.jpg');?>" alt="header image" class="animation-pulseSlow">
                    </div>
                    <!-- END Dashboard Header -->

                    <!-- Mini Top Stats Row -->
                    <div class="row">
                        <div class="col-sm-6 col-lg-3">
                            <!-- Widget -->
                            <a href="page_ready_article.html" class="widget widget-hover-effect1">
                                <div class="widget-simple">
                                    <div class="widget-icon pull-left themed-background-autumn animation-fadeIn">
                                        <i class="fa fa-file-text"></i>
                                    </div>
                                    <h3 class="widget-content text-right animation-pullDown">
                                        New <strong>Article</strong><br>
                                        <small>Mountain Trip</small>
                                    </h3>
                                </div>
                            </a>
                            <!-- END Widget -->
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <!-- Widget -->
                            <a href="page_comp_charts.html" class="widget widget-hover-effect1">
                                <div class="widget-simple">
                                    <div class="widget-icon pull-left themed-background-spring animation-fadeIn">
                                        <i class="gi gi-usd"></i>
                                    </div>
                                    <h3 class="widget-content text-right animation-pullDown">
                                        + <strong>250%</strong><br>
                                        <small>Sales Today</small>
                                    </h3>
                                </div>
                            </a>
                            <!-- END Widget -->
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <!-- Widget -->
                            <a href="page_ready_inbox.html" class="widget widget-hover-effect1">
                                <div class="widget-simple">
                                    <div class="widget-icon pull-left themed-background-fire animation-fadeIn">
                                        <i class="gi gi-envelope"></i>
                                    </div>
                                    <h3 class="widget-content text-right animation-pullDown">
                                        5 <strong>Messages</strong>
                                        <small>Support Center</small>
                                    </h3>
                                </div>
                            </a>
                            <!-- END Widget -->
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <!-- Widget -->
                            <a href="page_comp_gallery.html" class="widget widget-hover-effect1">
                                <div class="widget-simple">
                                    <div class="widget-icon pull-left themed-background-amethyst animation-fadeIn">
                                        <i class="gi gi-picture"></i>
                                    </div>
                                    <h3 class="widget-content text-right animation-pullDown">
                                        +30 <strong>Photos</strong>
                                        <small>Gallery</small>
                                    </h3>
                                </div>
                            </a>
                            <!-- END Widget -->
                        </div>
                        <div class="col-sm-6">
                            <!-- Widget -->
                            <a href="page_comp_charts.html" class="widget widget-hover-effect1">
                                <div class="widget-simple">
                                    <div class="widget-icon pull-left themed-background animation-fadeIn">
                                        <i class="gi gi-wallet"></i>
                                    </div>
                                    <div class="pull-right">
                                        <!-- Jquery Sparkline (initialized in js/pages/index.js), for more examples you can check out http://omnipotent.net/jquery.sparkline/#s-about -->
                                        <span id="mini-chart-sales"></span>
                                    </div>
                                    <h3 class="widget-content animation-pullDown visible-lg">
                                        Latest <strong>Sales</strong>
                                        <small>Per hour</small>
                                    </h3>
                                </div>
                            </a>
                            <!-- END Widget -->
                        </div>
                        <div class="col-sm-6">
                            <!-- Widget -->
                            <a href="page_widgets_stats.html" class="widget widget-hover-effect1">
                                <div class="widget-simple">
                                    <div class="widget-icon pull-left themed-background animation-fadeIn">
                                        <i class="gi gi-crown"></i>
                                    </div>
                                    <div class="pull-right">
                                        <!-- Jquery Sparkline (initialized in js/pages/index.js), for more examples you can check out http://omnipotent.net/jquery.sparkline/#s-about -->
                                        <span id="mini-chart-brand"></span>
                                    </div>
                                    <h3 class="widget-content animation-pullDown visible-lg">
                                        Our <strong>Brand</strong>
                                        <small>Popularity over time</small>
                                    </h3>
                                </div>
                            </a>
                            <!-- END Widget -->
                        </div>
                    </div>
                    <!-- END Mini Top Stats Row -->

                   
                </div>
                <!-- END Page Content -->

                
<!DOCTYPE html>
<html lang="en">

<!--head-->
	<?php $this->load->view('fronts/head')?>
    <!--head end-->
    <body>
        <!-- PAGE LOADER -->
        <div class="se-pre-con"></div>
        <!-- *** START PAGE HEADER SECTION *** -->
        <header>

            <!-- START LOGO SECTION -->
            <?php $this->load->view('fronts/logo')?>
            <!-- END OF /. LOGO -->

            <!-- START NAVIGATION -->
										<?php $this->load->view('fronts/menu')?>
										<!-- END OF/. NAVIGATION -->
        </header>
        <!-- *** END OF /. PAGE HEADER SECTION *** -->
        <!-- *** START PAGE MAIN CONTENT *** -->
        <main class="page_main_wrapper">
            

            <!-- START featured -->
            <?php $this->load->view('fronts/home/featured')?>
            <!-- END OF /. featured -->

            <div class="container">
                <div class="row row-m">
                    <!-- START MAIN CONTENT -->
                    <div class="col-sm-8 col-p main-content">
                        <div class="theiaStickySidebar">
                            <!-- START nasional -->

																<?php $this->load->view('fronts/home/nasional')?>
                            <!-- END OF /. POST nasional) -->

                            <!-- START daerah -->
														<?php $this->load->view('fronts/home/daerah')?>
                            <!--  END OF /. POST daerah -->
                        </div>
                    </div>
                    <!-- END OF /. MAIN CONTENT -->
                    <!-- START SIDE CONTENT -->
                    <div class="col-sm-4 col-p rightSidebar">
                        <div class="theiaStickySidebar">
                            <!-- START WEATHER -->


                            <!-- START facebook -->
                            <?php $this->load->view('fronts/widget/facebook')?>
                            <!-- END OF /. facebook -->

                            <!-- START beritalain -->
                            <?php $this->load->view('fronts/widget/beritalain')?>
                            <!-- END OF /. beritalain -->
                        </div>
                    </div>
                    <!-- END OF /. SIDE CONTENT -->
                </div>
            </div>

            <!-- START  VIDEO -->
            <?php $this->load->view('fronts/home/video')?>
            <!-- END OF /.  VIDEO -->
            <div class="container">
                <div class="row row-m">
                    <div class="col-sm-8 main-content col-p">
                        <div class="theiaStickySidebar">
                            <!-- START olahraga -->
                              <?php $this->load->view('fronts/home/olahraga')?>
                            <!-- END OF /. olahraga -->

                            <!-- START ADVERTISEMENT -->
                            <div class="add-inner">
                                <img src="<?php echo base_url()?>asset/frontend/images/add728x90-1.jpg" class="img-responsive" alt="">
                            </div>
                            <!-- END OF /. ADVERTISEMENT -->

                            <!-- START wisata -->
                            <?php $this->load->view('fronts/home/wisata')?>
                            <!-- END OF /. wisata -->
                        </div>
                    </div>
                    <div class="col-sm-4 rightSidebar col-p">
                        <div class="theiaStickySidebar">

                            <!-- START TAGS WIDGET -->
														<?php $this->load->view('fronts/widget/tags')?>
                            <!-- END OF /. TAGS WIDGET -->

                            <!-- START IKLAN HOME -->
                            <?php $this->load->view('fronts/widget/iklan')?>
                            <!-- END OF /. IKLAN HOME -->
                        </div>
                    </div>
                </div>
            </div>
            <section class="articles-wrapper">
                <div class="container">
                    <div class="row row-m">
                        <div class="col-sm-8 main-content col-p">
                            <div class="theiaStickySidebar">
                                <!-- START terbaru -->
                                <?php $this->load->view('fronts/home/terbaru')?>
                                <!-- END OF /. terbaru -->
                            </div>
                        </div>
                        <div class="col-sm-4 rightSidebar col-p">
                            <div class="theiaStickySidebar">


                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!-- *** END OF /. PAGE MAIN CONTENT *** -->

        <!-- *** START SUB FOOTER *** -->
      <?php $this->load->view('fronts/footer')?>
        <!-- *** END OF /. SUB FOOTER *** -->

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="<?php echo base_url()?>asset/frontend/js/jquery.min.js"></script>
        <!-- jquery ui js -->
        <script src="<?php echo base_url()?>asset/frontend/js/jquery-ui.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?php echo base_url()?>asset/frontend/js/bootstrap.min.js"></script>
        <!-- Bootsnav js -->
        <script src="<?php echo base_url()?>asset/frontend/bootsnav/js/bootsnav.js"></script>
        <!-- theia sticky sidebar -->
        <script src="<?php echo base_url()?>asset/frontend/js/theia-sticky-sidebar.js"></script>
        <!-- youtube js -->
        <script src="<?php echo base_url()?>asset/frontend/js/RYPP.js"></script>
        <!-- owl include js plugin -->
        <script src="<?php echo base_url()?>asset/frontend/owl-carousel/owl.carousel.min.js"></script>
        <!-- custom js -->
        <script src="<?php echo base_url()?>asset/frontend/js/custom.js"></script>
    </body>

</html>

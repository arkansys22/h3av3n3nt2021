<!DOCTYPE html>
<html lang="en">

<!--head-->
  <?php $this->load->view('fronts/news/head')?>
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
        <!-- START PAGE TITLE -->
        <div class="page-title">
            <div class="container">
                <div class="row">

                </div>
            </div>
        </div>
        <!-- END OF /. PAGE TITLE -->
        <!-- *** START PAGE MAIN CONTENT *** -->
        <main class="page_main_wrapper">

            <div class="container">
                <div class="row row-m">
                  <!-- START CONTENT kategori -->
                  <?php $this->load->view('fronts/news/isi_news')?>
                  <!-- END OF /. CONTENT kategori -->

                    <!-- START SIDE CONTENT -->
                    <div class="col-sm-4 col-p rightSidebar">
                        <div class="theiaStickySidebar">

                            <!-- START FACEBOOK -->
                            <?php $this->load->view('fronts/widget/facebook')?>
                            <!-- END OF /. FACEBOOK -->
                            <!-- START beritalain -->
														<?php $this->load->view('fronts/widget/beritalain')?>
														<!-- END OF /. beritalain -->


                        </div>
                    </div>
                    <!-- END OF /. SIDE CONTENT -->
                </div>
            </div>
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

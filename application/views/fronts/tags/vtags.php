<!DOCTYPE html>
<html lang="en">

<!--head-->
  <?php $this->load->view('fronts/head')?>
    <!--head end-->

    <body>
        <!-- PAGE LOADER -->
        <div id="container">
        <!-- *** START PAGE HEADER SECTION *** -->
        <header class="clearfix">

            <!-- START LOGO SECTION -->
            <?php $this->load->view('fronts/nav')?>
            <!-- END OF /. LOGO -->
        </header>
        <!-- *** END OF /. PAGE HEADER SECTION *** -->
        <!-- START PAGE TITLE -->
        <div class="page-title">
            <div class="container">
                <div class="row">

                </div>
            </div>
        </div>
          <?php $this->load->view('fronts/home/featured')?>
        <!-- END OF /. PAGE TITLE -->
        <!-- *** START PAGE MAIN CONTENT *** -->
        <section class="block-wrapper">
          <div class="container">
            <div class="row">

              <div class="col-md-9 col-sm-8">
                <!-- block content -->
                <div class="block-content">
                  <?php $this->load->view('fronts/tags/isi_tag')?>
                  <div class="pagination-box">
    								<ul class="pagination-list">
    									<li><?php echo $this->pagination->create_links(); ?></li>
    								</ul>
    							</div>

                  <!-- End Pagination box -->

                </div>
                <!-- End block content -->

              </div>

              <div class="col-md-3 col-sm-4">

                <!-- sidebar -->
                <div class="sidebar large-sidebar">

                  <div class="advertisement">
                    <div class="desktop-advert">
                      <span>Advertisement</span>
                      <img src="<?php echo base_url()?>asset/frontend/tech/upload/addsense/250x250.jpg" alt="">
                    </div>
                    <div class="tablet-advert">
                      <span>Advertisement</span>
                      <img src="<?php echo base_url()?>asset/frontend/tech/upload/addsense/200x200.jpg" alt="">
                    </div>
                    <div class="mobile-advert">
                      <span>Advertisement</span>
                      <img src="<?php echo base_url()?>asset/frontend/tech/upload/addsense/300x250.jpg" alt="">
                    </div>
                  </div>

                  <div class="widget post-widget">
                    <div class="title-section">
                      <h1><span>Most Read</span></h1>
                    </div>
                    <?php $this->load->view('fronts/home/most_read')?>
                  </div>





                  <div class="widget social-widget">
                    <div class="title-section">
                      <h1><span>Stay Connected</span></h1>
                    </div>
                    <?php $this->load->view('fronts/widget/facebook')?>
                  </div>
                  <?php $this->load->view('fronts/home/video')?>

                </div>
                <!-- End sidebar -->

              </div>

            </div>

          </div>
    <!-- *** END OF /. PAGE MAIN CONTENT *** -->
        </section>


        <!-- *** END OF /. PAGE MAIN CONTENT *** -->

        <?php $this->load->view('fronts/footer')?>
          <!-- *** END OF /. SUB FOOTER *** -->


            <script type="text/javascript" src="<?php echo base_url()?>asset/frontend/tech/js/jquery.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url()?>asset/frontend/tech/js/jquery.migrate.js"></script>
            <script type="text/javascript" src="<?php echo base_url()?>asset/frontend/tech/js/jquery.bxslider.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url()?>asset/frontend/tech/js/jquery.magnific-popup.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url()?>asset/frontend/tech/js/bootstrap.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url()?>asset/frontend/tech/js/jquery.ticker.js"></script>
            <script type="text/javascript" src="<?php echo base_url()?>asset/frontend/tech/js/jquery.imagesloaded.min.js"></script>
              <script type="text/javascript" src="<?php echo base_url()?>asset/frontend/tech/js/jquery.isotope.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url()?>asset/frontend/tech/js/owl.carousel.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url()?>asset/frontend/tech/js/retina-1.1.0.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url()?>asset/frontend/tech/js/plugins-scroll.js"></script>
            <script type="text/javascript" src="<?php echo base_url()?>asset/frontend/tech/js/script.js"></script>

          </div>
    </body>

</html>

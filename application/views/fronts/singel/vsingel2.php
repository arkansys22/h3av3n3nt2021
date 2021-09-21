<!DOCTYPE html>
<html lang="en">

<!--head-->
	<?php $this->load->view('fronts/singel/head')?>
    <!--head end-->
    <body>
        <!-- PAGE LOADER -->
        <div class="se-pre-con"></div>
        <!-- *** START PAGE HEADER SECTION *** -->
        <header>

            <!-- START LOGO SECTION -->
            <?php $this->load->view('fronts/nav')?>
            <!-- END OF /. LOGO -->
        </header>
        <!-- *** END OF /. PAGE HEADER SECTION *** -->
        <!-- *** START PAGE MAIN CONTENT *** -->
          <section class="block-wrapper shadow-white">
						<?php $this->load->view('fronts/home/featured')?>
            <!-- START PAGE TITLE -->
            <div class="page-title">
                <div class="container">
                    <div class="row">

                    </div>
                </div>
            </div>
            <!-- END OF /. PAGE TITLE -->
            <div class="container">
                <div class="row row-m">
                    <!-- START MAIN CONTENT -->
                    <?php $this->load->view('fronts/singel/content')?>
                            <!-- END OF /. RELATED ARTICLES -->
                            <!-- START COMMENT -->
                            <div class="comments-container">
                                <h3>Comments</h3>
                                <ul class="comments-list">
                                    <li>
                                        <div class="comment-main-level">
                                            <!-- Avatar -->
																						<li class="comment">
                    <script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
						<fb:comments href="<?php echo base_url("$berita->judul_seo ") ?>" num_posts="3" width="600"></fb:comments>
                  </li>



                            </div>
                            <!-- END OF /. COMMENT -->

                        </div>
                    </div>
                    <!-- END OF /. MAIN CONTENT -->
                    <!-- START SIDE CONTENT -->
                    <div class="col-sm-4 col-p rightSidebar">
                        <div class="theiaStickySidebar">
                            <!-- START IKLAN -->
														<?php $this->load->view('fronts/widget/iklan')?>
                            <!-- END OF /. IKLAN -->

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

                </div>
            </div>
        </footer>
        <!-- END OF /. FOOTER -->
				<!-- *** START SUB FOOTER *** -->
      <?php $this->load->view('fronts/footer')?>
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
    </body>

</html>

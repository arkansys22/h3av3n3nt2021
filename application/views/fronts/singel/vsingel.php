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
						<?php $this->load->view('fronts/home/featured')?>
            <!-- START PAGE TITLE -->
						<section class="block-wrapper">
							<div class="container">
								<div class="row">
									<?php $this->load->view('fronts/singel/content')?>
								</div>
							</div>
						</section>
						<br>
						<?php $this->load->view('fronts/iklan/bottombanner_single')?></br>
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

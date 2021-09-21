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
            <?php $this->load->view('fronts/home/featured')?>
            <!-- END OF /. featured -->
            <?php $this->load->view('fronts/iklan/middletopbanner_kategori')?>

						<section class="block-wrapper">
							<div class="container">
								<div class="row">

									<div class="col-md-9 col-sm-8">
										<!-- block content -->
										<div class="block-content">
											<?php $this->load->view('fronts/home/utama')?>
											<!-- End google addsense -->
											 <?php $this->load->view('fronts/home/random')?>

											<?php $this->load->view('fronts/home/terbaru')?>


											<!-- End Pagination box -->

										</div>
										<!-- End block content -->

									</div>

									<div class="col-md-3 col-sm-4">

										<!-- sidebar -->
										<div class="sidebar large-sidebar">
										<?php $this->load->view('fronts/iklan/sidebariklan3')?>


											<div class="widget tab-posts-widget">

												<ul class="nav nav-tabs" id="myTab">
													<li class="active">
														<a href="#option1" data-toggle="tab">Ambon</a>
													</li>
													<li>
														<a href="#option2" data-toggle="tab">Nasional</a>
													</li>
												</ul>

												<div class="tab-content">
													<div class="tab-pane active" id="option1">
														<ul class="list-posts">
															<?php $this->load->view('fronts/home/daerah')?>
														</ul>
													</div>
													<div class="tab-pane" id="option2">
														<ul class="list-posts">
															<?php $this->load->view('fronts/home/nasional')?>
														</ul>
													</div>
												</div>
											</div>
											<?php $this->load->view('fronts/iklan/sidebariklan2')?>

											<div class="widget post-widget">
												<div class="title-section">
													<h1><span>Berita Populer</span></h1>
												</div>
												<?php $this->load->view('fronts/home/most_read')?>
											</div>
										 <?php $this->load->view('fronts/home/olahraga')?>
										 <?php $this->load->view('fronts/iklan/sidebariklan1')?>



											<div class="widget social-widget">
												<div class="title-section">
													<h1><span>Like FanPage</span></h1>
												</div>
												<?php $this->load->view('fronts/widget/facebook')?>
											</div>

						

										</div>
										<!-- End sidebar -->

									</div>

								</div>

							</div>
        <!-- *** END OF /. PAGE MAIN CONTENT *** -->
						</section>
						<br>
						<?php $this->load->view('fronts/iklan/bottombanner_single')?></br>

        <!-- *** START SUB FOOTER *** -->
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
					
					<script type='text/javascript'>

		 $(document).ready(function() {

			 var stickyNavTop = $('#menu').offset().top;

			 var stickyNav = function(){

				 var scrollTop = $(window).scrollTop();

				 if (scrollTop > stickyNavTop) {

					 $('#menu').css({ 'position': 'fixed', 'top':0, 'z-index':9999 });

				 } else {

					 $('#menu').css({ 'position': 'relative' });

				 }

			 };

			 stickyNav();

			 $(window).scroll(function() {

				 stickyNav();

			 });

		 });

	 </script>
				</div>
    </body>

</html>

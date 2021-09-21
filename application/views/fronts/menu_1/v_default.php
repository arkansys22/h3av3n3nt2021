<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view('fronts/utama/meta')?>
    <?php $this->load->view('fronts/utama/css')?>
  </head>


  <body data-color="theme-1">
  <br>
    <?php $this->load->view('fronts/utama/header')?>
    <div class="main-wraper padd-70-70">
    	<div class="container">
    		<div class="gallery-detail">
    		    <div class="top-baner arrows">
    		     	<div class="swiper-container" data-autoplay="0" data-loop="1" data-speed="1000" data-center="0" data-slides-per-view="1" id="tour-slide-2">
    				    <div class="swiper-wrapper">
    				        <?php
                                    foreach ($post_promo as $post_promo) {
                              ?>
    					  	<div class="swiper-slide">
    							<img class="img-responsive" src="<?php echo base_url()?>asset/foto_promo/<?=$post_promo->gambar?>" alt="">
    					  	</div>
    					  <?php } ?>
    					</div>
    					<div class="pagination pagination-hidden poin-style-1"></div>
    				</div>
    		        <div class="arrow-wrapp arr-s-1">
    					<div class="cont-1170">
    						<div class="swiper-arrow-left sw-arrow"><span class="fa fa-angle-left"></span></div>
    						<div class="swiper-arrow-right sw-arrow"><span class="fa fa-angle-right"></span></div>
    					</div>
    				</div>
    		    </div>
    		</div>
      			<div class="col-md-12">
      					<h2><center>Open Trip</center></h2>

      			</div>
    	</div>
    </div>

    <div class="main-wraper padd-90">
    	<div class="container">
    		<div class="row">
    		     <?php
                    foreach ($post_news as $post_new) {
                              $isi = character_limiter($post_new->isi_berita,200);
                              $jdl = character_limiter($post_new->judul,240);
              ?>
    			<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
    				<div class="radius-mask tour-block hover-aqua">
              <a href="<?php echo base_url("open-paket/$post_new->judul_seo")?>">
    				  <div class="clip">
						 <div class="bg bg-bg-chrome act" style="background-image:url(<?php echo base_url()?>asset/foto_open/<?=$post_new->gambar?>)">
						 </div>
					  </div>
					  <div class="tour-layer delay-1"></div>

            	 	</a>
    				</div>
    			</div>
            <?php } ?>
    		</div>
    	</div>
    </div>

  <?php $this->load->view('fronts/utama/footer')?>
  <?php $this->load->view('fronts/utama/js')?>
  </body>
</html>

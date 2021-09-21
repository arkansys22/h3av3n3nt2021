<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view('fronts/vendor/meta')?>
    <?php $this->load->view('fronts/utama/css')?>
  </head>
  <body data-color="theme-1">
    <?php $this->load->view('fronts/utama/loading')?>
    <?php $this->load->view('fronts/utama/header')?>
    <div class="inner-banner">
  		<img class="center-image" src="<?php echo base_url()?>asset/frontend/aspanel/img/bghead.jpg" alt="">

  	</div>
    <div class="detail-wrapper">
    	<div class="container">
    		<div class="detail-header">
    			<div class="row">
    				<div class="col-xs-12 col-sm-8">
    					<div class="detail-category color-grey-3"><?php echo $post_news->lokasi?></div>
    					<h2 class="detail-title color-dark-2"><?php echo $post_news->nama?></h2>
              <div class="detail-category rate-wrap clearfix" >Rp. <?php echo $post_news->harga_min ?> - Rp. <?php echo $post_news->harga_max?></div>
    			    </div>
              <div class="col-xs-12 col-sm-4">
    			    	<div class="share clearfix">
                  <div class="share-title color-dark-2">Bagikan : </div>
                  <li class="color-fb"><a href="http://www.facebook.com/sharer.php?u=<?php echo base_url("$post_news->judul_seo ") ?>" onclick="window.open('http://www.facebook.com/sharer.php?u=<?php echo base_url()?><?php echo $post_news->judul_seo ?>','newwindow','width=400,height=350');  return false;" title="Facebook" target="_blank" ><i class="fa fa-facebook" ></i>FB</a></li>
                  <li class="color-ig"><a href="whatsapp://send?text=<?php echo $post_news->judul ?> - Mantenbaru.com | <?php echo base_url("$post_news->judul_seo ") ?>"><i class="fa fa-whatsapp"></i>WA</a></li>
                </div>
    			    </div>
    	       	</div>
           	</div>
           	<div class="row padd-90">
           		<div class="col-xs-12 col-md-8">
           			<div class="detail-content color-1">
           				<div class="detail-top slider-wth-thumbs style-2">
    						<div class="swiper-container thumbnails-preview" data-autoplay="0" data-loop="0" data-speed="500" data-center="0" data-slides-per-view="1">
    			                <div class="swiper-wrapper">
    		                    	<div class="swiper-slide active" data-val="0">
    		                    		 <img class="img-responsive img-full" <?php if(empty($post_news->gambar)) {echo "<img src='".base_url()."assets/images/no_image_thumb.png' width='350' height='230'>";}
                         			        else { echo " <img src='".base_url()."asset/foto_vendor/".$post_news->gambar."'width='350' height='330'> ";}
                         			        ?>
                              </div>
    		                    	<div class="swiper-slide" data-val="1">
                                <img class="img-responsive img-full" <?php if(empty($post_news->gambar2)) {echo "<img src='".base_url()."assets/images/no_image_thumb.png' width='350' height='230'>";}
                                     else { echo " <img src='".base_url()."asset/foto_vendor/".$post_news->gambar2."'width='350' height='330'> ";}
                                     ?>
                              </div>
    		                    	<div class="swiper-slide" data-val="2">
                                <img class="img-responsive img-full" <?php if(empty($post_news->gambar3)) {echo "<img src='".base_url()."assets/images/no_image_thumb.png' width='350' height='230'>";}
                                     else { echo " <img src='".base_url()."asset/foto_vendor/".$post_news->gambar3."'width='350' height='330'> ";}
                                     ?>
                              </div>
    		                    	<div class="swiper-slide" data-val="3">
                                <img class="img-responsive img-full" <?php if(empty($post_news->gambar4)) {echo "<img src='".base_url()."assets/images/no_image_thumb.png' width='350' height='230'>";}
                                     else { echo " <img src='".base_url()."asset/foto_vendor/".$post_news->gambar4."'width='350' height='330'> ";}
                                     ?>
                              </div>
    		                    	<div class="swiper-slide" data-val="4">
                                <img class="img-responsive img-full" <?php if(empty($post_news->gambar5)) {echo "<img src='".base_url()."assets/images/no_image_thumb.png' width='350' height='230'>";}
                                     else { echo " <img src='".base_url()."asset/foto_vendor/".$post_news->gambar5."'width='350' height='330'> ";}
                                     ?>
                              </div>
    		                    </div>
    			                <div class="pagination pagination-hidden"></div>
    			            </div>
    			            <div class="swiper-container thumbnails" data-autoplay="0"
    			            data-loop="0" data-speed="500" data-center="0"
    			            data-slides-per-view="responsive" data-xs-slides="3"
    			            data-sm-slides="5" data-md-slides="5" data-lg-slides="5"
    			            data-add-slides="5">
    			          <div class="swiper-wrapper">
    								<div class="swiper-slide current active" data-val="0">

                      <img class="img-responsive img-full" <?php if(empty($post_news->gambar)) {echo "<img src='".base_url()."assets/images/no_image_thumb.png' width='350' height='230'>";}
                           else { echo " <img src='".base_url()."asset/foto_vendor/".$post_news->gambar."'width='350' height='330'> ";}
                           ?>
                    </div>
    								<div class="swiper-slide" data-val="1">
                      <img class="img-responsive img-full" <?php if(empty($post_news->gambar2)) {echo "<img src='".base_url()."assets/images/no_image_thumb.png' width='350' height='230'>";}
                           else { echo " <img src='".base_url()."asset/foto_vendor/".$post_news->gambar2."'width='350' height='330'> ";}
                           ?>
                    </div>
    								<div class="swiper-slide" data-val="2">
                      <img class="img-responsive img-full" <?php if(empty($post_news->gambar3)) {echo "<img src='".base_url()."assets/images/no_image_thumb.png' width='350' height='230'>";}
                           else { echo " <img src='".base_url()."asset/foto_vendor/".$post_news->gambar3."'width='350' height='330'> ";}
                           ?>
                    </div>
    								<div class="swiper-slide" data-val="3">
                      <img class="img-responsive img-full" <?php if(empty($post_news->gambar4)) {echo "<img src='".base_url()."assets/images/no_image_thumb.png' width='350' height='230'>";}
                           else { echo " <img src='".base_url()."asset/foto_vendor/".$post_news->gambar4."'width='350' height='330'> ";}
                           ?>
                    </div>
    								<div class="swiper-slide" data-val="4">
                      <img class="img-responsive img-full" <?php if(empty($post_news->gambar5)) {echo "<img src='".base_url()."assets/images/no_image_thumb.png' width='350' height='230'>";}
                           else { echo " <img src='".base_url()."asset/foto_vendor/".$post_news->gambar5."'width='350' height='330'> ";}
                           ?>
                    </div>
    							</div>
    							<div class="pagination hidden"></div>
    						</div>
    					</div>

    					<div class="detail-content-block">
    						<h3><?php echo $post_news->judul?></h3>
    						<p><?php echo $post_news->konten?></p>

    					</div>

    				    </div>
           		</div>
           		<div class="col-xs-12 col-md-4">
           			<div class="right-sidebar">

    					<div class="help-contact bg-grey-2">
    						<h4 class="color-dark-2">KONSULTASI</h4>
    						<a class="help-phone color-dark-2 link-dr-blue" href="tel:081210126196"><img src="<?php echo base_url()?>asset/frontend/aspanel/img/detail/phone24-dark.png" alt="">0812-1012-6196</a>
    						<a class="help-mail color-dark-2 link-dr-blue" href="mailto:marketing@mantenbaru.com’s_travel@world.com"><img src="<?php echo base_url()?>asset/frontend/aspanel/img/detail/letter-dark.png" alt="">marketing@mantenbaru.com</a>
    					</div><br>
              <div class="sidebar-block type-2">
                <h4 class="sidebar-title color-dark-2"><center>Vendor Lainnya</center></h4>
                <div class="widget-slider arrows">
                  <div class="swiper-container" data-autoplay="0" data-loop="1" data-speed="100" data-center="0" data-slides-per-view="1">
                    <div class="swiper-wrapper">
                      <?php
                          $no = 1;
                            foreach ($post_newz as $post_new) {

                      ?>
                      <div class="swiper-slide radius-4 active" data-val="0">
                        <img class="center-image" <?php if(empty($post_new->gambar)) {echo "<img src='".base_url()."asset/layout_foto_promo.png'>";}
                                                else { echo " <img src='".base_url()."asset/foto_vendor/".$post_new->gambar."'> ";}
                                                ?>
                      <div class="vertical-bottom">
                          <h4 class="color-white"><?php echo $post_new->nama_kategori ?></h4>
                          <span class="font-style-2 color-white"><?php echo $post_new->nama ?></span>

                        </div>

                      </div>

                      <?php } ?>
                    </div>

                    <div class="pagination pagination-hidden poin-style-1"></div>
                      <div class="arr-t-3">
                      <div class="swiper-arrow-left sw-arrow"><span class="fa fa-angle-left"></span></div>
                      <div class="swiper-arrow-right sw-arrow"><span class="fa fa-angle-right"></span></div>
                    </div>

                  </div>
                </div>
              </div>
              <div class="sidebar-block type-2">
                <h4 class="sidebar-title color-dark-2"><center>Investasi Yuk</center></h4>
                <div class="widget-slider arrows">
                  <div class="swiper-container" data-autoplay="0" data-loop="1" data-speed="100" data-center="0" data-slides-per-view="1">
                    <div class="swiper-wrapper">
                      <?php
                          $no = 1;
                            foreach ($post_investasi as $post_new) {

                      ?>
                      <div class="swiper-slide radius-4 active" data-val="0">
                        <img class="center-image" <?php if(empty($post_new->gambar)) {echo "<img src='".base_url()."asset/layout_foto_promo.png'>";}
                                                else { echo " <img src='".base_url()."asset/foto_investasi/".$post_new->gambar."'> ";}
                                                ?>
                      <div class="vertical-bottom">
                          <h4 class="color-white"><?php echo $post_new->nama_kategori ?></h4>
                          <span class="font-style-2 color-white"><?php echo $post_new->nama ?></span>

                        </div>

                      </div>

                      <?php } ?>
                    </div>

                    <div class="pagination pagination-hidden poin-style-1"></div>
                      <div class="arr-t-3">
                      <div class="swiper-arrow-left sw-arrow"><span class="fa fa-angle-left"></span></div>
                      <div class="swiper-arrow-right sw-arrow"><span class="fa fa-angle-right"></span></div>
                    </div>

                  </div>
                </div>
              </div>

           			</div>
           		</div>
           	</div>
    				<div class="main-wraper padd-90">
    		        <div class="container">
    		    		<div class="row">
    		    			<div class="col-md-12">
                    <div class="second-title">
            					<h2>Undangan Pernikahan</h2>
            					  <p class="color-grey">Mantenbaru Menyediakan Undangan Online, Undangan Cetak dan Undangan Video Digital </p>
            				</div>
    		    			</div>
    		    		</div>
    		    		<div class="row">
    		    			   <div class="arrows">
    		    				<div class="swiper-container hotel-slider" data-autoplay="5000" data-loop="1" data-speed="1000" data-center="0" data-slides-per-view="responsive" data-mob-slides="1" data-xs-slides="2" data-sm-slides="2" data-md-slides="3" data-lg-slides="4" data-add-slides="4">

                        <div class="swiper-wrapper">
                          <?php
                                foreach ($post_undangan as $post_new) {
                                          $isi = character_limiter($post_new->meta_desc,80);
                                          $jdl = character_limiter($post_new->judul,240);
                          ?>
                          <div class="swiper-slide">
                              <div class="hotel-item">
                                 <div class="radius-top">
                                   <img <?php if(empty($post_new->gambar)) {echo "<img src='".base_url()."asset/layout_foto_promo.png'>";}
                                                           else { echo " <img src='".base_url()."asset/foto_undangan/".$post_new->gambar."'> ";}
                                                           ?>
                                  <div class="price price-s-1"><?php echo $post_new->harga_min?></div>
                                 </div>
                                 <div class="title clearfix">
                                 <h4><b><a href="<?php echo base_url("undangan/$post_new->judul_seo") ?>"><?php echo $post_new->nama?></a></b></h4>
                                 <p class="f-14 color-dark-2"><?php echo $isi?></p>
                                 <a href="<?php echo base_url("undangan/$post_new->judul_seo") ?>" class="c-button bg-dr-blue hv-dr-blue-o b-50 fl">Lihat Lengkapnya</a>

                                 </div>
                              </div>
                        </div>
                          <?php } ?>
                        </div>




    								<div class="pagination"></div>
    									<div class="swiper-arrow-left arrows-travel"><span class="fa fa-angle-left"></span></div>
    									<div class="swiper-arrow-right arrows-travel"><span class="fa fa-angle-right"></span></div>
    							</div>
    						  </div>
    		    		</div>
    				</div>
    			</div>
    	</div>
    </div>

  <?php $this->load->view('fronts/utama/footer')?>
  <?php $this->load->view('fronts/utama/js')?>
  </body>
</html>

<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view('fronts/utama/meta')?>
    <?php $this->load->view('fronts/utama/css')?>
  </head>
  <body data-color="theme-1">

    <?php $this->load->view('fronts/utama/header')?>
    <br>
    <div class="detail-wrapper">
    	<div class="container">
    		<div class="detail-header">
    			<div class="row">
    				<div class="col-xs-12 col-sm-8">
      				<h2 class="detail-title color-dark-2"><?php echo $post_news->nama?></h2>
              <h4 class="detail-title color-dark-2"><strong><?php echo $post_news->lokasi?></strong></h4>
    			  </div>

    			    <div class="col-xs-12 col-sm-4">
                <div class="share clearfix">
                  <br>
                  <div class="share-title color-dark-2">Share : </div>
                <li class="color-fb"><a href="http://www.facebook.com/sharer.php?u=<?php echo base_url("open-paket/$post_news->judul_seo ") ?>" onclick="window.open('http://www.facebook.com/sharer.php?u=<?php echo base_url()?><?php echo $url?>/<?php echo $post_news->judul_seo ?>','newwindow','width=400,height=350');  return false;" title="Facebook" target="_blank" ><i class="fa fa-facebook" ></i>Facebook</a></li>
                <li class="color-ig"><a href="whatsapp://send?text=<?php echo $post_news->judul ?> - ANT Tour| <?php echo base_url("open-paket/$post_news->judul_seo ") ?>"><i class="fa fa-whatsapp"></i>WhatsApp</a></li> 
             </div></div>
    	       	</div>
           	</div>
           	<div class="row padd-90">
           		<div class="col-xs-12 col-md-8">
           			<div class="detail-content color-1">
                  <div class="embed-responsive embed-responsive-16by9">
  									<img class="img-full img-responsive" src="<?php echo base_url()?>asset/foto_open/<?=$post_news->gambar2?>" alt="">
  								</div>
    					<div class="detail-content-block">
    					<?php echo $post_news->konten?>
    					</div>
    					<div class="detail-content-block">
    	          <div class="accordion style-6">
    	            <div class="acc-panel">
      	             <div class="acc-title active"><span class="acc-icon"></span>Trip Info</div>
      	             <div class="acc-body first">
      					<?php echo $post_news->info?>
      				  </div>
    	             </div>
    	             <div class="acc-panel">
    	               <div class="acc-title"><span class="acc-icon"></span>Facilities</div>
    	                <div class="acc-body">
    				<?php echo $post_news->fasilitas?>
    				</div>
    	              </div>
    	              <div class="acc-panel">
    	                 <div class="acc-title"><span class="acc-icon"></span>Itinerary</div>
    	                 <div class="acc-body">
    									     <?php echo $post_news->itinerary?>
    									 </div>
    	              </div>
                    <div class="acc-panel">
    	                 <div class="acc-title"><span class="acc-icon"></span>Personal Equipment</div>
    	                 <div class="acc-body">
    					<?php echo $post_news->equip?>
    									 </div>
    	              </div>
                    <div class="acc-panel">
    	                 <div class="acc-title"><span class="acc-icon"></span>Best Price</div>
    	                 <div class="acc-body">
                        <p><strong>IDR <?php echo number_format($post_news->harga_min)?></strong> /pax</p>
    									      <p>Down Payment : IDR <?php echo number_format($post_news->harga_max)?> / pax</p>

    									 </div>
    	              </div>
    	              <div class="acc-panel">
    	                 <div class="acc-title"><span class="acc-icon"></span>Term & Conditions</div>
    	                 <div class="acc-body">
    									      <?php echo $post_news->syarat?>
    									 </div>
    	              </div>
                    <div class="acc-panel">
    	                 <div class="acc-title"><span class="acc-icon"></span>Book Now</div>
    	                 <div class="acc-body">
    									      <p>Participant List</p>
                            <div class="row">
                              <div class="col-xs-12 col-md-8">
                                <?php echo $post_news->partisipan?>
              								</div>
              							</div>
                      			  <div class="buttons-wrap">
                      				  <a href="https://api.whatsapp.com/send?phone=6281291888852&text=Hai%20Ant%20Tour%20!%20Kami%20mau%20ikut%20<?php echo $post_news->nama?><?php echo $post_news->lokasi?>" class="c-button m-right bg-7">Booked This Trip</a>
                      			  </div>
                       </div>
    	              </div>
                    

    	            </div>
                  <div class="share">
                    <br>
                    <div class="share-title color-dark-2">Share : </div>
                     <li class="color-fb"><a href="http://www.facebook.com/sharer.php?u=<?php echo base_url("$post_news->judul_seo ") ?>" onclick="window.open('http://www.facebook.com/sharer.php?u=<?php echo base_url()?><?php echo $url?>/<?php echo $post_news->judul_seo ?>','newwindow','width=400,height=350');  return false;" title="Facebook" target="_blank" ><i class="fa fa-facebook" ></i>Facebook</a></li>
                <li class="color-ig"><a href="whatsapp://send?text=<?php echo $post_news->judul ?> - ANT Tour| <?php echo base_url("open-paket/$post_news->judul_seo ") ?>"><i class="fa fa-whatsapp"></i>WhatsApp</a></li> 
             </div>
    					   </div>
                   <div  class="fb-comments" data-href="<?php echo base_url("open-paket/$post_news->judul_seo")?>" data-numposts="15"></div>
    				    </div>
           		</div>
           		<div class="col-xs-12 col-md-4">
           			<div class="right-sidebar">
    					
              <div class="popular-tours bg-grey-2">
                <h4 class="color-dark-2">Other Open Trip</h4>
                
                <?php
                    foreach ($post_trip as $post_new) {
              ?>
                <div class="hotel-small style-2 clearfix">
                  <a class="hotel-img black-hover" href="<?php echo base_url("open-paket/$post_new->judul_seo")?>">
                    <img class="img-full img-responsive" src="<?php echo base_url()?>asset/foto_open/<?=$post_new->gambar?>" alt="">
                    <div class="tour-layer delay-1"></div>
                  </a>
                  <div class="hotel-desc">
                      <a href="<?php echo base_url("open-paket/$post_new->judul_seo")?>">
                      <h6><?php echo $post_new->lokasi?></h6>
                    <div><?php echo $post_new->nama?></div>
                    <h5>IDR <?php echo number_format($post_new->harga_min,0,',','.')?></h5>
                    </a>
                  </div>
                </div>
                
                <?php } ?>
              </div>
              <div class="popular-tours bg-grey-2">
                <h4 class="color-dark-2">Private Trip</h4>
                 <?php
                    foreach ($post_privatetrip as $post_new) {
                ?>
                <div class="hotel-small style-2 clearfix">
                  <a class="hotel-img black-hover" href="#">
                    <img class="img-full img-responsive" src="<?php echo base_url()?>asset/foto_private/<?=$post_new->gambar?>" alt="">
                    <div class="tour-layer delay-1"></div>
                  </a>
                  <div class="hotel-desc">
                      <h4><?php echo $post_new->nama?></h4>
                    <h6>Start From <p><strong>IDR <?php echo number_format($post_new->harga_min,0,',','.')?></strong></p></h6>
                  </div>
                </div>
                <?php } ?>
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
